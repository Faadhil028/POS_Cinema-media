<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="ml-4">
                <a href="{{ route('admin.roles.index') }}"
                    class="px-4 py-2 bg-sky-500 hover:bg-slate-200 text-slate-100 hover:text-gray-800 rounded-md">Index
                    Roles</a>
            </div>
            <h1 class="uppercase text-2xl font-semibold tracking-widest text-white ml-4 mt-10">add roles</h1>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
                    <form method="POST" action="{{ route('admin.roles.store') }}">
                        @csrf
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        @error('name')
                            <span class="text-red-500 text-sm">The name field is required</span>
                        @enderror
                        <div class="mt-3 text-white bg-red-300">
                            <h1> <input type="checkbox" class="m-2 check_all"> Transaksi
                            </h1>
                            <label for="create">
                                <input type="checkbox" name="premission[]" value="create.transaksi"
                                    class="m-2 transaksi">create</label>
                            <label for="read">
                                <input type="checkbox" name="premission[]" value="read.transaksi"
                                    class="m-2 transaksi">read</label>
                            <label for="update">
                                <input type="checkbox" name="premission[]" value="update.transaksi"
                                    class="m-2 transaksi">update</label>
                            <label for="delete">
                                <input type="checkbox" name="premission[]" value="delete.transaksi"
                                    class="m-2 transaksi">delete</label>
                        </div>
                        <div class="mt-3 text-white bg-red-300">
                            <h1> <input type="checkbox" class="m-2 check_all_timetable"> Timetable
                            </h1>
                            <label for="create">
                                <input type="checkbox" name="premission[]" value="create.timetable"
                                    class="m-2 timetable">create</label>
                            <label for="read">
                                <input type="checkbox" name="premission[]" value="read.timetable"
                                    class="m-2 timetable">read</label>
                            <label for="update">
                                <input type="checkbox" name="premission[]" value="update.timetable"
                                    class="m-2 timetable">update</label>
                            <label for="delete">
                                <input type="checkbox" name="premission[]" value="delete.timetable"
                                    class="m-2 timetable">delete</label>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="p-2 bg-sky-500 hover:bg-slate-200 text-slate-100 hover:text-gray-800 rounded-md">
                                Add Roles
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script>
    $('.check_all').click(function(event) {
        if (this.checked) {
            // Iterate each checkbox
            $('.transaksi').each(function() {
                this.checked = true;
            });
        } else {
            $('.transaksi').each(function() {
                this.checked = false;
            });
        }
    });
    $('.check_all_timetable').click(function(event) {
        if (this.checked) {
            // Iterate each checkbox
            $('.timetable').each(function() {
                this.checked = true;
            });
        } else {
            $('.timetable').each(function() {
                this.checked = false;
            });
        }
    });
</script>
