@extends('lcms.layouts.master')
@section('content')
    <h5>- 운영사이트별 회원을 검색하고 TM 담당자들에게 회원을 배정하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="regi_form" name="regi_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}

        <div class="row mt-20">
            <div class="col-md-2">
                <p>• TM 회원검색</p>
            </div>
            <div class="col-md-10 form-inline text-right">
                <button type="button" class="btn btn-default" id="btn_info" onclick="openWin('in_pop_modal')">TM 운영정책</button>
            </div>
        </div>
        @include('lms.crm.tm.tm_policy_partial')
        
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="AssignCcd">조건</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control" id="AssignCcd" name="AssignCcd" title="배정구분" required="required">
                            @foreach($AssignCcd as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>

                        <span id="date1">
                        <input name="SearchDate"  class="form-control datepicker" id="SearchDate" style="width: 100px;"  type="text"  value="" >
                        </span>
                        <span id="date2" class="hide">
                        ~ <input name="SearchEndDate"  class="form-control datepicker" id="SearchEndDate" style="width: 100px;"  type="text"  value="" >
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="button" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
            </div>
        </div>

        <p>• TM 회원검색 결과</p>
        <input type="hidden" name="SearchType" id="SearchType" value="assign">
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="site_code">검색건수 <span class="required">*</span>
                    </label>
                    <div class="col-md-11 form-inline item">
                        <input type='number' name='MemCnt' id="MemCnt" value='' title="검색회원수" class="form-control" size="7" required="required" readonly> 건
                        &nbsp;• 검색건수 수정 불가
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="searchCategory">배정회원수 <span class="required">*</span>
                    </label>
                    <div class="col-md-7 form-inline item">
                        <div class="item inline-block">
                            @foreach($AssignAdmin as $row)
                            <p id="{{$loop->index}}">
                                <input type="hidden" name="wAdminIdx[]" id="wAdminIdx_{{$row['wAdminIdx']}}" value="{{$row['wAdminIdx']}}" data-index="{{$loop->index}}">
                                {{$row['wAdminName']}} &nbsp;&nbsp;<input type='number' name='eachCnt[]' id="'eachCnt_{{$row['wAdminIdx']}}'" value='' title="배정회원수" data-index="{{$loop->index}}" class="form-control" size="7" required="required" maxlength="3"> 건
                            </p>
                            @endforeach
                        </div>
                        <div class="item inline-block">
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-xs-12 text-center">
                        <button type="button" class="btn btn-success mr-10" id="btn_assign">회원배정</button>
                        <button class="btn btn-primary" type="button" id="btn_list">배정이력</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <input type="hidden" name="tm_idx" id="tm_idx" value="">
    <button type="button" id="btn_tm_list" class="btn_tm_list hide" ></button>



    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {

            $regi_form.on('change', 'select[name="AssignCcd"]', function() {
                $(this).val() == '687004' ? $("#date2").attr({"class":""}) : $("#date2").attr({"class":"hide"});
                $("#MemCnt").val('');
                $("input[name='eachCnt[]']").val('');
                $("#btn_assign").attr("disabled",false);
            });


            $("#btn_search").click(function () {

                if($("#AssignCcd").val() == "") {
                    alert("배정조건을 선택해 주세요.");return;
                }
                if($("#SearchDate").val() == "") {
                    alert("조건 적용일을 선택해 주세요.");return;
                }
                if($("#AssignCcd").val() == "687004" && $("#SearchEndDate").val() == "" ) {
                    alert("조건 종료일을 선택해 주세요.");return;
                }

                $("#MemCnt").val('');
                $("input[name='eachCnt[]']").val('');

                var data =  {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    'AssignCcd' : $("#AssignCcd").val(),
                    'SearchDate' : $("#SearchDate").val(),
                    'SearchEndDate' : $("#SearchEndDate").val(),
                    'SearchType' : 'search'
                };

                sendAjax('{{ site_url('/crm/tm/TmMng/search/') }}', data, function(ret) {
                       if(ret.ret_data == '0') {
                           alert("검색된 데이터가 존재하지 않습니다.");return;
                       }
                       setAssignCount(ret.ret_data);
                }, showError, false, 'POST');

            });


            $("#btn_reset").click(function () {
                location.replace('{{site_url('/crm/tm/TmMng/')}}')
            });
            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/crm/tm/TmMng/tmIndex') }}');
            });

            //검색결과 배정갯수 입력하기
            function setAssignCount(count) {
                var member_count = count;
                var tm_adminCnt = $("input[name='eachCnt[]']").length;
                //var divide_cnt =  parseInt(member_count / tm_adminCnt);       //절삭을 하면 맨아래 배열의 배정 갯수가 많이 늘어남
                var divide_cnt =  Math.round(member_count / tm_adminCnt);   //반올림을 하면 맨아래 배열의 배정갯수가 1개 모자람

                $("#MemCnt").val(member_count);
                var sum_cnt = 0;
                for (i=0;i<tm_adminCnt;i++){
                    sum_cnt += divide_cnt;
                    /*
                    if(member_count >= sum_cnt) {
                        $("input[name='eachCnt[]']:eq(" + i + ")").val(divide_cnt);
                    } else {
                        $("input[name='eachCnt[]']:eq(" + i + ")").val('0');
                    }
                    */
                    if(i < (tm_adminCnt-1) ) {

                        if(member_count >= sum_cnt) {
                            $("input[name='eachCnt[]']:eq(" + i + ")").val(divide_cnt);
                        } else {
                            $("input[name='eachCnt[]']:eq(" + i + ")").val('0');
                        }

                    } else if( i == (tm_adminCnt -1) ) {    //마지막 배열이면

                        if(member_count != sum_cnt) {   //멤버수와 합계가 틀리면 조정

                            if(member_count < sum_cnt) {    //합계가 많을경우
                               change_cnt = divide_cnt - (sum_cnt-member_count);
                           } else { // 합계가 적을경우
                               change_cnt = divide_cnt + (member_count-sum_cnt);
                            }
                            if(change_cnt < 0) {
                                change_cnt = 0;
                            }
                            $("input[name='eachCnt[]']:eq(" + i + ")").val(change_cnt);
                        } else {
                            $("input[name='eachCnt[]']:eq(" + i + ")").val(divide_cnt);
                        }
                    }

                }
            }

            $("#btn_assign").click(function () {

                if($("#AssignCcd").val() == "") {
                    alert("배정조건을 선택해 주세요.");return;
                }
                if($("#SearchDate").val() == "") {
                    alert("조건 적용일을 선택해 주세요.");return;
                }
                if($("#AssignCcd").val() == "687004" && $("#SearchEndDate").val() == "" ) {
                    alert("조건 종료일을 선택해 주세요.");return;
                }
                if($("#MemCnt").val() == '' || $("#MemCnt").val() == '0') {
                    alert("배정할 회원이 없습니다.");return;
                }

                var sum = 0;
                $("input[name= 'eachCnt[]']").each(function(){
                    sum += +$(this).val();
                });

                if($("#MemCnt").val() != sum) {
                    alert("검색건수 와 배정회원건수의 합이 일치하지 않습니다.");return;
                }

                if(!confirm("회원을 배정하시겠습니까?")) {
                    return;
                }

                var _url = '{{ site_url('/crm/tm/TmMng/assign') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        //notifyAlert('success', '알림', ret.ret_msg);
                        alert("회원이 배정되었습니다.");
                        $("#btn_assign").attr("disabled",true);
                        showAssign(ret.ret_data)
                    }
                }, showValidateError, null, false, 'alert');

            });


            showAssign = function(tm_idx) {
                var url = '{{ site_url('/crm/tm/TmMng/assignList/') }}'+tm_idx;
                $('.btn_tm_list').setLayer({
                     'url' : url,
                     'width' : 1000
                 }).click();
            }

        });


    </script>
@stop