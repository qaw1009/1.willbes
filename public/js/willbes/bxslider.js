// Slider Script
$(function() {
    $('.sliderStopAuto').bxSlider({
        auto: true,
        autoControls: true,
        stopAutoOnClick: true,
        pager: false,
        controls: false,
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

$(function(){ 
    $(".proftabSlider").bxSlider({
        mode:'fade',
        speed:400,
        pause:2000,
        auto : false,	
        autoHover: true,						
        pagerCustom: '#RollingDiv',
        controls:true, 
        onSliderLoad: function(){
            $("#RollingSlider").css("visibility", "visible").animate({opacity:1}); 
        }
    });
});




// CurriSwipe Script
$(function(){ 
    $('.cswSlider .bx-controls .bx-controls-direction a').click(function() { 
        $(".cswRolling li").removeClass("active");
        $(".cswRolling a").removeClass("active");
        $(".CurriSwipe.cswRolling").removeClass("transform");
    });
    $(".CurriSwipe").bxSlider({
        controls:false,
        slideWidth: '260px',
        minSlides: 1,
        maxSlides: 1,
        moveSlides: 1,
        slideMargin: 10,
        infiniteLoop: false,
        hideControlOnEnd: true,   				
        pagerCustom: '.cswRolling',
        onSliderLoad: function(currentIndex){
            $(".CurriSwipe").children().eq(currentIndex).addClass("active");
            $(".CurriSwipe").css("visibility", "visible").animate({opacity:1}); 
        },
        onSlideBefore: function($slideElement){
            $(".CurriSwipe").children().removeClass("active");
            $slideElement.addClass("active");
        }
    });

    
    $('.cswRolling li').click(function() { 
        $(".CurriSwipe.cswRolling").removeClass("transform");

        //if ($('.CurriSwipe.cswRolling').hasClass('transform')) {
            //var n = $(this).length;
            //var now = parseInt(n-3)* 270;
            //$(".CurriSwipe.transform").css({"transform": "translate3d(" + now + "px, 0px, 0px)"});   
        //} else {
            
        //}
    });

    $('.cswRolling li:nth-last-child(3)').click(function() { 
        $(".CurriSwipe.cswRolling").addClass("transform");
    });
    $('.cswRolling li:nth-last-child(2)').click(function() { 
        $(".CurriSwipe.cswRolling").addClass("transform");
    });
    $('.cswRolling li:nth-last-child(1)').click(function() { 
        $(".CurriSwipe.cswRolling").addClass("transform");
    });

    $('.cswRolling').each(function () {
        // For each set of tabs, we want to keep track of
        // which tab is active and it's associated content
        var $active, $content, $links = $(this).find('a');

        // If the location.hash matches one of the links, use that as the active tab.
        // If no match is found, use the first link as the initial active tab.
        $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
        //$active.addClass('active');

        $content = $($active[0].hash);

        // Bind the click event handler
        $(this).on('click', 'a', function (e) {

            $(".cswRolling li").removeClass("active");
            $(".cswRolling a").removeClass("active");
            
            // Make the old tab inactive.
            $active.removeClass('active');
            $content.removeClass('active');

            // Update the variables with the new link and content
            $active = $(this);
            $content = $(this.hash);

            // Make the tab active.
            $active.addClass('active');
            $content.addClass('active');

            // Prevent the anchor's default click action
            e.preventDefault();
        });
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