//<?php

// check responsetime for a webbserver
function pingDomain($domain)
{
    $starttime = microtime(true);
    $file = file_get_contents("http://$domain/");
    //echo $file;
    $stoptime = microtime(true);
    $status = 0;

    if (!$file){
        $status = -1;  // Site is down
    }
    else{
        fclose($file);
        $status = ($stoptime - $starttime) * 1000;
        $status = floor($status);
    }
    return $status;
}

function sizeDomain($domain)
{
    $mem1 = memory_get_usage();
    $kfile = file_get_contents("http://$domain/");
    $filesize = memory_get_usage() - $mem1;
    return $filesize;
}

 $ipaddr = $_POST['ipaddr'];
 $output = pingDomain($ipaddr);
  $size = sizeDomain($ipaddr);
 
?>

    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HTTP</title>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- Custom CSS -->
        <link href="assets/css/sb-admin.css" rel="stylesheet">
    </head>

    <body>
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top"><h4><strong>Networking Tools</strong></h4></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="http.html"><h4><strong>Full Page Load Testing Tool</strong></h4></a>
                        </li>
                        <li>
                            <a href="../index.html"><h4><strong>Home</strong></h4></a>
                        </li>
                    </ul>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </div>
        </nav>
        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 text">
                            <h1><strong>RESPONSE TIME IS:  <?php echo $output;?> milliseconds</strong></h1>
                            <h1><strong>PAGE SIZE IS:  <?php echo $size;?> Bytes</strong></h1>
                           <!-- <h1><strong>PAGE STATUS:  <?php //echo $dstatus, "<br>"; echo $size_code, "<br>"; echo $scode, "<br>";?></strong></h1>-->
                    </div>
                         
                </div>
            </div>
        </div>
    </div>


    <!-- Javascript -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/scripts.js"></script>

</body>
</html>