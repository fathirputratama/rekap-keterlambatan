@extends('layouts.template')

@section('content')
    <form action="{{ route('student.update', $students['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <ul class="alert alert-danger p-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach
            </ul>
            @endif
            
            
            <div class="mb-3 row">
                <label for="nis" class="col-sm-2 col-form-label">NIS :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nis" name="nis" value="{{ $students['nis'] }}">
                </div>
            </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $students['name'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rombel_id" class="col-sm-2 col-form-label">Rombel :</label>
            <div class="col-sm-10">
                <select class="form-select" name="rombel_id" id="rombel_id">
                    <option selected disabled hidden>Pilih</option>
                    @foreach ($rombels as $item)
                    <option value="{{ $item->rombel }}"> {{ $item->rombel }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rayon_id" class="col-sm-2 col-form-label">Rayon :</label>
            <div class="col-sm-10">
                <select class="form-select" name="rayon_id" id="rayon_id">
                    <option selected disabled hidden>Pilih</option>
                    @foreach ($rayons as $item)
                    <option value="{{ $item->rayon }}"> {{ $item->rayon }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
</form>
@endsection