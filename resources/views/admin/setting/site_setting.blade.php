@extends('admin.admin_layouts')

 

@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Admin Section Setting</span>
      </nav>

      <div class="sl-pagebody">

 
 <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Site Setting   </h6>

       <form method="post" action="{{ route('update.sitesetting') }}" >    
        @csrf

       <input type="hidden" name="id" value="{{ $setting->id }}"> 

          <div class="form-layout">
            <div class="row mg-b-25">
            <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Phone One:</label>
                  <input class="form-control" type="tex" name="phone_one" placeholder="Enter Phone One"  value="{{ $setting->phone_one }}">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Phone Two:</label>
                  <input class="form-control" type="text" name="phone_two"  placeholder="Enter Phone Two"  value="{{ $setting->phone_two }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email:</label>
                  <input class="form-control" type="email" name="email"  placeholder="Enter Your Email"  value="{{ $setting->email }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Company Name:</label>
                  <input class="form-control" type="text" name="company_name"  placeholder="Enter Company Name"  value="{{ $setting->company_name }}">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Company Address:</label>
                  <input class="form-control" type="text" name="company_address"  placeholder="Enter Company Address" value="{{ $setting->company_address }}">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Facebook:</label>
                  <input class="form-control" type="text" name="facebook"  placeholder="Enter Facebook" value="{{ $setting->facebook }}">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">YouTube:</label>
                  <input class="form-control" type="text" name="youtube"  placeholder="Enter YouTube" value="{{ $setting->youtube }}">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Instagram:</label>
                  <input class="form-control" type="text" name="instagram"  placeholder="Enter Instagram" value="{{ $setting->instagram }}">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Twitter:</label>
                  <input class="form-control" type="text" name="twitter"  placeholder="Enter Twitter" value="{{ $setting->twitter }}">
                </div>
              </div>

            </div><!-- row -->

  <hr>

            <div class="form-layout-footer">
              <button type="submit" class="btn btn-info mg-r-5">Submit  </button>
           
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

        </form> 



        
        </div><!-- row -->

  
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
 
 
 
 

@endsection
