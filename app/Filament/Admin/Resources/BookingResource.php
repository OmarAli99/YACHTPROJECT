<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BookingResource\Pages;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
// السطر اللي تحت ده كان ناقصه كلمة Filament في الأول
use Filament\Forms\Components\TextInput; 
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // دلوقتي TextInput دي مش هتعمل أحمر
                TextInput::make('customer_name')
                    ->label('اسم العميل')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('customer_phone')
                    ->label('رقم التليفون')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                
                // استخدمت لك Select بدل TextInput عشان يختار (صباحاً/عصراً)
                Forms\Components\Select::make('trip_time')
                    ->label('توقيت الرحلة')
                    ->options([
                        'morning' => 'صباحاً',
                        'afternoon' => 'عصراً',
                        'night' => 'ليلاً',
                        'full_day' => 'اليوم كله',
                    ])
                    ->required(),

                DatePicker::make('trip_date')
                    ->label('تاريخ الرحلة')
                    ->required(),
                Forms\Components\Select::make('status')
                ->label('حالة الحجز')
                ->options([
                    'pending' => 'قيد الانتظار',
                    'confirmed' => 'تم التأكيد',
                    'cancelled' => 'ملغي',
                ])
                ->default('pending')
                ->required(),

                Textarea::make('notes')
                    ->label('ملاحظات')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer_name')
                    ->label('الاسم')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_phone')
                    ->label('الهاتف')
                    ->searchable(),
                Tables\Columns\TextColumn::make('trip_time')
                    ->label('التوقيت')
                    ->badge(),
                Tables\Columns\TextColumn::make('trip_date')
                    ->label('التاريخ')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                ->label('الحالة')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',   // برتقالي
                    'confirmed' => 'success', // أخضر
                    'cancelled' => 'danger',  // أحمر
                    default => 'gray',
                })
                ->formatStateUsing(fn (string $state) => match ($state) {
                    'pending' => 'قيد الانتظار',
                    'confirmed' => 'تم التأكيد',
                    'cancelled' => 'ملغي',
                }),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}