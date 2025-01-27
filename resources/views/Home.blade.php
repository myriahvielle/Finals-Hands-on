<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    
    @vite(['resources/css/app.css'])
    
</head>
<body class="bg-gray-100 min-h-screen">
    @include('components.nav')
    
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row justify-between gap-8">
            <!-- Left Column - Posts Section -->
            <div class="flex-1 flex flex-col gap-6">
                <div class="bg-white rounded-lg shadow-md p-6">
                    @include('components.createPost')
                </div>

                <div class="space-y-4">
                    <h1 class="text-2xl font-bold text-gray-800 mb-4">
                        User Posts
                    </h1>
                    
                    <div class="space-y-4">
                        @foreach ($posts as $post)
                            @include('components.postCard')
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right Column - Users Section -->
            <div class="md:w-1/4 space-y-4">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h1 class="text-xl font-bold text-gray-800 mb-4">
                        Other Users
                    </h1>
                    <div class="space-y-2">
                        @foreach ($allUsers as $user)
                            <div class="hover:bg-gray-50 rounded-md transition-colors duration-150">
                                <a href="/userposts/{{ $user->id }}" 
                                   class="block p-2 text-blue-600 hover:text-blue-800 font-medium">
                                    {{ $user->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
