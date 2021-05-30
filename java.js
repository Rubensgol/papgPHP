
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var dados=<?= json_encode($json) ?>;
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'X');
        data.addColumn('number', 'Numero');
        for (let index = 0; index < dados.length; index++) {
            data.addRows([index,dados[index]]);
            
        }
        
        var options = {
            title: <? echo $sequencia ?>,
            curveType: 'function',
            legend: {
                position: 'bottom'
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
