@extends('layouts.layout')

@section('title')@parent:: {{ $title }} @endsection

@section('header')
    @parent
@endsection

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            @isset($h1)
            {!! mb_strtoupper($h1); !!}
            @endisset
            @{{ varTitle }}
            <br/>

            @if(count($data1) > 20)
                Count > 20
            @elseif(count($data1) < 20)
                Count < 20
            @else
                Count = 20
            @endif

            @production
                <h2>Production</h2>
            @endproduction

            @env('local')
                <h2>Local</h2>
            @endenv

            @for($i = 0; $i < count($data1); $i++)
                {{ $data1[$i] }}
            @endfor

            @foreach($data2 as $k => $v)
                {{ $k }} => {{ $v }}
            @endforeach

            @php
                var_dump($data2);

                echo '<br><b>Авторизация пользователя: ';
                var_dump(\Illuminate\Support\Facades\Auth::check());
                echo '</b><br>';
            @endphp
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $post->title }}</text></svg>
                        <div class="card-body">
                            <p class="card-text">{{ $post->content }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">
                                    {{-- $post->created_at --}}
                                    {{-- \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('d.m.Y') --}}
                                    {{ $post->getPostDate() }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="col-md-12">
                    <h4>Пагинация</h4>
                    <!-- /?test=555 -->
                    {{ $posts->onEachSide(1)->appends(['test' => request()->test])->fragment('foo')->links('vendor.pagination.my-pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>console.log('Home page')</script>
@endsection
