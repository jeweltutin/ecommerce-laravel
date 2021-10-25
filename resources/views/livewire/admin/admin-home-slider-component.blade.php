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
                          Slider
                        <div class="btn-actions-pane-right">
                            <a href="{{ route('admin.addhomeslider') }}" class="btn btn-success pull-right">Add New Slide</a>
                        </div>                 
                </div></div>                              
            </div>
        </div>
        <div class="row" style="padding-top:15px;">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Slides</h5>
                        @if (Session::has('message'))
                            <div class="alert alert-success fade show" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="mb-0 table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Price</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($slides as $slide )
                                    <tr>
                                        <th>{{ $slide->id }}</th>
                                        <th><img src="{{ asset('assets/images/sliders') }}/{{$slide->image}}" width="60"></th>
                                        <td>{{ $slide->title }}</td>
                                        <td>{{ $slide->subtitle }}</td>
                                        <td>{{ $slide->price }}</td>
                                        <td>{{ $slide->link }}</td>
                                        <td>{{ $slide->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ $slide->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.edithomeslider', ['slide_id' => $slide->id]) }}"> <i class="fa fa-edit fa-1x text-info"></i></a>
                                            <a href="" wire:click.prevent="deleteSlide({{ $slide->id }})" style="margin-left:10px;"> <i class="fa fa-times fa-1x text-danger"></i></a>
                                        </td>                               
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <div class="card widget-content bg-white">
                    {{-- $slides->links('pagination::bootstrap-4'); --}}
                </div>
            </div>
        </div>
    </div>
</div>
