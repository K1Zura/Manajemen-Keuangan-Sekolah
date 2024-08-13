@extends('template.app')
@section('content')
@section('title', 'Contact')
@section('awal', 'Contact')
@section('icon', 'mdi mdi-cellphone')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form class="forms-sample" id="contactForm" data-id="{{ $contact->id }}">
          <div class="form-group">
            <label for="exampleInputName1">Telephone</label>
            <input type="text" class="form-control" id="exampleInputName1" value="{{ $contact->telp }}" name="telp" id="telp" placeholder="Telephone">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail3" value="{{ $contact->email }}" name="email" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputCity1">Instagram</label>
            <input type="text" class="form-control" id="exampleInputCity1" value="{{ $contact->instagram }}" name="instagram" id="instagram" placeholder="Instagram">
          </div>
          <button type="submit" class="btn btn-gradient-primary me-2" id="saveBtnContact">Update</button>
        </form>
      </div>
    </div>
</div>
@endsection

