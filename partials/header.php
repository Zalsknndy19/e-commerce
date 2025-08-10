    <!-- Main Header -->
    <!-- Navbar -->
    <header>
      <div class="navbar">
        <div class="logo">
          <a href="/">
            <model-viewer
              src="/partials/logo.glb"
              poster="/assets/img/fav.png"
              alt="Logo 3D ZHStore."
              shadow-intensity="0"
              exposure="1"
              autoplay 
              field-of-view="35deg"
              interaction-prompt="auto"
              reveal="auto"
              style="width: 60px; height: 60px;">
            </model-viewer>
            <noscript>
              <img src="/assets/img/fav.png" alt="Logo ZHStore." style="width: 22%;">
            </noscript>
          </a>
        </div>
        <!-- ACCOUNT -->
        <div class="header-ctn">
          <!-- Wishlist -->
          <div class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <i class="fa fa-heart"></i>
              <span>Wishlist</span>
              <div class="qty">20</div>
            </a>
            <div class="cart-dropdown">
              <strong>Fitur Belum Tersedia</strong>
            </div>
          </div>
          <!-- /Wishlist -->
          <!-- Cart -->
          <div class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <i class="fa fa-shopping-cart"></i>
              <span>Keranjang</span>
              <div class="qty">0</div>
            </a>
            <div class="cart-dropdown">
              <span><strong>Fitur Belum Tersedia dan Akan Tersedia Dalam Waktu Yang Tidak Ditentukan</strong></span>
            </div>
          </div>
          <!-- /Cart -->
        </div>
        <!-- /ACCOUNT -->
        <button class="menu-toggle" onclick="toggleSidebar()"><i class="fa fa-bars"></i>
          <span>Menu</span></button>
      </div>
      <nav id="navigation">
        <div id="responsive-nav">
          <div class="usercard">
            <div class="div1"><img loading="lazy" src="/assets/img/user.png" alt="Photo Profiles"><span><a href="/command/user');?>">Detail</a></span></div>
            <div class="div2"><span>Nama</span></div>
            <div class="div3"><span>Email</span></div>
            <div class="div4"><span>Telepon</span></div>
          </div>

          <ul class="main-nav nav navbar-nav" id="mainnav">
            <li class="<?php echo ($activePage === 'Beranda') ? 'active' : ''; ?>">
              <a href="/">Beranda</a>
            </li>
            <li class="<?php echo ($activePage === 'Accessories') ? 'active' : ''; ?>">
              <a href="<?php echo categoryURL('Accessories');?>">Accessories</a>
            </li>
            <li class="<?php echo ($activePage === 'E-book') ? 'active' : ''; ?>">
              <a href="<?php echo ebookCatalogURL();?>">E-book</a>
            </li>
            <li class="<?php echo ($activePage === 'Electronics') ? 'active' : ''; ?>">
              <a href="<?php echo categoryURL('Electronics');?>">Electronics</a>
            </li>
            <li class="<?php echo ($activePage === 'Fashion') ? 'active' : ''; ?>">
              <a href="<?php echo categoryURL('Fashion');?>">Fashion</a>
            </li>
            <li class="<?php echo ($activePage === 'Food') ? 'active' : ''; ?>">
              <a href="<?php echo categoryURL('Food');?>">Food</a>
            </li>
            <li class="<?php echo ($activePage === 'Leather') ? 'active' : ''; ?>">
              <a href="<?php echo categoryURL('Leather');?>">Leather</a>
            </li>
            <li class="<?php echo ($activePage === 'Other') ? 'active' : ''; ?>">
              <a href="<?php echo categoryURL('Other');?>">Other</a>
            </li>
            <li class="<?php echo ($activePage === 'Promptgpt') ? 'active' : ''; ?>">
              <a href="<?php echo categoryURL('Promptgpt');?>">Prompt ChatGPT</a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- Overlay -->
      <div id="overlay" class="overlay" onclick="toggleSidebar()"></div>
    </header>
    <!-- End Main Header -->
