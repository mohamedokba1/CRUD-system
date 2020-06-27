<?php
require_once('php/component.php');
require_once('php/operations.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>

    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="layer"></div>

    <main>

        <div class="p-0 container-fluid text-center">
            <div class=" bg-dark rounded-bottom mt-0 py-1 ">
                <h1 class="text-light  py-1"><i class="fas fa-swatchbook"></i> Book Store</h1>
            </div>


            <div class="d-flex justify-content-center">
                <form action="" method="post" class="w-50">
                    <div class="pt-2">
                        <?php inputElement('<i class="fas fa-id-badge"></i>', "ID", 'book_id', setId()); ?>
                    </div>
                    <div class="pt-2">
                        <?php inputElement('<i class="fas fa-book"></i>', "Book Name", 'book_name', ''); ?>
                    </div>
                    <div class="row pt-2">
                        <div class="col">
                            <?php inputElement('<i class="fas fa-people-carry " ></i>', "Publisher", 'book_publisher', ''); ?>
                        </div>
                        <div class="col">
                            <?php inputElement('<i class="fas fa-dollar-sign"></i>', "Price", 'book_price', ''); ?>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php inputButtton('btn-create', '<i class="fas fa-plus"></i>', 'btn btn-success', 'create', 'data-toggle="tooltip" data-placement="bottom" title="Create"'); ?>
                        <?php inputButtton('btn-read', '<i class="fas fa-sync"></i>', 'btn btn-primary', 'read', 'data-toggle="tooltip" data-placement="bottom" title="Read"'); ?>
                        <?php inputButtton('btn-update', '<i class="fas fa-pen-alt"></i>', 'btn btn-light border', 'update', 'data-toggle="tooltip" data-placement="bottom" title="Update"'); ?>
                        <?php inputButtton('btn-delete', '<i class="fas fa-trash-alt"></i>', 'btn btn-danger', 'delete', 'data-toggle="tooltip" data-placement="bottom" title="Delete"'); ?>
                        <?php deleteBtn() ?>
                    </div>
                </form>
            </div>

            <!-- Bootstrap table-->

            <div class="d-flex ">
                <table class="table table-striped table-dark">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Book Name</th>
                            <th>Publisher</th>
                            <th>Book Price</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        if (isset($_POST['read'])) {
                            $result = getData();

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                    <tr>
                                        <td data-id="<?php echo $row['id'] ?>"><?php echo $row['id'] ?></td>
                                        <td data-id="<?php echo $row['id'] ?>"><?php echo $row['book_name'] ?></td>
                                        <td data-id="<?php echo $row['id'] ?>"><?php echo $row['publisher'] ?></td>
                                        <td data-id="<?php echo $row['id'] ?>"><?php echo '$' . $row['price'] ?></td>
                                        <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id'] ?>"></i></td>
                                    </tr>
                        <?php
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="php/javascript.js"></script>
</body>

</html>