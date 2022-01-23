<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Gilispace-Admin</title>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Login - <a href="https://www.gilispace.com" target="_blank">https://www.gilispace.com</a>
            </div>
            <div class="card-body">
                <form action="/admin/proseslogin" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" id="email" name="email" placeholder="email..." />
                    <label for="password">password</label>
                    <input type="password" id="password" name="password" placeholder="password..." />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Login">
                    </div>

                </form>

                <br />
                <br />

            </div>
        </div>
    </div>
</body>

</html><?php /**PATH D:\Laravel\guidemelombok\resources\views/login.blade.php ENDPATH**/ ?>