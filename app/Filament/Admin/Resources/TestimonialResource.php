<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TestimonialResource\Pages;
use App\Filament\Admin\Resources\TestimonialResource\RelationManagers;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Tables\Filters\ToggledFilter;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('name')->required()->label('اسم العميل'),
            Forms\Components\TextInput::make('job')->label('الوظيفة'),
            Forms\Components\Select::make('stars')
                ->options([5 => '⭐⭐⭐⭐⭐', 4 => '⭐⭐⭐⭐', 3 => '⭐⭐⭐'])
                ->default(5)->label('التقييم'),
            Forms\Components\FileUpload::make('image')->image()->directory('testimonials')->label('صورة العميل'),
            Forms\Components\Textarea::make('content')->required()->columnSpanFull()->label('الرأي'),
            Forms\Components\Toggle::make('is_active')->default(true)->label('تفعيل'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            // صورة العميل بشكل دائري صغير
            Tables\Columns\ImageColumn::make('image')
                ->label('الصورة')
                ->circular(),

            // اسم العميل
            Tables\Columns\TextColumn::make('name')
                ->label('الاسم')
                ->searchable()
                ->sortable(),

            // التقييم بالنجوم
            Tables\Columns\TextColumn::make('stars')
                ->label('التقييم')
                ->formatStateUsing(fn (int $state): string => str_repeat('⭐', $state))
                ->color('warning'),

            // حالة التفعيل (ظاهر أو مخفي)
            Tables\Columns\IconColumn::make('is_active')
                ->label('الحالة')
                ->boolean()
                ->sortable(),

            // تاريخ الإضافة
            Tables\Columns\TextColumn::make('created_at')
                ->label('تاريخ الإضافة')
                ->dateTime('Y-m-d')
                ->color('gray')
                ->toggleable(isToggledHiddenByDefault: true),
        ])
         ->filters([])
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
