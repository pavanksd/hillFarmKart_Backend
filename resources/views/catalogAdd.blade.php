@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Catalog
                <div class="float-right">                         
                        <a class="btn btn-outline-secondary" href="{{route('catalog.index')}}">Go Back</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row justify-content-center">                        
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Item name</th>
                                <th>Price</th>
                                <th style="width:10%">Image</th>
                                <th style="width:10%"></th>
                            </tr>
                            <tr>
                                <td>
                                    <input class="form-control" type="text" id="itemName" >
                                </td>
                                <td>
                                    <input class="form-control" type="number" id="itemPrice" >
                                </td>
                                <td>
                                    <input class="btn" type="file" name="imageUpload" id="imageUpload">
                                </td>                                
                                <td>
                                    <input type="button" class="btn btn-outline-success" onclick="createItem()" value="create">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="alert alert-success alert-dismissible" role="alert" style='display:none'>
                        <p>Item created</p>                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="alert alert-danger alert-dismissible" role="alert" style='display:none'>
                        <p>Error in creating item!! Enter valid values in all fields</p>                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection