<div>
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Dashboard
                        <div class="page-title-subheading">This is an example dashboard created using build-in elements
                            and components.
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                        class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-star"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="row " style="padding-bottom: 15px;">      
            <div class="col-md-12">  
                 <div class="main-card card">                       
                        <div class="card-header">
                          All Attributes
                        <div class="btn-actions-pane-right">
                            <a href="{{ route('admin.add_attribute') }}" class="btn btn-success pull-right">Add Attribute</a>
                        </div>                 
                </div></div>                              
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Attributes</h5>
                        @if (Session::has('message'))
                            <div class="alert alert-success fade show" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="mb-0 table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($pattributes as $attribute )
                                    <tr>
                                        <td>{{ $attribute->id }}</td>
                                        <td>{{ $attribute->name }}</td>
                                        {{--<td>{{ $slide->status == 1 ? 'Active' : 'Inactive' }}</td>--}}
                                        <td>{{ $attribute->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.edit_attribute', ['attr_id' => $attribute->id]) }}"> <i class="fa fa-edit fa-1x text-info"></i></a>
                                            <a href="#" onclick="confirm('Are you sure, you want to delete this attribute?') || event.stopImmediatePropagation()" wire:click.prevent="deleteAttribute({{ $attribute->id }})" style="margin-left:10px;"> <i class="fa fa-times fa-1x text-danger"></i></a>
                                        </td>                               
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <div class="card widget-content bg-white">
                    {{ $pattributes->links('pagination::bootstrap-4'); }}
                </div>
            </div>
        </div>
    </div>
</div>
@section('style')
<style>
.app-main .app-main__inner {
    overflow: hidden;
}
</style>
@endsection
