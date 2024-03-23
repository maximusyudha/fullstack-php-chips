<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Item Details</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $item->title }}</h5>
                <p class="card-text">{{ $item->description }}</p>
                <p class="card-text">{{ $item->category }}</p>
                {{-- <p class="card-text">{{ $item->content }}</p> --}}
                <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid" alt="{{ $item->title }}">
            </div>
        </div>
    </div>
</body>
</html>
