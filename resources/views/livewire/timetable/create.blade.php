<div class="py-12 w-full">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <h1 class="uppercase text-2xl font-semibold tracking-widest text-white ml-4 mt-10">add film</h1>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">

                <form wire:submit.prevent='store'>
                    {{-- Film --}}
                    <div class="mb-3">
                        <label for="film" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Film</label>
                        <select id="film" wire:model='film'
                            class="bg-gray-50 border @error('film') is-invalid @enderror border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a Film</option>
                            @foreach ($films as $film)
                                <option value={{ $film->id }}>{{ $film->title }}</option>
                            @endforeach
                        </select>

                        @error('film')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Munculkan Start Date dan End Date --}}
                    @if ($showDateInputs)
                        <div class="flex justify-between">
                            <div class="mb-3 w-full mr-2">
                                <label class="dark:text-white text-base" for="start_date">Start Date</label><br>
                                <x-text-input type="date" id="start_date" wire:model='start_date'
                                    class="block mt-1 w-full @error('start_date') is-invalid @enderror" disabled />
                                @error('start_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 w-full">
                                <label class="dark:text-white text-base" for="end_date">End Date</label><br>
                                <x-text-input type="date" id="end_date"
                                    class="block mt-1 w-full @error('end_date') is-invalid @enderror"
                                    wire:model='end_date' disabled />
                                @error('end_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endif

                    {{-- Studio --}}
                    <div class="mb-3">
                        <label for="studio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Studio</label>
                        <select id="studio" wire:model.defer='studio'
                            class="bg-gray-50 border @error('film') is-invalid @enderror border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a Studio</option>
                            @foreach ($studios as $studio)
                                <option value={{ $studio->id }}>{{ $studio->name }} ({{ $studio->class }})</option>
                            @endforeach
                        </select>

                        @error('studio')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    {{-- Date --}}
                    {{-- <div class="mb-3">
                        <label class="dark:text-white text-base" for="date">Date</label><br>
                        <x-text-input type="date" id="date" name="date" value="{{ old('date') }}"
                            class="block mt-1 w-full @error('date') is-invalid @enderror" wire:model.defer='date' />
                        @error('date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    {{-- Start Time --}}
                    <div class="mb-3">
                        <label class="dark:text-white text-base" for="time">Time</label><br>
                        <x-text-input type="time" id="time" name="time" value="{{ old('time') }}"
                            class="block mt-1 w-full @error('time') is-invalid @enderror" wire:model.defer='time' />
                        @error('time')
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
