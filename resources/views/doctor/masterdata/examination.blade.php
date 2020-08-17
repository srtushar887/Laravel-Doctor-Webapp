@extends('layouts.doctor')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@stop
@section('doctor')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Examination</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>

    <button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#createexamination">Create New Examination</button>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Medicine List</h4>
                    <div class="table-responsive">
                        <table class="table mb-0" id="diagnosis">
                            <thead>
                            <tr>
                                <th>Examination Name</th>
                                <th>Examination Remark</th>
                                <th>Created Date</th>
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


    <div class="modal fade" id="createexamination" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Examination</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('doctor.examination.save')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Diagnosis Name</label>
                            <input type="text" class="form-control" name="examination_name" required>
                        </div>
                        <div class="form-group">
                            <label>Diagnosis Remark</label>
                            <textarea type="text" class="form-control" name="examination_remark" required></textarea>
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


    <div class="modal fade" id="updatexm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Examination</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('doctor.examination.update')}}" method="post">
                    @csrf
                    <div class="modal-body">
                    <div class="form-group">
                        <label>Diagnosis Name</label>
                        <input type="text" class="form-control exmname" name="examination_name" >
                        <input type="hidden" class="form-control exmedit" name="examination_edit" >
                    </div>
                    <div class="form-group">
                        <label>Diagnosis Remark</label>
                        <textarea type="text" class="form-control exmremark" name="examination_remark" ></textarea>
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


    <div class="modal fade" id="delexm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Examination</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('doctor.examination.delete')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">

                            are you sure to delete this examination?
                            <input type="hidden" class="form-control exmdelete" name="examination_delete_id" >
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

        function deleteexm(id) {
            $('.exmdelete').val(id);
        }



        function editexamination(id)
        {
            var id = id;
            $.ajax({
                type : "POST",
                url : "{{route('get.single.examination')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'id' : id,
                },
                success:function (data) {

                    $('.exmedit').val(id);
                    $('.exmname').val(data.examination_name);
                    $('.exmremark').val(data.examination_remark);
                }
            });
        };

        $(document).ready(function () {

            $('#diagnosis').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('get_examination') }}",
                columns: [
                    { data: 'examination_name', name: 'examination_name','class':'text-center' },
                    { data: 'examination_remark', name: 'examination_remark','class':'text-center' },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        'class':'text-center',
                        type: 'num',
                        render: {
                            _: 'display',
                            sort: 'timestamp'
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false,'class':'text-center'},
                ]
            });
        })
    </script>

@stop
