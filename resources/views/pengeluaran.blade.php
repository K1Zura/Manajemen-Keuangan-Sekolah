@extends('template.app')
@section('content')
@section('title', 'Home')
@section('awal', 'Home')
@section('icon', 'mdi mdi-arrow-up-bold-circle-outline')
<div class="col-lg-12 margin-tb">
    <div class="pull-right mb-2">
        <a class="btn btn-primary" href="javascript:void(0)" id="createNewPengeluaran">Pengeluaran</a>
    </div>
</div>
<div class="card">
<div class="card-body">
    <table class="table table-bordered data-table-pengeluaran">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Alasan</th>
            <th scope="col">Nominal</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Aksi</th>
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
                <form id="pengeluaranForm" name="pengeluaranForm" class="form-horizontal">
                    <input type="hidden" name="pengeluaran_id" id="pengeluaran_id">
                    <div class="form-group">
                        <label for="alasan" class="col-sm-2 control-label">Alasan</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="alasan" name="alasan" placeholder="Masukkan Alasan " value="" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nominal" class="col-sm-2 control-label">Nominal</label>
                        <div class="col-sm-12">
                            <input type="number" rows="4" class="form-control" id="nominal" name="nominal" placeholder="Masukkan Jawaban" value="" required="">
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
                        <button type="submit" class="btn btn-primary" id="saveBtnPengeluaran" value="create">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
