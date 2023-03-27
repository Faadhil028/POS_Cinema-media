<x-admin-layout>
<div class="py-12 w-full">
    <div class="max-w-full mx-full sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg inl">
                    <div class="pb-4 bg-white dark:bg-gray-900 flex justify-between">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative px-2 pt-2">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none pt-2">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <form action="{{ route('admin.permissions.index') }}" method="GET" id="search-form">
                                <input type="text" id="search" name="search"
                                    class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search for items">
                            </form>
                        </div>
                        <div class="pt-4 px-4">
                            <a href="{{ route('admin.genres.create') }}"
                                class="px-4 py-2 bg-sky-500 hover:bg-slate-200 text-slate-100 hover:text-gray-800 rounded-md">Create
                                Permissions</a>
                        </div>
                    </div>

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($genres as $genre)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                                    id="search_list">
                                <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $genre->name }}</th>
                                <th>@if ($genre->is_active == 1) Active
                                    @else Not Active
                                    @endif</th>
                                <td>
                                    <div class="flex">
                                        <a href="{{ route('admin.genres.edit', ['genre'=> $genre->id]) }}"
                                        class="font-medium text-sky-500 hover:underline px-1">Edit</a>
                                        /
                                        <form method="POST" action="{{ route('admin.genres.destroy', ['genre' => $genre->id]) }}"
                                            onsubmit="return confirm('Are you sure?');"
                                            class="px-1 font-medium text-sky-500 hover:underline">

                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger ms-3">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center">Nothing to show</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div></div></div></div>
</x-admin-layout>
