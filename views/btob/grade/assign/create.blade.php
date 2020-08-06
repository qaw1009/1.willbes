@extends('btob.layouts.master')
@section('content')
    <h5>- 채점관리자들에게 회원을 배정하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="regi_form" name="regi_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="row mt-20">
            <div class="col-md-2">
                <p>• 첨삭회원검색</p>
            </div>
        </div>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="AssignCcd">조건</label>
                    <div class="col-md-11 form-inline">

                        <select class="form-control" id="search_prod_code" name="search_prod_code" title="강좌명" required="required">
                            <option value="">-강좌명-</option>
                            @foreach($lecture_data as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_correct_idx" name="search_correct_idx" title="회차명" required="required">
                            <option value="">-회차명-</option>
                        </select>
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
                            @foreach($assign_admin as $row)
                                <p id="{{$loop->index}}">
                                    <input type="hidden" name="wAdminIdx[]" id="wAdminIdx_{{$row['AdminIdx']}}" value="{{$row['AdminIdx']}}" data-index="{{$loop->index}}">
                                    {{$row['AdminName']}} &nbsp;&nbsp;<input type='number' name='eachCnt[]' id="'eachCnt_{{$row['AdminIdx']}}'" value='' title="배정회원수" data-index="{{$loop->index}}" class="form-control" size="7" required="required" maxlength="3"> 건
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-xs-12 text-center">
                        <button type="button" class="btn btn-success mr-10" id="btn_assign">회원배정</button>
                        <button class="btn btn-primary" type="button" id="btn_list">배정이력</button>&nbsp;
                        {{--<button type="button" class="btn btn-default mr-10 btn_manual" id="btn_manual">수동배정</button>--}}
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            $regi_form.on('change', 'select[name="search_prod_code"]', function() {
                $('#search_correct_idx').children('option:not(:first)').remove();
                $regi_form.find('input[name="MemCnt"]').val('');
                $regi_form.find('input[name="eachCnt[]"]').val('');
                if ($(this).val() != '') {
                    var add_options = '';
                    var data = {
                        '{{ csrf_token_name() }}': $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                        'prod_code': $(this).val()
                    };
                    var url = '/common/search/correctUnitAjax/';
                    sendAjax(url, data, function (ret) {
                        if (ret !== null && Object.keys(ret).length > 0) {
                            $.each(ret, function (k, row) {
                                add_options += '<option value="' + row['CorrectIdx'] + '">' + row['Title'] + '</option>';
                            });
                            $('#search_correct_idx').append(add_options);
                        }
                    }, showValidateError, false, 'POST');
                }
            });

            $regi_form.on('change', 'select[name="search_correct_idx"]', function() {
                $regi_form.find('input[name="MemCnt"]').val('');
                $regi_form.find('input[name="eachCnt[]"]').val('');
            });

            $("#btn_search").click(function () {
                if($("#search_prod_code").val() == ""){alert("강좌명을 선택해 주세요.");return;}
                if($("#search_correct_idx").val() == ""){alert("회차명을 선택해 주세요.");return;}
                $("#MemCnt").val('');
                $("input[name='eachCnt[]']").val('');

                var data =  {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    'search_prod_code' : $("#search_prod_code").val(),
                    'search_correct_idx' : $("#search_correct_idx").val()
                };

                sendAjax('{{ site_url('/grade/assignMng/search/') }}', data, function(ret) {
                    if(ret.ret_data == '0') {
                        notifyAlert("error", "알림", "등록된 첨삭데이터가 없거나 배정이 완료된 회차입니다."); return;
                        /*alert("등록된 첨삭데이터가 없거나 배정이 완료된 회차입니다.");return;*/
                    }
                    setAssignCount(ret.ret_data);
                }, showError, false, 'POST');
            });

            $("#btn_assign").click(function () {
                if($("#search_prod_code").val() == "") {
                    alert("강좌명을 선택해 주세요.");return;
                }
                if($("#search_correct_idx").val() == "") {
                    alert("회차명을 선택해 주세요.");return;
                }
                var sum = 0;
                $("input[name= 'eachCnt[]']").each(function(){
                    sum += +$(this).val();
                });

                /*if($("#MemCnt").val() != sum) {
                    alert("검색건수 와 배정회원건수의 합이 일치하지 않습니다.");return;
                }*/

                if( parseInt($("#MemCnt").val()) < sum) {
                    alert("배정건수가 더 많습니다. 배정건수를 확인하여 주십시오.\n\n배정건수 : "+sum);return;
                }

                if(!confirm("회원을 배정하시겠습니까?")) {
                    return;
                }

                var _url = '{{ site_url('/grade/assignMng/store/') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        //notifyAlert('success', '알림', ret.ret_msg);
                        alert("회원이 배정되었습니다.");
                        $("#btn_assign").attr("disabled",true);
                        showAssign(ret.ret_data)
                    }
                }, showValidateError, null, false, 'alert');
            });

            //배정이력
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/grade/assignMng/list/') }}');
            });

            /*//수동배정
            $("#btn_manual").click(function () {
                var url = '{{ site_url('/grade/assignMng/assignManualCreateModal/') }}';
                //location.href = url;
                $('.btn_manual').setLayer({
                    'url' : url,
                    'width' : 1000,
                });
            });*/

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
                        if(member_count >= sum_cnt) {
                            $("input[name='eachCnt[]']:eq(" + i + ")").val(divide_cnt);
                        } else {
                            $("input[name='eachCnt[]']:eq(" + i + ")").val('0');
                        }

                    } else if( i == (tm_adminCnt -1) ) {    //마지막 배열이면
                        if(member_count != sum_cnt) {       //멤버수와 합계가 틀리면 조정
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
        });
    </script>
@stop