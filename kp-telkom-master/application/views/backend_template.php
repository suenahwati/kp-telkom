<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KP-Telkom</title>

    <!-- Custom CSS -->
    <link href="<?php asset_back('css/thumbnail-gallery.css')?>" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php asset_back('plugins/dataTables/css/jquery.dataTables.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php asset_back('plugins/dataTables/css/buttons.dataTables.min.css')?>"/>
    <link rel="stylesheet" type="text/css" href="<?php asset_back('plugins/bootstrap-3.3.7/dist/css/bootstrap.min.css')?>">
    <script src="<?php asset_back('js/jquery.min.js')?>"></script>
    <script src="<?php asset_back('plugins/bootstrap-3.3.7/dist/js/bootstrap.min.js')?>"></script>
    <!-- dataTables -->
    <script type="text/javascript" src="<?php asset_back('plugins/dataTables/js/jquery.dataTables.min.js')?>"></script>
    <script type="text/javascript" src="<?php asset_back('plugins/dataTables/js/dataTables.buttons.min.js')?>"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        .navbar-inverse {
            background-color: #fff;
            border-color: #e41b13 !important;
        }

        .navbar-inverse .navbar-brand {
            color: #fff !important;
        }

        a.navbar-brand.logo {
            width: 190px;
            display: block;
            text-indent: -9999px;
            background: url(<?php asset_back('images/logo.png')?>) no-repeat;
        }

        .navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:focus, .navbar-inverse .navbar-nav>.active>a:hover {
            color: #fff;
            background-color: #e41b13 !important;
        }

        .navbar-inverse .navbar-nav>li>a:hover {
            background-color: #e41b13 !important;
        }

        .navbar-inverse .navbar-nav .active>li>a:hover {
            background-color: #e41b13 !important;
        }
        .dt-button {
/*            color: #fff !important;
            background-color: #5cb85c !important;
            border-color: #4cae4c !important;*/
            background-image: unset !important;
/*            border: 1px solid transparent !important;*/
            border-radius: 4px !important;
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
                <a class="navbar-brand logo" href="<?php echo base_url() ?>"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Input Data
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Input Data Odp</a></li>
                          <li><a href="#">Input Progress Capex</a></li>
                        </ul>
                      </li>
                    <li><a href="<?php echo base_url('upload-data') ?>">Upload Data</a></li>
                    <li><a href="<?php echo base_url('maps') ?>">Lihat Maps</a></li>
                    <li><a href="<?php echo base_url('user') ?>">User</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($this->session->userdata('logged_in')): ?>
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('logged_in')['full_name']?></a></li>
                        <li><a href="<?php echo base_url('logout') ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>                        
                    <?php else:?>
                        <li><a href="<?php echo base_url('sign-up') ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="<?php echo base_url('login') ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php endif ?>
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


    <!-- Bootstrap Core JavaScript -->
    <script src="<?php asset_back('js/bootstrap.min.js')?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

</body>

</html>