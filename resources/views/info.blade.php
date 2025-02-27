<!DOCTYPE html>
<html lang="ar" dir="rtl">
@include('components.head')

<body>
    <div id="global-loader">
        <div class="loader-img">
            <img src="{{ asset('assets2/img/loader.png') }}" class="img-fluid" alt="Global">
        </div>
    </div>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        @include('components.header')

        <!-- Hero Section -->
        <section class="hero-section" style="background-image: url('{{ asset('assets2/img/bg/banner.jpg') }}'); background-size: cover; background-position: center;">
            <div class="container">
                <div class="home-banner">
                    <div class="row align-items-center w-100">
                        <div class="col-lg-7 col-md-10 mx-auto text-center">
                            <div class="section-search aos" data-aos="fade-up">
                                <!-- إضافة اللوجو -->
                                <img src="{{ asset('assets2/img/logo-black.svg') }}" alt="Logo" class="mb-3" style="width: 300px;">
                                <h1 class="text-white">مسابقة الرمضانية الترند السعودي</h1>
                                <p class="sub-info text-white">
                                    نقدم لكم أفضل الحلول الإبداعية والاحترافية لتلبية احتياجاتكم.
                                </p>
                                <p class="text-white">Ramadan Trend Saudi Competition</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Hero Section -->

        <!-- About Us Section -->
        <section class="section about-us-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img aos" data-aos="fade-up">
                            <img src="{{ asset('assets2/img/bg/banner-right.png') }}" class="img-fluid" alt="About Us">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content aos" data-aos="fade-up">
                            <h2>من نحن</h2>
                            <p class="sub-title">
                                نحن فريق من المحترفين الملتزمين بتقديم أفضل الحلول الإبداعية لعملائنا. نؤمن بأن الإبداع والجودة هما المفتاح لتحقيق النجاح.
                            </p>
                            <ul class="about-list">
                                <li>
                                    <i class="feather-check-circle"></i>
                                    <span>تصميمات إبداعية وعصرية</span>
                                </li>
                                <li>
                                    <i class="feather-check-circle"></i>
                                    <span>حلول تقنية متطورة</span>
                                </li>
                                <li>
                                    <i class="feather-check-circle"></i>
                                    <span>خدمة عملاء مميزة</span>
                                </li>
                            </ul>
                            <div class="social-links mt-4">
                                <a href="#" class="social-icon">
                                    <i class="fab fa-facebook-f fa-2x"></i>
                                    <span>Facebook</span>
                                </a>
                                <a href="#" class="social-icon">
                                    <i class="fab fa-twitter fa-2x"></i>
                                    <span>Twitter</span>
                                </a>
                                <a href="#" class="social-icon">
                                    <i class="fab fa-instagram fa-2x"></i>
                                    <span>Instagram</span>
                                </a>
                                <a href="#" class="social-icon">
                                    <i class="fab fa-linkedin-in fa-2x"></i>
                                    <span>LinkedIn</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /About Us Section -->

        <!-- Our Team Section -->
        <section class="section our-team-section">
            <div class="container">
                <div class="section-heading aos" data-aos="fade-up">
                    <h2>فريقنا <span>المبدع</span></h2>
                    <p class="sub-title">تعرف على الفريق الذي يعمل خلف الكواليس لتحقيق النجاح.</p>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="team-member aos" data-aos="fade-up">
                            <img src="https://cdn-icons-png.flaticon.com/128/3135/3135715.png" class="img-fluid" alt="Team Member">
                            <h4>فهد الحارثي</h4>
                            <p>المدير التنفيذي</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-member aos" data-aos="fade-up">
                            <img src="https://cdn-icons-png.flaticon.com/128/3135/3135715.png" class="img-fluid" alt="Team Member">
                            <h4>أحمد علي</h4>
                            <p>مصمم جرافيك</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-member aos" data-aos="fade-up">
                            <img src="https://cdn-icons-png.flaticon.com/128/3135/3135715.png" class="img-fluid" alt="Team Member">
                            <h4>سارة محمد</h4>
                            <p>مطور ويب</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-member aos" data-aos="fade-up">
                            <img src="https://cdn-icons-png.flaticon.com/128/3135/3135715.png" class="img-fluid" alt="Team Member">
                            <h4>ليلى خالد</h4>
                            <p>مدير تسويق</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Our Team Section -->

        <!-- Contact Section -->
        <section class="section contact-section">
            <div class="container">
                <div class="section-heading aos" data-aos="fade-up">
                    <h2>تواصل <span>معنا</span></h2>
                    <p class="sub-title">نحن هنا للإجابة على جميع استفساراتك.</p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-info aos" data-aos="fade-up">
                            <ul>
                                <li>
                                    <i class="feather-map-pin"></i>
                                    <span>العنوان: الرياض، المملكة العربية السعودية</span>
                                </li>
                                <li>
                                    <i class="feather-phone"></i>
                                    <span>الهاتف: +966 123 456 789</span>
                                </li>
                                <li>
                                    <i class="feather-mail"></i>
                                    <span>البريد الإلكتروني: info@example.com</span>
                                </li>
                            </ul>
                            <!-- إضافة QR Code -->
                            <div class="qr-code mt-4">
                                <img src="{{ asset('assets2/info.jpeg') }}" alt="QR Code" class="img-fluid" style="width: 500px;">
                                <p class="mt-2">مسح QR Code للتواصل</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-form aos" data-aos="fade-up">
                            <form>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" placeholder="الاسم الكامل">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control" placeholder="البريد الإلكتروني">
                                </div>
                                <div class="form-group mb-3">
                                    <textarea class="form-control" rows="5" placeholder="الرسالة"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">إرسال</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Contact Section -->

        @include('components.footer')
    </div>
    <!-- /Main Wrapper -->

    <!-- scrollToTop start -->
    <div class="progress-wrap active-progress">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;">
            </path>
        </svg>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets2/js/jquery-3.7.0.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets2/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Select JS -->
    <script src="{{ asset('assets2/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Owl Carousel JS -->
    <script src="{{ asset('assets2/plugins/owl-carousel/owl.carousel.min.js') }}"></script>

    <!-- Aos -->
    <script src="{{ asset('assets2/plugins/aos/aos.js') }}"></script>

    <!-- Counterup JS -->
    <script src="{{ asset('assets2/js/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery.counterup.min.js') }}"></script>

    <!-- Top JS -->
    <script src="{{ asset('assets2/js/backToTop.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets2/js/script.js') }}"></script>
</body>

</html>