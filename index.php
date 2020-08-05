<?php
ob_start();
    //start header
    include('header.php');
    //end header
    //start main
?>

 
<?php
    include('templates/_banner-area.php');

    include('templates/_top-sales.php');

    include('templates/_special-price.php');

    include('templates/_ads.php');

    include('templates/_new-products.php');

    include('templates/_blogs.php');
?>


<?php
    //end main
    //start footer
    include('footer.php');
    //end footer
?>
