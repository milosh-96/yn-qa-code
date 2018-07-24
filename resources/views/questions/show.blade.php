@extends('layouts.web')
@section('title')
{{$item->title}}
@endsection
@section('content')
@include('questions.item')
@endsection