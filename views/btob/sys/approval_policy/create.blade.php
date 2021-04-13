@extends('btob.layouts.master')

@section('content')
    <h5>- 월 기준 지점별 수강부여(승인완료) 제한 정보를 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>수강부여제한 정보</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                <input type="hidden" name="branch_ccd" value="{{ $branch_ccd }}"/>

                <div class="form-group">
                    <label class="control-label col-md-1" for="">지점정보
                    </label>
                    <div class="col-md-10">
                        <p class="form-control-static bold">[{{ $data[0]['AreaCcdName'] }}] {{ $data[0]['BranchCcdName'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="">수강부여제한정보
                        {{--<br/><button name="btn_tmpl_add" class="btn btn-sm bg-dark mt-5">+ 월추가</button>--}}
                    </label>
                    <div class="col-md-10">
                        {{-- 수강부여제한정보 등록폼 --}}
                        <div class="row">
                            <div class="col-md-12 form-inline mt-5">
                                <select class="form-control" name="start_year" title="년도" style="width: 70px;">
                                    @for($y = 2021; $y <= date('Y') + 1; $y++)
                                        <option value="{{ $y }}" {!! $y == date('Y') ? 'selected="selected"' : '' !!}>{{ $y }}</option>
                                    @endfor
                                </select> 년
                                <select class="form-control ml-5" name="start_month" title="월" style="width: 50px;">
                                    @for($m = 1; $m <= 12; $m++)
                                        <option value="{{ $m }}" {!! $m == date('n') ? 'selected="selected"' : '' !!}>{{ $m }}</option>
                                    @endfor
                                </select> 월
                                <label class="normal ml-15"><input type="radio" name="is_limit_0" class="flat is-limit" value="N"/> 제한없음</label>
                                <label class="normal ml-10 mr-15"><input type="radio" name="is_limit_0" class="flat is-limit" value="Y" checked="checked"/> 제한있음</label>
                                <span>[수강부여(승인완료) 가능 개수]</span>
                                <input type="number" name="limit_cnt" class="form-control input-sm ml-5" value="" title="수강부여(승인완료)가능개수" style="width: 80px;"/> 개
                                <button name="btn_save" class="btn btn-sm btn-dark ml-10" data-is-modify="N">등록</button>
                            </div>
                        </div>
                        {{-- 수강부여제한정보 목록 (수정폼) --}}
                        @foreach($data as $row)
                            @if($row['IsRegist'] == 'Y')
                                <div class="row">
                                    <div class="col-md-12 form-inline mt-10">
                                        <select class="form-control bg-white-gray" name="start_year" title="년도" style="width: 70px;">
                                            <option value="{{ $row['ApplyStartYear'] }}">{{ $row['ApplyStartYear'] }}</option>
                                        </select> 년
                                        <select class="form-control bg-white-gray ml-5" name="start_month" title="월" style="width: 50px;">
                                            <option value="{{ $row['ApplyStartMonth'] }}">{{ $row['ApplyStartMonth'] }}</option>
                                        </select> 월
                                        <label class="normal ml-15"><input type="radio" name="is_limit_{{ $loop->index }}" class="flat is-limit" value="N" {!! $row['IsLimit'] == 'N' ? 'checked="checked"' : '' !!}/> 제한없음</label>
                                        <label class="normal ml-10 mr-15"><input type="radio" name="is_limit_{{ $loop->index }}" class="flat is-limit" value="Y" {!! $row['IsLimit'] == 'Y' ? 'checked="checked"' : '' !!}/> 제한있음</label>
                                        <span>[수강부여(승인완료) 가능 개수]</span>
                                        <input type="number" name="limit_cnt" class="form-control input-sm ml-5" value="{{ $row['IsLimit'] == 'Y' ? $row['LimitCnt'] : '' }}" title="수강부여(승인완료)가능개수" style="width: 80px;"/> 개
                                        <button name="btn_save" class="btn btn-sm btn-success ml-10" data-is-modify="Y" {!! $row['ApplyStartDate'] < date('Y-m-01') ? 'disabled="disabled"' : '' !!}>수정</button>
                                        (~ {{ $row['ApplyEndDate'] }})
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <p class="form-control-static mt-20" style="line-height: 180%;">
                            <strong class="blue">[월 기준 수강부여(승인완료) 가능 개수 체크 정책]</strong><br/>
                            # 당월 기준 다음 월 수강부여(승인완료) 가능 개수 입력 정보가 없을 경우 당월에 입력된 개수로 다음 월 개수 반영하야 제한 처리<br/>
                            &nbsp; - 당월 기준 몇개월 후 수강부여(승인완료) 가능 개수 입력 시, 직전 월 말일까지 직전 입력 개수 반영<br/>
                            &nbsp;&nbsp; (예) 당월(4월)에 7월 수강부여(승인완료) 가능 개수 추가 입력 시 6월 말일까지 4월 입력 개수 반영<br/>
                            # 당월 기준 수강부여(승인완료) 가능 개수 추가 입력 불가<br/>
                            # 당월 기준 수강부여(승인완료) 가능 개수 수정 가능하되, 기존 입력된 개수보다 큰 숫자만 입력 가능<br/>
                            &nbsp; - 당월 이전 수강부여(승인완료) 가능 개수 수정 불가<br/>
                        </p>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="text-center">
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // 등록/수정 버튼 클릭
            $regi_form.on('click', 'button[name="btn_save"]', function() {
                var index = $regi_form.find('button[name="btn_save"]').index(this);
                var start_year = $regi_form.find('select[name="start_year"]').eq(index).val();
                var start_month = $regi_form.find('select[name="start_month"]').eq(index).val();
                var is_limit = $regi_form.find('input[type="radio"].is-limit:checked').eq(index).val() || 'Y';
                var limit_cnt = $regi_form.find('input[name="limit_cnt"]').eq(index).val();
                var _method = $(this).data('is-modify') === 'Y' ? 'PUT' : 'POST';
                var data = {};

                if (is_limit === 'Y' && (limit_cnt.length < 1 || parseInt(limit_cnt) < 0)) {
                    alert('수강부여 가능개수를 입력해 주세요.');
                    $regi_form.find('input[name="limit_cnt"]').eq(index).focus();
                    return;
                }

                if (confirm('저장하시겠습니까?')) {
                    data = {
                        '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                        '_method' : _method,
                        'branch_ccd' : $regi_form.find('input[name="branch_ccd"]').val(),
                        'start_year' : start_year,
                        'start_month' : start_month,
                        'is_limit' : is_limit,
                        'limit_cnt' : limit_cnt
                    };

                    sendAjax('{{ site_url('/sys/approvalPolicy/store') }}', data, function(ret) {
                        if (ret.ret_cd) {
                            notifyAlert('success', '알림', ret.ret_msg);
                            location.reload();
                        }
                    }, showError, false, 'POST');
                }
            });

            // 목록 버튼 클릭
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/sys/approvalPolicy/index') }}' + getQueryString());
            });
        });
    </script>
@stop
