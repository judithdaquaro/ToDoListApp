<?php
require_once "./includes/connect.php";
require_once "./includes/helpers.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/inicio.css" />
    <title>To Do App</title>
  </head>

  <body>
    <header>
      <h1>To Do List</h1>
      <h3>Login</h3>
    </header>

    <div id="container" class="content">
        <?=showAlert('reg_suc', 'reg_err');?>
        <?=showAlert('err_suc', 'err_login');?>
        <form id="log" action="" method="post">
            <label for="user">User or email:</label>
            <input type="text" name="user" required/>

            <label for="password">Password:</label>
            <input type="password" name="password" required/>

            <input type="button" onclick="submitForm('./backend/loginUser.php',this.value)" value="Log In"></input>
            <input type="button" onclick="submitForm('./registro.php',this.value)" value="Sign Up"></input>
        </form>
    </div>

    <script type="text/javascript">
        function submitForm(action,clicked){
            let form = document.getElementById('log');
            let user = document.getElementsByName('user')[0].value;
            let password = document.getElementsByName('password')[0].value;

            if(clicked == 'Log In'){
                if(user && password){
                    form.action = action;
                    form.submit();
                }else{
                    console.log(user,password);
                    alert("Introduzca información en los campos");
                }
            }else{
                form.action = action;
                form.submit();
            }
        }
    </script>
    <?=clearErr();?>
  </body>
</html>
