@extends('admin.admin')
@section('main')
<h1>Thể Loại</h1>
<a href="{{ route('category.create') }}" class="btn btn-success">Tạo thể loại</a>
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
                <th scope="col">Tên</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cats as $cat)
            <tr class="">
                <td scope="row">{{ $cat->id }}</td>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->status == 0 ? "Tạm ẩn" : "Hiện thị" }}</td>
                <td>
                    <form action="{{ route('category.destroy', $cat->id) }}" method="post">
                        @csrf @method('DELETE')
                        <a href="{{ route('category.edit', $cat->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                        <button href="" class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
            
            
        </tbody>
    </table>
</div>

@endsection