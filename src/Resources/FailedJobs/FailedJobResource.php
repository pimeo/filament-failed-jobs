<?php

namespace BinaryBuilds\FilamentFailedJobs\Resources\FailedJobs;

use BackedEnum;
use BinaryBuilds\FilamentFailedJobs\Models\FailedJob;
use BinaryBuilds\FilamentFailedJobs\Resources\FailedJobs\Pages\ListFailedJobs;
use BinaryBuilds\FilamentFailedJobs\Resources\FailedJobs\Pages\ViewFailedJob;
use BinaryBuilds\FilamentFailedJobs\Resources\FailedJobs\Schemas\FailedJobInfolist;
use BinaryBuilds\FilamentFailedJobs\Resources\FailedJobs\Tables\FailedJobsTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FailedJobResource extends Resource
{
    protected static ?string $model = FailedJob::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::QueueList;

    public static function infolist(Schema $schema): Schema
    {
        return FailedJobInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FailedJobsTable::configure($table)
            ->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFailedJobs::route('/'),
            'view' => ViewFailedJob::route('/{record}'),
        ];
    }
}
