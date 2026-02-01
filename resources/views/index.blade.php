@extends('master')
@section('content')
    <section id="home" class="relative h-screen flex items-center justify-center text-white">
        @if($settings && $settings->hero_image)
            <img src="{{ Storage::url($settings->hero_image) }}" class="absolute inset-0 w-full h-full object-cover -z-10" alt="Yacht">
        @else
            <img src="https://images.unsplash.com/photo-1567899539496-e152995af3c5?auto=format&fit=crop&q=80&w=2070" class="absolute inset-0 w-full h-full object-cover -z-10" alt="Default Yacht">
        @endif
        <div class="absolute inset-0 bg-black opacity-40 -z-10"></div>
        
        <div class="text-center px-4 max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-7xl font-bold mb-4 leading-tight drop-shadow-md" 
                style="font-family: 'Amiri', serif;">
                <span class="text-white">
                    {{ $settings->hero_title ?? 'أهلاً بك في عالم الرفاهية' }}
                </span>
            </h1>

            <p class="text-lg md:text-xl mb-8 text-gray-200 font-light opacity-90" 
            style="font-family: 'Cairo', sans-serif;">
                عش تجربة فريدة في قلب النيل
            </p>

            <a href="#booking" 
            class="relative overflow-hidden group bg-gradient-to-r from-yellow-600 to-yellow-500 text-white px-10 py-3.5 rounded-full text-lg font-bold transition-all duration-300 shadow-lg transform hover:-translate-y-1 inline-block"
            style="font-family: 'Cairo', sans-serif;">
                <span class="relative z-10">احجز رحلتك الآن</span>
                <div class="absolute top-0 -inset-full h-full w-1/2 z-5 block transform -skew-x-12 bg-gradient-to-r from-transparent to-white opacity-20 group-hover:animate-shine"></div>
            </a>
        </div>
    </section>


@endsection