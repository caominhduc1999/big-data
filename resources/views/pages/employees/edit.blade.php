

    @extends('layouts.master')

    @section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\plugins\jquery.datetimepicker.min.css')}}">

    @endsection

    @section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="{{ route('updateEmployee') }}"  method="POST" autocomplete="off">
                                        @csrf
                                         <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Name:</strong>
                                                    <input type="hidden" name="id" class="form-control" value="{{$employee->id}}">
                                                    <input type="text" name="name" class="form-control" value="{{$employee->name}}" placeholder="Name">
                                                    <span class="alert-danger"><?php echo $errors->first('name'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Employee Type:</strong>
                                                    <select class="col-xs-12 col-sm-12 col-md-12 form-group" name="employee_type_id" id="">
                                                        @foreach($type as $key => $value)
                                                        <option value="{{$value->_id}}">{{$value->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Birthday:</strong>
                                                    <input type="text" name="birthday" value="{{$employee->birthday}}" class="form-control datetimepicker" placeholder="Birthday">
                                                    <span class="alert-danger"><?php echo $errors->first('birthday'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Hire Date:</strong>
                                                    <input type="text" id="datetimepicker" name="hire_date" value="{{$employee->hire_date}}" class="form-control datetimepicker" placeholder="Hire Date">
                                                    <span class="alert-danger"><?php echo $errors->first('birthday'); ?></span>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary">Edit</button>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    @endsection

    @section('scripts')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets\plugins\jquery.datetimepicker.full.js') }}"></script>
    <script>

        $(function() {
            var model = <?php echo json_encode([
            'item' => $item,
        ]) ?>;
        $('[name="employee_type_id"]').val(model.item.employee_type_id).attr('selected',true);
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $('.datetimepicker').datetimepicker({
            autoclose: true,
             timepicker :false,
             datepicker :true,
             format : 'd/m/Y',
        });
        $.datetimepicker.setlocale('vi');
        // $(document).ready(function() {
        //     $('[name="employee_type_id"]').prepend($('<option>', {value: '', text: '--Chọn--'}));
        // })
    </script>
    @endsection
