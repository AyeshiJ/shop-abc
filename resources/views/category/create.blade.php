<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ABC Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body class="container mt-5">
    <h1>Add New Category</h1>
    <a href="{{ route('category.index') }}" class="btn btn-secondary mt-2 btn-sm">Back to Categories</a>

    <form class="mt-5" action="{{route('category.store')}}" method="POST">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

        @endif
        <div class="form-group">
          <label for="category">Category Name</label>
          <input type="text" class="form-control" name="category_name" placeholder="Enter category name">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
      </form>
</body>
</html>
