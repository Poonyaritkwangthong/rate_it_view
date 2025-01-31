@extends('layouts.admin')

@section('title')
    admin  index
@endsection

@section('content')
    <div class="container mx-auto">
        <H1 class="text-center">hello {{ Auth::user()->name }}</H1>
    </div>
@endsection
