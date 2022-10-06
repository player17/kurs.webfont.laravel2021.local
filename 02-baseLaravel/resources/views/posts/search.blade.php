@extends('layouts.category_layout')

@section('title', 'Страница поиска :: Search')

@section('page-title')
    <div class="page-title db">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2>Поиск :: {{ $s }}</h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Результат поиска: {{ $s }}</li>
                    </ol>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="blog-custom-build">

            @if($posts->count())
                @foreach($posts as $post)
                    <div class="blog-box wow fadeIn">
                        <div class="post-media">
                            <!-- Генерация ччылки на статью с использованием slug  -->
                            <a href="{{ route('posts.single', ['slug' => $post->slug]) }}" title="">
                                <!-- Обращение к методу модели  -->
                                <img src="{{ $post->getImage() }}" alt="" class="img-fluid">
                                <div class="hovereffect">
                                    <span></span>
                                </div>
                                <!-- end hover -->
                            </a>
                        </div>
                        <!-- end media -->
                        <div class="blog-meta big-meta text-center">
                            <div class="post-sharing">
                                <ul class="list-inline">
                                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i>
                                            <span
                                                class="down-mobile">Share on Facebook</span></a></li>
                                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i>
                                            <span
                                                class="down-mobile">Tweet on Twitter</span></a></li>
                                    <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                </ul>
                            </div><!-- end post-sharing -->

                            <h4><a href="{{ route('posts.single', ['slug' => $post->slug]) }}"
                                   title="">{{ $post->title }}</a></h4>
                            <!-- Рендер данных вместе с тегами  -->
                            <div class="desc-artical">
                                {!! $post->description !!}
                            </div>
                            <!-- Вывод название категории через связь  -->
                            <small><a href="{{ route('categories.single', ['slug' => $post->category->slug]) }}"
                                      title="">{{ $post->category->title }}</a></small>
                            <small>{{ $post->getPostDate() }}</small>
                            <small><i class="fa fa-eye"></i> {{ $post->views }}</small>
                        </div><!-- end meta -->
                    </div><!-- end blog-box -->

                    <hr class="invis">
                @endforeach
            @else
                <p>По запросу: {{ $s }} - ничего не найдено</p>
            @endif
        </div>
    </div>

    <hr class="invis">

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation">
                <!-- select * from `posts` where `title` LIKE '%а%' limit 2 offset 6 -->
                {{ $posts->appends(['s' => request()->s])->links() }}
            </nav>
        </div><!-- end col -->
    </div>

@endsection
