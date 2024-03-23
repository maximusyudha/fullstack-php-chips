<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color: #f8f9fa;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="home" style="color: #fff;">
                <img src="{{ asset('admin/images/logo1.png') }}" width="80" alt="Logo" style="margin-right: 10px;"> Penaroom
            </a>

        <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('items.filter') }}">
    <select class="form-control mr-sm-2" name="category">
        <option value="">All Categories</option>
        <option value="Artikel">Artikel</option>
        <option value="Essai">Essai</option>
        <option value="Puisi">Puisi</option>
        <option value="Novel">Novel</option>
    </select>
    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Filter</button>
</form>

        </div>
    </nav>

    <!-- Page Content -->
    <div class="container" style="padding-top: 200px;">
        <div class="row">
            <div class="col-md-15">
                <div class="card" style="margin-bottom: 20px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    <div class="card-header" style="background-color: #007bff; color: #fff;">
                        @if(isset($category))
                            Items in Category: {{ $category }}
                        @else
                            Latest Items
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="vertical-align: middle;">ID</th>
                                    <th style="vertical-align: middle;">Title</th>
                                    {{-- <th style="vertical-align: middle;">Content</th> --}}
                                    <th style="vertical-align: middle;">Description</th>
                                    <th style="vertical-align: middle;">Category</th>
                                    <th style="vertical-align: middle;">Image</th>
                                    <th style="vertical-align: middle;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sample Item -->
                                <!-- Inside the foreach loop -->
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ substr($item->description, 0, 50) }}{{ strlen($item->description) > 50 ? "..." : "" }}</td>
                                        <td>{{ $item->category }}</td>
                                        <td>
                                            @if($item->image)
                                                <img src="{{ asset('images/' . $item->image) }}" alt="Item Image" style="max-width: 100px;">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-primary" style="background-color: #007bff; border-color: #007bff;">Edit</a>
                                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" style="background-color: #dc3545; border-color: #dc3545;" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- End Sample Item -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="margin-bottom: 20px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    <div class="card-header" style="background-color: #007bff; color: #fff;">
                        Quick Links
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{ route('items.create') }}" style="color: inherit;">Add New Item</a></li>
                            <!-- Additional Quick Links -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
