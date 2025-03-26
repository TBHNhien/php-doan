@extends('admin.admin')
@section('main')


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Thêm Sản Phẩm</h1>
            <form action="{{ route('product.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                    
                    <div class="form-group mb-3">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Số lượng</label>
                        <input type="text" name="quantity" class="form-control" placeholder="Nhập số lượng">
                        @error('quantity') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Giá</label>
                        <input type="text" name="price" class="form-control" placeholder="Nhập giá">
                        @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Nội dung</label>
                        <input type="text" name="content" class="form-control" placeholder="Nhập mô tả">
                        @error('content') <small class="text-danger">{{ $message }}</small> @enderror
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
                        @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>Thể loại</label>
                        <select name="category_id" class="form-control">
                            <option value="" disabled selected>Chọn thể loại</option>
                            @foreach($cats as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>Chọn ảnh</label>
                        <input id="inputImage" type="file" name="image" class="form-control-file">
                        @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        <img id="showImage" width="200px" height="300px" src="#" alt="Preview Image" style="display: none;">
                    </div>
                    <div class="form-group mb-3">
                        <label>Các ảnh khác</label>
                        <input id="inputImages" type="file" name="moreImages[]" multiple class="form-control-file">
                        <div id="showImages" class="row"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    
                
                    
            </form>
        </div>
    </div>
    
</div>

<script>
    document.getElementById('inputImage').onchange = function(e) {
        var reader = new FileReader();
        
        reader.onload = function(event) {
            var img = document.getElementById('showImage');
            img.src = event.target.result;
            img.style.display = 'block';
        }
        
        reader.readAsDataURL(e.target.files[0]);
    }

    document.getElementById('inputImages').onchange = function(e) {
        var previewImagesDiv = document.getElementById('showImages');
        previewImagesDiv.innerHTML = ''; // Xóa bất kỳ ảnh nào đã hiển thị trước đó

        var files = e.target.files;
        for (var i = 0; i < files.length; i++) {
            var reader = new FileReader();
            reader.onload = function(event) {
                var img = document.createElement('img');
                img.src = event.target.result;
                img.style.width = '200px'; // Thiết lập kích thước ảnh
                img.style.height = '300px';

                var div = document.createElement('div');
                div.setAttribute('class', 'col-md-4');
                div.appendChild(img);
                previewImagesDiv.appendChild(div);
            }
            reader.readAsDataURL(files[i]);
        }
    }
</script>






@endsection