@extends('app')

@section('title', "{{$todo->name}}")

@section('content')

    @include('blocs.todo',$todo)

@endsection