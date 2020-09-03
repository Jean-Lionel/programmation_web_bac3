
<?php

require '../vendor/autoload.php';

require_once('layout/_header.php');


?>

<!-- <div class="container">
	<canvas id="myChart" width="50" height="50"></canvas>

</div> -->

<div class="container">
	<div class="row">
		<div class="col-md-6">

			<h3>Statistique des operations</h3>

			<canvas id="myChart1">
				
			</canvas>
			
		</div>
		<div class="col-md-6">
			<h3>Statistique des presences</h3>

			<canvas id="myChart2">
				
			</canvas>
			
		</div>

		<div class="col-md-6">
			<h3>Statistique mensuelle</h3>
			<canvas id="myChart3">
				
			</canvas>
			
		</div>
		<div class="col-md-6">
			<h3>Statistique Lorem</h3>
			<canvas id="myChart4">
				
			</canvas>
			
		</div>

		<div class="col-md-12">
			<h5 class="text-center"> OBSERVATION</h5>
			<p class="text-justify">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta saepe cupiditate ratione velit magni facere deleniti perspiciatis ad alias, veritatis molestiae modi similique architecto amet adipisci excepturi optio odit totam!

				<b>j'ai ete pour avoir realiser cette exercice</b>
			</p>
		</div>
	</div>
</div>





<script src="js/Chart.min.js"></script>


<script>
	var ctx = document.getElementById('myChart1').getContext('2d');
	var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
    	labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August'],
    	datasets: [{
    		label: 'My First dataset',
    		backgroundColor: 'rgb(255, 99, 132)',

    		borderColor: 'rgb(255, 99, 132)',
    		data: [0, 10, 5, 2, 20, 30, 45,60]
    	}]
    },

    // Configuration options go here
    options: {
    	responsive: true
    }
});


	var ctx2 = document.getElementById('myChart2').getContext('2d');
	var chart2 = new Chart(ctx2, {
    // The type of chart we want to create
    type: 'radar',

    // The data for our dataset
    data: {
    	labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August'],
    	datasets: [{
    		label: 'My First dataset',
    		backgroundColor: [
    			'rgba(255, 99, 132, 0.2)'],
    		borderColor: 'rgb(255, 99, 132)',
    		data: [0, 10, 5, 2, 20, 30, 45]
    	}]
    },

    // Configuration options go here
    options: {
    	responsive: true
    }
});



	var ctx3 = document.getElementById('myChart3').getContext('2d');
	var chart3 = new Chart(ctx3, {
    // The type of chart we want to create
     type: 'pie',

    // The data for our dataset
    data: {
    	labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August'],
    	datasets: [{
    		label: 'My First dataset',
    		backgroundColor: [
    			'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 23, 0.2)',],
    		borderColor: 'rgb(255, 99, 132)',
    		data: [0, 10, 5, 2, 20, 30, 45,60]
    	}]
    },

    // Configuration options go here
    options: {
    	responsive: true
    }
});


	var ctx4 = document.getElementById('myChart4').getContext('2d');
	var chart3 = new Chart(ctx4, {
    // The type of chart we want to create
     type: 'bar',

    // The data for our dataset
    data: {
    	labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August'],
    	datasets: [{
    		label: 'My First dataset',
    		backgroundColor: [
    			'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',],

    		borderColor: 'rgb(255, 99, 132)',
    		data: [0, 10, 5, 2, 20, 30, 45,50]
    	}]
    },

    // Configuration options go here
    options: {
    	responsive: true
    }
});




</script>





<?php
require_once('layout/_footer.php');
?>