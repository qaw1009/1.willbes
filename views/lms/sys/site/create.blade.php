@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스 사용자 운영 사이트 기본 정보를 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>사이트 기본정보</h2>
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
                    <label class="control-label col-md-2" for="site_type_ccd">사이트 타입 <span class="required">*</span>
                    </label>
                    <div class="col-md-2 item">
                        <select name="site_type_ccd" id="site_type_ccd" required="required" class="form-control" title="사이트 타입">
                            <option value="">선택</option>
                            @foreach($site_type_ccd as $key => $val)
                                <option value="{{ $key }}" @if($key == $data['SiteTypeCcd']) selected="selected" @endif>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="control-label col-md-2 col-md-offset-2" for="is_use">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <div class="radio">
                            <input type="radio" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> 사용
                            &nbsp; <input type="radio" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> 미사용
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="site_name">사이트명 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" id="site_name" name="site_name" required="required" class="form-control" title="사이트명" value="{{ $data['SiteName'] }}">
                    </div>
                    <label class="control-label col-md-2">사이트 코드
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">@if($method == 'PUT') {{ $data['SiteCode'] }} @else # 등록 시 자동 생성 @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="none_campus">캠퍼스 구분 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 item">
                        <div class="radio">
                            <input type="radio" id="none_campus" name="is_campus" class="flat" value="N" required="required" title="캠퍼스 구분" @if($method == 'POST' || $data['IsCampus']=='N')checked="checked"@endif/> 없음
                            &nbsp; <input type="radio" id="exist_campus" name="is_campus" class="flat" value="Y" @if($method == 'POST' || $data['IsCampus']=='Y')checked="checked"@endif/> 있음
                            &nbsp; (&nbsp;
                            @foreach($campus_ccd as $key => $val)
                                <input type="checkbox" name="campus_ccd[]" class="flat" value="{{ $key }}" @if($loop->index == 1) required="required_if:is_campus,Y" title="캠퍼스" @endif @if(in_array($key, explode(',', $data['CampusCcds'])) === true)checked="checked"@endif/>
                                <div class="inline-block mr-5">{{ $val }}</div>
                            @endforeach
                            )
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="site_group_code">사이트 그룹정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-2 item">
                        <select name="site_group_code" id="site_group_code" required="required" class="form-control" title="사이트 그룹정보">
                            <option value="">선택</option>
                            @foreach($site_group_codes as $key => $val)
                                <option value="{{ $key }}" @if($key == $data['SiteGroupCode']) selected="selected" @endif>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="site_url">대표 도메인 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <input type="text" id="site_url" name="site_url" required="required" class="form-control" pattern="url" title="대표 도메인" value="{{ $data['SiteUrl'] }}">
                    </div>
                    <div class="col-md-6">
                        <p class="form-control-static"># 대표 도메인을 입력해 주세요. ex) www.willbes.net</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="use_domain">접속 도메인 <span class="required">*</span>
                    </label>
                    <div class="col-md-5 item">
                        <input type="text" id="use_domain" name="use_domain" required="required" class="form-control" title="접속 도메인" value="{{ $data['UseDomain'] }}">
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static"># 접속하는 도메인을 모두 입력해 주세요. (구분자 콤마(,))</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="pg_ccd">PG사 <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <div class="radio item">
                            @foreach($pg_ccd as $key => $val)
                                <input type="radio" name="pg_ccd" class="flat" value="{{ $key }}" @if($loop->index == 1) required="required" title="PG사" @endif @if($data['PgCcd']==$key)checked="checked"@endif/>
                                <div class="inline-block mr-5">{{ $val }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="pay_method_ccd[]">결제수단 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 item">
                        <div class="checkbox">
                            @foreach($pay_method_ccd as $key => $val)
                                <input type="checkbox" name="pay_method_ccd[]" class="flat" value="{{ $key }}" @if($loop->index == 1) required="required" title="결제수단" @endif @if(in_array($key, explode(',', $data['PayMethodCcds'])) === true)checked="checked"@endif/>
                                <div class="inline-block mr-10">{{ $val }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="delivery_price">배송료 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        <div class="item inline-block">
                            <input type="number" id="delivery_price" name="delivery_price" required="required" class="form-control" title="배송료" value="{{ $data['DeliveryPrice'] }}">
                        </div>
                        <p class="form-control-static ml-30 mr-10 blue">[추가 배송료]</p>
                        <div class="item inline-block">
                            <input type="number" id="delivery_add_price" name="delivery_add_price" required="required" class="form-control" title="추가배송료" value="{{ $data['DeliveryAddPrice'] }}"> 원
                            &nbsp; (도서산간, 제주도일 경우 추가되는 배송료)
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="delivery_free_price">무료배송조건 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        <div class="item inline-block">
                            <input type="number" id="delivery_free_price" name="delivery_free_price" required="required" class="form-control" title="무료배송조건" value="{{ $data['DeliveryFreePrice'] }}">
                        </div>
                        <p class="form-control-static ml-30 mr-10"># 교재 실결제금액 합계가 입력한 금액 이상일 경우 배송료 자동 0원 처리</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="delivery_comp_ccd">택배사 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <select name="delivery_comp_ccd" id="delivery_comp_ccd" required="required" class="form-control" title="택배사">
                            <option value="">선택</option>
                            @foreach($delivery_comp_ccd as $key => $val)
                                <option value="{{ $key }}" @if($key == $data['DeliveryCompCcd']) selected="selected" @endif>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="logo">상단 Logo
                    </label>
                    <div class="col-md-3 item">
                        <input type="file" id="logo" name="logo" class="form-control" title="상단 Logo"/>
                    </div>
                    <div class="col-md-6">
                        @if(empty($data['Logo']) === false)
                        <p class="form-control-static"><a href="{{ $data['Logo'] }}" rel="popup-image">{{ str_last_pos_after($data['Logo'], '/') }}</a> <a href="#none" class="img-delete" data-img-type="logo"><i class="fa fa-times"></i></a></p>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="favicon">파비콘
                    </label>
                    <div class="col-md-3 item">
                        <input type="file" id="favicon" name="favicon" class="form-control" title="파비콘"/>
                    </div>
                    <div class="col-md-6">
                        @if(empty($data['Favicon']) === false)
                        <p class="form-control-static"><a href="#none">{{ str_last_pos_after($data['Favicon'], '/') }}</a> <a href="#none" class="img-delete" data-img-type="favicon"><i class="fa fa-times"></i></a></p>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="cs_tel">고객센터 대표번호
                    </label>
                    <div class="col-md-3 item form-inline">
                        <input type="number" id="cs_tel1" name="cs_tel1" class="form-control" maxlength="4" title="고객센터 대표번호1" value="{{ $data['CsTels'][0] }}" style="width: 90px">
                        - <input type="number" id="cs_tel2" name="cs_tel2" class="form-control" maxlength="4" title="고객센터 대표번호2" value="{{ $data['CsTels'][1] or '' }}" style="width: 90px">
                        - <input type="number" id="cs_tel3" name="cs_tel3" class="form-control" maxlength="4" title="고객센터 대표번호3" value="{{ $data['CsTels'][2] or '' }}" style="width: 90px">
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static"># 0000-0000 형식일경우첫번째, 두번째자리에입력(세번째자리공란처리)</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="head_title">사이트 Title
                    </label>
                    <div class="col-md-5 item">
                        <input type="text" id="head_title" name="head_title" class="form-control" title="사이트 Title" value="{{ $data['HeadTitle'] }}">
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static">ex) 공무원은 willbesgosi.net</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="meta_keyword">메타-keywords
                    </label>
                    <div class="col-md-5 item">
                        <input type="text" id="meta_keyword" name="meta_keyword" class="form-control" title="메타-keywords" value="{{ $data['MetaKeyword'] }}">
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static">ex) 공무원학원, 공무원인강, 공무원동영상</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="meta_desc">메타-description
                    </label>
                    <div class="col-md-5 item">
                        <input type="text" id="meta_desc" name="meta_desc" class="form-control" title="메타-keywords" value="{{ $data['MetaDesc'] }}">
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static">ex) 공무원, 가장 빠른 합격전략 윌비스</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="front_css">CSS정보 (HTML)
                    </label>
                    <div class="col-md-9">
                        <textarea id="front_css" name="front_css" class="form-control" rows="7" title="CSS정보" placeholder="">{!! $data['FrontCss'] !!}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="footer_info">푸터영역 (HTML)
                    </label>
                    <div class="col-md-9">
                        <textarea id="footer_info" name="footer_info" class="form-control" rows="7" title="푸터영역" placeholder="">{!! $data['FooterInfo'] !!}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="">이용약관
                        <br/><button class="btn btn-dark btn-xs mt-5">불러오기</button>
                    </label>
                    <div class="col-md-9">
                        <textarea id="terms_use" name="terms_use" class="form-control" rows="7" title="이용약관" placeholder=""></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="terms_privacy">개인정보취급방침
                        <br/><button class="btn btn-dark btn-xs mt-5">불러오기</button>
                    </label>
                    <div class="col-md-9">
                        <textarea id="terms_privacy" name="terms_privacy" class="form-control" rows="7" title="개인정보취급방침" placeholder=""></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">등록자
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">최종 수정자
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
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
    <!-- cheditor -->
    <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
    <script src="/public/vendor/cheditor/cheditor.js"></script>
    <script src="/public/js/editor_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // editor load
            var $editor_terms_use = new cheditor();
            $editor_terms_use.config.editorHeight = '170px';
            $editor_terms_use.config.editorWidth = '100%';
            $editor_terms_use.inputForm = 'terms_use';
            $editor_terms_use.run();

            var $editor_terms_privacy = new cheditor();
            $editor_terms_privacy.config.editorHeight = '170px';
            $editor_terms_privacy.config.editorWidth = '100%';
            $editor_terms_privacy.inputForm = 'terms_privacy';
            $editor_terms_privacy.run();

            // 사이트 등록/수정
            $regi_form.submit(function() {
                var _url = '{{ site_url('/sys/site/store/code') }}';

                // editor
                getEditorBodyContent($editor_terms_use);
                getEditorBodyContent($editor_terms_privacy);

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/sys/site/index/code') }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 로고, 파비콘 삭제
            $('.img-delete').click(function() {
                if (!confirm('정말로 삭제하시겠습니까?')) {
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'idx' : $regi_form.find('input[name="idx"]').val(),
                    'img_type' : $(this).data('img-type')
                };
                sendAjax('{{ site_url('/sys/site/destroyImg/code') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showError, false, 'POST');
            });

            // 캠퍼스 구분 없음 선택
            $('#none_campus').on('ifChanged', function() {
                $('input[name="campus_ccd[]"]').prop('checked', false).iCheck('update');
            });

            $('#btn_list').click(function() {
                location.replace('{{ site_url('/sys/site/index/code') }}' + getQueryString());
            });
        });
    </script>
@stop
