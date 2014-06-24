<div class="navbar">

    <nav class="container" role="navigation">

        <div class="grid">

            <div class="grid__item one-quarter text--left">

              <ul class="nav nav--block navbar__nav">
                <li><a href="{{ URL::route('tasks.index') }}" class="navbar__link">{{ Lang::get('navigation.navbar.tasks') }}</a></li>
                <li><a href="{{ URL::route('stream.index') }}" class="navbar__link">{{ Lang::get('navigation.navbar.stream') }}</a></li>
              </ul>

            </div><!--

         --><div class="grid__item two-quarters text--left">

            @if($form)
              <form class="" action="{{ URL::route('tasks.index') }}" method="GET" role="search">
                  <input type="text" name="q" class="text-input" placeholder="{{ Lang::get('navigation.navbar.search.placeholder') }}" value="{{{ Input::get('q') }}}"><!--
               --><button type="submit" class="btn">{{ Lang::get('navigation.navbar.search.label') }}</button>
              </form>
            @endif

            </div><!--

         --><div class="grid__item one-quarter text--right">

              <ul class="nav nav--block navbar__nav">
                @if(Sentry::check())
                <li><a href="{{ URL::route('user.dashboard') }}" class="navbar__link">{{ Lang::get('navigation.navbar.account') }}</a></li>
                <li><a href="{{ URL::route('user.logout') }}" class="navbar__link">{{ Lang::get('navigation.navbar.logout') }}</a></li>
                @else
                <li><a href="{{ URL::route('user.register') }}" class="navbar__link">{{ Lang::get('navigation.navbar.signup') }}</a></li>
                <li><a href="{{ URL::route('user.login') }}" class="navbar__link">{{ Lang::get('navigation.navbar.login') }}</a></li>
                @endif
              </ul>

            </div>

        </div>

    </nav>

</div>