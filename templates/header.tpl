<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <div class="contendor-nav">   
                <ul class="navbar navbar-dark bg-dark">
                    </li> <li class="nav-item"><a href="" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Menu</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Categorias</a>
                        <ul class="submenu-categorias">
                           {foreach from=$categorias item=categoria}
                            <li class="nav-item"><a href="nombre_categoria/{$categoria->nombre}" class="nav-link">{$categoria->nombre}</a></li>
                            {/foreach}
                        </ul>    
                    <li class="nav-item"><a href="" class="nav-link">Login</a></li>
                    </li><li class="nav-item"><a href="admin" class="nav-link">Admin</a></li>
                </ul> 
            </div>
        </nav>
    </header>
    
