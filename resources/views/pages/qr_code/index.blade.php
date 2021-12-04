@extends('layouts.master')

@section('content')
    <div class="d-flex justify-content-center">
        {!! QrCode::size(250)->generate(config('constants.checkin_url')); !!}
    </div>
@endsection