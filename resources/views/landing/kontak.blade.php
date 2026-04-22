@extends('layouts.apptamu')

@section('title', 'Kontak')

@section('content')

<div class="row">
    <div class="col-md-6">

        <div class="card">
            <div class="card-body">
                <h4>Hubungi Kami</h4>

                <form>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Pesan</label>
                        <textarea class="form-control"></textarea>
                    </div>

                    <button class="btn btn-primary">Kirim</button>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection