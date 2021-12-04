

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
                                    <form action="{{ route('updateUser') }}"  method="POST">
                                        @csrf
                                         <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Name:</strong>
                                                    <input type="hidden" name="id" class="form-control" value="{{$user->id}}">
                                                    <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="Name">
                                                    <span class="alert-danger"><?php echo $errors->first('name'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Birthday:</strong>
                                                    <input type="date" name="birthday" value="{{$user->birthday}}" class="form-control" placeholder="Birthday">
                                                    <span class="alert-danger"><?php echo $errors->first('birthday'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Address:</strong>
                                                    <input type="text" name="address" value="{{$user->address}}" class="form-control" placeholder="Address">
                                                    <span class="alert-danger"><?php echo $errors->first('address'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Email:</strong>
                                                    <input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="Email">
                                                    <span class="alert-danger"><?php echo $errors->first('email'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Phone:</strong>
                                                    <input type="text" name="phone" value="{{$user->phone}}" class="form-control" placeholder="Phone">
                                                    <span class="alert-danger"><?php echo $errors->first('phone'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Gender:</strong>
                                                    <select name="gender" value="{{$user->gender}}" id="">
                                                        <option value="">--Chọn--</option>
                                                        <option value="0" @if($user->gender == 0) selected @endif>Nam</option>
                                                        <option value="1" @if($user->gender == 1) selected @endif>Nữ</option>
                                                    </select>
                                                    <span class="alert-danger"><?php echo $errors->first('gender'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Roles:</strong>
                                                    <select name="gender" value="{{$user->gender}}" id="">
                                                        <option value="">--Chọn--</option>
                                                        <option value="0" @if($user->role == 0) selected @endif>ADMIN</option>
                                                        <option value="1" @if($user->role == 1) selected @endif>USER</option>
                                                    </select>
                                                    <span class="alert-danger"><?php echo $errors->first('gender'); ?></span>
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

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    @endsection
