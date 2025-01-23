@extends('layout.app') <!-- mengadopsi struktur layout dari app.blade.php -->

@section('title', 'Dashboard') <!-- judul halaman -->
@section('content') <!-- konten halaman utama -->

<!-- start: coding css konten halaman utama -->
<style>
  .custom-carousel {
    max-height: 30vh; /* Membatasi tinggi carousel hingga 30% dari viewport height */
    overflow: hidden; /* Memastikan tidak ada konten yang keluar */
  }

  .custom-carousel .carousel-inner img {
    height: 100%; /* Membuat gambar menyesuaikan tinggi carousel */
    object-fit: cover; /* Memastikan gambar tetap proporsional */
  }

  .image-style {
    height: 30vh;
    width: 25vh;
    object-fit: cover; /* Memastikan gambar tidak terdistorsi */
    border-radius: 15px; /* Membuat sudut gambar membulat */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Memberikan bayangan halus */
    margin: auto; /* Memastikan gambar terpusat */
  }

  .capture-text {
    color: #333; /* Warna teks yang elegan */
    font-size: 1.5rem; /* Ukuran font yang lebih besar */
    letter-spacing: 1px; /* Memberikan jarak antar huruf */
    text-transform: uppercase; /* Membuat teks dalam huruf kapital */
  }

  /* Dropzone container */
  .dropzone-container {
      border: 2px dashed #007bff;
      border-radius: 8px;
      background-color: #f8f9fa;
      padding: 20px;
      text-align: center;
      position: relative;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
  }

  /* Dropzone hover effect */
  .dropzone-container:hover {
      background-color: #e9ecef;
      border-color: #0056b3;
  }

  /* Hide the actual input */
  .dropzone-container input[type="file"] {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 0;
      cursor: pointer;
  }

  /* Dropzone content styling */
  .dropzone-label {
      display: block;
      width: 100%;
      height: 100%;
      color: #007bff;
  }

  .dropzone-text {
      font-size: 16px;
      color: #6c757d;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
  }

  .dropzone-text i {
      font-size: 48px;
      color: #007bff;
      margin-bottom: 10px;
  }

  .custom-file-upload .btn {
      display: inline-block;
      cursor: pointer;
  }


</style>
<!-- end: coding css konten halaman utama -->

