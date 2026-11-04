@if(isset($packages) && $packages->count() > 0)
<section id="packages" class="py-28 bg-[#FAF8F5] relative overflow-hidden font-cairo">
    <div class="container mx-auto px-6 relative z-10">
        
        <!-- Header -->
        <div class="text-center mb-20 space-y-4">
            <span class="text-[#C5A059] text-sm font-black uppercase tracking-[0.4em] block">Exclusive Packages</span>
            <h2 class="text-5xl md:text-6xl font-bold font-amiri text-[#0A1D37]">باقات وتجارب <span class="italic text-[#C5A059]">الإبحار الملكي</span></h2>
            <div class="w-28 h-1.5 bg-[#C5A059] mx-auto rounded-full"></div>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto pt-2">
                اختر الباقة المثالية لرحلتك، وكل باقة مصممة بعناية لتمنحكم أوقاتاً ساحرة لا تُنسى في قلب نيل القاهرة.
            </p>
        </div>

        <!-- Packages Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 max-w-7xl mx-auto items-stretch">
            @foreach($packages as $package)
            <div class="relative bg-white rounded-[2.5rem] p-10 flex flex-col justify-between shadow-[0_20px_60px_-15px_rgba(10,29,55,0.08)] border transition-all duration-500 hover:-translate-y-3 {{ $package->is_featured ? 'border-2 border-[#C5A059] shadow-[0_25px_70px_-15px_rgba(197,160,89,0.25)]' : 'border-gray-100 hover:border-[#C5A059]/40' }}">
                
                @if($package->is_featured)
                <div class="absolute -top-5 right-8 bg-gradient-to-r from-[#C5A059] to-[#dfbe7e] text-[#0A1D37] text-xs font-black uppercase px-6 py-2 rounded-full shadow-lg tracking-widest flex items-center gap-2">
                    <i class="fa fa-crown text-xs"></i>
                    <span>الأكثر طلباً - VIP</span>
                </div>
                @endif

                <div>
                    <!-- Package Image if available -->
                    @if($package->image)
                    <div class="w-full h-48 rounded-2xl overflow-hidden mb-8 shadow-inner">
                        <img src="{{ Storage::url($package->image) }}" alt="{{ $package->title }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700">
                    </div>
                    @endif

                    <!-- Title & Duration -->
                    <div class="text-right mb-6">
                        <span class="inline-flex items-center gap-2 bg-[#FAF8F5] text-[#C5A059] text-xs font-bold px-4 py-1.5 rounded-full mb-3">
                            <i class="fa fa-clock"></i>
                            <span>{{ $package->duration ?? 'ساعتان إبحار' }}</span>
                        </span>
                        <h3 class="text-3xl font-bold font-amiri text-[#0A1D37] leading-snug">{{ $package->title }}</h3>
                        @if($package->description)
                        <p class="text-gray-500 text-sm mt-3 leading-relaxed">{{ $package->description }}</p>
                        @endif
                    </div>

                    <!-- Price -->
                    <div class="text-right py-6 border-y border-gray-100 mb-8 flex items-baseline justify-end gap-2">
                        <span class="text-gray-400 text-sm font-light">تبدأ من</span>
                        <span class="text-4xl md:text-5xl font-black font-mono text-[#0A1D37]">{{ number_format($package->price) }}</span>
                        <span class="text-[#C5A059] text-lg font-bold">ج.م</span>
                    </div>

                    <!-- Features List -->
                    @if(!empty($package->features) && is_array($package->features))
                    <ul class="space-y-4 mb-10 text-right">
                        @foreach($package->features as $feature)
                        <li class="flex items-center justify-end gap-3 text-gray-700 text-sm font-medium">
                            <span>{{ $feature }}</span>
                            <span class="w-6 h-6 rounded-full bg-[#FAF8F5] text-[#C5A059] flex items-center justify-center text-xs shrink-0">
                                <i class="fa fa-check"></i>
                            </span>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>

                <!-- Action Button -->
                <a href="#booking" 
                   onclick="selectPackage('{{ addslashes($package->title) }}')"
                   class="w-full py-5 rounded-2xl text-center font-bold transition-all duration-300 block {{ $package->is_featured ? 'bg-[#0A1D37] hover:bg-[#C5A059] text-white shadow-xl shadow-[#0A1D37]/15' : 'bg-[#FAF8F5] hover:bg-[#0A1D37] text-[#0A1D37] hover:text-white border border-[#E9E1D0]' }}">
                    <span>احجز هذه التجربة</span>
                    <i class="fa fa-arrow-left mr-2 text-xs"></i>
                </a>

            </div>
            @endforeach
        </div>

    </div>
</section>

<script>
function selectPackage(packageName) {
    const notesInput = document.querySelector('textarea[name="notes"]');
    if (notesInput) {
        if (!notesInput.value.includes(packageName)) {
            notesInput.value = (notesInput.value ? notesInput.value + "\n" : "") + "تم اختيار باقة: " + packageName;
        }
    }
}
</script>
@endif
