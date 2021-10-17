<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= asset_url() ?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= asset_url() ?>css/all.min.css" />
    <title>Result</title>
</head>

<body>
    <?php if ($deletedCount) : ?>
        <div class="alert alert-success" role="alert"> Contact Deleted Successfully</div>
    <?php else : ?>
        <div class="alert alert-danger" role="alert">Contact Does Not Exist</div>
    <?php endif; ?>
    <div class="row">
        <div class="col m-3 text-center">
            <img src="<?= asset_url('images/loading.gif') ?>">
            Redirecting to Home...
            <script>
                setTimeout(function(){
                    location.href = '<?= site_url() ?>'
                }, 1000);
            </script>
        </div>
    </div>

</body>

</html>