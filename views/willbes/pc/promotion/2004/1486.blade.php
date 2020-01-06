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

.skyBanner {position:fixed; bottom:200px;right:0;z-index:10;}
.evt_top {background:#31373a url(https://static.willbes.net/public/images/promotion/2020/01/1486_top_bg.jpg) no-repeat center top;}
.evt01{background:#e8e8e8;}
.evt02{background:#2e54a7;position:relative;}

.evt03{background:#bd2b2b;position:relative;}

.evt04{background:#e8e8e8;}

/* 유튜브1 */
.YouTube {width:920px; margin:0 auto; text-align:center;position:absolute;left:50%;margin-left:-460px;bottom:-10px;}
.YouTube li {display:inline; float:left; width:25%;padding-bottom:130px;}
.YouTube li span {margin-top:20px; font-size:16px !important; font-weight:500 !important; color:#fff; letter-spacing:-1px;}
.YouTube li iframe {width:220px; margin:0 auto; height:135px;padding-bottom:10px;}
.YouTube:after {content:""; display:block; clear:both}

/* 유튜브2 */
.YouTube2 {width:920px; margin:0 auto; text-align:center;position:absolute;left:50%;margin-left:-460px;bottom:-25px;}
.YouTube2 li {display:inline; float:left; width:20%;padding-bottom:165px;}
.YouTube2 li span {margin-top:20px; font-size:16px !important; font-weight:500 !important; color:#fff; letter-spacing:-1px;}
.YouTube2 li iframe {width:180px; margin:0 auto; height:100px;padding-bottom:10px;}
.YouTube2:after {content:""; display:block; clear:both}

</style>


    <div class="evtContent NGR" id="evtContainer">     

        <div class="skyBanner">
            <a href="#apply">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/1486_sky.png"> 
            </a>          
        </div>

        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1486_top.gif" alt="0원 무료특강">   
        </div>

        <div class="evtCtnsBox evt01">          
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1486_01.jpg" alt="포인트">   
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1486_02s.jpg" alt="세령국어" usemap="#Map1486b" border="0">
            <map name="Map1486b" id="Map1486b">
                <area shape="rect" coords="889,469,1019,544" href="#apply" />
            </map>
            <ul class="YouTube">
                <li>
                <iframe src="https://www.youtube.com/embed/rcpofnoU0dI" frameborder="0" allowfullscreen></iframe>
                <span>『고대 국어』 문법 정리</span>
                </li>
                <li>
                <iframe src="https://www.youtube.com/embed/p-2GNwdWw7U" frameborder="0" allowfullscreen></iframe>
                <span>『전기 중세국어』 문법 정리</span>
                </li>
                <li>
                <iframe src="https://www.youtube.com/embed/RrTcDw3LN_A" frameborder="0" allowfullscreen></iframe>
                <span>『훈민정음 창제와 소실』 정리</span>
                </li>
                <li>
                <iframe src="https://www.youtube.com/embed/e8t_WyToqlE" frameborder="0" allowfullscreen></iframe>
                <span>『근대국어~』 정리</span>
                </li>               
            </ul>          
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1486_03s.jpg" alt="양익 생활영어">
            <ul class="YouTube2">
                <li>
                <iframe src="https://www.youtube.com/embed/vpo520IqX98" frameborder="0" allowfullscreen></iframe>
                <span>『안부/인사』 관련 주요표현</span>
                </li>
                <li>
                <iframe src="https://www.youtube.com/embed/s-wxPmbQimw" frameborder="0" allowfullscreen></iframe>
                <span>『전화』 관련 주요표현</span>
                </li>
                <li>
                <iframe src="https://www.youtube.com/embed/8RjWtZo8yJE" frameborder="0" allowfullscreen></iframe>
                <span>『항공편 예약 및 공항』 표현</span>
                </li>
                <li>
                <iframe src="https://www.youtube.com/embed/UhQz9zyvCDM" frameborder="0" allowfullscreen></iframe>
                <span>『출제가능 이디엄 Big3』</span>
                </li>  
                <li>
                <iframe src="https://www.youtube.com/embed/v-BGrQrX3VM" frameborder="0" allowfullscreen></iframe>
                <span>『화재』 관련 주요표현</span>
                </li>                
            </ul>          
        </div>

        <div class="evtCtnsBox evt04" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1486_04.jpg" alt="신청하기" usemap="#Map1486a" border="0">
            <map name="Map1486a" id="Map1486a">
                <area shape="rect" coords="272,730,531,815" href="https://pass.willbes.net/pass/support/notice/show?board_idx=246583" target="_blank" />
            </map>  
        </div>                         
              
    </div>
    <!-- End Container --> 

    <script type="text/javascript">
        
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop