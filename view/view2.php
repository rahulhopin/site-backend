<?php
Class View{

public function getFBLogin(){
 $fbid='107927182711315';

$fb = '	<div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '. $fbid .',
          status     : true,
          xfbml      : true
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/all.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, "script", "facebook-jssdk"));
    </script>';

return $fb;
}

public function paintHead(){ // SEO and other stuff
 print ' <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/_c_bootstrap/index.css">
    <link rel="stylesheet" href="/css/hopin_list_css.css" type="text/css" />
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
    </head>' . $this->getFBLogin() .'

      <nav class="navbar navbar-default navbar-fixed-top navbar-no-bottom-margin" role="navigation">
    <div id="header" class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-home"></span></a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <!-- <li><a href="#">Link</a></li> -->
         ' . $this->generateLogin() . '
        </ul>
      </div><!-- /.navbar-collapse -->
    </div>
    </nav>';

}

public function generateLogin(){

          $html = '<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
          </li>';

	return  $html;
}

public function paintHeader(){
 $this->paintHead();
 print ' <div class="row" id="showoffbar" style="">
            <div class="col-sm-6" style="
              color: gray;
              ">
              <div class="row lead lead-no-bottom-margin" style="
                text-align: center;
                font-size: -webkit-xxx-large;
                ">Welcome to <strong>Hopin</strong>
              </div>

              <div class="row" style="
                text-align: center;
                ">
                <h4 class="lead">A step closer to comfortable and affordable commute.</h4>
              </div>
            </div>
            <div class="col-sm-6 col-sm-offset-0" style="
              ">
              <img src="https://s3-us-west-1.amazonaws.com/hopincomingsoon/images/hopinlogo450x200.png" class="img-responsive" style="
              margin: 0 auto;
              max-width:300px;
              ">
            </div>


          </div>';

}

public function paintFooter(){
  print '   <div id="footer">
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
    </div>';

}

public function renderView($html){
	$this->paintHeader();
	print $html;
	$this->paintFooter();
}

}
?>
