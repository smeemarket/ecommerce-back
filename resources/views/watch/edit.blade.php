@extends('layout.master')

@section('content')
  <div class="">
    <a href="{{ route('watch.index') }}" class="btn btn-sm btn-dark">Back</a>
  </div>

  <form action="{{ route('watch.update',$watch->id) }}" class="mt-3" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="">Choose Category</label>
      <select name="category_id" id="" class="form-control">
        @foreach ($category as $c)
          <option value="{{ $c->id }}" @if ($c->id == $watch->category_id)
            selected
        @endif
        >{{ $c->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="">Enter Name</label>
      <input type="text" name="name" value="{{ $watch->name }}" class="form-control">
    </div>
    <div class="form-group">
      <label for="">Enter Price</label>
      <input type="number" name="price" value="{{ $watch->price }}" class="form-control">
    </div>
    <div class="form-group">
      <label for="">Choose Image</label>
      <input type="file" name="image" id="" class="form-control">
      <img src="{{ asset('images/' . $watch->image) }}" width="150px" alt="">
    </div>
    <div class="form-group">
      <label for="">Enter Description</label>
      <textarea name="description" class="form-control">{{ $watch->description }}</textarea>
    </div>


    <div class="mt-2">
      <input type="submit" value="Update" class="btn btn-sm btn-danger">
    </div>
  </form>
@endsection
