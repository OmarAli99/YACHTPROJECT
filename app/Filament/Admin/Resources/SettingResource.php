<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SettingResource\Pages;
use App\Filament\Admin\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model =Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
protected static ?string $navigationLabel = 'Footer Setting'; // الاسم في القائمة
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Forms\Components\Section::make('المعلومات الأساسية')
                ->schema([
                    Forms\Components\TextInput::make('title')->label('اسم اليخت'),
                    Forms\Components\Textarea::make('description')->label('وصف الفوتر'),
                ]),
            Forms\Components\Section::make('بيانات الاتصال')
                ->schema([
                    Forms\Components\TextInput::make('address')->label('العنوان'),
                    Forms\Components\TextInput::make('phone')->label('رقم الهاتف'),
                    Forms\Components\TextInput::make('email')->label('البريد الإلكتروني'),
                ])->columns(3),
            Forms\Components\Section::make('روابط التواصل الاجتماعي')
                ->schema([
                    Forms\Components\TextInput::make('facebook')->url(),
                    Forms\Components\TextInput::make('instagram')->url(),
                    Forms\Components\TextInput::make('tiktok')->url(),
                ])->columns(2),
            Forms\Components\Section::make('الموقع على الخريطة')
                ->schema([
                    Forms\Components\Textarea::make('map_url')
                        ->label('كود iframe من خرائط جوجل')
                        ->helperText('انسخ كود الـ Embed من Google Maps وضعه هنا')
                        ->rows(3)
                        ->placeholder('<iframe ...></iframe>'),
                ]),
        ]);
          
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            // عرض اسم اليخت بشكل بارز
            Tables\Columns\TextColumn::make('title')
                ->label('اسم اليخت')
                ->searchable()
                ->sortable(),

            // عرض رقم الهاتف
            Tables\Columns\TextColumn::make('phone')
                ->label('رقم الهاتف')
                ->icon('heroicon-m-phone'),

            // عرض الإيميل
            Tables\Columns\TextColumn::make('email')
                ->label('البريد الإلكتروني')
                ->icon('heroicon-m-envelope'),

            // عرض العنوان (اختياري)
            Tables\Columns\TextColumn::make('address')
                ->label('العنوان')
                ->limit(30), // يقص النص لو طويل عشان الجدول يفضل منظم
        ])
        ->filters([
            //
        ])
        ->actions([
            // زر التعديل
            Tables\Actions\EditAction::make()
                ->label('تعديل')
                ->icon('heroicon-m-pencil-square'),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
