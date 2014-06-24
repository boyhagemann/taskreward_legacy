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

  <div class="island greybox">

        <div class="container grid">
            <div class="grid__item one-whole">

                <form class="" action="{{ URL::route('tasks.index') }}" method="GET" role="search">
                    <input type="text" name="q" class="text-input beta" placeholder="{{ Lang::get('navigation.navbar.search.placeholder') }}" value="{{{ Input::get('q') }}}"><!--
                 --><button type="submit" class="btn btn--large">{{ Lang::get('navigation.navbar.search.label') }}</button>
                </form>

            </div>
        </div>

  </div>

  </body>
</html>
