
<select name="categoria" id="select" class="form-select my-1 w-100 ">
    {foreach from=$categorias item=categoria}
        <option value={$categoria->id}>{$categoria->nombre}</option>
    {/foreach}  
</select>