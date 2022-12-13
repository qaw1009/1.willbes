@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
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

        .sky {position:fixed;top:200px;right:10px;z-index:100;}
        .sky a {display:block; margin-bottom:10px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/12/2828_top_bg.jpg) no-repeat center top; height:1720px}
        .evtTop .mainImg {position:absolute; top:390px; left:50%; margin-left:-429.5px}

        .evt01 {background:#19586A}

        .evt02 {background:#37383A;position:relative;}
        .youtube {position:absolute; top:430px; left:50%;z-index:1;margin-left:-430px}
        .youtube iframe {width:860px; height:484px}

        .evt03 {background:#F5F5F5}

        .evt05 {background:#F5F5F5;padding-bottom:250px;}
        .evt05 .infoText {margin-top:50px; color:#fff; font-size:30px}        
        /*교수 롤링*/
        .section_pro {
        background:url(https://static.willbes.net/public/images/promotion/2022/11/2828_05_bg.jpg) no-repeat center top; 
                   position:relative;height:1000px;clear:both;}      
        .section_pro .box_pro {position:absolute; top:700px; left:0; width:100%; z-index:1}
        .section_pro .box_pro .bx-wrapper{max-width:100% !important;}
        .section_pro .box_pro li {display:inline; float:left;height:492px;}
        .section_pro .box_pro li img {
        width: 100%;
        height: 100%;        
        }

        .evt06 {background:#F5F5F5;}

        .evt07 {background:#313131;}
        .evt07 .check {width:800px; margin:0 auto; padding:20px; font-size:16px; color:#000; letter-spacing:-1px;color:#fff;}
        .evt07 .check a {display:inline-block; padding:10px; color:#fff; background:#000; margin-left:40px; border-radius:20px; font-size:12px}
        .evt07 .check p {font-size:14px; padding:50px 0 50px 20px; line-height:1.4; text-align:left; width:600px; margin:0 auto;color:#fff;}
        .evt07 .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        .evt07 .check input:checked + label {border-bottom:1px dashed #FFF455; color:#FFF455}
        .evt07 > a {font-size:30px; display:block; padding:30px 0; color:#fff; background:#000; width:850px; margin:0 auto; border-radius:50px}
        .evt07 > a:hover {background:#ac0811}

        .evtInfo {padding:80px 0; background:#626262; color:#fff; font-size:17px; line-height:1.4}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left;}
		.evtInfoBox h4 {font-size:40px; margin-bottom:30px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:20px;}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox ul li {margin-bottom:5px; font-size:14px; list-style:decimal; margin-left:20px}
        .evtInfoBox ul li a {color:#ecfc80}

        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
        }
        .b-close {
            right: 10px;
            top: 50px;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
        }
        .Pstyle .content {height:auto; width:auto;}

    </style>
    
    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2022/11/2828_sky01.png" alt="100일 완성 패스 신청하기"></a>    
        </div>
        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2828_top_img.png"  alt="경찰학 김재규" data-aos="flip-down" class="mainImg"/>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2828_01.jpg"  alt="오리지날 경찰학"/>    
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/ojZcGpQXrcs?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>         
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2828_02.jpg"  alt="합격률"/>               
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">      
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2828_03.jpg"  alt="커리큘럼"/>    
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2828_04.jpg"  alt="경찰학 교재"/>
                <a href="javascript:go_popup1()" title="핵심 서브노트" style="position: absolute;left: 40.66%;top: 40.45%;width: 14.69%;height: 2.89%;z-index: 2;"></a>
                <a href="javascript:go_popup2()" title="21개년 총알기출 ox" style="position: absolute;left: 40.66%;top: 62.59%;width: 14.69%;height: 2.89%;z-index: 2;"></a>
                <a href="javascript:go_popup3()" title="플러스 100제" style="position: absolute;left: 40.66%;top: 84.69%;width: 14.69%;height: 2.89%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <div class="section_pro">                
                <div class="box_pro">
                    <ul class="slide_pro">
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment01.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment02.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment03.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment04.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment05.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment06.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment07.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment08.png" alt="" /></li>                                                           
                    </ul>
                </div>  
            </div>
        </div>

        <div class="evtCtnsBox evt06">      
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2828_06.jpg"  alt="그레이스 호퍼 명언"/>    
        </div>

        <div class="evtCtnsBox evt07" data-aos="fade-up" id="apply">
            <div class="wrap NSK-Black">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2828_07.jpg" alt="100일 완성 패스" />
                <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51424?subject_idx=2128&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%2823%EB%85%84%EB%8C%80%EB%B9%84%29" target="_blank" title="김재규 홈" style="position: absolute; left: 28.84%; top: 74.47%; width: 31.96%; height: 14.55%; z-index: 2;"></a>
                <a href="javascript:void(0);" data-url="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/202735" onclick="go_PassLecture(this)" title="" style="position: absolute; left: 68.04%; top: 84.17%; width: 12.86%; height: 5.19%; z-index: 2;"></a>
            </div>
            <div class="check">
                <input name="ischk" type="checkbox" id="is_chk1" value="Y" />
                <label for="is_chk1">페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
                <a href="#info">이용안내확인하기 ↓</a>
                <p>
                    ※ 강의공유, 콘텐츠 부정사용 적발 시, 환급이 불가합니다.
                </p>
            </div>
        </div>            

        <div class="evtCtnsBox evtInfo" id="info" data-aos="fade-up">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">2023 1차대비 김재규 경찰학 100일 완성 PASS 이용안내</h4>
                <div class="infoTit NSK-Black">강좌 기본</div>
                <ul>               
                    <li>본 상품은 구매일로부터 23년1차 필기시험일 까지 무제한으로 수강 가능한 기간제 패스입니다.(최초 : 23년 3월 30일까지)</li>
                    <li>김재규 경찰학 100일완성  PASS는 결제가 완료되는 즉시 수강이 시작됩니다. (결제 완료자에 한함)</li>
                    <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                    <li>김재규 경찰학 T-PASS 상품 구성은 다음과 같습니다.<br>                    
                        - 김재규 경찰학 T-PASS : 김재규 교수님 경찰학 전 강좌<br>
                        - 12월5일 : 이총기+핵서 (핵심이론반)<br>
                        - 23년 1월 : 플러스 1000제(실전대비 객관식 집중강의)<br>
                        - 23년 2월 : 개정법령특강<br>
                        - 학원사정으로 커리는 지연,변경될수 있습니다.<br>
                    </li>
                </ul>

                <div class="infoTit NSK-Black">교재</div>
                <ul>
                    <li>강의 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                </ul>             

                <div class="infoTit NSK-Black">환불</div>
                <ul>
                    <li>결제 후 7일 이내 3강 이하 수강 시에만 전액 환불 가능합니다.</li>
                    <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 결제가 기준으로 계산하여 사용일 수 만큼 차감 후 환불됩니다.</li>
                </ul>

                <div class="infoTit NSK-Black">PASS 수강</div>
                <ul>
                    <li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                    <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                    <li>강의수강시 일시정지, 수강연장 , 재수강 불가합니다.</li>
                    <li>김재규 100일완성반 PASS 수강시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                    총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (윌비스경찰 PASS는  PMP 강의는 제공하지 않습니다.)</li>
                    <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가 필요할 시
                    내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                    <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                </ul>

                <div class="infoTit NSK-Black">유의사항</div>
                <ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.<br>
                    (단,이벤트 시 쿠폰사용가능)</li>
                    <li>김재규 100일완성반 PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며,
                    이로 인한 환불은 불가합니다.</li>
                    <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다.<br>
                    이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생할 수 있습니다.</li>
                    <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공될 수 있습니다.<br>
                    <li>PASS 관련 발급된 쿠폰은 이벤트가 변경되거나 종료될 경우 자동 회수될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                </ul>

                <div class="infoTit">※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</div>

            </div>
        </div> 

        <!--레이어팝업-->
        <div id="popup1" class="Pstyle">
            <span class="b-close"></span>
            <div class="content1">                  
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_textbook01.png" class="off" alt="" />    
            </div> 
        </div>    
        <div id="popup2" class="Pstyle">
            <span class="b-close"></span>   
            <div class="content2">         
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_textbook02.png" class="off" alt="" />  
            </div> 
        </div>
        <div id="popup3" class="Pstyle">    
            <span class="b-close"></span>
            <div class="content3">            
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_textbook03.png" class="off" alt="" />  
            </div>
        </div>

    </div>

    <!-- End Container -->
    
    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });

      /*롤링*/
      $(document).ready(function() {
            var BxBook = $('.slide_pro').bxSlider({
                slideWidth: 533,
                slideMargin: 40,
                maxSlides:10,
                minSlides:1,
                moveSlides: 1,
                ticker:true,
                speed:40000,
                onSlideAfter: function() {
                    BxBook.stopAuto();
                    BxBook.startAuto();
                }
            });
        });

        /*레이어팝업*/     

        function go_popup1() {
            $('#popup1').bPopup();
        }   
        function go_popup2() {
            $('#popup2').bPopup();
        }
        function go_popup3() {
            $('#popup3').bPopup();
        }

        /*수강신청 동의*/ 
        function go_PassLecture(obj){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }else{
                var _url = $(obj).data('url');
                window.open(_url);
            }
        }

    </script>
      
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop