@extends('layouts.app')
@php
@endphp
@section('content')
  @while(have_posts()) @php(the_post())
  <div class="h-screen w-screen flex justify-center items-center">
    <div class="bg-slate-600 rounded-md py-4 px-12 text-white text-center text-lg font-medium">
      {{$title}}
    </div>
  </div>
  @endwhile
@endsection
