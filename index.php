<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Happy or not - Free analytics customer survey</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Custom styles for this template -->
    <link href="custom.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<a href="https://github.com/kjellum"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/38ef81f8aca64bb9a64448d0d70f1308ef5341ab/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png"></a>



    <form method="post">
        <div class="happyornot">
            <div class="container text-center">
                <button type="submit" class="btn btn-success btn-md" name="value" value="HAPPY" >
                    <img src="happy.png" class="responsive smiley">
                </button>

                <button type="submit" class="btn btn-warning btn-md " name="value" value="INTERMIDIATE">
                    <img src="intermidiate.png" class="responsive smiley">
                </button>

                <button type="submit" class="btn btn-danger btn-md" name="value" value="ANGRY">
                    <img src="sad.png" class="responsive smiley">
                </button>
                </form>
            </div>
    </div>

    <div class="credits">Happyornot, free customer survey. By Tommy Hetty Kjellum <a href="https://github.com/kjellum" class="fa fa-github"></a> <a href="https://plus.google.com/u/0/+TommyHettyKjellum" class="fa fa-google-plus-square"></a> <a href="https://www.facebook.com/tommy.kjellum" class="fa fa-facebook-square"></a> <a href="https://www.youtube.com/user/kjellum/" class="fa fa-youtube-square"></a></div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


</body>
</html>

<?php

if(isset($_POST["value"])){

    $input =  $_POST["value"];

    $randomid = rand ( 1 , 99999999999999999999999999999999999999999999 );
    $sitename = "MyStoreName";
    $name = "ConsumerSurvey";
    $analyticstrackingcode = "UA-XXXXXXXX-X";
    $surveyURI = "http://yoursurvyurl.com/";

    $url = "http://www.google-analytics.com/collect?v=1&tid=".$analyticstrackingcode."&cid=".$randomid."&t=event&ec=".$sitename."&ea=" . $name . "&el=" .$input;


    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'happyornot'
    ));
    $resp = curl_exec($curl);

    curl_close($curl);
    header('Location: '.$surveyURI);

}

?>
