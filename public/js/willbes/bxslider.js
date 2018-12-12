// Slider Script
$(function() {
    $('.slider').bxSlider({
        auto: true,
        controls: false,
        pause: 3000,
    });
});

// Slider Number Script
$(function() {
    $('.sliderNum').bxSlider({
        auto: true,
        controls: true,
        pause: 3000,
        pager: true,
        pagerType: 'short',
        moveSlides:1,
    });
});

// Slider Number Script (수동)
$(function() {
    $('.sliderNumTM').bxSlider({
        auto: false,
        controls: true,
        pause: 3000,
        pager: true,
        pagerType: 'short',
        moveSlides:1,
    });
});

// Slider Controls Script
$(function() {
    $('.sliderControls').bxSlider({
        auto: true,
        controls: true,
        pause: 3000,
        pager: false,
    });
});

// Slider Controls Script (수동)
$(function() {
    $('.sliderControlsTM').bxSlider({
        auto: false,
        controls: true,
        pause: 3000,
        pager: false,
        adaptiveHeight: true,
        infiniteLoop: false,
        hideControlOnEnd: true       
    });
});

// Slider Vertical Script
$(function() {
    $('.sliderVertical').bxSlider({
        mode: 'vertical', 
        auto: true,
        controls: false,
        infiniteLoop: true,
        slideWidth: 370,
        minSlides: 1,
        pause: 3000,
        pager: false,
    });
});

// Slider Main Script
$(function(){ 
    $(".MaintabSlider").bxSlider({
        mode:'fade',
        speed:400,
        pause:2000,
        auto : true,	
        autoHover: true,						
        pagerCustom: '#MainRollingDiv',
        controls:false, 
        onSliderLoad: function(){
            $("#MainRollingSlider").css("visibility", "visible").animate({opacity:1}); 
        }
    });
});
                

/**
 * slider util
 * @param ele_id
 * @param type
 * @param pause_sec
 */
function slider(ele_id, type, pause_sec) {
    var pasue_msec = pause_sec * 1000;
    // slider option
    var option = { auto: true, controls: false, pause: pasue_msec };
    switch (type) {
        case 'cSlider' :
                option = { auto: true, controls: true, pause: pasue_msec, pager: false };
            break;
        case 'nSlider' :
                option = { auto: true, controls: true, pause: pasue_msec, pager: true, pagerType: 'short', moveSlides: 1 };
            break;
        case 'vSlider' :
                option = { mode: 'vertical', auto: true, controls: false, pause: pasue_msec, pager: false, minSlides: 1 };
            break;
        case 'nSliderTM' :
                option = { mode: 'vertical', auto: false, controls: false, pause: pasue_msec, pager: false, minSlides: 1 };
            break;
        case 'cSliderTM' :
                option = { auto: false, controls: true, pause: pasue_msec, pager: false };
            break;
    }

    $('#' + ele_id).bxSlider(option);
}