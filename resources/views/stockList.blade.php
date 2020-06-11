@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Stock Requried
                    <div class="float-right"> 
                        <a class="btn btn-outline-secondary" href="{{route('home')}}">Dashboard</a>  
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row justify-content-center ">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Item Name</th>
                                <th>Quanity</th>
                            </tr>
                            @foreach($stockList as $stock)
                            <tr>
                              <td>{{$stock->item_name}}</td>
                              <td>{{$stock->quantity}}</td>
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