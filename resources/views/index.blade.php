@extends('layouts.app')

@section('content')
  @if(is_category())
    @include('category')
  @else
    @include('sections.destacados')
    @include('sections.principales')
    @include('sections.publicidad')
    @include('sections.nacionales')
    @include('sections.politica')
    @include('sections.publicidad')
    @include('sections.internacionales')
    @include('sections.show')
    @include('sections.multimedia')
    @include('sections.podcasts')
    @include('sections.especiales')
  @endif
@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection
