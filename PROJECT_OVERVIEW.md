# Income One — Project Overview

A short, plain-language tour of the codebase so a new developer can understand what is where and why.

---

## 1. What this project is

**Income One** is a **multi-vendor online marketplace**. Think Amazon or Etsy in miniature:

- **Customers** browse products and buy them.
- **Vendors** open their own little shop inside the marketplace and sell their products.
- **Admins** run the whole site — they manage vendors, categories, products, and orders.

Each user picks one of these three roles when they sign up.

---

## 2. The tech stack in one breath

| Layer | What we use | Why |
|---|---|---|
| Language | **PHP 8.5** | The programming language for the backend |
| Framework | **Laravel 13** | The PHP framework that handles routing, database, auth, etc. |
| Database | **SQLite** (default) | Lightweight, no server needed for development |
| Auth | **Laravel Breeze** | Pre-built login/register pages and logic |
| Frontend CSS | **Bootstrap 5** | Ready-made buttons, forms, grids, etc. |
| Frontend build | **Vite + Sass** | Compiles SCSS and JS into browser-ready files |
| Icons | **Tabler Icons** | The `ti ti-*` icon font |
| Charts | **ApexCharts** | Pretty charts on the dashboard |

If you only remember one thing: **it's a Laravel app with a Bootstrap admin UI.**

---

## 3. Folder tour (the big picture)

```
incomeonecom/
├── app/                ← All the PHP code that powers the backend
├── bootstrap/          ← Laravel's startup file (rarely edited)
├── config/             ← Configuration files (database, mail, etc.)
├── database/           ← Migrations (table definitions) + seeders (test data)
├── public/             ← Files the browser can directly download (logos, built CSS/JS)
├── resources/          ← Source files for the frontend (Blade views, SCSS, JS)
├── routes/             ← URL → controller mapping
├── storage/            ← Logs, uploaded files, compiled views
├── tests/              ← Automated tests
├── vendor/             ← Third-party PHP libraries (managed by Composer)
└── node_modules/       ← Third-party JS libraries (managed by npm)
```

Most of your time will be spent inside **`app/`** and **`resources/`**.

---

## 4. The backend (the `app/` folder)

The backend follows a **Model → Service → Controller** pattern. Each file has one job.

### 4.1 Models (`app/Models/`)

A model is the PHP version of a database table. One file = one table.

| Model | What it stores |
|---|---|
| `User` | Anyone with a login (admin, vendor, or customer) |
| `Vendor` | Extra info for vendor users (store name, logo, approval status) |
| `Address` | Shipping addresses for customers |
| `Category` | Product categories (Electronics, Laptops, etc.). Can have parent categories. |
| `Product` | A product for sale. Belongs to a vendor and (optionally) a category. |
| `ProductImage` | Extra images per product |
| `Cart` + `CartItem` | A customer's shopping cart |
| `Order` + `OrderItem` | A placed order and the items in it |
| `Payment` | Payment record for an order |

Every model uses **soft deletes** — when you "delete" something, it's just hidden, not really erased. So nothing ever truly disappears unless you call `forceDelete()`.

### 4.2 Enums (`app/Enums/`)

An **enum** is a fixed list of allowed values. We use them anywhere a column should only hold a known set of choices:

| Enum | Allowed values |
|---|---|
| `UserRole` | admin, vendor, customer |
| `VendorStatus` | pending, approved, suspended |
| `OrderStatus` | pending, processing, shipped, delivered, cancelled |
| `PaymentStatus` | pending, paid, failed, refunded |
| `FulfillmentStatus` | pending, processing, shipped, delivered |

This means if you ever try to set `$order->status = 'wrong'` PHP will yell at you. Safer than plain strings.

### 4.3 Migrations (`database/migrations/`)

Migrations describe how to build (and roll back) database tables. Laravel runs them in order. They define columns, foreign keys, indexes.

Run them with:
```bash
/usr/bin/php8.5 artisan migrate          # apply new migrations
/usr/bin/php8.5 artisan migrate:fresh    # drop everything and rebuild
```

### 4.4 Seeders (`database/seeders/`)

Seeders fill the database with sample data — useful for development.

