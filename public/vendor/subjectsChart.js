( function ( $ ) {

	var charts = {
		init: function () {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

			//  this.ajaxGetPostMonthlyData();
			charts.createCompletedJobsChart();

		},

		ajaxGetPostMonthlyData: function () {
			var urlPath =  'http://localhost/finalcapstone/public/attendance';
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
			} );

			request.done( function ( response ) {
				console.log( response );
				charts.createCompletedJobsChart( response );
			});
		},
	// 	createCompletedJobsChart: function ( response ) {

	// 		var ctx = document.getElementById("subjectChart");
	// 		var subjects = ["IM101", "FILI101", "PHY102", "SAAM", "SAAD"];
	// 		var lates = [2, 3, 1, 1, 2];
	// 		var absent = [1, 2,3, 2, 1];
	// 		var myLineChart = new Chart(ctx, {
	// 			type: 'bar',
	// 			data: {
	// 				labels: subjects, // The response got from the ajax request containing subjects in the database
	// 				datasets: [{
	// 					label: "Lates",
	// 					lineTension: 0.3,
	// 					backgroundColor: "rgba(2,117,216,0.2)",
	// 					borderColor: "rgba(2,117,216,1)",
	// 					pointRadius: 5,
	// 					pointBackgroundColor: "rgba(2,117,216,1)",
	// 					pointBorderColor: "rgba(255,255,255,0.8)",
	// 					pointHoverRadius: 5,
	// 					pointHoverBackgroundColor: "rgba(2,117,216,1)",
	// 					pointHitRadius: 20,
	// 					pointBorderWidth: 2,
	// 					data: lates // The response got from the ajax request containing data of teachers performance of subjects per month
	// 				}],
	// 			},
	// 			options: {
	// 				scales: {
	// 					xAxes: [{
	// 						time: {
	// 							unit: 'date'
	// 						},
	// 						gridLines: {
	// 							display: false
	// 						},
	// 						ticks: {
	// 							maxTicksLimit: 7
	// 						}
	// 					}],
	// 					yAxes: [{
	// 						ticks: {
	// 							beginAtZero:true,
	// 							max: 10, // The response got from the ajax request containing max limit for y axis
	// 							maxTicksLimit: 5
	// 						},
	// 						gridLines: {
	// 							color: "rgba(0, 0, 0, .125)",
	// 						}
	// 					}],
	// 				},
	// 				legend: {
	// 					display: true
	// 				}
	// 			}
	// 		});
	// 	}
	// };

		/**
		 * Created the Completed Jobs Chart
		 */
		createCompletedJobsChart: function ( response ) {

			var ctx = document.getElementById("subjectChart");
			var subjects = ["IM101", "FILI102", "RIZAL", "SIA"]
			var lates = {
				label: 'Lates',
				data: [5, 3, 4, 5], //data of each subj represents late
				backgroundColor: 'rgb(255, 69, 0)',
				borderWidth: 0, 
			}
			var absent = {
				label: 'Absent',
				data: [3, 2, 3, 6],
				backgroundColor: 'rgb(255, 0, 0)',
				borderWidth: 0,
			}

			var weekData = {
				labels: subjects, //week days
				datasets: [lates, absent] //must be an object of subjects with late, absent or present as its data
			};

			var chartOptions = {
				scales: {
				  xAxes: [{
					barPercentage: 1,
					categoryPercentage: 0.6
				  }],
				  yAxes: [{
					ticks: {
						beginAtZero:true,
						max: 20,
						maxTicksLimit: 5
					},
					gridLines: {
						color: "rgba(0, 0, 0, .125)",
					}
				  }]
				}
			};

			var barChart = new Chart(ctx, {
				type: 'bar',
				data: weekData,
				options: chartOptions
			});
		}
	};

	charts.init();

} )( jQuery );