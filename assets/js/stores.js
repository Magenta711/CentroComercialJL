/*
    Carousel
*/
$('#carousel-example').on('slide.bs.carousel', function (e) {
    /*
        CC 2.0 License Iatek LLC 2018 - Attribution required
        https://azmind.com/bootstrap-carousel-multiple-items/
    */
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 5;
    var totalItems = $('.carousel-store-item').length;
 
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('.carousel-store-item').eq(i).appendTo('.carousel-store-inner');
            }
            else {
                $('.carousel-store-item').eq(0).appendTo('.carousel-store-inner');
            }
        }
    }
});
