@extends('frontend/layout/layout')

@section('page_title', 'This is home page')

@section('FrontendContent')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('frontend_assets') }}/img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                @foreach ($result as $list)
                <div class="post-preview">
                    <a href="{{url('post/'.$list->id)}}">
                        <h2 class="post-title">
                           {{$list->title}}
                        </h2>
                        <h3 class="post-subtitle">
                          {{$list->short_description}}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#">Start Bootstrap</a>
                        on {{$list->post_date}}
                    </p>
                </div>
                <hr>

                @endforeach



                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
                </div>
            </div>
        </div>
    </div>

@endsection
