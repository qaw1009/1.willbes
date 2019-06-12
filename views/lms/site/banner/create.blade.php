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
                    <label class="control-label col-md-1-1" for="banner_disp_idx">카테고리정보<span class="required">*</span></label>
                    <div class="form-inline col-md-10 item">
                        <select class="form-control mr-10" id="cate_code" name="cate_code" title="카테고리">
                            <option value="">카테고리</option>
                            @foreach($arr_cate_code as $row)
                                <option value="{{$row['SiteCode']}}_{{$row['CateCode']}}" class="{{ $row['SiteCode'] }}" @if($row['SiteCode'].'_'.$row['CateCode'] == $data['SiteCode'].'_'.$data['CateCode'])selected="selected"@endif>{{ $row['CateRouteName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">노출섹션<span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        <select class="form-control mr-10" id="banner_disp_idx" name="banner_disp_idx" required="required" title="노출섹션">
                            <option value="">노출섹션</option>
                            @foreach($arr_disp_data as $row)
                                <option value="{{$row['BdIdx']}}" class="{{ $row['SiteCode'] }}_{{ $row['CateCode'] }}" @if($row['BdIdx'] == $data['BdIdx'])selected="selected"@endif>{{$row['DispName']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label class="control-label col-md-1-1 d-line" for="campus_ccd">캠퍼스</label>
                    <div class="col-md-4 form-inline item ml-12-dot">
                        <select class="form-control" id="campus_ccd" name="campus_ccd" required="required" title="캠퍼스">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}" @if($method == 'PUT' && ($row['CampusCcd'] == $data['CampusCcd'])) selected="selected" @endif>{{ $row['CampusName'] }}</option>
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
                            <input type="radio" id="link_type_layer" name="link_type" class="flat" value="layer" @if($data['LinkType']=='layer')checked="checked"@endif/>
                            <label for="link_type_layer" class="input-label">레이어팝업 (이벤트 바로신청팝업)</label>
                            <input type="radio" id="link_type_popup" name="link_type" class="flat" value="popup" @if($data['LinkType']=='popup')checked="checked"@endif/> <label for="link_type_popup" class="input-label">팝업창</label>
                            ( <input type="number" id="pop_width" name="pop_width" class="form-control" maxlength="4" title="팝업width" value="{{ $data['PopWidth'] }}" required="required_if:link_type,popup" style="width: 60px;">
                            x <input type="number" id="pop_height" name="pop_height" class="form-control" maxlength="4" title="팝업height" value="{{ $data['PopHeight'] }}" required="required_if:link_type,popup" style="width: 60px;"> )
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="link_url">링크주소<span class="required">*</span></label>
                    <div class="col-md-10 form-inline">
                        <input type="text" id="link_url" name="link_url" class="form-control" maxlength="255" title="링크주소" value="{{ $data['LinkUrl'] }}" required="required" placeholder="링크주소 입니다." style="width: 40%">
                        <div class="mt-10">• 내부링크 : 프로토콜 (http, https) <span class="red bold">제외하고, 실제 서비스 도메인을 포함하여 입력 (예: police.willbes.net/home/index/cate/3001)</span></div>
                        <div class="mt-5">• 외부링크 : 프로토콜 (http, https) <span class="red bold">입력 필수 (예: http://www.hanlimgosi.co.kr)</span></div>
                        <div class="mt-5">• 레이어팝업 : <span class="red bold">실제 서비스 도메인만 입력 (예 : ploice.willbes.net)</span></div>
                        <div class="mt-5">• 연결링크가 없을 경우 : <span class="red bold">#</span> 입력</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="link_url_type_I">외,내부 링크 타입<span class="required">*</span></label>
                    <div class="col-md-10 form-inline">
                        <input type="radio" id="link_url_type_I" name="link_url_type" class="flat" value="I" required="required" title="외내부 링크타입" @if($method == 'POST' || $data['LinkUrlType']=='I')checked="checked"@endif/> <label for="link_url_type_I" class="input-label">내부링크</label>
                        <input type="radio" id="link_url_type_O" name="link_url_type" class="flat" value="O" @if($data['LinkUrlType']=='O')checked="checked"@endif/> <label for="link_url_type_O" class="input-label">외부링크</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="attach_img">배너이미지<span class="required">*</span></label>
                    <div class="col-md-10 item form-inline">
                        <div class="title">
                            <!--div class="filetype">
                                <input type="text" class="form-control file-text" disabled="">
                                <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                                <span class="file-select file-btn"-->
                                <input type="file" id="attach_img" name="attach_img" @if($method == 'POST')required="required"@endif class="form-control input-file" title="배너 이미지">
                                <!--/span>
                            </div-->
                            @if($method == 'PUT')
                                <div class="mt-5">
                                    <img src="{{$data['BannerFullPath']}}{{$data['BannerImgName']}}">
                                    <div class="mt-5 bold">{{$data['BannerImgRealName']}}</div>
                                </div>
                            @endif
                        </div>
                    </div>
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
                        <input type="text" id="order_num" name="order_num" class="form-control" maxlength="3" title="정렬" value="{{ $data['OrderNum'] }}" style="width: 100px;">
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
            // site-code에 매핑되는 select box 자동 변경
            $regi_form.find('select[name="campus_ccd"]').chained("#site_code");
            $regi_form.find('select[name="cate_code"]').chained("#site_code");
            $regi_form.find('select[name="banner_disp_idx"]').chained("#cate_code");

            @if($method == 'PUT')
                $regi_form.find('select[name="cate_code"]').prop('disabled', true);
            @endif

            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/site/banner/regist/") }}' + getQueryString();
            });
            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url("/site/banner/regist/store") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/site/banner/regist/") }}' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });
        });

        function addValidate() {
            var link_type = $(":input:radio[name=link_type]:checked").val();

            if (link_type != 'layer' && $("input[name='link_url']").val() == '') {
                alert('링크주소를 입력해 주세요.');
                return false;
            }
            return true;
        }
    </script>
@stop