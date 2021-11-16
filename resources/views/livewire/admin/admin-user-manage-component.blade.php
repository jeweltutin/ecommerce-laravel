<div>
    <div class="app-main__inner">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('admin.categories') }}" class="link">Category</a></li>
                <li class="item-link"><span>Edit</span></li>
            </ul>
        </div>
        <div class="row " style="padding-bottom: 15px;">      
            <div class="col-md-12">  
                 <div class="main-card card">                       
                        <div class="card-header">
                          Manage User
                        <div class="btn-actions-pane-right">
                            <a href="{{ route('admin.categories') }}" class="btn btn-success pull-right">All Categories</a>
                        </div>                 
                </div></div>                              
            </div>
        </div>
        <div class="row justify-content-center" style="padding-top:15px;">
            <div class="col-md-9">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            @if (Session::has('message'))
                                <div class="alert alert-danger fade show" role="alert">{{Session::get('message')}}</div>
                            @endif
                            @if (Session::has('smessage'))
                                <div class="alert alert-success fade show" role="alert">{{Session::get('smessage')}}</div>
                            @endif
                            <h5 class="card-title">User Manage</h5>
                            <form class="" wire:submit.prevent="updateUserAccount">
                                <div class="position-relative form-group">
                                    <label for="uname" class="">User Name:</label>
                                    <input id="uname" wire:model="name" placeholder="Name" type="text" class="form-control" readonly>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="uemail" class="">Email</label>
                                    <input id="uemail" placeholder="Email" type="text" wire:model="email" class="form-control" readonly>
                                    @error('email') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="position-relative form-group">
                                    <label for="urole" class="">User Role</label>
                                    <select id="urole" class="form-control" wire:model="role">
                                        <option value="">Select</option>
                                        <option value="ADM">Admin</option>
                                        <option value="SPMNGR">Shop Manager</option>
                                        <option value="EDTR">Editor</option>
                                        <option value="CSTMR">Customer</option>
                                        <option value="ATOR">Author</option>
                                        <option value="SBSCRBR">Subscriber</option>
                                        <option value="USR">User</option>
                                    </select>
                                    @error('role') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="position-relative form-group">
                                        <label for="npasswd" class="">New Password</label>
                                        <input id="npasswd" placeholder="New Password" type="text" wire:model="newpasswd" class="form-control">
                                        @error('newpasswd') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="position-relative form-group">
                                        <label for="cpasswd" class="">Confirm Password</label>
                                        <input id="cpasswd" placeholder="Confirm Password" type="text" wire:model="password_confirmation" class="form-control">
                                        @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <button type="submit" class="mt-1 btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                <!--<div class="card widget-content bg-white">
                    <hr />
                </div>-->
            </div>
        </div>
    </div>
</div>
