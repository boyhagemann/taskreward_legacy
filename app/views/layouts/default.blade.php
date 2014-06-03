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
  </head>
  <body>

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

	  <div class="container-fluid container-bottom">

		  <div class="container">

			  <section class="col-lg-9">
				  @yield('bottom')
			  </section>

		  </div>

	  </div>

    {{ HTML::script("https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js") }}
    {{ HTML::script("//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js") }}
    {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/holder/2.3.1/holder.min.js") }}

  </body>
</html>
