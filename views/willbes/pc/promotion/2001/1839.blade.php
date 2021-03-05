@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/11/1839_top_bg.jpg) no-repeat center top;
            overflow:hidden}  
        .wb_top span {position:absolute; left:50%; z-index:10}

        .wb_top span.img1 {width:477px; margin-left:-400px; animation:iptimg1 1s ease-in;-webkit-animation:iptimg1 1s ease-in;}
        .wb_top span.img2 {width:340px; margin-left:20px; top:205px; animation:iptimg2 1s ease-in;-webkit-animation:iptimg2 1s ease-in;}
        @@keyframes iptimg1{
            from{top:-500px; opacity: 0;}
            to{top:0; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
            from{top:-500px; opacity: 0;}
            to{top:0; opacity: 1;}
        }
        
        @@keyframes iptimg2{
            from{margin-left:532px; opacity: 0;}
            to{margin-left:20px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg2{
            from{margin-left:532px; opacity: 0;}
            to{margin-left:20px; opacity: 1;}
        }

        .wb_03 {width:1120px; margin:0 auto; position:relative}
        .wb_03 ul {position:absolute; width:215px; top:380px; left:710px; z-index:10}
        .wb_03 li {display:inline-block; float:left; width:58px; height:240px; margin-right:13px; cursor: pointer;}
        .wb_03 span {font-size:0; text-indent: -9999px;}
        .wb_03 li div {display:none; position:absolute; top:300px; left:50%; width:700px; margin-left:-600px; z-index:15}
        .wb_03 li:hover div {display:block}
        
        .wb_05 {background:#5d57f6;} 
        .wb_06 {background:#a8b4bc;}
        .tabs {width:1120px; margin:0 auto}
        .tabs li {display:inline; float:left; width:33.333333%}
        .tabs li a {display:block; background:#656c71; color:#a8b4bc; text-align:center; font-size:30px; height:72px; line-height:72px; margin-right:5px}
        .tabs li a.active {color:#636363; background:#fff}
        .tabs li:last-child a {margin:0}

        .wb_07 {background:url(https://static.willbes.net/public/images/promotion/2020/11/1839_07_bg.jpg) no-repeat center top;}
        .wb_09 {background:#333351}
    </style>

    <div class="evtContent NSK" id="evtContainer">      
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1839_top.jpg"  alt="" />
            <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2020/09/1839_top01.png"  alt="사원증" /></span>
            <span class="img2"><img src="https://static.willbes.net/public/images/promotion/2020/09/1839_top02.png"  alt="전략이 보인다." /></span>
        </div>
        
        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1839_01_01.jpg"  alt=""  />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1839_01_02.jpg"  alt=""  />
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1839_01_03.gif"  alt=""  />   
            <ul>
                <li>
                    <span>경찰학</span>
                    <div><img src="https://static.willbes.net/public/images/promotion/2020/09/1839_01_03_img1.png"></div>
                </li>
                <li>
                    <span>형사법</span>
                    <div><img src="https://static.willbes.net/public/images/promotion/2020/09/1839_01_03_img2.png"></div>
                </li>
                <li>
                    <span>헌법</span>
                    <div><img src="https://static.willbes.net/public/images/promotion/2020/09/1839_01_03_img3.png"></div>
                </li>
            </ul>         
        </div> 

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1839_01_04.jpg"  alt=""  />
        </div>

        {{--
        <div class="evtCtnsBox wb_05">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1839_02.jpg"  alt=""  />
        </div>
        --}}

        <div class="evtCtnsBox wb_06">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1839_06_top.jpg"  alt=""  />
            <ul class="tabs NSK-Black">
                <li><a href="#tab01">형사법</a></li>
                <li><a href="#tab02">헌법</a></li>
                <li><a href="#tab03">경찰학</a></li>
            </ul>
            <div id="tab01">
                <img src="https://static.willbes.net/public/images/promotion/2020/11/1839_06_01.jpg"  alt="형사법 신광은" usemap="#Map1839A" border="0"  />
                <map name="Map1839A">
                    <area shape="rect" coords="770,429,1016,674" href="https://police.willbes.net/promotion/index/cate/3001/code/1926" target="_blank" alt="교수홈">
                </map>
            </div>
            <div id="tab02">
                <img src="https://static.willbes.net/public/images/promotion/2020/11/1839_06_02.jpg"  alt="헌법 김원욱" usemap="#Map1839B" border="0"  />
                <map name="Map1839B">
                    <area shape="rect" coords="766,429,1022,671" href="#none" onclick="javascript:alert('곧 공개됩니다.');" alt="교수홈">
                </map>
            </div>
            <div id="tab03">
                <img src="https://static.willbes.net/public/images/promotion/2020/11/1839_06_03.jpg"  alt="경찰학 장정훈" usemap="#Map1839C" border="0"  />
                <map name="Map1839C">
                    <area shape="rect" coords="766,429,1020,670" href="#none" onclick="javascript:alert('곧 공개됩니다.');" alt="교수홈">
                </map>
            </div>
        </div>

        <div class="evtCtnsBox wb_07">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1839_07.jpg"  alt="한국사, 영어 검정제 변경" usemap="#Map1839D" border="0"  />
            <map name="Map1839D">
              <area shape="rect" coords="303,997,818,1088" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/177509" target="_blank" alt="지텔프 영어 자격증 바로가기">
            </map>
        </div>

        <div class="evtCtnsBox wb_08">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1839_08.jpg"  alt="지텔프, 한국사능력검정 시험"  />
        </div>
        {{--
        <div class="evtCtnsBox wb_09">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1839_09.jpg"  alt="2022년 과목개편대비 준비" usemap="#Map1839E" border="0"  />
            <map name="Map1839E">
              <area shape="rect" coords="242,800,406,863" href="https://police.willbes.net/promotion/index/cate/3001/code/1976" target="_blank" alt="0원패스">
              <area shape="rect" coords="736,797,902,866" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1984" target="_blank" alt="기본이론종합반">
            </map>
        </div>
        --}}
    </div>
    <!-- End Container -->

    <script type="text/javascript">
         /*tab*/
         $(document).ready(function(){
            $('.tabs').each(function(){
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
        ) 
    </script>
@stop