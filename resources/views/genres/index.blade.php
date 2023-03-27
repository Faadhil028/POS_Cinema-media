<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Genre List</title>
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="py-4 d-flex justify-content-between align-items-center">
                    <h2>Genre List</h2>
                    <a href="{{ route('genres.create') }}" class="btn btn-primary">
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
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($genres as $genre)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $genre->name }}</td>
                                <td>@if ($genre->is_active == 1) Active
                                    @else Not Active
                                    @endif</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('genres.edit', ['genre'=> $genre->id]) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form method="POST" action="{{ route('genres.destroy', ['genre' => $genre->id]) }}"
                                            onsubmit="return confirm('Are you sure?');">

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
</body>
</html>
