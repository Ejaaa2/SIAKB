@extends('layout');
@section('konten')
  <div class="card card-solid">
    <div class="card-body pb-0 text-center">
    @foreach ($datastaff as $item)
      <div class="row">
        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
          <div class="card bg-light d-flex flex-fill">
            <div class="card-header text-muted border-bottom-0">
                {{ $item->jabatan }}
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col-7">
                  <h2 class="lead"><b>{{ $item->name }}</b></h2>
                  <p class="text-muted text-sm"><b>Alamat: </b> {{ $item->alamat }} </p>
                  <ul class="ml-4 mb-0 fa-ul text-muted">
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> {{ $item->email }}</li>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> {{ $item->nohp }}</li>
                  </ul>
                </div>
                <div class="col-5 text-center">
                  <img src="{{ asset('storage/'.$item->foto) }}" alt="user-avatar" class="img-circle img-fluid">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    </div>
    <!-- /.card-body -->
  </div>
@endsection

