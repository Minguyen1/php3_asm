@extends('admin.layout')

@section('title', 'create product')

@section('content')
    <div class="container w-60 mt-5">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Category Name</label>
                <select name="category_id" id="" class="form-control" required>
                    <option value="" disabled selected>Chọn loại sản phẩm</option>
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}">
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" name="img" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Price</label>
                <input type="number" name="price" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Description</label>
                <textarea name="description" rows="5" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create New</button>
            </div>
        </form>
    </div>
@endsection
