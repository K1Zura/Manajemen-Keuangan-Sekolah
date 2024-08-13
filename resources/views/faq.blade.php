@extends('template.app')
@section('content')
@section('title', 'FAQ')
@section('awal', 'FAQ')
@section('icon', 'mdi mdi-comment-question-outline')
<div class="col-lg-12 margin-tb">
    <div class="pull-right mb-2">
        <a class="btn btn-primary" href="javascript:void(0)" id="createNewFaq">Pertanyaan</a>
    </div>
</div>
<div class="card">
<div class="card-body">
    <table class="table table-bordered data-table-faq">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Pertanyaan</th>
            <th scope="col">Jawaban</th>
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
                <form id="faqForm" name="faqForm" class="form-horizontal">
                    <input type="hidden" name="faq_id" id="faq_id">
                    <div class="form-group">
                        <label for="pertanyaan" class="col-sm-2 control-label">Pertanyaan</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" placeholder="Masukkan Pertanyaan" value="" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jawaban" class="col-sm-2 control-label">Jawaban</label>
                        <div class="col-sm-12">
                            <textarea rows="4" class="form-control" id="jawaban" name="jawaban" placeholder="Masukkan Jawaban" value="" required=""></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtnFaq" value="create">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
