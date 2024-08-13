@extends('template.app')
@section('content')
@section('title', 'Tahun Ajaran')
@section('awal', 'Tahun Ajaran')
@section('icon', 'mdi mdi-calendar-blank')
<div class="col-lg-12 margin-tb">
    <div class="pull-right mb-2">
        <a class="btn btn-primary" href="javascript:void(0)" id="createNewTahunAjaran"> Tambah Tahun Ajaran</a>
    </div>
</div>
<div class="card">
<div class="card-body">
    <table class="table table-bordered data-table-tahun-ajaran">
        <thead>
          <tr>
            <th scope="col">No</th>
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
                    <div class="modal-body">
                        <form id="tahunAjaranForm" name="tahunAjaranForm" class="form-horizontal">
                            <input type="hidden" name="tahunAjaran_id" id="tahunAjaran_id">
                            <div class="form-group">
                                <label for="tahun_ajaran" class="col-sm-2 control-label">Tahun Ajaran</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="Masukkan Tahun Ajaran" value="" maxlength="50" required="">
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="saveBtnTahunAjaran" value="create">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

