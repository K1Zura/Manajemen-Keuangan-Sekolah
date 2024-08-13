@extends('template.app')
@section('content')
@section('title', 'Home')
@section('awal', 'Home')
@section('icon', 'mdi mdi-home')
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="tanggal_mulai">Tanggal Mulai:</label>
            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
        </div>
        </div>
        <div class="col-lg-6">
        <div class="form-group">
            <label for="tanggal_selesai">Tanggal Selesai:</label>
            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
        </div>
    </div>
</div>
<div class="col-lg-12 margin-tb">
    <div class="pull-right mb-2">
        <button type="button" class="btn btn-primary" id="filterBtn">Tampil</button>
        <a href="javascript:void(0)" class="btn btn-danger" id="downloadPDF">Download PDF</a>
        <a href="javascript:void(0)" class="btn btn-success" id="downloadExcel">Download Excel</a>
    </div>
</div>
<br>
<div class="card">
<div class="card-body">
<h1 style="font-family: 'Times New Roman', Times, serif">Pembayaran</h1>
    <table class="table table data-table-laporan">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NIS</th>
                <th scope="col">Kelas</th>
                <th scope="col">Tahun Ajaran</th>
                <th scope="col">Kategori Pembayaran</th>
                <th scope="col">Nominal</th>
                <th scope="col">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayaran as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->nis}}</td>
                    <td>{{$item->nama_kelas}}</td>
                    <td>{{$item->tahun_ajaran}}</td>
                    <td>{{$item->kategori}}</td>
                    <td>{{$item->nominal}}</td>
                    <td>{{$item->tanggal}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
