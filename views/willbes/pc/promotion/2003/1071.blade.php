@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        /*.evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5); }*/

        .skybanner {position:fixed;top:180px;right:10px;z-index:10; text-align:center}
        .skybanner a {display:block; margin-bottom:5px}

        /*타이머*/
        .time {width:100%; text-align:center; background:#000; display:none}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {/*font-size:40px*/}
        .time table td img {width:70%}
        .time .time_txt {font-size:28px; color:#fff; letter-spacing: -1px; font-weight:600}
        .time .time_txt a {font-size:14px; display:block; margin-top:10px; border:1px solid #fff; padding:5px; border-radius:15px}
        .time .time_txt a:hover {background:#fff; color:#000}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time p {text-align:center}

        .wb_top {background:#da388a; position:relative; height:1113px}
        .wb_top span {position:absolute; left:50%}
        .wb_top span.topimg {width:939px; top:80px; margin-left:-469px; z-index:2} 
        .wb_top span.toptxt01 {width:405px; top:639px; margin-left:170px; z-index:3} 
        .wb_top span.toptxt02 {width:350px; top:572px; margin-left:-533px; z-index:3} 
        .wb_top span.toptxt03 {width:281px; top:266px; margin-left:180px; z-index:1} 
        .wb_top span.toptxt04 {width:360px; top:137px; margin-left:-533px; z-index:1} 
        .wb_top span.toptxt05 {width:350px; top:336px; margin-left:-533px; z-index:1} 


        .wb_cts01 {background:#9E97FF url("https://static.willbes.net/public/images/promotion/2021/07/1071_01_bg.jpg") no-repeat center top;}

        .wb_cts02 {padding-bottom:30px}
        .wb_cts02 ul {width:1120px !important; margin:0 auto; display:flex; justify-content: space-around; align-content: center; flex-wrap: wrap;}  
        .wb_cts02 ul li {flex: 1 1 30%; margin-bottom:80px}
        .wb_cts02 p {margin-top:20px; font-size:17px; font-weight:600; line-height:1.4}
        .wb_cts02 p span {color:#fd45a4}

        .wb_cts03 {background:#f4f4f4;}

        .wb_cts04 {background:#ead9d9; padding-bottom:50px}
        .wb_cts04 ul {width:1120px !important; margin:0 auto; display:flex; justify-content: space-around; align-content: center; flex-wrap: wrap;}  
        .wb_cts04 li a:hover img {box-shadow:10px 10px 20px rgba(0,0,0,.3); border-radius:24px}


        .wb_cts05 {background:#ead9d9; padding-bottom:100px}
        .wb_cts05 ul {width:960px; margin:0 auto}
        .wb_cts05 li {display:inline; float:left; width:16.666666%}
        .wb_cts05 li a {display:block; height:80px; line-height:80px; text-align:center; font-size:16px; position:relative; border:3px solid #5f5f5f; margin-right:5px}
        .wb_cts05 li a span {position:absolute; display:block; left:50%; top:-15px; width:90px; margin-left:-45px; padding:0 10px; font-size:12px; color:#fff; 
        background:#5f5f5f; height:24px; line-height:20px; border:2px solid #ead9d9; border-radius:20px;
        }
        .wb_cts05 li a.active,
        .wb_cts05 li a:hover {background:#fd41a2; color:#fff; border:3px solid #fd41a2;}
        .wb_cts05 li a.active span,
        .wb_cts05 li a:hover span {background:#fd41a2; }
        .wb_cts05 li:last-child a {margin:0}
        .wb_cts05 ul:after {content:''; display:block; clear:both}
        .wb_cts05 .tabContents {width:960px; margin:16px auto 0; background:#fff; padding:50px 30px; text-align:left}
        .wb_cts05 .tabContents h3 {font-size:22px; color:#930f0d; margin:20px 0}
        .wb_cts05 .tabContents p {font-size:18px; margin:20px 0}
        .wb_cts05 table {background:#fff; width:100%; background:#fff} 
        .wb_cts05 tr {border-bottom:1px solid #ccc}        
        .wb_cts05 tr.st01 {background:#ececec}
        .wb_cts05 tr:hover {background:#f9f9f9}
        .wb_cts05 th,
        .wb_cts05 td {padding:10px; font-size:14px; font-weight:500;}
        .wb_cts05 th {background:#5f5f5f; color:#fff}
        .wb_cts05 td:nth-child(1) {text-align:center}
        .wb_cts05 td:nth-child(2) {text-align:center}
        .wb_cts05 td:nth-child(3) {color:#930f0d}
        .wb_cts05 td:last-child {border:0}
        .wb_cts05 td p {font-size:12px}
		.wb_cts05 table a {padding:10px 15px; color:#fff; background:#914a6b; font-size:14px; display:block; border-radius:20px; text-align:center}
        .wb_cts05 table a:hover {background:#202020; }

        .check { position:absolute; bottom:7%; left:50%; margin-left:-490px; width:980px; padding:20px 0px 20px 10px; letter-spacing:3;z-index:5;font-weight:bold;}
        .check label {cursor:pointer; font-size:14px}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#252525; margin-left:50px; border-radius:20px}
        .check a:hover {background:#ffc600; color:#252525}
        
        input[id="cb1"]:checked + label {background-color: red;}      

    </style>
    <div class="p_re evtContent NGR" id="evtContainer">  
              
        <div class="skybanner">  
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1071_sky01.png" alt="2019대비 통신직/전기직 이론/문제풀이 패키지" usemap="#Map1071A" border="0">
                <map name="Map1071A" id="Map1071A" >
                    <area shape="rect" coords="5,137,116,189" href="#" class="r_btn_tab" data-tab-id="1" />
                    <area shape="rect" coords="5,196,116,258" href="#" class="r_btn_tab" data-tab-id="2"/>
                    <area shape="rect" coords="5,266,116,326" href="#" class="r_btn_tab" data-tab-id="3"/>
                    <area shape="rect" coords="5,334,116,384" href="#" class="r_btn_tab" data-tab-id="4"/>
                    <area shape="rect" coords="5,390,116,457" href="#" class="r_btn_tab" data-tab-id="5"/>
                    <area shape="rect" coords="5,462,116,511" href="#" class="r_btn_tab" data-tab-id="6"/>
                </map>
            </div>        
        </div>  
        
        <div class="evtCtnsBox wb_top" >
            <span class="topimg" data-aos="zoom-in"><img src="https://static.willbes.net/public/images/promotion/2021/07/1071_top.png" alt="통신/전기 최우영" ></span>
            <span class="toptxt01" data-aos="zoom-in" data-aos-duration="1000"><img src="https://static.willbes.net/public/images/promotion/2021/07/1071_txt01.png" alt="45점" ></span>
            <span class="toptxt02" data-aos="zoom-in" data-aos-duration="1200"><img src="https://static.willbes.net/public/images/promotion/2021/07/1071_txt02.png" alt="240%" ></span>
            <span class="toptxt03" data-aos="zoom-in" data-aos-duration="1300"><img src="https://static.willbes.net/public/images/promotion/2021/07/1071_txt03.png" alt="1위" ></span>
            <span class="toptxt04" data-aos="zoom-in" data-aos-duration="1500"><img src="https://static.willbes.net/public/images/promotion/2021/07/1071_txt04.png" alt="단4개월" ></span>
            <span class="toptxt05" data-aos="zoom-in" data-aos-duration="1700"><img src="https://static.willbes.net/public/images/promotion/2021/07/1071_txt05.png" alt="교재1위" ></span>
        </div>       

        <div class="evtCtnsBox wb_cts01">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/1071_01.jpg" alt="이유있는 선택"/> 
                <a href="https://pass.willbes.net/promotion/index/cate/3028/code/1468" title="합격패키지" target="_blank" style="position: absolute; left: 28.13%; top: 30.61%; width: 13.57%; height: 25.27%; z-index: 2;"></a>
            </div>
        </div>    

        <div class="evtCtnsBox wb_cts02">            
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1071_02.jpg" alt="핵심포인트"> 
            <ul>
                <li>
                    <a href="https://youtube.com/embed/sC9TJfUNkyc" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/07/1071_02_01.jpg" alt=""></a>
                    <p>우영쌤의 <span>[전기이론 기초강의]</span><br/> 10분만에 정리하기</p>
                </li>
                <li>
                    <a href="https://youtube.com/embed/_crgLD0rmN8" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/07/1071_02_02.jpg" alt=""></a>
                    <p><span>『전기회로 기본용어』</span><br/> 10분 핵심정리 확인하기!!</p>
                </li>
                <li>
                    <a href="https://youtube.com/embed/1zATq2Kydwg" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/07/1071_02_03.jpg" alt=""></a>
                    <p>무선/통신 공통이론에서  <span>『변조이론』</span><br/> 제일 중요한 거 알지!?</p>
                </li>
                <li>
                    <a href="https://youtube.com/embed/37yjw2mC8wY" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/07/1071_02_04.jpg" alt=""></a>
                    <p><span>『RLC회로의 특성』</span><br/> 바로 이거야!!</p>
                </li>
                <li>
                    <a href="https://youtube.com/embed/eiAKjkFjwtE" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/07/1071_02_05.jpg" alt=""></a>
                    <p>빈출개념 콕 찝기! <br/><span>연산증폭기(Op-Amp)</span> 기출 포인트야~</p>
                </li>
                <li>
                    <a href="https://youtube.com/embed/wSaPEaVIbbo" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/07/1071_02_06.jpg" alt=""></a>
                    <p>합격하고자 하면~ 기출을 풀어라!<br/> 직접FM  <span>기출 문풀 정리하기~</span></p>
                </li>                
            </ul>
        </div> 
        
        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1071_03.jpg" alt=""/> 
        </div>

        <div class="evtCtnsBox wb_cts04" id="pkglec">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1071_04_01.jpg" alt=""/> 
            <ul>
                <li><a href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/184023" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/07/1071_04_02.png" alt=""/> </a></li>
                <li><a href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/184024" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/07/1071_04_03.png" alt=""/> </a></li>
                <li><a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/184021" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/07/1071_04_04.png" alt=""/> </a></li>
            </ul>

        </div>       

        <div class="evtCtnsBox wb_cts05">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1071_04_05.jpg" alt=""/>
            <ul class="tabs">
                <li><a href="#tab1" id="menu_tab1">전송기술 9급<span>국가직</span></a></li>
                <li><a href="#tab2" id="menu_tab2">통신기술 9급<span>서울/지방직</span></a></li>
                <li><a href="#tab3" id="menu_tab3">통신직 7급</a></li>
                <li><a href="#tab4" id="menu_tab4">전기직 9급</a></li>
                <li><a href="#tab5" id="menu_tab5">전기직 7급</a></li>
                <li><a href="#tab6" id="menu_tab6">군무원<span>전자/통신직</span></a></li>
            </ul>

            {{--전송기술 9급--}}
            <div class="tabContents" id="tab1">
                <p>● 전자공학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>기초전기전자</td>
                        <td>이론</td>
                        <td>2021 최우영 기초전기전자 이론강의</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/169233" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>이론</td>
                        <td>2021 최우영 전자공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/172882" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>디지털공학</td>
                        <td>이론</td>
                        <td>2021 최우영 디지털공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/176064" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2021 최우영 전자공학 단원별문제풀이+ 신규 문제추가 (2020 + 2021)</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/176277" target="_blank">수강신청</a></td>
                    </tr>         
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2021 최우영 전자공학 기출 단원별문풀</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/175434" target="_blank">수강신청</a></td>
                    </tr>   
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2021 [국가직] 최우영 전자공학 실전동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/179654" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2021 [지방직] 최우영 전자공학 파이널 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180553" target="_blank">수강신청</a></td>
                    </tr>
                </table>

                <p>● 무선공학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>무선공학</td>
                        <td>이론</td>
                        <td>2021 최우영 무선/통신 공통 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/169242" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>무선공학</td>
                        <td>이론</td>
                        <td>2021 최우영 무선공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/172885" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>무선공학</td>
                        <td>문제풀이</td>
                        <td>2021 최우영 무선/통신 공통 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/174932" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>무선공학</td>
                        <td>문제풀이</td>
                        <td>2020 최우영 무선공학 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/158348" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>무선공학</td>
                        <td>문제풀이</td>
                        <td>2021 [국가직] 최우영 무선공학 실전동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/179655" target="_blank">수강신청</a></td>
                    </tr>
                </table>
            </div>

            {{--통신기술 9급--}}
            <div class="tabContents" id="tab2">
                <p>● 전자공학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>기초전기전자</td>
                        <td>이론</td>
                        <td>2021 최우영 기초전기전자 이론강의</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/169233" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>이론</td>
                        <td>2021 최우영 전자공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/172882" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>디지털공학</td>
                        <td>이론</td>
                        <td>2021 최우영 디지털공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/176064" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2021 최우영 전자공학 단원별문제풀이+ 신규 문제추가 (2020 + 2021)</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/176277" target="_blank">수강신청</a></td>
                    </tr>  
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2021 최우영 전자공학 기출 단원별문풀</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/175434" target="_blank">수강신청</a></td>
                    </tr>     
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2021 [국가직] 최우영 전자공학 실전동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/179654" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2021 [지방직] 최우영 전자공학 파이널 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180553" target="_blank">수강신청</a></td>
                    </tr>
                </table>

                <p>● 통신이론/공학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>통신이론</td>
                        <td>이론</td>
                        <td>2021 최우영 무선/통신 공통 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/169242" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신이론</td>
                        <td>이론</td>
                        <td>2021 최우영 통신공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180545" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>이론</td>
                        <td>2021 최우영 통신이론 (이론+문풀)</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/174931" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>문제풀이</td>
                        <td>2021 최우영 무선/통신 공통 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/174932" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>문제풀이</td>
                        <td>2021 [지방직/군무원] 최우영 통신공학/통신이론 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180546" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신이론</td>
                        <td>문제풀이</td>
                        <td>2021 [지방직] 최우영 통신이론  파이널 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180554" target="_blank">수강신청</a></td>
                    </tr>
                </table>                
            </div>

            <div class="tabContents" id="tab3">
                <p>● 통신이론/공학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>통신이론</td>
                        <td>이론</td>
                        <td>2021 최우영 무선/통신 공통 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/169242" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신이론</td>
                        <td>이론</td>
                        <td>2021 최우영 통신공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180545" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>이론</td>
                        <td>2021 최우영 통신이론 (이론+문풀)</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/174931" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>문제풀이</td>
                        <td>2021 최우영 무선/통신 공통 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/174932" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>문제풀이</td>
                        <td>2021 [지방직/군무원] 최우영 통신공학/통신이론 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180546" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신이론</td>
                        <td>문제풀이</td>
                        <td>2021 [지방직] 최우영 통신이론  파이널 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180554" target="_blank">수강신청</a></td>
                    </tr>
                </table>
                <p>● 전기자기학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>전기자기학</td>
                        <td>이론</td>
                        <td>2021 최우영 전기자기학 이론강의</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180544" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기자기학</td>
                        <td>문제풀이</td>
                        <td>2020 최우영 전기자기학 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/168185" target="_blank">수강신청</a></td>
                    </tr>
                </table>              
            </div>

            <div class="tabContents" id="tab4">
                <p>● 전기이론</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>전기이론</td>
                        <td>이론</td>
                        <td>2021 최우영 전기이론 기본강의</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/169231" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기이론</td>
                        <td>문제풀이</td>
                        <td>2021 최우영 전기이론 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/175321" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기이론</td>
                        <td>문제풀이</td>
                        <td>2021 [국가직] 최우영 전기이론 실전동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/179652" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기이론</td>
                        <td>문제풀이</td>
                        <td>2021 [지방직] 최우영 전기이론  파이널 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180552" target="_blank">수강신청</a></td>
                    </tr>
                </table>
                <p>● 전기기기</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>전기기기</td>
                        <td>이론</td>
                        <td>2021 최우영 전기기기 기본강의</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/171763" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기기기</td>
                        <td>문제풀이</td>
                        <td>2021 최우영 전기기기 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/175322" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기기기</td>
                        <td>문제풀이</td>
                        <td>2021 [국가직] 최우영 전기기기 실전동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/179653" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기기기</td>
                        <td>문제풀이</td>
                        <td>2021 [지방직] 최우영 전기기기  파이널 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180547" target="_blank">수강신청</a></td>
                    </tr>
                </table>
            </div>

            <div class="tabContents" id="tab5">
                <p>● 전기기기</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>전기기기</td>
                        <td>이론</td>
                        <td>2021 최우영 전기기기 기본강의</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/171763" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기기기</td>
                        <td>문제풀이</td>
                        <td>2021 최우영 전기기기 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/175322" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기기기</td>
                        <td>문제풀이</td>
                        <td>2021 [국가직] 최우영 전기기기 실전동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/179653" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기기기</td>
                        <td>문제풀이</td>
                        <td>2021 [지방직] 최우영 전기기기  파이널 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180547" target="_blank">수강신청</a></td>
                    </tr>
                </table>
                <p>● 전기자기학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>전기자기학</td>
                        <td>이론</td>
                        <td>2021 최우영 전기자기학 이론강의</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180544" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기자기학</td>
                        <td>문제풀이</td>
                        <td>2020 최우영 전기자기학 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/168185" target="_blank">수강신청</a></td>
                    </tr>
                </table>
                <p>● 회로이론</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>회로이론</td>
                        <td>이론</td>
                        <td>2021 최우영 회로이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/179040" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>회로이론</td>
                        <td>문제풀이</td>
                        <td>2020 최우영 회로이론 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/168660" target="_blank">수강신청</a></td>
                    </tr>
                </table>
            </div>

            {{--군무원--}}
            <div class="tabContents" id="tab6">
                <h3 class="NGEB">군무원 전자직 9/7급</h3>
                <p>● 전자공학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>기초전기전자</td>
                        <td>이론</td>
                        <td>2021 최우영 기초전기전자 이론강의</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/169233" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>이론</td>
                        <td>2021 최우영 전자공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/172882" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>디지털공학</td>
                        <td>이론</td>
                        <td>2021 최우영 디지털공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/176064" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2021 최우영 전자공학 단원별문제풀이+ 신규 문제추가 (2020 + 2021)</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/176277" target="_blank">수강신청</a></td>
                    </tr>     
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2021 최우영 전자공학 기출 단원별문풀</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/175434" target="_blank">수강신청</a></td>
                    </tr>             
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2021 [국가직] 최우영 전자공학 실전동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/179654" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2021 [지방직] 최우영 전자공학 파이널 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180553" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2020 [군무원] 최우영 전자회로(전자공학 포함) 최종모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/166792" target="_blank">수강신청</a></td>
                    </tr>
                </table>
                <p>● 전자회로</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>전자회로</td>
                        <td>이론</td>
                        <td>2018 최우영 전자회로 이론 및 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146195" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자회로</td>
                        <td>유료특강</td>
                        <td>2020 [군무원] 최우영 전자공학/전자회로 기출 복원 문풀 FINAL 특강</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/166718" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자회로</td>
                        <td>문제풀이</td>
                        <td>2020 [군무원] 최우영 전자회로 최종모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/166761" target="_blank">수강신청</a></td>
                    </tr>
                </table>

                <h3 class="NGEB">군무원 통신직 9/7급</h3>
                <p>● 전자공학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>기초전기전자</td>
                        <td>이론</td>
                        <td>2021 최우영 기초전기전자 이론강의</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/169233" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>이론</td>
                        <td>2021 최우영 전자공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/172882" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>디지털공학</td>
                        <td>이론</td>
                        <td>2021 최우영 디지털공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/176064" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2021 최우영 전자공학 단원별문제풀이+ 신규 문제추가 (2020 + 2021)</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/176277" target="_blank">수강신청</a></td>
                    </tr>       
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2021 최우영 전자공학 기출 단원별문풀</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/175434" target="_blank">수강신청</a></td>
                    </tr>     
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2021 [국가직] 최우영 전자공학 실전동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/179654" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2021 [지방직] 최우영 전자공학 파이널 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180553" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2019 [군무원대비] 최우영 전자공학 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152733" target="_blank">수강신청</a></td>
                    </tr>
                </table>

                <p>● 통신이론/공학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>통신이론</td>
                        <td>이론</td>
                        <td>2021 최우영 무선/통신 공통 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/169242" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신이론</td>
                        <td>이론</td>
                        <td>2020 최우영 통신공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156379" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>이론</td>
                        <td>2021 최우영 통신이론 (이론+문풀)</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/174931" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>문제풀이</td>
                        <td>2021 최우영 무선/통신 공통 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/174932" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>문제풀이</td>
                        <td>2021 [지방직/군무원] 최우영 통신공학/통신이론 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180546" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신이론</td>
                        <td>문제풀이</td>
                        <td>2021 [지방직] 최우영 통신이론 파이널 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180554" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>문제풀이</td>
                        <td>2020 [군무원] 최우영 통신공학 최종모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/166765" target="_blank">수강신청</a></td>
                    </tr>
                </table>
                <p>● 전기자기학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>전기자기학</td>
                        <td>이론</td>
                        <td>2021 최우영 전기자기학 이론강의</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180544" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기자기학</td>
                        <td>문제풀이</td>
                        <td>2020 최우영 전기자기학 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/168185" target="_blank">수강신청</a></td>
                    </tr>
                </table>
            </div>
        </div><!--wb_cts03//-->          


         <!-- 타이머 -->
         <div class="evtCtnsBox time NGEB"  id="newTopDday">
            <div>
                <table>
                    <tr>                       
                        <td class="time_txt">마감까지</td>
                        <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td class="time_txt">day </td>
                        <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td class="time_txt">:</td>
                        <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td class="time_txt">:</td>
                        <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td class="time_txt">남았습니다.<br></td>                     
                    </tr>
                </table>                
            </div>
        </div>       
             
    </div>
    <!-- End Container -->


    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            /*강의탭*/
            var $active, $links = $(this).find('.tabs li a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
            $links.not($active).each(function () {
                $(this.hash).hide()
            });

            $(".r_btn_tab").click(function () {
                var offset = $('.tabs').offset();
                $('html, body').animate({scrollTop : offset.top}, 400);

                var activeTab = $(this).data("tab-id");
                $(".tabs li a").removeClass("active");
                $('#menu_tab'+activeTab).addClass("active");
                $(".tabContents").hide();
                $('#tab'+activeTab).fadeIn();
                return false;
            });

            $(".tabs li a").click(function(){
                var activeTab = $(this).attr("href");
                $(".tabs li a").removeClass("active");
                $(this).addClass("active");
                $(".tabContents").hide();
                $(activeTab).fadeIn();
                return false;
            });

            /*디데이카운트다운*/
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });


        function go_PassLecture(code) {
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            var url = '{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')   

@stop

