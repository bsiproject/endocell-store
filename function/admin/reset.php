<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="../images/title.png">
    <script src="js/jquery.min.js"></script>
    <title>ENCOCELL STORE</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: left;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 50px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

         .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-ubah {
            background-color: #4CAF50;
            color: #fff;
        }

        .btn-batal {
            background-color: #FF0000;
            color: #fff;
        }

        input[type="submit"],
        input[type="button"] {
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            width: 45%; /* Menyesuaikan lebar tombol */
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ubah Username dan Password</h2>
        <!-- <form action="proses_ubah.php" method="POST"> -->
        <form>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <label for="new_username">Username Baru:</label>
            <input type="text" id="new_username" name="new_username" required>
            <br>
            <label for="new_password">Password Baru:</label>
            <input type="password" id="new_password" name="new_password" required>
            <br>
             <div class="button-container">
                <input type="button" class="btn-ubah" value="Ubah" id="btnChange">
                <input type="button" class="btn-batal" value="Batal" onclick="batal()">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function batal() {
            // window.location.href = 'http://localhost/endocell-main/function/index.php';
            history.go(-1)
        }
    </script>
    <script>
        $(document).ready(function(){
            $("#btnChange").click(()=>{
                var oldUss = $("#username").val();
                var oldPass = $("#password").val();
                var newUss = $("#new_username").val();
                var newPass = $("#new_password").val();

                if(oldUss == "" || oldPass == "" || newUss == "" || newPass == ""){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Form Kosong!',
                        text: 'Tolong lengkapi form',
                    })
                } else {
                    $.ajax({
                        url: "../../api.php",
                        method: 'POST',
                        data: {
                            action: 'changeAdminPassword',
                            oldUss: oldUss,
                            oldPass: oldPass,
                            newUss: newUss,
                            newPass: newPass,
                        },
                        success: function(response){
                            if(response == "empty"){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Salah!',
                                    text: 'Username & Password tidak cocok',
                                })
                            } else if(response == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Username & Password telah diubah',
                                }).then((e)=>{
                                    if(e.isConfirmed){
                                        window.location.href = '../index.php';
                                    }
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Username & Password gagal diubah',
                                })
                            }
                        }
                        });
                }
            });
        })
    </script>
</body>
</html>
