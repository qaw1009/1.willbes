// Slider Script
$(function() {
    $('.sliderStopAuto').bxSlider({
        auto: true,
        autoControls: true,
        stopAutoOnClick: true,
        pager: false,
        controls: false
    });
});

$(function() {
    $('.sliderStopAutoPager').bxSlider({
        mode:'fade',
        auto: true,
        autoControls: true,
        stopAutoOnClick: true,
        pager: true,
        controls: false
    });
});

$(function() {
    $('.slider').bxSlider({
        auto: true,
        controls: false,
        pause: 3000,
        onSliderLoad: function(){
            $(".bSlider").css("visibility", "visible").animate({opacity:1});
        }
    });
});

// 탭에서 사용하는 Slider
$(function() {
    $('.sliderTab').show().bxSlider({
        auto: true,
        controls: false,
        pause: 3000,
        preloadImages: 'all',
        onSliderLoad: function(){
            $(".bSlider").css("visibility", "visible").animate({opacity:1});
        }
    });
});

// Slider Script (수동)
$(function() {
    $('.sliderTM').bxSlider({
        auto: false,
        controls: false,
        pause: 3000,
        onSliderLoad: function(){
            $(".bSlider").css("visibility", "visible").animate({opacity:1}); 
        } 
    });
});

// Slider Number Script
$(function() {
    $('.sliderNum').bxSlider({        
        auto: true,
        controls: true,
        pause: 4000,
        pager: true,
        pagerType: 'short',
        moveSlides:1,
        adaptiveHeight: true,
        infiniteLoop: true,
        touchEnabled: false,
        onSliderLoad: function(){
            $(".nSlider").css("visibility", "visible").animate({opacity:1}); 
        }  
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
        onSliderLoad: function(){
            $(".nSliderTM").css("visibility", "visible").animate({opacity:1}); 
        }  
    });
});

// Slider Controls Script
$(function() {
    $('.sliderControls').bxSlider({
        auto: true,
        controls: true,
        pause: 3000,
        pager: false,
        onSliderLoad: function(){
            $(".cSlider").css("visibility", "visible").animate({opacity:1}); 
        }  
    });
});

// Slider Controls Script (마우스오버)
$(function() {
    $('.sliderControlsHover').bxSlider({
        auto: true,
        controls: true,
        pause: 3000,
        pager: false,
        autoHover: true,
        onSliderLoad: function(){
            $(".cSliderH").css("visibility", "visible").animate({opacity:1}); 
        }  
    });
});

// Slider Controls Script (수동)
$(function() {
    $('.sliderControlsTM').bxSlider({
        auto: false,
        controls: true,
        pause: 3000,
        pager: true,
        pagerType: 'short',
        adaptiveHeight: true,
        infiniteLoop: false,
        hideControlOnEnd: true,
        onSliderLoad: function(){
            $(".cSliderTM").css("visibility", "visible").animate({opacity:1}); 
        }    
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
        onSliderLoad: function(){
            $(".vSlider").css("visibility", "visible").animate({opacity:1}); 
        }
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
