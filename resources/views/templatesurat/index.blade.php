<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(["resources/css/styless.css", "resources/js/scriptt.js"])
  <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
  <link rel="stylesheet" href="styless.css">
  <title>Surat NDA</title>
</head>
<body>

  <div class="container">
    <div class="toolbar">
      <div class="head">
        <input type="text" placeholder="Filename" value="Surat NDA">
        <select>
          <option value="" selected="" hidden="" disabled="">File</option>
          <option value="new">New File</option>
          <option value="pdf">Save as pdf</option>
        </select>
        <select>
          <option value="" selected="" hidden="" disabled="">Format</option>
          <option value="h1">Heading 1</option>
          <option value="h2">Heading 2</option>
          <option value="h3">Heading 3</option>
          <option value="h4">Heading 4</option>
          <option value="h5">Heading 5</option>
          <option value="h6">Heading 6</option>
          <option value="p">Paragraph</option>
        </select>
        <select>
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
          <input type="color">
        </div>
        <div class="color">
          <span>Background</span>
          <input type="color">
        </div>
      </div>
      <div class="btn-toolbar">
        <button onclick="formatDoc('undo')"><i class="bx bx-undo"></i></button>
        <button><i class="bx bx-redo"></i></button>
        <button><i class='bx bx-bold'></i></button>
        <button><i class='bx bx-underline'></i></button>
        <button><i class='bx bx-italic'></i></button>
        <button><i class='bx bx-strikethrough'></i></button>
        <button><i class="bx bx-align-left"></i></button>
        <button><i class="bx bx-align-middle"></i></button>
        <button><i class="bx bx-align-right"></i></button>
        <button><i class="bx bx-align-justify"></i></button>
        <button><i class="bx bx-list-ol"></i></button>
        <button><i class="bx bx-list-ul"></i></button>
        <button><i class="bx bx-link"></i></button>
        <button>&lt;/&gt;</button>
      </div>
    </div>
    <div id="content" contenteditable="true" spellcheck="false">
      Moy
    </div>
  </div>

  <script src="scriptt.js"></script>
</body>
</html>