<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TaskReward</title>

	  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	  <script type="text/javascript">

		  // Load the Visualization API and the piechart package.
		  google.load('visualization', '1.0', {'packages':['corechart']});

		  // Set a callback to run when the Google Visualization API is loaded.
		  google.setOnLoadCallback(loadChart);

		  // Callback that creates and populates a data table,
		  // instantiates the pie chart, passes in the data and
		  // draws it.
		  function loadChart() {

			  var rewards = $.get('http://localhost/taskreward/public/api/rewards?user_id=1&interval=day&period=week', function(collection) {
				  drawChart(collection);
			  });

		  }

		  // Callback that creates and populates a data table,
		  // instantiates the pie chart, passes in the data and
		  // draws it.
		  function drawChart(collection) {

			  // Create the data table.
			  var data = new google.visualization.DataTable();
			  data.addColumn('string', 'Topping');
			  data.addColumn('number', 'Slices');

			  $(collection).each(function(i, item) {
				  data.addRow([item.date, item.value]);
			  });

			  // Set chart options
			  var options = {
				  backgroundColor: {
					  fill: '#EEEEEE',
					  stroke: '#E7E7E7'
				  }
			  };

			  // Instantiate and draw our chart, passing in some options.
			  var chart = new google.visualization.AreaChart(document.getElementById('chart_rewards'));
			  chart.draw(data, options);
		  }

	  </script>

  </head>
  <body>

	  @include('partials.navbar', ['form' => true])

    <div class="jumbotron">
        <div class="container">
            <div class="col-lg-12">
				<h2 class="i_title">{{ Lang::get('user.dashboard.charts.title') }}</h2>
				<div id="chart_rewards"></div>
            </div>
        </div>
    </div>
      
      <div class="container">

        @include('partials.messages')

		  @if($paymentRequest)
		  <div class="col-lg-12">
			  <div class="alert alert-info">{{ Lang::get('user.dashboard.payments.alert', ['url' => URL::route('payments.request'), 'value' => $paymentRequest->value, 'currency' => $paymentRequest->currency]) }}</div>
		  </div>
		  @endif

		  <section class="col-lg-5">
			  <h2 class="i_title">{{ Lang::get('user.dashboard.rewards.title') }}</h2>
			  @include('partials.rewards.list')
		  </section>

		  <section class="col-lg-4">
			  <h2 class="i_title">{{ Lang::get('user.dashboard.payments.title') }}</h2>
			  @include('partials.payments.list')
		  </section>

		  <section class="col-lg-3">

				  <a href="{{ $invite->tokenUrl }}" class="btn btn-primary btn-lg">{{ Lang::get('user.dashboard.invite.button') }}</a>

		  </section>
          
      </div>

  </body>
</html>
