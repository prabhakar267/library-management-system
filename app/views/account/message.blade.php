@if(Session::has('global'))
    <strong>Heads up!</strong> {{ Session::get('global') }}        
@endif