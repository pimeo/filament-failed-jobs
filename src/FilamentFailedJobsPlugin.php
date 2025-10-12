<?php

namespace BinaryBuilds\FilamentFailedJobs;

use BinaryBuilds\FilamentFailedJobs\Resources\FailedJobs\FailedJobResource;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Tables\Enums\FiltersLayout;

class FilamentFailedJobsPlugin implements Plugin
{
    public bool $horizon = false;

    public bool $hideConnectionOnIndex = false;

    public bool $hideQueueOnIndex = false;

    public FiltersLayout $filtersLayout = FiltersLayout::Dropdown;

    public function getId(): string
    {
        return 'failed-jobs';
    }

    public function usingHorizon(bool $horizon = true): FilamentFailedJobsPlugin
    {
        $this->horizon = $horizon;

        return $this;
    }

    public function isUsingHorizon(): bool
    {
        return $this->horizon;
    }

    public function hideConnectionOnIndex(bool $hideConnectionOnIndex = true): FilamentFailedJobsPlugin
    {
        $this->hideConnectionOnIndex = $hideConnectionOnIndex;

        return $this;
    }

    public function hideQueueOnIndex(bool $hideQueueOnIndex = true): FilamentFailedJobsPlugin
    {
        $this->hideQueueOnIndex = $hideQueueOnIndex;

        return $this;
    }

    public function filtersLayout(FiltersLayout $layout): FilamentFailedJobsPlugin
    {
        $this->filtersLayout = $layout;

        return $this;
    }

    public function getFiltersLayout(): FiltersLayout
    {
        return $this->filtersLayout;
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            FailedJobResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
