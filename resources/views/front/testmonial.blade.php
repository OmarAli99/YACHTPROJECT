<section id="testimonials" class="py-20 bg-blue-50/50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-blue-900 mb-4" style="font-family: 'Amiri', serif;">شهادات نعتز بها</h2>
            <div class="w-24 h-1 bg-yellow-600 mx-auto rounded-full"></div>
        </div>

        <div class="swiper testimonialSwiper pb-12">
            <div class="swiper-wrapper">
                @foreach($testimonials as $item)
                <div class="swiper-slide px-4">
                    <div class="bg-white p-8 rounded-3xl shadow-md border border-gray-100 h-full flex flex-col justify-between">
                        <div>
                            <div class="flex text-yellow-500 mb-4">
                                @for($i = 0; $i < $item->stars; $i++)
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>
                            <p class="text-gray-600 italic text-lg leading-relaxed mb-6">"{{ $item->content }}"</p>
                        </div>
                        
                        <div class="flex items-center gap-4 mt-auto">
                            @if($item->image)
                                <img src="{{ Storage::url($item->image) }}" class="w-14 h-14 rounded-full object-cover border-2 border-yellow-500 shadow-sm">
                            @else
                                <div class="w-14 h-14 rounded-full bg-blue-900 flex items-center justify-center text-white font-bold text-xl border-2 border-yellow-500">
                                    {{ mb_substr($item->name, 0, 1) }}
                                </div>
                            @endif
                            <div class="text-right">
                                <h4 class="font-bold text-gray-900">{{ $item->name }}</h4>
                                <p class="text-sm text-gray-500">{{ $item->job }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>