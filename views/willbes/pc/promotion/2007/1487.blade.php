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

        .wb_top {background:#809dfe url(https://static.willbes.net/public/images/promotion/2020/01/1487_top_bg.jpg) no-repeat center top;}

        .wb_01 {background:#fff url(https://static.willbes.net/public/images/promotion/2020/01/1487_01_bg.jpg) no-repeat center top;position:relative;}
        .wb_01 iframe{position:absolute;left:50%;margin-left:-390px;bottom:465px;}

        .wb_02 {background:#323232;position:relative;padding-bottom:130px;}
        #youtube1{position:absolute;left:50%;margin-left:-415px;}
        #youtube2{position:absolute;left:50%;margin-left:15px;}
        #youtube3{position:absolute;left:50%;margin-left:-415px;}
        #youtube4{position:absolute;left:50%;margin-left:15px;}

        .wb_03 {background:#b5a8fa;position:relative;}
        .wb_03 .check {position:absolute; width:1000px; left:50%; top:980px; margin-left:-500px; z-index:1;
            font-size:14px; text-align:center; line-height:1.5;font-weight:bold;}
        .wb_03 .check input {border:2px solid #000; margin-right:10px; height:20px; width:20px}
        .wb_03 .check a {display:inline-block; padding:5px 20px; color:#fff; background:#c40007; margin-left:20px; border-radius:20px}

        .wb_04 {background:#fff;}

        /*tab*/
        .tabs{width:100%; text-align:center; padding-bottom:20px;}
        .tabs ul {width:900px;margin:0 auto;}		
        .tabs li {display:inline; float:left;}	
        .tabs a img.off {display:block}
        .tabs a img.on {display:none}
        .tabs a.active img.off {display:none}
        .tabs a.active img.on {display:block}
        .tabs ul:after {content:""; display:block; clear:both} 
       
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">  

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1487_top.jpg" alt="윌비스 지텔프 티패스" usemap="#Map1487a" border="0"/>
            <map name="Map1487a" id="Map1487a">
                <area shape="rect" coords="115,901,1006,994" href="#apply" />
            </map>        
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1487_01.jpg" alt="대세 지텔프" />
            <iframe width="780" height="420" src="https://www.youtube.com/embed/Oqc0yoIIIsw" frameborder="0" allowfullscreen class="mt30"></iframe>
        </div>
        
        <div class="evtCtnsBox wb_02" id="lect">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1487_02.jpg" alt="점수의 비밀" />
            <div class="tabs">
                <ul>
                    <li>
                        <a href="#tab01" class="active">
                            <img src="https://static.willbes.net/public/images/promotion/2020/01/1487_02_tab1on.jpg" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2020/01/1487_02_tab1off.jpg" class="off"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab02">
                            <img src="https://static.willbes.net/public/images/promotion/2020/01/1487_02_tab2on.jpg" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2020/01/1487_02_tab2off.jpg" class="off"/>
                        </a>
                    </li>
                </ul>
                <div id="tab01">
                    <img src="https://static.willbes.net/public/images/promotion/2020/01/1487_02_con1.png"/>                 
                    <iframe width="390" height="240" src="https://www.youtube.com/embed/uKyEIDr_uKQ" frameborder="0" allowfullscreen class="mt30" id="youtube1"></iframe>    
                    <iframe width="390" height="240" src="https://www.youtube.com/embed/7cTjv9t9I9U" frameborder="0" allowfullscreen class="mt30" id="youtube2"></iframe>                        
                </div>                                        
                <div id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2020/01/1487_02_con2.png"/>          
                    <iframe width="390" height="240" src="https://www.youtube.com/embed/aK4ZHL32DPM" frameborder="0" allowfullscreen class="mt30" id="youtube3"></iframe>
                    <iframe width="390" height="240" src="https://www.youtube.com/embed/UMcVZ8SqHKg" frameborder="0" allowfullscreen class="mt30" id="youtube4"></iframe>                  
                </div>                
            </div>
        </div>

        <div class="evtCtnsBox wb_03" id="apply">   
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1487_03.jpg" usemap="#Map1487b" border="0"  />
            <map name="Map1487b" id="Map1487b">
                <area shape="rect" coords="116,840,540,942" href="javascript:go_PassLecture('158393');" >
                <area shape="rect" coords="575,835,1002,944" href="javascript:go_PassLecture('158633');" >
            </map>
            <div class="check">
                <label><input name="ischk" type="checkbox" value="Y" />페이지 하단 윌비스 G-TELP T-PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
                <a href="#careful">이용안내확인하기 ↓</a>               
            </div>         
        </div>

        <div class="evtCtnsBox wb_04" id="careful">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1487_04.jpg"  alt="유의사항"/>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">

    /*tab*/
    $(document).ready(function(){
            $('.tabs ul').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                //$active.addClass('active');
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

        function go_PassLecture(code) {
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            var url = '{{ site_url('/periodPackage/show/cate/3093/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }
    </script>
@stop