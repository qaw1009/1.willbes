@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">    
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/
        .skybanner {position:fixed;top:250px;right:10px;z-index:1;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/1862_top_bg.jpg) no-repeat center top; 
            background-size:2000px 794px; height:879px; overflow:hidden}	
        .evtTop span {position:absolute; top:0; left:50%; width:1342px; margin-left:-320px;
            animation:upDown2 1s ease-out;-webkit-animation:upDown2 1s ease-out; }
        @@keyframes upDown2{
            from{margin-left:-120px;}
            to{margin-left:-320px;}
        }
        @@-webkit-keyframes upDown2{
            /*from{right:-300px;}
            to{right:-200px}*/
        } 
        .evt01 {background:#fff;}
        .evt02 {background:#ededed;}
        .evt03 {background:#ededed;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer"> 
        @include('willbes.pc.promotion.2003.3035_cycle_sky')

        <div class="evtCtnsBox evtTop"> 
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1862_top.jpg" alt="김동진 법원팀" />   
            <span><img src="https://static.willbes.net/public/images/promotion/2020/09/1862_top_img.png" alt="4순환"></span>                      
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1862_01.jpg" alt="법원팀은 약속" />                         
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1862_02.jpg" alt="커리큘럼" usemap="#Map1585a" border="0" />
            <map name="Map1585a" id="Map1585a">
                <area shape="rect" coords="172,793,260,815" href="https://pass.willbes.net/promotion/index/cate/3035/code/1485" target="_blank" title="예비순환" />
                <area shape="rect" coords="310,792,403,815" href="https://pass.willbes.net/promotion/index/cate/3035/code/1585" target="_blank" title="1순환" />
                <area shape="rect" coords="448,791,538,815" href="https://pass.willbes.net/promotion/index/cate/3035/code/1653" target="_blank" title="2순환" />
                <area shape="rect" coords="579,792,669,814" href="https://pass.willbes.net/promotion/index/cate/3035/code/1785" target="_blank" title="3순환" />
                <area shape="rect" coords="715,792,806,815" href="#none" title="4순환">
                <area shape="rect" coords="853,792,944,817" href="javascript:alert('개강 일정에 맞추어 공개됩니다.');" title="5순환">
            </map>                      
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1862_03.jpg" alt="4순환 진도별모의고사 패키지" title="4순환 진도별모의고사 패키지"/ usemap="#Map1585b" border="0" />
            <map name="Map1585b" id="Map1585b">
                <area shape="rect" coords="346,1079,774,1169" href="https://pass.willbes.net/package/show/cate/3035/pack/648001/prod-code/172373" target="_blank" >
            </map>                         
        </div>
              
    </div>
    <!-- End Container -->   
@stop