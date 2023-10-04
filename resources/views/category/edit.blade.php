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
<body class="container">
    <form class="mt-5" action="{{route('category.update',$category->id)}}" method="POST">
        @method('PUT')
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
          <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}" placeholder="Enter category name">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
      </form>
</body>
</html>
