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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .wbCommon {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/  

        .wb_00 {background:#0a1d4f url(https://static.willbes.net/public/images/promotion/2019/03/1174_top_bg.jpg) no-repeat center top;}        
        .wb_01 {background:#202020 url(https://static.willbes.net/public/images/promotion/2019/03/1174_01_bg.jpg) no-repeat center top;}
        .wb_01 .youtube {height:1418px}	
        .wb_01 .youtube iframe {margin-top:439px; width:854px; height:480px}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:854px; margin:0 auto}	
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-40px; top:46%; width:80px; height:80px;}
        .slide_con p.rightBtn {right:-40px;top:46%; width:80px; height:80px;}

        .wb_02 {background:#f297b8 url(https://static.willbes.net/public/images/promotion/2019/03/1174_02_bg.jpg) no-repeat center top; line-height:1.4} 
        .wb_02 .request {
            width:1000px; margin:0 auto; text-align:left; background:#fff; padding:50px; font-size:14px; margin:150px auto; 
            box-shadow: 10px 10px 10px rgba(010,0,0,.1);
        }
        .wb_02 .request h3 {font-size:30px; padding-bottom:10px; margin-bottom:30px; border-bottom:2px solid #f297b8}
        .wb_02 .request h3 span {color:#f297b8;}
        .wb_02 .request p {font-size:16px; margin-bottom:20px; font-weight:bold}
        .wb_02 .request li {margin-bottom:10px}
        .wb_02 .request .tit { display:inline-block; width:70px;}  
        .wb_02 .request input[type="text"] {width:200px; height:26px; border:1px solid #999; padding:0 10px; color:#666}
        .wb_02 .request input[type="checkbox"] {width:20px; height:20px; border:1px solid #999;}  
        .wb_02 .termsBx {float:left; width:30%;}
        .wb_02 .termsBx01 {float:right; width:69%; margin-bottom:20px}
        .wb_02 .termsBx01 ul {height:100px; overflow-y:scroll; border:1px solid #999; margin-bottom:10px; font-size:12px; color:#666; padding:0 10px}
        .wb_02 .request .btn {clear:both; border-top:1px solid #f297b8;}
        .wb_02 .request .btn a {width:100px; display:block; text-align:center; background:#f297b8; color:#fff; margin:30px auto 0; height:40px; line-height:40px}
        .wb_02 .request .btn a:hover {background:#000;}
        .wb_02 .request:after {content:''; display:block; clear:both}       
               	
    </style>


    <div class="evtContent" id="evtContainer">

        <div class="wbCommon wb_00">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1174_top.jpg" usemap="#map1174A" title="합격자의밤" border="0" />
            <map name="map1174A" id="map1174A">
                <area shape="rect" coords="392,1096,733,1190" href="#request" alt="합격자의밤 신청하기"/>
            </map>
        </div>
		
		<div class="wbCommon wb_01">
            <div class="youtube"><iframe src="https://www.youtube.com/embed/-Q676VZ03FM?rel=0" frameborder="0" allowfullscreen></iframe></div>
            <div><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_01.jpg" title=" " /></div>
            <div class="slide_con">
                <ul id="slidesImg7">
                <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_img01.jpg" alt="#" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_img02.jpg" alt="#" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_img03.jpg" alt="#" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_img04.jpg" alt="#" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_img05.jpg" alt="#" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_img06.jpg" alt="#" /></li>
                </ul>
            
                <p class="leftBtn"><a id="imgBannerLeft7"><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_pre.png" alt="이전" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight7"><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_next.png" alt="다음" /></a></p>
          </div>
            
            <div><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_02.jpg" title=" " /></div>
		</div>

   		<div class="wbCommon NSK wb_02">
            <div><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_02_01.jpg" title=" " /></div>
            <div class="request" id="request">
                <h3>윌비스 신광은경찰 <span class="strong">합격자의 밤</span> 신청 </h3>
                <div class="termsBx">
                    <p>수강생 정보</p>
                    <ul>
                        <li>
                            <input type="text" id="" name="" value="" placeholder="이름" >
                        </li>
                        <li>
                            <input type="text" id="" name="" value="" placeholder="아이디">
                        </li>
                        <li>
                            <input type="text" id="" name="" value="" placeholder="전화번호 숫자만 입력하세요.">
                        </li>
                    </ul>
                </div>

                <div class="termsBx01">
                    <p>개인정보 수집/이용 동의 안내</p>
                    <ul>
                        <li>
                        1. 개인정보 수집 이용 목적<br>
                        - 신청자 본인 확인 및 신청 접수 및 문의사항 응대<br>
                        - 통계분석 및 마케팅<br>
                        - 윌비스 신광은경찰학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공
                        </li>
                        <li>
                        2. 개인정보 수집 항목<br>
                        - 필수항목 : 성명, 연락처, 이메일
                        </li>
                        <li>
                        3. 개인정보 이용기간 및 보유기간<br>
                        - 이용 목적 달성 또는 신청자의 신청 해지 및 삭제 요청 시 파기
                        </li>
                        <li>
                        4. 신청자의 개인정보 수집 및 활용 동의 거부 시<br>
                        - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다.
                        </li>
                        <li>
                        5. 입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.
                        </li>
                        <li>
                        6. 이벤트 진행에 따른 단체사진 및 영상 촬영에 대한 귀하의 초상권 사용을 동의하며, 해당 저작물에 대한 저작권은 윌비스에 귀속됩니다.
                        </li> 
                    </ul>
                    <input type="checkbox" id="is_chk" name="is_chk" value="Y" title="개인정보 수집/이용 동의"> <label for="is_chk">윌비스에 개인정보 제공 동의하기(필수)</label>
                </div>
                            
                <div class="btn">
                    <a href="#none">신청하기</a>
                </div>
            </div>

            <div><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_02_02.jpg" title=" " /></div>
        </div>
        
        <div>

        </div>
        
    </div>
    <!-- End Container -->   

    <script>
        $(document).ready(function() {
            var slidesImg7 = $("#slidesImg7").bxSlider({
            //mode:'fade', option : 'horizontal', 'vertical', 'fade'
            auto:true,
            speed:350,
            pause:4000,
            controls:false,
            slideWidth:980,
            autoHover: true,
            pager:false,
            });

            $("#imgBannerLeft7").click(function (){
            slidesImg7.goToPrevSlide();
            });
            $("#imgBannerRight7").click(function (){
            slidesImg7.goToNextSlide();
            });
		
	    });
    </script>
    
@stop