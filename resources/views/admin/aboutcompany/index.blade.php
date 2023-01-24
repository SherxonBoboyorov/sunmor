@extends('layouts.admin')

@section('title', 'All a about')

@section('content')
    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">List of about</h4>
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
                            <th>About Image</th>
                            <th>Title_name [English]</th>
                            <th>Title_name [Spanish]</th>
                            <th colspan="2" style="width: 2%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($aboutcompanies as $aboutcompany)
                            <tr>
                                <td>{{ $aboutcompany->id }}</td>
                                <td>
                                    <img src="{{ asset($aboutcompany->image) }}" alt="" width="35" height="35">
                                </td>
                                <td>{{ $aboutcompany->title_name_en }}</td>
                                <td>{{ $aboutcompany->title_name_es }}</td>
                                <td>
                                    <a href="{{ route('aboutcompany.edit', $aboutcompany->id) }}" class="btn btn-info btn-icon">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
