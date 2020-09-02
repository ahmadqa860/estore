@php
    $menu = App\Menu::all()->toArray();
@endphp
@extends('master')

@section('main_content')

<div class="container">
    <div class="row">
        <div class="row">
            <h1>OOPS The Page Not Found</h1>
        </div>
    </div>
</div>

@endsection