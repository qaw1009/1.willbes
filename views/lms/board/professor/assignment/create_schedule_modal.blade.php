@extends('lcms.layouts.master_modal')

@section('layer_title')
    과제미노출날짜관리
@stop

@section('layer_header')
<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" onsubmit="return false;" novalidate>
    {{--<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" novalidate action="{{ site_url('/crm/sms/storeSend') }}">--}}
    {!! csrf_field() !!}
    {!! method_field($method) !!}
@endsection

@section('layer_content')
<div class="x_panel">
    <div class="x_content">
        <form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" onsubmit="return false;" novalidate>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" >과제노출기간 <span class="required">*</span>
            </label>
            <div class="col-md-10 form-inline item">
                [강좌등록일] <input type="text" name="holiday_start_date" id="holiday_start_date" class="form-control" title="강좌개강일" value='{{$product_data['StudyStartDate']}}' style="width:100px;" required="required" readonly="readonly">
                [종료일] <input type="text" name="holiday_end_date" id="holiday_end_date" class="form-control datepicker" title="종료일" value='{{$product_data['temp_study_dnd_date']}}' style="width:100px;" required="required">
                &nbsp;&nbsp;[노출요일]
                <input type="checkbox" name="week[]" class="flat" @if($week_arr[0] == "Y") checked="checked" @endif>일
                <input type="checkbox" name="week[]" class="flat" @if($week_arr[1] == "Y") checked="checked" @endif>월
                <input type="checkbox" name="week[]" class="flat" @if($week_arr[2] == "Y") checked="checked" @endif>화
                <input type="checkbox" name="week[]" class="flat" @if($week_arr[3] == "Y") checked="checked" @endif>수
                <input type="checkbox" name="week[]" class="flat" @if($week_arr[4] == "Y") checked="checked" @endif>목
                <input type="checkbox" name="week[]" class="flat" @if($week_arr[5] == "Y") checked="checked" @endif>금
                <input type="checkbox" name="week[]" class="flat" @if($week_arr[6] == "Y") checked="checked" @endif>토
                &nbsp;
                <button type="button" id="lecDate" onclick="setHoliday();" class="btn btn-sm btn-primary">적용</button>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" >휴일설정 <span class="required">*</span>
            </label>
            <div class="col-md-10 form-inline item" style="margin-bottom:3px; overflow: scroll;display:none" id="cal_vw"></div>
        </div>
        </form>
    </div>
</div>

<link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
<script src="/public/vendor/cheditor/cheditor.js"></script>
<script type="text/javascript">
    var $modal_regi_form = $('#modal_regi_form');
    $(document).ready(function() {
    });

    // 송출기간 달력 생성 start --------------------------
    var total;
    var karr;
    function replace(str,s,d){
        var i=0;
        while(i > -1){
            i = str.indexOf(s);
            str = str.substr(0,i) + d + str.substr(i+1,str.length);
        }
        return str;
    }

    function setHoliday() {
        if($("#holiday_start_date").val() == "") {alert("개강일을 선택해 주세요.");$("#holiday_start_date").focus();return;}
        if($("#holiday_end_date").val() == "") {alert("개강일을 선택해 주세요.");$("#holiday_end_date").focus();return;}
        /*if($('#on_air_num').val() == '') {alert('회차를 입력해 주세요.'); $('#on_air_num').focus();return;}*/

        var result = "";
        total = 0;
        karr = 0;

        t = $('input:checkbox[name="week[]"]:checked').length;
        if (t < 1) {
            alert('요일을 선택하세요.');
        } else {
            var Months = new Array(12, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11);
            var syy = $("#holiday_start_date").val().substr(0, 4); //연도추출
            var smm = $("#holiday_start_date").val().substr(5, 2); // 월추출
            var yy = parseInt(syy, 10); // 연도2자리
            var mm = parseInt(smm, 10); // 월2자리
            var ty = 0;
            var tm = 0;
            var i = 0;

            result += "<table border='0' cellpadding='0' cellspacing='0' style='float: left;'><tr>";
            while (parseInt($("#on_air_num").val(), 10) > total ) {
                ty = yy + parseInt((mm + i - 1) / 12);
                tm = Months[((mm + i) % 12)];
                result += "<td style='padding:5px;' valign='top'>";
                result += Calendar(ty, tm);
                result += "</td>";
                i++;
            }
            result += "</tr></table>";

            console.log(result);

            $("#cal_vw").show();
            $("#cal_vw").html(result);
        }
    }

    function Calendar( Year, Month ) {
        var days = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        var weekDay = new Array("일", "월", "화", "수", "목", "금", "토");

        firstDay = new Date(Year,Month-1,1).getDay();
        days[1] = (((Year % 4 == 0) && (Year % 100 != 0)) || (Year % 400 == 0)) ? 29 : 28;

        var output_string = "";
        output_string += "<table border='0' cellpadding='0' cellspacing='0' width='176'>";
        output_string += "<tr><td align='center'><b>";
        output_string += Year + " / " + Month;
        output_string += "</b></td></tr>";
        output_string += "</table>";
        output_string += "<table border='0' cellpadding='0' cellspacing='1' bgcolor='#999999'>";
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
                tarr = i*7+j;
                if(firstDay <= tarr && days[Month-1] >= nDay ) {
                    var kDay = (nDay < 10) ? "0"+nDay : nDay;
                    var bg_color = "";
                    var frm_value = "";

                    if (
                        $('input:checkbox[name="week[]"]:eq('+j+')').prop("checked") &&
                        parseInt( $("#on_air_num").val(),10) > total &&
                        parseInt((Year +""+ kMonth +""+ kDay),10)  >= parseInt(replace($("#holiday_start_date").val(), "-", ""),10)
                    ) {
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
        $("#on_air_num").val(t);
    }

    @if($method === "PUT")setHoliday();@endif
    // 송출기간 달력 생성 end --------------------------

</script>
@stop


@section('add_buttons')
    <button type="submit" class="btn btn-success">등록</button>
@endsection

@section('layer_footer')
</form>
@endsection