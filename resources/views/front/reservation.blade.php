<section id="booking" class="py-32 bg-[#FAF8F5] font-cairo overflow-hidden">
    <div class="container mx-auto px-6 relative">
        
        <div class="text-center mb-20 space-y-6">
            <span class="text-[#C5A059] text-sm font-black uppercase tracking-[0.5em] block text-center">Private Reservations</span>
            <h2 class="text-6xl md:text-7xl font-bold font-amiri text-[#0A1D37] text-center">احجز رحلتك <span class="italic text-[#C5A059]">الملكية</span></h2>
            <div class="w-32 h-1.5 bg-[#C5A059] mx-auto rounded-full"></div>
        </div>

        <div class="max-w-6xl mx-auto bg-white rounded-[3.5rem] shadow-[0_80px_150px_-30px_rgba(10,29,55,0.12)] border border-[#E9E1D0] overflow-hidden">
            
            @if(session('success'))
            <div class="bg-[#0A1D37] text-[#C5A059] p-8 text-center border-b border-[#C5A059]/20 animate-pulse font-bold text-xl font-amiri uppercase tracking-widest">
                 تم استلام طلب الحجز الملكي بنجاح.. سنتواصل معكم فوراً ⚓
            </div>
            @endif

            <div class="flex flex-col lg:flex-row">
                
                <div class="lg:w-1/3 bg-[#0A1D37] p-16 text-white flex flex-col justify-between relative overflow-hidden">
                    <div class="relative z-10 space-y-16 text-right">
                        <h3 class="text-3xl font-bold font-amiri border-r-4 border-[#C5A059] pr-5 leading-relaxed">تواصل مباشر <br>مع الطاقم</h3>
                        
                        <div class="space-y-12">
                            <div class="space-y-4">
                                <p class="text-blue-100/40 text-[10px] uppercase tracking-[0.4em] font-bold">للحجز الهاتفي</p>
                                <a href="tel:{{ $footersettings->phone}}" class="group flex flex-col gap-2">
                                    <span class="text-4xl md:text-5xl font-black text-[#C5A059] font-mono tracking-tighter group-hover:text-white transition-colors duration-500">
                                        {{ $footersettings->phone}}
                                    </span>
                                    <span class="flex items-center gap-3 text-white/60 group-hover:text-[#C5A059] transition-all justify-end">
                                        {{-- <span class="text-sm font-bold uppercase tracking-widest">خدمة العملاء (24h)</span>
                                        <i class="fa fa-phone-volume animate-pulse"></i> --}}
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="pt-20 border-t border-white/5">
                            <p class="text-blue-100/30 text-[13px] leading-loose italic text-right">
                                "نحن لا نقدم مجرد رحلة، نحن نصنع ذكرى مخلدة في ذاكرة النيل."
                            </p>
                        </div>
                    </div>
                    <i class="fa fa-anchor absolute -bottom-10 -left-10 text-white/5 text-[15rem] -rotate-12 pointer-events-none"></i>
                </div>

                <form action="{{ route('bookings.store') }}" method="POST" class="lg:w-2/3 p-12 md:p-32 bg-white space-y-20 text-right">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-20 text-right">
                        <div class="group space-y-4">
                            <label class="text-[11px] font-black text-[#A68966] uppercase tracking-[0.3em] block">الاسم بالكامل</label>
                            <input type="text" name="customer_name" required placeholder="كيف نتشرف باسمكم؟" 
                                class="w-full border-b-2 border-gray-100 focus:border-[#C5A059] py-5 outline-none transition-all text-2xl text-[#0A1D37] font-medium placeholder:text-gray-200 bg-transparent text-right">
                        </div>

                        <div class="group space-y-4">
                            <label class="text-[11px] font-black text-[#A68966] uppercase tracking-[0.3em] block">رقم التواصل</label>
                            <input type="tel" name="customer_phone" required placeholder="01xxxxxxxxx" 
                                class="w-full border-b-2 border-gray-100 focus:border-[#C5A059] py-5 outline-none transition-all text-2xl text-[#0A1D37] font-mono placeholder:text-gray-200 bg-transparent text-right">
                        </div>

                        <div class="group space-y-4">
                            <label class="text-[11px] font-black text-[#A68966] uppercase tracking-[0.3em] block">تاريخ الرحلة المنشود</label>
                            <input type="date" name="trip_date" required 
                                class="w-full border-b-2 border-gray-100 focus:border-[#C5A059] py-5 outline-none transition-all text-2xl text-[#0A1D37] bg-transparent cursor-pointer [color-scheme:light] text-right">
                        </div>

                        <div class="group space-y-4 text-right">
                            <label class="text-[11px] font-black text-[#A68966] uppercase tracking-[0.3em] block text-right">توقيت الأبحار</label>
                            <div class="relative text-right">
                                <select name="trip_time" class="w-full border-b-2 border-gray-100 focus:border-[#C5A059] py-5 outline-none transition-all text-2xl text-[#0A1D37] appearance-none bg-transparent cursor-pointer font-bold relative z-10 text-right">
                                    <option value="morning">صباحاً (فترة الشروق)</option>
                                    <option value="afternoon">بعد الظهر (وقت الغروب)</option>
                                    <option value="night">سهرة نيلية ليلية</option>
                                    <option value="full_day">يوم ملكي كامل (VIP)</option>
                                </select>
                                <i class="fa fa-chevron-down absolute left-0 bottom-8 text-[#C5A059] text-xs pointer-events-none"></i>
                            </div>
                        </div>
                    </div>

                    <div class="group space-y-4 w-full">
                        <label class="text-[11px] font-black text-[#A68966] uppercase tracking-[0.3em] block text-right">طلبات خاصة أو ملاحظات</label>
                        <textarea name="notes" rows="3" placeholder="هل تودون إضافة لمسات خاصة؟ (مثل تزيين، عشاء خاص، موسيقى...)" 
                            class="w-full border-b-2 border-gray-100 focus:border-[#C5A059] py-5 outline-none transition-all text-xl text-[#0A1D37] bg-transparent text-right resize-none placeholder:text-gray-200"></textarea>
                    </div>

                    <div class="relative group pt-10">
                        <div class="absolute -inset-1 bg-gradient-to-r from-[#C5A059] to-[#0A1D37] rounded-[2rem] blur opacity-20 group-hover:opacity-50 transition duration-1000"></div>
                        <button type="submit" class="relative w-full bg-[#0A1D37] hover:bg-[#C5A059] text-white font-black py-10 rounded-[1.8rem] transition-all duration-700 tracking-[0.3em] text-xl font-amiri uppercase flex items-center justify-center gap-6 shadow-2xl overflow-hidden group">
                            <span class="relative z-10 border-l border-white/20 pl-8 ml-2">تأكيد طلب الحجز الملكي</span>
                            <i class="fa-solid fa-ship text-xl animate-pulse relative z-10"></i>
                            <div class="absolute top-0 -inset-full h-full w-1/2 z-5 block transform -skew-x-12 bg-gradient-to-r from-transparent to-white opacity-10 group-hover:animate-shine"></div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    /* إضافة أنيميشن لمعة الزر */
    @keyframes shine {
        100% { left: 125%; }
    }
    .group-hover\:animate-shine:hover {
        animation: shine 0.8s;
    }
</style>