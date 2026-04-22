<!DOCTYPE html>
<html>
<head>
    <title>Laravel Image Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8fafc;
            margin: 0;
            padding: 20px;
        }

        h1, h2 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="file"] {
            margin: 10px 0;
        }

        button {
            padding: 6px 12px;
            background: #3490dc;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background: #2779bd;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
        }

        .photo-card {
            border: 1px solid #ddd;
            padding: 10px;
            width: 180px;
            background: white;
            text-align: center;
        }

        .photo-card img {
            width: 100%;
            height: 140px;
            object-fit: cover;
        }

        .photo-card a {
            font-size: 14px;
            color: #3490dc;
            text-decoration: none;
        }

        .photo-card a:hover {
            text-decoration: underline;
        }

        .delete-btn {
            color: red;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .success {
            color: green;
            margin-bottom: 10px;
        }

        .pagination {
            margin-top: 20px;
        }
    </style>
</head>

<body>
<div class="container">

<p>Asunio, Jiel Mayer L.</p>

<h1>Single Image Upload</h1>
<form action="{{ route('photos.store.single') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" required>
    <br>
    <button type="submit">Upload</button>
</form>

<h1>Multiple Images Upload</h1>
<form action="{{ route('photos.store.multiple') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="images[]" multiple required>
    <br>
    <button type="submit">Upload</button>
</form>

@if(session('success'))
    <p class="success">{{ session('success') }}</p>
@endif

<hr>

<h2>Photo Gallery</h2>

<div class="gallery">
    @forelse($photos as $photo)
        <div class="photo-card">
            <img src="{{ asset('images/' . $photo->image) }}" alt="Image">
            <div>
                <a href="{{ asset('images/' . $photo->image) }}" target="_blank">View</a> |
                <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <p>No photos uploaded yet.</p>
    @endforelse
</div>

<div class="pagination">
    {{ $photos->links() }}
</div>

</div>
</body>
</html>