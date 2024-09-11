<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/styless.css', 'resources/js/app.js'])
  <title>Surat NDA</title>
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="toolbar">
      <div class="head">
        <input type="text" id="filename" placeholder="Filename" value="Surat NDA">
        <select onchange="fileHandle(this.value); this.selectedIndex=0">
          <option value="" selected="" hidden="" disabled="">File</option>
          <option value="new">New File</option>
          <option value="pdf">Save as pdf</option>
        </select>

        <!-- Dropdown untuk memilih font -->
        <select id="font-family" onchange="changeFontFamily()">
          <option value="Arial">Arial</option>
          <option value="Verdana">Verdana</option>
          <option value="Times New Roman">Times New Roman</option>
          <option value="Garamond">Garamond</option>
          <option value="Georgia">Georgia</option>
          <option value="Courier New">Courier New</option>
          <option value="Cursive">Cursive</option>
        </select>

        <select onchange="formatDoc('formatBlock', this.value); this.selectedIndex=0;">
          <option value="" selected="" hidden="" disabled="">Format</option>
          <option value="h1">Heading 1</option>
          <option value="h2">Heading 2</option>
          <option value="h3">Heading 3</option>
          <option value="h4">Heading 4</option>
          <option value="h5">Heading 5</option>
          <option value="h6">Heading 6</option>
          <option value="p">Paragraph</option>
        </select>

        <select onchange="formatDoc('fontSize', this.value); this.selectedIndex=0;">
          <option value="" selected="" hidden="" disabled="">Font Size</option>
          <option value="1">Extra Small</option>
          <option value="2">Small</option>
          <option value="3">Regular</option>
          <option value="4">Medium</option>
          <option value="5">Large</option>
          <option value="6">Extra Large</option>
          <option value="7">Big</option>
        </select>

        <!-- Opsi penomoran surat -->
        <select id="suratNumber" onchange="generateNomorSurat()">
          <option value="" selected="" hidden="" disabled="">Nomor Surat</option>
          <option value="1">001/NDA/2024</option>
          <option value="2">002/NDA/2024</option>
          <option value="3">003/NDA/2024</option>
          <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
        </select>

        <!-- Tombol Download dan Preview -->
        <button id="downloadBtn">Download PDF</button>
        <button id="previewBtn">Preview</button>
      </div>

      <div class="color">
        <span>Text Color</span>
        <input type="color" oninput="formatDoc('foreColor', this.value);">
      </div>
      <div class="color">
        <span>Background Color</span>
        <input type="color" oninput="formatDoc('hiliteColor', this.value);">
      </div>

      <div class="btn-toolbar">
        <button id="undoBtn"><i class='bx bx-undo'></i></button>
        <button id="redoBtn"><i class='bx bx-redo'></i></button>
        <button id="boldBtn"><i class='bx bx-bold'></i></button>
        <button id="underlineBtn"><i class='bx bx-underline'></i></button>
        <button id="italicBtn"><i class='bx bx-italic'></i></button>
        <button id="strikethroughBtn"><i class='bx bx-strikethrough'></i></button>
        <button id="justifyleftBtn"><i class='bx bx-align-left'></i></button>
        <button id="justifycenterBtn"><i class='bx bx-align-middle'></i></button>
        <button id="justifyrightBtn"><i class='bx bx-align-right'></i></button>
        <button id="justifyfullBtn"><i class='bx bx-align-justify'></i></button>
        <button id="insertorderedlistBtn"><i class='bx bx-list-ol'></i></button>
        <button id="insertunorderedlistBtn"><i class='bx bx-list-ul'></i></button>
        <button id="addLinkBtn"><i class='bx bx-link'></i></button>
        <button id="unlinkBtn"><i class='bx bx-unlink'></i></button>
        <button id="show-code" data-active="false">&lt;/&gt;</button>
      </div>
    </div>

    <div id="editor" contenteditable="true" style="border: 1px solid #ccc; padding: 10px; min-height: 200px;">
      <h3 id="nomor-surat">Nomor Surat: </h3>
      <p>Isi dari surat NDA di sini.</p>
    </div>
  </div>

