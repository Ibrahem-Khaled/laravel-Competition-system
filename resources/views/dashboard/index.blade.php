@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <!-- إحصائيات سريعة -->
        <div class="row mb-4">
            <!-- عدد المسجلين -->
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card shadow-lg bg-primary text-white h-100">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="mb-1">المسجلين</h5>
                                <h2 class="font-weight-bold">48,723</h2>
                                <span class="badge bg-white text-primary">+12% عن الشهر الماضي</span>
                            </div>
                            <div class="icon icon-shape bg-white shadow rounded-circle">
                                <i class="fas fa-users fa-2x text-primary"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <small>أحدث التسجيلات: أحمد محمد, سارة علي</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- عدد الرعاة -->
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card shadow-lg bg-success text-white h-100">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="mb-1">الرعاة</h5>
                                <h2 class="font-weight-bold">2,345</h2>
                                <span class="badge bg-white text-success">+8 شركات جديدة</span>
                            </div>
                            <div class="icon icon-shape bg-white shadow rounded-circle">
                                <i class="fas fa-handshake fa-2x text-success"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <small>أحدث الرعاة: شركة X, شركة Y</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- عدد الفائزين -->
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card shadow-lg bg-warning text-white h-100">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="mb-1">الفائزين</h5>
                                <h2 class="font-weight-bold">1,234</h2>
                                <span class="badge bg-white text-warning">+5 فائزين هذا الأسبوع</span>
                            </div>
                            <div class="icon icon-shape bg-white shadow rounded-circle">
                                <i class="fas fa-trophy fa-2x text-warning"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <small>آخر الفائزين: محمد خالد, فاطمة علي</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- عدد زوار الموقع -->
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card shadow-lg bg-danger text-white h-100">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="mb-1">زوار الموقع</h5>
                                <h2 class="font-weight-bold">1.2M</h2>
                                <span class="badge bg-white text-danger">+20% عن الشهر الماضي</span>
                            </div>
                            <div class="icon icon-shape bg-white shadow rounded-circle">
                                <i class="fas fa-chart-line fa-2x text-danger"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <small>أعلى زيارة اليوم: 12,345 زيارة</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- رسوم بيانية وإحصائيات تفصيلية -->
        <div class="row">
            <!-- رسم بياني لعدد الزيارات -->
            <div class="col-xl-6 mb-4">
                <div class="card shadow-lg h-100">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">إحصائيات زيارات الموقع</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="visitsChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- رسم بياني لتوزيع المسجلين -->
            <div class="col-xl-6 mb-4">
                <div class="card shadow-lg h-100">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">توزيع المسجلين حسب المنطقة</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="usersDistributionChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- جدول بأحدث المسجلين -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">أحدث المسجلين</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>تاريخ التسجيل</th>
                                    <th>الحالة</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>أحمد محمد</td>
                                    <td>ahmed@example.com</td>
                                    <td>2023-10-01</td>
                                    <td><span class="badge bg-success">نشط</span></td>
                                </tr>
                                <tr>
                                    <td>سارة علي</td>
                                    <td>sara@example.com</td>
                                    <td>2023-09-28</td>
                                    <td><span class="badge bg-warning">غير نشط</span></td>
                                </tr>
                                <!-- يمكن إضافة المزيد من الصفوف -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- إضافة Chart.js للرسوم البيانية -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // رسم بياني لعدد الزيارات
        const visitsCtx = document.getElementById('visitsChart').getContext('2d');
        const visitsChart = new Chart(visitsCtx, {
            type: 'line',
            data: {
                labels: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو'],
                datasets: [{
                    label: 'عدد الزيارات',
                    data: [12000, 19000, 3000, 5000, 2000, 30000],
                    borderColor: '#4e73df',
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                    }
                }
            }
        });

        // رسم بياني لتوزيع المسجلين
        const usersCtx = document.getElementById('usersDistributionChart').getContext('2d');
        const usersChart = new Chart(usersCtx, {
            type: 'doughnut',
            data: {
                labels: ['الرياض', 'جدة', 'الدمام', 'مكة', 'المدينة'],
                datasets: [{
                    label: 'عدد المسجلين',
                    data: [1200, 1900, 300, 500, 200],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                    }
                }
            }
        });
    </script>
@endsection
