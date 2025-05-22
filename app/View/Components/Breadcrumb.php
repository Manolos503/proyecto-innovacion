<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
     public string $firstItem;
    public array $items;
    public string $lastItem;

    /**
     * @param BreadCrumb[]|BreadCrumb $breadcrumbs
     * @param string $pageTitle
     */
     public function __construct(array|BreadCrumb $breadcrumbs = [], string $pageTitle = '')
    {
        $route = Route::current();
        $namespace = explode('.', $route->getName())[0] ?? '';

        // Simula el verbose_name (nombre del módulo)
        $this->firstItem = $namespace !== 'core' ? ucfirst($namespace) : '';

        // Asegura que sea un arreglo
        if ($breadcrumbs instanceof BreadCrumb) {
            $this->items = [$breadcrumbs];
        } else {
            $this->items = $breadcrumbs;
        }

        $this->lastItem = $pageTitle;
    }


    public function render()
    {
        return view('components.breadcrumb');
    }
}
