@extends('admin.layout')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="/users/store" method="post">
            @csrf
        <div class="form-group mb-4">
            <label for="name">Nama</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group mb-4">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email">
        </div>

        <div class="form-group mb-4">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button class="btn btn-primary d-block mx-auto" type="submit">simpan 📂</button>
        </form>
    </div>
</div>
@endsection