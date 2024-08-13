@extends('template.app')
@section('content')
@section('title', 'Keuangan')
@section('awal', 'Keuangan')
@section('icon', 'mdi mdi-chart-areaspline')
<div class="container">
    {!! $chart->container() !!}
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Pendapatan</h2>
            <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pendapatan</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembayaran as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->nominal }}</td>
                            <td>{{ $item->tanggal }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>

        <div class="col-md-6">
            <h2>Pengeluaran</h2>
            <div class="card">
            <table class="table table-pengeluaran">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengeluaran</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengeluaran as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->alasan }}</td>
                            <td>{{ $item->nominal }}</td>
                            <td>{{ $item->tanggal }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}
@endsection
