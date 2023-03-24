@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            font-size:14px;
            line-height:1.4;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed;top:250px;right:10px; width:120px; z-index:100;}
        .sky a {display:block; margin-bottom:10px; background:#fff; border:3px solid #071b44; color:#071b44; padding:15px; text-align:center; font-size:16px}
        .sky a:hover {color:#fff; background:#071b44}

        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2023/03/2931_top_bg.jpg) no-repeat center top;}
        .eventTop span {position: absolute; z-index: 2;}
        .eventTop .title {top:250px; left:50%; margin-left:-450px}
        .eventTop .point {top:160px; left:50%; margin-left:255px;
            -webkit-animation: slide-top 1s ease-out infinite ;
	        animation: slide-top 1s ease-out infinite ;
        }
        @@-webkit-keyframes slide-top {
        0% {
            -webkit-transform: translateY(0);
                    transform: translateY(0);
            }
        100% {
            -webkit-transform: translateY(-30px);
                    transform: translateY(-30px);
            }
        }
        @@keyframes slide-top {
        0% {
            -webkit-transform: translateY(0);
                    transform: translateY(0);
            }
        100% {
            -webkit-transform: translateY(-30px);
                    transform: translateY(-30px);
            }
        }

        .evt01 {padding:150px 0}
        .evt01 .profThumb {width:1200px; margin:80px auto; display:flex; flex-wrap: wrap; justify-content: space-between;}
        .evt01 .profThumb span {display:block; margin-bottom:10px;}
        .evt01 .profThumb span img {width:100%;}
        .evt01 .profThumb span a {display:block;border-radius:10px}
        .evt01 .profThumb span a:hover {-webkit-animation: scale-up-center 0.4s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
	        animation: scale-up-center 0.4s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;}
        @@-webkit-keyframes scale-up-center {
        0% {
            -webkit-transform: scale(1);
                    transform: scale(1);
            }
        100% {
            -webkit-transform: scale(1.2);
                    transform: scale(1.2);
            -webkit-box-shadow: 0 20px 20px 0px rgba(0, 0, 0, 0.35);
            box-shadow: 0 20px 20px 0px rgba(0, 0, 0, 0.35);
            }
        }
        @@keyframes scale-up-center {
        0% {
            -webkit-transform: scale(1);
                    transform: scale(1);
            }
        100% {
            -webkit-transform: scale(1.2);
                    transform: scale(1.2);
            -webkit-box-shadow: 0 20px 20px 0px rgba(0, 0, 0, 0.35);
            box-shadow: 0 20px 20px 0px rgba(0, 0, 0, 0.35);
            }
        }
        .profHome {width:938px; margin:0 auto}
        .profHome .list {border-bottom:2px dotted #363636; position: relative;}
        .profHome .list iframe{position: absolute; top:75px; left:620px; width:293px; height:170px; z-index: 2;}
        .profHome .list a {position: absolute; left: 25.91%; top: 39.57%; width: 10.98%; height: 14.03%; z-index: 2;}


        .evt02 {padding-bottom:100px; width:1120px; margin:0 auto}
        .evt02 .close {position: absolute; display:flex; background:rgba(0,0,0,0.5); width:100%; height: 100%; left:0; top:0; z-index: 10;justify-content: center;align-items: center;}
        .evt02 .close span {border:10px double #cc0000; color:#cc0000; font-size:50px; padding:40px; transform: rotate(-20deg)}

        .evt02 .btns {margin:50px 0;}
        .evt02 .btns a {display:inline-block; text-align:center; height:50px; line-height:50px; font-size:20px; color:#fff; background:#000; margin:0 10px; border-radius:40px; padding:0 50px}
        .evt02 .btns a:hover {background:#5d46c0}   
        .evt_table .txtinfo {text-align:left;}
        .evt_table .txtinfo div {font-size:18px; font-weight:bold; margin-bottom:20px}
        .evt_table .txtinfo ul {padding:20px; border:1px solid #ccc; height: 150px; overflow-y: auto;}
        .evt_table .txtinfo li {list-style: dimical; margin-left:15px; margin-bottom:10px;line-height:1.25;}
        .evt_table .txtinfo li a {display:inline-block; font-size:12px; color:#ffff00; border:1px solid #ffff00; border-radius:20px; padding:2px 10px}


        .evt02 .txtinfo02 {text-align:left; color:red; font-size:16px; margin-top:30px}

        .evt_table {padding:35px}       
        .evt_table table{width:100%;border-top:1px solid #e9e9e9;}
        .evt_table table tr.elementary {border-bottom:1px solid #666}
        .evt_table table tr {border-bottom:1px solid #e9e9e9}
        .evt_table table th,
        .evt_table table td {margin:10px 0; font-size:16px; color:#666}
        .evt_table table th {background:#f9f9f9; color:#000;}
        .evt_table thead th {background:#d9d9d9; color:#000; font-size:24px; font-weight:bold; padding:20px; border:1px solid #000}
        .evt_table table td{text-align:left; padding:17px 10px}
        .evt_table label {margin-right:10px; line-height:28px;}
        .evt_table input {vertical-align:middle}
        .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; background:#f5f5f5; vertical-align:middle; width:90%; margin-bottom:5px}
        .evt_table td input[type=text]:last-child {margin-bottom:0}
        .evt_table input[type=radio],
        .evt_table input[type=checkbox] {height:20px; width:20px; margin-right:5px}
        .evt_table td ul {display:flex; flex-wrap: wrap;}
        .evt_table td li {letter-spacing:-1px;margin:20px 0;}
        .evt_table tr:nth-child(3) li {width:33.3333%;}
        .evt_table tr:nth-child(4) li {width:33.3333%;}
        .evt_table td .editBtn {padding:5px 15px; background:#5e46c0; color:#fff; border-radius:30px}
        .middle {background:#0070C0;color:#fff;display:inline-block;padding:0 10px;}
        .subject_line {border-bottom:1px solid #E9E9E9;}
        .subjct_title {font-weight:bold;vertical-align:unset;}
        .cms {font-weight:100;vertical-align:text-top;font-size:11px;background:#666;color:#fff;padding:0px 5px;margin-left:3px;}
        .check {margin:10px auto 30px; text-align:left}
        .check p {margin-bottom:50px;padding-top:75px;}
        .check label {cursor:pointer; font-weight:bold;font-size:15px;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        
        .evt_apply_table {width:980px; margin:0 auto;padding:50px}
        .evt_apply_table .btns_apply a {display:block; text-align:center; font-size:24px; color:#fff; background:#000; border-radius:40px; padding:20px 50px}
        .evt_apply_table .btns_apply a:hover {background:#af1e2d}

        .evt03 {width:1120px; margin:0 auto;}
        .urlWrap {width:1030px; margin:0 auto}
        .urlWrap .urladd {padding:20px; background:#2e2e3c; color:#fff; margin:0 auto 20px; font-size:14px}
        .urlWrap .urladd input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; background:#f5f5f5; vertical-align:middle; width:70%; margin:0 10px; color:#000}
        .urlWrap .urladd a {display:inline-block; height:28px; line-height:28px; color:#2e2e3c; background:#ffc943; padding:0 20px; vertical-align:middle}
        .urlWrap .evt_table {width:100%; background-color:#fff !important; padding:20px 0}
        .urlWrap .evt_table table td {font-size:14px; text-align:center}
        .urlWrap .evt_table table td:nth-child(2) {text-align:left}

        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2023/03/2931_04_bg.jpg) no-repeat center top;}

        /*안내사항*/
        .evtInfo {padding:120px 0 100px; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox h4 {font-size:40px; margin-bottom:20px;}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}       

    </style>

    <div class="evtContent NSK" id="evtContainer">        
        <div class="evtCtnsBox eventTop">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_top.jpg" alt="찾아가는 설명회/특강"/>
            <span class="point"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_top_img01.png" alt=""/></span>
        	<span class="title" data-aos="flip-down"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_top_img02.png" alt="찾아가는 설명회/특강"/></span>            
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_top.jpg" alt=""/>
            <div class="profThumb">
                <span><a href="#lsit01"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t01.png" alt=""/></a></span>
                <span><a href="#lsit02"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t02.png" alt=""/></a></span>
                <span><a href="#lsit03"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t03.png" alt=""/></a></span>
                <span><a href="#lsit04"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t04.png" alt=""/></a></span>
                <span><a href="#lsit05"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t05.png" alt=""/></a></span>
                <span><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t06.png" alt=""/></span>
                <span><a href="#lsit07"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t07.png" alt=""/></a></span>
                <span><a href="#lsit08"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t08.png" alt=""/></a></span>
                <span><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t09.png" alt=""/></span>
                <span><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t10.png" alt=""/></span>
                <span><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t11.png" alt=""/></span>
                <span><a href="#lsit13"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t13.png" alt=""/></a></span>
                <span><a href="#lsit12"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t12.png" alt=""/></a></span>
                <span><a href="#lsit14"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t14.png" alt=""/></a></span>
                <span><a href="#lsit15"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t15.png" alt=""/></a></span>
                <span><a href="#lsit16"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t16.png" alt=""/></a></span>
                <span><a href="#lsit17"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t17.png" alt=""/></a></span>
                <span><a href="#lsit18"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t18.png" alt=""/></a></span>
                <span><a href="#lsit19"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t19.png" alt=""/></a></span>
                <span><a href="#lsit20"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t20.png" alt=""/></a></span>
                <span><a href="#lsit21"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t21.png" alt=""/></a></span>
                <span><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t00.png" alt=""/></span>
                <span><a href="#lsit22"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t22.png" alt=""/></a></span>
                <span><a href="#lsit23"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t23.png" alt=""/></a></span>
                <span><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t24.png" alt=""/></span>
                <span><a href="#lsit25"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t25.png" alt=""/></a></span>
                <span><a href="#lsit26"><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t26.png" alt=""/></a></span>
                <span><img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_t00.png" alt=""/></span>
            </div>
            <div class="profHome">
                <div class="list" id="lsit01">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b01.png" alt="유아 민정선"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51076?cate_code=3135&subject_idx=1981" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/1nhvzwp2Gos?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit02">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b02.png" alt="초등 배재민"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51077?cate_code=3135&subject_idx=1982" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/vB6VKuwBEwg?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit03">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b03.png" alt="교육학 이경범"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51312?cate_code=3134&subject_idx=1980" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/bFhmAdfWgHw?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit04">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b04.png" alt="교육학 정현"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51158?cate_code=3134&subject_idx=1980" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/pu1Jyv22mek?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit05">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b05.png" alt="국어 송원영"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51078?cate_code=3137&subject_idx=1983" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/qCzPIJl2Gwg?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit07">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b07.png" alt="국어 구동언"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51313?cate_code=3137&subject_idx=1983" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/0mMXLf0Hd9c?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit08">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b08.png" alt="영어 김유석"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51313?cate_code=3137&subject_idx=1983" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/mnTVcvRsZvw?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit13">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b13.png" alt="수학교육론 박태영"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51085?cate_code=3137&subject_idx=1986" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/3LQ-cxTOVF4?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit12">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b12.png" alt="수학교육론 박혜향"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51314?cate_code=3137&subject_idx=1986" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/-7-XskxUNiE?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit14">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b14.png" alt="생물 강치욱"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51086?cate_code=3137&subject_idx=1987" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/V3cCh63R7Q8?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit15">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b15.png" alt="생물 양혜정"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51087?cate_code=3137&subject_idx=1988" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/Q7YXa2rSSxY?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit16">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b16.png" alt="화학 강철"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51310?cate_code=3137&subject_idx=2206" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/9_jTm9CFcsE?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit17">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b17.png" alt="도덕윤리 김병찬"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51088?cate_code=3137&subject_idx=1989" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/ps1EI1fhsqw?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit18">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b18.png" alt="일반사회 허역"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51316?cate_code=3137&subject_idx=2035" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/br3DAn1AZ7w?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit19">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b19.png" alt="일반사회 이웅재"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51316?cate_code=3137&subject_idx=2035" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/sKKeTuXvBDY?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit20">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b20.png" alt="일반사회 정인홍"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51316?cate_code=3137&subject_idx=2035" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/_b96pyf6Oyg?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit21">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b21.png" alt="일반사회 김현중"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51316?cate_code=3137&subject_idx=2035" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/sOJItCIHz48?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit22">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b22.png" alt="역사 김종권"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51315?cate_code=3137&subject_idx=1990" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/KFCEtn3bglE?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit23">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b23.png" alt="음악 다이애나"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51090?cate_code=3137&subject_idx=1991" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/Pj5tPame7kg?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit25">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b25.png" alt="전기전자 최우영"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51091?cate_code=3137&subject_idx=1992" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/G6fRXl5rCeM?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="list" id="lsit26">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_01_b26.png" alt="중국어 장영희"/>
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51318?cate_code=3137&subject_idx=1995" target="_blank"></a>
                    <iframe src="https://www.youtube.com/embed/Z0MU1njnDy0?rel=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>

        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_type" value="promotion"/>
            <input type="hidden" id="register_name" name="register_name" value="{{(sess_data('is_login') === true) ? $arr_base['member_info']['MemName'] : ''}}">
            <input type="hidden" id="register_tel" name="register_tel" value="{{(sess_data('is_login') === true && empty($arr_base['member_info']['Phone']) === false) ? $arr_base['member_info']['Phone'] : ''}}">

            <input type="hidden" name="target_params[]" value="register_data1"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_data2"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_data3"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="출신학교/학부/학년"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="희망응시지역"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="응시횟수"/> {{-- 체크 항목 전송 --}}

            <div class="evtCtnsBox evt02" id="evt02" data-aos="fade-up">
                {{-- 신청완료
                <div class="close NSK-Black"><span>설명회/특강<br>신청 완료</span></div> --}}

                <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_02_01.jpg" alt="설명회 신청"/>

                <div class="mt80">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_02_02.jpg" alt="이벤트 참여 동의"/>
                </div>

                <div class="evt_table">         
                    <div class="txtinfo">
                        <ul>
                            <li>개인정보 수집 이용 목적<br>
                                - 본 이벤트의 대상자(설명회 신청자) 확인 및 각종 문의사항 응대<br>
                                - 통계분석 및 기타 마케팅에 활용<br>
                                - 윌비스 임용고시학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공</li>
                            <li>개인정보 수집 항목<br>
                            - 필수항목 : 성명, 본사ID, 연락처, 재학중인 학교</li>
                            <li>개인정보 이용기간 및 보유기간<br>
                            - 본사의 이용 목적 달성되었거나, 신청자의 해지요청 및 삭제요청 시 바로 파기</li>
                            <li>신청자의 개인정보 수집 및 활용 동의 거부 시<br>
                            - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다.</li>
                            <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3자에게 제공되지 않으며 개인정보 처리 방침에 따라 보호되고 있습니다.</li>
                            <li>이벤트 진행에 따른 저작물에 대한 저작권은 ㈜윌비스에 귀속됩니다.</li>
                        </ul>
                    </div>
                    <div class="check" id="chkInfo">
                        <label>
                            <input name="is_chk" id="is_chk" type="checkbox" value="Y" autocomplete="off"/>
                            이벤트참여에 따른 개인정보 및 마케팅활용 동의하기(필수)
                        </label>
                    </div>
                </div>

                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_02_03.jpg" alt="이벤트 참여 동의"/>
                </div>
                <div class="evt_table">
                    <table>
                        <col width="12%" />
                        <col width="" />
                        <col width="12%" />
                        <col width="23%" />
                        <col width="12%" />
                        <col width="23%" />
                        <tbody>
                            <tr>
                                <th>윌비스 ID</th>
                                <td>{{sess_data('mem_id')}}</td>
                                <th>이 름</th>
                                <td>{{sess_data('mem_name')}}</td>
                                <th>연락처</th>
                                <td>
                                    {{(sess_data('is_login') === true && empty($arr_base['member_info']['Phone']) === false) ? $arr_base['member_info']['Phone'] : ''}}
                                </td>
                            </tr>
                            <tr>
                                <th>출신학교/<br />
                                    학부/학년
                                </th>
                                <td colspan="3">
                                    <input type="text" name="register_data1" maxlength="100">
                                </td>
                                <th>학부/학과/<br />단체명</th>
                                <td>
                                    <input type="text" name="register_data2" maxlength="100">
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="mt30">
                        <col width="15%" />
                        <col width="35%" />
                        <col width="15%" />
                        <col width="35%" />
                        <tbody>   
                            <tr class="elementary">
                                <th>요청 과목</th>
                                <td>
                                    <select id="" name="" title="요청 과목 선택">
                                        <option value="">요청 과목 선택</option>
                                        <option value="유아">유아</option>
                                        <option value="초등">초등</option>
                                        <option value="교육학">교육학</option>
                                        <option value="국어">국어</option>
                                        <option value="영어">영어</option>
                                        <option value="수학">수학</option>
                                        <option value="생물">생물</option>
                                        <option value="화학">화학</option>
                                        <option value="도덕윤리">도덕윤리</option>
                                        <option value="일반사회">일반사회</option>
                                        <option value="역사">역사</option>
                                        <option value="음악">음악</option>
                                        <option value="전기전자통신">전기전자통신</option>
                                        <option value="중국어">중국어</option>
                                    </select>
                                </td>
                                <th>희망 교수진</th>                                    
                                <td>
                                    <select id="" name="" title="희망 교수진 선택">
                                        <option value="">희망 교수진 선택</option>
                                        <option value="민정선">민정선</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>진행일자</th>                                    
                                <td>
                                    <input type="text" name="" maxlength="100" placeholder="진행 날짜 선택">
                                    <div>* 신청일 기준으로 2주후부터 신청가능</div>
                                </td>
                                <th>시 간</th>                                    
                                <td>
                                    <select id="" name="" title="시간 선택">
                                        <option value="">요청 시간 선택</option>
                                        <option value="14:00~">14:00 ~</option>
                                        <option value="15:00~">15:00 ~</option>
                                        <option value="16:00~">16:00 ~</option>
                                        <option value="17:00~">17:00 ~</option>
                                        <option value="19:30~">19:30 ~</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>참석인원(예정)</th>                                    
                                <td>
                                    <select id="" name="" title="참석 인원">
                                        <option value="">참석인원(예정)</option>
                                        <option value="10명 ~ 15명">10명 ~ 15명</option>
                                        <option value="16명 ~ 30명">16명 ~ 30명</option>
                                        <option value="31명 ~ 50명">31명 ~ 50명</option>
                                        <option value="51명 ~ 100명">51명 ~ 100명</option>
                                        <option value="100명이상">100명이상</option>
                                    </select>
                                </td>
                                <th>진행형태</th>                                    
                                <td>
                                    <select id="" name="" title="시간 선택">
                                        <option value="">요청 시간 선택</option>
                                        <option value="현장 설명회/특강">현장 설명회/특강</option>
                                        <option value="실시간 Zoom">실시간 Zoom</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>추가 요청 사항</th>                                    
                                <td colspan="3">
                                    <input class="btn-login-check" type="file" id="attach_file" name="attach_file" onchange="chkUploadFile(this)" style="width:40%; margin-right:10px"/>
                                    <a onclick="del_file();"><img src="https://static.willbes.net/public/images/promotion/2021/01/2034_btn_del.png" style="vertical-align:middle !important" alt="삭제"></a>
                                    <div>* 10MB 이하의 문서 파일(hwp, doc, txt)</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="txtinfo02">
                        ※ 찾아가는 설명회 및 특강의 일정은 윌비스 임용의 담당자와 협의 후 결정됩니다. (본 페이지는 신청페이지 입니다)<br>
                        ※ 진행일자 및 시간: 특강 진행 2주전까지 신청해 주시기 바랍니다. 윌비스 임용의 준비시간이 필요합니다.<br>
                        ※ 진행형태: 현장 특강(설명회)을 신청하신 경우, 장소 협조가 가능한 상태이어야 합니다.  <br>
                        ※ 추가 요청 사항: 상기 신청 목록 외 윌비스 임용에서 알고 있어야 할 사항을 자유형식으로 기재해 주시면 됩니다. <br>
                        (설명회 방향, 특강 참석자들의 궁금해 하는 사항, 원하는 특강 주제, 기타 요청 사항 등을 상세하게 기술해 주시면 
                            많은 도움이 됩니다.) <br>
                        ※ 상기 신청 내역은 기타 사정에 의하여 진행되지 않을 수 있음을 고려해 주시기 바랍니다. 
                    </div>
                </div>            

                <div class="evt_apply_table">
                    <div class="btns_apply">
                        <a href="javascript:void(0);" onclick="fn_submit(); return false;">설명회/특강 신청하기 ></a>
                    </div>
                </div>
            </div>
        </form>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2931_03.jpg" alt="sns"/>
                <a href="https://cafe.daum.net/teacherexam" title="다음카페" target="_blank" style="position: absolute; left: 7.05%; top: 90.88%; width: 7.05%; height: 5.79%; z-index: 2;"></a>
                <a href="https://cafe.naver.com/teacherexam2" title="네이버카페" target="_blank" style="position: absolute; left: 14.55%; top: 90.88%; width: 7.05%; height: 5.79%; z-index: 2;"></a>
                <a href="https://www.facebook.com" title="페이스북" target="_blank" style="position: absolute; left: 21.79%; top: 90.88%; width: 7.05%; height: 5.79%; z-index: 2;"></a>
                <a href="https://www.instagram.com" title="인스타그램" target="_blank" style="position: absolute; left: 29.11%; top: 90.88%; width: 7.05%; height: 5.79%; z-index: 2;"></a>
                <a href="https://section.blog.naver.com" title="블로그" target="_blank" style="position: absolute; left: 36.61%; top: 90.88%; width: 7.05%; height: 5.79%; z-index: 2;"></a>
                <a href="javascript:void(0);" title="주소복사하기" onclick="copyTxt();"  style="position: absolute; left: 50.71%; top: 91.04%; width: 17.59%; height: 5.79%; z-index: 2;"></a>
                <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운" style="position: absolute; left: 71.88%; top: 90.88%; width: 17.59%; height: 5.79%; z-index: 2;"></a>
            </div>
            <div class="urlWrap">
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_url_partial',array('login_url'=>app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www')))
                @endif
            </div> 
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2023/03/2931_04.jpg" alt="여러분 차례"/>
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">[각 대학별 설명회/특강 신청 시 참고사항]</h4>
                <ul>
                    <li>윌비스 임용에서 진행하는 찾아가는 설명회/특강의 최종일정은 담당자와 협의 후, 확정됩니다. (본 페이지는 
                        신청페이지 입니다)</li>
                    <li>본 찾아가는 설명회(특강)이벤트(이하, 본 이벤트)는 희망하는 설명회 일정의 2주전에 신청해 주셔야 합니다.</li>
                    <li>본 이벤트의 현장 특강(설명회)을 신청하신 경우, 장소 협조가 가능한 상태이어야 합니다.</li>
                    <li>본 이벤트 신청 시, 추가 요청 사항에 윌비스 임용에서 알고 있어야 할 사항을 자유형식으로 기재해 주시면 됩
                    니다. (설명회 방향, 특강 참석자들의 궁금해 하는 사항, 원하는 특강 주제, 기타 요청 사항 등을 상세하게 기술
                    해 주시면 많은 도움이 됩니다.) </li>
                    <li>본 이벤트 신청을 위해서는 참여인원이 10명 이상이어야 합니다.</li>
                    <li>본 이벤트는 최종일정 협의과정 중, 여러가지 사정에 의하여 진행되지 않을 수 있음을 고려해 주시기 바랍니다.</li>
                    <li>본 이벤트를 신청해 주시면, 각 과목별 수강 할인권을 지급할 예정입니다. (지급방법은 단체의 대표자에게 안내)</li>    
                </ul>
                <h4 class="NSK-Black mt100">[ 소문내기 이벤트 ]</h4>
                <ul>
                    <li>본 이벤트의 소문내기는 2023년 04월 30일(일)까지 입니다.</li>
                    <li>소문내기 이벤트는 각 사범대학 및 교육대학원의 커뮤니티에 작성해 주시면 당첨확률을 높일 수 있습니다.</li>
                </ul>
            </div>
        </div>   

    </div>
    <!-- End Container -->


    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">    
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();

            $('#regi_form_register').on("click", "input, select", function () {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

                var this_group = $(this).data("product-group");
                var this_limit = $(this).data("product-limit");

                if (this_limit < 1) {
                    alert('해당 과목의 설명회 일정은 추후 공지됩니다.');
                    return false;
                }

                if (this_group != 3) {
                    $(".sub-product").prop("checked", false);
                }

                if (this_group == 3) {
                    if ($(".main-product").is(":checked") === false) {
                        alert('교육학을 선택한 후 신청 가능합니다');
                        return false;
                    }

                    if ($(".sub-product:checked").length >= 3) {
                        alert('전공과목은 2개까지 선택할 수 있습니다.');
                        return false;
                    }
                }
            });
        });

        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($register_count) === false)
                alert('등록된 신청자 정보가 있습니다.');
                return;
            @endif

            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }

            if ($regi_form_register.find('input[name="register_data1"]').val() == '') {
                alert('출식학교/학부/학년을 입력해 주세요.');
                return;
            }

            if ($regi_form_register.find('select[name="register_data2"]').val() == '') {
                alert('희망응시지역을 선택해 주세요.');
                return;
            }

            if ($regi_form_register.find('select[name="register_data3"]').val() == '') {
                alert('응시횟수를 선택해 주세요.');
                return;
            }

            var chk_length = $regi_form_register.find('input[name="register_chk[]"]:checked').length;
            if (chk_length < 1) {
                alert('과목을 선택해 주세요.');
                return;
            }

            if (!confirm('신청하시겠습니까?')) { return; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }

        function fn_register_delete()
        {
            var $delete_register = $('#delete_register');
            var _url = '{!! front_url('/event/deleteAllRegister') !!}';

            if (!confirm('취소 하시겠습니까?')) { return; }
            ajaxSubmit($delete_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }

        // 비디오팝업
        function videoPop(id) { 
            $(id).bPopup({
                positionStyle:'fixed',            
                onClose: function(){
                    $('video').each(function(){
                        $(this).get(0).pause();
                    });
                }
            });
        } 

        /*레이어팝업*/     
        function go_popup1(){$('#popup1').bPopup();}
        function go_popup2(){$('#popup2').bPopup();}
        function go_popup11(){$('#popup11').bPopup();}
        function go_popup12(){$('#popup12').bPopup();}
        function go_popup13(){$('#popup13').bPopup();}
        function go_popup14(){$('#popup14').bPopup();}
        function go_popup15(){$('#popup15').bPopup();}
        function go_popup16(){$('#popup16').bPopup();}
        function go_popup17(){$('#popup17').bPopup();}
        function go_popup18(){$('#popup18').bPopup();}
        function go_popup19(){$('#popup19').bPopup();}
        function go_popup20(){$('#popup20').bPopup();}
        function go_popup21(){$('#popup21').bPopup();}
        function go_popup22(){$('#popup22').bPopup();}
        function go_popup23(){$('#popup23').bPopup();}
        function go_popup24(){$('#popup24').bPopup();}
        function go_popup25(){$('#popup25').bPopup();}
        function go_popup26(){$('#popup26').bPopup();}
        function go_popup27(){$('#popup27').bPopup();}
    </script>

    <script src="/public/vendor/jquery/slick/jquery.slick.min.js"></script>
    <script type="text/javascript">
        $ ('.wr_waves').slick({
            dots: false,
            arrows: false,
            infinite: true,
            autoplay:true,
            autoplaySpeed:0,
            speed: 2000,
            slidesToShow: 6,
            slidesToScroll: 1,
            adaptiveHeight: true,
            draggable: false,
            cssEase: 'linear',
            pauseOnHover:true,
            vertical:true
        });       
    </script>

{{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop