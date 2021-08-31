@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        .evtCtnsBox .wrap a:hover {background-color:rgba(0,0,0,0.2)}

        /************************************************************/

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/08/2343_top_bg.jpg) no-repeat center top;}

        .evt_01 {background:#1f1f1f;}   
        .evt_02 #tab02{padding-top: 70px;}
        .evt_02 #tab04{padding-top: 70px;}
        
        .evtTab {
            display: flex;
            position: absolute;
            top:94px;
            left:24px;
            justify-content: center;
            align-items: center;           
        }
        .evtTab li {width:168px; height:58px;border:3px solid #ff6565; border-radius: 5px; margin-right:12px; line-height: 52px;}
        .evtTab li:nth-child(3){border:3px solid #3997dd;}
        .evtTab li:nth-child(3) a{color:#3997dd;}
       
        .evtTab li:nth-child(4){border:3px solid #3997dd;}
        .evtTab li:nth-child(4) a{color:#3997dd;}
        .evtTab li:nth-child(5){border:3px solid #3997dd;}
        .evtTab li:nth-child(5) a{color:#3997dd;}
        .evtTab li:nth-child(6){border:3px solid #3997dd;}
        .evtTab li:nth-child(6) a{color:#3997dd;}
        .evtTab li a {display:block; color:#ff6565; font-size:20px; font-weight:bold; position: relative}   
        .evtTab li a::after{
            content: '';
            display: block;
            background: url(https://static.willbes.net/public/images/promotion/2021/08/2343_iconcursor.png) no-repeat center center;
            width:36px;
            height:36px;
            position: absolute;
            top:30px;
            right:5px;
        }    
        .evtTab li a:hover,.evtTab li a.active{color:#fff;}
        .evtTab li:nth-child(1) a:hover,.evtTab li:nth-child(1) a.active{background-color: #ff6565;}
        .evtTab li:nth-child(2) a:hover,.evtTab li:nth-child(2) a.active{background-color: #ff6565;}
        .evtTab li:nth-child(3) a:hover,.evtTab li:nth-child(3) a.active{background-color: #3997dd;}
        .evtTab li:nth-child(4) a:hover,.evtTab li:nth-child(4) a.active{background-color: #3997dd;}
        .evtTab li:nth-child(5) a:hover,.evtTab li:nth-child(5) a.active{background-color: #3997dd;}
        .evtTab li:nth-child(6) a:hover,.evtTab li:nth-child(6) a.active{background-color: #3997dd;}
        

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2343_top.jpg"  alt="파이널 패스" />
        </div>

        <div class="evtCtnsBox evt_01">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2343_01.jpg"  alt="파이널 패스" />
                <ul class="evtTab">
                    <li><a href="#tab01">한능검</a></li>
                    <li><a href="#tab02">지텔프</a></li>
                    <li><a href="#tab03">형사법</a></li>
                    <li><a href="#tab04">경찰학</a></li>
                    <li><a href="#tab05">헌법</a></li>
                    <li><a href="#tab06">범죄학</a></li>
                </ul>  
            </div>
        </div>     
        
        <div class="evtCtnsBox evt_02">
            <div id="tab01">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2343_01_01.jpg"  alt="한국사능력검정시험" />
                    <a href="https://www.historyexam.go.kr/pageLink.do?link=examSchedule&netfunnel_key=948EB88138791B554C1AE9BFE18DD2A00937CDBC98B25DA8DAAC931FD8863A606638697C795123B58B8CFE6468C44E6B0B4F083A8554DA8545A0885C169A872415C2B0916BB30705FB40A46761BAC5BAB258F3EC4E2B229AFD873BE0F99D6EC6376874672F878F1878670FC0666775E22C362C312C302C30" title="한능검 원서접수 바로가기" target="_blank" style="position: absolute; left: 32.77%; top: 47.67%; width: 34.73%; height: 3.7%; z-index: 2;"></a>
                    <a href="https://www.historyexam.go.kr/pst/list.do?bbs=dat" title="한능검기출문제 확인하기" target="_blank" style="position: absolute; left: 67.68%; top: 78.11%; width: 15.18%; height: 0.96%; z-index: 2;"></a>
                    <a href="https://www.historyexam.go.kr/" title="원서접수 바로가기"  target="_blank" style="position: absolute; left: 65.27%; top: 91.02%; width: 23.57%; height: 2.59%; z-index: 2;"></a>
                </div>
            </div>
            <div id="tab02">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2343_01_02.jpg"  alt="국제공인영어시험 지텔프" />
                    <a href="https://www.g-telp.co.kr:335/info/info7.asp" title="샘플테스트" target="_blank" style="position: absolute; left: 68.57%; top: 80.24%; width: 15.18%; height: 0.9%; z-index: 2;"></a>
                    <a href="https://www.g-telp.co.kr:335/" title="지텔프 원서접수 바로가기" target="_blank" style="position: absolute; left: 19.55%; top: 92.72%; width: 22.41%; height: 1.99%; z-index: 2;"></a>
                </div>
            </div>    
            <div id="tab03">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2343_01_03.jpg"  alt="형사법" />
                </div>
            </div>    
            <div id="tab04">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2343_01_04.jpg"  alt="경찰학" />
                </div>
            </div>    
            <div id="tab05">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2343_01_05.jpg"  alt="헌법" />
                    <a href="https://police.willbes.net/promotion/index/cate/3001/code/2284" title="경찰헌법 학습 tip자세히보기" target="_blank" style="position: absolute; left: 67.68%; top: 85.02%; width: 21.7%; height: 3.7%; z-index: 2;"></a>
                </div>            
            </div>    
            <div id="tab06">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2343_01_06.jpg"  alt="범죄학" />
                </div>
            </div>  
        </div>
 


    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function(){
            $('.evtTab').each(function(){
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