<div>
    <div class="app-main__inner">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('admin.dashboard') }}" class="link">Dashboard</a></li>
                <li class="item-link"><span>Settings</span></li>
            </ul>
        </div>
        <div class="row " style="padding-bottom: 15px;">      
            <div class="col-md-12">  
                 <div class="main-card card">                       
                        <div class="card-header">
                          Settings
                        <div class="btn-actions-pane-right">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-success pull-right">Dashboard</a>
                        </div>                 
                </div></div>                              
            </div>
        </div>
        <div class="row justify-content-center" style="padding-top:15px;">
            <div class="col-md-9">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            @include('includes.msgshow')
                            <h5 class="card-title">Settings</h5>
                            <form class="" wire:Submit.prevent="saveSettings">
                                <div class="position-relative form-group">
                                    <label for="email" class="">Email</label>
                                    <input id="email" placeholder="Email" type="email" class="form-control" wire:model="email">
                                    @error('email') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                 <div class="position-relative form-group">
                                    <label for="phone" class="">Phone</label>
                                    <input id="phone" placeholder="phone" type="text" class="form-control" wire:model="phone">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="phone2" class="">Phone2</label>
                                    <input id="phone2" placeholder="phone2" type="text" class="form-control" wire:model="phone2">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="address" class="">Address</label>
                                    <input id="address" placeholder="Address" type="text" class="form-control" wire:model="address">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="map" class="">Map</label>
                                    <input id="map" placeholder="Map" type="text" class="form-control" wire:model="map">
                                </div>
                                
                                <div class="position-relative form-group">
                                    <label for="twitter" class="">Twitter</label>
                                    <input id="twitter" placeholder="Twitter" type="text" class="form-control" wire:model="twitter">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="facebook" class="">Facebook</label>
                                    <input id="facebook" placeholder="Facebook" type="text" class="form-control" wire:model="facebook">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="instagram" class="">Instagram</label>
                                    <input id="instagram" placeholder="Instagram" type="text" class="form-control" wire:model="instagram">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="pinterest" class="">Pinterest</label>
                                    <input id="pinterest" placeholder="Pinterest" type="text" class="form-control" wire:model="pinterest">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="youtube" class="">Youtube</label>
                                    <input id="youtube" placeholder="Youtube" type="text" class="form-control" wire:model="youtube">
                                </div>

                                <button type="submit" class="mt-1 btn btn-primary">Save</button>
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
