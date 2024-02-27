@extends('admin.layout')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="/categories/{{ $category->id }}" method="post">
            @csrf
            @method('put')
            <div class="form-group mb-4">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $category->title }}" required>
            </div>

            <button class="btn btn-primary d-block mx-auto" type="submit">simpan 📂</button>
        </form>
    </div>
</div>
@endsection