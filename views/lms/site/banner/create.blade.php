@extends('lcms.layouts.master')
@section('content')
    <h5>- 사이트 섹션별 배너를 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
    {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/site/banner/regist/store") }}" novalidate>--}}
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
                    <label class="control-label col-md-1-1" for="site_code">운영사이트<span class="required">*</span></label>
                    <div class="form-inline col-md-10 item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : ''), true) !!}
                        &nbsp;&nbsp;&nbsp;&nbsp;• 최초 등록 후 운영사이트, 카테고리 정보는 수정이 불가능합니다. 
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">카테고리정보
                    </label>
                    <div class="col-md-4 form-inline">
                        @if($method == 'PUT')
                            <p class="form-control-static">{{ $data['CateName'] }}</p>
                        @else
                            <select class="form-control mr-10" id="cate_code" name="cate_code" title="카테고리" @if($method == 'PUT')disabled="disabled"@endif>
                                <option value="">카테고리</option>
                                @foreach($arr_cate_code as $row)
                                    <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>

                    <label class="control-label col-md-1-1 d-line" for="banner_disp_idx">노출섹션<span class="required">*</span></label>
                    <div class="form-inline col-md-4 ml-12-dot item">
                        <select class="form-control mr-10" id="banner_disp_idx" name="banner_disp_idx" required="required" title="노출섹션">
                            <option value="">노출섹션</option>
                            @foreach($arr_disp_data as $row)
                                <option value="{{$row['BdIdx']}}" class="{{$row['SiteCode']}}" @if($row['BdIdx'] == $data['BdIdx'])selected="selected"@endif>{{$row['DispName']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="banner_name">배너명<span class="required">*</span></label>
                    <div class="col-md-10 item">
                        <input type="text" id="banner_name" name="banner_name" required="required" class="form-control" maxlength="100" title="배너명" value="{{ $data['BannerName'] }}" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="disp_start_datm">노출시간</label>
                    <div class="col-md-10 form-inline">
                        <div class="input-group mb-0">
                            <input type="text" class="form-control datepicker" id="disp_start_datm" name="disp_start_datm" value="{{$data['DispStartDay']}}">
                            <div class="input-group-btn">
                                <select class="form-control ml-5" id="disp_start_time" name="disp_start_time">
                                    @php
                                    for($i=0; $i<=23; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $data['DispStartHour']) ? "selected='selected'" : "";
                                        echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                    @endphp
                                </select>
                            </div>
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <input type="text" class="form-control datepicker" id="disp_end_datm" name="disp_end_datm" value="{{$data['DispEndDay']}}">
                            <div class="input-group-btn">
                                <select class="form-control ml-5" id="disp_end_time" name="disp_end_time">
                                    @php
                                        for($i=0; $i<=23; $i++) {
                                            $str = (strlen($i) <= 1) ? '0' : '';
                                            $selected = ($i == $data['DispEndHour']) ? "selected='selected'" : "";
                                            echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;• 노출기간 미 입력 시 '진행상태'로 오픈 여부 설정
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="link_type_self">링크방식<span class="required">*</span></label>
                    <div class="col-md-10 item form-inline">
                        <div class="radio">
                            <input type="radio" id="link_type_self" name="link_type" class="flat" value="self" required="required" title="링크방식" @if($method == 'POST' || $data['LinkType']=='self')checked="checked"@endif/> <label for="link_type_self" class="input-label">본창</label>
                            <input type="radio" id="link_type_blank" name="link_type" class="flat" value="blank" @if($data['LinkType']=='blank')checked="checked"@endif/> <label for="link_type_blank" class="input-label">새창</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="link_url">링크주소<span class="required">*</span></label>
                    <div class="col-md-10 item">
                        <input type="text" id="link_url" name="link_url" required="required" class="form-control" maxlength="46" title="링크주소" value="{{ $data['LinkUrl'] }}" placeholder="링크주소 입니다.">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="attach_img">배너이미지<span class="required">*</span></label>
                    <div class="col-md-10 item form-inline">
                        <div class="title">
                            <div class="filetype">
                                <input type="text" class="form-control file-text" disabled="">
                                <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                                <span class="file-select file-btn">
                                <input type="file" id="attach_img" name="attach_img" @if($method == 'POST')required="required"@endif class="form-control input-file" title="배너 이미지">
                                </span>
                            </div>
                        </div>
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
                    <label class="control-label col-md-1-1" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-4 item form-inline">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="order_num">정렬</label>
                    <div class="col-md-4 ml-12-dot">
                        <input type="text" id="order_num" name="order_num" class="form-control" maxlength="3" title="정렬" value="{{ $data['OrderNum'] }}" >
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

                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {
            // site-code에 매핑되는 select box 자동 변경
            $regi_form.find('select[name="cate_code"]').chained("#site_code");
            $regi_form.find('select[name="banner_disp_idx"]').chained("#site_code");

            //목록
            $('#btn_list').click(function() {
                location.replace('{{ site_url("/site/banner/regist/") }}' + getQueryString());
            });
            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url("/site/banner/regist/store") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/site/banner/regist/") }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop