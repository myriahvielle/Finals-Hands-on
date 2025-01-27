@vite(['resources/css/app.css'])

<div class="post-card">
    <!-- User Info Section -->
    <div class="post-header">
        <div class="user-info">
            <div class="user-name">
                <a href="/userposts/{{ $post->user->id }}">{{ $post->user->name }}</a>
            </div>
            <div class="user-email">{{ $post->user->email }}</div>
        </div>
    </div>

    <!-- Post Content Section -->
    <div class="post-content">
        <div class="post-title">
            <a href="/read/{{ $post->id }}">{{ $post->title }}</a>
        </div>
        <div class="post-body">
            {{ $post->body }}
        </div>
    </div>

    <!-- Actions Section -->
    @if ($post->user->name == Auth::user()->name)
        <div class="post-actions">
            <a href="/edit/{{ $post->id }}" class="edit-btn">Edit</a>
            
            <form action="/delete/{{ $post->id }}" method="POST" class="delete-form">
                @csrf 
                @method('DELETE')
                <button type="submit" class="delete-btn">Delete</button>
            </form>
        </div>
    @endif
</div>

<style>
    .post-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin: 16px auto;
        max-width: 600px;
        overflow: hidden;
    }

    .post-header {
        padding: 16px;
        border-bottom: 1px solid #eee;
    }

    .user-info {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .user-name a {
        color: #2c3e50;
        font-weight: bold;
        text-decoration: none;
    }

    .user-name a:hover {
        text-decoration: underline;
    }

    .user-email {
        color: #666;
        font-size: 0.9em;
    }

    .post-content {
        padding: 16px;
    }

    .post-title {
        margin-bottom: 12px;
    }

    .post-title a {
        color: #2c3e50;
        font-size: 1.2em;
        font-weight: bold;
        text-decoration: none;
    }

    .post-title a:hover {
        text-decoration: underline;
    }

    .post-body {
        color: #444;
        line-height: 1.5;
    }

    .post-actions {
        padding: 16px;
        border-top: 1px solid #eee;
        display: flex;
        gap: 12px;
    }

    .edit-btn, .delete-btn {
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 0.9em;
        cursor: pointer;
        border: none;
    }

    .edit-btn {
        background-color: #3498db;
        color: white;
        text-decoration: none;
    }

    .edit-btn:hover {
        background-color: #2980b9;
    }

    .delete-btn {
        background-color: #e74c3c;
        color: white;
    }

    .delete-btn:hover {
        background-color: #c0392b;
    }

    .delete-form {
        margin: 0;
    }
</style>
