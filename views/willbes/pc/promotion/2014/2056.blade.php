@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')  
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/02/2056_top_bg.jpg) no-repeat center top}

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/02/2056_01_bg.jpg) no-repeat center top}

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/02/2056_02_bg.jpg) no-repeat center top}
   
        .evt03 {background:#fff;}  

        /*타이머*/
        .newTopDday {background:#f5f5f5; width:100%; padding:20px 0}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; height:60px; line-height:60px;
            font-weight:600; color:#000; font-size:22px;}
        .newTopDday ul li img {width:40px; height:56px}
        .newTopDday ul li:first-child {padding-right:10px;}
        .newTopDday ul li:last-child {padding-left:25px; font-size:18px; }
        .newTopDday ul li:last-child a {display:inline-block; font-size:14px; margin-top:5px; padding:4px 20px; background:#effe01; border:1px solid #777e09; color:#000; 
            text-align:center; border-radius:20px; line-height:1}
        .newTopDday ul li:last-child a:hover {background:#333; color:#fff}
        .newTopDday ul:after {content:""; display:block; clear:both}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <!-- 타이머 -->
        <div class="newTopDday">
            <div id="ddaytime">
                <ul>
                    <li>사전예약 혜택 마감까지</li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>남았습니다.</li>
                    <li>
                        파격혜택, 지금 확인하세요!
                        <a href="#apply" target="_self">신청하기 &gt;</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2056_top.jpg" alt="사전예약 스타트" >
        </div>

        <div class="evtCtnsBox evt01" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2056_01.jpg" alt="스페셜 리스트4인" usemap="#Map2056_apply" border="0" >
            <map name="Map2056_apply" id="Map2056_apply">
                <area shape="rect" coords="189,704,343,740" href="https://njob.willbes.net/promotion/index/cate/3114/code/2035" target="_blank" />
                <area shape="rect" coords="385,703,537,740" href="https://njob.willbes.net/promotion/index/cate/3114/code/2024" target="_blank" />
                <area shape="rect" coords="599,704,748,740" href="https://njob.willbes.net/promotion/index/cate/3114/code/2006" target="_blank" />
                <area shape="rect" coords="778,703,929,740" href="javascript:alert('COMING SOON! 2월 3일 공개됩니다.')"  />
            </map>        
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2056_02.jpg" alt="이키머스 핵심키워드" >               
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2056_03.jpg" alt="소문내기 이벤트" usemap="#Map2056_sns" border="0" >
            <map name="Map2056_sns" id="Map2056_sns">
                <area shape="rect" coords="252,859,334,944" href="https://section.blog.naver.com" target="_blank">
                <area shape="rect" coords="356,859,443,944" href="https://www.instagram.com/" target="_blank">
                <area shape="rect" coords="463,859,551,945" href="https://www.facebook.com/" target="_blank">
                <area shape="rect" coords="572,858,657,945" href="https://story.kakao.com/" target="_blank">
                <area shape="rect" coords="679,858,766,946" href="https://band.us/" target="_blank">
                <area shape="rect" coords="784,858,874,949" href="https://twitter.com/" target="_blank">
            </map>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function() {
            var collaboslides = $(".review ul").bxSlider({
                mode:'fade', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:750,
                pause:3000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1, 
                moveSlides:1,
            });
        });

        function fn_submit() {
            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            if ($regi_form_register.find('input[name="register_chk[]"]:checked').length == 0) {
                alert('교수님을 선택해주세요.');
                return;
            }

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }

            {{-- register_chk_name 필요한것 이외 disabled 처리. (신청리스트명 문자발송 치환을 위한 정보) --}}
            var reg_chk_val = $regi_form_register.find('input[name="register_chk[]"]:checked').val();
            $regi_form_register.find('input[name="register_chk_name[]"]').each(function(i) {
                if($(this).data('register-chk') == reg_chk_val) {
                    $(this).attr('disabled', false);
                } else {
                    $(this).attr('disabled', true);
                }
            });

            if (!confirm('저장하시겠습니까?')) { return true; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(getApplyMsg(ret.ret_msg));
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }

        {{-- 해당 프로모션 종속 결과 메세지 --}}
        function getApplyMsg(ret_msg) {
            var apply_msg = '';
            var arr_apply_msg = [
                ['신청 되었습니다.','사전예약이 완료되었습니다.'],
            ];
            for (var i = 0; i < arr_apply_msg.length; i++) {
                if(arr_apply_msg[i][0] == ret_msg) {
                    apply_msg = arr_apply_msg[i][1];
                }
            }
            if(apply_msg == '') apply_msg = ret_msg;
            return apply_msg;
        }

        {{-- 숫자만 유효성 체크 --}}
        function onlyNumberCheck(object){
            object.value = object.value.replace(/[^0-9.]/g, "");
            if (object.value.length > object.maxLength) {
                object.value = object.value.slice(0, object.maxLength);
            }
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop