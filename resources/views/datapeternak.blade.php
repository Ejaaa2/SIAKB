@extends('layout');
@section('konten')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Peternak PT. Anugerah Kartika Agro Blitar</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="dt-buttons btn-group flex-wrap">
                    <div class="btn-group"></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div id="example1_filter" class="dataTables_filter"></div>
            </div>
        </div>
        <div class="row">
        <div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
        <thead>
            <tr>
                <th>Nama Peternak</th>
                <th>Jumlah Ayam</th>
                <th>Pengiriman Selanjutnya</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->initdoc }}</td>
                <td>{{$item->pengirimanselanjutnya}}</td>

            </tr>
        @endforeach
        </tbody>
      </table></div>
    </div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
