<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/admin/public/img/dispora.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title ?> </title>

    <link href="<?php echo base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          	<?php
				echo validation_errors('<div class="alert alert-success">','</div>');
				if($this->session->flashdata('warning')){
					echo '<div class="alert alert-warning">';
					echo $this->session->flashdata('warning');
					echo '</div>';
				}
				if($this->session->flashdata('sukses')){
					echo '<div class="alert alert-success">';
					echo $this->session->flashdata('sukses');
					echo '</div>';
				}

				echo form_open(base_url('login'));
			?>
            <form>
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-dark btn-block">Sign In</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <br />
                <div>
                  <h1><i class="fa fa-ship"></i> Ferry Nusantara!</h1>
                  <p>©2022 All Rights Reserved. Ferry Nusantara! <a href="https://barajacoding.com">BarajaCoding</a></p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
