@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .dday {font-size:24px !important; padding:10px; background:#f5f5f5; color:#000; text-align:left; letter-spacing:-1px}
    .dday span {color:#3a99f0; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#000; font-size:14px !important;}

    .evt04 .boxYoutube {margin:40px auto}
    .evt04 .tabMenu {margin-right:-10px; margin-bottom:20px}
    .evt04 .tabMenu li {display:inline; float:left; width:33.33333%; }
    .evt04 .tabMenu a {display:block; opacity: 0.5; margin-right:10px; background:#000;}
    .evt04 .tabMenu a.active {box-shadow:0 10px 10px rgba(0,0,0,.2); opacity: 1;}
    .evt04 .tabMenu a img {width:100%}
    .evt04 .tabMenu:after {content:''; display:block; clear:both}

    .video-container {position:relative; padding-bottom:56.25%; padding-top:30px; height:0; overflow: hidden;}
    .video-container iframe,
    .video-container object,
    .video-container embed {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}


    .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding-top:10px;z-index:100;}
    .btnbuy {max-width:720px; margin:0 auto}
    .btnbuy a {display:inline-block; width:33%; max-width:700px; margin:0 auto 5px; font-size:1rem; background:#000; color:#fff; padding:15px 0; text-align:center; border-radius:10px; line-height:1.4}
    .btnbuy a span {font-size:1.2rem;}
    .btnbuy a:hover {background:#3a99f0;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    .infoCheck {width:100%; max-width:720px; margin:10px auto; font-size:12px;}
    .infoCheck label {margin-right:30px; cursor: pointer; }
    .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
    .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; font-weight:bold; color:#0099ff} 
    .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
    .infoCheck a:hover {background:#0099ff;}

    .evtInfo {padding:40px 20px; background:#333; color:#fff; font-size:16px;}
    .guide_box {text-align:left; line-height:1.4}
    .guide_box li {list-style: decimal; margin-left:20px; font-size:14px; margin-bottom:10px; color:#ccc}
    .guide_box h2 {font-size:24px; margin-bottom:30px}
    .guide_box dt {margin:20px 0 10px}
    .guide_box dd {margin-bottom:5px}
    
    .guide_box .only {color:#E80000;vertical-align:top;}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        .dday {font-size:18px !important;} 
        .dday a {padding:5px 10px;}
        .evt06 .slide_con {margin:0 10px; padding-bottom:40px}  
        .content_guide_wrap .guide_tit{font-size:20px; margin-bottom:30px}
        .content_guide_wrap .tabs li a {font-size:14px !important; letter-spacing:-1px}
        .btnbuy a {width:31%;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       
        .dday {font-size:18px !important;} 
        .dday a {padding:5px 10px;}
        .btnbuy a {width:31%;}
    }

    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        .content_guide_wrap .tabs li a br {display:none}
    }
    </style>

<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
</form>

<div id="Container" class="Container NSK c_both"> 
    <div class="evtCtnsBox dday NSK-Thin">
        <strong class="NSK-Black">2022 몰입 PASS 마감 <span id="ddayCountText"></span> </strong>
    </div>

    <div class="evtCtnsBox evt00">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div> 

    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2021/04/2174m_top.jpg" alt="몰입 패스" >
    </div> 

    <div class="evtCtnsBox evt01">        
        <img src="https://static.willbes.net/public/images/promotion/2021/04/2174m_01.jpg" alt="몰입해야 하는 이유" >
    </div>
    
    <div class="evtCtnsBox evt02">        
        <img src="https://static.willbes.net/public/images/promotion/2021/04/2174m_02.jpg" alt="교수진" >
    </div>
    
    <div class="evtCtnsBox evt03">        
        <img src="https://static.willbes.net/public/images/promotion/2021/04/2174m_03.jpg" alt="무제한 수강" >
    </div>
    
    <div class="evtCtnsBox evt04">    

        <img src="https://static.willbes.net/public/images/promotion/2021/04/2174m_04.jpg" alt="커리큘럼" >
        <div class="video-container-box">
            <div id="tab1" class="youtubeCts video-container">
                <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>

            <div id="tab2" class="youtubeCts video-container">
                <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>

            <div id="tab3" class="youtubeCts video-container">
                <iframe src="https://www.youtube.com/embed/KkESWQLjtq8?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>     

        <div class="boxYoutube">
            <ul class="tabMenu">
                <li>
                    <a href="#tab1" class="active">
                        <img src="https://static.willbes.net/public/images/promotion/2021/02/2078_03_t01.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#tab2">
                        <img src="https://static.willbes.net/public/images/promotion/2021/02/2078_03_t02.jpg" alt="" />
                    </a>
                </li>                    
                <li>
                    <a href="#tab3">
                        <img src="https://static.willbes.net/public/images/promotion/2021/02/2078_03_t03.jpg" alt="" />
                    </a>
                </li>
            </ul>
        </div>

    </div>
    
    <div class="evtCtnsBox evt05">        
        <img src="https://static.willbes.net/public/images/promotion/2021/04/2174m_05.jpg" alt="쿠폰지급" >
    </div>
    
    <div class="evtCtnsBox evt06">        
        <img src="https://static.willbes.net/public/images/promotion/2021/04/2174m_06.jpg" alt="신광은 몰입 t패스" >
    </div>    

    <div class="evtCtnsBox evt07">        
        <img src="https://static.willbes.net/public/images/promotion/2021/04/2174m_07.jpg" alt="장정훈 몰입 t패스" >
    </div>
    
    <div class="evtCtnsBox evt08">        
        <img src="https://static.willbes.net/public/images/promotion/2021/04/2174m_08.jpg" alt="김원욱 몰입 t패스" >
    </div>

    <div class="evtCtnsBox evt09">        
        <img src="https://static.willbes.net/public/images/promotion/2021/04/2174m_09.jpg" alt="이벤트" >
        <a href="javascript:void(0);" title="할인쿠폰 받기" onclick="giveCheck();" style="position: absolute; left: 24.19%; top: 55.11%; width: 51.75%; height: 4.75%; z-index: 2;"></a>
        <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif"  title="몰입 티패스 이미지 다운받기" style="position: absolute;left: 8.19%;top: 82.11%;width: 47.75%;height: 3.75%; z-index: 2;"></a>
        <a href="http://cafe.daum.net/policeacademy" target="_blank" title="다음카페 경시모" style="position: absolute;left: 16.19%;top: 94.11%;width: 20.75%;height: 4.75%; z-index: 2;"></a>
        <a href="https://cafe.naver.com/polstudy" target="_blank" title="네이버 경꿈사" style="position: absolute;left: 40.19%;top: 94.11%;width: 20.75%;height: 4.75%; z-index: 2;"></a>
        <a href="https://cafe.naver.com/kts9719" target="_blank" title="네이버 닥공사" style="position: absolute;left: 64.19%;top: 94.11%;width: 20.75%;height: 4.75%; z-index: 2;"></a>
    </div>

    {{--홍보url--}}
    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
        @include('willbes.m.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
    @endif

    <div class="evtCtnsBox evtInfo NGR" id="infoText"> 
        <div class="guide_box" >
            <h2 class="NSK-Black">몰입 T패스 이용안내</h2>
            <dl>
                <dt>▶ 몰입 T패스</dt>
                <dd>
                    <ol>
                        <li>구매일 기준 12개월 동안 수강 가능합니다. (365일)</li>
                        <li>몰입T패스 강좌는 결제가 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                        <li>선택한 몰입T패스 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다.</li>
                        <li>상품기간 종료 시 수강 중이던 강좌가 모두 종료됩니다.</li>
                        <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                    </ol>
                </dd>

                <dt>▶ 상품구성</dt>
                <dd>
                    <ol>
                        <li>신광은 형사법 몰입T패스: 신광은 교수님의 형사법(개편) 전 강좌를 무제한으로 수강할 수 있습니다.</li>
                        <li>장정훈 경찰학 몰입T패스: 장정훈 교수님의 경찰학(개편) 전 강좌를 무제한으로 수강할 수 있습니다.</li>
                        <li>김원욱 헌법 몰입T패스: 김원욱 교수님의 헌법(개편) 전 강좌를 무제한으로 수강할 수 있습니다.</li>
                    </ol>
                </dd>

                <dt>▶ 교재 </dt>
                <dd>
                    <ol>
                        <li>몰입T패스 수강에 필요한 교재는 별도로 구매 하셔야 하며, 각 강좌 별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>    
                    </ol>
                </dd>

                <dt>▶ 수강 안내</dt>
                <dd>
                    <ol>
                        <li>로그인 후 [내강의실] → [무한PASS존]으로 접속합니다.</li>
                        <li>구매한 PASS 상품 선택 후 [강좌추가]를 클릭, 원하는 강좌를 등록한 후 수강할 수 있습니다.</li>
                        <li>강의는 순차 업로드 예정이며 업로드 일정은 강의 진행일정에 따라 변경될 수 있습니다.</li>
                        <li>몰입T패스는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                        <li>몰입T패스 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다. 총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대</li>
                        <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다.  ([내강의실] → [무한PASS존]에서 등록기기정보 확인) 추후 초기화가 필요할 시 유선(온라인 고객센터)이나 게시판을 통해 요청이 가능하고, 수강 기간 동안 3회 신청이 가능합니다.</li>
                        <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                    </ol>
                </dd>

                <dt>▶ 환불정책 </dt>
                <dd>
                    <ol>
                        <li>전액환불 : 결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                        <li>부분환불 : 결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분 만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                        <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                        <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, T-PASS 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다. (온라인 모의고사 등 이용 시에도 차감)</li>
                        <li>교재 포인트를 사용했을 경우 사용한 포인트만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다. (교재 포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
                    </ol>
                </dd>

                <dt>▶ 유의사항</dt>
                <dd>
                    <ol>
                        <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 부탁드립니다.</li>
                        <li>몰입T패스 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                        <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                        <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사는 제공되지 않습니다.</li>
                        <li>온,오프라인 동시에 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공 될 수 있습니다.</li>
                        <li>PASS관련 발급된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수될 수 있으며, 동일한 혜택이 적용되지 않을 수 있습니다.</li>
                    </ol>
                </dd>
                <br>

                <dt>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</dt>
                
            </dl>
        </div>
    </div>

</div>

<!-- End Container -->

<div class="btnbuyBox">
    <div class="btnbuy NSK-Black">     
        <a href="javascript:goLecture('181675');">
        신광은 몰입 <br>T패스
        </a>    
        <a href="javascript:goLecture('181676');">
        장정훈 몰입 <br>T패스
        </a>    
        <a href="javascript:goLecture('181677');">
        김원욱 몰입 <br>T패스
        </a>   
    </div>
    <div id="pass" class="infoCheck">
        <input type="checkbox" name="y_pkg" value="162748" style="display: none;" checked/>
        <input type="checkbox" id="is_chk" name="is_chk"><label for="is_chk">페이지 하단 몰입 T패스 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
        <a href="#infoText">이용안내 확인하기 ↓</a>
    </div>
</div>


<script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
<script type="text/javascript"> 

        //유튜브
        var tab1_url = "https://www.youtube.com/embed/40LDBoOoD_k?rel=0&modestbranding=1&showinfo=0";
        var tab2_url = "https://www.youtube.com/embed/VHTrL5w2IF4?rel=0&modestbranding=1&showinfo=0";        
        var tab3_url = "https://www.youtube.com/embed/KkESWQLjtq8?rel=0&modestbranding=1&showinfo=0";

        $(function() {
        $(".youtubeCts").hide(); 
        $(".youtubeCts:first").show();
        $(".tabMenu li a").click(function(){ 
            var activeTab = $(this).attr("href"); 
            var html_str = "";
            if(activeTab == "#tab1"){
                html_str = "<iframe src='"+tab1_url+"' frameborder='0' allowfullscreen></iframe>";
            }else if(activeTab == "#tab2"){
                html_str = "<iframe src='"+tab2_url+"' frameborder='0' allowfullscreen></iframe>";
            }else if(activeTab == "#tab3"){
                html_str = "<iframe src='"+tab3_url+"' frameborder='0' allowfullscreen></iframe>";                   
            }
            $(".tabMenu a").removeClass("active"); 
            $(this).addClass("active"); 
            $(".youtubeCts").hide(); 
            $(".youtubeCts").html(''); 
            $(activeTab).html(html_str);
            $(activeTab).fadeIn(); 
            return false; 
            });
        });	

    /*디데이카운트다운*/
    $(document).ready(function() {
        dDayCountDown('{{$arr_promotion_params['edate']}}', '{{$arr_promotion_params['etime'] or "00:00"}}', 'txt');
    });

    function goCartNDirectPay(ele_id, field_name, cart_type, learn_pattern, is_direct_pay)
    {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

        var $regi_form = $('#' + ele_id);
        var $prod_code = $regi_form.find('input[name="' + field_name + '"]:checked');   // 상품코드
        var $is_chk = $regi_form.find('input[name="is_chk"]');  // 동의여부
        var params;

        if ($is_chk.length > 0) {
            if ($is_chk.is(':checked') === false) {
                alert('이용안내에 동의하셔야 합니다.');
                return;
            }
        }

        if ($prod_code.length < 1) {
            alert('강좌를 선택해 주세요.');
            return;
        }

        {{-- 장바구니 저장 기본 파라미터 --}}
            params = [
            { 'name' : '{{ csrf_token_name() }}', 'value' : '{{ csrf_token() }}' },
            { 'name' : '_method', 'value' : 'POST' },
            { 'name' : 'cart_type', 'value' : cart_type },
            { 'name' : 'learn_pattern', 'value' : learn_pattern },
            { 'name' : 'is_direct_pay', 'value' : is_direct_pay }
        ];

        {{-- 선택된 상품코드 파라미터 --}}
        $prod_code.each(function() {
            params.push({ 'name' : 'prod_code[]', 'value' : $(this).val() + ':613001:' + $(this).val() });
        });

        {{-- 장바구니 저장 URL로 전송 --}}
        formCreateSubmit('{{ front_url('/cart/store') }}', params, 'POST');
    }

    /* 수강신청*/

    {{-- 수강신청 이동 --}}
    function goLecture(prod_code) {
        if ($('#is_chk').is(':checked') === false) {
            alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
            return;
        }
        location.href = '{{ front_url('/periodPackage/show/cate/3035/pack/648001/prod-code/') }}' + prod_code;
    }
    function goLecture2(code){
        if ($('#is_chk').is(':checked') === false) {
            alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
            return;
        }
            var url = '{{ site_url('/package/show/cate/3035/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        $regi_form = $('#regi_form');

        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params) === false)
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params["comment_chk_yn"]}}';
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('몰입T패스 할인쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
                }
            }, showValidateError, null, false, 'alert');
            @else
            alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop