<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['delete-cart-submit'])){
        $deletedrecord = $cart->deleteCart($_POST['item_id']);
    }

    //saveforlater

    if (isset($_POST['carttowishlist-submit'])){
        $cart->saveForLater($_POST['item_id']);
    }
}

?> 
 
 
 <!-- Shopping Cart -->
 <section id="cart">
            <div class="container py-5">

                <h4 class="font-rubik font-size-20">Cart</h4>
                <hr class="">
               
                <div class="row">
                     <!-- product-section -->
                    <div class="col-12 col-sm-12 col-md-8">
                    <?php
                    foreach ($product->getData('cart') as $item) :
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
                                <!-- product qty section -->
                                <div class="qty d-flex pt-2">
                                    <h6 class="font-raleway">Qty</h6>
                                    <div class="px-4 d-flex font-rale">
                                        <button class="qty-up border bg-light" data-id="pro1"><i
                                                class="fas fa-angle-up"></i></button>
                                        <input type="text" data-id="pro1" class="qty_input border px-2 w-50 bg-light"
                                            disabled value="1" placeholder="1">
                                        <button data-id="pro1" class="qty-down border bg-light"><i
                                                class="fas fa-angle-down"></i></button>
                                    </div>
                                </div>
                                <!-- end product qty section -->
                                <div class="d-flex pt-2">
                                <form method="post" class="w-50 mr-2">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                    <button
                                        class="btn bg-danger text-white font-rubik font-size-12 w-100" name="delete-cart-submit">Delete</button>
                                </form>
                                <form method="post" class="w-50 ">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                    <button class="btn color-accent-bg font-size-12 font-rubik w-100" name="carttowishlist-submit">Save for
                                        later</button>
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

                    <!-- subtotal section -->
                    <div class="col-md-4 border text-center h-100">
                        <h6 class="color-secondary font-size-16 font-raleway pt-3"><i
                                class="fas fa-check"></i>&nbsp;Free delivery</h6>
                        <hr>
                        <h6 class="color-primary font-size-16 font-rubik">Total <?php echo isset($subTotal) ? count($subTotal): 0?> item(s): <span class="text-danger">$<span><?php echo 0?></span></span></h6>
                        <button class="btn color-primary-bg text-white mb-4 cart-button">Proceed to Buy</button>
                    </div>
                    <!-- end subtotal section -->
                </div>
              

            </div>
        </section>
        <!-- End shopping cart -->