<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ecommerce Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="p-5">
      <div class="row">
        <div class="col-md-3">
          <ul class="list-group">
            <a href="{{ route('category.index') }}">
              <li class="list-group-item">
                Category
              </li>
            </a>
            <a href="{{ route('watch.index') }}">
              <li class="list-group-item">
                Product
              </li>
            </a>
            <li class="list-group-item">
              Order
            </li>
            <a href="{{ url('admin/logout') }}">
              <li class="list-group-item">
                Logout
              </li>
            </a>
          </ul>
        </div>
        <div class="col-md-9">
          <div class="card p-3">
            @if (session()->has('success'))
              <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            @if (session()->has('error'))
              <div class="alert alert-danger">{{ session()->get('error') }}</div>
            @endif
            @if ($errors->all())
              @foreach ($errors->all() as $e)
                <div class="alert alert-warning">{{ $e }}</div>
              @endforeach
            @endif
            @yield('content')
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
