<x-layout>
    <x-setting :heading="'Edit Post:' .$post->title">
        <form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="title" :value="$post->title"></x-form.input>

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)"></x-form.input>
                </div>
                <img src="{{ asset('storage/' .$post->thumbnail) }}" alt="" class="rounded-xl ml-6">
            </div>
            <x-form.input name="slug" :value="$post->slug"></x-form.input>
            <x-form.textarea name="excerpt"> {{old('excerpt', $post->excerpt)}}</x-form.textarea>
            <x-form.textarea name="body"> {{old('body', $post->body)}}</x-form.textarea>

            <div class="mb-6">
                <lable class="block mb-2 uppercase font-bold text-xs ~text-gray-700"
                       for="category_id">
                    Category
                </lable>
                <select name="category_id" id="category_id">

                    @foreach(\App\Models\Category::all() as $category)
                        <option
                            value="{{$category->id}}"
                            {{old('category_id', $post->category_id)== $category->id ? 'selected':''}}
                        >{{ ucwords($category->name)}}</option>
                    @endforeach
                </select>
                <div>
                    <x-form.error name="category"></x-form.error>
                </div>
            </div>
            <x-form.button>Update</x-form.button>
        </form>

    </x-setting>
</x-layout>
