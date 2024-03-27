<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../admin/<?php echo $_SESSION['gambar']; ?>" height="200" width="200" style="border: 2px solid white;" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['nama']; ?></p>
              <a href="index.php"><i class="fa fa-circle text-success"></i> <?php echo $_SESSION['level']; ?></a>
            </div>
          </div><br />
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Sistem Informasi Keuangan</li>
            <li class="active treeview">
              <a href="index.php">
                <i class="fa fa-home"></i> <span>Dashboard</span>
              </a>
            </li>
            
            
            
             
            

            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Data Pribadi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               

                  <li><a href="anggota.php"><i class="fa fa-circle-o"></i> Data Profil pengguna </a></li>
               
              </ul>
            </li>
            
            <li>
              <a href="#">
                <i class="fa fa-file"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="kasmasuk.php"><i class="fa fa-circle-o"></i> data kas masuk ku  </a></li>
                <li><a href="kaskeluar.php"><i class="fa fa-circle-o"></i> data kas Keluar ku</a></li>

            

                     

               
              </ul>
            </li>
        </section>
        <!-- /.sidebar -->
      </aside>