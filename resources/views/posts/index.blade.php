<x-layout>
    @include('posts.header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts && $posts->count())
            <x-post-featured-card :post="$posts[0]" />
           
            @if ($posts->count() > 1)
                <div class="lg:grid lg:grid-cols-2 gap-6">
                    @foreach ($posts->skip(1) as $post)
                        <x-post-card 
                            :post="$post" 
                            class="col-span-1"
                        />
                        
                    @endforeach
                </div>
                {{ $posts->links() }}
            @endif
        @else
            <p class="text-center">No posts yet. Please check back later.</p>
        @endif
    </main>
</x-layout>