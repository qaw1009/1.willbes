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

        .skybanner {position:fixed; top:250px; right:10px; z-index:1;}
        .skybanner a { display:block; padding-bottom:10px;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/04/1771_top_bg.jpg) center top no-repeat}        

        .evt01 {background:#fff}
        .tabMenu {width:920px; margin:0 auto 0}        
        .tabMenu li {display:inline; float:left; width:33%}              
        .tabMenu li a {display:block; padding:15px 0; font-size:30px; border:2px solid #009841; color:#009841; text-align:center; margin-right:10px; line-height:1.5}
        .tabMenu li a.active {color:#fff; background:#009841}
        .tabMenu li span {font-size:16px; display:block}
        .tabMenu li:nth-child(2) {width:34%}
        .tabMenu li:last-child a {margin:0}
        .tabMenu.two li {width:50%}  
        .tabMenu:after {content:''; display:block; clear:both}

        .evt02 {background:#fff}
    </style>


    <div class="p_re evtContent NSK" id="evtContainer"> 
        <div class="evtCtnsBox evtTop" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/04/1771_top.gif " alt="광주 윌비스 공무원 필합반" />           
        </div>    

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1771_01.jpg" alt="9급/소방 강습반 개강" />
            <ul class="tabMenu NSK-Black">
                <li><a href="#tab01">공무원 종합반</a></li>
                <li><a href="#tab02">강한학습관리반</a></li>
                <li><a href="#tab03">불꽃소방단독반</a></li>
            </ul>
            <div id="tab01">    
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1771_01tab_c1.jpg" alt="공무원 종합반" usemap="#Map1771A" border="0" />
                <map name="Map1771A" id="Map1771A">
                    <area shape="rect" coords="288,2120,831,2207" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3043&campus_ccd=605006" target="_blank" alt="9급">
                </map>
            </div>
            <div id="tab02">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1771_01tab_c2.jpg" alt="강한학습관리반" />
            </div>
            <div id="tab03">
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1771_01tab_c3.jpg" alt="불꽃소방단독반" usemap="#Map1771B" border="0" />
                <map name="Map1771B" id="Map1771B">
                    <area shape="rect" coords="289,1271,828,1364" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3050&campus_ccd=605006" target="_blank" alt="불꽃소방단독반">
                </map>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1771_02.jpg" alt="9월 영어" />
            <ul class="tabMenu two NSK-Black">
                <li><a href="#tab04">
                    <span>선배합격생이 추천하는 선석 쌤!</span>
                    선석 영어
                </a></li>
                <li><a href="#tab05">
                    <span>영어전문가 안박사와 함께~</span>
                    안성호 영어</a></li>
            </ul>
            <div id="tab04">    
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1771_02tab_01.jpg" alt="선석 영어" usemap="#Map1771C" border="0"/>
                <map name="Map1771C" id="Map1771C">
                    <area shape="rect" coords="292,1028,827,1114" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&campus_ccd=605006&search_text=UHJvZE5hbWU67ISg7ISd&course_idx=1061" target="_blank" alt="선석 영어">
                </map>
            </div>
            <div id="tab05">
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1771_02tab_02.jpg" usemap="#Map1771D" border="0" />
                <map name="Map1771D" id="Map1771D">
                    <area shape="rect" coords="288,928,833,1019" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&campus_ccd=605006" target="_blank" />
                </map>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script>
        $(document).ready(function(){
            $('.tabMenu').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);

                $links.not($active).each(function(){
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
                    e.preventDefault();
                });
            });
        });   
    </script>

@stop