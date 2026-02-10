<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yacht Luxury - حجز يخت</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,700;1,700&family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=2">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}?v=2"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Cairo:wght@300;400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        /* أنيميشن تقريب الصورة ببطء */
    @keyframes slow-zoom {
        0% { transform: scale(1); }
        100% { transform: scale(1.1); }
    }
    .animate-slow-zoom {
        animation: slow-zoom 20s linear infinite alternate;
    }

    /* أنيميشن ظهور النصوص */
    .animate-fade-in-up {
        animation: fadeInUp 1s ease-out forwards;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .delay-200 { animation-delay: 0.2s; }
    .delay-500 { animation-delay: 0.5s; }
        .font-cairo { font-family: 'Cairo', sans-serif; }
         .font-amiri { font-family: 'Amiri', serif; }
        body { font-family: 'Cairo', sans-serif; scroll-behavior: smooth; }
        
        /* Swiper Styles */
        .mySwiper .swiper-slide {
            height: 450px; 
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .mySwiper .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Navbar Effects */
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            right: 0;
            background-color: #60a5fa;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after { width: 100%; }

        /* Button Shine Animation */
        @keyframes shine {
            100% { left: 125%; }
        }
        .animate-shine {
            animation: shine 0.8s linear infinite; /* جعلناها infinite لو حاببها تكرر أو خليها عادية */
        }
        .aboutSwiper {
        width: 100%;
        padding-bottom: 30px; /* مكان للنقط اللي تحت */
    }
    .aboutSwiper .swiper-slide {
        height: 450px; /* ارتفاع السلايدر */
        border-radius: 24px;
        overflow: hidden;
    }
    .aboutSwiper .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    /* تأثير خفيف عند تمرير الماوس */
    .aboutSwiper .swiper-slide:hover img {
        transform: scale(1.05);
    }
    /* تخصيص لون نقط السلايدر ليتماشى مع الفخامة */
    .aboutSwiper .swiper-pagination-bullet-active {
        background: #ca8a04 !important; /* اللون الذهبي */
    }
    .testimonialSwiper .swiper-pagination-bullet-active {
        background: #ca8a04 !important; /* لون ذهبي */
        width: 25px;
        border-radius: 5px;
    }
    .testimonialSwiper .swiper-slide {
        height: auto; /* عشان كل الكروت تبقى طول واحد */
    }
    /* لضمان أن جميع الكروت بنفس الارتفاع */
    .testimonialSwiper .swiper-slide {
        height: auto;
    }
    .testimonialSwiper .swiper-wrapper {
        display: flex;
    }
    /* تنسيق النقاط باللون الذهبي ليتماشى مع شعار اليخت */
    .testimonialSwiper .swiper-pagination-bullet-active {
        background: #ca8a04 !important; 
    }
      .testimonialSwiper .swiper-pagination-bullet {
        width: 12px;
        height: 4px;
        border-radius: 2px;
        background: #0A1628;
        opacity: 0.1;
        transition: all 0.3s;
    }
    .testimonialSwiper .swiper-pagination-bullet-active {
        width: 30px;
        background: #C5A059 !important;
        opacity: 1;
    }
    /* انقل أوامر الـ CSS هنا بعيد عن السكريبت */
    .footer-heading {
        @apply text-lg font-bold mb-8 border-r-4 border-yellow-600 pr-4 text-white;
    }
    .footer-link {
        @apply text-gray-400 hover:text-yellow-500 transition-all duration-300 inline-block;
    }
    .social-btn {
        @apply w-10 h-10 rounded-lg bg-slate-900 flex items-center justify-center hover:bg-yellow-600 transition-all duration-300;
    }

/* التنسيق الأساسي للروابط لضمان عدم تغير لونها للأسود */
    .nav-link {
        color: white !important; /* اللون الافتراضي أبيض دائماً */
        text-decoration: none !important;
    }

    /* حالة التنشيط: الكلمة تنور ذهبي والخط يظهر */
    .nav-link.active-link {
        color: #C5A059 !important; /* اللون الذهبي عند النشاط */
    }

    .nav-link.active-link .nav-line {
        width: 100% !important;
        box-shadow: 0 0 10px rgba(197, 160, 89, 0.4); /* توهج ذهبي خفيف */
    }

    /* لضمان عدم تحول اللون للأسود بعد الضغط (Visited) */
    .nav-link:visited {
        color: white !important;
    }
    
    .nav-link.active-link:visited {
        color: #C5A059 !important;
    }
       /* تنسيق النقاط باللون الذهبي */
    .swiper-pagination-bullet { background: rgba(255,255,255,0.5); opacity: 1; }
    .swiper-pagination-bullet-active { background: #C5A059 !important; width: 20px; border-radius: 5px; transition: all 0.3s ease; }
    
    /* منع الأسهم من التداخل وتوسيطها عمودياً */
    .swiper-button-next, .swiper-button-prev {
        top: 50% !important;
        transform: translateY(-50%) !important;
        margin-top: 0 !important;
    }
    </style>
</head>