@extends('layouts.layout')

@section('title')@parent:: {{ $title }} @endsection

@section('content')

    <div class="container">

        <form class="mt-5" method="post" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror id="title" placeholder="Title" name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="3" name="content" placeholder="Content">{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="rubric_id">Rubric</label>
                <select class="form-control @error('rubric_my_id') is-invalid @enderror" id="rubric_my_id" name="rubric_my_id">
                    <option>Select rubric</option>
                    @foreach($rubrics as $k => $v)
                        @if(old('rubric_my_id') == $k)
                            <option selected value="{{ $k }}">{{ $v }}</option>
                        @else
                            <option value="{{ $k }}">{{ $v }}</option>
                        @endif
                    @endforeach
                </select>
                @error('rubric_my_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection

@section('scripts')
    <script>console.log('Create post page')</script>
@endsection
