<?php
include '../js/function_db.php';
include '../js/session_check.php';
$year = "2018";
/*
$sql = " select count(tre_date) as num1
from tb_treat
where year(tre_date) = '".$year."' and month(tre_date) = '05' ";
$results = selectSql($sql);
foreach ($results as $row) {
  echo $row['num1'];
}*/

$sql = " SELECT MONTH(tre_date) MONTH, COUNT(*) COUNT
FROM tb_treat
WHERE YEAR(tre_date)=2018
GROUP BY MONTH(tre_date) ";
$results = selectSql($sql);
foreach ($results as $row) {
  $i++;
  echo $row['MONTH'];
  echo $row['COUNT'];

}

?>


	<canvas id="myChart" width="400" height="400"></canvas>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>


	<script>
		var ctx = document.getElementById("myChart");
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
				datasets: [{
					label: '# of Votes',
					data: [12, 19, 3, 5, 10, 3,10,10,10,10],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
						'rgba(255,99,132,1)',
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
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
		</script>
