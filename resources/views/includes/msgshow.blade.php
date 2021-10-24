@if (Session::has('message'))
    <div class="alert alert-success fade show" role="alert">{{Session::get('message')}}</div>
@endif