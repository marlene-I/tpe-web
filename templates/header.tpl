<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text-css" href="css/style.css">

    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

    <title>BarApp</title>

</head>

<body>
    <header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class=" d-flex justify-content-around container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a href="" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item  ">
                            <a href="" class="nav-link">Menu</a>
                        </li>
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Categorias
                            </a>

                            <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                                {foreach from=$categorias item=categoria}
                                <li>
                                    <a href="nombre_categoria/{$categoria->nombre}" class="dropdown-item">{$categoria->nombre}</a>
                                </li>
                                {/foreach}
                            </ul>

                        </li>
                        {if ($smarty.session.USER_ROL eq 1)}
                        <li class="nav-item ">
                            <a href="admin" class="nav-link me-2">Administrar Productos</a>
                        </li><li class="nav-item ">
                            <a href="usuarios" class="nav-link me-2">Administrar Usuarios</a>
                        </li>
                        {/if}
                        {if isset($smarty.session.USER_ID)}
                        <li class="nav-item ">
                            <a href="logout" class="nav-link">Cerrar sesión({$smarty.session.USER_EMAIL})</a>
                        </li>
                        {else}
                        <li class="nav-item ">
                            <a href="registro" class="nav-link">Registro</a>
                        </li>
                        <li class="nav-item "><a href="login" class="nav-link">Ingresar</a>
                        </li>
                        {/if}
                    </ul>
                </div>
            </div>
        </nav>

    </header>