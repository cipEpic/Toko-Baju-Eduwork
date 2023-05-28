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
    <link rel="icon" type="image/x-icon" href="public\favicon.ico">
</head>

<body>
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
        $status = $row['status'];
        $id_category = $row['id_category'];
    }
    
    // Fetch product sizes
    $productSizes = array();
    $productSizeQuery = mysqli_query($conn, "SELECT size_id FROM product_size WHERE id_product='$id_product'");
    while ($row = mysqli_fetch_array($productSizeQuery)) {
        $productSizes[] = $row['size_id'];
    }
    
    // Fetch all available sizes
    $sizeQuery = mysqli_query($conn, "SELECT * FROM size");
    $size = array();
    while ($row = mysqli_fetch_array($sizeQuery)) {
        $size[$row['size_id']] = $row['name'];
    }
    ?>

    <!-- Menampilkan data order dan customer dalam tabel menggunakan bootstrap -->
    <!-- <div class="container"> <br /> <br /> -->
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
                                <li class="breadcrumb-item active">EditProducts</li>
                            </ol>
                        </div>
                    </div>
                </div>
				<!-- /.container-fluid -->
    </section>

    <div class="row">
        <div class="col-12">
			<div class="card p-lg-5">
                <div class="card-header">
                    <h3 class="card-title">Edit Products</h3>
                </div>
                                
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
                            <td>
                                <select name="status" data-name="status" class="required">
                                    <option value="available">available</option>
                                    <option value="not_available">not_available</option>
                                    <option value="restock">restock</option>
                                </select>
                            </td>
                        </tr>
                            <td>kategori</td>
                            <td>
                                <select name="id_category" data-name="Kategori" class="required">
                                    <!-- Populate the options dynamically from your database -->
                                    <?php
                                        include_once("database/connect.php");
                                        $categories = mysqli_query($conn, "SELECT * FROM categories");

                                        while ($row = mysqli_fetch_assoc($categories)) {
                                            echo '<option value="' . $row['id_category'] . '">' . $row['name'] . '</option>';
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                            <td>size</td>
                            <td>
                                <?php
                                    $sizes = mysqli_query($conn, "SELECT * FROM size");
                                    while ($row = mysqli_fetch_assoc($sizes)) {
                                        echo '<input type="checkbox" name="sizes[]" value="' . $row['size_id'] . '">' . $row['name'] . '<br>';
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="Submit" value="edit" class="btn btn-danger"></td>
                        </tr>
                    </tbody>
                </table>
            </form>
            </div>
        </div>
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
