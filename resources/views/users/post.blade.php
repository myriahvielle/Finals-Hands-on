<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css'])
    
    <style>
        .post-card {
            transition: transform 0.2s, box-shadow 0.2s;
            border: none;
            border-radius: 10px;
        }
        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .post-header {
            background: #2c3e50;
            color: white;
            padding: 20px;
            border-radius: 10px 10px 0 0;
        }
        .post-content {
            padding: 20px;
        }
        .post-footer {
            padding: 15px 20px;
            background: #f8f9fa;
            border-radius: 0 0 10px 10px;
        }
        .back-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }
    </style>
</head>
<body class="bg-light">
    @include('components.nav')
    
    <div class="container py-4">
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">
                        <i class="bi bi-person-circle me-2"></i>
                        {{ $userPosts->first()->user->name ?? 'User' }}'s Posts
                    </h2>
                    <span class="badge bg-primary">
                        {{ $userPosts->count() }} {{ Str::plural('Post', $userPosts->count()) }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Posts Grid -->
        <div class="row g-4">
            @forelse ($userPosts as $post)
                <div class="col-12">
                    <div class="card post-card">
                        <div class="post-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">{{ $post->title }}</h4>
                                <div class="d-flex gap-2">
                                    @if(Auth::id() === $post->user_id)
                                        <a href="{{ route('Edit', $post) }}" class="btn btn-sm btn-light">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('Delete', $post) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('Are you sure you want to delete this post?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="post-content">
                            <p class="mb-0">{{ $post->content }}</p>
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" 
                                     class="img-fluid rounded mt-3" 
                                     alt="Post image">
                            @endif
                        </div>

                        <div class="post-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="bi bi-clock me-1"></i>
                                    Posted {{ $post->created_at->diffForHumans() }}
                                </small>
                                <div class="d-flex gap-3 align-items-center">
                                    <span class="text-muted">
                                        <i class="bi bi-chat me-1"></i>
                                        0 Comments
                                    </span>
                                    <span class="text-muted">
                                        <i class="bi bi-heart me-1"></i>
                                        0 Likes
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle me-2"></i>
                        No posts found for this user.
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination if needed -->
        @if($userPosts->hasPages())
            <div class="mt-4">
                {{ $userPosts->links() }}
            </div>
        @endif
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
