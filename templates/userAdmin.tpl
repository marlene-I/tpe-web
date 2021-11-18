{include file="header.tpl"}
{if $users}
<div class="container">
    <table class="table table-hover table-responsive">
        <div class="d-flex justify-content-center">
            <h3 class="p-3">Administrar usuarios</h2>
        </div>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th></th>
                <th>Modificar</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="table table-responsive">
            {foreach from=$users item=user}
            <tr>
                <td>{$user->nombre}</td>
                <td>{$user->email}</td>
                <td>{$user->rol}</td>
                <form action="cambiarRol" method="post">
                    <td>
                        <input hidden type="hidden" name="user-id" value="{$user->id}"></input>
                        <select name="rol-id" id="" class="form-select">
                            <option selected={$user->id_rol}>{$user->rol}</option>
                            {if $user->id_rol == 1}
                            <option value="2">User</option>
                            {else}
                            <option value="1">Admin</option>
                            {/if}
                        </select>
                    </td>
                    <td>
                        <button href="cambiarRol" class="btn btn-outline-danger">Guardar cambio</button>
                    </td>
                </form>
                <td>
                    <a href="borrarUsuario/{$user->id}" class="btn btn-outline-danger">Eliminar</a>
                </td>

            </tr>
            {/foreach}
        </tbody>
    </table>
</div>
{else}
<div class="alert alert-danger m-5 d-flex justify-content-center">{$error}</div>
{/if}
{include file="footer.tpl"}