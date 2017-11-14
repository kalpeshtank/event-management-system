<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="admin#event/list">
                    <i class="fa fa-calendar"></i> <span>Event</span>
                </a>
            </li>
            <?php if (is_super_admin()) { ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-database"></i>
                        <span>Master</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="admin#category/list"><i class="fa fa-circle-o"></i> Category</a></li>
                        <li><a href="admin#sub_category/list"><i class="fa fa-circle-o"></i> Sub-Category</a></li>
                    </ul>
                </li>
                <li>
                    <a href="admin#user/list">
                        <i class="fa fa-user"></i> <span>User</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->