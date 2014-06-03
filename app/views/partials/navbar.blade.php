<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ URL::route('home') }}">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="{{ URL::route('tasks.index') }}">{{ Lang::get('navigation.navbar.tasks') }}</a></li>
        <li><a href="{{ URL::route('stream.index') }}">{{ Lang::get('navigation.navbar.stream') }}</a></li>
      </ul>

	@if($form)
      <form class="navbar-form navbar-left col-lg-9" action="{{ URL::route('tasks.index') }}" method="GET" role="search">
        <div class="form-group">
          <input type="text" name="q" class="form-control" placeholder="{{ Lang::get('navigation.navbar.search.placeholder') }}" value="{{{ Input::get('q') }}}">
        </div>
        <button type="submit" class="btn btn-primary">{{ Lang::get('navigation.navbar.search.label') }}</button>
      </form>
	@endif

      <ul class="nav navbar-nav navbar-right">
        @if(Sentry::check())
        <li><a href="{{ URL::route('user.dashboard') }}" class="">{{ Lang::get('navigation.navbar.account') }}</a></li>
        <li><a href="{{ URL::route('user.logout') }}" class="">{{ Lang::get('navigation.navbar.logout') }}</a></li>
        @else  
        <li><a href="{{ URL::route('user.register') }}" class="">{{ Lang::get('navigation.navbar.signup') }}</a></li>
        <li><a href="{{ URL::route('user.login') }}" class="">{{ Lang::get('navigation.navbar.login') }}</a></li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
