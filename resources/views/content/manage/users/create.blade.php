@extends('layout.admin')

@section('title', 'Manage User | RoostControl')

@section('content')
<div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Create Users</h5>
                <form action="{{url('manage/users/index')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="field-avatar" class="form-label">Avatar</label>
                        <input class="form-control" type="avatar" id="field-avatar" name="avatar">
                      </div>
                    <div class="mb-3">
                        <label for="field-name" class="form-label">Name</label>
                        <input type="name" class="form-control" id="field-name" placeholder="John Doe" name="name">
                      </div>
                      <div class="mb-3">
                        <label for="field-email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="field-email" placeholder="name@example.com" name="email">
                      </div>
                      <div class="mb-3">
                        <label for="field-password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="field-password" name="password">
                      </div>
                      <div class="d-flex justify-content-end">
                          <button type="submit" class="btn btn-primary">Tambah</button>
                      </div>
                </form>
            </div>
        </div>
    </div>

@endsection
