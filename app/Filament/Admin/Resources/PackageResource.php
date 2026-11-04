<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PackageResource\Pages;
use App\Models\Package;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationLabel = 'باقات الرحلات';
    protected static ?string $modelLabel = 'باقة رحلة';
    protected static ?string $pluralModelLabel = 'باقات الرحلات';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('معلومات الباقة الأساسية')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('اسم الباقة')
                            ->placeholder('مثال: رحلة الغروب الملكية')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('price')
                            ->label('السعر المقترح')
                            ->prefix('ج.م')
                            ->numeric()
                            ->required(),

                        TextInput::make('duration')
                            ->label('مدة الرحلة')
                            ->placeholder('مثال: ساعتان إبحار')
                            ->required(),

                        TextInput::make('sort_order')
                            ->label('ترتيب الظهور')
                            ->numeric()
                            ->default(0),

                        Textarea::make('description')
                            ->label('وصف الباقة')
                            ->placeholder('نبذة سريعة توضح تجربة الرحلة...')
                            ->rows(3)
                            ->columnSpanFull(),

                        TagsInput::make('features')
                            ->label('مميزات الباقة')
                            ->placeholder('اكتب الميزة واضغط Enter (مثال: مشروبات ضيافة، ساوند سيستم)')
                            ->columnSpanFull(),
                    ]),

                Section::make('الصورة والحالة')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('image')
                            ->label('صورة الباقة')
                            ->image()
                            ->directory('packages')
                            ->imageEditor()
                            ->columnSpanFull(),

                        Toggle::make('is_featured')
                            ->label('تمييز كـ (الأكثر طلباً / VIP)')
                            ->helperText('سيظهر شريط ذهبي مميز فوق كارت الباقة في الموقع')
                            ->default(false),

                        Toggle::make('is_active')
                            ->label('مفعلة في الموقع')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('الصورة')
                    ->circular(),

                Tables\Columns\TextColumn::make('title')
                    ->label('اسم الباقة')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('price')
                    ->label('السعر')
                    ->money('EGP')
                    ->sortable(),

                Tables\Columns\TextColumn::make('duration')
                    ->label('المدة'),

                Tables\Columns\IconColumn::make('is_featured')
                    ->label('الأكثر طلباً')
                    ->boolean(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('الحالة')
                    ->boolean(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('الترتيب')
                    ->sortable(),
            ])
            ->defaultSort('sort_order', 'asc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('المفعلة فقط'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('تعديل'),
                Tables\Actions\DeleteAction::make()->label('حذف'),
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
            'index'  => Pages\ListPackages::route('/'),
            'create' => Pages\CreatePackage::route('/create'),
            'edit'   => Pages\EditPackage::route('/{record}/edit'),
        ];
    }
}
