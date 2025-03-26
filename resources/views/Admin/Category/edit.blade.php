@extends('admin.admin')
@section('main')


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Sửa Thể Loại</h1>
            <form action="{{ route('category.update', $category->id) }}" method="POST" role="form">
                @csrf @method('PUT')
                    
                <div class="form-group mb-3">
                    <label for="">Tên</label>
                    <input type="text" value="{{ $category->name }}" name="name" class="form-control" placeholder="input field">
                </div>
    
                <div class="form-group mb-3">
                    <label for="">Trạng thái</label>
                    <div class = "radio">
                        <label for="">
                            <input type="radio" name="status" value="1" {{ $category->status == 1 ? 'checked' : '' }}>
                            Hiện thị
                        </label>
                    </div>
    
                    <div class = "radio">
                        <label for="">
                            <input type="radio" name="status" value="0" {{ $category->status == 0 ? 'checked' : '' }}>
                            Tạm ẩn
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
                    
                
                    
            </form>
        </div>
    </div>
    
</div>








@endsection