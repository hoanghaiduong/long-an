<?php $__env->startSection('title', translate('dashboard')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(auth('admin')->user()->admin_role_id==1 || \App\CPU\Helpers::module_permission_check('dashboard')): ?>
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header pb-0 mb-0 border-0">
                <div class="flex-between align-items-center">
                    <div>
                        <h1 class="page-header-title" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"><?php echo e(translate('dashboard')); ?></h1>
                        <p><?php echo e(translate('welcome_message')); ?>.</p>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- Business Analytics -->
            <div class="card mb-2 remove-card-shadow">
                <div class="card-body">
                    <div class="row flex-between align-items-center g-2 mb-3">
                        <div class="col-sm-6">
                            <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0">
                                <img src="<?php echo e(asset('/public/assets/back-end/img/business_analytics.png')); ?>" alt=""><?php echo e(translate('business_analytics')); ?></h4>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-sm-end">
                            <select class="custom-select w-auto" name="statistics_type"
                                    onchange="order_stats_update(this.value)">
                                <option
                                    value="overall" <?php echo e(session()->has('statistics_type') && session('statistics_type') == 'overall'?'selected':''); ?>>
                                    <?php echo e(translate('overall_statistics')); ?>

                                </option>
                                <option
                                    value="today" <?php echo e(session()->has('statistics_type') && session('statistics_type') == 'today'?'selected':''); ?>>
                                    <?php echo e(translate("todays_Statistics")); ?>

                                </option>
                                <option
                                    value="this_month" <?php echo e(session()->has('statistics_type') && session('statistics_type') == 'this_month'?'selected':''); ?>>
                                    <?php echo e(translate("this_Months_Statistics")); ?>

                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-2" id="order_stats">
                        <?php echo $__env->make('admin-views.partials._dashboard-order-stats',['data'=>$data], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
            <!-- End Business Analytics -->


            <!-- Admin Wallet -->
            <div class="card mb-3 remove-card-shadow">
                <div class="card-body">
                    <h4 class="d-flex align-items-center text-capitalize gap-10 mb-3">
                        <img width="20" class="mb-1" src="<?php echo e(asset('/public/assets/back-end/img/admin-wallet.png')); ?>" alt="">
                        <?php echo e(translate('admin_wallet')); ?>

                    </h4>

                    <div class="row g-2" id="order_stats">
                        <?php echo $__env->make('admin-views.partials._dashboard-wallet-stats',['data'=>$data], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
            <!-- End Admin Wallet -->

            <div class="row g-1">
                <div class="col-12">
                    <!-- Card -->
                    <div class="card remove-card-shadow">
                        <!-- Body -->
                        <div class="card-body">
                            <div class="row g-2 align-items-center">
                                <div class="col-md-6">
                                    <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0">
                                        <img src="<?php echo e(asset('/public/assets/back-end/img/earning_statictics.png')); ?>" alt="">
                                        <?php echo e(translate('earning_statistics')); ?>

                                    </h4>
                                </div>
                                <div class="col-md-6 d-flex justify-content-md-end">
                                    <ul class="option-select-btn">
                                        <li>
                                            <label class="basic-box-shadow">
                                                <input type="radio" name="statistics2" hidden="" checked="">
                                                <span data-earn-type="yearEarn"
                                                      onclick="earningStatisticsUpdate(this)"><?php echo e(translate('this_Year')); ?></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="basic-box-shadow">
                                                <input type="radio" name="statistics2" hidden="">
                                                <span data-earn-type="MonthEarn"
                                                      onclick="earningStatisticsUpdate(this)"><?php echo e(translate('this_Month')); ?></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="basic-box-shadow">
                                                <input type="radio" name="statistics2" hidden="">
                                                <span data-earn-type="WeekEarn"
                                                      onclick="earningStatisticsUpdate(this)"><?php echo e(translate('this_Week')); ?></span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- End Row -->

                            <!-- Bar Chart -->
                            <div class="chartjs-custom mt-2" id="set-new-graph">
                                <canvas id="updatingData"
                                        data-hs-chartjs-options='{
                                            "type": "bar",
                                            "data": {
                                              "labels": ["Jan","Feb","Mar","April","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                                              "datasets": [{
                                                "label": "<?php echo e(translate('in-house')); ?>",
                                                "data": [<?php echo e($inhouse_data[1]); ?>,<?php echo e($inhouse_data[2]); ?>,<?php echo e($inhouse_data[3]); ?>,<?php echo e($inhouse_data[4]); ?>,<?php echo e($inhouse_data[5]); ?>,<?php echo e($inhouse_data[6]); ?>,<?php echo e($inhouse_data[7]); ?>,<?php echo e($inhouse_data[8]); ?>,<?php echo e($inhouse_data[9]); ?>,<?php echo e($inhouse_data[10]); ?>,<?php echo e($inhouse_data[11]); ?>,<?php echo e($inhouse_data[12]); ?>],
                                                "backgroundColor": "#ACDBAB",
                                                "hoverBackgroundColor": "#ACDBAB",
                                                "borderColor": "#ACDBAB"
                                              },
                                              {
                                                "label": "<?php echo e(translate('seller')); ?>",
                                                "data": [<?php echo e($seller_data[1]); ?>,<?php echo e($seller_data[2]); ?>,<?php echo e($seller_data[3]); ?>,<?php echo e($seller_data[4]); ?>,<?php echo e($seller_data[5]); ?>,<?php echo e($seller_data[6]); ?>,<?php echo e($seller_data[7]); ?>,<?php echo e($seller_data[8]); ?>,<?php echo e($seller_data[9]); ?>,<?php echo e($seller_data[10]); ?>,<?php echo e($seller_data[11]); ?>,<?php echo e($seller_data[12]); ?>],
                                                "backgroundColor": "#0177CD",
                                                "borderColor": "#0177CD"
                                              },
                                              {
                                                "label": "<?php echo e(translate('commission')); ?>",
                                                "data": [<?php echo e($commission_data[1]); ?>,<?php echo e($commission_data[2]); ?>,<?php echo e($commission_data[3]); ?>,<?php echo e($commission_data[4]); ?>,<?php echo e($commission_data[5]); ?>,<?php echo e($commission_data[6]); ?>,<?php echo e($commission_data[7]); ?>,<?php echo e($commission_data[8]); ?>,<?php echo e($commission_data[9]); ?>,<?php echo e($commission_data[10]); ?>,<?php echo e($commission_data[11]); ?>,<?php echo e($commission_data[12]); ?>],
                                                "backgroundColor": "#FFB36D",
                                                "borderColor": "#FFB36D"
                                              }]
                                            },
                                            "options": {
                                                "legend": {
                                                    "display": true,
                                                    "position": "top",
                                                    "align": "center",
                                                    "labels": {
                                                        "fontColor": "#758590",
                                                        "fontSize": 14
                                                    }
                                                },
                                                "scales": {
                                                    "yAxes": [{
                                                    "gridLines": {
                                                        "color": "rgba(180, 208, 224, 0.5)",
                                                        "borderDash": [8, 4],
                                                        "drawBorder": false,
                                                        "zeroLineColor": "rgba(180, 208, 224, 0.5)"
                                                    },
                                                    "ticks": {
                                                        "beginAtZero": true,
                                                        "fontSize": 12,
                                                        "fontColor": "#5B6777",
                                                        "padding": 10,
                                                        "postfix": " <?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?>"
                                                    }
                                                    }],
                                                    "xAxes": [{
                                                    "gridLines": {
                                                        "color": "rgba(180, 208, 224, 0.5)",
                                                        "display": true,
                                                        "drawBorder": true,
                                                        "zeroLineColor": "rgba(180, 208, 224, 0.5)"
                                                    },
                                                    "ticks": {
                                                        "fontSize": 12,
                                                        "fontColor": "#5B6777",
                                                        "fontFamily": "Open Sans, sans-serif",
                                                        "padding": 5
                                                    },
                                                    "categoryPercentage": 0.5,
                                                    "maxBarThickness": "7"
                                                    }]
                                                },
                                                "cornerRadius": 3,
                                                "tooltips": {
                                                    "prefix": " ",
                                                    "hasIndicator": true,
                                                    "mode": "index",
                                                    "intersect": false
                                                },
                                                "hover": {
                                                    "mode": "nearest",
                                                    "intersect": true
                                                }
                                            }
                                  }'></canvas>

                            </div>
                            <!-- End Bar Chart -->
                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Total Business Overview -->

                <div class="col-md-6 col-xl-4">
                    <!-- Card -->
                    <div class="card h-100 remove-card-shadow">
                        <?php echo $__env->make('admin-views.partials._top-customer',['top_customer'=>$data['top_customer']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- End Card -->
                </div>

                <!-- Top Store By Order Received -->
                <div class="col-md-6 col-xl-4">
                    <div class="card h-100 remove-card-shadow">
                        <?php echo $__env->make('admin-views.partials._top-store-by-order',['top_store_by_order_received'=>$data['top_store_by_order_received']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
                <!-- End Top Store By Order Received -->

                <div class="col-md-6 col-xl-4">
                    <!-- Card -->
                    <div class="card h-100 remove-card-shadow">
                        <?php echo $__env->make('admin-views.partials._top-selling-store',['top_store_by_earning'=>$data['top_store_by_earning']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-md-6 col-xl-4">
                    <!-- Card -->
                    <div class="card h-100 remove-card-shadow">
                        <?php echo $__env->make('admin-views.partials._most-rated-products',['most_rated_products'=>$data['most_rated_products']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-md-6 col-xl-4">
                    <!-- Card -->
                    <div class="card h-100 remove-card-shadow">
                        <?php echo $__env->make('admin-views.partials._top-selling-products',['top_sell'=>$data['top_sell']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-md-6 col-xl-4">
                    <!-- Card -->
                    <div class="card h-100 remove-card-shadow">
                        <?php echo $__env->make('admin-views.partials._top-delivery-man',['top_deliveryman'=>$data['top_deliveryman']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- End Card -->
                </div>

            </div>
        </div>
    <?php else: ?>
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-12 mb-2 mb-sm-0">
                        <h3 class="text-center"><?php echo e(translate('hi')); ?> <?php echo e(auth('admin')->user()->name); ?>, <?php echo e(translate('welcome_to_dashboard')); ?>.</h3>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/chart.js.extensions/chartjs-extensions.js"></script>
    <script
        src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js"></script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script_2'); ?>
    <script>
        function earningStatisticsUpdate(t) {
            let value = $(t).attr('data-earn-type');

            $.ajax({
                url: '<?php echo e(route('admin.dashboard.earning-statistics')); ?>',
                type: 'GET',
                data: {
                    type: value
                },
                beforeSend: function () {
                    $('#loading').fadeIn();
                },
                success: function (response_data) {
                    document.getElementById("updatingData").remove();
                    let graph = document.createElement('canvas');
                    graph.setAttribute("id", "updatingData");
                    document.getElementById("set-new-graph").appendChild(graph);

                    var ctx = document.getElementById("updatingData").getContext("2d");

                    var options = {
                        responsive: true,
                        bezierCurve: false,
                        maintainAspectRatio: false,
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    color: "rgba(180, 208, 224, 0.5)",
                                    zeroLineColor: "rgba(180, 208, 224, 0.5)",
                                }
                            }],
                            yAxes: [{
                                gridLines: {
                                    color: "rgba(180, 208, 224, 0.5)",
                                    zeroLineColor: "rgba(180, 208, 224, 0.5)",
                                    borderDash: [8, 4],
                                }
                            }]
                        },
                        legend: {
                            display: true,
                            position: "top",
                            labels: {
                                usePointStyle: true,
                                boxWidth: 6,
                                fontColor: "#758590",
                                fontSize: 14
                            }
                        },
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                    };
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [],
                            datasets: [
                                {
                                    label: "<?php echo e(translate('in-house')); ?>",
                                    data: [],
                                    backgroundColor: "#ACDBAB",
                                    hoverBackgroundColor: "#ACDBAB",
                                    borderColor: "#ACDBAB",
                                    fill: false,
                                    lineTension: 0.3,
                                    radius: 0
                                },
                                {
                                    label: "<?php echo e(translate('seller')); ?>",
                                    data: [],
                                    backgroundColor: "#0177CD",
                                    hoverBackgroundColor: "#0177CD",
                                    borderColor: "#0177CD",
                                    fill: false,
                                    lineTension: 0.3,
                                    radius: 0
                                },
                                {
                                    label: "<?php echo e(translate('commission')); ?>",
                                    data: [],
                                    backgroundColor: "#FFB36D",
                                    hoverBackgroundColor: "FFB36D",
                                    borderColor: "#FFB36D",
                                    fill: false,
                                    lineTension: 0.3,
                                    radius: 0
                                }
                            ]
                        },
                        options: options
                    });

                    myChart.data.labels = response_data.inhouse_label;
                    myChart.data.datasets[0].data = response_data.inhouse_earn;
                    myChart.data.datasets[1].data = response_data.seller_earn;
                    myChart.data.datasets[2].data = response_data.commission_earn;

                    myChart.update();
                },
                complete: function () {
                    $('#loading').fadeOut();
                }
            });
        }
    </script>

    <script>
        // INITIALIZATION OF CHARTJS
        // =======================================================
        Chart.plugins.unregister(ChartDataLabels);

        $('.js-chart').each(function () {
            $.HSCore.components.HSChartJS.init($(this));
        });

        var updatingChart = $.HSCore.components.HSChartJS.init($('#updatingData'));
    </script>

    <script>
        var ctx = document.getElementById('business-overview');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    '<?php echo e(translate('customer')); ?> ',
                    '<?php echo e(translate('store')); ?> ',
                    '<?php echo e(translate('product')); ?> ',
                    '<?php echo e(translate('order')); ?> ',
                    '<?php echo e(translate('brand')); ?> ',
                ],
                datasets: [{
                    label: '<?php echo e(translate('business')); ?>',
                    data: ['<?php echo e($data['customer']); ?>', '<?php echo e($data['store']); ?>', '<?php echo e($data['product']); ?>', '<?php echo e($data['order']); ?>', '<?php echo e($data['brand']); ?>'],
                    backgroundColor: [
                        '#041562',
                        '#DA1212',
                        '#EEEEEE',
                        '#11468F',
                        '#000000',
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        $(function(){

            //get the doughnut chart canvas
            var ctx1 = $("#user_overview");

            //doughnut chart data
            var data1 = {
                labels: ["Customer", "Seller", "Delivery Man"],
                datasets: [
                    {
                        label: "User Overview",
                        data: [88297, 34546, 15000],
                        backgroundColor: [
                            "#017EFA",
                            "#51CBFF",
                            "#56E7E7",
                        ],
                        borderColor: [
                            "#017EFA",
                            "#51CBFF",
                            "#56E7E7",
                        ],
                        borderWidth: [1, 1, 1]
                    }
                ]
            };

            //options
            var options = {
                responsive: true,
                cutoutPercentage: 65,
                legend: {
                    display: true,
                    position: "bottom",
                    align: "start",
                    maxWidth: 100,
                    labels: {
                        usePointStyle: true,
                        boxWidth: 6,
                        fontColor: "#758590",
                        fontSize: 14
                    }
                }
            };

            //create Chart class object
            var chart1 = new Chart(ctx1, {
                type: "doughnut",
                data: data1,
                options: options
            });
        });
    </script>

    <script>
        $(function(){
            //get the line chart canvas
            var ctx = $("#order_statictics");

            //line chart data
            var data = {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [
                    {
                        label: "In-house",
                        data: [10000, 50000, 100000, 140000, 40000, 10000, 50000, 100000, 130000, 40000, 80000, 120000],
                        backgroundColor: "#FFB36D",
                        borderColor: "#FFB36D",
                        fill: false,
                        lineTension: 0.3,
                        radius: 2
                    },
                    {
                        label: "Seller",
                        data: [9000, 60000, 110000, 130000, 50000, 29000, 60000, 110000, 100000, 50000, 70000, 90000],
                        backgroundColor: "#0177CD",
                        borderColor: "#0177CD",
                        fill: false,
                        lineTension: 0.3,
                        radius: 2
                    }
                ]
            };

            //options
            var options = {
                responsive: true,
                bezierCurve : false,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        gridLines: {
                            color: "rgba(180, 208, 224, 0.5)",
                            zeroLineColor: "rgba(180, 208, 224, 0.5)",
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            color: "rgba(180, 208, 224, 0.5)",
                            zeroLineColor: "rgba(180, 208, 224, 0.5)",
                            borderDash: [8, 4],
                        }
                    }]
                },
                legend: {
                    display: true,
                    position: "top",
                    labels: {
                        usePointStyle: true,
                        boxWidth: 6,
                        fontColor: "#758590",
                        fontSize: 14
                    }
                }
            };

            //create Chart class object
            var chart = new Chart(ctx, {
                type: "line",
                data: data,
                options: options
            });
        });
    </script>

    <script>
        function order_stats_update(type) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('admin.dashboard.order-stats')); ?>',
                data: {
                    statistics_type: type
                },
                beforeSend: function () {
                    $('#loading').fadeIn();
                },
                success: function (data) {
                    console.log(data)
                    $('#order_stats').html(data.view)
                },
                complete: function () {
                    $('#loading').fadeOut();
                }
            });
        }

        function business_overview_stats_update(type) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('admin.dashboard.business-overview')); ?>',
                data: {
                    business_overview: type
                },
                beforeSend: function () {
                    $('#loading').fadeIn();
                },
                success: function (data) {
                    console.log(data.view)
                    $('#business-overview-board').html(data.view)
                },
                complete: function () {
                    $('#loading').fadeOut();
                }
            });
        }
    </script>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\long-an\resources\views/admin-views/system/dashboard.blade.php ENDPATH**/ ?>