<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

// الـ Imports المطلوبة
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput; 
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Page Setting';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Site Settings')
                    ->tabs([
                        // 1. التاب الرئيسية
                        Tabs\Tab::make('الرئيسية')
                            ->icon('heroicon-m-home')
                            ->schema([
                                FileUpload::make('hero_image')
                                    ->label('صورة الصفحة الرئيسية')
                                    ->image()
                                    ->directory('hero')
                                    ->imageEditor(),
                                TextInput::make('hero_title')
                                    ->label('العنوان الرئيسي')
                                    ->required(),
                            ]),

                        // 2. تاب عن اليخت
                        Tabs\Tab::make('عن اليخت')
                            ->icon('heroicon-m-information-circle')
                            ->schema([
                                FileUpload::make('about_image') 
                                    ->label('صورة تعريفية واحدة')
                                    ->multiple()
                                    ->image() // تم حذف multiple بناءً على طلبك السابق
                                    ->directory('about')
                                    ->imageEditor(),
                                
                                Textarea::make('about_text')
                                    ->label('نص التعريف')
                                    ->rows(5),
                            ]),

                        // 3. تاب معرض الصور العام
                        Tabs\Tab::make('معرض الصور')
                            ->icon('heroicon-m-photo')
                            ->schema([
                                FileUpload::make('trips_images')
                                    ->label('صور ألبوم الرحلات العام')
                                    ->multiple()
                                    ->image()
                                    ->directory('trips')
                                    ->reorderable()
                                    ->appendFiles()
                                    ->deletable(),
                            ]),
                    ])->columnSpanFull(), // هذا يضمن ظهور التابات بعرض الصفحة
            ]); // هنا كان الخطأ (نقص إغلاق القوس والفاصلة المنقوطة)
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('hero_image')
                    ->label('الصورة الرئيسية'),
                Tables\Columns\TextColumn::make('hero_title')
                    ->label('العنوان')
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('آخر تحديث')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('تعديل'),
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
            'index' => Pages\ListSiteSettings::route('/'),
            'create' => Pages\CreateSiteSetting::route('/create'),
            'edit' => Pages\EditSiteSetting::route('/{record}/edit'),
        ];
    }
}