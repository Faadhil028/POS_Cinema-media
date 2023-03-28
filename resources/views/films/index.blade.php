{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Data Film</title>
</head>
<body> --}}
<x-admin-layout>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="py-4 d-flex justify-content-between align-items-center">
                    <h2>Film List</h2>
                    <a href="{{ route('admin.films.create') }}" class="btn btn-primary">
                    Add New</a>
                </div>

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Duration in Minutes</th>
                            <th>Genre</th>
                            <th>Description</th>
                            <th>Tumbnail</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($films as $film)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $film->title }}</td>
                                <td>{{ $film->duration }}</td>
                                <td>{{ $film->genre }}</td>
                                <td>{{ $film->description }}</td>
                                <td><img src="{{ asset('storage/uploads/' . $film->tumbnail) }}" alt="Tumbnail Missing" class="h-16 w-auto"></td>
                                <td>{{ $film->start_date }}</td>
                                <td>{{ $film->end_date }}</td>
                                <td>{{ $film->status }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.films.edit', ['film'=> $film->id]) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form method="POST" action="{{ route('admin.films.destroy',
                                            ['film' => $film->id]) }}"
                                            onsubmit="return confirm('Are you sure?');">

                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger ms-3">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <td colspan="10" class="text-center">Nothing to show</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
{{-- </body>
</html> --}}
