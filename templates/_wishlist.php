<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['delete-wishlist-submit'])){
        $deletedrecord = $cart->deleteCart($_POST['item_id'],'wishlist');
    }

    
    if(isset($_POST['wishlisttocart-submit'])){
        $cart->saveForLater($_POST['item_id'], 'cart', 'wishlist');
    }
}

?> 
 
 
 <!-- Shopping Cart -->
 <section id="cart">
            <div class="container py-5">

                <h4 class="font-rubik font-size-20">Wish List</h4>
                <hr class="">
               
                <div class="row">
                     <!-- product-section -->
                    <div class="col-12 col-sm-12 col-md-8">
                    <?php
                    foreach ($product->getData('wishlist') as $item) :
                        $cart = $product->getProduct($item['item_id']);
                        $subTotal[] = array_map(function ($item){
                ?>
                        <div class="row border-bottom p-2 my-1">
                            <div class="col-4 col-md-3">
                                <img src="<?php echo $item['item_image']?>" alt="product" class="img-fluid cart-thumb">
                            </div>
                            <div class="col-8 col-sm-6 col-md-7 col-lg-5 ">
                                <h6><?php echo $item['item_name']?></h6>
                                <small><?php echo $item['item_brand']?></small>
                                <div class="d-flex">
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                    </div>
                                    <a href="#" class="font-size-14 color-primary">&nbsp;40,871 ratings</a>
                                </div>
                                
                                <div class="d-flex pt-2">
                                <form method="post" class="w-50 mr-2">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                    <button
                                        class="btn bg-danger text-white font-rubik font-size-12 w-100" name="delete-wishlist-submit">Delete</button>
                                </form>
                                <form method="post" class="w-50 ">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                    <button class="btn color-accent-bg font-size-12 font-rubik w-100" name="wishlisttocart-submit">Add to Cart</button>
                                        </form>  
                                </div>
                            </div>
                            <div class="col-3 col-sm-2 col-md-2 col-lg-4  text-right cart-price ">
                                <h6 class="text-danger">$<span><?php echo $item['item_price']?></span></h6>
                            </div>
                        </div>
                        <?php
                        return $item['item_price'];
                        }, $cart); // closing array_map function
                    endforeach;
                ?>
                    </div>
                      <!-- end product-section -->
                </div>
              

            </div>
        </section>
        <!-- End shopping cart -->