<div>
    <div class="app-main__inner">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('admin.categories') }}" class="link">Category</a></li>
                <li class="item-link"><span>Add</span></li>
            </ul>
        </div>
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
                          Edit Slide
                        <div class="btn-actions-pane-right">
                            <a href="{{ route('admin.homeslider') }}" class="btn btn-success pull-right">Home Slider</a>
                        </div>                 
                </div></div>                              
            </div>
        </div>
        <div class="row justify-content-center" style="padding-top:15px;">
            <div class="col-md-9">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            @include('includes.msgshow')
                            <h5 class="card-title">Edit Slide</h5>
                            <form class="" wire:Submit.prevent="updateSlide">
                                <div class="position-relative form-group">
                                    <label for="sldtitle" class="">Slide Title</label>
                                    <input id="sldtitle" placeholder="Title" type="text" class="form-control" wire:model="title">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                 <div class="position-relative form-group">
                                    <label for="subtitle" class="">Subtitle</label>
                                    <input id="subtitle" placeholder="Subtitle" type="text" class="form-control" wire:model="subtitle">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="price" class="">Price</label>
                                    <input id="price" placeholder="Price" type="text" class="form-control" wire:model="price">
                                </div>
                                 <div class="position-relative form-group">
                                    <label for="link" class="">Link</label>
                                    <input id="link" placeholder="Link" type="text" class="form-control"wire:model="link">
                                </div>
                                 <div class="position-relative form-group">
                                    <label for="image" class="">Select Image:  </label>
                                    <input type="file" id="image" class="input-file" wire:model="newimage">
                                    @if($newimage)
                                        <img src="{{ $newimage->temporaryUrl() }}" width="120">
                                    @else
                                         <img src="{{ asset('assets/images/sliders') }}/{{$image}}" width="120">
                                    @endif
                                </div>
                                 <div class="position-relative form-group">
                                    <label for="status" class="">Status</label>
                                    <select id="status" class="form-control" wire:model="status">
                                        <option value="1">Active</option>
                                        <option value="0">inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="mt-1 btn btn-primary">Update</button>
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
