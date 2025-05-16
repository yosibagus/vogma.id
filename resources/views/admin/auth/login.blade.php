@include('admin.components.style')

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="{{ asset('logo.png') }}" width="100px" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form action="/login" method="POST">
                                        @csrf

                                        @if ($errors->any())
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <div class="alert alert-danger alert-dismissible fade show">
                                                        <svg viewBox="0 0 24 24" width="24" height="24"
                                                            stroke="currentColor" stroke-width="2" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="me-2">
                                                            <polygon
                                                                points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                            </polygon>
                                                            <line x1="15" y1="9" x2="9"
                                                                y2="15"></line>
                                                            <line x1="9" y1="9" x2="15"
                                                                y2="15"></line>
                                                        </svg>
                                                        <strong>{{ $error }}</strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close">
                                                        </button>
                                                    </div>
                                                @endforeach
                                            </ul>
                                        @endif

                                        <div class="form-group">
                                            <label class="mb-1 form-label"> Username</label>
                                            <input name="name" type="text" class="form-control"
                                                placeholder="Masukkan username">
                                        </div>
                                        <div class="mb-4 position-relative">
                                            <label class="mb-1 form-label">Password</label>
                                            <input name="password" type="password" id="dz-password" class="form-control"
                                                placeholder="123456">
                                            <span class="show-pass eye">

                                                <i class="fa fa-eye-slash"></i>
                                                <i class="fa fa-eye"></i>

                                            </span>
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="form-check custom-checkbox ms-1">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember my
                                                        preference</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary light btn-block">Sign
                                                In</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('admin.components.script')
</body>
