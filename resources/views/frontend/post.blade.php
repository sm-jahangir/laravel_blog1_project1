
@extends('frontend/layout/layout')

@section('page_title', 'This is Post page')

@section('FrontendContent')
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('{{asset('frontend_assets')}}/img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{{$result[0]->title}}</h1>
            <h2 class="subheading">{{$result[0]->short_description}}</h2>
            <span class="meta">Posted by
              <a href="#">Start Bootstrap</a>
              on {{$result[0]->post_date}}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p>{{$result[0]->long_description}}</p>
        </div>
      </div>
    </div>
  </article>

@endsection
