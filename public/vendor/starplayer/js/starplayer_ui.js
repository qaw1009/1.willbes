function initScriptUI(player) {
    var draggingSeekBar = false;
    var draggingRepeatBar = false;
    var timer;
    $(".starplayer_script_ui a").click(function(event) {
        event.preventDefault();
    });
    $(".starplayer_script_ui").each(function() {
        this.onselectstart = function() { return false; };
        this.unselectable = "on";
        jQuery(this).css('user-select', 'none');
        jQuery(this).css('-o-user-select', 'none');
        jQuery(this).css('-moz-user-select', 'none');
        jQuery(this).css('-khtml-user-select', 'none');
        jQuery(this).css('-webkit-user-select', 'none');
    });

    $(".btn_play").click(togglePlayback);
    $(".btn_pause").click(function() {player.pause()});
    $(".btn_stop").click(function() {player.stop()});
    $(".btn_backward").click(function() {player.backward()});
    $(".btn_forward").click(function() {player.forward()});
    $(".btn_repeat").click(function() {toggleRepeat()});
    $(".btn_fullscreen").click(function() {toggleFullscreen()});
    $(".btn_mute").click(function() {toggleMute()});

    $(".speed05").click(function() {setRate(0.5);$('.speed_controls_pop').hide();} );
    $(".speed06").click(function() {setRate(0.6);$('.speed_controls_pop').hide();} );
    $(".speed07").click(function() {setRate(0.7);$('.speed_controls_pop').hide();} );
    $(".speed08").click(function() {setRate(0.8);$('.speed_controls_pop').hide();} );
    $(".speed09").click(function() {setRate(0.9);$('.speed_controls_pop').hide();} );
    $(".speed10").click(function() {setRate(1.0);$('.speed_controls_pop').hide();} );
    $(".speed11").click(function() {setRate(1.1);$('.speed_controls_pop').hide();} );
    $(".speed12").click(function() {setRate(1.2);$('.speed_controls_pop').hide();} );
    $(".speed13").click(function() {setRate(1.3);$('.speed_controls_pop').hide();} );
    $(".speed14").click(function() {setRate(1.4);$('.speed_controls_pop').hide();} );
    $(".speed15").click(function() {setRate(1.5);$('.speed_controls_pop').hide();} );
    $(".speed16").click(function() {setRate(1.6);$('.speed_controls_pop').hide();} );
    $(".speed17").click(function() {setRate(1.7);$('.speed_controls_pop').hide();} );
    $(".speed18").click(function() {setRate(1.8);$('.speed_controls_pop').hide();} );
    $(".speed19").click(function() {setRate(1.9);$('.speed_controls_pop').hide();} );
    $(".speed20").click(function() {setRate(2.0);$('.speed_controls_pop').hide();} );

    $(".speed_view").click(function() { $(".speed_controls_pop").toggle(); } );



    $(".speed_minus").click(function() {player.setRate(((player.getRate() - 0.1) < 0.6) ? 0.6 : (player.getRate() - 0.1));} );
    $(".speed_plus").click(function() {player.setRate(((player.getRate() + 0.1) > 2.0) ? 2.0 : (player.getRate() + 0.1));} );

    function getPageX(event) {
        return event.originalEvent.changedTouches ? event.originalEvent.changedTouches[0].pageX : event.pageX;
    }
    $(".seekbar_l").bind("mousedown touchstart", function(event) {
        var trackBar = $(this);
        function getTime(event) {
            var x = getPageX(event) - trackBar.offset().left;
            var time = (x / trackBar.width()) * player.getDuration();
            if (time < 0)
                time = 0;
            if (time > player.getDuration())
                time = player.getDuration();
            return time;
        }
        function dragMove(event) {
            var time = getTime(event);
            updateTime(time);
            event.preventDefault();
        }
        function dragEnd(event) {
            draggingSeekBar = false;
            var pos = player.getCurrentPosition();
            player.setCurrentPosition(getTime(event));
            $(document).unbind("mousemove touchmove", dragMove);
            trackBar.unbind("mousemove touchmove", dragMove);
            $(document).unbind("mouseup touchend", dragEnd);
        }
        draggingSeekBar = true;
        updateTime(getTime(event));
        $(document).bind("mousemove touchmove", dragMove);
        trackBar.bind("mousemove touchmove", dragMove);
        $(document).bind("mouseup touchend", dragEnd);
        event.preventDefault();
    });

    $(".btn_repeatA").bind("mousedown touchstart", function(event) {
        var trackBar = $(this).parent();
        function getTime(event) {
            var x = getPageX(event) - trackBar.offset().left - 7;

            var time = (x / trackBar.width()) * player.getDuration();
            if (time < 0)
                time = 0;
            else if (time > player.getRepeatEndTime())
                time = player.getRepeatEndTime();
            return time;
        }
        function update(time) {
            var pointA = (time / player.getDuration()) * 100 + "%";
            var range = ((player.getRepeatEndTime() - time) / player.getDuration() * 100) + "%";
            $(".btn_repeatA").css("left", pointA);
            $(".repeatbar").css("left", pointA).css("width", range);
            $("#text_currentTime").text(formatTime(time));
        }
        function dragMove(event) {
            update(getTime(event));
            event.preventDefault();
        }
        function dragEnd(event) {
            draggingRepeatBar = false;
            player.setRepeatStartTime(getTime(event));
            $(document).unbind("mousemove touchmove", dragMove);
            trackBar.unbind("mousemove touchmove", dragMove);
            $(document).unbind("mouseup touchend", dragEnd);
        }
        draggingRepeatBar = true;
        update(getTime(event));
        $(document).bind("mousemove touchmove", dragMove);
        trackBar.bind("mousemove touchmove", dragMove);
        $(document).bind("mouseup touchend", dragEnd);

        event.preventDefault();
        event.stopPropagation();
    });
    $(".btn_repeatB").bind("mousedown touchstart",function(event) {
        var trackBar = $(this).parent();
        function getTime(event) {
            var x = getPageX(event) - trackBar.offset().left - 7;
            var time = (x / trackBar.width()) * player.getDuration();
            if (time < player.getRepeatStartTime())
                time = player.getRepeatStartTime();
            else if (time > player.getDuration())
                time = player.getDuration();
            return time;
        }
        function update(time) {
            var pointB = (time / player.getDuration()) * 100 + "%";
            var range = ((time - player.getRepeatStartTime()) / player.getDuration() * 100) + "%";
            $(".btn_repeatB").css("left", pointB)
            $(".repeatbar").css("width", range);
            $("#text_currentTime").text(formatTime(time));
        }
        function dragMove(event) {
            update(getTime(event));
            event.preventDefault();
        }
        function dragEnd(event) {
            draggingRepeatBar = false;
            player.setRepeatEndTime(getTime(event));
            $(document).unbind("mousemove touchmove", dragMove);
            trackBar.unbind("mousemove touchmove", dragMove);
            $(document).unbind("mouseup touchend", dragEnd);
        }
        draggingRepeatBar = true;
        update(getTime(event));
        $(document).bind("mousemove touchmove", dragMove);
        trackBar.bind("mousemove touchmove", dragMove);
        $(document).bind("mouseup touchend", dragEnd);
        event.preventDefault();
        event.stopPropagation();
    });

    $(".volumebar").bind("mousedown touchstart", function(event) {
        var trackBar = $(this);
        function getVolume(event) {
            var x = getPageX(event) - trackBar.offset().left;
            var volume = x / trackBar.width();
            if (volume < 0)
                volume = 0;
            else if (volume > 1)
                volume = 1;
            return volume;
        }
        function dragMove(event) {
            var volume = getVolume(event);
            player.setVolume(volume);
            event.preventDefault();
        }
        function dragEnd(event) {
            player.setVolume(getVolume(event));
            $(document).unbind("mousemove touchmove", dragMove);
            trackBar.unbind("mousemove touchmove", dragMove);
            $(document).unbind("mouseup touchend", dragEnd);
        }

        player.setVolume(getVolume(event));
        $(document).bind("mousemove touchmove", dragMove);
        trackBar.bind("mousemove touchmove", dragMove);
        $(document).bind("mouseup touchend", dragEnd);

        event.preventDefault();
    });

    player.bindEvent("open_state_change", updateOpenState);
    player.bindEvent("play_state_change", updatePlayState);
    player.bindEvent("rate_change", updateRateChange);
    player.bindEvent("repeat_change", updateRepeatChange);
    player.bindEvent("volume_change", updateVolumeChange);
    player.bindEvent("repeat_range_change", updateRepeatRangeChange);

    function updateOpenState(state) {
        switch (state) {
            case OpenState.OPENING:
                break;
            case OpenState.OPENED:
                updateDuration(player.getDuration());
                timer = setInterval(updateTime2, 500);
                break;
            case OpenState.CLOSED:
                updateDuration(0);

                break;
        }
        updateTextStatus(getStringFromOpenState(state));
    }

    function updatePlayState(state) {
        switch (state) {
            case PlayState.PLAYING:
                $(".btn_play").removeClass("btn_play").addClass("btn_pause");
                break;
            case PlayState.PAUSED:
                $(".btn_pause").removeClass("btn_pause").addClass("btn_play");
                break;
            case PlayState.STOPPED:
                $(".btn_pause").removeClass("btn_pause").addClass("btn_play");
                break;
            case PlayState.BUFFERING_STARTED:
                break;
        }

        updateTextStatus(getStringFromPlayState(state));
    }

    function updateTextStatus(status) {
        $(".control_text_status").text(status);
    }

    function updateRateChange(rate) {
        $(".speed_btn").removeClass("on");
        var speed_text = '1.0';
        var temp = Math.round((rate + Number.EPSILON) * 10);
        temp /= 10;
        var element;
        switch (temp) {
            case 0.5: element = $(".speed05");speed_text = '0.5'; break;
            case 0.6: element = $(".speed06");speed_text = '0.6'; break;
            case 0.7: element = $(".speed07");speed_text = '0.7'; break;
            case 0.8: element = $(".speed08");speed_text = '0.8'; break;
            case 0.9: element = $(".speed09");speed_text = '0.9'; break;
            case 1.0: element = $(".speed10");speed_text = '1.0'; break;
            case 1.1: element = $(".speed11");speed_text = '1.1'; break;
            case 1.2: element = $(".speed12");speed_text = '1.2'; break;
            case 1.3: element = $(".speed13");speed_text = '1.3'; break;
            case 1.4: element = $(".speed14");speed_text = '1.4'; break;
            case 1.5: element = $(".speed15");speed_text = '1.5'; break;
            case 1.6: element = $(".speed16");speed_text = '1.6'; break;
            case 1.7: element = $(".speed17");speed_text = '1.7'; break;
            case 1.8: element = $(".speed18");speed_text = '1.8'; break;
            case 1.9: element = $(".speed19");speed_text = '1.9'; break;
            case 2.0: element = $(".speed20");speed_text = '2.0'; break;
        }
        element.addClass("on");
        $("#speed_text").text(temp);
    }

    function updateRepeatChange(repeat) {
        if (repeat) {
            $(".btn_repeat").addClass("active");
            $(".currentbar").hide();
            $(".repeatbar").css("left", "0%").css("width", "100%").show();
            $(".btn_repeatA").css("left", "0%").show();
            $(".btn_repeatB").css("left", "100%").show();
        } else {
            $(".btn_repeat").removeClass("active");
            $(".currentbar").show();
            $(".repeatbar").hide();
            $(".btn_repeatA").hide();
            $(".btn_repeatB").hide();
        }
    }

    function updateVolumeChange(volume, mute) {
        if (mute)
            $(".btn_mute").addClass("active");
        else
            $(".btn_mute").removeClass("active");
        $(".btn_volume").css("left", volume * 100 + "%");
        $(".current_volumebar").css("width", volume * 100 + "%");
    }

    function updateRepeatRangeChange(start, end) {
        if (player.getRepeat()) {
            $(".btn_repeat").addClass("active");
            var pointA = (start / player.getDuration() * 100) + "%";
            var pointB = (end / player.getDuration() * 100) + "%";
            var range = ((end - start) / player.getDuration() * 100) + "%";
            $(".btn_repeatA").css("left", pointA).show();
            $(".btn_repeatB").css("left", pointB).show();
            $(".repeatbar").css("left", pointA).css("width", range).show();
        } else {
            $("btn_repeat").removeClass("active");
            $(".btn_repeatA").hide();
            $(".btn_repeatB").hide();
            $(".repeatbar").hide();
        }
    }

    function updateTime2() {
        if (!draggingSeekBar)
            updateTime(player.getCurrentPosition());
    }

    function updateTime(time) {
        var duration = player.getDuration();
        var pos = (duration > 0 ? (time / duration) * 100 : 0) + "%";
        $(".btn_seek").css("left", pos);
        $(".currentbar").css("width", pos);
        if (!draggingRepeatBar)
            $("#text_currentTime").text(formatTime(time));
    }

    function updateDuration(duration) {
        $("#text_duration").text(formatTime(duration));
    }

    function togglePlayback() {
        if (player.getPlayState() == PlayState.PLAYING)
            player.pause();
        else
            player.play();
    }

    function toggleRepeat() {
        var repeat = player.getRepeat();
        player.setRepeat(!repeat);
    }

    function toggleFullscreen() {
        if (player.getPlayState() == PlayState.PLAYING || player.getPlayState() == PlayState.PAUSED) {
            var fullscreen = player.getFullscreen();
            player.setFullscreen(!fullscreen);
        } else {
            player.setFullscreen(false);
        }
    }

    function toggleMute() {
        var mute = player.getMute();
        player.setMute(!mute);
    }

    function setRate(rate) {
        player.setRate(rate);
    }

    function formatTime(time) {
        if (!time)
            time = 0;
        var s = parseInt(time) % 60;
        var m = parseInt(time / 60) % 60;
        var h = parseInt(time / 60 / 60);
        function format(t) {
            if (t < 10)
                return "0" + t;
            else
                return t;
        }
        return [format(h), format(m), format(s)].join(":");
    }

    function getStringFromOpenState(state) {
        switch (state) {
            case OpenState.CLOSED:
                return "닫힘";
            case OpenState.OPENING:
                return "여는 중";
            case OpenState.OPENED:
                return "열림";
            case OpenState.CLOSING:
                return "닫는 중";
        }
    }

    function getStringFromPlayState(state) {
        switch (state) {
            case PlayState.STOPPED:
                return "정지";
            case PlayState.PLAYING:
                return "재생 중";
            case PlayState.PAUSED:
                return "일시정지";
            case PlayState.BUFFERING_STARTED:
                return "버퍼링";
            case PlayState.COMPLETE:
                return "재생완료";
        }
    }
}