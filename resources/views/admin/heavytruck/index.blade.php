@extends('layouts.admin')

@section('title', 'All a Trucks')

@section('content')
    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">List of Trucks</h4>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="card">
                <div class="card-body">

                    @if(session('message'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('message') }}
                        </div>

                    @endif

                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 2%;">#</th>
                            <th>Image</th>
                            <th>Truck name [English]</th>
                            <th>Truck name [Spanish]</th>
                            <th colspan="2" style="width: 2%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($heavytrucks as $heavytruck)
                            <tr>
                                <td>{{ $heavytruck->id }}</td>
                                <td>
                                    <img src="{{ asset($heavytruck->image) }}" alt="" width="35" height="35">
                                </td>
                                <td>{{ $heavytruck->truck_name_en }}</td>
                                <td>{{ $heavytruck->truck_name_es }}</td>
                                <td>
                                    <a href="{{ route('heavytruck.edit', $heavytruck->id) }}" class="btn btn-info btn-icon">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('heavytruck.destroy', $heavytruck->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning btn-icon">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{-- {!! $heavy_trucks->links() !!} --}}
                </div>
            </div>

        </div>
    </div>
@endsection
