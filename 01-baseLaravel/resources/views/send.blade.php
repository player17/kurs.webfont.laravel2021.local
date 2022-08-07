@extends('layouts.layout')

@section('title')@parent:: Test send mail @endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="mt-5">
            <form method="post" action="{{ route('testmail') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Your name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="text">Your message</label>
                    <textarea class="form-control" id="text" rows="5" name="text"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
@endsection
