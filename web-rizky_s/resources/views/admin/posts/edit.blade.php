@extends('admin.layout')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="/posts/{{ $post->id }}" method="post">
            @csrf
            @method('put')
        <div class="form-group mb-4">
            <label for="title">Judul</label>
            <input type="text" name="title" class="form-control" id="title" required value="{{ $post->title }}">
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group mb-4">
                <label for="category_id ">Kategori</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value=""  @if ( $post->kategory == '$categories' ) selected @endif>Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ( $category->id == $post->id ) selected @endif>{{ $post->title }}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="col">
                <div class="form-group mb-4">
                <label for="status ">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="">Pilih Status</option>
                    <option value="publish"@if ( $post->status == 'publish' ) selected @endif>Publish</option>
                    <option value="draft" @if ( $post->status == 'draft' ) selected @endif>Draft</option>
                </select>
                </div>
            </div>
        </div>

        <div class="form-group mb-4">
            <label for="content">Isi</label>
            <textarea name="content" id="conten" class="form-control" required>{{ $post->content }}</textarea>
        </div>

        <button class="btn btn-primary d-block mx-auto" type="submit">simpan 📂</button>
        </form>
    </div>
</div>
@endsection