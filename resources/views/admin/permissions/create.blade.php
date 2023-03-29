<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="ml-4">
                <a href="{{ route('admin.permissions.index')}}" class="px-4 py-2 bg-sky-500 hover:bg-slate-200 text-slate-100 hover:text-gray-800 rounded-md">Index Permissions</a>
            </div>
            <h1 class="uppercase text-2xl font-semibold tracking-widest text-white ml-4 mt-10">add Permissions</h1>          
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">   
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
                        <form method="POST" action="{{ route('admin.permissions.store') }}">
                            @csrf
                    
                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            @error('name') 
                                <span class="text-red-500 text-sm">The name field is required</span>
                            @enderror
                            <div class="flex justify-end items-center mt-4">
                                    <div class="mr-4 px-4 py-1 bg-rose-400 hover:bg-slate-200 text-slate-100 hover:text-gray-800 rounded-md">
                                            <a href="{{ route('admin.permissions.index') }}"
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
    </div>
</x-admin-layout>
