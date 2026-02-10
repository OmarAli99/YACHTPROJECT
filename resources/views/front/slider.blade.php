

<section id="about" class="py-24 bg-[#0A1628] overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            
            <div class="w-full lg:w-1/2 text-right order-2 lg:order-1" dir="rtl">
                <div class="space-y-6">
                    <h2 class="text-4xl md:text-5xl font-bold text-white font-amiri leading-tight">
                        الرحلات النيلية برؤية ملكية
                    </h2>
                    <div class="w-20 h-1 bg-[#C5A059] rounded-full"></div>
                    <p class="text-gray-400 text-lg leading-loose font-light">
                        {{ $settings->about_text ?? 'نحن نوفر لك تجربة فريدة في قلب النيل، حيث تجتمع الرفاهية والخصوصية.' }}
                    </p>
                </div>
            </div>

            <div class="w-full lg:w-1/2 relative order-1 lg:order-2">
                <div class="absolute -top-4 -right-4 w-full h-full border-2 border-[#C5A059]/20 rounded-2xl z-0"></div>
                
                <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl border border-white/10 bg-black">
                    @php
                        $images = $settings->about_image;
                        if (is_string($images)) { $images = json_decode($images, true); }
                        $images = is_array($images) ? array_values($images) : [];
                    @endphp

                    @if(count($images) > 0)
                        <div class="swiper aboutSwiper w-full h-[400px] relative group">
                            <div class="swiper-wrapper">
                                @foreach($images as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/' . $image) }}" 
                                             class="w-full h-full object-cover" 
                                             alt="Yacht View">
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="swiper-pagination"></div>
                            
                            <div class="swiper-button-next !right-4 !w-10 !h-10 !bg-[#C5A059] !text-[#0A1628] rounded-full after:!text-sm after:!font-bold shadow-lg opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                            <div class="swiper-button-prev !left-4 !w-10 !h-10 !bg-[#C5A059] !text-[#0A1628] rounded-full after:!text-sm after:!font-bold shadow-lg opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                        </div>
                    @else
                        <div class="w-full h-[400px] bg-gray-800 flex items-center justify-center text-white italic">
                            لا توجد صور لعرضها
                        </div>
                    @endif
                </div>

                <div class="absolute -bottom-6 -left-6 bg-[#C5A059] p-5 rounded-2xl shadow-xl hidden md:block z-20">
                    <i class="fa-solid fa-anchor text-[#0A1628] text-2xl"></i>
                </div>
            </div>

        </div>
    </div>
</section>


