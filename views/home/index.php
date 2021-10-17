<html>

<head>

    <link rel="stylesheet" href="<?= asset_url() ?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= asset_url() ?>css/all.min.css" />
    <link rel="stylesheet" href="<?= asset_url() ?>css/index_style.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>



</head>

<body>



    <div class="jumbotron jum">

        <div class=" navbar">
            <h3>Phone Book <i class="far fa-address-book"></i></h3>

        </div>


        <div class="row">


            <div class="col-lg-4 inp">
                <form action="">
                    <input onkeyup="searchFunction()" name="search" id="myInput" class="form-control mt-2" placeholder="search">
                    <span class="icon text-primary"><i class="fas fa-search"></i></span>
                </form>
                <h5 class="mt-5">Add New Contact</h5>
                <form action="<?= site_url('contact/add') ?>" method="post">
                    <input class="form-control mb-3 mt-3" placeholder="add name" name="name">
                    <input class="form-control mb-3" placeholder="add phone" name="mobile">
                    <input class="form-control mb-3" placeholder="add e-mail" name="email">
                    <button type="submit" class="btn btn-info w-100 btn1">Add</button>
                </form>

            </div>

            <div class="col-lg-8">
                <?php if (!is_null($searchKeyboard)) : ?>
                    <h2 class="mb-3">Search for <span class="text-warning"><?= $searchKeyboard ?></span></h2>
                <?php endif; ?>
                <table id="myTable" class="table text-justify table-striped">

                    <thead class="tableh1">
                        <th class="">ID</th>
                        <th class="">Name</th>
                        <th class="">Phone</th>
                        <th class="">E-mail</th>
                        <th class="">Actions</th>
                        <th class="col-1"></th>
                    </thead>

                    <tbody id="tableBody">
                        <?php foreach ($contacts as $contact) : ?>
                            <tr>
                                <td class=""><?= $contact['id'] ?></td>
                                <td class=""><?= $contact['name'] ?></td>
                                <td class=""><?= $contact['mobile'] ?></td>
                                <td class=""><?= $contact['email'] ?></td>
                                <td class="col-1">
                                    <a href="<?= site_url("contact/delete/{$contact['id']}") ?>"><i class="fas fa-user-times" style="color: red;"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
                <?php for ($i = 1; $i * $pageSize <= $totalContact; $i++) : ?>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="<?= site_url("?page=$i") ?>"><button type="button" class="btn btn-primary btn-info"><?= $i ?></button></a>
                    </div>
                <?php endfor; ?>
            </div>

        </div>

    </div>



    <footer class="text-center">Ahmad Al-Shahawi 2019.All rights reserved</footer>

    <script src="<?= asset_url() ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= asset_url() ?>js/popper.min.js"></script>
    <script src="<?= asset_url() ?>js/bootstrap.min.js"></script>
    <!-- <script src="<?= asset_url() ?>js/index.js"></script> -->
</body>

</html>