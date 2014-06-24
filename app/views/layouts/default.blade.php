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

	  @include('partials.navbar', ['form' => true])

      <div class="container">

          <div class="grid">

              @include('partials.messages')

              <section class="grid__item two-thirds lap-one-half">
                  @yield('content')
              </section><!--

              --><section class="grid__item one-third lap-one-half">
                  @yield('sidebar')
              </section>

          </div>

      </div>

  </body>
</html>
