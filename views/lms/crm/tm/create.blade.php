@extends('lcms.layouts.master')
@section('content')
    <h5>- 운영사이트별 회원을 검색하고 TM 담당자들에게 회원을 배정하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="regi_form" name="regi_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}

        <Br>
        <div class="form-group">
            <div class="col-md-2 form-inline">
                <p>• TM 회원검색</p>
            </div>
            <div class="col-md-10 form-inline" align="right">
                <button type="button" class="btn btn-default" id="btn_info" onclick="openWin('in_pop_modal')">TM 운영정책</button>
            </div>

        </div>
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
            <div class="col-xs-12 text-right">
                <button type="button" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default mr-20" id="btn_reset">검색초기화</button>
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
                        <input type='number' name='MemCnt' id="MemCnt" value='' title="검색회원수" class="form-control" size="2" required="required" readonly> 건
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
                                {{$row['wAdminName']}} &nbsp;&nbsp;<input type='number' name='eachCnt[]' id="'eachCnt_{{$row['wAdminIdx']}}'" value='' title="배정회원수" data-index="{{$loop->index}}" class="form-control" size="2" required="required" maxlength="3"> 건
                            </p>
                            @endforeach
                        </div>
                        <div class="item inline-block">
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="button" class="btn btn-success mr-10" id="btn_assign">회원배정</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </div>
        </div>
    </form>

    <input type="hidden" name="tm_idx" id="tm_idx" value="">
    <button type="button" id="btn_tm_list" class="btn_tm_list hide" ></button>


    <!-- 내부팝업 -->
    <div class="modal in" id="in_pop_modal" style="display: none;">
        <div class="modal-dialog modal-lg" style="width: 700px; z-index: 9999;">
            <div class="modal-content">
                <div class="modal-header bg-green">
                    <button type="button" class="close" onclick="closeWin('in_pop_modal')" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">TM 운영정책</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group form-group-sm">
                        <div class="x_title no-border text-left">• TM 대상</div>
                        <div class="x_txt">- 활성화된 회원(휴면, 탈퇴회원 제외) 중 ‘블랙컨슈머’ 회원 제외 and 수신동의 ‘Y’인 회원</div>

                        <div class="x_title no-border text-left">• TM 배정 조건</div>
                        <div class="x_txt">- 동일 조건에서 1회 배정 시 이후 21일간 배정되지 않음</div>

                        <div class="x_title no-border text-left">• TM 배정 분류값별 정책</div>
                        <div class="x_txt">
                            - 신규 : 가입 후 한 달 이내 유료 구매가 없는 회원<br/>
                            - 장바구니 : 장바구니에 상품 담은 날 + 7일 이상인 경우 (미결제 상태)<br/>
                            - 재수강 : 유료로 구매한 강의 종료 후 30일 이내 재구매 이력이 없는 회원 - 회수(부재중) : TM상담관리>상담분류값이 ‘부재중’으로 등록된 회원<br/>
                            ※ 신규 > 재수강 > 회수(부재중) > 장바구니
                        </div>

                        <div class="x_title no-border text-left">• 배정 회원 조회</div>
                        <div class="x_txt">- 접근일로부터 3개월 이내만 배정된 회원 검색/조회 가능</div>

                        <div class="x_title no-border text-left">• 결제/환불 집계 조건</div>
                        <div class="x_txt">
                            - 결제 : TM분류값이 ‘통화’이며, 최종통화일 (상담등록일)로 부터 21일 이내 매출 발생 시<br/>
                            (대상 상품 : 온라인강좌 상품 전체 (교재, 학원강좌 제외)  : 단강좌, 사용자패키지, 운영자패키지, 기간제패키지)<br/>
                            - 환불 : 결제일 기준 30일 이내 환불 시 제외
                        </div>
                    </div>
                </div>
                <script>
                    // 닫기 Script
                    function closeWin(divID) {
                        document.getElementById(divID).style.display = "none";
                    }
                    // 열기 Script
                    function openWin(divID) {
                        document.getElementById(divID).style.display = "block";  
                    }
                </script>
            </div>
        </div>
        <div class="modal-backdrop in"></div>
    </div>
    <!-- End 내부팝업 -->


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

                var data =  {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    'AssignCcd' : $("#AssignCcd").val(),
                    'SearchDate' : $("#SearchDate").val(),
                    'SearchEndDate' : $("#SearchEndDate").val(),
                    'SearchType' : 'search'
                };

                sendAjax('{{ site_url('/crm/tm/search/') }}', data, function(ret) {
                       if(ret.ret_data == '0') {
                           alert("검색된 데이터가 존재하지 않습니다.");return;
                       }
                       setAssignCount(ret.ret_data);
                }, showError, false, 'POST');

            });


            $("#btn_reset").click(function () {
                location.replace('{{site_url('/crm/tm/index')}}')
            });
            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/crm/tm/tmIndex') }}');
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

                    if(i < (tm_adminCnt-1) ) {
                        $("input[name='eachCnt[]']:eq(" + i + ")").val(divide_cnt);
                    } else if( i == (tm_adminCnt -1) ) {    //마지막 배열이면

                        if(member_count != sum_cnt) {   //멤버수와 합계가 틀리면 조정

                            if(member_count < sum_cnt) {    //합계가 많을경우
                               change_cnt = divide_cnt - (sum_cnt-member_count);
                           } else { // 합계가 적을경우
                               change_cnt = divide_cnt + (member_count-sum_cnt);
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

                var _url = '{{ site_url('/crm/tm/assign') }}';
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
                var url = '{{ site_url('/crm/tm/assignList/') }}'+tm_idx;
                $('.btn_tm_list').setLayer({
                     'url' : url,
                     'width' : 1000
                 }).click();
            }

        });


    </script>
@stop