<?php

namespace App\View\Components\Layout;

use App\Models\NavItem;
use Illuminate\View\Component;
use Illuminate\View\View;

class Header extends Component
{
    public function render(): View
    {
        $items = NavItem::with('children')
            ->where('menu', 'header')
            ->whereNull('parent_id')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('components.layout.header', ['items' => $items]);
    }
}