</body>
<footer>
  <!-- Script untuk mengubah ukuran font -->
  <script>
    function formatDoc(command, value) {
      document.execCommand(command, false, value);
    }
  </script>

  <!-- Script untuk mengubah font family -->
  <script>
    function changeFontFamily() {
      var fontFamily = document.getElementById("font-family").value;
      document.getElementById("editor").style.fontFamily = fontFamily;
    }
  </script>

  <!-- Fungsi untuk generate nomor surat otomatis dengan tanggal dan bulan -->
  <script>
    function convertToRoman(num) {
      const romanNumerals = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
      return romanNumerals[num - 1]; // Karena array dimulai dari 0, kurangi 1 dari num
    }

    function generateNomorSurat() {
      // Dapatkan nomor surat terakhir dari localStorage atau mulai dari 1 jika belum ada
      let lastNumber = localStorage.getItem('lastSuratNumber') || 1;
      let date = new Date();
      let tahun = date.getFullYear(); // Tahun saat ini
      let bulan = convertToRoman(date.getMonth() + 1); // Bulan dalam angka Romawi
      //let tanggal = ('0' + date.getDate()).slice(-2); // Tanggal saat ini, dengan dua digit

      let nomorSuratBaru = ('000' + lastNumber).slice(-3) + '/NDA/' + bulan + '/' + tahun; // Format nomor surat

      // Tampilkan nomor surat di dalam editor
      document.getElementById('nomor-surat').textContent = 'Nomor Surat: ' + nomorSuratBaru;

      // Simpan nomor surat yang baru di localStorage
      localStorage.setItem('lastSuratNumber', parseInt(lastNumber) + 1);
    }
  </script>

  <script type="module">
    document.getElementById('undoBtn').addEventListener('click', function() {
      document.execCommand('undo', false, null);
    });
    document.getElementById('redoBtn').addEventListener('click', function() {
      document.execCommand('redo', false, null);
    });
    document.getElementById('boldBtn').addEventListener('click', function() {
      document.execCommand('bold', false, null);
    });
    document.getElementById('underlineBtn').addEventListener('click', function() {
      document.execCommand('underline', false, null);
    });
    document.getElementById('italicBtn').addEventListener('click', function() {
      document.execCommand('italic', false, null);
    });
    document.getElementById('strikethroughBtn').addEventListener('click', function() {
      document.execCommand('strikethrough', false, null);
    });
    document.getElementById('justifyleftBtn').addEventListener('click', function() {
      document.execCommand('justifyLeft', false, null);
    });
    document.getElementById('justifycenterBtn').addEventListener('click', function() {
      document.execCommand('justifyCenter', false, null);
    });
    document.getElementById('justifyrightBtn').addEventListener('click', function() {
      document.execCommand('justifyRight', false, null);
    });
    document.getElementById('justifyfullBtn').addEventListener('click', function() {
      document.execCommand('justifyFull', false, null);
    });
    document.getElementById('insertorderedlistBtn').addEventListener('click', function() {
      document.execCommand('insertOrderedList', false, null);
    });
    document.getElementById('insertunorderedlistBtn').addEventListener('click', function() {
      document.execCommand('insertUnorderedList', false, null);
    });
    document.getElementById('addLinkBtn').addEventListener('click', function() {
      var url = prompt("Masukkan URL:", "http://");
      if (url) {
        document.execCommand('createLink', false, url);
      }
    });
    document.getElementById('unlinkBtn').addEventListener('click', function() {
      document.execCommand('unlink', false, null);
    });
    document.getElementById('show-code').addEventListener('click', function() {
      let isActive = this.getAttribute('data-active') === 'true';
      this.setAttribute('data-active', !isActive);
      // Lakukan sesuatu berdasarkan apakah 'isActive' true atau false
    });

    function changeTextColor(color) {
      document.execCommand('styleWithCSS', false, true);
      document.execCommand('foreColor', false, color);
    }

    function addLink() {
      const url = prompt("Enter the link URL:");
      if (url) {
        formatDoc('createLink', url);
      }
    }

    // Panggil fungsi generate nomor surat saat halaman di-load
    document.addEventListener('DOMContentLoaded', function() {
      generateNomorSurat();
    });

    // Fungsi untuk mengunduh konten editor sebagai PDF
    document.getElementById('downloadBtn').addEventListener('click', function() {
      var element = document.getElementById('editor');
      var opt = {
        margin: 1,
        filename: document.getElementById('filename').value + '.pdf',
        image: {
          type: 'jpeg',
          quality: 0.98
        },
        html2canvas: {
          scale: 2
        },
        jsPDF: {
          unit: 'in',
          format: 'letter',
          orientation: 'portrait'
        }
      };
      html2pdf().from(element).set(opt).save();
    });

    // Fungsi untuk preview PDF (sebelum unduh)
    document.getElementById('previewBtn').addEventListener('click', function() {
      var element = document.getElementById('editor');
      var opt = {
        margin: 1,
        filename: document.getElementById('filename').value + '.pdf',
        image: {
          type: 'jpeg',
          quality: 0.98
        },
        html2canvas: {
          scale: 2
        },
        jsPDF: {
          unit: 'in',
          format: 'letter',
          orientation: 'portrait'
        }
      };
      html2pdf().from(element).set(opt).outputPdf('dataurlnewwindow');
    });
  </script>
</footer>

</html>