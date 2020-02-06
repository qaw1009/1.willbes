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

.skybanner {position:fixed; top:200px; right:20px; z-index:1;}
.evt_top {background:#2e171e url(https://static.willbes.net/public/images/promotion/2020/02/1486_top_bg.jpg) no-repeat center top;}

.evt01{background:#f0f0f0;}

.evt02_top{background:#8a7c96;position:relative;}
.evt02_bottom{background:#8a7c96;position:relative;}

.evt03{background:#2e2044;position:relative;}

.evt04{background:#f0f0f0;}

.YouTube {width:920px; margin:0 auto; text-align:center;position:absolute;left:50%;margin-left:-460px;bottom:-65px;}
.YouTube li {display:inline; float:left; width:25%;padding-bottom:130px;}
.YouTube li span {margin-top:20px; font-size:15px !important; font-weight:500 !important; color:#fff; letter-spacing:-1px;}
.YouTube .text{position:absolute;left:50%;top:115px;}
.YouTube .text01{left:60px;}
.YouTube .text02{left:270px;}
.YouTube .text03{left:490px;}
.YouTube .text04{left:750px;}
.YouTube:after {content:""; display:block; clear:both}

.YouTube3 {width:920px; margin:0 auto; text-align:center;}
.YouTube3 li span {margin-top:20px; font-size:15px !important; font-weight:500 !important; color:#fff; letter-spacing:-1px;}
.YouTube3 .text{position:absolute;left:50%;top:90px;}
.YouTube3 li:nth-child(1){position:absolute;left:50%;margin-left:-500px;top:550px;}
.YouTube3 li:nth-child(1) span{left:30px;}
.YouTube3 li:nth-child(2){position:absolute;left:50%;margin-left:-300px;top:550px;}
.YouTube3 li:nth-child(2) span{left:30px;}
.YouTube3 li:nth-child(3){position:absolute;left:50%;margin-left:-100px;top:550px;}
.YouTube3 li:nth-child(3) span{left:40px;}
.YouTube3 li:nth-child(4){position:absolute;left:50%;margin-left:100px;top:550px;}
.YouTube3 li:nth-child(4) span{left:30px;}
.YouTube3 li:nth-child(5){position:absolute;left:50%;margin-left:300px;top:550px;}
.YouTube3 li:nth-child(5) span{left:30px;}
.YouTube3 li:nth-child(6){position:absolute;left:50%;margin-left:-400px;top:700px;}
.YouTube3 li:nth-child(6) span{left:30px;}
.YouTube3 li:nth-child(7){position:absolute;left:50%;margin-left:-200px;top:700px;}
.YouTube3 li:nth-child(7) span{left:20px;}
.YouTube3 li:nth-child(8){position:absolute;left:50%;margin-left:0;top:700px;}
.YouTube3 li:nth-child(8) span{left:20px;}
.YouTube3 li:nth-child(9){position:absolute;left:50%;margin-left:200px;top:700px;}
.YouTube3 li:nth-child(9) span{left:20px;}
.YouTube3:after {content:""; display:block; clear:both}

.YouTube2 {width:920px; margin:0 auto; text-align:center;position:absolute;left:50%;margin-left:-460px;bottom:-25px;}
.YouTube2 li {display:inline; float:left; width:20%;padding-bottom:165px;}
.YouTube2 li span {margin-top:20px; font-size:14px !important; font-weight:500 !important; color:#fff; letter-spacing:-1px;}
.YouTube2 .text{position:absolute;left:50%;top:90px;}
.YouTube2 .text01{left:30px;}
.YouTube2 .text02{left:220px;}
.YouTube2 .text03{left:395px;}
.YouTube2 .text04{left:580px;}
.YouTube2 .text05{left:770px;}
.YouTube2:after {content:""; display:block; clear:both}

</style>


    <div class="evtContent NGR" id="evtContainer">     

        <div class="skybanner">
            <a href="https://pass.willbes.net/pass/support/notice/show?board_idx=255632" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_sky.png" alt="소방영어 특강">
            </a>
        </div>
            
        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_top.jpg" alt="0원 무료특강">   
        </div>

        <div class="evtCtnsBox evt01">          
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_01.jpg" alt="포인트">   
        </div>

        <div class="evtCtnsBox evt02_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_02_top.jpg" alt="4시간 마스터 특강">     
            <ul class="YouTube">
                <li>
                    <a href="https://www.youtube.com/watch?v=rcpofnoU0dI&t=310s" target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_02_top01.jpg" alt="">
                        </span>
                        <span class="text text01">『고대 국어』 문법 정리</span>
                    </a>    
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=p-2GNwdWw7U&t=1s" target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_02_top02.jpg" alt="">
                        </span>
                        <span class="text text02">『전기 중세국어』 문법 정리</span>
                    </a>    
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=RrTcDw3LN_A&t=4s" target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_02_top03.jpg" alt="">
                        </span>
                        <span class="text text03">『훈민정음 창제와 소실』 정리</span>
                    </a>    
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=e8t_WyToqlE" target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_02_top04.jpg" alt="">
                        </span>
                        <span class="text text04">『근대국어~』 정리</span>
                    </a>    
                </li>               
            </ul>          
        </div>

        <div class="evtCtnsBox evt02_bottom">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_02_bottom.jpg" alt="벼락치기 특강" usemap="#Map1486b" border="0">
            <map name="Map1486b" id="Map1486b">
                <area shape="rect" coords="889,469,1019,544" href="#apply" />
            </map>
            <ul class="YouTube3">
                <li>
                    <a href="https://www.youtube.com/watch?v=gVNV0Ev82bE&t=618s" target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_02_bottom01.jpg" alt="">
                        </span>
                        <span class="text text1">『한글 맞춤법 제1항』</span>
                    </a>    
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=6I6HDVEMM-E&t=3s" target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_02_bottom02.jpg" alt="">
                        </span>
                        <span class="text text2">『한글 맞춤법 제19항』</span>
                    </a>    
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=H7OL6A_rSmY" target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_02_bottom03.jpg" alt="">
                        </span>
                        <span class="text text3">『표준어법 제1항』</span>
                    </a>    
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=yXmrJHfDK7A" target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_02_bottom04.jpg" alt="">
                        </span>
                        <span class="text text4">『표준어법 제12항』</span>
                    </a>    
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=um2YHYDQBKI" target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_02_bottom05.jpg" alt="">
                        </span>
                        <span class="text text5">『표준어법 제22항』</span>
                    </a>    
                </li>    
                <li>
                    <a href="https://www.youtube.com/watch?v=UFiEZb0E4Ag" target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_02_bottom06.jpg" alt="">
                        </span>
                        <span class="text text6">『띄어쓰기 41항 조사』</span>
                    </a>    
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=nHk_FbkZbuc" target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_02_bottom07.jpg" alt="">
                        </span>
                        <span class="text text7">『띄어쓰기 42항 의존명사』</span>
                    </a>    
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=-BS6PmNG9hI" target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_02_bottom08.jpg" alt="">
                        </span>
                        <span class="text text8">『띄어쓰기 43항 단위명사』</span>
                    </a>    
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=K0x4wqa3pfI" target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_02_bottom09.jpg" alt="">
                        </span>
                        <span class="text text9">『띄어쓰기 합성어와 구』</span>
                    </a>    
                </li>
            </ul>          
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_03.jpg" alt="생활영어 적중편">
            <ul class="YouTube2">
                <li>
                    <a href="https://www.youtube.com/watch?v=vpo520IqX98&t=10s" target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_03_01.jpg" alt="">
                        </span>
                        <span class="text text01">『안부/인사』 관련 주요표현</span>
                    </a>    
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=s-wxPmbQimw&t=13s" target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_03_02.jpg" alt="">
                        </span>
                        <span class="text text02">『전화』 관련 주요표현</span>
                    </a>    
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=8RjWtZo8yJE&t=10s" target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_03_03.jpg" alt="">
                        </span>
                        <span class="text text03">『항공편 예약 및 공항』 표현</span>
                    </a>    
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=UhQz9zyvCDM" target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_03_04.jpg" alt="">
                        </span>
                        <span class="text text04">『출제가능 이디엄 Big3』</span>
                    </a>    
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=v-BGrQrX3VM&t=7s" target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_03_05.jpg" alt="">
                        </span>
                        <span class="text text05">『화재』 관련 주요표현</span>
                    </a>    
                </li>              
            </ul>          
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1486_04.jpg" alt="신청하기" usemap="#Map1486z" border="0">
            <map name="Map1486z" id="Map1486z">
                <area shape="rect" coords="336,785,576,833" href="https://pass.willbes.net/pass/support/notice/show?board_idx=255632" target="_blank" />
            </map>
        </div>                         
              
    </div>
    <!-- End Container --> 

    <script type="text/javascript">
        
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop