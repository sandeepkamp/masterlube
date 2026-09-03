@php
    $logo = media_url(\App\Models\Setting::get('logo_path'));

    // The "Home" nav item links to the landing page, but /home is also considered
    // part of "Home" for active-state purposes, so the two routes are aliased here.
    $navRouteAliases = ['landing' => ['home'], 'home' => ['landing']];

    $isNavItemActive = function ($navItem) use ($navRouteAliases) {
        if ($navItem->route_name && \Illuminate\Support\Facades\Route::has($navItem->route_name)) {
            $routeNames = [$navItem->route_name, ...($navRouteAliases[$navItem->route_name] ?? [])];

            return request()->routeIs(...$routeNames);
        }

        if (! $navItem->url || $navItem->url === '#' || str_starts_with($navItem->url, 'http')) {
            return false;
        }

        // Compare the stored relative path directly against request()->path(), rather than
        // resolving it to an absolute URL first — resolvedUrl() runs it through the url()
        // helper, which prefixes APP_URL and can disagree with request()->path() on hosts
        // where the app lives behind a stripped subdirectory (e.g. a reverse-proxied path).
        return trim(parse_url($navItem->url, PHP_URL_PATH) ?? '', '/') === trim(request()->path(), '/');
    };

    $isNavItemOrChildActive = function ($navItem) use ($isNavItemActive) {
        if ($isNavItemActive($navItem)) {
            return true;
        }

        foreach ($navItem->children as $child) {
            if ($isNavItemActive($child)) {
                return true;
            }
        }

        return false;
    };
@endphp

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ $logo }}" class="img-fluid" style="height: 85px; width: auto; max-width: 340px; object-fit: contain;" alt="MasterLube">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    @foreach ($items as $item)
                        @if ($item->children->isEmpty())
                            <li class="nav-item">
                                <a class="nav-link {{ $isNavItemActive($item) ? 'active' : '' }}" href="{{ $item->resolvedUrl() }}">{{ $item->label }}</a>
                            </li>
                        @elseif ($item->label === 'Applications')
                            {{-- Split dropdown: the label navigates, the caret toggles the submenu --}}
                            <li class="nav-item dropdown d-flex align-items-center">
                                <a class="nav-link js-applications-toggle {{ $isNavItemOrChildActive($item) ? 'active' : '' }}" href="{{ $item->resolvedUrl() }}">{{ $item->label }}</a>
                                <a class="nav-link dropdown-toggle dropdown-caret-only" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Toggle {{ $item->label }} submenu"></a>
                                <ul class="dropdown-menu">
                                    @foreach ($item->children as $child)
                                        <li><a class="dropdown-item" href="{{ $child->resolvedUrl() }}">{{ $child->label }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @elseif (in_array($item->label, ['Testimonials', 'Contact']))
                            {{-- Split dropdown: the label navigates, the caret toggles the submenu --}}
                            <li class="nav-item dropdown d-flex align-items-center">
                                <a class="nav-link {{ $isNavItemOrChildActive($item) ? 'active' : '' }}" href="{{ $item->resolvedUrl() }}">{{ $item->label }}</a>
                                <a class="nav-link dropdown-toggle dropdown-caret-only" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Toggle {{ $item->label }} submenu"></a>
                                <ul class="dropdown-menu">
                                    @foreach ($item->children as $child)
                                        <li><a class="dropdown-item" href="{{ $child->resolvedUrl() }}">{{ $child->label }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            {{-- Toggle-only dropdown (Questions, Custom House, Car Clubs) --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ $isNavItemOrChildActive($item) ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $item->label }}
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach ($item->children as $child)
                                        <li><a class="dropdown-item" href="{{ $child->resolvedUrl() }}">{{ $child->label }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                </ul>

                <a href="{{ route('contact.show') }}" class="btn btn-navy-pill d-none d-lg-inline-block">Contact Us</a>
            </div>
        </div>
    </nav>
</header>
