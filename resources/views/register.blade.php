@extends('layout.app')

@section('title', 'Login')
@section('content')
<div class="container">

    <div class="container h-100">
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        {{-- <h1 class="fs-4 card-title fw-bold mb-4 text-center">Login</h1> --}}
                        <form method="post" class="needs-validation" novalidate="" autocomplete="off" 
                            id="formRegister" action="{{ route('actionRegister') }}">
                            @csrf
                            <div class="mb-3">
                                {{-- <label class="mb-2 text-muted" for="email">Username</label> --}}
                                <input id="nama" type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required>
                                <div class="invalid-feedback">
                                    Nama harus diisi!
                                </div>
                            </div>
                            <div class="mb-3">
                                {{-- <label class="mb-2 text-muted" for="email">Username</label> --}}
                                <input id="pekerjaan" type="text" class="form-control" name="pekerjaan" placeholder="Masukkan Pekerjaan" required>
                                <div class="invalid-feedback">
                                    Pekerjaan harus diisi!
                                </div>
                            </div>
                            <div class="mb-3">
                                {{-- <label class="mb-2 text-muted" for="email">Username</label> --}}
                                <input id="nis" type="text" class="form-control" name="nis" placeholder="Masukkan NIS" required>
                                <div class="invalid-feedback">
                                    NIS harus diisi!
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="mb-2 w-100">
                                    {{-- <label class="text-muted" for="password">Password</label> --}}
                                    {{-- <a href="forgot.html" class="float-end">
                                        Lupa Password?
                                    </a> --}}
                                </div>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
                                <div class="invalid-feedback">
                                    Password harus diisi!
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="mb-2 w-100">
                                    {{-- <label class="text-muted" for="password">Password</label> --}}
                                    {{-- <a href="forgot.html" class="float-end">
                                        Lupa Password?
                                    </a> --}}
                                </div>
                                <input id="password" type="password" class="form-control" name="confirm_password" placeholder="Masukkan Konfirmasi Password" required>
                                <div class="invalid-feedback">
                                    Konfirmasi Password harus diisi!
                                </div>
                            </div>

                            <div class="align-items-center">
                                <button type="submit" class="btn btn-primary col-12">
                                    Daftar
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            Sudah punya akun? <a href="login" class="text-dark">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
@endsection