@extends('lcms.layouts.master')

@section('content')
    <h5>- 학원방문상담 예약일정을 등록하고 관리하는 페이지입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}

    <div class="x_panel">
        <div class="x_title">
            <h2>상담예약관리 정보</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="form-group">
                <label class="control-label col-md-1-1">운영사이트</label>
                <div class="form-control-static col-md-4">
                    {{$data['SiteName']}}
                </div>
                <label class="control-label col-md-1-1 d-line">캠퍼스</label>
                <div class="form-control-static col-md-4 ml-12-dot">
                    {{$data['CampusName']}}
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-1-1">카테고리</label>
                <div class="form-control-static col-md-4">
                    {{$data['CateNames']}}
                </div>

                <label class="control-label col-md-1-1 d-line">상담일자</label>
                <div class="form-control-static col-md-4 ml-12-dot">
                    {{$data['ConsultDate']}} ({!! $yoil[date('w', strtotime($data['ConsultDate']))] !!})
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-1-1">상담가능시간</label>
                <div class="form-control-static col-md-4">
                    {{$data['StartHour']}}:{{$data['StartMin']}} ~ {{$data['EndHour']}}:{{$data['EndMin']}}
                </div>

                <label class="control-label col-md-1-1 d-line">점심시간</label>
                <div class="form-control-static col-md-4 ml-12-dot">
                    {{$data['LunchStartHour']}}:{{$data['LunchStartMin']}} ~ {{$data['LunchEndHour']}}:{{$data['LunchEndMin']}}
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-1-1">1회상담시간</label>
                <div class="form-control-static col-md-4">
                    {{$data['ConsultTime']}} 분 [쉬는시간] {{$data['BreakTime']}} 분
                </div>

                <label class="control-label col-md-1-1 d-line">사용</label>
                <div class="form-control-static col-md-4 ml-12-dot">
                    {{ ($data['IsUse'] == 'Y') ? '사용' : '미사용' }}
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-1-1">상담시간표 <span class="required">*</span>
                </label>
                <div class="col-md-10 form-inline">

                    <table id="schedule_list_table" class="table table-striped table-bordered dataTable no-footer dtr-inline" role="grid">
                        <thead>
                        <tr role="row">
                            <th>시간</th>
                            <th>신청현황</th>
                            <th>상담인원</th>
                            <th>상담대상</th>
                            <th>사용여부</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-1-1">등록자
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                </div>
                <label class="control-label col-md-1-1 d-line">등록일
                </label>
                <div class="col-md-4 ml-12-dot">
                    <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-1-1">최종 수정자
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                </div>
                <label class="control-label col-md-1-1 d-line">최종 수정일
                </label>
                <div class="col-md-4 ml-12-dot">
                    <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                </div>
            </div>

            <div class="form-group text-center btn-wrap mt-50">
                <button type="button" class="pull-left btn btn-danger" id="btn_delete">삭제</button>
                <button type="button" class="pull-right btn btn-primary" id="btn_list">목록</button>
                <button type="button" class="pull-right btn btn-success mr-10" id="btn_modify">수정</button>
            </div>
        </div>
    </div>
    </form>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // 목록 버튼 클릭
            $('#btn_list').click(function() {
                location.href='{{ site_url("/pass/consult/schedule/") }}' + getQueryString();
            });

            //데이터 수정 폼
            $('#btn_modify').click(function() {
                location.href='{{ site_url("/pass/consult/schedule/create") }}/' + {{$cs_idx}} + getQueryString();
            });

            //데이터 삭제
            $('#btn_delete').click(function() {
                var _url = '{{ site_url("/pass/consult/schedule/delete") }}/' + {{$cs_idx}} + getQueryString();
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE'
                };

                if (!confirm('선택한 상담일정을 삭제하시겠습니까?')) {
                    return;
                }
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/pass/consult/schedule/") }}' + getQueryString());
                    }
                }, showError, false, 'POST');
            });

            // 상담 시간표 셋팅 ****************
            function addScheduleTable() {
                //상담시작, 상담종료
                /*var consult_start_min = (parseInt($('#schedule_start_hour').val()) * 60) + parseInt($('#schedule_start_min').val());
                var consult_end_min = (parseInt($('#schedule_end_hour').val()) * 60) + parseInt($('#schedule_end_min').val());*/
                var consult_start_min = (parseInt({{$data['StartHour']}}) * 60) + parseInt({{$data['StartMin']}});
                var consult_end_min = (parseInt({{$data['EndHour']}}) * 60) + parseInt({{$data['EndMin']}});

                //1회상담시간
                var consult_time = parseInt({{$data['ConsultTime']}});
                //쉬는시간
                var break_time = parseInt({{$data['BreakTime']}});
                //점심시작시간, 점심종료시간
                var lunch_start_min = (parseInt({{$data['LunchStartHour']}}) * 60) + parseInt({{$data['LunchStartMin']}});
                var lunch_end_min = (parseInt({{$data['LunchEndHour']}}) * 60) + parseInt({{$data['LunchEndMin']}});

                var st = 0;
                var et = 0;
                var z = consult_time + break_time;
                var list_schedule = '';         //상담스케줄 row data
                var list_schedule_lunch = '';   //점심시간 row data
                var lunch_count = 0;            //점심시간 1row만 노출하기 위한 변수
                var list_count = 0;             //리스트순서 (수정페이지에서 데이터 적용시 사용)
                var arr_schedule_list = {!! $arr_schedule_list !!};
                var arr_schedule_member_list = {!! $arr_schedule_member_list !!};

                for (var i=consult_start_min; i<consult_end_min; i+=z){
                    st = i;
                    et = (i + z) - break_time;

                    if (et<=consult_end_min) {
                        if ((st>=lunch_start_min || et >=lunch_start_min) && (st<=lunch_end_min || et<=lunch_end_min) && (lunch_end_min > 0)) {
                            if (lunch_count == 0) {
                                list_schedule_lunch = add_schedule_row_lunch(lunch_start_min, lunch_end_min);
                            } else {
                                list_schedule_lunch = '';
                            }
                            lunch_count++;
                        } else {
                            list_schedule += add_schedule_row(st, et, list_count, arr_schedule_list, arr_schedule_member_list);
                            list_count++;
                        }
                        list_schedule += list_schedule_lunch;
                    }
                }
                $('#schedule_list_table > tbody').html(list_schedule);
            };
            addScheduleTable();
            //****************

            // 등록/수정 모달창 오픈
            $('.btn-schedule-member-read').click(function() {
                var uri_param = $(this).data('csm-idx');
                $('.btn-schedule-member-read').setLayer({
                    'url' : '{{ site_url('/pass/consult/schedule/detailMemberModal/') }}' + uri_param,
                    'width' : 900
                });
            });
        });

        //스케줄 생성
        function add_schedule_row(st, et, list_count, arr_schedule_list, arr_schedule_member_list)
        {
            var schedule_idx = arr_schedule_list[list_count]['CstIdx'];
            var consult_person_count = arr_schedule_list[list_count]['ConsultPersonCount'];
            var consult_target_type = arr_schedule_list[list_count]['ConsultTargetType'];
            var is_use = arr_schedule_list[list_count]['IsUse'];
            var start_time = toHHMM(st);
            var end_time = toHHMM(et);
            var str_member_info = '';

            // 회원신청자 정보
            var temp_csm_idxs = ((arr_schedule_member_list[list_count]['CsmIdxs'] == null) ? '' : arr_schedule_member_list[list_count]['CsmIdxs']);
            var temp_member_Infos = ((arr_schedule_member_list[list_count]['Mem_Infos'] == null) ? '' : arr_schedule_member_list[list_count]['Mem_Infos']);
            var arr_csm_dix = temp_csm_idxs.split(',');
            var arr_member_Infos = temp_member_Infos.split(',');
            arr_csm_dix.forEach(function (item, index){
                str_member_info += '<a href="javascript:void(0);" class="btn-schedule-member-read" data-csm-idx="'+item+'">'+arr_member_Infos[index]+'</a> ';
            });

            var add_lists;
            add_lists = '<input type="hidden" name="add_schedule_idx[]" value="'+schedule_idx+'">';
            add_lists += '<tr role="row">';
            add_lists += '<td><p class="form-control-static">'+start_time+'~'+end_time+'</p></td>';
            add_lists += '<td>'+str_member_info+'</td>';
            add_lists += '<td>'+consult_person_count+' 명</td>';
            add_lists += '<td>'+((consult_target_type == "M") ? "회원" : "수강생")+'</td>';
            add_lists += '<td>'+((is_use == 'Y') ? "사용" : "미사용")+'</td>';
            add_lists += '</tr>';
            return add_lists;
        }

        //스케줄 점심시간 생성
        function add_schedule_row_lunch(lunch_start_min, lunch_end_min)
        {
            var lunch_start_time = toHHMM(lunch_start_min);
            var lunch_end_time = toHHMM(lunch_end_min);

            var add_lists;
            add_lists = '<tr role="row">';
            add_lists += '<td><p class="form-control-static">'+lunch_start_time+'~'+lunch_end_time+'</p></td>';
            add_lists += '<td class="bg-gray" colspan="4">점심시간</td>';
            add_lists += '</tr>';

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
@stop