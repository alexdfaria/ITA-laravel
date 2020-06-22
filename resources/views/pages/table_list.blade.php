@extends('layouts.app', ['activePage' => 'table', 'titlePage'
=>__('Meals Table')]) @section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Meals Table</h4>
                        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Type of Food
                                    </th>
                                    <th>
                                        Warehouse ID (Name)
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Stock
                                    </th>
                                    <th class="td-actions text-center">
                                        Actions
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($meals as $meal)
                                    <tr>
                                        <td>
                                            {{$meal->id}}
                                        </td>
                                        <td>
                                            {{$meal->name}}
                                        </td>
                                        <td>
                                            {{$meal->type}}
                                        </td>
                                        <td>
                                        @foreach($warehouses as $ware)
                                          @if($meal->warehouse_id == $ware->id)
                                            {{$ware->id}} ({{$ware->name}})
                                          @endif
                                        @endforeach
                                        </td>
                                        <td class="text-primary">{{$meal->price}}
                                            €</td>
                                        <td>{{$meal->stock}}
                                            </td>
                                        <td class="td-actions text-center">
                                            <a
                                                rel="tooltip"
                                                class="btn btn-success btn-link"
                                                href="/table-edit/{{$meal->id}}"
                                                data-original-title="edit meal"
                                                title="">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </a>
                                            <a onclick="return confirm('Are you sure?')"
                                                rel="delete"
                                                class="btn btn-danger btn-link"
                                                href="/table-delete/{{$meal->id}}"
                                                data-original-title=""
                                                title="">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <a href="{{ url('table-add') }}" class="btn btn-sm btn-primary">Add meal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0">
                            Warehouses Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        City
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($warehouses as $ware)
                                    <tr>
                                        <td>
                                            {{$ware->id}}
                                        </td>
                                        <td>
                                            {{$ware->name}}
                                        </td>
                                        <td>
                                            {{$ware->city}}
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection