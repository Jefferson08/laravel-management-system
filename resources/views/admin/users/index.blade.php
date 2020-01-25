@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                            <th scope="col" class="text-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row" class="align-middle">{{$user->id}}</th>
                                    <td class="align-middle">{{$user->name}}</td>
                                    <td class="align-middle">{{$user->email}}</td>
                                    <td class="align-middle">{{ implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                                    <td class="d-flex justify-content-center">
                                        @can('edit-users')
                                        <a href="{{route('admin.users.edit', $user)}}" >
                                            <button type="button" class="btn btn-primary float-left" style="margin-right:10px;">Edit</button>
                                        </a>
                                        @endcan
                                    
                                        @can('delete-users')
                                        <form method="POST" action="{{route('admin.users.destroy', $user->id)}}" class="float-left">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
