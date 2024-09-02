<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(["resources/css/style3.css", "resources/js/app.js"])
    <title>Surat Keluar</title>
    <link rel="stylesheet"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
</head>

<body>
    <div class="table">
        <div class="table_header">
            <div>
                <input placeholder="Search"/>
                <button class="cari">🔎 Search</button>
                <button class="btn btn-success btnTambahFile" data-bs-title="Tambah File Surat" data-bs-target="#modalForm" data-bs-toggle="modal" attr-href="{{route('suratmasuk.tambah')}}"><i class="bi bi-plus"></i>Tambah</button>

                <div class="table_section">
                    <h1>Data Surat Keluar</h1>
                </div>
            </div>
        </div>
            <body>
                <main class="table">
                    <section class="table__header">

                        <div class="table_section">
                            <h2>3 Bulan Terakhir</h2>
                        </div>
                    </section>
                    
            
                    <section class="table__body">
                    <table class="table DataTable table-hovered">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Nama Surat </th>
                                <th> Nomor Surat </th>
                                <th> Tanggal Surat </th>
                                <th> Tujuan Surat </th>
                                <th> Jenis Surat </th>
                                <th> Keterangan </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </section>
            </body>
            
        </div>
    </div>
</body>
<footer>
    <script type="module">
         var table = $('.DataTable').DataTable({
            processing: true,
            serverSide: true,
            "language": {
                "paginate": {
                    "first": "",
                    "last": "",
                    "previous": "", // Kosongkan atau ganti teks
                    "next": "" // Kosongkan atau ganti teks
                }
            },
            ajax: "{!!route('suratkeluar.data')!!}",
            columns: [{
                    data: 'id_surat_keluar',
                    name: 'id_surat_keluar',
                },
                {
                    data: 'nama_surat',
                    name: 'nama_surat'
                },
                {
                    data: 'nomor_surat',
                    name: 'nomor_surat'
                },
                {
                    data: 'tgl_keluar',
                    name: 'tgl_keluar'
                },
                {
                    data: 'tujuan_surat',
                    name: 'tujuan_surat'
                },
                {
                    data: 'jenis_surat',
                    name: 'jenis_surat'
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
                },

                {
                    render: function(data, type, row) {
                        return " <button class= btn btn-primary btnEditSuratKeluar><i class= bi bi-pencil></i></button> <btn class='btn btn-danger btnHapusArsip' attr-id='" + row.id_arsip + "'><i class='bi bi-trash'></i> Hapus</btn>";
                    }
                }
            ]
        });
    </script>
</footer>
</html>