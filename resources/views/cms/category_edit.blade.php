@extends('cms.cms_master')

@section ('cms_content')
@include('utils.cms_header',['title'=>'Edit Category'])
<div class="row">
    <div class="col-md-6 mb-5">
        <form action="{{ url('cms/categories/'.$item['id']) }}" method="POST" novalidate autocomplete="off" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <input type="hidden" name="item_id" value="{{ $item['id'] }}">
            <div class="form-group">
                <label for="title">* title</label>
                <input class="form-control origin-text" type="text" name="title" id="title" value="{{ $item['ctitle'] }}">
                <span class="text-danger">{{ $errors->first('title') }}</span>
            </div>
            <div class="form-group">
                <label for="url">* Url</label>
                <input class="form-control target-text" type="text" name="url" id="url" value="{{ $item['curl'] }}">
                <span class="text-danger">{{ $errors->first('url') }}</span>
            </div>
            <div class="form-group">
                <label for="article">* Article</label>
                <textarea class="form-control" name="article" id="article" cols="30" rows="10">{{ $item['carticle'] }}</textarea>
                <span class="text-danger">{{ $errors->first('article') }}</span>
            </div>
            <div class="form-group">
                <p>
                <img src="{{asset('images/'.$item['cimage'])}}" width="150" class="img-thumbnail">
                </p>
            </div>
            <div class="form-group">
                <label for="image">Change Category Image</label>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input name="image" type="file" class="custom-file-input" id="image" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                <span class="text-danger">{{ $errors->first('image') }}</span>
            </div>        
            <input type="submit" value="Update Category" class="btn btn-primary" name="submit">
            <a href="{{ url('cms/categories') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection