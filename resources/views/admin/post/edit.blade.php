@extends('admin/layout/layout')

@section('page_title', 'Post Edit')
@section('MainContent')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Post</strong> Edit Here
                    </div>
{{-- @php
      echo "<pre>";
        print_r($result[0]);

        die();
@endphp --}}
                    <div class="card-body card-block">

                        {{-- FORM START HERE --}}
                        <form action="{{url('/admin/post-update/'.$result[0]->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">

                            {{ csrf_field() }}
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="title" class=" form-control-label">Title Here</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="title" value="{{$result[0]->title}}" class="form-control">
                                    <small class="form-text text-muted">This is a help text</small>
                                    @error('title')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="short_description" class=" form-control-label">Short Description</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="short_description" id="short_description" rows="3" placeholder="Content..." class="form-control">{{$result[0]->short_description}}</textarea>
                                </div>
                                @error('short_description')
                                {{$message}}
                                @enderror
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="long_description" class=" form-control-label">Description</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="long_description" id="long_description" rows="5" placeholder="Content..." class="form-control">{{$result[0]->long_description}}</textarea>
                                </div>
                                @error('long_description')
                                {{$message}}
                                @enderror
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="image" class=" form-control-label">Add Image</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="image" name="image" multiple="" class="form-control-file">
                                </div>
                                @error('image')
                                {{$message}}
                                @enderror
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="post_date" class=" form-control-label">Date</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="date" id="post_date" name="post_date" value="{{$result[0]->post_date}}" class="form-control">
                                </div>
                                @error('post_date')
                                {{$message}}
                                @enderror
                            </div>


                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Update
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>

                        </form>
                        {{-- FORM END HERE --}}


                    </div>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos temporibus fuga, impedit non sequi nesciunt alias cumque labore repellendus corporis error illo sit reiciendis deleniti expedita saepe maiores quam qui.</p>

@endsection



