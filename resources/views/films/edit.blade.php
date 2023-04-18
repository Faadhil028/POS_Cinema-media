<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <h1 class="uppercase text-2xl font-semibold tracking-widest text-white ml-4 mt-10">Edit films</h1>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">

                    <form action="{{ route('admin.films.update', ['film' => $film->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        {{-- Title --}}
                        <div class="mb-3">
                            <label class="dark:text-white text-base">Title</label><br>
                            <x-text-input type="text" id="title" name="title"
                                value="{{ old('title') ?? $film->title }}"
                                class="block mt-1 w-full @error('title') is-invalid @enderror" />
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Genre --}}
                        <div class="mb-3">
                            <label class="dark:text-white text-base" for="genre[]">Genre</label><br>
                            @forelse ($genres as $genre)
                                {{ $checked = '' }}
                                <input type="checkbox" name="genre[]" id="{{ $genre->name }}"
                                    value="{{ $genre->id }}"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 @error('genre') is-invalid @enderror"
                                    @if (in_array($genre->id, $genreIds)) {{ $checked = 'checked' }} @endif>
                                <label for="{{ $genre->name }}"
                                    class="dark:text-white text-base">{{ $genre->name }}</label><br>
                            @empty
                                <p>Looks like there is no active genre</p>
                            @endforelse
                            @error('genre')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="mb-3">
                            <label class="dark:text-white text-base" for="description">Description</label><br>
                            <x-text-input type="text" id="description" name="description"
                                value="{{ old('description') ?? $film->description }}"
                                class="block mt-1 w-full @error('description') is-invalid @enderror" />
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex justify-between">

                            {{-- Duration --}}
                            <div class="mb-3 w-full mr-2">
                                <label class="dark:text-white text-base">Duration in Minutes</label><br>
                                <x-text-input type="number" id="duration" name="duration"
                                    value="{{ old('duration') ?? $film->duration }}"
                                    class="block mt-1 w-full @error('duration') is-invalid @enderror" />
                                @error('duration')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Start Date --}}
                            <div class="mb-3 w-full mx-2">
                                <label class="dark:text-white text-base" for="start_date">Start Date</label>
                                <x-text-input type="date" id="start_date" name="start_date"
                                    value="{{ old('start_date') ?? $start }}"
                                    class="block mt-1 w-full @error('start_date') is-invalid @enderror" />
                                @error('start_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- End Date --}}
                            <div class="mb-3 w-full mx-2">
                                <label class="dark:text-white text-base" for="end_date">End Date</label>
                                <x-text-input type="date" id="end_date" name="end_date"
                                    value="{{ old('end_date') ?? $end }}"
                                    class="block mt-1 w-full @error('end_date') is-invalid @enderror" />
                                @error('end_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Thumbnail --}}
                        <div class="mb-3">
                            <label class=" dark:text-white text-base" for="tumbnail">Tumbnail</label>
                            @if ($film->tumbnail)
                                <img src="{{ asset('storage/uploads/' . $film->tumbnail) }}"
                                    class="img-preview img-fluid mb-3 col-sm-5">
                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input type="hidden" name="oldTumbnail" value="{{ $film->tumbnail }}">
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none
                             dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 @error('tumbnail') is-invalid @enderror"
                                type="file" id="tumbnail" name="tumbnail" onchange="previewImage()"
                                value="{{ old('tumbnail') ?? $film->tumbnail }}">
                            @error('tumbnail')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div class="mb-3">
                            <label class="dark:text-white text-base" for="status">Status</label><br>
                            <select name="status" id="status"
                                class="block w-full rounded-md bg-white dark:text-gray-400 @error('status') is-invalid @enderror">
                                <?php
                                $coming_soon = '';
                                $currently_airing = '';
                                $ended = '';
                                ?>
                                @if ($film->status == 'COMING SOON')
                                    {{ $coming_soon = 'selected' }}
                                @elseif ($film->status == 'CURRENTLY AIRING')
                                    {{ $currently_airing = 'selected' }}
                                @else
                                    {{ $ended = 'selected' }}
                                @endif
                                <option value="COMING SOON" {{ $coming_soon }}>COMING SOON</option>
                                <option value="CURRENTLY AIRING" {{ $currently_airing }}>CURRENTLY AIRING</option>
                                <option value="ENDED" {{ $ended }}>ENDED</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- <button type="submit" class="btn btn-primary mb-2">Update</button> --}}
                        <div class="flex justify-end items-center mt-4">
                            <div
                                class="mr-4 px-4 py-1 bg-rose-400 hover:bg-slate-200 text-slate-100 hover:text-gray-800 rounded-md">
                                <a href="{{ route('admin.films.index') }}" class="">Cancel</a>
                            </div>
                            <button type="submit"
                                class="px-4 py-1 bg-sky-500 hover:bg-slate-200 text-slate-100 hover:text-gray-800 rounded-md">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-admin-layout>
