<div class="card">
    <div class="card-header pb-0 text-left">
        <h2 class="font-weight-bolder text-info text-gradient">Reports</h2>
    </div>
    <div class="card-body">
        <h4> Financial report</h4>
        <div class="flex-row">
            <label>Select a year</label>
            <select name="financialReportYear" id="financialReportYear" class="form-control mb-2">
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>
        </div>
        <div class="chart">
            <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                </div>
                <div class="chartjs-size-monitor-shrink">
                    <div class="">
                    </div>
                </div>
            </div>
            <div id="financialReport">
                <canvas id="financialLineChart" style="" class="chartjs-render-monitor"></canvas>
            </div>

        </div>
        <div class="mb-3 mt-6">
            <h4>Monthly income from each brand</h4>
            <select name="year" id="year" class="form-control mb-2">
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>
            <select name="month" id="month" class="form-control">
                <option value="1">January</option>
                <option value = "2">February</option>
                <option value = "3">March</option>
                <option value = "4">April</option>
                <option value = "5">May</option>
                <option value = "6">June</option>
                <option value = "7">July</option>
                <option value = "8">August</option>
                <option value = "9">September</option>
                <option value = "10">October</option>
                <option value = "11">November</option>
                <option value = "12">December</option>
            </select>
            <div id="mesec">
                <canvas id="monthlyIncome" style="" class="chartjs-render-monitor"></canvas>
            </div>
            <div>
                <h4>Items sold</h4>
                <div>
                    <label>From</label>
                    <input type="date" class="form-control-sm" id="datumOd">
                    <label>To</label>
                    <input type="date" class="form-control-sm" id="datumDoDaske">
                    <a href='javascript:;' class='m-lg-3 p-2 m-0 btn btn-add-to-cart bg-gradient-dark'>Check</a>
                </div>
                <div id="prodatiUredjajiDiv">
                    <canvas id="prodatiUredjaji" style="" class="chartjs-render-monitor"></canvas>
                </div>
            </div>

        </div>
    </div>
</div>

<script>


    $('#financialReportYear').change(function(){

        $("#financialReport").empty();
        $("#financialReport").append(' <canvas id="financialLineChart"'+' style="" '+'class="chartjs-render-monitor"></canvas>');

        var financialReportYear = document.getElementById("financialReportYear").value;

        var data = {"financialReportYear":financialReportYear};
        var sumOfOrdersURL = "/api/sumOfOrders";

        $.getJSON(sumOfOrdersURL,data, function(result){
            var dataValues = result.map(function (e) {
                return e.total_price;
            });
            var graph = $("#financialLineChart").get(0).getContext('2d');

            createSumOfOrdersGraph(dataValues,graph);
        })
    });

    $('#month').change( function(){


        $("#mesec").empty();
        $("#mesec").append('<canvas id="monthlyIncome"'+' style="" '+'class="chartjs-render-monitor"></canvas>');

        var soldForOneMonth = "/api/soldForOneMonth";
        var monthSelected = document.getElementById("month").value;
        var yearSelected = document.getElementById("year").value;
        var data = {"yearSelected":yearSelected , "monthSelected":monthSelected};

        $.getJSON(soldForOneMonth, data, function(result){
            var dataValues = result.map(function (e) {
                return e.suma;
            });
            console.log(dataValues);

            var graph = $("#monthlyIncome").get(0).getContext('2d');

            createSoldForOneMonthGraph(dataValues,graph);
        })
    });

    function createSoldForOneMonthGraph(dataValues,graph)
    {
        new Chart(graph, {
            type: 'bar',
            data: {
                labels: ['Apple', 'LG', 'Samsung', 'Xaomi'],
                datasets: [{
                    backgroundColor:['red','blue','green','yellow'],
                    label: 'Monthly income from each brand',
                    data: dataValues,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        scaleLabel: {
                            display: true,
                            labelString: "$"
                        }
                    }
                    },
            }
        });
    }

    function createSumOfOrdersGraph(dataValues,graph)
    {
        new Chart(graph, {
            type: 'line',
            data: {
                labels: ["January","February","March","April","May","June","July","August","September","October","November","December"],
                datasets: [{
                    label: "Financial report",
                    data: dataValues,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
            }
        });
    }

    $(document).on('click','.btn-add-to-cart', function(){

        $("#prodatiUredjajiDiv").empty();
        $("#prodatiUredjajiDiv").append('<canvas id="prodatiUredjaji"'+' style="" '+'class="chartjs-render-monitor"></canvas>');

        var modelsSoldApi = "/api/modelsSold";
        var datumOd = document.getElementById("datumOd").value;
        var datumDo = document.getElementById("datumDoDaske").value;


        var data = {
            "datumOd":datumOd ,
            "datumDoDoDo":datumDo
        }

        $.getJSON(modelsSoldApi, data, function(result){
            var dataValues = result.map(function (e) {
                return e;
            })

            var models = dataValues.map(x=>x.model);
            var modelsSold = dataValues.map(x=>x.modelsSold);

            console.log(models);
            console.log(modelsSold);

            var graph = $("#prodatiUredjaji").get(0).getContext('2d');

            crtajPieChart(models,modelsSold,graph);

        });

    })

    function crtajPieChart(models,modelsSold,graph)
    {
        console.log(models);
        console.log(modelsSold);

        new Chart(graph, {
            type: 'bar',
            data: {
                labels: models,
                datasets: [{
                    backgroundColor: ['orange', 'green', 'gray', 'purple','red','blue'],
                    label: 'Qunatity of sold itesm',
                    data: modelsSold,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        scaleLabel: {
                            display: true,
                            labelString: "$"
                        }
                    }
                },
            }
        });

    }
</script>
