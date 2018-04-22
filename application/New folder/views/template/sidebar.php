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

<!---->
<?php
/*//NEXT MENU DINAMIS ===>> tabel_menu*/

//session user group
    
//$AppUserGroup = 1;    
  $AppUserGroup = $_SESSION['UserGroupID'];    
  
$map = $this->db->query("SELECT id_group, id_menu FROM menu_mapping_group WHERE id_group='$AppUserGroup'")->result();
$id_menu = $map[0]->id_menu;
//$id_menu = explode(',', $id_menu); //array

//print_r($id_menu);die();


//  $main_menu = $this->db->get_where('tabel_menu', array(
//     'is_main_menu' => 0,
//     'id' => $id_menu,    
// ));

$main_menu = $this->db->query("SELECT * FROM tabel_menu WHERE id IN($id_menu) AND is_main_menu=0 ");


//-------------------
 // $main_menu = $this->db->get_where('tabel_menu', array('is_main_menu' => 0));
     foreach ($main_menu->result() as $main) {
                            // Query untuk mencari data sub menu

$sub_menu = $this->db->query("SELECT * FROM tabel_menu WHERE id IN($id_menu) AND is_main_menu=$main->id ");
//-------------        
        // $sub_menu = $this->db->get_where('tabel_menu', array('is_main_menu' => $main->id));
                            // periksa apakah ada sub menu
            if ($sub_menu->num_rows() > 0) {
                                // main menu dengan sub menu
                echo "<li class='treeview'>" . anchor($main->link, '<i class="' . $main->icon . '"></i>' . $main->judul_menu .
                                        '<span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>');
                                // sub menu nya disini
                        echo "<ul class='treeview-menu'>";
                            foreach ($sub_menu->result() as $sub) {
                                    echo "<li>" . anchor($sub->link, '<i class="' . $sub->icon . '"></i>' . $sub->judul_menu) . "</li>";
                                }
                                echo"</ul></li>";
                            } else {
                                // main menu tanpa sub menu
                                echo "<li>" . anchor($main->link, '<i class="' . $main->icon . '"></i>' . $main->judul_menu) . "</li>";
                            }
                        }

                        // data main menu

   
    ?>

<!-----

           <li><a href="<?php echo site_url('dashboard1') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-th"></i> <span>Agency</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('Agency') ?>"><i class="fa fa-circle-o"></i> Agency Profile</a></li>
                    <li><a href="<?php echo site_url('sales_center') ?>"><i class="fa fa-circle-o"></i> Sales Center</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Sales Force</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('sales_force') ?>"><i class="fa fa-circle-o"></i> Profile Sales</a></li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-edit"></i> <span>Approval</span> <i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="<?php echo site_url('approval/approve_rsm') ?>"><i class="fa fa-circle-o"></i> Approval RSM</a></li>
                                    <li><a href="<?php echo site_url('approval/approve_sgv_wil') ?>"><i class="fa fa-circle-o"></i> Approval SGV Wilayah</a></li>
                                    <li><a href="<?php echo site_url('approval/approve_sgv_pus') ?>"><i class="fa fa-circle-o"></i> Approval SGV Pusat</a></li>
                                    <li><a href="<?php echo site_url('approval/approve') ?>"><i class="fa fa-circle-o"></i> Approval </a></li>
                                </ul>
                        </li>    
------>
 
                    
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">