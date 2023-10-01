@extends('layouts.app')

@section('content')
    <h1>product_list</h1>
    <a href="{{ route('product_popularity') }}">客人気</a><br>
    @foreach($product_type as $type)
      <a href="{{ route('product_change',['id'=>$type->id]) }}">
        <img src="{{ asset(Storage::url($type->img_path)) }}">
        <p>{{ $type->product_explanation }}</p><br>
      </a>
      <form action="{{ route('product_destroy',['id'=>$type->id]) }}" method="post">
        @csrf
        <input type="hidden" value="{{ $type->id }}">
        <button type="submit" class="btn btn-danger ml-3">
          {{ __('削除') }}
        </button>
      </form>
    @endforeach
@endsection