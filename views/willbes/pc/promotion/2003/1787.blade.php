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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/1787_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#272f4c; padding-bottom:150px}
        /* TAB */
        .evt01 .tab {position:absolute; width:1064px; top:322px; left:50%; margin-left:-532px}		
        .evt01 .tab li {display:inline; float:left; width:50%}
        .evt01 .tab a {display:block}
        .evt01 .tab li:frist-chlid a {text-align:right}
        .evt01 .tab li:last-chlid a {text-align:left}        
        .evt01 .tab a img.off {display:block}
        .evt01 .tab a img.on {display:none}
        .evt01 .tab a.active img.off {display:none}
        .evt01 .tab a.active img.on {display:block}
        .evt01 .tab:after {content:""; display:block; clear:both}
        .evt01 div {margin-top:68px}

        .youtube {position:absolute; top:297px; left:50%; width:607px; z-index:1}
        .youtube iframe {width:607px; height:342px}


        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/09/1787_02_bg.jpg) no-repeat center top;}
        .evt02 .youtube {margin-left:-140px}

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2020/09/1787_03_bg.jpg) no-repeat center top;}
        .evt03 .youtube {top:269px; margin-left:-469px;}

        
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">   
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1787_top.jpg" title="최우영 T-PASS" />          
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1787_01.jpg" title="단기 성적형상에 효과적" />
            <ul class="tab" id="apply">
                <li>
                    <a href="#tab1">
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1787_01_tab01.png" class="off" alt=""/>
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1787_01_tab01_on.png" class="on"  />
                    </a>
                </li>
                <li>
                    <a href="#tab2">
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1787_01_tab02.png" class="off" alt=""/>
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1787_01_tab02_on.png" class="on"  />
                    </a>
                </li>
            </ul>
            <div id="tab1">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1787_01_01.jpg" title="농업직" />
            </div>
            <div id="tab2">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1787_01_02.jpg" title="전기통신직"/>
            </div> 
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1787_02.jpg" usemap="#Map1787_01" title="카폐바로가기" border="0" />
            <map name="Map1787_01" id="Map1728_cafe">
                <area shape="rect" coords="104,577,329,627" href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/50429/?subject_idx=1171&subject_name=%EC%9E%AC%EB%B0%B0%ED%95%99" target="_blank" />
              <area shape="rect" coords="281,996,838,1094" href="https://pass.willbes.net/promotion/index/cate/3028/code/1068" target="_blank" alt="농업직패키지">
            </map>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/chEceiSyKOg?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1787_03.jpg" usemap="#Map1787_02" title="최우영이 정답" border="0" />
            <map name="Map1787_02">
              <area shape="rect" coords="786,546,1017,604" href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/50163/?subject_idx=1193&subject_name=%EC%A0%84%EC%9E%90%EA%B3%B5%ED%95%99" target="_blank" alt="전기통신">
              <area shape="rect" coords="280,970,839,1063" href="https://pass.willbes.net/promotion/index/cate/3028/code/1071" target="_blank" alt="전기통신 패키지">
            </map>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/_RDnE7u4k8U?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div> 

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function(){
        $('.tab').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
        
            $content = $($active[0].hash);
        
            $links.not($active).each(function () {
            $(this.hash).hide()});
        
            // Bind the click event handler
            $(this).on('click', 'a', function(e){
            $active.removeClass('active');
            $content.hide();
        
            $active = $(this);
            $content = $(this.hash);
        
            $active.addClass('active');
            $content.show();
        
            e.preventDefault()})})}
        );      
    </script>
@stop