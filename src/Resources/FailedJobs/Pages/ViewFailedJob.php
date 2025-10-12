<?php

namespace BinaryBuilds\FilamentFailedJobs\Resources\FailedJobs\Pages;

use Filament\Resources\Pages\ViewRecord;
use BinaryBuilds\FilamentFailedJobs\Actions\DeleteJobAction;
use BinaryBuilds\FilamentFailedJobs\Actions\RetryJobAction;
use BinaryBuilds\FilamentFailedJobs\Resources\FailedJobs\FailedJobResource;

class ViewFailedJob extends ViewRecord
{
    protected static string $resource = FailedJobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            RetryJobAction::make()->successRedirectUrl($this->getResourceUrl('index')),
            DeleteJobAction::make()->successRedirectUrl($this->getResourceUrl('index')),
        ];
    }
}
