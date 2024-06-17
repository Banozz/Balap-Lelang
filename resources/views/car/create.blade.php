<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1>Create Car</h1>
    <form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
        @csrf   
        <div class="mb-3">
            <label for="brand" class="form-label">Brand Name</label>
            <input type="text" class="form-control" id="Brand" name="Brand" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Car Name</label>
            <input type="text" class="form-control" id="Name" name="Name" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Car Price</label>
            <input type="number" class="form-control" id="Price" name="Price" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Car Description</label>
            <textarea class="form-control" id="Description" name="Description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Car Location</label>
            <input type="text" class="form-control" id="Location" name="Location" required>
        </div>
        <div class="mb-3">
            <label for="image_car" class="form-label">Car Image</label>
            <input type="file" class="form-control" id="Image_Car" name="Image_Car" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qmF3PuhMXtF4zEuwcGHJZbRuc8uCM2fH7zTD3rj4xGtbAb51blxG7Uu6p6k0Z9sP" crossorigin="anonymous"></script>
</body>
</html>
