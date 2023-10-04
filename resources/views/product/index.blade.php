<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
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
                        <a class="navbar-brand" href="#">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('category.index') }}">Category</a>
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
    <h1>All Products</h1>
    <a href="{{route('product.create')}}" class="btn btn-success mt-5"><i class="fas fa-plus"></i> Create</a>

<table class="table table-striped mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Category</th>
      <th scope="col">Product Description</th>
      <th scope="col">Product Price</th>
      <th scope="col">Availability</th>
      <th scope="col">Quantity</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>
    @foreach ($products as $product)


    <tr>
      <th scope="row">{{$product->id}}</th>
      <td scope="row">{{$product->product_name}}</td>
      <td>{{ $product->category->category_name }}</td>
      <td scope="row">{{$product->product_description}}</td>
      <td scope="row">{{$product->product_price}}</td>
      <td scope="row">{{$product->availability}}</td>
      <td scope="row">{{$product->quantity}}</td>
      <td>
        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
        <form method="POST" action="{{ route('product.destroy', $product->id) }}" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-2" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
        </form>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
</body>
</html>
