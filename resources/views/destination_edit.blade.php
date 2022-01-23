<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') }}" rel="stylesheet">

    <script src="{{ asset('ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>
    <script>
        hljs.initHighlightingOnLoad();
    </script>

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
                <br />
                <br />


                <form method="post" action="/admin/destinasi/update/{{ $destinations->id }}">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name_dest" class="form-control" placeholder="Nama Destinasi .." value=" {{ $destinations->name_dest }}">
                        <label>URL Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Slug" value=" {{ $destinations->slug }}">
                        <label>Latitude</label>
                        <input type="text" name="latitude" class="form-control" placeholder="Latitude" value=" {{ $destinations->latitude }}">
                        <label>Longitude</label>
                        <input type="text" name="longitude" class="form-control" placeholder="Longitude" value=" {{ $destinations->longitude }}">

                        <label>URL Image Thumb</label>
                        <input type="text" name="thumb_img" class="form-control" placeholder="URL Image" value=" {{ $destinations->thumb_img }}">

                        <label>Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address" value=" {{ $destinations->address }}">

                        <label>Ticket</label>
                        <input type="text" name="entrance_ticket" class="form-control" placeholder="entrance_ticket" value=" {{ $destinations->entrance_ticket }}">

                        <label>Access</label>
                        <div class="form-check">
                            @if($destinations->car == 1 )
                            <input class="form-check-input" type="checkbox" value="0" name="car" id="car" checked>
                            <label class="form-check-label" for="car">
                                Car
                            </label>
                            @else
                            <input class="form-check-input" type="checkbox" value="1" name="car" id="car">
                            <label class="form-check-label" for="car">
                                Car
                            </label>
                            @endif
                        </div>
                        <div class="form-check">
                            @if($destinations->motor == 1 )
                            <input class="form-check-input" type="checkbox" value="0" name="motor" id="motor" checked>
                            <label class="form-check-label" for="motor">
                                Motorcycle
                            </label>
                            @else
                            <input class="form-check-input" type="checkbox" value="1" name="motor" id="motor">
                            <label class="form-check-label" for="motor">
                                Motorcycle
                            </label>
                            @endif
                        </div>
                        <div class="form-check">
                            @if($destinations->boat == 1 )
                            <input class="form-check-input" type="checkbox" value="0" name="boat" id="boat" checked>
                            <label class="form-check-label" for="boat">
                                Boat
                            </label>
                            @else
                            <input class="form-check-input" type="checkbox" value="1" name="boat" id="boat">
                            <label class="form-check-label" for="boat">
                                Boat
                            </label>
                            @endif
                        </div>

                        <div class="form-check">
                            @if($destinations->walk == 1 )
                            <input class="form-check-input" type="checkbox" value="0" name="walk" id="walk" checked>
                            <label class="form-check-label" for="walk">
                                Walk
                            </label>
                            @else
                            <input class="form-check-input" type="checkbox" value="1" name="walk" id="walk">
                            <label class="form-check-label" for="walk">
                                Walk
                            </label>
                            @endif
                        </div>

                        <br>

                        <label>Description</label>
                        <textarea id="description_editor" name="description" class="form-control" rows="10" cols="50"> {{ $destinations->description }}</textarea>


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

<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
<script>
    var konten = document.getElementById("description_editor");
    CKEDITOR.replace(konten, {
        language: 'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
</script>

</html>