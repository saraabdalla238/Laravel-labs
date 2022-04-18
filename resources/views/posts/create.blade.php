@extends('layouts.app')
@section('title')create page @endsection
@section('test')

<form method='POST' action='/posts'>
  @csrf
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input name="title" type="text" class="form-control" id="title" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="Description" class="form-label">Description</label>
    <input name="Description"type="text" class="form-control" id="Description">
  </div>
  <div class="mb-3 form-check">
  <label class="form-check-label" for="exampleCheck1">Post creator</label>
  <select name='user_id'class="form-select" aria-label="Default select example">
@foreach($users as $user)
<option value="{{$user->id}}">{{$user->name}}</option>
@endforeach
</select>
    
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection