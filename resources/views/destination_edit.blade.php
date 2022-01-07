<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Edit</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                Edit Destinasi - <a href="https://www.gilispace.com" target="_blank">https://www.gilispace.com</a>
                </div>
                <div class="card-body">
                    <a href="/admin/destinasi" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    
 
                    <form method="post" action="/admin/destinasi/update/{{ $destinations->id }}">
 
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
 
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name_dest" class="form-control" placeholder="Nama Destinasi .." value=" {{ $destinations->name_dest }}">
 
                            <!-- show error if form empty-->
                            @if($errors->has('name_dest'))
                                <div class="text-danger">
                                    {{ $errors->first('name_dest')}}
                                </div>
                            @endif
 
                        </div>
 
 
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>
 
                    </form>
 
                </div>
            </div>
        </div>
    </body>
</html>