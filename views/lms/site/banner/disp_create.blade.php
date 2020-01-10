@extends('lcms.layouts.master')
@section('content')
    <h5>- 사이트 메인 및 서브 페이지에 적용할 배너의 노출 섹션 정보를 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/site/banner/disp/store") }}" novalidate>--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="bd_idx" value="{{ $bd_idx }}"/>
        <input type="hidden" name="cate_code" value="{{ $data['CateCode'] }}" title="카테고리 선택"/>
        <div class="x_panel">
            <div class="x_title">
                <h2>배너노출섹션 정보</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">운영사이트<span class="required">*</span></label>
                    <div class="form-inline col-md-10 item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : ''), true) !!}
                        <span class="required pl-20">*</span> 최초 등록 후 운영사이트, 카테고리 정보는 수정이 불가능합니다.
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">카테고리정보
                    </label>
                    <div class="col-md-10 form-inline">
                        @if($method == 'PUT')
                            <p class="form-control-static">{{ $data['CateName'] or '전체카테고리' }}</p>
                        @else
                            <button type="button" id="btn_category_search" class="btn btn-sm btn-primary">카테고리검색</button>
                            <span id="selected_category" class="pl-10"></span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="disp_name">노출섹션명<span class="required">*</span></label>
                    <div class="col-md-3 item">
                        <input type="text" id="disp_name" name="disp_name" required="required" class="form-control" maxlength="100" title="배너명" value="{{ $data['DispName'] }}">
                    </div>
                    <div class="col-md-7">
                        <p class="form-control-static">
                            <span class="required">*</span> PC 사이트 메인에 노출되는 섹션명은 반드시 <span class="red bold">`메인_`</span>으로 시작하는 명칭으로 등록해 주세요.
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="disp_type">노출방식<span class="required">*</span></label>
                    <div class="col-md-4 item form-inline">
                        <div class="radio">
                            @foreach($disp_info as $key => $val)
                                <input type="radio" id="disp_type_{{$key}}" name="disp_type" class="flat" value="{{$key}}" required="required" title="링크방식" @if(($method == 'POST' && $loop->index == 1) || $key == $data['DispTypeCcd'])checked="checked"@endif/> <label for="disp_type_{{$key}}" class="input-label">{{$val}}</label>

                                @if($loop->index == '2')
                                    <select id="disp_rolling_time" class="form-control" name="disp_rolling_time" title="롤링타임">
                                        <option value="1" @if($data['DispRollingTime'] == 1)selected="selected"@endif>1</option>
                                        <option value="2" @if($data['DispRollingTime'] == 2)selected="selected"@endif>2</option>
                                        <option value="3" @if($data['DispRollingTime'] == 3)selected="selected"@endif>3</option>
                                    </select> sec
                                @endif

                            @endforeach
                        </div>
                    </div>

                    <label class="control-label col-md-1-1 d-line" for="is_use_y">사용여부<span class="required">*</span></label>
                    {{--<div class="col-md-4 item form-inline">--}}
                    <div class="col-md-4 ml-12-dot item">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="disp_type">롤링방식</label>
                    <div class="col-md-4 form-inline">
                        <select class="form-control" name="disp_rolling_type" id="disp_rolling_type">
                            <option value="">롤링방식</option>
                            @foreach($disp_rolling_type as $key => $val)
                                <option value="{{$key}}" @if($key == $data['DispRollingTypeCcd'])selected="selected"@endif>{{$val}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="desc">설명</label>
                    <div class="col-md-10">
                        <textarea id="desc" name="desc" class="form-control" rows="3" title="설명" placeholder="">{!! $data['Desc'] !!}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RegAdminName'] }}@endif</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">등록일
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RegDatm'] }}@endif</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdAdminName'] }}@endif</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">최종 수정일
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdDatm'] }}@endif</p>
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
                    'url' : '{{ site_url('/common/searchCategory/index/single/site_code/') }}' + site_code,
                    'width' : 900
                });
            });

            // 카테고리 삭제
            $regi_form.on('click', '.selected-category-delete', function() {
                var that = $(this);
                that.parent().remove();
            });

            $regi_form.on('ifChanged ifCreated', 'input[name="disp_type"]:checked', function() {
                var disp_type_val = $(this).val();
                if (disp_type_val == '664002') {
                    $('#disp_rolling_time').attr('disabled', false);
                    $('#disp_rolling_type').attr('disabled', false);
                } else {
                    $('#disp_rolling_time').attr('disabled', true);
                    $('#disp_rolling_type').attr('disabled', true);
                }
            });

            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/site/banner/disp/") }}' + getQueryString();
            });
            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url("/site/banner/disp/store") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/site/banner/disp/") }}' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });
        });

        function addValidate()
        {
            var string = $('#disp_name').val();
            return checkStringFormat(string);
        }

        function checkStringFormat(string) {
            var isValid = true;
            var pattern = /[^a-zA-Z0-9가-힣_]/;

            if (pattern.test(string) == true) {
                alert('숫자,한글,영문,_ 만 가능합니다.');
                isValid = false;
            }

            return isValid;
        }
    </script>
@stop