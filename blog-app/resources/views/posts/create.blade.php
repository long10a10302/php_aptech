<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                    <h1 class="mb-4">
                        Posts List
                        <a href="{{ route('post.all') }}" class="btn btn-primary float-end">Back</a>
                    </h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Ten bai viet</label>
                            <input type="text" name="title" id="" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Noi dung</label>
                            <input type="text" name="body" id="" class="form-control">
                        </div> 
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Lưu bài viết</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</html>
