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
										<a href="index.html"><img src="images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form action="/login" method="POST">
                                        @csrf
                                        @if ($errors->any())
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li class="text-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                        <div class="form-group">
                                            <label class="mb-1 form-label"> Username</label>
                                            <input name="name" type="text" class="form-control" placeholder="Masukkan username">
                                        </div>
                                        <div class="mb-4 position-relative">
											<label class="mb-1 form-label">Password</label>
											<input name="password" type="password" id="dz-password" class="form-control" placeholder="123456">
											<span class="show-pass eye">

												<i class="fa fa-eye-slash"></i>
												<i class="fa fa-eye"></i>

											</span>
										</div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                               <div class="form-check custom-checkbox ms-1">
													<input type="checkbox" class="form-check-input" id="basic_checkbox_1">
													<label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
												</div>
                                            </div>
                                            <div class="form-group">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary light btn-block">Sign In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="page-register.html">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
        <script src="vendor/global/global.min.js"></script>
        <script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
        <script src="js/custom.min.js"></script>
        <script src="js/deznav-init.js"></script>
</body>

