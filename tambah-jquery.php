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
    <link rel="stylesheet" href="..\styles\global.css">
	<link rel="icon" type="image/x-icon" href="public\favicon.ico">
</head>

<body>
    <!-- Include navbar -->
    <?php include 'pages\navbar\navbar.html'; ?>

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
                                <li class="breadcrumb-item active">AddProducts</li>
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
                                    <h3 class="card-title">Tambah Products</h3>
                                </div>
        <form id="customerForm" action="prosestambah-jquery.php" method="post">
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
                        <td><input type="text" name="name" data-name="name" class="required"></td>
                    </tr>
                    <tr>
                        <td>link image</td>
                        <td><input type="text" name="Image" data-name="Image" class="required"></td>
                    </tr>
                    <tr>
                        <td>price</td>
                        <td><input type="text" name="price" data-name="price" class="required"></td>
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
                    <tr>
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

	</div>
	</div>
	</div>
	</div>
					
<!-- add size  -->
					<tr>
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
                        <td><input type="submit" name="Submit" value="tambah" class="btn btn-success"></td>
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
                        // Mendapatkan nama kolom dari atribut data-name
                        var columnName = $(this).data('name');

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
