<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/chartColumn.css">
</head>

<body>
    <input type="month" onChange="changeDate()" id="input-date">
    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">
            Chart showing browser market shares. Clicking on individual columns
            brings up more detailed data. This chart makes use of the drilldown
            feature in Highcharts to easily switch between datasets.
        </p>
    </figure>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        function changeDate() {
            const month = $('#input-date').val();
            $.ajax({
                    url: "get_sold_by_month.php",
                    dataType: "json",
                    data: {
                        month
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
                    getChart(month, arr, arrDetail);

                });
        }

        function getChart(month, arr, arrDetail) {
            console.log(arrDetail);
            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    align: 'left',
                    text: 'Tổng số sản phẩm bán được trong tháng ' + month
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
    </script>
</body>

</html>