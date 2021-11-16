<div>
    <div class="app-main__inner">
        <div class="row " style="padding-bottom: 15px;">      
            <div class="col-md-12">  
                 <div class="main-card card">                       
                        <div class="card-header">
                          Contact Messages
                        <div class="btn-actions-pane-right">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-success pull-right">Dashboard</a>
                        </div>                 
                </div></div>                              
            </div>
        </div>
        <div class="row" style="padding-top:15px;">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Messages List</h5>
                        @if (Session::has('message'))
                            <div class="alert alert-danger fade show" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="mb-0 table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Comment</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($contacts as $contact )
                                    <tr>
                                        <th>{{ $i++ }}</th>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        {{-- <td>{{ $contact->comment }}</td> --}}
                                        <td>{{ Str::limit($contact->comment, 50,' ...') }}</td>
                                        <td>{{ $contact->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.contactdetails', ['contact_id' => $contact->id]) }}"> <i class="fa fa-eye fa-2x"></i></a>
                                            <a  onclick="deleteConfirmationMsg();" href="" wire:click.prevent="deleteComment({{ $contact->id }})" style="margin-left:10px;"> <i class="fa fa-times fa-2x text-danger"></i></a> 
                                        </td>                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                    <div style="padding: 20px;" class="col-md-4">
                        <p class="text-danger">*Note: This will delete all messages by one click</p>
                        <button class="mb-2 mr-2 btn btn-danger" onclick="deleteConfirmationMsg()" wire:click.prevent="deleteAllComment">Delete All</button>
                    </div>
                </div>
                <div class="card widget-content bg-white">
                    {{ $contacts->links('pagination::bootstrap-4'); }}
                </div>
            </div>
        </div>
    </div>


</div>

@section('script')
<script>
var id;
  function deleteConfirmationMsg() {
      let confirmAction = confirm("Are you sure, You want to delete this Rating and Review?");
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
