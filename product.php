<?php
ob_start();
    //start header
    include('header.php');
    //end header
    //start main
?>

<?php

    include('templates/_products.php');

    include('templates/_similar-products.php');

?>

<?php
    //end main
    //start footer
    include('footer.php');
    //end footer
?>