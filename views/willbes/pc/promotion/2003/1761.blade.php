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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skybanner {position:fixed; top:250px; right:10px; z-index:1;}

        .wb_top {background: url(https://static.willbes.net/public/images/promotion/2020/08/1761_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:#e61e00;}

        .wb_cts02 {background: url(https://static.willbes.net/public/images/promotion/2020/08/1761_02_bg.jpg) no-repeat center top;}
        
        .wb_cts03 {background:#f1f1f1 url(https://static.willbes.net/public/images/promotion/2020/08/1761_03_bg.jpg) no-repeat center top; padding-bottom:150px} 
        .wb_cts03 iframe {width:800px; height:450px; margin:0 auto;}       
        .wb_cts04 {background:#fff;}
        .wb_cts05 {background: url(https://static.willbes.net/public/images/promotion/2020/08/1761_05_bg.jpg) no-repeat center top;}

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="https://pass.willbes.net/pass/support/notice/show?board_idx=289643&s_campus=605001" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1761_sky.png" alt="공개무료특강" />
            </a>
        </div> 
        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1761_top.jpg" alt="오직, 소방" />            
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1761_01.jpg" alt="이종오 전격 입성"/>
        </div>

        <div class="evtCtnsBox wb_cts02" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1761_02.jpg" alt="소방학/소방법규 이종오">
        </div>

        <div class="evtCtnsBox wb_cts03" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1761_03.jpg" alt="시작부터 끝까지"><Br>   
            <iframe src="https://www.youtube.com/embed/xBWCniTv_Ro?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>      
        </div>

        <div class="evtCtnsBox wb_cts04" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1761_04.jpg" alt="암기만이 합격"> 
        </div>

        <div class="evtCtnsBox wb_cts05" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1761_05.jpg" alt="수강신청" usemap="#Map1761A" border="0">
            <map name="Map1761A">
              <area shape="rect" coords="125,818,300,929" href="https://pass.willbes.net/pass/professor/show/prof-idx/51055/?cate_code=3050&subject_idx=1259&subject_name=%EC%86%8C%EB%B0%A9%ED%95%99%EA%B0%9C%EB%A1%A0&tab=open_lecture" target="_blank" alt="소방학개론 학원">
              <area shape="rect" coords="312,819,488,929" href="https://pass.willbes.net/lecture/show/cate/3023/pattern/only/prod-code/170698" target="_blank" alt="소방학개론 온라인">
              <area shape="rect" coords="632,820,806,929" href="https://pass.willbes.net/pass/professor/show/prof-idx/51055/?cate_code=3050&subject_idx=1259&subject_name=%EC%86%8C%EB%B0%A9%ED%95%99%EA%B0%9C%EB%A1%A0&tab=open_lecture" target="_blank" alt="소방법규">
              <area shape="rect" coords="820,820,992,927" href="https://pass.willbes.net/lecture/show/cate/3023/pattern/only/prod-code/170697" target="_blank" alt="소방법규 온라인">
            </map> 
        </div>
    </div>
    <!-- End Container -->
@stop