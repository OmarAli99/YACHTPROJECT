@extends('master')
@section('content')

<section id="home" class="relative h-screen min-h-[700px] flex items-center justify-center overflow-hidden font-cairo">
        <div class="absolute inset-0 -z-10 overflow-hidden">
            @if($settings && $settings->hero_image)
                <img src="{{ Storage::url($settings->hero_image) }}" class="w-full h-full object-cover animate-slow-zoom" alt="Yacht Luxury">
            @else
                <img src="https://images.unsplash.com/photo-1567899539496-e152995af3c5?auto=format&fit=crop&q=80&w=2070"
                 class="w-full h-full object-cover animate-slow-zoom" alt="Default Yacht">
            @endif
            <div class="absolute inset-0 bg-gradient-to-b from-[#0A1D37]/80 via-[#0A1D37]/40 to-[#0A1D37]/90"></div>
        </div>
        
        <div class="text-center px-6 max-w-5xl mx-auto relative z-10 space-y-8">
            <span class="text-[#C5A059] text-sm md:text-base font-black uppercase tracking-[0.5em] block animate-fade-in">
                Exclusive Nile Experience
            </span>

            <h1 class="text-5xl md:text-8xl font-black text-white font-amiri leading-[1.1] drop-shadow-2xl animate-fade-in-up">
                {{ $settings->hero_title ?? 'أهلاً بك في عالم الرفاهية' }}
             
            </h1>

            <p class="text-lg md:text-2xl text-white/80 font-light max-w-3xl mx-auto leading-relaxed animate-fade-in-up delay-200">
                عش تجربة فريدة في قلب النيل على متن أفخم اليخوت المصممة لراحتك وخصوصيتك.
            </p>

            <div class="flex flex-col md:flex-row items-center justify-center gap-6 pt-6 animate-fade-in-up delay-500">
                <a href="#booking" class="bg-[#C5A059] hover:bg-white text-[#0A1D37] px-12 py-5 rounded-2xl text-xl font-black transition-all duration-500 shadow-[0_15px_30px_-5px_rgba(197,160,89,0.4)] hover:-translate-y-2 flex items-center gap-3">
                    <span>احجز رحلتك الآن</span>
                    <i class="fa-solid fa-anchor"></i>
                </a>
                
                <a href="#gallery" class="bg-white/10 backdrop-blur-md border border-white/20 text-white hover:bg-white/20 px-12 py-5 rounded-2xl text-xl font-bold transition-all duration-500">
                    شاهد معرضنا
                </a>
            </div>
        </div>

        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">
            <a href="#about" class="text-[#C5A059] text-3xl opacity-50 hover:opacity-100 transition-opacity">
                <i class="fa-solid fa-chevron-down"></i>
            </a>
        </div>
    </section>


@endsection