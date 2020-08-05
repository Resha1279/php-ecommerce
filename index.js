
// When the user scrolls the page, execute myFunction
window.onscroll = function() {scroll()};

// Get the navbar
var navbar = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function scroll() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

function addtoCart(){
    var button = document.getElementById(".add-to-cart");
    button.innerHTML === "Add to Cart" ? "Added to Cart" : "Add to Cart";
}


$(document).ready(function(){

    //banner
  
    var owl = $('#banner-area .owl-carousel');
    owl.owlCarousel({
        dots:true,
        loop:true,
        nav:true,
        items:1,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        slideSpeed : 300,
        paginationSpeed : 400,
});

//top sales

$('#top-sales .owl-carousel').owlCarousel({
    loop:true,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:2
        },
        500:{
            items:3
        },
        600:{
            items:3
        },
        800:{
            items:4
        },
        1000:{
            items:6
        }
    }
});

//isotop filter
var $grid = $(".grid").isotope({
    itemSelector:'.grid-item',
    layoutMode:'fitRows'
});

//filter items on button click
$(".button-group").on("click","button",function(){
    var filterValue = $(this).attr('data-filter');
    $grid.isotope({
        filter:filterValue
    });
});

//new products

$('#new-products .owl-carousel').owlCarousel({
    loop:true,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:2
        },
        500:{
            items:3
        },
        600:{
            items:3
        },
        800:{
            items:4
        },
        1000:{
            items:6
        }
    }
});

//blogs
$('#blogs .owl-carousel').owlCarousel({
    loop:true,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        }
    }
});

let $qty_up = $(".qty .qty-up");
let $qty_down = $(".qty .qty-down");

$qty_up.click(function(e){

    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
    if($input.val()>=1 && $input.val<=9){
        $input.val(function(i,oldval){
            return ++oldval;
        });
    }
});

$qty_down.click(function(e){

    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
    if($input.val()>1 && $input.val<=10){
        $input.val(function(i,oldval){
            return --oldval;
        });
    }
});


});