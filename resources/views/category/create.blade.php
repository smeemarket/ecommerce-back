@extends('layout.master')

@section('content')
  <div class="">
    <a href="{{ route('category.index') }}" class="btn btn-sm btn-dark">Back</a>
  </div>

  <form action="{{ route('category.store') }}" class="mt-3" method="POST">
    @csrf
    <div class="form-group">
      <label for="">Enter Category</label>
      <input type="text" class="form-control" name="name">
    </div>
    <div class="mt-2">
      <input type="submit" value="Create" class="btn btn-sm btn-danger">
    </div>
  </form>
@endsection
