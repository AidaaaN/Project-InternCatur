<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(["resources/css/style2.css", "resources/js/app.js"])
    <title>Surat Masuk</title>
    <link rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>

<body>
    <div class="table">
        <div class="table_header">
            <div>
                <div class="table_section">
                    <input placeholder="Search" />
                    <button class="cari">🔎 Search</button>
                    <button class="btn btn-success btnTambahFile" data-bs-title="Tambah File Surat" data-bs-target="#modalForm" data-bs-toggle="modal" attr-href="{{route('suratmasuk.tambah')}}"><i class="bi bi-plus"></i>Tambah</button>
                    <h2>Data Surat Masuk</h2>
                </div>
            </div>
        </div>

        <body>
            <main class="table">
                <section class="table__header">
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
                <!-- modal-->
                <div class="modal fade" id="modalForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                            </div>
                            <div class="modal-body">

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success btnSimpanBarang"><i class="bi bi-save"></i> Simpan</button>
                                <button class="btn btn-primary" data-bs-dismiss="modal"> Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </body>
    </div>
    </div>

</body>
<footer>
    <script type="module">
        const suratModal = document.querySelector('#modalForm');
        const Modal = bootstrap.Modal.getOrCreateInstance(suratModal);

        function changeHTML(element, find, text) {
            $(element).find(find).html();
            return $(element).find(find).html(text).promise().done();
        }
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
            ajax: "{!!route('suratmasuk.data')!!}",
            columns: [{
                    data: 'id_surat_msk',
                    name: 'id_surat_msk',
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
                    data: 'tgl_msk',
                    name: 'tgl_msk'
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
                        return " <btn class='btn btn-primary'><i class='bi bi-print'></i> print</btn> <btn class='btn btn-danger btnHapusArsip' attr-id='" + row.id_arsip + "'><i class='bi bi-trash'></i> Hapus</btn>";
                    }
                }
            ]
        });
        $('.btnTambahFile').on('click', function(a) {
            a.preventDefault();
            const modalForm = document.getElementById('modalForm');
            modalForm.addEventListener('shown.bs.modal', function(eventTambah) {
                eventTambah.preventDefault();
                eventTambah.stopImmediatePropagation();
                const link = event.relatedTarget.getAttribute('attr-href');

                axios.get(link).then(response => {
                    $("#modalForm .modal-body").html(response.data);
                    $('.autoDropdownSurat').select2({
                        placeholder: 'Pilih barang yang ingin dibeli',
                        theme: 'bootstrap-5',
                        cache: true,
                        dropdownParent: $('#modalForm'),
                        ajax: {
                            dataType: 'json',
                            processResults: function(data) {
                                $.each(data, function(i, d) {
                                    //i = Iterasi ke n
                                    //d = data dari iterasi i
                                    data[i]['text'] = d.nama_surat;
                                    data[i]['id'] = d.id_surat;
                                });
                                return {
                                    results: data
                                }
                            }
                        }
                    });
                });
            })
        })
    </script>

</footer>

</html>