<div class="card text-center" style="position: fixed; height: 100%; width: 100%;">
  <div class="card-body p-3 overflow-y-auto">
      <nav class="navbar navbar-expand-lg navbar-light mb-3" style="background: linear-gradient(45deg, #6a11cb, #588ff0); padding: 10px; border-radius: 10px;">
        <div class="container-fluid">
          <!-- Gambar Profile -->
          <div class="d-flex align-items-center">
            <div class="ratio ratio-1x1 rounded-circle overflow-hidden me-3" style="width: 50px; height: 50px;">
              <img src="{{ asset('assets/images/sentosa.jpg') }}" alt="Profile" class="img-fluid">
            </div>
            <div class="text-start">
              <h5 class="mb-0 text-white fw-bold">{{ auth()->user()->nama }}</h5>
              <small class="text-white fw-semibold">{{ auth()->user()->pekerjaan ?? 'Pekerjaan Tidak Diketahui' }}</small>
            </div>
          </div>
        </div>
      </nav>
      <!-- start::Tab konten -->    
      <div class="tab-content" id="tabContent-dashboard">
        <!-- start::Tab Home -->
        <div class="tab-pane fade show active h-100 my-3" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
          {{-- <div class="card shadow-md border-0 rounded-3 w-100 mt-3" style="background: linear-gradient(45deg, #6a11cb, #588ff0); padding: 15px; border-radius: 10px;"> <!-- Background gradient -->
            <div class="card-body">
              <div class="row align-items-center">
                <!-- Gambar Profile -->
                <div class="col-3">
                  <div class="ratio ratio-1x1 rounded-circle overflow-hidden">
                    <img src="{{ asset('assets/images/sentosa.jpg') }}" class="card-img-top" alt="Raeesh">
                  </div>
                </div>
                
                <!-- Teks -->
                <div class="col-9 text-start">
                  <h5 class="card-title text-white fw-bold mb-1">{{auth()->user()->nama}}</h5> <!-- Nama user yang sedang login -->
                  <p class="card-text text-muted fw-semibold mb-0">{{auth()->user()->pekerjaan ?? 'Pekerjaan Tidak Diketahui'}}</p> <!-- Tipe user yang sedang login -->
                </div>

              </div>
            </div>
          </div> --}}

          <div class="card border-0 shadow rounded-3 w-100 mt-4 text-center">
            <div class="card-body p-4">
              <div class="row">
                <!-- Card 1 -->
                <div class="col-md-4">
                  <div class="card h-100"> <!-- Menambahkan h-100 -->
                    <img src="{{ asset('assets/images/sentosa.jpg') }}" class="card-img-top img-fluid" alt="Sentosa" style="object-fit: cover; height: 200px;"> <!-- Gambar seragam -->
                  </div>
                </div>
              
                <!-- Card 2 -->
                <div class="col-md-4">
                  <div class="card h-100"> <!-- Menambahkan h-100 -->
                    <img src="{{ asset('assets/images/versicolor.jpg') }}" class="card-img-top img-fluid" alt="Versicolor" style="object-fit: cover; height: 200px;"> <!-- Gambar seragam -->
                  </div>
                </div>
              
                <!-- Card 3 -->
                <div class="col-md-4">
                  <div class="card h-100"> <!-- Menambahkan h-100 -->
                    <img src="{{ asset('assets/images/virginia.jpg') }}" class="card-img-top img-fluid" alt="Virginia" style="object-fit: cover; height: 200px;"> <!-- Gambar seragam -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          

          <div class="card border-0 shadow rounded-3 w-100 mt-4 text-center">
            <div class="card-body p-4">
              <h4 class="fw-bold text-primary mb-3">Tentang Aplikasi</h4>
              <hr>
              <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                  <div class="col-12 mb-3">
                    <img src="{{ asset('assets\images\mokeup-apl.png') }}" alt="Gambar Bunga Iris" class="image-style rounded shadow-sm w-100 img-fluid" style="max-width: 300px;">
                  </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-8">
                  <p class="text-dark mb-4 text-start fs-5">
                    Aplikasi klasifikasi iris ini digunakan untuk mengklasifikasikan gambar bunga iris menjadi tiga kelas: 
                    <strong>Iris Sentosa</strong>, <strong>Iris Virginia</strong>, dan <strong>Iris Versicolor</strong>. 
                    Anda dapat mengunggah file gambar atau menggunakan kamera untuk melakukan klasifikasi.
                  </p>

                  <div class="text-start">
                    <button class="btn btn-primary px-4 py-2 ">Pelajari Lebih Lanjut</button>
                  </div>
                </div>
              </div>
            </div>
          </div>                      
        </div>
        <!-- end::Tab Home -->

        <!-- start::Tab Dropzone file -->
        <div class="tab-pane fade h-100 justify-content-center align-items-center" id="pills-dropzone" role="tabpanel" aria-labelledby="pills-dropzone-tab" tabindex="0">
          <div class="card shadow-md border-0 rounded-3 w-100">
              <div class="card-body">
                  <div class="dropzone-container">
                      <label for="fileUpload" class="dropzone-label">
                          <div class="dropzone-text">
                              <i class="bi bi-cloud-arrow-up-fill"></i>
                              <p>Click here to upload</p>
                          </div>
                      </label>
                      <input type="file" id="fileUpload" accept="image/*">
                  </div>

                  <!-- Container untuk menampilkan hasil -->
                  <div id="resultDisplay" class="mt-4 text-center">
                    <!-- Hasil akan ditampilkan di sini -->
                  </div>
              </div>
          </div>
        </div>
        <!-- end::Tab Dropzone file -->
        
        <!-- start::Tab Camera -->
        <div class="tab-pane fade h-100 justify-content-center align-items-center" id="pills-camera" role="tabpanel" aria-labelledby="pills-camera-tab" tabindex="0">
            <div class="card shadow-md border-0 rounded-3 w-100">
                <div class="card-body p-0">
                    <!-- field camera -->
                    <video id="webcam" autoplay muted style="width: 100%; height: 70vh; object-fit: cover; border-radius: 8px;"></video>
                </div>
            </div>
            <!-- Capture Button -->
            <div class="mt-5">
                <div class="row justify-content-center">
                  <button type="button" class="btn btn-primary col-sm-3 me-2" id="captureButton" onclick="captureImage('iris')"  data-bs-toggle="modal" data-bs-target="#resultCapture">
                      Capture as Iris
                  </button>
                  <button type="button" class="btn btn-secondary col-sm-3" id="captureButton2" data-bs-toggle="modal" data-bs-target="#resultCapture2">
                      Capture Non Iris
                  </button>
                </div>
            </div>
        </div>   
        <!-- end::Tab Camera -->  
        
        <!-- start::Tab Setting -->
        <div class="tab-pane fade" id="pills-setting" role="tabpanel" aria-labelledby="pills-setting-tab" tabindex="0">
          <!--Tools menu setting -->
          @php
              $tools = [
                [
                  'menu' => 'Logout',
                  'link' => route("logout"),
                  'icon' => '<i class="bi bi-box-arrow-right"></i>'],
              ]
          @endphp

          

          <div class="card shadow-md border-0 rounded-3 w-100">
            <div class="card-body p-3 text-start">
              <div class="col-12 mb-3 mt-3">
                <a href="{{ route("logout") }}" class="text-decoration-none text-muted fw-semibold"><i class="bi bi-box-arrow-right text-primary"></i> &nbsp; Logout</a>
              </div>
              <div class="col-12 mb-3 mt-3">
                {{-- <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-decoration-none text-muted fw-semibold"><i class="bi bi-pencil-square text-primary"></i> &nbsp; Edit Profile</a> --}}

                <p class="d-inline-flex gap-1">
                  <a class="text-decoration-none text-muted fw-semibold" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="bi bi-pencil-square text-primary"></i> &nbsp; Edit Profile
                  </a>
                </p>
                <div class="collapse" id="collapseExample">
                  <div class="card card-body">
                      <div class="card" style="border: 2px dashed #4CAF50; background: #82d8ad; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                        <div class="card-body">
                          <div class="row align-items-center">
                            <div class="col-auto">
                              <i class="bi bi-exclamation-circle-fill text-success" style="font-size: 50px;"></i>
                            </div>
                            <div class="col">
                              <h5 class="card-title" style="color: #2E7D32;">Perhatian!</h5>
                              <p class="card-text" style="color: #4B4B4B;">Jika ingin mengubah password, isi password lama dan password baru.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                      <br>
                      <form method="post" class="needs-validation" novalidate="" autocomplete="off" id="form-edit" action="{{ route('actionEdit') }}">
                          @csrf
                          <input type="hidden" name="id" value="{{auth()->user()->id}}">
                          <div class="mb-3">
                              <label class="mb-2 text-muted" for="nama-edit">Nama</label>
                              <input id="nama-edit" type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="{{auth()->user()->nama}}" required>
                          </div>
                          <div class="mb-3">
                              <label class="mb-2 text-muted" for="pekerjaan-edit">Pekerjaan</label>
                              <input id="pekerjaan-edit" type="text" class="form-control" name="pekerjaan" placeholder="Masukkan Pekerjaan" value="{{auth()->user()->pekerjaan}}" required>
                              <div class="invalid-feedback">
                                  Pekerjaan harus diisi!
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="mb-2 text-muted" for="nis-edit">NIS</label>
                              <input id="nis-edit" type="text" class="form-control" name="nis" placeholder="Masukkan NIS" value="{{auth()->user()->nis}}" required>
                              <div class="invalid-feedback">
                                  NIS harus diisi!
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="mb-2 text-muted" for="password-edit">Password Lama</label>
                              <input id="password-lama-edit" type="password" class="form-control" name="old_password" placeholder="Masukkan Password" required>
                              <div class="invalid-feedback">
                                  Password harus diisi!
                              </div>
                          </div>
                          <div class="mb-3">
                            <label class="mb-2 text-muted" for="password-confirm-edit">Password Baru</label>
                            <input id="password-baru-edit" type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
                            <div class="invalid-feedback">
                                Password harus diisi!
                            </div>
                        </div>

                          <div class="d-flex ms-auto">
                              <button type="submit" class="btn btn-primary">
                                  Update
                              </button>
                          </div>
                      </form>
                  </div>
                </div>
              </div>
              {{-- @foreach ($tools as $menu)
              @endforeach --}}
            </div>
          </div>
        </div>
      </div>
      <!-- end::Tab Setting -->
      <!-- end::Tab konten -->
  </div>

  <!-- start::menu button -->
  <div class="card-footer text-center">
      <ul class="nav nav-pills mb-3 justify-content-center" id="tab-dasboard" role="tablist">
          <li class="nav-item col text-center" role="presentation">
            <button class="nav-link col-12 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
              <i class="bi bi-house-fill"></i>
            </button>
          </li>
          <li class="nav-item col" role="presentation">
            <button class="nav-link col-12" id="pills-dropzone-tab" data-bs-toggle="pill" data-bs-target="#pills-dropzone" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
              <i class="bi bi-file-image"></i>
            </button>
          </li>
          <li class="nav-item col" role="presentation">
            <button class="nav-link col-12" id="pills-camera-tab" data-bs-toggle="pill" data-bs-target="#pills-camera" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
              <i class="bi bi-camera-fill"></i>
            </button>
          </li>
          <li class="nav-item col" role="presentation">
            <button class="nav-link col-12" id="pills-setting-tab" data-bs-toggle="pill" data-bs-target="#pills-setting" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
              <i class="bi bi-gear-fill"></i>
            </button>
          </li>

      </ul>
  </div>
  <!-- end::menu button -->

  <!-- Modal untuk menampilkan hasil tangkapan camera -->
  <div class="modal fade" id="resultCapture" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-labelledby="resultCaptureLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-body text-center">
            <!-- Tempat menampilkan hasil tangkapan -->
            <canvas id="capturedCanvas" style="width: 100%; height: auto; border: 1px solid #ccc;"></canvas>
            <h4 class="fw-bold mt-3" id="jenisbunga"></h4> <!-- Nama bunga yang terdeteksi -->
            <div class="table-responsive mt-3">
                <!-- Tabel untuk menampilkan hasil akurasi -->
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Accuracy Score SVM</td>
                            <td id="tb_accuracyResult1">
                                <span id="accuracyResult1" ></span> %
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end::Modal -->

  <!-- Modal untuk menampilkan hasil tangkapan camera -->
  <div class="modal fade" id="resultCapture2" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-labelledby="resultCaptureLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-body text-center">
            <!-- Tempat menampilkan hasil tangkapan -->
            <canvas id="capturedCanvas2" style="width: 100%; height: auto; border: 1px solid #ccc;"></canvas>
            <h4 class="fw-bold mt-3" id="jenisbunga2">Jenis tidak dikenali</h4> <!-- Nama bunga yang terdeteksi -->
            <div class="table-responsive mt-3">
                <!-- Tabel untuk menampilkan hasil akurasi -->
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Accuracy Score SVM</td>
                            <td id="tb_accuracyResult12">
                                <span id="accuracyResult12" ></span> %
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end::Modal -->

 
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.9.3/countUp.min.js"></script> <!-- library js countup untuk animasi angka -->


<script>
  document.addEventListener("DOMContentLoaded", () => {  // Memastikan DOM atau dokumen telah selesai dimuat
      const video = document.getElementById('webcam'); // Mendapatkan elemen video
      let webcamStream; // Variabel untuk menyimpan stream kamera

      // Event listener untuk tab switching
      document.querySelectorAll('button[data-bs-toggle="pill"]').forEach(tabButton => {
          tabButton.addEventListener('shown.bs.tab', (event) => { // Ketika tab ditampilkan
              const targetTab = event.target.getAttribute('data-bs-target'); // Mendapatkan target tab

              if (targetTab === "#pills-camera") { // Jika target tab adalah tab camera, nyalakan webcam
            
                  let constraints = {
                      video: { facingMode: "environment" } // Default ke kamera belakang
                  };

                  // Cek apakah kamera belakang tersedia
                  navigator.mediaDevices.getUserMedia(constraints)
                      .then((stream) => {
                          webcamStream = stream;
                          video.srcObject = stream;
                      })
                      .catch((error) => { 
                          console.error("Camera Belakang tidak dapat diakses: ", error);

                          // Jika kamera belakang tidak tersedia, fallback ke kamera depan
                          constraints = {
                              video: { facingMode: "user" } // Fallback ke kamera depan
                          };

                          // Nyalakan kamera depan
                          navigator.mediaDevices.getUserMedia(constraints)
                              .then((stream) => {
                                  webcamStream = stream;
                                  video.srcObject = stream;
                              })
                              .catch((err) => {
                                  swal("Error", "Camera tidak dapat diakses.", "error"); // Tampilkan pesan error jika kamera tidak dapat diakses
                              });
                      });
              } else {
                  // Matikan webcam saat meninggalkan tab
                  if (webcamStream) {
                      webcamStream.getTracks().forEach(track => track.stop());
                      video.srcObject = null;
                  }
              }
          });
      });

      const captureButton = document.getElementById('captureButton'); // Mendapatkan elemen tombol capture
      const captureButton2 = document.getElementById('captureButton2'); // Mendapatkan elemen tombol capture
      const capturedCanvas = document.getElementById('capturedCanvas'); // Mendapatkan elemen canvas
      const capturedCanvas2 = document.getElementById('capturedCanvas2'); // Mendapatkan elemen canvas
      const ctx = capturedCanvas.getContext('2d'); // Mendapatkan konteks canvas
      const ctx2 = capturedCanvas2.getContext('2d'); // Mendapatkan konteks canvas
      
      // Event listener untuk tombol capture
      captureButton.addEventListener("click", () => {
        // Sesuaikan ukuran canvas dengan video
        capturedCanvas.width = video.videoWidth;
        capturedCanvas.height = video.videoHeight;

        // ubah Gambar frame dari video ke canvas
        ctx.drawImage(video, 0, 0, capturedCanvas.width, capturedCanvas.height);
      });

      // Bersihkan stream saat modal ditutup
      document.getElementById('resultCapture').addEventListener('hidden.bs.modal', () => {
          ctx.clearRect(0, 0, capturedCanvas.width, capturedCanvas.height);
      });

      captureButton2.addEventListener("click", () => {
        // Sesuaikan ukuran canvas dengan video
        capturedCanvas2.width = video.videoWidth;
        capturedCanvas2.height = video.videoHeight;

        // ubah Gambar frame dari video ke canvas
        ctx2.drawImage(video, 0, 0, capturedCanvas2.width, capturedCanvas.height);
      });

      // Bersihkan stream saat modal ditutup
      document.getElementById('resultCapture2').addEventListener('hidden.bs.modal', () => {
          ctx2.clearRect(0, 0, capturedCanvas2.width, capturedCanvas.height);
      });


      const accuracyElement1 = document.getElementById('accuracyResult1'); // Mendapatkan elemen accuracy
      const accuracyElement12 = document.getElementById('accuracyResult12'); // Mendapatkan elemen accuracy
      const modal = document.getElementById('resultCapture'); // Mendapatkan elemen modal
      const modal2 = document.getElementById('resultCapture2'); // Mendapatkan elemen modal

      // fungsi untuk menghasilkan bilangan acak
      function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
      }

      // fungsi untuk menghasilkan teks acak
      function getRandomText() {
          const texts = ["Iris Sentosa", "Iris Virginia", "Iris Versicolor"]; // Daftar teks
          const randomIndex = Math.floor(Math.random() * texts.length); // Pilih indeks acak
          return $('#jenisbunga').text(texts[randomIndex]);
      }

      // function captureImage (type) {
      //   alrert(type);
      // }

      // Event listener untuk modal
      modal.addEventListener('shown.bs.modal', () => {
          
          getRandomText(); // Tampilkan teks acak
          const accuracyValue1 = randomNumber(50, 100); // Tampilkan bilangan acak
          
          const countUp1 = new CountUp(accuracyElement1, 0, accuracyValue1); // Inisialisasi CountUp untuk animasi 

          // Mengatur warna berdasarkan nilai accuracy, jika >= 80 maka warna hijau, jika < 80 maka warna merah
          if (accuracyValue1 >= 80) {
            $('#tb_accuracyResult1').addClass('bg-success');
            $('#tb_accuracyResult1').removeClass('bg-danger');
          } else  {
            $('#tb_accuracyResult1').addClass('bg-danger');
            $('#tb_accuracyResult1').removeClass('bg-success');
          }

          // Mulai animasi CountUp 
          if (!countUp1.error) {
              countUp1.start();
          } else {
              console.error(countUp1.error);
          }
      });

      modal2.addEventListener('shown.bs.modal', () => {
        
          getRandomText(); // Tampilkan teks acak
          const accuracyValue1 = randomNumber(50, 100); // Tampilkan bilangan acak
          
          const countUp1 = new CountUp(accuracyElement12, 0, accuracyValue1); // Inisialisasi CountUp untuk animasi 

          // Mengatur warna berdasarkan nilai accuracy, jika >= 80 maka warna hijau, jika < 80 maka warna merah
          if (accuracyValue1 >= 80) {
            $('#tb_accuracyResult12').addClass('bg-success');
            $('#tb_accuracyResult12').removeClass('bg-danger');
          } else  {
            $('#tb_accuracyResult12').addClass('bg-danger');
            $('#tb_accuracyResult12').removeClass('bg-success');
          }

          // Mulai animasi CountUp 
          if (!countUp1.error) {
              countUp1.start();
          } else {
              console.error(countUp1.error);
          }
      });



      // coding upload file
      const dropzoneTabButton = document.getElementById('pills-dropzone-tab'); // Mendapatkan elemen tab dropzone
    
      // Event listener untuk tab dropzone
      dropzoneTabButton.addEventListener('click', () => {
          console.log("Dropzone tab button clicked!");

          const fileInput = document.getElementById('fileUpload'); // Mendapatkan elemen input file
          const resultDisplay = document.getElementById('resultDisplay'); // Mendapatkan elemen tampilan hasil

          // fungsi untuk menghasilkan bilangan acak
          function randomNumber(min, max) {
              return Math.floor(Math.random() * (max - min + 1)) + min;
          }

          // fungsi untuk menghasilkan teks acak
          function getRandomText() {
              const texts = ["Iris Sentosa", "Iris Virginia", "Iris Versicolor"];
              return texts[Math.floor(Math.random() * texts.length)];
          }

          // Event listener untuk input file, jika terjadi perubahan
          fileInput.addEventListener('change', (event) => {
              const file = event.target.files[0]; // Mendapatkan file yang diupload

              // Jika ada file yang diupload
              if (file) {
                  const reader = new FileReader(); // Membaca file

                  // Ketika file selesai dibaca
                  reader.onload = (e) => {
                      // Bersihkan hasil sebelumnya
                      resultDisplay.innerHTML = '';

                      const img = document.createElement('img'); // Membuat elemen gambar
                      img.src = e.target.result; // Mengatur sumber gambar
                      img.alt = "Uploaded Image"; // Mengatur teks alternatif gambar
                      img.style.maxWidth = "200px"; // Mengatur lebar maksimum gambar
                      img.style.borderRadius = "8px"; // Mengatur sudut gambar
                      img.className = "mb-3"; // Mengatur kelas gambar untuk margin bawah

                      const fileName = file.name.toLowerCase(); // Ambil nama file dan ubah menjadi huruf kecil
                      let irisType;

                      if (fileName.includes('sentosa')) {
                          irisType = 'Iris Sentosa';
                      } else if (fileName.includes('virginia')) {
                          irisType = 'Iris Virginia';
                      } else if (fileName.includes('versicolor')) {
                          irisType = 'Iris Versicolor';
                      } else {
                          irisType = 'Jenis tidak dikenali';
                      }

                      // const irisType = getRandomText(); // Mendapatkan teks acak
                      const accuracy1 = randomNumber(50, 100); // Mendapatkan bilangan acak

                      const irisElement = document.createElement('p'); // Membuat elemen paragraf untuk jenis iris
                      irisElement.textContent = `Jenis: ${irisType}`; // Mengatur teks paragraf
                      irisElement.className = "fw-bold"; // Mengatur kelas paragraf

                      const accuracyElement1 = document.createElement('p'); // Membuat elemen paragraf untuk accuracy
                      accuracyElement1.innerHTML = `Accuracy SVM: <span class="badge ${
                          accuracy1 >= 80 ? 'bg-success' : 'bg-danger'
                      }">${accuracy1}%</span>`; // Mengatur teks paragraf, jika >= 80 maka warna hijau, jika < 80 maka warna merah


                      resultDisplay.appendChild(img); // Menambahkan elemen gambar
                      resultDisplay.appendChild(irisElement); // Menambahkan elemen paragraf untuk jenis iris
                      resultDisplay.appendChild(accuracyElement1); // Menambahkan elemen paragraf untuk accuracy
                  };

                  reader.readAsDataURL(file); // Membaca file sebagai data URL atau base64 kemudian memanggil fungsi reader.onload untuk menampilkan hasil
              } else {
                  console.error("No file selected"); // Tampilkan pesan error jika tidak ada file yang diupload
              }
          });
      });
  });
</script>