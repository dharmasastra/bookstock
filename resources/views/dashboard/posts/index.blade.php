@extends('layouts.dashboard')

@section('additional-styles')
    <style>
        .image-container {
            width: 350px;
            text-align: center;
        }
        .image-size{
            max-width: 300px;
            margin-top: 8px;
        }
    </style>
@endsection
@section('content')
    <div class="app-title">
        <h1>Detail Book</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row">
                        <div class="image-container">
                            <img src="{{ asset('storage/media/'.$post->book_cover)}}" class="image-size">
                        </div>
                        <div class="col-lg-8">
                            <div class="page-header">
                                <h2>{{ $post->book_name }}</h2>
                                <span>Oleh {{ $post->author }}</span>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 text-left">
                                    <p>Price</p>
                                    <p>Format</p>
                                    <p>ISBN</p>
                                    <p>Tanggal Terbit</p>
                                    <p>Lenguage</p>
                                    <p>Publisher</p>
                                    <p>Stock</p>
                                </div>
                                <div class="col-sm-1 text-center">
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                    
                                </div>
                                <div class="col-sm-4 text-left">
                                    <p>{{$post->book_price}}</p>
                                    <p>{{$post->format}}</p>
                                    <p>{{$post->isbn_no}}</p>
                                    <p>{{$post->publication_date}}</p>
                                    <p>{{$post->language}}</p>
                                    <p>{{$post->publisher}}</p>
                                    <p>{{$post->stock}}</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection