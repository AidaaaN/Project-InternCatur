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
                    <div class="input-field userName">
                        <input type="text" id="userName" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field passWord">
                        <input type="password" id="passWord" placeholder="Enter your password" required>
                        <i class="uil uil-eye-slash" id="eyes" onclick="showPS()"> </i>
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
<script type="module">
        $('.button').on('click',function(a){
            //a.preventDefault();
            //alert('clicked);
            axios.post('login/check',{
                username : $('#userName').val(),
                password : $('#passWord').val(),
                _token : '{{csrf_token()}}'
            }).then(function(response){

                if(response.data.success){
                    window.location.href = response.data.redirect_url;
                }else{
                    Swal.fire('Berhasil Masuk','','success');
                }

                }).catch(function(error){
                     
                    if(error.response.status === 422){

                        Swal.fire(error.response.data.message,'','error');
                    }else{
                        Swal.fire('Gagal Login,Username/Password salah','','error');
                    }
                });
            });
</script>
</footer>

</html>