@inject('dashboard', 'App\Models\Dashboard\Dashboard')
<!-- Jquery Page Js -->
<script src="{{ url('public/assets') }}/js/theme.js"></script>
{{-- <script src="{{ url('public/assets') }}/js/bundle/swiper.bundle.js"></script> --}}
<script src="{{ url('public/assets') }}/js/bundle/owlcarousel.bundle.js"></script>
<!-- Plugin Js -->
<script src="{{ url('public/assets') }}/js/bundle/apexcharts.bundle.js"></script>
<!-- Vendor Script -->
<script src="{{ url('public/assets') }}/js/bundle/apexcharts.bundle.js"></script>
<script src="{{ url('public/assets') }}/js/bundle/daterangepicker.bundle.js"></script>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?php
$yearData = $dashboard->this_year_sales();
?>
<script>
    // recent invoices Carousel
    $('#recent_invoices').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 4,
                nav: true,
                loop: false
            },
            1400: {
                items: 5,
                nav: true,
                loop: false
            }
        }
    })
</script>
<script>
    // Carousel
    var owl = $('#owl_banner');
    owl.owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        nav: true,
        dots: false,
        responsive: {
            320: {
                items: 1
            },
        }
    });
</script>

<script>
    $(function() {
        // Net Sales
        var options = {
            series: [{
                name: "Online",
                data: [<?php echo $yearData['online']; ?>]
            }, {
                name: "Offline",
                data: [<?php echo $yearData['offline']; ?>]
            }],
            chart: {
                height: 300,
                type: 'line',
                dropShadow: {
                    enabled: true,
                    color: '#000',
                    top: 13,
                    left: 7,
                    blur: 5,
                    opacity: 0.1
                },
                toolbar: {
                    show: false
                }
            },
            colors: ['var(--chart-color3)', 'var(--chart-color5)'],
            dataLabels: {
                enabled: true,
            },
            stroke: {
                curve: 'smooth'
            },
            grid: {
                borderColor: 'var(--border-color)',
                row: {
                    colors: ['var(--border-color)',
                        'transparent'
                    ], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            markers: {
                size: 1
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Auc', 'Nov',
                    'Dec'
                ],
                title: {
                    text: 'Month'
                }
            },
            yaxis: {
                title: {
                    text: 'Sales Statistics Restaurant 360'
                },
                min: 5000,
                max: 200000
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                floating: true,
                offsetY: -25,
                offsetX: -5
            }
        };
        var chart = new ApexCharts(document.querySelector("#apex-NetSales"), options);
        chart.render();
        // TICKETS sold
        var options = {
            series: [75, 12, 67, 29],
            chart: {
                height: 340,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    offsetY: 0,
                    startAngle: 0,
                    endAngle: 270,
                    hollow: {
                        margin: 1,
                        size: '30%',
                        background: 'transparent',
                        image: undefined,
                    },
                    dataLabels: {
                        name: {
                            show: true,
                        },
                        value: {
                            show: true,
                        }
                    }
                }
            },
            colors: ['var(--chart-color1)', 'var(--chart-color2)', 'var(--chart-color3)',
                'var(--chart-color4)'
            ],
            labels: ['Total', 'Personal', 'Business', 'Premium'],
            legend: {
                show: true,
                floating: true,
                fontSize: '12px',
                position: 'left',
                offsetX: 10,
                offsetY: 10,
                labels: {
                    useSeriesColors: true,
                },
                markers: {
                    size: 0
                },
                formatter: function(seriesName, opts) {
                    return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
                },
                itemMargin: {
                    vertical: 3
                }
            },
        };
        var chart = new ApexCharts(document.querySelector("#apex-Tickets"), options);
        chart.render();
    });
    $(function() {
        $('#myDataTable_no_filter').addClass('nowrap').dataTable({
            responsive: true,
            searching: false,
            paging: false,
            ordering: false,
            info: false,
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#myTable').addClass('nowrap').dataTable({
            responsive: true
        });





        // date range picker

        $(function() {
            $('#daterange').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') +
                    ' to ' + end.format('YYYY-MM-DD'));
            });
        })



    });
</script>
