<h4>
    ● 나의 출석기록
    <div id="average_box"></div>
</h4>
<div class="mt40">
    <div id="calendar_box"></div>
    <form name="calendar_form" id="calendar_form" method="post">
        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="supporters_idx" value="{{ $data['SupportersIdx'] }}">
        <div class="btnAttend">
            <a href="javascript:void(0);" id="btn_attendance">출석 체크하기 ></a>
        </div>
    </form>
</div>

<script type="text/javascript">
    var $calendar_form = $('#calendar_form');
    $(document).ready(function() {
        show_calendar();

        $calendar_form.on('click', '#btn_attendance', function() {
            var _url = '{{ front_url('/supporters/attendance/storeAttendance') }}';
            ajaxSubmit($calendar_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    show_calendar();
                }
            }, function(ret) {
                /*alert(ret.ret_msg);*/
                notifyAlert('error', '알림', ret.ret_msg);
                show_calendar();
            }, null, false, 'alert');
        });
    });

    function show_calendar(url) {
        var data = '';
        var _url = '';
        var supporters_idx = $calendar_form.find('input[name="supporters_idx"]').val();
        if (url == '' || typeof url === 'undefined') { _url = '{{ front_url('/supporters/attendance/showCalendar/') }}'; } else { _url = url; }
        _url = _url + '?supporters_idx='+supporters_idx;

        sendAjax(_url, data, function(ret) {
            $('#calendar_box').html(ret).show().css('display', 'block');
        }, showAlertError, false, 'GET', 'html');
    }
</script>