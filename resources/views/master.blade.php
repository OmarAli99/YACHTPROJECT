@include('front.head')
<body class="bg-gray-50">

@include('front.navbar')
{{-- home page --}}

@yield('content')

@include('front.slider')
{{-- trips_image --}}
@include('front.tripimages')
{{-- trips_image --}}
@include('front.testmonial')
@include('front.reservation')

<a href="https://wa.me/20123456789" class="fixed bottom-8 left-8 z-50 flex items-center justify-center w-16 h-16 bg-green-500 text-white rounded-full shadow-2xl hover:bg-green-600 hover:scale-110 transition-all duration-300 group">
    <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.417-.003 6.557-5.338 11.892-11.893 11.892-1.997-.001-3.951-.5-5.688-1.448l-6.305 1.652zm6.599-3.835c1.516.903 3.44 1.42 5.352 1.421 5.404 0 9.803-4.397 9.806-9.803.001-2.616-1.018-5.074-2.871-6.927s-4.31-2.871-6.928-2.872c-5.462 0-9.803 4.397-9.806 9.806 0 2.03.635 4.01 1.83 5.686l-1.026 3.745 3.843-.996z"/></svg>
    <span class="absolute right-full mr-4 bg-white text-gray-800 px-3 py-1 rounded-lg text-sm font-bold opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap shadow-xl">تواصل معنا واتساب</span>
</a>
</body>
@include('front.footer')

@include('front.scripts')
</html>