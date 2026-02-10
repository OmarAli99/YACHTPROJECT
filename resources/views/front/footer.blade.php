<footer class="relative bg-[#0A1628] text-white pt-24 pb-12 border-t border-[#C5A059]/20 font-cairo overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-px bg-gradient-to-r from-transparent via-[#C5A059]/50 to-transparent"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-20 text-right" dir="rtl">
            
            <div class="space-y-8 animate-fade-in">
                <div>
                    <h3 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-l from-[#F3E5AB] via-[#C5A059] to-[#94733C] font-amiri drop-shadow-lg inline-block">
                        {{ $footersettings->hero_title ?? 'Yacht Luxury' }}
                    </h3>
                    <div class="w-12 h-0.5 bg-[#C5A059] mt-2 rounded-full"></div>
                </div>
                
                <p class="text-gray-400 leading-loose text-base font-light italic pr-2">
                    "{{ $footersettings->about_text ?? 'تجربة ملكية في قلب النيل، حيث الفخامة والخصوصية تلتقيان لتصنع ذكريات لا تُنسى.' }}"
                </p>
                
                <div class="flex gap-4 pt-4 justify-start">
                    @php
                        $socials = [
                            'facebook' => ['color' => 'hover:bg-[#1877F2]', 'icon' => 'fab fa-facebook-f'],
                            'instagram' => ['color' => 'hover:bg-gradient-to-tr hover:from-[#833AB4] hover:to-[#FD1D1D]', 'icon' => 'fab fa-instagram'],
                            'tiktok' => ['color' => 'hover:bg-black hover:border-white', 'icon' => 'fab fa-tiktok']
                        ];
                    @endphp

                    @foreach($socials as $platform => $data)
                        @if(isset($footersettings->$platform))
                            <a href="{{ $footersettings->$platform }}" target="_blank" 
                               class="w-11 h-11 rounded-xl bg-white/5 border border-[#C5A059]/20 flex items-center justify-center transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_10px_20px_rgba(197,160,89,0.2)] group {{ $data['color'] }}">
                                <i class="{{ $data['icon'] }} text-[#C5A059] group-hover:text-white transition-colors duration-300"></i>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="space-y-10">
                <h4 class="text-white font-bold font-amiri text-2xl border-r-4 border-[#C5A059] pr-4 leading-none">تواصل معنا</h4>
                <ul class="space-y-6 pr-2">
                    @if($footersettings?->address)
                    <li class="flex items-start gap-5 group cursor-default">
                        <div class="w-10 h-10 rounded-full bg-[#C5A059]/10 flex items-center justify-center border border-[#C5A059]/20 group-hover:scale-110 group-hover:bg-[#C5A059] transition-all duration-500 shrink-0">
                            <i class="fa fa-map-location-dot text-[#C5A059] group-hover:text-[#0A1628]"></i>
                        </div>
                        <span class="text-gray-300 group-hover:text-[#C5A059] transition-colors duration-300 pt-1 text-sm leading-relaxed">
                            {{ $footersettings->address }}
                        </span>
                    </li>
                    @endif
                    
                    @if($footersettings?->phone)
                    <li class="flex items-center gap-5 group">
                        <div class="w-10 h-10 rounded-full bg-[#C5A059]/10 flex items-center justify-center border border-[#C5A059]/20 group-hover:scale-110 group-hover:bg-[#C5A059] transition-all duration-500 shrink-0">
                            <i class="fa fa-phone-volume text-[#C5A059] group-hover:text-[#0A1628]"></i>
                        </div>
                        <a href="tel:{{ $footersettings->phone }}" class="text-gray-300 group-hover:text-[#C5A059] transition-colors duration-300 font-mono tracking-wider text-lg">
                            {{ $footersettings->phone }}
                        </a>
                    </li>
                    @endif
                </ul>
            </div>

            <div class="space-y-10">
                <h4 class="text-white font-bold font-amiri text-2xl border-r-4 border-[#C5A059] pr-4 leading-none">خريطة الموقع</h4>
                @if($footersettings?->map_url)
                <div class="relative group p-1 bg-gradient-to-br from-[#C5A059]/20 to-transparent rounded-3xl">
                    <a href="{{ $footersettings->map_url }}" target="_blank" 
                       class="block bg-[#0D1B2E] border border-white/5 p-5 rounded-[1.4rem] hover:border-[#C5A059]/40 transition-all duration-700 backdrop-blur-md">
                        <div class="flex items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-[#C5A059] flex items-center justify-center shadow-[0_0_15px_rgba(197,160,89,0.3)] group-hover:rotate-12 transition-transform duration-500">
                                    <i class="fa-solid fa-route text-[#0A1628] text-xl"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-white font-bold text-sm">عرض الموقع</span>
                                    <span class="text-gray-500 text-[11px] font-medium">Google Maps</span>
                                </div>
                            </div>
                            <i class="fa fa-chevron-left text-[#C5A059]/30 group-hover:translate-x-[-5px] transition-transform"></i>
                        </div>
                    </a>
                </div>
                @endif
                
                <div class="flex flex-col gap-4 pr-2 pt-2">
                    <a href="#about" class="text-gray-400 hover:text-[#C5A059] transition-all duration-300 flex items-center gap-2 group text-sm">
                        <span class="w-1.5 h-1.5 bg-[#C5A059] rounded-full group-hover:w-4 transition-all"></span>
                        الرحلات النيلية المميزة
                    </a>
                    <a href="#booking" class="text-gray-400 hover:text-[#C5A059] transition-all duration-300 flex items-center gap-2 group text-sm">
                        <span class="w-1.5 h-1.5 bg-[#C5A059] rounded-full group-hover:w-4 transition-all"></span>
                        احجز رحلتك الآن
                    </a>
                </div>
            </div>

            <div class="space-y-10">
                <h4 class="text-white font-bold font-amiri text-2xl border-r-4 border-[#C5A059] pr-4 leading-none">ساعات العمل</h4>
                <div class="space-y-5">
                    <div class="relative overflow-hidden bg-white/[0.03] p-5 rounded-2xl border border-white/5 group hover:border-[#C5A059]/30 transition-all duration-500">
                        <div class="flex items-center gap-4 relative z-10">
                            <i class="far fa-clock text-[#C5A059] text-xl"></i>
                            <div>
                                <span class="text-white font-bold block text-sm mb-1">الفترة الصباحية والمسائية</span>
                                <span class="text-gray-400 text-xs tracking-widest font-mono">09:00 AM - 11:00 PM</span>
                            </div>
                        </div>
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-[#C5A059]/5 rounded-full -mr-8 -mb-8 transition-all group-hover:scale-150"></div>
                    </div>
                    
                    <p class="text-[11px] text-gray-500 pr-2 italic font-light">
                        * متاحون طوال أيام الأسبوع لتلبية طلباتكم الخاصة.
                    </p>
                </div>
            </div>

        </div>

        <div class="pt-10 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-gray-500 text-xs font-light tracking-wide order-2 md:order-1">
                © {{ date('Y') }} <span class="text-[#C5A059] font-bold">{{ $footersettings->hero_title ?? 'Yacht Luxury' }}</span>. جميع الحقوق محفوظة.
            </p>
            
            <div class="flex items-center gap-2 order-1 md:order-2">
                <span class="text-[10px] text-gray-600 uppercase tracking-widest">Powered by</span>
                <span class="text-[#C5A059]/50 font-black text-xs italic">TechCompany</span>
            </div>
        </div>
    </div>
</footer>