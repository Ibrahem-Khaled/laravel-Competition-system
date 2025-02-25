<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اختيار مستخدم عشوائي - رمضان كريم</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    @include('components.head')
    <style>
        body {
            background: url("{{ asset('assets2/img/bg/banner.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            color: white;
        }

        .ramadan-container {
            text-align: center;
            padding: 50px;
            background: rgba(0, 0, 0, 0.5);
            /* خلفية شبه شفافة */
            border-radius: 15px;
            margin: 50px auto;
            max-width: 600px;
        }

        .ramadan-title {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 30px;
            color: rgb(170, 244, 12);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .ramadan-button {
            background-color: rgb(170, 244, 12, 0.5);
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .ramadan-button:hover {
            background-color: #28a745;
            transform: scale(1.05);
        }

        .user-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 20px;
            margin-top: 30px;
            display: none;
            animation: fadeIn 1s ease-in-out;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .user-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 2px solid rgb(170, 244, 12);
        }

        .user-card h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: rgb(170, 244, 12);
        }

        .user-card p {
            font-size: 18px;
            margin: 5px 0;
        }

        .user-card .start-question-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 15px;
        }

        .user-card .start-question-btn:hover {
            background-color: #218838;
        }

        .random-selection {
            font-size: 34px;
            font-weight: bold;
            margin-top: 20px;
            color: #000000;
            display: none;
            width: 100%;
            height: 100px;
            text-align: center;
            line-height: 100px;
            background-color: yellow;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* زخرفة رمضانية */
        .ramadan-decoration {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 100px;
            height: 100px;
            background: url('https://www.clipartmax.com/png/middle/3-38205_ramadan-kareem-png-transparent-image-ramadan-kareem-png.png') no-repeat center center;
            background-size: contain;
            z-index: 1;
        }

        .ramadan-decoration.right {
            left: auto;
            right: 20px;
        }
    </style>
</head>

<body>
    @include('components.header')
    <!-- زخرفة رمضانية -->
    <div class="ramadan-decoration"></div>
    <div class="ramadan-decoration right"></div>

    <div class="ramadan-container">
        <h1 class="ramadan-title">رمضان كريم 🌙</h1>
        <h3 class="text-white mb-4">مسابقة الترند السعودي</h3>
        <button class="ramadan-button animate__animated animate__pulse" id="random-user-btn">
            اختر مستخدم عشوائي
        </button>

        <div class="random-selection" id="random-selection">
            جاري الاختيار...
        </div>

        <div class="user-card" id="user-card">
            <img src="" alt="صورة المستخدم" id="user-avatar">
            <h3 id="user-name"></h3>
            <p id="user-phone"></p>
            <button class="start-question-btn" id="start-question-btn">ابدأ السؤال</button>
        </div>
    </div>

    @include('components.footer')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // إعداد CSRF Token لجميع طلبات AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let selectedUserId = null; // لتخزين id المستخدم المختار

            // عند النقر على زر "اختر مستخدم عشوائي"
            $('#random-user-btn').click(function() {
                // إخفاء البطاقة إذا كانت ظاهرة
                $('#user-card').hide();

                // عرض رسالة "جاري الاختيار..."
                $('#random-selection').fadeIn();

                // قائمة أسماء وهمية للاختيار العشوائي
                const fakeNames = [
                    "محمد", "أحمد", "علي", "فاطمة", "خالد", "ليلى", "يوسف", "سارة", "عمر", "زينب"
                ];

                // عدد المرات التي سيتم فيها تغيير الاسم
                const iterations = 10;

                // وقت التأخير بين كل تغيير (بالمللي ثانية)
                const delay = 200;

                // بدء تأثير الاختيار العشوائي
                let currentIteration = 0;
                const randomSelectionInterval = setInterval(() => {
                    // اختيار اسم عشوائي من القائمة
                    const randomName = fakeNames[Math.floor(Math.random() * fakeNames.length)];
                    $('#random-selection').text(`جاري الاختيار: ${randomName}`);

                    // زيادة العداد
                    currentIteration++;

                    // إيقاف التأثير عند الوصول إلى عدد التكرارات المحدد
                    if (currentIteration >= iterations) {
                        clearInterval(randomSelectionInterval);

                        // جلب المستخدم العشوائي الحقيقي من الخادم
                        $.ajax({
                            url: "{{ route('ramadan.random-user') }}",
                            method: 'GET',
                            success: function(response) {
                                if (response.success) {
                                    const user = response.user;

                                    // تخزين id المستخدم المختار
                                    selectedUserId = user.id;

                                    // إخفاء رسالة "جاري الاختيار..."
                                    $('#random-selection').fadeOut();

                                    // عرض بيانات المستخدم
                                    $('#user-name').text(user.name);
                                    $('#user-phone').text(user.phone);
                                    $('#user-avatar').attr('src',
                                        'https://cdn-icons-png.flaticon.com/128/149/149071.png'
                                    );

                                    // إظهار البطاقة
                                    $('#user-card').fadeIn();
                                } else {
                                    alert(response.message);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('حدث خطأ أثناء جلب البيانات:', error);
                            }
                        });
                    }
                }, delay);
            });

            // عند النقر على زر "ابدأ السؤال"
            $('#start-question-btn').click(function() {
                if (selectedUserId) {
                    // توجيه المستخدم إلى صفحة السؤال مع id المستخدم
                    window.location.href = `/questions/${selectedUserId}`;
                } else {
                    alert('لم يتم اختيار مستخدم بعد.');
                }
            });
        });
    </script>
</body>

</html>
