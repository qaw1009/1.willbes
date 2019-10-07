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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            bottom:50px;
            right:10px;
            z-index:1;
        }
        .skybanner a {display:block; margin-bottom:5px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/10/1419_top_bg.jpg) no-repeat center top;}	
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2019/10/1419_01_bg.jpg) no-repeat center top;}
        .evt02 {background:#eee;}
        .evt03 {background:#202020}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="skybanner" >           
            <a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1411" target="blank"><img src="https://static.willbes.net/public/images/promotion/2019/10/1419_sky2.png"></a>                      
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1419_top.gif" alt="군무원 등불문제풀이반" usemap="#Map1419A" border="0" />
            <map name="Map1419A" id="Map1419A">
                <area shape="rect" coords="252,989,874,1080" href="#go" target="_self" />
            </map>                          
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1419_01.jpg" alt="1138명 추가채용"  />          
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1419_02.jpg" alt="군무원 강사진"/><br>
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1419_03.jpg" alt="수강신청" usemap="#goMap" id="go" border="0"/>
            <map name="goMap" id="goMap">
                <area shape="rect" coords="317,339,439,388" href="https://pass.willbes.net/package/show/cate/3024/pack/648001/prod-code/157232" target="_blank" alt="행정직 문풀" />
                <area shape="rect" coords="808,338,931,387" href="https://pass.willbes.net/package/show/cate/3024/pack/648001/prod-code/157233" target="_blank" alt="군수직문풀" />
                <area shape="rect" coords="119,834,243,885" href="https://pass.willbes.net/lecture/show/cate/3024/pattern/only/prod-code/157227" target="_blank" alt="오훈 국어" />
                <area shape="rect" coords="370,833,493,885" href="https://pass.willbes.net/lecture/show/cate/3024/pattern/only/prod-code/157228" target="_blank" alt="이석준 행정법" />
                <area shape="rect" coords="623,831,748,887" href="https://pass.willbes.net/lecture/show/cate/3024/pattern/only/prod-code/157229" target="_blank" alt="김덕관 행정학" />
                <area shape="rect" coords="875,831,1001,884" href="https://pass.willbes.net/lecture/show/cate/3024/pattern/only/prod-code/157230" target="_blank" alt="고강유 경영학" />
            </map>         
        </div>
    </div>
    <!-- End Container -->   
@stop