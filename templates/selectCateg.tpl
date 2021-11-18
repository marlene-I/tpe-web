<select name="categoria" id="select" class="form-select w-50 mt-2">
    {foreach from=$categorias item=categoria}
        <option value={$categoria->id}>{$categoria->nombre}</option>
    {/foreach}  
</select>