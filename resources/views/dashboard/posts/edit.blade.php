@extends('layouts.dashboard')

@section('additional-styles')
<style>
    .control-label {
            font-size: 17px;
            font-weight: 700;
            width: 15%;
    } 
    .form-group {
        display: flex;
        margin-bottom: 2rem;
    }
    .form-control-file, .form-control-range {
        margin-top: 2%;
    }
    .edit-image {
        width: 100%;
    }
    .image-size{
        max-width: 300px;
    }
    .datepicker.dropdown-menu {
        top: 26% !important; 
    }
    .select2-container {
        width: 100% !important;
    }

    @media (max-width: 1199.98px) { 
       .control-label {
            font-size: 15px;
            font-weight: 700;
            width: 15%;
        } 
    }
    @media (max-width: 991.98px) {
        .control-label {
            font-size: 15px;
            font-weight: 700;
            width: 20%;
        } 
    }

    @media (max-width: 767.98px) {
        .control-label {
            font-size: 13px;
            font-weight: 700;
            width: 25%;
        } 
    }
</style>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker.css') }}">
@endsection

@section('content')
    <div class="app-title">
        <h1>Add new Book</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="{{ route('posts.update', $post->isbn_no) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group">
                            <label class="control-label">Book Name</label>
                            <input type="text" name="book_name" class="form-control" value="{{ $post->book_name}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Book Image</label>
                            <div class="edit-image">
                                <img src="{{ asset('storage/media/'.$post->book_cover)}}" class="image-size">
                                <input type="file" name="book_image" class="form-control-file">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Author</label>
                            <input type="text" name="author" class="form-control" value="{{ $post->author}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">ISBN</label>
                            <input type="text" name="isbn_no" class="form-control" value="{{ $post->isbn_no}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Format</label>
                            <input type="text" name="isbn13_no" class="form-control" value="{{ $post->format}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Category</label>
                            <select class="form-control selectCategory"  name="category_name">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_name }}" {{ $post->category_id === $category->id ? 'selected': '' }}>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Publication Date</label>
                            <input type="text" name="publication_date" class="form-control pull-right" id="datepicker" value="{{ $post->publication_date}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Language</label>
                            <input type="text" name="language" class="form-control" value="{{ $post->language}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Publisher</label>
                            <input type="text" name="publisher" class="form-control" value="{{ $post->publisher}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Price</label>
                            <input type="text" name="book_price" class="form-control" value="{{ $post->book_price}}">
                        </div>
                        <div class="form-group">
                            <label  class="control-label">Stock</label>
                            <input type="number" name="stock" class="form-control" value="{{ $post->stock}}">
                        </div>
                        <div class="tile-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additional-scripts')
    <script src="{{ asset('js/plugins/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            })
        });
    </script>
    <script type="text/javascript" src="{{ asset('js/plugins/select2.min.js') }}"></script>
    <script>
        $('.selectCategory').select2();
    </script>
@endsection