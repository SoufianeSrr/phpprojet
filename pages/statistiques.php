<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
  if(isset($_SESSION['employe'])){
?>
<script src="script/chart.js" type="text/javascript"></script>

<div>
	 <canvas id="myChart" width="230" height="100"></canvas>
            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                $.ajax({
                url: 'controller/gestionStatistique.php',
                        data: {op: ''},
                        type: 'POST',
                        success: function (data, textStatus, jqXHR) {
                                var x = Array();
                                var y = Array();
                                data.forEach(function (e) {
                                x.push(e.code);
                                        y.push(e.nbr);
                                });
                                showGraph(x, y);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                        }
                });
                        var haha= [
                        'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                        ];
                function showGraph(x, y) {
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: x,
                            datasets: [{
                                    data: y,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                        },
                        options: {
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'right',
                                    labels: {
                                        generateLabels: function (chart) {
                                            return chart.data.labels.map(function (label, i) {
                                                return {
                                                    text: label,
                                                    fillStyle: haha[i],
                                                };
                                            });
                                        }
                                    }
                                },
                                title: {
                                    display: true,
                                    text: 'Nombre des classes par filière'
                                }
                            },
                            scales: {
                                y: {
                                    title: {
                                        display: true,
                                        text: 'Nombre des classes'
                                    }
                                },
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Filière'
                                    }
                                }
                            }
                        }
                    });
                }
            </script>
</div>
<div class="container-fluid" style="margin-top: 5%;">
    <div class="">
        <p class="h2 text-center text-dark text-uppercase font-weight-bold"><a href="./index.php?p=filiere" class="col-md-6 col-lg-3">Gestion Filieres</a>   <a href="./index.php?p=fonction" class="col-md-6 col-lg-3">Gestion Classes</a></p>
        <hr class="line-seprate">
        
    </div>
</div>
<script src="script/statistique.js" type="text/javascript"></script>
<?php
}
else{
  header("Location: ../index.php");
}
 ?>