<!-- connect ke database -->
<?php
   include_once("database/connect.php");


    $query = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data products</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>

    <!-- Menampilkan data order dan customer dalam tabel menggunakan bootstrap -->
    <div class="container">
        <br /><br />
        <a class="btn btn-danger" href="pages/manajemen/tambah-jquery.php">Tambah products</a>
        <br /><br />
        <table id="productsTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Nama produk</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><img src="<?php echo $row['Image']; ?>" alt="<?php echo $row['name']; ?>" height="50"></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><a class="btn btn-primary" href="pages/manajemen/edit-jquery.php?id_product=<?php echo $row['id_product']; ?>">Edit</a></td>
                        <td><a class="btn btn-danger" href="pages/manajemen/delete.php?id_product=<?php echo $row['id_product']; ?>">Delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- memanggil table dengan id=productscustomerTable -->
    <script>
        $(document).ready(function() {
            $('#productsTable').DataTable();
        });
    </script>

</body>
</html>
