<!doctype html>
<html>
    <head>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $title;?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <!--<link rel="shortcut icon" href="/favicon.ico">-->
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template2/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template2/css/iriy-admin.min.css">
        <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/template2/css/demo.css"> -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template2/assets/font-awesome/css/font-awesome.css">

        <link rel="stylesheet" href="<?php echo base_url();?>assets/template2/assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css"/>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template2/css/plugins/rickshaw.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template2/css/plugins/morris.min.css">

        <link rel="stylesheet" href="<?php echo base_url();?>assets/template2/dist/assets/plugins/jquery-icheck/skins/all.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template2/css/plugins/jquery-icheck.min.css">

        <link rel="stylesheet" href="<?php echo base_url();?>assets/template2/assets/plugins/bootstrap-combobox/css/bootstrap-combobox.css">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

        <script type="text/javascript" src="<?php echo base_url();?>assets/scripts/pdf.js"></script>
        <script src="<?php echo base_url();?>assets/template2/assets/libs/jquery/jquery.min.js"></script>

        <script src="<?php echo base_url();?>assets/template2/dist/assets/libs/jquery-ui/minified/jquery-ui.min.js"></script>

        <!--<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/jquery-1.7.1.min.js"></script>-->
        <script type="text/javascript" src="<?php echo base_url();?>assets/scripts/turn.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/scripts/tools.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/scripts/kkp.js"></script>
        
        <script src="<?php echo base_url();?>assets/template2/assets/bs3/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/template2/assets/plugins/jquery-navgoco/jquery.navgoco.js"></script>
        <script src="<?php echo base_url();?>assets/template2/js/main.js"></script>

        <script src="<?php echo base_url();?>assets/template2/dist/assets/plugins/jquery-datatables/js/jquery.dataTables.js"></script>
        <script src="<?php echo base_url();?>assets/template2/dist/assets/plugins/jquery-datatables/js/dataTables.tableTools.js"></script>
        <script src="<?php echo base_url();?>assets/template2/dist/assets/plugins/jquery-datatables/js/dataTables.bootstrap.js"></script>

        <script src="<?php echo base_url();?>assets/template2/assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>

        <script src="<?php echo base_url();?>assets/template2/dist/js/icheck.js"></script>
        <script src="<?php echo base_url();?>assets/template2/dist/assets/plugins/jquery-icheck/icheck.min.js"></script>

        <style type="text/css">
        .iframeku{
            width: 100%;
            height: 600px;
            border-width:0 
        }
        </style>

        <!--[if lt IE 9]>
        <script src="dist/assets/libs/html5shiv/html5shiv.min.js"></script>
        <script src="dist/assets/libs/respond/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <img width="100%" class="navbar-top" src="<?php echo base_url();?>assets/template2/header.jpg">
        <header>
            <?php $this->load->view('templates/sub_templates/navbar-top') ?>
        </header>

        <div class="page-wrapper">
            <aside class="sidebar sidebar-default">
                <div class="sidebar-profile">
                    <img class="img-circle profile-image" src="<?php echo base_url();?>public/USER/<?php echo $this->session->userdata('poto');?>">

                    <div class="profile-body">
                        <h4><?php echo $this->session->userdata('login');?></h4>

                        <div class="sidebar-user-links">
                            <a class="btn btn-link btn-xs" href="pages-profile.html" data-placement="bottom" data-toggle="tooltip" data-original-title="Profile"><i class="fa fa-user"></i></a>
                            <a class="btn btn-link btn-xs" href="javascript:;"       data-placement="bottom" data-toggle="tooltip" data-original-title="Messages"><i class="fa fa-envelope"></i></a>
                            <a class="btn btn-link btn-xs" href="javascript:;"       data-placement="bottom" data-toggle="tooltip" data-original-title="Settings"><i class="fa fa-cog"></i></a>
                            <a class="btn btn-link btn-xs" href="<?php echo base_url();?>home/logout" data-placement="bottom" data-toggle="tooltip" data-original-title="Logout"><i class="fa fa-sign-out"></i></a>
                        </div>
                    </div>
                </div>
               <nav>
                    <!-- <h5 class="sidebar-header">Menu</h5> -->

                    <ul class="nav nav-pills nav-stacked">
                        
                        <?php 
                        $id = $this->session->userdata('level');//get level ID from session
                        echo $this->menu->display_child(0,$id); 
                        ?>

                    </ul>
                </nav>
            </aside>

            <div class="page-content">
                <div class="page-subheading page-subheading-md">
    <!-- <ol class="breadcrumb">
        <li class="active"><a href="javascript:;">Dashboard</a></li>
    </ol> -->
    <?php echo set_breadcrumb();?>
</div>

<!-- <div class="page-heading page-heading-md">
    <h2>Sirkulasi</h2>
</div> -->

<div class="container-fluid-md">
    <?php echo $body;?>
</div>

            </div>
        </div>

        <!--[if lt IE 9]>
        <script src="dist/assets/plugins/flot/excanvas.min.js"></script>
        <![endif]-->

        <!--<script src="<?php echo base_url();?>assets/template2/assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>-->
        
        <!--<script src="demo/js/demo.js"></script>-->

        <!--<script src="<?php echo base_url();?>assets/template2/assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo base_url();?>assets/template2/assets/plugins/jquery-jvectormap/maps/world_mill_en.js"></script>-->

        <!--[if gte IE 9]>-->
        <script src="<?php echo base_url();?>assets/template2/assets/plugins/rickshaw/js/vendor/d3.v3.js"></script>
        <script src="<?php echo base_url();?>assets/template2/assets/plugins/rickshaw/rickshaw.min.js"></script>
		<script src="<?php echo base_url();?>assets/template2/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url();?>assets/template2/assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
        <!--<![endif]-->

        <!--<script src="<?php echo base_url();?>assets/template2/assets/plugins/flot/jquery.flot.js"></script>
        <script src="<?php echo base_url();?>assets/template2/assets/plugins/flot/jquery.flot.resize.js"></script>
        <script src="<?php echo base_url();?>assets/template2/assets/plugins/raphael/raphael-min.js"></script>
        <script src="<?php echo base_url();?>assets/template2/assets/plugins/morris/morris.min.js"></script>
        <script src="<?php echo base_url();?>assets/template2/js/dashboard.js"></script>-->


    </body>
</html>
