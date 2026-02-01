<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    // --- سلايدر الرحلات الرئيسي ---
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            }
        },
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });

    // --- سكريبت تحويل الـ Navbar عند السكرول ---
    window.addEventListener('scroll', function() {
        const nav = document.getElementById('navbar');
        if (!nav) return; // تأمين الكود

        if (window.scrollY > 50) {
            nav.classList.add('bg-white/90', 'backdrop-blur-md', 'py-3', 'shadow-xl');
            nav.classList.remove('bg-transparent', 'py-5');
            nav.querySelectorAll('.nav-link, .text-3xl').forEach(el => {
                el.classList.add('text-gray-900');
                el.classList.remove('text-white');
            });
        } else {
            nav.classList.remove('bg-white/90', 'backdrop-blur-md', 'py-3', 'shadow-xl');
            nav.classList.add('bg-transparent', 'py-5');
            nav.querySelectorAll('.nav-link, .text-3xl').forEach(el => {
                el.classList.remove('text-gray-900');
                el.classList.add('text-white');
            });
        }
    });

    // --- سلايدر "عن اليخت" (About Swiper) ---
    var swiperAbout = new Swiper(".aboutSwiper", {
        loop: true,
        spaceBetween: 0,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
    });

    // --- سلايدر آراء العملاء (Testimonials) - تم إصلاحه ليعرض 3 كروت ---
    var testimonialSwiper = new Swiper(".testimonialSwiper", {
        slidesPerView: 1, 
        spaceBetween: 20,
        loop: true,
        centeredSlides: false,
        observer: true,       // مهم جداً لإعادة تنشيط السلايدر
        observeParents: true,  // مهم جداً
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 3, // يظهر 3 كروت في الكمبيوتر
                spaceBetween: 30,
            }
        }
    });
</script>