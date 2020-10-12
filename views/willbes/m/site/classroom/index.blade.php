@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div class="willbes-Tit NGEB p_re">
            <button type="button" class="goback" onclick="history.back(-1); return false;">
                <span class="hidden">뒤로가기</span>
            </button>
            강의실 배정표
        </div>

        <div class="mt20">
            <div class="calendarTable widthAutoFull">

                <div id="calendar_box"></div>

                <div class="scheduleImg" id="schedule_box">
                </div>

            </div>
        </div>

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            show_calendar('');
            show_schedule({{date("Ymd")}});

            $(document).on('click', '.calendar_day td', function() {
                if($(this).find("span").length > 0){
                    show_schedule($(this).find("span").data('sel-day'));
                }
            });
        });

        function show_calendar(url) {
            var data = '';
            var _url = '';
            if (url == '') { _url = '{{ front_url($default_path . '/showCalendar/') }}'; } else { _url = url; }

            sendAjax(_url, data, function(ret) {
                $('#calendar_box').html(ret).show().css('display', 'block').trigger('click');
            }, showAlertError, false, 'GET', 'html');

            $('#schedule_list_table').html('');
            $('#this_date').text('날짜를 선택해주세요.');
        }

        function show_schedule(sel_day) {
            var _url = '{{ front_url($default_path . '/showSchedule/') }}' + '?sel_day=' + sel_day;

            sendAjax(_url, '', function(ret) {
                $('#schedule_box').html(ret);
            }, showAlertError, false, 'GET', 'html');
        }

    </script>
@stop