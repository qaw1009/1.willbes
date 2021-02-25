@extends('willbes.m.layouts.master')

@section('page_title', '교수진소개')

@section('add_title', ' > ' . element('subject_name', $arr_input, '') . ' > ' . $data['ProfNickName'] . ' ' . $data['AppellationCcdName'])

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <!-- PageTitle -->
    @include('willbes.m.layouts.page_title')

    <form id="url_form" name="url_form" method="GET">
        @foreach($arr_input as $key => $val)
            <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
        @endforeach
    </form>

    {{-- 교수정보 --}}
    <div class="profAreaView">
        <div class="profImg"><img src="{{ $data['ProfReferData']['prof_detail_img'] or '' }}" alt="{{ $data['ProfNickName'] }}"></div>
        <div class="profCopy NSK">
            <strong class="NSK-Black"><span>{{ element('subject_name', $arr_input, '') }}</span> {{ $data['ProfNickName'] }}</strong> {{ $data['AppellationCcdName'] }}
            <p>{!! $data['ProfSlogan'] !!}</p>
        </div>
        <div class="profMenu">
            <ul>
                <li><a href="#none" onclick="openWin('LayerProfile');">프로필</a><li>
                @if($__cfg['SiteGroupCode'] != '1011')
                    {{-- 사이트그룹코드가 임용 사이트가 아닐 경우만 노출 --}}
                    @if(empty($data['ProfReferData']['sample_url']) === false)
                        <li><a href="#none" onclick="fnMobile('{{ 'https:'.front_app_url('/player/getMobileProf/', 'www').'?idx='.sess_data('mem_idx').'&id='.sess_data('mem_id').'&p='.$prof_idx.'&v='.$data['ProfReferData']['sample_url_type'] }}', '{{ config_item('starplayer_license') }}');">맛보기</a><li>
                    @endif
                    @if(empty($data['ProfReferData']['homep_url']) === false)
                        <li><a href="{{ $data['ProfReferData']['homep_url'] }}" target="_blank">홈페이지</a><li>
                    @endif
                    @if(empty($data['ProfReferData']['cafe_url']) === false)
                        <li><a href="{{ $data['ProfReferData']['cafe_url'] }}" target="_blank">카페</a><li>
                    @endif
                    @if(empty($data['ProfReferData']['blog_url']) === false)
                        <li><a href="{{ $data['ProfReferData']['blog_url'] }}" target="_blank">블로그</a><li>
                    @endif
                @endif
                <li><a href="#none" onclick="openWin('LayerCurriculum');">커리큘럼</a><li>
            </ul>
        </div>
    </div>

    {{-- 강좌 탭 --}}
    <div class="lineTabs lecListTabs c_both">
        @php $arr_tab_width_class = ['1' => 'one', '2' => 'two', '3' => 'three', '4' => 'four', '5' => 'five']; @endphp
        <div class="profLecTab">
            <ul class="tabWrap {{ array_get($arr_tab_width_class, count($tab_list), 'three') }}">
                @foreach($tab_list as $tab_id => $tab_name)
                    <li><a href="#none" onclick="goTabUrl('tab', '{{ $tab_id }}');" class="{{ substr($arr_input['tab'], 0, 2) == substr($tab_id, 0, 2) ? 'on' : '' }}">{{ $tab_name }}</a><span class="row-line">|</span></li>
                @endforeach
            </ul>
        </div>

        <div class="tabBox lineBox lecListBox">
            <div id="{{ $arr_input['tab'] }}" class="tabContent">
                {{-- 탭 내용 --}}
                @include('willbes.m.site.professor.tab_' . $tab_method . '_partial')
            </div>
        </div>
    </div>

    {{-- 프로필 팝업 --}}
    <div id="LayerProfile" class="willbes-Layer-Black">
        <div class="willbes-Layer-PassBox willbes-Layer-ProfileBox fix">
            <a class="closeBtn" href="#none" onclick="closeWin('LayerProfile')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">{{ $data['ProfNickName'] }}</span> {{ $data['AppellationCcdName'] }} 프로필</div>
            <div class="Layer-Cont">
                <div class="Layer-SubTit NG">· 약력</div>
                <div class="Layer-Txt tx-gray">
                    {!! $data['wProfProfile'] !!}
                </div>
                <div class="Layer-SubTit NG">· 저서</div>
                <div class="Layer-Txt tx-gray">
                    {!! $data['wBookContent'] !!}
                </div>
            </div>
        </div>
        <div class="dim" onclick="closeWin('LayerProfile')"></div>
    </div>
    <!--willbes-Layer-ProfileBox // -->

    {{-- 커리큘럼 팝업--}}
    <div id="LayerCurriculum" class="willbes-Layer-Black">
        <div class="willbes-Layer-PassBox willbes-Layer-CurriBox fix">
            <a class="closeBtn" href="#none" onclick="closeWin('LayerCurriculum')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">{{ $data['ProfNickName'] }}</span> {{ $data['AppellationCcdName'] }} 커리큘럼</div>
            <div class="Layer-Cont">
                {!! $data['ProfCurriculum'] !!}
            </div>
        </div>
        <div class="dim" onclick="closeWin('LayerCurriculum')"></div>
    </div>
    <!-- // willbes-Layer-CurriBox -->

    <!-- Topbtn -->
    @include('willbes.m.layouts.topbtn')
