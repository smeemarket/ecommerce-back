@extends('layout.master')

@section('content')
  <div class="">
    <a href="{{ route('watch.index') }}" class="btn btn-sm btn-dark">Back</a>
  </div>

  <form action="{{ route('watch.store') }}" class="mt-3" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="">Choose Category</label>
      <select name="category_id" id="" class="form-control">
        @foreach ($category as $c)
          <option value="{{ $c->id }}">{{ $c->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="">Enter Name</label>
      <input type="text" name="name" id="" class="form-control">
    </div>
    <div class="form-group">
      <label for="">Enter Price</label>
      <input type="number" name="price" id="" class="form-control">
    </div>
    <div class="form-group">
      <label for="">Choose Image</label>
      <input type="file" name="image" id="" class="form-control">
    </div>
    <div class="form-group">
      <label for="">Enter Description</label>
      <textarea name="description" class="form-control"></textarea>
    </div>


    <div class="mt-2">
      <input type="submit" value="Create" class="btn btn-sm btn-danger">
    </div>
  </form>
@endsection
