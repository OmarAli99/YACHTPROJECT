<section id="about" class="py-20 bg-white">
    <div class="container mx-auto px-6 flex flex-col md:flex-row items-center gap-12">
        
        <div class="md:w-1/2">
            <h2 class="text-4xl font-bold mb-6 text-blue-900" style="font-family: 'Amiri', serif;">الرحلات النيليه الفاخره</h2>
            <p class="text-gray-700 text-xl leading-relaxed">
                @if($settings)
                    <p>{{ $settings->about_text }}</p>
                @else
                    <p>أهلاً بك في موقعنا (برجاء إضافة البيانات من لوحة التحكم)</p>
                @endif
            </p>
        </div>

        <div class="swiper aboutSwiper rounded-3xl overflow-hidden shadow-2xl">
        <div class="swiper-wrapper">
            @if($settings?->about_image && is_array($settings->about_image))
                @foreach($settings->about_image as $img)
                    <div class="swiper-slide">
                        <img src="{{ Storage::url($img) }}" class="w-full h-[450px] object-cover">
                    </div>
                @endforeach
            @endif
        </div>
        <div class="swiper-button-next" style="color: #fff;"></div>
        <div class="swiper-button-prev" style="color: #fff;"></div>
        <div class="swiper-pagination"></div>
    </div>
    </div>
</section>