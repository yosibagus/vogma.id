@extends('admin.template.template')
@section('content_admin')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Tambah Penyelenggara</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row needs-validation" novalidate>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="validationNama" class="form-label">Nama Penyelenggara <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nama_penyelenggara" id="validationNama" class="form-control"
                                        placeholder="Masukkan Nama Penyelenggara" required>
                                    <div class="invalid-feedback">Nama Penyelenggara wajib diisi.</div>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="validationAlamat" class="form-label">Alamat Penyelenggara <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="alamat_penyelenggara" id="validationAlamat"
                                        class="form-control" placeholder="Masukkan Alamat Penyelenggara" required>
                                    <div class="invalid-feedback">Alamat wajib diisi.</div>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="validationNoHp" class="form-label">No HP <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nohp_penyelenggara" id="validationNoHp" class="form-control"
                                        placeholder="Masukkan No HP Penyelenggara" required>
                                    <div class="invalid-feedback">No HP wajib diisi.</div>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="validationEmail" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="email_penyelenggara" id="validationEmail"
                                        class="form-control" placeholder="Masukkan Email Penyelenggara" required>
                                    <div class="invalid-feedback">Email wajib diisi dengan format yang valid.</div>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="validationLogo" class="form-label">Logo Penyelenggara</label>
                                    <input type="file" name="logo_penyelenggara" id="validationLogo"
                                        class="form-control form-control-sm" accept="image/*">
                                    <div class="invalid-feedback">Logo harus berupa gambar (jpg, jpeg, png).</div>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="validationKTP" class="form-label">Dokumen KTP</label>
                                    <input type="file" name="dokumen_ktp" id="validationKTP"
                                        class="form-control form-control-sm" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                                    <div class="invalid-feedback">Masukkan file KTP yang sesuai.</div>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="validationNPWP" class="form-label">Dokumen NPWP</label>
                                    <input type="file" name="dokumen_npwp" id="validationNPWP"
                                        class="form-control form-control-sm" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                                    <div class="invalid-feedback">Masukkan file NPWP yang sesuai.</div>
                                </div>
                            </div>

                            <a href="/penyelenggara">
                                <button type="button" class="btn btn-danger">kembali</button>
                            </a>
                            
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
