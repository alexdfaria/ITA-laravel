@extends('layouts.app', ['activePage' => 'table2', 'titlePage'
=>__('Warehouses Table')]) @section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Warehouses Table</h4>
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
                                        City
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($warehouses as $w)
                                    <tr>
                                        <td>
                                            {{$w->id}}
                                        </td>
                                        <td>
                                            {{$w->name}}
                                        </td>
                                        <td>
                                            {{$w->city}}
                                        </td>
                                    </tr>
                                    @endforeach
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