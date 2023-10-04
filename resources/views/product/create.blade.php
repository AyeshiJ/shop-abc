<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="container">
    <h1>Create Product</h1>
    <a href="{{ route('product.index') }}" class="btn btn-secondary mt-2 btn-sm">Back to Products</a>

    <form method="POST" action="{{ route('product.store') }}">
        @csrf

        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" required>
        </div>

        <div class="form-group">
            <label for="product_description">Product Description</label>
            <textarea class="form-control" id="product_description" name="product_description" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="product_price">Product Price</label>
            <input type="number" class="form-control" id="product_price" name="product_price" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="availability">Availability</label>
            <input type="text" class="form-control" id="availability" name="availability" required>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>

        <div class="form-group">
            <label for="product_category">Product Category</label>
            <select name="product_category" id="product_category" class="form-control" required>
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-5">Create Product</button>
    </form>
</body>
</html>
