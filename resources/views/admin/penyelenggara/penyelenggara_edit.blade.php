@extends('admin.template.template')
@section('content_admin')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Edit Penyelenggara</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Nama </label>
                                    <input value="{{ $data->nama_penyelenggara }}" name="nama_penyelenggara" type="text"
                                        class="form-control" placeholder="Masukkan Nama Penyelenggara">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Alamat </label>
                                    <input value="{{ $data->alamat_penyelenggara }}" name="alamat_penyelenggara"
                                        type="text" class="form-control" placeholder="Masukkan Alamat Penyelenggara">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>No HP </label>
                                    <input value="{{ $data->nohp_penyelenggara }}" name="nohp_penyelenggara" type="text"
                                        class="form-control" placeholder="Masukkan No HP Penyelenggara">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email </label>
                                    <input value="{{ $data->email_penyelenggara }}" name="email_penyelenggara"
                                        type="email" class="form-control" placeholder="Masukkan Email Penyelenggara">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="formFileLogo" class="form-label">Logo Penyelenggara</label>
                                    <input name="logo_penyelenggara" class="form-control form-control-sm" id="formFileLogo"
                                        type="file">
                                    @if ($data->logo_penyelenggara)
                                        <small class="text-muted">Logo sekarang: <a
                                                href="{{ asset('storage/' . $data->logo_penyelenggara) }}"
                                                target="_blank">Lihat Logo</a>
                                        </small>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="formFileKTP" class="form-label">Dokumen KTP</label>
                                    <input name="dokumen_ktp" class="form-control form-control-sm" id="formFileKTP"
                                        type="file">
                                    @if ($data->dokumen_ktp)
                                        <small class="text-muted">Dokumen lama: <a
                                                href="{{ asset('storage/' . $data->dokumen_ktp) }}" target="_blank">Lihat
                                                KTP</a>
                                        </small>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="formFileNPWP" class="form-label">Dokumen NPWP</label>
                                    <input name="dokumen_npwp" class="form-control form-control-sm" id="formFileNPWP"
                                        type="file">
                                    @if ($data->dokumen_npwp)
                                        <small class="text-muted">dokumen lama: <a
                                                href="{{ asset('storage/' . $data->dokumen_npwp) }}" target="_blank">Lihat
                                                NPWP</a>
                                        </small>
                                    @endif
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
