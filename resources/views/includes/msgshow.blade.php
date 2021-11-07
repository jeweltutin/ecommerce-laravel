@if (Session::has('message'))
    <div class="alert alert-success alert-dismissible show" role="alert">{{Session::get('message')}}</div>
@endif