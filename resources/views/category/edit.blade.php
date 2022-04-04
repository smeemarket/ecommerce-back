@extends('layout.master')

@section('content')
  <div class="">
    <a href="{{ route('category.index') }}" class="btn btn-sm btn-dark">Back</a>
  </div>

  <form action="{{ route('category.update',$category->id) }}" class="mt-3" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="">Enter Category</label>
      <input type="text" name="name" value='{{ $category->name }}' class="from-control">
    </div>
    <div class="mt-2">
      <input type="submit" value="Update" class="btn btn-sm btn-danger">
    </div>
  </form>
@endsection
