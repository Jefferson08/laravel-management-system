@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit user: {{$user->name}}</div>

                <div class="card-body">

                    <form action="{{route('admin.users.update', $user)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" value="{{$user->name}}">

                              @error('name')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                               @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{$user->email}}" required>
                              @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>   
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-2">Roles</div>
                            <div class="col-sm-10">
                                @foreach ($roles as $role)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="roles[]" value="{{$role->id}}" @if ($user->hasRole($role->name)) checked @endif>
                                        <label class="form-check-label">
                                        {{$role->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                          </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection