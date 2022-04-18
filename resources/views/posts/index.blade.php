@extends('layouts.app')
@section('title')index page @endsection
@section('test')
<a href="{{route('posts.create')}}" class="text-center btn btn-success" style="margin-left:600px">Create posts</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">posted by</th>
      <th scope="col">created at </th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($allposts as $post )
    <tr>
      <th scope="row">{{$post['id']}}</th>
      <td>{{$post['title']}}</td>
      <td>{{$post->user ? $post->user->name :"not found"}}</td>
      <td>{{$post['created_at']}}</td>
      <td>
      <a href="{{route('posts.edit', ['post' => $post['id']])}}" class="btn btn-warning">Edit</a>
<a href="{{route('posts.show', ['post' => $post['id']])}}"  class="btn btn-success">View</a>
<form style="display:inline;" method="POST" action="{{route('posts.destroy',['post'=>$post->id])}}">
@csrf
@method('delete')
<button type="submit" class="btn btn-danger">Delete</button>

</form>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-center">
            {!! $allposts->links() !!}
        </div>
@endsection