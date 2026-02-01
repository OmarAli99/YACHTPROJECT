    <section id="booking" class="py-20 bg-blue-50">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-2xl overflow-hidden">
                <div class="bg-blue-600 p-6 text-white text-center">
                    <h2 class="text-3xl font-bold">احجز رحلتك الآن</h2>
                    <p class="mt-2 opacity-90 font-light">استمتع بأفضل الأوقات في عرض النيل</p>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border-r-4 border-green-500 text-green-700 p-4 m-6 text-center animate-bounce rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('bookings.store') }}" method="POST" class="p-8 space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">الاسم الكامل</label>
                            <input type="text" name="customer_name" 
                            required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-200 outline-none transition"
                             placeholder="أدخل اسمك">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">رقم الهاتف</label>
                            <input type="text" name="customer_phone"
                             required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-200 outline-none transition"
                              placeholder="01xxxxxxxxx">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">تاريخ الرحلة</label>
                            <input type="date" name="trip_date" 
                            required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-200 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">توقيت الرحلة</label>
                            <select name="trip_time" required class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white">
                                <option value="morning">صباحاً (الشروق)</option>
                                <option value="afternoon">بعد الظهر</option>
                                <option value="night">ليلاً (سهرة)</option>
                                <option value="full_day">اليوم كله</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">ملاحظات (اختياري)</label>
                        <textarea name="notes" rows="3" class="w-full px-4 py-3 rounded-lg border border-gray-300" placeholder="أي طلبات خاصة؟"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 rounded-lg shadow-lg transform transition active:scale-95 text-xl">
                        تأكيد طلب الحجز ⚓
                    </button>
                </form>
            </div>
        </div>
    </section>