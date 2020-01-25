@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit user: {{$user->name}}</div>

                <div class="card-body">
                    
                    <form class="form-group" method="POST" action="{{route('admin.users.update', $user)}}">
                        @csrf
                        @method('PUT')

                        @foreach ($roles as $role)

                            <div class="form_check">
                                <input type="checkbox" name="roles[]" value="{{$role->id}}" @if ($user->hasRole($role->name)) checked @endif>
                                <label>{{$role->name}}</label>
                            </div>

                        @endforeach
                       
                        <input class="btn btn-primary" type="submit" value="Update">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection