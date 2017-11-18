<?php $base_url = base_url(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Event-Management-System</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo $base_url; ?>css/admin/bootstrap.min.css">    
        <!-- Main Style -->
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>css/user/main.css">
        <!-- Responsive Style -->
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>css/user/responsive.css">
        <!-- Fonts -->
        <link rel="stylesheet" href="<?php echo $base_url; ?>css/font-awesome.min.css">
        <!-- Icon -->
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>fonts/simple-line-icons.css">
        <!-- Slicknav -->
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>css/user/slicknav.css">
        <!-- Nivo Lightbox -->
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>css/user/nivo-lightbox.css"> 
        <!-- Animate -->
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>css/user/animate.css">
        <!-- Owl carousel -->
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>css/user/owl.carousel.css">   
        <!-- jQuery 2.2.3 -->
        <script src="<?php echo $base_url; ?>js/admin/plugins/jQuery/jquery-2.2.3.min.js" type="text/javascript"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo $base_url; ?>js/admin/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Color CSS Styles  -->
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>css/user/colors/default.css" media="screen" /> 
        <!-- Bootstrap Notify Plugin Js -->
        <script src="<?php echo base_url(); ?>js/admin/plugins/bootstrap-notify/bootstrap-notify.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/admin/jquery.form.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/admin/jquery.form.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/mordanizr.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/underscore.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/backbone.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/handlebars-v4.0.5.js" type="text/javascript"></script>

        <!-- Notification JS-->
        <script src="<?php echo $base_url; ?>js/notifications.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/admin/fuelux/fuelux.spinner.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/admin/ace/elements.spinner.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/admin/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url; ?>js/admin/plugins/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/utility.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/dateutil.js"></script>
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
        <script type="text/javascript">
            //------------------------------ These are the pre-compiled templates ---------------------------------
            var optionTemplate = Handlebars.compile($("#option_template").html());
            var spinnerTemplate = Handlebars.compile($("#spinner_template").html());
            var iconTemplate = Handlebars.compile($("#icon_template").html());
            var baseUrl = '<?php echo $base_url; ?>';
            //globel arry
            var eventOrganizedForArray = <?php echo json_encode($this->config->item('event_organized_for_array')); ?>;
            var eventTypeArray = <?php echo json_encode($this->config->item('event_type_array')); ?>;
            var userTypeArray = <?php echo json_encode($this->config->item('user_type_array')); ?>;
            var statusArray = <?php echo json_encode($this->config->item('status_array')); ?>;
            var categoryData =<?php echo json_encode($category); ?>;
            var userData =<?php echo json_encode($user_data); ?>;
            var subCategoryData =<?php echo json_encode($sub_category); ?>;
            var IS_ACTIVE_YES =<?php echo IS_ACTIVE_YES ?>;
            var IS_ACTIVE_NO =<?php echo IS_ACTIVE_NO ?>;
            var SUPER_ADMIN =<?php echo SUPER_ADMIN ?>;
            $(document).ajaxComplete(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>
    <body>
        <!-- Header Area wrapper Starts -->
        <header id="header-wrap">
            <!-- Roof area Starts -->
            <div id="roof" class="hidden-xs">
                <div class="container">
                    <div class="col-md-6 col-sm-6">
                        <div class="info-bar-address">
                            <i class="icon-location-pin"></i> San Francisco, CA, United States
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <!-- Quick Contacts Starts -->
                        <div class="quick-contacts">
                            <span><i class="icon-phone"></i> (00) 123 456 789</span>
                            <span><i class="icon-envelope"></i><a href="#">email@gmail.com</a></span>
                        </div>
                        <!-- Quick Contacts End -->
                    </div>
                </div>
            </div>
            <!-- Roof area End -->

            <!-- Nav Menu Section Start -->
            <div class="navigation-menu">
                <nav class="navbar navbar-default navbar-event" >
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header col-md-2">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.html"><img src="<?php echo $base_url; ?>uploads/logo1.png" alt=""></a>
                        </div>

                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a href="index.html">Home</a></li>
                                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" >Pages <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="gallery.html">Gallery</a></li>
                                        <li><a href="pricing.html">Pricing Table</a></li>
                                        <li><a href="sponsors.html">Sponsors</a></li>
                                        <li><a href="single-post.html">Single Post</a></li>
                                    </ul>
                                </li>                
                                <li><a href="schedule.html">Schedule</a></li>              
                                <li><a href="speakers.html">Speakers</a></li>                
                                <li><a href="blog.html">Blog</a></li>             
                                <li class="animated bounceIn"><a href="pricing.html">Buy Tickets</a></li>                
                                <li><a href="contact.html">Contact</a></li>                
                            </ul>
                        </div><!-- /navbar-collapse -->
                    </div><!-- /container -->

                    <!-- Mobile Menu Start -->
                    <ul class="wpb-mobile-menu">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="gallery.html">Gallery</a></li>
                                <li><a href="pricing.html">Pricing Table</a></li>
                                <li><a href="sponsors.html">Sponsors</a></li>
                                <li><a href="single-post.html">Single Post</a></li>
                            </ul>
                        </li>                
                        <li><a href="schedule.html">Schedule</a></li>              
                        <li><a href="speakers.html">Speakers</a></li>                
                        <li><a href="blog.html">Blog</a></li>             
                        <li><a href="pricing.html">Buy Tickets</a></li>                
                        <li><a href="contact.html">Contact</a></li> 
                    </ul>
                    <!-- Mobile Menu End -->

                </nav>
            </div>
            <!-- Nav Menu Section End -->
        </header>