<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>WEB APPLICATION</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <h3 class="login-box-msg">PT. Permana Putra Mandiri</h3>
      <form class="form-horizontal" role="form" action="<?php echo site_url('login/proses');?>" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
          </div>
          
          <!-- /.col -->
        </div>
      </form>
  </div>
       <?php echo $this->session->flashdata('message');?>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->