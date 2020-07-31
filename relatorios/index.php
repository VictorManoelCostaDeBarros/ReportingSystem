<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório do mês</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
       .grafico{
            margin:0 auto;
            width: 50%;
        }
        .center{
            max-width:960px;
            margin: 0 auto;
        }

        header{
            padding:10px 0;
            background: gray;
        }

        header a{
            color:white;
            font-size: 23px;
        }
    </style>
</head>
<body>
    <header>
        <div class="center">
            <a href="#">Atualizar Gráfico!</a>
        </div>
    </header>

    <div class="grafico">
        <canvas id="myChart" width="400" height="400"></canvas>   
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Janeiro', 'Fevereiro', 'Março' ],
        datasets: [{
            label: '# of Votes',
            data: [0, 0, 0],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});


    $('a').click(function(e){
        e.preventDefault()
        atualizarGrafico()
    })

    function atualizarGrafico(){
        $.ajax({
        url:'info.php',
        dataType:'json',
        success:function(dataInfo){
            myChart.destroy();
            myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Janeiro', 'Fevereiro', 'Março' ],
                datasets: [{
                    label: '# receita do mê',
                    data: [dataInfo[0].valor, dataInfo[1].valor, dataInfo[2].valor],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        }
    })
    }
</script>
</body>
</html>