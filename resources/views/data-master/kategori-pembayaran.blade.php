@extends('template.app')
@section('content')
@section('title', 'Kategori')
@section('awal', 'Kategori')
@section('icon', 'mdi mdi-arrange-send-backward')
<div class="col-lg-12 margin-tb">
    <div class="pull-right mb-2">
        <a class="btn btn-primary" href="javascript:void(0)" id="createNewPembayaran"> Tambah Kategori</a>
    </div>
</div>
<div class="card">
<div class="card-body">
    <table class="table table-bordered data-table-pembayaran">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kategori</th>
            <th scope="col">Tahun Ajaran</th>
            <th scope="col">Nominal</th>
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
                <form id="pembayaranForm" name="pembayaranForm" class="form-horizontal">
                    <input type="hidden" name="pembayaran_id" id="pembayaran_id">
                    <div class="form-group">
                        <label for="kategori" class="col-sm-2 control-label">kategori</label>
                        <div class="col-sm-12">
                            <input class="form-control" id="kategori" name="kategori">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tahun_ajaran_id" class="col-sm-2 control-label">Tahun Ajaran</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="tahun_ajaran_id" name="tahun_ajaran_id">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nominal" class="col-sm-2 control-label">Nominal</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Masukkan Nominal" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtnPembayaran" value="create">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

