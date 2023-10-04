<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="container mt-5">
    <h1>Update Product</h1>
    <form class="mt-5" action="{{ route('product.update', $product->id) }}" method="POST">
        @method('PUT')
        @csrf

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}" placeholder="Enter product name">
        </div>

        <div class="form-group">
            <label for="product_category">Product Category</label>
            <select name="product_category" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->product_category == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="product_description">Product Description</label>
            <input type="text" class="form-control" name="product_description" value="{{ $product->product_description }}" placeholder="Enter product description">
        </div>

        <div class="form-group">
            <label for="product_price">Product Price</label>
            <input type="number" class="form-control" name="product_price" value="{{ $product->product_price }}" placeholder="Enter product price">
        </div>

        <div class="form-group">
            <label for="availability">Availability</label>
            <input type="text" class="form-control" name="availability" value="{{ $product->availability }}" placeholder="Enter availability">
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" name="quantity" value="{{ $product->quantity }}" placeholder="Enter quantity">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</body>
</html>
