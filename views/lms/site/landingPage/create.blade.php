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
                        <!--&nbsp;&nbsp;&nbsp;&nbsp;• 최초 등록 후 운영사이트, 카테고리 정보는 수정이 불가능합니다.//-->
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">카테고리정보
                    </label>
                    <div class="col-md-10 form-inline">
                        <button type="button" id="btn_category_search" class="btn btn-sm btn-primary">카테고리검색</button>
                        <input type="hidden" name="cate_code" id="cate_code" value="{{$data['CateCode']}}" required="required" title="카테고리정보">
                        <span id="selected_category">
                            {{$data['CateName']}}
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">제목 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" id="title" name="title" class="form-control" title="제목" required="required" value="{{$data['Title']}}">
                    </div>
                    <label class="control-label col-md-1-1">랜딩코드 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" id="l_code" name="l_code" class="form-control" title="랜딩코드" required="required" style="width: 100px" value=" @if($method=="POST"){{ $max_lcode }}@else{{$data['LCode']}}@endif">
                    </div>
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
                            &nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">노출경로 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" id="disp_route" name="disp_route" class="form-control" title="노출경로" required="required" placeholder="노출할 링크를 입력해 주세요." value="{{$data['DispRoute']}}">
                    </div>
                    <div class="col-md-4 form-control-static">
                        • 해당 HTML 소스가 노출될 프론트 페이지 주소
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">종료안내문구(alert)
                    </label>
                    <div class="col-md-10 item">
                        <input type="text" id="guidance_note" name="guidance_note" class="form-control" title="종료안내문구(alert)" placeholder="컨텐츠 제공 기간이 종료되었습니다." value="{{$data['GuidanceNote']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">내용 <span class="required">*</span><br/><br/>
                        @if($method==="PUT")
                        <button type="button" id="btn-preview" class="btn btn-sm btn-default" data-host="{{$data["SiteHost"]}}">미리보기</button>
                        @endif
                    </label>
                    <div class="col-md-10 form-inline item">
                        <textarea id="content" name="content" class="form-control" rows="30" title="HTML소스" required="required" placeholder="HTML 소스를 등록해 주세요." style="width: 100%; resize: none;">{{$data['Content']}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <div class="radio">
                            <input type="radio" id="IsUse_Y" name="IsUse" class="flat" value="Y" required="required" @if($method=="POST" || $data['IsUse']=='Y')checked="checked"@endif/> <label for="IsUse_Y" class="input-label">사용</label>
                            <input type="radio" id="IsUse_N" name="IsUse" class="flat" value="N" required="required" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="IsUse_N" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">설명  
                    </label>
                    <div class="col-md-10 form-inline">
                        <textarea id="desc" name="desc" class="form-control" rows="5" title="설명" placeholder="" style="width: 100%; resize: none;">{{$data['Desc']}}</textarea>
                    </div>
                </div>
            @if($method==="PUT")
                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">등록일
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">최종 수정일
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                    </div>
                </div>
            @endif
                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>

            <form name="preview_form" id="preview_form" method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="preview" value="Y">
                <input type="hidden" name="preview_content" id="preview_content" value="">
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
                    alert('운영사이트를 먼저 선택해 주십시오.');
                    return;
                }
                /*
                $('#btn_category_search').setLayer({
                    'url' : '{{ site_url('/common/searchCategory/index/multiple/site_code/') }}' + site_code + '/cate_depth/1',
                    'width' : 900
                });
                */
                $("#btn_category_search").setLayer({
                    'url': '{{ site_url('/common/searchCategory/index/single/site_code/') }}' + $("#site_code").val()
                    , 'width': 800
                })

            });
            /*
            // 카테고리 삭제
            $regi_form.on('click', '.selected-category-delete', function() {
                var that = $(this);
                that.parent().remove();
            });
            */
            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/site/landingPage/") }}' + getQueryString();
            });

            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url("/site/landingPage/store") }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/site/landingPage/") }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

           $('#btn-preview').click(function(){
               var $host = $(this).data('host');
               $("#preview_form").one("submit", function() {
                   if($('#content').val() == '') {
                       alert("내용을 입력하세요");return;
                   }
                   $('#preview_content').val($('#content').val());
                   $env_url = '{{ENV_DOMAIN}}';
                   var open_url = '//'+$host+$env_url+'.willbes.net/'+$('#disp_route').val();
                   window.open('','pop_target','');
                   this.action = open_url;
                   this.method = 'POST';
                   this.target = 'pop_target';
               }).trigger("submit");
           });
        });
    </script>
@stop