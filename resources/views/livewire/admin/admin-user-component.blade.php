<div>
    <div class="app-main__inner">
        <div class="row " style="padding-bottom: 15px;">      
            <div class="col-md-12">  
                 <div class="main-card card">                       
                        <div class="card-header">
                          All Account holders
                        <div class="btn-actions-pane-right">
                            <a href="{{ route('admin.addproduct') }}" class="btn btn-success pull-right">Add New Product</a>
                        </div>                 
                </div></div>                              
            </div>
        </div>
        <div class="row" style="padding-top:15px;">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Users List</h5>
                        @if (Session::has('smessage'))
                            <div class="alert alert-success fade show" role="alert">{{Session::get('smessage')}}</div>
                        @endif
                        @if (Session::has('message'))
                            <div class="alert alert-danger fade show" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="mb-0 table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>User Name</th>
                                <th>Image</th>
                                <th>Email</th>
                                <th>Role</small></th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user )
                                    <tr>
                                        <th>{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td><i style="font-size:22px" class="fa fa-user"></i></td>
                                        {{-- <td><img src="{{ asset('assets/images/products') }}/{{$user->orderItem->product->image }}" width="60"></td>  --}}
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->user_type }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                           <a href="{{ route('admin.usermanage', ['user_id' => $user->id]) }}"> <i class="fa fa-edit fa-1x text-info"></i></a>
                                            <a  onclick="deleteConfirmationMsg();" href="" wire:click.prevent="deleteUser({{ $user->id }})" style="margin-left:10px;"> <i class="fa fa-times fa-1x text-danger"></i></a> 
                                        </td>                              
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <div class="card widget-content bg-white">
                    {{ $users->links('pagination::bootstrap-4'); }}
                </div>
            </div>
        </div>
    </div>


</div>

@section('script')
<script>
var id;
  function deleteConfirmationMsg() {
      let confirmAction = confirm("Are you sure, You want to delete this User?");
      if(confirmAction){
          return true;
      }
      else{
          event.stopImmediatePropagation();
      }
      event.preventDefault();     
  }
 </script>
@endsection
