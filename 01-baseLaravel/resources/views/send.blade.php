@extends('layouts.layout')

@section('title')@parent:: Test send mail @endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="mt-5 alert alert-success">
            <h3>Письмо отправлено!</h3>
        </div>
    </div>
@endsection
