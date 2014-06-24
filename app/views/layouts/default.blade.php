<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TaskReward</title>

  </head>
  <body class="layout-default">

	  @include('partials.navbar', ['form' => true])

      <div class="container">
		  <!--Div that will hold the pie chart-->
		  <div id="chart_div"></div>

		  @include('partials.messages')
        
          <section class="col-lg-9">
              @yield('content')
          </section>
          <section class="col-lg-3">
              @yield('sidebar')
          </section>
          
      </div>

  </body>
</html>
