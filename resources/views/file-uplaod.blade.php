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
            <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <input type="file" name="photo" accept=".jpeg,.png,.jpeg">
                    @error('photo')
                    <div class="alert alert-danger bm-1 mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <input class="btn btn-sm btn-primary" type="submit" value="upload">
                </div>
            </form>
        </div>
        <div class="col-6">
                @if(session('status'))
                <div class="alert alert-success">{{session('status')}}</div>
                @endif
            </div>
        <div class="row">
            
            @foreach($users as $user)
            <div class="col-2">
                <img class='img-fluid' src="{{asset('/storage/'.$user->file_name)}}" alt="">
                <form action="{{route('user.destroy',$user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class='btn btn-danger btn-sm mb-3'>delete</button>
                </form>
                <a href="{{route('user.edit',$user->id)}}" class='btn btn-warning'>update</a>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>