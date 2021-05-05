<header>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.8/css/fixedHeader.dataTables.min.css" />

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script> -->

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  <div class="logo-container">
    <img src="<?= base_url() ?>/pmv_logo_tiles.png" alt="logo" class="logo">
  </div>
  <div class="header__item">
    <div class="icon"></div>
  </div>
  <div class="header__item">
    <div class="icon"></div>
  </div>
  <div class="header__item">
    <div class="icon"></div>
  </div>
  <div class="header__item">
    <p class="muted-text">Signed in as <span class="highlight-text"><?= esc($name) ?></span></p>
  </div>
  <div class="header__item">
    <a href="<?= base_url() ?>/login/logout" class="logout"><i class="fa fa-sign-out"></i></a>
  </div>
</header>
<hr>