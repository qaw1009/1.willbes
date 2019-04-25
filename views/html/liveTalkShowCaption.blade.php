@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')

<!-- Container -->
<style type="text/css">
    .captionWrap {padding:20px}
    .viewmenu {width:1210px; margin:0 auto}
	.viewmenu li {display:inline; float:left; margin-bottom:10px; margin-right:10px}
	.viewmenu li:last-child {margin-right:0}
	.viewmenu li a {display:block; padding:10px 20px; text-align:center; background:#fff; color:#06F; border:1px solid #06F; border-radius:50px; font-size:16px; font-weight:600}
    .viewmenu li a:hover,
    .viewmenu li a.active {background:#06F; color:#fff}
	.viewmenu:after {content:""; display:block; clear:both}
	
	.viewArea {position:fixed; bottom:0; width:100%; height:130px;}
    .viewArea .viewbox {position:relative; width:1210px; margin:0 auto; height:130px;}  
    .bgimg {position:absolute; top:0; left:0; width:1210px; height:130px; z-index:1 !important}  
    .liveTab01 {position:absolute; top:0; left:0; width:1210px; height:130px; z-index:9999 !important;}
	.liveTab01 li {height:130px; position:relative}
	.liveTab01 span {position:absolute}
	.liveTab01 .txt01 {top:30px; left:292px; font-size:30px; font-weight:bold; color:#fdf9c1; width:190px; text-align:center; line-height:1.3}
	.liveTab01 .txt02 {top:62px; left:824px; font-size:50px; font-weight:bold; color:#8e182e; letter-spacing:-1px; font-family:"Times New Roman", Times, serif}
	.liveTab01 .txt03 {top:33px; left:1040px; width:140px; height:33px; line-height:33px; font-size:28px; text-align:right; font-family:"Times New Roman", Times, serif; font-weight:bold;}
	.liveTab01 .txt04 {top:74px; left:1040px; width:140px; height:33px; line-height:33px; font-size:28px; text-align:right; font-family:"Times New Roman", Times, serif; font-weight:bold;}
    
    .liveTab02 {position:absolute; top:0; left:0; width:1210px; height:130px; z-index:10}
	.liveTab02 li {padding-left:270px; height:130px; line-height:130px; color:#fff; font-size:40px; letter-spacing:-2px; text-align:left; width:895px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;}	
	.liveTab02 li span {margin-right:10px; vertical-align:top} 
    .liveTab02 li span.st01 {font-weight:600; color:#fdf9c1; border-bottom:2px solid #fdf9c1}
    .liveTab02 li span.st02 {font-family:"Times New Roman", Times, serif}

    .liveTab03 {position:absolute; top:0; left:0; width:1210px; height:130px; z-index:10}
	.liveTab03 li {padding-left:270px; height:130px; color:#fff; font-size:40px; letter-spacing:-2px; text-align:left; width:895px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;}	
	.liveTab03 li span {margin-right:10px; vertical-align:top} 
    .liveTab03 li span.st01 {font-weight:600; color:#fdf9c1; border-bottom:2px solid #fdf9c1}
    .liveTab03 li span.st02 {font-family:"Times New Roman", Times, serif}
    .liveTab03 li div {font-size:22px; margin-bottom:12px; margin-top:26px}
    .liveTab03 li div span.st01 {border:0; letter-spacing:0;}


    .counter {position:absolute; top:0; left:0; text-align:center; width:100%; padding-left:200px; z-index:10;}
    .counter div {color:#fff; font-size:30px; line-height:30px; padding-top:30px}
    .counter span {color:#fff200; vertical-align: text-bottom}
    .counter p {font-size:11px; color:#fff; margin-top:10px; line-height: 1.4}
    
    /*크롬*/
    @@media screen and (-webkit-min-device-pixel-ratio:0) {
    .viewArea .viewbox {position:relative; width:1210px; margin:0 auto; height:130px;}  
    .bgimg {position:absolute; top:0; left:0; width:1210px; height:130px; z-index:1 !important}  
    .liveTab01 {position:absolute; top:0; left:0; width:1210px; height:130px; z-index:9999 !important;}
    } 
</style>

<div class="NSK captionWrap">
    <ul class="viewmenu tabSt1">
    	<li><a href="#tab01">응시현황</a></li>
        <li><a href="#tab02">역대합격선</a></li>
        <li><a href="#tab03">동향뉴스</a></li>
        <li><a href="#tab04">시험총평</a></li>
        <li><a href="#tab05">안내사항</a></li>
        <li><a href="#tab06">실시간채점현황 1</a></li>
        <li><a href="#tab07">실시간채점현황 2</a></li>
        <li><a href="#tab08">예상컷 공개</a></li>
        <li><a href="#tab09">예측참여현황</a></li>
        <li><a href="#tab10">이벤트당첨</a></li>
        <li><a href="#tab11">전화 인터뷰</a></li>
        <li><a href="#tab12">실시간 댓글 1</a></li>
        <li><a href="#tab13">실시간 댓글 2</a></li>
        <li><a href="#tab14">실시간 댓글 3</a></li>
        <li><a href="#tab15">실시간 댓글 4</a></li>
    </ul>

    <div class="viewArea">
        {{--응시현황--}} 
        <div class="viewbox" id="tab01">                           
            <div class="bgimg" style="background: url(https://static.willbes.net/public/images/promotion/2019/04/1208_live01.jpg) no-repeat right center;"> </div>    
            <ul class="liveTab01 slide01">       
                <li>
                    <span class="txt01">일반공채:남<br>서울</span>
                    <span class="txt02">31:1</span>
                    <span class="txt03">230 명</span>
                    <span class="txt04">7,166 명</span>
                </li>        
                <li>
                    <span class="txt01">일반공채:남<br>부산</span>
                    <span class="txt02">62:1</span>
                    <span class="txt03">30 명</span>
                    <span class="txt04">1,881 명</span>
                </li> 
                <li>
                    <span class="txt01">일반공채:남<br>서울</span>
                    <span class="txt02">31:1</span>
                    <span class="txt03">230 명</span>
                    <span class="txt04">7,166 명</span>
                </li> 
            </ul>            
        </div>

        {{--역대합격선--}}
        <div class="viewbox" id="tab02">                            
            <ul class="liveTab03 slide01">       
                <li>
                    <div><span class="st01">일반공채:남</span><span class="st01">서울</span></div>
                    <span>18년 1차</span><span class="st01">346.45</span><span>18년 2차</span><span class="st01">330.41</span><span>18년 3차</span><span class="st01">325.69</span>
                </li>        
                <li>
                    <div><span class="st01">일반공채:남</span><span class="st01">서울</span></div>
                    <span>18년 1차</span><span class="st01">346.45</span><span>18년 2차</span><span class="st01">330.41</span><span>18년 3차</span><span class="st01">325.69</span>
                </li> 
                <li>
                    <div><span class="st01">일반공채:남</span><span class="st01">서울</span></div>
                    <span>18년 1차</span><span class="st01">346.45</span><span>18년 2차</span><span class="st01">330.41</span><span>18년 3차</span><span class="st01">325.69</span>
                </li> 
            </ul>
            <div class="bgimg"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_live02.jpg" title="CONTENTS 명"></div>
        </div>

        {{--동향뉴스--}}  
        <div class="viewbox" id="tab03">                          
            <ul class="liveTab02 slide01" >       
                <li>
                    <span class="st01">[NEWS]</span>경찰공무원 합격? 12월 22일, 결전의 그 날!
                </li>        
                <li>
                    <span class="st01">[NEWS]</span>경찰 3차 '필기시험, 역시 기출이 답이었다!'
                </li> 
                <li>
                    <span class="st01">[속보]</span>경찰 3차 경쟁률, '3년 만에 최저!"
                </li> 
                <li>
                    <span class="st01">[속보]</span>가답안 등록 완료. 지금 실시간 채점하고 바로 윌비스 합격예측 풀서비스에 참여하세요!
                </li>
            </ul>
            <div class="bgimg"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_live03.jpg" title="CONTENTS 명"></div>
        </div>

        {{--시험총평--}}   
        <div class="viewbox" id="tab04">                         
            <ul class="liveTab02 slide01" >       
                <li>
                    <span class="st01">[형사소송법]</span>이번에도 역시나 판례 위주의 출제…판례의 중요성 더욱 높아져
                </li>        
                <li>
                    <span class="st01">[영어]</span>점점 국가직화 되어가는 경찰 영어 시험…해답은 어디에
                </li> 
                <li>
                    <span class="st01">[영어]</span>평소 장문의 독해를 연습하지 않았다면 어려웠을 것으로 예상
                </li> 
                <li>
                    <span class="st01">[한국사]</span>점차 지엽적인 문제보다 무난하게 출제되는 경향 높아져
                </li>
            </ul>
            <div class="bgimg"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_live04.jpg" title="CONTENTS 명"></div>
        </div>

        {{--안내사항--}}   
        <div class="viewbox" id="tab05">                         
            <ul class="liveTab02 slide01" >       
                <li>
                    <span class="st01">[공지]</span>합격예측 라이브 토크쇼 본방사수, 상품권 10만원 증정~
                </li>        
                <li>
                    <span class="st01">[안내]</span>2019년 1차 시험, 기출 해설강의 오후 3시 시작!
                </li> 
            </ul>
            <div class="bgimg"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_live05.jpg" title="CONTENTS 명"></div>
        </div>

        {{--실시간채점현황1--}}   
        <div class="viewbox" id="tab06">                         
            <ul class="liveTab03 slide01" >       
                <li>
                    <div><span class="st01">일반공채:남</span><span class="st01">경기남부</span></div>
                    <span>한국사</span><span class="st01">85</span><span>영어</span><span class="st01">70</span><span>형법</span><span class="st01">80</span><span>형소법</span><span class="st01">70</span><span>경찰학</span><span class="st01">85</span>
                </li>        
                <li>
                    <div><span class="st01">일반공채:남</span><span class="st01">경기남부</span></div>
                    <span>한국사</span><span class="st01">100</span><span>영어</span><span class="st01">75</span><span>형법</span><span class="st01">80</span><span>형소법</span><span class="st01">80</span><span>경찰학</span><span class="st01">80</span>
                </li>
                <li>
                    <div><span class="st01">일반공채:남</span><span class="st01">경기남부</span></div>
                    <span>한국사</span><span class="st01">80</span><span>영어</span><span class="st01">70</span><span>형법</span><span class="st01">75</span><span>형소법</span><span class="st01">75</span><span>경찰학</span><span class="st01">55</span>
                </li>
            </ul>
            <div class="bgimg"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_live06.jpg" title="CONTENTS 명"></div>
        </div>

        {{--실시간채점현황2--}}   
        <div class="viewbox" id="tab07">                         
            <ul class="liveTab03 slide01" >       
                <li>
                    <div><span class="st01">일반공채:남</span><span class="st01">경기남부</span></div>
                    <span>한국사</span><span class="st01">85</span><span>영어</span><span class="st01">70</span><span>형법</span><span class="st01">80</span><span>형소법</span><span class="st01">70</span><span>경찰학</span><span class="st01">85</span>
                </li>        
                <li>
                    <div><span class="st01">일반공채:남</span><span class="st01">경기남부</span></div>
                    <span>한국사</span><span class="st01">100</span><span>영어</span><span class="st01">75</span><span>형법</span><span class="st01">80</span><span>형소법</span><span class="st01">80</span><span>경찰학</span><span class="st01">80</span>
                </li>
                <li>
                    <div><span class="st01">일반공채:남</span><span class="st01">경기남부</span></div>
                    <span>한국사</span><span class="st01">80</span><span>영어</span><span class="st01">70</span><span>형법</span><span class="st01">75</span><span>형소법</span><span class="st01">75</span><span>경찰학</span><span class="st01">55</span>
                </li>
            </ul>
            <div class="bgimg"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_live06.jpg" title="CONTENTS 명"></div>
        </div>

        {{--예상컷공개--}}   
        <div class="viewbox" id="tab08">                         
            <ul class="liveTab02 slide01" >       
                <li>
                    <span class="st01">[일반:남]</span><span>공통 140 ~ 170, 선택 250 ~ 300</span>
                </li>        
                <li>
                    <span class="st01">[일반:여]</span><span>공통 140 ~ 170, 선택 250 ~ 300</span>
                </li>
            </ul>
            <div class="bgimg"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_live07.jpg" title="CONTENTS 명"></div>
        </div>

        {{--예측참여현황--}}   
        <div class="viewbox" id="tab09">                      
            <div class="counter">
                <div class="NSK-Black">적중&합격예측 서비스 이용 : <span>986,129</span>건</div> 
                <p>
                    * 서비스 이용현황 : 사전예약 및 본서비스 + 봉투모의고사 + 파이널찍기특강 + 최신판례특강 + 라이브토크쇼 + 적중이벤트 등 서비스 이용 페이지뷰 합산<Br />
                    * 참여현황 : 사전예약, 성적채점, 설문조사, 시험후기, 토크쇼, 적중이벤트 참여건수 중복 합산 기준
                </p>
            </div>
            <div class="bgimg"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_live08.jpg" title="CONTENTS 명"></div>
        </div>

        {{--이벤트당첨--}}   
        <div class="viewbox" id="tab10">                         
            <ul class="liveTab02 slide01" >       
                <li>
                    <span>지금 바로 상품권 당첨자 발표합니다!</span>
                </li>  
            </ul>
            <div class="bgimg"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_live09.jpg" title="CONTENTS 명"></div>
        </div>

        {{--전화 인터뷰--}}   
        <div class="viewbox" id="tab11">                         
            <ul class="liveTab02 slide01" >       
                <li>
                    <span class="st01">[전화 인터뷰]</span><span>경찰 1차 시험 응시생, 부산캠퍼스 수험생 ***군 연결</span>
                </li>  
            </ul>
            <div class="bgimg"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_live10.jpg" title="CONTENTS 명"></div>
        </div>

        {{--실시간댓글 1--}}   
        <div class="viewbox" id="tab12">                         
            <ul class="liveTab02 slide01" >       
                <li>
                    <span class="st01">will***</span><span>영어 독해 시간안배 비결이 궁금합니다~</span>
                </li>  
            </ul>
            <div class="bgimg"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_live11.jpg" title="CONTENTS 명"></div>
        </div>

        {{--실시간댓글 2--}}   
        <div class="viewbox" id="tab13">                         
            <ul class="liveTab02 slide01" >       
                <li>
                    <span class="st01">poli***</span><span>한국사 고득점 비결이 궁금합니다~</span>
                </li>  
            </ul>
            <div class="bgimg"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_live11.jpg" title="CONTENTS 명"></div>
        </div>

        {{--실시간댓글 3--}}   
        <div class="viewbox" id="tab14">                         
            <ul class="liveTab02 slide01" >       
                <li>
                    <span class="st01">pass***</span><span>면접 준비 어떻게 하면 될까요?</span>
                </li>  
            </ul>
            <div class="bgimg"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_live11.jpg" title="CONTENTS 명"></div>
        </div>

        {{--실시간댓글 4--}}   
        <div class="viewbox" id="tab15">                         
            <ul class="liveTab02 slide01" >       
                <li>
                    <span class="st01">pass***</span><span>단기간 합격 비법이 있나요?</span>
                </li>  
            </ul>
            <div class="bgimg"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_live11.jpg" title="CONTENTS 명"></div>
        </div>
    </div> 

</div>


<script src="/public/js/willbes/jquery.counterup.min.js"></script>
<script src="/public/js/willbes/waypoints.min.js"></script>
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript">
	$(".slide01").bxSlider({
        speed:200,
        auto:true,
        randomStart:true,
        //pager:false,
        mode: 'vertical', //'horizontal', 'vertical', 'fade'
        controls:false
    })

    $(document).ready(function(){
        $('ul.tabSt1').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');

            $content = $($active[0].hash);

            $links.not($active).each(function () {
                $(this.hash).hide()});

            // Bind the click event handler
            $(this).on('click', 'a', function(e){
                $active.removeClass('active');
                $content.hide();

                $active = $(this);
                $content = $(this.hash);

                $active.addClass('active');
                $content.show();

                e.preventDefault()})})}
    );
    jQuery(document).ready(function( $ ) {
            $('.counter span').counterUp({
                delay: 11, // the delay time in ms
                time: 1000 // the speed time in ms
            });
        });    
</script>

@stop