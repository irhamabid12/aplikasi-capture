@extends('layout.app') <!-- mengadopsi struktur layout dari app.blade.php -->

@section('title', 'Dashboard') <!-- judul halaman -->
@section('content') <!-- konten halaman utama -->

<!-- start: coding css konten halaman utama -->
<style>
  .custom-carousel {
    max-height: 20vh; /* Membatasi tinggi carousel hingga 30% dari viewport height */
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
      <!-- start::Tab konten -->    
      <div class="tab-content" id="tabContent-dashboard">
        <!-- start::Tab Home -->
        <div class="tab-pane fade show active h-100" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
          <div class="card shadow-md border-0 rounded-3 w-100 mt-3" style="background: linear-gradient(45deg, #6a11cb, #588ff0); padding: 15px; border-radius: 10px;"> <!-- Background gradient -->
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
                  <p class="card-text text-muted fw-semibold mb-0">Researcher</p> <!-- Tipe user yang sedang login -->
                </div>

              </div>
            </div>
          </div>

          <!-- start::Card Carousel untuk menampilkan gambar beberapa bunga iris -->
          <div class="card shadow-md border-1 rounded-3 w-100 mt-3">
            <div class="card-body p-1">
              <div id="carouselExampleIndicators" class="carousel slide custom-carousel">
                <!-- Indicators Carousel -->
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>

                <!-- Gambar di dalam Carousel -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('assets/images/sentosa.jpg') }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('assets/images/versicolor.jpg') }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('assets/images/virginia.jpg') }}" class="d-block w-100" alt="...">
                  </div>
                </div>

                <!-- Button untuk navigasi Carousel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
          </div>
          <!-- end::Card Carousel -->

          <!-- start::Card untuk klasifikasi bunga iris -->
          <div class="card border-0 rounded-3 w-100 mt-3 text-center">
            <div class="card-body p-0">
              <h4 class="fw-bold mt-3">Klasifikasi Bunga Iris</h4>
              <div class="col-12">
                <img src="{{ asset('assets/images/sentosa.jpg') }}" alt="QR Code" class="image-style">
              </div>
              <button type="button" class="btn btn-success mt-3 col-7 ">Capture Image</button>
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
                <button type="button" class="btn btn-primary" id="captureButton"  data-bs-toggle="modal" data-bs-target="#resultCapture">
                    Capture
                </button>
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
              @foreach ($tools as $menu)
                <a href="{{ $menu['link'] }}" class="text-decoration-none text-muted fw-semibold">{!! $menu['icon'] !!} &nbsp; {{ $menu['menu'] }}</a>
              @endforeach
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
      const capturedCanvas = document.getElementById('capturedCanvas'); // Mendapatkan elemen canvas
      const ctx = capturedCanvas.getContext('2d'); // Mendapatkan konteks canvas
      
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


      const accuracyElement1 = document.getElementById('accuracyResult1'); // Mendapatkan elemen accuracy
      const modal = document.getElementById('resultCapture'); // Mendapatkan elemen modal

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

                      const irisType = getRandomText(); // Mendapatkan teks acak
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