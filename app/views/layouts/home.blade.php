<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TaskReward</title>

    <!-- Bootstrap -->
    {{ HTML::style("//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css") }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="jumbotron">
        <div class="container">
            <div class="col-lg-12">
                <h1>Hello, world!</h1>
                <p>...</p>
                <p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>                
            </div>
        </div>
    </div>

      
      <div class="container">
          
          <section class="col-lg-4">
             
            <h2>Latest tasks</h2>
            @include('tasks.partials.list')
              
          </section>
          <section class="col-lg-4">
              
            <h2>Stream</h2>
            @include('stream.partials.list')

          </section>
          
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
