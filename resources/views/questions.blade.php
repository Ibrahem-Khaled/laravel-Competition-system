<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض الأسئلة</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('components.head')
    <style>
        body {
            background: url("{{ asset('assets2/img/bg/banner.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            color: white;
        }

        .card {
            width: 300px;
            height: 300px;
            margin: 20px;
            perspective: 1000px;
            cursor: pointer;
            display: inline-block;
            position: relative;
            border: none;
            background: transparent;
        }

        .card-inner {
            width: 100%;
            height: 100%;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.8s;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card.flipped .card-inner {
            transform: rotateY(180deg);
        }

        .card-front,
        .card-back {
            width: 100%;
            height: 100%;
            position: absolute;
            backface-visibility: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
        }

        .card-front {
            background: linear-gradient(135deg, #fff, #9ef1b2);
            color: #333;
            font-size: 100px;
            font-weight: bold;
        }

        .card-back {
            background: linear-gradient(135deg, #a1c4fd, #c2e9fb);
            color: #333;
            transform: rotateY(180deg);
            font-size: 18px;
        }

        /* تنسيق البطاقات المفتوحة مسبقاً */
        .card.opened .card-front,
        .card.opened .card-back {
            opacity: 0.5;
            /* جعل البطاقة معتمة */
        }

        .card.opened::after {
            content: "مفتوح مسبقاً";
            position: absolute;
            top: 85%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            z-index: 10;
            width: 250px;
            background-color: red;
        }

        .no-questions {
            font-size: 24px;
            color: #555;
            text-align: center;
            margin-top: 50px;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            width: 350px;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }

        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 999;
            animation: fadeIn 0.5s ease-in-out;
        }

        .popup .logo {
            position: absolute;
            top: 15px;
            left: 15px;
            width: 40px;
            height: 40px;
        }

        .popup .question {
            font-size: 20px;
            font-weight: bold;
            margin: 20px 0;
        }

        .popup .timer {
            font-size: 18px;
            font-weight: bold;
            color: #ff6b6b;
            margin-top: 15px;
        }

        .popup .no-question-message {
            font-size: 20px;
            color: #ff6b6b;
            font-weight: bold;
        }

        .popup .answer-buttons {
            margin-top: 20px;
        }

        .popup .answer-buttons button {
            margin: 5px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .popup .answer-buttons .btn-correct {
            background-color: #28a745;
            color: white;
        }

        .popup .answer-buttons .btn-incorrect {
            background-color: #dc3545;
            color: white;
        }

        .lottie-animation {
            width: 150px;
            height: 150px;
            margin: 0 auto;
        }

        .user-info {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 25px;
            margin: 20px auto;
            max-width: 800px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            animation: slideIn 1s ease-in-out;
            display: flex;
            justify-content: space-around;
        }

        .user-info h3 {
            font-size: 28px;
            font-weight: bold;
            color: #000;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .user-info p {
            font-size: 18px;
            color: #444;
            margin-bottom: 10px;
        }

        .user-info .icon {
            margin-left: 10px;
            color: #4CAF50;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }


        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    @include('components.header')

    <!-- Main Content -->
    <div style="
            flex: 1;
            padding-bottom: 100px; /* مساحة للفوتير */
        ">
        <div class="container text-center mt-5">
            <h1 class="text-white">مسابقة الترند السعودي</h1>
            <div class="user-info animate__animated animate__slideInDown">
                <h3><i class="fas fa-user-circle icon"></i>مرحباً، {{ $user->name }}!</h3>
                <p><i class="fas fa-phone icon"></i>رقم الهاتف: {{ $user->formatted_phone }} </p>
            </div>

            <h1 class="mb-4">الاسئلة</h1>
            <div class="questions-container">
                @if ($questions->isEmpty())
                    <div class="no-questions animate__animated animate__fadeIn">
                        حظ أوفر! لا توجد أسئلة متاحة.
                    </div>
                @else
                    @foreach ($questions as $question)
                        <div class="card {{ $question->is_active ? '' : 'opened' }}" data-id="{{ $question->id }}"
                            data-duration="{{ $question->duration ?? 30 }}">
                            <div class="card-inner">
                                <div class="card-front">
                                    <span>{{ $question->mark_question }}</span> <!-- علامة السؤال -->
                                </div>
                                <div class="card-back">
                                    <div class="question">{{ $question->question }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- Popup لعرض السؤال -->
    <div class="popup-overlay"></div>
    <div class="popup">
        <img src="{{ asset('assets/img/logo2-03.png') }}" alt="شعار" class="logo">
        <div class="question"></div>
        <div class="timer"></div>
        <div class="answer-buttons">
            <button class="btn-correct">صح</button>
            <button class="btn-incorrect">خطأ</button>
        </div>
        <div class="no-question-message" style="display: none;">
            <lottie-player src="https://lottie.host/3208afb7-ebb9-472b-b6d0-129d37b5bb72/f3K5X7TsbE.json"
                background="transparent" speed="1" loop autoplay class="lottie-animation"></lottie-player>
            حظ أوفر!
        </div>
        <div class="correct-animation" style="display: none;">
            <lottie-player src="https://lottie.host/5b5b5b5b-5b5b-5b5b-5b5b-5b5b5b5b5b5b/5b5b5b5b5b5b.json"
                background="transparent" speed="1" loop autoplay class="lottie-animation"></lottie-player>
            إجابة صحيحة!
        </div>
        <div class="incorrect-animation" style="display: none;">
            <lottie-player src="https://lottie.host/3208afb7-ebb9-472b-b6d0-129d37b5bb72/f3K5X7TsbE.json"
                background="transparent" speed="1" loop autoplay class="lottie-animation"></lottie-player>
            إجابة خاطئة!
        </div>
    </div>

    <!-- Footer -->
    @include('components.footer')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script>
        $(document).ready(function() {
            // عند النقر على البطاقة
            $('.card').click(function() {
                const questionId = $(this).data('id');
                const duration = $(this).data('duration');
                const questionText = $(this).find('.question').text();

                // عرض Popup
                if (questionText.trim() === "") {
                    $('.popup .question').hide();
                    $('.popup .timer').hide();
                    $('.popup .answer-buttons').hide();
                    $('.popup .no-question-message').show();
                } else {
                    $('.popup .question').text(questionText).show();
                    $('.popup .timer').show();
                    $('.popup .answer-buttons').show();
                    $('.popup .no-question-message').hide();
                }

                $('.popup, .popup-overlay').fadeIn();

                // بدء العداد
                if (questionText.trim() !== "") {
                    let timeLeft = duration;
                    const timer = setInterval(() => {
                        $('.popup .timer').text(`الوقت المتبقي: ${timeLeft} ثانية`);
                        timeLeft--;

                        if (timeLeft < 0) {
                            clearInterval(timer);
                            $('.popup, .popup-overlay').fadeOut();
                        }
                    }, 1000);
                }

                // تحديث حالة السؤال إلى "تم فتحه"
                if (!$(this).hasClass('updated')) {
                    $.ajax({
                        url: `/dashboard/questions/${questionId}/update-status`,
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log('تم تحديث حالة السؤال');
                        }
                    });
                    $(this).addClass('updated');
                }
            });

            // عند النقر على زر "صح"
            $('.btn-correct').click(function() {
                $('.popup .answer-buttons').hide();
                $('.popup .correct-animation').show();
                setTimeout(() => {
                    $('.popup, .popup-overlay').fadeOut();
                }, 3000); // إغلاق الـ Popup بعد 3 ثواني
            });

            // عند النقر على زر "خطأ"
            $('.btn-incorrect').click(function() {
                $('.popup .answer-buttons').hide();
                $('.popup .incorrect-animation').show();
                setTimeout(() => {
                    $('.popup, .popup-overlay').fadeOut();
                }, 3000); // إغلاق الـ Popup بعد 3 ثواني
            });

            // إغلاق Popup عند النقر خارجها
            $('.popup-overlay').click(function() {
                $('.popup, .popup-overlay').fadeOut();
            });
        });
    </script>
</body>

</html>
