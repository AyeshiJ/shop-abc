<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>

<body class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('product.index') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="#">Category</a>
                    </li>
                </ul>
                <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <h1>All Categories</h1>

    <a href="{{route('category.create')}}" class="btn btn-success mt-5"><i class="fas fa-plus"></i> Create</a>

<table class="table table-striped mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Name</th>
      {{-- <th scope="col">Action</th> --}}


    </tr>
  </thead>
  <tbody>
    @foreach ($categorys as $category)


    {{-- @foreach ($products as $product) --}}
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->category_name }}</td>
      {{-- <td>
        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary ">Edit</a>
        <form method="POST" action="{{ route('category.destroy', $category->id) }}" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
        </form>
    </td> --}}

    </tr>
    @endforeach
  </tbody>
</table>
</body>
</html>
