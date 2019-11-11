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
            @include('willbes.pc.site.consult_management.common')
        </div>
            <div class="willbes-User-Info">
                <form id="calendar_form" name="calendar_form"><span id="calendar_box"></span></form>
                <span id="schedule_box"></span>
           </div>

        {{--<div id="RESERVEPASS"></div>--}}
    </div>
    {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
</div>

<script type="text/javascript">
    var $calendar_form = $('#calendar_form');
    $(document).ready(function() {
        show_calendar('');
        show_schedule('');

        $calendar_form.on('click', '.btn_ing', function() {
            show_schedule($(this).data('cs_idx'));
        });
    });

    function show_calendar(url) {
        var data = '';
        var _url = '';
        if (url == '') { _url = '{{ front_url('/consultManagement/showCalendar/') }}'; } else { _url = url; }
        _url = _url + '?s_campus='+$('#s_campus').val();

        sendAjax(_url, data, function(ret) {
            $('#calendar_box').html(ret).show().css('display', 'block').trigger('click');
        }, showAlertError, false, 'GET', 'html');

        $('#schedule_list_table').html('');
        $('#this_date').text('날짜를 선택해주세요.');
    }

    function show_schedule(cs_idx) {
        var _url = '{{ front_url('/consultManagement/showSchedule/') }}' + '?cs_idx=' + cs_idx;

        sendAjax(_url, '', function(ret) {
            $('#schedule_box').html(ret).show().css('display', 'block').trigger('click');
        }, showAlertError, false, 'GET', 'html');
    }
</script>
@stop