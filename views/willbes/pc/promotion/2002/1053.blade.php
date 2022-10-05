@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
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

        .skyBanner {position:fixed; bottom:250px;right:0;z-index:10;}

        /*상단 동영상*/
        .layer {width:100%; height:800px; -ms-overflow:hidden;}
        .video {width:100%; height:800px; overflow:hidden; position:relative; opacity:0.4; box-shadow:0px rgba(0,0,0,0.4); background:#000}
        .pngimg	 {width:1120px; margin:0 auto; position:relative; top:-750px;}
        .pngimg-real {width:1120px; height:0px; position:absolute;top:0;}
        .wb_mp4 {width:100%; text-align:center; margin:0 auto; background:#000; min-width:1120px;}
        .wb_mp4 ul {width:100%; margin:0 auto; min-width:1120px;}
       

        /*탭(이미지)*/
        .tabs{background:#0f44a0; padding-top:30px}
        .tabs ul {display:flex; justify-content: center; }
        .tabs a img.off {display:block}
        .tabs a img.on {display:none}
        .tabs a.active img.off {display:none}
        .tabs a.active img.on {display:block}

        /* 탭 */
        .evttab {border-bottom:10px solid #0c5dc0}
        .evttab ul {width:1120px; margin:0 auto; display:flex}	
        .evttab li {margin-right:5px}	
        .evttab li a {
            display:block;
            width:370px;
            height:263px;
            font-size:0;
            text-indent:-9999;
        }
        .evttab li:first-child a {
            background:url(https://static.willbes.net/public/images/promotion/2021/01/1129_02_tab1.jpg) no-repeat left top;
        }        
        .evttab li:nth-child(2) a {
            background:url(https://static.willbes.net/public/images/promotion/2021/01/1129_02_tab2.jpg) no-repeat left top;
        }
        .evttab li:last-child a {
            background:url(https://static.willbes.net/public/images/promotion/2019/11/1129_02_tab3.jpg) no-repeat left top;
        }
        .evttab li:last-child {            
            margin:0
        }
        .evttab li a:hover,
        .evttab li a.active {
            background-position:right top;
        } 
   
        .tabCts {
            position: relative;
            width:1120px; margin:0 auto 150px;             
        }

   
        .btngo a {width:1000px; margin:0 auto; display:block; font-size:34px; background:#0f44a0; color:#fff; padding:20px 0; border-radius:50px;}
        .btngo a:hover {background:#333;}

        .wb_cts03 {background:#FFF;}  
        
        .tab04s2{background:#f7f7f7}

          /* tip */
        .wb_cts09 {text-align:left; padding:100px 0; background:#f4f4f4}
        .wb_tipBox {width:1000px; margin:0 auto; font-size:16px; line-height:1.4}
        .wb_tipBox > strong { font-weight:bold; color:#333; display:block; margin-bottom:20px}
        .wb_tipBox p {font-size:24px !important; font-weight:bold;  letter-spacing:-3px; margin-bottom:10px; color:#111}	
        .wb_tipBox ol li {margin:25px 0 10px; list-style:decimal; margin-left:15px;}
        .wb_tipBox ul {margin-top:20px}
        .wb_tipBox ul li {margin-bottom:5px}
        .wb_tipBox table {width:100%; border-spacing:0px; background:#fff; border:1px solid #c9c7ca; border-top:2px solid #464646; border-bottom:1px solid #464646; table-layout:auto}
        .wb_tipBox th,
        .wb_tipBox td {text-align:center; padding:15px; border-bottom:1px solid #e4e4e4; border-right:1px solid #e4e4e4}
        .wb_tipBox th {font-weight:bold; color:#333; background:#f6f0ec;}	
        .wb_tip_orange {color:#c03011;}
        .wb_tipBox b{vertical-align:top;}  
        
        .EventBox {width:960px; margin:100px auto; position:relative}
        .EventBox .evtBigimg {width:960px; height:540px; overflow:hidden}

        .EventBox .thumbnail {width:100%; height:129px; overflow:hidden; position:relative;}
        .EventBox .thumbnail:after {content:''; display:block; clear:both}
        .EventBox .thumbnail span {display:inline-block !important; float:left !important; width:230px !important;}
        .EventBox .thumbnail img {width:100%}
        .EventBox .thumbnail .bx-wrapper .bx-controls {
            position: absolute;
            width: 48px;
            height: 23px;
            bottom:0px;
            right:0 !important;
            z-index: 1;
            background:#ccc;
        }
        .EventBox .bx-wrapper .bx-pager {
            width: auto;
            position: absolute;
            bottom:-30px;
            left: 0;
            right: 0;
            font-size: 12px;
            font-weight: 300;
            color: #000;
            margin: 0;
            padding: 0;
            letter-spacing: 0;
        }

        .EventBox .bx-wrapper .bx-controls-direction {
            width: 48px;
            height: 23px; 
            border:3px solid #000;
        }

        .EventBox p {position:absolute; bottom:35px; left:50%; margin-top:-28px; width:32px; height:57px; cursor:pointer; 
            background: url(https://static.willbes.net/public/images/promotion/main/2012_arrow_01.png) no-repeat left center;}
        .EventBox p a {display:none;}
        .EventBox p.leftBtn {margin-left:-560px;}
        .EventBox p.rightBtn {margin-left:528px; background-position: right center;}	

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skyBanner">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1053_skybanner.png" title="경찰통합생활관리반">
        </div>

        <div class="evtCtnsBox wb_mp4" id="main">
            <div class="layer">
                <div class="video">
                    <video style="width:100%;" autoplay loop muted="">
                        <source src="https://static.willbes.net/public/images/promotion/2019/07/1101_bg.mp4" type="video/mp4"></source>
                    </video>
                </div>
                <div class="pngimg">
                    <div class="pngimg-real">
                        <img src="https://static.willbes.net/public/images/promotion/2019/11/1101_t.png" alt="윌비스 관리반" />
                    </div>
                </div>
            </div>
        </div>
        
        <div class="evtCtnsBox wb_cts01">          
            <div class="tabs">                
                <ul>
                    <li>
                        <a href="#tab01s" class="active">
                            <img src="https://static.willbes.net/public/images/promotion/2019/11/1053_tab1_on.png" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2019/11/1053_tab1_off.png" class="off"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab02s">
                            <img src="https://static.willbes.net/public/images/promotion/2019/11/1053_tab2_on.png" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2019/11/1053_tab2_off.png" class="off"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab03s">
                            <img src="https://static.willbes.net/public/images/promotion/2019/11/1053_tab3_on.png" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2019/11/1053_tab3_off.png" class="off"/>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="tab01s" class="tabCts">            
                <img src="https://static.willbes.net/public/images/promotion/2022/03/1053_tab1_con.jpg">                
                <div class="btngo"><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=&subject_idx=1473" target="_blank" >신청하기 ></a></div>                            
            </div> 

            <div id="tab02s" class="tabCts">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/1053_tab2_con.jpg" /> 
            </div>

            <div id="tab03s" class="tabCts">
                <div class="EventBox">            
                    <div id="evtRollingSlider" class="evtBigimg">
                        <div><img id="result_slide_img" src="https://static.willbes.net/public/images/promotion/2021/01/1053_info1.jpg" alt="배너명"></div>
                    </div>

                    <div class="mt20">                        
                        <div id="evtRollingDiv" class="thumbnail">
                            <span>
                                <a data-slide-index="0" href="javascript:clickSildeImg(0);"><img id="silde_img_0" src="https://static.willbes.net/public/images/promotion/2021/01/1053_info1.jpg" /></a>
                            </span>
                            <span>
                                <a data-slide-index="1" href="javascript:clickSildeImg(1);"><img id="silde_img_1" src="https://static.willbes.net/public/images/promotion/2021/01/1053_info2.jpg" /></a>
                            </span>
                            <span>
                                <a data-slide-index="2" href="javascript:clickSildeImg(2);"><img id="silde_img_2" src="https://static.willbes.net/public/images/promotion/2021/01/1053_info3.jpg" /></a>
                            </span>
                            <span>
                                <a data-slide-index="3" href="javascript:clickSildeImg(3);"><img id="silde_img_3" src="https://static.willbes.net/public/images/promotion/2021/01/1053_info4.jpg" /></a>
                            </span>
                            <span>
                                <a data-slide-index="4" href="javascript:clickSildeImg(4);"><img id="silde_img_4" src="https://static.willbes.net/public/images/promotion/2021/01/1053_info5.jpg" /></a>
                            </span>
                            <span>
                                <a data-slide-index="5" href="javascript:clickSildeImg(5);"><img id="silde_img_5" src="https://static.willbes.net/public/images/promotion/2021/01/1053_info6.jpg" /></a>
                            </span>
                            <span>
                                <a data-slide-index="6" href="javascript:clickSildeImg(6);"><img id="silde_img_6" src="https://static.willbes.net/public/images/promotion/2021/01/1053_info7.jpg" /></a>
                            </span>
                            <span>
                                <a data-slide-index="7" href="javascript:clickSildeImg(7);"><img id="silde_img_7" src="https://static.willbes.net/public/images/promotion/2021/01/1053_info8.jpg" /></a>
                            </span>
                            <span>
                                <a data-slide-index="8" href="javascript:clickSildeImg(8);"><img id="silde_img_8" src="https://static.willbes.net/public/images/promotion/2021/01/1053_info9.jpg" /></a>
                            </span>
                            <span>
                                <a data-slide-index="9" href="javascript:clickSildeImg(9);"><img id="silde_img_9" src="https://static.willbes.net/public/images/promotion/2021/01/1053_info10.jpg" /></a>
                            </span>
                            <span>
                                <a data-slide-index="10" href="javascript:clickSildeImg(10);"><img id="silde_img_10" src="https://static.willbes.net/public/images/promotion/2021/01/1053_info13.jpg" /></a>
                            </span>
                            <span>
                                <a data-slide-index="11" href="javascript:clickSildeImg(11);"><img id="silde_img_11" src="https://static.willbes.net/public/images/promotion/2021/01/1053_info14.jpg" /></a>
                            </span>
                            <span>
                                <a data-slide-index="12" href="javascript:clickSildeImg(12);"><img id="silde_img_12" src="https://static.willbes.net/public/images/promotion/2021/01/1053_info11.jpg" /></a>
                            </span>
                            <span>
                                <a data-slide-index="13" href="javascript:clickSildeImg(13);"><img id="silde_img_13" src="https://static.willbes.net/public/images/promotion/2021/01/1053_info12.jpg" /></a>
                            </span>
                        </div>                        
                    </div>
                    
                    <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
                    <p class="rightBtn" id="imgBannerRight"><a href="#none">다음</a></p> 
                </div>

                <img src="https://static.willbes.net/public/images/promotion/2022/03/1053_tab3_con.jpg" />            
            </div>
        </div>

        <div class="evtCtnsBox wb_cts09">
            <div class="wb_tipBox">                     
                <div id="txt1">
                    <p>유의사항</p>
                    <ol>
                        <li><strong>[생활]</strong><br />
                        - <b>1개월 미만 등록은 불가하고 입실일과 무관하게 이용기간은 말일까지입니다.</b><br />
                        &nbsp;(ex: 10월 10일 입실 -> 11월 10일까지 1개월 이용 X, 10월 10일 입실 -> 11월 30일까지 이용 O)<br />
                        - 점호 및 출결 관리는 일요일과 공휴일은 진행되지 않으며 조교 근무 일정에 따라 진행이 안 되는 날이 있을 수 있습니다.<br />
                        - 내부 벌점 규정에 의한 생활 통제가 존재하며 점호 불참,소음,입실생간 불화,범죄 행위 등 벌점이 누적된 경우 강제 퇴실 조치가 있습니다.<br />
                        - <span class="wb_tip_orange">일요일도 식사가 제공되지만 명절 등 식당 공휴일에는 식사가 제공되지 않습니다.</span><br />
                        </li>
                        <li><strong>[실강 PASS]</strong><br />
                        - <span class="wb_tip_orange">국가재난, 정부 지침 등으로 인한 학원 휴원으로 실강 진행이 어려울 경우 동영상 강의로 대체될 수 있으며, 
                            이로 인한 해당기간 환불은 불가합니다.</span><br />
                        - 인강패스와 정규과정 외 특강 및 모의고사는 슈퍼패스 등록생에게 제공되는 무료혜택입니다.<br />
                        - 특강의 경우 별도의 신청이 필요합니다.<br />
                        - 일부 특강의 경우 별도의 결제가 필요할 수 있습니다.<br />
                        </li>
                        <li><strong>[인강 PASS]</strong><br />
                        - 불가피한 사정에 의해 진행되지 않은 강좌의 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.<br />
                        - 아이디 공유, 타인 양도 등 부정사용 적발 시 환불없이 회원 자격이 박탈되며, 불법 행위 시안에 따라 민형사상 조치가 있을 수 있습니다.<br />
                        - 온/오프라인 동시 진행되는 이벤트성 특강의 경우 인강에 미지급되거나 이벤트가 종료된 후 제공될 수 있습니다.<br />
                        </li>                   
                        <li><strong>[환불 규정]</strong><br />
                        - 혜택 이용 여부에 따른 환불<br />
                        &nbsp;통합생활관리반은 숙박,식사,실강,인강 등이 통합된 패키지 상품으로 등록 시점에 담당자와 협의를 거친 경우를 제외하고<br />
                        &nbsp;혜택 이용 여부에 따른 <b>부분적인 금액 공제는 불가</b>합니다.<br />
                        &nbsp;<span class="wb_tip_orange">(ex: 총 6개월 과정을 등록하였는데 2개월은 식당을 이용하지 않았으니 해당 부분 환불해주세요. X)</span><br />
                        &nbsp;<span class="wb_tip_orange">(ex: 인강PASS를 이용하지 않으니 인강 비용만큼 금액 공제해 주세요. X)</span><br />
                        </li>
                        <li>중도 환불 시 무료 혜택 금액을 차감하고 환불됩니다.</li>
                        <span class="wb_tip_orange">- 이용 기간에 따른 환불(교육청 환불 기준 준수)</span><br>                                              
                    </ol>
                </div> 
                <table style="margin-top:25px;">  
                    <col />
                    <col />
                    <col />
                    <tr>
                        <th>수강료징수기간</th>
                        <th>반환 사유발생일</th>
                        <th>반환금액</th>
                    </tr>
                    <tr>
                        <td rowspan="4">교습 기간이 1개월 이내인 경우</td>
                        <td>교습 시작 전</td>
                        <td>이미 납부한 교습비등의 전액</td>
                    </tr>
                    <tr>
                        <td>총 교습시간의 1/3경과 전</td>
                        <td>이미 납부한 교습비등의 2/3에 해당하는 금액</td>
                    </tr>
                    <tr>
                        <td>총 교습시간의 1/2경과 전</td>
                        <td>이미 납부한 교습비등의 1/2에 해당하는 금액</td>
                    </tr>
                    <tr>
                        <td>총 교습시간의 1/2경과 후</td>
                        <td>반환하지 않음</td>
                    </tr>
                    <tr>
                        <td rowspan="2">교습 기간이 1개월 초과인 경우</td>
                        <td>교습 시작 전</td>
                        <td>이미 납부한 수강료 전액</td>
                    </tr>
                    <tr>
                        <td>교습 시작 후</td>
                        <td>반환사유가 발생한 해당 월의 반환 대상 교습비등<br />
                            (교습기간이 1개월 이내인 경우의 기준에 따라 산출한 금액을 말한다)과 나머지<br/>
                            월의 교습비등의 전액을 합산한 금액
                        </td>
                    </tr>
                </table>                      
                
                </div>
            </div>  
        </div>   
    </div>
    <!-- End Container -->

    <script language="javascript">
        //관리반 시설 이미지
        $(function(){ 
            var slidesImg = $(".thumbnail").bxSlider({
                mode:'horizontal',
                touchEnabled: false,
                speed:500,
                pause:3000,
                sliderWidth:230,
                auto : true,
                slideMargin:15,
                /*minSlides:4,
                maxSlides:4,*/
                autoHover: true,
                pager:true,
                pagerType: 'short',
                moveSlides:1,
                /*pagerCustom: '#evtRollingSlider',*/
                controls:false
            });	
            $("#imgBannerLeft").click(function (){
                slidesImg.goToPrevSlide();
            });        
            $("#imgBannerRight").click(function (){
                slidesImg.goToNextSlide();
            });			
        });

        function clickSildeImg(idx) {
            $('#result_slide_img').prop('src', $('#silde_img_' + idx).prop('src'));
        }
        
        //
        $(document).ready(function() {
            var slidesImg1 = $("#slidesImg1").bxSlider({
                mode:'fade',
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
                /*adaptiveHeight: true,*/
            });

            $("#imgBannerLeft1").click(function (){
                slidesImg1.goToPrevSlide1();
            });

            $("#imgBannerRight1").click(function (){
                slidesImg1.goToNextSlide1();
            });
        });        

        /*탭(이미지버전)*/
        $(document).ready(function(){
            $('.tabs ul').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                //$active.addClass('active');
                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide();
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault()
                });
            });
        });

        $(document).ready(function(){
            $(".tabCts").hide(); 
            $(".tabCts:first").show();        
            $(".evttab ul li a").click(function(){             
                var activeTab = $(this).attr("href"); 
                $(".evttab ul li a").removeClass("active"); 
                $(this).addClass("active"); 
                $(".tabCts").hide(); 
                $(activeTab).fadeIn();             
                return false; 
            });
        });       
            
    </script>
@stop