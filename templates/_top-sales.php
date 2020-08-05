<?php
 $product_shuffle = $product->getData();
 shuffle($product_shuffle);

 //request method post
 if($_SERVER['REQUEST_METHOD'] == "POST"){
   if(isset($_POST['top_sale_submit'])){
   //call mehod addtoCart
   $cart->addtoCart($_POST['user_id'],$_POST['item_id']);
   }

   if (isset($_POST['delete-cart-submit'])){
    $deletedrecord = $cart->deleteCart($_POST['item_id']);
}
 }
?> 
 
 <!-- top-sales -->
    <section id="top-sales">
      <div class="container py-5">
      <div class="d-flex justify-content-between margin-neg">
        <h4 class="font-rubik font-size-20">Top Sales</h4>
        <h4 class="font-rubik font-size-16 color-primary">Shop More >></h4>

      </div>

        <hr class="">
        <div class="row owl-carousel owl-theme">

        <?php foreach($product_shuffle as $item) {?>
          <div class="item ml-4 py-2">
            <div class="product font-raleway text-dark">
              <a href="<?php printf('product.php?item_id=%s', $item['item_id'])?>"><img src="<?php echo $item['item_image']; ?>" alt="product" class="product-fluid">
              <div class="text-center">
                <h6><?php echo $item['item_name']??"unknown"; ?></h6>
                <div class="rating color-accent font-size-12">
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="far fa-star"></i></span>
                </div>
                <div class="price py-2">
                  <span>$<?php echo $item['item_price'];?></span>
                </div>
             
              </div>
              </a>
            </div>
           <div class="text-center">
            <form method="POST">
              <input type="hidden" name="user_id" value="<?php echo 1?>">
              <input type="hidden" name="item_id" value="<?php echo  $item['item_id']??1?>">
  
            <?php
                            if (in_array($item['item_id'], $cart->getCartId($product->getData('cart')) ?? [])){
                                echo '<button type="submit" class="btn color-primary-bg font-size-12 text-white" name="delete-cart-submit">Added to Cart</button>';
                            }else{
                                echo '<button type="submit" class="btn color-accent-bg font-size-12" name="top_sale_submit">Add to Cart</button>';
                            }
                            ?>
            </form>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <!-- end top-sales -->
