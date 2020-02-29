<?php
class singleton_encabezado_login
{
    private static $instance = null;

    private function singleton_encabezado_login($titulo)
    {
?>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <!doctype html>
        <html lang="en">

        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Fonts -->
            <link rel="dns-prefetch" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

            <link rel="stylesheet" href="css/style.css">

            <link rel="icon" href="Favicon.png">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

            <title><?php echo $titulo?></title>
        </head>

        <body>
        <body>
            <div id="general">

                <div id="centrador" class="text-center" >                    
                <img class="img-fluid" height="300" width="300" src="./public/img/logo1.png" >                    
                </div>
            </div>
    <?php
    }
    public static function getInstance($title)
    {
        if (self::$instance ==null) {
            self::$instance = new singleton_encabezado_login($title);
        }

        return self::$instance;
    }
}
