@extends('layout.admin')

@section('title', 'Manage User | RoostControl')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Manage Devices</h5>
            <a href={{route('manage/device/create')}} class="btn btn-primary mb-3">Add Device</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>user id</th>
                        <th>Name</th>
                        <th>Create</th>
                        <th>Update</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $device)
                    <tr>
                        <td>{{ $device->id}}</td>
                        <td>{{ $device->user_id}}</td>
                        <td>{{ $device->name }}</td>
                        <td>{{ $device->created_at }}</td>
                        <td>{{ $device->updated_at }}</td>
                        <td>
                            <a href="{{ url('/manage/device/edit') }}" class="btn btn-secondary">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @endsection