| Seeder | What it creates |
|---|---|
| `AdminSeeder` | One admin user: `admin@incomeone.test` / `password` |
| `VendorSeeder` | Two approved vendor users (Acme Goods, PinePeak Supply) |
| `CategorySeeder` | Six product categories |
| `ProductSeeder` | Ten products linked to vendors and categories |

`DatabaseSeeder` runs them all in the right order. Run with:
```bash
/usr/bin/php8.5 artisan migrate:fresh --seed
```

### 4.5 Services (`app/Services/`)

This is where the **real work happens** — adding products, building orders, processing payments. A service is just a regular class with methods.

Examples:
- `CategoryService::paginate()` — list categories
- `CategoryService::create($data, $image)` — make a new category
- `ProductService::update($product, $data, $image)` — change a product

Why have services? So controllers stay short and the business logic is reusable. If we ever add an API or a CLI command, they call the same service methods.

| Service | Status |
|---|---|
| `CategoryService`, `ProductService` | Done — used by admin CRUD |
| `AuthService`, `VendorService`, `CartService`, `OrderService`, `PaymentService` | Empty — to be built in upcoming phases |

### 4.6 Controllers (`app/Http/Controllers/`)

A controller is the thin glue between a URL and a service. It:
1. Receives the HTTP request
2. Validates input (using a Form Request)
3. Calls a service to do the actual work
4. Returns a view, redirect, or JSON

Controllers are grouped by role:

```
Controllers/
├── Admin/          ← Pages under /admin (admin-only)
├── Vendor/         ← Pages under /vendor (vendor-only)
├── Customer/       ← Pages under /account (customer-only)
├── Shop/           ← Public pages (home, browse)
├── Auth/           ← Login, register, password reset (from Breeze)
├── ProfileController.php  ← User profile editing
└── Controller.php  ← Base class
```

### 4.7 Form Requests (`app/Http/Requests/`)

A Form Request validates input before it reaches the controller. If validation fails, Laravel automatically redirects back with errors.

Example: `StoreProductRequest` says "the `price` field must be a number ≥ 0".

### 4.8 Middleware (`app/Http/Middleware/`)

Middleware are gatekeepers that sit between a request and the route. We have two custom ones:

- `EnsureUserHasRole` (alias `role:admin`, `role:vendor`, etc.) — blocks users with the wrong role
- `EnsureVendorApproved` (alias `vendor.approved`) — blocks vendors whose accounts aren't approved yet

In Laravel 13 these are registered in `bootstrap/app.php`, not in a Kernel file.

### 4.9 Routes (`routes/web.php`)

This file is the URL map. Each URL is hooked to a controller method.

```
/                       → Shop\HomeController@index           (public)
/login, /register, ...  → Auth\* (from Breeze)
/dashboard              → redirects to the right role dashboard
/admin/*                → Admin\* (role:admin only)
/vendor/*               → Vendor\* (approved vendors only)
/account/*              → Customer\* (customers only)
```

To see every route in the app:
```bash
/usr/bin/php8.5 artisan route:list
```

---

## 5. The frontend (the `resources/` folder)

