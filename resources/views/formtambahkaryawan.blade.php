@extends('layout')
@section("konten")
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="row-md-2">
        <div class="col-sm-6">
            <h1>Form Tambah Karyawan</h1>
        </div>
    </div>
    <div class="col-xs-9">
        <div class="card card-primary">
            @if (session('success'))
                <label style="color: green">{{session('success')}}</label>
            @endif
            <form enctype="multipart/form-data" data-toggle="validator" method="POST" id="formtambahkaryawan" action="{{ url('/karyawan') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Staff</label>
                        <input type="text" id="namakaryawan" name="namakaryawan" class="form-control" placeholder="Nama Lengkap">
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="emailkaryawan" name="emailkaryawan" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea id="alamatkaryawan" rows="12" name="alamatkaryawan" class="form-control" placeholder="Alamat Lengkap"></textarea>
                    </div>
                </div><div class="card-body">
                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="text" id="nohp" name="nohp" class="form-control" placeholder="Nomor HP">
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Jabatan</label>
                        <div class="col-sm-6">
                            <!-- radio -->
                            <div class="form-group">
                              <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="pengawas" name="jabatan" value="pengawas" onclick="enableComboBox()">
                                <label for="pengawas" class="custom-control-label">Staff Pengawas Ternak</label>
                              </div>
                              <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="marketing" name="jabatan" value="marketing" onclick="disableComboBox()">
                                <label for="marketing" class="custom-control-label">Marketing</label>
                              </div>
                              <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="akutansi" name="jabatan" onclick="disableComboBox()">
                                <label for="akutansi" class="custom-control-label">Akutansi</label>
                              </div>
                              <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="penimbang" name="jabatan" onclick="disableComboBox()">
                                <label for="penimbang" class="custom-control-label">Penimbang</label>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Wilayah Tugas</label>
                        <select class="custom-select" id="wilayah" name="wilayah" >
                            <option value="">Pilih Wilayah</option>
                            <option value="blitarb">Blitar Barat</option>
                            <option value="blitart">Blitar Timur</option>
                            <option value="magang">Staff Magang</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-file">
                            <label class="custom-file-label" for="customFile">Foto</label>
                            <input type="file" id="fotokaryawan" name="fotokaryawan" class="custom-file-input" placeholder="Choose File">
                        </div>
                    </div>
                </div>
                <button id='myButton' type="submit">Simpan</button>
            </form>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
//script
    function enableComboBox() {
        $("#wilayah").attr("disabled", false);
    }

    function disableComboBox() {
        $("#wilayah").attr("disabled", true);
    }
    document.getElementById('myButton').addEventListener('click', function() {
        document.getElementById("formtambahkaryawan").submit()
    });
    @if (session('success'))
        alert("{{session('success')}}");
    @endif
</script>
@endsection
