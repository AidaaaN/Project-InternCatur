<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(["resources/css/styless.css", "resources/js/app.js"])
  <title>Surat NDA</title>
  <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
  <link rel="stylesheet" href="styless.css">
</head>
<body>

  <div class="container">
    <div class="toolbar">
      <div class="head">
        <input type="text" placeholder="Filename" value="Surat NDA">
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
          <span>Color</span>
          <input type="color" oninput="formatDoc('foreColor', this.value); this.value='#000000';">
        </div>
        <div class="color">
          <span>Background</span>
          <input type="color" oninput="formatDoc('hiliteColor', this.value); this.value='#000000';">
        </div>
      </div>

      <div class="btn-toolbar">
        <button onclick="formatDoc('undo')"><i class='bx bx-undo' ></i></button>
				<button onclick="formatDoc('redo')"><i class='bx bx-redo' ></i></button>
				<button onclick="formatDoc('bold')"><i class='bx bx-bold'></i></button>
				<button onclick="formatDoc('underline')"><i class='bx bx-underline' ></i></button>
				<button onclick="formatDoc('italic')"><i class='bx bx-italic' ></i></button>
				<button onclick="formatDoc('strikeThrough')"><i class='bx bx-strikethrough' ></i></button>
        <button onclick="formatDoc('justifyLeft')"><i class='bx bx-align-left' ></i></button>
				<button onclick="formatDoc('justifyCenter')"><i class='bx bx-align-middle' ></i></button>
				<button onclick="formatDoc('justifyRight')"><i class='bx bx-align-right' ></i></button>
				<button onclick="formatDoc('justifyFull')"><i class='bx bx-align-justify' ></i></button>
				<button onclick="formatDoc('insertOrderedList')"><i class='bx bx-list-ol' ></i></button>
				<button onclick="formatDoc('insertUnorderedList')"><i class='bx bx-list-ul' ></i></button>
				<button onclick="addLink()"><i class='bx bx-link' ></i></button>
				<button onclick="formatDoc('unlink')"><i class='bx bx-unlink' ></i></button>
				<button id="show-code" data-active="false">&lt;/&gt;</button>
      </div>
    </div>
    
    <div id="content" contenteditable="true" spellcheck="false">
      Moy Gemoy
    </div>
  </div>

  <footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer">
      function formatDoc(cmd, value=null) {
        if(value) {
            document.execCommand(cmd, false, value);
        } else {
            document.execCommand(cmd);
        }
      }

      function addLink() {
          const url = prompt('Insert  url');
          formatDoc('createLink', url);
      }

      const content = document.getElementById('content');

      content.addEventListener('mouseenter', function () {
          const a = content.querySelectorAll('a');
          a.forEach(item=> {
              item.addEventListener('mouseenter', function () {
                  content.setAttribute('contenteditable', false);
            item.target = '_blank';
              })
              item.addEventListener('mouseleave', function () {
            content.setAttribute('contenteditable', true);
          })
          })
      })

      const showCode = document.getElementById('show-code');
      let active = false;

      showCode.addEventListener('click', function () {
        showCode.dataset.active = !active;
        active = !active
        if(active) {
          content.textContent = content.innerHTML;
          content.setAttribute('contenteditable', false);
        } else {
          content.innerHTML = content.textContent;
          content.setAttribute('contenteditable', true);
        }
      })

      const filename = document.getElementById('filename');

      function fileHandle(value) {
        if(value === 'new') {
          content.innerHTML = '';
          filename.value = 'untitled';
        } else if(value === 'txt') {
          const blob = new Blob([content.innerText])
          const url = URL.createObjectURL(blob)
          const link = document.createElement('a');
          link.href = url;
          link.download = `${filename.value}.txt`;
          link.click();
        } else if(value === 'pdf') {
          html2pdf(content).save(filename.value);
        }
      }
    </script>
  </footer>

</body>
</html>
