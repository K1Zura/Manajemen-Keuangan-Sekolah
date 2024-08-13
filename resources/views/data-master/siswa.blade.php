@extends('template.app')
@section('content')
@section('title', 'Siswa')
@section('awal', 'Siswa')
@section('icon', 'mdi mdi-account-multiple')
<div class="col-lg-12 margin-tb">
    <div class="pull-right mb-2">
        <a class="btn btn-primary" href="javascript:void(0)" id="createNewSiswa">Tambah Siswa</a>
    </div>
</div>
<div class="card">
<div class="card-body">
    <table class="table table-bordered data-table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">NIS</th>
            <th scope="col">Nama</th>
            <th scope="col">Kelas</th>
            <th scope="col">Tahun Ajaran</th>
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
            <div class="errMsgContainer mb-3">
                <!-- Errors will be displayed here -->
            </div>
            <div class="modal-body">
                <form id="siswaForm" name="siswaForm" class="form-horizontal">
                    <input type="hidden" name="siswa_id" id="siswa_id">
                    <div class="form-group">
                        <label for="nis" class="col-sm-2 control-label">NIS</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nis" name="nis" placeholder="Enter NIS" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-12">
                            <input type="text" id="nama" name="nama" required="" placeholder="Enter Nama" class="form-control">
                            <small class="namaError"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kelas_id" class="col-sm-2 control-label">Kelas</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="kelas_id" name="kelas_id">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tahun_ajaran_id" class="col-sm-2 control-label">Tahun Ajaran</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="tahun_ajaran_id" name="tahun_ajaran_id">
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

