<div class="row col-sm-12">
    <div class="col-sm-2 db_label">
        <div>Received</div>
        <span>0.00</span>
    </div>
    <div class="col-sm-2 db_label">
        <label>Spent</label>
        <span>0.00</span>
    </div>
    <div class="col-sm-2 db_label">
        <label>Left</label>
        <span>0.00</span>
    </div>
    <div class="col-sm-2 db_label">
        <label>Loan</label>
        <span>0.00</span>
    </div>
    <div class="col-sm-2 db_label">
        <label>Savings</label>
        <break></break>
        <span>0.00</span>
    </div>

</div>
<div id="container" style="height: 300px"></div>
<script  src="https://code.highcharts.com/highcharts.js"></script>



<script type="text/javascript">
    $(document).ready(function () {





        get_graph();
        function get_graph() {
            fetch("<?php echo url('/get_graph') ?>").then(response => response.json())
                    .then(data => {
                        build_graph(data);
                    });
        }
        function build_graph(db_data) {
            let items = [];
            for (let data of db_data.data) {
                var d = new Date(data.date);
                let temp = [Date.UTC(d.getFullYear(), d.getMonth(), d.getDate()), data.amount]
                items.push(temp);
            }

            Highcharts.chart('container', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Expense report'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    type: 'datetime',
                    dateTimeLabelFormats: {// don't display the dummy year
                        month: '%e. %b',
                        year: '%b'
                    },
                    title: {
                        text: 'Date'
                    }
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    min: 0
                },
                tooltip: {
                    headerFormat: '<b>{series.name}</b><br>',
                    pointFormat: '{point.x:%e. %b}: {point.y:.2f} rs'
                },
                plotOptions: {
                    series: {
                        marker: {
                            enabled: true
                        }
                    }
                },
                colors: ['#6CF', '#39F', '#06C', '#036', '#000'],
                // Define the data points. All series have a dummy year
                // of 1970/71 in order to be compared on the same x axis. Note
                // that in JavaScript, months start at 0 for January, 1 for February etc.
                series: [{
                        name: "Expenses",
                        data: items
                    }],
                responsive: {
                    rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                plotOptions: {
                                    series: {
                                        marker: {
                                            radius: 2.5
                                        }
                                    }
                                }
                            }
                        }]
                }
            });
        }
    });
//https://www.highcharts.com/demo/stock/compare
</script>
<style>
    .db_label{
        background-color: cornflowerblue;
        color: white;
        display: flex;
        /*        align-items: center;*/
        justify-content: space-around;
        margin:10px;
        border-radius:5px;
    }
    break{
        flex-basis: 100%;
        width: 0px;
        height: 0px;
        overflow: hidden;
        display: inline-block;
    }
    .db_label span{
        font-size: xx-large;
    }
</style>
