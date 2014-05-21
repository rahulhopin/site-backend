<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/_c_bootstrap/index.css">
    <style>
      body { 
        padding-top: 60px;
        /*padding-bottom: 65px;*/
      }
    </style>

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>  
    <script type="text/javascript" 
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7B_JmOOy1C9lCXhRJhdLXUeZ36P_1RuM&libraries=places&sensor=false">
      </script>

      <script src="/js/index.js"></script>  
    </head>
    <body>
      <?php require("navbar.php")  ?>
      <div id="wrap">
        <div class="container">
          <?php require("showoffbar.php")  ?>
          <?php if(isset($contentscript)) require("$contentscript");  ?>
          <?php require("footer.php")  ?>
        </body>
      </html>
