<div class="app-main__inner">
    <div class="row " style="padding-bottom: 15px;">      
        <div class="col-md-12">  
                <div class="main-card card">                       
                    <div class="card-header">
                        Contact Messages
                    <div class="btn-actions-pane-right">
                        <a href="{{ route('admin.contact') }}" class="btn btn-success pull-right">All Contact Messages</a>
                    </div>                 
            </div></div>                              
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card-shadow-primary border mb-3 card card-body border-primary">
                <h5 class="card-title text-info">Name</h5>
                {{ $contact->name }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-shadow-primary border mb-3 card card-body border-primary">
                <h5 class="card-title text-info">Email</h5>
                {{ $contact->email }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-shadow-primary border mb-3 card card-body border-primary">
                <h5 class="card-title text-info">Phone</h5>
                {{ $contact->phone }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-shadow-primary border mb-3 card card-body border-primary">
                <h5 class="card-title text-info">Date | Time</h5>
                {{ $contact->created_at }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card-shadow-primary border mb-3 card card-body border-primary">
                <h5 class="card-title text-info">Message</h5>
                {{ $contact->comment }}
            </div>
        </div>
    </div>
</div>

