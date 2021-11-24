<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        {for ($i=1) to $totalPages}
                <li class="page-item"><a class="page-link" href="paginar/5/{$i}"> {$i}</a></li>
        {/for}
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</nav>