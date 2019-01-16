var player;
var step_;
var realPlayerTime = null;
//var pcScreenWidth = screen.availWidth;
//var pcScreenHeight = screen.availHeight;

var playerWidth;
var playerHeight;

var playerTitleHeight = 45;
var playerPaddingWidth = 20;
var playerPaddingHeight = 70;

var video_container_width;
var video_container_height;
var controller_container_height = 80;

var SubFrameTag_width = 400;

var moveLeft;
var moveTop;

var ratio = 16;
var startPosition = 0;

function getStep() { return step_; }

function setStep(step) { step_ = step; }

function onMouseDbclick(x, y) { player.setFullscreen(!player.getFullscreen()); }

function onKeyDown(keycode)
{
    switch (keycode) {
        case 13: // ENTER
            player.setFullscreen(true);
            break;
        case 32: // SPACE
            if (player.getPlayState() == PlayState.PLAYING){ player.pause(); }
            else { player.play(); }
            break;
        case 38: // UP
            player.setVolume(player.getVolume() + 0.1);
            break;
        case 40: // DOWN
            player.setVolume(player.getVolume() - 0.1);
            break;
        case 37: // LEFT
            player.backward(getStep());
            break;
        case 39: // RIGHT
            player.forward(getStep());
            break;
        case 190: // >
            player.setRate(player.getRate() + 0.2);
            break;
        case 188: // <
            player.setRate(((player.getRate() - 0.2) < 0.6) ? 0.6 : (player.getRate() - 0.2));
            break;
        case 77: // M
            player.setMute(!player.getMute());
            break;
        case 82: // R
            player.setRepeat(!player.getRepeat());
            break;
        case 90: // z : 원배속
            player.setRate(((player.getRate() - 0.2) < 0.6) ? 0.6 : (player.getRate() - 0.2));
            break;
        case 88: // x : 느리게
            player.setRate(1);
            break;
        case 67: // c : 빠르게
            player.setRate(player.getRate() + 0.2);
            break;
        default:
            return;
    }
    return false;
}


function onPlayStateChange(state)
{
    switch (state) {
        case PlayState.PLAYING:
            player.setVisible(true);
            break;
        case PlayState.PAUSED:
            break;
        case PlayState.STOPPED:
            player.setVisible(false);
            break;
        case PlayState.BUFFERING_STARTED:
            fnCheckPID();
            break;
    }
}


function onError(error_code)
{
    player.setVisible(true);

    switch (error_code) {
        case StarPlayerError.MULTIPLE_CONNECTIONS:
            alert("아이디 동시 접속!");
            break;
    };
}


function click()
{
    if ( (event.button==2) || (event.button==3) || (event.keyCode == 93) ) {
        return false;
    }
    else {
        if( event.ctrlKey ) {
            return false;
        }
    }
}

function setScreenReSizeVal()
{
    video_container_height = parseInt(video_container_width * 9 / ratio);

    playerWidth = video_container_width + SubFrameTag_width + playerPaddingWidth;
    playerHeight = video_container_height + playerTitleHeight + controller_container_height + playerPaddingHeight;
    moveLeft = parseInt((( screen.availWidth - 10 ) - playerWidth) / 2);
    moveTop = parseInt((( screen.availHeight - 30 ) - playerHeight) / 2);
}

function screenResize()
{
    window.moveTo(moveLeft, moveTop);
    window.resizeTo(playerWidth, playerHeight);
    $("#subframe").attr("style", "height:" + parseInt(video_container_height + playerTitleHeight + controller_container_height) + "px; width:" + SubFrameTag_width + "px;");

    $("#video-container").attr("style", "height:" + video_container_height + "px; width:" + video_container_width + "px;");
    $("#controller-container").attr("style", "height:" + controller_container_height + "px; width:" + video_container_width + "px;");
    $("#controller-container2").attr("style", "position:absolute;display:block;left:0px;height:" + controller_container_height + "px; width:" + video_container_width + "px;top:" + parseInt(video_container_height +playerTitleHeight) + "px;");
}


function fnDefense()
{
    return ;

    var checkStatus;
    var checkCrome = true;
    var element = new Image();

    try {
        element.__defineGetter__('id', function() {
            checkStatus = 'on';
        });
    } catch (e) {
        checkCrome = false;
    } finally {

    }

    var interVal = setInterval(function () {
        if (checkCrome) {
            checkStatus = 'off';
            console.log(element);
            console.clear();
            if (checkStatus == "on") {
                player.stop();
                clearInterval(interVal);
                document.write ("디버깅 창이 활성 화 되어 있습니다.<br>디버깅 창 종료 후 다시 이용하여 주시기 바랍니다.");
            }
        }
        else {
            var isIeDebugging = !!window.__IE_DEVTOOLBAR_CONSOLE_COMMAND_LINE || ('__BROWSERTOOLS_CONSOLE_SAFEFUNC' in window);
            if (isIeDebugging == true) {
                player.stop();
                clearInterval(interVal);
                document.write ("디버깅 창이 활성 화 되어 있습니다.<br>디버깅 창 종료 후 다시 이용하여 주시기 바랍니다.");
            }
        }
    }, 500);
}


function fnStartPlayer(config, media)
{
    player = new StarPlayer(config, media);
    player.onKeyDown = onKeyDown;
    player.onMouseDbclick = onMouseDbclick;
    player.onPlayStateChange = onPlayStateChange;
    player.onError = onError;
    initScriptUI(player);
}


function fnSetTop(obj)
{
    if(player.getTopmost() == true){
        player.setTopmost(false);
        $(obj).removeClass('on');

    } else if(player.getTopmost() == false){
        player.setTopmost(true);
        $(obj).addClass('on');
    }

    player.setTopmost(true);

    alert(player.getTopmost());
}


function fnSettingPOP()
{
    $('#settingPOP').toggle();
}

function fnViewFAQ()
{

}

//document.onmousedown = click;
//document.onkeydown = click;

/*
$(document).keydown(function (event) {
    if (event.keyCode == 123) {
        return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
        return false;
    }
});


$(document).on("contextmenu", function (e) {
    e.preventDefault();
});
*/



