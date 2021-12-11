<div>
    <style>
        .sclist{
            list-style: none;
        }
    </style>
    <div class="app-main__inner">
        @if ( Auth::user()->user_type == 'USR')
            <p>{{ Auth::user()->name }}</p>
        @else
        <p>Not Working</p>
        @endif
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Analytics Dashboard
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
        <div class="row">
            <div class="col-md-6">
                <div class="card widget-content bg-grow-early">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Category</div>
                            <div class="widget-subheading">Total Categories created</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{ $totalCaregory }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="padding-bottom: 20px;">
                <div class="card widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading"> Total Subcategory</div>
                                <div class="widget-subheading">Total Categories created with parent category</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="border border-danger rounded-circle rounded-lg" style="padding: 0 10px;">
                                    <div class="widget-numbers text-white"><span> {{ $totalSubCategory }}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row " style="padding-bottom: 15px;">      
            <div class="col-md-12">  
                 <div class="main-card card">                       
                        <div class="card-header">
                          All Categories
                        <div class="btn-actions-pane-right">
                            <a href="{{ route('admin.addcategories') }}" class="btn btn-success pull-right">Add New Category</a>
                        </div>                 
                </div></div>                              
            </div>
        </div>
        <div class="row" style="padding-top:15px;">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Categories List</h5>
                        @if (Session::has('message'))
                            <div class="alert alert-success fade show" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="mb-0 table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Sub Category</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category )
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <ul class="sclist">
                                                @foreach ($category->subCategories as $scategory )
                                                    <li><i class="fa fa-caret-right"></i> {{ $scategory->name }}
                                                        <a href="{{ route('admin.editcategory',['category_slug' => $category->slug, 'scategory_slug' => $scategory->slug]) }}"><i class="fa fa-edit fa-1x"></i></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td><a href="{{ route('admin.editcategory', ['category_slug' => $category->slug]) }}"> <i class="fa fa-edit fa-1x"></i></a>
                                            <a href="" onclick="confirm('Are you sure, You want to delete this Category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{ $category->id }})" style="margin-left:10px;"> <i class="fa fa-times fa-1x text-danger"></i></a>
                                        </td>                                   
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <div class="card widget-content bg-white">
                    {{ $categories->links('pagination::bootstrap-4'); }}
                </div>
                {{-- <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Basic</h5>
                        <nav class="" aria-label="Page navigation example">
                            <ul class="pagination">
                                
                                <li class="page-item"><a href="javascript:void(0);" class="page-link" aria-label="Previous"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
                                <li class="page-item"><a href="javascript:void(0);" class="page-link">1</a></li>
                                <li class="page-item active"><a href="javascript:void(0);" class="page-link">2</a></li>
                                <li class="page-item"><a href="javascript:void(0);" class="page-link">3</a></li>
                                <li class="page-item"><a href="javascript:void(0);" class="page-link">4</a></li>
                                <li class="page-item"><a href="javascript:void(0);" class="page-link">5</a></li>
                                <li class="page-item"><a href="javascript:void(0);" class="page-link" aria-label="Next"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
                        </nav>
                    </div>
                </div>--}}
            </div>
        </div>
    </div>


</div>
