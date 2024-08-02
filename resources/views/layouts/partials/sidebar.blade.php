<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Beranda</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Create Template
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ url('suratNDA') }}">Surat NDA</a>
                    <a class="nav-link" href="{{ url('suratInvoice') }}">Surat Invoice</a>
                    <a class="nav-link" href="{{ url('suratKwitansi') }}">Surat Kwitansi</a>
                    <a class="nav-link" href="{{ url('suratPenawaran') }}">Surat Penawaran</a>
                    <a class="nav-link" href="{{ url('suratTerima') }}">Surat Tanda Terima</a>
                    <a class="nav-link" href="{{ url('suratHasilPekerjaan') }}">Surat Serah Terima Hasil Pekerjaan</a>
                    <a class="nav-link" href="{{ url('buatSurat') }}">Blank Space</a>
                </nav>
            </div>

            <div class="sb-sidenav-menu-heading">Menu</div>
            <a class="nav-link" href="{{ url('suratMasuk') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Surat Masuk
            </a>
            <a class="nav-link" href="{{ url('suratKeluar') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Surat Keluar
            </a>
            <a class="nav-link" href="{{ url('arsip') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Arsip
            </a>
            
            <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link" href="charts.html">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Charts
            </a>
            <a class="nav-link" href="tables.html">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Tables
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged</div>
    </div>
</nav>