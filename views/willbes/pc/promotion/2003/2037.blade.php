@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">     
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
        .sky {position:fixed; top:225px;right:25px;z-index:10;}
        .sky a {display:block;padding-top:15px;}
        .sky2 {position:fixed;right:30px;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/01/2037_top_bg.jpg) no-repeat center top;}	    
        .evt01 {background:#DDD0BF;}

            .tabs { margin-left:-490px; width:980px; z-index:10;margin:0 auto;padding-top:25px;}
            .tabs ul{width:789px;margin:0 auto;}
            .tabs li {display:inline; float:left; width:16.6%;}
            .tabs li a {display:block; text-align:center; height:45px; line-height:45px; background:#b7b7b7; color:#fff; font-size:16px; margin-right:4px;border-radius:16px;}
            .tabs li a:hover,
            .tabs li a.active {background:#c6b269;}
            .tabs li:last-child a {margin:0}
            .tabs ul:after {content:""; display:block; clear:both}
            .tabs div {width:840px; margin:25px 0 0 70px}
            .tabs div a {display:block; width:400px; margin:160px auto 0; background:#0a0f25; color:#fff; font-size:22px; padding:15px 0; border-radius:40px}
            .tabs div a:hover {background:#c6b269;}

        .evt02 {background:#fff;padding-bottom:100px;}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>
    <div class="p_re evtContent NGR" id="evtContainer">             

        <div class="sky">
            <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/02/2037_sky.png" alt="윌비스 전국모의고사 접수하기" >
            </a>                     
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2037_top.jpg" alt="전국 모의고사 접수하기" usemap="#2037_apply" border="0" />
            <map name="2037_apply" id="2037_apply">
                <area shape="rect" coords="358,781,763,866" href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank" />
            </map>
        </div>
      
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2037_01.jpg" alt="시험 미리 만나기"  /> 
        </div>
        <div class="evtCtnsBox evt02">  
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2037_02.jpg" alt="접수 및 시행일정"  />  
            <div class="tabs">
                <ul>
                    <li><a href="#tab01">서울(노량진)</a></li>
                    <li><a href="#tab02">인천</a></li>                
                    <li><a href="#tab03">광주</a></li>
                    <li><a href="#tab04">대구</a></li>
                    <li><a href="#tab05">부산</a></li>
                    <li><a href="#tab06">전북</a></li>
                </ul>
                <div id="tab01">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_01_tab01.jpg" alt="서울(노량진)" />
                </div>
                <div id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_01_tab02.jpg" alt="인천" />
                </div>    
                <div id="tab03">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_01_tab04.jpg" alt="광주" />
                </div>
                <div id="tab04">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_01_tab05.jpg" alt="대구" />
                </div>
                <div id="tab05">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_01_tab06.jpg" alt="부산" />
                </div>
                <div id="tab06">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_01_tab03.jpg" alt="전북" />
                </div>
            </div>	       
        </div>
        
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $regi_form = $('#regi_form');
         /*tab*/
         $(document).ready(function(){
            $('.tabs ul').each(function(){
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