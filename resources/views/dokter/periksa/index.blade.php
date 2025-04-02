@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')

@section('content_body')
<div class="card">
    <div class="card-header">Periksa</div>

    <div class="card-body">
        <body>
            <div class="container mt-5">
                <h2>Dokter</h2>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5>Periksa</h5>
                    <input type="text" id="searchInput" class="form-control" onkeyup="searchPatient()" placeholder="Cari Pasien..." style="width: 200px;">
                </div>
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID Periksa</th>
                            <th>Pasien</th>
                            <th>Tanggal Periksa</th>
                            <th>Catatan</th>
                            <th>Biaya Periksa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>Iqbal</td>
                            <td>2025-03-24 04:08:47</td>
                            <td>Pasien mengalami demam tinggi dan batuk.</td>
                            <td>150000</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2</td>
                            <td>Iqbal</td>
                            <td>2025-03-27 04:08:47</td>
                            <td>Pasien mengalami sakit kepala dan pusing.</td>
                            <td>200000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </body>
    </div>
</div>
@endsection