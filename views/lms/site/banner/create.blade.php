@extends('lcms.layouts.master')
@section('content')
    <h5>- 사이트 섹션별 배너를 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
    {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/site/banner/store") }}?bm_idx=45" novalidate>--}}
    {!! csrf_field() !!}
    {!! method_field($method) !!}
    <input type="hidden" name="b_idx" value="{{ $b_idx }}"/>
        <div class="x_panel">
            <div class="x_title">
                <h2>배너관리 정보</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="site_code">운영사이트<span class="required">*</span></label>
                    <div class="col-md-2 item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : '')) !!}
                    </div>
                    <div class="col-md-5">
                        <p class="form-control-static">• 최초 등록 후 운영사이트, 카테고리 정보는 수정이 불가능합니다.</p>
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
                    <label class="control-label col-md-2" for="banner_disp">노출섹션<span class="required">*</span></label>
                    <div class="col-md-2 item">
                        <select class="form-control" id="banner_disp" name="banner_disp" required="required" title="노출섹션">
                            <option value="">노출섹션</option>
                            @foreach($banner_disp as $key => $val)
                                <option value="{{$key}}" @if($key == $data['DispCcd'])selected="selected"@endif>{{$val}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2 item">
                        <select class="form-control" id="banner_location" name="banner_location" required="required" title="배너위치">
                            <option value="">배너위치</option>
                            @foreach($banner_location as $key => $val)
                                <option value="{{$key}}" @if($key == $data['BannerLocationCcd'])selected="selected"@endif>{{$val}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="banner_name">배너명<span class="required">*</span></label>
                    <div class="col-md-7 item">
                        <input type="text" id="banner_name" name="banner_name" required="required" class="form-control" maxlength="100" title="배너명" value="{{ $data['BannerName'] }}" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="disp_start_datm">노출시간</label>
                    <div class="col-md-4 form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" id="disp_start_datm" name="disp_start_datm" value="{{$data['DispStartDatm']}}">
                            <div class="input-group-btn">
                                <select class="form-control ml-5" id="disp_start_time" name="disp_start_time">
                                    @php
                                    for($i=0; $i<=23; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == data['DispStartTime']) ? "selected='selected'" : "";
                                        echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                    @endphp
                                </select>
                            </div>
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <input type="text" class="form-control datepicker" id="disp_end_datm" name="disp_end_datm" value="{{$data['DispEndDatm']}}">
                            <div class="input-group-btn">
                                <select class="form-control ml-5" id="disp_end_time" name="disp_end_time">
                                    @php
                                        for($i=0; $i<=23; $i++) {
                                            $str = (strlen($i) <= 1) ? '0' : '';
                                            $selected = ($i == data['DispEndTime']) ? "selected='selected'" : "";
                                            echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static">• 노출기간 미 입력 시 '진행상태'로 오픈 여부 설정</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="link_type_y">링크방식<span class="required">*</span></label>
                    <div class="col-md-3 item form-inline">
                        <div class="radio">
                            <input type="radio" id="link_type_y" name="link_type" class="flat" value="Y" required="required" title="링크방식" @if($method == 'POST' || $data['LinkType']=='Y')checked="checked"@endif/><label for="link_type_y" class="hover mr-5">본창</label>
                            <input type="radio" id="link_type_n" name="link_type" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="link_type_n" class="">새창</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="link_url">링크주소<span class="required">*</span></label>
                    <div class="col-md-9 item">
                        <input type="text" id="link_url" name="link_url" required="required" class="form-control" maxlength="46" title="링크주소" value="{{ $data['LinkUrl'] }}" placeholder="링크주소 입니다.">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="attach_img">배너이미지<span class="required">*</span></label>
                    <div class="col-md-9 item form-inline">
                        <input type="file" id="attach_img" name="attach_img" @if($method == 'POST')required="required"@endif class="form-control" title="배너 이미지">
                    </div>
                    @if($method == 'PUT')
                    <div class="col-md-9 col-lg-offset-2 item form-inline mt-5">
                        <img src="{{$data['BannerFullPath']}}{{$data['BannerImgName']}}">
                    </div>
                    <div class="col-md-9 col-lg-offset-2 item form-inline mt-5">
                        <b>{{$data['BannerImgRealName']}}</b>
                        {{--<a href="#none" class="img-delete" data-attach-idx="{{$data['BIdx']}}"><i class="fa fa-times red"></i></a>--}}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-2 item form-inline">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/><label for="is_use_y" class="hover mr-5">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="">미사용</label>
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="order_num">정렬</label>
                    <div class="col-md-1">
                        <input type="text" id="order_num" name="order_num" class="form-control" maxlength="3" title="정렬" value="{{ $data['OrderNum'] }}" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="desc">설명</label>
                    <div class="col-md-9">
                        <textarea id="desc" name="desc" class="form-control" rows="3" title="설명" placeholder="">{!! $data['Desc'] !!}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">등록자
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RegAdminName'] }}@endif</p>
                    </div>
                    <label class="control-label col-md-2">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RegDatm'] }}@endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">최종 수정자
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdAdminName'] }}@endif</p>
                    </div>
                    <label class="control-label col-md-2">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdDatm'] }}@endif</p>
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group text-center">
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
                location.replace('{{ site_url("/site/banner") }}/' + getQueryString());
            });
            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url("/site/banner/store") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    @if($method == 'POST')
                    if($regi_form.find('input[name="cate_code[]"]').length < 1) {
                        alert('카테고리 선택 필드는 필수입니다.');
                        return false;
                    }
                    @endif

                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/site/banner") }}/' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop