@extends('admin.admin')
@section('main')
<h1>Product</h1>
<a href="{{ route('product.create') }}" class="btn btn-success">Create new Product</a>
<hr>

<div
    class="table-responsive"
>
    <table
        class="table table-primary"
    >
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                {{-- <th scope="col">Content</th> --}}
                <th scope="col">Category</th>
                {{-- <th scope="col">Status</th> --}}
                <th scope="col">Function</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $pro)
            <tr class="">
                <td scope="row">{{ $pro->id }}</td>
                <td>{{ $pro->name }}</td>
                <td>{{ $pro->quantity }}</td>
                <td><img width="150px" src="{{ asset('images/' . $pro->image) }}" alt=""></td>
                <td>{{ $pro->price }}</td>
                {{-- <td>{{ $pro->content }}</td> --}}
                <td>{{ $pro->category->name }}</td>
                {{-- <td>{{ $cat->status == 0 ? "Tạm ẩn" : "Hiện thị" }}</td> --}}
                <td>
                    <form action="{{ route('product.destroy', $pro->id) }}" method="post">
                        @csrf @method('DELETE')
                        <a href="{{ route('product.edit', $pro->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                        <a href="{{ route('product.show', $pro->id) }}" class="btn btn-sm btn-primary">Chi tiết</a>
                        <button href="" class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
            
            
        </tbody>
    </table>
</div>
{{ $products->links() }}
@endsection