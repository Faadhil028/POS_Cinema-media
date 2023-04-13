<div class="py-12 w-full">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <h1 class="uppercase text-2xl font-semibold tracking-widest text-white ml-4 mt-10">add studio</h1>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">

                <form wire:submit.prevent='store'>
                    {{-- Name --}}
                    <div class="mb-3">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input type="text" id="name" value="{{ old('name') }}" wire:model.defer='name'
                            class="block mt-1 w-full @error('name') is-invalid @enderror"></x-text-input>

                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Select Class --}}
                    <div class="mb-3">
                        <label class="dark:text-white text-base" for="class">Class</label><br>
                        <select id="class" wire:model.defer='class'
                            class="block w-full rounded-md bg-gray-900 dark:text-gray-400 @error('class') is-invalid @enderror">
                            <option>Choose a Class</option>
                            <option value="REGULAR">REGULAR</option>
                            <option value="PREMIUM">PREMIUM</option>
                        </select>
                        @error('class')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Price --}}
                    <div class="mb-3 w-full mr-2">
                        <label class="dark:text-white text-base">Weekday Price</label><br>
                        <x-text-input type="number" id="price" value="{{ old('price') }}"
                            wire:model.defer='price' class="block mt-1 w-full @error('price') is-invalid @enderror"
                            min="0" />
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Weekend Price --}}
                    <div class="mb-3 w-full mr-2">
                        <label class="dark:text-white text-base">Weekend Price</label><br>
                        <x-text-input type="number" id="weekend_price" value="{{ old('weekend_price') }}"
                            wire:model.defer='weekend_price'
                            class="block mt-1 w-full @error('weekend_price') is-invalid @enderror" min="0" />
                        @error('weekend_price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Active --}}
                    <label class="dark:text-white text-base" for="is_active">Status</label><br>
                    <div class="flex mb-2 items-center">
                        {{-- <div class="pr-2">
                            <input type="radio" id="yes" value="1" wire:model='is_active'
                                class="@error('is_active') is-invalid @enderror" checked>
                            <label for="yes" class="dark:text-white text-base">Active</label><br>
                        </div>
                        <div class="pl-2">
                            <input type="radio" id="no" value="0" wire:model='is_active'
                                class="@error('is_active') is-invalid @enderror">
                            <label for="no" class="dark:text-white text-base">Not Active</label>
                        </div> --}}
                        <label class="relative inline-flex items-center mb-4 cursor-pointer">
                            <input type="checkbox" value="1" class="sr-only peer" wire:model='is_active'>
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Active ?</span>
                        </label>
                        @error('is_active')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- <button type="submit" class="btn btn-primary mb-2">Submit</button> -->
                    <div class="flex justify-end items-center">
                        <div
                            class="mr-4 px-4 py-1 bg-rose-400 hover:bg-slate-200 text-slate-100 hover:text-gray-800 rounded-md">
                            <a href="{{ route('admin.genres.index') }}" class="">Cancel</a>
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
