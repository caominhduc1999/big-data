@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')

    <div class="container">

        <div class="row mb-5" style="border-bottom: 1px solid #ccc">

            <div class="col text-center">

                <img class="p-3" style="height: 80px; width: auto; border-top: 1px solid #ccc; background-color: #f7f7f7" src="{{ $selectedProduct->image }}" alt="Product Image">

                @foreach ($products as $product)

                <a href="/recommend-system/?id={{ $product->id }}" style="text-decoration: none;">

                    <img class="p-3" style="height: 200px; width: auto;" src="{{ $product->image }}" alt="Product Image">

                </a>

                @endforeach

            </div>

        </div>

        <div class="row">

            <div class="offset-3 col-6">

                <h5>Sản phẩm đang xem</h5>

            </div>

        </div>

        <div class="row mb-5">

            <div class="offset-3 col-6">

                <div class="card">

                    <div class="text-center" style="background-color: #ccc">

                        <img class="large-product-image"  style="height: 200px; width: auto;" src="{{ $selectedProduct->image }}" alt="Product Image">

                    </div>

                    <div class="card-body">

                        <p class="card-text text-muted">{{ $selectedProduct->name }} (${{ $selectedProduct->price }})</p>

                    </div>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="offset-3 col-6">

                <h5>Sản phẩm tương tự</h5>

            </div>

        </div>

        @foreach ($products as $product)

        <div class="row mb-5">

            <div class="offset-3 col-6">

                <div class="card">

                    <div class="text-center" style="background-color: #ccc">

                        <img class="large-product-image" style="height: 200px; width: auto;" src="{{ $product->image }}" alt="Product Image">

                    </div>

                    <div class="card-body">

                        <h5 class="card-title">Độ tương đồng: {{ round($product->similarity * 100, 1) }}%</h5>

                        <p class="card-text text-muted">{{ $product->name }} (${{ $product->price }})</p>

                    </div>

                </div>

            </div>

        </div>

        @endforeach

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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