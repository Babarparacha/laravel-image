<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>File Ulaod</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-2">File Uplaod</h2>
            </div>
        </div>
        <div class="row">
            <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT');
                <div class="col-3">
                    <img id="output" class="img-responsive img-fluid" src="{{asset('/storage/'.$user->file_name)}}"
                        alt="" />
                </div>
                <div class="col-9">
                    <input type="file"
                        onchange="document.querySelector('#output').src=window.URL.createObjectURL(this.files[0])"
                        name="photo" accept=".jpeg,.png,.jpeg">
                    @error('photo')
                    <div class="alert alert-danger bm-1 mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <input class="btn btn-sm btn-success" type="submit" value="update">
                </div>
            </form>
        </div>

    </div>
</body>

</html>