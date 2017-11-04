<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Event-Management| Registration</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>adminLTE/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>js/admin/plugins/iCheck/square/blue.css">

    </head>
    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <b>Event-Management</b>
            </div>
            <div class="register-box-body">
                <p class="login-box-msg">Register a new membership</p>
                <form action="" method="post" onsubmit="return false;" id="registration_form">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Full name">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name">
                        <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-4"></div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="save_user();">Register</button>
                        </div>
                        <div class="col-xs-4"></div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-xs-12" style="padding-top: 13px;">
                        <a href="<?php $base_url ?>login" class="btn btn-block btn-social btn-success btn-flat" style="text-align: center;"><i class="fa fa-user"></i>I already have a membership</a>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: center;">
            <strong>Copyright &copy; 2017 Event-Managemen. All Rights Reserved.</strong>
        </div>
        <!-- jQuery 2.2.3 -->
        <script src="<?php echo base_url(); ?>js/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url(); ?>js/admin/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>js/admin/plugins/iCheck/icheck.min.js"></script>
        <script src="<?php echo base_url(); ?>js/admin/plugins/bootstrap-notify/bootstrap-notify.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/notifications.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/utility.js"></script>
        <script>
                                $(function () {
                                    $('input').iCheck({
                                        checkboxClass: 'icheckbox_square-blue',
                                        radioClass: 'iradio_square-blue',
                                        increaseArea: '20%' // optional
                                    });
                                });
        </script>
        <script type="text/javascript">
            function save_user() {
                var userFormData = $('#registration_form').serializeFormJSON();
                if (userFormData.user_name == "") {
                    showError('Please Enter Full Name');
                    $('#user_name').focus();
                    return false;
                }
                if (userFormData.user_email == "") {
                    showError('Please Enter Email Address');
                    $('#user_email').focus();
                    return false;
                }
                if (userFormData.user_password == "") {
                    showError('Please Enter Password');
                    $('#user_password').focus();
                    return false;
                }
                if (userFormData.mobile_number == "") {
                    showError('Please Enter Mobile Number');
                    $('#mobile_number').focus();
                    return false;
                }
                $.ajax({
                    type: 'POST',
                    url: "signup/create",
                    data: userFormData,
                    error: function (textStatus, errorThrown) {
                        showError('Some unexpected database error encountered due to which your transaction could not be completed');
                    },
                    success: function (data) {
                        var parseData = JSON.parse(data);
                        if (parseData.success == false) {
                            showError(parseData.message);
                            return false;
                        }
                        window.location = '<?php echo base_url() . "login" ?>';
                        showSuccess('You have Succesfully Registered');
                    }
                });
            }
        </script>
    </body>
</html>
