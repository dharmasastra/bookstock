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
@endsection

@section('content')
    <div class="app-title">
        <h1>Edit Category</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="{{ route('categories.update', $category->id )}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group">
                            <label class="control-label">Category Name</label>
                            <input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}">
                        </div>
                        <div class="tile-footer">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection