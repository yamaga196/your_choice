@extends('layouts.app')

@section('content')
<a href="{{ route('product_post') }}">Product post</a>
<a href="{{ route('customer_show') }}">customer_show</a><br>
  @foreach($product_list->unique('type') as $list)
    <a href="{{ route('product_list',['type'=>$list->type]) }}">{{ $list->type }}</a>
  @endforeach
@endsection