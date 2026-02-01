<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

// أهم الـ Imports اللي لازم تكون موجودة
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput; 
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth'; // غيرت الأيقونة لشكل الترس (أشيك للـ Settings)

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // تأكد من وجود Tabs::make
                Tabs::make('Site Settings')
                    ->tabs([
                        Tabs\Tab::make('الرئيسية')
                            ->icon('heroicon-m-home') // أيقونة للتاب
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

                        Tabs\Tab::make('عن اليخت')
                        ->icon('heroicon-m-information-circle')
                        ->schema([
                            // حقل جديد خاص بسلايدر "عن اليخت" فقط
                            FileUpload::make('about_image') 
                                ->label('صور سلايدر (عن اليخت)')
                                ->multiple() // عشان يرفع كذا صورة
                                ->image()
                                ->directory('about')
                                ->reorderable()
                                ->appendFiles()
                                ->imageEditor(),
                                
                            Textarea::make('about_text')
                                ->label('نص التعريف')
                                ->rows(5),
                        ]),

                        Tabs\Tab::make('معرض الرحلات')
                            ->icon('heroicon-m-photo')
                            ->schema([
                                FileUpload::make('trips_images')
                                    ->label('صور ألبوم الرحلات')
                                    ->multiple()
                                    ->image()
                                    ->directory('trips')
                                    ->reorderable()
                                    ->appendFiles() // مهم: بيخليك تضيف صور جديدة على القديمة بدل ما يمسح كله
                                    ->deletable(),
                            ]),
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('hero_image')->label('صورة الهيرو'),
                Tables\Columns\TextColumn::make('hero_title')->label('العنوان الرئيسي')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('آخر تحديث')->dateTime()->sortable(),
            ])
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
            'index' => Pages\ListSiteSettings::route('/'),
            'create' => Pages\CreateSiteSetting::route('/create'),
            'edit' => Pages\EditSiteSetting::route('/{record}/edit'),
        ];
    }
}