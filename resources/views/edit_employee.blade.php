@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} --}}
                    
                      @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert">x</button>
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                      @endif
                      <form action="/employees/{{$id->id}}/update" method="POST">
                        @csrf
                    <div class="form-group">
                    <select class="form-select" name="company_id" aria-label="Default select example">
                    <option selected>Pilih Karyawan</option>
                    @foreach ($companies as $company_id)
                    
                    <option value="{{$company_id->id}}" @if ($id->companie->id == $company_id->id) selected @endif>{{$company_id->name}}</option>
                        
                    @endforeach  
                  </select>    
                  </div> 
                       <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Depan</label>
                            <input type="text" value="{{$id->firstname}}" class="form-control" name="firstname" required>
                        </div> 
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Belakang</label>
                            <input type="text" value="{{$id->lastname}}" class="form-control" name="lastname" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="email" value="{{$id->email}}" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">No. Telp</label>
                            <input type="number" value="{{$id->phone}}" class="form-control" name="phone" required>
                        </div>                  
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </form>
                </div>
               
            </div>
        </div>
    </div>
    <br/>
 
@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@endsection