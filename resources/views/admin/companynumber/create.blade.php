@extends('layouts.admin')

@section('title', 'Add Advantages')

@section('content')
    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Add Advantages</h4>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <!-- end page title end breadcrumb -->
            <form action="{{ route('companynumber.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="item">
                            <div class="row" style="margin-top: 15px">
                                <div class="col-md-1">
                                    <label for="number">Number</label>
                                    <input type="text" id="number" class="form-control" name="number">
                                    @if($errors->has('number'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ $errors->first('number') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px">
                                <div class="col-md-5">
                                    <label for="number_title_en">Title [English]</label>
                                    <input type="text" id="number_title_en" class="form-control" name="number_title_en">
                                    @if($errors->has('number_title_en'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ $errors->first('number_title_en') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px">
                                <div class="col-md-5">
                                    <label for="number_title_es">Title [Spanish]</label>
                                    <input type="text" id="number_title_es" class="form-control" name="number_title_es">
                                    @if($errors->has('number_title_es'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ $errors->first('number_title_es') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-success btn-block">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
