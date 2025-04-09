@extends('layouts.master')
@section('title')
    Edit Produk
@endsection

@section('content')
<div class="page-header">
    <h3 class="fw-bold mb-3">Edit Produk</h3>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('produk.update', $produk->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
        <label>Nama Produk</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $produk->nama) }}" required>
    </div>

    <div class="form-group mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
    </div>

    <div class="form-group mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" value="{{ old('harga', $produk->harga) }}" required>
    </div>

    <div class="form-group mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" value="{{ old('stok', $produk->stok) }}" required>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
