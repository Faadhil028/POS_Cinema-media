<x-admin-layout>
<div class="py-12 w-full">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <h1 class="uppercase text-2xl font-semibold tracking-widest text-white ml-4 mt-10">add genre</h1>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">

                <form action="{{ route('admin.genres.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="block mt-1 w-full @error('name') is-invalid @enderror"></x-text-input>

                        @error('name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <label class="dark:text-white text-base" for="is_active">Status</label><br>
                    <div class="flex mb-2 items-center">
                        <div class="pr-2">
                            <input type="radio" name="is_active" id="yes" value="1"
                            class="@error('is_active') is-invalid @enderror" checked>
                            <label for="yes" class="dark:text-white text-base">Active</label><br>
                        </div>
                        <div class="pl-2">
                            <input type="radio" name="is_active" id="no" value="0"
                            class="@error('is_active') is-invalid @enderror">
                            <label for="no" class="dark:text-white text-base">Not Active</label>
                        </div>
                        @error('is_active')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- <button type="submit" class="btn btn-primary mb-2">Submit</button> -->
                    <div class="flex justify-end items-center">
                        <div class="mr-4 px-4 py-1 bg-rose-400 hover:bg-slate-200 text-slate-100 hover:text-gray-800 rounded-md">
                                <a href="{{ route('admin.genres.index') }}"
                                    class="">Cancel</a>
                        </div>
                        <button type="submit"
                                    class="px-4 py-1 bg-sky-500 hover:bg-slate-200 text-slate-100 hover:text-gray-800 rounded-md">
                                    Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div></div></div></div>
</x-admin-layout>
