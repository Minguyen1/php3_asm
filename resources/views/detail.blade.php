@extends('layout')

@section('title', 'Chi tiết sản phẩm')

@section('content')
    <div class="container d-flex mt-5">
        <div class="f-left w-100">
            <img src="{{ $product->img }}" alt="{{ $product->name }}">
        </div>
        <div class="f-right w-100" style="margin-left: 50px">
            <p class="fs-1" style="margin: 20px 0 30px 0;">{{ $product->name }}</p>
            <hr>
            <p class="fs-4">{{ $product->description }}</p>
            <p class="fs-2" style="margin-top: 100px; margin-left: 20px">$ {{ number_format($product->price) }}</p>
            <div class="d-flex" style="width: 100%; margin-top: 60px;">
                <a href="" style="text-decoration: none; color: white; width: 50%;">
                    <div class="addCard border bg-primary" style="text-align: center; height: 40px; line-height: 40px;">
                        Thêm vào giỏ hàng
                    </div>
                </a>
                <a href="" style="text-decoration: none; color: white; width: 50%;">
                    <div class="buy border bg-danger" style="text-align: center; height: 40px; line-height: 40px;">
                        Mua ngay
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection