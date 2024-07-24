<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(["resources/css/style.css", "resources/js/app.js"])
    <!--  ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <!-- ===== CSS ===== -->

    <title>{{$title}}</title>
</head>

<body>

    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="#">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" id="pwShow" placeholder="Enter your password" required>
                        <i class="uil uil-eye-slash" id="eyes" onclick="showPS()"></i>
                    </div>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>

                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="button" value="Login Now">
                    </div>
                </form>

                <div class="login-signup">
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <script>
        function showPS() {
            var x = document.getElementById("pwShow");
            var y = document.getElementsByClassName("uil");
            if (x.type === "password") {
                x.type = "text";
                y.toggle("uil-eye");
            } else {
                x.type = "password";
            }
        }

        function eyes(x) {

        }

        const container = document.querySelector(".container"),
            pwShowHide = document.querySelectorAll(".showHidePw"),
            pwFields = document.querySelectorAll(".password");

        //js code to show/hide password and change icon
        pwShowHide.forEach(eyeIcon => {
            eyeIcon.addEventListener("click", () => {
                pwFields.forEach(pwFields => {
                    if (pwFields.type === "password") {
                        pwFields.type = "text";


                    } else {
                        pwFields.type = "password";
                    }
                })
            })
        })
        $(".uil").click(function() {
            $(".uil").toggleClass("uil-eye-slash uil-eye");
        });
    </script>
</footer>

</html>