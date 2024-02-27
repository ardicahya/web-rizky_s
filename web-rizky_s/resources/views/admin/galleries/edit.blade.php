@extends('admin.layout')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="/galleries/{{ $gallery->id }}" method="post">
            @csrf
            @method('put')
            <div class="form-group mb-3">
                <label for="post_id">Judul Post</label>
                <select name="post_id" class="form-control" id="post_id" required>
                    <option value="">Pilih Post</option>
                    @foreach ( $posts as $post )
                    <option value="{{ $post->id }}" @if($post->id ==$gallery->post_id) selected @endif>{{ $post->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">

                    <div class="form-group mb-3">
                        <label for="position">posisi</label>
                        <input type="number" name="position" class="form-control" id="position" required value="{{ $gallery->position}}">
                        <small>Nilai Posisi Harus Berupa Angka.</small>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group mb-3">
                        <label for="status">status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="">Pilih Status</option>
                            <option value="aktif" @if($gallery->status == 'aktif') selected @endif>Aktif</option>
                            <option value="non-aktif"  @if($gallery->status == 'tidak-aktif') selected @endif>Tidak Aktif</option>
                        </select>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary d-block mx-auto" type="submit">simpan 📂</button>
        </form>
    </div>
</div>
@endsection