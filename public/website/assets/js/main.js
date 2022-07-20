$('.main-slider').slick({
  nextArrow: false,
  prevArrow: false,
  // infinite: true,
  prevArrow:false,
  nextArrow:false,
  dots: true,
  autoplay:true,
  autoplaySpeed:4000
});

$('.popular-slider-container').slick({
  nextArrow: false,
  prevArrow: false,
  // infinite: true,
  prevArrow:false,
  nextArrow:false,
  dots: false,
  autoplay:true,
  autoplaySpeed:4000
});
$('.news-sliders-2').slick({
  nextArrow: false,
  prevArrow: false,
  // infinite: true,
  prevArrow:false,
  nextArrow:false,
  dots: false,
  autoplay:true,
  autoplaySpeed:4000
});
$('.news-slider').slick({
  prevArrow:$('#prev'),
  nextArrow:$('#next'),
  // infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay:true,
  autoplaySpeed:4000
});

$('.containers-slider').slick({
  prevArrow:$('#prev2'),
  nextArrow:$('#next2'),
  // infinite: true,
  slidesToShow: 6,
  slidesToScroll: 1,
  autoplay:true,
  autoplaySpeed:4000,
  responsive: [
    {
      breakpoint: 1199,
      settings: {
        centerMode: true,
        centerPadding: '0',
        slidesToShow: 5
      }
<<<<<<< HEAD
    ]
  });
  
  $(document).ready(function() {
     let tabImgItem = $('.tab-img-item');
     let galleryItems = $('.fancy-gallery-items a');
     let j = 1;
     for(let i = 0; i<=tabImgItem.length; i++){
      if(i === 0){
        $(tabImgItem[0]).addClass('active');
        $(galleryItems[0]).addClass('active');
      }
      $(tabImgItem[i]).attr("data-img", "img-"+[j]);
      $(galleryItems[i]).addClass('img-'+[j]);
      j++
      
     }
      
 });

  $(window).scroll(function(){
    var headSticky = $('.header-pos-container'),
        scroll = $(window).scrollTop();
  
    if (scroll >= 1) headSticky.addClass('header-shadow');
    else headSticky.removeClass('header-shadow');
  });

  $( window ).on("load", function() {
    var opened = $('.opened');
    for(var i = 0; i < opened.length; i++){
      if(opened.length>1){
        $(opened[0]).addClass('remove-bold');
      } 
    }
});

  $(document).ready(function() {
    $(".slick-dots li button").text(" ");
 });

 $(document).on('click', '.burger-lines ', function(){
  $('.burg-menu').toggleClass('active-burger');
  $('.burger-lines').toggleClass('active-close');
  $('body').toggleClass('fix');
  $(window).scrollTop(0)
=======
    },
    {
      breakpoint: 991,
      settings: {
        centerMode: true,
        centerPadding: '0',
        slidesToShow: 5
      }
    },
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0',
        slidesToShow: 4
      }
    },
    {
      breakpoint: 574,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0',
        slidesToShow: 2
      }
    }
  ]
>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8
});


$(window).scroll(function(){
  var headSticky = $('.header-pos-container'),
      scroll = $(window).scrollTop();

  if (scroll >= 1) headSticky.addClass('header-shadow');
  else headSticky.removeClass('header-shadow');
});

<<<<<<< HEAD
$(document).on('click', '.burger-container ul li .rotate-submenu-arrow ', function(){
  $(this).closest('.burger-container ul li').toggleClass('sub-open').siblings().removeClass('sub-open');
=======
$(document).ready(function() {
  $(".slick-dots li button").text(" ");
});

$(document).on('click', '.burger-lines ', function(){
$('.burg-menu').toggleClass('active-burger');
$('.burger-lines').toggleClass('active-close');
$('body').toggleClass('fix');
$(window).scrollTop(0)
});

$(document).on('click', '.bottom-navbar ul li ', function(){
$(this).addClass('colored').siblings().removeClass('colored');
});

$(document).on('click', '.burger-container ul li .rotate-submenu-arrow ', function(){
$(this).closest('.burger-container ul li').toggleClass('sub-open').siblings().removeClass('sub-open');
>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8
});
$(document).on('click', '.close-btn', function(){
$(".search-input").val(""); 
});

$('.count').each(function () {
$(this).prop('Counter',0).animate({
    Counter: $(this).text()
}, {
    duration: 4000,
    easing: 'swing',
    step: function (now) {
        $(this).text(Math.ceil(now));
    }
});
});
$(document).ready(function(){
<<<<<<< HEAD
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#search-list .product-list-item").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
=======
$("#myInput").on("keyup", function() {
  var value = $(this).val().toLowerCase();
  $("#search-list .product-list-item").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8
  });
});
});

