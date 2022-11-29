<body>

    <figure class="highcharts-figure">
        <div id="container-1"></div>
    </figure>
    <script src="/assets/js/jquery-1.11.3.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                    url: "get_revenue.php",
                    dataType: "json",
                    data: {
                        days: 30
                    },
                })
                .done(function(response) {
                    const arrX = Object.keys(response);
                    const arrY = Object.values(response);

                    Highcharts.chart("container-1", {
                        title: {
                            text: "Thống kế doanh thu 30 ngày gần nhất",
                        },

                        yAxis: {
                            title: {
                                text: "Doanh thu",
                            },
                        },

                        xAxis: {
                            categories: arrX
                        },

                        legend: {
                            layout: "vertical",
                            align: "right",
                            verticalAlign: "middle",
                        },

                        plotOptions: {
                            series: {
                                label: {
                                    connectorAllowed: false,
                                },
                            },
                        },

                        series: [{
                            name: "Doanh thu",
                            data: arrY
                        }, ],

                        responsive: {
                            rules: [{
                                condition: {
                                    maxWidth: 500,
                                },
                                chartOptions: {
                                    legend: {
                                        layout: "horizontal",
                                        align: "center",
                                        verticalAlign: "bottom",
                                    },
                                },
                            }, ],
                        },
                    });
                })
        });
    </script>
</body>