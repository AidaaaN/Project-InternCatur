<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Material -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <!-- Stylesheet -->
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <aside>
    <div class="top">
      <div class="logo">
        <img src="img/logo.png">
      </div>
      <span class="logo-name">SIK<span class="danger">LUS</span></span>
    </div>

    <!-- SIDEBAR -->
    <div class="sidebar">
      <ul class="view">
        <li><a href="#">
            <span class="material-icons-sharp">home</span>
            <h3>Beranda</h3>
          </a></li>
        <li><a href="#">
            <span class="material-icons-sharp">contact_mail</span>
            <h3>Surat Masuk</h3>
          </a></li>
        <li><a href="#">
            <span class="material-icons-sharp">drafts</span>
            <h3>Surat Keluar</h3>
          </a></li>
        <li><a href="#">
            <span class="material-icons-sharp">archive</span>
            <h3>Arsip</h3>
          </a></li>
        <li><a href="#">
            <span class="material-icons-sharp">add</span>
            <h3>Add Template</h3>
          </a></li>
      </ul>

      <ul class="logout">
        <li><a href="#">
            <span class="material-icons-sharp">logout</span>
            <h3>Logout</h3>
          </a></li>
        <li class="mode"><a href="#">
            <span class="material-icons-sharp">dark_mode</span>
            <h3>Dark Mode</h3>
          </a>
          <div class="toggle">
            <span class="switch"></span>
          </div>
        </li>
      </ul>
    </div>
  </aside>

  <!-------------- BERANDA -------------->
  <section class="beranda">
    <div class="top">
      <i class="uil uil-bars sidebar-toggle"></i>

      <div class="search-box">
        <i class="uil uil-search"></i>
        <input type="text" placeholder="Search here...">
      </div>

      <img src="img/profil.png" alt="">
    </div>

    <div class="dash-content">
      <div class="overview">
        <div class="title">
          <span class="text">Dashboard</span>
        </div>

        <div class="cover">
          <div class="table-header">
            <a class="surat nda" href="suratNDA">
              <img src="img/cover.jpeg">
            </a>
          </div>
          <div class="table-header">
            <a class="surat invoice" href="suratInvoice">
              <img src="img/cover.jpeg">
            </a>
          </div>
          <div class="table-header">
            <a class="surat kwitansi" href="suratKwitansi">
              <img src="img/cover.jpeg">
            </a>
          </div>
          <div class="table-header">
            <a class="surat penawaran" href="suratPenawaran">
              <img src="img/cover.jpeg">
            </a>
          </div>
          <div class="table-header">
            <a class="surat terima" href="suratTerima">
              <img src="img/cover.jpeg">
            </a>
          </div>
          <div class="table-header">
            <a class="surat pekerjaan" href="suratPekerjaan">
              <img src="img/cover.jpeg">
            </a>
          </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="js/scripts.js"></script>
</body>

</html>