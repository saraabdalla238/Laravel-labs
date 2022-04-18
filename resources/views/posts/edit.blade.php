@extends('layouts.app')
@section('title')edit page @endsection
@section('test')

<form method='POST' action="{{route('posts.update',['post'=>$post->id])}}">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="text" name="title"value="{{$post->title}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <input  name="description"type="text" value="{{$post->description}}" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
  <label class="form-check-label" for="exampleCheck1">Post creator</label>
  <select name='user_id'class="form-select" aria-label="Default select example">
@foreach($users as $user)
<option value="{{$user->id}}">{{$user->name}}</option>
@endforeach
</select>
    
  </div>
  <form method="POST" style="display:inline;"action="{{route('posts.update', ['post' => $post['id']])}}">
  @csrf
@method('put')
<button  type="submit" class="btn btn-primary">Update</button>
  </form>

</form>
@endsection