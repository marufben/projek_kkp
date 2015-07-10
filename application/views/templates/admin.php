<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">

<meta http-equiv="X-UA-Compatible" content="chrome = 1">
<link type="text/css" href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet" media="screen" />

<link href="<?php echo base_url();?>assets/template1/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/template1/css/bootstrap-responsive.min.css" rel="stylesheet">

<!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">-->

<link href="<?php echo base_url();?>assets/template1/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/template1/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/template1/css/pages/dashboard.css" rel="stylesheet">

<link href="<?php echo base_url();?>assets/template1/js/data-tables/DT_bootstrap.css" type="text/css" rel="stylesheet">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/jquery.js"></script>
<script src="<?php echo base_url();?>assets/template1/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/turn.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/tools.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/pdf.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/jquery-1.7.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/global/scripts/highchart/highcharts.js"></script>
<script src="<?php echo base_url() ?>assets/global/scripts/highchart/modules/exporting.js"></script>-->
<script src="<?php echo base_url();?>assets/template1/js/data-tables/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url();?>assets/template1/js/data-tables/DT_bootstrap.js"></script>


</head>
<body>
<div class="navbar navbar-fixed-top">
  <img width="100%" src="<?php echo base_url();?>assets/template1/banner.jpg">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="#">E-LAKIP MABES TNI</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <!--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Settings</a></li>
              <li><a href="javascript:;">Help</a></li>
            </ul>
          </li>-->
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> <?php echo $this->session->userdata('login');?><b class="caret"></b></a>
            <ul class="dropdown-menu">
<!--               <li><a href="javascript:;">Profile</a></li> -->
              <li><a href="<?php echo base_url();?>home/logout">Logout</a></li>
            </ul>
          </li>
        </ul>
        <!--<form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form>-->
      </div>
      <!--/.nav-collapse 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <?php 
        $id = 1;//get level ID from session
        //echo $this->menu->display_child(0,$id); 
        ?>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
	
	      <?php echo $body; ?>
            
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->

<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2015 <a href="#">E-LAKIP MABES TNI</a>. </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<!--<script src="<?php //echo base_url();?>/public/template1/js/jquery-1.7.2.min.js"></script> -->

<script src="<?php echo base_url();?>assets/template1/js/excanvas.min.js"></script> 
<script src="<?php echo base_url();?>assets/template1/js/chart.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>assets/template1/js/bootstrap.js"></script>

<script language="javascript" type="text/javascript" src="<?php echo base_url();?>assets/template1/js/full-calendar/fullcalendar.min.js"></script>
 
<script src="<?php echo base_url();?>assets/template1/js/base.js"></script>
<script type="text/javascript">
function goBack() {
	window.history.back();
}
</script>
</body>
</html>
