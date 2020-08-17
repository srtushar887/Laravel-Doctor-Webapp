@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">General Settings</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                     <form class="needs-validation" novalidate="" action="{{route('admin.general.settings.update')}}" method="post" enctype="multipart/form-data">
                         @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Site Name</label>
                                <input type="text" name="site_name" value="{{$gen->site_name}}" class="form-control" id="validationCustom01"  >

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Site Email</label>
                                <input type="text" name="site_email" value="{{$gen->site_email}}" class="form-control" id="validationCustom01"  >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Site Phone</label>
                                <input type="text" name="site_phone" value="{{$gen->site_phone}}" class="form-control" id="validationCustom01" >

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Site Currency</label>
                                <input type="text" name="site_currency" value="{{$gen->site_currency}}" class="form-control" id="validationCustom01" >

                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Address</label>
                                <textarea type="text" name="address" class="form-control" id="validationCustom01" >{!! $gen->address !!}</textarea>

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Logo</label>
                                <br>
                                <img src="{{asset($gen->logo)}}" style="height: 100px;width: 100px">
                                <input type="file" name="logo" class="form-control" id="validationCustom01" >

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Icon</label>
                                <br>
                                <img src="{{asset($gen->icon)}}" style="height: 100px;width: 100px">
                                <input type="file" name="icon" class="form-control" id="validationCustom01" >

                            </div>

                        </div>


                        <button class="btn btn-primary waves-effect waves-light" type="submit">Submit form</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

@stop
