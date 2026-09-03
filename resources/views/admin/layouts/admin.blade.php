<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') · MasterLube Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root { --ml-navy: #0c2f7a; --ml-navy-dark: #081f52; --ml-gold: #e8b23c; }
        body { background: #f4f6fb; }
        .admin-sidebar {
            width: 240px; min-height: 100vh; background: var(--ml-navy-dark); position: fixed; top: 0; left: 0;
            transition: margin-left .2s ease; z-index: 1030;
        }
        .admin-sidebar.collapsed { margin-left: -240px; }
        .admin-sidebar .navbar-brand { color: #fff; font-weight: 700; }
        .admin-sidebar .nav-link { color: rgba(255,255,255,.75); padding: .55rem 1rem; border-radius: .375rem; }
        .admin-sidebar .nav-link.active, .admin-sidebar .nav-link:hover { color: #fff; background: rgba(255,255,255,.08); }
        .admin-sidebar .nav-section { color: rgba(255,255,255,.4); text-transform: uppercase; font-size: .7rem; letter-spacing: .05em; margin: 1rem 1rem .25rem; }
        .admin-content { margin-left: 240px; transition: margin-left .2s ease; min-height: 100vh; }
        .admin-content.expanded { margin-left: 0; }
        .admin-topbar { background: #fff; border-bottom: 1px solid #e5e9f2; }
        @media (max-width: 991.98px) {
            .admin-sidebar { margin-left: -240px; }
            .admin-sidebar.show { margin-left: 0; }
            .admin-content { margin-left: 0; }
        }
        /* target the chevron arrow based on bootstrap's dropdown expansion state */
        .admin-sidebar .nav-link .bi-chevron-down {
            transition: transform 0.25s ease; /* smoothly animate the rotation */
        }

        /* rotate the chevron 180 degrees upward when the menu container opens */
        .admin-sidebar .nav-link:not(.collapsed) .bi-chevron-down {
            transform: rotate(180deg);
        }

    </style>
    @stack('styles')
</head>
<body>
    <div class="admin-sidebar" id="adminSidebar">
        <div class="d-flex align-items-center justify-content-between px-3 py-3 border-bottom border-secondary-subtle">
            <a href="{{ route('admin.dashboard') }}" class="navbar-brand mb-0">MasterLube</a>
        </div>
        
        <nav class="nav flex-column px-2 py-3" id="sidebarAccordion">
            <!-- Dashboard Link (No Sub-menu) -->
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2 me-2"></i>Dashboard
            </a>

            <!-- 1. Content Sub-menu -->
            <div class="nav-item">
                <a class="nav-link d-flex align-items-center justify-content-between collapsed" data-bs-toggle="collapse" href="#menuContent" role="button" aria-expanded="false" aria-controls="menuContent">
                    <span><i class="bi bi-file-earmark-text me-2"></i>Content</span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.pages.*') || request()->routeIs('admin.cms-pages.*') ? 'show' : '' }} ps-3" id="menuContent" data-bs-parent="#sidebarAccordion">
                    <a class="nav-link {{ request()->routeIs('admin.pages.landing.*') ? 'active' : '' }}" href="{{ route('admin.pages.landing.edit') }}">Landing (/)</a>
                    <a class="nav-link {{ request()->routeIs('admin.pages.home.*') ? 'active' : '' }}" href="{{ route('admin.pages.home.edit') }}">Home</a>
                    <a class="nav-link {{ request()->routeIs('admin.pages.about.*') ? 'active' : '' }}" href="{{ route('admin.pages.about.edit') }}">About</a>
                    <a class="nav-link {{ request()->routeIs('admin.pages.contact.*') ? 'active' : '' }}" href="{{ route('admin.pages.contact.edit') }}">Contact</a>
                    <a class="nav-link {{ request()->routeIs('admin.pages.systems.*') ? 'active' : '' }}" href="{{ route('admin.pages.systems.edit') }}">Systems</a>
                    <a class="nav-link {{ request()->routeIs('admin.pages.advantages.*') ? 'active' : '' }}" href="{{ route('admin.pages.advantages.edit') }}">Our Advantages</a>
                    <a class="nav-link {{ request()->routeIs('admin.pages.applications-hub.*') ? 'active' : '' }}" href="{{ route('admin.pages.applications-hub.edit') }}">Applications Hub</a>
                    <a class="nav-link {{ request()->routeIs('admin.pages.accessories.*') ? 'active' : '' }}" href="{{ route('admin.pages.accessories.edit') }}">Staff</a>
                    <a class="nav-link {{ request()->routeIs('admin.pages.custom-house.*') ? 'active' : '' }}" href="{{ route('admin.pages.custom-house.edit') }}">Custom Hose</a>
                    <a class="nav-link {{ request()->routeIs('admin.pages.prelube.*') ? 'active' : '' }}" href="{{ route('admin.pages.prelube.edit') }}">Prelube</a>
                    <a class="nav-link {{ request()->routeIs('admin.cms-pages.*') ? 'active' : '' }}" href="{{ route('admin.cms-pages.index') }}">CMS Pages</a>
                </div>
            </div>

            <!-- 2. Catalog & Apps Sub-menu -->
            <div class="nav-item">
                <a class="nav-link d-flex align-items-center justify-content-between collapsed" data-bs-toggle="collapse" href="#menuCatalog" role="button" aria-expanded="false" aria-controls="menuCatalog">
                    <span><i class="bi bi-box-seam me-2"></i>Catalog & Apps</span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.industries.*') || request()->routeIs('admin.accessories.*') ? 'show' : '' }} ps-3" id="menuCatalog" data-bs-parent="#sidebarAccordion">
                    <a class="nav-link {{ request()->routeIs('admin.industries.*') ? 'active' : '' }}" href="{{ route('admin.industries.index') }}">Industries</a>
                    <a class="nav-link {{ request()->routeIs('admin.accessories.*') ? 'active' : '' }}" href="{{ route('admin.accessories.index') }}">Accessories</a>
                </div>
            </div>

            <!-- 3. Leads & Testimonials Sub-menu -->
            <div class="nav-item">
                <a class="nav-link d-flex align-items-center justify-content-between collapsed" data-bs-toggle="collapse" href="#menuLeads" role="button" aria-expanded="false" aria-controls="menuLeads">
                    <span><i class="bi bi-chat-quote me-2"></i>Leads & Feedback</span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.testimonials.*') || request()->routeIs('admin.enquiries.*') ? 'show' : '' }} ps-3" id="menuLeads" data-bs-parent="#sidebarAccordion">
                    <a class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}" href="{{ route('admin.testimonials.index') }}">Testimonials</a>
                    <a class="nav-link {{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}" href="{{ route('admin.enquiries.index') }}">Enquiries</a>
                </div>
            </div>

            <!-- 4. Media & Marketing Sub-menu -->
            <div class="nav-item">
                <a class="nav-link d-flex align-items-center justify-content-between collapsed" data-bs-toggle="collapse" href="#menuMedia" role="button" aria-expanded="false" aria-controls="menuMedia">
                    <span><i class="bi bi-newspaper me-2"></i>Media & Links</span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.dealers.*') || request()->routeIs('admin.partner-links.*') || request()->routeIs('admin.magazines.*') || request()->routeIs('admin.news.*') ? 'show' : '' }} ps-3" id="menuMedia" data-bs-parent="#sidebarAccordion">
                    <a class="nav-link {{ request()->routeIs('admin.dealers.*') ? 'active' : '' }}" href="{{ route('admin.dealers.index') }}">Dealers</a>
                    <a class="nav-link {{ request()->routeIs('admin.partner-links.*') ? 'active' : '' }}" href="{{ route('admin.partner-links.index') }}">Partner Links</a>
                    <a class="nav-link {{ request()->routeIs('admin.magazines.*') ? 'active' : '' }}" href="{{ route('admin.magazines.index') }}">Magazines</a>
                    <a class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}" href="{{ route('admin.news.index') }}">News</a>
                </div>
            </div>

            <!-- 5. Galleries & Support Sub-menu -->
            <div class="nav-item">
                <a class="nav-link d-flex align-items-center justify-content-between collapsed" data-bs-toggle="collapse" href="#menuGalleries" role="button" aria-expanded="false" aria-controls="menuGalleries">
                    <span><i class="bi bi-images me-2"></i>Galleries & Info</span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.installs.*') || request()->routeIs('admin.car-club-events.*') || request()->routeIs('admin.faqs.*') ? 'show' : '' }} ps-3" id="menuGalleries" data-bs-parent="#sidebarAccordion">
                    <a class="nav-link {{ request()->routeIs('admin.installs.*') ? 'active' : '' }}" href="{{ route('admin.installs.index') }}">Install Gallery</a>
                    <a class="nav-link {{ request()->routeIs('admin.car-club-events.*') ? 'active' : '' }}" href="{{ route('admin.car-club-events.index') }}">Car Clubs</a>
                    <a class="nav-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}" href="{{ route('admin.faqs.index') }}">FAQs</a>
                </div>
            </div>

            <!-- 6. Management Sub-menu (Settings & Admins) -->
            <div class="nav-item">
                <a class="nav-link d-flex align-items-center justify-content-between collapsed" data-bs-toggle="collapse" href="#menuManagement" role="button" aria-expanded="false" aria-controls="menuManagement">
                    <span><i class="bi bi-sliders me-2"></i>System Settings</span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.settings.*') || request()->routeIs('admin.nav-items.*') || request()->routeIs('admin.users.*') ? 'show' : '' }} ps-3" id="menuManagement" data-bs-parent="#sidebarAccordion">
                    @can('manage-settings')
                        <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.edit') }}">Settings</a>
                    @endcan
                    <a class="nav-link {{ request()->routeIs('admin.nav-items.*') ? 'active' : '' }}" href="{{ route('admin.nav-items.index') }}">Navigation</a>
                    @can('manage-admins')
                        <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">Admin Users</a>
                    @endcan
                </div>
            </div>
        </nav>
    </div>


    <div class="admin-content" id="adminContent">
        <div class="admin-topbar d-flex align-items-center justify-content-between px-3 py-2">
            <button class="btn btn-outline-secondary btn-sm" id="sidebarToggle" type="button">
                <i class="bi bi-list"></i>
            </button>
            <div class="dropdown">
                <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    @if (auth()->user()?->avatar)
                        <img src="{{ media_url(auth()->user()->avatar) }}" class="rounded-circle me-1" style="width:20px;height:20px;object-fit:cover">
                    @else
                        <i class="bi bi-person-circle me-1"></i>
                    @endif
                    {{ auth()->user()?->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('admin.profile.edit') }}">My Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <main class="p-4">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('adminSidebar');
        document.getElementById('sidebarToggle')?.addEventListener('click', () => {
            if (window.innerWidth < 992) {
                sidebar.classList.toggle('show');
            } else {
                sidebar.classList.toggle('collapsed');
                document.getElementById('adminContent').classList.toggle('expanded');
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
