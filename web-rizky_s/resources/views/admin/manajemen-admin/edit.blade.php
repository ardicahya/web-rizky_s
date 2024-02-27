@extends('admin.layout')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="/users/{{$user->id}}/update" method="post">
            @csrf
            @method('put')
        <div class="form-group mb-4">
            <label for="name">Nama</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name}}">
        </div>

        <div class="form-group mb-4">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $user->email}}">
        </div>

        <div class="form-group mb-4">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password">
            <small>kosongkan jika tidak ingin mengubah password</small>
        </div>

        <button class="btn btn-primary d-block mx-auto" type="submit">simpan 📂</button>
        </form>
    </div>
</div>
@endsection