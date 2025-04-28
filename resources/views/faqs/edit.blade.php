@extends('adminlte.layouts.app')

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Respon FAQ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('faqs.index') }}">FAQ</a></li>
              <li class="breadcrumb-item active">Respon</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="card shadow-lg">
              <div class="card-header bg-primary text-white">
                <h3 class="card-title">Form Respon FAQ</h3>
              </div>
              <div class="card-body">
                <form action="{{ route('faqs.update', $faq->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  
                  <div class="form-group">
                    <label for="question" class="font-weight-bold">Pertanyaan</label>
                    <input type="text" class="form-control" id="question" value="{{ $faq->subject }}" disabled>
                  </div>
                  
                  <div class="form-group">
                    <label for="message" class="font-weight-bold">Pesan</label>
                    <textarea class="form-control" id="message" rows="4" disabled>{{ $faq->message }}</textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="answer" class="font-weight-bold">Jawaban</label>
                    <textarea class="form-control" id="answer" name="answer" rows="4" required>{{ $faq->answer }}</textarea>
                  </div>

                  <div class="d-flex justify-content-between">
                    <a href="{{ route('faqs.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success" onclick="confirmUpdate(event)">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function confirmUpdate(event) {
      event.preventDefault();
      Swal.fire({
        title: 'Konfirmasi',
        text: "Apakah Anda yakin ingin memperbarui jawaban?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Update!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          event.target.closest('form').submit();
        }
      });
    }
  </script>
@endsection
