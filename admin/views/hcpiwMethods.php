<nav class="nav-tab-wrapper woo-nav-tab-wrapper">
    <a href="?" class="nav-tab <?php echo $active_tab == '' ? 'nav-tab-active' : ''; ?>">
        Handle Image
    </a>
</nav>

<?php

$active_tab = "hcpiwMethod";
include("tabs/" . $active_tab . ".php")

?>
