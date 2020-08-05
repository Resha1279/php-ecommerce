<?php
ob_start();
    //start header
    include('header.php');
    //end header
    //start main
?>

<?php

    count($product->getData('cart'))?
    include('templates/_cart-template.php') :
    include('templates/notFound/_cart_notfound.php');

    count($product->getData('wishlist'))?
    include('templates/_wishlist.php'):
    include('templates/notFound/_wishlist_notfound.php');


    include('templates/_continue-shopping.php');

?>

<?php
    //end main
    //start footer
    include('footer.php');
    //end footer
?>