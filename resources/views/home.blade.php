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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        Tambah
                      </button>
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th scope="col">id</th>
                              <th scope="col">Company</th>
                              <th scope="col">Email</th>
                              <th scope="col">Website</th>
                              <th scope="col">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($companies as $item)
                            <tr>
                                <td>{{$loop->index + 1}}</td>                                    
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->website}}</td>
                                <td><a href="/company/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/company/{{$item->id}}/hapus" onclick="return confirm('Data Akan Di Hapus')" class="btn btn-danger btn-sm">Hapus</a></td>
                                @endforeach
                            </tr>
                          </tbody>
                      </table>
                </div>
               
            </div>
            <!-- Button trigger modal -->

  
  
        </div>
    </div>
    <br/>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Employees') }}</div>
                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} --}}
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah
  </button>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th scope="col">id</th>
                              <th scope="col">Company</th>
                              <th scope="col">Nama Depan</th>
                              <th scope="col">Nama Belakang</th>
                              <th scope="col">Email</th>
                              <th scope="col">No. Telp</th>
                              <th scope="col">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($employee as $data)
                          <tr>
                              <td>{{$loop->index + 1}}</td>                                    
                              <td>{{$data->companie->name}}</td>
                              <td>{{$data->firstname}}</td>
                              <td>{{$data->lastname}}</td>
                              <td>{{$data->email}}</td>
                              <td>{{$data->phone}}</td>
                              <td><a href="/employee/{{$data->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                              <a href="/employee/{{$data->id}}/hapus" onclick="return confirm('Data Akan Di Hapus')" class="btn btn-danger btn-sm">Hapus</a></td>
                              @endforeach
                          </tr>
                        </tbody>
                      </table>
                </div>
               
            </div>
        </div>
    </div>
</div>

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/employee/create" method="POST">
                @csrf
                <div class="form-group">
                <select class="form-select" name="company_id" aria-label="Default select example">
                    <option selected>Pilih Company</option>
                    @foreach ($companies as $company_id)
                    <option value="{{$company_id->id}}">{{$company_id->name}}</option>    
                    @endforeach  
                  </select>
                </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Depan</label>
                    <input type="text" class="form-control" name="firstname" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Belakang</label>
                    <input type="text" class="form-control" name="lastname" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="email" class="form-control" name="email" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Phone</label>
                    <input type="number" class="form-control" name="phone" required>
                  </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/company/create" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Perusahaan</label>
                    <input type="text" class="form-control" name="name" required>
                  </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="text" class="form-control" name="email" required>
                  </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Website</label>
                    <input type="text" class="form-control" name="website" required>
                  </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@endsection