@extends('lcms.layouts.master')
@section('content')
    <h5>- 퀴즈를 등록하고 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}

    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="eq_idx" value="{{ $data['EqIdx'] }}"/>

        <div class="x_panel">
            <div class="x_title">
                <h2>퀴즈 등록</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">운영사이트<span class="required">*</span></label>
                    <div class="form-inline col-md-4 item">
                        {!! html_site_select(empty($data['SiteCode']) === false ? $data['SiteCode'] : '', 'site_code', 'site_code', '', '운영 사이트', 'required', ($method == 'PUT') ? 'disabled' : '', false, $arr_site_code) !!}
                    </div>

                    <label class="control-label col-md-1-1" for="promotion_code">코드</label>
                    <div class="col-md-4 form-inline">
                        <p class="form-control-static">@if($method == 'PUT') <b>{{ $eq_idx }}</b>@else # 등록 시 자동 생성 @endif</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="title">퀴즈명<span class="required">*</span></label>
                    <div class="col-md-6 item">
                        <input type="text" id="title" name="title" required="required" class="form-control" maxlength="100" title="퀴즈명" value="{{ $data['Title'] }}" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="start_datm">노출시간<span class="required">*</span></label>
                    <div class="col-md-4 form-inline">
                        <div class="input-group mb-0">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="start_datm" name="start_datm" value="{{ $data['StartDay'] }}">

                            <div class="input-group-addon no-border no-bgcolor">~</div>

                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="end_datm" name="end_datm" value="{{ $data['EndDay'] }}">
                        </div>
                    </div>

                    <label class="control-label col-md-1-1" for="is_use_n">사용여부<span class="required">*</span></label>
                    <div class="col-md-4 item form-inline">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($method == 'POST' || $data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-1-1 ml-10">문제관리 <span class="required">*</span></label>
                        <div class="col-md-9 mb-10">
                            @if($method == 'PUT')
                                <div>
                                    <button type="button" class="btn btn-sm btn-primary border-radius-reset mr-15 btn_quizset_modal" data-eq-idx="{{ $data['EqIdx'] }}" data-eqs-idx="{{ $data['EqsIdx'] or ''}}">
                                        문제등록
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger border-radius-reset mr-5 btn_sort_use"><i class="fa fa-copy mr-10"></i>순서/사용 적용</button>
                                </div>
                            @else
                                # 최초 저장 후 <span style="color: red"> [문제등록] </span> 버튼이 생성됩니다.
                            @endif
                        </div>
                    </div>

                    <label class="control-label col-md-1-1"></label>
                    <div class="col-md-9 form-inline">
                        <table class="table table-striped table-bordered">
                            <colgroup>
                                <col width="4%">
                                <col width="">
                                <col width="4%">
                                <col width="20%">
                                <col width="20%">
                                <col width="7%">
                                <col width="10%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th class="text-center">정렬순서</th>
                                <th class="text-center">문제(그룹)명</th>
                                <th class="text-center">문제수</th>
                                <th class="text-center">서비스 시작</th>
                                <th class="text-center">서비스 종료</th>
                                <th class="text-center">사용유무</th>
                                <th class="text-center">수정/삭제</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(empty($quiz_set_data) === false)
                                @foreach($quiz_set_data as $row)
                                    <tr>
                                        <td class="text-center"><input type="number" name="eqs_order_num" value="{{$row['OrderNum']}}" data-origin-order-num="{{$row['OrderNum']}}" data-eqs-idx= "{{$row['EqsIdx']}}" maxlength="3" style="width: 100%"></td>
                                        <td>{{ $row['EqsGroupTitle'] }}</td>
                                        <td class="text-center">{{ $row['EqsqTotalCnt'] }}</td>
                                        <td class="text-center">{{ $row['EqsStartDatm'] }}</td>
                                        <td class="text-center">{{ $row['EqsEndDatm'] }}</td>
                                        <td class="text-center"><input type="checkbox" name="eqs_is_use" value="Y" class="flat" data-origin-is-use="{{$row['IsUse']}}" @if($row['IsUse'] == 'Y') checked="checked" @endif></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-success mb-10 btn_quizset_modal" data-eqs-idx="{{$row['EqsIdx']}}" data-eq-idx="{{$row['EqIdx']}}">수정</button>
                                            @if($row['MemAnswerCnt'] < 1)
                                                <button type="button" class="btn btn-danger btn-delete mb-10" data-idx="{{$row['EqsIdx']}}" onclick="del_quiz_set(this)">삭제</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegAdminName'] or "" }}</p>
                    </div>
                    <label class="control-label col-md-1-1">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegDatm'] or "" }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdAdminName'] or "" }}</p>
                    </div>
                    <label class="control-label col-md-1-1">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdDatm'] or "" }}</p>
                    </div>
                </div>
                <div class="text-center mt-20">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // 정렬/사용유무 적용
            $('.btn_sort_use').on('click', function() {
                if (!confirm('순서/사용 상태를 적용하시겠습니까?')) {
                    return;
                }

                var $order_num = $regi_form.find('input[name="eqs_order_num"]');
                var $is_use = $regi_form.find('input[name="eqs_is_use"]');
                var origin_val, this_val, this_order_val, this_use_val;
                var $params = {};
                var _url = '{{ site_url("/site/eventQuiz/storeUseOrderNum") }}';

                $order_num.each(function(idx) {
                    // 신규 또는 추천 값이 변하는 경우에만 파라미터 설정
                    this_order_val = $(this).data('origin-order-num');
                    this_use_val = $is_use.eq(idx).filter(':checked').val() || 'N';
                    this_val = this_order_val + ':' + this_use_val;
                    origin_val = $(this).val() + ':' + $is_use.eq(idx).data('origin-is-use');
                    if (this_val != origin_val) {
                        $params[$(this).data('eqs-idx')] = { 'eqs_order_num' : $(this).val(), 'eqs_is_use' : this_use_val };
                    }
                });

                if (Object.keys($params).length < 1) {
                    alert('변경된 내용이 없습니다.');
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'params' : JSON.stringify($params)
                };

                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showError, false, 'POST');
            });

            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url("/site/eventQuiz/store") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/site/eventQuiz/create/") }}' + ret.ret_data.idx + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/site/eventQuiz/index") }}' + getQueryString();
            });

            //퀴즈 문제등록
            $('.btn_quizset_modal').on('click', function() {
                $(".btn_quizset_modal").setLayer({
                    'url' : '{{ site_url('/site/eventQuiz/quizSetCreateModal') }}',
                    'add_param_type' : 'param',
                    'add_param' : [
                        { 'id' : 'eq_idx', 'name' : '퀴즈 식별자', 'value' : $(this).data("eq-idx"), 'required' : true },
                        { 'id' : 'eqs_idx', 'name' : '퀴즈문항 식별자', 'value' : $(this).data("eqs-idx"), 'required' : false}
                    ],
                    'width' : 1000
                });
            });
        });

        // 퀴즈 문제 삭제
        function del_quiz_set(obj){
            var _url = '{{ site_url("/site/eventQuiz/delQuizSet") }}' + getQueryString();
            var data = {
                '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE',
                'eqs_idx' : $(obj).data('idx')
            };

            if (!confirm('해당 문제를 삭제하시겠습니까?')) {
                return;
            }

            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.reload();
                }
            }, showError, false, 'POST');
        }
    </script>
@stop