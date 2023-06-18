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
                    <!-- Add a share button -->
                    <div id = "share_button">
                        <button onclick="sharePost()">Share on Facebook</button>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
    

            <!-- Load Facebook SDK for JavaScript -->
            <div id="fb-root"></div>
                <script>
                    window.fbAsyncInit = function() {
                    FB.init({
                        appId: '265490552822190',
                        status: true,
                        cookie: true,
                        xfbml: true
                    });
                    };
                    (function() {
                    var e = document.createElement('script');
                    e.async = true;
                    e.src = document.location.protocol +
                        '//connect.facebook.net/en_US/all.js';
                    document.getElementById('fb-root').appendChild(e);
                    }());
                </script>

                <script type="text/javascript">
                    $(document).ready(function() {
                    $('#share_button').click(function(e) {
                        e.preventDefault();
                        FB.ui({
                        method: 'feed',
                        // name: '-',
                        link: 'https://github.com/cipEpic'
                        // picture: 'header.jpg',
                        // caption: '-',
                        // description: "-",
                        // message: ""
                        });
                    });
                    });
                </script>


                <!-- DOC FROM FACEBOOK -->
                <!-- <h1>Sharing using FB.ui() Dialogs</h1>

                <p>Below are some simple examples of how to use UI dialogs in a web page.</p>

                <h3>Sharing Links</h3>

                <div id="shareBtn" class="btn btn-success clearfix">Share Dialog</div>

                <p>The Share Dialog enables you to share links to a person's profile without them having to use Facebook Login. <a href="https://developers.facebook.com/docs/sharing/reference/share-dialog">Read our Share Dialog guide</a> to learn more about how it works.</p>

                <script>
                document.getElementById('shareBtn').onclick = function() {
                FB.ui({
                    display: 'popup',
                    method: 'share',
                    href: 'https://developers.facebook.com/docs/',
                }, function(response){});
                }
                </script>

                <h3>Publishing Open Graph Stories</h3>

                <p>The Share Dialog can also be used to publish Open Graph stories without using Facebook Login or the Graph API. <a href="https://developers.facebook.com/docs/sharing/reference/share-dialog">Read our Share Dialog guide</a> to learn more about how it works.</p>

                <div id="ogBtn" class="btn btn-success clearfix">Simple OG Dialog</div>

                <script>
                document.getElementById('ogBtn').onclick = function() {
                FB.ui({
                    display: 'popup',
                    method: 'share_open_graph',
                    action_type: 'og.likes',
                    action_properties: JSON.stringify({
                        object:'https://developers.facebook.com/docs/',
                    })
                }, function(response){});
                }
                </script>

                <h3>Sending App Requests</h3>

                <p><a href="https://developers.facebook.com/docs/games/requests/">Requests</a> can be sent by any Facebook Apps that are categorised as Games and have a Canvas, iOS, or Android implementation. The JavaScript SDK enables web Canvas games to send requests. <a href="https://developers.facebook.com/docs/games/requests/">Read our guide to Requests</a> to learn more and see more complex examples that you could use.</p>

                <div id="requestsBtn" class="btn btn-success clearfix">Basic Request Dialog</div>

                <script>
                document.getElementById('requestsBtn').onclick = function() {
                FB.ui({method: 'apprequests',
                    message: 'This is a test message for the requests dialog.'
                }, function(data) {
                    Log.info('App Requests Response', data);
                });
                }
                </script> -->


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
