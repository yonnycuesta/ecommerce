@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">


        <div class="sl-pagebody">
           

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Blog Category Update
                    </a>

                    <div class="table-wrapper">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ url('update/blogcategory/' . $blogcat->id) }}">
                            @csrf
                            <div class="modal-body pd-20">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name English</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $blogcat->category_name_en }}"
                                        name="category_name_en">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name Hindi</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $blogcat->category_name_in }}"
                                        name="category_name_in">

                                </div>

                            </div><!-- modal-body -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info pd-x-20">Update</button>


                            </div>
                        </form>


                    </div><!-- table-wrapper -->
            </div><!-- card -->




        </div><!-- sl-mainpanel -->





    @endsection
