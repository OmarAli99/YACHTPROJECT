<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput; 
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'إعدادات الموقع والهوية';
    protected static ?string $modelLabel = 'إعدادات الموقع';
    protected static ?string $pluralModelLabel = 'إعدادات الموقع';
    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Site Settings')
                    ->tabs([
                        // 1. تاب هوية اليخت واللوجو
                        Tabs\Tab::make('الهوية والشعار')
                            ->icon('heroicon-m-identification')
                            ->schema([
                                TextInput::make('site_name')
                                    ->label('اسم اليخت / الموقع')
                                    ->placeholder('مثال: YACHT LUXURY أو يخت النيل الملكي')
                                    ->maxLength(255),

                                TextInput::make('site_subtitle')
                                    ->label('الوصف الفرعي للشعار')
                                    ->placeholder('مثال: Royal Nile Cruise أو رحلات نيلية خاصة')
                                    ->maxLength(255),

                                FileUpload::make('logo')
                                    ->label('لوجو اليخت (Navbar Logo)')
                                    ->disk('public')
                                    ->image()
                                    ->directory('settings')
                                    ->openable()
                                    ->downloadable()
                                    ->helperText('يظهر في القائمة العلوية بجانب الاسم. اضغط على (×) لحذف القديم واستبداله.'),

                                FileUpload::make('favicon')
                                    ->label('أيقونة المتصفح (Favicon)')
                                    ->disk('public')
                                    ->image()
                                    ->directory('settings')
                                    ->openable()
                                    ->downloadable()
                                    ->helperText('الأيقونة الصغيرة التي تظهر في شريط المتصفح بجانب الرابط'),
                            ]),

                        // 2. التاب الرئيسية
                        Tabs\Tab::make('الرئيسية')
                            ->icon('heroicon-m-home')
                            ->schema([
                                FileUpload::make('hero_image')
                                    ->label('صورة الصفحة الرئيسية (Hero)')
                                    ->disk('public')
                                    ->image()
                                    ->directory('hero')
                                    ->openable()
                                    ->downloadable()
                                    ->helperText('لتغيير الصورة: اضغط على علامة الحذف (×) على الصورة القديمة أولاً ثم اختر الصورة الجديدة.'),

                                TextInput::make('hero_title')
                                    ->label('العنوان الرئيسي'),
                            ]),

                        // 3. تاب عن اليخت
                        Tabs\Tab::make('عن اليخت')
                            ->icon('heroicon-m-information-circle')
                            ->schema([
                                FileUpload::make('about_image') 
                                    ->label('صور تعريفية عن اليخت')
                                    ->multiple()
                                    ->disk('public')
                                    ->image()
                                    ->directory('about')
                                    ->reorderable()
                                    ->openable()
                                    ->downloadable()
                                    ->helperText('يمكنك رفع أكثر من صورة لتظهر كسلايدر متحرك في قسم عن اليخت'),
                                
                                Textarea::make('about_text')
                                    ->label('نص التعريف')
                                    ->rows(5),
                            ]),

                        // 4. تاب معرض الصور العام
                        Tabs\Tab::make('معرض الصور')
                            ->icon('heroicon-m-photo')
                            ->schema([
                                FileUpload::make('trips_images')
                                    ->label('صور ألبوم الرحلات العام')
                                    ->multiple()
                                    ->disk('public')
                                    ->image()
                                    ->directory('trips')
                                    ->reorderable()
                                    ->appendFiles()
                                    ->deletable()
                                    ->openable()
                                    ->downloadable(),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label('اللوجو')
                    ->circular(),
                Tables\Columns\TextColumn::make('site_name')
                    ->label('اسم اليخت')
                    ->searchable(),
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