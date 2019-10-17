@extends('lcms.layouts.master_modal')

@section('layer_title')
    과제노출날짜관리
@stop

@section('layer_header')
<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" onsubmit="return false;" novalidate>
{{--<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" novalidate action="{{ site_url("/board/professor/{$boardName}/storeSchedule/{$prod_code}?{$boardDefaultQueryString}") }}">--}}
    {!! csrf_field() !!}
@endsection

@section('layer_content')
<div class="x_panel">
    <div class="x_content">
        <div class="form-group form-group-sm">
            <div class="x_txt">※ 과제노출기간 : 강좌상품 등록일부터 과제 노출일 설정 가능</div>
            <div class="x_txt">※ 오늘 이후의 노출일만 수정 (과거 노출일 변경 시, 회원에게 노출된 과제에 영향을 줄 수 있음)</div>
        </div>
    </div>
    <div class="x_content">
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1" >노출기간 <span class="required">*</span>
            </label>
            <div class="col-md-10 form-inline item">
                [강좌등록일] <input type="text" name="start_date" id="start_date" class="form-control" title="강좌개강일" value='{{$schedule_data['start_date']}}' style="width:100px;" required="required" readonly="readonly">
                [종료일] <input type="text" name="end_date" id="end_date" class="form-control datepicker" title="종료일" value='{{$schedule_data['end_date']}}' style="width:100px;" required="required">
                &nbsp;&nbsp;[노출요일]
                <input type="checkbox" name="week[]" class="flat" @if($schedule_data['week_arr'][0] == "Y") checked="checked" @endif>일
                <input type="checkbox" name="week[]" class="flat" @if($schedule_data['week_arr'][1] == "Y") checked="checked" @endif>월
                <input type="checkbox" name="week[]" class="flat" @if($schedule_data['week_arr'][2] == "Y") checked="checked" @endif>화
                <input type="checkbox" name="week[]" class="flat" @if($schedule_data['week_arr'][3] == "Y") checked="checked" @endif>수
                <input type="checkbox" name="week[]" class="flat" @if($schedule_data['week_arr'][4] == "Y") checked="checked" @endif>목
                <input type="checkbox" name="week[]" class="flat" @if($schedule_data['week_arr'][5] == "Y") checked="checked" @endif>금
                <input type="checkbox" name="week[]" class="flat" @if($schedule_data['week_arr'][6] == "Y") checked="checked" @endif>토
                &nbsp;
                <button type="button" id="lecDate" onclick="setHoliday('');" class="btn btn-sm btn-primary">적용</button>
                <input type="hidden" id="week_str" name="week_str" value="">
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1" >노출일 설정 <span class="required">*</span>
            </label>
            <div class="col-md-10 form-inline item" style="margin-bottom:3px; overflow: scroll;display:none" id="cal_vw"></div>
        </div>
    </div>
</div>

<link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
<script src="/public/vendor/cheditor/cheditor.js"></script>
<script type="text/javascript">
    var $modal_regi_form = $('#modal_regi_form');
    $(document).ready(function() {
        $modal_regi_form.submit(function() {
            var week_str = "";
            for(var i=0; i<7; i++) {
                if($('input:checkbox[name="week[]"]:eq('+i+')').prop("checked")) {
                    week_str += "Y,";
                } else {
                    week_str += "N,";
                }
            }
            $("#week_str").val(week_str);

            var _url = '{{ site_url("/board/professor/{$boardName}/storeSchedule/{$prod_code}?") }}' + '{!! $boardDefaultQueryString !!}';
            ajaxSubmit($modal_regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $("#pop_modal").modal('toggle');
                }
            }, showValidateError, null, false, 'alert');
        });
    });

    // 기간 달력 생성 start --------------------------
    var total;
    var karr;

    function setHoliday(state) {
        if($("#start_date").val() == "") {alert("개강일을 선택해 주세요.");$("#start_date").focus();return;}
        if($('#end_date').val() == '') {alert('종료일을 입력해 주세요.'); $('#end_date').focus();return;}
        var result = "";
        var t = $('input:checkbox[name="week[]"]:checked').length;

        total = 0;
        karr = 0;
        if (t < 1) {
            alert('요일을 선택하세요.');
        } else {
            var Months = new Array(12, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11);

            var syy = $("#start_date").val().substr(0, 4); //연도추출
            var smm = $("#start_date").val().substr(5, 2); // 월추출
            var yy = parseInt(syy, 10); // 연도2자리
            var mm = parseInt(smm, 10); // 월2자리

            var eyy = $("#end_date").val().substr(0, 4); //연도추출
            var emm = $("#end_date").val().substr(5, 2); // 월추출

            var startN = Number((syy*12)) + Number(smm);
            var endN = Number((eyy*12)) + Number(emm);
            var c = endN - startN;

            result += "<table border='0' cellpadding='0' cellspacing='0'><tr>";
            var ty = 0;
            var tm = 0;
            var i = 0;

            if (state == 'modify') {
                for (i = 0; i <= c; i++) {
                    ty = yy + parseInt((mm + i - 1) / 12);
                    tm = Months[((mm + i) % 12)];
                    result += "<td style='padding:5px;' valign='top'>";
                    result += Calendar_modify(ty, tm);
                    result += "</td>";
                }
            } else {
                for (i = 0; i <= c; i++) {
                    ty = yy + parseInt((mm + i - 1) / 12);
                    tm = Months[((mm + i) % 12)];
                    result += "<td style='padding:5px;' valign='top'>";
                    result += Calendar(ty, tm);
                    result += "</td>";
                }
            }
            result += "</tr></table>";

            $("#cal_vw").show();
            $("#cal_vw").html(result);
        }
    }

    function Calendar( Year, Month ) {
        var days = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        var weekDay = new Array("일", "월", "화", "수", "목", "금", "토");
        var firstDay = new Date(Year,Month-1,1).getDay();
        var output_string = "";

        days[1] = (((Year % 4 == 0) && (Year % 100 != 0)) || (Year % 400 == 0)) ? 29 : 28;
        output_string += "<table border='0' cellpadding='0' cellspacing='1' bgcolor='#999999' class='table table-striped table-bordered' >";
        output_string += "<tr><td align='center' colspan='7'><b>";
        output_string += Year + " / " + Month;
        output_string += "</b></td></tr>";
        output_string += "<tr align='center' bgcolor='#dadada' height='25'> ";
        for (var dayNum= 0; dayNum <= 6; dayNum++) {
            output_string += "<td width='24'>" + weekDay[dayNum] + "</td>";
        }
        output_string += "</tr>";

        var kMonth = (Month < 10) ? "0"+Month : Month;
        var nDay = 1;

        for(var i=0; i<6; i++) {
            output_string += "<tr align='center'>";

            for(var j=0; j<7; j++) {
                var tarr = i*7+j;
                if(firstDay <= tarr && days[Month-1] >= nDay ) {

                    var kDay = (nDay < 10) ? "0"+nDay : nDay;
                    var bg_color = "";
                    var frm_value = "";
                    if ($('input:checkbox[name="week[]"]:eq('+j+')').prop("checked")
                        && parseInt((Year +""+ kMonth +""+ kDay),10)  >= parseInt(replace($("#start_date").val(), "-", ""),10)
                        && parseInt((Year +""+ kMonth +""+ kDay),10)  <= parseInt(replace($("#end_date").val(), "-", ""),10))
                    {
                        bg_color ="yellow";
                        frm_value = Year +""+ kMonth +""+ kDay;
                        total++;
                    } else {
                        bg_color ="#ffffff";
                        frm_value = "";
                    }
                    output_string += "<td id='"+ (Year +""+ kMonth +""+ kDay) +"' style='background-color:"+ bg_color +";cursor:hand;cursor:pointer;' width='24' height='20' ";
                    output_string += " onClick=\"javascript:chkDay('"+ parseInt((Year +""+ kMonth +""+ kDay),10)  +"', "+ karr +");\">";
                    output_string += nDay
                    output_string += "<input type='hidden' name='savDay[]' value='"+ frm_value +"'>";
                    output_string += "</td>";
                    nDay++;
                    karr++;
                } else {
                    output_string += "<td bgcolor='#ffffff' width='24' height='20'>"+ "&nbsp;" +"</td>";
                }
            }
        }
        output_string += "</tr>";
        output_string += "</table>";
        return output_string;
    }

    function chkDay(clkDay, arr) {
        var id = $("#"+clkDay);
        var id_val = $('input[name="savDay[]"]:eq('+arr+')').val().length;

        if( id_val == 0 ) {
            id.css({"background-color":"yellow"});
            $('input[name="savDay[]"]:eq('+arr+')').val(clkDay);
        } else {
            id.css({"background-color":"white"});
            $('input[name="savDay[]"]:eq('+arr+')').val('');
        }
        var t=0;
        $('input[name="savDay[]"]').each(function(idx){
            if($(this).val().length > 0) {
                t++;
            }
        });
    }

    function Calendar_modify( Year, Month ) {
        var set_schedule_date = new Array(
                @foreach($schedule_data['arr_schedule_date'] as $row)
                    "{{$row["ScheduleDate"]}}"@if($loop->last == false),@endif
                @endforeach
                );

        var days = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        var weekDay = new Array("일", "월", "화", "수", "목", "금", "토");
        var firstDay = new Date(Year,Month-1,1).getDay();
        var output_string = "";

        days[1] = (((Year % 4 == 0) && (Year % 100 != 0)) || (Year % 400 == 0)) ? 29 : 28;
        output_string += "<table border='0' cellpadding='0' cellspacing='1' bgcolor='#999999' class='table table-striped table-bordered' >";
        output_string += "<tr><td align='center' colspan='7'><b>";
        output_string += Year + " / " + Month;
        output_string += "</b></td></tr>";
        output_string += "<tr align='center' bgcolor='#dadada' height='25'> ";
        for (var dayNum= 0; dayNum <= 6; dayNum++) {
            output_string += "<td width='24'>" + weekDay[dayNum] + "</td>";
        }
        output_string += "</tr>";

        var kMonth = (Month < 10) ? "0"+Month : Month;
        var nDay = 1;

        for(var i=0; i<6; i++) {
            output_string += "<tr align='center'>";

            for(var j=0; j<7; j++) {
                var checked = "";
                var tarr = i*7+j;
                if(firstDay <= tarr && days[Month-1] >= nDay ) {

                    var kDay = (nDay < 10) ? "0"+nDay : nDay;
                    var bg_color = "";
                    var frm_value = "";

                    for(k=0;k<set_schedule_date.length;k++){
                        if(Year +"-"+ kMonth +"-"+ kDay == set_schedule_date[k]) {
                            checked = "Y"
                        }
                    }

                    if (checked == "Y") {
                        bg_color ="yellow";
                        frm_value = Year +""+ kMonth +""+ kDay;
                        total++;
                    } else {
                        bg_color ="#ffffff";
                        frm_value = "";
                    }
                    output_string += "<td id='"+ (Year +""+ kMonth +""+ kDay) +"' style='background-color:"+ bg_color +";cursor:hand;cursor:pointer;' width='24' height='20' ";
                    output_string += " onClick=\"javascript:chkDay('"+ parseInt((Year +""+ kMonth +""+ kDay),10)  +"', "+ karr +");\">";
                    output_string += nDay
                    output_string += "<input type='hidden' name='savDay[]' value='"+ frm_value +"'>";
                    output_string += "</td>";
                    nDay++;
                    karr++;
                } else {
                    output_string += "<td bgcolor='#ffffff' width='24' height='20'>"+ "&nbsp;" +"</td>";
                }
            }
        }
        output_string += "</tr>";
        output_string += "</table>";
        return output_string;
    }

    @if($method === "PUT")setHoliday('modify');@endif
    // 기간 달력 생성 end --------------------------

    function replace(str,s,d){
        var i=0;
        while(i > -1){
            i = str.indexOf(s);
            str = str.substr(0,i) + d + str.substr(i+1,str.length);
        }
        return str;
    }
</script>
@stop


@section('add_buttons')
    <button type="submit" class="btn btn-success">등록</button>
@endsection

@section('layer_footer')
</form>
@endsection