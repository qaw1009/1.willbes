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
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/   

        .evt_top {background:#FBD5C8 url(https://static.willbes.net/public/images/promotion/2020/06/1700_top_bg.jpg) no-repeat center top;}

        .evt_01 {background:url(https://static.willbes.net/public/images/promotion/2020/06/1700_01_bg.jpg) no-repeat center top;}

        .evt_03 {background:#4b4b4b}

        .evt_04 {background:#fff; padding-bottom:150px}
        .evt_04_list {width:980px; margin:0 auto;}  
        .evt_04_list li {float:left; padding-right:35px; height:460px}
        .evt_04_list li .on {display:none}
        .evt_04_list li .off {display:block}
        .evt_04_list li:hover .on {display:block}
        .evt_04_list li:hover .off {display:none}
        .evt_04_list li:last-child{padding-right:0;}
        .evt_04_list:after {content:""; display:block; clear:both}

        .evt_04s {background:#4B4B4B}
        .evt_05 {background:#37bdc6}
        .evt_06 {background:#000 url(https://static.willbes.net/public/images/promotion/2020/05/1636_07_bg.jpg) no-repeat center top;}   

        </style> 

    <div class="p_re evtContent NSK" id="evtContainer">   

        <div class="evtCtnsBox evt_top" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1700_top.jpg" alt="7급 더 파이널" />
        </div>     

        <div class="evtCtnsBox evt_01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1700_01.jpg" alt="마지막 문제풀이" />
        </div>

        <div class="evtCtnsBox evt_02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1700_graph.gif" alt="파이널 강좌" />
        </div>

        <div class="evtCtnsBox evt_04" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1700_01_words.jpg" alt="문구" />
            <ul class="evt_04_list">
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1636_04_01.png" title="국어" class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1636_04_01_on.png" title="국어" class="on"/>                      
                </li>            
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1636_04_02.png" title="영어" class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1636_04_02_on.png" title="영어" class="on"/>                       
                </li>            
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1636_04_03.png" title="한국사" class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1636_04_03_on.png" title="한국사" class="on"/>                       
                </li>                     
            </ul>
        </div>

        <div class="evtCtnsBox evt_04s" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1700_02.jpg" alt="신청하기" usemap="#Map1700a" border="0" />
            <map name="Map1700a" id="Map1700a">
                <area shape="rect" coords="710,394,925,452" href="https://pass.willbes.net/package/show/cate/3020/pack/648002/prod-code/167059" target="_blank" />
                <area shape="rect" coords="713,648,924,704" href="https://pass.willbes.net/package/show/cate/3020/pack/648001/prod-code/167062" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox evt_06" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1636_07.jpg" alt="합격을 확신" />
        </div>        

    </div>
    <!-- End Container -->
@stop