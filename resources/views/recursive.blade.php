@extends('layout')
@section('content')
    @if($tree)
        @include('recursive_category', ['category'=> $tree])
    @endif
@stop