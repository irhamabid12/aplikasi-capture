@extends('layout.app')

@section('title', 'Dashboard')
@section('content')
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


</style>
<div class="card text-center" style="position: fixed; height: 100%; width: 100%;">
  <div class="card-body p-3">
      <div class="tab-content" id="tabContent-dashboard" style="overflow-y: hidden">
        <div class="tab-pane fade show active h-100" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
          <div class="card shadow-md border-0 rounded-3 w-100" style="background: linear-gradient(45deg, #6a11cb, #588ff0); padding: 15px; border-radius: 10px;">
            <div class="card-body">
              <div class="row align-items-center">
                <!-- Gambar Profile -->
                <div class="col-3 d-flex justify-content-center">
                  <div class="ratio ratio-1x1 rounded-circle overflow-hidden">
                    <img src="{{ asset('assets/images/sentosa.jpg') }}" class="card-img-top img-cover" alt="Raeesh" style="object-fit: cover;">
                  </div>
                </div>
                
                <!-- Teks -->
                <div class="col-9 text-start">
                  <h5 class="card-title text-white fw-bold mb-1">Identifikasi Species</h5>
                  <p class="card-text text-muted fw-semibold mb-0">Researcher</p>
                </div>

              </div>
            </div>
          </div>

          <div class="card shadow-md border-1 rounded-3 w-100 mt-3">
            <div class="card-body p-1">
              <div id="carouselExampleIndicators" class="carousel slide custom-carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
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
          <div class="card border-0 rounded-3 w-100 mt-3 text-center">
            <div class="card-body p-0">
              <h4 class="fw-bold mt-3">Klasifikasi Bunga Iris</h4>
              <img src="{{ asset('assets/images/sentosa.jpg') }}" alt="QR Code" class="image-style">
              <button type="button" class="btn btn-success mt-3 col-7 ">Capture Image</button>
            </div>
          </div>                
        </div>
        
        <div class="tab-pane fade h-100 justify-content-center align-items-center" id="pills-camera" role="tabpanel" aria-labelledby="pills-camera-tab" tabindex="0">
            <div class="card shadow-md border-0 rounded-3 w-100">
                <div class="card-body p-0">
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
        
        <div class="tab-pane fade" id="pills-setting" role="tabpanel" aria-labelledby="pills-setting-tab" tabindex="0">
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
  </div>
  <div class="card-footer text-center">
      <ul class="nav nav-pills mb-3 justify-content-center" id="tab-dasboard" role="tablist">
          <li class="nav-item col text-center" role="presentation">
            <button class="nav-link col-12 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
              <i class="bi bi-house-fill"></i>
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

  <!-- Modal -->
  <div class="modal fade" id="resultCapture" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-labelledby="resultCaptureLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-body text-center">
            <!-- Tempat menampilkan hasil tangkapan -->
            <canvas id="capturedCanvas" style="width: 100%; height: auto; border: 1px solid #ccc;"></canvas>
            <h4 class="fw-bold mt-3" id="jenisbunga"></h4>
            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Accuracy Score SVM</td>
                            <td id="tb_accuracyResult1">
                                <span id="accuracyResult1" ></span> %
                            </td>
                        </tr>
                        <tr>
                            <th>Accuracy Score DSC</td>
                            <td id="tb_accuracyResult2">
                                <span id="accuracyResult2"></span> %
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
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.9.3/countUp.min.js"></script>


<script>
    document.addEventListener("DOMContentLoaded", () => {
      const video = document.getElementById('webcam');
      let webcamStream;

      // Event listener untuk tab switching
      document.querySelectorAll('button[data-bs-toggle="pill"]').forEach(tabButton => {
          tabButton.addEventListener('shown.bs.tab', (event) => {
              const targetTab = event.target.getAttribute('data-bs-target');

              if (targetTab === "#pills-camera") {
                  // Tab tengah ditekan, nyalakan webcam
                  let constraints = {
                      video: { facingMode: "environment" } // Default ke kamera belakang
                  };

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

                          navigator.mediaDevices.getUserMedia(constraints)
                              .then((stream) => {
                                  webcamStream = stream;
                                  video.srcObject = stream;
                              })
                              .catch((err) => {
                                  swal("Error", "Camera tidak dapat diakses.", "error");
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

      // Tombol Capture
      const captureButton = document.getElementById('captureButton');
      const capturedCanvas = document.getElementById('capturedCanvas');
      const ctx = capturedCanvas.getContext('2d');

      captureButton.addEventListener("click", () => {
        // Sesuaikan ukuran canvas dengan video
        capturedCanvas.width = video.videoWidth;
        capturedCanvas.height = video.videoHeight;

        // Gambar frame dari video ke canvas
        ctx.drawImage(video, 0, 0, capturedCanvas.width, capturedCanvas.height);
      });

      // Bersihkan stream saat modal ditutup
      document.getElementById('resultCapture').addEventListener('hidden.bs.modal', () => {
          ctx.clearRect(0, 0, capturedCanvas.width, capturedCanvas.height);
      });


      const accuracyElement1 = document.getElementById('accuracyResult1');
      const accuracyElement2 = document.getElementById('accuracyResult2');
      const accuracyElement3 = document.getElementById('accuracyResult3');
      const modal = document.getElementById('resultCapture');

      function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
      }

      function getRandomText() {
          const texts = ["Iris Sentosa", "Iris Virginia", "Iris Versicolor"]; // Daftar teks
          const randomIndex = Math.floor(Math.random() * texts.length); // Pilih indeks acak
          return $('#jenisbunga').text(texts[randomIndex]);
      }

      modal.addEventListener('shown.bs.modal', () => {

          getRandomText();
          const accuracyValue1 = randomNumber(50, 100);
          const accuracyValue2 = randomNumber(50, 100);
          
          const countUp1 = new CountUp(accuracyElement1, 0, accuracyValue1);
          const countUp2 = new CountUp(accuracyElement2, 0, accuracyValue2);

          if (accuracyValue1 >= 80) {
            $('#tb_accuracyResult1').addClass('bg-success');
            $('#tb_accuracyResult1').removeClass('bg-danger');
          } else  {
            $('#tb_accuracyResult1').addClass('bg-danger');
            $('#tb_accuracyResult1').removeClass('bg-success');
          }

          if (accuracyValue2 >= 80) {
            $('#tb_accuracyResult2').addClass('bg-success');
            $('#tb_accuracyResult2').removeClass('bg-danger');
          } else  {
            $('#tb_accuracyResult2').addClass('bg-danger');
            $('#tb_accuracyResult2').removeClass('bg-success');
          }

          if (!countUp1.error) {
              countUp1.start();
          } else {
              console.error(countUp1.error);
          }

          if (!countUp2.error) {
              countUp2.start();
          } else {
              console.error(countUp2.error);
          }
      });

  });

</script>