@props(['comment'])
<x-panel class="bg-gray-100">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/100?id={{$comment->user_id}}" alt="" width="100" height="100" class="rounded-xl">
        </div>
        <div>
            <header>
                <strong class="font-blod mb-4">
                    {{$comment->author->username}}
                </strong>
                <p class="text-sm font-bold">
                    Posted at
                    <time>{{$comment->created_at->format("F j, Y, g:i a")}}</time>
                </p>
            </header>
            <p>
                {{$comment->body}}</p>
        </div>
    </article>
</x-panel>

