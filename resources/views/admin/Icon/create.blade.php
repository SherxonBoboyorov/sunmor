@extends('layouts.admin')

@section('title', 'Add Icon')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Icon</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <form action="{{ route('icon.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">

                   <div class="item">
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-3">
                            <label for="title_en">Icon name [English]</label>
                            <input type="text" id="title_en" class="form-control" name="title_en">
                            @if($errors->has('title_en'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('title_en') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-3">
                            <label for="title_es">Icon name [Spanish]</label>
                            <input type="text" id="title_es" class="form-control" name="title_es">
                            @if($errors->has('title_es'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('title_es') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-2">
                            <label for="image">Icon image</label>
                            <input type="file" name="image" class="form-control-file">
                            @if($errors->has('image'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('image') }}
                            </div>
                            @endif
                        </div><br>
                    </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success btn-block">Save</button>
                            </div>
                        </div>
                 </div>
            </div>
        </form>

    </div>

</div>
@endsection

