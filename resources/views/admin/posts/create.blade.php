<x-layout>
    <x-setting heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title"></x-form.input>
            <x-form.input name="slug"></x-form.input>
            <x-form.input name="thumbnail" type="file"></x-form.input>
            <x-form.textarea name="excerpt"></x-form.textarea>
            <x-form.textarea name="body"></x-form.textarea>

            <div class="mb-6">
                <lable class="block mb-2 uppercase font-bold text-xs ~text-gray-700"
                       for="category_id">
                    Category
                </lable>
                <select name="category_id" id="category_id">

                    @foreach(\App\Models\Category::all() as $category)
                        <option
                            value="{{$category->id}}"
                            {{old('category_id')== $category->id ? 'selected':''}}
                        >{{ ucwords($category->name)}}</option>
                    @endforeach
                </select>
                <div>
                    <x-form.error name="category"></x-form.error>
                </div>
            </div>
            <x-form.button>Publish</x-form.button>
        </form>

    </x-setting>
</x-layout>
