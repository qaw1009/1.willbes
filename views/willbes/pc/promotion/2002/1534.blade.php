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
            position:relative;
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
            top:200px; 
            right:0;
            z-index:1;            
        }
        .evt00 {background:#404040}
        .wb_main {background:url(https://static.willbes.net/public/images/promotion/2020/02/1534_top_bg.jpg) no-repeat center top;}
        .wb01 {background:#fff; padding-top:30px}
        .wb01 .tabs {width:942px; margin:0 auto}
        .wb01 li {display:inline; float:left; width:50%; }
        .wb01 a {display:block; padding:30px 0; text-align:center !important;}
        .wb01 a img {margin:0 auto}
        .wb01 a img.on {display:none}
        .wb01 a img.off {display:block}
        .wb01 a:hover img.on,
        .wb01 a.active img.on {display:block}
        .wb01 a:hover img.off,
        .wb01 a.active img.off {display:none}

        .wb02 {background:#e1e1e1; padding:85px 0}
        .wb02 ul {width:942px; margin:0 auto}
        .wb02 li {display:inline; float:left; width:462px; margin-bottom:10px; margin-right:10px}
        .wb02 li a {display:block; transition: opacity .4s ease-in-out;}
        .wb02 li:nth-of-type(even) {margin-right:0}
        .wb02 li a:hover {
            -webkit-box-shadow: 10px 10px 20px 1px rgba(0,0,0,0.3);
            -moz-box-shadow: 10px 10px 20px 1px rgba(0,0,0,0.2);
            box-shadow: 10px 10px 20px 1px rgba(0,0,0,0.3);
        }
        .wb02 ul:hover a:not(:hover){    
            opacity: 0.4; 
        }

        .wb01 .tabs:after,
        .wb02 ul:after { content:""; display:block; clear:both}

        .wb03 {background:#246c71}
   
    </style>

    <div class="evtContent NGR" id="evtContainer">  
        <div class="skybanner">
            <a href="#wb03"><img src="https://static.willbes.net/public/images/promotion/2020/02/1534_sky01.png"  alt="특강패키지"  /></a>
        </div>

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1443_00.jpg" title="신광은 경찰팀">
        </div>
        
        <div class="evtCtnsBox wb_main" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1534_top.jpg"  alt="명품특강"  />
        </div>

        <div class="evtCtnsBox wb01">
            <ul class="tabs">
                <li>
                    <a href="#tab01" class="active">
                        <img src="https://static.willbes.net/public/images/promotion/2020/02/1534_01_tab01_on.png" class="on" alt="문제풀이반 대상 강좌"  />
                        <img src="https://static.willbes.net/public/images/promotion/2020/02/1534_01_tab01_off.png" class="off" alt="문제풀이반 대상 강좌"  />
                    </a>
                </li>
                <li>
                    <a href="#tab02">
                        <img src="https://static.willbes.net/public/images/promotion/2020/02/1534_01_tab02_on.png" class="on" alt="기본반 대상 강좌"  />
                        <img src="https://static.willbes.net/public/images/promotion/2020/02/1534_01_tab02_off.png" class="off" alt="기본반 대상 강좌"  />
                    </a>
                </li>
            </ul>
        </div>

        <div class="evtCtnsBox wb02">
            <div id="tab01">
                <ul>   
                    <li>
                        <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/161445" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1534_01_01_a.jpg"  alt="한국사 원유철" />
                        </a>
                    </li>
                    <li>
                        <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/161514" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1534_01_01_b.jpg"  alt="한국사 오태진" />
                        </a>
                    </li>
                    <li>
                        <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/161411" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1534_01_01_c.jpg"  alt="영어 김현정" />
                        </a>
                    </li>
                    <li>
                        <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/161582" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1534_01_01_d.jpg"  alt="영어 하승민" />
                        </a>
                    </li>
                    <li>
                        <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/161586" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1534_01_01_e.jpg"  alt="형법 김원욱" />
                        </a>
                    </li>
                    <li>
                        <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1046" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1534_01_01_f.jpg"  alt="마무리특강" />
                        </a>
                    </li>
                </ul>   
            </div>  

            <div id="tab02">
                <ul>   
                    <li>
                        <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/161582" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1534_01_02_a.jpg"  alt="영어 하승민" />
                        </a>
                    </li>
                    <li>
                        <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/161586" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1534_01_02_b.jpg"  alt="형법 김원욱" />
                        </a>
                    </li>
                    <li>
                        <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/161585" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1534_01_02_c.jpg"  alt="영어 김준기" />
                        </a>
                    </li>
                    <li>
                        <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/161584" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1534_01_02_d.jpg"  alt="영어 김준기" />
                        </a>
                    </li>
                </ul>   
            </div> 
        </div> 

        <div class="evtCtnsBox wb03" id="wb03">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1534_02.jpg"  alt="특강듣고 합격하자!" usemap="#Map1534" border="0"  />
            <map name="Map1534" id="Map1534">
                <area shape="rect" coords="755,506,935,565" href="https://police.willbes.net/pass/offPackage/show/prod-code/161601" target="_blank" alt="패키지1" />
                <area shape="rect" coords="758,615,932,673" href="https://police.willbes.net/pass/offPackage/show/prod-code/161602" target="_blank" alt="패키지2" />
                <area shape="rect" coords="758,944,933,1004" href="https://police.willbes.net/pass/offPackage/show/prod-code/161600" target="_blank" alt="패키지3" />
            </map>
        </div>     

    </div>
    <!-- End Container -->

    <script type="text/javascript">
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
        );
    </script>
@stop