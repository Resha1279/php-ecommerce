<?php

$category = array_map(function($pro){
  return $pro['item_category'];
} ,$product_shuffle);

$unique = array_unique($category);
sort($unique);

shuffle($product_shuffle);

//request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
  if(isset($_POST['special-price-submit'])){
  //call mehod addtoCart
  $cart->addtoCart($_POST['user_id'],$_POST['item_id']);
  }

  
  if (isset($_POST['delete-cart-submit'])){
    $deletedrecord = $cart->deleteCart($_POST['item_id']);
}
}

$in_cart = $cart->getCartId($product->getData('cart'));

?>   
   
   
   <!-- Speciial Price -->

    <section id="special-price">
      <div class="container">
        <h4 class="font-rubik font-size-20">Special Price</h4>
        <hr class="">
        <div id="filters" class="button-group text-right font-raleway font-size-14">
          <button class="btn is-checked category-btn font-size-12" data-filter="*">All Products</button>
          <?php
          
          array_map(function($category){
            printf(' <button class="btn category-btn font-size-12" data-filter=".%s">%s</button>',$category,$category);
          },$unique)
          
          ?>
          <span class="color-secondary font-size-14">>></span>
          <!-- <button class="btn" data-filter=".phones">Mobile and Electronics</button>
          <button class="btn" data-filter=".fashion">Fashion</button>
          <button class="btn" data-filter=".makeups">Makeups and Accessories</button>
          <button class="btn" data-filter=".food">Food</button>
          <button class="btn" data-filter=".home">Home</button> -->
        </div>
        <div class="grid row">
          <?php array_map(function($item)use($in_cart){ ?>
          <div class="grid-item col-6 col-sm-6 col-md-4 col-lg-2 text-center <?php echo $item['item_category']?>">
            <div class="item py-2 my-auto">
              <div class="product font-raleway">
                <a href="<?php printf('product.php?item_id=%s', $item['item_id']);?>"><img src="<?php echo $item['item_image']?>" alt="product" class="product-fluid">
                <div class="text-center">
                  <h6><?php echo $item['item_name']?></h6>
                  <div class="rating color-accent font-size-12">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="far fa-star"></i></span>
                  </div>
                  <div class="price py-2">
                    <span>$<?php echo $item['item_price']?></span>
                  </div>
                  <form method="POST">
           <input type="hidden" name = "user_id" value="<?php echo $item['user_id']??1?>">
           <input type="hidden" name = "item_id" value="<?php echo $item['item_id']??1?>">
           
           <?php
                            if (in_array($item['item_id'], $in_cart ?? [])){
                                echo '<button type="submit" class="btn color-primary-bg font-size-12 text-white" name="delete-cart-submit">Added to Cart</button>';
                            }else{
                                echo '  <button type="submit" class="btn color-accent-bg font-size-12" name="special-price-submit">Add to Cart</button>';
                            }
                            ?>
          
            </form>
                </div>
                </a>
              </div>
            </div>
          </div>
          <?php },$product_shuffle)?>
        </div>
      </div>
    </section>

    <!-- End Speciial Price -->