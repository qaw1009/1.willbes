@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed; top:200px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}

        /*타이머*/
        .newTopDday {clear:both;background:#fff; width:100%; padding:20px 0; font-size:25px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:right; padding-right:10px; padding-top:10px; width:28%;text-align:center;}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}
        .newTopDday ul:after {content:""; display:block; clear:both}

        .evt00 {background:#0a0a0a}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/02/2533_top_bg.jpg) no-repeat center top;}

        .evt_01 {background:#f4f4f4;}
        
        .evt_02 {background:#565334;}
        /* 슬라이드배너 */
        .slide_con {position:relative ; width:980px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; width:46px; height:82px; margin-top:-41px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-100px}
        .slide_con p.rightBtn {right:-100px}
        #slidesImg4 {width:980px; height:790px; margin:0 auto; overflow:hidden}
        #slidesImg4 li {display:inline; float:left}
        #slidesImg4:after {content::""; display:block; clear:both}      

        .evt_03 {background:#f4f4f4;height:1430px;}
        .evt_03 .passLecBuy {width:1120px; margin:0 auto; display: flex; justify-content: space-around;}
        .evt_03 .passLecBuy div {width:50%; margin:0 10px; line-height:30px; font-size:22px; font-weight:bold; color:#fff; background:#000; border-radius:20px; padding:20px 0}      
        .evt_03 input[type="radio"] {height:26px; width:26px; vertical-align:middle}
        .evt_03 input[type="checkbox"] {height:20px; width:20px; vertical-align:middle}
        .evt_03 input:checked + label {border-bottom:1px dashed #fec200; color:#fec200}
        .evt_03 .totalPrice {width:600px; margin:60px auto;}
        .evt_03 .totalPrice a {background:#c00d0d; display:block; font-size:36px; color:#fff; padding:0 30px; background:#000; border-radius:60px; height:80px; line-height:80px; box-shadow:10px rgba(0,0,0,.5);}
        .evt_03 .totalPrice a:hover {background:#0202b0}
        .evt_03 .check {width:800px; margin:0 auto; padding:20px; font-size:16px; color:#000; letter-spacing:-1px;}
        .evt_03 .check a {display:inline-block; padding:10px; color:#fff; background:#000; margin-left:40px; border-radius:20px; font-size:12px}
        .evt_03 .check p {font-size:14px; padding:10px 0 0 20px; line-height:1.4}
        .evt_03 .check input:checked + label {border-bottom:1px dashed #4d0721; color:#4d0721}

        .evt_04 {background:#019bfd;}

        /* 이용안내 */
        .content_guide_wrap{background:#f4f4f4; margin:0;min-width:1210px;}
        .content_guide_box{ position:relative; width:1120px; margin:0 auto; padding:100px 0;}
        .content_guide_box .guide_tit{margin-left:20px;margin-bottom:20px;font-size:25px; font-weight:bold;}
        .content_guide_box dl{ margin:0 20px; word-break:keep-all;border:2px solid #202020;padding:30px;}
        .content_guide_box dt{ margin-bottom:10px;}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-size:15px; font-weight:bold; margin-right:10px;}
        .content_guide_box dt img.btn{padding:2px 0 0 0;}
        .content_guide_box dd{ color:#777; font-size:15px; margin:0 0 20px 5px; line-height:16px;}
        .content_guide_box dd strong{ color:#555;}
        .content_guide_box dd p{ margin-bottom:3px;}
        .content_guide_box dd p.guide_txt_01{margin:5px 0 5px 15px;}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#evt01"><img src="https://static.willbes.net/public/images/promotion/2022/02/2533_sky.png" alt="법경패스"/></a>
            <a href="#evt02"><img src="https://static.willbes.net/public/images/promotion/2022/02/2533_sky2.png" alt="30% 최대할인"/></a>
            <a href="#evt02"><img src="https://static.willbes.net/public/images/promotion/2022/02/2533_sky3.png" alt="할인쿠폰 받기"/></a>
        </div>

         <!-- 타이머 -->
         <div id="newTopDday" class="newTopDday"  data-aos="fade-down">
            <div>
                <ul>
                    <li>
                    윌비스 신광은 경찰 2022대비<br>법학경채 PASS
                    </li>
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
                    <li>
                        남았습니다.
                    </li>
                </ul>
            </div>
        </div>  

        <div class="evtCtnsBox evt00" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>

        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2533_top.jpg"  alt="법학 경채패스" />
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2533_01.jpg"  alt="경찰 법학경채란" />
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2533_02.jpg"  alt="교수진" />
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/02/2533_02_s1.jpg" alt="신광은" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/02/2533_02_s2.jpg" alt="장정훈" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/02/2533_02_s3.jpg" alt="김동진" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/02/2533_02_s4.jpg" alt="이국령" /></li>               
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_p_prev.png" alt="left" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_p_next.png" alt="right" /></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt_03" id="evt01" data-aos="fade-up">        
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2533_03.jpg"  alt="최저가 pass" />             
            </div>
            <div class="passLecBuy">   
                <div>                    
                    <input type="radio" id="y_pkg0" name="y_pkg" value="191316" data-sale-price="860000"/>                
                    <label for="y_pkg0">신광은경찰 법학경채 PASS </label>
                </div>                
            </div>
            <div class="check">
                <input type="checkbox" id="is_chk1" name="is_chk" value="Y"/>
                <label for="is_chk1">페이지 하단 신광은 경찰 법학경채 PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                <a href="#info">이용안내확인하기 ↓</a>
                <p>
                    ※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신이 불가합니다.<br>
                    ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.                
                </p>
            </div>
            <div class="evtCtnsBox wrap mt40" id="transfer">           
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2533_03s.jpg"  alt="재수강, 환승">
                <a href="https://www.willbes.net/classroom/qna/index" target="_blank" title="재수강 쿠폰받기" style="position: absolute;left: 42.19%;top: 55.03%;width: 11.88%;height: 18.34%;z-index: 2;"></a>
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1139" target="_blank" title="환승 쿠폰받기" style="position: absolute;left: 75.45%;top: 55.03%;width: 11.88%;height: 18.34%;z-index: 2;"></a>
            </div>
            <div class="totalPrice NSK-Black">
                <a href="javascript:void(0);" onclick="termsCheck('is_chk1', 'evt01');">신청하기 ></a>
            </div>  
        </div>

        <div class="evtCtnsBox evt_04" id="evt02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2533_04.jpg"  alt="쿠폰 및 이미지 다운받기" />               
                <a href="javascript:void(0);" onclick="giveCheck();" title="할인쿠폰 받기" style="position: absolute;left: 28.69%;top: 59.01%;width: 42.38%;height: 6.2%;z-index: 2;"></a>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운받기" style="position: absolute;left: 28.69%;top: 81.99%;width: 42.38%;height: 6.2%;z-index: 2;"></a>
            </div>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'Y'))
        @endif

        <div class="content_guide_wrap" data-aos="fade-up" id="info">
            <div class="content_guide_box">
                <p class="guide_tit">윌비스신광은 법학경채-PASS 이용안내</p>
                <dl>

                    <dt>
                        <h3>신광은 법학경채 PASS</h3>
                    </dt>
                    <dd>
                        <p>1. 본 상품은 구매일로부터 2022년 9월 3일 까지만 들을수 있는 기간제 PASS입니다. </p>
                        <p>2. 패스 강좌는 결제 완료되는 즉시 수강이 시작됩니다.<br>
                            - 2022년 대비 형소법, 형법 , 경찰학, 민법총칙, 헌법  강좌<br><br>
                            *형소법 : 신광은 교수님<br>
                            *형법 : 신광은교수님 <br>
                            *경찰학개론: 장정훈 교수님<br>
                            *헌법 :  이국령 교수님<br>
                            *민법총칙 : 김동진 교수님
                        </p><br>
                        <p>3. 선택한 신광은 법학경채PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</p>
                        <p>4. 신광은 법학경채 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</p>
                        <p>5. 강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</p>                                               
                    </dd>

                    <dt>
                        <h3>교재 및 포인트</h3>
                    </dt>
                    <dd>
                        <p>1. 신광은 법학경채 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</p>
                     
                    </dd>

                    <dt>
                        <h3>환불</h3>
                    </dt>
                    <dd>
                        <p>1 결제 후 7일 이내 3강 이하 수강시에만 전액 환불 가능합니다.</p>
                        <p>2. 결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</p>
                        <p>3. 강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</p>
                        <p>4. 고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여
                            사용일 수만큼 차감 후 환불됩니다.<br> (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)
                        </p>
                        <p>5. 포인트를 사용하였을 경우 사용한 포인트만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다.<br>
                            (포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)
                        </p>
                    </dd>                   

                </dl>
            </div>
        </div>
                
    </div>
    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $(document).ready(function(){
        AOS.init();
      });
    </script>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        /* 팝업창 */
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params["page"]) === false && empty($arr_promotion_params["cert"]) === false)
                var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
                window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

        /*쿠폰발급 */
         function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params['give_type']) === false && empty($arr_promotion_params['give_idx']) === false)
                var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params["comment_chk_yn"]}}';
                ajaxSubmit($regi_form, _check_url, function (ret) {
                    if (ret.ret_cd) {
                        alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    }
                }, showValidateError, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

         /*약관동의*/
         function termsCheck(terms_id,ele_id){
            if($("#" + terms_id).is(":checked") === false){
                $("#" + terms_id).focus();
                alert('이용안내에 동의하셔야 합니다.');
                return;
            }
            goCartNDirectPay(ele_id, 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');
        }


        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('@if(empty($arr_promotion_params['edate'])===false) {{$arr_promotion_params['edate']}} @endif');
        });

        /*슬라이드*/
        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });                                    
        });

        
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop
