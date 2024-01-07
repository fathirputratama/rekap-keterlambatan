@extends('layouts.template')

@section('content')
@if(Session::get('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if(Session::get('deleted'))
<div class="alert alert-warning">{{ Session::get('deleted') }}</div>
@endif


<div class="container">

  <div class="row">
      @php $no = 1; @endphp
      @foreach ($lates as $item)
      <div class="card m-3 shadow p-1 mb-5 border-0" style="width: 20rem; height:20rem;">
          <div class="card-body">
              <h4 class="card-title">Keterlambatan ke-{{ $no++ }}</h4>
              <div class="detail ">
                  <b><p class="card-subtitle text-body-secondary mt-3">{{ $item['date_time_late'] }}</p></b>
                  <p class="card-text" style="color: blue;">{{ $item['information'] }}</p>
                  <img src="{{ asset('bukti_images/' . $item['bukti']) }}" alt="">
              </div>
          </div>
      </div>
      @endforeach
  </div>

{{-- @foreach ($lates as $item)
<div class="card" style="width: 18rem;">
  <img src="{{ asset('bukti_images/' . $item['bukti']) }}" alt="">

  @endforeach
    <div class="card-body">
      <h5 class="card-title">Keterlambatan ke-{{  }}</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div> --}}

  <style>
    .row img {
        width: 120px;
        height: 90px;
        display: flex;
        border-bottom-left-radius: var(--bs-card-inner-border-radius);
        border-bottom-right-radius: var(--bs-card-inner-border-radius);
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>
@endsection