<<<<<<< HEAD
// function myFunction(imgs) {
//   var expandImg = document.getElementById("expandedImg");
//   var tabFancy = document.getElementById("tab-fancy");
//   var oldImg = expandImg.src;
//   expandImg.src = imgs.src;
//   tabFancy.href = imgs.src;
//   expandImg.parentElement.style.zIndex = "3";
//   imgs.src = oldImg;
// }
=======
function myFunction(imgs) {
var expandImg = document.getElementById("expandedImg");
var tabFancy = document.getElementById("tab-fancy");
expandImg.src = imgs.src;
tabFancy.href = imgs.src;
expandImg.parentElement.style.display = "block";
}
>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8

$(document).ready(function() {
  $('.tab-img-item').click(function(){
   // $(this).data('img');
   $('.tab-img-item').removeClass('active');
   $(this).addClass('active');
   $('.fancy-gallery-items a').removeClass('active');
   $('.fancy-gallery-items .' + $(this).data('img')).addClass('active');
   // console.log($(this).data('img'));
  });

});

$(document).ready(function() {
var list = document.querySelectorAll(".list-ul li");
for(var i = 0; i<list.length; i++){
  if($(list[i]).children().length<3){
    $(list[i]).children("span").css("display", "none");
  }
}
});


$(document).on("click", ".filter-button",function(){
<<<<<<< HEAD
  var filter = $('.select-categories-box');
  var filterClose = $('.filter-title-close');
  // $(this).css("display", "none");
  filterClose.css("maxHeight", "88px").css("marginBottom", "26px");
  filter.addClass('addHeight');
});
$(document).on("click", ".filter-close",function(){
  var filterClose = $('.filter-title-close');
  var filter = $('.select-categories-box');
  var filterBtn = $('.filter-button');
  filterClose.css("maxHeight", "0").css("marginBottom", "0");
  filter.removeClass('addHeight');
  // filterBtn.css("display", "flex");
=======
var filter = $('.select-categories-box');
var filterClose = $('.filter-title-close');
$(this).css("display", "none");
filterClose.css("maxHeight", "88px").css("marginBottom", "26px");
filter.addClass('addHeight');
});
$(document).on("click", ".filter-close",function(){
var filterClose = $('.filter-title-close');
var filter = $('.select-categories-box');
var filterBtn = $('.filter-button');
filterClose.css("maxHeight", "0").css("marginBottom", "0");
filter.removeClass('addHeight');
filterBtn.css("display", "flex");
>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8
});


$(document).on('click', '.list-ul li > span', function(){
<<<<<<< HEAD
  const $item = $(this).closest('.list-ul li');
 
  if (!$item.hasClass('opened')) { 
        $item.parents('ul').first().children().removeClass('opened');
        $item.addClass('opened');
  } 
  else{
    $item.removeClass('opened');
  }
});
 
=======
const $item = $(this).closest('.list-ul li');
if (!$item.hasClass('opened')) { 
      $item.parents('ul').first().children().removeClass('opened');
      $item.addClass('opened');
} 
else{
  $item.removeClass('opened');
}
>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8

$(document).ready(function(){
  $('.list-ul').find('li.opened').parents('.list-ul li').addClass('opened');
});

$(document).ready(function(){
<<<<<<< HEAD
  var childUlA = $('.child-ul li a');
  var childUlLi = $('.child-ul li')
  for(var i = 0; i<childUlA.length; i++){
     var text = $(childUlA[i]).text();
    if(text.length >= 25){
      $(childUlLi[i]).css("max-height", "71px")
    }
  }
   
});

$(document).ready(function (){
  setTimeout(() => { 
    var alertBox = document.getElementsByClassName("alert"); 
    $(alertBox).css('display', 'none')
  }, 3000);
});

$(document).ready(function (){
    if($('.about-page-img-gallery').children().length <= 0){
      $('.about-page-img-gallery').addClass('after-remove');
      $('.about-page-img-gallery').css("marginTop", "0");
    }
});
 
=======
$('.list-ul').find('li.opened').parents('.list-ul li').addClass('opened');
});

>>>>>>> d922c0ffaf704877e41100065be4c367b03aefc8
//  $(document).on('click', '.list-ul li  span', function(){
//   const item = $(this).closest('.list-ul li');
//    for(var i = 0; i < item.length; i++){
//     $(item[i]).toggleClass('opened');                             
//     $(item[i]).siblings().removeClass("opened");
//    }

// });

