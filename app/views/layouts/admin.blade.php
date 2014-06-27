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

        @include('partials.messages')

    <div class="container">

        <div class="grid">

            <div class="grid__item">

                <h2>Quick</h2>

                <p>{{ HTML::link('admin/refresh', 'Re-install application') }}</p>

            </div>

        </div>

    </div>

  </body>
</html>