</div>
<!-- End Container -->
<script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
<script src="/public/js/willbes/product_util.js"></script>
<script type="text/javascript">
    var $regi_form = $('#regi_form');
    var $regi_off_form = $('#regi_off_form');
    var $regi_visit_form = $('#regi_visit_form');

    $(document).ready(function() {
        {{-- 온라인 단강좌 장바구니, 바로결제 버튼 클릭--}}
        $regi_form.on('click', 'a[name="btn_cart"], a[name="btn_direct_pay"]', function() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            var $is_direct_pay = $(this).data('direct-pay');
            addCartNDirectPay($regi_form, $is_direct_pay, 'Y', 'on');
        });

        {{-- 학원단과반 장바구니, 바로결제 버튼 클릭 --}}
        $regi_off_form.on('click', 'a[name="btn_off_cart"], a[name="btn_off_direct_pay"]', function() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            var $prod_code = $(this).data('prod-code');
            $regi_off_form.find('input:checkbox[name="prod_code[]"]').prop('checked', false);
            $regi_off_form.find('input:checkbox[name="prod_code[]"]:input[data-prod-code="'+$prod_code+'"]').prop('checked', true);
            var $is_direct_pay = $(this).data('direct-pay');
            addCartNDirectPay($regi_off_form, $is_direct_pay, 'Y', 'off');
        });

        {{-- 학원단과반 방문결제 버튼 클릭 --}}
        $regi_off_form.on('click', '.btn-off-visit-pay', function() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            var prod_code = $(this).data('prod-code');
            if (prod_code === undefined) {
                alert('상품을 선택해 주세요.');
                return;
            }
            eachProductCart(prod_code, $(this), 'layer');
        });

        {{-- 학원단과반 방문결제 장바구니 담기 --}}
        function eachProductCart(val, _this, act_type) {
            var url = '{{ front_url('/cart/store', true) }}';
            var data = $.extend(arrToJson($regi_visit_form.find('input[type="hidden"]').serializeArray()), {
                'prod_code[]' : val
            });
            sendAjax(url, data, function(ret) {
                if(ret.ret_cd) {
                    if(act_type === 'layer') {
                        openWin('buy_off_visit_continue_layer');
                    } else {
                        location.href = '{{ front_url('/offVisitLecture/index', true) }}';
                    }
                }
            }, function(ret){
                alert(ret.ret_msg);
            }, false, 'POST');
        }

        {{-- 학원단과반 방문결제 이동 버튼 클릭 --}}
        $('#buy_off_visit_continue_layer').on('click', '.answerBox_block', function() {
            location.href = '{{ front_url('/offVisitLecture/index', true) }}';
        });

        {{-- 학원단과반 계속구매 버튼 클릭 --}}
        $('#buy_off_visit_continue_layer').on('click', '.waitBox_block', function() {
            $('#buy_off_visit_continue_layer').css('display', 'none');
        });

        {{-- 무료강좌 바로결제 버튼 클릭 --}}
        $regi_form.on('click', 'a[name="btn_free_direct_pay"]', function() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            var $is_redirect = $(this).data('is-redirect');
            var $layer_type = $regi_form.find('.chk_books:checked').length < 1 ? 'pocketBox1' : 'pocketBox2';

            // 무료강좌 지급
            if (applyFreeLecture($regi_form) === true) {
                if ($is_redirect === 'N') {
                    openWin($layer_type);
                } else {
                    // 교재상품 바로결제
                    if ($regi_form.find('.chk_books:checked').length > 0) {
                        $regi_form.find('.chk_products').prop('checked', false);    // 무료강좌상품 체크해제
                        addCartNDirectPay($regi_form, 'Y', 'Y', 'on');
                    } else {
                        goClassRoom();
                    }
                }
            }
        });
    });

    // 메인 탭 클릭
    function goTabUrl(key, val) {
        removeFormInput('#url_form', 'cate_code,subject_idx,subject_name,tab');
        goUrl(key, val);
    }

    // 온라인강좌 상세보기
    function goLectureShow(prod_code, cate_code, pattern) {
        var $free_lec_passwd = $regi_form.find('input[id="free_lec_passwd_' + prod_code + '"]');
        if ($free_lec_passwd.length > 0) {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            if ($free_lec_passwd.data('chk') !== "p" && $free_lec_passwd.val() === '') {
                alert('보강동영상 비밀번호를 입력해 주세요.');
                $free_lec_passwd.focus();
                return;
            }

            var url = '{{ front_url('/lecture/checkFreeLecPasswd/prod-code/', false, true) }}' + prod_code;
            var data = $.extend(arrToJson($regi_form.find('input[type="hidden"]').serializeArray()), {
                'free_lec_passwd': $free_lec_passwd.val(),
                'free_lec_check' : $free_lec_passwd.data('chk')
            });
            sendAjax(url, data, function (ret) {
                if (ret.ret_cd) {
                    location.href = '{{ front_url('/lecture/show', false, true) }}/cate/' + cate_code + '/pattern/' + pattern + '/prod-code/' + prod_code+'#tab03';
                }
            }, showAlertError, false, 'POST');
        } else {
            location.href = '{{ front_url('/lecture/show', false, true) }}/cate/' + cate_code + '/pattern/' + pattern + '/prod-code/' + prod_code;
        }
    }

    // 학원단과반 상세보기
    function goOffLectureShow(prod_code) {
        location.href = '{{ front_url('/offLecture/show/prod-code/', true) }}' + prod_code;
    }

    // 학원종합반 상세보기
    function goOffPackShow(prod_code) {
        location.href = '{{ front_url('/offPackage/show/prod-code/', true) }}' + prod_code;
    }

    // 무료강좌 신청
    function applyFreeLecture($regi_form) {
        var $result = false;
        var $confirm_msg = $regi_form.find('.chk_books:checked').length < 1 ? '해당 강좌를 신청하시겠습니까?' : '해당 강좌 및 교재를 신청하시겠습니까?';

        if($regi_form.find('.chk_products:checked').length < 1) {
            alert('강좌를 선택해 주세요.');
            return false;
        }

        if (confirm($confirm_msg)) {
            var $input_prod_code = {};
            $regi_form.find('.chk_products:checked').each(function (idx) {
                $input_prod_code[idx] = $(this).val();
            });

            var url = '{{ front_url('/order/free', false, true) }}';
            var data = $.extend(arrToJson($regi_form.find('input[type="hidden"]').serializeArray()), {
                'prod_code': JSON.stringify($input_prod_code)
            });
            sendAjax(url, data, function (ret) {
                if (ret.ret_cd) {
                    $result = true;
                }
            }, showAlertError, false, 'POST');
        }
        return $result;
    }

    // 내 강의실 페이지 이동
    function goClassRoom() {
        location.href = '{{ front_app_url('/classroom/on/list/ongoing', 'www', false, true) }}';
    }
</script>
@stop