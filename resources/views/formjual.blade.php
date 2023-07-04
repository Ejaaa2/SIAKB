@extends('layout')
@section("konten")
<div class="row-md-2">
    <div class="col-sm-6">
        <h1>Form Tambah Penjualan</h1>
    </div>
</div>
<div class="col-xs-9">
    <div class="card card-primary">
        <form enctype="multipart/form-data" data-toggle="validator" method="POST" id="formtambahkaryawan" action="{{ url('/karyawan') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Pembeli</label>
                    <input type="text" id="namapembeli" name="namapembeli" class="form-control" placeholder="Nama Lengkap">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Plat Nomor</label>
                    <input type="text" id="platno" name="platno" class="form-control">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Jumlah Beli (kg)</label>
                    <input type="text" id="jmlbeli" name="jmlbeli" class="form-control">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Harga Terkini (Rupiah)</label>
                    <input type="number" id="prc" name="prc" class="form-control">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Grand Total</label>
                    <input type="text" id="totalb" name="totalb" class="form-control" disabled>
                </div>
            </div>
            <div class="card-body">
                <button class="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    const jumlah = document.getElementById('jmlbeli');
    const harga = document.getElementById('prc');
    const grandt = document.getElementById('totalb');

    jumlah.addEventListener('input', hitungGtot);
    harga.addEventListener('input', hitungGtot);

    function hitungGtot() {
        const jml = parseInt(jumlah.value);
        const prc = parseInt(harga.value);
        const totalh = jml * prc;
        grandt.value = "Harga yang harus dibayar : "+totalh.toLocaleString()+" Rupiah";
    }
</script>
@endsection
