@extends('layout.master')

@section('content')
  <div class="">
    <a href="{{ route('category.create') }}" class="btn btn-sm btn-success">Create</a>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Option</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($category as $c)
        <tr>
          <td>{{ $c->name }}</td>
          <td>
            <a href="{{ route('category.edit', $c->id) }}" class="btn btn-sm btn-primary">Edit</a>
            <form action="{{ route('category.destroy', $c->id) }}" class="d-inline" method="POST"
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
  {{ $category->links() }}
@endsection
