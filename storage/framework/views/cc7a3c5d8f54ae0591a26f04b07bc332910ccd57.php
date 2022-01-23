<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo e(asset('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css')); ?>" rel="stylesheet">

    <script src="<?php echo e(asset('ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js')); ?>"></script>
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


                <form method="post" action="/admin/destinasi/update/<?php echo e($destinations->id); ?>">

                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PUT')); ?>


                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name_dest" class="form-control" placeholder="Nama Destinasi .." value=" <?php echo e($destinations->name_dest); ?>">
                        <label>URL Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Slug" value=" <?php echo e($destinations->slug); ?>">
                        <label>Latitude</label>
                        <input type="text" name="latitude" class="form-control" placeholder="Latitude" value=" <?php echo e($destinations->latitude); ?>">
                        <label>Longitude</label>
                        <input type="text" name="longitude" class="form-control" placeholder="Longitude" value=" <?php echo e($destinations->longitude); ?>">

                        <label>URL Image Thumb</label>
                        <input type="text" name="thumb_img" class="form-control" placeholder="URL Image" value=" <?php echo e($destinations->thumb_img); ?>">

                        <label>Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address" value=" <?php echo e($destinations->address); ?>">

                        <label>Ticket</label>
                        <input type="text" name="entrance_ticket" class="form-control" placeholder="entrance_ticket" value=" <?php echo e($destinations->entrance_ticket); ?>">

                        <label>Access</label>
                        <div class="form-check">
                            <?php if($destinations->car == 1 ): ?>
                            <input class="form-check-input" type="checkbox" value="0" name="car" id="car" checked>
                            <label class="form-check-label" for="car">
                                Car
                            </label>
                            <?php else: ?>
                            <input class="form-check-input" type="checkbox" value="1" name="car" id="car">
                            <label class="form-check-label" for="car">
                                Car
                            </label>
                            <?php endif; ?>
                        </div>
                        <div class="form-check">
                            <?php if($destinations->motor == 1 ): ?>
                            <input class="form-check-input" type="checkbox" value="0" name="motor" id="motor" checked>
                            <label class="form-check-label" for="motor">
                                Motorcycle
                            </label>
                            <?php else: ?>
                            <input class="form-check-input" type="checkbox" value="1" name="motor" id="motor">
                            <label class="form-check-label" for="motor">
                                Motorcycle
                            </label>
                            <?php endif; ?>
                        </div>
                        <div class="form-check">
                            <?php if($destinations->boat == 1 ): ?>
                            <input class="form-check-input" type="checkbox" value="0" name="boat" id="boat" checked>
                            <label class="form-check-label" for="boat">
                                Boat
                            </label>
                            <?php else: ?>
                            <input class="form-check-input" type="checkbox" value="1" name="boat" id="boat">
                            <label class="form-check-label" for="boat">
                                Boat
                            </label>
                            <?php endif; ?>
                        </div>

                        <div class="form-check">
                            <?php if($destinations->walk == 1 ): ?>
                            <input class="form-check-input" type="checkbox" value="0" name="walk" id="walk" checked>
                            <label class="form-check-label" for="walk">
                                Walk
                            </label>
                            <?php else: ?>
                            <input class="form-check-input" type="checkbox" value="1" name="walk" id="walk">
                            <label class="form-check-label" for="walk">
                                Walk
                            </label>
                            <?php endif; ?>
                        </div>

                        <br>

                        <label>Description</label>
                        <textarea id="description_editor" name="description" class="form-control" rows="10" cols="50"> <?php echo e($destinations->description); ?></textarea>


                        <!-- show error if form empty-->
                        <?php if($errors->has('name_dest')): ?>
                        <div class="text-danger">
                            <?php echo e($errors->first('name_dest')); ?>

                        </div>
                        <?php endif; ?>

                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>

                </form>

            </div>
        </div>
    </div>
</body>

<script src="<?php echo e(asset('assets/ckeditor/ckeditor.js')); ?>"></script>
<script>
    var konten = document.getElementById("description_editor");
    CKEDITOR.replace(konten, {
        language: 'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
</script>

</html><?php /**PATH D:\Laravel\guidemelombok\resources\views/destination_edit.blade.php ENDPATH**/ ?>