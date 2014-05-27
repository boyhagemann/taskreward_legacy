<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TaskReward</title>

    <!-- Bootstrap -->
    {{ HTML::style("//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css") }}
    {{ HTML::style("css/screen.css") }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


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

			  var rewards = $.get('http://localhost/taskreward/public/api/rewards?interval=day&period=week', function(collection) {
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

    @include('partials.navbar')

    <div class="jumbotron">
        <div class="container">
            <div class="col-lg-12">
				<h2>{{ Lang::get('user.dashboard.rewards.title') }}</h2>
				<div id="chart_rewards"></div>
            </div>
        </div>
    </div>
      
      <div class="container">

        @include('partials.messages')

		  <section class="col-lg-6">
			  <h2>{{ Lang::get('user.dashboard.tasks.title') }}</h2>
			  @if($tasks)
			  @include('partials.tasks.list')
			  @else
			  {{ Lang::get('user.dashboard.tasks.empty') }}
			  @endif
		  </section>

		  <section class="col-lg-6">
			  <h2>{{ Lang::get('user.dashboard.rewards.title') }}</h2>
			  @if($rewards)
			  @include('partials.rewards.list')
			  @else
			  {{ Lang::get('user.dashboard.rewards.empty') }}
			  @endif
		  </section>

		  <section class="col-lg-4">

			  <div class="col-lg-4">
				  <a href="{{ $invite->url }}" class="btn btn-primary btn-lg">Invite users</a>
			  </div>

		  </section>
          
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
