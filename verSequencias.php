<!DOCTYPE html>
<html>


<head>
    <meta charset="UTF-8">
    <title>Carregar arquivo</title>
    <link rel="stylesheet" href="css/estilo.css">

</head>

<body>
    <form action="" method="post">
        <label for="failename">Escreva o nome do arquivo que deseja carregar:</label>
        <input type="text" id="filename" name="filename" placeholder="filename.json"><br>
        <input type="submit" value="Carregar">
    </form>
    <?php
    $filename = isset($_POST['filename']) ? $_POST['filename'] : "sequencia1.json";
    $arquivo = file_get_contents($filename);
    $json = json_decode($arquivo);
    $totalelementos = count($json);
    $media = 0;
    $razao = 0;
    $sequencia = "";
    foreach ($json as $value) {
        echo $value . "<br>";
        $media = $media + $value;
    }
    if ($json[1] / $json[0] == $json[2] / $json[1]) {
        $sequencia = "PG";
        $razao = $json[1] / $json[0];
    } else {
        $sequencia = "PA";
        $razao = $json[1] - $json[0];
    }


    echo "a1: " . $json[0] . "<br>";
    echo "Razão: " . $razao . "<br>";
    echo "Sequencia: " . $sequencia . "<br>";
    echo "Quantidade de numeros: " . count($json) . "<br>";
    echo "Somatoria: " . $media . "<br>";
    echo "Media: " . $media / count($json) . "<br>";
    $mediana = 0;
    if (count($json) % 2 == 0) {
        $mediana = ($json[$totalelementos] + $json[$totalelementos + 1]) / 2;
    } else {
        $mediana = $json[ceil(($totalelementos / 2)) - 1];
    }
    echo "Mediana: " . $mediana;

    ?>
    <div id="chart_div"></div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart', 'line']
        });
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {
            var dados = <?= json_encode($json) ?>;
            var data = new google.visualization.DataTable();
            data.addColumn('number', 'X');
            data.addColumn('number', 'RESULTADO');
            for (var index = 0; index < dados.length; index++) {
                data.addRows([[index+1, dados[index]]]);
            }
            var options = {
                hAxis: {
                    title: 'posição'
                },
                vAxis: {
                    title: 'resultado'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>
</body>


</html>