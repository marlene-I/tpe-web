{if $totalPages != null}

<nav class="d-flex justify-content-center" aria-label="Page navigation example">
    <ul class="pagination">
    {if $actualPage == 1}
        <li class="page-item disabled"><a class="page-link " href="paginar/5/{$previousPage}">Previous</a></li>
        
    {else}
        <li class="page-item"><a class="page-link" href="paginar/5/{$previousPage}">Previous</a></li>
        
    {/if}
        {for ($i=1) to $totalPages}
                <li class="page-item"><a class="page-link" href="paginar/5/{$i}"> {$i}</a></li>
        {/for}

    {if $actualPage == $totalPages}
        <li class="page-item disabled"><a class="page-link " href="paginar/5/{$nextPage}">Next</a></li>
        
    {else}
        <li class="page-item"><a class="page-link" href="paginar/5/{$nextPage}">Next</a></li>
        
    {/if}
    </ul>
</nav>
{/if}