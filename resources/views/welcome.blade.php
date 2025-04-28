<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Hairnic - Single Product Website Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="main/assets/img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Poppins:wght@200;600;700&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="main/assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="main/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="main/assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="main/assets/css/style.css" rel="stylesheet">
</head>
<style>
p {
    text-align: justify;
}
</style>



<body>
    {{-- <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End --> --}}


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <a href="index.html" class="navbar-brand">
                    <h2 class="text-white">SIM Bank-Sampah</h2>
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="{{ route('login') }}" class="btn py-2 px-4 d-none d-lg-inline-block text-white" style="background: linear-gradient(to right, #a8e6a3, #025c0b); border: none; font-weight: 600;">
                      Login
                    </a>
                    
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 text-center text-lg-start">
                    <h3 class="fw-light text-white animated slideInRight">Bersih, Hijau, dan Berkelanjutan</h3>
              <h1 class="display-4 text-white animated slideInRight">Sistem <span class="fw-light text-dark">Pengelolaan Bank Sampah</span></h1>
              <p class="text-white mb-4 animated slideInRight">Kelurahan Padasuka berkomitmen menjaga lingkungan melalui pengelolaan sampah yang terorganisir dan partisipatif. Mari bersama wujudkan lingkungan yang bersih dan sehat.</p>
                    <a href="" class="btn btn-dark py-2 px-4 me-3 animated slideInRight">Shop Now</a>
                    <a href="" class="btn btn-outline-dark py-2 px-4 animated slideInRight">Contact Us</a>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid animated pulse infinite" src="{{ asset('main/assets/img/Capture.jpg') }}" alt="" style="border-radius: 15px;">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Feature Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="feature-item position-relative bg-primary text-center p-3">
                        <div class="border py-5 px-3">
                            <i class="fa fa-leaf fa-3x text-dark mb-4"></i>
                            <h5 class="text-white mb-0">100% Natural</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="feature-item position-relative bg-primary text-center p-3">
                        <div class="border py-5 px-3">
                            <i class="fa fa-tint-slash fa-3x text-dark mb-4"></i>
                            <h5 class="text-white mb-0">Anti Hair Fall</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="feature-item position-relative bg-primary text-center p-3">
                        <div class="border py-5 px-3">
                            <i class="fa fa-times fa-3x text-dark mb-4"></i>
                            <h5 class="text-white mb-0">Hypoallergenic</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <img class="img-fluid animated pulse infinite" src="{{ asset('main/assets/img/Capture.jpg') }}" alt="" style="border-radius: 15px;">
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="text-primary mb-4">Bank Sampah <span class="fw-light text-dark">Kel-Padasuka</span></h1>
                <p class="mb-4" style="text-align: justify;">Bank Sampah Kel-Padasuka adalah sebuah inisiatif masyarakat untuk mengelola sampah secara lebih bijaksana dengan cara mendaur ulang dan mengurangi sampah yang berbahaya. Kami berfokus pada pengelolaan sampah plastik, organik, dan non-organik di lingkungan sekitar.</p>
                <p class="mb-4" style="text-align: justify;">Melalui program ini, kami mendorong warga untuk memilah sampah dan menabung sampah yang bisa didaur ulang, sehingga dapat mengurangi dampak lingkungan yang negatif. Bank Sampah Kel-Padasuka juga berperan dalam memberikan edukasi kepada masyarakat mengenai pentingnya menjaga kebersihan dan kelestarian alam.</p>
                <p class="mb-4" style="text-align: justify;">Dengan bergabung dalam program ini, Anda tidak hanya berpartisipasi dalam menjaga kebersihan lingkungan tetapi juga membantu meningkatkan kualitas hidup melalui pengelolaan sampah yang lebih efisien dan ramah lingkungan.</p>
                <a class="btn btn-primary py-2 px-4" href="">Gabung Sekarang</a>
            </div>
            
        </div>
    </div>
</div>
<!-- About End -->




