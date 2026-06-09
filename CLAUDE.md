# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

A multi-vendor marketplace being built on Laravel 13 + PHP 8.5. Three roles (Admin, Vendor, Customer) selected at registration. Architecture is **MVC + Service Layer**: controllers stay thin, business logic lives in `app/Services/*`.

Current state is **scaffolding + admin UI shell**. Schema, models, enums, route groups, middleware, an admin seeder, **and the full Bootstrap admin UI layout** are in place. No business logic is wired — controllers just render views with dummy data.

## Stack

- Laravel 13.14, PHP 8.5 (composer.json constrains `php: ^8.5`)
- Auth: Laravel Breeze (auth controllers only — views were replaced)
- DB: SQLite by default (`database/database.sqlite`). Legacy MySQL config in `.env.legacy`.
- Frontend: **Bootstrap 5.3.8** + SCSS + Vite. Tabler icons (`ti ti-*`). ApexCharts for charts. Bundled from the InApp Inventory Dashboard template.

## Commands

```bash
# Always invoke PHP 8.5 explicitly — system default `php` is 8.3
/usr/bin/php8.5 artisan migrate:fresh --seed   # rebuild DB + seed admin
/usr/bin/php8.5 artisan serve                  # http://localhost:8000
/usr/bin/php8.5 artisan route:list
/usr/bin/php8.5 artisan tinker
./vendor/bin/pint                              # PHP formatter
/usr/bin/php8.5 artisan test                   # phpunit
npm run dev                                    # Vite dev server (HMR)
npm run build                                  # production build → public/build/
```

Admin login: `admin@incomeone.test` / `password`.

## L13 skeleton notes

L13 is structurally different from L10:

- **No `app/Http/Kernel.php`** — middleware aliases in `bootstrap/app.php` under `->withMiddleware(...)`.
- **No `app/Console/Kernel.php`** — schedule/commands in `routes/console.php`.
- **No `RouteServiceProvider`** — routing wired in `bootstrap/app.php` via `->withRouting(...)`.
- **`users`, `password_reset_tokens`, `sessions`** in the single `0001_01_01_000000_create_users_table.php` migration.
- **Models use PHP attributes** (`#[Fillable([...])]`, `#[Hidden([...])]`) instead of `$fillable` / `$hidden` properties. Match this style.
- **No `routes/api.php` by default.** Run `php artisan install:api` if needed.
- **Sessions, queue, and cache default to the `database` driver.**

## Frontend (Bootstrap admin UI)

All Tailwind has been ripped out. The frontend is now Bootstrap-only, sourced from the **InApp Inventory Dashboard** template that lived in `template/` (folder has been removed; assets moved into Laravel).

### Asset layout

```
resources/
├── scss/
│   ├── app.scss              ← single Vite entry, `@use "style"`
│   ├── style.scss            ← imports Tabler icons, Bootstrap, custom
│   ├── _variables.scss       ← Bootstrap variable overrides
│   ├── _custom.scss
│   ├── _avatar.scss, _border.scss, _button.scss, _icon-shape.scss, _utilities.scss
└── js/
    ├── app.js                ← imports bootstrap + admin scripts
    └── admin/
        ├── sidebar.js        ← topbar/sidebar toggle + active-link logic
        └── chart.js          ← ApexCharts init (null-checks DOM IDs, safe on any page)

public/
└── assets/
    └── images/               ← template logo, favicon, product/avatar dummies
```

The Vite entry points are `resources/scss/app.scss` and `resources/js/app.js` (set in `vite.config.js`). Pages load assets via `@vite(['resources/scss/app.scss', 'resources/js/app.js'])`.

### Blade layouts and components

```
resources/views/
├── layouts/
│   ├── admin.blade.php       ← topbar + sidebar + @yield('content') — all dashboard pages
│   └── auth.blade.php        ← centered card — login/register/etc.
│
├── components/
│   ├── admin/
│   │   ├── topbar.blade.php  ← bell dropdown (dummy) + profile menu (real user)
│   │   ├── sidebar.blade.php ← role-aware nav: switches on auth()->user()->role
│   │   └── footer.blade.php
│   ├── stat-card.blade.php   ← <x-stat-card title value trend icon color/>
│   ├── card.blade.php        ← <x-card title>slot</x-card> with optional :actions slot
│   ├── data-table.blade.php  ← <x-data-table :columns>tbody slot</x-data-table>
│   ├── alert.blade.php       ← <x-alert type="success|danger|warning|info">
│   └── form/
│       ├── input.blade.php   ← <x-form.input name label type value required>
│       ├── textarea.blade.php
│       ├── select.blade.php  ← <x-form.select :options=[value=>label]>
│       └── file.blade.php
│
├── auth/                     ← login, register (with role radio), forgot-password,
│                                reset-password, verify-email, confirm-password
├── profile/                  ← edit + partials/, all Bootstrap
├── admin/dashboard.blade.php ← stats + ApexChart + recent orders, all dummy
├── vendor/dashboard.blade.php
├── customer/dashboard.blade.php
├── errors/404.blade.php
└── welcome.blade.php         ← public landing
```

