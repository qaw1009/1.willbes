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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}

        /************************************************************/     

        .evtTop {background:url("https://static.willbes.net/public/images/promotion/2019/10/1410_top_bg.jpg") no-repeat center top}       
        .evt01 {background:#eee;}
        .evt02 {background:#dfdfdf;}
        .evt03 {background:url("https://static.willbes.net/public/images/promotion/2019/10/1410_03_bg.jpg") no-repeat center top}
        .evt04 {background:#dfdfdf; padding-bottom:150px}
        .evt04 .tabs {width:920px; margin:0 auto 20px}
        .evt04 li {display:inline; float:left; width:20%; text-align:center}
        .evt04 li a {display:block; height:70px; line-height:70px; color:#757474; background:#dfdfdf; font-size:16px; border:1px solid #8d8d8d; margin-right:2px}
        .evt04 li a:hover,
        .evt04 li a.active {color:#fff; background:#ac3433;border:1px solid #981e1d; }
        .evt04 li:last-child a {margin:0}   
        .evt04 .tabs:after {content:""; display:block; clear:both}

        .evt05 {background:#f1f1f1; padding-bottom:150px}
        .evt05 ul { width:1000px; margin:0 auto}
        .evt05 li {display:inline; float:left; width:33.33333%; text-align:center}
        .evt05 li .off {display:block}
        .evt05 li .on {display:none}
        .evt05 li:hover .off {display:none}
        .evt05 li:hover .on {display:block}
        .evt05 ul:after {content:""; display:block; clear:both}

        .evt06 {background:#ac3433;}	
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">       
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_top.jpg" title="불꽃소방 1만 문풀의 법칙"/>
        </div>
      
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_01.jpg" title="1만 문풀의 법칙" />       
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_02.jpg" usemap="#Map1410C" title="1만 문풀의 법칙" border="0" />
            <map name="Map1410C" id="Map1410C">
                <area shape="rect" coords="162,772,331,829" href="https://pass.willbes.net/pass/offPackage/show/prod-code/157366" target="_blank" alt="2개월 공채" />
                <area shape="rect" coords="355,774,523,827" href="https://pass.willbes.net/pass/offPackage/show/prod-code/157365" target="_blank" alt="2개월 특채" />
                <area shape="rect" coords="609,775,778,828" href="https://pass.willbes.net/pass/offPackage/show/prod-code/157369" target="_blank" alt="5개월공채" />
                <area shape="rect" coords="798,772,970,831" href="https://pass.willbes.net/pass/offPackage/show/prod-code/157368" target="_blank" alt="5개월 특채" />
            </map>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_03.jpg" title="소방설명회" />
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_04.jpg" title="10월 테스트 일정" />
            <ul class="tabs">
                <li><a href="#tab01" class="active">소방학개론</a></li>
                <li><a href="#tab02">소방관계법규</a></li>
                <li><a href="#tab03">소방국어</a></li>
                <li><a href="#tab04">소방한국사</a></li>
                <li><a href="#tab05">소방영어</a></li>
            </ul>
            <div id="tab01"><img src="https://static.willbes.net/public/images/promotion/2019/10/1410_t1_c.jpg" title="소방학개론" /></div>
            <div id="tab02"><img src="https://static.willbes.net/public/images/promotion/2019/10/1410_t2_c.jpg" title="소방관계법규" /></div>
            <div id="tab03"><img src="https://static.willbes.net/public/images/promotion/2019/10/1410_t3_c.jpg" title="소방국어" /></div>
            <div id="tab04"><img src="https://static.willbes.net/public/images/promotion/2019/10/1410_t4_c.jpg" title="소방한국사" /></div>
            <div id="tab05"><img src="https://static.willbes.net/public/images/promotion/2019/10/1410_t5_c.jpg" title="소방영어" /></div>
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_05.jpg" usemap="#Map1410A" title="불꽃소방팀 교수진" border="0"  />
            <map name="Map1410A" id="Map1410A">
                <area shape="rect" coords="155,703,266,734" href="https://pass.willbes.net/pass/professor/show/prof-idx/50466/?cate_code=3050&amp;subject_idx=1259&amp;subject_name=소방학개론" target="_blank" alt="김종상" />
                <area shape="rect" coords="387,745,496,773" href="https://pass.willbes.net/pass/professor/show/prof-idx/50662/?cate_code=3050&amp;subject_idx=1253&amp;subject_name=국어" target="_blank" alt="김세령" />
                <area shape="rect" coords="619,745,726,775" href="https://pass.willbes.net/pass/professor/show/prof-idx/50306/?cate_code=3050&amp;subject_idx=1255&amp;subject_name=한국사" target="_blank" alt="한경준" />
                <area shape="rect" coords="838,693,944,723" href="https://pass.willbes.net/pass/professor/show/prof-idx/50310/?cate_code=3050&amp;subject_idx=1254&amp;subject_name=영어" target="_blank" alt="이아림" />
            </map>
            <ul>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_a1.jpg" title="복습 동영상 제공" class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_a1_over.jpg" title="복습 동영상 제공" class="on"/>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_a2.jpg" title="사물함 무료 제공" class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_a2_over.jpg" title="사물함 무료 제공" class="on"/>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_a3.jpg" title="체력학원 연계 할인" class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_a3_over.jpg" title="체력학원 연계 할인" class="on"/>
                </li>
            </ul>
        </div>

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_06.jpg" title=""  />
        </div>
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
                    $(this.hash).hide();
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault()
                });
            });
        });
    </script>    
@stop