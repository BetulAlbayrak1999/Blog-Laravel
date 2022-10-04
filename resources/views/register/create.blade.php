<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register</h1>
            <form method="POST" action="/register" class="mt-10">
               @csrf

                <div class="mb-6">

                    <x-form.input name="name"></x-form.input>
                </div>
                <x-form.error name="name"></x-form.error>

                <div class="mb-6">
                    <x-form.input name="username"></x-form.input>

                </div>
                <div>
                    <x-form.error name="username"></x-form.error>
                </div>

                <div class="mb-6">
                    <x-form.input name="email" type="email"></x-form.input>

                </div>
                <div>
                    <x-form.error name="email"></x-form.error>
                </div>


                <div class="mb-6">
                    <x-form.input name="password" type="password"></x-form.input>

                </div>
                <div>
                    <x-form.error name="password"></x-form.error>
                </div>

                <div class="mb-6">
                    <x-form.button>Submit</x-form.button>
                </div>
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
            </form>
        </main>
    </section>
</x-layout>
