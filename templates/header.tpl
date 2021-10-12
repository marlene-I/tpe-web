<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>BarApp</title>
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
                    {if isset($smarty.session.USER_ID)}
                    <li class="nav-item"><a href="admin" class="nav-link">Admin</a></li>
                    <li class="nav-item"><a href="logout" class="nav-link">Cerrar sesión ({$smarty.session.USER_EMAIL})</a></li>
                    {else}
                    <li class="nav-item"><a href="login" class="nav-link">Ingresar</a></li>
                    <li class="nav-item"><a href="registro" class="nav-link">Registro</a></li>
                    {/if}
                </ul> 
            </div>
        </nav>
    </header>
    
