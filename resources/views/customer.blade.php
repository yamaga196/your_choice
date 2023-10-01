@extends('layouts.app')

@section('content')
    <h1>投票するジャンルを選ぶ</h1>
    <a href="{{ route('customer_vote') }}">客投票</a>
    @foreach($product_type->unique('type') as $list)
    <a href="{{ route('product_list',['type'=>$list->type]) }}">{{ $list->type }}</a>
    @endforeach
@endsection