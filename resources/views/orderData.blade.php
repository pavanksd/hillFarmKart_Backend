@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Orders
                    <div class="float-right"> 
                        <a class="btn btn-outline-secondary" href="{{route('orderlist.index')}}">Go Back</a>  
                    </div>
                </div>
                <div class="card-body">
                    <div class="row ">
                        <div class="col-12">
                            <div class="float-right">
                                <p>Order status: 
                                <span style="color:<?= isset($orderData[0]['delivery_status_code']) && $orderData[0]['delivery_status_code']==2?'green':'red' ?>" >
                                <?= ($orderData[0]['delivery_status'])??'' ?></span></p>
                            </div>
                        </div>
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Customer Name</th>
                                <th style="width:40%">Address</th>
                                <th>Contact</th>
                                <th>Order Date  </th>
                            </tr>
                            @if(count($orderData)>=1)
                            <tr>
                                <td><?= $orderData[0]['user_name'] ?></td>
                                <td><?= $orderData[0]['user_address'] ?></td>
                                <td><?= $orderData[0]['user_contact'] ?></td>
                                <td><?= date('d-m-Y', strtotime($orderData[0]['created_at']));?> </td>
                            </tr>
                            @endif
                        </table>
                        </div>
                        <div class="row">
                            <table class="table table-bordered table-hover">
                            <tr>
                                <th>Item Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            @foreach($orderData as $order)
                                <tr>
                                    <td>{{$order['item_name']}}</td>
                                    <td>{{$order['quantity']}}</td>
                                    <td>{{$order['price']}}</td>
                                </tr> 
                            @endforeach
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection