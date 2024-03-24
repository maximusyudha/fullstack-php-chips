<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $item->title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .item-container {
            padding: 20px;
            margin-top: 20px;
        }
        .item-image {
            max-width: 100%;
            height: auto;
            margin: 0 auto;
            display: block;
            margin-top: 100px;
            margin-bottom: 100px;
            border-radius: 5px;
        }

        /* Style untuk komentar */
        .comments {
            margin-top: 50px;
        }

        .comment {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }

        .comment p {
            margin-bottom: 5px;
        }

        .comment p:last-child {
            margin-bottom: 0;
        }

        .comment p strong {
            font-weight: bold;
        }

        .comment textarea {
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
        }

        .comment button {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Penaroom</a>
            <a class="btn btn-primary ml-auto" href="/home">Back to Home</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="item-container">
            <h1>{{ $item->title }}</h1>
            <img src="{{ asset('images/' . $item->image) }}" class="item-image" alt="{{ $item->title }}">
            <p>{{ $item->description }}</p>
            <p><strong>Category:</strong> {{ $item->category }}</p>
        </div>
    </div>

    <!-- Di bawah konten item -->
    <div class="container comments">
    <h2>Comments</h2>
    @if ($item->comments->isNotEmpty())
        @foreach($item->comments as $comment)
            <div class="comment">
                <p><strong>{{ $comment->user->name }}</strong> said:</p>
                <p>{{ $comment->content }}</p>
                <div class="comment-actions">
                    @if(auth()->user()->hasRole('admin') || auth()->id() == $comment->user_id)
                        <form action="{{ route('comments.destroy', ['comment' => $comment->id] ) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this comment?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    @else
        <p>No comments yet.</p>
    @endif

    <!-- Form to add comments -->
    <form action="{{ route('comments.store', ['item' => $item->id]) }}" method="post">
        @csrf
        <input type="hidden" name="item_id" value="{{ $item->id }}">
        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
        <textarea class="form-control" name="content" rows="3" placeholder="Add your comment here"></textarea>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>


    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
