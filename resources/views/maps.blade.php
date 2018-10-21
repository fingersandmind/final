@extends('layout')

@section ('head')

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">


@endsection

@section('content')
    @include('layouts.sidebar')
        <div class="row">
            <div class="page-wrapper">
                <div class="container-fluid">

                    <div class="row page-titles">
                        <div class="col-md-5 align-self-center">
                            <h3 class="text-themecolor">Map</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active">Map</li>
                            </ol>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col lg-20">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.805991419629!2d123.97403231454712!3d9.950093992885387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aa2587950df6f7%3A0xad4f0f3e2399e9d4!2sMater+Dei+College!5e0!3m2!1sen!2sph!4v1539976834221" 
                                width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

@endsection