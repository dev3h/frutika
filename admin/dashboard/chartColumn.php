<body>
    <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>
    <script src="/assets/js/jquery-1.11.3.min.js"></script>
    <script>
        $(document).ready(function() {
            const days = 30;
            $.ajax({
                    url: "get_sold.php",
                    dataType: "json",
                    data: {
                        days
                    },
                })
                .done(function(response) {

                    const arr = Object.values(response[0]);
                    const arrDetail = [];
                    Object.values(response[1]).forEach(each => {
                        each.data = Object.values(each.data);
                        arrDetail.push(each);
                    })
                    // create the chart
                    getChart(arr, arrDetail);

                });

            function getChart(arr, arrDetail) {
                console.log(arrDetail);
                Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        align: 'left',
                        text: 'Tổng số sản phẩm bán được trong ' + days
                    },
                    accessibility: {
                        announceNewData: {
                            enabled: true
                        }
                    },
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        title: {
                            text: 'Tổng số bán được'
                        }

                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y:f}'
                            }
                        }
                    },

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b> total<br/>'
                    },

                    series: [{
                        name: "Sản phẩm",
                        colorByPoint: true,
                        data: arr
                    }],
                    drilldown: {
                        breadcrumbs: {
                            position: {
                                align: 'right'
                            }
                        },
                        series: arrDetail
                    }
                });
            }
        })
    </script>
</body>