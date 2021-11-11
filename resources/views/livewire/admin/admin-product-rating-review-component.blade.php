<div>
    <div class="app-main__inner">
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
        <div class="row " style="padding-bottom: 15px;">      
            <div class="col-md-12">  
                 <div class="main-card card">                       
                        <div class="card-header">
                          Products Rating Review
                        <div class="btn-actions-pane-right">
                            <a href="{{ route('admin.addproduct') }}" class="btn btn-success pull-right">Add New Product</a>
                        </div>                 
                </div></div>                              
            </div>
        </div>
        <div class="row" style="padding-top:15px;">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Rating Review List</h5>
                        @if (Session::has('message'))
                            <div class="alert alert-success fade show" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="mb-0 table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>User Name</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Rating<small>(Out Of 5)</small></th>
                                <th>Comment</th>
                                <th>Date</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviewnratings as $rr )
                                    <tr>
                                        <th>{{ $rr->id }}</th>
                                        <td>{{ $rr->orderItem->order->user->name }}</td>
                                        <td><img src="{{ asset('assets/images/products') }}/{{$rr->orderItem->product->image }}" width="60"></td> 
                                        <td>{{ $rr->orderItem->product->name }}</td>
                                        <td>{{ $rr->rating }}</td>
                                        <td>{{ $rr->comment }}</td>
                                        <td>{{ $rr->created_at }}</td>
                                        <td>
                                           {{--  <a href="{{ route('admin.editproduct', ['product_slug' => $product->slug]) }}"> <i class="fa fa-edit fa-1x text-info"></i></a> --}}
                                            <a  onclick="deleteConfirmationMsg({{ $rr->order_item_id }});" href="" wire:click.prevent="deleteRatingReview({{ $rr->order_item_id }})" style="margin-left:10px;"> <i class="fa fa-times fa-1x text-danger"></i></a>
                                        </td>                              
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <div class="card widget-content bg-white">
                    {{ $reviewnratings->links('pagination::bootstrap-4'); }}
                </div>
            </div>
        </div>
    </div>


</div>

@section('script')
<script>
var id;
  function deleteConfirmationMsg(id) {
      let confirmAction = confirm("Are you sure, You want to delete this Rating and Review?");
      if(confirmAction){
          //alert(id);
          return true;
      }
      else{
          //return false;
          event.stopImmediatePropagation();
      }
      event.preventDefault();     
  }
 </script>
@endsection
