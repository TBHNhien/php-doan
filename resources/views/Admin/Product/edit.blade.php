@extends('admin.admin')
@section('main')


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Sửa Sản Phẩm</h1>
            <form action="{{ route('product.update', $product->id) }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf @method('PUT')
                    
                <div class="form-group mb-3">
                    <label for="">Tên Sản Phẩm</label>
                    <input type="text" value="{{ $product->name }}" name="name" class="form-control" placeholder="input field">
                </div>
                
                <div class="form-group mb-3">
                    <label for="">Số lượng</label>
                    <input type="text" value="{{ $product->quantity }}" name="quantity" class="form-control" placeholder="input field">
                    @error('quantity') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">Giá</label>
                    <input type="text" value="{{ $product->price }}" name="price" class="form-control" placeholder="input field">
                    @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="">Nội dung</label>
                    <input type="text" value="{{ $product->content }}" name="content" class="form-control" placeholder="input field">
                    @error('content') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="">Trạng thái</label>
                    <div class = "radio">
                        <label for="">
                            <input type="radio" name="status" value="1" {{ $product->status == 1 ? 'checked' : '' }}>
                            Hiện thị
                        </label>
                    </div>
    
                    <div class = "radio">
                        <label for="">
                            <input type="radio" name="status" value="0" {{ $product->status == 0 ? 'checked' : '' }}>
                            Tạm ẩn
                        </label>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label>Thể loại</label>
                    <select name="category_id" class="form-control">
                        <option value="" disabled selected>Chọn thể loại</option>
                        @foreach($cats as $cat)
                            <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group mb-3 row">
                    <label>Chọn ảnh</label>
                    <input type="file" name="image" id="inputImage" class="form-control-file">
                    
                    <div class="col-md-4">
                        <img id="showImage" width="200px" height="300px" src="{{ asset('images/'.$product->image) }}" alt="">
                    </div>
                    
                </div>
                <div class="form-group mb-3">
                    <label>Các ảnh khác</label>
                    <input id="inputImages" type="file" name="moreImages[]" multiple class="form-control-file">
                    <div id="showImages" class="row">
                        @foreach($product->images as $image)
                        <div class="col-md-4">
                            <img width="200px" height="300px" src="{{ asset('images/'.$image->imageURL) }}" alt="">
                        </div>
                        @endforeach
                    </div>
                    
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
                    
                
                    
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