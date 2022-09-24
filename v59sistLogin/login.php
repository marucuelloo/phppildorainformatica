<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
        }
        table{
            width:25%;
            background-color:#FFC;
            border: 2px dotted #F00;
            margin: auto;
        }
        .izq{
            text-align: right;
        }
        .der{
            text-align: left;
        }
        td{
            text-align:center;
            padding:10px;
            
        }

    </style>
</head>
<body>
    <h1> Introduce tus datos<h1>

<form action="compruebalogin.php" method="post">
    <table><tr><td class="izq">
      Usuario:</td> <td class="der"> <input type="password" name="login"></td></tr>
      <tr><td class="izq">
      contraseña:</td> <td class="der"> <input type="password" name="contra"></td></tr>
      <tr><td colspan="2"> <input type="submit" name="enviar" value="Login"></td></tr></table>
</form>

</body>
</html>