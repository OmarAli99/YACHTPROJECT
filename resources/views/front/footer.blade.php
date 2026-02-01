<footer class="bg-slate-950 text-white pt-20 pb-10 border-t border-yellow-900/30">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            
            <div class="space-y-6">
                <h3 class="text-3xl font-bold text-yellow-500 drop-shadow-md" style="font-family: 'Amiri', serif;">
                    {{ $setting->title ?? 'Yacht Luxury' }}
                </h3>
                <p class="text-gray-400 leading-relaxed text-sm">
                    {{ $setting->description ?? 'تجربة ملكية في قلب النيل، حيث الفخامة والخصوصية تلتقيان لتصنع ذكريات لا تُنسى.' }}
                </p>
                
                <div class="flex flex-wrap gap-4 pt-2">
                    @if($setting?->facebook)
                        <a class="social-btn hover:scale-110 transition-transform text-xl" href="{{ $setting->facebook }}" target="_blank">
                            <i class="fab fa-facebook text-blue-500"></i>
                        </a>
                    @endif
                    @if($setting?->instagram)
                        <a class="social-btn hover:scale-110 transition-transform text-xl" href="{{ $setting->instagram }}" target="_blank">
                            <i class="fab fa-instagram text-pink-500"></i>
                        </a>
                    @endif
                    @if($setting?->tiktok)
                        <a class="social-btn hover:scale-110 transition-transform text-xl" href="{{ $setting->tiktok }}" target="_blank">
                            <i class="fab fa-tiktok text-white"></i>
                        </a>
                    @endif
                </div>
            </div>

            <div class="space-y-6">
                <h4 class="footer-heading relative pb-2 after:content-[''] after:absolute after:bottom-0 after:right-0 after:w-10 after:h-0.5 after:bg-yellow-500">تواصل معنا</h4>
                <ul class="space-y-5 text-gray-400 text-sm">
                    @if($setting?->address)
                    <li class="flex items-center gap-4 group">
                        <div class="w-8 h-8 rounded-full bg-yellow-900/20 flex items-center justify-center group-hover:bg-yellow-500 transition-colors">
                            <i class="fa fa-map-marked-alt text-yellow-500 group-hover:text-slate-950"></i>
                        </div>
                        <span class="group-hover:text-yellow-500 transition-colors">{{ $setting->address }}</span>
                    </li>
                    @endif
                    
                    @if($setting?->phone)
                    <li class="flex items-center gap-4 group">
                        <div class="w-8 h-8 rounded-full bg-yellow-900/20 flex items-center justify-center group-hover:bg-yellow-500 transition-colors">
                            <i class="fa fa-phone-volume text-yellow-500 group-hover:text-slate-950"></i>
                        </div>
                        <a href="tel:{{ $setting->phone }}" class="group-hover:text-yellow-500 transition-colors">{{ $setting->phone }}</a>
                    </li>
                    @endif

                    @if($setting?->email)
                    <li class="flex items-center gap-4 group">
                        <div class="w-8 h-8 rounded-full bg-yellow-900/20 flex items-center justify-center group-hover:bg-yellow-500 transition-colors">
                            <i class="fa fa-envelope-open-text text-yellow-500 group-hover:text-slate-950"></i>
                        </div>
                        <a href="mailto:{{ $setting->email }}" class="hover:text-yellow-500 transition break-all">{{ $setting->email }}</a>
                    </li>
                    @endif

                    @if($setting?->map_url)
                    <li class="flex items-center gap-4 group">
                        <div class="w-8 h-8 rounded-full bg-yellow-900/20 flex items-center justify-center group-hover:bg-yellow-500 transition-colors">
                            <i class="fa fa-location-arrow text-yellow-500 group-hover:text-slate-950 animate-pulse"></i>
                        </div>
                        <a href="{{ $setting->map_url }}" target="_blank" class="text-yellow-500 font-bold hover:underline decoration-wavy transition-all">
                            عرض الموقع على الخريطة
                        </a>
                    </li>
                    @endif
                </ul>
            </div>

            <div class="space-y-6">
                <h4 class="footer-heading">روابط هامة</h4>
                <ul class="space-y-3">
                    <li><a href="#about" class="footer-link hover:translate-x-[-5px] inline-block transition-transform italic">~ الرحلات النيليه</a></li>
                    <li><a href="#gallery" class="footer-link hover:translate-x-[-5px] inline-block transition-transform italic">~ معرض الصور</a></li>
                    <li><a href="#booking" class="footer-link hover:translate-x-[-5px] inline-block transition-transform italic">~ إحجز الآن</a></li>
                </ul>
            </div>

            <div class="space-y-6">
                <h4 class="footer-heading">مواعيد العمل</h4>
                <div class="space-y-4 text-gray-400 text-sm">
                    <div class="flex items-center gap-3 bg-slate-900/50 p-3 rounded-lg border border-yellow-900/20">
                        <i class="far fa-clock text-yellow-500"></i>
                        <p><span class="text-white font-bold block">يومياً:</span> 09:00 AM - 11:00 PM</p>
                    </div>
                    <div class="flex items-center gap-3 bg-slate-900/50 p-3 rounded-lg border border-yellow-900/20">
                        <i class="far fa-calendar-alt text-yellow-500"></i>
                        <p><span class="text-white font-bold block">الجمعة:</span> 01:00 PM - 12:00 AM</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="pt-8 border-t border-slate-900 text-center text-gray-500 text-xs">
            <p>© {{ date('Y') }} {{ $setting->title ?? 'Yacht Luxury' }}. جميع الحقوق محفوظة.</p>
        </div>
    </div>
</footer>