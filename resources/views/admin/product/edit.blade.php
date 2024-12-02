@extends('admin.layout')

@section('title', 'Thêm mới')

@section('content')
    <div class="container">
        <h2>Chỉnh sửa sản phẩm</h2>
        <form action="{{ route('product.update', $products->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') ?? $products->name }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="img" class="form-label">Hình ảnh</label>
                <img src="{{ asset('storage/' . $products->img) }}" alt="" width="100px">
                <input type="file" name="img" class="form-control" id="img">
                @error('img')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="text" name="price" class="form-control" id="price" value="{{ old('price') ?? $products->price }}">
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <input type="text" name="description" class="form-control" id="description" value="{{ old('description') ?? $products->description }}">
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="category_id" class="form-label">Thể loại</label>
                <select name="category_id" class="form-select" id="category_id">
                    <option value="" disabled selected>Chọn thể loại</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected($category->id === $products->categories)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection