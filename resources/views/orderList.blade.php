@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Orders
                    <div class="float-right"> 
                        <a class="btn btn-outline-secondary" href="{{route('home')}}">Dashboard</a>  
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-12">
                    <form action="{{route('orderlist.index')}}" method="post">
                        @csrf
                        <div class="form-group form-inline">
                            <input type="date" class="form-control col-3" name="orderDate" id="" value="{{$orderDate}}">
                            <input type="submit" class="btn btn-outline-primary col-2 ml-2" value="Get orders">
                        </div>
                    </form> 
                    </div>
                   
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Customer Name</th>
                            <th style="width: 20%;">Address</th>
                            <th>Contact</th>
                            <th></th>
                        </tr>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->user_name}}</td>
                            <td>{{$order->user_address}}</td>
                            <td>{{$order->user_contact}}</td>
                            <td> 
                                <a class="btn btn-outline-info" href="{{ route('orderlist.show')}}/{{$order->id}}">View order details</a>
                                @if($order->delivery_status_code==1)
                                    <input type="button" class="btn btn-outline-success delivered" data-orderid="{{$order->id}}" onclick="markDelivered(this)" value="Mark Delivered" >
                                    <input type="button" class="btn btn-outline-danger cancelled" data-orderid="{{$order->id}}" onclick="markCancelled(this)" value="Mark Cancelled" >
                                @elseif($order->delivery_status_code==2)
                                    <a class="btn btn-success" >Delivered</a>
                                @elseif($order->delivery_status_code==3)
                                    <a class="btn btn-danger" >Cancelled</a>
                                @endif
                            </td>
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