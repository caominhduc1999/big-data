

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
                                    <form action="{{ route('updateStatus') }}"  method="POST" autocomplete="off">
                                        @csrf
                                         <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="id" class="form-control" value="{{$health_status->id}}">
                                                    <strong>Name:</strong>
                                                    <select class="selectpicker" name="customer_id" style="width:300px;"> >
                                                        @foreach($customers as $key => $customer)
                                                            <option value="{{ $customer->_id}}">{{$customer->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="alert-danger"><?php echo $errors->first('customer_id'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Calories:</strong>
                                                    <input type="text" name="calories" class="form-control" value="{{$health_status->calories}}" placeholder="calories">
                                                    <span class="alert-danger"><?php echo $errors->first('calories'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Fat Percentage:</strong>
                                                    <input type="text" name="fat_percentage" class="form-control" value="{{$health_status->fat_percentage}}" placeholder="fat_percentage">
                                                    <span class="alert-danger"><?php echo $errors->first('fat_percentage'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Height:</strong>
                                                    <input type="text" name="height" class="form-control" value="{{$health_status->height}}" placeholder="Height">
                                                    <span class="alert-danger"><?php echo $errors->first('height'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Weight:</strong>
                                                    <input type="text" name="weight" class="form-control" value="{{$health_status->weight}}" placeholder="Weight">
                                                    <span class="alert-danger"><?php echo $errors->first('weight'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>BMI:</strong>
                                                    <input type="text" name="remark" class="form-control" value="{{$health_status->remark}}" placeholder="remark">
                                                    <span class="alert-danger"><?php echo $errors->first('remark'); ?></span>
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
        $('[name="customer_id"]').val(model.item.customer_id).attr('selected',true);
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $(document).ready(function() {
            $('.selectpicker').select2();
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
