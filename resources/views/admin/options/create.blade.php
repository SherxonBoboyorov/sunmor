@extends('layouts.admin')

@section('title', 'Add options')

@section('content')
    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Add options</h4>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <!-- end page title end breadcrumb -->
            <form action="{{ route('options.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                              <label for="key">Key</label>
                              <select name="key" id="key" class="form-control">
                                  <option value="address_en">Address EN</option>
                                  <option value="address_es">Address ES</option>
                                  <option value="email">E-mail</option>
                                  <option value="phone">Phone</option>
                                  <option value="map">Google or Yandex MAP</option>
                                  <option value="instagram">Instagram</option>
                                  <option value="facebook">Facebook</option>
                                  <option value="youtube">Youtube</option>
                                  <option value="meta_title_en">Meta title EN</option>
                                  <option value="meta_title_es">Meta title ES</option>
                                  <option value="meta_description_en">Meta description EN</option>
                                  <option value="meta_description_es">Meta description ES</option>
                              </select>
                              @if($errors->has('key'))
                                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                      {{ $errors->first('key') }}
                                  </div>
                              @endif
                          </div>
                          <div class="col-md-8">
                            <label for="title_ru">Value</label>
                            <input type="text" id="value" class="form-control" name="value">
                            @if($errors->has('value'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('value') }}
                                </div>
                            @endif
                        </div>

                        </div><br><samp></samp>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-block">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
