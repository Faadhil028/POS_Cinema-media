{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add New Film</title>
</head>
<body> --}}
<x-admin-layout>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-8 col-xl-6">
                <h1>Add New Film</h1>
                <hr>

                <form action="{{ route('admin.films.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}"
                            class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="duration">Duration in Minutes</label>
                        <input type="number" id="duration" name="duration" value="{{ old('duration') }}"
                        class="form-control @error('duration') is-invalid @enderror">
                        @error('duration')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="genre[]">Genre</label><br>
                        @forelse ($genres as $genre)
                                <input type="checkbox" name="genre[]" id="{{ $genre->name }}" value="{{ $genre->id }}"
                                class="@error('genre') is-invalid @enderror">
                                <label for="{{ $genre->name }}">{{ $genre->name }}</label><br>
                        @empty
                            <p>Looks like there is no active genre</p>
                        @endforelse
                        @error('genre')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="description">Description</label>
                        <input type="text" id="description" name="description" value="{{ old('description') }}"
                        class="form-control @error('description') is-invalid @enderror">
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="start_date">Start Date</label>
                        <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}"
                        class="form-control @error('start_date') is-invalid @enderror">
                        @error('start_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="end_date">End Date</label>
                        <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}"
                        class="form-control @error('end_date') is-invalid @enderror">
                        @error('end_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tumbnail">Tumbnail</label>
                        <input type="file" id="tumbnail" name="tumbnail" value="{{ old('tumbnail') }}"
                            class="form-control @error('tumbnail') is-invalid @enderror">
                        @error('tumbnail')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="status">Status</label>
                        <select name="status" id="status"
                        class="form-select @error('status') is-invalid @enderror">
                            <option value="COMING SOON" selected>COMING SOON</option>
                            <option value="CURRENTLY AIRING">CURRENTLY AIRING</option>
                            <option value="ENDED">ENDED</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
{{-- </body>
</html> --}}
