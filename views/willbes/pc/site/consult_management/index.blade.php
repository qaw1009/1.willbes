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
            <span id="calendar_box"></span>
            <span id="schedule_box"></span>
        </div>
    </div>

    {!! banner('고객센터_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
</div>

<script type="text/javascript">
$(document).ready(function() {
    show_calendar('');
});

function show_calendar(url) {
    var data = '';
    var _url  = '';

    if (url == '') {
        _url = '{{ front_url('/consultManagement/calendar/') }}';
    } else {
        _url = url;
    }

    _url = _url + '?s_campus='+$('#s_campus').val();

    sendAjax(_url, data, function(ret) {
        $('#calendar_box').html(ret).show().css('display', 'block').trigger('click');
    }, showAlertError, false, 'GET', 'html');
}

function show_schedule(data) {
    var data = {
        '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
        'site_code' : '',
        'learnpatternccd' : $("#LearnPatternCcd").val()
    };

    sendAjax(_url, data, function(ret) {
        $('#calendar_box').html(ret).show().css('display', 'block').trigger('click');
    }, showAlertError, false, 'GET', 'html');
}
</script>
@stop