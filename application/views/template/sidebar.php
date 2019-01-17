<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Admin</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>


<!-- MENU SALES=================================================== -->


            <li class="treeview">
                <a href="<?=site_url('/Dashboard1')?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
<!--
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('/home/') ?>"><i class="fa fa-circle-o"></i>Home</a></li>
                </ul>
-->				
            </li>

<?php
//SUPER ADMIN
if($this->session->userdata('UserGroupID')==1){
?>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Report</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('/employee/terminate/') ?>"><i class="fa fa-circle-o"></i> Report Terminate</a></li>
                </ul>
            </li>    


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Employee</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('/employee/new_sales_code/') ?>"><i class="fa fa-circle-o"></i> Pending New Sales Code</a></li>
                </ul>

            </li>    


               <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Upload</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('/systemupload/edc') ?>"><i class="fa fa-circle-o"></i> System Upload EDC</a></li>
                </ul>

            </li>    




<?php
}elseif($this->session->userdata('UserGroupID')==45){
?>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Report</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('/employee/terminate/') ?>"><i class="fa fa-circle-o"></i> Report Terminate</a></li>
                    <li><a href="<?php echo site_url('/performancedetail/promo/') ?>"><i class="fa fa-circle-o"></i> Report Promo Code</a></li>
                </ul>
            </li>    


<?php
//SUP
//AGUSNET
//}elseif ($this->session->userdata('UserGroupID')==37) {
}else{
?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Report</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">

                    <li><a href="<?php echo site_url('/employee/terminate/') ?>"><i class="fa fa-circle-o"></i> Report Terminate</a></li>
                    <li><a href="<?php echo site_url('/performancedetail/promo/') ?>"><i class="fa fa-circle-o"></i> Report Promo Code</a></li>
                </ul>
            </li>    


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Employee</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('/employee/new_sales_code/') ?>"><i class="fa fa-circle-o"></i> Pending New Sales Code</a></li>
                </ul>

            </li>    


<?php
}
/*
}else{
?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Report</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('/employee/terminate/') ?>"><i class="fa fa-circle-o"></i> Report Terminate</a></li>
                </ul>
            </li>    



<?php
}
*/
?>
<!---
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Manajemen Leads</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('/sales/cust_ind/') ?>"><i class="fa fa-circle-o"></i>Manajemen Leads</a></li>
                </ul>
            </li>
-->


 
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">