<!-- Feature Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="text-primary mb-3"><span class="fw-light text-dark">Mengenal Jenis-Jenis</span> Sampah</h1>
            <p class="mb-5">Memahami jenis-jenis sampah dan dampaknya terhadap lingkungan sangat penting untuk menciptakan masa depan yang lebih berkelanjutan. Mari kita pelajari berbagai jenis sampah dan cara mengelolanya dengan baik.</p>
        </div>
        <div class="row g-4 align-items-center">
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="row g-5">
                    <div class="col-12 d-flex">
                        <div class="btn-square rounded-circle border flex-shrink-0"
                            style="width: 80px; height: 80px;">
                            <i class="fa fa-recycle fa-2x text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <h5>Sampah Organik</h5>
                            <hr class="w-25 bg-primary my-2">
                            <span>Termasuk sisa makanan, sampah kebun, dan bahan lain yang dapat terurai secara alami.</span>
                        </div>
                    </div>
                    <div class="col-12 d-flex">
                        <div class="btn-square rounded-circle border flex-shrink-0"
                            style="width: 80px; height: 80px;">
                            <i class="fa fa-recycle fa-2x text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <h5>Sampah Plastik</h5>
                            <hr class="w-25 bg-primary my-2">
                            <span>Sampah yang tidak terurai secara alami dan membutuhkan ratusan tahun untuk terdegradasi.</span>
                        </div>
                    </div>
                    <div class="col-12 d-flex">
                        <div class="btn-square rounded-circle border flex-shrink-0"
                            style="width: 80px; height: 80px;">
                            <i class="fa fa-recycle fa-2x text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <h5>Sampah Elektronik</h5>
                            <hr class="w-25 bg-primary my-2">
                            <span>Termasuk barang elektronik lama atau rusak seperti ponsel, komputer, dan TV.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <img class="img-fluid animated pulse infinite" src="{{ asset('main/assets/img/Capture.jpg') }}" alt="" style="border-radius: 15px;">
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="row g-5">
                    <div class="col-12 d-flex">
                        <div class="btn-square rounded-circle border flex-shrink-0"
                            style="width: 80px; height: 80px;">
                            <i class="fa fa-recycle fa-2x text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <h5>Sampah Kaca</h5>
                            <hr class="w-25 bg-primary my-2">
                            <span>Bahan yang dapat didaur ulang seperti botol, jar, dan barang kaca lainnya.</span>
                        </div>
                    </div>
                    <div class="col-12 d-flex">
                        <div class="btn-square rounded-circle border flex-shrink-0"
                            style="width: 80px; height: 80px;">
                            <i class="fa fa-recycle fa-2x text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <h5>Sampah Logam</h5>
                            <hr class="w-25 bg-primary my-2">
                            <span>Termasuk kaleng, aluminium foil, dan logam bekas lainnya yang bisa didaur ulang.</span>
                        </div>
                    </div>
                    <div class="col-12 d-flex">
                        <div class="btn-square rounded-circle border flex-shrink-0"
                            style="width: 80px; height: 80px;">
                            <i class="fa fa-recycle fa-2x text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <h5>Sampah Berbahaya</h5>
                            <hr class="w-25 bg-primary my-2">
                            <span>Sampah yang berisiko bagi kesehatan manusia dan lingkungan, seperti bahan kimia dan baterai.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->



<!-- How To Use Start -->
<div class="container-fluid how-to-use bg-primary my-5 py-5">
    <div class="container text-white py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="text-white mb-3"><span class="fw-light text-dark">Cara Menggunakan</span> Sim-Sampah
                <span class="fw-light text-dark">Kel-Padasuka</span></h1>
            <p class="mb-5">Sim-Sampah Kel-Padasuka adalah program untuk mengelola sampah secara bijak. Ikuti langkah-langkah berikut untuk berpartisipasi dalam menjaga kebersihan lingkungan!</p>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 text-center wow fadeIn" data-wow-delay="0.1s">
                <div class="btn-square rounded-circle border mx-auto mb-4" style="width: 120px; height: 120px;">
                    <i class="fa fa-trash fa-3x text-dark"></i>
                </div>
                <h5 class="text-white">Pisahkan Sampah</h5>
                <hr class="w-25 bg-light my-2 mx-auto">
                <span>Pisahkan sampah berdasarkan jenisnya seperti sampah organik, plastik, dan non-organik.</span>
            </div>
            <div class="col-lg-4 text-center wow fadeIn" data-wow-delay="0.3s">
                <div class="btn-square rounded-circle border mx-auto mb-4" style="width: 120px; height: 120px;">
                    <i class="fa fa-recycle fa-3x text-dark"></i>
                </div>
                <h5 class="text-white">Tabung Sampah Daur Ulang</h5>
                <hr class="w-25 bg-light my-2 mx-auto">
                <span>Setelah memilah, simpan sampah yang bisa didaur ulang di tempat yang telah disediakan.</span>
            </div>
            <div class="col-lg-4 text-center wow fadeIn" data-wow-delay="0.5s">
                <div class="btn-square rounded-circle border mx-auto mb-4" style="width: 120px; height: 120px;">
                    <i class="fa fa-credit-card fa-3x text-dark"></i>
                </div>
                <h5 class="text-white">Dapatkan Poin</h5>
                <hr class="w-25 bg-light my-2 mx-auto">
                <span>Setiap sampah yang ditabung akan dihargai dengan poin yang bisa ditukar dengan berbagai manfaat.</span>
            </div>
        </div>
    </div>
