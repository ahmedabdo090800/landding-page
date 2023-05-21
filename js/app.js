$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay:true,
    navText : ["<i class='fa-solid fa-angles-left'></i>","<i class='fa-solid fa-angles-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
  })