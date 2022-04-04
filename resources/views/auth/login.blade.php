<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-4 offset-md-y">
        <div class="card">
          <div class="card-header bg-dark text-white h3 text-center">
            Admin Login
          </div>
          <div class="card-body">
            <form action="{{ url('admin/login') }}" method="POST">
              @csrf
              <div class="form-group my-2">
                <label for="">Enter Email</label>
                <input type="email" name="email" class="form-control">
              </div>
              <div class="form-group my-2">
                <label for="">Enter Password</label>
                <input type="password" name="password" class="form-control">
              </div>
              <input type="submit" value="Login" class="btn btn-danger">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
