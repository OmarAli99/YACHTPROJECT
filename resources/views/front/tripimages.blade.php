   <section id="gallery" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-center mb-12 italic text-blue-800">أجمل الرحلات 📸</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-10">
            @if($settings?->trips_images && is_array($settings->trips_images))
                @foreach($settings->trips_images as $photo)
                    <div class="overflow-hidden rounded-3xl shadow-xl h-[300px] md:h-[450px]">
                        <img src="{{ Storage::url($photo) }}" 
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" 
                             alt="Trip Photo">
                    </div>
                @endforeach
            @else
                <div class="rounded-3xl bg-gray-200 h-64 flex items-center justify-center text-gray-400">لا يوجد صور حالياً</div>
                <div class="rounded-3xl bg-gray-200 h-64 flex items-center justify-center text-gray-400">لا يوجد صور حالياً</div>
            @endif
        </div>
    </div>
</section>