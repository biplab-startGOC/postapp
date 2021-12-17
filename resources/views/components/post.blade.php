@props(['post' => $post])

<div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">
        {{ $post->user->name }}
    </a>
    <span class="text-green-500 text-sm">
        {{ $post->created_at->diffForHumans() }}
    </span>
    <p class=" mb-2">{{ $post->body }}</p>
    {{-- @if ($post->ownedBy(auth()->user())) --because of policy--}}
            @can('delete', $post)
            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="mr-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500">Delete</button>

            </form>
            @endcan
    {{-- @endif --because of policy--}}


    <div class="flex items-center">
        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post->id) }}" method="POST" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                    @csrf
                    @method('DELETE')
                    {{-- method spoofing --}}
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif



        @endauth

        {{-- For counting Likes --}}
        <span>
            {{ $post->likes->count() }}
            {{ Str::plural('like', $post->likes->count()) }}
        </span>

    </div>

</div>