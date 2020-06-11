@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row justify-content-center ">
                        <div class="col-4">
                            <a class="btn btn-outline-dark" href="{{ route('orderlist.index') }}">View orders</a>
                        </div>
                        <div class="col-4">
                            <a class="btn btn-outline-dark" href="">View Catalog</a>
                        </div>

                        <div class="col-4">
                            <a class="btn btn-outline-dark" href="{{ route('stocklist.index') }}">View Stock Requried</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
