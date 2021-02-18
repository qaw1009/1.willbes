@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .sky {position:fixed; top:250px;right:10px; width:200px; z-index:10;}
        .sky a {display:block;margin-bottom:15px;}

        .evtContent .intro {background:url("https://static.willbes.net/public/images/promotion/2020/11/1895_intro_bg.jpg") center top no-repeat; height:870px; position:relative}
        .evtContent .intro .number {width:1120px; margin:0 auto; position:relative}
        .evtContent .intro .number span {font-size:80px; color:#fafafa; font-family: 'Anton', sans-serif; position:absolute; letter-spacing:44px}
        .evtContent .intro .number span.n01 {top:132px; left:262px;}
        .evtContent .intro .number span.n02 {top:264px; left:130px;}
        .evtContent .intro .number span.n03 {top:402px; left:450px;}
        .evtContent .intro ul {position:absolute; top:590px; width:100%}
        .evtContent .intro ul li {text-align:center; color:#fff; font-size:18px}
        .evtContent .intro ul li span {padding-bottom:3px; border-bottom:2px solid #ccc}
        .evtContent .intro ul li:last-child {margin-top:40px; font-size:24px; line-height:1.5; letter-spacing:-1px}
        .evtContent .intro ul li strong {color:#ffc39e}

        .wb_top {background:#C2C2C2 url("https://static.willbes.net/public/images/promotion/2020/11/1899_top_bg.jpg") center top no-repeat}

        .wb_03  {background:#ADBBC8 url("https://static.willbes.net/public/images/promotion/2020/11/1899_03_bg.jpg") center top no-repeat}

        .wb_01s {background:#fff url(https://static.willbes.net/public/images/promotion/2021/01/0119_add_bg.jpg) no-repeat center top;}

        .wb_04  {background:#E1D3CA;}

        .wb_05  {background:#E1D3CA;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer"> 
        <div class="sky">           
            <a href="#to_go">
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1899_sky01.png" alt="" >     
            </a>      
            <a href="#apply">
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1899_sky02.png" alt="" >     
            </a>    
            <a href="https://pass.willbes.net/promotion/index/cate/3022/code/2028#apply" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1899_sky03.png" alt="" >     
            </a>              
        </div>     

        <div class="evtCtnsBox intro">
            <div class="number">
                <span id="counter1" class="n01">30</span>
                <span id="counter2" class="n02">6800</span>
                <span id="counter3" class="n03">370</span>
            </div>
            <ul>
                <li><span>그 열정은 합격을 향한 ‘프로로서의 집념’에서 시작되었습니다.</span></li>
                <li class="NSK-Black">
                    한 교실에 다 담기에 벅찰 정도로<br>
                    많은 실강생들과 나누었던 현장의 뜨거운 열기를<br>
                    <strong>이제, 온라인에서 전하고자 합니다.</strong><br>
                </li>
            </ul>
        </div>      

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1899_top.jpg" alt="신석 교수님" />  
        </div>       

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1899_01.jpg" alt="영어 학습 신세계" />  
        </div>     

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1899_02.jpg" alt="가장 고민하는 과목 영어" />  
        </div>     

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1899_03.jpg" alt="프로그램 스타트" />  
        </div> 

        <div class="evtCtnsBox wb_01s">
			<img src="https://static.willbes.net/public/images/promotion/2021/01/0119_add.jpg" alt="지금 바로 고민 타파하러 가기" usemap="#Map0119_add" border="0">
			<map name="Map0119_add" id="Map0119_add">
				<area shape="rect" coords="362,943,760,1017" href="https://pass.willbes.net/promotion/index/cate/3022/code/2028" target="_blank" />
			</map>
        </div>	

        <div class="evtCtnsBox wb_04" id="to_go">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1899_04.jpg" alt="패키지 바로 구매하기" usemap="#Map1899_buy" border="0"/>
            <map name="Map1899_buy" id="Map1899_buy">
                <area shape="rect" coords="226,898,496,958" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/179260" target="_blank" />
            </map>
        </div>  

        <div class="evtCtnsBox wb_05" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1899_05.jpg" alt="수강신청" usemap="#Map1899_apply" border="0"/>
            <map name="Map1899_apply" id="Map1899_apply">
                <area shape="rect" coords="266,594,474,655" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/178820" target="_blank" />
                <area shape="rect" coords="671,596,878,653" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/178819" target="_blank" />
                <area shape="rect" coords="88,1262,295,1319" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/178490" target="_blank" />
                <area shape="rect" coords="471,1261,680,1321" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/179257" target="_blank" />
                <area shape="rect" coords="843,1260,1052,1321" href="javascript:alert('Coming Soon!')" />
            </map>
        </div>  

    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.counterup.min.js"></script>
    <script src="/public/js/willbes/waypoints.min.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function( $ ) {
        $('#counter1').counterUp({
            delay: 10, // the delay time in ms
            time: 500 // the speed time in ms
        });
        $('#counter2').counterUp({
            delay: 10, // the delay time in ms
            time: 1500 // the speed time in ms
        });
        $('#counter3').counterUp({
            delay: 10, // the delay time in ms
            time: 1000 // the speed time in ms
        });
    });
    </script>

@stop