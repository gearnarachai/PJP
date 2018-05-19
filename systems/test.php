<?php
include '../js/function_db.php';
include '../js/session_check.php';

$sql = " SELECT MONTH(tre_date) MONTH, COUNT(*) COUNT
FROM tb_treat
WHERE YEAR(tre_date)=2018
GROUP BY MONTH(tre_date) ";
$results = selectSql($sql);


?>

<div class="container">


	<canvas id="myChart" width="1200" height="500"></canvas>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>


	<script>
		var ctx = document.getElementById("myChart");
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [<?php foreach ($results as $row) {
          if($row['MONTH']=="1")
          echo '"มกราคม"',',';
          if($row['MONTH']=="2")
          echo '"กุมภาพันธ์"',',';
          if($row['MONTH']=="3")
          echo '"มีนาคม"',',';
          if($row['MONTH']=="4")
          echo '"เมษายน"',',';
          if($row['MONTH']=="5")
          echo '"พฤษภาคม"',',';
          if($row['MONTH']=="6")
          echo '"มิถุนายน"',',';
          if($row['MONTH']=="7")
          echo '"กรกฎาคม"',',';
          if($row['MONTH']=="8")
          echo '"สิงหาคม"',',';
          if($row['MONTH']=="9")
          echo '"กันยายน"',',';
          if($row['MONTH']=="10")
          echo '"ตุลาคม"',',';
          if($row['MONTH']=="11")
          echo '"พฤศจิกายน"',',';
          if($row['MONTH']=="12")
          echo '"ธันวาคม"',',';
        } ?>],
				datasets: [{
					label: '# จำนวนคนไข้',
					data: [<?php foreach ($results as $row) {
            echo $row['COUNT'],',';
          } ?>],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)',
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
						'rgba(255, 159, 64, 1)',
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
</div>
