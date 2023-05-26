<!DOCTYPE html>
<html>
        <head>
                <title>Data Customer</title>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
                <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
                <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
        </head>

          <!-- Include navbar -->
  <?php include 'pages\navbar\navbar.html'; ?>
        <?php
                include_once("database/connect.php");

                $id_product = $_GET['id_product'];

                $query = mysqli_query($conn, "SELECT * FROM products WHERE id_product='$id_product'");

                while ($row = mysqli_fetch_array($query)) {
                        $name = $row['name'];
                        $Image = $row['Image'];
                        $price = $row['price'];
                        $status = $row['stat$status'];
                        $id_category = $row['id_category'];
                }
        ?>

        <body>
                <!-- Menampilkan data order dan customer dalam tabel menggunakan bootstrap -->
                <div class="container"> <br /> <br />
                        <form id="customerForm" action="prosesedit-jquery.php?id_product=<?php echo $id_product; ?>" method="post">
                                <table class="table table-striped">
                                        <thead>
                                                <tr>
                                                        <th>Nama Data</th>
                                                        <th>Input Data</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
							<td>nama baju</td>
                                                        <td><input type="text" name="name" value="<?php echo $name; ?>" class="required"></td>
                                                </tr>
                                                <tr>
							<td>link image</td>
                                                        <td><input type="text" name="Image" value="<?php echo $Image; ?>" class="required"></td>
                                                </tr>
                                                						<tr>
							<td>price</td>
                                                        <td><input type="text" name="price" value="<?php echo $price; ?>" class="required"></td>
                                                </tr>
                                                						<tr>
							<td>status</td>
                                                        <td><input type="text" name="status" value="<?php echo $status; ?>" class="required"></td>
                                                </tr>
                                                						<tr>
							<td>kategori</td>
                                                        <td><input type="text" name="id_category" value="<?php echo $id_category; ?>" class="required"></td>
                                                </tr>
                                                						<tr>
							<td></td>
                                                        <td><input type="submit" name="Submit" value="edit" class="btn btn-danger"></td>
                                                </tr>
                                        </tbody>
                                </table>
                        </form>
                </div>
        
                <script>
                        $(document).ready(function() {
                        $('#customerForm').submit(function(e) {
                                e.preventDefault(); // Mencegah pengiriman form

                                // Menghapus pesan error yang mungkin ada
                                $('.error').remove();

                                // Cek setiap input dengan class "required"
                                $('.required').each(function() {
                                if ($(this).val() === '') {
                                        // Mendapatkan nama kolom dari label input
                                        var columnName = $(this).closest('tr').find('td:first').text();

                                        // Jika input kosong, tambahkan pesan error dan beri warna merah di kolomnya
                                        $(this).after('<span class="error">' + columnName + ' is required</span>');
                                        $(this).css('border-color', 'red');
                                }
                                });

                                // Jika tidak ada input yang kosong, submit form
                                if ($('.error').length === 0) {
                                $(this).unbind('submit').submit();
                                }
                        });

                        // Menghapus pesan error dan warna merah saat input diubah
                        $('.required').keyup(function() {
                                $(this).next('.error').remove();
                                $(this).css('border-color', '');
                        });
                        });
                </script>

                  <!-- Include footer -->
  <?php include 'pages\footer\footer.html'; ?>
        </body>
</html>
