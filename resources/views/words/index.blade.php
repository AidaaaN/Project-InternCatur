<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(["resources/css/style6.css", "resources/js/app.js"])
    <title>Words Surat </title>


    <!-- Font Awesome icons-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

    <!--Google Fonts-->
    <link 
    href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
    rel="stylesheet"/>

    <!--Stylesheet-->
    <link rel="stylesheet" href="style6.css"/>

</head>
<body>
    <div class="container">
        <div class="options">
            <!--Text Format-->
            <button id="bold" 
            class="option-button format">
                <i class="fa-solid fa-bold"></i> 
            </button>
                <button id="italic"  
                class="option-button format">
                    <i class="fa-solid fa-italic"></i>
                </button>
                <button id="underline"
                 class="option-button format">
                    <i class="fa-solid fa-underline"></i>
                </button>
                <button id="strikethrough"
                 class="option-button format">
                    <i class="fa-solid fa-strikethrough"></i>
                </button>
                <button id="superscript" 
                
                class="option-button script">
                    <i class="fa-solid fa-superscript"></i>
                </button>
                <button id="subscript" 
                class="option-button script">
                    <i class="fa-solid fa-subscript"></i>
                </button>

                <!--List-->
                <button id="insertOrderedList"
                 class="option-button">
                    <div class="fa-solid fa-list-ol"></div>
                </button>
                <button id="insertUndorderedList"
                 class="option-button">
                    <div class="fa-solid fa-list"></div>
                </button>
                
                <!--Undo/Redo-->
                <button id="undo" class="option-button">
                    <i class="fa-solid fa-arrow-rotate-left"></i>
                </button>
                <button id="redo" class="option-button">
                    <i class="fa-solid fa-arrow-rotate-right"></i>
                </button>

                <!--Link-->
                <button id="createLink"
                 class="adv-option-button">
                 <i class="fa fa-link"></i>
                </button>
                <button id="unlike" class="option-button">
                    <i class="fa fa-unlink"></i>
                </button>

                <!--Alignmet-->
                <button id="justifyLeft" class="option-button align">
                    <i class="fa-solid fa-align-left"></i>
                </button>
                <button id="justifyCenter" class="option-button align">
                    <i class="fa-solid fa-align-center"></i>
                </button>
                <button id="justifyRight" class="option-button align">
                    <i class="fa-solid fa-align-right"></i>
                </button>
                <button id="justifyFull" class="option-button align">
                    <i class="fa-solid fa-align-justify"></i>
                </button>
                <button id="indent" class="option-button spacing">
                    <i class="fa-solid fa-indent"></i>
                </button>
                <button id="outdent" class="option-button spacing">
                    <i class="fa-solid fa-outdent"></i>
                </button>

                <!--Headings-->
                <select id="formatBlock"
                class="adv-option-button">
                <option value="H1">H1</option>
                <option value="H2">H2</option>
                <option value="H3">H3</option>
                <option value="H4">H4</option>
                <option value="H5">H5</option>
                <option value="H6">H6</option>
            </select>


            <!-- Font -->
             <select id="font-name"
             class="adv-option-button">
             <option value="Arial">Arial</option>
             <option value="Veranda">Veranda</option>
             <option value="Times New">Times New</option>
             <option value="Garamond">Garamond</option>
             <option value="Georgia">Georgia</option>
             <option value="Curier">Curier</option>
             <option value="Cursive">Cursive</option>
            </select>

            <select id="font-size"
             class="adv-option-button">
             <option value="1">1</option>
             <option value="2">2</option>
             <option value="3">3</option>
             <option value="4">4</option>
             <option value="5">5</option>
             <option value="6">6</option>
             <option value="7">7</option>
            </select>
           
             <!-- Color -->
              <div class="input-wrapper">
                <input type="color" id="foreColor" class="adv-option-button"/>
                <label for="foreColor">Font Color</label>
              </div>
              <div class="input-wrapper">
                <input type="color" id="backColor"
                class="adv-option-button"/>
                <label for="backColor">Highlight Color</label>
              </div>
            </div>
            <div id="text-input" contenteditable="true">
            </div>
        </div>
    </div>
</body>
<footer>
    <script type="module">
        let optionsButtons = document.querySelectorAll(".option-button");
let advancedOptionButton = document.querySelectorAll(".adv-option-button");
let fontName = document.getElementById("fontName");
let fontSizeRef = document.getElementById("fontSize");
let writingArea = document.getElementById("text-input");
let linkButton = document.getElementById("createLink");
let alignButtons = document.querySelectorAll(".align");
let spacingButtons = document.querySelectorAll(".spacing");
let formatButtons = document.querySelectorAll(".format");
let scriptButtons = document.querySelectorAll(".script");

        //List of fontlist
        let fontList = [
            "Arial",
            "Veranda",
            "Times New Roman",
            "Garamond",
            "Georgia",
            "Curier New",
            "cursive",
        ];
        
    //initial Settings 
    const initializer = () => {
        //function calls for highlighting buttons
        //No highlight for link, unlink, lists, undo,redo,since,they one time operations

    highlighter(alignButtons,true);
    highlighter(spacingButtons, true);
    highlighter(formatButtons,false);
    highlighter(scriptButtons,true);

    //create options for names 
    fontList.map((value) => {
        let option = document.createElement("option");
        option.value = value;
        option.innerHTML = value;
        fontName.appendChild(option);
    });

    //fontSize allows only till 7
    for (let i = 1; i <= 7; i++) {
        let option = document.createElement("option");
        option.value = i;
        option.innerHTML = i;
        fontSizeRef.appendChild(option);
    }

    //default size
    fontSizeRef.value = 3;
    
    };

    //main logic
    const modifyText = (command, defaultUi, value) => {
        //exeCommand executes command on selected text
        document.execCommand(command, defaultUi, value);
    };

    //For basic operations wich dont need value paramenter
     optionsButtons.forEach((button) =>{
        button.addEventListener("click", () => {
            modifyText(button.id,false, null);
        });
     });

     //options that require value paramenter (e.g colors, fonts)
     advancedOptionButton.forEach((button) => {
        button.addEventListener("change", () => {
            modifyText(button.id, false, button.value)
        });
     });

     //Link
     linkButton.addEventListener("click", () => {
        let userLink = prompt("Enter a URL");
        //if link has https then pass directly else add  https 
        if (/http/i.test(userLink)) {
            modifyText(linkButton.id, false, userLink);
        }
        else{
            userLink = "http://" + userLink;
            modifyText(linkButton.id, false, userLink);
        }
     })


    //Highlight clicked buttonh 
     const highlighter = (className, needsRemoval) => {
        className.forEach((button) => {
            button.addEventListener("click", () => {
                //needsRemoval = true means only one button should be highlight and other would be normal 
                if (needsRemoval) {
                let alreadyActive = false;

                //If currently clicked buttons is already active 
                if (button.classList.contains("active")) {
                    alreadyActive = true;
                }

                //Remove highlight from other buttons 
                highlighterRemover(className);
                if(!alreadyActive) {
                    //highlihgh clicked button
                    button.classList.add("active");
                }
            }
            else{
                //if other buttons can be highlighter
                button.classList.toggle("active");

            }
            });
        });        
        };

        const highlighterRemover = (className) => {
            className.forEach((button)  => {
                button.classList.remove("active");
            }); 
       };

        window.onload = initializer();


   


    </script>
</footer>

</html>