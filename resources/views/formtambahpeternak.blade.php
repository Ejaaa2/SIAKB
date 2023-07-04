@extends('layout')
@section("konten")
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="row-md-2">
        <div class="col-sm-6">
            <h1>Form Tambah Peternak</h1>
        </div>
    </div>
    <div class="col-xs-9">
        <div class="card card-primary">
            @if (session('success'))
                <label style="color: green">{{session('success')}}</label>
            @endif
            <form class="form-horizontal" enctype="multipart/form-data" data-toggle="validator" method="POST" id="formtambahpeternak" action="{{url('tbhpeternak')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Peternak</label>
                        <input type="text" id="namapeternak" name="namapeternak" class="form-control" placeholder="Nama Lengkap">
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea id="alamatpeternak" rows="12" name="alamatpeternak" class="form-control" placeholder="Alamat Lengkap"></textarea>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="text" id="nohp" name="nohp" class="form-control" placeholder="Nomor HP">
                    </div>
                </div>
                <div class="card-body">
                    <form>
                    <div class="form-group">
                        <label>Jaminan</label>
                        <div class="col-sm-6">
                            <!-- radio -->
                            <div class="form-group">
                              <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="uang" name="jaminan" value="uang">
                                <label for="uang" class="custom-control-label">Uang</label>
                              </div>
                              <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="bpkb" name="jaminan" value="bpkb">
                                <label for="bpkb" class="custom-control-label">BPKB</label>
                              </div>
                              <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="surat berharga" name="jaminan" >
                                <label for="surat berharga" class="custom-control-label">Surat Berharga</label>
                              </div>
                              <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="emas" name="jaminan" >
                                <label for="emas" class="custom-control-label">Emas</label>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-file">
                            <label class="custom-file-label" for="customFile">Upload Foto Jaminan</label>
                            <input type="file" id="fotojaminan" name="fotojaminan" class="custom-file-input" placeholder="Choose File">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Pilih Supplier</label><br>
                        <select class="custom-select" id="namasupplier" name="namasupplier">
                            <option value="">Pilih Supplier</option>
                            <option value="wonokoyo">Wonokoyo</option>
                            <option value="pokphand">CP Pokphand</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Jumlah DOC Ayam</label>
                        <input type="text" id="jumlahdoc" name="jumlahdoc" class="form-control" placeholder="Minimal 2500">
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-file">
                            <label class="custom-file-label" for="customFile">Foto KTP dan KK</label>
                            <input type="file" id="fotokk" name="fotokk" class="custom-file-input" placeholder="Choose File">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Bank</label>
                        <input type="text" id="namabank" name="namabank" class="form-control" placeholder="Nama Bank">
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nomor Rekening</label>
                        <input type="text" id="nomorek" name="nomorek" class="form-control" placeholder="Nomor Rekening">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Awal DOC:</label>
                          <div class="input-group date" name="bibitaw" id="reservationdate" data-target-input="nearest">
                              <input type="text" name="bibitaw" class="form-control datetimepicker-input" data-target="#reservationdate">
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Wilayah Lokasi</label>
                        <select class="custom-select" id="wilayahL" name="wilayahL" >
                            <option value="">Pilih Wilayah</option>
                            <option value="blitarb">Blitar Barat</option>
                            <option value="blitart">Blitar Timur</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <button id="myButton" type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
//script
$('#reservationdate').datetimepicker({
        format: 'L'
    });

    @if (session('success'))
        alert("{{session('success')}}");
    @endif
    document.getElementById('myButton').addEventListener('click', function() {
        document.getElementById("formtambahpeternak").submit()
    });
</script>
@endsection
