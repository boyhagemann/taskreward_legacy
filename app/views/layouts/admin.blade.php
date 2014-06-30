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

            <div class="grid__item desk-two-thirds">

                <h2>Search engine</h2>
                <pre>{{ $stats }}</pre>
            </div><!--

            --><div class="grid__item desk-one-third">

                <h2>Quick</h2>

                <p>{{ HTML::link('admin/refresh', 'Re-install application') }}</p>

                <h2>Search engine</h2>
                <p>{{ HTML::link('admin/search/flush', 'Flush') }}</p>
                <p>{{ HTML::link('admin/search/optimize', 'Optimize') }}</p>
                <p>{{ HTML::link('admin/search/delete', 'Delete') }}</p>

            </div>

        </div>

    </div>

  </body>
</html>
