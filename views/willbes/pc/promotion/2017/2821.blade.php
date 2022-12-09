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

        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2022/11/2821_top_bg.jpg) no-repeat center top; height: 1009px;}
        .eventTop span {position: absolute; top:300px; left:50%; margin-left:-420px}

        .evt02 .btns {margin:50px 0;}
        .evt02 .btns a {display:inline-block; text-align:center; height:50px; line-height:50px; font-size:20px; color:#fff; background:#000; margin:0 10px; border-radius:40px; padding:0 50px}
        .evt02 .btns a:hover {background:#5d46c0}

        .evt03 {width:1120px; margin:0 auto;}        
        .evt_table {width:980px; margin:0 auto; border:1px solid #000; padding:50px}       
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
        .evt_apply_table .btns_apply {text-align:center;}
        .evt_apply_table .btns_apply a {display:inline-block; text-align:center; height:50px; line-height:50px; font-size:20px; color:#fff; background:#000; margin:0 10px; border-radius:40px; padding:0 50px}
        .evt_apply_table .btns_apply a:hover {background:#af1e2d}

        .evt_cancle_table {width:980px; margin:0 auto;padding:50px}
        .evt_cancle_table .btns_cancel {text-align:center;}
        .evt_cancle_table .btns_cancel a {display:inline-block; text-align:center; height:50px; line-height:50px; font-size:20px; color:#fff; background:#000; margin:0 10px; border-radius:40px; padding:0 50px}
        .evt_cancle_table .btns_cancel a:hover {background:#af1e2d}

        .evt_table .txtinfo {text-align:left;}
        .evt_table .txtinfo div {font-size:18px; font-weight:bold; margin-bottom:20px}
        .evt_table .txtinfo ul {padding:20px; border:1px solid #ccc; height: 150px; overflow-y: auto;}
        .evt_table .txtinfo li {list-style: dimical; margin-left:15px; margin-bottom:10px;line-height:1.25;}
        .evt_table .txtinfo li a {display:inline-block; font-size:12px; color:#ffff00; border:1px solid #ffff00; border-radius:20px; padding:2px 10px}

        .evt_table .close {position: absolute; display:flex; background:rgba(0,0,0,0.5); width:100%; height: 100%; left:0; top:0; z-index: 10;justify-content: center;align-items: center;}
        .evt_table .close span {border:10px double #cc0000; color:#cc0000; font-size:50px; padding:40px; transform: rotate(-20deg)}

        .evt04 {background:#FFE7E7;}

        .maps {padding:50px 0;}        
      
        .evt05 {background:#eee;}

        .evt06 {padding:100px 0}
        .urlWrap {width:1030px; margin:0 auto}
        .urlWrap .urladd {padding:20px; background:#2e2e3c; color:#fff; margin:0 auto 20px; font-size:14px}
        .urlWrap .urladd input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; background:#f5f5f5; vertical-align:middle; width:70%; margin:0 10px; color:#000}
        .urlWrap .urladd a {display:inline-block; height:28px; line-height:28px; color:#2e2e3c; background:#ffc943; padding:0 20px; vertical-align:middle}
        .urlWrap .evt_table {width:100%; background-color:#fff !important; padding:20px 0}
        .urlWrap .evt_table table td {font-size:14px; text-align:center}
        .urlWrap .evt_table table td:nth-child(2) {text-align:left}

        .evt07 {background:url(https://static.willbes.net/public/images/promotion/2022/11/2821_07_bg.jpg) no-repeat center top;}
        .evt08 {background:#171717; padding:150px 0}
        .evt08 .wrap {margin:50px auto 100px; display:flex; flex-wrap: wrap; justify-content: space-between; }
        .evt08 .wrap a {margin-bottom:20px}
        .evt08 .tableBox {width:1120px; margin:50px auto 0; padding:50px; background:#fff; border-radius:20px; }
        .evt08 .tableBox ul {height: 330px; overflow: hidden;}
        .evt08 .tableBox li a {display:flex; padding:15px 10px; font-size:16px; text-align:left; border-bottom:1px solid #ccc}
        .evt08 .tableBox li a:hover {background:#fdebf2;}
        .evt08 .tableBox li strong {width:15%; color:#ff9bbf; text-align:center}
        .evt08 .tableBox li p {width:75%}
        .evt08 .tableBox li span {width:10%; text-align:center}

        /*안내사항*/
        .evtInfo {padding:150px 0; background:#333; color:#fff; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox h4 {font-size:40px; margin-bottom:20px;}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}

        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
        }
        .b-close {
            position: absolute;
            right: -39px;
            top: -39px;
            display: inline-block;
            cursor: pointer;
            width: 78px;
            height: 78px; 
            transform: rotate(0deg);
            transition: all 1s;
            z-index: 9999;
        }
        .b-close:hover {transform: rotate(360deg); transition: all 1s;}
        
        .Pstyle .content {height:auto; width:auto;}
        .memoirs {background:#fff; padding:50px; width:900px; height:600px; overflow-y: scroll; font-size:15px; line-height:1.3}
        .memoirstitle {font-size:18px; padding-bottom:10px; border-bottom:1px solid #ccc; margin-bottom:10px; display:flex; justify-content: space-between;}
        .memoirstitle span {vertical-align:top}
        .memoirstitle strong {color:#1a4bba}


        .videoBox{position: relative; padding-top: 60%; width:760px;}
        .videoBox iframe{position: absolute; top:0; left:0; width:100%; height:100%; }

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#evt03">
            합격전략<br>
            설명회<br>
            (현장참석)<br>
            신청하기<br>👇
            </a> 
            <a href="#evt05">
            합격전략<br>
            설명회<br>
            소문내기<br>
            이벤트참여<br>👇
            </a>   
        </div>  
        
        <div class="evtCtnsBox eventTop">
        	<span data-aos="flip-down"><img src="https://static.willbes.net/public/images/promotion/2022/11/2821_top.png" alt="합격전략 설명회"/></span>
        </div>

        <div class="evtCtnsBox evt08" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/11/2821_08_title01.png" alt="윌비스 임용 합격생 간담회"/>
            <div class="wrap">
                <a href="javascript:videoPop('#vid1');"><img src="https://static.willbes.net/public/images/promotion/2022/11/2821_08_sum01.jpg"></a>
                <a href="javascript:videoPop('#vid2');"><img src="https://static.willbes.net/public/images/promotion/2022/11/2821_08_sum02.jpg"></a>
                <a href="javascript:videoPop('#vid3');"><img src="https://static.willbes.net/public/images/promotion/2022/11/2821_08_sum03.jpg"></a>
                <a href="javascript:videoPop('#vid4');"><img src="https://static.willbes.net/public/images/promotion/2022/11/2821_08_sum04.jpg"></a>
                <a href="javascript:videoPop('#vid5');"><img src="https://static.willbes.net/public/images/promotion/2022/11/2821_08_sum05.jpg"></a>
                <a href="javascript:videoPop('#vid6');"><img src="https://static.willbes.net/public/images/promotion/2022/11/2821_08_sum06.jpg"></a>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2821_08_title02.png" alt="윌비스 임용 합격생 간담회"/>
            <div class="tableBox">
                <div>
                <ul class="wr_waves">
                    <li><a href="#none" onclick="javascript:go_popup11()"><strong>국어</strong><p>꾸준함이 정말 최고입니다!</p><span>이현*</span></a></li>
                    <li><a href="#none" onclick="javascript:go_popup12()"><strong>도덕윤리</strong><p>2차 고득점의 비결은 1차 고득점이다</p><span>박동*</span></a></li>
                    <li><a href="#none" onclick="javascript:go_popup13()"><strong>생물</strong><p>2021 경남 생물 합격수기_강치욱 교수님 강의 수강</p><span>강은*</span></a></li>
                    <li><a href="#none" onclick="javascript:go_popup14()"><strong>수학</strong><p>철홍샘의 강의덕분에 드디어 합격했습니다</p><span>박세*</span></a></li>
                    <li><a href="#none" onclick="javascript:go_popup15()"><strong>역사</strong><p>2022 역사 합격수기</p><span>임강*</span></a></li>
                    <li><a href="#none" onclick="javascript:go_popup16()"><strong>영어</strong><p>영어과, 재수로 합격한 김유석 교수님 제자입니다</p><span>김성*</span></a></li>
                    <li><a href="#none" onclick="javascript:go_popup17()"><strong>교육학</strong><p>임산부도 했어요. 다들 할 수 있어요!!</p><span>김미*</span></a></li>
                    <li><a href="#none" onclick="javascript:go_popup27()"><strong>영어</strong><p>경기영어. 초수. 교직이수. 복수전공. 이과생. 재학생</p><span>최은*</span></a></li>
                    <li><a href="#none" onclick="javascript:go_popup18()"><strong>유아</strong><p>경남.민쌤 2년 패키지.2차 고득점.민쌤감사합니다</p><span>황나*</span></a></li>              
                    <li><a href="#none" onclick="javascript:go_popup21()"><strong>음악</strong><p>전북 합격수기 입니다!!</p><span>R=**</span></a></li>
                    <li><a href="#none" onclick="javascript:go_popup19()"><strong>유아</strong><p>서울 고득점 누구나 할 수 있다!!</p><span>이예*</span></a></li>
                    <li><a href="#none" onclick="javascript:go_popup22()"><strong>음악</strong><p>2021 서울 음악 초수 합격수기</p><span>전가*</span></a></li>
                    <li><a href="#none" onclick="javascript:go_popup23()"><strong>일반사회</strong><p>윌비스 일반사회 허역팀 강의를 수강하고 합격하였습니다.</p><span>유소*</span></a></li>
                    <li><a href="#none" onclick="javascript:go_popup24()"><strong>전기전자</strong><p>서울 전기전자 합격 수기입니다.</p><span>이소*</span></a></li>
                    <li><a href="#none" onclick="javascript:go_popup25()"><strong>중국어</strong><p>2020학년도 경기 3등 합격!! </p><span>조미*</span></a></li>
                    <li><a href="#none" onclick="javascript:go_popup20()"><strong>유아</strong><p>서울 유아임용 초수합격수기! 시간 관리 꿀팁들 공유해요.</p><span>조혜*</span></a></li>
                    <li><a href="#none" onclick="javascript:go_popup26()"><strong>중국어</strong><p>2021학년도 경기 합격! 합격! </p><span>장선*</span></a></li>
                </ul>
                </div>
            </div>
        </div>

        {{--유튜브 영상--}}
        <div id="vid1" style="display: none;">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span> 
            <div class="videoBox">
                <iframe src="https://www.youtube.com/embed/Y2W3lUrn3aI?rel=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>
        <div id="vid2" style="display: none;">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span> 
            <div class="videoBox">
                <iframe src="https://www.youtube.com/embed/RoYEaMYS0NI?rel=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>
        <div id="vid3" style="display: none;">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span> 
            <div class="videoBox">
                <iframe src="https://www.youtube.com/embed/ZA8IOWkDm1M?rel=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>
        <div id="vid4" style="display: none;">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span> 
            <div class="videoBox">
                <iframe src="https://www.youtube.com/embed/CufVm8lFnhI?rel=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>
        <div id="vid5" style="display: none;">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span> 
            <div class="videoBox">
                <iframe src="https://www.youtube.com/embed/Y2B9MpFW0v0?rel=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>
        <div id="vid6" style="display: none;">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span> 
            <div class="videoBox">
                <iframe src="https://www.youtube.com/embed/79LeTLabLPY?rel=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>

        {{--수기 팝업--}}
        <div id="popup11" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>   
            <div class="content">         
                <div class="memoirs NSK">
                    <div class="memoirstitle"><span><strong>국어</strong> 꾸준함이 정말 최고입니다! </span> <span>이현*</span></div>
                    <div>
                        교육학<br>
                        저는 3수생이었기에 이미 교육학 공부가 어느정도 되어 있었기에 그다지 열심히 하지 않았습니다.<br>
                        유튜브에 올라오는 교육학 관련 영상을 가볍게 시청하는 정도가 전부였습니다.<br>
                        대신 꾸준히 시청하였습니다.<br>
                        저는 따로 인강을 수강하지 않고 전에 사용한 교재를 활용해 개념을 가볍게 단원별로 훑어보면서 기억나는 개념 혹은 기억나지 않는 개념을 분리하여 정리하였습니다<br>
                        3-4월과 마찬가지로 개념을 정리하되 대신 암기를 병행했습니다.<br>
                        톡톡문제, 실전문제 등과 함께 단원을 구분해 개념공부후 문제를 푸는 방식으로 루틴을 정해 매일매일 꾸준히 했습니다.<br>
                        3일안에 한 단원을 끝내는 식으로 주기를 정했습니다.<br>
                        5-6월에 풀었던 톡톡문제 중 어려웠던 문제들을 따로 체크해 그 문제들 위주로 내용을 살펴보고 또한 개념을 교재를 활용해 다시 정리했습니다.<br>
                        그중에서도 특히 암기가 안되는 부분은 포스트잇에 적어 책상에 붙여놓았습니다.<br>
                        <br>
                        <br>
                        전공<br>
                        저는 문이 가장 부족하다고 생각했기에 강의를 수강하면서 문학사 흐름을 익히기 위해 노력하였습니다.<br>
                        하지만 시기가 시기인만큼 멘탈 회복이 되지 않아 그다지 열심히 하지는 않았던 것 같습니다.<br>
                        국교론과 문법은 개념을 익히기 위해 노력하고 특히 국교론은 개론서를 살펴봤습니다<br>
                        이 떄부터 정신을 차리고 본격적으로 했습니다.<br>
                        강의 커리큘럼을 따르되 문학을 보는 눈을 기르기 위해 작품 분석을 처음으로 해봤습니다.<br>
                        처음에는 시간이 오래걸려 이게 맞는건가 의아했지만 꾸준히 하니 시간도 줄이고 이것이 문학 실력 상승의 큰 도움이 되었던 것 같습니다.<br>
                        <br>                        
                        개론서에서 중요하다고 밑줄 쳤던 부분과 교재의 중요 개념위주로 정리가 제대로 되어있는지 확인하고 다시 복습하는 과정을 진행했습니다.<br>
                        다음달부터는 문풀이기에 문풀에 앞서 개념이 제대로 정리가 되어 있어야 한다고 생각했습니다.<br>
                        문풀을 중점적으로 진행하였습니다.<br>
                        문풀 문제는 오로지 제가 수강했던 선생님들의 문제만 활용했습니다.<br>
                        괜히 다른 선생님들꺼까지 풀면 혹 모르는 문제가 나올 때 멘탈이 흔들릴 거 같았습니다.<br>
                        동시에 기출도 다시 한 번 복습하는 시간을 가지며 문제를 익히는 시간을 가졌습니다.<br>
                        <br>

                        모의고사가 핵심인 달이였습니다.<br>
                        매일 쏟아지는 모의고사 문제를 언제 풀지 스터디 플래너에 꼼꼼히 적고 시간이 없어도 꼭 복습하는 시간을 가지도록 노력하였습니다.<br>
                        매일매일 복습하다보니 나중에는 시간이 오래 걸리지 않고 몇 번 훑어볼 수 있는 시간이 있었습니다.<br>
                        <br>
                        <br>
                        2차<br>
                        교재는 주로 사이다와 면접레시피 위주로 진행을 하였고 동시에 경기도 교육청이 제시한 시책과 교육감의 신년사를 분석하였습니다.<br>
                        유투브에 있는 사이다 저자의 영상도 꾸준히 시청하며 감을 잃지 않도록 노력하였습니다.<br>
                        또한 비언어적 표현과 준언어적 표현도 중요하기에 매일 거울보고 인상을 연습했습니다.<br>
                        저는 경기도여서 지도안은 작성하지 않았습니다.<br>
                        2차 수업실연 순식간에 정복하기에 제시된 문제와 정동해 선생님의 문제를 스터디원과 서로 교환하고 구상 시간을 갖고 시연하는 시간을 주4회 가졌습니다.<br>
                        스터디원들의 피드백을 매일 밤 정리하고 고칠 수 있도록 노력하였습니다.<br>
                        또한 유튜브에 있는 여러 합격선생님들의 영상을 참고하며 정리하였습니다.<br>
                        저는 스터디 경험이 전무하지만 2차는 필수라고 해서 1차 합격 발표 당일 저녁에 바로 스터디에 참여했습니다.<br>
                        그 후 스터디원들과 상의해 계획을 정하고 하루도 허투로 쓰지 않도록 노력했습니다.<br>
                        또한 체력관리도 중요해서 잠을 잘 잘 수 있도록 노력했습니다.<br>
                        <br>
                        <br>
                        멘탈<br>
                        저는 정말 정말 큰 도움을 받았던게 유튜브에 올라온 여러 타로 영상들입니다.<br>
                        멘탈관리가 정말 중요하다고 생각했던 1인으로서 어떻게 하면 위로를 받고 자신감을 기를 수 있을까 고민끝에 평소에 관심많던 타로를 찾아보고 구독하며 매일 밤 잠들기 전. 이동시간에 타로영상을 보며 멘탈관리를 하고 좋은 말이 나오면 캡쳐해 꾸준히 다시 보면서 멘탈관리를 했습니다.<br>
                        얼마나 불안할지,, 앞이 깜깜해보인다는 심정 너무 공감갑니다.<br>
                        저 역시 멘탈이 쉽게 흔들리는 타입이고 가족들의 기대를 한 몸에 받고 있어서 부담감이 상당했습니다.<br>
                        하지만 잊지 않고 항상 상기했던 문장이 있습니다.<br>
                        '동 트기 전 새벽이 가장 어두운 법이다' 지금 이 시간은 새벽입니다.<br>
                        춥고 어둡지만 조금만 지나면 상쾌한 동이 튼다는거. 여러분들의 노력을 헛되지 않을 것이니 제발 포기하지 마시고 꾸준히만 해주세요!
                    </div>
                </div> 
            </div> 
        </div>  

        <div id="popup12" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>   
            <div class="content">         
                <div class="memoirs NSK">
                    <div class="memoirstitle"><span><strong>도덕윤리</strong> 2차 고득점의 비결은 1차 고득점이다. </span> <span>박동*</span></div>
                    <div>
                        안녕하세요.<br>
                        2022년도 중등임용고시 도덕·윤리 과목에 응시하여 초수에 합격한 윌비스 수강생입니다.<br>
                        우선 이 합격수기를 보고 계실 여러분께 힘찬 응원 보냅니다. <br>
                        저 또한 1년간 지독하게 공부를 해보았기 때문에 그 힘듦과 괴로움, 외로움을 잘 알고 있기에 여러분들의 수고에 공감을 하지 않을 수 없습니다. <br>
                        여러분들은 정말 대단한 하루를 수행해나가고 계시기에 박수받아 마땅하다고 생각합니다.<br>
                        합격을 하기 위해 고군분투하고 계신 여러분 모두 대단하시고 수고많으십니다. <br>
                        그러면 제 합격수기 시작하겠습니다.(1차컷+18.67 2차컷+8.1)<br>
                        <br>
                        제가 합격수기에서 알려드릴 것은 어떤 계획을 짜서 어떤 책을 보며 공부했다는 것을 알려드리기 보단 공부를 시작할 때 지켜야 할 점에 대해 알려드리고자 합니다.<br>
                        저는 공부를 시작하면서 제일 먼저 해야할 첫 단추는 자신이 어떤 공부에 적합한지를 파악하는 것이라 생각합니다.<br>
                        공부의 분류는 크게 두가지로 나눌 수 있습니다.<br>
                        <br>
                        첫번째 적자생존형 공부입니다.<br>
                        적자생존형은 기본서를 보고 노트에 중요한 내용을 필기하여 자신만의 서브노트를 만드는 공부방식입니다.<br>
                        이 공부방식의 장점은 깊은 암기가 가능하며 망각곡선중 망각이 시작되는 시점이 늦다는 점입니다.<br>
                        하지만 적자생존형 공부방식은 시간이 오래 걸리며 이해가 동반된 필기가 아니라면 손목만 아프고 시간만 낭비하는 공부가 될 수 있다는 단점을 가지고 있습니다.<br>
                        <br>
                        두번째 공부방식은 읽자생존형 공부방식입니다.<br>
                        읽자생존형은 기본서에 밑줄을 그어가며 눈으로 읽으며 밑줄친 부분을 이해될 때까지 반복하여 읽는 것입니다. <br>
                        이 공부방식의 장점은 회독시간이 빠르며 짧은 시간내에 많은 암기가 가능하다는 점입니다.<br>
                        하지만 이 공부방식의 단점은 회독수가 굉장히 많지 않으면 쉽게 잊어 먹으며 쉽게 응용은 가능하나 완벽한 암기가 되지 않는다는 점입니다.<br>
                        저는 노트에 필기를 해놓아도 악필이여서 알아보지 못하는 경우가 많았고 노트를 볼 시간에 차라리 기본서를 읽는게 더 효과적인것 같아 읽자생존형 공부방식을 선택하였습니다.<br>
                        저는 처음 김병찬교수님의 강의를 들을 때 교수님께서 어려운 개념을 풀어서 설명해주신 것을 기본서에 적어놓았고 그것을 바탕으로 이해해 나가며 읽기 시작했습니다.<br>
                        이때 처음엔 검정색 펜으로 밑줄을 치며 읽기 시작했습니다.<br>
                        그렇게 처음 회독을 끝내고 두번째 회독때는 빨간색 펜으로 다시 한번 밑줄을 치며 읽기 시작했습니다.<br>
                        그렇게 하니 처음엔 중요한 개념인줄 알고 밑줄 쳤던 개념이 이해를 동반한 2번째 읽기때는 중요하지 않은 개념임을 깨닫고 밑줄을 치지 않게 되었습니다.<br>
                        <br>
                        세번째 읽기를 시작했을 때는 파란색 펜으로 네번째 읽기 때는 형광펜으로 표시를 하니 저는 다섯번째 읽기 때부턴 모든 펜이 겹치는 부분만 읽기만 하면 되었습니다.<br>
                        그렇게되니 자연스레 일회독하는데 걸리는 시간이 단축되었고 저는 결과적으로 고사장을 들어가기전 기본서를 60회 이상 회독하고 들어갈 수 있게 되었습니다.<br>
                        앞서 읽자생존형 공부방식에는 단점이 있다고 설명드렸습니다.<br>
                        저는 그 단점을 보완할 방법을 찾기 위해 노력하였고 결국 찾아냈습니다.<br>
                        읽자생존형 공부는 이해에 중점을 둔 공부이기 때문에 하나의 문장을 완벽하게 서술할 순 없지만 그 문장에서 말하고자 하는 바 혹은 핵심 키워드를 쉽게 생각해낼 수 있습니다.<br>
                        여기서 결정적인 문제가 발생하는데 핵심 키워드만을 가지고 정답을 서술하기란 굉장히 어려운 일입니다.<br>
                        저 또한 이 때문에 많은 시간동안 고통받았습니다.<br>
                        분명히 머리속으로는 답을 도출할 수 있지만 글로 써지지 않을 때 사람들은 가장 많이 좌절하곤 합니다.<br>
                        이를 해결하기 위해선 식상한 말이지만 모의고사를 굉장히 많이 풀어봐야합니다.<br>
                        저는 7~8월 커리큘럼인 주제중심모의고사를 풀면서 해답을 얻게되었습니다.<br>
                        제가 얻게된 해답은 머리속으로 생각한 답안을 최대한 유사하게 글로 쓰려고 노력해보고 답안과 자신의 답을 비교해보면서 교정하는 작업을 열심히 한다면 읽자생존식 공부의 단점을 충분히 보완할 수 있다는 것입니다. <br>
                        요즘 도덕·윤리과의 문제 트렌드에서 느낄 수 있다시피 정답을 정확히 알아야 풀 수 있는 문제의 수는 적어지고 있고 키워드를 산출해내 문장 형식으로 완성시켜야 하는 문제가 많아지고 있습니다.<br>
                        모든 문제를 정확히 알면 고득점은 당연한 결과이지만 현실적으로는 불가능에 가깝습니다.<br>
                        <br>
                        따라서 우리는 이상적인 공부보단 현실적인 공부해야할 필요가 있습니다.<br>
                        현실적인 공부방법이란 다음과 같습니다.<br>
                        첫째, 자신에게 맞는 공부방식을 선택한 뒤 자신만의 커리큘럼을 만드세요<br>
                        (본인이 초수라면 강사가 설정한 커리큘럼을 따라가는것을 추천드립니다.)<br>
                        둘째, 공부를 하면서 이해 혹은 암기 어느 한쪽에만 초점을 맞추지 마세요.<br>
                        처음 공부를 시작하게 되면 어느 한쪽으로 치우쳐지기 쉽습니다.<br>
                        하지만 이해없는 암기는 맹목적이고 암기없는 이해는 무기력합니다.<br>
                        이해없이 암기만 한다면 암기한 지식을 활용 혹은 적용해야만 풀 수 있는 문제가 나오게 된다면 그 문제를 풀기가 매우 어렵습니다.
                        암기한 그 문장 그 방식대로만 문제를 푸는데 적응되어있기 때문이죠. 그리고 암기없이 이해만 한다면 이해한 지식을 머리속으론 떠올릴 수 있겠지만 실제 답안지에 글로 작성하기 매우 어려울 것입니다.<br>
                        어느 정도의 기본적인 뼈대만큼은 암기하고 있어야 이해한 지식을 붙일 수 있기 때문입니다. 따라서 이해 그리고 암기는 적절히 동반되어 함께 굴러가야하는 것입니다.<br>
                        셋째, 휴식없는 공부는 곧 실패입니다.<br>
                        쉴 때는 공부 생각을 버리고 확실히 쉬어주면서 내일을 위한 재충전을 하십쇼. 쉴 때 죄책감을 가지고 쉰다면 오히려 내일을 망치는 지름길입니다. 쉴 때 확실히 쉽시다!!<br>
                        넷째, 제목에서도 말했다시피 2차 고득점의 비결은 1차 고득점입니다.<br>
                        이유는 간단합니다. 1차는 정해진 답안이 있는 매우 객관적인 시험입니다.<br>
                        (평가자의 주관이 들어가나 모범답안이 존재합니다.)<br>
                        하지만 2차는 오직 평가자의 주관에 따른 매우 주관적인 시험입니다.<br>
                        사람에 따라 1차에 강한 사람 2차에 강한 사람이 나뉘겠지만 1차에서 고득점을 받는것이 상대적으로 쉽습니다.<br>
                        1차는 정해진 모범답안과 유사하다면 고득점이기 때문입니다.<br>
                        2차는 그 날 평가자의 기분, 상태, 집중력에 따라 점수가 차이날 수 있지만 1차는 모범답안에서 크게 벗어나지 않는 이상 점수를 잃을일을 없습니다.<br>
                        따라서 2차에 자신이 없으셔도 2차에 자신이 있으셔도 우선 1차에 모든 집중을 다하시는 것을 추천드립니다. 저는 합격인증 사진에서도 볼 수 있다시피 2차에 굉장히 자신이 없었습니다.<br>
                        그렇기때문에 저는 1차에 집중투자하여 큰 점수차를 벌리고 2차에서 평균만 맞추는 것으로 작전을 짰고 그 작전이 정확히 먹혀 운이 좋게도 초수에 합격할 수 있었습니다.<br>
                        <br>
                        여러분도 할 수 있습니다. 자신에게 맞는 공부방식을 찾고 그 공부방식의 단점을 보완할 수 있는 방법을 찾고자 노력한다면 여러분도 1차 고득점 충분히 가능합니다.<br>
                        마지막, 여러분이 평소에 공부하시는 시간 충분합니다.<br>
                        공부시간을 늘리는것보단 공부효율을 늘리는것이 훨씬 효과적입니다.<br>
                        자신과 맞는 공부법을 찾고 그에 따라 집중력있게 공부한다면 아침 9시에 나와 오후 3시에 집에 가도 좋습니다.<br>
                        효율적이고 집중력있게 공부하십쇼. 식상한 말이지만 이 말을 합격자들이 강조한다는 것은 그만큼 최선의 그리고 최고의 방법이자 제일 쉬운 방법이기 때문입니다.<br>
                        여러분도 하실 수 있습니다. 지금 현재는 괴롭지만 최선을 다하는 사람에게 맺힌 땀방울은 절대 그를 배신하지않습니다. 효율적이게 공부하십쇼 그리고 최선을 다하십쇼. <br>
                        항상 응원하겠습니다.<br>
                        <br>
                        감사합니다.
                    </div>
                </div> 
            </div> 
        </div>

        <div id="popup13" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>   
            <div class="content">         
                <div class="memoirs NSK">
                    <div class="memoirstitle"><span><strong>전공생물</strong> 2021 경남 생물 합격수기_강치욱 교수님 강의 수강</span> <span>강은*</span></div>
                    <div>
                        2021 경남 생물 합격 수기<br>
                        <br>
                        < 1차 ><br>
                        # 2018 1차 합격 2020 1차 합격 2021 최종합격<br>
                        <br>
                        # 마음가짐과 멘탈관리<br>
                        ○ 교육학은 고득점, 생교론 고득점, 전공은 기출만 맞춘다!<br>
                        - 공부를 하다보면 생소한 문제나 지엽적인 내용에 휘둘리게 되어있음.<br>
                            그래서 계속 지엽적인 내용에 빠져들거나 생소한 문제를 틀리게 되면 멘탈이 흔들림.<br>
                            그러나 교육학과 생교론을 고득점을 받고 전공은 기출된 내용만 맞춘다면 합격 점수를 받을 수 있다고 생각함.<br>
                        - 교육학과 생교론, 전공 기출 관련 내용은 달달 외울 정도로 준비함.<br>
                        - 무슨 문제가 나오더라도 나는 교육학, 생교론 만점 받고 기출만 맞춘다라고 생각하면 1차에 대한 자신감이 생김<br>
                        - 강치욱 교수님, 양혜정 교수님의 강의와 기출 분석에 집중하기 위해 노력함.<br>
                        - 시험 문제가 강치욱 교수님, 양혜정 교수님이 가르쳤는가 가르치지 않았는지는 중요하지 않았음. <br>
                            가르치신 내용만 정확히 숙지한다면 합격할 수 있다고 생각함.<br>
                        ○ 서술형 시험은 출제자와의 대화이다.<br>
                        - 강치욱 교수님이 수업 시간마다 강조하시는 내용임, 학부생 때는 잔소리로만 들렸던 이야기가 잔소리로 들리지 않고 합격을 위한 조언으로 들렸을 때 1차 합격함.<br>
                        - 절대 내가 만든 용어와 내가 이해하기 쉽게 생각한 내용을 서술하지 말 것.<br>
                        - 기출과 각론에서 나온 과학적 용어로 적을 것.<br>
                        - 출제자가 물어본 것에 집중하여 서술할 것.<br>
                            예) 출제자가 A를 물어본다면 A에 대한 내용을 최대한 구체적으로 적으려고 노력할 것<br>
                                쓰다보면 A+B를 적고 있음. <br>
                                그러면 B를 적은 내용을 채점이 되지 않을 뿐만 아니라 시간을 잡아 먹음.<br>
                                그러므로 A에 관련한 내용을 최대한 적으려고 노력할 것<br>
                        ○ 모르면 외워라<br>
                        - 강치욱 교수님이 항상 강조한 내용, 학부생일 때는 무슨 이해도 안하고 외워라고 하냐고 툴툴되었지만 외우고 외워 용어가 익숙해지고 정의가 명확해지니 이해되기 시작함.<br>
                        - 용어가 생소하여 어렵고 이해가 되지 않는다고 생각하는 것 일단 외우고 보자.<br>
                        - 이해하기 어렵다고 중간 연결 다리를 만들어 외우다 보면 오개념이 형성됨. 그러므로 최대한 있는 그대로 외우기 위해 노력함.<br>
                        - 공부의 목표를 생각하며 너무 깊게 파고 들기 보다는 기출을 기반의 내용을 정확히 외우는 것에 집중함.<br>
                        - 교육학에서 주요 개념의 키워드를 외워서 줄글로 줄줄 풀어 쓰기보다는 키워드를 적는다면 시간도 단축되고 채점요소도 정확히 들어감.<br>
                        ○ 문제와 최대한 연결하여 생각하려고 노력할 것<br>
                        - 계속된 1차 탈락 후 찾은 나의 문제점<br>
                            만약 광저해에 관한 문제였다면 내가 외운 광저해에 대한 모든 지식을 미친 듯이 답안에 적었음.<br>
                            그러나 시험은 출제자와의 대화임. 문제를 보고 지문과 관련하여 외운 지식을 연결하여 적기 위해 노력함.<br>
                            그래서 시험 때 적는 시간보다 문제를 분석하고 이해하는데 많은 시간을 투자함.<br>
                        ○ 계산 문제는 틀리지 말자.<br>
                        - 유전, 동생(신장), 생태의 계산 문제는 채점이 쉬움. 그리고 시험장에서 문제를 풀 때 키워드와 적을 것이 명확하기 때문에 서술하는데 적은 시간을 투자하고 4점을 받을 수 있는 확률이 높음.<br>
                        - 유전 계산 문제는 감을 잃지 않기 위해 시험 2개월 전부터는 공부 시작 전 2문제씩 품.<br>
                        ○ 내용 이해하는 시간 50%, 외우는 시간 40%, 인출하는 시간 10%<br>
                        - 강치욱 교수님이 수업시간에 해주신 조언.<br>
                        - 우리는 서술형 시험이기 때문에 이해만 해서도 안되며 맥락없이 외우기만 해서도 안된다. <br>
                            그래서 나 같은 경우는 총론이 잘 읽어지지 않는 초수인 경우에는 용어가 익숙하지 않아서 읽어지지 않는다고 생각하여 먼저 용어를 외우고 총론을 읽음<br>
                        - 강치욱 교수님 필기노트를 기반으로 먼저 중요한 내용을 외우고 총론을 읽으면 훨씬 읽는 속도가 빨라짐.(총론이 빠르게 읽어지지 않는 학생들에게 추천함.)<br>
                        ○ 시험 마지막 1~2달을 앞두고는 잘 외워지지 않는 내용, 틀리는 내용 위주로 A4에 적어두고 계속 봄.<br>
                        - 잘 외워지지 않는 내용, 모의고사에서 틀린 내용 위주로 간단히 A4용지에 정리해서 적어두고 밥 먹을 때 틈틈이 봄.(적어도 2번은 볼 수 있음.)<br>
                        - 나올 것 같은 내용도 간단히 필기해 둠.<br>
                        - 교육학, 생교론, 전공(세포, 분자, 유분미, 동생, 면역발생, 식물생태) 나눠서 정리함.<br>
                            예) ~서술 시 ~용어를 반드시 적을 것, 광저해와 광보호 기작 정리 등<br>
                            <br>
                        # 전공<br>
                        ○ 총론 다 외워라<br>
                        - 총론에서 나오는 건 다 맞춘다는 생각으로 총론에 나오는 개념은 모두 외우기 위해 노력함.<br>
                        - 총론을 읽는 시간 60%, 외우는 시간 30%, 필기 노트 기반으로 인출하는 시간 10%로 둠.<br>
                        - 뒤를 공부할 때 앞의 내용을 잊어버리 않기 위해 필기노트 파일에 빈칸을 만들어서 틈틈이 인출함.<br>
                        ○ 생태학은 각론으로 추가적으로 학습함.<br>
                        - 전체를 보려고 하지 않았고 그림 위주로 추출해서 봄.<br>
                        ○ 문제를 많이 풀기 보다는 정확히 알고 있는지 집중할 것<br>
                        - 전공을 공부할 때 미트 문제, 피트 문제 등 많은 문제를 푸는 것에 투자하는 것보다 먼저 정확한 개념과 정의를 숙지하는 것에 집중할 것<br>
                        - X염색체 불활성화에 관한 문제를 푸는 것이 중요한 것이 아니라 ‘X염색체 불활성화의 개념을 서술 시 언제, 어디, 어떤 대상에게서 X염색체 불활성화가 일어나며, 무작위적으로 일어난다는 것을 반드시 서술 시 적어야함’과 같이 이런 것들이 먼저 선행되어야 문제를 풀어도 의미 있는 결과를 얻을 수 있음. <br>
                            문제를 통해서는 문제에서 X염색체 불활성화 문제임을 캐치하는 방법, 계산 등을 학습함. <br>
                            그러나 이도 정확한 개념과 정의가 기반이 되어야 함.<br>
                        - 서술형 문제에서는 문제를 단순히 푸는 것보다 문제가 출제 시 이 개념에서 반드시 적여야 할 중요 키워드가 무엇인지 정확히 인지해야 함.<br>
                        ○ 전공 공부 단계<br>
                        - 1단계: 총론 개념 학습(이해+암기)<br>
                        - 2단계: 기출 및 미트피트 중요한 문제 추출하여 풀기(미트피트 중 너무 지엽적인 문제는 안 품, 오히려 생물 기출에 집중함.)
                                    기출 관련 개념을 다시 정확히 외우고 암기한 것을 인출하기 위해 노력함.<br>
                        - 3단계 : 강치욱 영역별 모의고사를 통해 개념 체크 및 오개념 수정<br>
                        - 4단계 : 최종 강치욱 모의고사를 통해 개념 체크 및 오개념 수정, 모르고 틀린 것은 무조건 외웠음.
                    </div>
                </div> 
            </div> 
        </div>  

        <div id="popup14" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>   
            <div class="content">         
                <div class="memoirs NSK">
                    <div class="memoirstitle"><span><strong>수학</strong> 철홍샘의 강의덕분에 드디어 합격했습니다</span> <span>박세*</span></div>
                    <div>
                        일단은 1차는 무엇보다 개념과 계산실수를 안하는방법인것같은데 이런부분을 개선하면 더욱 좋은 점수를 얻을수있겠죠?? <br>
                        좀더 구체적으로는 교육학은 개념을 제대로 이해하고 영역들간의 연관을 지어 이해하는게 필요할듯해요<br>
                        강사들 강의를 들으며 해도 되고 스터디를 하며 진행해도 좋을듯해요 저는 스터디를 이용했습니다<br>
                        전공수학은 아무래도 양이 많고 혼자서 하기는 힘들기때문에 스터디를 하면 좋겠죠<br>
                        그런데 스터디원도 중요해서 도움이 안된다 싶으면 혼자서도 할수있을 예비 계획도 세우면 좋겠죠?<br>
                        거의 기본서를 바탕으로 저는 김철홍 교수님 강의를 들으며 개념들을 정리하고 스터디를 통해 기본서의 다양한 문제들을 논의하였습니다<br>
                        수학교육학은 기본서 책을 달달 외우며 2015개정도 열심히 외우며 다양한 문제들을 통해 개념을 확인하는 공부를 많이 하였어요<br>
                        그다음에 2차는   일단 면접은 시중에 있는 아무교재를 정하고 스터디들 통해 연습을 하고 교정을 통해 개선이 되었어요<br>
                        수업시연은 학교에서 많이 시연 연습을 해보는게 좋을듯해요<br>
                        저는 많이 하지를 못해서 더욱 긴장되고 분필이 더욱 쉽게 부러지고 했던것같아요<br>
                        그리고 지도서 공부를 열심히 하게 된다면 누구나 저같이 합격을 할수있습니다<br>
                        저같은 사람도 되었으니 희망을 가지고 모두가 노력하면 언젠가는 합격할수있다는것을 알수있으면 좋겠습니다<br>
                        <br>
                        모두들 힘들겠지만 열심히 노력하여 교단에서 뵈어요~~ 화이팅!!!!<br>
                    </div>
                </div> 
            </div> 
        </div> 

        <div id="popup15" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>   
            <div class="content">         
                <div class="memoirs NSK">
                    <div class="memoirstitle"><span><strong>전공역사</strong> 2022 역사 합격수기</span> <span>임강*</span></div>
                    <div>
                        2021학년도(경기, 초수) 1차 70, 2차 최종탈락<br>
                        2022학년도(경기, 재수) 1차 78, 2차 최종합격<br>
                        <br>
                        1. 공부방법<br>
                        1) 시간배분<br>
                            대학교 2학년때 메타인지를 해보고 '나는 1년간 안놀고 오롯이 공부만 할 사람이 아니다'라는 생각이 들었습니다. <br>
                            그러니 그때부터 쌓아올린다는 생각으로 매일 5시간씩 공부하는 계획을 세웠습니다. <br>
                            2학년부터 4학년까지에 재수 1년, 4년의 시간동안 매일 5시간 전후로 공부한 셈입니다.<br>
                            다만, 대략적인 시간을 정했어도 실제 공부는 '몇시간을 하겠다'보다는 '어디까지 보겠다'라는 생각으로 임했습니다. <br>
                            그래서 그날 분량이 끝나면 1시간밖에 공부를 안했더라도 가차없이 놀았고, 분량이 끝나지 않으면 다음날 아침 10시까지 공부한 적도 있습니다.<br>
                        2) 스터디그룹<br>
                            고등학교때부터 스터디그룹을 통해 많은 공부를 해와서, 스터디그룹은 뗄레야 뗄 수 없는 인연입니다.<br>
                            (1) 학부생 시절엔 교사를 희망하는 동기들과 함께 개론서 인출스터디를 진행했습니다. <br>
                                모두가 '기본기가 없으면 사상누각이나 다름없다'라는 생각에 동의해 기본기를 쌓아올리자는 생각으로 임했습니다.<br>
                            (2) 초수 때엔 교육학, 전공 스터디를 따로 진행했습니다. <br>
                                과 선배님께서 먼저 제의해주셔서 교육학 스터디를 전화로 진행했으며, 전공의 경우 카카오톡 단톡방을 통해 선배들과의 상시 질의응답방, 동기들과의 질의응답방을 운영했습니다.<br>
                            (3) 재수 때에는 교육학, 전공 상관없는 인출 단톡방을 동기들과 운영하고, 타학교 응시생과 전화로도 스터디에 임했습니다.<br>
                            <br>
                        2. 내가 김종권 선생님 강의를 들은 이유<br>
                        전공역사 강의는 듣는 게 좀 정해져 있는 경우가 있죠.<br>
                        저는 강의를 듣기에 앞서 고려한 사항이 몇가지 있었고, 생각을 정리해 김종권 선생님 전공강의를 들었습니다.<br>
                        1) 내가 소화할 수 있는 분량인가?<br>
                            중요하다, 나올 수 있다는 명분으로 엄청나게 많은 내용을 수험생들에게 내던지는 강사도 있습니다.<br>
                            그러나 저는 그것이 수험생들에게 책임을 전가하는 것이라 느꼈습니다. <br>
                            중요한 것을 추려서 전달하는 게 아니라 수험생이 감당하기 힘든 분량을 던져주고 떨어지면 '소화 못한 학생 책임이다'라는 식으로 말이죠. <br>
                            김종권 선생님의 강의는 딱 적절한 내용을, 선생님 나름의 중요성 인식 하에 추려서 전달해주셨습니다.<br>
                        2) 최신 트렌드를 반영하는가?<br>
                            가령 한국사에서 조선사 이후로는 꾸준히 뿌샘에서 많이 출제되고 있는 상황임에도 불구하고 한통만 붙잡는 인강은 다함께 수렁에 빠지자는 것과 다름이 없죠.<br>
                            그래서 제가 기본기를 스스로 다지는 동안 최신 트렌드를 반영해, 적절한 분량으로 알려주실 분은 김종권 선생님이 제격이라 생각했습니다.<br>
                            <br>
                        3. 전공 공부<br>
                        앞서 말했듯 '기본기가 최우선이다'라는 생각으로 한국사는 한통론과 다찾, 동양사는 한위중과 구동개, 서양사는 서개론을 독파하면서 서브노트를 기본으로 만들고, 서브노트의 여백에 김종권 선생님께서 강조하신 내용을 추가로 써내려가면서 공부했습니다.<br>
                        1) 최근 트렌드 반영<br>
                            한국사는 뿌샘, 서양사는 서강좌 등 최근에는 기존의 개론서와 다른 곳에서 문제가 왕왕 나오는 경우가 많았죠.<br>
                            저는 이 부분을 어차피 인강에서 다뤄줄 것이라 생각하고 스스로는 누차 강조하는 기본기의 영역에 매진하기로 했습니다.<br>
                            그러면서도 한국사의 다찾과 같이 적지만 나오기는 하는 부분도 챙기려는 생각에 서브노트에 같이 정리했습니다.<br>
                        2) 교과서도 인강에서<br>
                            아이히만 문제 이후로 교과서를 많이들 보시는 것 같습니다.<br>
                            선배 중에도 8종교과서를 달달 외우시는 분도 봤을 정도였는데, 저는 교과서를 단 한번도 제대로 안봤습니다.<br> 
                            이것도 강의에서 다 다루기 때문입니다.<br>
                        3) 역교론은 학부수업과 인강<br>
                            전 참 운이 좋습니다.<br>
                            저를 가르치신 교수님이 역교론의 석학 중 한분이셔서 늘 좋은 강의, 이해하기 쉬운 강의를 들었습니다.<br>
                            더불어 많은 선배들께서 해주신 '역교론을 대충보는건 임고에서 떨어지겠단 소리와 같다'라는 말씀을 듣고 저는 2학년때부터 역교론 책을 떼는 것에 최우선의 중점을 뒀습니다.<br>
                            여기에 교사 경험까지 갖추신 김종권 선생님께서 실제 경험에 기반한 설명을 해주셔서 이해하기도 좋은 것은 물론 현장에서 갖는 교사의 고민에 대해서도 성찰할 수 있었습니다.<br>
                        4) 교육과정은 총론만<br>
                            교육과정엔 총론과 각론이 있습니다.<br>
                            김종권 선생님은 총론 중에서 중요한 키워드와 문장을 알려주셔서 그것 위주로만 공부했습니다.<br>
                            다만 제작년 시험에서 동아시아사 총론이 그대로 나온것과 달리 이번에는 교육과정 문제가 매우 이질적인 방식으로 나와서 대처하기 힘들었습니다.<br>
                        5) 한자는 써가면서<br>
                            한자를 많이들 힘들어하시고, 저 또한 그랬습니다.<br>
                            '역사교육과 역사인식'에 보면 설명은 '이해의 적극적 표현'이다. 이런 뉘앙스의 내용이 있던 걸 저는 그대로 차용했습니다.<br> 
                            저는 아무리 내용을 알아도 사료의 문장을 한자 그대로 외워 쓰지 못하면 제가 알지 못하는 것으로 생각하고 계속 봤습니다.<br> 
                            가령, 의정부 서사제의 사료에서 皆先稟於議政府 議政府商度可否 然後啓聞取旨 還下六曹施行(개선품어의정부 의정부상도가부 연후계문취지 환하육조시행) 부분을 외운다 치면, 저기서 한글자라도 못쓸 경우 다시 외워가면서 사료를 봤습니다.<br>
                            <br>
                        4. 교육학 공부<br>
                        교육학은 인강을 듣긴 했으나, 대부분 학부생 시절 교직수업때 배운 내용을 바탕으로 공부했습니다.<br>
                        다만, 교육학이든 역사교육론이든 배운 내용을 그대로 외우기만 하는게 아니라 제 공부에 그대로 적용하면서 해봤습니다.<br>
                        교육학부터 전공까지 저는 모든 내용을 서브노트로 만들었습니다.<br>
                        서브노트는 노트에 쓰는게 아니라 A4용지를 길게 4칸이 나오게 접고, 1, 3번째 칸에는 질문을, 2, 4번째 칸에는 답을 적어 접은 상태에서 스스로에게 끊임없이 묻고 답하면서 공부했습니다.<br> 
                        그러면서 모르는 내용을 추려서 새로운 서브노트를 만들고, 거기서 또 모르는걸 추려서 만들고 하는 식으로 점차 내용을 간략화했습니다.<br>
                        그렇게 하니 모든 분야를 다 돌리는 데에 9월이 넘어선 1주일도 안걸리더군요.<br>

                        5. 모의고사<br>
                        교육학은 모의고사를 보지 않았습니다.<br> 
                        전공의 경우 지난 2년간 김종권 선생님의 5~11월에 이르는 기출분석, 분야별 모의고사, 실전모의고사를 빠짐없이 챙겨들었습니다. 
                        제작년부터 모의고사에서 꾸준히 60점 중반 이상의 점수를 받아왔기에 저 스스로는 60점 중반 전후의 점수면 합격하는 데에 문제가 없다고 봅니다.<br>
                        1) 컨디션을 일부러 망쳐서 본다<br>
                            저는 늘 '시험 당일날 내 컨디션이 좋으리란 보장이 없다'라고 생각했습니다.<br>
                            그래서 몇 차례에 걸친 모의고사는 일부러 밤을 샌다던지 등의 방법을 통해 컨디션을 망친 상태에서 풀어보기도 했습니다.<br>
                        2) 동기와 함께 말로하는 오답노트<br>
                            동기 중에 현강을 듣는 친구가 하나 있었습니다.<br>
                            그 친구랑 모의고사가 올라온 당일날 밤에 서로 채점을 해보고, 서로 틀린 곳은 무엇인지 공유하고, 서로의 약한 점을 성찰해보는 시간을 매 회 진행했습니다.<br> 
                            가장 기억에 남는건 조선 초기 삼관(성균관, 예문관, 교서관 등)을 둘 다 유추 못한 것, 제가 유튜브로 드라마 '대왕세종'클립을 봐서 계미자, 갑인자가 밀랍으로 붙이는 방식과 틀로 고정한 방식의 차이가 있단 걸 맞힌 경우가 있네요.<br>
                        3) 짧은 시간에 주파하기<br>
                            각 회차는 80분 딱딱 재는 게 아니라 그냥 AB형 통틀어 20분 안에 풀어버렸습니다.<br>
                            수 차례 고민해서 겨우 맞히는 건 제가 제대로 알고 있는 것이 아니라고 생각했습니다.<br>
                            덕분에 1차시험 당일날 시계 배터리가 다돼서 아예 시간을 모르고 모든 시험을 봤음에도 이런 훈련이 빛을 발해서 그런가 다 시간이 많이 남았습니다.<br>
                            <br>
                        6. 2차 준비<br>
                        2차 준비는 스터디그룹을 기본으로 합니다.<br>
                        6인의 스터디를 구성하고, 매일 랜덤으로 인원을 돌려가면서 3인, 3인이 나뉘어 수업실연 및 나눔 2회, 면접 1회의 스터디를 진행했습니다.<br>
                        그리고 그 중 이틀은 윌비스 학원에 직접 찾아가 김종권 선생님의 피드백을 받았습니다.<br>
                        김종권 선생님께서는 현장교사 경험이 풍부하신 분이므로 수험생의 눈이 아닌 교사, 면접관의 눈으로 저희를 바라보시고 제게 필요한 피드백만을 주십니다.<br>
                        덕분에 작년 수업실연 점수가 낮았던 것과 올해 1차시험 점수가 낮았던 것을 극복해 최종합격까지 할 수 있었습니다.<br>
                        <br>
                        7. 수험생분들께<br>
                        저와 제 동기, 선배들은 임고에 '수렁'이 있다고 합니다.<br>
                        초수, 재수 때에 떨어지면 '공부를 덜 했나?' 혹은 '공부방법이 잘못됐나?' 등의 생각이 들지만, 
                        점차 해를 더해갈수록 '내가 교사에 어울리는 사람이 아닌가?'와 같은 부정적인 생각이 머리를 가득 채운다는 걸 이렇게 표현하는 것입니다.<br>
                        어떤 시험이든 길게 붙잡고 있을 필요는 없습니다.<br>
                        각자의 방법에 맞게 최종합격까지 빠르게 주파하시길 바랍니다.<br>
                        언젠가 선생님들과 함께 교단에 설 그 날을 기다리겠습니다.<br>
                    </div>
                </div> 
            </div> 
        </div> 

        <div id="popup16" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>   
            <div class="content">         
                <div class="memoirs NSK">
                    <div class="memoirstitle"><span><strong>영어</strong> 영어과, 재수로 합격한 김유석 교수님 제자입니다</span> <span>김성*</span></div>
                    <div>
                        안녕하세요! 선생님들, 이 글을 통해 선생님들이 꿈을 이루는데 도움을 드릴 수 있으면 좋겠다는 마음을 담아, 지금부터 그동안 제가 공부하면서 느낀 것들, 그리고 제가 공부한 방법들을 소개해보겠습니다. <br>
                        다소 지루할 수 있는데, 최대한 지루하게 느껴지지 않도록 노력해서 소개해드리겠습니다.<br> 
                        그럼에도 불구하고 계속 지루하다면, 아 도움이 되는 글이구나! 하고 읽어주시면 좋을 것 같습니다.<br>
                        원래 몸에 좋은 음식이 맛이 없잖아요^^<br>
                        <br>
                        1.자기소개<br>
                        인천에 있는 대학교 졸업을 하였습니다. <br>
                        토익성적은 대학교 1학년 때, 카츄사에 들어가고 싶어서  보았는데 940점이 나왔습니다. <br>
                        그 이외에 어학성적은 전무하고, 해외 유학경험은 없습니다. <br>
                        단, 영어를 말하는데 있어서 큰 두려움은 없었고, 대학교 2,3학년때 영어회화 스터디를 운영했었습니다. <br>
                        제 영어실력이 어땟는지 궁금해하던 분들이 종종 계셔서 먼저 소개해드렸습니다. <br>
                        <br>
                        2.학습방법<br>
                        -일반영어-<br>
                        대학교 4학년 때, 저는 함께하는 스터디원들로부터 '일반영어가 가장 중요하다.'<br>
                        '다른 거 다 필요없고 일반영어가 모든걸 결정짓는다' 라는 말을 많이 들어왔습니다.<br> 
                        그런데, 정작 공부를 할 때나, 모의고사를 풀 때, 일반영어로부터 큰 어려움을 겪고 있지는 않았기 때문에 사실상 초수때 일반영어는 거의 하지 않았습니다.<br>
                        강의는 들었습니다. Sound and Sense, 2S2R 강의 이외에는 일반영어 강의는 듣지않았고, 7월이후에는 일반영어 공부는 아예 건드리지 않았습니다.      결과 -> 불합격<br>
                        재수 때, 정신차리고, 일반영어에 대한 공부시간을 잔뜩 늘렸습니다. <br>
                        1~7월까지는 매일 일반영어 공부를 2시간이상했었습니다. (단어암기시간은 제외한 시간입니다.) <br>
                        8~11월까지는 1시간 반에서 2시간씩 매일 했습니다. (단어 암기시간은 제외한 시간입니다.) <br>
                        일반영어강의는 김유석교수님의 파워리딩스킬스 숏프로스리더, 월든, 일반영어기출분석, 7~11월 모의고사를 들었습니다. <br>
                        7~11월 모의고사는, 특히 직강을 추천드립니다. <br>
                        교수님의 문제 특성상 엄청나게 엄청나게 높은 집중력을 1시간 반동안 쏟아내야 하는데, 이 때, 주변에 사람들이 모두 몰두하는 그런 분위기가 제게는 큰 도움이 되었었습니다. <br>
                        저는 인천에 사느라 노량진까지 가는데 왓다갔다 2시간 30분정도 걸리는데, 그래도 저는 값진 시간이였다고 생각합니다. <br>
                        <br>
                        일반영어 공부 포인트입니다.<br>
                        1. 강의를 들었다면, 최소한 강의를 들은 시간만큼은 혼자서 공부하는 시간을 갖는다.<br>
                        교수님께서 일반영어 독해 방법을 가르쳐주셨다면, 일반영어 요약하기 방법을 가르쳐주셨다면, 그것을 내것으로 만드는 시간이 반드시 필요합니다. <br>
                        교수님께서 '숟가락을 이렇게 손을 구부리고 요롷게 해서 쓰는 것이고, 젓가락은 요로코롬 두 손가락에 힘을 적당히 주고 요렇게 해서 먹는거다' 라고 가르쳐주셨으면, 그대로 직접 제가 숟가락질 젓가락질 연습해봐야 하는 것이겠죠! 나중엔 우리가 밥먹을 때 자동적으로 숟가락 젓가락 쓸 수 있는 것처럼, 이것이 익숙해지면 독해할 때, 자동적으로 이 부분이 메인아이디어문장이구나, 이것이 토픽이구나 하고 느껴지게 됩니다. <br>
                        2. 일반영어도 단권화 노트를 만든다.<br>
                        일반영어는 암기하는게 아닌데, 왜 단권화 노트를 만드는 걸까요? 쟤는 왜 또 헛소리 하는 것일까요? 하시는 분들께 잠시만 인내를 부탁드립니다.<br>
                        설명해드리겠습니다. <br>
                        초수때는 몰랐는데, 재수가 되면서 제가 느낀 것은, 제가 독해가능하다고 생각했지만 실제로는 잘못 독해하고 있는 문장구문들, 단어들이 너무너무너무너무 많았다는 것입니다.<br> 
                        그러니까 다시 말하자면 선생님들이 알고 있는 그 단어, 그 문장구조가 실제로는 다른 뜻도 내포할 수 있다는 것입니다. <br>
                        일반영어 지문을 읽는 과정에서, 그리고 모의고사 문제들을 푸는 과정에서, 그런 부분들을 찾으셨다면, 바로바로 넘버링을 하면서 노트에 차곡차고 적어서 모아주세요. <br>
                        가급적 그 단어, 그 문장구조를 갖고 있는 문장 전체를 쓰시고, 필요하다면 밑에 한국어 해석도 써주세요. <br>
                        시간이 날때마다 봐주세요. 그 단어의 새로운 뜻과 그 문장구조가 눈에 익고 내 머리속에 내재화 될 때까지. <br>
                        영어를 못하는 편이 아님에도 불구하고, 제가 10월말에 완료한 단권화 노트에는 총 348개의 문장들과 약 230개의 단어들이 적혀있었습니다. <br>
                        단권화 노트를 통해 얻는 효과는요? 리딩능력의 확실한 상승입니다! 잊지마세요! <br>
                        단 하나의 문장, 단어를 해석하더라도 전공자와 비전공자의 차이가 드러나는 글들이 임용고시에서 보여주는 글들입니다.<br> 
                        3. 단어는 많이 알수록 유리하다.<br>
                        너무 당연한 말인데 어떻게 이렇게 뻔뻔하게 적어 놓았냐구요? <br>
                        너무 당연한 말이라서 소홀히 할까봐서 적어보았습니다ㅠㅠ 제가 그랬거든요.<br>
                        초수때. 재수때는 MD33000원은 매일 스터디했고, (카톡스터디를 운영했습니다.) <br>
                        김유석 교수님의 단어책도 매일 스터디했고, 제 일반영어 단권화 노트에 적어놓은 단어들도 매일 암기했습니다. (엄청 많이 외웠죠?)<br>
                        단어암기는 아침 공부 시작전에 30분, 그리고 저녁 10시에서 10시 40분까지 매일 했습니다.<br>
                        개인적으로 가장 공부가 안될 때 했기 때문에 시간적인 부담은 없었던 것 같습니다. <br>
                        4. 매일매일 하라.<br>
                        매일매일 영작해보고 매일매일 읽었습니다. <br>
                        처음에는 제일 싫어하는 시간이 일반영어 공부시간 이였는데, 나중에는 일반영어 공부하는 시간이 제일 좋았습니다.. (공부 좋아하는 변태는 아닙니다.) <br>
                        <br>
                        ** 학습 방법<br>
                        1. 마인드 컨트롤<br>
                        임용고시같이 평균 6개월 이상의 준비기간을 요구하는 장기레이스 시험에서는, 마인드 컨트롤이 매우중요합니다.<br>
                        그런데 사람들마다 정신력이 다르고, 스트레스 받는요인과 스트레스 푸는 방법이 다 다르기 때문에, 어느정도 차이가 있을 수 있습니다. <br>
                        제 개인적으로는, 준비기간동안 막 '으으!! 나는 반드시 합격하겠노라. <br>
                        지금 나는 엄청나게 매우 빡세게 공부하겠다! 나는 엄청나게 독한놈이다.' 아런 생각을 갖지는 않았습니다. <br>
                        그냥 덤덤하게, 오늘이 왔으니까 공부를 하는 느낌이였습니다. 마치, 아침이 왔으니까 눈을 그냥 뜨는 것처럼. 뭔가 불타는 열정에 이글이글 거리면서 공부하는 것은 제스타일에 맞지 않았습니다.<br>
                        그런 열정은 제  경험상 금방 식게 되더군요. 식었을 때는 깊은 슬럼프로 이어지구요. <br>
                        또, 준비기간동안 살도 많이 찌고, 피부는 안좋아지고, 다크서클은 점점 반지름을 키워가고 있고, 그렇게 됩니다. 주눅들지 마세요.
                        내 긴 세월동안, 이 정도 기간 망가지는거, 그까이꺼 잊어보는거에요! 저 역시 몸키우는 것을 너무나도 좋아하고, 농구부 주장은 중학교때부터 대학생2학년때까지 계속 해왔을 정도로 농구를 좋아했지만, 일단 당장의 시간은 공부에 투자해야 한다는 것을 알고서, 가까이 하지 않았습니다. <br>
                        그러면서 점점 변해가는 제 외면과 내면에, 조금은 슬펐지만 내년에 당당하게 합격하고 멋진 미소를 보일 나를 상상하며 참았습니다.<br>
                        "지금이 내 인생 최악으로 못생기고, 최악으로 소심해지는 시기다, 어쩔 수 없지! 난 선생님이 되야하니까!" 하는 생각을 자주 했었던 것 같습니다. 맞지 않나요? <br>
                        선생님들, 절대로 지금의 자신의 모습이 영원할거라고 생각하지 마세요! <br>
                        내년에 멋지고, 예쁜 모습으로 아이들을 맞이해 교단위에 설 스스로의 모습을 상상해보세요. <br>
                        2. 생활습관<br>
                        저처럼 학습능력이 조금 부족하고, 암기력은 엄청나게 부족하고, 집중력은  평범한 사람이 합격할 수 있는 방법은 하나였다고 생각했습니다. '공부시간을 늘리는 것'<br>
                        그래서 저는 먼저 시간계획표, 그리고 기상스터디, 공부시간 스터디를 활용했습니다.<br>
                        시간계획표는, 매일 아침 일어나서 가장 먼저 만드는 것으로, 작은 노란 포스트잇에 그날 제가 공부할 목록들을 넘버링하여 작성하고 눈에 가장 잘 보이는 곳에 붙여놓는 것입니다. <br>
                        그리고 기상스터디는 5시 30분에 기상하는 밴드스터디로 시작했습니다. <br>
                        인증이 늦으면 벌칙금을 내는데, 농담아니고 재수기간동안 제가 낸 벌칙금은 대략 10만원입니다. (미친거죠^^;)<br> 
                        그래도 도움은 많이 되었습니다. 늦어도 7시에는 온전히 정신을 갖게 되었거든요. <br>
                        그리고 스탑워치로 공부시간을 매일 잰 후 저녁에 공부시간을 인증하는 밴드스터디를 했는데, 저와 함께 공부하는 선생님들의 시간도 볼 수 있으니, 어느정도의 긴장? 경쟁심? 같은 것을 갖게 되어 너무 좋았습니다. 초수기간에는 교생하랴, 학교수업들으랴, 과외하랴 여러 요인들이 많아서 공부시간을 그렇게 많이 확보하지는 않았지만, 위와 같은 방법들로 인해서 그래도 만족할만큼의 공부시간을 갖을 수 있었습니다. 재수 때는, 8시간에서 10시간 정도 공부를 매일 했었습니다. <br>
                        3. 슬럼프 극복<br>
                        초수때는 열의에 차 있어서 슬럼프가 없었지만, 재수때 있었습니다. <br>
                        6~7월 정도였는데, 그때, 아 슬럼프라는 것이 이런 것이구나! 하고 느꼈습니다. <br>
                        저는 그때 공부시간을 3시간정도 줄이고, 제가 좋아하는 미드를 많이보고, 또 치킨도 엄청 먹었습니다. <br>
                        아! 제가 말씀드리지 않았는데, 저는 6월부터 치킨을 3~4일에 한 마리씩 먹었습니다.<br> 
                        제 스트레스는 치킨들이 많이 해결해주었습니다. 개인적으로 정말 큰 도움이였습니다. <br>
                        공부로 받는 스트레스를 식욕으로 푸는 것만큼 확실한 것은 없었던 것 같습니다.. (살좀 찌면 어떻습니까? 합격하고 당당하게 빼면 되죠!) <br>
                        4. 건강관리<br>
                        본인의 체력은 본인이 가장 잘 알기 때문에, 내가 어느정도 공부하면 허리에 무리가 오고 어느정도 잠을 안자면 감기가 잘 드는지 느끼 실 수 있으셔야합니다.<br>
                        제 개인적으로 잠을 조금 자게 되면 감기에 너무 잘들어서 다음날 공부를 망하게 되더라구요.<br>
                        그리고, 자신이 하루중 가장 졸린시간을 꼭 체크해두셨으면 합니다. <br>
                        그 시간대에 10분정도 쪽잠을 주무시면, 바이오리듬이 상당히 좋아진다는 것을 느끼실 수 있습니다.<br> 
                        (꿀팁이쥬!) 무엇보다도, 무리하시면 안됩니다. <br>
                        앞서 말씀드렸듯이, 공부를 막 불타올라서 하는 것보다는 담담하게 매일 규칙적으로, 일상적으로 하시는 것이 좋습니다. 
                        무리하지 말아주세요.<br>
                        5. 휴식의 방법<br>
                        저는 하루 공부가 끝나고 오면 11시 10분에서 30분 정도였습니다. <br>
                        물론 더 일찍 집에 도착할 때도 있습니다. <br>
                        집에 도착하면 꼭 샤워를 하고, 기분좋은 상태에서, 이불 뒤집어쓰고 제가 좋아하는 미드를 보았습니다.<br> 
                        저만의 작은 영화관 같은 느낌이였고, 미드를 그렇게 보고 나면 하루 스트레스가 정말 귀신같이 사라졌습니다. <br>
                        미드를 보면서, 또 “아 일반영어공부해야지!” 하면서 공부하듯이 보지마세요. 그냥 즐기세요.. ^^; <br>
                        그리고 집에서 도서관갈 때, 도서관에서 집을 갈 때 항상 제가 좋아하는 신나는 음악들을 들으면서 왔습니다. <br>
                        슬픈음악 듣지마세요.. body like a back load, forget you라는 노래같은 스타일이 도움이 되었습니다. <br>
                        그리고 3,4일 중 하루는 치킨을 먹었습니다. <br>
                        제 개인적으로는 큰 도움이 되었는데, 이처럼 선생님들 개개인마다 자신에게 특히 힘이 되는 음식이나 음악, 영상등이 있다면 적극적으로 활용해서 효율적으로 스트레스를 풀어보세요. <br>
                        덕분에 저는 슬럼프가 그렇게 심하지 않았고, 자주 오지도 않았습니다. <br>
                        6. 학습시간관리<br>
                        저는 전공과 교육학 모두 인강을 들었습니다. <br>
                        이 인강을 한번에 몰아서 듣기보다는, 제가 공부가 안될 때, 듣는다? 라는 느낌으로 인강을 활용했습니다. <br>
                        전공과 교육학 모두 개인 스스로 공부하고 암기하고 내재화하는 시간이 매우 중요한데, 이 시간은 머리를 엄청 활용하는 시간이기 떄문에, 스트레스를 많이 받습니다.<br>
                        그렇기 때문에, 머리가 과부하가 걸릴 수 있어요. 그럴 것 같으면, 인강을 들으면서 머리를 식히시는게 도움이 많이 되실거라 생각됩니다.<br>
                        특히 집중력이 흐려지는, 밥 먹은 직후와 늦은 저녁시간 때! 인강을 들으면 참 좋겠죠! <br>
                        그리고 매일 공부시간 체크하고 기록하는 것도 도움이 많이 되었습니다. <br>
                        무조건 나는 이 시간만큼 공부해야 한다! 라기보다는 그날그날 나의 컨디션, 나의 할 일에 맞게 공부시간을 늘려보는 것이 좋을 것 같습니다.<br>
                        7. 기타 합격 꿀 Tip<br>
                        선생님들이 얻으신 좋은 자료, 또는 만드신 자료를 주변 동료들에게 나눠주세요.<br> 
                        이 시험을 준비하면서 느낀 것은, 이상하게도 남을 많이 도와주시는 분들, 그리고 감사함을 표현할 줄 아시는 분들 가운데 붙으신 분들이 많았다는 것입니다.<br> 
                        그 이유를 딱 꼬집어서 말씀드리기는 힘들지만, 제 개인적으로 다른 선생님들께 제가 만든 자료를 공유하는 과정이 참 좋았습니다. 
                        그래서 저는, 주변에 제게 조언을 묻는 선생님들께 항상 말씀드립니다. <br>
                        함께 공부하는 동료들에게 도움을 많이 주세요! <br>
                        8. 2차 시험에 대하여.<br>
                        2차시연 준비는, 처음에는 오프라인 스터디를 통해 준비했습니다. <br>
                        준비하면서, 또다시 저를 엄청나게 괴롭히는 저의 단점이 있었습니다. <br>
                        저의 암기력.. 주어진 시간동안 디렉션들을 숙지하고, 또 제 수업구상을 어느정도 머리에 넣어둔 상태에서 시연을 해야하는데, 도무지 이 짧은 시간만으로는 그 많은 것들을 기억할수 없는 것이였습니다.<br>
                        앞에서 말씀드렸듯이, 저는 기억력이 정말 정말 안좋거든요. <br>
                        결국 스터디를 준비하면서, 선생님들의 시연에 감탄만하고 저는 계속 망하고.. 망연자실하고 있었습니다. <br>
                        큰맘먹고, 오프라인 스터디를 그만두고 집에서 혼자 동영상을 찍어 연습했습니다. <br>
                        거실에 있는 벽에, 아스테이지를 2개를 이어 붙여놓고, 판서도 써보고 웃어보고, 자주 쓰는 멘트들을 반복 암기하고, 스크립트를 통째로 써보기도 하고, 암기하고, 끊임없이 연습했습니다. <br>
                        1주일이 지나고 나니, 자신감이 붙었구요. <br>
                        인터넷에, 제 시연과 면접 연습영상을 보고 피드백 주실 선생님들을 무작위로 모집했습니다. <br>
                        정말 천사같은 선생님들이 너무나도 정성스럽게 피드백을 주셨고, 저는 또 수정하고 연습하고 반복했습니다. <br>
                        <br>
                            2차시연장에서, 시연 때 너무 긴장해서 제가 생각한 대로 시연을 진행하지 못했습니다. <br>
                            그런데, 그 긴장한 와중에, 제가 씨익 웃으면서 면접관들에게 한 멘트가 있었는데요. <br>
                            “Don’t forget! YOU are the main characters in this lesson! NOT ME!”입니다. <br>
                            이 멘트는 제가 혼자 집에서 수없이 연습했던 멘트였는데, 적절한 타이밍에 나왔던 것 같았고, 그 때 채점관 몇분들의 눈썹이 조금 씨익 올라가면서 “오호! 이 쫘식? 쌈빡한데?” 하는 표정을 보여주셨습니다.<br>
                            솔직히 판서도 엉망이였고 디렉션도 2개를 어겼는데, 생각보다 좋은 점수를 받아 놀랐습니다. <br>
                            무엇보다 큰 목소리, 그리고 ‘그, 그래 느,나, 기,기,긴장한 거 맞는데, 기,긴장한거 아니야!’ 라는 듯한 패기!를 보여주세요. 
                            그리고 인사! 철저하게 해주시고, 걸음걸이와 눈빛과 표정 모두, 정직하고 선생님다운 모습으로 보여주세요. <br>
                            면접에서도 역시 마찬가지입니다. 특히 면접에서는, 채점관들 눈빛 한명한명 모두 마주치려고 엑스맨에 나오는 눈에서 레이져 나가는 주인공처럼 계속 눈빛발사했습니다. <br>
                            농담아니고, 그 옛날 드라마 태조왕건에 나오는 미륵불 아시죠? 그분 눈빛과 비슷하게 발사했습니다. <br>
                            그것보다는 조금더 온화하고 당당하고 정직한 눈빛으로! <br>
                            <br>
                        합격수기를 마치며.<br>
                        선생님들, 이 좁은 문을 과연 내가 통과할 수 있을까? 과연 내가 성공할 수 있을까? 하는 불안감이 정말 크실것라고 생각됩니다. 
                        하지만, 그런 불안감은 공부하는 기간동안 스트레스만 키울 뿐입니다. <br>
                        부정적인 생각을 아예 버리는 것은 불가능하지만, 선생님들 스스로, 이번에 주인공은 나다. 내가 아니면 누가 선생님되겠어. 하는 다소 뻔뻔한? 마음을 가져주세요. <br>
                        당당하게 이 시험에 들어온 이상, 이 시험은 내가 붙을까 떨어질까 하는 ‘불안의 문제’가 아니라, 내가 끝까지 최선을 다할 것인가 말 것인가의 ‘갈등의 문제’로 받아들이십시오.<br>
                        내가 최선을 다해서 시험을 다 치루고 나서, 이 시험을 ‘불안의 문제’로 받아들여도 늦지 않습니다. 그 전까지는, ‘갈등의 문제’입니다. 내가 최선을 다 할 것인가, 말 것인가.<br>
                        선생님들, 최선을 다하셔서 반드시. 꼭 함께 교사로써 아이들을 키울 수 있으면 좋겠습니다. <br>
                        진심으로 응원합니다.  <br>
                    </div>
                </div> 
            </div> 
        </div> 

        <div id="popup17" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>   
            <div class="content">         
                <div class="memoirs NSK">
                    <div class="memoirstitle"><span><strong>교육학</strong> 임산부도 했어요. 다들 할 수 있어요!!</span> <span>김미*</span></div>
                    <div>
                        안될 이유는 찾으면 많겠지만 된다고 생각하면 모든 것이 가능해집니다!<br>
                        2월부터 시작해서 저는 5월까지 꾸준히 체력관리를 하면서 공부를 병행했습니다.<br>
                        하루에 1시간씩이라도 걷는 것은 매우 효과적이었습니다. <br>
                        그리고 이때 교육학 강의를 들으면서 걸으면 1석 2조입니다!<br>
                        <br>
                        그러나 5월부터는 갑작스러운 임신으로 인해서 운동도 하지 못했습니다. <br>
                        몸은 점점 무거워지기도 했고, 임신중이라서 백신접종도 못했기 때문에 1차 준비 시 학원 수강도 어려웠고, 2차 면접 준비 시 스터디카페 출입도 제한되었습니다.<br>
                        그때마다 포기하는 것이 아니라 다른 방법을 대체해서 찾고자 하였습니다. <br>
                        후배 선생님들도 시험을 준비하면서 어려운 이유가 많겠지만, 그럼에도 불구하고 할 수 있는 방법을 찾으신다면 합격할 수 있습니다!<br>
                        <br>
                        그리고 무엇보다 규칙적인 생활을 하시기를 추천드립니다.<br>
                        이경범 선생님께서 하신 말 중에 계속 똑같이 그 자리에서 묵묵히 하다보면 그 자리의 기운이 쎄진다. 고 한 말이 있습니다. <br>
                        저는 그 말을 무작정 믿었고, 매일 똑같은 시간에 똑같은 과목을 공부하고자 했습니다. <br>
                        그렇게 하다보니 습관이 형성되게 되었고 습관이 형성되자 그 이후에 하는 것은 고민없이 자동적으로 하게 되어 불필요한 고민, 생각을 하는 시간이 줄게 되었습니다. <br>
                        꼭 규칙적인 생활을　하시기를 추천드립니다!<br>
                        <br>
                        교육학 공부후기<br>
                        1-2월<br>
                        저는 회사를 다니다가 2월부터 시작했습니다. 2월에 어떤 정보도 없이 혼자 시작하게 되면서 어떤 강사가 유명한지도 몰랐습니다.
                        샘플강의를 듣다가 이경범교수님 강의를 한번 듣고 재미있게 끝까지 들을 수 있을 것 같아 고민 없이 선택하게 되었습니다.<br>
                        <br>
                        1월부터 이미 시작한 기본반 강의를 하루에 5강에서 6강씩 몰아들으면서 진도를 따라잡기 바빴습니다.<br>
                        이때는 어떤 필기도 하지 않았고, 교수님의 한마디 한마디 스토리텔링을 들으면서 즐겼습니다. <br>
                        그리고 정말 미드 보는 것보다 재밌게 느껴지며 지겹다는 생각이 들지 않았기 때문에 강의를 다 따라갈 수 있었습니다.<br>
                        이때 교수님께서 합격한 사람들은 1,2월에 가장 공부를 열심해 했다고 말해주셔서 최대한 앉아있는 습관을 들이고자 했습니다.
                        <br>
                        <br>
                        3-4월<br>
                        저는 3월에 교생을 가게 되면서 교육학 공부를 따로 할 시간이 없었습니다. <br>
                        교생을 먼 곳으로 가게 되었기 때문에 지하철에서 앉아있는 시간이 많아서 그동안 핸드폰으로 1-2월 강의를 다시 듣거나, 3-4월 논객강의를 들었습니다. <br>
                        지하철에서 책 없이 들었지만 워낙 설명을 세세하게 해주셨고, 1,2월 강의를 재밌게 들었기 때문에 떠오르는 것들이 많았습니다.<br>
                        <br>

                        4월에는 작년에 교수님께서 새롭게 시작하신 ‘한여름 밤의 특강’ 심화강의를 듣게 되었는데 테마를 정해서 심도있게 자료를 만들어주시고 테마를 다뤄주셔서 해당 주제들에 대해서는 폭넓게 이해가 가능했습니다. 2022년 임용에서 교육학은 응용하여 적는 문제가 많았는데, 이 테마 강의에서 그 부분의 도움을 많이 받을 수 있었습니다.<br>
                        <br>
                        <br>
                        5-6월<br>
                        이때는 기출분석 강의를 진행하시면서도, 테마 강의를 계속 이어가셨기 때문에 저는 기출보다는 한여름방의 특강 테마강의를 들으면서 모르는 부분을 계속 추가하고자 하였습니다.<br>
                        이때쯤이면 교육학 전체 과목이 여러 번 반복되므로 내가 무엇을 모르고 무엇을 아는지가 가려지기 때문에 한여름방의 특강에서 심화된 자료들을 선택하여 소화할 수 있게 되므로 도움이 많이 됩니다!<br>
                        <br>
                        <br>
                        7-8월<br>
                        단원별 문제풀이 강의를 수강하면서 기존에 알고 있던 것은 점검하고 알고 있었지만 잊어버린 부분은 다시 기록하면서 빠르게 여러번 회복하고자 했습니다. <br>
                        저는 이 때에도 계속해서 산책할 때나 어디에 이동할 때에 1,2월 기본강의를 계속 들었습니다. <br>
                        이경범교수님의 기본강의가 이해위주이고 워낙 재미있기 때문에 계속 다시 듣는 것이 지겹지 않아서 이것이 가능했다고 생각합니다!
                        <br>
                        <br>
                        9-11월<br>
                        모의고사반을 수강하면서 첨삭기회가 있을 때는 매번 신청을 해서 온라인으로 첨삭을 받았고, 어느 부분이 부족한지 체크할 수 있었습니다. <br>
                        이번 시험에서 많은 부분이 모의고사에서 적중했기 때문에 하반기로 갈수록 교육학에 많은 시간 투자를 할 수 없었음에도 점수가 어느정도 나올 수 있었다고 생각합니다!<br>
                        <br>
                        <br>
                        교육학은 1~4월에 최대한 반복하며 익숙하게 만들어 놓는 것이 중요하다고 생각합니다. <br>
                        그렇게 하기 위해서는 일단 강의가 재미있고 이해가 되어야 할텐데, 그런 부분에서 이경범 교수님을 선택한 것이 탁월했다고 생각합니다!<br>
                        그리고 마지막까지 짜투리 시간에 여러번 강의를 반복할 수 있어야 교육학 감을 놓치 않는 것 같습니다.<br>
                        <br>
                        여러번 반복 수강할 수 있는 시스템을 추천합니다~<br>
                    </div>
                </div> 
            </div> 
        </div>

        <div id="popup18" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>   
            <div class="content">         
                <div class="memoirs NSK">
                    <div class="memoirstitle"><span><strong>영어</strong> 경기영어. 초수. 교직이수. 복수전공. 이과생. 재학생</span> <span>최은*</span></div>
                    <div>
                        안녕하세요^^ 우선 제 소개를 간단하게 하자면, 사립경력 2년차, 민쌤패키지 2년 재수생입니다.<br>
                        대학졸업반에 시험을 한번 쳐본 것까지 포함하면 삼수생인가요?ㅎㅎ<br>
                        우선 4학년때 선배님들이 합격시는소식을 듣고 나도 임용을 도전해볼까?했지만,, 너무 어렵더라구요ㅠㅠㅠ<br>
                        이 시험은 내가 합격할 수 없을 거야...하면서 바로 사립유치원에 취업을 했어요..<br>
                        아무것도 모르고 신설유치원에 취업을 하는 바람에 매일..야근에..심지어 자연미술제준비로 새벽 4시퇴근하고 7시출근한적도 있습니다..ㅠㅠ 이런 저런 일을 겪고 나니 내가 왜 유치원교사가 되었을까하는 회의감이 들더라구요ㅠㅠ 그래서 2년일하고 퇴사를 하고 임용준비를 하게되었습니다.<br>
                        대학동기들이 민쌤듣고 2018년도에 많이 합격하였다는 이야기를 듣고 샘플강의를 들어보았는데 얼굴도 이쁘시고 목소리도 나긋나긋하셔서 귀에 쏙쏙들어와서 민쌤 강의를 수강하게 되었습니다.ㅎㅎ<br>
                        민쌤이 너무 너무 잘 가르쳐주셨지만 강의들으면서도 집중력 부족과 이해부족으로 떨어진 것 같아요ㅠㅠ 민쌤께서 정말 꼼꼼하셔서 한번 더 믿고 재수때도 민쌤 패키지를 따라가게 되었어요ㅎㅎ<br>
                        첫해에는 거의 올인했지만 제가 암기만 했지 이해가 너무 부족했던 것 같아 이번에는 예습을 하고 잘 이해가 가지 않은 부분은 더 집중해서 듣기도 하고 모르는 부분은 민쌤 카페에 질문도 남기고 기본서도 다시 보면서 이해하려고 노력했던 것 같아요!! 첫해에는 암기가 목적이였다면 올해는 이해가 선행된 후 암기를 하려고 노력했던 것이 합격할 수 있는 데 큰 도움이 되었던 것 같아요! 민쌤 목소리를 천천히 다시 들으면 이해가 되더라구요!!<br>
                        <br>
                        -우선 개각론부터 말씀드리면 저는 5월까지는 카페알바를 병행했어요!! 초수때 올인을 했지만 집중력에 한계가 오더라구요...<br>그래서 제가 좋아하고 하고 싶었던 카페알바를 하면서 시간이 많이 없으니 알바가기 전 시간을 활용해서 오전에 강의를 정말 집중해서 듣고 알바다녀와서 들은 강의를 다시 복습하는데 시간을 투자했어요. 그러면서 개론과 각론 맨앞에 목차가 있는데 목차가 너무 잘되어있어서 목차대로 찬찬히 공부하면서 머릿속에 구조화를 했고 복습도 목차대로 하였습니다.<br>
                        또 이해가 되지 않은 부분은 강의를 다시 돌려서 듣고 이해를 한 후 다음 페이지로 넘어가려고 했어요.<br>
                        시험을 2019추시와 정시를 쳐본 후 느낀 것은 암기를 하였다고 하더라도 이해가 되지 않은면 적용할 수가 없다는 것입니다.<br>
                        그리고 기출강의를 병행해서 듣고 싶었지만.....시간의 한계가 오더라구요ㅠㅠㅠ그래서 저는 기출은 문풀시기에 시간이 없지만 나누어서 복습개념으로 들었어요. 하지만 초수라면 병행해서 듣는 것을 추천드립니다. 기출을 먼저 알아야 공부의 방향을 설정할 수 있기때문입니다. 저는 초수시절 민쌤 기출이 밑에 답이 상세히 적혀있어서 그것을 기반으로 공부를 했는데 그때 공부의 방향을 잡을 수 있었어요. 또 민쌤이 기출강의에 간단요약 정리를 해주시는데 저는 그것을 보면서 중요한 것을 다시 한번 짚고 넘어가기도 해서 도움이 되었어요.<br>
                        - 7~8월엔 문풀반이 개강을 하는데 저는 초수때 경험을 해봐서 어마어마한 문제양을 풀어나가기 위해 이번에는 전략적으로 나갔습니다. 월요일 20문제, 화요일 20문제, 수요일 20문제 이런 식으로 5일을 쪼개서 풀 수 있었습니다. 20문제를 풀었으면 더이상 풀지 않고 복습하는데 더 시간을 투자 했어요. 예를 들면 오전 개론복습, 12시부터 3시까지 문풀, 3시이후는 무조건 각론 복습 이런식으로 했습니다. 또 웹지도를 이때 단권화해나갔습니다. 저는 초수때도 웹지도로 단권화를 했지만 새롭게 개정된 놀이나, 추가한 것을 덧붙이기 어려울 것 같아 새웹지도를 다시 사서 거기에 단권화를 다시 해나갔습니다. 사실 글자크기가 너무 작아져서 놀라긴 했는데...꼼꼼하게 해주신 것에 감사한 마음으로 다시 단권화를 했습니다. 놀이파트는 따로 주시긴 했는데 함께 가지고 다니면서 보았어요. 새로 단권화를 한다는 게 어떻게 보면 시간이 많이 들 수 있어요. 하지만 저는 복습개념으로 생각하면서 열심히 작년 웹지도와 합친 결과 저만의 단권화웹지도를 완성할 수 있었습니다. 이때 저만의 팁은 형광펜 3가지를 활용해서 큰 제목은 하늘색, 학자는 분홍색, 키워드는 노랑색으로 표시해서 눈에 들어오도록 통일했어요. 눈이 아프지 않는 형광펜을 사용하시면 좋을 것 같아요!! 그리고 매일밤 10시-11시에는 웹지도로 구술스터디를 했어요.<br>
                        한페이지씩 설명하면서 모르는 것을 물어보기도 하고 내가 설명하면서 모르는 부분이 무엇인지 찾을 수 있었어요.<br>
                        모르는 부분은 빨간색 스티커로 표시해두고 개인복습시간에 그 부분은 기본서를 다시본다거나 문풀을 다시 그부분을 풀어본다거나 하면서 알 수 있도록 했어요. 저는 구슬스터디가 개인적으로 정말 도움이 많이 되었던 공부법이에요ㅠㅠ<br>
                        -10월에서 11월에는 시험스케쥴을 맞추기 위해 기상스터디로 전환하여 아침에 웹지도 구술스터디를 하면서 잠도 깨고, 전체 회독할 수 있었어요! 또 시험장에 갈때는 민쌤이 작년에 주신 요약본만 가지고 갔어요. 저는 그 요약본을 평소에도 보았기 때문에 눈에 익숙해져 있어서 눈에 익숙한 것으로 가지고 가서 키워드만 보고 시험을 쳤어요.<br>
                        -해설서, 실행, 이해자료는 민쌤강의를 들으면서 중요한 것이 무엇인지 파악한 후에는 오전에 3문제씩 문제내기 스터디를 해서 문제를 내고 풀면서 이해하려고 했고, 개정된 이유는 기출에서도 나온적이 있었기 때문에 기본적인 부분은 서술로 쓰는 연습도 했어요! 고시문은 매일 아침에 2개씩 매일 쓰고 매겼어요. 한글자도 틀리면 안되기 때문에 매일 써보면서 틀린부분은 체크해두고 책상에 포스트잇으로 붙여서 다음에 틀리지 않도록 노력했어요. 369개에서 59개로 줄어서 어떻게 나올지 모르겠어서 내용이해부분까지 외우려고 노력했어요!! 하지만 놀이실행자료나 이해자료에서 어떻게 나올지 몰라서 일부러 스터디에 들어가서 문제내기도 하면서 빈칸뚫기, 단답문제만들기..등등을 했지만 한 문제도 나오지 않았어요...또 놀이실행자료 목차부분을 외우려고 노력했던 것 같아요! 내년엔 어떻게 될지 모르니 외워두는 게 좋을 것 같아요ㅠㅠ 또 2차에 많은 도움이 되었어요^^ 그리고 독서실이 집에서 30분 거리여서 걸어서 오면서 고시문 녹음한 것을 들으면서 오면서 까먹지 않으려고 노력하기도 했어요! 하나라도 틀리면 너무 아까우니깐요ㅠㅠ<br>
                        -논술은 제가 미포함이라서 저는 기출을 토대로 일주일에 한편씩 써보기만 했어요! 따로 스터디를 한 건 아니고 막판에 인증식으로 한번이라도 쓰려고 노력했어요. 초수때도 19..을 받아서 크게 걱정을 하지 않았던 것 같아요. 하지만 이번엔 18점대를 받아서 좀 더 깎이긴 했지만요ㅠㅠ 시간이 있으시면 많이 써보는 것을 추천드려요!! 줄로 바꼈기때문에 원고지를 넘어가는 걱정은 줄어들었던 것 같아요.<br>
                        -그외에 법은 민쌤이 문풀때 함께 나누어 주셔서 저는 그것을 활용했어요. 거기에 빈칸 뚫기가 되어 있어서 문풀과 병행하면서 법문제도 조금씩 풀어나갔어요^^ 작년에는 제법이군을 샀었는데 잘 활용을 안하게 되서 이번에는 사지는 않고 스터디선생님들이랑 법문제도 오전에 3문제만 내면서 시간투자는 많이 하지 않았지만 중요한 법은 다 보았던 것 같아요! 하지만 안나올 가능성이 높기에 비중을 적게하는 것을 추천드려요!<br>
                        <br>
                        -2차는 요번에 민쌤이 하지 않으셔서 타강사를 들었어요! 그외에 민쌤 작년 2차 수업실연책과, 하이패스, 모모의 희망 등을 활용했고 2차스터디원을 잘만나서 오프라인스터디를 하면서 서로 영상찍고 피드백해주면서 저의 단점은 고쳐나갈 수 있었고, 민쌤이 작년에 찍었던 강의을 올려주셔서 보면서 참고할 수 있는 부분은 참고하였어요^^ 참, 민쌤이 작년에 자연탐구 수업하시면서 토의노래를 알려주셨는데 제가 너무 좋아서 적어두었는데 이번에 토의규칙이 수업으로 나와서 잘 활용했어요^^ 정말감사합니다ㅠㅠ
                        (생각은 많을 수록 좋아요, 친구 생각들어서 히치하이킹, 웃기고 엉뚱해도 좋아요, 이런 건데 브레인스토밍을 실시할 때 4가지 기본규칙을 노래로 만들어주셔서 정말 잘활용했습니다!)<br>
                        -또 저는 운좋게 놀이실행자료를 보면서 자유놀이나올 것 같은 것들 예로 들면 반짝이끈, 지렛대놀이, 흙속에 숨은 색깔 등을 문제로 스터디원과 만들어서 했는데 그 중 지렛대가 나와서 더 수월하게 했어요! 유형뿐만 아니라 자유놀이가 중요해진 만큼 평가원이라도 문제를 만들어서 해보는 것을 추천드려요. 시험장에서는 미소와 자신감이 중요한 것 같아요. 저는 인사할 때부터 평가자들 눈을 마주치면서 당당하게 했더니 저도 자신감이 생기더라구요! 마스크를 써서 미소가 보이진 않았지만 최대한 웃으려고 노력했어요!! 면접은 심층면접과 하이패스를 활용하여 계속 반복해서 대답했어요. 인성은 매년 나오는 것과 같이 올해도 즉답2번으로 나와서 배려, 소통과 협력으로 대답할 수 있었어요. 나만의 만능틀을 만드시면 좋을 것 같아요^^ 코로나19로 인해 현장에서 원격 등이 현장에서도 조금씩 이루어진다는 것을 뉴스나 경상남도교육청등을 통해 알게 되어서 조금은 준비하고 갔음에도 당황이 되더라구요ㅠㅠ 최근 시사, 이슈들도 보고 가시면 좋을 것 같아요!! 과정안은 꾸준히 매일 써보는 것이 좋을 것 같아요!! 50분안에 쓰는 연습하는 것이 필요할 것 같아요!!<br>
                        -마지막으로 저는 정말 중요한 것은 자신을 믿고 밀고 나가는 것이에요. 어떤 강사를 선택했든 어떤 공부방법이든 그것을 믿고 나아간다면 합격의 문이 열린다고 말씀드리고 싶습니다. 정말 힘들고 앞이 캄캄하고..나 혼자 동굴 속에 갇힌 기분이 들기도 하지만 자신을 믿고 열심히 차근차근 준비한다면 빛을 보실 수 있을 것이라고 생각합니다.<br>
                        처음으로 합격수기를 쓰는 거라 주저리주저리 했는데..도움이 되셨으면 좋겠습니다ㅠㅠ 그리고..민쌤 2년동안 정말 감사했습니다. 인강생이라 직접 뵙지는 못했지만 수강생을 위해 항상 최선을 다해주시는 모습이 감동이였어요ㅠㅠ<br>
                        이렇게라도 합격의 소식을 전할 수 있게 되어 너무 행복합니다ㅠㅠ 선생님 모두들 끝까지 포기하지 말고 힘내셔서 현장에서 뵙기를 응원할게요!!! 화이팅!!! 끝까지 읽어주셔서 감사합니다ㅠㅠㅠ<br>
                        <br>
                        참, 앞만 보고 달려나가는 것도 중요하지만 지치지 않기 위해서는 (슬럼프가 오면 쉬는 것을 추천드려요!! 유튜브 브이로그, 맛있는 것 먹기, 산책하기 등등) 더 힘내서 공부하실 수 있을 거에요!!
                    </div>
                </div> 
            </div> 
        </div>

        <div id="popup19" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>   
            <div class="content">         
                <div class="memoirs NSK">
                    <div class="memoirstitle"><span><strong>유아</strong> 서울 고득점 누구나 할 수 있다!! </span> <span>이예*</span></div>
                    <div>
                        안녕하세요. <br>
                        2021년 유아임용 서울 합격생입니다!! <br>
                        이 말을 너무나도 하고싶었어요ㅜㅜ!!!!<br>
                        저는 2020년 서울 정시 때는 1차 합격, 최종 불합격 /// 2021년 서울 정시 때는 최종 합격하였습니다.<br>
                        그렇기에 누구보다 2차의 중요성을 잘 알고 있습니다. <br>
                        특히 작년 2차 때는 75.07로 굉장히 낮은 점수를 받은 반면, 올해 2차 때는 94.94의 점수를 받았습니다!! <br>
                        더불어 수업실연 -0.33(작년엔-9.13), 면접 -2.13(작년엔 -13.2) ///// <br>
                        2차에서 거의 20점을 올린 만큼 경력이 없어서 2차가 불안하신 분들, 최종불합을 하신 분들께서는 꼭 이 수기를 읽어주셨으면 좋겠습니다.<br>
                        저는 졸업 후 유치원 교사가 될지, 대학원에 갈지, 아예 다른 길로 갈지 무수히 방황했던 적이 있습니다. <br>
                        그러던 중 대학의 많은 동기들이 공립 임용 시험에 합격하는 것을 보고 강한 의욕을 갖게 되어 임용 시험에 도전하게 되었습니다.<br>
                        사실 경력이 없었기 때문에 사립유치원의 안 좋은 점을 말로만 들었습니다.<br>
                        그래서 임용을 준비하면서도 공립에 대한 절실함이 처음에 생기지 않았어요.<br>
                        점점 유치원 현장으로 빨리 가고 싶다는 열망이 들게 되었습니다.<br>
                        유아임용 시험은 말 그대로 절실함과 간절함이 있어야 붙을 수 있는 시험이라고 생각합니다.<br>
                        또한 교수님이 늘 강조하시듯 1차보다는 2차에서 판가름이 나게 됩니다!!!<br>
                        저는 2020 정시에 1차 합격을 했지만 안일하게 ‘붙겠지~’라는 생각으로 준비를 하여서인지 쓰라린 최종 불합의 과정을 겪었습니다.
                        그 과정 속에서 배운 것들을 감사하게 생각하고 있지만, 적어도 이 수기를 읽는 여러분들은 그러한 아픔을 겪지 않았으면 하는 바람이 큽니다.<br>
                        최종불합 후 그 해 1년은 자존감이 정말 많이 떨어지고, 나 자신에 대한 실망과 교사의 자질마저 의심케 하기 때문입니다.<br>
                        꼭 선생님들은 1차 합격 후 나태하게 준비하지 마시고, 바로 여러 가지 합격 수기 등을 읽으시면서 2차 준비를 누구보다 열심히, 최선을 다해 임하셨으면 좋겠습니다!!!<br>
                        무엇보다 강조하고 싶은 것은 교수님의 강의입니다.<br>
                        강의가 많다는 생각을 하지 마시고, 교사로서의 양분을 받는다는 마음을 가지고 강의를 꼭꼭 들으며 공부하시길 바랍니다.<br>
                        무조건 2차 강의 열심히 들으세요!!<br>
                        그리고 열정/의지/소망!! 일 년 내내 가져가시길 바랍니다.<br>
                        간절하면 몸이 행동하게 되고, 몸이 행동하면 정신은 점점 성장하게 된다고 생각합니다.<br>
                        특히 합격 후 누구보다 좋아하실 부모님의 얼굴을 상상하세요!! 저는 맏딸로 부모님과 스킨쉽을 잘 하지 않았는데도, 합격날 가족과 서로 얼싸안고 합격의 기쁨을 나누었습니다. <br>
                        그 순간만큼은 평생 동안 기억할 수 있을 것 같이 아직도 생생하게 느껴집니다. <br>
                        꼭 합격하실 겁니다!!<br>
                        <br>
                        1. 1차 공부 -  교육과정<br>
                        저는 19추시 때 80점, 20정시 때 87.33점, 21정시 때 83점을 받았습니다.<br>
                        고득점은 아니더라도 80점 이상을 받을 수 있던 노하우는 바로 강의와 복습입니다.<br>
                        너무나도 당연하다고요? 하지만 많은 수험생들이 2배속으로 강의를 듣고 흘려버리거나, 교수님의 암기팁, 사례, 쉽게 풀어 알려주신 정의들을 놓치게 됩니다.<br>
                        한 번 들은 강의를 또 들으리라고 자신하지 마시고, 반드시 한 번 들을 때 집중해서 교육과정 강의를 들으시길 바랍니다.
                        또한 복습을 게을리하지 마시고, 그때그때 암기할 수 있는 자신만의 요령을 만들어 놓아야 합니다.<br>
                        예를 들어, 두문자를 만들거나, 스토리텔링 또는 이미지 암기법을 사용하시거나, 여러 번 줄글을 읽어 눈에 익히시고, 자연스럽게 이해가 되도록 하는 등 자신만의 복습을 통한 암기를 실행해 나가셔야 합니다. <br>
                        암기 없이 이해는 따라오지 않습니다. 암기와 이해는 병행해야 한다고 생각합니다. <br>
                        이해가 안 되는 것은 암기를 하고, 암기가 안 되는 것은 계속 읽고, 사례를 떠올리고, 적용해보면서 이해를 하다보면 어느 순간 통달하게 됩니다!! 꼭 잊지 마세요. <br>
                        무조건 강의와 복습입니다!!<br>
                        예습의 경우 그 중요성을 알고는 있지만, 실천하기가 쉽지 않더라고요.<br>
                        그래서 저는 강의 듣기 전 예습하는 스터디를 가입했습니다. <br>
                        눈으로 읽거나, 개요도를 만들거나, 목차를 암기하는 등 다양한 방법으로 예습을 진행하여 강의를 듣는데 밑거름이 될 수 있도록 하였습니다.<br>
                        예습 정말 중요하지만 그래도 시간이 부족한 분들께는 복습에 시간을 할애하시기를 추천합니다.<br>
                        교수님의 짜임새 있는 설명과 체계적인 강의를 바탕으로 복습을 한다면 독학할 때보다 더 효율적으로 공부를 할 수 있기 때문입니다.<br>
                        특히 재수 이상의 선생님들의 경우, 타 강사의 자료보다는 현 강사의 자료에 집중하시기를 권유드립니다.<br>
                        자료가 섞일수록 머릿속 정보도 섞여가기 때문입니다.<br>
                        저는 1년 간의 강의를 들으면서 저절로 2차 공부를 한 것 같다는 생각을 계속 했어요.<br>
                        이게 제 2차 고득점의 비결입니다!! 전공과 2차 공부는 떨어질 수 없는 불가분의 관계라는 것을 명심하세요!<br>
                        <br>
                        2. 1차 공부 -  논술<br>
                        저는 19추시 때 논술 18점, 20정시 때 논술 20점, 21정시 때 논술 18점을 받았습니다. 20점을 그대로 안고 갔으면 서울 수석이 될 수도 있는 점수였기 때문에 논술에서 더 아쉬움이 남았습니다.<br>
                        그래서 선생님들께서는 꼭 논술 20점을 받으셨으면 좋겠어요!<br>
                        저는 논술 20점을 받아서인지 논술에 대한 공부를 조금 게을리했습니다.<br>
                        저는 줄글로 바뀐 논술 형식에 굉장한 두려움을 갖고 있었어요.<br>
                        왜냐하면 전 유아임용에 대한 배경지식이 많지 않았기 때문입니다.<br>
                        다른 수험생들이 1장 반을 채우고도 많이 남았다며 속상함을 토로할 때, 저는 1장을 채 채우지 못했습니다.<br>
                        그러나 모범 답안과 강의에서 말씀해주시는 것들을 아주 꼼꼼하게 적었어요.<br>
                        그런 것들을 논술을 쓸 때 녹여낼 수 있어서, 실제 시험 때 1장 반을 채웠습니다.<br>
                        개요도를 어떻게 쓰는지에 대해 고민이 많으실텐데요.<br>
                        저는 개요도를 아주 꼼꼼히 쓰는 편이었어요.<br>
                        하지만 형식이 바뀌면서 써야 할 말들이 더 늘어나게 되었고, 이에 따라 제시문 사례의 경우 개요도에 모두 옮겨적기 보다는 꼭 쓸 키워드에 동그라미 표시를 하여 개요도 시간을 최대한 줄이려고 노력하였습니다.<br>
                        선생님, 많은 걸 적으려고 개요도를 무리하게 쓰다가 시간초과가 되는 우를 범하지 않기를 바랍니다!! <br>
                        시험인만큼 시간 관리가 수험생의 중요한 능력이라는 것을 잊지 마시고, 스스로 적을 수 있는 범위 내에서 개요도를 작성하세요!
                        그러나 개요도를 간과하지는 않으셨으면 좋겠습니다.<br>
                        개요도가 탄탄해야 줄글로 옮겨 적을 때도 수정사항 없이, 깔끔한 논술을 쓸 수 있습니다!!<br>
                        <br>
                        3. 1차 꿀팁<br>
                        저는 오답노트를 따로 만들지 않았던 이유가, 깔끔하지 않으면 다시 그 자료를 보지 않기 때문이었습니다.<br>
                        그래서 문풀책, 모고 프린트 자료 자체를 오답노트화 했습니다.<br>
                        빈 여백이 굉장히 많잖아요?<br>
                        그것들이 모두 새까매져서 다 가려질 때까지 관련된 이론, 두문자, 관련 해이실 내용 등을 적었습니다.<br>
                        그것만 봐도 유아임용 전 범위가 담기게끔요!! 중요한 것은 계속 반복되는 것 아시죠??<br>
                        그래서 쓰다보면 자연스레 외워지게 되고, 그 다음 문제는 틀릴래야 틀릴 수가 없게 됩니다^^!!<br>
                        암기 방법은 수험생 각각 방법이 다를 것입니다.<br>
                        저는 두문자를 활용한 암기를 많이 했어요. <br>
                        해이실의 목차를 외울 때도 그 앞글자를 따서 외웠고, 긴 두문자의 경우 동요의 멜로디를 붙여 암기하였습니다.<br>
                        이것이 굉장히 유용한 것은 즐겁게 암기가 가능하다는 것이에요.<br>
                        암기는 즐겁게 해야 합니다. <br>
                        그것이 일로 느껴지는 순간 굉장한 부담이 되고, 스트레스로 작용하여 공부를 하기 싫어지게 만들기 때문입니다.<br>
                        저는 제가 만든 두문자 또는 교수님께서 중요하다고 하신 개념 및 정의들을 집안 곳곳에 붙여놓았습니다.<br>
                        무조건 붙이세요!! TV를 많이 보는 선생님들께서는 TV 주변에 다닥다닥 붙이시고, 화장실, 부엌, 신발장, 거울 등 자신이 눈을 두는 모든 공간에 유아임용과 관련된 외울 것들을 붙여놓으세요.<br>
                        이는 암기 뿐만 아니라 자신의 의지를 더욱 확고히 하는 데에 큰 도움이 됩니다.<br>
                        이 시험은 머리가 좋은 사람이 붙는 게 아니라, 그저 많이 보고, 읽고, 암기하고, 이해하고, 여러 번 적용해보고 하는 사람, 즉 성실하게 꾸준하게 임용 공부를 하는 사람이 붙는다고 생각합니다.<br>
                        (그렇다고 불합하신 분들이 그렇지 않다는 것은 아닙니다!!! 무조건 나름의 운이 작용하고, 그 날의 컨디션, 또 내후년에 선생님들을 꼭 만나야 할 유아들이 현장에 있다는 하늘의 뜻이라고 생각해요!! 혹 속상하셨다면 죄송합니다ㅜㅜ!!)<br>
                        암기 때문에 자신을 자책하게 되는 날이 많아질 거예요. 왜 난 이것도 못 외우지?<br>
                        다른 사람들은 벌써 다 외웠네? <br>
                        해이실 목차가 나만 안 외워지는 거야? <br>
                        아직도 고시문을 틀려? 다른 사람들은 법령도 다 외우네? 등과 같이 자신의 능력을 의심하게 되고, 붙지 못할 거라 자책하게 됩니다. <br>
                        저도, 다른 합격생들도 이러한 자책의 과정을 겪었을 겁니다. <br>
                        하지만 앞서 말씀드린 것과 같이 반복을 이길 수 있는 망각은 없습니다.<br>
                        반복하세요. <br>
                        외워지지 않으면 자기 전에, 일어날 때!! 일주일 해보시면 그거 무조건 외워집니다. <br>
                        외우기 싫은 것부터 먼저 외우세요. <br>
                        그것이 외워지고 나면 그 희열은 이루 말할 수 없습니다.<br>
                        선생님들께서는 모두 합격할 수 있는 능력을 가지고 있다는 것 잊지 마시고, 남은 일 년 간 유아임용에 푹 빠져 사신다면 암기가 점점 재미있어지게 될 겁니다!!<br>
                        <br>
                        4. 2차 공부 - 면접<br>
                        상반기)<br>
                        - 면접 스터디를 꾸렸습니다. <br>
                        오프라인 스터디 1개, 온라인으로 면접 답을 해보는 스터디 1개, 총 2개의 스터디를 진행했습니다. <br>
                        오프라인을 통해 면접의 감을 잃지 않기 위해 노력했고, 면접 답을 만들어보는 스터디를 통해 다른 선생님들의 면접 답 방식을 알게 되었습니다.<br>
                        논리적인 선생님의 답변을 참고하여 더 좋은 만들어 자주 읽었습니다.<br>
                        <br>
                        1차 시험 후)<br>
                        - 바로 스터디를 꾸려서 일주일에 두 번 오프라인 스터디를, 나머지는 개인공부 및 온라인 스터디를 진행하였습니다.<br>
                        작년에는주제별로 하지 않고 무작위로 면접 주제를 했었기 때문에 머릿속에서 면접 답변에 대한 체계화가 되지 않았습니다.<br>
                        또한 제가 한 스터디에서는 모두 같은 면접 문제를 풀었습니다. <br>
                        하나의 면접 문제에서도 선생님들의 다양한 답변이 나오기 때문입니다.<br>
                        이 중 가장 적합한 답은 무엇일지 토의하여 면접 답을 새로 만들었습니다.<br>
                        이렇게 초반 스터디 운영을 하면 이후 선생님들과 1차 합격자 발표 이후 진행할 때 서로에 대한 피드백이 줄어들게 되어 시간을 아낄 수 있습니다. <br>
                        2차 시험은 준비시간이 1차에 비해 상대적으로 적은 만큼 시간을 누구보다 효율적으로, 효과적으로 써야 하기 때문이에요!!
                        또한 피드백 시간이 길어질수록 체력적으로 매우 힘들어져요. <br>
                        물론 피드백은 굉장히 중요합니다. <br>
                        하지만 2차 시험날이 다가올수록 선생님들의 면접 실력이 상승하여 답을 다듬는 식으로 피드백을 진행할 수 있습니다.<br>
                        또한 다양한 답을 찾으려하기 보다는 5가지 정도의 답을 계속 반복하여 말하고 암기하는 것이 더 중요하다고 생각합니다.<br>
                        왜냐하면 2차 시험장에서는 아는 것도 기억이 나지 않는 일이 비일비재하게 나타나기 때문입니다.<br>
                        꼭 스터디원과 답을 공유하고, 열정적으로 피드백을 진행하세요! 모두와 함께 합격하면 그 기쁨도 두 배, 세 배가 된답니다.<br>
                        현장에 가서 함께 협업할 동료 선생님들이 되실 거니까요~!!<br>
                        - 저는 1차 합격자 발표 전 가장 열심히 해야 하는 것이 바로 면접 내용 공부라고 생각합니다. <br>
                        물론 여기에는 시책 내용을 암기하는 것도 포함됩니다. <br>
                        서울의 경우 시책이 직접적으로 문제의 키워드로 나오지는 않지만, 답변 속에 이를 녹여내는 것이 점수 확보에 좋다는 이야기를 들었습니다.<br>
                        작년에는 시책을 대충 보고 갔기 때문에 시험장 안에서 이를 하나도 말하지 못했습니다.<br>
                        시책을 공부하게 되면 유치원 현장의 일을 대략적으로 알 수 있습니다.<br>
                        특히 해당 교육청이 무엇을 중시하는지가 나와있습니다!! <br>
                        꼭 이를 가지고 1차 합격자 발표 이전에 예상 문제를 만들어 공유하세요! <br>
                        카페 또는 스터디원들과 함께 문제를 만들면 문제의 질도 높아지고, 빠지는 내용 없이 공부할 수 있게 됩니다.<br>
                        - 기출의 중요성!! 면접 또한 기출이 그 어떤 자료보다 중요합니다.<br>
                        꼭 이시기에는 모든 지역의 기출문제를 돌리세요.<br>
                        기출을 한 번 보는 게 아니라 여러 번 돌리면서 그 문제에 대한 답이 떠오를 때까지 해야 합니다!!<br>
                        기출에 나온 것이 다시 나와요!! 또한 자신의 지역뿐 아니라 다른 지역의 문제가 이후 자신의 지역에 나올 수 있다는 점을 명심하세요! <br>
                        그리고 예전에 나온 문제들도 나올 수 있으니 절대 기출을 게을리하지 마셨으면 좋겠습니다.<br>
                        - 상담시연 틀 만들기: 서울에서는 작년 구상형 문제로 상담시연 문제가 나왔습니다. <br>
                        이때 무경력인 저는 너무나도 당황해서 끝맺음을 제대로 하지 못했습니다.<br>
                        이 때문에 저는 상담시연 틀을 만들어 스터디원과 공유했습니다. <br>
                        유아와의 상담시연, 동료 교사와의 상담시연, 학부모와의 상담시연 + 오리엔테이션 시연 등 다양한 시연 상황에서 어떻게 대답을 할 것인지를 꼭 만들어두세요. <br>
                        비록 이 문제가 올해도 나온 것은 아니지만, 수업실연에서 도움이 많이 되었어요.<br>
                        앞으로 수업실연은 수업을 진행하는 기술 보다는 유아 개개인과 상호작용하는 교사의 진성성 있는 모습을 본다고 생각하기 때문입니다. <br>
                        특히 올해 서울의 이야기나누기 문제가 이와 동일한 맥락이었다고 생각합니다.<br>
                        <br>
                        1차 합격자 발표 후)<br>
                        - 1차 합격자 발표날 다시 스터디를 꾸렸어요. <br>
                            이때부터는 오프라인 주2회, 온라인 주3회로 진행했습니다. <br>
                            나머지는 개인 공부시간이었습니다. <br>
                            결국 7일 중 5일을 스터디하는 것과 같습니다. <br>
                            가능한 여러 선생님들 앞에서 면접 시험을 보듯 연습하시는 걸 추천드립니다. <br>
                            특히 면접관 앞에서 양소리를 내시는 분들, 몸 전체가 들썩이도록 떨리는 분들은 꼭 이 연습을 하세요!!<br> 
                            부끄러워도 떨려도 어차피 면접관 앞에서 모두 해야 하는 것이기 때문입니다. 소중한 2차 시험의 기회를 놓치지 마세요!!<br>
                        - 시간 관리: 면접은 점수의 반이 시간 관리라고 생각합니다. <br>
                            시간을 제대로 관리하지 못하면 내가 아는 뒷 문항의 예도 말하지 못하게 되고, 이는 바로 점수 하락으로 이어집니다!! <br>
                            특히 이번에 서울은 코로나로 인해 11분 동안 구상형1, 즉답형2를 답해야 했습니다.<br> 
                            이전처럼 5분 5분 3분이 아니었기 때문에 시간을 수시로 확인하는 것이 중요합니다.<br> 
                            그렇다고 시험 상황에서 타이머를 계속 보면서 말하라는 뜻은 아닙니다. <br>
                            합격자 발표 후에는 시간에 맞춰 답하는 연습을 함으로써 시험 상황에서 자연스럽게 시간을 인지할 수 있도록 연습하라는 것을 말합니다!! <br>
                            또한 지식이 풍부하신 선생님들께서는 여러 가지 부연설명을 하시느라 3가지 답 중 2가지 답을 말하는 경우가 많습니다.<br>
                            이는 자신이 받을 수 있는 점수를 내버리는 것과 같습니다.<br>
                            간략하게 말하는 연습을 하여 시간 내에 풍부하면서 깔끔한 답을 말할 수 있도록 반복연습을 하는 것이 중요합니다.<br>
                        - 키워드 앞에 말하기/ 주장은 간략하게 말하기/ 논거를 꼭 말하기: 이 3개는 선생님들도 잘 알고 계신 면접 틀이라고 생각합니다. 
                            그럼에도 불구하고 시험 상황에서 이를 지키며 말하지 못하는 분들이 많습니다. <br>
                            왜일까요? 떨리기 때문입니다. 머릿속이 하얘지면서 늘상 해왔던 이 3가지를 잊고 장황한 아무말을 하시는 분들이 있습니다.<br>
                            이를 어떻게 바꿀 수 있을까요? 답을 할 때 이 3가지를 인지하는 연습을 한다면 가능합니다!!!! 꼭 3가지를 기억하세요!!<br>
                            <br>
                        5. 2차 공부 -  수업실연<br>
                        상반기)<br>
                        - 수도권 기출을 위주로 돌렸어요. <br>
                            다른 지역 기출이 중요하지 않다는 것이 아니라, 일 이주에 한 번 만나서 스터디를 했기 때문에 최대한 주변 지역 것을 가지고 한 것입니다^^<br>
                            이걸 하면서 제가 작년에 얼마나 기출을 소홀히 했는지 알 수 있었습니다.<br>
                            생전 처음 보는 기출문제도 많이 있더라고요. <br>
                            정말 반성했습니다. 선생님들을 모든 기출을 빠짐없이 해보셨으면 좋겠습니다.<br>
                            <br>
                        1차 시험 후)<br>
                        - 면접과 동일하게 기출의 중요성을 잊지 마세요. <br>
                            하나의 수업 유형을 여러 가지 주제와 문제로 돌렸어요. <br>
                            그게 반복될수록 수업 유형의 틀이 만들어지고, 유연하게 대처하는 능력이 길러졌습니다.<br>
                            하나의 문제를 계속 반복하는 것도 중요하지만 다양한 문제로 수업을 진행하는 게 저는 더 중요한 것 같았어요.<br>
                            하지만 제가 이렇게 생각하는 것은 작년에 2차 준비를 했었기 때문이라고 생각합니다. <br>
                            수업은 일단 그 틀을 정확히 익힌 후 나름의 변형을 할 수 있습니다.<br>
                        - 2차 강의를 들으면서 해이실 내용 등을 꾸준히 보았습니다. <br>
                            강의 꼭 들으세요!! 이 안에서 꼭 문제가 나오더라고요. <br>
                            내가 해본 유형의 문제가 나오는 것과 생전 처음 보는 문제를 구상하는 것은 완전히 다릅니다. <br>
                            선생님들께서도 꼭 강의를 듣고 예상 문제를 여러 번 풀어보세요!!<br>
                        - 작년 최불합이라고 올해 최합일 것이라는 보장이 없다는 것을 꼭 명심하세요!!<br>
                        <br>
                        6. 2차 시험장<br>
                        - 서울은 코로나 때문에 수업실연과 면접을 동일한 날에 보았습니다.<br> 
                            그래서 두 벌의 옷을 준비하지는 않았습니다. <br>
                            저는 무릎 기장의 원피스를 입었습니다. <br>
                            밝은 색이 어울리지 않기 때문에 조금 어두운 색의 옷을 입었습니다. <br>
                            스타킹마저 검은색이면 너무 칙칙해 보일 것 같아서 두꺼운 살색 스타킹을 신었습니다. <br>
                            머리와 화장 모두 제가 했습니다. 이번에는 작년보다 더 편하게 입고 오신 분들이 많아보였어요. <br>
                            의상 및 화장에 대한 걱정은 놓으셔도 좋을 것 같습니다. <br>
                            다만 저는 깔끔한 모습으로 어필하고자 승무원 머리처럼 모든 머리를 스프레이로 고정했습니다. <br>
                            예민한 성격이라 조금이라도 머리카락이 거슬리면 집중이 흐트러지더라고요.<br>
                        - 대기실과 구상실 및 평가실 모두 너무 추웠습니다.<br>
                            핫팩 여러 개 챙겨가시고, 어그부츠 신으셔서 발 보온 하세요!!<br>
                        - 마스크를 쓰고 있어서 굉장히 답답했습니다. 인공눈물도 가져가서 틈틈이 넣었어요.<br>
                        - 점심으로는 작년과 동일하게 유부초밥과 한라봉을 싸갔습니다. <br>
                            초콜렛과 사탕 및 쿠키도 여러 개 챙겨가서 먹었어요. <br>
                            작년과 다르게 화장을 고치거나 과자를 드시는 분이 적었습니다!<br>
                        - 시험장에 도착한 순간부터 ‘나는 현장에서 일하는 유치원 교사다’라는 마음가짐을 갖길 바랍니다.<br>
                            만나는 모든 분들께 인자한 미소를 보이기 위해 노력했습니다.<br>
                        - 다른 수험생보다 일찍 도착하여 평가실과 구상실을 둘러보시기를 추천합니다!!<br>
                            그렇다고 너무 빨리 가면 엄동설한의 추위를 맛볼 수 있으니, 학교 개방시간을 숙지하세요!!!<br>
                            <br>
                        7. 올해 합격할 수 있었던 비법<br>
                        - 산책 및 운동(요가, 자전거, 체조): 건전한 정신은 튼튼한 체력으로부터 온다고 생각합니다!! <br>
                            상반기에 체력을 올려 놓으셔야 하반기를 막힘 없이 진행할 수 있어요. <br>
                            특히 저는 산책을 강력히 추천합니다. <br>
                            산책을 통해 자연의 변화를 직접 체험할 수 있었기 때문입니다. <br>
                            또한 최불합이라는 마음의 상처를 자연 속에서 치유할 수 있었습니다. <br>
                            너무너무 속상하고 모든 게 힘들다고 느껴지실 땐 자연을 찾으셨으면 좋겠습니다!!<br>
                        - 스터디: 다양한 스터디를 진행했습니다. 기상스터디, 캠스터디, 문제내기 스터디, 면접/수업실연 스터디 등 다양한 스터디를 통해 꾸준히 다양한 공부를 병행할 수 있었습니다.<br>
                            저는 기간이 정해진 스터디를 좋아했습니다.<br>
                            그래야만 처지지 않고 탄력 있게 스터디에 참여할 수 있기 때문입니다.<br>
                            또 이 안에서 마음이 맞는 선생님과 2차 스터디를 꾸렸고, 그 인연이 합격으로까지 이어질 수 있었습니다.<br>
                            정서적지지 또한 이 안에서 받게 되면서 많은 도움을 받았습니다.<br>
                        - 인간관계: 저는 공부는 혼자 하는 것이라는 말에 동의하지 않습니다. <br>
                            멀리서는 교수님부터 시작하여, 스터디원들, 가장 가까운 가족까지 모두 힘이 되어야만 할 수 있는 것이 공부라고 생각합니다.
                            다만 대학 동기나 학창시절 친구들과는 조금 거리를 두었습니다. 코로나로 인해 만날 수 없게 되어 다행이라는 생각도 들었습니다.<br>
                            친구를 만나면서 임용에 대한 생각을 하지 않기 보다는 계속해서 스터디원 선생님들과 힘든 점을 공유하며 또다른 인간관계를 쌓아나갔습니다.<br>
                    </div>
                </div> 
            </div> 
        </div>

        <div id="popup20" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>   
            <div class="content">         
                <div class="memoirs NSK">
                    <div class="memoirstitle"><span><strong>유아</strong> 서울 유아임용 초수합격수기!시관관리 꿀팁들 공유해요:)</span> <span>조혜*</span></div>
                    <div>
                        안녕하세요 <br>
                        저는 2021 유아임용 서울 초수 합격자입니다.<br>
                        이렇게 제가 합격수기를 쓸 수 있는 이 순간이 감사하고 또 감사합니다.<br>
                        시험 날 실수가 많아서 고득점은 아니지만 그래도 많은 분들의 시작에 조금이나마 도움이 되길 바라는 마음으로 작성해봅니다. 
                        저는 민쌤 1년 패키지를 들었어요 :)<br>
                        <br>
                        #part 1- 공부법<br>
                        ★"편식안돼요 . 골고루 꼭꼭 씹어 이해하기"<br>
                        저는 강의를 듣고 해당 내용에 대한 이해를 그때 그때 하려고 노력했습니다. <br>
                        민쌤강의를 듣고 기본서를 읽으며 이해도를 파악하고 이해가 안되는 부분을 더 중점적으로 읽었습니다.<br>
                        수험생마다 다들 할애할 수 있는 공부의 시간과 양이 다르기 떄문에 중요한 내용만 암기하고자 하시는 경우가 많습니다.<br>
                        물론 시간에 따라 각자의 선택과 집중이 필요한 것은 분명합니다.<br>
                        그러나 점차 기출의 내용이 아주 구체적인 이해를 요하는 문제와 서술형으로 변화하고 있기 때문에 골라서 학습하는 것은 매우 위험하다고 생각합니다.<br>
                        저 또한 외울 것이 너무 방대했기 때문에 이건 버릴까? 하는 생각들이 자주 들었지만 그런 생각이 들 때는 이렇게 생각을 하며 마음을 다 잡았습니다.<br>
                        "만약에 이 문제가 시험에 나온다면 지금 이 순간을 후회하지 않을 수 있을까?"하면서요.<br>
                        그래서 저는 웹지도에 있는 모든 글자를 놓치지 않고 읽으려 노력했습니다.<br>
                        초반에는 무조건 이해가 밑바탕인 것이 가장가장가장 중요한 것 같습니다.<br>
                        이해가 되어야 빠르게 외워지고 문제에서 함정을 파놓아도 걸려들지 않더라구요.<br>
                        저는 또 개인적으로 한번 헷갈린 내용은 아무리 반복해도 저도 모르게 헷갈려서 처음에 충분히 읽고 이해한 뒤 추후에 외우는 것이 기초를 탄탄히 이룰 수 있는 방법이라고 생각합니다.<br>
                        모두모두 알고 계시겠지만 공부법에서는 특별한 방법보다는 깊이있는 이해의 중요성을 알고 반복적으로 읽고 이해하는 것이 필요하다는 것을 다시 한번 전해드리고 싶어요.<br>
                        <br>
                        ★"민쌤 교재가 있었기에 할 수 있었던 체계적인 기출분석"<br>
                        저는 민쌤의 강의를 들으며 체계적인 기출분석을 할 수 있었어요.<br>
                        비슷한 내용끼리 묶여 있어 유형별로 분석이 가능하기 때문에 반복적으로 비슷한 유형을 년도별로 다룰 수 있어 좋았고 유형별로 묶여 있었기에 반복할 수 있어 유형 이해가 빨랐습니다.<br>
                        또한 기출 빈도가 되어있는 표가 있어서 언제 출제 되었는지. <br>
                        올해 또 출제 가능성이 있는지 등을 한눈에 살필 수 있어 더 좋았어요. <br>
                        기출 분석은 혼자 먼저 풀어본 뒤 강의를 듣고 견고화했고 이해가 되지 않는 부부은 이해가 될 때 까지 곱씹었습니다.<br>
                        <br>
                        ★“스터디와 열품타 적극 활용”<br>
                        저는 스스로 공부하고자 하는 동기를 지속적으로 갖기 위해서 열품타와 스터디를 적극 활용했습니다.<br>
                        스터디는 일주일단위로 체계적인 형식으로 진행되는 스터디를 5명의 선생님들과 함께 진행했어요.<br>
                        예를 들어 월ㅡ금 고시문,법,해설서 문제만들어 올리기(5명이 돌아가면서 올리고 스터디원들이 풀어서 인증)/토ㅡ논술(인증 및 앞사람을 뒷사람이 첨삭하는 시스템) 으로 하는 스터디를 했습니다. <br>
                        매일하는 스터디를 통해 저는 공부의 체계를 잡을 수 있었고 선생님들과 생각을 나누면서 더 깊이 있는 공부와 꾸준한 공부가 가능했어요.<br>
                        논술도 첨삭을 해드리고 첨삭을 받으면서 빈틈을 지속적으로 메꾸는 공부를 할 수 있었습니다.<br>
                        그 밖에도 기출문제를 분석해서 답안을 써서 올리는 스터디를 통해 각자가 문제를 이해하고 답지를 쓰는 형식을 공유하며 서술형을 잘 쓰는 방법을 알게되기도 하고 문제이해헤도 도움이 되었습니다.<br>
                        9월 중순쯤 부터는 카톡으로 하는 청킹 스터디를 하면서 잘 안외워지는 것들을 청킹하고 공유하면서 재미있고 확실하게 이론을 외울 수 있었어요.<br>
                        <br>
                        열품타는 8월쯤부터 우연히 알게 되어서 시작하게 되었습니다.<br>
                        하루하루 제가 공부한 하루 총 공부시간을 스탑워치로 재며 공부했는데 열품타를 알게 된 후부터는 같이 체크를 했습니다.<br>
                        코로나라서 다른 사람들과 소통이 거의 없었기 때문에 열품타를 하면서 마치 같은 독서실에서 사람들과 선의의 경쟁을 하는 것처럼 생각이 들어서 더 열심히 할 수 있었어요.<br>
                        또한 시간이 쌓이면서 점차 순위가 앞으로 가면 쉬려고 하다가도 조금 더 하자 하는 마음이 들기도 하더라구요! 좋은 동기 부여가 되어준 것 같습니다:)<br>
                        <br>
                        ★“청.킹 YEEEEAH!!! - 청킹스터디”<br>
                        위에서 말씀 드렸듯이 9월에 총암기에 더욱 박차를 가할 때에는 정말 외워도 외워도 헷갈리는 것들을 위해 청킹스터디를 했습니다.<br>
                        다른 선생님들께서 만든 청킹이 재미있어서 빠르게 외워지기도 했고 저 또한 만들면서 금방 외워지기도 했어요 예를 들면 역사교육을외우기 위해서 ‘(역)시,변인(통제안되는)생리’..(여성분들 왕공감이죠..?^^:) 와 같은 식으로 만들어서 외우니 잘 까먹지 않더라구요. <br>
                        그림을 그리기도 했는데 그렇게 하니까 이미지와 함꼐 더 시너지 효과가 컸습니다.<br>
                        예를 들어 놀이의 특성 8가지를 외울 때
                        앞글자를 따서 내/긍/비/과/자/외/유/적 으로 따니까
                        내긍비 라는 과자라고 하면 되겠다 생각을 해서 과자
                        봉지를 그렸어요<br>
                        세계시민 교육을 앞글자 따서 함/평/소/세/(지)/다 이렇게 외우고 귀여운 소세지를 그리기도 했습니다.<br>
                        청킹을 다양하게 사용하시면 구조화 이미지화하며 외우기 정말 좋은 것 같아요^^<br>
                        <br>
                        ★“화장실 시간까지 다 써버리기!!-틈새시간 활용하기”<br>
                        화장실 벽에 투명한 파일을 붙여놓고 이론을 공부하다가 정리한 내용들, 잘 안외워지는 내용들을 에이포 용지에 정리하여 끼워두고 틈틈이 외웠습니다.<br>
                        작은 자투리 시간이지만 공부 환경과 다른 환경이어서 그런지 더 잘 인식되었고 잘 외워지지 않는 것들을 외울 때 효과적이었어요!<br>
                        <br>
                        ★“포스트 잇 활용 암기”<br>
                        잘 외워지지 않는 것은 포스트잇을 사용하기도 했습니다.<br>
                        그날 모르는 것을 쫙 모아서 써두고 그날 공부 마지막 시간이나 공부가 잘 되지 않을 때 산책하며 외웠어요!<br>
                        옷장이나 벽에 붙여놓고 눈길이 가는대로 보니까 그것도 암기에 도움이 되었던 것 같습니다:)<br>
                        <br>
                        ★“웹지도 적극활용하기. 문제풀이를 씹고 뜯고 맛보고 즐기기...”<br>
                        제가 하루에 한 번씩 울게 했던 그 문제풀이.. 민쌤의 문제풀이는 명성이 자자하죠? 하하<br>
                        문제의 질이 좋아서 명성이 자자하고... 문제의 양이 많아서 명성이 자자 합니다...<br>
                        한 파트에 최소 60개 이상문제를 주시고 한 문제당 소문항이 꽤 있기 때문에 거의 최소 120문제를 푸는 셈이 됩니다. <br>
                        저는 문제 풀이를 풀고 강의를 듣고 틀린문제를 지우고 또 풀고 하면서 맞을 때까지 풀었어요. 최소 3번정도씩은 돌린 것 같습니다. <br>
                        이 때 가장 많이 성장한 것 같아요. <br>
                        문제를 보는 눈이 생기고 키워드 하나에 답이 왔다 갔다 하는 문제들의 갈피를 잡을 수 있는 힘을 가질 수 있게된 것 같습니다. <br>
                        빈 칸 넣기도 같이 제공해주시기 때문에 문제 풀이 전 이론을 한번 더 싹 정리할 수도 있었어요.<br>
                        민쌤의 센스는 어디까지인가...사랑합니다!! 또한 웹지도를 보면서 관련 문제들을 함께 붙여서 계속 함꼐 보았어요.<br>
                        웹지도는구조화가 잘 되어있는 장점도 있지만 관련 기출 문제가 이론 근처에 함께 첨부되어 있는 아주 좋은 구성으로 되어있죠! <br>
                        저는 문제풀이와 모의 고사에서 본 문제도 관련 문제를 이렇게 붙여두고 내가 왜 틀렸었는지 생각의 회로를 계속 고치려고 노력했습니다.<br>
                        <br>
                        ★“졸릴 때 이겨내기 핵꿀아이템 -  분무기,스텐딩책상,나대신 인형재우기, 짧게 낮잠자기!!!”<br>
                        저는 카페인에 강해서 커피를 물먹듯이 먹었기 때문에 다른 방법들을 많이 동원했어요!<br>
                        * 낮잠 - 졸릴 정말 장사 없죠.. <br>
                        졸리면 공부는 공부대로 안되고 그렇다고 잠을 자버리면 괜히 자책을 하게 되기도 했습니다.<br>
                        그러나 어쨌든 졸려서 공부를 못할 바에는 차라리 잠을 자는게 훨씬 효율적이고 필요한 일이라고 생각합니다. <br>
                        잠깐의 낮잠은 공부 효율을 높여주니까요! 그래서 저는 15분 정도씩 시간을 설정하고 낮잠을 짧게 자면서 잠을 깨웠습니다.<br>
                        코로나로 인해 스터디 카페에서도 마스트를 써야 했기 때문에 그렇지 않아도 많은 사람들로 인해 갑갑한 스터디 카페에서 마스트까지 하면서 몇 배로 졸음이 왔던 것 같아요.<br>
                        그러나 그런 현실을 불평하기 보다는 그 상황에서 어떻게 가장 효율적으로 시간을 쓸 수 있을까. 내 몸을 적응 시킬 수 있을까 하고 생각했던 것 같습니다.<br>
                        * 얼굴에 분무기 뿌리기 - 낮잠을 자도 졸릴 때는 세수를 하고 오거나 분무기에 물을 담아 두었다가 얼굴에 막 뿌렸습니다........은근히 도움이 되더라구요.<br>
                        피부도 좋아져요ㅋㅋ 미스트 안되고 분무기여야 얼굴에 좀 더 물살이 느껴져서 잠이 확 깨어나는 효과가 있어요.<br>
                        다이소에서 천원이면 귀여운 작은 분무기 구입하실 수 있습니다.<br>
                        * 스텐딩책상 -  스터디 카페 사장님께서 센스있게 스텐딩 책상을 들여놔주셔서 너무 졸릴 땐 이곳에서 서서 공부를 하기도 했습니다.<br>
                        고3때 생각나고 좋더라구요 헤헤.<br>
                        이것마저도 안통하면 그냥 5분정도 바깥에 나갔다 오거나 필요한 문구류를 사거나 편의점에서 사야할 것들을 사러 다녀왔어요
                        * 나대신 인형재우기 -  이게 무슨말인가 하셨을 것 같네요. <br>
                        9월에 코로나가 더 심해지면서 스터디 카페에 2주 정도 못가게 되었고 강제 집공이 시작되었습니다.<br>
                        이때 책상과 프린터기 2단 독서대 등을 사서 아예 공부장소를 꾸렸습니다.<br>
                        앞으로 코로나로 인해 쭉 못갈 것 같았거든요<br>
                        이 때는 혼자이기 때문에 잠에서 더 헤어나오기 어려운 때도 있었습니다.<br>
                        침대가 근처에 있으니 유혹이 더 강한 법이니까요.. <br>
                        그래서 저는 저의 친구(?) 대형 곰인형을 대신 침대에 눕혀놓았어요. <br>
                        곰인형 배에 “그 점수에 잠이 오냐, 내년에 또할거면 치우고 자라”그런 매우 자극적인 문구를 붙여서 대신 눕혀두니까 홀리듯이 침대에 갔다가도 다시 책상에 앉을 수 있었습니다.<br>
                        참 지금 생각하면 이상해보이지만... 어떻게서든 하루하루 잘 해내고 싶은 마음에 발버둥을 쳤던 것 같아요.<br>
                        이렇게라도 잠을 이겨내면 이런 내 자신이 뿌듯해지기도하고 더 열심히 해보자 하는 생각도 들었습니다.<br>
                        <br>
                        ★ “총론과 법은 매일매일”- 4월부터 총론은 조금씩 꾸준히 외웠고 8월부터는 아침5시 기상하면 총론과 놀이이해 실행자료 외운 것들부터 타이핑으로 백지쓰기를 하였습니다.<br>
                            올해는 고시문이 많이 나오지 않았지만 2022부터는 더 많이 나오지 않을까 하는 생각이 드네요. <br>
                            법도 매일 문제 만드는 스터디를 꾸준히 해와서 그것만 진행하였고 문제풀이반 때 민쌤이 주시는 법 빈칸넣기 자료보았습니다.
                            꾸준히가 중요한 것 같아요.<br>
                            <br>
                        #part 2- 멘탈관리<br>
                        ★ “스터디 플래너와 드림 노트쓰기”<br>
                        <br>
                        *스터디 플래너 - 저는 매일 스터디 플래너와 간단한 일기를 썼어요. 성격이 꼼꼼한 편이라 예쁘게 쓰기 시작하면 예쁘게 쓰느라 시간을 다 버리더라구요.<br> 
                        오늘 어떤 공부를 할지 쓰고 지워가면서 성취감을 느끼는 것이 멘탈관리에도 도움이 되었습니다. <br>
                        억지로 많은 것을 하려하기 보다는 내가 할 수 있는 만큼 설정하고 완료한 내 자신을 칭찬해주었어요. <br>
                        그곳에 하루 총 공부 시간도 적어 어제보다 한뼘 더 성장한 나 자신을 칭찬했습니다.<br>
                        <br>
                        *드림노트쓰기 -  그런 말이 있죠. 꿈은 아주 명확하게 꿔야 한다고. 저는 이 말을 정말 믿었고 지금은 더욱 확신하고 있습니다. 
                        너무 우울하고 힘들 때 유투브를 자주 보았는데 이지영 선생님 영상을 보다가 이지영 선생님이 꿈을 뚜렷하고 꿔야한다고 이루고 싶은 사진을 꼭 붙여두고 매일 꿈꿔보라고 하시더라구요.<br>
                        그래서 저도 드림노트를 하나 만들어서 공부가 안될 때마다 썼던 것 같아요.<br>
                        합격하면 가장 하고 싶은 일들도 쓰고, 합격을 꿈꾸며 내 마음을 쓰기도 하고, 합격후 아이들을 만나면 이런 것들 해봐야지 하며 쓰기도 하고. 그 노트에 맨 앞에는 이렇게 써놓았어요. <br>
                        “이 노트에 쓰는 모든 것들이 다 이루어질 것이다.”그리고 합격자 분들이 올려주신 합격증과 합격창 등을 받아서 제 이름과 제 사진을 넣어서 만들고 드림노트 맨 첫장과 제 방 벽에 붙여놓고 매일 보았습니다.<br> 
                        그렇게 자기 암시를 했던 것 같아요. <br>
                        합격할거라고 할 수 있다고.<br>
                        그런데 이제와서 드림노트를 보니까 제가 썼던 것들을 거의 다 이뤘더라구요. <br>
                        참 신기하게. 매순간 힘이 되어 줄 거에요. 꼭 하나 만드셔서 해보시길 추천합니다.<br>
                        <br>
                        “나는 나니까. 남과 비교 금지 제발 금지!!”<br>
                        가장 자신이 힘들고 바보 같을 때가 언제였는지 생각해보면 남과 비교할 때였던 것 같아요.<br>
                        ‘다른 사람들 공부할 때 나는 낮잠 자버렸네. <br>
                        다른 사람이 나보다 더 공부했네. <br>
                        점수가 더 높네. <br>
                        나중에 나만 떨어지면 어떡하지’하는 생각들이 원하지 않아도 자신을 마구 괴롭힙니다.<br>
                        생각해보면 공부하기 힘들 때보다 더 힘들었던 게 바로 이렇게 남과 나를 비교할 때 였던 것 같아요.<br>
                        어느 순간 그걸 알고 나니까 안그래도 힘든 나인데 굳이 이렇게 남과 비교를 하면서 더 힘들 필요가 있나.<br>
                        너무 바보같은 행동이다 라는 것을 깨닫게 되었고 그 때부터는 남들이 아닌 더욱 나에게 집중했습니다. <br>
                        어제 몰랐던 문제를 알게 된 나. 오늘 목표치를 잘 해낸 나. 매일 한뼘 더 성장하고 있는 노력하고 있는 나에게 많이 칭찬해주고 격려해주시는 하루하루를 보내셨으면 좋겠습니다.<br>
                        <br>
                        “현명한 유튜브사용으로 힐링!”<br>
                        유튜브에 빠지면 물론 위험합니다. <br>
                        시간가는 줄 모르고 나도 모르게 오랫동안 하게 되기 때문인데요.<br>
                        그래서 저는 시간을 정하거나 볼 영상을 정하고 너무 힘들 때 졸릴 때 식사할 때 휴식시간 등에 유투브로 마음을 많이 달랬습니다.<br>
                        비긴어게인 영상을 보면서 나에게 힘을 주는 노래를 듣기도 하고 이지영 선생님이나 이운규 변호사님의 영상을 보며 공부법을 알아보기도 했고. 다양한 합격자 선생님들의 기출문제 분석 영상 등을 밥먹을 때도 보면서 먹었습니다.<br>
                        그러면 열심히 하고 있는 내가 느껴져서 힐링이 되기도 하고, 몰랐던 문제를 알게되서 좋기도 합니다. <br>
                        비긴어게인 영상 중에 ‘지오디의 길, 러브홀릭- butterfly’ 부르는 영상 가장 많이 봤던 것 같습니다.<br>
                        울컥하고 진짜 열심히하자. 하는 마음이 용기를 주고 힐링되게 해주더라구요!<br>
                        놀이기구 영상 그런거 보면서 대리만족도 한 것 같아요.<br>
                        <br>
                        #part 3- 건강관리, 다이어트 두 마리 토끼를 한번에! (feat.꼭 내방에서 혼자만 가능^^:)<br>
                        <br>
                        *실내사이클 -  저는 민쌤 강의를 1.4 정도로 2번 돌려보았기 때문에 처음은 앉아서 집중해서 듣고 2번째 들을 때는 실내 사이클을 타면서 들었습니다. <br>
                        저는 이해가 안된 부분만 더 집중적으로 들을 목적이었기 때문에 가능했고 운동과 공부가 동시에 되는 효과가 있었지만 사람마다 호불호가 갈리는 방법일 것 같네요! <br>
                        그렇지만 실내사이클로 건강과 다이어트를 한번에 잡을 수 있답니다!<br> 
                        엑사티더의 사이클 중에 아이패드를 올려놓을 수 있는 받침이 있는 사이클이 있어요 저는 이 사이클을 원래부터 타고 있었기 때문에 활용하였습니다.<br>
                        <br>
                        *인강들으며 스쿼트하기 -  이 또한 2번째 강의를 듣거나 복습용으로 강의를 돌릴 때 사용한 방법입니다.<br>
                        수험생은 허리가 중요하기 때문에 하체 운동이 필수인데요. <br>
                        스쿼트는 상체를 세우고 하기 때문에 강의를 볼 수 있고 전신운동이 되기 떄문에 더욱 좋았습니다. <br>
                        사이드로 스퀴즈 동작 등 상체를 세우는 동작 중에 응용해서 하기도 했습니다.<br>
                        <br>
                        시작부터 두려웠던 임용을 웃으며 시작할 수 있었고, 이렇게 합격으로 행복하게 끝내라 수 있었던 것은 단연 민쌤과 함께했기 때문이라고 자신있게 말할 수 있을 것 같습니다!<br>
                        언제나 수강생들의 말 한마디 한마디에 귀 기울여 주시는 민쌤의 진심이 담긴 강의가
                        항상 너무나 와닿아서 감사함에 울고 웃으며 행복하게 수험생활 할 수 있었습니다.<br>
                        진심으로 감사드립니다...! <br>
                        스승의 날에 편지와 그림선물 보내드리면서 편지에 꼭 합격해서 찾아뵙겠다고 했는데 이렇게 합격했지만 뵈러 갈 수가 없다는 게 너무너무 슬프네요... <br>
                        부디 민쌤...! 얼른 쾌차하세요 기도하고 기도하겠습니다!<br>
                        그리고 이 글 보실지 모르겠지만 꼭 다시 강의 시작하시면 그때라도 찾아뵐게요!!<br>
                        너무너무 소중한 민쌤!! 사랑합니다!!!!!!:)
                    </div>
                </div> 
            </div> 
        </div>

        <div id="popup21" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>   
            <div class="content">         
                <div class="memoirs NSK">
                    <div class="memoirstitle"><span><strong>음악</strong> 전북 합격수기입니다!!</span> <span>R=**</span></div>
                    <div>
                        안녕하세요! 이번에 전북지역 합격한 수강생입니다 ><<br>
                        이번 시험이 두번째 치는 시험이었구요! 학부생때는 1차에 탈락했고, 졸업 한 뒤 1년간 공부하여 최종합격이라는 결과를 얻었네요!<br>
                        공부하면서도 이렇게 하는게 맞나? 정말 합격할 수 있을까? 하는 마음이 항상 있었기 때문에, 
                        제가 쓴 수기가 이제 새롭게 시작하는 수강생들께 도움이 될 지는 모르겠지만 간략하게나마 적어봅니다! ^^<br>
                        <br>
                        <br>
                        전공<br>
                        저는 애나쌤 1년 패키지를 직강으로 들었는데요, 정말 인강과 직강의 집중도는 확실히 다른 것 같아요!<br>
                        인강은 속도를 빠르게해서 듣는 경우가 많아서 뭔가 한귀로 듣고 한귀로 흘리는 느낌이 있었는데, 직강으로 들으니 놓친부분이 있더라도 선생님과 눈을 맞추며 상호작용 했던 것들이 정말 많은 도움이 됐습니다.<br>
                        초반에는 애나쌤이 굉장히 강조하셨던 마인드맵을 저도 알마인드로 만들어 공부했는데요, 
                        확실히 마인드맵을 만들면서 구조화하는 능력이 습득되었어요! 전 계획을 짜서 공부하는 스타일도 아닐 뿐더러 서브노트를 만드는 건 나에게는 불가능이다..! 라는 생각이 있을 정도로 구조화능력이 없어요,, 애나쌤 덕분에 전공의 방대한 공부들을 차곡차곡 쌓아나갈 수 있었던 것 같습니다. <br>
                        수업 중간중간에 질문 던지시고 대답을 유도하실때, 내 입으로 직접 말을 뱉어보면서 얻어간 지식들도 참 많았어요! 도서관에서 혼자 공부할 때도 어떠한 내용을 보면, 그 내용을 애나쌤이 어떠한 표정으로 설명하셨었는지 상황이 스쳐가면서 인출되는 내용들도 정말 큰 도움이 되었습니다. <br>
                        초수때는 개론서를 무작정 펴놓고 모르는 부분을 외우는 식으로 공부했었는데, 그러다 보니 다음날 다 까먹고 도로 리셋이 되더라구요 ㅠㅜ,, 더군다나 시대적 흐름이 중요한 서양음악사에서 흐름을 생각하지 않고 그냥 외우다보니 마구 섞이고 대혼란이었어요.<br>
                        저에게는 애나쌤의 수업방식이 참 잘 맞았던 것 같습니다. <br>
                        거시적으로 살펴본 후 줌 인 하여 미시적으로 공부하고, 또다시 줌아웃을 하여 큰 구조를 파악하는 것이 효과적이었어요!<br>
                        저는 앞에서도 말씀드렸듯이 계획성이 정말 1도 없어서 애나쌤이 진행하시는 커리큘럼대로 따라가기만 했습니다!<br>
                        전공스터디도 하면 참 좋지만 거의,, 안했던 것 같아요,,ㅋㅋㅋㅋㅋㅋ<br>
                        스파르타캠프도 참여 했었는데, 다른 쌤들과도 친해지고 서로 으쌰으쌰해서 공부하는게 참 의지도 많이 되고 좋았습니다!<br>
                        제한시간을 정해놓고 두명이 짝을 지어서 종음셋내용을 서로 외우고 인출하니까 적당히 긴장감도 생기고 암기도 더욱 잘 되었어요.<br>  
                        몸은 힘들었지만 ㅠㅠㅜㅜ 종음셋 전체를 싹 돌렸다는 안도감이 컸습니다!! <br>
                        <br>
                        <br>
                        수업실연 (1대1코칭)<br>
                        저는 수업실연을 따로 스터디를 구하지 않고 애나쌤과 함께하는 1대1코칭으로만 준비했습니다...! <br>
                        애나쌤이 주셨던 지도안들은 처음에 보고 정말 ,, 이걸 내가 수업할 수 있을까? 하는 생각이 들 정도로 어려웠어요,,
                        조건도 많았고, 대중음악과 국악을 연계한 수업이나 현대음악, 재즈 등 익숙치 않은 내용들이 많아서 어떤 지도안을 선택할지 
                        정말 고민을 많이 했던 것 같습니다,, 이 때 수업을 어떻게 구상해야 할지에 대한 고민을 많이 하게되어 좋았던 것 같아요!! 
                        수업실연을 할 때 다른 쌤들도 참관할 수 있어서 정말 떨렸습니다. <br>
                        쉅이 끝나고 나면 애나쌤의 강력한 피드백과 참관한 쌤들의 피드백도 받을 수 있어서 나의 장점과 고칠점들을 쉽게 파악할 수 있었어요!<br>
                        수업실연 준비할 때 중요한 것은 교과서분석을 하면서 어떻게 가르칠지를 빠르게 구상하는 것이라고 생각해요!<br>
                        저는 교과서분석을 너무 대충해서 시험직전에 쌤한테 왕창 혼났지만,,,ㅠ <br>
                        그리고 1대1코칭만으로는 불안하신 분들은 스터디를 구해서 많이 연습해보면 좋을 것 같아요!<br>
                        시험장에서는 정말 떨리기 때문에 처음에 구상한대로 못할 확률이 많아요,,<br>
                        제 생각에 전북은 수업실연 변별이 크게 없는 듯 합니다.. 정말 못했는데 1.07점만 깎였네요ㅋㅋㅋㅋ<br>
                    </div>
                </div> 
            </div> 
        </div>

        <div id="popup22" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>   
            <div class="content">         
                <div class="memoirs NSK">
                    <div class="memoirstitle"><span><strong>전공음악</strong> 2021 서울 음악 초수 합격수기 </span> <span>전가*</span></div>
                    <div>
                        안녕하세요. <br>
                        합격수기를 쓸 수 있어 너무 행복하네요.<br>
                        어마어마한 꿀팁은 아니지만,<br>
                        처음 공부할 때 몰랐던 것이 너무 많던 저를 떠올리며 누군가에게 도움이 될까 싶어 글을 작성합니다.<br>
                        <br>
                        저는 국악과 피리전공입니다. <br>
                        학부 교직이수로 졸업을 한 후 임용을 시작했습니다.<br>
                        <br>
                        - 1차 -<br>
                        저는 교육학은 2월말, 전공은 3월 중순부터 강의를 듣기 시작했습니다. <br>
                        하루라도 빨리 강의를 결제했어야 하는데 임용을 할지말지 고민하다가 전공은 좀 늦게 시작했네요.<br>
                        일단 늦게 시작하기는 했지만, 저는 1-2월 강의부터 1년 커리를 다 들어야한다고 생각했습니다. <br>
                        1-2월 강의를 3월부터 빠른속도로 급하게 듣다보니 놓치는 부분도 많았던거 같지만, 그래도 전범위를 짧게 훑고나서 심화를 듣는 것이 효과적이라고 판단되어 이렇게 진행했습니다.<br>
                        5월말, 6월에 되서야 진도를 겨우 따라잡았습니다.<br>
                        3-7월달까지는 인강, 직강을 계획한대로 밀리지 않고, 마인드맵을 작성하는 것을 복습으로 생각하고 공부했습니다. <br>
                        마인드맵을 만들어놓고 너무 인출을 안하고 넘어가는게 마음에 걸렸지만, 저는 강의를 밀리지 않는게 더 중요하다고 생각하여 이렇게 진행했습니다.<br>
                        일주일에 6일은 거의 풀로 공부하고 남은 하루는 반나절 테니스+반나절 데이트를 하면서 쉬었습니다.<br>
                        일요일에 쉬고나면 월요일에 마음이 급해져서 더 열심히 공부했기 때문에 하루를 쉬는 것이 체력적으로도 정신적으로도 좋았습니다.<br>
                        <br>
                        저는 교육학은 따로 스터디를 하지 않고, 전공만 친구와 짝스터디를 했습니다. <br>
                        중1때부터 가장 친한 친구와 스터디를 하여 중간에 좀 헤이해지지 않을까 걱정도 했는데, 오히려 서로 편하게 질문하고 일정을 조율할 수 있어 스트레스 받지 않아 좋았습니다. 굳이 여러명이서 대면으로 스터디를 하는 것보다 마음 맞는 사람과 짝스터디로 전화 또는 줌 스터디를 하는게 효율성, 정신건강에 좋은 것 같습니다.<br>
                        <br>
                        < 전 공 ><br>
                        전공은 다이애나쌤 1년패키지를 끊었습니다.<br>
                        사실 처음 1-2월달 강의를 들을때는 제가 늦게 시작하여 몰아서 들었기 때문에 마인드맵을 따로 만들지 못했습니다.<br>
                        3월 심화강의때부터 종음셋 외에 한줄정리 등 자료가 많아지면서 애나쌤이 항상 강조하시는 단권화의 중요성을 깨닫고, 마인드맵에 모든 내용을 적기 시작했습니다.<br>
                        종음셋, 한줄정리, 모고, 기출, 개론서 등 모든 자료를 한 곳에 정리하여 구조화 시킨 것이 방대한 공부양을 소화하는데 큰 도움이 되었다고 생각합니다.<br>
                        3-6월 심화강의때는 진도를 따라가기 급급했지만 7-8월 기출을 공부하며 나왔던, 또는 나올만한 주제를 체크하기 시작했습니다. <br>
                        기출된 부분은 제 마인드맵에 모두 표시를 해놓았는데, 반복해서 기출되는 것을 보고 기출의 중요성을 깨달았습니다.<br>
                        <br>
                        마지막 모의고사반때는 멘탈이 무너졌습니다. <br>
                        처음 본 모의고사 점수가 20점?30점 대였거든요ㅠㅠ 덕분에 더 정신을 차리고 열심히 공부하는 계기가 되었습니다.<br>
                        많이 외웠다고 생각했는데, 생각보다 암기가 많이 부족했습니다.<br>
                        다쌤의 모의고사 문제가 타 강사님들의 문제보다 훨씬 복잡한 거 같은데, 쌤께서 여러 영역에서 끌어와 한문제를 만드시기 때문에, 더 여러영역의 공부가 이루어져 좋았습니다.<br>
                        저는 국악기 피리전공이라 국악을 암기할때 더 편했지만 반대로 의문도 많았습니다. <br>
                        국악 자체가 실기와 이론이 다른 부분이 원래 많기도 하고, 책마다 말이 달라 혼란스러웠는데, 너무 깊은 부분까지 파고들다 보니 지쳤던 거 같아요.<br>
                        여기저기서 말이 다른 부분은 시험으로 출제될 가능성이 적다고 생각하고 넘기는 요령도 필요하다고 생각합니다.<br>
                        오히려 서양음악은 아는게 더 없다보니 의문도 적고 그냥 다 외우려 노력해서 괜찮았습니다.<br>
                        <br>
                        + 지금와서 생각해보니 전공공부 암기한 시간은 1차를 앞둔 파이널1-2달 안에 다 암기한 거 같습니다.<br>
                        이때는 무아지경으로 그냥 책을 머리에 다 넣었는데, 이게 가능하려면 이 전까지 모든 내용의 이해가 완료되어야 합니다.<br>
                        너무 인출과 암기에 집착하지 말고 깊게 이해를 한 후에 암기하는 것은 마지막 1-2달에도 충분히 가능합니다.<br>
                        <br>
                        + 지역선택<br>
                        저는 모의고사 점수를 보고 충격을 받아 서울 외 경기, 부산 지역까지 놓고 고민하기 시작했습니다.<br>
                        너무 고민되어서 다쌤과 상담한 것이 큰 도움이 되었습니다.<br>
                        쌤께서는 어차피 서울, 경기 1차 커트라인이 크게 차이나지 않을 것이니 서울을 쓰라고 용기를 주셨는데 실제로 1점밖에 차이가 나지 않았습니다.<br>
                        또한, 초수이기도 하고, 원래 가고 싶었던 지역을 써야 공부, 연습하는 동기가 더 올라갈 것이라고 조언해주셨습니다.<br>
                        서울을 쓰라고 격려해주셔서 감사합니다 쌤ㅠㅠ<br>
                        <br>
                        <1차 점수><br>
                        1차 점수는 87점으로 컷+1이었습니다.<br>
                        처음에는 2차를 볼 수 있는 기회가 주어진 것만으로도 감사했는데, 점수에 여유가 없다보니 점점 불안하더라구요ㅠㅠ 2차는 미리미리 3월부터 꾸준히 준비하세요 여러분....<br>
                        <br>
                        - 2 차-<br>
                        <실기><br>
                        1. 청음<br>
                        - 4/4박자였고, 템포는 정말 빠르지도 느리지도 않은 적당한 템포였습니다.<br>
                            저는 느리게 나오면 오히려 박자세는게 어려운데 느리다고 느껴지지는 않아서 좋았습니다.<br>
                        - 평소에 시창청음 레슨을 많이 제가 하러 다녔고, 청음은 정말 자신이 있었습니다.<br>
                            보통 처음에 1-8마디 들려줄때 거의다 미리 작성을 항상 했었는데, 너무 긴장을 해서 1-8마디까지 모든 음정, 박자를 다 썼는데 마지막에 한박이 남더라구요...<br>
                            너무 놀래서 그냥 싹 다 얼른 지우고 괜찮다고 계속 주문을 걸면서 다행히 잘 다 썼습니다.<br>
                        - 저한테는 난이도가 크게 높지는 않았는데, 어려웠다고 하시는 분들도 많아서 작년보다는 확실히 난이도가 더 있었구나 라고 느꼈습니다. <br>
                            임시표가 딱히 많지는 않았는데, 박자가 조금 까다로운 부분이 군데군데 있었습니다.<br>
                            <br>
                        2. 시창<br>
                        - 시창을 묵독하려고 딱 악보를 폈는데, 일단 1-8마디까지 정말 빈 공간없이 리듬이 거의 없이 빽빽하게 다 쪼개져있더라구요.<br>
                            당황했지만 차분하게 읽으려 했는데도 음정도 어려워서 많이 당황했습니다.<br>
                        - 시창은 첫음정, 끝음정을 피아노로 쳐줍니다.<br>
                        - 6도 등 뛰는 음정도 몇군데 있었고, 임시표도 꽤 많았던걸로 기억합니다.<br>
                        - 제가 연습했던 그 어떤 모의고사보다 어려웠습니다. <br>
                            저와 시창청음 실력이 비슷한 친구가 작년에 서울합격을 했었는데, 시창청음이 정말 쉬워서 걱정안해도 된다고 했는데, 시창은 난이도가 많이 어려워진듯 합니다. 시창청음에 자신있는 분들도 너무 자만하지 말고 연습 철저히 하셔야 될 듯 해요.<br>
                            <br>
                        3. 양악가창<br>
                        - 저는 강건너 b4개 조를 뽑았습니다. (강건너, 첫사랑, 민중의합창)<br>
                        - 피아노 반주가 가장 자신이 없었는데, 3곡다 나올만한 곡이어서 다행이었습니다. <br>
                            작년의 소녀와 같은 대중음악이 나올까바 걱정했거든요ㅠㅠ<br>
                        - 저는 시험전 서울예고 앞 연습실을 빌려 1시간동안 목과 손을 풀고 들어갔는데, 이때 강건너를 한 2번정도 친게 도움이 많이 되었습니다.<br>
                        <br>
                        + 2차 결과후 범주범창에 대해 느낀 점은 피아노 반주는 화려하지 않아도 된다는 점입니다.<br>
                        저는 반주가 틀리는 것보다는 단순화하여 실수를 최소화시키고 노래에 집중했습니다.<br>
                        피아노에 너무 스트레스 받지 마시고 노래를 더 연습하는 방향이 좋을 거 같아용!<br>
                        <br>
                        4. 국악가창<br>
                        - 저는 흥보를 뽑았습니다. (흥보가 돈쌀 덜어내는 대목, 보렴, 판소리 한마당 벌려보자)<br>
                        - 사실 국악전공이라 자신있었는데, 보렴과 판소리 한마당 벌려보자를 뽑았다면 더 제 역량을 보여줄 수 있었을 텐데 아쉬웠습니다.<br>
                        - 시험장에 들어가면 장구와 앉은보면대가 있는데 저는 제가 편한대로 장구와 보면대 위치를 조절하여 편하게 연주했습니다.<br>
                        <br>
                        <수업실연><br>
                        - 론도형식 주제가 나왔습니다. 계속 국악과 서양이 함께 나왔는데, 상대적으로 이번년도 주제는 심플했네요.<br>
                        - 도입: 전시학습 확인( 론도형식의 주제 그림으로 표현하기, 리듬론도 악보제시)<br>
                        - 전개1: 론도형식 창작하기 (자료로 A부분 가락카드 4마디로 제시/ 학생들은 B, C창작)<br>
                        - 전개2: 악곡의 구조와 연주형태 분석하기(자료 및 유의사항에 플립드러닝을 활용하라는 조건이 있었습니다)<br>
                            (시험당시 2곡다 모르는 곡이었습니다ㅠㅠ헝.... 그냥 아는척하면서 설명했는데, 틀렸네요... 그래도 많은 분들이 몰랐던 거 같아서 스스로 위로중입니다...)<br>
                        - 제 면접관님들은 제 수업실연을 정말 정성들여 열심히 들어주셨습니다. <br>
                            제가 말할때마다 고개도 계속 끄덕여주시고, 감동적이었네요.<br>
                            <br>
                        <면접><br>
                        - 면접은 평소 스터디 때도 막힘없이 잘해왔고, 항상 5분정도 시간을 남겼습니다.<br>
                            시험당시에는 다 대답하고 나니 3분이 남았네요.<br>
                        - 면접 또한 면접관 3분이 고개를 많이 끄덕여주시고, 잘 들어주셔서 좋았습니다.<br>
                        - 면접 시험 복기는 다른 곳에서 많이 돌아다녀 생략하겠습니다.<br>
                        <br>
                        + 복장 고민이 저도 정말 많았습니다. <br>
                        저는 하얀색 탑에 검은색 치마 투피스 정장을 입고 갔습니다. <br>
                        위에 자켓은 허리주름이 잡히고 펴지는 자켓으로 다른사람과 똑같지 않되 발랄해 보이려 노력했습니다.<br>
                        다른 분들은 원피스부터 바지정장까지 다양했습니다.<br>
                        그냥 본인에게 가장 잘 어울리고, 머리만 단정하게 잘 묶으시면 될 거 같아요.<br>
                        <br>
                        <2차 결과><br>
                        - 총 167.58 (최종컷+4)로 합격했습니다.<br>
                            1차 점수가 낮더라도 음악은 확실히 실기비중이 크기 때문에 충분히 뒤집을 수 있다고 생각해요!<br>
                            2차 마지막날까지 하나하나 신경써주신 다이애나쌤께 감사드립니다ㅠㅠ<br>
                            <br>
                        쌤 덕분에 초수로 붙을 수 있었어요!<br>
                        <br>
                        긴 글 읽어주셔서 감사하고, 이 글 읽으시는 모두 올 해 합격하시기를 기도할게요 :)
                    </div>
                </div> 
            </div> 
        </div>

        <div id="popup23" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>   
            <div class="content">         
                <div class="memoirs NSK">
                    <div class="memoirstitle"><span><strong>일반사회</strong> 윌비스 일반사회 허역팀 강의를 수강하고 합격하였습니다. </span> <span>유소*</span></div>
                    <div>
                        이번 2022학년도 중등 임용고시 일반사회 과목에서 고득점으로 1차에 합격한 학생입니다.<br>
                        학부때부터 허역팀 강의를 들으며 공부했으며, 지금까지 일반사회 허역팀 강의를 수강하며 느꼈던 점들과
                        또 예비 수강생분들께 도움이 될만한 과목별 간단한 팁을 포함해 수강후기를 작성하고자 합니다.<br>
                        <br>
                        1. 사회과 교육론<br>
                        가장 양은 적지만 가장 많은 문제가 출제되기 때문에 꼼꼼한 공부가 필요합니다.<br>
                        웅재 선생님께서 출제 가능성이 높은 부분을 해당 강의 시간마다 짚어주시며, 그 부분은 최대한 암기하는게 좋습니다.<br>
                        교육론이 암기를 요구하는 부분이 많기 때문에 힘들게 느껴질 수도 있지만 키워드 중심으로라도 최대한 꼼꼼히 암기해두는 것이 중요합니다.<br>
                        또한 차모책의 모든 부분을 정독하려고 하는 것보다는 웅재쌤이 짚어주는 부분을 조금이라도 더 완벽하게 이해하는 것이 중요합니다.<br>
                        <br>
                        2. 정치<br>
                        정치는 교육론처럼 자잘자잘한 암기보다는 전반적인 배경을 이해하면서 공부하는 것이 중요합니다.<br>
                        예를 들어 특정한 제도의 장점과 단점을 기계적으로 무작정 암기하는 것 보다는 왜 그러한 장점과 단점이 나타나게 되었는지도
                        이해하는 것이 중요합니다. 이러한 이해가 선행된다면 모르는 문제가 나왔을때도 당황하지 않고 대응하는데 도움이 될 것입니다.<br>
                        현중쌤께서 늘 모든 개념을 설명하시기에 앞서 큰 틀에서 그러한 개념이 등장하게 된 이유를 스토리텔링 형식으로 풀어서
                        쉽게 설명해주시기 때문에 처음보는 낯선 개념을 이해하는데도 큰 어려움이 없다고 생각합니다.<br>
                        한편 정치는 출제빈도가 높은 단원들이 정해져 있기 때문에 해당 단원들을 우선순위로 두고 내용을 꼼꼼하게 숙지해야 합니다.<br>
                        <br>
                        3. 법<br>
                        법은 내용과 암기량이 가장 많은 과목입니다.<br>
                        다양한 영역에서 문제가 출제되기 때문에 다른 과목에 비해 양도, 복습하는 시간도 두배 이상 걸립니다.<br>
                        물론 모든 내용을 다 가져가겠다는 생각은 위험하며, 너무 깊은 내용은 일부 스킵하는 것을 추천드립니다.<br>
                        내용의 깊이를 걸러내는 부분은 수업를 진행하며 인홍쌤이 적절하게 선별해주시기 때문에 걱정하지 않으셔도 됩니다.<br>
                        하지만 최근 경향이 헌법, 민법, 형법 이외에도 소송법이나 기타법 등에서도 꾸준히 출제되고 있기 때문에
                        모든 단원을 놓치지 말고 모두 공부해야 할 필요는 있다고 생각합니다.<br>
                        <br>
                        4. 사회문화<br>
                        사회문화는 법 다음으로 암기해야 할 것이 많습니다.<br>
                        특히 사회조사 방법론 파트에서 원리의 이해를 요구하는 문제가 출제될 가능성이 높기 때문에
                        해당파트를 공부함에 있어서 정치 공부법을 활용하시는 것이 좋다고 생각합니다.<br>
                        즉 표집의 종류를 무작정 외우는 것보다는 표집 방법들이 그러한 특징을 갖는 이유가 무엇인지에 대해서도 설명할 수 있어야 합니다.<br>
                        방법론 이외의 다른 파트들은 웅재쌤이 짚어주는 부분들만 꼼꼼히 암기한다면 충분히 대비할 수 있습니다.<br>
                        <br>
                        5. 경제<br>
                        경제는 무조건인 암기가 아닌 내용 이해로 다가가야 합니다.<br>
                        허역 선생님께서 학생들의 이해를 위해 여러 범위를 다뤄주시니 끝까지 완주하겠다는 생각으로 강의를 수강하면 됩니다.<br>
                        개념의 양은 많으나 암기의 필요성은 적기 때문에 갈수록 학습 부담은 적어집니다. 모든 과목이 그러하겠지만 경제는 처음이 매우 힘들다고 생각합니다.<br>
                        그렇지만 그 고비만 넘긴다면 수월해지니 처음 산을 넘을 때까지만 기본기를 다진다는 생각으로 차근차근 나아가면 됩니다.<br>
                        <br>
                        지금까지 제가 약 일 년 넘게 일반사회 허역팀 강의를 들으며 느꼈던 것을 짧게나마 글로 적어보았습니다.<br>
                        <br>
                        누군가 저의 '1차 고득점 비결이 무엇이냐' 묻는다면 '허역팀 강의'라고 자신있게 말할 것 같습니다.<br>
                        그정도로 일반사회팀 선생님들을 전폭적으로 믿고 강의를 수강했으며, 선생님들께서 추천해주시는 방법대로 공부하려 했습니다.<br>
                        <br>
                        만약 전공 1차 공부가 막막하다면, 주변에 누군가의 도움없이 혼자 공부를 해야하는 상황이라면,
                        방대한 전공 내용 중 대체 무엇이 중요한지 모르겠다면 허역팀 강의 수강하시는것을 추천드립니다.<br>
                        <br>
                        처음 공부를 시작할 때에는 막막하기도 하겠지만 시간이 지남에 따라
                        4인4색반, 최종 모의고사 강의를 수강할때 즈음에는 여러 과목별 중요 내용을 자연스럽게 인출하실거라 믿습니다.<br>
                        <br>
                        이상으로 제가 강의를 들으면서 느꼈던 수강후기를 마치도록 하겠습니다.<br>
                        강의를 수강하기에 앞서 참고하시는용 정도로 읽어주시길 바라며, 많은 분들께 도움이 되기를 바랍니다.<br>
                        <br>
                        늘 양질의 강의를 제공해주시는 허역팀 선생님들께도 감사함을 전합니다!
                    </div>
                </div> 
            </div> 
        </div>

        <div id="popup24" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>   
            <div class="content">         
                <div class="memoirs NSK">
                    <div class="memoirstitle"><span><strong>전기전자</strong> 서울 전기전자통신 합격 수기</span> <span>이소*</span></div>
                    <div>
                        안녕하세요. 서울 전기전자통신 합격생입니다.<br>
                        제 글이 여러분에게 도움이 되길 바랍니다.<br>
                        저는 임용과 관련된 전공 수업을 거의 듣지 못하고 임용 준비를 시작한 '임알못' 상태였습니다.<br>
                        그래서 처음 임용 준비를 시작할 때 어떻게 해야 막막했는데 검색을 통해서 최우영 교수님을 추천하는 글을 보고 1년 패키지를 신청했습니다.<br>
                        교수님은 정말 모든 전공을 A 부터 Z 까지 다 알려주시며 판서는 한국사로 비유하자면 큰별쌤 같은 느낌 입니다.<br>
                        상세히 설명해주시는 만큼 이해를 하는 데 있어 더 도움이 되었던 것 같습니다.  <br>
                        또한 1년 커리큘럼이 잘 짜여져 있기 때문에 저 같은 '임알못' 상태여도 수업을 그대로 따라가면 전공은 걱정 없을 것 입니다.    <br>
                        저는 수업이 없는 날엔 수업 시간에 했던 필기를 정리하며 복습을 하였고, 후에는 그 필기를 토대로 목차를 만들어 저만의 전공 페이퍼를 만들었습니다.  <br>
                        이러한 과정은 제가 전공을 계속적으로 복습할 수 있게 해주었고 그 덕분에 전공 내용을 두루두루 기억하며 시험을 보았던 것 같습니다.  <br>
                        단원 별 문제 풀이 수업을 할 때 쓰는 책은 3번 정도 풀었던 것 같습니다.<br>
                        반복해서 풀면 풀이와 답을 외워버릴 것 같다는 생각을 하시겠지만 생각보다 그렇지 않습니다.  <br>
                        문제는 볼 때마다 새로운 느낌이었고, 그래서 그런 지 새로운 방법으로 문제를 풀게 되었던 것 같습니다.<br>
                        참고로 다양한 방법으로 문제를 푸는 건 좋습니다. <br>
                        실제 시험을 볼 때 다른 방법으로 접근해서 검토 하는 것이 좋기 때문 입니다.  <br>
                        기출 문제도 마찬가지 입니다. <br>
                        저도 기출 문제 계속 풀면서 같은 문제 여러 번 보는 것이 좋은 것인가에 대해 생각을 했는데 실제 시험을 보았을 때 이미 기출 문제를 보면서 시험지에 대한 느낌에 적응을 했는 지 시험을 보는 데 있어 부담을 느끼지 않았고 또한 문제도 익숙한 느낌을 받아 편하게 시험을 보았던 것 같습니다.<br>    
                        8월 까지는 일주일에 3번 정도는 운동을 했습니다. 따로 어딜 다녀서 운동을 한 것은 아니고 스쿼드 100번 (유투브에 검색하시면 10가지 유형의 스쿼트를 10번 하는 영상이 있습니다.)를 하는 등의 운동을 했습니다. <br>
                        공부를 하다보면 몸이 굳어지고 먹는 것을 소홀히 하게 되므로 몸 상태가 생각보다 빨리 그리고 많이 망가지게 되는 것을 느낄 수 있을 것 입니다.<br> 
                        저도 공부를 했던 1년 사이가 그 전에 제가 살아온 세월 보다 더 폭삭 늙은 느낌을 받았습니다.<br>
                        또한 공부를 하면서 드는 온갖 불안과 걱정으로 인해 집중이 안 될 때 운동을 하였습니다. <br>
                        운동을 하다보면 운동에 집중을 하기 때문에 제가 했던 생각들을 제 3자의 시각으로 바라 보게 됩니다. <br>
                        그러면 그 생각이 얼마나 쓸모 없는 생각인지를 알 수 있게 됩니다.<br>
                    </div>
                </div> 
            </div> 
        </div>

        <div id="popup25" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>   
            <div class="content">         
                <div class="memoirs NSK">
                    <div class="memoirstitle"><span><strong>중국어</strong> 2020학년도 경기 3등 합격!!</span> <span>조미*</span></div>
                    <div>
                        초수 때는 학원에서 나가는 것만 보면서 외우는 것에 집중했습니다.<br>
                        유월화 책에서 교수님께서 중요하다고 하신 부분을 메모리카드에 옮겨 적고 오고가면서 보며 외웠습니다.<br>
                        문법이 어렵다는 생각이 들어서 3-6월에 유월화책을 볼 때 누적해서 복습하며 외운 것을 까먹지 않았는지를 확인했습니다.<br>
                        예를 들어 동사를 배울 때 명사, 수량사를 간단히 라도 훑고 공부하는 식으로 그전에 했던 부분을 눈으로라도 익혔습니다.<br>
                        이렇게 공부하니 8월쯤 어법이 어느 정도 잡혔다고 생각이 들었습니다.<br>
                        그래서 9-11월에 쓰면서 공부하는 것을 적게 하였는데 시험장에 가니 잘 쓰여지지 않아서 당황스러웠습니다.<br>
                        재수 때는 쓰는 것이 확실히 중요하다는 것을 느끼고 공부할 때 무조건 쓰면서 했습니다.<br>
                        재수 때 개인적으로 노복파책을 1회독 하고 유월화책만 봐도 된다고 느껴서 유월화책을 봤습니다.<br>
                        초수 때보다 난점석의를 계속 반복해서 돌리면서 번호만 보고 쓸 수 있는지 여부를 계속 확인하였습니다.<br>
                        그리고 9-11월까지도 쓰기를 놓지 않고 아는 문제도 더 정교하게 쓰려고 노력했습니다.<br>
                        노복파책을 제외하고 학원진도를 따라가며 공부했습니다.<br>
                        퀴즈퀴즈 중국어로 새로운 오문장을 보고 적응하는 연습을 했습니다. <br>
                        한국어로 답안이 나와있지만 중요한 오문장은 중국어로 답을 쓰는 연습을 하고 궁금한 표현은 교수님께 질문을 하여 해결했습니다.<br>
                        <br>

                        + 서론<br>
                        서론은 7-8월부터 자세하게 보기 시작했습니다. <br>
                        써봐야 하는 부분은 써보며 공부하고 나머지 부분도 꼼꼼하게 읽어봤습니다.<br>
                        외우고 나서는 반복해서 백지쓰기를 하면서 원서의 표현과 확인하며 공부했습니다.<br>
                        + 어휘<br>
                        초수 때는 주로 눈으로 공부하면서 내용을 외우는 것에 집중하였습니다.<br>
                        하지만 재수 때는 손으로 쓰면서 공부하고 1회독 한 후에는 백지쓰기를 하면서 부족한 부분을 채워나가는 방식으로 공부했습니다.<br>
                        큰 목차를 먼저 적고 그 밑에 세부 항목을 채워나가는 방식으로 백지쓰기를 하였습니다. <br>
                        초반에는 중요한 부분만 중국어로 외우고 예시를 꼼꼼하게 봤는데 하반기에는 사소한 표현까지도 원서의 표현을 익혀 사용하려고 노력했습니다.<br>
                        + 어음<br>
                        처음에 공부할 때는 어려웠지만 한번 이해하고 나면 쉬운 파트가 어음파트였습니다. <br>
                        어음파트 역시 현대한어 그대로의 표현을 익히고 답지에 쓰려고 노력했습니다.<br>
                        + 문자<br>
                        초수 때는 문자 파트를 소홀히 공부했는데 재수 때는 하다 보니 재미있어서 특히 하반기에 자주 봤습니다.<br>
                        저는 오히려 문자파트에서도 나올 수 있는 부분이 많다는 생각에 어떤 문제가 나올 수 있는지를 생각하며 쓰기 연습을 했습니다.<br>
                        문자파트는 백지쓰기로 하면 예시를 꼼꼼하게 볼 수 없을 것 같다는 생각에 반대로 예시를 보면서 내용을 쓰는 연습을 했습니다.<br>
                        + 교육과정<br>
                        교육과정은 계속 미루고 미루다가 7-8월부터 보기 시작했습니다. <br>
                        그냥 진도에 맞춰 눈으로만 읽는 방식으로 공부했습니다.<br>
                        중요한 문장 이외에는 키워드만 중국어 표현을 외우고 한국어로 보면서 이해하는 방식으로 공부했습니다.<br>
                        + 교육론<br>
                        모의고사에 문제가 나오면 교수님께서 해주신 설명을 적어놓고 그것만 봤습니다.<br>
                        명칭 정도만 중국어 표현으로 익히고 나머지 내용은 이해를 중심을 공부했습니다.<br>
                        + 문학사<br>
                        초수 때는 비중이 크지 않은 작가, 작품명까지 다 외우려고 노력했는데 재수 때는 큰 틀을 바탕으로 주요 작가들과 작품들, 키워드 등을 착별자 없이 쓰는 연습을 했습니다. <br>
                        한글 교재를 한번 읽고 백지쓰기를 하면서 부족한 부분을 찾아가며 보완해나갔습니다. <br>
                        문학사맥잡기 특강을 통해서 중간에 한번 정리하며 빠진 부분을 보충할 수 있어서 좋았습니다. <br>
                        메모리카드에 서술형으로 나올만한 내용을 정리해서 오고가며 보고 외웠습니다. <br>
                        시험 날 당일에도 보면서 문학사 서술형 문제에 대비하였습니다. <br>
                        고대, 현당대 문학사 모두 동일한 방식으로 공부했습니다.<br>
                        + 단어<br>
                        초수 때는 습관용어와 100시리즈(교수님께서 찍어주신 단어)만 공부했는데 재수 때는 100시리즈 전체를 좀 더 꼼꼼하게 봤습니다.<br>
                        초수 때는 학원에 오는 날을 활용해서 인출하는 방식으로 스터디를 했는데 재수 때는 밴드를 활용하였습니다.<br>
                        밴드를 활용하니 주중에 매일 외우고 확인해서 하루에 몰아서 확인할 때보다 부담이 적었습니다.<br>
                        습관용어는 단어를 보고 뜻을 중국어로 떠올리거나 중국어 뜻을 보고 단어를 떠올리는 방식으로 밴드를 활용해 매일 양을 정해두고 스터디를 했습니다.<br>
                        + 고대한어작품 <br>
                        초수 때는 문학 작품 독해 자체를 공부할 시간이 부족해서 못했는데 시험문제로 고문이 많이 나와서 당황스러웠습니다.<br>
                        그래서 재수 때는 3-6월 강의를 듣지는 않았지만 진도대로 혼자 고문노트(교수님이 추천해 주신 방법)를 만들어 가며 공부했습니다.<br>
                        고문이 처음에는 어려웠지만 하면 할수록 고문이 해석되는 것이 신기해서 재미있었습니다.<br>
                        고문노트를 만들고 시험전날까지 중요작품 순으로 반복적으로 봤습니다.<br>
                        중요한 문장만 현대한어로 번역하는 연습을 하고 나머지는 내용을 파악하는 방식으로 공부했습니다.<br>
                        + 현대문학작품<br>
                        상대적으로 현대문학작품은 소홀히 공부하여 모의고사를 풀 때 가장 어려운 파트였습니다.<br>
                        3-6월에는 강의를 듣지 않고 모의고사 때 나오는 문제위주로 독해연습을 했습니다.<br>
                        모의고사 문제의 지문은 교수님께서 해설해주실 때 모르는 단어를 적어놓고 혼자 볼 때 가려서 해석이 되는지 여부를 파악하고 주로 답안을 외워서 쓰는 연습을 했습니다.<br>
                        현대문학작품이 문제로 나왔을 때 답안을 쓰면 구사력이 떨어진다고 피드백을 받아서 모범답안자체를 통으로 외우고 외웠는지 여부를 확인하였습니다. <br>
                        하반기에는 중요하다고 생각하는 답안은 메모리카드에 따로 정리해두고 수시로 봤습니다.<br>
                        <br>
                        + 서브노트 <br>
                        서브노트는 어법정도만 하고 어학은 현대한어를 그대로 활용하고 문학사는 전년도 합격자의 서브노트에 필기를 추가하는 형식으로 했습니다.<br>
                        어법은 1-2월에 한글교재를 보면서 품사파트만 서브노트 정리를 하고 7월부터 나머지 부분을 중국어로 서브노트를 만들었습니다.<br>
                        주요 내용을 정리하고 오문장과 답안을 정리하는 형식으로 했습니다.<br>
                        예를 들어 1페이지 결과보어 내용 정리, 2페이지 오문장(중요한 오문장, 자주 틀리는 오문장), 3페이지 오문장 답안 이런 식으로 차례대로 정리하였습니다.<br>
                        서브노트는 계속해서 내용이 추가 되어서 링으로 된 노트로 하는 것이 좋았습니다.<br>
                        초수 때는 서브노트를 많이 활용했는데 재수 때는 주로 교재를 위주로 공부하였습니다.<br>
                        메모리카드를 활용해서 서술형으로 나올만한 문학사, 문학작품문제, 어학을 정리했습니다. <br>
                        그리고 초수 때 서브노트 이외에도 3-6월에 교수님께서 중요하다고 하신 문장들을 정리해서 오고가는 길에 암기했습니다.<br>
                        자주보니 금방 익숙해져서 8월쯤가니 어법 내용이 정리가 되고 답안으로 활용해서 쓸 수 있었습니다.<br>
                        지도서내용을 1과에 1장정도 내용으로 정리해서 후반부에 계속 돌렸습니다. <br>
                        지도서가 두껍다 보니 정리해서 보면 좋을 것 같습니다. <br>
                        그리고 후반부에는 나올만한 내용은 서술형으로 써보는 연습을 했습니다.<br>
                        <br>
                        1차 강좌별(월별) 학습 방법<br>
                        1~2월:<br>
                        1) 마음가짐과 생활<br>
                            초수 때는 수업을 열심히 듣고 복습하는 것에 초점을 두고 시간을 보냈습니다.<br>
                            재수 때는 2차 발표가 난 후 휴식시간을 보냈습니다. <br>
                            저는 스스로 떨어진 이유를 명확하게 알고 있었기 때문에 빠른 시간 내에 멘탈을 회복할 수 있었습니다. <br>
                            2월에는 부담을 갖지 않고 체력을 회복하는 것에 집중했습니다.<br>
                            2월 셋째 주쯤에 짝스터디를 시작하고 스터디 준비만 하고 나머지 시간에는 놀았습니다.<br>
                        2) 이론입문반<br>
                            수요일에 수업이 끝나면 목요일에 그 내용을 다 복습할 수 있도록 공부했습니다.<br>
                            눈으로라도 한번 훑고 나서 간단히 정리를 해가면서 공부했습니다.<br>
                            어법은 서브노트를 간단히 만들기 시작하였습니다.<br>
                            어학은 내용을 이해하는 것에 초점을 두고 공부하고 문학사는 주요 키워드는 중국어로 써보면서 나머지는 그냥 읽으며 공부했습니다.<br>
                            확인테스트를 활용하여 매주 배운 내용을 복습했습니다.<br>
                            저는 공부할 때 누적해서 하는 습관이 있어서 그 전주 내용을 시간이 없으면 확인테스트를 활용해 보고 시간이 있을 경우 빠르게 훑어나가는 방식으로 자주보려고 노력했습니다. <br>
                        3) 독해입문반<br>
                            수업시간에 열심히 들었습니다.<br>
                            처음에는 노트정리도 하고 했는데 점점 이론에 밀려 노트정리는 중간에 멈추고 그냥 내용을 이해하는 방식으로 공부했습니다.<br>
                            작가를 보고 작가에 대한 문학사의 내용을 찾아봤습니다. <br>
                        4) 교육학<br>
                            인강을 들으며 기본서의 내용을 이해하고 복습할 때 중요하다고 해주신 부분을 한번 더 자세히 보는 방식으로 공부했습니다.<br>
                            <br>
                        3~4월:<br>
                        1) 마음가짐과 생활<br>
                            초수 때는 원서내용과 한글교재를 같이 두고 공부했습니다. <br>
                            원서와 한글교재가 거의 동일하다보니 공부할 때 편했기 때문입니다.<br>
                            학원 오는 날은 스터디를 해야 해서 일찍 일어났지만 다른 날에는 충분히 잠을 보충하고 공부했습니다.<br>
                            저는 집에서 계속 공부를 했는데 이동시간이 없다보니 수면시간과 식사시간이 자유롭고 편하게 공부할 수 있었습니다.<br>
                            재수 때는 공부하는 습관을 다시 들이기 위해 3-4월에는 독서실을 다녔습니다. <br>
                            공부를 다시 하려니 앉아있는 것 자체가 너무 힘들어서 일단 초반에는 집중을 못해도 앉아있는 연습을 했습니다.<br>
                            주중에는 학원을 안다니고 짝스터디를 활용해 계획표(스터디 계획표)대로 진도를 나갔습니다.<br>
                            토요반 모의고사를 대비하기 위해 개인적으로 학원 진도에 맞는 내용을 공부했습니다.<br>
                            모의고사를 본 후에 2회정도 문제를 다시 풀어보면서 모범답안 그대로 쓰는 연습을 했습니다.<br>
                            그리고 새로운 표현은 교수님께 질문해가며 수정하고 도전해보는 연습을 했습니다.<br>
                            이 과정을 통해 구사력이 향상될 수 있었습니다.<br>
                            일요일에는 체력적으로 힘들고 쉬어도 된다는 생각에 공부하지 않았습니다. <br>
                        2) 이론심화반(I)<br>
                            학원 오는 날은 1시간 일찍 와서 전주에 배운 내용을 인출하는 방식으로 스터디를 했습니다.<br>
                            예고문답은 다 외워서 쓸 수 있을 때까지 반복해서 쓰는 연습을 했습니다.<br>
                            그리고 학원 진도가 익숙해졌을 때쯤부터는 전주의 예고문답을 다시 써보는 방식으로 누적해서 공부했습니다.<br>
                            원서가 익숙해지고 나서는 원서로 복습하고 원서 표현을 익히는 것을 연습했습니다. <br>
                        3) 교육학<br>
                            초수 때 3-4월 인강은 듣지 않고 짝스터디로 1-2월 진도대로 문제를 출제하고 답안을 작성하는 방식으로 공부했습니다.<br>
                            각자 5문제씩 출제하고 만나서 서로의 문제를 풀어보고 답을 맞춰보고 해당하는 파트(예를 들어 교육평가)의 구조화를 그려서 서로 채점했습니다.<br>
                            그리고 설명하면서 서로 이해한 부분을 점검했습니다. <br>
                            재수 때는 3-6월에 기본서 1회독과 기출문제집 1회독을 목표로 진도를 세우고 공부했습니다. <br>
                            그리고 초수 때 사용한 서브노트에 내용을 추가하면서 단권화를 하려 했습니다.<br>
                            <br>
                        5~6월:<br>
                        1) 마음가짐과 생활<br>
                            초수 때 마음가짐과 생활은 3-4월과 동일.<br>
                            5월에 잠깐 슬럼프가 왔지만 교수님과 상담을 통해 구체적인 방법과 따뜻한 조언을 얻고 나아졌습니다.<br>
                            저는 정신적으로 힘들 때마다 상담을 적극적으로 활용하였습니다.<br>
                            가장 객관적인 수준을 알려주시고 또한 격려를 많이 해주시고 여러 방법들을 알려주시기 때문에 저는 교수님과 상담을 적극 추천합니다!! <br>
                            상담 후 다시 정신무장을 하고 공부할 수 있었어요.<br>
                            쉬고 싶을 때는 그냥 쉬어야 그 다음에 더 열심히 하는 것 같습니다.<br>
                            5-6월에도 역시 일요일에는 공부하지 않았어요.<br>
                            3-6월동안 기본적으로 전체과목을 1회독 하고 어법과 어학은 1.5회독을 하였습니다. <br>
                            (스터디 활용) 0.5회는 중요한 파트를 위주로 봤어요.<br>
                            예를 들어 어법은 보어부분과 把자문, 被자문등을 다시보고 어학은 개인적으로 어렵다고 생각한 어학파트를 다시 봤습니다.<br>
                            재수 때는 정말 쓰기 연습을 많이 했어요. <br>
                            모든 내용을 무조건 쓰면서 연습했습니다. <br>
                            토요반 모의고사를 대비하기 위해 예고문답 역시 꾸준히 외우고 쓰는 연습을 했습니다.<br>
                            저는 완벽하게 쓸 수 있을 때까지 무조건 반복해서 써봤어요.<br>
                            그리고 그래도 부족한 문제는 체크해두고 그 다음날 써보고 모의고사 전날 또 써보고 반복적으로 쓰기연습을 했습니다.<br>
                            모의고사 복습 역시 꾸준히 했습니다. 이번에는 독해도 꾸준히 했어요!<br>
                        4) 교육학<br>
                            초수 때는 5-6월 강의를 인강으로 들었습니다.<br>
                            기출문제를 중심으로 이루어진 강의여서 문제를 먼저 풀어보고 수업을 들었습니다.<br>
                            복습과 해당부분 내용을 기본서로 훑어봤습니다.<br>
                            그리고 스터디에서 구조화를 반복적으로 그리고 서로 채점하는 방법으로 서로의 공부를 확인하였습니다.<br>
                            <br>
                        7~8월:<br>
                        1) 마음가짐과 생활방식<br>
                            초수 때 주마다 봐야하는 자료의 양이 늘어서 적응하는데 힘들었어요.<br>
                            한번씩은 꼼꼼하게 보고 외워야할 내용은 외워서 가려고 했습니다.<br>
                            날씨가 많이 더웠지만 저는 5월쯤 슬럼프가 왔다가 지나갔기 때문에 그냥 시원한 장소를 찾아서 공부하며 시간을 보냈습니다.<br>
                            그동안 봤던 자료를 반복해서 공부하고 새로운 자료는 적었기 때문에 그냥 하던대로 공부했습니다.<br>
                            7,8월 자료의 양에 너무 겁먹을 필요 없는 것 같아요~ 한주한주 지날수록 적응도 되고 보는 속도도 빨라집니다.<br>
                            그래서 첫주에 너무 큰 결심을 하지 말고 할 수 있는 한에서 열심히 하는 것을 추천해드려요! <br>
                            저는 처음에 그래도 두 번씩은 보고 가자 해서 너무 스트레스를 받았던 기억이 있어요.<br>
                            그러면 금방 지치고 자괴감이 들어서 금방 생각을 바꾸고 할 수 있는 만큼만 해가는 방향으로 바꿨습니다.<br>
                            재수 때 작년에 한번 봤던 자료임에도 불구하고 저는 또 적응하는 시간이 필요했어요.<br>
                            확실히 봤던 자료라 금방 익숙해지지만 그래도 익숙함에 속지 않고 무조건 써보면서 공부했습니다.<br>
                            자료 볼 때 스티커(색깔별 동그라미)를 활용해서 표시를 했어요.<br>
                            예를 들어 빨간색은 아주 중요, 파란색은 중요, 노란색은 나중에 다시 봐야하는 항목 등 이런식으로 구분을 해서 다 써보면서 공부했어요.<br>
                            재수할 때는 잠도 잘 만큼 자고 쉴 때는 쉬어가면서 공부했기 때문에 꾸준히 버텨갈 수 있었어요.<br>
                            보통 8시반-9시에 일어나서 9시반-10시정도에 공부를 시작했습니다.<br>
                            그리고 식사시간도 1시간반-2시간 정도로 여유 있게 먹고 소화한 다음에 공부를 다시 시작했어요.<br>
                            하루에 정해놓은 양을 끝내면 휴식시간을 갖고 잠은 12시 전후로 잤습니다.<br>
                            이렇게 공부하니 더 집중도 잘되고 스트레스도 받지 않아서 좋았습니다. <br>
                        2) 이론문풀반 (초수, 재수 동일)<br>
                            수업을 듣기 전 자료를 공부할 때 해당 내용의 원서를 함께 놓고 공부했습니다.<br>
                            자료에 단권화를 한다는 느낌으로 추가해야할 항목은 검은색 펜으로 필기했어요.<br>
                            그리고 보라색 색연필을 사용해서 스스로 중요하다고 생각하는 부분을 표시하며 자료를 읽었습니다.<br>
                            수업을 들을 때는 형광펜과 파란색 펜을 이용해서 필기했어요.<br>
                            그리고 제가 잘 틀리는 항목은 빨간색 펜으로 체크를 했습니다.<br>
                            이러한 방법을 통해 복습할 때 더 효과적으로 자료를 볼 수 있어서 좋았어요.<br>
                            그리고 하늘색 색연필을 활용해서 이해가 안 되는 부분을 따로 체크해두고 자주 읽어봤습니다.<br>
                            이해가 된 후에도 지우지 않고 계속 반복적으로 봤어요.<br>
                            왜냐하면 무조건 자주 많이 봐야 기억도 잘나고 효과가 높다고 생각했기 때문입니다. <br>
                            저는 지워지는 색연필을 추천해드려요!! <br>
                            잘못 체크했을 때 지울 수 있기 때문에 필기 할 때 부담이 없었어요~<br>
                            자료를 볼 때 원서를 봤기 때문에 자료와 함께 원서도 1회독 할 수 있었어요.<br>
                            초수 때는 진짜 눈으로만 체크한다는 느낌으로 원서를 봤고 재수 때는 백지쓰기를 하면서 제가 아는 부분을 인출하고 부족한 부분은 원서를 보고 채워나갔어요. <br>
                            자료만 봐도 충분하지만 저는 개인적으로 원서를 자주 봤어요.<br> 
                            보면서 표현을 익히고 모의고사 답에도 활용하고 배경지식 자체를 확장할 수 있었어요. <br>
                            공부할 때 비중을 두지 않고 전체적으로 다 보는 편이라서 다 꼼꼼하게 봤어요. <br>
                            어법은 유월화책을 위주로 보고 노복파책은 중요한 파트(보어, 특수동사술어문 등)위주로 봤어요.<br>
                            어학은 현대한어를 주로 보고 자료를 보며 현대한어에 빠진 부분을 체크하고 현대한어에 필기했습니다.<br>
                            (어학은 서브노트가 없고 현대한어 책 자체에 정리했습니다)<br>
                            그리고 메모리카드를 적극적으로 활용했습니다. <br>
                            어학, 어법 중 서술형으로 나올만한 내용을 정리해서 오고가면서 보고 써보는 연습을 했습니다.<br>
                            원서를 많이 보는 것도 좋지만 정갈하게 답안을 쓰는 연습도 필요하기 때문에 써봐야 할 항목을 따로 정해서 매일 연습했습니다.<br>
                        3) 독해문풀반<br>
                            독해 자료는 아무리 오래 보고 싶어도 이론 하다보면 목요일에만 하게 되었어요.<br>
                            초수 때는 문학작품은 그냥 눈으로만 보고 주로 문학사 위주로 공부했습니다.<br>
                            그리고 단어는 잘 외워갔어요.<br>
                            재수 때는 3-6월에 고문노트를 정리했기 때문에 제가 정리한 노트 위주로 보고 자료에 있는 부분은 추가해서 봤습니다.<br>
                            고문에서 중요하다고 해주신 문장은 현대한어로 번역해보고 나머지 부분은 내용이해정도만 했습니다.<br>
                            현대문학 작품은 해당 주차의 진도대로 3-6월 책에서 작품을 찾아서 쭉 읽어봤습니다.<br>
                            꾸준히 하지는 못했지만 노란색 단어장에서 문학작품 단어를 외우고 작품을 보니 더 수월하게 독해가 되어 좋았습니다.<br>
                            하지만 시간이 없어서 2-3주정도 하고 포기했습니다.<br>
                            문학작품들을 먼저 하고 문학사를 하니 상대적으로 시간이 적어서 자료의 내용을 읽어보는 정도로 밖에 하지 못했습니다.<br>
                            단어들은 짝스터디로 따로 진도를 맞춰 나가고 있었기 때문에 독해 사전자료의 단어는 목요일 밤이나 금요일에 학원을 가는 시간을 통해 외웠습니다. <br>
                        4) 80점모의고사<br>
                            답을 최대한 문제에서 요구하는 대로 쓰는 연습을 했습니다.<br>
                            모의고사를 풀 때 25분정도는 초안식으로 문제지에 답안을 구상하고 나머지 시간에 답지에 답안을 써내려갔습니다.<br>
                            어려운 문제는 답안을 비워두고 일단 아는 문제를 풀었습니다.<br>
                            그러면 남는 시간에 좀 더 고민할 수 있어서 좋았습니다.<br>
                            한문제씩 풀면서 답안을 적는 방법과 먼저 문제를 풀고 답을 옮겨 적는 방식 등 다양한 시도를 해보시고 최대한 자신에게 맞는 방법을 사용하면 좋을 것 같습니다!! <br>
                            토요반 수업과 지난주 답지의 피드백을 열심히 듣고 개인적인 질문을 마치고 나면 녹초가 돼서 집에 가는 순간부터 일요일까지는 그냥 쭉 휴식시간을 가졌습니다.<br> 
                        5) 교육학<br>
                            초수 때는 강의를 듣지 않고 스터디원과 함께 교육학 전 범위를 1회독하였습니다.<br>
                            범위를 정해서 공부해온 후 서로 질문을 하며 공부한 정도를 확인했습니다.<br>
                            재수 때는 직강(문제풀이반)을 들으며 월요일, 화요일 5시까지는 교육학 공부를 했습니다.<br>
                            수업을 듣고 복습을 하고 스터디를 위해 진도를 정해 전범위를 복습했습니다.<br>
                            <br>
                        9~10월:<br>
                        1) 마음가짐과 생활방식<br>
                            초수 때 9-10월이 될수록 긴장도 되고 지치기 시작했습니다.<br>
                            그래서 스트레스를 덜 받기 위해서 스스로 부담을 최대한 적게 느끼려고 노력했습니다.<br>
                            계속 ‘할 수 있다’라는 자기암시를 하면서 공부에만 집중했습니다.<br>
                            오히려 공부를 덜하면 더 불안해진다는 것을 알고 좀 더 집중했습니다.<br>
                            조금씩 빨리 일어나고 늦게 자면서 공부시간을 늘렸습니다.<br>
                            재수 때 뽑는 인원이 작년보다 확 줄어서 불안했지만 그냥 무시하고 공부를 하려고 노력했습니다.<br>
                            그래서 원서도 당일에 써서 제출하고 고민할 시간을 줄였습니다.<br>
                            계획을 좀 더 작은 단위로 세워서 동그라미를 치며 성취감을 느꼈습니다.<br>
                            아침에 일어나는 시간을 8시로 당기고 식사시간을 1시간으로 해서 공부하는 시간을 늘렸습니다.<br>
                            그리고 일요일에 저녁을 먹고 전날 풀어본 모의고사를 복습하고 교육학 스터디를 준비하였습니다.<br>
                            일요일만큼은 낮잠도 자고 예능도 보면서 일주일의 스트레스를 풀고 긴장을 풀려고 노력했습니다. <br>
                        2) 핵심원문 총정리&하프모고반 (초수 재수 동일)<br>
                            수요일의 모의고사는 토요일 모의고사보다 평이하기 때문에 답안을 빠르고 정확하게 쓰는 연습을 했습니다. <br>
                            핵심원문 총정리는 영역별로 진행되기 때문에 7-8월 자료를 따로 계획을 세워서 돌렸습니다.<br>
                            수요일 모의고사는 목요일에 바로 복습을 하고 그 다음 주 월요일에 다시 한 번 복습을 했습니다.<br>
                            복습할 때 다시 한 번 풀어보고 모범답안과 비교해보고 수업의 필기를 다시 살펴봤습니다.<br>
                            해설 강의를 듣고 나면 이미 답을 알지만 아는 것을 더 깔끔하고 가독성 있게 쓰기 위해 반복적으로 쓰는 연습을 했습니다.<br>
                        3) 도약모의고사<br>
                            9월부터는 심화문제가 본격적으로 나오기 시작해서 더 긴장감 있게 시험연습을 할 수 있었어요.<br>
                            지금 연습을 해야 시험장에서 어려운 문제가 나와도 덜 당황하기 때문에 어려워도 최대한 아는 대로 답을 쓰는 연습을 했습니다.<br>
                            시간 조절을 위해 모의고사 시험지에 시작시간과 끝나는 시간을 기록하면서 5-10분정도 남기고 마무리하려고 노력했어요.
                            근데 거의 딱 맞춰서 풀었던 때가 많았던 것 같아요.<br>
                            그래도 의식적으로 일찍 풀려고 노력하는 자체가 중요하다고 생각합니다! 모의고사 문제 옆에 스티커(색깔별 동그라미)를 붙여서 9-11월 동안 계속 돌렸어요.<br>
                            3-8월 문제는 표시해둔 문제만 풀고 9-11월 문제는 모든 문제를 계속 해서 풀었습니다. <br>
                        4) 교육학<br>
                            직강을 들으며 시간 맞춰서 모의고사를 푸는 연습을 했어요.<br>
                            월, 화에만 했었는데 9월부터는 매일 1시간 30분씩 했어요.<br>
                            9월에 1회독 하고 10-11월에는 3회독 했어요.<br>
                            초반에 교육학을 열심히 하지 못해서 후반부에 너무 불안했어요.<br>
                            그래도 모의고사를 풀면서 모르는 문제가 나와도 지금 몰라서 다행이라고 생각하면서 최대한 긍정적으로 생각하려고 노력했습니다.<br>
                        11월(실전모의고사):<br>
                        1) 마음가짐과 생활방식<br>
                            초수 때는 너무 긴장하고 또한 점점 시험 날이 다가올수록 점수 때문에 압박을 많이 받았어요.<br>
                            실력이 느는 것 같지 않고 정체된 것 같아서 너무 불안했습니다.<br>
                            그래도 교수님께서 피드백해주실 때 계속 격려해주셔서 힘을 내서 마무리하려고 노력했어요.<br>
                            재수 때는 조금 더 초연해진 것 같습니다.<br>
                            떨릴수록 더 써보며 공부하려고 했어요.<br>
                            초수 때 후반부로 갈수록 쓰기를 줄이고 눈으로 많은 내용을 보려고 해서 시험장 가서 막상 답을 알아도 쓸 때 너무 힘들었어요.<br>
                            그 때의 상황을 반복하지 않기 위해 무조건 다 써봤습니다.<br>
                            쓰면서 해야 착별자도 확인할 수 있고, 결국 어떻게 쓰는지가 점수에 반영되기 때문에 무조건 쓰면서 하는 것을 추천합니다!!
                            11월부터는 컨디션 조절도 중요해요.<br>
                            독감주사도 미리 맞고 따뜻하게 입고 다녔어요.<br>
                            토요일에는 수업 후 집에 가서 휴식하고 일요일은 늦잠을 자서 체력을 유지했어요. <br>
                            일요일에는 주로 주중에 못한 계획을 마무리하고 다한 경우 휴식 시간을 가졌습니다. <br>
                        2) 교육학<br>
                            11월에는 월요일 하루만 수업이 있어서 자습하는 시간이 늘어났습니다.<br>
                            스터디원과 밴드를 활용해서 문제를 내고 인출하는 방식으로 주 2회 스터디를 진행했습니다.<br>
                            교육학 역시 과목에 상관없이 전체적으로 꼼꼼히 봤습니다.<br>
                            그리고 주 2회(월,목) 교육학 모의고사를 실전처럼 9시부터 10시까지 시간을 정해놓고 풀었습니다.<br>
                            실제 시험 보는 시간에 맞춰 교육학을 공부하려고 9-11시까지 시간을 정해놓고 공부했습니다.<br>
                            <br>
                        ** 단기합격을 위하여 꼭 지켜야 할 점<br>
                        <<스스로를 믿고 공부하기>><br>
                        공부하다보면 마음이 많이 지치고 힘들어집니다. <br>
                        이 때 자기 자신을 너무 몰아치면 금방 지치고 오히려 공부에 집중이 안 되는 것 같아요. <br>
                        쉼이 필요한 순간에는 자신만의 방법을 이용해서 적당히 쉬고 충전한 후에 열심히 공부하면 분명 합격할 수 있을 거라고 생각합니다. <br>
                        <br>
                        << 도움이 필요할 때는 교수님께 요청하기 >><br>
                        교수님은 수많은 수험생을 만나보고 또한 가장 잘 수험생의 마음을 이해하고 계세요.<br>
                        힘들 때 혼자 끙끙 앓는 것보다는 교수님과 상담을 통해 현실적이고 구체적인 조언을 얻는다면 금방 털고 일어날 수 있습니다.<br>
                        스터디 상담이나 개인 상담을 통해 공부 방법에 대해 조언을 얻고 더 효과적인 방법으로 공부할 수 있었습니다. <br>
                        그리고 격려도 많이 해주셔서 자신감도 얻을 수 있었어요!! <br>
                        <br>
                        << 쓰면서 공부하기 >><br>
                        눈으로만 하면 다 아는 것 같지만 막상 손으로 쓰려면 어려워요.<br>
                        물론 구사력이 충분하시면 괜찮지만 저는 구사력이 약했기 때문에 쓰면서 공부하고 또한 표현이 맞는지 교수님께 계속 질문하면서 표현을 익혀갔습니다.<br>
                        그리고 쓰면서 연습한 결과물이 성취감을 주기 때문에 동기부여에도 좋았습니다.<br>
                        쓰기만 하면 착별자가 나와도 모르고 지나갈 수 있어요.<br>
                        쓰기만 하는 것이 아니라 꼭 검토를 통해 착별자 여부를 확인하고 문장이 자연스러운지를 검토했습니다.<br>
                        잘 모르겠는 문장은 교수님께 물어보면서 구사력을 높여갔습니다.<br>
                        <br>
                        << N수생 장영희 수업 활용 방법 혹은 유의점 >><br>
                        저는 3-6월에는 고급반 수업만 듣고 7월부터 모든 수업을 들었습니다. <br>
                        혼자 공부할 시간이 필요했기 때문에 3-6월에는 짝스터디를 활용해서 전체내용을 공부했습니다.<br>
                        수업을 들을 때 들었던 내용이지만 최대한 처음 듣을 때의 자세로 집중하며 들었습니다.<br>
                        그리고 의문이 생기는 부분은 수업 끝난 시간을 활용하여 질문했습니다.<br>
                        수업을 들으면서 전체적인 내용을 익히고 자신이 약한 부분을 추가적으로 보완한다면 꼭 합격할 수 있다고 믿습니다!!!!<br>
                        <br>
                        *** 준비생들에게 꼭 해 주고 싶은 말<br>
                        내용이 너무 많지만 미리 겁먹을 필요 없어요~ <br>
                        진도대로 공부하면 어느새 잘 익히고 계실겁니다.<br> 
                        스터디도 적극 활용해서 함께 힘든 점도 나누고 인출하는 연습을 하시면 좋을 것 같아요! <br>
                        스터디원과 함께 서로의 힘이 되어주며 공부해서 덜 힘들고 더 힘내서 공부할 수 있었어요.<br>
                        그리고 교수님이 하라고 하신대로만 해도 충분히 합격하실 수 있을 거예요!<br>
                        저는 진짜 교수님이 하라는 대로 다 했어요. <br>
                        하다가 그만두더라도 꼭 실천해봤습니다.<br>
                        개인마다 필요한 부분을 잘 알려주시기 때문에 피드백을 바탕으로 보완해가면 더 빨리 실력이 향상하실 되실 수 있어요~<br>
                        <br>
                        **** 시험 후 느낀 점<br>
                        임용고시를 준비하면서 힘들기도 했지만 정말 많이 성장했다고 느꼈어요.<br>
                        물론 체력적으로는 많이 지쳤지만 정신적으로는 많이 단단해졌습니다.<br>
                        힘든 순간들이 나중에는 소중한 자산이 될거라 믿으며 공부했어요! <br>
                        최대한 긍정적으로 생각하려고 노력하고 ‘할 수 있다’라고 암시하면서 하시면 분명 좋은 성과가 있을 것입니다.<br>
                        1차 시험을 보면서 매 교시마다 좌절에 빠졌지만 간식을 먹으면서 심지어는 화장실을 가는 순간에도 계속 입으로 ‘할 수 있다’를 중얼거렸습니다.<br>
                        그리고 전 교시에 시험 본 내용이 아른 거렸지만 최대한 무시하고 해당 교시의 시험에 집중하는 것이 중요해요.<br>
                        이미 지나간 것은 지나간 것이고 지금 이 순간에 집중하는 것이 최선입니다!!<br>
                        생각을 금방금방 전환하시면서 체력적으로도 정신적으로도 건강한 수험생활을 하시길 바랍니다~<br>
                        <br>
                        ***** 연간패키지 장점<br>
                        고민하지 않고 공부에만 집중할 수 있어서 좋았습니다.<br>
                        공부할 때 최대한 다른 생각을 하지 않는 것이 중요해요. <br>
                        높은 집중력으로 공부를 해야 빠른 시간 내에 끝낼 수 있고 또 그 시간을 활용해서 다른 공부를 하거나 쉴 수 있기 때문입니다.<br>
                        진도대로 따라가면 자연스럽게 모든 내용을 배울 수 있어서 좋았습니다. <br>
                        재수 때 진도를 따로 세울 때에도 학원 수업의 진도표를 활용했습니다. <br>
                        혼자 계획을 세우면 특정 과목에 치우칠 수도 있기 때문에 그 점을 방지 할 수 있습니다.<br>
                        그리고 1년 내내 교수님과 함께하기 때문에 교수님과 가까워 질 수 있습니다.<br>
                        더 적극적으로 질문을 할 수 있었고 도움을 받을 수 있어서 좋았습니다.   <br>
                    </div>
                </div> 
            </div> 
        </div>

        <div id="popup26" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>   
            <div class="content">         
                <div class="memoirs NSK">
                    <div class="memoirstitle"><span><strong>중국어</strong> 2021학년도 경기 합격! 합격! </span> <span>장선*</span></div>
                    <div>
                        * 1차 영역별 학습 방법<br>
                        어법 <br>
                        - 유월화, 노복파, 난점석의, 퀴즈퀴즈 네 교재를 봤습니다.<br>
                            유월화, 노복파를 보면서 어법 서브노트를 정리해서 후반부에 활용했고, 난점석의는 계속 돌려서 반복적으로 봤고, 퀴즈퀴즈는 퀴즐렛 어플을 활용해 이동 중에 봤습니다.<br>
                        - 유월화를 기본으로 보고, 노복파에서도 너무 새로운 것을 다 취하려하기 보다는 유월화에 비해 설명이 잘 된 부분들을 선택적으로 취했습니다. <br>
                            예를 들어 부사파트가 정리가 잘 되었다고 생각하여 그 부분을 선택적으로 서브노트에 추가했습니다.<br>
                            너무 새로운 것들을 두루두루 보기 보다는 기본적이고 중요하고 또 기출에 나왔던 근거들을 우선적으로 봤습니다.<br>
                        - 난점석의는 1차, 2차 모두 도움이 된다고 생각해서 초반부터 계속적으로 돌리려고 노력했습니다. <br>
                            눈으로 익숙하게 하고, 또 써볼만한 근거들은 따로 체크해서 쓸 수 있는지 점검했습니다.<br>
                        - 퀴즈퀴즈는 퀴즐렛 어플을 활용하여 이동중에 계속해서 오문장을 확인하고 틀리는 것은 별표 표시를 하여 틀렸던 오문장을 모아서 다시 확인했습니다.<br>
                        - 어법 파트마다 주요한 어법점이 있다고 생각하여 이동 중에는 머릿속으로 어법 포인트에 대해서 인출하려고 노력했습니다.<br>
                            예를 들면, ‘형용사 어법점이 뭐가 있지?’ 라고 스스로 질문하고, ‘문장성분에 따라 나누면 비위형용사와 일반형용사, 비위형용사의 특징 4가지...’ 이런식으로 백지쓰기를 머릿속으로 했습니다.<br>
                            막히는 부분은 계속 고민하다가 원서나 서브노트를 찾아봤습니다. 후반부에는 시간을 효율적으로 사용하는게 중요하니 이렇게 머릿속으로 인출하는 연습이 좋았습니다.<br>
                        - 3년 공부를 해서 개인적으로 느낀건.. 어법은 새롭고 다양한 것보다, 기본적인 어법들을 정확히 알고 있고 문제에 맞게 인출해낼 수 있는 것이 중요하다고 생각이 들었습니다.<br>
                            실제로 재수 때에는 더 새로운 어법 내용들을 보려고 했는데 그러다보니 기본이 흔들려서 시험 때 쉬운 어법 문제도 틀렸었습니다.<br>
                            3년차에는 기본적인 어법점을 정확히 알고 쓸 수 있는가를 반복적으로 확인했습니다.<br>
                        어학개론 <br>
                        [서론]  <br>
                        서론 부분은 신경 쓰지 않으면 잘 안 보게 되는 것 같아요.<br>
                        조금은 지루해도 최소 두 번 정도는 정독할 필요가 있다고 생각했어요. <br>
                        또 그중에서도 보통화 정의, 방언에 대해서는 따로 메모리카드에 적어두고 반복적으로 보려고 했습니다.<br>
                        [어휘]<br>
                        어학은 현대한어 교재를 꼼꼼히 보는 게 중요하다고 생각했습니다.<br>
                        뒤에 부록에 나온 예시를 다 외울 필요는 없지만 그래도 부록예시도 필요한 부분은 눈으로는 한번씩 보고 주요한자는 체크했습니다.<br>
                        어휘는 장영희쌤 기본 교재로 한글로 먼저 익히는게 큰 도움이 됩니다.<br>
                        3월에도 원서를 보면서 이해가 잘 안 되는 부분은 한글 교재를 같이 펴놓고 봤습니다.<br>
                        어휘 파트에서 정의, 근거표현들은 따로 체크를 해둬서 반복쓰기를 했습니다.<br>
                        메모리 카드 첫 페이지에 큰제목-소제목-하위제목 등 이렇게 눈에 잘 보이게 마인드맵을 그려서 목차를 한 눈에 파악하게 했습니다.<br>
                        그리고 주요 내용들, 외워야 하거나 쓸 줄 알아야 하는 것들을 메모리카드에 적어 반복해서 봤습니다.<br>
                        초수때 메모리카드를 만들었는데 3년 내내 잘 활용했습니다.<br>
                        이동시에도 가지고 다니며 볼 수 있어 좋습니다.<br>
                        현대한어에 나온 문장들이 실제 기출에 근거표현이 된다고 생각되어 책 표현 그대로 외워 쓰려고 노력했습니다.<br>
                        따로 서브노트를 만들면 누락되는 부분이 생길 수 있어서 ‘현대한어 책이 서브노트다’라는 마음으로 책을 꼼꼼히 보고, 주요내용들만 메모리카드에 적어 이동시에 활용했습니다.<br>
                        [어음]<br>
                        어음은 처음에는 무슨 말인지 생소하고 어렵지만 막상 외우고 나면 공식처럼 사용할 수 있어서 어학개론 중에 제일 좋아했던 파트입니다.<br>
                        어휘와 마찬가지로 현대한어 책에 있는 설명들을 꼼꼼히 읽고 써야하는 부분은 체크해두고 반복하며 쓰고 책 표현을 암기하려 했습니다.<br>
                        외우고 까먹어도... 이 외우는 과정들이 반복되면 어느 순간 외우는 시간이 더 단축되고 잘 기억에 남습니다.<br>
                        기출되었던 부분은 초록색 형광펜으로 체크해두고 쓰기 연습을 했습니다.<br>
                        예전에 한글로 쓰는 기출문제도 언제든지 중국어 문제로 나올 수 있다고 생각하여 체크하고 연습했습니다.<br>
                        모음설위도(?)는 종이에 크게 그려서 방에 붙여놓고, 다른 공부를 하다가도 그림과 각각 음위, 음위변체, 조건 등을 쓸 수 있는지 확인했습니다.<br>
                        어음은 부록의 설명까지도 꼼꼼히 보려고 노력했습니다.<br>
                        현대한어 책을 꼼꼼히 봤다고 생각해도 다시 볼 때마다 눈에 새로 들어오는 내용들이 있기 때문에 반복적으로 읽었습니다.<br>
                        음변 변조에서 3성, 一, 不 관련 쓰는 내용은 중국어 표현을 입으로도 달달달 나오게 암기해서 자동적으로 나올 수 있도록 했습니다.<br>
                        후반부에는 모든 내용을 다 손으로 써볼 시간이 없기 때문에 입으로 말을 할 수 있는지도 확인하고, 막히면 손으로 써보며 확인했습니다.<br>
                        [문자]<br>
                        문자는 개인적으로 정말 어려웠습니다.<br>
                        장영희쌤 기본 한글교재에 그림까지 예시가 잘 되어있기 때문에 후반부에도 한글교재를 찾아보며 공부했습니다.<br> 
                        현대한어 표현과 예시를 기본으로 보고, 모의고사에서 문자파트 부분은 따로 잘라서 서브노트에 옮겨 붙여서 꾸준히 보려고 했습니다.<br>
                        2년차까지는 문자 파트가 어렵고, ‘설마 나오겠어’라는 마음으로 비교적 더 좋아하는 어음 파트를 자주 보았다가 시험때 큰 코 다쳤습니다..<br>
                        어학부분은 ‘설마 나오겠어?’라는 마음이 아니라, ‘모든 것이 다 출제될 수 있다’는 마음 가짐으로 꼼꼼히 보는게 중요한 것 같습니다.<br>
                        <br>
                        3년차에는 서론, 어휘, 어음, 문자 파트를 다 나눠서 어느 것 하나 치중되지 않고 골고루 보려고 노력했습니다.<br>
                        예를 들면 계획을 세울 때, [어휘1(전반부)+어음1],[어휘1(후반부)+어음2]... 이런식으로 9월 이후에는 영역들을 골고루 보려고 노력했습니다.<br>
                        후반부에 어휘를 처음부터 끝까지 다보고, 어음을 보다보면 어휘 부분이 기억이 나지 않기 때문에 섞어가며 골고루 보려고 노력했습니다.<br>
                        물론 다 지켜지지 않는 날이 더 많지만 스스로 의식해서 모든 영역들을 골고루 챙기려는 노력이 필요합니다.<br>
                        <br>
                        교육론<br>
                        * 교육과정 <br>
                        교육과정은 제일 공부하기 어려웠던 부분 같습니다. <br>
                        2년차까지는 스터디에서 계획을 세워 함께 보려고 노력했는데, 3년차에 스터디 없이 혼자 공부하다보니 교육과정을 자주 깜빡했습니다.<br>
                        7,8월 장쌤이 주시는 자료 부분이라도 읽어보려고 노력했습니다. <br>
                        또 모의고사에 나오면 그 때 한번 더 확인하는 식으로 공부했습니다.<br>
                        交际基本表达의 세부 영역은 메모리카드에 써서 이동중에 외웠습니다. <br>
                        큰 목차 5가지, 세부 제목들도 착별자 없이 정확하게 인출하는 연습을 했습니다.<br>
                        또 예시까지 소리내어 읽으며 확인했습니다.<br>
                        * 교육론<br>
                        교육론은 선생님이 수업중에 설명해 주신 부분, 교재를 보며 마인드맵으로 목차를 정리해서 서브노트에 옮겼습니다. <br>
                        큰 제목들을 착별자 없이 인출하는 정도로만 공부했습니다.<br>
                        * 현당대문학사<br>
                        문학사는 장영희쌤 한글 기본서 교재를 활용했습니다. <br>
                        초수에는 한글 교재를 1-2월에만 보고, 3월부터는 원서나 정리한 파일 위주로 봤었습니다.<br>
                        하지만 전체적인 흐름과 주요 내용을 ‘이해’하기 위해서는 꾸준히 한글 교재를 보는게 큰 도움이 된다고 생각합니다.<br>
                        한글 교재를 통해 전체적인 흐름을 잡고 난 후 나눠주신 프린트와 개인적으로 정리한 엑셀 파일을 활용했습니다.<br>
                        기본서 교재를 토대로 정리한 파일입니다. <br>
                        예를 들면 <좌익시기> 시, 소설,산문,극,논쟁 이렇게 분류를 나눴고 해당되는 파, 작가, 작품을 정리했습니다.<br>
                        추가되는 내용은 옆에 추가로 쓰거나 포스트잇을 활용했습니다.<br>
                        후반부에는 한 눈에 문학사 한 시대의 흐름을 확인할 수 있고, 키워드를 쉽게 확인할 수 있어 좋았습니다.<br>
                        저는 제가 만든 문학사 엑셀+7,8월에 장영희쌤이 나눠주시는 문학사 프린트를 엮어서 후반부에는 이 자료 위주로 보고, 부족한 부분은 선택적으로 기본서 교재를 찾아 봤습니다.<br>
                        문학사는 주로 백지쓰기로 공부하였고, 손으로 써보며 특히 착별자가 없는지 꼼꼼히 확인하였습니다.<br>
                        수업 시간에는 장쌤이 반복적으로 설명하시고 판서 할 때는 빈 종이를 꺼내 조금씩 앞서가며 스스로 판서하며 잘 알고 있는지 확인하려고 했습니다.<br>
                        장쌤이 꼼꼼하고 반복적으로 설명해주셔서 문학사 이해가 잘 되지만 스스로 정리하고 백지를 써내려가는 시간이 필요합니다.
                        <br>
                        독해<br>
                        * 현대한어<br>
                        습관용어는 스터디를 통해 꾸준히 반복적으로 했습니다.<br>
                        [초수] 임용을 시작한 그 전 기출에 습관용어가 많이 출제되어서 꾸준히 열심히 했습니다. <br>
                        스터디 원과 습관용어 단어, 뜻을 포스트잇에 적고 뽑아서 말로 인출하기, 아침에 스터디원과 습관용어 내용 읽기 등 꾸준히 연습했습니다.<br>
                        [재수] 스터디원과 나눠서 퀴즐렛 어플에 습관용어20회, 속어교정10회(?)를 홀수, 짝수 나눠서 입력하고 계속 반복적으로 봤습니다.<br>
                        어플을 통해 보면 포스트잇을 만들고 관리하는 번거로움이 없고, 또 이동중에도 볼 수 있어서 좋았습니다.<br>
                        [삼수] 재수 때 만든 퀴즐렛 어플을 활용했습니다. <br>
                        출퇴근시 어플을 통해 단어표현과 뜻을 보고 잘 안외워지는 부분은 별표 표시를 해서 따로 암기했습니다.<br>
                        버스에서는 어플을 눈으로 보거나 속으로 뜻을 말해보거나, 정말 힘든날은 버스에서 자고 가더라고 습관용어 소리가 재생되도록 이어폰을 꽂고 들었습니다.<br>
                        학교에서 쉬는시간에 출근 때 본 습관용어 단어를 백지에 쓰는 연습을 했습니다. <br>
                        눈으로 보고 귀로 듣는 것보다 실제 단어를 쓰면서 착별자가 없는지 점검했습니다.<br>
                        속어교정은 습관용어 만큼 정성껏 보지 못했습니다..<br>
                        <br>
                        숙어<br>
                        숙어는 장쌤이 주신 백시리즈 프린트를 계속 돌려 봤습니다.<br>
                        하루에 1번-20번까지 정해서, 5일 동안 1회독을 하려고 했습니다.<br>
                        2년차 스터디 때 밴드로 번갈아가면서 낸 문제가 있어서 3년차 공부를 할 때에도 그 밴드 문제를 혼자 풀어보았습니다.<br>
                        성어는 유명하고, 한국에서도 비슷하게 쓰이는 것들을 골라서 성어, 뜻 쓰는 연습을 했습니다.<br>
                        길을 가면서도 중국어로 성어 뜻을 입으로 연습했습니다.<br>
                        초수 때 숙어 부분의 문제가 쉬운게 나왔는데 꼼꼼히 보지 않아서 틀린 경험을 토대로... 재수 때부터는 적은 양이라도 꼭 골고루 보려고 노력했습니다.<br>
                        재수 때는 7월 이후부터 스터디원과 밴드로 문제를 내며 공부했고, 삼수 때에도 7월 이후로 스터디 플래너에 숙어 계획을 포함하여 꾸준히 보려고 노력했습니다.<br>
                        어법, 어학 공부를 하다보면 숙어 공부를 소홀히 할 수도 있기 때문에, 저녁 먹고 무조건 숙어 먼저! 이런 식으로 정해놓고 꾸준히 보려고 했습니다.<br>
                        <br>
                        고대한어작품<br>
                        초수 때에는 수업 시간에 고문을 읽어도 어렵고 잘 이해가 되지 않았습니다. <br>
                        2년 차에는 고문노트를 만들라고 하셔서 장쌤이 주신 주요 목차들을 보며 스스로 고문노트를 만들었습니다.<br>
                        바이두에 작품명을 검색하면 ‘작품명, 작가, 작품배경, 고문표현, 백화표현, 단어 해석 등’ 잘 나오기 때문에 바이두를 적극 활용했습니다.<br>
                        또 검색을 하면서 네이버에서 한글로 그 작품 내용을 해석한 글을 읽으며 전체적인 내용을 파악하도록 했습니다.<br>
                        작품에 대한 이해와 배경이해가 있으면 문제를 풀 때 도움이 된다고 생각합니다.<br>
                        고문에 자주 나오는 단어해석은 형광펜으로 표시해두고 외우려고 노력했습니다.<br>
                        후반부로 갈수록 고문에 시간을 많이 쏟기가 어려웠습니다. <br>
                        고문노트도 7,8월까지는 만들어보고 그 뒤로는 시간이 없어서 새로 추가하진 않고 정리한 작품을 봤습니다.<br>
                        그리고 모의고사에 나오는 작품 내용, 단어 표현 위주로 공부했습니다.<br>
                        <br>
                        현대문학작품<br>
                        초수에는 따로 문학 작품을 공부하지 않고 수업 시간에 집중해서 듣고, 작품 내용과 배경을 이해하는 수준이었습니다.<br>
                        재수 때에는 독해의 어려움을 느끼고 장쌤 노란색 단어장(필독단어집)에서 현대문학 단어를 스터디원과 외웠습니다.<br> 
                        이 과정을 후반부에 시작해서 오래하진 못했습니다.. <br>
                        상반기에 현대문학 단어를 외웠으면 좋았을 거 같습니다. <br>
                        단어를 외우면서 어려웠지만 다른 작품에도 반복적으로 나오는 단어가 있기도 하고, 확실히 단어를 외우니 문학작품 독해가 수월해졌습니다.<br>
                        <br>
                        서브노트 <br>
                        서브노트정리는 어떻게 했는지요?(월별 영역별 어떤식으로 했는지요)<br>
                        저는 주로 어법 서브노트를 열심히 만들었고, 서브노트 외에도 기본교재(한글책, 원서)를 옆에 두고 같이 공부하는 것을 추천합니다.<br>
                        [어법] <br>
                        유월화 원서 기반으로 서브노트를 만들었고, 노복파, 난점석의, 모의고사 근거 등을 계속적으로 추가했습니다. <br>
                                초수 때 만들고 재수 때 보충하여서 삼수 때까지 계속 사용했습니다.<br>
                                서브노트를 만들어서 후반부에 편히 봤지만 계속해서 원서를 사전 찾듯이 찾아가며 함께 봤습니다.<br>
                                서브노트를 정리할 때 어법내용에서 기출된 부분은 초록색 형광펜으로 체크해두었고, 파트 앞 부분에 기출 내용 문장을 적어두었습니다.<br>
                                어법은 기출 된 부분이 또 나올 수 있다고 생각하였고, 이렇게 정리하니 어떤 파트가 빈출되었는지 알 수 있어 좋았습니다. <br>
                                후반부에 서브노트만 돌리지 말고 유월화를 눈도장 찍듯이 보면서 서브노트에는 없지만 기본적인 내용들도 확인하려 했습니다.<br>
                                모의고사 문제에서 해당 파트의 문제를 잘라 붙였습니다.<br>
                                예를 들어 모의고사 동사파트 문제를 서브노트 동사 파트 뒷 부분에 붙여서 해당 부분을 공부하고 관련 문제를 풀어볼 수 있도록 했습니다.<br>
                        [어학] <br>
                        어학은 현대한어 책을 사용했고 따로 서브노트는 만들지 않았습니다. <br>
                                주요 내용을 메모리 카드에 정리해서 이동시에 유용하게 사용했습니다.<br>
                                초수 때 만든 메모리 카드를 계속해서 사용했습니다.<br>
                        [문학사] <br>
                        초수, 재수 때 엑셀 파일로 문학사를 만들고 계속해서 수기로 추가했습니다.<br>
                                    한 눈에 보기 쉽게 엑셀 파일로 만들었기 때문에 누락된 부분은 선생님이 나눠주시는 프린트, 기본서 교재, 모의고사 답지에 해설 내용 등을 추가적으로 함께 봤습니다.<br>
                                    <br>
                        장영희 수업 활용 방법 혹은 유의점<br>
                        - 상호작용, 판서, 시선, 속도 등을 복합적으로 피드백 해주십니다.<br> 
                        종이에 적은 것을 찍어 보내주시거나 녹음해서 보내주셔서 정확히 파악하는데 도움이 됩니다. <br>
                        장쌤이 피드백 해주신 것을 우선적으로 고치려고 노력하다보면 어느새 수업 실연이 많이 향상되어 있습니다.<br>
                        - 중국어 면접은 장쌤 2차 교재 내용을 적극적으로 활용하였습니다.<br>
                        크게 이슈가 되고 중요한 주제는 통으로 외우고, 그 외에도 어떤 문장들은 만능틀처럼 사용할 수 있을까 찾아보며 체크했습니다.<br>
                        예를 들어, 학생상담에 쓰이는 만능틀/ 학습부진아, 학업격차에 같이 쓰일 수 있는 만능문장 등... 이런식으로 테마를 분류하며 외웠습니다.<br>
                        - 한글 면접은 장쌤 수업 때 직접 말해 볼 수 있는 연습의 기회가 되고 또 실제적이고 구체적인 내용들을 추가해주셔서 유익합니다.<br>
                        그 외에 12월에 시간이 되신다면 교육학에서 구성해주는 다른 교과와 여러 명이 스터디 하는 것도 추천합니다.<br>
                        여럿이 이야기 하다보면 답변 내용이 더욱 풍성해질 수 있습니다. <br>
                        <br>
                        준비생들에게 꼭 해 주고 싶은 말<br>
                        1차, 2차 모두 긍정적인 마음이 정말 중요한 것 같습니다. <br>
                        저는 지난 3년동안 스스로에게 엄격하고 채찍질하며 동기유발을 했는데 안그래도 긴장되고 불안한 시험 순간에서 심리적으로 불안정했었습니다.. <br>
                        특히 이번 2차 때에는 ‘매일 조금씩 나아지고 있어!’, ‘잘 할 수 있어!’ 등의 긍정적인 마음을 가지도록 노력했습니다.<br>
                        이걸 하면 다른 부분이 부족한 것 같고, 늘 부족함이 더욱 보이는 준비 기간이지만... 오글거려도 거울보며 긍정적인 말을 하려고 노력했습니다.<br>
                        부정적인 말은 본인뿐만 아니라 함께 공부하는 사람들에게도 좋은 영향을 주지 않습니다.<br>
                        스터디원과 함께 으쌰으쌰! 하면서 스스로를 다독이며 하루 하루 최선을 다하시면 조금 더 편안한 마음으로 실력을 발휘할 수 있을 거에요!<br>
                        <br>
                        시험 후 느낀 점 <br>
                        시험을 보고 난 후 아쉬움이 남는 건 모두 마찬가지인 것 같습니다.<br>
                        저는 수업실연 때 처음에 목이 잠기고 소리가 갈라진 것이 아쉽고, 또 면접을 평소보다 못했다는 생각에 시험이 끝나고 발표 때까지 마음을 졸였습니다.<br>
                        2차 시험이 처음이었기 때문에 생소한 것이 많았고 또 실수도 있었습니다. <br>
                        그래도 저에게 도움이 되었던 것은 유튜브에서 2차 시험 실제 진행과정 등을 여러 번 영상으로 보고 머릿속으로 그려본 것입니다.<br>
                        시험장만 생각하면 긴장되고 떨리지만, 준비하실 때에도 시험장에서 어떻게 진행될지 스스로 많이 그려보시면 당일 날 덜 당황할 수 있습니다.<br>
                        <br>
                        장영희 수업 장점 <br> 
                        장영희 수업장점(1차,2차)<br>
                        [1차]<br>
                        ‘주요내용 반복학습’과 ‘모의고사 피드백’이 가장 큰 장점이라고 생각합니다. <br>
                        어법, 어학, 문학사 등 주요내용을 반복하면서 정말 수업시간에 집중해서 듣기만 해도 최소 몇 번은 자연스럽게 반복되는 것 같습니다.<br>
                        그 반복의 시간을 지루하다고 생각하지 마시고, 스스로 생각하고 써보며 공부하시면 더 큰 효과가 난다고 생각합니다.<br> 
                        그리고 모의고사 피드백을 통해 전체적인 답안의 깔끔함, 내용 등을 피드백 해주시고 필요한 부분은 직접 글로 잘 설명해주셔서 도움이 되었습니다.<br>
                        또 공부하면서 궁금한 내용이나 고민들은 상담을 통해 같이 공감해주시고 방향 설정을 도와주셔서 좋습니다.<br>
                        초수 때 직강을 수강할 때에는 7-8월, 9-10월 이렇게 새로 수업을 시작할 때마다 장쌤과 개별상담, 스터디 상담을 하면서 공부방향을 점검하고 재설정할 수 있어 좋았습니다. <br>
                        [2차]<br>
                        수업실연, 면접 꼼꼼히 피드백 해주시고 또 면접 복장, 이미지 등 전체적으로 체크해주시는 게 좋았습니다.<br> 
                        또 2차를 처음 준비할 때는 막막한데 장쌤이 필요한 부분은 예시와 시범을 보여주시고 전문가들 영상과 피드백이 큰 도움이 되었습니다.<br>
                        <br>
                        감사합니다. 
                    </div>
                </div> 
            </div> 
        </div>

        <div id="popup27" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>   
            <div class="content">         
                <div class="memoirs NSK">
                    <div class="memoirstitle"><span><strong>영어</strong>경기영어. 초수. 교직이수. 복수전공. 이과생. 재학생</span> <span>김미*</span></div>
                    <div>
                        김유석샘 일영/문학 수업이 좋았던 것은.. 샘이 시험에 대한 감이 정말 출중하신 것 같아요.<br>
                        필요한 것만 가르치세요. <br>
                        저 개인적으로는 임고 일영/문학에서는 문학에 대한 엄청난 배경지식이나 일영 지문 일일히 해석하는 건 덜 중요한 것 같거든요.<br>
                        김유석 샘은 이것보다 일영 문제를 푸는 사고방식을 가르쳐주세요. <br>
                        이게 정말 정말 큰 도움이 되었어요! 앞으로의 일영 공부에 토대가 된 강의들이었어요 ㅎㅎ
                        샘 시키는대로 조금 WRITING 스터디도 해보고 그랬어요. <br>
                        많이는 못했지마뉴ㅠ 시키는대로 다 했으면 2월에 정말 실력 많이 늘 수 있었을 것 같아요.<br>
                        숏프로즈리더는 일단 지문이 좋고 재밌어요. <br>
                        딱 기출 일영스타일이라서 즐겁게 들었네요. <br>
                        저는 공부는 즐겨야한다고 생각하고 하기 싫으면 놔버리는 성격이라..ㅎㅎ<br>
                        김유석샘 모고강의(9-10월)  7-8월에는 일영공부를 거의 안했어요(진짜 일주일에 2번정도 잠깐씩 기출 일영 지문 보는거..)
                        아무래도 내용학이 딱 부족한게 보이다보니 급해서 일영할 여유가 안났던 것 같아요.<br>
                        그렇지만 !!!!!! 일영/문학의 중요성은 다들 아시잖아요?! <br>
                        그래서 저는 억지로라도 일영/문학 공부하려고 모고강의 들었어요.<br>
                        팀모고는 듣고 싶지 않았고, 김유석샘에 대한 신뢰가 있었고, 무엇보다 시험 시간 재서 풀고, 첨삭+점수까지 내주시는게 큰 메리트라 생각해서 등록했어요. <br>
                        일영/문학 소홀해지기 쉬운데 학원 강의가 있으니 억지로라도 학원 나가서 풀고.. 점수보고 자극받고.. 첨삭받고 부족한 점 고치고 그렇게 되더라구요 :) <br>
                        특히 제가 고친 거는.. 제 글이 표현력이 좀 딸렸었는데 선생님이 지적해주시는 거 보고 내가 잘 썼다고 생각했지만 다른 사람이 그렇게 받아들이지 않으면 못쓴거구나.. 를 깨달은 것 같아요. <br>
                        그래서 보다 독자 친화적인 글을 쓰려고 노력하게 되었어요.<br> 
                        설명을 해도 두루뭉술하게 말고 구체적으로, 간결하게 쓰려고 노력하는 기회가 되었어요! <br>
                        또한 팀 모고 안에 일영문학있으면 사실 영교/영어학 틀린 부분에 집중하게 되고 시간 없어서 일영은 대충 넘어가게 되는데.. 이 모고는 일영/문학만 있다보니까 확실히 신경을 따로 써주게 되어요. <br>
                        그게 정말 좋았어요. <br>
                        진짜 이 수업은 들으면 무조건 좋은 수업이라고 생각해서.. 추천해요! 추천백개! <br>
                        11월에는 일영모고가 끝나서 마지막 기출 서머리 스터디를 했어요. <br>
                        오래는 아니고 한 2주 한 것 같은데, 마지막까지 일영을 놓지 않기 위한 이유였어요. <br>
                        하루에 2시간 정도 스터디룸에서 만나서 기출서머리 시간 재고 해보고 서로 피드백 줬어요. <br>
                        일영을 계속 하는 것도 좋았고, 기출 서머리라서 기출 수준의 지문을 접한다는게 좋았고 좋은 지문이라서 연습할 가치가 있어 좋았어요. <br>
                        피드백도 서로의 답안에서 배우고.. 좋은 점은 칭찬해주고 부족한 점을 보완해주면서 짧은 시간이었지만 큰 도움이 되었어요!! <br>
                        진짜 제가 말씀드리고 싶은건 마지막까지 일영 놓지 마시라는 거에요!!! <br>
                        솔직히 영어학/영교론 전공 어느정도 하면 막 그 직전에 외운게 나오고 그런 경우 크게는 없는 것 같아요.<br>
                        그리고 일영 2시간정도 한다고 시간 엄청 많이 뺏기는 것도 아니거든요!!!! <br>
                        <br>
                        마지막까지 일영 챙기는거 강추드려요☆   <br>
                        <br>                       
                    </div>
                </div> 
            </div> 
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/11/2821_01.jpg" alt="윌비스 임용과 함께"/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/11/2821_02.jpg" alt="타임 테이블"/>
            {{--
            <div class="btns">
                <a href="javascript:go_popup1()" title="">유아 설명회 강의실 배정 현황 확인 ></a>
                <a href="javascript:go_popup2()" title="">중등 설명회 강의실 배정 현황 확인 ></a>        
            </div>
            --}}
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

            <div class="evtCtnsBox evt03" id="evt03" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2821_03.jpg" alt="설명회 신청"/>
                <div class="evt_table p_re">
                    {{-- 신청완료 --}}
                    @if (empty($register_count) === false)
                        <div class="close NSK-Black"><span>설명회<br>신청 완료</span></div>
                    @endif

                    <div class="txtinfo">
                        <div>개인정보 제공 동의 문구</div>
                        <ul>
                            <li>개인정보 수집 이용 목적<br>
                                - 신청자 본인 확인 및 신청 접수 및 문의사항 응대<br>
                                - 통계분석 및 마케팅 <br>
                                - 윌비스 임용의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공
                            </li>
                            <li>개인정보 수집 항목<br>
                                - 필수항목 : 성명, 연락처, 출신학교, 출신학과, 시험응시횟수, 희망응시지역
                            </li>
                            <li>개인정보 이용기간 및 보유기간<br>
                                - 이용 목적 달성 또는 신청자의 신청 해지 및 삭제 요청 시 파기
                            </li>
                            <li>신청자의 개인정보 수집 및 활용 동의 거부 시<br>
                                - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다.
                            </li>
                            <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리 방침에 따라 보호되고 있습니다.</li>
                            <li>이벤트 진행에 따른 단체사진 및 영상 촬영에 대한 귀하의 초상권 사용을 동의하며, 해당 저작물에 대한 저작권은 윌비스에 귀속됩니다.</li>
                        </ul>
                    </div>
                    <div class="check" id="chkInfo">
                        <label>
                            <input name="is_chk" id="is_chk" type="checkbox" value="Y" autocomplete="off"/>
                            윌비스에 개인정보 제공 동의하기 (필수)
                        </label>
                    </div>

                    <table>
                        <col width="10%" />
                        <col width="23%" />
                        <col width="10%" />
                        <col width="23%" />
                        <col width="10%" />
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
                                <td>
                                    <input type="text" name="register_data1" maxlength="100">
                                </td>
                                <th>희망응시지역</th>
                                <td>
                                    <select id="register_data2" name="register_data2" title="지역선택">
                                        <option value="">지역선택</option>
                                        <option value="서울">서울</option>
                                        <option value="경기">경기</option>
                                        <option value="인천">인천</option>
                                        <option value="강원">강원</option>
                                        <option value="대전">대전</option>
                                        <option value="세종">세종</option>
                                        <option value="충북">충북</option>
                                        <option value="충남">충남</option>
                                        <option value="대구">대구</option>
                                        <option value="경북">경북</option>
                                        <option value="부산">부산</option>
                                        <option value="울산">울산</option>
                                        <option value="경남">경남</option>
                                        <option value="전북">전북</option>
                                        <option value="광주">광주</option>
                                        <option value="전남">전남</option>
                                        <option value="제주">제주</option>
                                    </select>
                                </td>
                                <th>응시횟수</th>
                                <td>
                                    <select id="register_data3" name="register_data3" title="응시횟수">
                                        <option value="">응시횟수</option>
                                        <option value="초수">초수</option>
                                        <option value="재수">재수</option>
                                        <option value="삼수 이상">삼수 이상</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="elementary">
                                <th>유•초등</th>
                                <td colspan="5">
                                    <ul>
                                        <li><label><input class="btn-product-check" type="radio" name="register_chk[]" value="{{ $arr_base['register_list'][0]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][0]['PersonLimit'] or '0'}}" data-product-group="1" autocomplete="off"/><span class="subjct_title">유아</span> 민정선 교수</label></li>
                                        <li><label><input class="btn-product-check" type="radio" name="register_chk[]" value="{{ $arr_base['register_list'][1]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][1]['PersonLimit'] or '0'}}" data-product-group="1" autocomplete="off"/><span class="subjct_title">초등</span> 배재민 교수<em class="cms">일정추후공지</em></label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>중등</th>
                                <td colspan="5">
                                    <ul class="subject_line">
                                        <li><label><input class="btn-product-check main-product" type="radio" name="register_chk[]" value="{{ $arr_base['register_list'][2]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][2]['PersonLimit'] or '0'}}" data-product-group="2" autocomplete="off"/><span class="subjct_title">교육학 논술</span> 이경범 교수</label></li>
                                        <li><label><input class="btn-product-check main-product" type="radio" name="register_chk[]" value="{{ $arr_base['register_list'][3]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][3]['PersonLimit'] or '0'}}" data-product-group="2" autocomplete="off"/><span class="subjct_title">교육학 논술</span> 정현 교수</label></li>
                                        <li><p class="middle">※ 중등은 교육학을 반드시 선택!</p></li>
                                    </ul>
                                    <ul class="subject_line">
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][4]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][4]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">전공 국어</span> 송원영 교수</label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][5]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][5]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">전공 국어</span> 권보민 교수<em class="cms">일정추후공지</em></label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][6]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][6]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">전공 국어</span> 구동언 교수</label></li>
                                    </ul>
                                    <ul class="subject_line">
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][7]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][7]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">일반영어/영미문학</span> 김유석 교수</label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][8]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][8]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">영어학</span> 김영문 교수 <em class="cms">일정추후공지</em></label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][9]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][9]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">전공 수학</span> 김철홍 교수<em class="cms">일정추후공지</em></label></li>
                                    </ul>
                                    <ul class="subject_line">
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][10]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][10]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">전공 수학</span> 김현웅 교수<em class="cms">일정추후공지</em></label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][11]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][11]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">수학 교육론</span> 박태영 교수</label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][12]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][12]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">수학 교육론</span> 박혜향 교수</label></li>
                                    </ul>
                                    <ul class="subject_line">
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][13]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][13]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">전공 생물</span> 강치욱 교수<em class="cms">일정추후공지</em></label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][14]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][14]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">생물 교육론</span> 앙혜정 교수<em class="cms">일정추후공지</em></label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][15]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][15]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">전공 화학</span> 강철 교수</label></li>
                                    </ul>
                                    <ul class="subject_line">
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][16]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][16]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">도덕 윤리</span> 김병찬 교수<em class="cms">일정추후공지</em></label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][17]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][17]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">일반 사회</span> 허역 교수팀</label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][18]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][18]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">전공 역사</span> 김종권 교수</label></li>
                                    </ul>
                                    <ul class="subject_line">
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][19]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][19]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">전공 음악</span> 다이애나 교수<em class="cms">일정추후공지</em></label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][20]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][20]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">전공 체육</span> 최규훈 교수</label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][21]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][21]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">전공 중국어</span> 장영희 교수</label></li>
                                    </ul>
                                    <ul class="subject_line">
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][22]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][22]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">전기·전자·통신</span> 최우영 교수</label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][23]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][23]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off"/><span class="subjct_title">정컴 교육론</span> 장순선 교수<em class="cms">일정추후공지</em></label></li>
                                    </ul>
                                 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>

        @if (empty($register_count) === true)
            <div class="evt_apply_table p_re">
                <div class="btns_apply">
                    <a href="javascript:void(0);" onclick="fn_submit(); return false;">설명회 참석 신청하기 ></a>
                </div>
            </div>
        @else
            <form name="delete_register" id="delete_register">
                {!! csrf_field() !!}
                {!! method_field('DELETE') !!}
                <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
                @foreach($register_count as $key => $row)
                    <input type="hidden" name="em_idx[]" value="{{$row['EmIdx']}}">
                @endforeach
            </form>
            <div class="evt_cancle_table p_re">
                <div class="btns_cancel">
                    <a href="javascript:void(0);" onclick="fn_register_delete(); return false;">설명회 참석 취소하기 ></a>
                </div>
            </div>
        @endif

        <div class="evtCtnsBox evt04" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/11/2821_04.jpg" alt="푸짐한 선물"/>
        </div>
            
        <div id="Container" class="Container ssam NGR c_both maps">
            @include('willbes.pc.site.main_partial.map_' . $__cfg['SiteCode'])
        </div>
        
        <div class="evtCtnsBox evt05" data-aos="fade-up" id="evt05">
        	<img src="https://static.willbes.net/public/images/promotion/2022/11/2821_05.jpg" alt="소문내기 이벤트"/>
        </div>

        <div class="evtCtnsBox evt06" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2821_06.jpg" alt="sns"/>
                <a href="https://cafe.daum.net/teacherexam" title="다음카페" target="_blank" style="position: absolute;left: 51.7%;top: 29.66%;width: 3.61%;height: 37.25%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/teacherexam2" title="네이버카페" target="_blank" style="position: absolute;left: 56.15%;top: 29.66%;width: 3.61%;height: 37.25%;z-index: 2;"></a>
                <a href="https://www.facebook.com" title="페이스북" target="_blank" style="position: absolute;left: 60.55%;top: 29.66%;width: 3.61%;height: 37.25%;z-index: 2;"></a>
                <a href="https://www.instagram.com" title="인스타그램" target="_blank" style="position: absolute;left: 64.25%;top: 29.66%;width: 3.61%;height: 37.25%;z-index: 2;"></a>
                <a href="https://section.blog.naver.com" title="블로그" target="_blank" style="position: absolute;left: 67.95%;top: 29.66%;width: 3.61%;height: 37.25%;z-index: 2;"></a>
                <a href="javascript:void(0);" title="주소복사하기" onclick="copyTxt();"  style="position: absolute;left: 72.41%;top: 29.66%;width: 9.13%;height: 38.25%;z-index: 2;"></a>
                <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운" style="position: absolute;left: 82.25%;top: 29.66%;width: 9.13%;height: 38.25%;z-index: 2;"></a>
            </div>
            <div class="urlWrap">
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_url_partial',array('login_url'=>app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www')))
                @endif
            </div> 
        </div>

        <div class="evtCtnsBox evt07" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/11/2821_07.jpg" alt="여러분 차례"/>
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">※ 합격전략 설명회 신청 관련 안내 사항</h4>
                <ul>
                    <li>윌비스 임용의 합격 전략 설명회(이하, 설명회)는 2022년 12월17일(토)에 진행되며,<br>
                        유아는 15시부터, 증등(교육학)은 13시부터 진행됩니다.</li>
                    <li>본 설명회는 2024학년도 시험을 대비 하는 이벤트입니다. (대학(원)재학생, 졸업예정자가 참석하셔도 됩니다.)</li>
                    <li>설명회 참석을 위해서는 본 페이지를 통하여 사전에 신청해 주셔야 합니다.<br>
                        * 중등의 경우, 교육학과 전공과목을 신청할 수 있습니다. 
                    </li>
                    <li>설명회 참석 신청은 설명회장(강의실) 상황에 따라서 조기에 마감될 수 있습니다. (사전 신청 부탁드립니다.)</li>
                    <li>설명회 신청내역을 수정하실 분은 취소 후, 다시 작성해 주시면 됩니다.</li>
                    <li>설명회 관련 자세한 문의 사항은 홈페이지 1:1상담 게시판을 통하여 요청하시면 됩니다.</li>
                    <li>설명회장에는 무료로 운영하는 주차장이 없습니다. 가급적 대중교통을 이용해 주시면 되고, 부득이한 경우 노량진의 유료 주차장을 사전에 검색해 보시고 오시는 것이 좋습니다.</li> 
                    <li>설명회에 참석하시면 푸짐한 혜택이 있습니다. <br>
                        - 사전접수 후, 참석하시는 모든 분께 카카오 플래너(3종중 1종 랜덤)를 드립니다. <br>
                        - 추첨을 통하여 연간패키지 수강권, 아이패드, 애플워치, 스타벅스 교환권(3만원권)을 드립니다. <br>
                        - 설명회 당일, 연간패키지를 접수하시면 문화상품권(2만원권)을 드립니다. (연간패키지를 설명회 전에 접수하시고, 설명회에 참석하
                        셔도 문화상품권을 받을 수 있습니다.<br>
                        - 연간패키지 선착순 1,000명 접수 이벤트도 별도로 진행됩니다.</li>    
                </ul>
                <h4 class="NSK-Black mt100">※ 소문내기 이벤트 관련 유의사항</h4>
                <ul>
                    <li>SNS는 페이스북, 인스타그램이 해당되며, 카페와 블로그의 경우 정상적으로 운영 및 활동이 진행되는 곳이어야 합니다.<br>
                        (검색 창에 ‘교원 임용’ 검색 시, 상단에 노출되는 카페)
                    </li>
                    <li>윌비스 임용의 합격전략설명회 안내 링크 또는 캡처된 이미지가 포함되어 있을 경우에만 이벤트 참여로 인정됩니다.</li>
                    <li>본 이벤트와 관련 없는 글이나, 삭제 및 비공개로 설정 되어 있는 경우에는 당첨에서 제외될 수 있습니다.</li>
                    <li>이벤트 상품은 기프티콘으로 지급될 예정이며, 회원가입 시 입력한 휴대폰 번호로 전송됩니다.<br>
                        (회원 정보 수정이 필요한 경우, 12월 27일까지 수정해 주셔야 합니다.)
                    </li>
                </ul>
            </div>
        </div>

         <!--레이어팝업-->
         <div id="popup1" class="Pstyle">
            <span class="b-close"></span>
            <div class="content1">                  
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2821_assign01.png" class="off" alt="" />    
            </div> 
        </div>    
        <div id="popup2" class="Pstyle">
            <span class="b-close"></span>   
            <div class="content2">         
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2821_assign02.png" class="off" alt="" />  
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