
<section id="gallery" class="py-24 bg-[#0A1628]">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-white font-amiri mb-4">
                أجمل اللحظات <span class="text-[#C5A059]">النيلية</span>
            </h2>
            <div class="w-24 h-1 bg-[#C5A059] mx-auto rounded-full"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
            @if($settings?->trips_images && is_array($settings->trips_images))
                @foreach(array_values($settings->trips_images) as $photo)
                    <div class="relative overflow-hidden rounded-[2.5rem] group border border-white/10 shadow-2xl h-[300px] md:h-[450px]">
                        <img src="{{ Storage::url($photo) }}" 
                             class="w-full h-full object-cover transition-transform duration-1000 ease-in-out group-hover:scale-110" 
                             alt="Luxury Trip">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0A1628] via-transparent to-transparent opacity-0 group-hover:opacity-80 transition-all duration-500">
                            <div class="absolute bottom-8 right-8 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <i class="fa-solid fa-magnifying-glass-plus text-[#C5A059] text-2xl"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>