@include('layout');
@section('konten')
<div class="row-md-2">
    <div class="col-sm-6">
        <h1>Form Tambah Penjualan</h1>
    </div>
</div>
<div class="col-xs-9">
    <div class="card card-primary">
        <form enctype="multipart/form-data" data-toggle="validator" method="POST" id="formjual" action="{{ url('/karyawan') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Peternak</label>
                    @foreach ($collection as $item)
                        <select class="form-control" id="idp" name="idp">
                            <option>{{$item.name}}</option>
                        </select>
                    @endforeach
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Jenis Order</label>
                    <select class="form-control" id="idp" name="idp">
                        <option id="Bibit">Bibit</option>
                        <option id="Pakan">Pakan</option>
                        <option id="Obat">Obat</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Banyak barang</label>
                    <input type="number" id="jmlh" name="jmlh" class="form-control">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
