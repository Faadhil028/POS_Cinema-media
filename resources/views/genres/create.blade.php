<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add Genre</title>
</head>
<body>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-8 col-xl-6">
                <h1>Add New Genre</h1>
                <hr>

                <form action="{{ route('genres.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror">

                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="is_active">Status</label><br>
                        <input type="radio" name="is_active" id="yes" value="1"
                        class="@error('is_active') is-invalid @enderror" checked>
                        <label for="yes">Active</label><br>

                        <input type="radio" name="is_active" id="no" value="0"
                        class="@error('is_active') is-invalid @enderror">
                        <label for="no">Not Active</label>

                        @error('is_active')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
