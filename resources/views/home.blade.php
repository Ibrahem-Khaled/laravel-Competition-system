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
        <section class="hero-section">
            <div class="banner-cock-one">
                <img src="{{ asset('assets2/img/icons/banner-cock1.svg') }}" alt="Banner">
            </div>
            <div class="banner-shapes">
                <div class="banner-dot-one">
                    <span></span>
                </div>
                <div class="banner-cock-two">
                    <img src="{{ asset('assets2/img/icons/banner-cock2.svg') }}" alt="Banner">
                    <span></span>
                </div>
                <div class="banner-dot-two">
                    <span></span>
                </div>
            </div>
            <div class="container">
                <div class="home-banner">
                    <div class="row align-items-center w-100">
                        <div class="col-lg-7 col-md-10 mx-auto">
                            <div class="section-search aos" data-aos="fade-up">
                                <h2 class="text-white">مسابقة الترند السعودي الرمضانية</h2>
                                <h1>والتي يشرف عليها
                                    <br>
                                    <span>فهد الحارثي</span>
                                </h1>
                                <p class="sub-info">
                                    والتي تهدف لنشر المعرفة والثقافة العامه بجوائز قيمة تقدم للمتابعين
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="banner-imgs text-center aos" data-aos="fade-up">
                                <img class="img-fluid" src="{{ asset('assets2/img/bg/banner-right.png') }}"
                                    alt="Banner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- /Hero Section -->

        <!-- Best Services -->
        <section class="section best-services">
            @include('components.alerts')
            <div class="container">
                <div class="section-heading aos" data-aos="fade-up">
                    <h2>العدسة الاعلامية <span>مع الدكتور فهد تخلق الفرق </span></h2>
                    <p class="sub-title">مسابقتنا الرمضانية ذات جوائز قيمة ويمكنك التسجيل عبر النموذج التالي</p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="best-service-img aos" data-aos="fade-up">
                            <img src="{{ asset('assets2/img/best-service.jpg') }}" class="img-fluid" alt="Service">
                            <div class="service-count-blk">
                                <div class="coach-count" style="margin: 10px">
                                    <h3>المشاركين</h3>
                                    <h2><span class="counter-up">{{ $UsersWinnerCont }}</span>+</h2>
                                    <h4>عدد اجمالي الفائزين في المسابقة</h4>
                                </div>
                                <div class="coach-count coart-count">
                                    <h3>الفائزين</h3>
                                    <h2><span class="counter-up">{{ $allUsers }}</span>+</h2>
                                    <h4>عدد المشاركين في المسابقة</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ask-questions aos" data-aos="fade-up">
                            <h3>الرجاء تعبئة البيانات التالية بعناية</h3>
                            <p>البيانات المطلوبة في النموذج أدناه للتسجيل في المسابقة</p>
                            <div class="faq-info">
                                <div class="accordion" id="accordionExample">

                                    <form method="POST" action="{{ route('add-user') }}">
                                        @csrf
                                        <!-- حقل الاسم الكامل -->
                                        <div class="form-group mb-3">
                                            <div class="position-relative">
                                                <input type="text" class="form-control ps-5 mt-3 text-end"
                                                    placeholder="الاسم الكامل" name="name" dir="rtl">
                                                <i
                                                    class="feather-user position-absolute start-0 top-50 translate-middle-y ms-3"></i>
                                            </div>
                                        </div>

                                        <!-- حقل رقم الجوال -->
                                        <div class="form-group mb-3">
                                            <div class="position-relative">
                                                <input type="tel" class="form-control ps-5 text-end"
                                                    placeholder="رقم الجوال" name="phone" dir="rtl">
                                                <i
                                                    class="feather-phone position-absolute start-0 top-50 translate-middle-y ms-3"></i>
                                            </div>
                                        </div>

                                        <!-- حقل المدينة -->
                                        @include('components.select-city')
                                        <!-- زر التسجيل -->
                                        <button
                                            class="btn btn-secondary register-btn mt-4 w-100 d-flex align-items-center justify-content-center"
                                            type="submit">
                                            تسجيل
                                            <i class="feather-arrow-right-circle me-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- /Best Services -->

        <!-- Testimonials -->
        <section class="section our-testimonials">
            <div class="container">
                <div class="section-heading aos" data-aos="fade-up">
                    <h2>شركاء النجاح لـ <span>المسابقة الرمضانية للترند السعودي</span></h2>
                    <p class="sub-title">الرعاة وشركاء النجاح في المسابقة </p>
                </div>
                <div class="row">


                    <!-- Testimonials Slide -->
                    <div class="brand-slider-group aos" data-aos="fade-up">
                        <div class="owl-carousel testimonial-brand-slider owl-theme">
                            <div class="brand-logos">
                                <img src="assets/img/testimonial-icon-01.svg" alt="Brand">
                            </div>
                            <div class="brand-logos">
                                <img src="assets/img/testimonial-icon-04.svg" alt="Brand">
                            </div>
                            <div class="brand-logos">
                                <img src="assets/img/testimonial-icon-03.svg" alt="Brand">
                            </div>
                            <div class="brand-logos">
                                <img src="assets/img/testimonial-icon-04.svg" alt="Brand">
                            </div>
                            <div class="brand-logos">
                                <img src="assets/img/testimonial-icon-05.svg" alt="Brand">
                            </div>
                            <div class="brand-logos">
                                <img src="assets/img/testimonial-icon-03.svg" alt="Brand">
                            </div>
                            <div class="brand-logos">
                                <img src="assets/img/testimonial-icon-04.svg" alt="Brand">
                            </div>
                        </div>
                    </div>
                    <!-- /Testimonials Slide -->

                </div>
            </div>
        </section>
        <!-- /Testimonials -->
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
