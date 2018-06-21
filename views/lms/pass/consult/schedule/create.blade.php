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
                    <label class="control-label col-md-2" for="site_code">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-2 item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : '')) !!}
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1" for="campus_ccd">캠퍼스<span class="required">*</span></label>
                    <div class="col-md-2 item">
                        <select class="form-control" id="campus_ccd" name="campus_ccd" required="required">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
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
                    <label class="control-label col-md-2">상담일정 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="">
                        </div>
                    </div>
                </div>


                <div class="ln_solid"></div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {
            // site-code에 매핑되는 select box 자동 변경
            $regi_form.find('select[name="campus_ccd"]').chained("#site_code");

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

            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/pass/consult/schedule/index') }}' + getQueryString());
            });
        });
    </script>
@stop