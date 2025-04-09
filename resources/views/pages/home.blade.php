@extends('layouts.master')
@section('title')
    Product
@endsection

@section('content')
<div class="page-header">
    <h3 class="fw-bold mb-3">Data Produk</h3>
    <ul class="breadcrumbs mb-3">
        <li class="nav-home">
            <a href="#"><i class="icon-home"></i></a>
        </li>
        <li class="separator"><i class="icon-arrow-right"></i></li>
        <li class="nav-item"><a href="#">Tables</a></li>
        <li class="separator"><i class="icon-arrow-right"></i></li>
        <li class="nav-item"><a href="#">Produk</a></li>
    </ul>
</div>

@if (session('success'))
 <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">+ Input Produk</a>

<table class="table table-bordered table-striped mt-3">
    <thead>
        <tr>
            <th scope="col" width="5%">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Harga</th>
            <th scope="col">Stok</th>
            <th scope="col" width="20%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($product as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>{{ $item->stok }}</td>
                <td>
                    <a href="{{ route('produk.show', $item->id) }}" class="btn btn-info btn-sm">Show</a>
                    <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Yakin ingin hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada data produk.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
