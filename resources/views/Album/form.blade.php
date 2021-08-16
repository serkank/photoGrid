@extends('Album.layout')
@section('backlink')
|<a href="{{ route('photo.get') }}" class="btn">Photo List</a>
@endsection
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <strong>{{ $message }}</strong>
</div>
<img src="images/{{ Session::get('image') }}">
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('photo.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-md-6 mesafe10">
            <input type="file" name="image" class="form-control">
        </div>

    </div>
    <div class="row">

        <div class="col-md-6 mesafe10">
            <input type="text" name="linktag" class="form-control" placeholder="tag,tag,tag">
        </div>

    </div>
    <div class="row">
        
        <p class="mesafe20">
            <ul class="list-unstyled">
                <li>jpeg,png,jpg,gif,svg</li>
                <li>max 2mb</li>
            </ul>
        </p>

    </div>
    <div class="row">
    	
        <div class="col-md-6 mesafe10">
            <button type="submit" class="btn btn-success">Upload</button>  <a href="{{ route('photo.get') }}" class="btn">Photo List</a>
        </div>

    </div>
</form>
@endsection