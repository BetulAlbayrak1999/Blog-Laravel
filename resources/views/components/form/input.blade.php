@props(['name'])
<div class="mb-6">
    <x-form.label name="{{$name}}"></x-form.label>

    <input class="border border-gray-200 p-2 w-full rounded"
           name="{{$name}}"
           id="{{$name}}"
            {{$attributes(['value'=>old($name)])}}
    >
    <div>
        <x-form.error name="{{$name}}"></x-form.error>
    </div>
</div>
