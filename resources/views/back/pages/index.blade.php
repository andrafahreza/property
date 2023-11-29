@extends('back.layouts.app')

@section('content')
    <div class="col-lg-12 col-xl-6">
        <h3 class="card-title pb-3">Welcome {{ Auth::user()->name }}</h3>
    </div>
@endsection
