@extends('admin/layout/layout')

@section('page_title', 'Page Edit')
@section('MainContent')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Page</strong> Edit Here
                    </div>
{{-- @php
      echo "<pre>";
        print_r($result[0]);

        die();
@endphp --}}
                    <div class="card-body card-block">

                        {{-- FORM START HERE --}}
                        <form action="{{url('/admin/page/update/'.$result[0]->id)}}" method="post" class="form-horizontal">

                            {{ csrf_field() }}
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label">Page Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" value="{{$result[0]->name}}" class="form-control">
                                    <small class="form-text text-muted">This is a help text</small>
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="slug" class=" form-control-label">Slug</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="slug" name="slug" value="{{$result[0]->slug}}" class="form-control">
                                    <small class="form-text text-muted">This is a help text</small>
                                </div>
                                @error('slug')
                                {{$message}}
                                @enderror
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="description" class=" form-control-label">Description</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="description" id="description" rows="5" placeholder="Content..." class="form-control">{{$result[0]->description}}</textarea>
                                </div>
                                @error('description')
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



