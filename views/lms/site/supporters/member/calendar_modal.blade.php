@extends('lcms.layouts.master_modal')

@section('layer_title')
    달력보기
@stop

@section('layer_header')
<style type="text/css">
    /* calendarTable */
    .calendarTable {
        width: 68%;
    }
    table.calendar {
        width: 100%;
        border: 1px solid #bebebe;
    }
    tr.calendar_week td,
    tr.calendar_day td {
        border-top: 1px solid #bebebe;
        border-left: 1px solid #bebebe;
        font-size: 13px;
    }
    tr.calendar_week td:first-child,
    tr.calendar_day td:first-child {
        border-left: none;
        color: #ed1c24;
    }
    tr.calendar_week th:last-child,
    tr.calendar_day td:last-child {
        color: #1a8ccb;
    }
    tr.calendar_week td {
        background: #f1f1f1;
        height: 36px;
        text-align: center;
    }
    tr.calendar_day td {
        position: relative;
        height: 66px;
        padding: 12px 12px 8px;
        vertical-align: top;
    }
    tr.calendar_month th {
        font-size: 18px;
        padding: 22px 0;
    }
    tr.calendar_month th span {
        display: inline-block;
        width: 29px;
        height: 29px;
        margin: 0 30px;
    }
    span.calendar_btn {
        position: absolute;
        bottom: 10px;
        left: 0;
        right: 0;
        font-family: "NanumGothic-Regular", "Nanum Gothic", "나눔고딕", "sans-serif";
        font-size: 12px;
        font-weight: 300;
        text-align: center;
        line-height: 16px;
        margin: 0 8%;
        padding: 2px 0;
    }
    .btn_end {
        background: #eaeaea;
        border: 1px solid #c9c9c9;
        color: #888;
    }
    .btn_ing {
        background: #1a8ccb;
        border: 1px solid #1a8ccb;
        color: #fff;
    }
    tr.calendar_day td span.attend {display:block; width:30px; height:30px; line-height:30px; border-radius:20px;
        background:#d12c10; float:right}
    tr.calendar_month th {
        text-align: center;
    }
</style>

<form class="form-horizontal" id="_search_form_calendar" name="_search_form_calendar" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    @foreach($arr_hidden_data as $key => $val)
        <input type="hidden" name="{{ $key }}" value="{{ $val }}">
    @endforeach
@endsection

@section('layer_content')
    <div id="calendar_box"></div>

    <script type="text/javascript">
        var $_search_form_calendar = $('#_search_form_calendar');
        $(document).ready(function() {
            show_calendar();
        });

        function show_calendar(url) {
            var data = '';
            var _url = '';
            var supporters_idx = $_search_form_calendar.find('input[name="supporters_idx"]').val();
            var member_idx = $_search_form_calendar.find('input[name="member_idx"]').val();
            if (url == '' || typeof url === 'undefined') { _url = '{{ site_url('/site/supporters/member/showCalendar/') }}'; } else { _url = url; }
            _url = _url + '?supporters_idx='+supporters_idx+'&member_idx='+member_idx;

            sendAjax(_url, data, function(ret) {
                $('#calendar_box').html(ret).show().css('display', 'block').trigger('click');
            }, showAlertError, false, 'GET', 'html');
        }
    </script>
@stop
@section('add_buttons')

@endsection
@section('layer_footer')
</form>
@endsection