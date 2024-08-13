@extends('template.app')
@section('content')
@section('title', 'Pembayaran')
@section('awal', 'Pembayaran')
@section('icon', 'mdi mdi-calculator')
<div class="col-lg-12 margin-tb">
    <div class="pull-right mb-2">
        <a class="btn btn-primary" href="javascript:void(0)" id="createNewBayar">Pembayaran</a>
    </div>
</div>
<div class="card">
<div class="card-body">
    <table class="table table-bordered data-table-bayar">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NIS</th>
                <th scope="col">Kelas</th>
                <th scope="col">Tahun Ajaran</th>
                <th scope="col">Kategori Pembayaran</th>
                <th scope="col">Validasi</th>
                <th scope="col">Nominal</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
</div>


{{-- Modal --}}
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeadingSiswa"></h4>
                <h4 class="modal-title" id="modelHeadingKelas"></h4>
            </div>
            <div class="modal-body">
                <form id="bayarForm" name="bayarForm" class="form-horizontal">
                    <input type="hidden" name="bayar_id" id="bayar_id">
                    <div class="form-group">
                        <label for="siswa_id" class="col-sm-2 control-label">NIS</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="siswa_id" name="siswa_id">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kategori_pembayaran_id" class="col-sm-2 control-label">Kategori Pembayaran</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="kategori_pembayaran_id" name="kategori_pembayaran_id">
                            </select>
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <label for="validasi" class="col-sm-2 control-label">Validasi</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="validasi" name="validasi" value="0" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nominal" class="col-sm-2 control-label">Nominal</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Masukkan Nominal" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtnBayar" value="create">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

