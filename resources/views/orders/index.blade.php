@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="container">
    <div class="col-lg-12">
        <div class="row">
           <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 style="float:left">Order Products</h4>
                    <a href="#" style="float: right" class="btn btn-dark"  data-bs-toggle="modal" data-bs-target="#addUser">
                        <i class="fa fa-plus"></i>Order Products</a></div>
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                             <thead>
                                <th></th>
                                <th>Product Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Disc(%) </th>
                                <th>Total</th>
                                <th><a href="#" class="btn btn-sm btn-success add_more rounded-circle"><i class="fa fa-plus"></i></a></th>
                             </thead>
                             <tbody class="addMoreProduct">
                                <tr>
                                    <td>1</td>
                                    <td>
                                            <select name="product_id" id="product_id" class="form-control product_id">
                                                <option value="">Select Item</option>
                                                @foreach ($products as $products)
                                                <option data-price="{{ $products->price }}"
                                                    value="{{ $products->id }}">
                                                    {{ $products->product_name }}</option>
                                                @endforeach
                                            </select>
                                    </td>
                                    <td>
                                        <input type="number" name="quantity[]" id="quantity"
                                        class="form-control quantity">
                                    </td>
                                    <td>
                                        <input type="number" readonly name="price[]" id="price"
                                        class="form-control price">
                                    </td>
                                    <td>
                                        <input type="number" name="discount[]" id="discount"
                                        class="form-control discount">
                                    </td>
                                    <td>
                                        <input type="number" readonly name="total_amount[]" id="total"
                                        class="form-control total">
                                    </td>
                                    <td><a href="#" class="btn btn-sm btn-danger rounded-circle delete"><i
                                        class="fa fa-times"></i></a></td>
                                </tr>
                             </tbody>
                        </table>
                    </div>
            </div>
           </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Total <b class="total">0.00</b><h4></div>
                        <div class="card-body">
                            <div class="panel">
                                <div class="row">
                                    <table class="table table-striped">
                                        <tr>
                                            <td>
                                                <label for="">Customer Name</label>
                                                        <input type="text" name="customer_name" id="" class="form-control">
                                            </td>
                                            <td>
                                                <label for="">Customer Phone</label>
                                                        <input type="number" name="customer_number" id="" class="form-control">
                                            </td>
                                        </tr>
                                    </table>

                                    <tr>
                                        <td> Payment Method<br>

                                            <span class="radio-item">
                                                <input type="radio" name="payment_method" id="payment_method"
                                                class="true" value="cash" checked="checked">
                                                <label for="payment_method"> <i class="fa fa-money-bill text-success">Cash</i> </label>
                                            </span>
                                            <span class="radio-item">
                                                <input type="radio" name="payment_method" id="payment_method"
                                                class="true" value="bank transfer">
                                                <label for="payment_method"> <i class="fa fa-university text-success">Bank Transfer</i> </label>
                                            </span>
                                            <span class="radio-item">
                                                <input type="radio" name="payment_method" id="payment_method"
                                                class="true" value="credit Card">
                                                <label for="payment_method"> <i class="fa fa-credit-card text-success">Credit Card</i> </label>
                                            </span>
                                        </td><br>

                                        <td>
                                            Payment
                                            <input type="number" name="paid_amount" id="paid_amount" class="form-control">
                                        </td>

                                        <td>
                                            Returning change
                                            <input type="number" readonly name="balance" id="balance" class="form-control">
                                        </td>
                                    </tr>
                                </div>
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


@push('scripts')
<script>
    // $(document).ready(function(){
    //     alert(1);
    // })
    $('.add_more').on('click', function(){
        var product =$('.product_id').html();
        var numberofrow = ($('.addMoreProduct tr').length-0)+1;
        var tr = '<tr><td class="no">' + numberofrow + '</td>' +
                 '<td><select class="form-control product_id" name="product_id[]" >' + product +
                    '</select></td>' +
                    '<td><input type="number" name="quantity[]" class="form-control quantity"></td>' +
                    '<td><input type="number" name="price[]" class="form-control price"></td>' +
                    '<td><input type="number" name="discount[]" class="form-control discount"></td>' +
                    '<td><input type="number" name="total_amount[]" class="form-control total_amount[]"></td>' +
                    '<td> <a class="btn btn-danger btn-sm delete rounded-circle"><i class="fa fa-times-circle"</a></td>' +
                        $('.addMoreProduct').append(tr);
    });
    // $('.addMoreProduct').append('.delete', 'click', function(){
    //     $(this).parent().parent().remove();
    // })

    function TotalAmount(){
        var total=0;
        $('.total_amount').each(function(i, e){
            var amount= $this.val() -0;
            total += amount;
        });

        $('.total').html(total);
    }

    $('.addMoreProduct').delegate('.product_id', 'change', function(){
        var tr = $(this).parent().parent();
        var price = tr.find('.product_id option:selected').attr('data-price');
        tr.find('.price').val(price);
        var qty = tr.find('.quantity').val()-0;
        var disc = tr.find('.discount').val()-0;
        var price = tr.find('.price').val()-0;
        var total_amount = (qty*price)-((qty*price*disc)/100);
        tr.find('total_amount').val();
        TotalAmount();

    });

    $('.addMoreProduct').delegate('.quantity, .discount', 'keyup', function(){
        var tr = $(this).parent().parent();
        var qty = tr.find('.quantity').val()-0;
        var disc = tr.find('.discount').val()-0;
        var price = tr.find('.price').val()-0;
        var total_amount = (qty*price)-((qty*price*disc)/100);
        tr.find('.total_amount').val(total_amount);
        TotalAmount();
    })



</script>
@endPush
