@extends('layouts.app')


@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div>
    <!-- reactを読み込む -->
    <div id="topApp">
        <top-component></top-component>
    </div>
</div>
@endsection