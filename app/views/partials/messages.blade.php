@if(Session::has('success'))
    <div class="alert alert-success">
        <h2>{{ Session::get('success') }}</h2>
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger">
        <h2>{{ Session::get('error') }}</h2>
    </div>
@endif

@if(Session::has('info'))
    <div class="alert alert-info">
        <h2>{{ Session::get('info') }}</h2>
    </div>
@endif
