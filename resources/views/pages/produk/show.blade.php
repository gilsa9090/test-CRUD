@extends('layouts.master')
@section('title')
    Detail Produk
@endsection

@section('content')
<div class="page-header">
    <h3 class="fw-bold mb-4">Detail Produk</h3>
</div>

<div class="card shadow-sm border-0 rounded-4">
    <div class="card-body">
        <h4 class="card-title mb-3 fw-bold">{{ $produk->nama }}</h4>
        <hr>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Deskripsi</div>
            <div class="col-md-9">{{ $produk->deskripsi ?: '-' }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Harga</div>
            <div class="col-md-9">Rp{{ number_format($produk->harga, 0, ',', '.') }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Stok</div>
            <div class="col-md-9">{{ $produk->stok }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Dibuat</div>
            <div class="col-md-9">{{ $produk->created_at->format('d M Y H:i') }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Diperbarui</div>
            <div class="col-md-9">{{ $produk->updated_at->format('d M Y H:i') }}</div>
        </div>
    </div>
</div>

<a href="{{ route('produk.index') }}" class="btn btn-secondary mt-4">
    <i class="bi bi-arrow-left-circle me-1"></i> Kembali
</a>
@endsection
