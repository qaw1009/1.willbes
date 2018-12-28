<form id="schedule_form" name="schedule_form" method="POST">
    {!! csrf_field() !!}
    <input type="hidden" name="s_campus">
    <input type="hidden" name="cst_idx">

<div class="timeTable f_right NG">
    <div class="timeTit">
        상담시간 선택<div class="timeSubTit">(*상담 시간을 선택해 주세요.)</div>
    </div>
    <div class="SelectDay NGR"><span class="NGEB">[날짜]</span>&nbsp;
        <span id="this_date">
            {!! ($base_data == 'null') ? '날짜를 선택해주세요.' : json_decode($base_data, true)['ConsultDate'] !!}
            {!! ($base_data == 'null') ? '' : '('.$yoil[date('w', strtotime(json_decode($base_data, true)['ConsultDate']))].')' !!}
        </span>
    </div>
    <div class="SelectTime NGR schedule-box">
        <ul>
            @if(empty($base_data) === true || $base_data == 'null' || empty($arr_schedule_list) === true || $arr_schedule_list == 'null')
                <li class="SelectTxt">
                    <div class="Txt">
                        캠퍼스 선택 후<br/>
                        상담일자를 선택해 주세요.
                    </div>
                </li>
            @else
                <span id="schedule_list_table"></span>
            @endif
        </ul>
    </div>
</div>
</form>


<script type="text/javascript">
    $(document).ready(function(base_data) {
        var base_data = {!! $base_data !!};
        var arr_schedule_list = {!! $arr_schedule_list !!};
        time_list(base_data, arr_schedule_list);

        function time_list(base_data, arr_schedule_list) {
            //상담시작, 상담종료
            if (base_data != null) {
                var consult_start_min = (parseInt(base_data['StartHour']) * 60) + parseInt(base_data['StartMin']);
                var consult_end_min = (parseInt(base_data['EndHour']) * 60) + parseInt(base_data['EndMin']);
                //1회상담시간
                var consult_time = parseInt(base_data['ConsultTime']);
                //쉬는시간
                var break_time = parseInt(base_data['BreakTime']);
                //점심시작시간, 점심종료시간
                var lunch_start_min = (parseInt(base_data['LunchStartHour']) * 60) + parseInt(base_data['LunchStartMin']);
                var lunch_end_min = (parseInt(base_data['LunchEndHour']) * 60) + parseInt(base_data['LunchEndMin']);

                var st = 0;
                var et = 0;
                var z = consult_time + break_time;
                var list_schedule = '';         //상담스케줄 row data
                var list_schedule_lunch = '';   //점심시간 row data
                var lunch_count = 0;            //점심시간 1row만 노출하기 위한 변수
                var list_count = 0;             //리스트순서 (수정페이지에서 데이터 적용시 사용)

                if (arr_schedule_list.length > 0) {
                    for (var i = consult_start_min; i < consult_end_min; i += z) {
                        st = i;
                        et = (i + z) - break_time;

                        if (et <= consult_end_min) {
                            if ((st >= lunch_start_min || et >= lunch_start_min) && (st <= lunch_end_min || et <= lunch_end_min) && (lunch_end_min > 0)) {
                                if (lunch_count == 0) {
                                    list_schedule_lunch = add_schedule_row_lunch(lunch_start_min, lunch_end_min);
                                } else {
                                    list_schedule_lunch = '';
                                }
                                lunch_count++;
                            } else {
                                if (arr_schedule_list[list_count]['IsUse'] == 'Y') {
                                    list_schedule += add_schedule_row(st, et, base_data, list_count, arr_schedule_list);
                                }
                                list_count++;
                            }
                            list_schedule += list_schedule_lunch;
                        }
                    }
                    $('#schedule_list_table').html(list_schedule);
                }
            }
        }
    });

    function create_schedule(cst_idx) {
        var is_login = '{{sess_data('is_login')}}';
        var form = document.schedule_form;

        if (is_login != true) {
            alert('로그인 후 이용해 주세요.');
            return false;
        }

        form.s_campus.value = $('#s_campus').val();
        form.cst_idx.value = cst_idx;
        form.action = '{{ front_url('/consultManagement/create') }}';
        form.submit();
    }

    //스케줄 생성
    function add_schedule_row(st, et, base_data, list_count, arr_schedule_list)
    {
        var cst_idx = arr_schedule_list[list_count]['CstIdx'];
        var consult_person_count = arr_schedule_list[list_count]['ConsultPersonCount'];
        var consult_member_count = arr_schedule_list[list_count]['memCount'];

        var start_time = toHHMM(st);
        var end_time = toHHMM(et);

        var add_lists;
        add_lists = '<li>';
        add_lists += '<div class="Time">'+start_time+' ~ '+end_time+'</div>';

        if (consult_person_count <= consult_member_count) {
            add_lists += '<div class="Condition end">';
            add_lists += '예약마감'
        } else {
            add_lists += '<div class="Condition ing">';
            add_lists += '<a href="javascript:create_schedule(\''+cst_idx+'\');">예약가능 ></a>'
        }
        add_lists += '</div>';
        add_lists += '</li>';
        return add_lists;
    }

    //스케줄 점심시간 생성
    function add_schedule_row_lunch(lunch_start_min, lunch_end_min)
    {
        var lunch_start_time = toHHMM(lunch_start_min);
        var lunch_end_time = toHHMM(lunch_end_min);

        var add_lists;
        add_lists = '<li class="lunchTime">';
        add_lists += '<div class="Time">'+lunch_start_time+' ~ '+lunch_end_time+'</div>';
        add_lists += '<div class="Condition">점심시간</div>';
        add_lists += '</li>';
        return add_lists;
    }

    //분 -> 시간:분 으로 리턴
    function toHHMM(item) {
        var myNum = parseInt(item, 10);
        var hours   = Math.floor(myNum / 60);
        var minutes = Math.floor(myNum - (hours * 60));

        if (hours   < 10) {hours   = "0"+hours;}
        if (minutes < 10) {minutes = "0"+minutes;}
        return hours+':'+minutes;
    }
</script>