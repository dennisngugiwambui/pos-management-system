@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
           <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4 style="float:left">ADD Products</h4>
                    <a href="#" style="float: right" class="btn btn-dark"  data-bs-toggle="modal" data-bs-target="#addProduct">
                        <i class="fa fa-plus"></i>Add New Products</a></div>
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                             <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Brand</th>
                                <th>Price </th>
                                <th>Quantity</th>
                                <th>stock</th>
                                <th>Action</th>
                             </thead>
                             <tbody>
                                @foreach ($product as $products)
                                <tr>
                                    <td>{{ $products->id }}</td>
                                    <td>{{ $products->product_name}}</td>
                                    <td>{{ $products->description }}</td>
                                    <td>{{ $products->brand }}</td>
                                    <td>{{ $products->price }}</td>
                                    <td>{{ $products->quantity }}</td>
                                    <td style="color: white; background: black;">
                                        @if ($products->alert_stock<=$products->quantity) <span class="badge badge-primary">Low Stock >{{ $products->alert_stock }}</span>
                                        @else <span class="badge badge-success">{{ $products->alert_stock }}</span>
                                    @endif
                                </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editProduct_{{ $products->id }}">
                                                <i class="fa fa-edit"></i>Edit</button>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProduct_{{ $products->id }}"> <i class="fa fa-trash"></i> Del</button>

                                        </div>
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                             </tbody>

                                {{-- EDIT USER MODAL --}}
                                <div class="modal right fade" id="editProduct_{{ $products->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    {{-- modal for editing user details--}}
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title" id="staticBackdropLabel">Add Product</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                            {{ $products->id }}
                                          </div>
                                          <div class="modal-body">
                                              <form action="{{ route('product.update') }}" method="post" enctype="multipart/form-data">
                                                  @csrf

                                                  {{-- @method('put') --}}

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
                                                              <input type="text" name="product_name" id="" value="{{ $products->product_name }}" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="">Description</label>
                                                              <input type="text" name="description" id="" value="{{ $products->description }}" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="">Brand</label>
                                                              <input type="text" name="brand" id="" value="{{ $products->brand }}" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="">Price</label>
                                                            <input type="number" name="price" id="" value="{{ $products->price }}" class="form-control">
                                                    </div>
                                                      <div class="form-group">
                                                          <label for="">Quantity</label>
                                                              <input type="number" name="quantity" id="" value="{{ $products->quantity }}" class="form-control">
                                                      </div>
                                                      <div class="modal-footer">
                                                          <button type="submit" name="id" value='{{  $products->id }}' class="btn btn-primary btn-block">Update User</button>
                                                      {{-- This is error nuber 1 --}}
                                                        </div>
                                              </form>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                    {{-- DELETEUSER MODAL --}}
                                    <div class="modal right fade" id="deleteProduct_{{ $products->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        {{-- modal for editing user details--}}
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">delete Product</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                                {{ $products->id }}
                                              </div>
                                              <div class="modal-body">
                                                  <form action="{{ route('destroy',['id'=>$products->id]) }}" method="post" enctype="multipart/form-data">
                                                      @csrf


                                                    <p> Are you sure you want to delete this {{ $products->product_name }}</p>
                                                          <div class="modal-footer">
                                                              <button class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger" >Delete Product</button>
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
                    <div class="card-header"><h4>Search Product<h4></div>
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
<div class="modal right fade" id="addProduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="staticBackdropLabel">Add Product</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="uploadproduct" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="">Product Name</label>
                            <input type="text" name="product_name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                            <input type="text" name="description" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Brand</label>
                            <input type="text" name="brand" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                            <input type="number" name="price" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">alert_stock</label>
                            <input type="text" name="alert_stock" id="" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block">Save Product</button>
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

