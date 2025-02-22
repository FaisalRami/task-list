@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h1>Users List</h1>
    <div class="offset-md-2 col-md-8">
        <div class="card">
            @if (isset($user))
            <div class="card-header">
                Update User
            </div>
            <div class="card-body">
                <!-- Update User Form -->
                <form action="{{url('updateuser')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <!-- User Name -->
                    <div class="mb-3">
                        <label for="task-name" class="form-label">User</label>
                        <input type="text" name="name" id="task-name" class="form-control" value="{{$user->name}}">
                    </div>
                    <!-- User Email -->
                    <div class="mb-3">
                        <label for="task-name" class="form-label">Email</label>
                        <input type="email" name="email" id="task-name" class="form-control" value="{{$user->email}}">
                    </div>
                    <!-- User Password -->
                    <div class="mb-3">
                        <label for="task-name" class="form-label">Password</label>
                        <input type="password" name="password" id="task-name" class="form-control" value="{{$user->password}}">
                    </div>

                    <!-- Add User Button -->
                    <div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i>Update User
                        </button>
                    </div>
                </form>
            </div>
            @else
            <div class="card-header">
                New User
            </div>
            <div class="card-body">
                <!-- New User Form -->
                <form action="adduser" method="POST">
                    @csrf
                    <!-- User Name -->
                    <div class="mb-3">
                        <label for="task-name" class="form-label">User</label>
                        <input type="text" name="name" id="task-name" class="form-control" value="">
                    </div>
                    <!-- User Email -->
                    <div class="mb-3">
                        <label for="task-name" class="form-label">Email</label>
                        <input type="email" name="email" id="task-name" class="form-control" value="">
                    </div>
                    <!-- User Password -->
                    <div class="mb-3">
                        <label for="task-name" class="form-label">Password</label>
                        <input type="password" name="password" id="task-name" class="form-control" value="">
                    </div>

                    <!-- Add User Button -->
                    <div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i>Add User
                        </button>
                    </div>
                </form>
            </div>
            @endif

        </div>

        <!-- Current Tasks -->
        <div class="card mt-4">
            <div class="card-header">
                Current User
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $users as $user )
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>
                                <form action="/deleteuser/{{$user->id}}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash me-2"></i>Delete
                                    </button>
                                </form>
                                <form action="/edituser/{{$user->id}}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-info me-2"></i>Edit
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

