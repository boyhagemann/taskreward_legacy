<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TaskReward</title>

      {{ HTML::style('css/main.min.css') }}

  </head>
  <body>

    @include('partials.navbar', ['form' => false])

    <div class="jumbotron home-visual">
        <div class="container">
            <div class="col-lg-12">

				<section class="row">

						<form class="col-lg-offset-3" action="{{ URL::route('tasks.index') }}" method="GET" role="search">
							<div class="form-group col-xs-6">
								<input type="text" name="q" class="form-control input-lg" placeholder="{{ Lang::get('navigation.navbar.search.placeholder') }}" value="{{{ Input::get('q') }}}">
							</div>
							<button type="submit" class="btn btn-primary input-lg">{{ Lang::get('navigation.navbar.search.label') }}</button>
						</form>

				</section>

            </div>
        </div>
    </div>
      
      <div class="container">

      </div>

  </body>
</html>
