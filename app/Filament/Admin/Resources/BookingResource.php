<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BookingResource\Pages;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput; 
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'الحجوزات';
    protected static ?string $modelLabel = 'حجز';
    protected static ?string $pluralModelLabel = 'الحجوزات';
    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::where('status', 'pending')->count();
        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('بيانات العميل والرحلة')
                    ->description('المعلومات الأساسية لموعد وضيوف الرحلة')
                    ->columns(2)
                    ->schema([
                        TextInput::make('customer_name')
                            ->label('اسم العميل')
                            ->required()
                            ->maxLength(255),
                        
                        TextInput::make('customer_phone')
                            ->label('رقم التليفون')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        
                        DatePicker::make('trip_date')
                            ->label('تاريخ الرحلة')
                            ->required(),

                        Select::make('trip_time')
                            ->label('توقيت الإبحار')
                            ->options([
                                'morning'   => 'صباحاً (فترة الشروق)',
                                'afternoon' => 'بعد الظهر (وقت الغروب)',
                                'night'     => 'سهرة نيلية ليلية',
                                'full_day'  => 'يوم ملكي كامل (VIP)',
                            ])
                            ->required(),

                        Select::make('occasion')
                            ->label('نوع المناسبة')
                            ->options([
                                'private_cruise' => 'رحلة خاصة (Private Cruise)',
                                'birthday'       => 'عيد ميلاد / خطوبة',
                                'romantic_dinner'=> 'عشاء رومانسي لشخصين',
                                'photoshoot'     => 'جلسة تصوير (Photo Session)',
                                'business'       => 'اجتماع عمل / VIP',
                                'other'          => 'أخرى',
                            ])
                            ->default('private_cruise'),

                        TextInput::make('guests_count')
                            ->label('عدد الضيوف')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(50)
                            ->default(2)
                            ->required(),
                    ]),

                Section::make('الحسابات والماليات')
                    ->description('تحديد السعر والعربون والمتبقي للتحصيل')
                    ->columns(3)
                    ->schema([
                        TextInput::make('total_price')
                            ->label('إجمالي السعر')
                            ->prefix('ج.م')
                            ->numeric()
                            ->default(0)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Forms\Set $set, Forms\Get $get) {
                                $total = (float) ($get('total_price') ?? 0);
                                $paid = (float) ($get('paid_amount') ?? 0);
                                $set('remaining_amount', max(0, $total - $paid));
                            }),

                        TextInput::make('paid_amount')
                            ->label('العربون المدفوع')
                            ->prefix('ج.م')
                            ->numeric()
                            ->default(0)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Forms\Set $set, Forms\Get $get) {
                                $total = (float) ($get('total_price') ?? 0);
                                $paid = (float) ($get('paid_amount') ?? 0);
                                $set('remaining_amount', max(0, $total - $paid));
                            }),

                        TextInput::make('remaining_amount')
                            ->label('المتبقي للتحصيل')
                            ->prefix('ج.م')
                            ->numeric()
                            ->disabled()
                            ->dehydrated(),

                        Select::make('status')
                            ->label('حالة الحجز')
                            ->options([
                                'pending'   => 'قيد الانتظار',
                                'confirmed' => 'تم التأكيد',
                                'cancelled' => 'ملغي',
                            ])
                            ->default('pending')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                Section::make('ملاحظات إضافية')
                    ->collapsible()
                    ->schema([
                        Textarea::make('notes')
                            ->label('ملاحظات وطلبات العميل الخاصة')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer_name')
                    ->label('الاسم')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('customer_phone')
                    ->label('الهاتف')
                    ->searchable(),

                Tables\Columns\TextColumn::make('trip_date')
                    ->label('التاريخ')
                    ->date('Y-m-d')
                    ->sortable(),

                Tables\Columns\TextColumn::make('trip_time')
                    ->label('التوقيت')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'morning'   => 'صباحاً',
                        'afternoon' => 'عصراً (غروب)',
                        'night'     => 'ليلاً',
                        'full_day'  => 'يوم كامل',
                        default     => $state ?? '-',
                    }),

                Tables\Columns\TextColumn::make('guests_count')
                    ->label('الضيوف')
                    ->suffix(' أفراد')
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('total_price')
                    ->label('الإجمالي')
                    ->money('EGP')
                    ->sortable(),

                Tables\Columns\TextColumn::make('paid_amount')
                    ->label('العربون')
                    ->money('EGP'),

                Tables\Columns\TextColumn::make('remaining_amount')
                    ->label('المتبقي')
                    ->money('EGP')
                    ->badge()
                    ->color(fn ($state): string => ((float) $state > 0) ? 'danger' : 'success'),

                Tables\Columns\TextColumn::make('status')
                    ->label('الحالة')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending'   => 'warning',
                        'confirmed' => 'success',
                        'cancelled' => 'danger',
                        default     => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending'   => 'قيد الانتظار',
                        'confirmed' => 'تم التأكيد',
                        'cancelled' => 'ملغي',
                        default     => $state,
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('حالة الحجز')
                    ->options([
                        'pending'   => 'قيد الانتظار',
                        'confirmed' => 'تم التأكيد',
                        'cancelled' => 'ملغي',
                    ]),
            ])
            ->actions([
                // زر مراسلة العميل عبر الواتساب بنقرة واحدة
                Tables\Actions\Action::make('whatsapp')
                    ->label('واتساب')
                    ->icon('heroicon-m-chat-bubble-left-ellipsis')
                    ->color('success')
                    ->url(function (Booking $record): string {
                        $phone = preg_replace('/[^0-9]/', '', $record->customer_phone);
                        if (str_starts_with($phone, '01')) {
                            $phone = '20' . substr($phone, 1);
                        }
                        $date = $record->trip_date ? \Carbon\Carbon::parse($record->trip_date)->format('Y-m-d') : '';
                        $msg = "أهلاً بك أستاذ {$record->customer_name} ⚓\nبخصوص حجز رحلتكم النيلية الفاخرة ليوم ({$date}).\nيسعدنا تأكيد طلبكم، ونتمنى لكم وقتاً ساحراً على متن اليخت!";
                        return "https://wa.me/{$phone}?text=" . rawurlencode($msg);
                    })
                    ->openUrlInNewTab(),

                Tables\Actions\EditAction::make()
                    ->label('تعديل')
                    ->icon('heroicon-m-pencil-square'),

                Tables\Actions\DeleteAction::make()
                    ->label('حذف'),
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
            'index'  => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit'   => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}