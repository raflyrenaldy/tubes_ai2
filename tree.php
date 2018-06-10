<?php

// Open Connection
$con = @mysqli_connect('localhost', 'root', '', 'db_ai');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}

// Some Query


// Close connection


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
<link rel="shortcut icon" href="images/logo-favicon.png" type="image/png">

  <title>Decision Tree</title>

  <!--icheck-->
  <link href="js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
  <link href="js/iCheck/skins/square/square.css" rel="stylesheet">
  <link href="js/iCheck/skins/square/red.css" rel="stylesheet">
  <link href="js/iCheck/skins/square/blue.css" rel="stylesheet">

  <!--dashboard calendar-->
  <link href="css/clndr.css" rel="stylesheet">

  <!--Morris Chart CSS -->
  <link rel="stylesheet" href="js/morris-chart/morris.css">

  <!--common-->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">




  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="sticky-header left-side-collapsed">

<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->

        <div class="logo-icon text-center">
          <a href="index.php"><img src="images/logo.png" alt="" width="80%" height="80%"></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

                
         

            <!--sidebar nav start-->
           <ul class="nav nav-pills nav-stacked custom-nav">
                <li ><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                <li ><a href="data2.php"><i class="fa fa-book"></i> <span>Tambah Data</span></a>
                   
                </li>
                <li><a href="data3.php"><i class="fa fa-book"></i> <span>Decision Making</span></a>
                   
                </li>
                <li><a href="data4.php"><i class="fa fa-book"></i> <span>Hasil Data</span></a>
                   
                </li>
                <li class="active"><a href="tree.php"><i class="fa fa-sitemap"></i> <span>Decision Tree</span></a>
                   
                </li>

            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

            <!--toggle button start-->
           
            <!--toggle button end-->

            <!--search start-->
           
                <h4 class="">Machine Learning with Decision Tree C.45</h4>
      
            <!--search end-->

            <!--notification menu start -->
            
        </div>
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
            <h3>
                Decision Tree
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li class="active"> Decision Tree </li>
            </ul>
            <div class="state-info">
                <section class="panel">
                    <div class="panel-body">
                        <div class="summary">
                            <span>Jumlah Data</span>
                            <h3 class="red-txt">5306</h3>
                        </div>
                        <div id="income" class="chart-bar"></div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
       <div class="wrapper">
             <div class="row">
                <div class="col-sm-12">
                <section class="panel">
                <header class="panel-heading">
                    Decision Tree
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                     </span>
                </header>
                <div class="panel-body">
                <div class="adv-table editable-table ">
                <div class="clearfix">
                   
                </div>
                  <?php
    $con = @mysqli_connect('localhost', 'root', '', 'db_ai');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
      echo "<h2>Pohon Keputusan Menggunakan Algoritma C45</h2>";
    echo "<font face='Courier New' size='2'>";
    generatePohonC45('0', 0);
    echo "</font>";
    


function generatePohonC45($idparent, $spasi){
     $con = @mysqli_connect('localhost', 'root', '', 'db_ai');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
    $result = mysqli_query($con,"select * from pohon_keputusan_c45 where id_parent= '$idparent'");
    while($row=mysqli_fetch_row($result)){
        for($i=1;$i<=$spasi;$i++){
            echo "|&nbsp;&nbsp;";
        }
        
        if ($row[6] === '>50k') {
            $keputusan = "<font color=green>$row[6]</font>";
        } elseif ($row[6] === '<=50k') {
            $keputusan = "<font color=red>$row[6]</font>";
        } elseif ($row[6] === '?') {
            $keputusan = "<font color=blue>$row[6]</font>";
        } else {
            $keputusan = "<b>$row[6]</b>";
        }
        echo "<font color=red>$row[1]</font> = $row[2] (>50k = $row[4], <=50k= $row[5]) : <b>$keputusan</b><br>";

        /*panggil dirinya sendiri*/
        generatePohonC45($row[0], $spasi + 1);
    }
}
    echo "<br><br>
    <table>
    <h2>Keterangan Hasil dari Pohon Keputusan:</h2><hr>
    <tr><td width='80px;' style='color:green;'>>50K</td> <td>:</td><td>Pendapatan lebih dari 50.000</td></tr>
    <tr><td style='color:red;'><=50K</td> <td>:</td><td>Pendapatan kurang dari sama dengan 50.000</td></tr>
    </table>";
  echo "<br><br><br><br><br>";
    ?>
                </div>
                </div>
                </section>
                </div>
                </div>
        </div>
        <!--body wrapper end-->

        <!--footer section start-->
        <footer>
            2018 &copy; AdminEx by ThemeBucket
        </footer>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>
  <!--data table-->
  <link rel="stylesheet" href="js/data-tables/DT_bootstrap.css" />
<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>

<!--easy pie chart-->
<script src="js/easypiechart/jquery.easypiechart.js"></script>
<script src="js/easypiechart/easypiechart-init.js"></script>

<!--Sparkline Chart-->
<script src="js/sparkline/jquery.sparkline.js"></script>
<script src="js/sparkline/sparkline-init.js"></script>

<!--icheck -->
<script src="js/iCheck/jquery.icheck.js"></script>
<script src="js/icheck-init.js"></script>

<!-- jQuery Flot Chart-->
<script src="js/flot-chart/jquery.flot.js"></script>
<script src="js/flot-chart/jquery.flot.tooltip.js"></script>
<script src="js/flot-chart/jquery.flot.resize.js"></script>


<!--Morris Chart-->
<script src="js/morris-chart/morris.js"></script>
<script src="js/morris-chart/raphael-min.js"></script>

<!--Calendar-->
<script src="js/calendar/clndr.js"></script>
<script src="js/calendar/evnt.calendar.init.js"></script>
<script src="js/calendar/moment-2.2.1.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>

<!--common scripts for all pages-->
<script src="js/scripts.js"></script>

<!--Dashboard Charts-->
<script src="js/dashboard-chart-init.js"></script>
<!--data table-->
<script type="text/javascript" src="js/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/data-tables/DT_bootstrap.js"></script>



<!--script for editable table-->
<script src="js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
</script>

</body>
</html>
<?php mysqli_close ($con); ?>