The frontend is built with Blade (Laravel's template engine) + Bootstrap 5 styling.

### 5.1 SCSS — the styling source (`resources/scss/`)

```
scss/
├── app.scss            ← The single entry point. Just imports style.scss.
├── style.scss          ← Loads Tabler icons + Bootstrap + custom partials.
├── _variables.scss     ← Bootstrap overrides (colors, fonts, etc.)
├── _custom.scss        ← Custom sidebar/topbar styles
├── _avatar.scss, _border.scss, _button.scss, _icon-shape.scss, _utilities.scss
```

When you run `npm run build`, all these get compiled into one `app.css` file in `public/build/`.

### 5.2 JavaScript (`resources/js/`)

```
js/
├── app.js              ← The entry point. Imports Bootstrap and admin scripts.
└── admin/
    ├── sidebar.js      ← Sidebar collapse/expand + active link highlight
    └── chart.js        ← ApexCharts initialization (safe — checks if chart DOM exists)
```

### 5.3 Blade views (`resources/views/`)

Blade is HTML with curly braces for variables and `@directives` for loops/conditions.

#### Layouts — the outer shell of every page

```
layouts/
├── admin.blade.php     ← Used by all dashboard pages: topbar + sidebar + content
└── auth.blade.php      ← Used by login/register: centered card on blank background
```

A page that wants the admin shell starts with `@extends('layouts.admin')` and fills in `@section('content')`.

#### Components — reusable building blocks

```
components/
├── admin/
│   ├── topbar.blade.php    ← Top navbar (notifications + profile menu)
│   ├── sidebar.blade.php   ← Left nav — changes based on user role
│   └── footer.blade.php
├── stat-card.blade.php     ← The colorful KPI tiles on dashboards
├── card.blade.php          ← A Bootstrap card with optional title
├── data-table.blade.php    ← A Bootstrap table with header + body slots
├── alert.blade.php         ← Success/error flash messages
└── form/
    ├── input.blade.php     ← Text/email/password input with label + error
    ├── textarea.blade.php
    ├── select.blade.php
    └── file.blade.php
```

You use them like HTML tags:

```html
<x-stat-card title="Total Sales" value="$25,000" icon="ti ti-currency-dollar" color="primary"/>
<x-form.input name="email" label="Email" type="email" required/>
```

#### Page views

```
views/
├── welcome.blade.php           ← The public homepage
├── errors/404.blade.php        ← Page-not-found
├── auth/                       ← login, register, forgot/reset password, etc.
├── profile/                    ← User profile editing
├── admin/
│   ├── dashboard.blade.php
│   ├── categories/             ← index, create, edit, _form
│   └── products/               ← index, create, edit, _form
├── vendor/dashboard.blade.php
└── customer/dashboard.blade.php
```

The `_form.blade.php` files are shared partials so the "create" and "edit" pages don't repeat the form markup.

---

## 6. How a request flows through the app

Let's follow what happens when an admin clicks "Products" in the sidebar:

```
1. Browser sends GET /admin/products

2. Laravel's router (routes/web.php) sees the URL matches the admin group
   → runs middleware: auth (logged in?) + role:admin (is admin?)

3. The router calls Admin\ProductController::index()

4. The controller asks ProductService::paginate() for the data
   → Service uses Eloquent (Product model) to query the database
   → Returns 15 products with their vendor + category eager-loaded

5. The controller returns view('admin.products.index', ['products' => ...])

6. Blade renders the view:
   → It extends layouts/admin.blade.php (the shell)
   → Pulls in <x-admin.topbar/> and <x-admin.sidebar/>
   → Sidebar reads auth()->user()->role and shows admin links
   → The product list uses <x-card> + <x-data-table>
   → Each row uses <img>, badges, action buttons

7. Blade outputs HTML. Browser displays the page.
```

That single flow uses every layer of the app. Once you understand it, the rest is variations on the same theme.

---

## 7. Where to start as a new developer

1. **Run it locally** so you can click around:
   ```bash
   composer install
   npm install && npm run build
   /usr/bin/php8.5 artisan migrate:fresh --seed
   /usr/bin/php8.5 artisan serve
   # Open http://localhost:8000
   # Login: admin@incomeone.test / password
   ```

2. **Click the "Products" link in the sidebar** and try create/edit/delete. That's the only complete CRUD flow built so far — read the code path top to bottom to see how everything connects.

3. **Read `CLAUDE.md`** in the project root — it's the technical version of this doc, with exact file paths and commands.

4. **Pick a phase to build next:**
   - Phase 2: Vendor approval flow + vendor product CRUD
   - Phase 3: Public storefront pages
   - Phase 4: Cart + checkout
   - Phase 5: Order management

Each phase follows the same pattern: migration → model → service → controller → form request → views → route.

---

## 8. Commands cheat sheet

```bash
# DB
/usr/bin/php8.5 artisan migrate:fresh --seed    # rebuild DB from scratch + seed
/usr/bin/php8.5 artisan tinker                  # interactive PHP shell

# Routes & debug
/usr/bin/php8.5 artisan route:list
/usr/bin/php8.5 artisan route:list --path=admin

# Code quality
./vendor/bin/pint                               # auto-format PHP
/usr/bin/php8.5 artisan test                    # run phpunit tests

# Frontend
npm run dev                                     # Vite dev server with hot reload
npm run build                                   # production build → public/build/

# Local server
/usr/bin/php8.5 artisan serve                   # http://localhost:8000
```

That's the whole picture. Welcome to the project.
