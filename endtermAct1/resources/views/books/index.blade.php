<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: #fff;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .add-btn {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 12px;
            background-color: #3490dc;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .add-btn:hover {
            background-color: #2779bd;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        .book-info {
            margin-bottom: 8px;
        }

        .actions a,
        .actions button {
            margin-right: 10px;
            font-size: 14px;
        }

        .edit-btn {
            color: #38c172;
            text-decoration: none;
        }

        .delete-btn {
            background: #e3342f;
            color: #fff;
            border: none;
            padding: 5px 8px;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background: #cc1f1a;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>All Books</h1>

    <a href="{{ route('books.create') }}" class="add-btn">+ Add New Book</a>

    <ul>
        @foreach ($books as $book)
        <li>
            <div class="book-info">
                <strong>{{ $book->title }}</strong><br>
                by {{ $book->author }} ({{ $book->published_date }})
            </div>

            <div class="actions">
                <a href="{{ route('books.edit', $book->id) }}" class="edit-btn">Edit</a>

                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn">Delete</button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>
</div>

</body>
</html>