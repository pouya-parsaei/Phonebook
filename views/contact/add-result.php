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
    <?php if ($alreadyExists) : ?>
        <div class="alert alert-danger" role="alert"> this number is already Exists</div>
    <?php else : ?>
        <div class="alert alert-<?= $success ? 'success' : 'danger' ?>" role="alert"><?= $message ?></div>
    <?php endif; ?>
    <a href="<?=site_url()?>" class="list-group-item list-group-item-action active w-25" aria-current="true">
    << Go Back
  </a>

</body>

</html>