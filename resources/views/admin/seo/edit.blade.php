@extends('admin.admin_layouts')
@section('admin_content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Seo Settings</span>
      </nav>

      <div class="sl-pagebody">

 
 <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Edit Seo 
 <a href="{{ route('admin.seo.index')}}" class="btn btn-success btn-sm pull-right"> All Seo</a>
          </h6>
         

       <form method="post" action="{{ url('admin/seo/update/'.$seos->id) }}">    
        @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Meta Title: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="meta_title" value="{{ $seos->meta_title}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Meta Author: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="meta_author" value="{{ $seos->meta_author}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Meta Tag: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="meta_tag" value="{{ $seos->meta_tag}}">
                </div>
              </div><!-- col-4 -->

            </div><!-- row -->
            <div class="row">
                <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Meta Description: <span class="tx-danger">*</span></label>
                  <textarea class="form-control"  name="meta_description">{{$seos->meta_description}}</textarea>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Google Analytics: <span class="tx-danger">*</span></label>
                  <textarea class="form-control"  name="google_analytics">{{$seos->google_analytics}}</textarea>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Bing Analytics: <span class="tx-danger">*</span></label>
                  <textarea class="form-control"  name="bing_analytics">{{$seos->bing_analytics}}</textarea>
                </div>
              </div><!-- col-4 -->
            </div>

  <hr>



          </div><!-- end row --> 
<br><br>


            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Submit Form</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

        </form> 



        
        </div><!-- row -->

  
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


@endsection
