<?php $base_url = base_url(); ?>
<!DOCTYPE html>
<html>
    <head>
        <!--9925342207-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Event-Management-System</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo $base_url; ?>css/admin/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $base_url; ?>js/admin/plugins/select2/select2.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo $base_url; ?>css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo $base_url; ?>css/admin/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo $base_url; ?>adminLTE/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo $base_url; ?>adminLTE/css/skins/_all-skins.min.css">
        <!--AdminLTE Skins. Choose a skin from the css/skins-->
        <link rel="stylesheet" href="<?php echo $base_url; ?>adminLTE/css/skins/_all-skins.min.css">
        <!--iCheck-->  
        <link rel="stylesheet" href="<?php echo $base_url; ?>js/admin/plugins/iCheck/flat/blue.css">
        <link rel="stylesheet" href="<?php echo $base_url; ?>js/admin/plugins/pace/pace.min.css">
        <!-- Animation Css -->
        <link rel="stylesheet"  href="<?php echo base_url(); ?>js/admin/plugins/animate-css/animate.css">
        <!-- jvectormap 
        <!-- Date Picker -->
        <!--<link rel="stylesheet" href="<?php echo $base_url; ?>js/plugins/datepicker/datepicker3.css">-->
        <!-- Daterange picker -->
        <!--<link rel="stylesheet" href="<?php echo $base_url; ?>js/plugins/daterangepicker/daterangepicker.css">-->
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?php echo $base_url; ?>js/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link rel="stylesheet" href="<?php echo $base_url; ?>css/admin/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $base_url; ?>js/admin/plugins/datatables/buttons.dataTables.min.css">
        <link rel="stylesheet" href="<?php echo $base_url; ?>css/admin/style.css">
        <link rel="stylesheet" href="<?php echo $base_url; ?>js/admin/plugins/datetimepicker/bootstrap-datetimepicker.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="<?php echo $base_url; ?>js/admin/plugins/timepicker/bootstrap-timepicker.min.css">
        <!--spinner.css-->
        <link rel="stylesheet" href="<?php echo $base_url; ?>css/admin/spinner.css">
        <!-- footer-->
        <!-- jQuery 2.2.3 -->
        <script src="<?php echo $base_url; ?>js/admin/plugins/jQuery/jquery-2.2.3.min.js" type="text/javascript"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo $base_url; ?>js/admin/jquery-ui.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo $base_url; ?>js/admin/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/admin/plugins/select2/select2.full.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="<?php echo $base_url; ?>js/raphael-min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo $base_url; ?>js/admin/moment.min.js" type="text/javascript"></script>
        <!--<script src="<?php echo $base_url; ?>js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>-->
        <!-- datepicker -->
        <!--<script src="<?php echo $base_url; ?>js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo $base_url; ?>js/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/admin/plugins/pace/pace.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/admin/jquery.form.js" type="text/javascript"></script>    
        <script src="<?php echo $base_url; ?>adminLTE/js/app.min.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo $base_url; ?>adminLTE/js/demo.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/admin/jquery.form.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/admin/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/admin/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/admin/plugins/datatables/date-eu.js" type="text/javascript"accountTypeArray></script>

        <!-- Bootstrap Notify Plugin Js -->
        <script src="<?php echo base_url(); ?>js/admin/plugins/bootstrap-notify/bootstrap-notify.js" type="text/javascript"></script>

        <script src="<?php echo $base_url; ?>js/mordanizr.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/underscore.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/backbone.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/handlebars-v4.0.5.js" type="text/javascript"></script>

        <!-- Notification JS-->
        <script src="<?php echo $base_url; ?>js/notifications.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/admin/fuelux/fuelux.spinner.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/admin/ace/elements.spinner.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/admin/plugins/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/utility.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/dateutil.js"></script>
        <!----------file uploading-------------------->
        <link href="<?php echo $base_url; ?>css/uploadfile.min.css" rel="stylesheet">
        <script src="<?php echo $base_url; ?>js/jquery.uploadfile.js"></script>
        <!-- bootstrap time picker -->
        <script src="<?php echo $base_url; ?>js/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <!--------------------------- Template definitions start ------------------------------------------------>
        <script id="option_template" type="text/x-handlebars-template">
            <option value="{{value_field}}">{{text_field}}</option>
        </script>
        <script id="spinner_template" type="text/x-handlebars-template">
            <label class="fa fa-spinner fa-spin"></label>&nbsp;<label class="label-btn-fonts">Processing....</label>
        </script>
        <script id="icon_template" type="text/x-handlebars-template">
            <label class="fa fa-spinner fa-spin"></label>
        </script>
        <!--------------------------------  Template definitions end -------------------------------------------->
        <!--         $(document).ajaxStart(function () {
                        $.ajax({
                            type: 'POST',
                            url: 'main/check_authenticated_for_ajax',
                            success: function (response) {
                                var parseData = JSON.parse(response);
                                if (parseData.success === false) {
                                    window.location = baseUrl + "login";
                                    showError(parseData.message);
                                    return false;
                                }
                            }
                        });
                    });-->
        <script type="text/javascript">
            //------------------------------ These are the pre-compiled templates ---------------------------------
            var basUrl = '<?php echo $base_url; ?>';
            var optionTemplate = Handlebars.compile($("#option_template").html());
            var spinnerTemplate = Handlebars.compile($("#spinner_template").html());
            var iconTemplate = Handlebars.compile($("#icon_template").html());
            var baseUrl = '<?php echo $base_url; ?>';
            //globel arry
            var eventOrganizedForArray = <?php echo json_encode($this->config->item('event_organized_for_array')); ?>;
            var eventTypeArray = <?php echo json_encode($this->config->item('event_type_array')); ?>;
            var userTypeArray = <?php echo json_encode($this->config->item('user_type_array')); ?>;
            var statusArray = <?php echo json_encode($this->config->item('status_array')); ?>;
            var divisionArray = <?php echo json_encode($this->config->item('division_array')); ?>;
            var semesterArray = <?php echo json_encode($this->config->item('semester_array')); ?>;
            var categoryData =<?php echo json_encode($category); ?>;
            var userData =<?php echo json_encode($user_data); ?>;
            var subCategoryData =<?php echo json_encode($sub_category); ?>;
            var IS_ACTIVE_YES =<?php echo IS_ACTIVE_YES ?>;
            var IS_ACTIVE_NO =<?php echo IS_ACTIVE_NO ?>;
            var SUPER_ADMIN =<?php echo SUPER_ADMIN ?>;
            var USER_TYPE =<?php echo get_from_session('user_type'); ?>;

            $(document).ajaxComplete(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>
    <body class="hold-transition skin-blue-light sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <!--<span class="logo-mini"><b>EMS</b></span>-->
                    <!-- logo for regular state and mobile devices -->
                    <!--<span class="logo-lg"><b>Event-Management</b></span>-->
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo $base_url; ?>adminLTE/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs" style="text-transform: capitalize;"><?php echo get_from_session('name'); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo $base_url; ?>adminLTE/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        <p style="text-transform: capitalize;"><?php echo get_from_session('name'); ?></p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo $base_url; ?>admin/login/change_password" class="btn btn-default btn-flat">Change Password</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo $base_url; ?>admin/login/logout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <?php $this->load->view('admin/common/sidebar'); ?>

            <div class="modal fade" id="popup_model" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div id="event_image_upload"></div>
                            <div id="display_images" style="padding-top: 5px;">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="delete_model" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content"> 
                        <div class="modal-body">
                            <p class="msg">Are you sure you want to Delete?</p>
                        </div>
                        <div class="modal-body" style="text-align: right">
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="confirm_delete"><b>YES</b></button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="cancel_delete"><b>NO</b></button>
                        </div>
                    </div>
                </div>
            </div>