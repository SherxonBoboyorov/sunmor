@extends('layouts.admin')

@section('title', 'edit Icon')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Icon</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <form action="{{ route('icon.update', $icon->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">

                   <div class="item">
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-3">
                            <label for="title_en">Icon name [English]</label>
                            <input type="text" id="title_en" class="form-control" value="{{ $icon->title_en }}" name="title_en">
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
                            <input type="text" id="title_es" class="form-control" value="{{ $icon->title_es }}" name="title_es">
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
                            <img src="{{ asset($icon->image) }}" width="150" height="150" alt="">
                        </div><br>
                    </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success btn-block">Update</button>
                            </div>
                        </div>
                 </div>
            </div>
        </form>

    </div>

</div>
@endsection

