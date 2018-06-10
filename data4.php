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

  <title>Hasil Data</title>
  <!--dynamic table-->
  <link href="js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="js/data-tables/DT_bootstrap.css" />

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
                <li><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                <li ><a href="data2.php"><i class="fa fa-book"></i> <span>Tambah Data</span></a>
                   
                </li>
                <li><a href="data3.php"><i class="fa fa-book"></i> <span>Decision Making</span></a>
                   
                </li>
                <li  class="active"><a href="data4.php"><i class="fa fa-book"></i> <span>Hasil Data</span></a>
                   
                </li>
                <li><a href="tree.php"><i class="fa fa-sitemap"></i> <span>Decision Tree</span></a>
                   
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
           
            <!--notification menu end -->

        </div>
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
            <h3>
                Hasil Data
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php">Dashboard</a>
                </li>
                <li class="active"> Hasil Data </li>
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
                <section class="panel">
                    <div class="panel-body">
                        <div class="summary">
                            <span>Sampel Data</span>
                            <h3 class="red-txt"><?php
                                $sql2    = 'SELECT COUNT(*) as total FROM sample';
                        
                                        $query1  = mysqli_query($con, $sql2);
                                        while ($row = $query1->fetch_assoc()) {
                                        echo $row['total']."<br>";
}
                             ?></h3>
                        </div>
                        <div id="income" class="chart-bar"></div>
                    </div>
                </section>
        
        </div>
    </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
        <section class="panel">
            <header class="panel-heading">
                Hasil Perhitungan Data
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                </span>
            </header>
            <?php
           $count = 0;
            $persen = 0;
            $query21 = mysqli_query($con,'SELECT income FROM SAMPLE3');
            $query22 = mysqli_query($con,'SELECT income FROM SAMPLEPERCOBAAN');
           while ( $data2 = mysqli_fetch_array($query22)){
            $data1 = mysqli_fetch_array($query21);
                $persen++;
            $d1 = $data1['income'];

            $d2 = $data2['income'];
            
            if( $d1 == $d2){
            $count++;   

            }
             
        }$tot = $count/$persen*100;
             ?> 
            <div class="panel-body">
                 <p>Data Yang Sama</p>
                <p><?php echo $count ?></p>
                <p>Persentase Akurat</p>
                <p><?php echo $tot ?>%</p>
            </div>
        </section>
    </div>
      <div class="wrapper">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Tabel Sampel Data
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
        </header>
        <div class="panel-body">
        <div class="adv-table">
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
        <tr>
                      <th>No</th>
                  
     
    <th>Ed num</th>
 

    <th>Race</th>
    <th>Sex</th> 
     <th>Relationship</th>
      <th>Occupation</th>
       <th>Income</th>
        </tr>
        </thead>
        <tbody>
       
            <?php
$sql2    = 'SELECT * FROM SAMPLEPERCOBAAN';
$rowss = 1;
$query1  = mysqli_query($con, $sql2);
while ($row2 = mysqli_fetch_array($query1))
{  
    ?>
            
        <tr class="">
           <td><?php echo $rowss++?></td>
         
          
           <td><?php echo $row2['education_num']?></td>
        
           <td><?php echo $row2['Race']?></td>
           <td><?php echo $row2['Sex']?></td>         
           <td><?php echo $row2['Relationship']?></td>
           <td><?php echo $row2['Occupation']?></td>
           <td><?php echo $row2['Income']?></td>
           </tr>
        
           </tr>
       <?php
    } //end while
  

?> 
     
       
        </tr>
        </tbody>
       
        </table>
        </div>
        </div>
        </section>
        </div>
     
    <div class="wrapper">
             <div class="row">
                <div class="col-sm-12">
                <section class="panel">
                <header class="panel-heading">
                    Tabel Hasil Data
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                     </span>
                </header>
                <div class="panel-body">
                <div class="adv-table editable-table ">
                <div class="clearfix">
                    
                </div>
                <div class="space15"></div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                <thead>
                <tr>
                   <th>No</th>
   
   
    <th>Ed num</th>
 
   

    <th>Race</th>
    <th>Sex</th> 
     <th>Relationship</th>
      <th>Occupation</th>
       <th>Income</th>
                </tr>
                </thead>
                <tbody>
                
                
                                  <?php
$sql    = 'SELECT * FROM SAMPLEPERCOBAAN';
$rows = 1;
$query  = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($query))
{  
    ?>
      
          <tr class="">
           <td><?php echo $rows++?></td>
                    
           
           <td><?php echo $row['education_num']?></td>
      
         
        
           <td><?php echo $row['Race']?></td>
           <td><?php echo $row['Sex']?></td>         
           <td><?php echo $row['Relationship']?></td>
           <td><?php echo $row['Occupation']?></td>
           <td><?php echo $row['Income']?></td>
           </tr>
           
    <?php
    } //end while
?>
                
                
                </tbody>
                </table>
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

<script type="text/javascript" language="javascript" src="js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/data-tables/DT_bootstrap.js"></script>
<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script>


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