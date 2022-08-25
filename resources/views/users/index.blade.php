@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="container">
    <div class="col-lg-12">
        <div class="row">
           <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4 style="float:left">ADD USERS</h4>
                    <a href="#" style="float: right" class="btn btn-dark"  data-bs-toggle="modal" data-bs-target="#addUser">
                        <i class="fa fa-plus"></i>Add New users</a></div>
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                             <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role </th>
                                <th>Actions</th>
                             </thead>
                             <tbody>
                                @foreach ($denno as $users)
                                <tr>
                                    <td>{{ $users->id }}</td>
                                    <td>{{ $users->name }}</th>
                                    <td>{{ $users->email }}</td>
                                    <td>{{ $users->phone }}</th>
                                    <td>@if ($users->role==1)Admin
                                        @else Cashire

                                    @endif</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editUser_{{ $users->id }}">
                                                <i class="fa fa-edit"></i>Edit</button>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser_{{ $users->id }}"> <i class="fa fa-trash"></i> Del</button>

                                        </div>
                                    </td>
                                </tr>

                                {{-- EDIT USER MODAL --}}
                                <div class="modal right fade" id="editUser_{{ $users->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    {{-- modal for editing user details--}}
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title" id="staticBackdropLabel">Add User</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                            {{ $users->id }}
                                          </div>
                                          <div class="modal-body">
                                              <form action="{{ route('users.update', $users->id) }}" method="post" enctype="multipart/form-data">
                                                  @csrf
                                                      <div class="form-group">
                                                          <label for="">Name</label>
                                                              <input type="text" name="name" id="" value="{{ $users->name }}" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="">Email</label>
                                                              <input type="email" name="email" id="" value="{{ $users->email }}" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="">Phone</label>
                                                              <input type="number" name="phone" id="" value="{{ $users->phone }}" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="">Password</label>
                                                              <input type="password" name="password" id="" value="{{ $users->password }}" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="">Role</label>
                                                        <select name="role" id="" class="form-control">
                                                            <option value="1" @if ($users->role==1)
                                                                selected

                                                            @endif>Admin</option>
                                                            <option value="2" @if ($users->role==2)
                                                                selected

                                                            @endif>Cashire</option>
                                                        </select>
                                                    </div>
                                                      <div class="modal-footer">
                                                          <button type="submit" name="id" value='{{  $users->id }}' class="btn btn-primary btn-block">Update User</button>
                                                      {{-- This is error nuber 1 --}}
                                                        </div>
                                              </form>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                    {{-- DELETEUSER MODAL --}}
                                    <div class="modal right fade" id="deleteUser_{{ $users->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        {{-- modal for editing user details--}}
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">delete User</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                                {{ $users->id }}
                                              </div>
                                              <div class="modal-body">
                                                  {{-- <form action="{{ route('destroy',['id'=>$users->id]) }}" method="post" enctype="multipart/form-data"> --}}
                                                    <form action="{{ route('destroy',['id'=>$users->id]) }}" method="post" enctype="multipart/form-data">
                                                      @csrf


                                                    <p> Are you sure you want to delete this {{ $users->name }}</p>
                                                          <div class="modal-footer">
                                                              <button class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger" >Delete User</button>
                                                        </div>
                                                  </form>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                             </tbody>
                        </table>
                    </div>
            </div>
           </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header"><h4>Search User<h4></div>
                        <div class="card-body">
                            <div class="table table-bordered table-left">
                                ....
                            </div>
                        </div>
                </div>
            </div>
           </div>
        </div>
    </div>
</div>

{{-- modal for editing user --}}

{{-- modal of adding new users --}}
<div class="modal right fade" id="addUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="staticBackdropLabel">Add User</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="store" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- <div class="form-group">
                    <label for="">Name<label>
                        <input type="text" name="name" id="" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Email<label>
                        <input type="email" name="email" id="" class="form-control">
                </div> --}}
                    <div class="form-group">
                        <label for="">Name</label>
                            <input type="text" name="name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                            <input type="number" name="phone" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                            <input type="password" name="confirm_password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role" id="" class="form-control">
                            <option value="1">Admin</option>
                            <option value="2">Cashire</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-block">Save User</button>
                    </div>
            </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
  <style>
    .modal.right .modal-dialog{
        top: 0;
        right: 0;
        margin-right: 19vh;
    }

    .modal.fade:not(.in).right .modal-dialog{
        -webkit-transform: translate3d(25%, 0, 0);
        transform: translate3d(25%,0,0);
    }
  </style>

@endsection

