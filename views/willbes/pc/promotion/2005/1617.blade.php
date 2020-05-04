@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
<!-- content -->
<!-- Container -->
<style type="text/css">
    .subContainer {
        min-height: auto !important;
        margin-bottom:0 !important;
    }
    .evtContent {
        position:relative;
        width:100% !important;
        min-width:1210px !important;
        background:#ccc;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
    }
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

    /************************************************************/

    /*타이머*/
    .time {width:100%; text-align:center; background:#E4E4FE;}
    .time {text-align:center; padding:20px 0}
    .time table {width:1120px; margin:0 auto}
    .time table td {line-height:1.2}        
    .time table td img {width:65%}
    .time .time_txt {font-size:20px; color:#000; letter-spacing: -1px; text-align:center;}
    .time span {color:#000; font-size:28px;}
    .time table td:last-child,
    .time table td:last-child span {font-size:40px}

    /*레이어팝업*/
    .Pstyle {
        opacity: 0;
        display: none;
        position: relative;
        width: auto;
    }
    .b-close {
        position: absolute;
        right: 10px;
        top: 50px;
        padding: 5px;
        display: inline-block;
        cursor: pointer;
    }
    .Pstyle .content {height:auto; width:auto;}

    /************************************************************/

    .wb_top {background:#2C3C51 url(https://static.willbes.net/public/images/promotion/2020/04/1617_top_bg.jpg) no-repeat center top;}

    .menuWarp {position:relative; width:1120px; height:1138px; margin:0 auto;position:relative;}

        .PeMenu {width:1120px;position:absolute;bottom:43px; left:0px;}
        .PeMenu li {display:inline; float:left; margin-right:35px;}
        .PeMenu li:first-child {margin-left:50px;}

        .PeMenu li a{display:block; text-align:center}
        .PeMenu li img:hover {
                            -webkit-box-shadow: 5px 5px 10px 1px rgba(0,0,0,0.5);
                            -moz-box-shadow: 5px 5px 10px 1px rgba(0,0,0,0.5);
                            box-shadow: 5px 5px 10px 1px rgba(0,0,0,0.5);
                            }
        .PeMenu ul:hover a:not(:hover){opacity: 0.4;}
        .PeMenu ul:after {content:""; display:block; clear:both}

        .letter {width:1120px;position:absolute;bottom:0; left:0px;}
        
        .letter li {display:inline; float:left; margin-right:35px;}
        
        .letter li:first-child {margin-left:50px;}
    

    .wb_evt03 {background:#eee;}

</style>
<div class="evtContent NGR" id="evtContainer">

    <!-- 타이머 -->
    <div class="evtCtnsBox time NGEB" id="newTopDday">
        <div>
            <table>
                <tr>                    
                <td class="time_txt"><span>2020년 1차시험<br>D-day</span></td>
                <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                <td class="time_txt">일 </td>
                <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                <td class="time_txt">:</td>
                <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                <td class="time_txt">:</td>
                <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                <td>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}까지!</td>
                </tr>
            </table>                
        </div>
    </div>
    <!-- 타이머 //-->                         

    <div class="evtCtnsBox wb_top" >  
 
        <div class="menuWarp">
            <div class="PeMenu">
                <ul>
                    <li>
                        <a href="https://gosi.willbes.net/search/result/?cate=3096&=&searchfull_text=%ED%95%A9%EA%B2%A9%EC%9D%B4%EB%B2%A4%ED%8A%B8%EC%84%9D%EC%B9%98%EC%88%98&searchfull_order=" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2020/04/1617_top_01.png" class="off" alt="석치수" />                        
                        </a>
                    </li>                  
                    <li>
                        <a href="https://gosi.willbes.net/search/result/?cate=3096&=&searchfull_text=%ED%95%A9%EA%B2%A9%EC%9D%B4%EB%B2%A4%ED%8A%B8%EB%B0%95%EC%A4%80%EB%B2%94&searchfull_order=" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2020/04/1617_top_02.png" class="off" alt="박준범" />                           
                        </a>
                    </li>
                    <li>
                        <a href="https://gosi.willbes.net/search/result/?cate=3096&=&searchfull_text=%ED%95%A9%EA%B2%A9%EC%9D%B4%EB%B2%A4%ED%8A%B8%EC%9D%B4%EB%82%98%EC%9A%B0" target="_blank">                
                            <img src="https://static.willbes.net/public/images/promotion/2020/04/1617_top_03.png" class="off" alt="이나우" />                            
                        </a>
                    </li>
                    <li>
                        <a href="https://gosi.willbes.net/search/result/?cate=3096&=&searchfull_text=%ED%95%A9%EA%B2%A9%EC%9D%B4%EB%B2%A4%ED%8A%B8%ED%95%9C%EC%8A%B9%EC%95%84&searchfull_order=" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2020/04/1617_top_04.png" class="off" alt="한승아" />                            
                        </a>
                    </li>           
                </ul>
            </div>
            <div class="letter">
                <ul>
                    <li>
                        <a href="javascript:go_popup1()">
                            <img src="https://static.willbes.net/public/images/promotion/2020/04/1617_top_01_letter.png" class="off" alt="석치수 손편지" />                        
                        </a>
                    </li>
                    <li>
                        <a href="javascript:go_popup2()">
                            <img src="https://static.willbes.net/public/images/promotion/2020/04/1617_top_02_letter.png" class="off" alt="박준범 손편지" />                        
                        </a>
                    </li>     
                    <li>
                        <a href="javascript:go_popup3()">
                            <img src="https://static.willbes.net/public/images/promotion/2020/04/1617_top_03_letter.png" class="off" alt="이나우 손편지" />                        
                        </a>
                    </li>     
                    <li>
                        <a href="javascript:go_popup4()">
                            <img src="https://static.willbes.net/public/images/promotion/2020/04/1617_top_04_letter.png" class="off" alt="한승아 손편지" />                        
                        </a>
                    </li>                
                </ul>
            </div>

            <!--레이어팝업-->
            <div id="popup1" class="Pstyle">
                <span class="b-close">X</span>
                <div class="content1">                  
                    <img src="https://static.willbes.net/public/images/promotion/2020/04/1617_top_01_letters.png" class="off" alt="석치수 손편지 내용" />    
                </div> 
            </div>    
            <div id="popup2" class="Pstyle">
                <span class="b-close">X</span>   
                <div class="content2">         
                    <img src="https://static.willbes.net/public/images/promotion/2020/04/1617_top_02_letters.png" class="off" alt="박준범 손편지 내용" />    
                </div> 
            </div>
            <div id="popup3" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content3">            
                    <img src="https://static.willbes.net/public/images/promotion/2020/04/1617_top_03_letters.png" class="off" alt="이나우 손편지 내용" />   
                </div>
            </div>
            <div id="popup4" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content4">         
                    <img src="https://static.willbes.net/public/images/promotion/2020/04/1617_top_04_letters.png" class="off" alt="한승아 손편지 내용" />                           
                </div>
            </div>

        </div>
    </div>

    <div class="evtCtnsBox wb_evt01" >  
        <img src="https://static.willbes.net/public/images/promotion/2020/04/1617_01.jpg" alt="학습계획을 점검" />     
    </div>

    <div class="evtCtnsBox wb_evt02" >  
        <img src="https://static.willbes.net/public/images/promotion/2020/04/1617_02.jpg" alt="특선1탄~5탄" usemap="#Map1617a" border="0" />
        <map name="Map1617a" id="Map1617a">
            <area shape="rect" coords="873,253,1014,283" href="https://gosi.willbes.net/m/lecture/index/cate/3096/pattern/only?search_order=course&course_idx=1287" target="_blank" />
            <area shape="rect" coords="872,293,1014,323" href="https://gosi.willbes.net/lecture/index/cate/3096/pattern/only?search_order=course&course_idx=1287" target="_blank" />
            <area shape="rect" coords="872,622,1014,653" href="https://gosi.willbes.net/m/lecture/index/cate/3096/pattern/only?search_order=course&course_idx=1286" target="_blank" />
            <area shape="rect" coords="872,662,1013,694" href="https://gosi.willbes.net/lecture/index/cate/3096/pattern/only?search_order=course&course_idx=1286" target="_blank" />
            <area shape="rect" coords="872,1003,1013,1034" href="https://gosi.willbes.net/m/lecture/index/cate/3096/pattern/only?search_order=course&course_idx=1289" target="_blank" />
            <area shape="rect" coords="872,1043,1013,1073" href="https://gosi.willbes.net/lecture/index/cate/3096/pattern/only?search_order=course&course_idx=1289" target="_blank" />
            <area shape="rect" coords="873,1372,1013,1404" href="https://gosi.willbes.net/m/lecture/index/cate/3096/pattern/only?search_order=course&course_idx=1286&search_text=UHJvZE5hbWU67JeE7ISgIDIwMA%3D%3D" target="_blank" />
            <area shape="rect" coords="873,1413,1013,1443" href="https://gosi.willbes.net/lecture/index/cate/3096/pattern/only?search_order=course&course_idx=1286&search_text=UHJvZE5hbWU67JeE7ISgIDIwMA%3D%3D" target="_blank" />
            <area shape="rect" coords="871,1733,1016,1764" href="https://gosi.willbes.net/m/lecture/index/cate/3096/pattern/only?search_order=course&course_idx=1204" target="_blank" />
            <area shape="rect" coords="872,1773,1013,1803" href="https://gosi.willbes.net/lecture/index/cate/3096/pattern/only?search_order=course&course_idx=1204" target="_blank" />
        </map>        
    </div>

    <div class="evtCtnsBox wb_evt03" >  
        <img src="https://static.willbes.net/public/images/promotion/2020/04/1617_03.jpg" alt="정리하자면" />     
    </div>

    <div class="evtCtnsBox wb_evt04" >  
        <img src="https://static.willbes.net/public/images/promotion/2020/04/1617_04.jpg" alt="특선 번외1~특선 번외4" usemap="#Map1617b" border="0" />
        <map name="Map1617b" id="Map1617b">
            <area shape="rect" coords="872,251,1013,282" href="https://gosi.willbes.net/m/lecture/index/cate/3096/pattern/only?search_order=course&course_idx=1132&school_year=2020" target="_blank" />
            <area shape="rect" coords="872,291,1013,321" href="https://gosi.willbes.net/lecture/index/cate/3096/pattern/only?search_order=course&course_idx=1132&school_year=2020" target="_blank" />
            <area shape="rect" coords="873,581,1013,612" href="https://gosi.willbes.net/book/index/cate/3096?cate_code=3096&search_text=UHJvZE5hbWU6MjAyMCDtlZzrprzrspXtlZnsm5A%3D" target="_blank" />
            <area shape="rect" coords="873,871,1014,902" href="https://gosi.willbes.net/m/lecture/index/cate/3097/pattern/only?search_order=course&course_idx=1132" target="_blank" />
            <area shape="rect" coords="872,911,1013,942" href="https://gosi.willbes.net/lecture/index/cate/3097/pattern/only?search_order=course&course_idx=1132" target="_blank" />
            <area shape="rect" coords="873,1180,1013,1213" href="https://gosi.willbes.net/m/lecture/index/cate/3097/pattern/only?search_order=course&course_idx=1131" target="_blank" />
            <area shape="rect" coords="873,1221,1013,1252" href="https://gosi.willbes.net/lecture/index/cate/3097/pattern/only?search_order=course&course_idx=1131" target="_blank" />
        </map>
    </div> 

</div>
<!-- End Container -->
   <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>                              
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

    /*디데이카운트다운*/ 
    $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });

    /*레이어팝업*/
        function go_popup() {
        $('#popup').bPopup();
        }

        function go_popup1() {
            $('#popup1').bPopup();
        }

        function go_popup() {
        $('#popup').bPopup();
        }

        function go_popup2() {
            $('#popup2').bPopup();
        }

        function go_popup() {
        $('#popup').bPopup();
        }

        function go_popup3() {
            $('#popup3').bPopup();
        }

        function go_popup() {
        $('#popup').bPopup();
        }

        function go_popup4() {
            $('#popup4').bPopup();
        }
    </script> 

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop   