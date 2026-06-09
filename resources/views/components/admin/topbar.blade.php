@php
    $user = auth()->user();
@endphp
<nav id="topbar" class="navbar bg-white border-bottom fixed-top topbar px-3">
    <button id="toggleBtn" class="d-none d-lg-inline-flex btn btn-light btn-icon btn-sm">
        <i class="ti ti-layout-sidebar-left-expand"></i>
    </button>
    <button id="mobileBtn" class="btn btn-light btn-icon btn-sm d-lg-none me-2">
        <i class="ti ti-layout-sidebar-left-expand"></i>
    </button>

    <div>
        <ul class="list-unstyled d-flex align-items-center mb-0 gap-1">
            {{-- Notifications (dummy) --}}
            <li>
                <a class="position-relative btn-icon btn-sm btn-light btn rounded-circle"
                    data-bs-toggle="dropdown" aria-expanded="false" href="#" role="button">
                    <i class="ti ti-bell"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-2 ms-n2">
                        2
                        <span class="visually-hidden">unread</span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-0" style="min-width: 320px;">
                    <ul class="list-unstyled p-0 m-0">
                        <li class="p-3 border-bottom">
                            <div class="d-flex gap-3">
                                <div class="icon-shape icon-md bg-primary bg-opacity-10 text-primary rounded-circle">
                                    <i class="ti ti-shopping-cart"></i>
                                </div>
                                <div class="flex-grow-1 small">
                                    <p class="mb-0 fw-medium">New order received</p>
                                    <p class="mb-1 text-muted">Order #12345 has been placed</p>
                                    <div class="text-secondary">5 minutes ago</div>
                                </div>
                            </div>
                        </li>
                        <li class="p-3 border-bottom">
                            <div class="d-flex gap-3">
                                <div class="icon-shape icon-md bg-success bg-opacity-10 text-success rounded-circle">
                                    <i class="ti ti-user-plus"></i>
                                </div>
                                <div class="flex-grow-1 small">
                                    <p class="mb-0 fw-medium">New user registered</p>
                                    <p class="mb-1 text-muted">john_doe just signed up</p>
                                    <div class="text-secondary">30 minutes ago</div>
                                </div>
                            </div>
                        </li>
                        <li class="px-4 py-3 text-center">
                            <a href="#" class="text-primary small">View all notifications</a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Profile menu --}}
            <li class="ms-3 dropdown">
                <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="avatar avatar-sm rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center">
                        {{ strtoupper(substr($user?->name ?? 'U', 0, 1)) }}
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end p-0" style="min-width: 220px;">
                    <div class="border-dashed border-bottom px-3 py-3">
                        <h4 class="mb-0 small">{{ $user?->name }}</h4>
                        <p class="mb-0 small text-muted">{{ $user?->email }}</p>
                        <span class="badge bg-secondary mt-2">{{ ucfirst($user?->role?->value ?? '') }}</span>
                    </div>
                    <div class="p-2 d-flex flex-column small">
                        <a href="{{ route('profile.edit') }}" class="dropdown-item rounded">
                            <i class="ti ti-user me-2"></i>Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item rounded text-danger">
                                <i class="ti ti-logout me-2"></i>Log out
                            </button>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
