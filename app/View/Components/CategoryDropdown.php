<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category;
class CategoryDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-dropdown',[
            'categories' => Category::all(),
            'currentCat'=>Category::where('slug', request('category'))->first()
        ]);
    }
}
