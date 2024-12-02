@extends('layout')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Kết quả tìm kiếm cho {{ $keyword }}</h1>

        <div class="allProduct row">
            @foreach ($products as $product)
                <div class="product border" style="width: 22%; height: 400px; margin-right: 3%; margin-top: 40px;">
                    <img src="{{ $product->img }}" alt="{{ $product->name }}" width="100%;" style="margin-top: 10px;">
                    <p class="fs-2" style="margin: 10px 0 10px 0">{{ $product->name }}</p>
                    <p class="fs-3">$ {{ number_format($product->price) }}</p>
                    <a class="detail" href="{{ url('/product/show/' . $product->id) }}" style="text-decoration: none; color: white;">
                        <div class="border bg-primary" style="text-align: center; height: 40px; line-height: 40px;">
                            Chi tiết
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection