@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
        .evtCtnsBox img {max-width:100%;}
        .evtCtnsBox.wrap {position:relative}
        .wrap{position:relative}
        /*.evtCtnsBox.wrap a {border:1px solid #000}*/

        .evtTop {background:#6ea5ff;} 
        .evtTop span {position:absolute; left:50%; top: 22%; width:21vw;transform: translateX(-57%); z-index: 2;}
        @@keyframes upDown{
            from{color:#fff}
            50%{color:#ffe87d; scale:1.1}
            to{color:#fff}
        }
        @@-webkit-keyframes upDown{
            from{color:#fff}
            50%{color:#ffe87d; scale:1.1}
            to{color:#fff}
        }
        .evt02{background-color: #1c478b;}
        .evt02 .shinyBtn{position: absolute; left: 50%; transform: translateX(-50%); top: 75.95%; z-index: 2;}
        .evt02 .shinyBtn a {width: 87vw;font-size: 3.6vw;padding: 4% 0;background-color:#ffff00;color:#000;font-weight: bold;letter-spacing: -0.02em;}

        .evt03 { background-color: #eff3fa; padding: 15% 0;}
        .evt03 .tab {display:flex; justify-content: space-between; max-width:94%; width: 100%; flex-wrap: wrap; margin: 0 auto; padding-bottom: 7%;}
        .evt03 .tab a {display:block; width:calc(50% - 1.5px); margin-bottom: 3px; text-align:center; border:3px solid #061a3b; font-size:5vw; background:#061a3b; color:#fff;
             padding:2% 0; 
        }
        .evt03 .tab a:hover,
        .evt03 .tab a.active {background:#ffff00; color:#1f2a3c; border:3px solid #061a3b; }

        .shinyBtn a {display:block; border-radius:16px; position: relative; overflow: hidden;}
        .shinyBtn a:hover {background:#061a3b; color:#fff;}
        .shinyBtn a:after{
            content:'';
            position: absolute;
            top:0;
            left:0;
            background-color: #fff;
            width: 60px;
            height: 100%;
            z-index: 1;
            transform: skewY(129deg) skewX(-60deg);
        }
        .shinyBtn a:after{animation:shinyBtn 2s ease-in-out infinite;}
        @@keyframes shinyBtn {
            0% {transform: scale(0) rotate(45deg); opacity: 0;}
            80% {transform: scale(0) rotate(45deg); opacity: 0.2;}
            81% {transform: scale(4) rotate(45deg); opacity: 0.5;}
            100% {transform: scale(60) rotate(45deg); opacity: 0;}
        }


        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
        }
        .b-close {
            position: absolute;
            right: 0;
            top: -16%;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
            
        }
        .b-close img{width: 90%;}
        .Pstyle .content {height:auto;width: 94%;margin: 0 auto;}
        .Pstyle .content img{ width: 100%; max-width: 720px; }
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evtTop"  data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2947m_top.jpg" alt="2차 전문과목 실전pack"/>
            <a href="javascript:go_popup('#popup1');" title="3순환 자세히보기" style="position: absolute; left: 10%; top: 58.83%; width: 56.67%; height: 5.42%; z-index: 2;"></a>
            <a href="javascript:go_popup('#popup2');" title="4순환 자세히보기" style="position: absolute; left: 10.69%; top: 80.25%; width: 48.89%; height: 5.42%; z-index: 2;"></a>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2947m_01.jpg" alt="한번의 1수강 등록으로"/>
        </div>
        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2947m_02.jpg" alt="최종합격 실전pack수강료"/>
            <div class="shinyBtn">
                <a href="https://pass.willbes.net/m/pass/offPackage/show/prod-code/206609" target="_blank">[실강] 7급 2차 최종합격 실전 PACK  수강신청 바로가기 > </a>
            </div>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <div class="wrap">
                <div class="tab">
                    <a href="#tab01" class="active NSK-Black">헌법 선동주</a>
                    <a href="#tab02" class="NSK-Black">행정법 이승민</a>
                    <a href="#tab03" class="NSK-Black">행정학 김철</a>
                    <a href="#tab04" class="NSK-Black">경제학 박태천</a>
                </div>
            </div>
            <div class="wrap">
                <div id="tab01">
                    <img src="https://static.willbes.net/public/images/promotion/2023/04/2947m_03_01.jpg" alt="헌법 선동주">
                    <a href="https://pass.willbes.net/support/examNews/show/cate/3020?board_idx=456500" target="_blank" style="position: absolute; left: 0.97%; top: 89.17%; width: 98.06%; height: 10.83%; z-index: 2;"></a>
                </div>
                <div id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2023/04/2947m_03_02.jpg" alt="행정법 이승민">
                    <a href="https://pass.willbes.net/support/examNews/show/cate/3020?board_idx=456503" target="_blank" style="position: absolute; left: 0.97%; top: 89.17%; width: 98.06%; height: 10.83%; z-index: 2;"></a>   
                </div>
                <div id="tab03">
                    <img src="https://static.willbes.net/public/images/promotion/2023/04/2947m_03_03.jpg" alt="행정학 김철">
                    <a href="https://pass.willbes.net/support/examNews/show/cate/3020?board_idx=456502" target="_blank" style="position: absolute; left: 0.97%; top: 89.17%; width: 98.06%; height: 10.83%; z-index: 2;"></a> 
                </div>
                <div id="tab04">
                    <img src="https://static.willbes.net/public/images/promotion/2023/04/2947m_03_04.jpg" alt="경제학 박태천">
                    <a href="https://pass.willbes.net/support/examNews/show/cate/3020?board_idx=456504" target="_blank" style="position: absolute; left: 0.97%; top: 89.17%; width: 98.06%; height: 10.83%; z-index: 2;"></a>   
                </div>
            </div>
        </div>

    </div>

    <div id="popup1" class="Pstyle NSK">
        <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png" alt=""></span>
        <div class="content">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2497_popup01.jpg" alt=""/>
        </div>
    </div>

    <div id="popup2" class="Pstyle NSK">
        <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png" alt=""></span>
        <div class="content">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2497_popup02.jpg" alt=""/>
        </div>
    </div>
   <!-- End Container -->


    <script>
        /*탭*/
        $(document).ready(function(){
            $('.tab').each(function(){
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
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
        AOS.init();
        });
        //팝업
        function go_popup(id){$(id).bPopup();}
    </script>

    
@stop