</div>
<!-- How To Use End -->









<!-- Blog Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="text-primary mb-3"><span class="fw-light text-dark">From Our</span> Blog Articles</h1>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aliquet, erat non malesuada consequat, nibh erat tempus risus.</p>
        </div>
        <div class="row g-4">
            @php
                // Ambil semua data dokumen kegiatan langsung dari model
                $dokKegiatans = \App\Models\DokKegiatan::all(); 
            @endphp

            @foreach($dokKegiatans as $dokKegiatan) <!-- Iterasi setiap dokumen kegiatan -->
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="blog-item border h-100 p-4">
                        <!-- Menggunakan gambar dari dokumen atau gambar default -->
                        <img class="img-fluid mb-4" src="{{ asset($dokKegiatan->path_file) }}" alt="Dokumen Kegiatan">
                        <a href="{{ route('dok_kegiatan.show', $dokKegiatan->id) }}" class="h5 lh-base d-inline-block">{{ $dokKegiatan->nama_dokumen }}</a> <!-- Judul dokumen -->
                       
                        <p class="mb-4">{{ $dokKegiatan->deskripsi }}</p> <!-- Deskripsi dokumen -->
                        <a href="{{ route('dok_kegiatan.show', $dokKegiatan->id) }}" class="btn btn-outline-primary px-3">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Blog End -->



    <!-- Newsletter Start -->
    <div class="container-fluid newsletter bg-primary py-5 my-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-white mb-3"><span class="fw-light text-dark">Let's Subscribe</span> The Newsletter</h1>
                <p class="text-white mb-4">Subscribe now to get 30% discount on any of our products</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 wow fadeIn" data-wow-delay="0.5s">
                    <div class="position-relative w-100 mt-3 mb-2">
                        <input class="form-control w-100 py-4 ps-4 pe-5" type="text" placeholder="Enter Your Email"
                            style="height: 48px;">
                        <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i
                                class="fa fa-paper-plane text-white fs-4"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter End -->


<!-- Footer Start -->
<div class="container-fluid bg-white footer">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                <a href="index.html" class="d-inline-block mb-3">
                    <h1 class="text-primary">SIM-BANK Sampanh Kel-Padasuka</h1>
                </a>
                <p class="mb-0">SIM-BANK Sampanh Kel-Padasuka adalah sistem manajemen informasi berbasis web yang dirancang untuk mempermudah pengelolaan data bank sampah di wilayah Kelurahan Padasuka..</p>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                <h5 class="mb-4">Get In Touch</h5>
                <p><i class="fa fa-map-marker-alt me-3"></i>Kelurahan Padasuka, Kota Bandung, Indonesia</p>
                <p><i class="fa fa-phone-alt me-3"></i>+022 345 67890</p>
                <p><i class="fa fa-envelope me-3"></i>info@sim-banksampanh.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-primary me-1" href="https://twitter.com/sim_banksampanh"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-primary me-1" href="https://facebook.com/sim-banksampanh"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-primary me-1" href="https://instagram.com/sim_banksampanh"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-square btn-outline-primary me-1" href="https://linkedin.com/company/sim-banksampanh"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                <h5 class="mb-4">Our Services</h5>
                <a class="btn btn-link" href="">Waste Collection</a>
                <a class="btn btn-link" href="">Recycling Programs</a>
                <a class="btn btn-link" href="">Waste Bank Membership</a>
                <a class="btn btn-link" href="">Educational Outreach</a>
                <a class="btn btn-link" href="">Green Community Initiatives</a>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                <h5 class="mb-4">Quick Links</h5>
                <a class="btn btn-link" href="#">About Us</a>
                <a class="btn btn-link" href="#">Contact Us</a>
                <a class="btn btn-link" href="#">Privacy Policy</a>
                <a class="btn btn-link" href="#">Terms & Conditions</a>
                <a class="btn btn-link" href="#">Volunteer with Us</a>
            </div>
        </div>
    </div>
    <div class="container wow fadeIn" data-wow-delay="0.1s">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">SIM-BANK Sampanh Kel-Padasuka</a>, All Right Reserved.

                    Designed By <a class="border-bottom" href="https://htmlcodex.com">Stmik Bandung</a> Distributed by <a href="https://themewagon.com">Susi</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="#">Home</a>
                        <a href="#">Cookies</a>
                        <a href="#">Help</a>
                        <a href="#">FAQs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


   <!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>

</body>

</html>