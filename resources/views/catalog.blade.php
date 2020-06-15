@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Catalog
                <div class="float-right"> 
                        <a class="btn btn-outline-success mr-4" href="{{route('catalog.create')}}">Create new item</a>  
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
                                <th>Item name</th>
                                <th style="width:25%">Price</th>
                                <th>Created on</th>
                                <th  style="width:15%">Enable ?</th>
                                <th style="width:10%"></th>
                            </tr>
                            @foreach($items as $item)
                            <tr>
                                <td><input type="text" class="form-control itemName_{{$item->id}}" value="{{$item->item_name}}"> </td>
                                <td><input type="text" class="form-control itemPrice_{{$item->id}}" value="{{$item->price}}"> </td>
                                <td><?= date('d-m-Y', strtotime($item->created_at)) ?></td>
                                <td class="table-{{ $item->is_enabled==1?'success':'danger' }}">
                                    <select class="form-control is_enabled enabled_{{$item->id}}" data-item_id="{{$item->id}}" >
                                        <option value="1" {{ $item->is_enabled==1?'selected':'' }} >Yes</option>
                                        <option value="0" {{ $item->is_enabled==0?'selected':'' }} >No</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="button" class="btn btn-outline-success" value="Save" onclick=updateItem({{$item->id}}) >
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