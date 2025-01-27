<div class="create-post-container">
    <form class="create-post-form" action="/create" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input
                type="text"
                name="title"
                placeholder="Enter title"
                class="form-input"
            />
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea
                rows="5"
                name="body"
                placeholder="Enter your content"
                class="form-input"
            ></textarea>
        </div>

        <button type="submit" class="submit-btn">
            Post
        </button>
    </form>
</div>

<style>
    .create-post-container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .create-post-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .form-group label {
        font-weight: 500;
        color: #333;
    }

    .form-input {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }

    .form-input:focus {
        outline: none;
        border-color: #4a90e2;
        box-shadow: 0 0 0 2px rgba(74, 144, 226, 0.1);
    }

    .submit-btn {
        background-color: #4a90e2;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 500;
        align-self: flex-start;
    }

    .submit-btn:hover {
        background-color: #357abd;
    }

    textarea.form-input {
        resize: vertical;
        min-height: 100px;
    }
</style>
