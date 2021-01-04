@extends('layouts.app')

@section('content')
    <section class="page-header mb-none">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home/</a></li>
                <li class="active">{{ $page->name }}</li>
            </ul>
        </div>

    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <div class="blog-posts single-post">

                    <article class="post post-large blog-single-post ml-none">

                        @if(optional($page->getImage())->largePageUrl)
                            <div class="post-image">
                                <div class="img-thumbnail">
                                    <img class="img-responsive" src="{{ optional($page->getImage())->largePageUrl }}" alt="">
                                </div>
                            </div>
                        @endif

                        <div class="post-content">

                            <h2>
                                <a href="javascript:void(0);">{{ $page->title }}</a>
                            </h2>

                            @if(Session::get('applocale')=='ne')
                                {{$page->nepali_content}}
                            @else
                                {!!$page->content!!}
                            @endif

                        </div>
                    </article>

                </div>

            </div>

{{--            <div class="col-md-3">--}}
{{--                @include('blog.sidebar')--}}
{{--            </div>--}}
        </div>
    </div>
@endsection