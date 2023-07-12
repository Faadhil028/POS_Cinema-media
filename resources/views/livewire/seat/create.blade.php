<div>
    @if (session()->has('success'))
        <div id="alert"
            class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ session()->get('success') }}
            </div>
        </div>
    @endif
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <!-- <div class=" bg-white dark:bg-gray-900 flex justify-between rounded-lg mb-5">
            <div class="relative px-2 pt-2">
                <div class="pt-4 px-2">
                    <h1 class="uppercase text-3xl font-black tracking-widest text-gray-900 ml-4 mb-5">add seat</h1>
                </div>
            </div>
        </div> -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div class="py-1">
                    <h1 class="uppercase text-3xl font-black tracking-widest text-gray-900">add seat</h1>
                    <hr class="h-px my-4 bg-gray-500 border-0">
                </div>
            <form wire:submit.prevent='store'>

                <!-- Row -->
                <div>
                    <x-input-label for="row" :value="__('Row')" />
                    <x-text-input id="row" class="block mt-1 w-full" type="text" name="row"
                        style="text-transform:uppercase" :value="old('row')" wire:model.defer='row' required autofocus
                        autocomplete="row" />
                    <x-input-error :messages="$errors->get('row')" class="mt-2" />
                </div>

                <!-- Number -->
                <div class="mt-4">
                    <x-input-label for="number" :value="__('Number')" />
                    <x-text-input id="number" class="block mt-1 w-full" type="number" name="number"
                        :value="old('number')" wire:model.defer='number' required />
                    <x-input-error :messages="$errors->get('number')" class="mt-2" />
                    <small class="text-gray-500"><i>* masukkan jumlah banyak kursi yang diinginkan</i></small>
                </div>


                <div class="flex justify-end items-center mt-3">
                    <div
                        class="mr-4 px-4 py-1 bg-rose-400 hover:bg-slate-200 text-slate-100 hover:text-gray-800 rounded-md">
                        <a href="{{ route('admin.seats.index') }}" class="">Cancel</a>
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
