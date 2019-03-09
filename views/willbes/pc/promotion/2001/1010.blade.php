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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .wb_cts01 {background:url(http://file3.willbes.net/new_cop/2018/11/EV1811226Y_01_bg.jpg) no-repeat center top}
        .wb_cts01 .wb_popWrap {width:1210px; margin:0 auto; position:relative}

        .wb_cts01 .giveaway {position:absolute; width:550px; left:50%; margin-left:50px; animation:only 2s infinite; z-index:11}
        @@keyframes only{
             0%{top:120px}
             50%{top:160px}
             100%{top:120px}
         }

        .wb_cts02 {background:#f4f4f4; padding-bottom:100px; position:relative}
        .wb_cts02 div {width:900px; margin:auto;}
        .wb_cts02 .tabWrap { margin:0; padding:0}
        .wb_cts02 .tabWrap li {display:inline; float:left; width:33.33333%;}
        .wb_cts02 .tabWrap li a {
            display:block;
            background:#333;
            color:#fff;
            font-size:18px;
            font-weight:500;
            height:80px;
            line-height:80px;
            text-align:center;
            margin-right:1px;
        }
        .wb_cts02 .tabWrap li a:hover,
        .wb_cts02 .tabWrap li a.active {background:#00cc66}
        .wb_cts02 .tabWrap li:last-child a {margin-right:0}
        .wb_cts02 .tabWrap:after {content:''; display:block; clear:both}

        .wb_cts02 .evtTabCts {clear:both !important; margin-top:70px}
        .wb_cts02 .evtTabCts table {width:100%; background:#fff; border-top:1px solid #000; border-bottom:1px solid #000}
        .wb_cts02 .evtTabCts td {padding:10px; border-bottom:1px solid #e4e4e4; color:#333 !important; font-size:14px !important}
        .wb_cts02 .evtTabCts td:first-child {text-align:center}
        .wb_cts02 .evtTabCts td:nth-child(2) {color:#999 !important; text-align:left}
        .wb_cts02 .evtTabCts td:last-child {text-align:center}
        .wb_cts02 .evtTabCts td:last-child a {display:block; background:#00cc66; color:#fff !important; border:1px solid #00cc66; padding:10px 0; border-radius:25px}
        .wb_cts02 .evtTabCts td:last-child a:hover {background:#fff; color:#00cc66 !important}
        .wb_cts02 .evtTabCts tr:last-child td {border:0}

        .wb_cts02 .evtTabCts li {display:inline; float:left; width:50%}
        .wb_cts02 .evtTabCts li a {display:block; background:#00cc66; color:#fff !important; border:1px solid #00cc66; height:60px; line-height:60px; font-size:16px; font-weight:600; margin-right:1px}
        .wb_cts02 .evtTabCts li a:hover {background:#fff; color:#00cc66 !important}
        .wb_cts02 .evtTabCts ul:after {content:""; display:block; clear:both}

        .wb_cts03  {background:#274a35; margin-bottom:80px}

        .skybanner {
            position:absolute;
            top:20px;
            right:0;
            width:280px;
            z-index:1;
        }
        .skybanner_sectionFixed {position:fixed; top:20px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <div><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_171129_p&topMenuType=O#main" target="_blank"><img src="http://file3.willbes.net/new_cop/2017/11/EV171129_p_sky.png" alt="0원 입문특강" /></a></div>
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <div class="wb_popWrap">
                <img src="http://file3.willbes.net/new_cop/2018/11/EV1811226Y_01.jpg" alt="" />

                <div class="giveaway">
                    <a href="#event"><img src="http://file3.willbes.net/new_cop/2018/11/EV1811226Y_01_btn.png"  alt="" /></a>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_cop/2018/11/EV1811226Y_02.jpg" alt="" />
            <img src="http://file3.willbes.net/new_cop/2018/11/EV1811226Y_04.gif" alt="" usemap="#Map181127_c" border="0" />
            <map name="Map181127_c" >
                <area shape="rect" coords="307,344,420,480" href="http://www.willbescop.net/movie/event.html?event_cd=On_181126_y#tab01" alt="최근 5개년 기출문제"/>
                <area shape="rect" coords="571,314,728,474" href="http://www.willbescop.net/lecture/movieLectureFreeList.html?topMenu=081&topMenuName=일반경찰&topMenuType=O&leftMenuLType=M0000&lecKType=F&FREE_TAB=TAB_005"  target="_blank" alt="무료기출해설 특강"/>
            </map>

            <div>
                <ul class="tabWrap" id="event">
                    <li><a href="#tab01">일반 / 경행/ 101단</a></li>
                    <li><a href="#tab02">해양경찰</a></li>
                    <li><a href="#tab03">경찰간부</a></li>
                </ul>

                <div id="tab01" class="evtTabCts">
                    <table cellspacing="0" cellpadding="0">
                        <col width="15%"  />
                        <col width=""  />
                        <col width="15%"  />
                        <tr>
                            <td>2018년 3차</td>
                            <td>경찰공무원(일반/경행) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=081&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=137933&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2018년 2차 </td>
                            <td>경찰공무원(일반/101단/경행) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=081&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132682&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2018년 1차 </td>
                            <td>경찰공무원(일반/101단/전의경) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=081&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132680&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2017년 2차 </td>
                            <td>경찰공무원(일반/101단/경행) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=081&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132677&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2017년 1차 </td>
                            <td>경찰공무원(일반/101단/전의경) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=081&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132676&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2016년 2차 </td>
                            <td>경찰공무원(일반/101단/경행) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=081&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132673&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2016년 1차 </td>
                            <td>경찰공무원(일반/101단/전의경) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=081&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132671&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2015년 3차 </td>
                            <td>경찰공무원(일반/101단/경행) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=081&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132669&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2015년 2차 </td>
                            <td>경찰공무원(일반/101단/전의경) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=081&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132667&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2015년 1차 </td>
                            <td>경찰공무원(일반/101단/경행) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=081&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132666&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2014년 2차 </td>
                            <td>경찰공무원(일반/101단/경행/전의경) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=081&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132665&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2014년 1차 </td>
                            <td>경찰공무원(일반/101단/경행) 채용시험 기출문제 </td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=081&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132663&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                    </table>
                    <ul class="mt30">
                        <li><a href="http://www.willbescop.net/lecture/movieLectureFreeList.html?topMenu=081&topMenuName=일반경찰&topMenuType=O&leftMenuLType=M0000&lecKType=F&FREE_TAB=TAB_005" target="_blank">일반/101단 기출해설 수강하기</a></li>
                        <li><a href="http://www.willbescop.net/lecture/movieLectureFreeList.html?topMenu=082&topMenuName=경행경채&topMenuType=O&leftMenuLType=M0000&lecKType=F&FREE_TAB=TAB_005" target="_blank">경행경체 기출해설 수강하기</a></li>
                    </ul>
                </div>

                <div id="tab02" class="evtTabCts">
                    <table cellspacing="0" cellpadding="0">
                        <col width="15%"  />
                        <col width=""  />
                        <col width="15%"  />
                        <tr>
                            <td>2018년 3차</td>
                            <td>해양경찰(함정요원) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=081&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132709&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2018년 2차</td>
                            <td>해양경찰(순경) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=081&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132711&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2018년    1차</td>
                            <td>해양경찰(순경) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=081&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132713&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2017년    2차</td>
                            <td>해양경찰(함정요원/해경학과) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=083&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132719&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2017년    1차</td>
                            <td>해양경찰(함정요원/해경학과) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=083&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132720&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2016년    3차</td>
                            <td>해양경찰(순경) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=083&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132721&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2016년 2차</td>
                            <td>해양경찰(함정요원/운용/해경학과) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=083&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132722&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2015년 3차</td>
                            <td>해양경찰(순경) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=083&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132725&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2015년    2차</td>
                            <td>해양경찰(함정요원/해경학과) 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=083&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132726&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                    </table>
                    <p class="mt30"><a href="http://www.willbescop.net/lecture/movieLectureFreeList.html?topMenu=088&topMenuName=해양경찰특채&topMenuType=O&leftMenuLType=M0000&lecKType=F&FREE_TAB=TAB_005"><img src="http://file3.willbes.net/new_cop/2018/11/EV1811226Y_02_btn02.jpg" alt="" /></a></p>
                </div>

                <div id="tab03" class="evtTabCts">
                    <table cellspacing="0" cellpadding="0">
                        <col width="15%"  />
                        <col width=""  />
                        <col width="15%"  />
                        <tr>
                            <td width="117">2019년 68기</td>
                            <td width="374">경찰간부후보생 채용시험    기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=081&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132683&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2018년 67기</td>
                            <td>경찰간부후보생 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=081&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132679&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2017년 66기</td>
                            <td>경찰간부후보생 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=081&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132678&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                        <tr>
                            <td>2016년 65기</td>
                            <td>경찰간부후보생 채용시험 기출문제</td>
                            <td><a href="http://www.willbescop.net/library/library_view.html?topMenuType=O&topMenuGnb=OM_004&topMenu=081&menuID=OM_004_004&BOARD_MNG_SEQ=NOTICE_005&BOARDTYPE=8&INCTYPE=view&currentPage=1&BOARD_SEQ=132675&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" target="_blank">바로가기</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="http://file3.willbes.net/new_cop/2018/11/EV1811226Y_03.jpg"  alt="" />
        </div>

        <!--  이모티콘 댓글 -->
        @include('html.event_incReplyEmoticon')
    </div>
    <!-- End Container -->


    <script src="/public/js/willbes/jquery.nav"></script>
    <script>
        /*tab*/
        $(document).ready(function(){
            $('.tabWrap').each(function(){
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

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
            /*e.preventDefault(); */
        });

        $( document ).ready( function() {
            var jbOffset = $( '.skybanner' ).offset();
            $( window ).scroll( function() {
                if ( $( document ).scrollTop() > jbOffset.top ) {
                    $( '.skybanner' ).addClass( 'skybanner_sectionFixed' );
                }
                else {
                    $( '.skybanner' ).removeClass( 'skybanner_sectionFixed' );
                }
            });
        } );
    </script>

@stop