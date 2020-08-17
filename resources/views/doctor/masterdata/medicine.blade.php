@extends('layouts.doctor')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@stop
@section('doctor')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Medicine</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>

    <button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#createmedicine">Create New Medicine</button>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Medicine List</h4>
                    <div class="table-responsive">
                        <table class="table mb-0" id="medicine">
                            <thead>
                            <tr>
                                <th>Medicine Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
                <!-- end card-body-->
            </div>
            <!-- end card -->

        </div>
        <!-- end col -->



        <!-- end col -->
    </div>


    <div class="modal fade" id="createmedicine" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Medicine</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('doctor.medicine.save')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Medicine Name</label>
                        <input type="text" class="form-control" name="medicine_name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="updatemedicine" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Medicine</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('doctor.medicine.update')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Medicine Name</label>
                            <input type="text" class="form-control medicinename" name="medicine_name" >
                            <input type="hidden" class="form-control medicineeditid" name="medicine_edit_id" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="deletemedicine" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Medicine</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('doctor.medicine.delete')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">

                            are you sure to delete this medicine?
                            <input type="hidden" class="form-control medicinedeletetid" name="medicine_delete_id" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@stop
@section('js')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>



    <script>

        function deletemanu(id) {
            $('.medicinedeletetid').val(id);
        }



        function editmedicine(id)
        {
            var id = id;
            $.ajax({
                type : "POST",
                url : "{{route('get.single.medicine')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'id' : id,
                },
                success:function (data) {
                    console.log(data)
                    $('.medicineeditid').val(id);
                    $('.medicinename').val(data.medicine_name);
                }
            });
        };

        $(document).ready(function () {

            $('#medicine').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('get_medicine') }}",
                columns: [
                    { data: 'medicine_name', name: 'medicine_name','class':'text-center' },
                    {data: 'action', name: 'action', orderable: false, searchable: false,'class':'text-center'},
                ]
            });
        })
    </script>

@stop
