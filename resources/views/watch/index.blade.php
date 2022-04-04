@extends('layout.master')

@section('content')
  <div class="">
    <a href="{{ route('watch.create') }}" class="btn btn-sm btn-success">Create</a>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Option</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($watch as $c)
        <tr>
          <td>
            <img src="{{ asset('images/' . $c->image) }}" width="100px" alt="" class="img-thumbnail">
          </td>
          <td>{{ $c->name }}</td>
          <td>{{ $c->price }}</td>
          <td>{{ $c->description }}</td>
          <td>
            <a href="{{ route('watch.edit', $c->id) }}" class="btn btn-sm btn-primary">Edit</a>
            <form action="{{ route('watch.destroy', $c->id) }}" class="d-inline" method="POST"
              onsubmit="return confirm('sure?')">
              @csrf
              @method('DELETE')
              <input type="submit" value="Delete" class="btn btn-sm btn-danger">
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $watch->links() }}
@endsection
