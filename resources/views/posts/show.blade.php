@extends('layouts.app')
@section('title')show page @endsection
@section('test')
<form method="POST" >
  <div class="mb-3">
  <p class="fs-1">post info </p>
    <label for="exampleInputEmail1" class="form-label fs-4">title</label>
    <input value="<?php echo e($postview['title']); ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <label for="exampleInputEmail1" class="form-label fs-4">Descrition</label>
    <input value="<?php echo e($postview['description']); ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
  <p class="fs-1">post creator info </p>
   <label for="exampleInputPassword1" class="form-label fs-4">name</label>
    <input value="<?php echo e($userName) ; ?>" type="text" class="form-control" id="exampleInputPassword1"> -->
    <label for="exampleInputPassword1" class="form-label fs-4">Email</label>
    <input value="<?php echo e($userEmail); ?>" type="text" class="form-control" id="exampleInputPassword1">
 <label for="exampleInputEmail1" class="form-label fs-4">created at</label>
    <input value="<?php echo e($postview['created_at']); ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
</form>
@endsection