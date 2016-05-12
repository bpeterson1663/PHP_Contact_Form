<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="styles/style.css" rel="stylesheet" />
    <?php
      if ($_POST['submit']) {
        $result='<div class="alert alert-success">Form Submitted</div>';
        if (!$_POST['name']){ //checks if name exists. If not executes code
          $error="<br/>Please enter your name";
        }
        if (!$_POST['email']){ //checks if email exists. If not executes code
          $error.="<br/>Please enter your email";
        }
        if (!$_POST['comment']){ //checks if comment exists. If not executes code
          $error.="<br/>Please enter your comment";//$error.= will append the message to the error if there are multiple errors
        }
        if ($error) {
          $result='<div class="alert alert-danger"><strong>There were error(s) in the form:'.$error.'</strong></div>';
        }
        else{
          //checks to see mail worked and then echos the result in the form
          $mail = mail("bpeterson1663@gmail.com","Comment From Website!", "Name: ".$_POST['name']." Email: ".$_POST['email']." Comment: ".$_POST['comment'])
          if($mail){
            $result='<div class="alert alert-success"><strong>Thank you!</strong> We will be in touch.</div>';
          }else {
            $result='<div class="alert alert-danger"><strong>Sorry, there was an error with sending your message. Please try again.</strong></div>';
          }
        }

      }
     ?>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 email-form">
          <h1>Email Form</h1>
          <?php echo $result;?>
          <p class="lead">I want to hear what you have to say</p>
          <form method="post">
            <div class="form-group">
              <label for="name">Name: </label>
              <input type="text" name="name" class="form-control" placeholder="Your Name" value="<?php echo $_POST['name'];?>"/>
            </div>
            <div class="form-group">
              <label for="email">Email: </label>
              <input type="email" name="email" class="form-control" placeholder="Your Email Address"  value="<?php echo $_POST['email'];?>"/>
            </div>
            <div class="form-group">
              <label for="comment">Comment: </label>
              <textarea name="comment" class="form-control"  value="<?php echo $_POST['comment'];?>"></textarea>
            </div>
            <input type="submit" class="btn btn-success btn-lg" value="Submit" name="submit" />
          </form>
        </div>
      </div>
    </div>

  </body>
</html>
