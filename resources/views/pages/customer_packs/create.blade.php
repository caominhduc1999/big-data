

    @extends('layouts.master')

    @section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery.datetimepicker.min.css')}}">

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
                                    <form action="{{ route('customer_packs.store') }}" method="POST" autocomplete="off">
                                        @csrf
                                         <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
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
                                                    <strong>Service:</strong>
                                                    <select class="selectpicker" name="service_id" style="width:300px;"> >
                                                        @foreach($services as $key => $service)
                                                            <option value="{{ $service->_id}}">{{$service->name}}</option>
                                                        @endforeach
                                                    </select>
                                                        <span class="alert-danger"><?php echo $errors->first('service_id'); ?></span>
                                                </div>
                                            </div>


                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Price:</strong>
                                                    <input type="text" name="price" class="form-control" value="{{old('price')}}" placeholder="Service">
                                                    <span class="alert-danger"><?php echo $errors->first('price'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Start Date:</strong>
                                                    <input type="text" name="start_date" class="form-control datetimepicker" value="{{old('start_date')}}" placeholder="Service">
                                                    <span class="alert-danger"><?php echo $errors->first('start_date'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>End Date:</strong>
                                                    <input type="text" name="end_date" class="form-control datetimepicker" value="{{old('end_date')}}" placeholder="Service">
                                                    <span class="alert-danger"><?php echo $errors->first('end_date'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
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
    <script src="{{ asset('assets/plugins/jquery.datetimepicker.full.js') }}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

    <script>
        $(function() {
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
    </script>
    @endsection
