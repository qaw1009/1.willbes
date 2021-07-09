@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .sky {position:fixed; top:250px; right:10px; width:130px; z-index:1;}
        .sky a {display:block; margin-bottom:10px;}
 
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/07/2055_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:#b78c62; padding:100px 0 40px}
        .wb_cts01 .tImg {width:900px; margin:0 auto}
        .wb_cts01 .tImg li {display: inline; float:left; width:calc(50%); padding-left:60px; text-align:left; margin-bottom:80px}
        .wb_cts01 .tImg div {margin-bottom:20px; border-left:5px solid #000; padding-left:20px; font-size:20px; line-height:1.4}    
        .wb_cts01 .tImg div strong {color:#9b0109}
        .wb_cts01 .tImg div p {font-size:32px}
        .wb_cts01 .tImg:after {content:''; display:block; clear:both}    

        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2021/07/2055_02_bg.jpg)}

        .wb_cts03 {background:url(https://static.willbes.net/public/images/promotion/2021/07/2055_04_bg01.jpg) no-repeat center top; padding:100px 0;}  
        
        .wb_cts04 {background:url(https://static.willbes.net/public/images/promotion/2021/07/2055_04_bg02.jpg); padding-bottom:100px;} 
        
        .evtCtnsBox .subBox {margin:60px auto; text-align:left; width:920px; padding-left:40px; }
        .evtCtnsBox .subBox .NSK-Black {font-size:24px;  margin-bottom:30px; color:#fff; margin:50px auto 20px} 
        .evtCtnsBox .subBox a {position:relative; font-size:20px; display:inline-block; margin-right:20px; margin-bottom:20px}
        .evtCtnsBox .subBox p {position:absolute; top:10px; left:20px; line-height:1.4; font-weight:bold;}
        .evtCtnsBox .subBox a span {font-size:14px; color:#f14077}
        .evtCtnsBox .subBox a:hover {color:#5b12da;}
      
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">      

        <div class="sky">
            <a href="#apply_2021"><img src="https://static.willbes.net/public/images/promotion/2021/02/2055_sky.png"  title="2021 필수특강 바로가기" /></a>
            <a href="#apply_2022"><img src="https://static.willbes.net/public/images/promotion/2021/02/2055_sky2.png"  title="2022 필수특강 바로가기" /></a>
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_top.jpg" alt="필수특강"  />            
        </div>

        <div class="evtCtnsBox wb_cts01">
            <ul class="tImg">
                <li>
                    <div>
                        저절로 이행가 되는 <strong>강제주입 학습법</strong>
                        <p class="NSK-Black">신광은</p>
                    </div>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_live01.gif" alt="신광은" />
                </li>
                <li>
                    <div>
                        일단 믿고 보는 <strong>만점 적중률 학습법</strong>
                        <p class="NSK-Black">장정훈</p>
                    </div>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_live02.gif" alt="장정훈" />
                </li>
                <li>
                    <div>
                        가장 빠르고 확실한 <strong>키워드 학습법</strong>
                        <p class="NSK-Black">김원욱</p>
                    </div>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_live03.gif" alt="김원욱" />
                </li>
                <li>
                    <div>
                        누구나 가장 쉽고 재밌게 <strong>즐기는 학습법</strong>
                        <p class="NSK-Black">이국령</p>
                    </div>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_live04.gif" alt="이국령" />
                </li>
            </ul>
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_02.jpg" alt="필수특강"  />            
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_tit01.png" alt="2021 필수특강" id="apply_2021"/>
            <div class="subBox">
                <div class="NSK-Black">형사소송법</div>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/177228" target="_blank">
                    <p><span>2021 합격필수</span><br/>
                    최신 개정법령 및<br/> 판례</p>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_01.png" alt=""/>
                </a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/179738" target="_blank">
                    <p><span>2021 합격필수</span><br/>
                    형소법 1개년<br/> 최신판례</p>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_01.png" alt=""/>
                </a>

                <div class="NSK-Black mt50">경찰학개론</div>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/177660" target="_blank">
                    <p><span>2021 합격필수</span><br/>
                    위원회<br/> 총정리 특강</p>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_02.png" alt=""/>
                </a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/177365" target="_blank">
                    <p><span>2021 합격필수</span><br/>
                    최신 개정법령</p>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_02.png" alt=""/>
                </a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/178782" target="_blank">
                    <p><span>2021 합격필수</span><br/>
                    경찰학<br/> 숫자 특강</p>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_02.png" alt=""/>
                </a>

                <div class="NSK-Black mt50">형법</div>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/178535" target="_blank">
                    <p><span>2021 합격필수</span><br/>
                    최신 기출<br/> 및 판례</p>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_03.png" alt=""/>
                </a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/182612" target="_blank">
                    <p><span>2021 합격필수</span><br/>
                    횡령/배임 <br/>전합판례 반영</p>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_03.png" alt=""/>
                </a>
                <br/>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/170566" target="_blank">
                    <p><span>2021 합격필수</span><br/>
                    원.자.행 <br/>& 불능미수</p>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_01.png" alt=""/>
                </a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/169145" target="_blank">
                    <p><span>2021 합격필수</span><br/>
                    횡령죄</p>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_01.png" alt=""/>
                </a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/168198" target="_blank">
                    <p><span>2021 합격필수</span><br/>
                    배임죄</p>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_01.png" alt=""/>
                </a>
                <br/>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/168022" target="_blank">
                    <p><span>2021 합격필수</span><br/>
                    공범과 신분</p>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_01.png" alt=""/>
                </a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/167489" target="_blank">
                    <p><span>2021 합격필수</span><br/>
                    구성요건착오 <br/>& 위.전.착</p>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_01.png" alt=""/>
                </a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/167023" target="_blank">
                    <p><span>2021 합격필수</span><br/>
                    죄수론</p>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_01.png" alt=""/>
                </a>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_tit02.png" alt="2022 필수특강" id="apply_2022"/>
            <div class="subBox">
                <div class="NSK-Black">형사법</div>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180325" target="_blank">
                    <p><span>2022 합격필수</span><br/>
                    기본기 특강</p>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_01.png" alt=""/>
                </a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180748" target="_blank">
                    <p><span>2022 합격필수</span><br/>
                    형사법<br> 입문기초</p>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_01.png" alt=""/>
                </a>

                <div class="NSK-Black">경찰학</div>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180566" target="_blank">
                    <p><span>2022 합격필수</span><br/>
                    경찰학<br> 입문기초</p>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_02.png" alt=""/>
                </a>

                <div class="NSK-Black">헌법</div>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180567" target="_blank">
                    <p><span>2022 합격필수</span><br/>
                    헙법<br> 입문기초</p>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_03.png" alt=""/>
                </a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/183520" target="_blank">
                    <p><span>2022 합격필수</span><br/>
                    헙법<br> 입문기본이론</p>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2055_04_04.png" alt=""/>
                </a>
            </div>

        </div>

    </div>
    <!-- End Container -->

@stop