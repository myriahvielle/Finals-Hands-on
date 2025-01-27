@vite(['resources/css/app.css'])
@include('components.nav')

<div class="update-container">
    <div class="update-card">
        <h2>Edit Post</h2>
        
        <form action="/update/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Title</label>
                <input
                    type="text"
                    name="title"
                    value="{{ $post->title }}"
                />
            </div>

            <div class="form-group">
                <label>Content</label>
                <textarea
                    name="body"
                    rows="6"
                >{{ $post->body }}</textarea>
            </div>

            <div class="button-group">
                <button type="submit">Save</button>
                <a href="/">Cancel</a>
            </div>
        </form>
    </div>
</div>

<style>
    .update-container {
        padding: 20px;
        max-width: 600px;
        margin: 0 auto;
    }

    .update-card {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    h2 {
        margin-bottom: 20px;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #555;
    }

    input, textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    textarea {
        min-height: 120px;
    }

    .button-group {
        display: flex;
        gap: 10px;
    }

    button, a {
        padding: 8px 16px;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }

    button {
        background: #4a90e2;
        color: white;
        border: none;
    }

    a {
        background: #ddd;
        color: #333;
    }

    button:hover {
        background: #357abd;
    }

    a:hover {
        background: #ccc;
    }
</style>
