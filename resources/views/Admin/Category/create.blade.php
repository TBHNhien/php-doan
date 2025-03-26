@extends('admin.admin')
@section('main')


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Tạo Thể Loại</h1>
            <form action="{{ route('category.store') }}" method="POST" role="form">
                @csrf
                    
                    <div class="form-group mb-3">
                        <label for="">Tên</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Trạng thái</label>
                        <div class = "radio">
                            <label for="">
                                <input type="radio" name="status" value="1" checked>
                                Hiện thị
                            </label>
                        </div>
                
                        <div class = "radio">
                            <label for="">
                                <input type="radio" name="status" value="0">
                                Tạm ẩn
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tạo Mới</button>
                    
                
                    
            </form>
        </div>
    </div>
    
</div>








@endsection