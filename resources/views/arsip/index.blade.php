<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(["resources/css/style4.css", "resources/js/app.js"])
    <title>ARSIP</title>
    <link rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>

<body>
    <div class="table">
        <div class="table_header">
        </div>
        <div class="table_section">

            <body>
                <h1>PENGARSIPAN</h1>
                <main class="card">
                    <section class="card__header">
                    </section>

                    <section class="card__body">
                        <table class="table DataTable table-hovered table-bordered">
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
            ajax: "{!!route('arsip.data')!!}",
            columns: [{
                    data: 'id_arsip',
                    name: 'id_arsip',
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
                    data: 'tgl_arsip',
                    name: 'tgl_arsip'
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
                        return " <btn class='btn btn-danger btnHapusArsip' attr-id='" + row.id_arsip + "'><i class='bi bi-trash'></i> Hapus</btn>";
                    }
                }
            ]
        });
    </script>
</footer>

</html>