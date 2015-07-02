<?php if (!defined('CONFIG_CLASS_INCLUDED')) {
  die(header("location: ../index.php"));
}?>  <!-- Sol Menu Bölgenin başı -->
      <aside class="main-sidebar">

        <!-- Sol Menu Bölgenin başı -->
        <section class="sidebar">

          <!-- Sol Menu Kullanıcı Bilgileri alanı başı -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="Content/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Administrator</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Çevrimiçi</a>
            </div>
          </div>
          <!-- Sol Menu Kullanıcı Bilgileri alanı Sonu -->

            <!-- Arama Formu Başlangıcı -->
            <form action="#" method="get" class="sidebar-form">
              <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Ara"/>
                <span class="input-group-btn">
                  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
              </div>
            </form>
            <!-- Arama Formu Sonu -->

          <!-- Sol Menu İsim/Link Başı -->
          <ul class="sidebar-menu">
            <li class="header">Yönetim Paneli</li>
            <li class="active"><a href="kullanicihesaplari.php"><i class='fa fa-user'></i> <span>Kullanıcı Hesapları</span></a></li>
            <li><a href="#"><i class='fa fa-home'></i> <span>Haber Yönetimi</span></a></li>
            <li class="treeview">
              <a href="#"><i class='fa fa-life-ring'></i> <span>Geri Bildirim</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#"><i class='fa fa-angle-double-right'></i>Bize Ulaşın</a></li>
                <li><a href="#"><i class='fa fa-angle-double-right'></i>İletişim Formu</a></li>
              </ul>
            </li>
          </ul>
          <!-- Sol Menu İsim/Link Sonu -->
        </section>
        <!-- Sol Menu Bölgenin Sonu-->
      </aside>
      <!-- Sol Menu Bölgenin Sonu-->