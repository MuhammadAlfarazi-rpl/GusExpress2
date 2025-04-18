<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="./dashboard.php" class="app-brand-link">
      <img class="card-img-top" src="./assets/img/illustrations/gus-ex-logo-new.png" alt="Kamu sedang offline...">
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Forms & Tables -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Pemesanan</span></li>
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon icon-base bx bx-box"></i>
        <div data-i18n="Posts">Paket</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="pengiriman.php" class="menu-link">
            <div data-i18n="Basic Inputs">Pengiriman</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="paket.php" class="menu-link">
            <div data-i18n="Input groups">Paket</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="paket_list.php" class="menu-link">
            <div data-i18n="Input groups">List Paket</div> 
          </a>
        </li>
      </ul>
    </li>

    <!-- Admin Only -->
      <li class="menu-header small text-uppercase"><span class="menu-header-text">Admin Only</span></li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon icon-base bx bx-key"></i>
          <div data-i18n="Posts">Admin Page</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="list_user.php" class="menu-link">
              <div data-i18n="Basic Inputs">List User</div>
            </a>
          </li>
        </ul>
      </li>
  </ul>
</aside>
<!-- / Menu -->
