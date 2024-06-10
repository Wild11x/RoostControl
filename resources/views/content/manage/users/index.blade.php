@extends('layout.admin')

@section('title', 'Manage User | RoostControl')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title fw-semibold mb-4">Manage Users</h5>
                <a href={{url('manage/users/create')}} class="btn btn-primary">Tambah Users</a>
                @csrf
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Avatar</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <th>
                            <img src="{{ asset('images/profile/user-1.jpg') }}" alt="" class="rounded-circle" style="width: 48px">
                        </th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a href="{{ url('/manage/users/'. $item->id . '/edit') }}" class="btn btn-secondary">Edit</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
