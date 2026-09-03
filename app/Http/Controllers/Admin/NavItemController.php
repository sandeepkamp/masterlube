<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class NavItemController extends Controller
{
    private const MENUS = ['header', 'footer_products', 'footer_company', 'footer_connect'];

    public function index(): View
    {
        $items = NavItem::with('allChildren')
            ->whereNull('parent_id')
            ->orderBy('menu')
            ->orderBy('order')
            ->get()
            ->groupBy('menu');

        return view('admin.nav-items.index', ['items' => $items, 'menus' => self::MENUS]);
    }

    public function create(): View
    {
        return view('admin.nav-items.form', [
            'navItem' => new NavItem,
            'menus' => self::MENUS,
            'parents' => NavItem::whereNull('parent_id')->orderBy('menu')->orderBy('order')->get(),
            'routeNames' => $this->routeNames(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        NavItem::create($this->validated($request));

        return redirect()->route('admin.nav-items.index')->with('success', 'Navigation item created.');
    }

    public function edit(NavItem $navItem): View
    {
        return view('admin.nav-items.form', [
            'navItem' => $navItem,
            'menus' => self::MENUS,
            'parents' => NavItem::whereNull('parent_id')->where('id', '!=', $navItem->id)->orderBy('menu')->orderBy('order')->get(),
            'routeNames' => $this->routeNames(),
        ]);
    }

    public function update(Request $request, NavItem $navItem): RedirectResponse
    {
        $navItem->update($this->validated($request, $navItem));

        return redirect()->route('admin.nav-items.index')->with('success', 'Navigation item updated.');
    }

    public function destroy(NavItem $navItem): RedirectResponse
    {
        $navItem->delete();

        return redirect()->route('admin.nav-items.index')->with('success', 'Navigation item deleted (including any submenu items).');
    }

    private function validated(Request $request, ?NavItem $navItem = null): array
    {
        $data = $request->validate([
            'menu' => ['required', 'in:'.implode(',', self::MENUS)],
            'parent_id' => ['nullable', 'integer', 'exists:nav_items,id'],
            'label' => ['required', 'string', 'max:255'],
            'url' => ['nullable', 'string', 'max:255'],
            'route_name' => ['nullable', 'string', 'max:255'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $data['order'] = $data['order'] ?? 0;

        return $data;
    }

    private function routeNames(): array
    {
        return collect(Route::getRoutes())
            ->map(fn ($route) => $route->getName())
            ->filter(fn ($name) => $name && ! str_starts_with($name, 'admin.'))
            ->unique()
            ->sort()
            ->values()
            ->all();
    }
}
