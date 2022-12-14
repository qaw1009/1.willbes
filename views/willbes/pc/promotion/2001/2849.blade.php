@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;
            font-size:14px;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
        .sky {position:fixed; width:120px; top:200px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/12/2849_top_bg.jpg) no-repeat center top;}   
        .evt_01 {background:url(https://static.willbes.net/public/images/promotion/2022/12/2849_01_bg.jpg) no-repeat center top;}
        .evt_02 {background:#3534b3 url(https://static.willbes.net/public/images/promotion/2022/12/2849_02_bg.jpg) no-repeat center top; position:relative; padding-bottom: 200px;}
        .evt_02 .bx-wrapper .bx-pager {color:#fff;}
        /* 슬라이드배너 */
        .evt_02 .slide_con {position:relative ; width:669px; margin:0 auto}
        .evt_02 .slide_con p{position: absolute; top:50%; transform: translateY(-50%);}
        .evt_02 .slide_con p.leftBtn {left:-100px}
        .evt_02 .slide_con p.rightBtn {right:-100px}
        .evt_02 li {display:inline; float:left}
        .evt_02:after {content:""; display:block; clear:both}      
        .evt_02 .bx-controls{margin-top: 50px; position: relative;}  


        .evt_05 .slide_con {position:relative; width:980px; margin:0 auto; padding-bottom: 140px;} 
        .evt_05 .bx-controls{margin-top: 138px; position: relative;}  
        .evt_05 .bx-wrapper .bx-controls-auto, .bx-wrapper .bx-pager{bottom:0;}
        .evt_05 .bx-wrapper .bx-pager.bx-default-pager a{background: #e1e1e1; width: 18px; height: 18px; border-radius: 60%;}
        .evt_05 .bx-wrapper .bx-pager.bx-default-pager a.active{width:80px; transition: all 0.2s ease; background: #000; border-radius: 20px;}
        .evt_05 .txt{padding: 25px 0 50px 0; width: calc(100% - 70px); position: absolute; top:700px;}     
        .evt_05 .txt p{font-size: 14px; color:#4e4e4e; font-weight: bold; text-align: right; line-height: 1.4;}

        .evt_04 {background:#121212;}  

        .evtPass {background:#ececec; padding:0 0 150px}
        .evtPass .title01 {font-size:30px; color:#000; margin-bottom:100px}
        .evtPass .wrap {width:1120px; margin:0 auto}
        .evtPass .passLecBuy {display:flex; justify-content:space-between; position:absolute; bottom:60px; left:66px; width:950px; color:#252525; letter-spacing:-1px}
        .evtPass .passLecBuy div {width:50%; line-height:30px; font-size:22px; font-weight:bold; text-align:center;} 
        .evtPass .passLecBuy p {font-size:18px; margin-bottom:20px; text-align:center; margin-left:-30px}
        .evtPass .passLecBuy p span,
        .evtPass .title02 {color:#ffda39;  line-height: 1.2;}

        .evtPass input[type="radio"] {height:22px; width:22px; vertical-align:middle}
        .evtPass input[type="checkbox"] {height:20px; width:20px; vertical-align:middle}
        .evtPass input:checked + label {border-bottom:1px dashed #504eff; color:#504eff; cursor: pointer;}

        .evtPass .totalPrice {width:860px; margin:90px auto 0;}
        .evtPass .totalPrice a {display:block; background:#000; font-size:44px; color:#fff; padding:20px;border-radius:5px; font-weight: bold;}
        .evtPass .totalPrice a:hover {background:#504eff}

        .evtPass .check {width:800px; margin:0 auto; padding:20px; font-size:16px; color:#000; letter-spacing:-1px;}
        .evtPass .check a {display:inline-block; padding:10px; color:#fff; background:#000; margin-left:40px; border-radius:20px; font-size:12px}
        .evtPass .check p {font-size:14px; padding:10px 0 0 123px; line-height:1.4; text-align: left;}
        .evtPass .check label{font-size: 16px; font-weight: bold; padding-left: 10px;} 
        .evtPass .check input:checked + label {border-bottom:1px dashed #504eff; color:#504eff}

        .evtPass .title02 {font-size:28px; color:#000; margin:90px auto 30px; }
        .evtPass .title02 div {font-size:46px}

        .evtPass .txtinfo {width:1006px; margin:0 auto; padding:40px; border:1px solid #000; border-radius:10px; margin-bottom:50px; font-size:16px}
        .evtPass .txtinfo p {background:#000; color:#fff; padding:10px; border-radius:30px; margin-top:-60px; margin-bottom:20px; font-size:20px}

        .evtInfo {padding:150px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:30px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:20px; color:#ffe56e}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox ul li {list-style-type: disc; margin-left:20px; margin-bottom:10px;}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#evt07"><img src="https://static.willbes.net/public/images/promotion/2022/12/2849_sky01.png" alt="합격쿠폰"/></a> 
            <a href="#pass"><img src="https://static.willbes.net/public/images/promotion/2022/12/2849_sky02.png" alt="합격패스"/></a>                       
        </div>     

        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2849_top.jpg"  alt="해양경찰 교수진 합격패스">
        </div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2849_01.png" alt="해양경찰 교수진">
        </div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2849_02.jpg"  alt="왜 등불쌤인가?" />
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2208_01_10.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2208_01_09.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2208_01_08.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2208_01_07.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2208_01_06.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_01_05.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_01_04.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_01_03.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_01_02.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_01_01.jpg" alt="" /></li>            
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_p_prev.png" alt="left" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_p_next.png" alt="right" /></a></p>
            </div>

        </div>

        <div class="evtCtnsBox evt_03">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2849_03.jpg"  alt="학습 PLAN" />     
                <a href="https://blog.naver.com/psb7817/222211861661" target="_blank" title="공부법" style="position: absolute; left: 38.66%; top: 50.55%; width: 22.59%; height: 3.29%; z-index: 2;"></a>
                <a href="https://blog.naver.com/psb7817/222869689060" target="_blank" title="준비요령" style="position: absolute; left: 38.66%; top: 89.28%; width: 22.59%; height: 3.29%; z-index: 2;"></a>
            </div>     
        </div>

        <div class="evtCtnsBox evt_04">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2849_04.jpg"  alt="2023년 해양경찰을 채용정보" />    
            </div>
        </div>

        <div class="evtCtnsBox evt_05">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2849_05_title.jpg"  alt="14기 커리큘럼" /> 
            </div>   
            <div class="wrap">
                <div class="slide_con">
                    <ul id="slidesImg5">
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/12/2849_05_01.jpg" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/12/2849_05_02.jpg" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/12/2849_05_03.jpg" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/12/2849_05_04.jpg" alt="" /></li>          
                    </ul>
                </div>
                <div class="txt">
                    <p>＊ 시험 일정에 따라 이론 수업은 커리큘럼대로 진행되고, 마지막 모의고사만 상황에 따라  연장될 수 있습니다.</p>
                    <p>＊ 모든 강의 커리큘럼은 학원에 사정에 따라 변경될 수 있습니다.</p>
                </div>
            </div>   
        </div>


        <div class="evtCtnsBox evtPass" id="pass">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2849_06_title.jpg" alt="구매전 안내"/>           
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2849_06_lec.jpg" alt="윌비스 경찰 PASS">
                <div class="passLecBuy NSK-Black"> 
                    <div>                                       
                        <input type="radio" id="y_pkg1" name="y_pkg" value="203672"/>                
                        <label for="y_pkg1">No.1 PASS 상품선택</label>
                    </div>
                    <div>                    
                        <input type="radio" id="y_pkg2" name="y_pkg" value="203676"/>
                        <label for="y_pkg2">No.2 PASS 상품선택</label>
                    </div>   
                    <div>                                       
                        <input type="radio" id="y_pkg3" name="y_pkg" value="203679"/>                
                        <label for="y_pkg3">No.3 PASS 상품선택</label>
                    </div>            
                </div>
            </div>

            <div class="check">
                <input type="checkbox" id="is_chk1" name="is_chk" value="Y"/>
                <label for="is_chk1">페이지 하단 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
                <a href="#careful">이용안내확인하기 ↓</a>
                <p>
                    ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.
                </p>
            </div>

            <div class="title02" id="transfer">
                재수강 하실 수강생은 모두 주목
                <div class="NSK-Black">20% 할인 받고 구매하세요.</div>
            </div>

            <div class="wrap">
                <a href="https://www.willbes.net/classroom/qna/index" target="_blank" title="재수강 쿠폰받기"><img src="https://static.willbes.net/public/images/promotion/2022/12/2849_06.jpg"></a>
            </div>

            <div class="totalPrice NSK-Black">
                <a href="javascript:void(0);" onclick="termsCheck('is_chk1', 'pass');">해양경찰 경채 합격 PASS 신청하기</a>
            </div>  
        </div>

        <div class="evtCtnsBox evt_07">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2849_07_01.jpg"  alt="합격패스 런칭 이벤트" />
            </div>
            <div class="wrap" id="evt07">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2849_07_02.jpg"  alt="합격패스 런칭 이벤트" />
                <a href="javascript:void(0);" onclick="giveCheck();" title="할인쿠폰받기" style="position: absolute; left: 23.04%; top: 81.83%; width: 53.75%; height: 8.14%; z-index: 2;"></a>
            </div> 
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2849_07_03.jpg"  alt="해양경찰 합격패스 이벤트" /> 
                <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="홍보 이미지 받기" style="position: absolute; left: 57.41%; top: 15.85%; width: 28.66%; height: 13.25%; z-index: 2;"></a>
            </div>   
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'Y')){{--기존SNS예외처리시--}}
            @endif            
        </div>

        <div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">"윌비스X등불쌤" 2023 해양경찰경채 합격패스 이용안내  </h4>
				<div class="infoTit NSK-Black">[2023년 해양경찰 경채대비 합격 패스]</div>
				<ul>
                    <li>구매일 기준 2023년12월 31일까지 수강 가능한 기간제 PASS입니다.</li>
                    <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                        * 해양경찰학 / 해사법규 / 항해술 : 등불쌤 교수님<br>
                        * 기관술 : 빡쌤
                    </li>
                    <li>선택한 해양경찰 경채 합격PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                    <li>해양경찰 경채 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                    <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
				</ul>

                <div class="infoTit NSK-Black">[교재 및 포인트]</div>
                <ul>
                    <li>해양경찰 경채 합격 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
				</ul>

                <div class="infoTit NSK-Black">[수강 안내]</div>
				<ul>
                    <li>로그인 후 [내강의실] → [무한PASS존]으로 접속합니다.</li>
                    <li>
                        구매한 PASS 상품 선택 후 [강좌추가]를 클릭, 원하는 강좌를 등록한 후 수강할 수 있습니다.<br>
                        강의는 순차 업로드 예정이며 업로드 일정은 강의 진행일정에 따라 변경될 수 있습니다.
                    </li>
                    <li>합격패스는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                    <li>
                        합격패스 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                        총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대
                    </li>
                    <li>
                        PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다.<br>
                        ([내강의실] → [무한PASS존]에서 등록기기정보 확인) 추후 초기화가 필요할 시 유선(온라인 고객센터)이나 게시판을 통해 요청이 가능하고, 수강 기간 동안 3회 신청이 가능합니다.
                    </li>
				</ul>

                <div class="infoTit NSK-Black">[환불정책]</div>
				<ul>
                    <li>전액환불 : 결제 후 7일 이내 3강 이하 수강 시에만 전액 환불 가능합니다.</li>
                    <li>부분환불 : 결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 합격패스 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.</li>
				</ul>

                <div class="infoTit NSK-Black">[유의사항]</div>
				<ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 부탁드립니다. (단,  이벤트 시에는 쿠폰사용가능)</li>
                    <li>단기패스 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                    <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                </ul>
                <div class="infoTit NSK-Black">※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</div>
			</div>
		</div> 
    </div>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')


    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');        

        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                pagerType:'short',
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
            });

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });

            var slidesImg5 = $("#slidesImg5").bxSlider({
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
                moveSlides:1
            });
            
        });
    
        /*
        function go_PassLecture(cate, code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var _url = '{{ site_url('/periodPackage/show/cate/')}}' + cate + '/pack/648001/prod-code/' + code;
            location.href = _url;
        }*/

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
    </script>
@stop