All form components read `$errors->first($name)` and `old($name)` automatically.

### Important gotcha

**Do NOT create `public/admin/` again.** When the user runs `php artisan serve`, PHP's built-in server intercepts `/admin` if a directory exists at that path and returns its own 404 instead of routing through Laravel. That's why template assets live under `public/assets/`, not `public/admin/`.

## Domain model (relationships, soft deletes everywhere)

```
User (role enum: admin|vendor|customer)
  ├─ hasOne Vendor, hasMany Address, hasOne Cart, hasMany Order (as customer)
Vendor (status enum)        — belongsTo User, hasMany Product, hasMany OrderItem
Category                    — self-ref tree via parent_id, hasMany Product
Product                     — belongsTo Vendor, Category; hasMany ProductImage, CartItem, OrderItem
Cart → CartItems            — one active cart per user; unique cart_id+product_id
Order (status + payment_status enums)
  ├─ belongsTo User (customer), Address (shipping)
  ├─ hasMany OrderItem, hasOne Payment
OrderItem                   — belongsTo Order, Product, Vendor; carries name/price snapshots
                              so price/name changes never retroactively edit historical orders
Payment                     — belongsTo Order
```

All 11 models use `SoftDeletes`. FK on-delete behavior: `cascade` for ownership (vendor's products), `set null` for references that should outlive the parent (orders.shipping_address_id, order_items.product_id).

## Routes

| Prefix | Middleware | Controllers under | Status |
|---|---|---|---|
| `/` | (public) | `Shop\HomeController@index` | wired |
| `/dashboard` | `auth, verified` | closure — redirects to role-specific dashboard | wired |
| `/admin` | `auth, role:admin` | `Admin\DashboardController@index` | only dashboard wired |
| `/vendor` | `auth, role:vendor, vendor.approved` | `Vendor\DashboardController@index` | only dashboard wired |
| `/account` | `auth, role:customer` | `Customer\DashboardController@index` | only dashboard wired |

`role` and `vendor.approved` middleware aliases registered in `bootstrap/app.php`.

## Folder map

```
app/
├── Enums/                  UserRole, VendorStatus, OrderStatus, PaymentStatus, FulfillmentStatus
├── Http/
│   ├── Controllers/
│   │   ├── Admin/          DashboardController (wired); Product/Category/Vendor/OrderController (empty)
│   │   ├── Vendor/         DashboardController (wired); Product/OrderController (empty)
│   │   ├── Customer/       DashboardController (wired); Cart/Checkout/OrderController (empty)
│   │   ├── Shop/           HomeController (wired); Product/CategoryController (empty)
│   │   ├── Auth/           Breeze-generated, unmodified
│   │   ├── Controller.php  base
│   │   └── ProfileController.php
│   ├── Middleware/         EnsureUserHasRole, EnsureVendorApproved
│   └── Requests/           ProfileUpdateRequest (from Breeze)
├── Models/                 11 models, all with SoftDeletes
├── Policies/               (empty) ProductPolicy, OrderPolicy, VendorPolicy
└── Services/               (empty) Auth, Vendor, Product, Category, Cart, Order, Payment
```

## What's intentionally NOT here yet

- Auth flow business logic — the register form has a role radio but `RegisteredUserController` doesn't read it yet; everyone registers as `customer` (the column default).
- Controller method bodies beyond the dashboards' `index()` view renders.
- Service methods, policy logic, form requests for marketplace flows.
- Real data anywhere — every dashboard renders hard-coded dummy stats and tables.
- Real payment gateway — `payments.gateway` defaults to `'stub'`.
- Tests beyond Breeze's defaults in `tests/`.

When implementing features, work through phases as discussed: auth + role-aware registration → admin/vendor product management → storefront + cart + checkout → vendor order fulfillment.
