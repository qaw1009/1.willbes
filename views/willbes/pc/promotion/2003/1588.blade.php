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
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#f3f3f3;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .evttop {background:#020015 url(https://static.willbes.net/public/images/promotion/2020/03/1588_top_bg.jpg) no-repeat center top; }

        .box_book{width:920px !important;margin:0 auto;border-top:2px solid #22197f; }

        .slice_area {margin-top:-5px;width:920px;}
        
        .evt01s {padding-top:80px;position:relative;}
        .evt01s iframe{width:645px;height:370px;position:absolute;left:50%;top:115%;margin-left:-322px;margin-top:-80px;}
        .evt01ss {margin-top:450px;}

        .evt02 {background:#e7e7e7;padding-bottom:120px;}    
        .evt02 .slide_con {position:relative; width:900px; margin:0 auto}
        .evt02 .slide_con p {position:absolute; top:50%; margin-top:-22px; width:44px; height:45px; z-index:10}
        .evt02 .slide_con p.leftBtn {left:-80px}
        .evt02 .slide_con p.rightBtn {right:-80px}

        .evt03, .evt03ss, .evt04, .evt05{background:#fff}

         /* tip */
        .wb_cts09 {background:#e9e9e9; text-align:left; padding:100px 0;}
        .wb_tipBox {border:1px solid #333; padding:100px; width:1120px; margin:0 auto; }
        .wb_tipBox p {font-size:24px !important; font-weight:bold;  letter-spacing:-3px; margin-bottom:10px; color:#111}	
        .wb_tipBox ul li {margin:10px 0 10px; line-height:1.5; list-style:decimal; margin-left:15px;font-size:14px;}
        
        /*
        .evt02 {background:#ff9e33; position:relative}         
        .evt02 .liveWrap {position:absolute; left:50%; margin-left:-560px; top:593px; z-index:10 }
        .evt03 {background:#ff9e33; padding:200px 0 150px;}        
        
        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
        */
        
        </style>

    <div class="p_re evtContent NGR" id="evtContainer">                

        <div class="evtCtnsBox evttop" >     
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_top.jpg" title="더켠의 반반한 밤">        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01.jpg" title="마무리짓는 1시간">            
        </div>

        <div class="evtCtnsBox box_book">
            <div class="slice_area">
                <ul class="slidesDay">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01_monday.png" alt="월요일"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01_tuesday.png" alt="화요일"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01_wednesday.png" alt="수요일"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01_thursday.png" alt="목요일"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01_friday.png" alt="금요일"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01_saturday.png" alt="토요일"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01_sunday.png" alt="일요일"/></li>         
                </ul> 
            </div>        
        </div>    

       

        <div class="evtCtnsBox evt01s">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01s.jpg" title="더켠읜 반반한 모의고사">    
            <map name="Map1588a" id="Map1588a">
                <area shape="rect" coords="359,844,751,907" href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ/videos?view=0&sort=dd&shelf_id=7" target="_blank" />
            </map>
            <iframe src="https://www.youtube.com/embed/qvIFtFYt20M" frameborder="0" allowfullscreen=""></iframe>    
        </div>

        <div class="evtCtnsBox evt01ss">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01ss.jpg" title="공시 영어의 지존">        
        </div>
        
        <div class="evtCtnsBox evt02" id="pairing">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_02.jpg" title="편성표">
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_02_april.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_02_may.jpg" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_02_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_02_right.png"></a></p>
            </div>        
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_03.jpg" usemap="#Map1588b" title="지금 바로 출석체크하러 가기" border="0">
            <map name="Map1588b" id="Map1588b">
                <area shape="rect" coords="370,974,751,1034" href="#to_go" />
            </map>             
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_03s.jpg" usemap="#Map1588c" title="반반한 소문내기" border="0">
            <map name="Map1588c" id="Map1588c">
                <area shape="rect" coords="188,852,358,937" href="https://gall.dcinside.com/board/lists?id=government" target="_blank" />
                <area shape="rect" coords="390,853,543,938" href="http://cafe.daum.net/9glade" target="_blank" />
                <area shape="rect" coords="586,850,747,940" href="https://cafe.naver.com/gugrade" target="_blank" />
                <area shape="rect" coords="782,849,948,943" href="https://cafe.naver.com/willbes" target="_blank" />
            </map>  
        </div>

        {{--댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif  

        <div class="evtCtnsBox evt03ss">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_03ss.jpg" usemap="#Map1588d" title="지금 바로 구매하기" border="0">
            <map name="Map1588d" id="Map1588d">
                <area shape="rect" coords="378,332,741,382" href="#none;" />
            </map> 
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_04.jpg" usemap="#Map1588e" title="라이브 티비" border="0">
            <map name="Map1588e" id="Map1588e">
                <area shape="rect" coords="123,27,396,126" href="#pairing" />
                <area shape="rect" coords="436,24,711,126" href="javascript:alert('준비중입니다.');" />
                <area shape="rect" coords="738,24,996,126" href="https://pass.willbes.net/pass/support/notice/show?board_idx=266556" target="_blank" />
            </map>      
            <div class="liveWrap" id="to_go">
                @if(empty($data['PromotionLivePlayer']) === false && $data['PromotionLivePlayer'] == 'youtube')
                    @include('willbes.pc.promotion.live_video_youtube_partial')
                @else
                    @include('willbes.pc.promotion.live_video_partial')
                @endif
            </div>                 
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_05.jpg" title="출석 횟수">        
        </div> 

        {{--댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif  

        <div class="evtCtnsBox wb_cts09">
            <div class="wb_tipBox">                     
                <div id="txt1">
                    <p>유의사항</p>
                    <ul>
                        <li>                    
                            더켠의 반반한 모의고사는 윌비스공무원학원 실강 동영상 촬영분을 일정에 맞추어 정기 송출해드리는 방송이오니,<br /> 방송 시간에 맞추어 접속 후 수강하시면 됩니다.<br /> 
                            (*2주에 1회 진행하는 온라인 모의고사에 대한 해설 방송은 실시간 LIVE로 진행됩니다.)<br />
                        </li> 
                        <li>                    
                            윌비스 통합사이트에 로그인한 회원이라면 누구나 온라인 무료수강 가능합니다.
                        </li>       
                        <li>                    
                            더켠의 반반한 모의고사 과정 진행 안내<br />
                            - 매주 월~금 오후 9~10시 : 더켠의 반반한 모의고사+해설 정규 방송<br />
                            - 매월 홀수 주 월~금 : 무료 온라인 모의고사 접수 진행<br />
                            &nbsp;&nbsp;매월 홀수 주 토~일 : 무료 온라인 모의고사 응시 기간<br />
                            &nbsp;&nbsp;매월 짝수 주 월 오후 7~8시 : 모의고사 해설 방송 진행 (실시간 LIVE)<br />
                            &nbsp;&nbsp;(*무료 온라인 모의고사의 경우, 2주에 1회 진행)
                        </li>       
                        <li>                    
                            본 방송은 방송 종료 후 유료 동영상 강의로 전환됩니다. 단, 정규방송과의 형평성을 고려하여 방송 후 일주일 뒤 동영상 서비스가 제공됩니다.
                        </li>       
                        <li>                    
                            강의 자료는 방송 당일 오후 15시부터 오후 21시까지 다운로드 가능하오니, 인쇄하신 후 수업에 참여해주시기 바랍니다.<br />
                            (*해설지는 수업 종료 시간에 맞추어 업로드됩니다.)
                        </li>       
                        <li>                   
                            본 방송은 PC 및 모바일로 시청 가능합니다.<br />
                            &nbsp;&nbsp;- PC의 경우 익스플로러와 크롬 브라우저에서만 시청 가능합니다.<br />
                            &nbsp;&nbsp;- 모바일 기기 접속 시 3G/LTE 데이터 요금이 부과되오니 데이터 사용량을 사전에 확인해주시기 바랍니다.
                        </li>       
                        <li>                    
                            열공 출첵 이벤트 관련<br />
                            &nbsp;&nbsp;- 본 이벤트는 로그인 후 참여 가능하며, 4월 13일 (월)부터 5월 8일 (금)까지 총 20회 진행됩니다. (공휴일 제외)<br />
                            &nbsp;&nbsp;- 출석체크 가능 시간은 정규방송 (월~금) 기준 오후 9~10시 사이, 모의고사 해설 LIVE (4/27(월))의 경우 오후 7-8시만 인정되며 방송이 종료되지<br/>&nbsp;&nbsp;&nbsp;&nbsp;않더라도 해당 시간 이외 출석체크는 출석으로 인정되지 않습니다.<br />
                            &nbsp;&nbsp;- 총 출석횟수에 따라 경품이 차등 지급되며, 단 1번만 참여해도 경품이 전원 지급됩니다.<br />
                            &nbsp;&nbsp;- 이벤트 경품은 5월 12일 (화)까지 [내강의실]에서 확인하실 수 있습니다.
                        </li> 
                        <li>                    
                            소문내기 이벤트 관련<br />
                            &nbsp;&nbsp;- 본 이벤트는 로그인 후 참여 가능하며, 4월 13일 (월)부터 5월 8일 (금)까지 진행됩니다.<br />
                            &nbsp;&nbsp;- 지정된 커뮤니티 외 타 커뮤니티/SNS 등에 작성한 글은 인정되지 않습니다.<br />
                            &nbsp;&nbsp;- 이벤트 종료일을 기준으로 삭제/수정된 글 및 비공개 처리된 글은 정상 참여로 인정되지 않습니다.<br />
                            &nbsp;&nbsp;- 본 이벤트는 선착순이나 게시글 작성 수가 아닌 추첨으로 당첨자 선정이 이루어지오나, 다양한 커뮤니티에 다양한 내용으로 정성스럽게 작성시 <br/>&nbsp;&nbsp;&nbsp;&nbsp;당첨확률이 높아질 수 있습니다.<br />
                            &nbsp;&nbsp;- 이벤트 당첨자 발표는 5월 12일 (화) 윌비스 공무원 공지사항을 통해 확인하실 수 있습니다.<br />
                            &nbsp;&nbsp;&nbsp; (경품 지급일의 경우, 당첨자 발표 공지사항에서 안내드릴 예정입니다.)
                        </li>                                 
                    </ul>      
                </div>
            </div>  
        </div>
         
	</div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            var BxBook = $('.slidesDay').bxSlider({
                slideWidth: 153,
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

        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
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

@stop