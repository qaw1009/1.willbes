@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="willbes-Counsel c_both">
                <div class="willbes-Lec-Tit NG bd-none tx-black pt-zero">· 강의실 배정표</div>

                <div class="willbes-User-Info mt40">
                    <div class="calendarTable widthAutoFull">
                        <div id="calendar_box"></div>

                        <div class="scheduleImg" id="schedule_box">
                        </div>
                    </div>
                </div>
            </div>

            <!-- willbes-Counsel -->
        </div>
        <div class="Quick-Bnr ml20">
            <img src="{{ img_url('sample/banner_180605.jpg') }}">
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            show_calendar('');
            show_schedule('','',{{date('d')}});

            $(document).on('click', '.calendar_day td', function() {
                show_schedule($(this).find("span").data('board-idx'),$(this).find("span").data('year-month'),$(this).find("span").data('sel-day'));
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

        function show_schedule(board_idx,year_month,sel_day) {
            var _url = '{{ front_url($default_path . '/showSchedule/') }}' + '?board_idx=' + board_idx + '&year_month=' + year_month + '&sel_day=' + sel_day;

            sendAjax(_url, '', function(ret) {
                $('#schedule_box').html(ret);
            }, showAlertError, false, 'GET', 'html');
        }

    </script>
@stop