@extends('lcms.layouts.master')
@section('content')
    <h5>- 사이트 랜딩페이지를 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <div class="x_panel">
        <div class="x_title">
            <h2>랜딩페이지정보</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/site/banner/store") }}" novalidate>--}}
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="l_idx" value="{{ $l_idx }}"/>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-10">
                        <div class="form-inline inline-block item">
                            {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : '')) !!}
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;• 최초 등록 후 운영사이트, 카테고리 정보는 수정이 불가능합니다.

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">카테고리정보 <span class="required">*</span>
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
                    <label class="control-label col-md-1-1" for="">제목 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" id="title" name="title" class="form-control" title="제목" required="required" value="{{$data['Title']}}">
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="">랜딩코드 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 ml-12-dot form-control-static">@if($method == 'PUT'){{$data['LIdx']}}@else # 등록 시 자동 생성 @endif</div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">노출기간
                    </label>
                    <div class="col-md-10">
                        <div class="form-inline">
                            <input type="text" class="form-control datepicker" id="disp_start_datm" name="disp_start_datm" value="{{$data['DispStartDay']}}" style="width: 120px;">
                            <select class="form-control ml-5" id="disp_start_time" name="disp_start_time">
                                @php
                                    for($i=0; $i<=23; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $data['DispStartHour']) ? "selected='selected'" : "";
                                        echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select> 시 &nbsp; ~ &nbsp;&nbsp;
                            <input type="text" class="form-control datepicker" id="disp_end_datm" name="disp_end_datm" value="{{$data['DispEndDay']}}">
                            <select class="form-control ml-5" id="disp_end_time" name="disp_end_time">
                                @php
                                    for($i=0; $i<=23; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $data['DispEndHour']) ? "selected='selected'" : "";
                                        echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select> 시
                            &nbsp;&nbsp;&nbsp;&nbsp;• 노출기간 미 입력 시 '사용여부'로 노출 여부 설정
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">노출경로 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <input type="text" id="disp_route" name="disp_route" class="form-control" title="노출경로" required="required" placeholder="노출할 링크를 입력해 주세요." value="{{$data['DispRoute']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">마감안내문구(alert) <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <input type="text" id="guidance_note" name="guidance_note" class="form-control" title="마감안내문구(alert)" required="required" placeholder="해당 프로모션이 종료되었습니다." value="{{$data['GuidanceNote']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">CSS
                    </label>
                    <div class="col-md-10 form-inline">
                        <textarea id="css" name="css" class="form-control" rows="7" title="CSS" placeholder="" style="width: 100%; resize: none;">{{$data['Css']}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">내용 <span class="required">*</span><br/><br/>
                        <button type="button" id="" class="btn btn-sm btn-default">미리보기</button>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <textarea id="content" name="content" class="form-control" rows="7" title="프로모션소스" required="required" placeholder="프로모션 소스를 등록해 주세요." style="width: 100%; resize: none;">{{$data['Content']}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" checked="checked"/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N"/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">설명  
                    </label>
                    <div class="col-md-10 form-inline">
                        <textarea id="desc" name="desc" class="form-control" rows="7" title="설명" placeholder="" style="width: 100%; resize: none;">{{$data['Desc']}}</textarea>
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

            // 카테고리 삭제
            $regi_form.on('click', '.selected-category-delete', function() {
                var that = $(this);
                that.parent().remove();
            });

            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/site/landingPage/") }}' + getQueryString();
            });

            // ajax submit
            $regi_form.submit(function() {
                var site_code = $regi_form.find('select[name="site_code"]').val();
                var site_all_code = "{{config_item('app_intg_site_code')}}";
                var _url = '{{ site_url("/site/landingPage/store") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    @if($method == 'POST')
                    if(site_code != site_all_code && $regi_form.find('input[name="cate_code[]"]').length < 1) {
                        alert('카테고리 선택 필드는 필수입니다.');
                        return false;
                    }
                    @endif

                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/site/landingPage/") }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop