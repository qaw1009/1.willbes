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
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; margin:0 auto;}
        .MainQuickMenuSSam {display:none}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/04/2138_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/04/2138_01_bg.jpg) no-repeat center top;}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/04/2138_02_bg.jpg) no-repeat center top;}
        .evt03 {background:#83cfbd; padding:150px 0}
        .evt03 > div {width:1120px; margin:0 auto;}
        .evt03 > div table {background:#fff}
        .evt03 > div th {padding:30px 0}
        .evt03 > div td {font-size:22px; color:#288a75; padding:30px 10px; letter-spacing:-1px}
        .evt03 > div td p {margin-bottom:15px}
        .evt03 > div tr {border-bottom:10px solid #83cfbd}
        .evt03 > div tr:nth-child(1) th {background:#efd600}
        .evt03 > div tr:nth-child(2) th {background:#00a225}
        .evt03 > div tr:nth-child(3) th {background:#089f7c}
        .evt03 > div tr:nth-child(4) th {background:#003a2e}
        .evt03 > div tr:nth-child(5) th {background:#1175d3}
        .evt03 > div tr:nth-child(6) th {background:#1175d3}
        .evt03 > div tr:nth-child(7) th {background:#db5752}
        .evt03 > div tr:nth-child(8) th {background:#f2736d}
        .evt03 > div tr:nth-child(9) th {background:#03c02e}
        .evt03 > div tr:nth-child(10) th {background:#50be68}
        .evt03 > div tr:nth-child(11) th {background:#333333}
        .evt03 > div tr:nth-child(12) th {background:#67531e}
        .evt03 > div tr:nth-child(13) th {background:#002978}
        .evt03 > div tr:nth-child(14) th {background:#5684da }
        .evt03 > div tr:nth-child(15) th {background:#7c828e}
        .evt03 > div tr:nth-child(16) th {background:#fa8100}
        .evt03 > div td ul {width:100%}
        .evt03 > div td li {display: inline; float:left; width:50%; padding:20px 0; border-right:1px solid #e6e6e6; border-bottom:1px solid #e6e6e6}
        .evt03 > div td ul:after {content:''; display: block; clear:both}
        .evt03 > div td li:nth-last-of-type(2),
        .evt03 > div td li:last-child  {border-bottom:0}
        .evt03 > div td li:nth-of-type(even) {border-right:0;}
    </style> 

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2138_top.jpg" alt="합격전략 세우기"/>            
        </div>

        <div class="evtCtnsBox evt01" id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2138_01.jpg" alt="1. 단계적 학습을 위한 가이드"/>          
        </div>
        
        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2138_02.jpg" alt="2. 과목별/시기별 공부 방향 제시"/>         
        </div>  
        
        <div class="evtCtnsBox evt03">
            <div>
                <table>
                    <col width="194px"/>
                    <col width="250px"/>
                    <col />
                    <tr>
                        <th><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_t01_01.png" alt="유아"/></th>
                        <td><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_t01_02.png" alt="민정선"/></td>
                        <td>
                            <ul>
                                <li>
                                    <p>2021 대비 합격 전략 설명회</p>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                                <li>
                                    <p>2020 합격생 간담회</p>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_t02_01.png" alt="초등"/></th>
                        <td><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_t02_02.png" alt="배재민"/></td>
                        <td>
                            <ul>
                                <li>
                                    <p>2020 1~2월 샘플 강의</p>
                                    <a href="https://youtu.be/866he0f9RlE" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                                <li>
                                    <p>2021 3월 샘플 강의</p>
                                    <a href="https://youtu.be/8hEtQruyIv4" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_t03_01.png" alt="교육학"/></th>
                        <td><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_t03_02.png" alt="이인재"/></td>
                        <td>
                            <ul>
                                <li>
                                    <p>2022 대비 합격 전략 설명회</p>
                                    <a href="https://youtu.be/sLuznU9Rmd0" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                                <li>
                                    <p>2021 1~2월 샘플 강의</p>
                                    <a href="https://youtu.be/VJkL-JYnpwk" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                                <li>
                                    <p>2021 3~4월 샘플 강의</p>
                                    <a href="https://youtu.be/_S04E5FBzFQ" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                                <li></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_t04_01.png" alt="국어"/></th>
                        <td><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_t04_02.png" alt="송원영"/></td>
                        <td>
                            <ul>
                                <li>
                                    <p>2022 대비 합격 전략 설명회</p>
                                    <a href="https://youtu.be/nmqJSQbE0v4" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                                <li>
                                    <p>2021 1~2월 국교 샘플 강의</p>
                                    <a href="https://youtu.be/8Pd2FV9vVXg" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                                <li>
                                    <p>2021 1~2월 문교 샘플 강의</p>
                                    <a href="https://youtu.be/y8vRHR1V5SA" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                                <li>
                                    <p>2021 3~4월 국교 샘플 강의</p>
                                    <a href="https://youtu.be/trakw0CHdnQ" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                                <li>
                                    <p>2021 3~4월 문교 샘플 강의</p>
                                    <a href="https://youtu.be/l9ggfjlX-_s" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                                <li></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_t05_01.png" alt="영어"/></th>
                        <td><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_t05_02.png" alt="김유석"/></td>
                        <td>
                            <ul>
                                <li>
                                    <p>2022 대비 합격 전략 설명회</p>
                                    <a href="https://youtu.be/1arYo1DapLU" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                                <li>
                                    <p>2021 1~2월 영미시 샘플 강의</p>
                                    <a href="https://youtu.be/cQrUoe1fJR0" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                                <li>
                                    <p>2021 1~2월 PRS 샘플 강의</p>
                                    <a href="https://youtu.be/Rv2YHU-fE8I" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                                <li>
                                    <p>2021 3~4월 일영/문학 샘플 강의</p>
                                    <a href="https://youtu.be/lOManlfRPKk" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_t06_01.png" alt="영어"/></th>
                        <td><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_t06_02.png" alt="김영문"/></td>
                        <td>
                            <ul>
                                <li>
                                    <p>2022 대비 합격 전략 설명회</p>
                                    <a href="https://youtu.be/eG64tzalqvg" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                                <li>
                                    <p>2021 1~2월 영어학 샘플 강의</p>
                                    <a href="https://youtu.be/um-CgAv_seE" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                                <li>
                                    <p>2021 3~4월 기본반 샘플 강의</p>
                                    <a href="https://youtu.be/dkqpCB-P-Gw" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                                <li>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_t07_01.png" alt="수학"/></th>
                        <td><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_t07_02.png" alt="김철홍"/></td>
                        <td>
                            <ul>
                                <li>
                                    <p>2022 대비 합격 전략 설명회</p>
                                    <a href="https://youtu.be/2ElZCe1dnCw" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                                <li>
                                    <p>2021 1~2월 대수학 샘플 강의</p>
                                    <a href="https://youtu.be/oNMVhXIrodA" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                                <li>
                                    <p>2021 3~4월 해석학 샘플 강의</p>
                                    <a href="https://youtu.be/Uhzo0Hb3sXY" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/></a>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                </li>
                                <li>
                                </li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
        </div> 
    </div>
    <!-- End Container -->
@stop