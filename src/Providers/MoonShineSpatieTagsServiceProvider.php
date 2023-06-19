<?php

declare(strict_types=1);

namespace Leeto\MoonShineSpatieTags\Providers;

use Illuminate\Support\ServiceProvider;

final class MoonShineSpatieTagsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'tag-list');
    }
}
