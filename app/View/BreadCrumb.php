<?php

namespace App\View\Components;

class BreadCrumb
{
    public string $title;
    public ?string $url;

    public function __construct(string $title, ?string $url = null)
    {
        $this->title = $title;
        $this->url = $url;
    }
}
