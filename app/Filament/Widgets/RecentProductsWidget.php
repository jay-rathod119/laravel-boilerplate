<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\ProductResource;
use App\Models\Product;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentProductsWidget extends BaseWidget
{
    protected static ?int $sort = -5;

    protected int | string | array $columnSpan = 'full';

    protected static bool $isLazy = true;

    public static function canView(): bool
    {
        $user = auth()->user();

        return $user instanceof \App\Models\User && $user->isAdmin();
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading('Recently added products')
            ->description('Latest catalog updates — open a row to edit.')
            ->query(
                Product::query()->latest()->limit(8),
            )
            ->paginated(false)
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->limit(40),
                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU')
                    ->badge()
                    ->color('gray'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Added')
                    ->formatStateUsing(fn ($state) => $state?->timezone(config('app.timezone'))->format('M j, Y · g:i A')),
            ])
            ->recordUrl(fn (Product $record): string => ProductResource::getUrl('edit', ['record' => $record]))
            ->actions([
                Tables\Actions\Action::make('edit')
                    ->label('Edit')
                    ->icon('heroicon-m-pencil-square')
                    ->url(fn (Product $record): string => ProductResource::getUrl('edit', ['record' => $record])),
            ])
            ->headerActions([
                Tables\Actions\Action::make('viewAll')
                    ->label('View all products')
                    ->icon('heroicon-m-arrow-top-right-on-square')
                    ->url(ProductResource::getUrl('index'))
                    ->color('gray'),
                Tables\Actions\Action::make('create')
                    ->label('New product')
                    ->icon('heroicon-m-plus')
                    ->url(ProductResource::getUrl('create'))
                    ->color('primary'),
            ]);
    }
}
