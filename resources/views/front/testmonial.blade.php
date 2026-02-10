<section id="testimonials" class="py-24 bg-[#fcfcfc] relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-b from-[#0A1628]/5 to-transparent"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-[#0A1628] mb-4 font-amiri tracking-tight">شهادات نعتز بها</h2>
            <div class="flex justify-center items-center gap-2">
                <span class="w-8 h-[1px] bg-[#C5A059]/40"></span>
                <div class="w-3 h-3 rotate-45 border border-[#C5A059] bg-[#C5A059]/10"></div>
                <span class="w-24 h-1 bg-[#C5A059] rounded-full"></span>
                <div class="w-3 h-3 rotate-45 border border-[#C5A059] bg-[#C5A059]/10"></div>
                <span class="w-8 h-[1px] bg-[#C5A059]/40"></span>
            </div>
        </div>

        <div class="swiper testimonialSwiper pb-16">
            <div class="swiper-wrapper">
                @foreach($testimonials as $item)
                <div class="swiper-slide px-4 h-auto">
                    <div class="bg-white p-10 rounded-[2rem] shadow-[0_15px_50px_-20px_rgba(0,0,0,0.05)] border border-gray-100 h-full flex flex-col relative group hover:border-[#C5A059]/30 transition-all duration-500">
                        
                        <div class="absolute top-6 left-8 text-gray-50 text-7xl font-serif opacity-50 group-hover:text-[#C5A059]/10 transition-colors">"</div>

                        <div class="relative z-10">
                            <div class="flex text-[#C5A059] mb-6 gap-1">
                                @for($i = 0; $i < $item->stars; $i++)
                                    <svg class="w-4 h-4 fill-current shadow-sm" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>

                            <p class="text-[#0A1628]/80 italic text-lg leading-[1.8] mb-8 font-light relative">
                                "{{ $item->content }}"
                            </p>
                        </div>
                        
                        <div class="flex items-center gap-5 mt-auto pt-6 border-t border-gray-50">
                            <div class="relative">
                                @if($item->image)
                                    <img src="{{ Storage::url($item->image) }}" class="w-16 h-16 rounded-2xl object-cover shadow-md border-2 border-white group-hover:border-[#C5A059]/50 transition-all">
                                @else
                                    <div class="w-16 h-16 rounded-2xl bg-[#0A1628] flex items-center justify-center text-[#C5A059] font-bold text-xl shadow-md border-2 border-white">
                                        {{ mb_substr($item->name, 0, 1) }}
                                    </div>
                                @endif
                                <div class="absolute -bottom-1 -right-1 bg-[#C5A059] text-white text-[8px] p-1 rounded-full border-2 border-white">
                                    <i class="fas fa-check"></i>
                                </div>
                            </div>
                            
                            <div class="text-right">
                                <h4 class="font-bold text-[#0A1628] text-lg mb-0.5">{{ $item->name }}</h4>
                                <span class="text-xs text-[#C5A059] font-medium tracking-wide uppercase">{{ $item->job }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination !bottom-0"></div>
        </div>
    </div>
</section>

