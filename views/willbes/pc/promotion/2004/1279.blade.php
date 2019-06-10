@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
<style type="text/css">
        .subContainer {
    min-height:auto !important;
    margin-bottom:0 !important;
}
.evtContent { 
    position:relative;            
    width:100% !important;
    margin-top:20px !important;
    padding:0 !important;
    background:#fff;
}	
.evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

/*****************************************************************/  

.evtTop {
    background:#d1c888 url(https://static.willbes.net/public/images/promotion/2019/06/1279_top_bg.jpg) no-repeat center top;
}
.evtTop > div {width:1120px; margin:0 auto; position:relative;}
.evtTop > div span {position:absolute; width:120px; z-index: 1;}
.evtTop > div span.txt1 {top:52px; left:847px; animation:slidein1 0.2s ease-in; -webkit-animation:slidein1 0.2s ease-in;}
@@keyframes slidein1 {
    from {
    left:605px; opacity: 0;
    }
    to {
    left:847px; opacity: 1;
    }
}

.evtMenu {width:100%; background:#d1c888;}
.evtMenu ul {width:1120px; margin:0 auto}
.evtMenu li {display:inline; float:left; width:20%; position: relative;}
.evtMenu li a {
    display:block; text-align:center; padding:30px 0; color:#c7b29a; font-size:22px; font-weight:900; 
    background:#a79681; margin-right:5px;
}
.evtMenu li:last-child() {margin-right:0}
.evtMenu li a strong {position:absolute; top:-10px; left:50%; margin-left:-50px; font-size:14px; width: 100px; text-align:center; background:#d18f04; color:#fff;
    height: 30px; line-height: 30px; border-radius: 15px;
}
.evtMenu li a span {font-weight:normal; font-size:16px}
.evtMenu li a div {margin-top:8px}
.evtMenu li:hover a,
.evtMenu li a.active {background:#fff; color:#8a4e09}
.evtMenu ul:after {content:""; display:block; clear:both}

.assayTab {width:980px; margin:30px auto}
.assayTab li {display:inline; float:left; width:14.28571%;}
.assayTab li a {display:block; border-radius:15px; background:#fff; color:#959595; text-align: center; border:2px solid #959595; margin:0 2px;
font-size:16px; padding:10px 0; line-height: 1.5;
}
.assayTab li a.active,
.assayTab li a:hover {background:#959595; color:#fff;}
.assayTab:after {content:""; display:block; clear:both}

.tabCts {
    position:relative; width:1120px; margin:0 auto; text-align:center;
}
.tabCts .youtube {width:100%; text-align:center; margin:3em 0}	
.tabCts .youtube iframe {width:800px; height:453px; margin:0 auto}
.tabCts p {margin-bottom:50px}

.cts01 {width:998px; margin:15px auto 0}
.cts01 li {display:inline; float:left; width:50%}
.cts01 li a {display:block; text-align:center; font-size:20px; background:#36374d; color:#fed919; margin:0 15px 15px 0; height:85px; line-height:85px}
.cts01 li a:hover {color:#fff}
.cts01 li:nth-child(2) a,
.cts01 li:last-child a {margin-right:0}
.cts01:after {content:""; display:block; clear:both}

.content_2_wrap,
.content_4_wrap {width:980px; margin:0 auto; text-align: left}
.youtubeTab {width:856px; margin:0 auto 30px;}
.youtubeTab li {display:inline; float:left; width:14.28571%;}
.youtubeTab li a {display:block; border-radius:15px; background:#fff; color:#959595; text-align: center; border:2px solid #959595; margin:0 2px;
    font-size:14px; padding:15px 0; line-height: 1.5;
}
.youtubeTab li a.active,
.youtubeTab li a:hover {background:#959595; color:#fff;}
.youtubeTab:after {content:""; display:block; clear:both}
.content_2_wrap .youtubeCts {margin-bottom:100px;}

/*레이어팝업*/
.Pstyle {
    opacity: 0;
    display: none;
    position: relative;
    width: auto;    
    padding: 20px;
    background: #000;
}
.b-close {
    position: absolute;
    right: 5px;
    top: 5px;
    padding: 5px;
    display: inline-block;
    cursor: pointer;
    color:#fff;
}
.Pstyle .content {height:auto; width:auto;}

#movieFrame {position:relative; width:980px; height:551px; margin:0 auto; padding-top:14px;}
.embedWrap {position:relative; width:980px; height:551px; margin:0 auto}
.embed-container {padding-bottom:46.25%; overflow:hidden; width:100%; min-height:551px; margin:0 auto}  
        
/*크롬*/
@@media screen and (-webkit-min-device-pixel-ratio:0) {
#movieFrame {position:relative; width:1120px; height:694px; margin:0 auto; padding-top:14px;}
.embedWrap {position:relative; width:980px; height:551px; margin-left:70px; background:url(https://static.willbes.net/public/images/promotion/2019/05/1244_04_3.jpg) no-repeat center center;}
.embed-container {padding-bottom:46.25%; overflow:hidden; width:980px; height:auto; margin:0 auto;}
.mobileCh {position:absolute; left:0; bottom:0; width:980px;}
.mobileCh li {display:inline; float:left; width:490px;}
.mobileCh li a {display:block;}
.mobileCh li a.ch2 {color:#6CF}
.mobileCh li a:hover {color:#FC0}
.mobileCh:after {content:""; display:block; clear:both}
} 

/*모바일*/
.mobileCh {position:absolute; bottom:0; width:980px;}
.mobileCh li {display:inline; float:left; width:50%;}
.mobileCh li a {display:block;}
.mobileCh li:last-child a {margin:0}
.mobileCh li a.ch2 {color:#6CF}
.mobileCh li a:hover {color:#FC0}
.mobileCh:after {content:""; display:block; clear:both}

.note {width:980px; margin:0 auto; text-align: left; margin-bottom:100px; line-height: 1.5}
.noteWrap {border:1px solid #ccc; padding:30px}
.noteWrap ul {margin-bottom:30px}
.noteWrap ul li {display:inline; float:left; width: 50%}
.noteWrap ul li a {display:block; margin-right:10px; height: 50px; line-height: 50px; text-align: center; 
    background:#fff; border:1px solid #a5895b; color:#a5895b; font-size:16px; font-weight: bold;
}
.noteWrap ul li:last-child a {margin:0}
.noteWrap ul li a.active,
.noteWrap ul li a:hover {background:#a5895b; color:#fff}
.noteWrap ul:after {content:""; display:block; clear:both}

.noteWrap table {width:100%; border-top:1px solid #cdcdcd; border-left:1px solid #cdcdcd; margin-bottom:30px}
.noteWrap th,
.noteWrap td{padding:8px; border-bottom:1px solid #cdcdcd; border-right:1px solid #cdcdcd}
.noteWrap thead th,
.noteWrap tbody th {text-align:center; font-weight:bold; border-right:1px solid #cdcdcd; background:#f0f0f0}

.noteWrap2 table {width:980px; margin:0 auto; border-top:1px solid #cdcdcd; border-left:1px solid #cdcdcd; margin-bottom:30px;}
.noteWrap2 th,
.noteWrap2 td{padding:8px; border-bottom:1px solid #cdcdcd; border-right:1px solid #cdcdcd; line-height: 1.4}
.noteWrap2 thead th,
.noteWrap2 tbody th {text-align:center; font-weight:bold; border-right:1px solid #cdcdcd; background:#f0f0f0}
.noteWrap2 tbody tr:hover {background:#e4e4e4}

.noteWrap h5 {font-size:16px; font-weight: bold; margin-bottom:20px}
.noteWrap ol li {list-style-type: decimal; margin-left:20px}
.noteWrap ol {margin-bottom:20px}
.noteWrap p {margin:0}
</style>


    <div class="evtContent NGR" id="evtContainer">      

        <div class="evtCtnsBox evtTop">
            <div>
                <span class="txt1"><img src="https://static.willbes.net/public/images/promotion/2019/06/1279_top_img1.png" title="출제경향" /></span>
                <img src="https://static.willbes.net/public/images/promotion/2019/06/1279_top.jpg" title="2019 국가직 9급 풀캐어 서비스" />
            </div>
        </div>

        <div class="evtCtnsBox evtMenu NGEB" id="evtMenu">                
            <ul>
                <li>
                    <a id='tab1' href="{{ site_url('/pass/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1279/spidx/2?tab=1#content_1') }}" class="active">
                        <span>합격을 위한 최종점검</span>
                        <div>6/16 전국 모의고사</div>
                    </a>
                </li>
                <li>                    
                    <a id='tab2' href="{{ site_url('/pass/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1279/spidx/2?tab=1#content_2') }}">
                        <strong>무료응시</strong>
                        <span>미리 보는 시험</span>
                        <div>마무리 전략</div>				
                    </a>
                </li>
                <li>
                    {{--<a id='tab3' href="{{ site_url('/pass/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1279/spidx/2?tab=1#content_3') }}"> --}}
                    <a id='tab3' href="#" onclick="javascript:alert('준비중입니다.'); return false;">                      
                        <span>2019 군무원 시험</span>
                        <div>문제복원 이벤트</div>
                    </a>
                </li>     
                <li>
                    {{--<a id='tab4' href="{{ site_url('/pass/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1279/spidx/2?tab=1#content_4') }}">--}}
                    <a id='tab4' href="#" onclick="javascript:alert('준비중입니다.'); return false;"> 
                        <span>공유해보아요!</span>
                        <div>시험후기 이벤트</div>
                    </a>
                </li>
                <li>
                    {{--<a id='tab5' href="{{ site_url('/pass/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1279/spidx/2?tab=1#content_5') }}">--}}
                    <a id='tab5' href="#" onclick="javascript:alert('준비중입니다.'); return false;">  
                        <span>합격까지 풀케어</span>
                        <div>군무원 단독 면접반</div>
                    </a>
                </li>
            </ul>
        </div>

        <div id="content_1" class="tabCts pb90">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1279_tab01_01.jpg" usemap="#Map1279A" title="군무원 마무리 전략 특강" border="0" /><br>
            <map name="Map1279A" id="Map1279A">
                <area shape="rect" coords="239,533,477,582" href="#none" alt="온라인무료수강신청" />
                <area shape="rect" coords="240,585,478,635" href="#none" alt="학원실강수강신청" />
                <area shape="rect" coords="257,966,469,1016" href="#none" alt="권기태국어" />
                <area shape="rect" coords="653,964,864,1016" href="#none" alt="전수환경영학" />
            </map>
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1279_tab01_02.jpg" title="시험전, 당일 유의사항" />
            <ul class="cts01">
                <li><a href="https://pass.willbes.net/support/examAnnouncement/show/cate/3024?board_idx=228246&" target="_blank"><strong>국방부</strong> 공고문 확인하기 ▶</a></li>
                <li><a href="https://pass.willbes.net/support/examAnnouncement/show/cate/3024?board_idx=228252&" target="_blank"><strong>육군</strong> 공고문 확인하기 ▶</a></li>
                <li><a href="#" onclick="javascript:alert('준비중입니다.'); return false;"><strong>공군</strong> 공고문 확인하기 ▶</a></li>
                <li><a href="#" onclick="javascript:alert('준비중입니다.'); return false;"><strong>해군</strong> 공고문 확인하기 ▶</a></li>
            </ul>
        </div>

        <div id="content_2" class="tabCts pb90 pt100">               
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1279_tab02_01.jpg" usemap="#Map1279B" title="윌비스 군무원 전국모의고사" border="0" />
            <map name="Map1279B" id="Map1279B">
                <area shape="rect" coords="755,2208,973,2249" href="https://pass.willbes.net/pass/event/show/ongoing?event_idx=271&amp;" target="_blank" alt="모의과사신청하기" />
            </map>
        </div>


        <div id="content_3" class="tabCts">
            
        </div>


        <div id="content_4" class="tabCts">

        </div>


        <div id="content_5" class="tabCts">

        </div>   
        
              
    </div>
    <!-- End Container --> 

    <script type="text/javascript">	
        /*tab*/
        $(document).ready(function(){
            var cnt;
            var tab_id = '{{ $arr_base['tab_id'] }}';
            $('#tab'+tab_id).addClass('active');
            $('.evtMenu ul > li').each(function(item){
                cnt = item + 1;
                $("#content_"+cnt).hide();
                if (tab_id == cnt) {
                    $("#content_"+cnt).show();
                }
            });
        });
    </script>
@stop