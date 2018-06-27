$('ul.tabWrap').each(function(){
    // For each set of tabs, we want to keep track of
    // which tab is active and it's associated content
    var $active, $content, $links = $(this).find('a');

    // If the location.hash matches one of the links, use that as the active tab.
    // If no match is found, use the first link as the initial active tab.
    $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
    $active.addClass('on');

    $content = $($active[0].hash);

    // Hide the remaining content
    $links.not($active).each(function () {
        $(this.hash).hide().css('display','none');
    });

    // Bind the click event handler
    $(this).on('click', 'a', function(e){
        // Make the old tab inactive.
        $active.removeClass('on');
        $content.hide().css('display','none');

        // Update the variables with the new link and content
        $active = $(this);
        $content = $(this.hash);

        // Make the tab active.
        $active.addClass('on');
        $content.show().css('display','block');

        // Prevent the anchor's default click action
        e.preventDefault();
    });
});

function openLink(divID , Name) {
    var i, tabcontent, tablinks, hover = $('ul.tabWrap.tabDepth1').find('a');
    tabcontent = document.getElementById(divID);
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    
    tablinks = document.getElementsByClassName("tabLink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.display = "none";
    }

    hover.removeClass('on');
    hover = document.getElementById(Name);
    for (i = 0; i < hover.length; i++) {
        hover.classList.remove("on");
    }
    document.getElementById(Name).classList.add("on");
}