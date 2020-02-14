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

        .evtTop {background:#2f6cdd url("https://static.willbes.net/public/images/promotion/2020/02/1539_top.jpg") no-repeat center top}          
        
        .evt01,.evt02,.evt03 {background:#fff;}      
       
        .evt03 {padding-bottom:150px}
        .evt03 ul { width:1000px; margin:0 auto}
        .evt03 li {display:inline; float:left; width:33.33333%; text-align:center}
        .evt03 li .off {display:block}
        .evt03 li .on {display:none}
        .evt03 li:hover .off {display:none}
        .evt03 li:hover .on {display:block}
        .evt03 ul:after {content:""; display:block; clear:both}

        .evt04 {background:#2d363f;}	
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">           

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1539_top.gif" title="불꽃소방"/>
        </div>
      
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1539_01.jpg" usemap="#Map1539a" title="1500제 문풀" border="0" />
            <map name="Map1539a" id="Map1539a">
                <area shape="rect" coords="358,808,518,871" href="https://pass.willbes.net/pass/offPackage/show/prod-code/161653" target="_blank" />
                <area shape="rect" coords="827,809,988,870" href="https://pass.willbes.net/pass/offPackage/show/prod-code/161657" target="_blank" />
            </map>        
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1539_02.jpg" title="3월 시간표" />       
        </div>      

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1539_03.jpg" usemap="#Map1539b" title="교수진" border="0">
            <map name="Map1539b" id="Map1539b">
                <area shape="rect" coords="186,684,268,703" href="https://pass.willbes.net/pass/offLecture/show/cate/3050/prod-code/161628" target="_blank" />
                <area shape="rect" coords="359,676,441,695" href="https://pass.willbes.net/pass/offLecture/show/cate/3050/prod-code/161624" target="_blank" />
                <area shape="rect" coords="532,676,614,695" href="https://pass.willbes.net/pass/offLecture/show/cate/3050/prod-code/161627" target="_blank" />
                <area shape="rect" coords="706,675,789,695" href="https://pass.willbes.net/pass/offLecture/show/cate/3050/prod-code/161625" target="_blank" />
                <area shape="rect" coords="880,677,962,697" href="https://pass.willbes.net/pass/offLecture/show/cate/3050/prod-code/161626" target="_blank" />
            </map>       
            <ul>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_a1.jpg" title="복습 동영상 제공" class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_a1_over.jpg" title="복습 동영상 제공" class="on"/>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2019/11/1410_a2.jpg" title="사물함 무료 제공" class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2019/11/1410_a2_over.jpg" title="사물함 무료 제공" class="on"/>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_a3.jpg" title="체력학원 연계 할인" class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_a3_over.jpg" title="체력학원 연계 할인" class="on"/>
                </li>
            </ul>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1539_04.gif" title="특강"  />
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