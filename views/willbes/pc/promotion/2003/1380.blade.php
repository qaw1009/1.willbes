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
      
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/08/1380_top_bg.jpg) no-repeat center top;}	
        .evt02 .youtubeGod iframe{width:644px;height:362px;margin:0 auto;}
        .evt05{background:#249871;margin-bottom:50px;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">     

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1380_top.jpg" alt="대각국사 오태진"/>              
        </div>
        
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1380_01.jpg" alt="한국사에서 가장 중요한 것"/>          
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1380_02.jpg" alt="왜 오태진 대각국사를 선택해야 할까요?"/>    
            <div class="youtubeGod">
                <iframe src="https://www.youtube.com/embed/HGybJR9Rvpg" frameborder="0" allowfullscreen=""></iframe>        
            </div>      
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1380_03.jpg" alt="합격방향 스탭"/>          
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1380_04.jpg" alt="한국사 전문가의 위엄"/>          
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1380_05.jpg" alt="수강신청" usemap="#Map1380a" border="0"/>
            <map name="Map1380a" id="Map1380a">
                <area shape="rect" coords="745,539,980,608" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/156171" target="_blank" alt="한국사 수강신청" />
            </map>         
        </div>
    </div>
    <!-- End Container -->   
@stop