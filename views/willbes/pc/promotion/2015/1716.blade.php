@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">            
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed; top:200px; width:180px; right:10px; z-index:1;}
        .sky a {padding-bottom:10px; display:block}
        
        .evtTop {background:#79CAFF url(https://static.willbes.net/public/images/promotion/2023/01/1716_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#79CAFF url(https://static.willbes.net/public/images/promotion/2020/07/1716_01_bg.jpg) no-repeat center top;}
        .evt02 {background:#9090FE url(https://static.willbes.net/public/images/promotion/2020/07/1716_02_bg.jpg) no-repeat center top;}
        .evt03 {background:#fff url(https://static.willbes.net/public/images/promotion/2020/07/1716_03_bg.jpg) no-repeat center top; width:1120px; margin:0 auto; font-size:16px}
        .evt03 table {border:1px solid #c2c2c2; width:980px; margin:100px auto 150px}
        .evt03 table th,
        .evt03 table td {padding:15px; border-right:1px solid #c2c2c2}
        .evt03 table th {background:#e1e1e1; color:#333; font-size:18px; font-weight:bold }
        .evt03 table tr {border-bottom:1px solid #c2c2c2}
        .evt06 {background: url(https://static.willbes.net/public/images/promotion/2023/01/1716_06_bg.jpg) no-repeat center top;} 

         /*탭(이미지)*/
        .tabs{width:100%; text-align:center;}
        .tabs ul {width:1116px;margin:0 auto;border-bottom:5px solid #363636;}		
        .tabs li {display:inline; float:left;}	
        .tabs a img.off {display:block}
        .tabs a img.on {display:none}
        .tabs a.active img.off {display:none}
        .tabs a.active img.on {display:block}
        .tabs ul:after {content:""; display:block; clear:both}
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky">
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2020/07/1716_sky.jpg"  title="수강신청하기" /></a>
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/1716_top.jpg" title="스파르타 합격 관리반">                    
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1716_01.jpg" title="비포어">           
        </div>
        
        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1716_02.jpg" title="애프터">           
        </div>
        
        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1716_03.jpg" title="차별화된 합격시스템">
            <div class="tabs">
                <ul>
                    <li>
                        <a href="#tab01s" class="active">
                            <img src="https://static.willbes.net/public/images/promotion/2020/07/1716_03_tab01on.png" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2020/07/1716_03_tab01off.png" class="off"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab02s">
                            <img src="https://static.willbes.net/public/images/promotion/2020/07/1716_03_tab02on.png" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2020/07/1716_03_tab02off.png" class="off"/>
                        </a>
                    </li>
                </ul>
            </div>
            <div id="tab01s" > 
                <img src="https://static.willbes.net/public/images/promotion/2023/02/1716_03_tab01.jpg" /> 
                <div>
                    <table cellspacing="0" cellpadding="0">
                        <col span="3" />
                        <tr>
                            <th>시간</th>
                            <th>월 / 화 / 수 / 목 / 금 / 토</th>
                            <th>일</th>
                        </tr>
                        <tr>
                            <td>7:50</td>
                            <td>등원 및 출석체크</td>
                            <td rowspan="10">자기주도학습</td>
                        </tr>
                        <tr>
                            <td>08:00 ~ 08:50</td>
                            <td>강제 학습</td>
                        </tr>
                        <tr>
                            <td>09:00 ~ 12:00</td>
                            <td>오전 수업(실강)</td>
                        </tr>
                        <tr>
                            <td>12:00 ~ 13:00</td>
                            <td>점심 시간</td>
                        </tr>
                        <tr>
                            <td>13:00 ~ 14:00</td>
                            <td>강제 학습</td>
                        </tr>
                        <tr>
                            <td>14:00 ~ 17:00</td>
                            <td>오후 수업(실강)</td>
                        </tr>
                        <tr>
                            <td>17:00 ~ 18:00</td>
                            <td>저녁 시간</td>
                        </tr>
                        <tr>
                            <td>18:00 ~ 19:40</td>
                            <td>강제 학습</td>
                        </tr>
                        <tr>
                            <td>20:00 ~ 21:40</td>
                            <td>강제 학습</td>
                        </tr>
                        <tr>
                            <td>22:00 ~ 23:00</td>
                            <td>강제 학습</td>
                        </tr>
                    </table>
                </div>     
            </div>                                        
            <div id="tab02s">
                <img src="https://static.willbes.net/public/images/promotion/2023/02/1716_03_tab02.jpg" />     
                <div>    
                    <table cellspacing="0" cellpadding="0">
                        <col span="3" />
                        <tr>
                            <th>시간</th>
                            <th>월 / 화 / 수 / 목 / 금 / 토</th>
                            <th>일</th>
                        </tr>
                        <tr>
                            <td>07:00 ~ 08:00</td>
                            <td>등원 및 출석체크</td>
                            <td rowspan="11">자기주도학습</td>
                        </tr>
                        <tr>
                            <td>08:00 ~ 09:40</td>
                            <td>강제 학습 1교시 (100분)</td>
                        </tr>
                        <tr>
                            <td>10:00 ~ 11:15</td>
                            <td>강제 학습 2교시 (75분)</td>
                        </tr>
                        <tr>
                            <td>11:45 ~ 13:00</td>
                            <td>강제 학습 3교시 (75분)</td>
                        </tr>
                        <tr>
                            <td>13:00 ~ 14:00</td>
                            <td>점심 시간 (60분)</td>
                        </tr>
                        <tr>
                            <td>14:00 ~ 15:15</td>
                            <td>강제 학습 4교시 (75분)</td>
                        </tr>
                        <tr>
                            <td>15:40 ~ 17:00</td>
                            <td>강제 학습 5교시 (75분)</td>
                        </tr>
                        <tr>
                            <td>17:30 ~ 18:45</td>
                            <td>강제 학습 6교시 (75분)</td>
                        </tr>
                        <tr>
                            <td>18:45 ~ 19:45</td>
                            <td>저녁 시간 (60분)</td>
                        </tr>
                        <tr>
                            <td>19:45 ~ 21:00</td>
                            <td>강제 학습 7교시 (75분)</td>
                        </tr>
                        <tr>
                            <td>21:00 ~ 22:15</td>
                            <td>강제 학습 8교시 (75분)</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
         <div class="evtCtnsBox evt06" id="apply" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/02/1716_06.jpg" title="수강신청">
                <a href="https://willbesedu.willbes.net/pass/offLecture/index?cate_code=3126&campus_ccd=605005&course_idx=1310" target="_blank" style="position: absolute; left: 41.7%; top: 38.71%; width: 16.07%; height: 5.08%; z-index: 2;"></a>
            </div>                  
        </div>

	</div>
    <!-- End Container --> 

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">    
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        /*탭(이미지버전)*/
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

    $(document).ready(function(){
        $(".tabCts").hide(); 
        $(".tabCts:first").show();        
        $(".evttab ul li a").click(function(){             
            var activeTab = $(this).attr("href"); 
            $(".evttab ul li a").removeClass("active"); 
            $(this).addClass("active"); 
            $(".tabCts").hide(); 
            $(activeTab).fadeIn();             
            return false; 
        });
    });

    $(document).ready(function() {
        AOS.init();
    });
</script>
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop