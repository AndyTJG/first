<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $_SESSION['gambar']; ?>" height="200" width="200" style="border: 2px solid white;" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['nama']; ?></p>
              <a href="index.php"><i class="fa fa-circle text-success"></i> <?php echo $_SESSION['level']; ?></a>
            </div>
          </div><br />
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Sistem Informasi Administrasi Pelayanan</li>
            <li class="active treeview">
              <a href="index.php">
                <i class="fa fa-home"></i> <span>Dashboard</span>
              </a>
            </li>
            
            
            
          

   </li>

              <li><a href="pasien.php"><i class="fa fa-file"></i> Pasien</a></li>
             
            </li>

               </li>

              <li><a href="kasmasuk.php"><i class="fa fa-file"></i> Kas Masuk</a></li>
             
            </li>

              <li><a href="kaskeluar.php"><i class="fa fa-refresh"></i> Kas Keluar</a></li>
            

            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Data Pengguna Sistem</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="adminku.php"><i class="fa fa-circle-o"></i> Data admin</a></li>

                  <li><a href="anggota.php"><i class="fa fa-circle-o"></i> Data Anggota </a></li>
               
              </ul>
            </li>
            
            <li>
              <a href="#">
                <i class="fa fa-file"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

                <li><a href="jurnal.php"><i class="fa fa-circle-o"></i> Jurnal </a></li>

                <li><a href="bukubesar.php"><i class="fa fa-circle-o"></i> Buku Besar </a></li>
             

                <li><a href="labarugi.php"><i class="fa fa-circle-o"></i> Laba Rugi </a></li>

                       <li><a href="rubahmodal.php"><i class="fa fa-circle-o"></i> Perubahan Modal </a></li>


                <li><a href="rekapkasmasuk.php"><i class="fa fa-circle-o"></i> Rekapitulasi uang masuk. </a></li>
                <li><a href="rekapkaskeluar.php"><i class="fa fa-circle-o"></i> Rekapitulasi uang Keluar </a></li>


               

                     

               
              </ul>
            </li>
        </section>
        <!-- /.sidebar -->
      </aside>