@extends('adminlte.layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detail Data Nasabah</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('data_nasabah.index') }}">Daftar Nasabah</a></li>
            <li class="breadcrumb-item active">Detail Data Nasabah</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail Data Nasabah</h3>
            </div>
            <div class="card-body">
              <p><strong>Nama:</strong> {{ $dataNasabah->user->name }}</p>
              <p><strong>RW:</strong> {{ $dataNasabah->namaRw->nama_rw }}</p>
              <p><strong>No Telepon:</strong> {{ $dataNasabah->no_telepon }}</p>
              <p><strong>Jenis Kelamin:</strong> {{ ucfirst($dataNasabah->jenis_kelamin) }}</p>
              <p><strong>Foto Profil:</strong></p>
              @if($dataNasabah->foto_profil)
                <img src="{{ asset('storage/'.$dataNasabah->foto_profil) }}" alt="Foto Profil" width="150" height="150">
              @else
                <span>--</span>
              @endif
            </div>
          </div>
        </div>
      </div>

      <a href="{{ route('data_nasabah.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar</a>
    </div>
  </section>
</div>
@endsection
