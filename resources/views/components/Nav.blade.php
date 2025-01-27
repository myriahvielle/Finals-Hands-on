<nav class="navbar">
    <div class="nav-content">
        <!-- Brand/Logo -->
        <div class="nav-brand">
            Finals Hands On
        </div>

        <!-- Navigation Links -->
        
        <a href="/" class="nav-link">Home</a>

        <!-- User Posts Link -->
        <div class="nav-user">
            <a href="/userposts/{{ Auth::user()->id }}">{{ Auth::user()->name }}'s Posts</a>
        
        </div>

        <!-- Logout Button -->
        <form action="/logout" method="Post" class="nav-logout">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</nav>

<style>
    .navbar {
        background-color: white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        padding: 1rem;
    }

    .nav-content {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .nav-link {
        text-decoration: none;
        color: #333;
    }

    .nav-link:hover {
        color: #666;
    }

    .logout-btn {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        cursor: pointer;
    }

    .logout-btn:hover {
        background-color: #c82333;
    }
</style>
