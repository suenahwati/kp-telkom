<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Suenawati - 10115167 - UAS ATOL</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php asset_back('css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php asset_back('css/thumbnail-gallery.css')?>" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php asset_back('plugins/dataTables/css/jquery.dataTables.min.css')?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        body{
            /*padding-top: 0px !important;*/
        }
    </style>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>">Home</a>
                <a class="navbar-brand" href="<?php echo base_url('welcome') ?>">Welcome</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <!--     <li>
                        <a href="index.php?page=dashboard">Kementrian Agama </a>
                    </li> -->

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

    	<?php echo $contents ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php asset_back('js/script.js')?>" type="text/javascript"></script>

    <!-- dataTables -->
    <script type="text/javascript" src="<?php asset_back('plugins/dataTables/js/jquery.dataTables.min.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php asset_back('js/bootstrap.min.js')?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

</body>

</html>
