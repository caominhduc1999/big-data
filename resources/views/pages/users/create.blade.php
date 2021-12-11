

    @extends('layouts.master')

    @section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
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
                                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                         <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Name:</strong>
                                                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Name">
                                                    <span class="alert-danger"><?php echo $errors->first('name'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Image:</strong>
                                                    <input type="file" name="image" class="form-control">
                                                    <span class="alert-danger"><?php echo $errors->first('image'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Birthday:</strong>
                                                    <input type="date" name="birthday" value="{{old('birthday')}}" class="form-control" placeholder="Birthday">
                                                    <span class="alert-danger"><?php echo $errors->first('birthday'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Address:</strong>
                                                    <input type="text" name="address" value="{{old('address')}}" class="form-control" placeholder="Address">
                                                    <span class="alert-danger"><?php echo $errors->first('address'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Email:</strong>
                                                    <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                                                    <span class="alert-danger"><?php echo $errors->first('email'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Phone:</strong>
                                                    <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Phone">
                                                    <span class="alert-danger"><?php echo $errors->first('phone'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Password:</strong>
                                                    <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Password">
                                                    <span class="alert-danger"><?php echo $errors->first('password'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Gender:</strong>
                                                    <select class="form-control" name="gender" id="">
                                                        <option value="">--Chọn--</option>
                                                        <option value="0">Nam</option>
                                                        <option value="1">Nữ</option>
                                                    </select>
                                                    <span class="alert-danger"><?php echo $errors->first('gender'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Vai trò:</strong>
                                                    <select class="form-control" name="role" id="role">
                                                        <option value="">--Chọn--</option>
                                                        <option value="0">ADMIN</option>
                                                        <option value="1">Khách hàng</option>
                                                        <option value="2">Nhân viên</option>
                                                    </select>
                                                    <span class="alert-danger"><?php echo $errors->first('role'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12" id="customer_type">
                                                <div class="form-group">
                                                    <strong>Loại khách hàng:</strong>
                                                    <select class="form-control" name="customer_type_id" id="">
                                                        <option value="">--Chọn--</option>
                                                        @foreach($customerTypes as $customerType)
                                                            <option value="{{ $customerType->id }}">{{ $customerType->customer_type_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="alert-danger"><?php echo $errors->first('customer_type_id'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12" id="employee_type">
                                                <div class="form-group">
                                                    <strong>Loại nhân viên:</strong>
                                                    <select class="form-control" name="employee_type_id" id="">
                                                        <option value="">--Chọn--</option>
                                                        @foreach($employeeTypes as $employeeType)
                                                            <option value="{{ $employeeType->id }}">{{ $employeeType->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="alert-danger"><?php echo $errors->first('employee_type_id'); ?></span>
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

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        $('#customer_type').hide();
        $('#employee_type').hide();
        $('#role').on('change', function() {
            if (this.value == 1) {
                $('#customer_type').show();
                $('#employee_type').hide();
            } else if (this.value == 2) {
                $('#customer_type').hide();
                $('#employee_type').show();
            } else {
                $('#customer_type').hide();
                $('#employee_type').hide();
            }
        })
    </script>
    @endsection
