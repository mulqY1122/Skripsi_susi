@extends('adminlte.layouts.app')

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Buat FAQ Baru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('faqs.index') }}">FAQ</a></li>
              <li class="breadcrumb-item active">Buat FAQ Baru</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg">
              <div class="card-header bg-gradient-primary text-white text-center">
                <h3 class="card-title">Form FAQ</h3>
              </div>
              <div class="card-body p-4">
                <form action="{{ route('faqs.store') }}" method="POST" id="faqForm">
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="subject" class="font-weight-bold">Subject</label>
                        <input type="text" class="form-control form-control-lg" id="subject" name="subject" placeholder="Masukkan subject" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="message" class="font-weight-bold">Message</label>
                        <textarea class="form-control form-control-lg" id="message" name="message" rows="4" placeholder="Tulis pertanyaan Anda di sini..." required></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-success btn-lg">Submit</button>
                      <button type="reset" class="btn btn-danger btn-lg">Reset</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer text-muted text-center">
                <small>Pastikan informasi yang Anda masukkan sudah benar.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.getElementById('faqForm').addEventListener('submit', function(event) {
      event.preventDefault();
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: 'Pastikan semua data sudah benar sebelum mengirim.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, kirim!',
        cancelButtonText: 'Batal',
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: 'Terkirim!',
            text: 'FAQ Anda telah berhasil dikirim.',
            icon: 'success',
            confirmButtonText: 'OK',
            customClass: {
              confirmButton: 'btn btn-primary'
            },
            buttonsStyling: false
          }).then(() => {
            event.target.submit();
          });
        }
      });
    });
  </script>
@endsection
