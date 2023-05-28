<!-- connect ke database -->
<?php
   include_once("database/connect.php");

   $query = mysqli_query($conn, "SELECT products.*, categories.name AS category_name, GROUP_CONCAT(size.name SEPARATOR ', ') AS size_names
                                FROM products
                                INNER JOIN categories ON products.id_category = categories.id_category
                                LEFT JOIN product_size ON products.id_product = product_size.id_product
                                LEFT JOIN size ON product_size.size_id = size.size_id
                                GROUP BY products.id_product");
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body class="hold-transition sidebar-mini">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- <h1>DataTables</h1> -->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataProducts</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Products</h3>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <a href="tambah-jquery.php" class="btn btn-info" role="button">ADD CLOTHES</a>
                                    <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                <tr>
                    <th>Nama produk</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Category</th>
                    <th>Sizes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td class="text-center"><img src="<?php echo $row['Image']; ?>" alt="<?php echo $row['name']; ?>" height="50"></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['category_name']; ?></td>
                        <td><?php echo $row['size_names']; ?></td>
                        <td class="text-center">
                        <a class="btn btn-primary" href="edit-jquery.php?id_product=<?php echo $row['id_product']; ?>">Edit</a>
                        <a class="btn btn-danger" href="delete.php?id_product=<?php echo $row['id_product']; ?>">Delete</a>
                                                    </td>
                    </tr>
                <?php } ?>
            </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>Nama produk</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Category</th>
                    <th>Sizes</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>


</body>
</html>
