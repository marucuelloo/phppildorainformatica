<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //creamos una cookie y otra pag para ver esa inf almacenada en esa cookie 
//metodo setcookie(nombre que quieres dar ,  valor , duracion en seg. funcion time() toma registro de la hs que se crea la cookie en el ordenador+30 es q desde q se carga la pagina la cokie dura 30 seg mas, la ruta "donde actua la cookie"  )
    setcookie("pruebass", "Esta es la informacion de nuestra primera cookie", time()+500, "/CursoPildoraPhp/v63sesionesycookies/zonacontenido/" );

    //cuando se cargue esta pagina, creara la cokie y la guardara en el directorio que tenga reservado el navegador 
    //crea en 2do plano la cokie al cargar la paguna
    //ahora quiero acceder a esa cookie: leercokie1

    //el comportamiento de la duracion de la cookie que tiene x defecto, si no se establece ningun parametro mas en la funcion setcookie es  q cuando cerramos el navegador la cookie desaparece
    //la duracion de la cookie se establece en segundos  en la funcion set cooki

    //si yo quiero que esta cookie actue en zona contenido, pongo esa direccion en la funcion setcookie y al ejecutarse leercokie2 es cuando veremos la ifnormacion de la cookie1, no vemos la cookie 1 en leercokie1, xq le dijimos x la funcion setcookie que vaya a zonacontenido


?>
    
</body>
</html>