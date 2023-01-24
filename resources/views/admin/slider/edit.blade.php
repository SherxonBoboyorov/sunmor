@extends('layouts.admin')

@section('title', 'All slider')

@section('content')
    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit slider</h4>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <!-- end page title end breadcrumb -->
            <form action="{{ route('slider.update', $slider->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-8">
                                <label for="title_en">Title [English]</label>
                                <input type="text" id="title_en" class="form-control" value="{{ $slider->title_en }}" name="title_en">
                                @if($errors->has('title_en'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ $errors->first('title_en') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <label for="title_es">Title [Spanish]</label>
                                <input type="text" id="title_es" class="form-control" value="{{ $slider->title_es }}" name="title_es">
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
                        <br>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-12">
                                <label for="description_en">Content [English]</label>
                                <input type="text" id="description_en" class="form-control" value="{{ $slider->description_en }}" name="description_en">
                                @if($errors->has('description_en'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ $errors->first('description_en') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-12">
                                <label for="description_es">Content [Spanish]</label>
                                <input type="text" id="description_es" class="form-control" value="{{ $slider->description_es }}" name="description_es">
                                @if($errors->has('description_es'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ $errors->first('description_es') }}
                                    </div>
                                @endif
                            </div>
                        </div><br><br>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-6">
                                <label for="meta_title_en">Meta Title EN</label>
                                <textarea name="meta_title_en" class="form-control" id="meta_title_en" cols="30" rows="10">{{ $slider->meta_title_en }}</textarea>
                                @if($errors->has('meta_title_en'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('meta_title_en') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="meta_description_en">Meta Description EN</label>
                                <textarea name="meta_description_en" class="form-control" id="meta_description_en" cols="30" rows="10">{{ $slider->meta_description_en }}</textarea>
                                @if($errors->has('meta_description_en'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('meta_description_en') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-6">
                                <label for="meta_title_es">Meta Title ES</label>
                                <textarea name="meta_title_es" class="form-control" id="meta_title_es" cols="30" rows="10">{{ $slider->meta_title_es }}</textarea>
                                @if($errors->has('meta_title_es'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('meta_title_es') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="meta_description_es">Meta Description EN</label>
                                <textarea name="meta_description_es" class="form-control" id="meta_description_es" cols="30" rows="10">{{ $slider->meta_description_es }}</textarea>
                                @if($errors->has('meta_description_es'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('meta_description_es') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-6">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control-file">
                                @if($errors->has('image'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ $errors->first('image') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset($slider->image) }}" width="150" height="150" alt="">
                            </div>
                        </div>
                        <br>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-block">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div><!-- container -->

    </div>
@endsection
