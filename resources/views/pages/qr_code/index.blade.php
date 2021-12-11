@extends('layouts.master')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-center">
        {!! QrCode::size(250)->generate(config('constants.checkin_url')); !!}
    </div>
@endsection