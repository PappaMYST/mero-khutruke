<x-app-layout>
    <x-slot name="title">Create Category</x-slot>
    <h1>Create New Categories</h1>
    <form action="/categories" method="post">
        @csrf
        <div class="my-5">
            <input type="text" name="name" id="name" placeholder="Category Name" value="{{ old('name') }}">
            @error('title')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Submit</button>
    </form>
</x-app-layout>
