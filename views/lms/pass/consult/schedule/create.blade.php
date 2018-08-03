@extends('lcms.layouts.master')

@section('content')
    <h5>- 학원방문상담 예약일정을 등록하고 관리하는 페이지입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>상담예약관리 {{($method == 'POST') ? '등록' : '수정'}}</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ $idx }}"/>

                <div class="form-group">
                    <label class="control-label col-md-1-1">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <div class="inline-block item">
                            {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : '')) !!}
                        </div>
                    </div>
                    <label class="control-label col-md-1-1 d-line">캠퍼스<span class="required">*</span></label>
                    <div class="col-md-4 ml-12-dot">
                        <div class="inline-block item">
                            <select class="form-control" id="campus_ccd" name="campus_ccd" required="required">
                                <option value="">캠퍼스</option>
                                @foreach($arr_campus as $row)
                                    <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        @if($method == 'PUT')
                            <p class="form-control-static">{{ $data['CateNames'] }}</p>
                        @else
                            <button type="button" id="btn_category_search" class="btn btn-sm btn-primary">카테고리검색</button>
                            <span id="selected_category" class="pl-10">
                                @if(isset($data['CateCodes']) === true)
                                    @foreach($data['CateCodes'] as $cate_code => $cate_name)
                                        <span class="pr-10">{{ $cate_name }}
                                            <a href="#none" data-cate-code="{{ $cate_code }}" class="selected-category-delete"><i class="fa fa-times red"></i></a>
                                            <input type="hidden" name="cate_code[]" value="{{ $cate_code }}"/>
                                        </span>
                                    @endforeach
                                @endif
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">상담일정 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <div class="input-group mb-0">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="schedule_start_date" name="schedule_start_date" value="">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="schedule_end_date" name="schedule_end_date" value="">
                        </div>
                    </div>
                    <label class="control-label col-md-1-1 d-line">적용요일 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline mt-5 ml-12-dot item">
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">일</span>
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">월</span>
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">화</span>
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">수</span>
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">목</span>
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">금</span>
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">토</span>
                        &nbsp;
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">상담가능시간 <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <div class="form-inline item">
                            <select class="form-control" id="schedule_start_hour" name="schedule_start_hour" required="required">
                                @php
                                    for($i=0; $i<=23; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $data['StartHour']) ? "selected='selected'" : "";
                                        echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select> :
                            <select class="form-control" id="schedule_start_min" name="schedule_start_min" required="required">
                                @php
                                    for($i=0; $i<=59; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $data['StartMin']) ? "selected='selected'" : "";
                                        echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select>

                            &nbsp; ~ &nbsp;&nbsp;

                            <select class="form-control" id="schedule_end_hour" name="schedule_end_hour" required="required">
                                @php
                                    for($i=0; $i<=23; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $data['EndHour']) ? "selected='selected'" : "";
                                        echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select> :
                            <select class="form-control" id="schedule_end_min" name="schedule_end_min" required="required">
                                @php
                                    for($i=0; $i<=59; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $data['EndMin']) ? "selected='selected'" : "";
                                        echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-md-1-1 d-line">점심시간 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <div class="form-inline item">
                            <select class="form-control" id="lunch_start_hour" name="lunch_start_hour" required="required">
                                @php
                                    for($i=0; $i<=23; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $data['LunchStartHour']) ? "selected='selected'" : "";
                                        echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select> :
                            <select class="form-control" id="lunch_start_min" name="lunch_start_min" required="required">
                                @php
                                    for($i=0; $i<=59; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $data['LunchStartMin']) ? "selected='selected'" : "";
                                        echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select>

                            &nbsp; ~ &nbsp;&nbsp;

                            <select class="form-control" id="lunch_end_hour" name="lunch_end_hour" required="required">
                                @php
                                    for($i=0; $i<=23; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $data['LunchEndHour']) ? "selected='selected'" : "";
                                        echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select> :
                            <select class="form-control" id="lunch_end_min" name="lunch_end_min" required="required">
                                @php
                                    for($i=0; $i<=59; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $data['LunchEndMin']) ? "selected='selected'" : "";
                                        echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">상담대상 <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <div class="inline-block item">
                            <select class="form-control" id="consult_terget_type" name="consult_terget_type" required="required">
                                <option value="1">회원</option>
                                <option value="2">비회원</option>
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-md-1-1 d-line">상담인원/1회 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline ml-12-dot item">
                        <input type="text" id="consult_person_count" name="consult_person_count" class="form-control" title="상담인원" required="required" value="" style="width: 60px;"> 명
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">1회상담시간 <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <div class="form-inline item">
                            <select class="form-control" id="runing_time" name="runing_time" required="required">
                                @php
                                    for($i=10; $i<=60; $i+=10) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $data['runing_time']) ? "selected='selected'" : "";
                                        echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select> 분
                            <span class="blue pr-10 pl-30">[쉬는시간]</span>
                            <select class="form-control" id="break_time" name="break_time" required="required">
                                @php
                                    for($i=10; $i<=60; $i+=10) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $data['break_time']) ? "selected='selected'" : "";
                                        echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select> 분
                        </div>
                    </div>
                    <label class="control-label col-md-1-1 d-line">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 ml-12-dot item">
                        <div class="form-inline">
                            <div class="radio mr-30">
                                <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" checked="checked"/> <label for="is_use_y" class="input-label">사용</label>
                                <input type="radio" id="is_use_n" name="is_use" class="flat" value="N"/> <label for="is_use_n" class="input-label">미사용</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center btn-wrap">
                    <button type="button" class="btn btn-primary btn-schedule-setting">적용</button>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">상담일자
                    </label>
                    <div class="col-md-10">
                        <p class="form-control-static">2018-00-00 (월)</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">상담시간표 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">

                        <table id="schedule_list_table" class="table table-striped table-bordered dataTable no-footer dtr-inline" role="grid">
                            <thead>
                                <tr role="row">
                                    <th class="no-sort sorting_disabled" rowspan="1" colspan="1" data-column-index="0">시간</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" data-column-index="1">상담인원</th>
                                    <th class="searching rowspan sorting_disabled" rowspan="1" colspan="1" data-column-index="2">상담대상</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" data-column-index="3">사용여부</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{--<tr role="row" class="odd">
                                    <td tabindex="0">
                                        <p class="form-control-static">10:00~10:30</p>
                                    </td>
                                    <td><input type="text" id="" name="" class="form-control" title="상담인원" placeholder="" value="" style="width: 60px;"> 명</td>
                                    <td>                            
                                        <select class="form-control" id="" name="">
                                            <option value="">회원</option>
                                            <option value="">비회원</option>
                                        </select>
                                    </td>
                                    <td>                            
                                        <select class="form-control" id="" name="">
                                            <option value="">사용</option>
                                            <option value="">미사용</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr role="row" class="even">
                                    <td tabindex="0">
                                        <p class="form-control-static">10:30~11:00</p>
                                    </td>
                                    <td><input type="text" id="" name="" class="form-control" title="상담인원" placeholder="" value="" style="width: 60px;"> 명</td>
                                    <td>                            
                                        <select class="form-control" id="" name="">
                                            <option value="">회원</option>
                                            <option value="">비회원</option>
                                        </select>
                                    </td>
                                    <td>                            
                                        <select class="form-control" id="" name="">
                                            <option value="">사용</option>
                                            <option value="">미사용</option>
                                        </select>
                                    </td>
                                </tr>--}}
                            </tbody>
                        </table>

                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">관리자명</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">등록일
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">2018-00-00 00:00</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">최종수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">관리자명</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">최종수정일
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">2018-00-00 00:00</p>
                    </div>
                </div>
                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {
            // 상담 시간표 셋팅 ****************
            $regi_form.on('click', '.btn-schedule-setting', function() {
                //상담시작, 상담종료
                var consult_start_min = (parseInt($('#schedule_start_hour').val()) * 60) + parseInt($('#schedule_start_min').val());
                var consult_end_min = (parseInt($('#schedule_end_hour').val()) * 60) + parseInt($('#schedule_end_min').val());
                //1회상담시간
                var runing_time = parseInt($('#runing_time').val());
                //쉬는시간
                var break_time = parseInt($('#break_time').val());
                //점심시작시간, 점심종료시간
                var lunch_start_min = (parseInt($('#lunch_start_hour').val()) * 60) + parseInt($('#lunch_start_min').val());
                var lunch_end_min = (parseInt($('#lunch_end_hour').val()) * 60) + parseInt($('#lunch_end_min').val());

                var st = 0;
                var et = 0;
                var z = runing_time + break_time;
                var list_schedule = '';         //상담스케줄 row data
                var list_schedule_lunch = '';   //점심시간 row data
                var lunch_count = 0;            //점심시간 1row만 노출하기 위한 변수
                for (var i=consult_start_min; i<consult_end_min; i+=z){
                    st = i;
                    et = (i + z) - break_time;

                    if (et<=consult_end_min) {
                        if ((st>=lunch_start_min || et >=lunch_start_min) && (st<=lunch_end_min || et<=lunch_end_min)) {
                            if (lunch_count == 0) {
                                list_schedule_lunch = add_schedule_row_lunch(lunch_start_min, lunch_end_min);
                            } else {
                                list_schedule_lunch = '';
                            }
                            lunch_count++;
                        } else {
                            list_schedule += add_schedule_row(st, et);
                        }
                        list_schedule += list_schedule_lunch;
                    }
                }

                $('#schedule_list_table > tbody').html(list_schedule);
            });
            //****************



            // site-code에 매핑되는 select box 자동 변경
            $regi_form.find('select[name="campus_ccd"]').chained("#site_code");

            // 운영사이트 변경
            $regi_form.on('change', 'select[name="site_code"]', function() {
                // 카테고리 검색 초기화
                $regi_form.find('input[name="cate_code"]').val('');
                $('#selected_category').html('');
            });

            // 카테고리 검색
            $('#btn_category_search').on('click', function(event) {
                var site_code = $regi_form.find('select[name="site_code"]').val();
                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.')
                    return;
                }

                $('#btn_category_search').setLayer({
                    'url' : '{{ site_url('/common/searchCategory/index/multiple/site_code/') }}' + site_code + '/cate_depth/1',
                    'width' : 900
                });
            });

            // 카테고리, 상품 삭제
            $regi_form.on('click', '.selected-category-delete', function() {
                var that = $(this);
                that.parent().remove();
            });

            $regi_form.submit(function() {
                @if($method == 'POST')
                if($regi_form.find('input[name="cate_code[]"]').length < 1) {
                    alert('카테고리 선택 필드는 필수입니다.');
                    return false;
                }
                        @endif

                var _url = '{{ site_url('/pass/consult/schedule/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/service/coupon/regist/index') }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/pass/consult/schedule/') }}' + getQueryString());
            });
        });

        //분 -> 시간:분 으로 리턴
        function toHHMM(item) {
            var myNum = parseInt(item, 10);
            var hours   = Math.floor(myNum / 60);
            var minutes = Math.floor(myNum - (hours * 60));

            if (hours   < 10) {hours   = "0"+hours;}
            if (minutes < 10) {minutes = "0"+minutes;}
            return hours+':'+minutes;
        }


        function add_schedule_row(st, et)
        {
            var start_time = toHHMM(st);
            var end_time = toHHMM(et);

            var add_lists;
            var add_lunch_lists = '';
            add_lists = '<tr role="row">';
            add_lists += '<td><p class="form-control-static">'+start_time+'~'+end_time+'</p></td>';
            add_lists += '<td><input type="text" id="" name="" class="form-control" title="상담인원" placeholder="" value="" style="width: 60px;"> 명</td>';
            add_lists += '<td>';
            add_lists += '<select class="form-control">';
            add_lists += '<option>회원</option>';
            add_lists += '<option>비회원</option>';
            add_lists += '</select>';
            add_lists += '</td>';
            add_lists += '<td>';
            add_lists += '<select class="form-control">';
            add_lists += '<option>사용</option>';
            add_lists += '<option>미사용</option>';
            add_lists += '</select>';
            add_lists += '</td>';
            add_lists += add_lunch_lists;
            add_lists += '</tr>';

            return add_lists;
        }

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
    </script>
@stop