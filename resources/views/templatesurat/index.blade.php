<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/styless.css', 'resources/js/app.js'])
  <title>Surat NDA</title>
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
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

        <select>
          <option value="Arial">Arial</option>
          <option value="Veranda">Veranda</option>
          <option value="Times New">Times New</option>
          <option value="Garamond">Garamond</option>
          <option value="Georgia">Georgia</option>
          <option value="Curier">Curier</option>
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
        Moy Gemoy
      </div>
    </div>

</body>
<footer>
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

    document.addEventListener('DOMContentLoaded', function() {
      function formatDoc(command, value) {
        const selection = window.getSelection();
        if (selection.rangeCount > 0) {
          const range = selection.getRangeAt(0);
          const span = document.createElement('span');
          span.style[command === 'foreColor' ? 'color' : 'backgroundColor'] = value;
          range.surroundContents(span);
        }
      }
    });

    /*const content = document.getElementById('content');

    content.addEventListener('mouseenter', function() {
      const a = content.querySelectorAll('a');
      a.forEach(item => {
        item.addEventListener('mouseenter', function() {
          content.setAttribute('contenteditable', false);
          item.target = '_blank';
        })
        item.addEventListener('mouseleave', function() {
          content.setAttribute('contenteditable', true);
        })
      })
    })

    const showCode = document.getElementById('show-code');
    let active = false;

    showCode.addEventListener('click', function() {
      showCode.dataset.active = !active;
      active = !active
      if (active) {
        content.textContent = content.innerHTML;
        content.setAttribute('contenteditable', false);
      } else {
        content.innerHTML = content.textContent;
        content.setAttribute('contenteditable', true);
      }
    })

    const filename = document.getElementById('filename');

    function fileHandle(value) {
      if (value === 'new') {
        content.innerHTML = '';
        filename.value = 'untitled';
      } else if (value === 'txt') {
        const blob = new Blob([content.innerText])
        const url = URL.createObjectURL(blob)
        const link = document.createElement('a');
        link.href = url;
        link.download = `${filename.value}.txt`;
        link.click();
      } else if (value === 'pdf') {
        html2pdf(content).save(filename.value);
      }
    }*/
  </script>
</footer>

</html>