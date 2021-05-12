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

        .skybanner {position:fixed;top:80px;right:10px;z-index:10; text-align:center}
        .skybanner a {display:block; margin-bottom:5px}

        .wb_top_gif {background:#221823;}

        /*타이머*/
        .time {width:100%; text-align:center; background:#000}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {/*font-size:40px*/}
        .time table td img {width:70%}
        .time .time_txt {font-size:28px; color:#fff; letter-spacing: -1px; font-weight:600}
        .time .time_txt a {font-size:14px; display:block; margin-top:10px; border:1px solid #fff; padding:5px; border-radius:15px}
        .time .time_txt a:hover {background:#fff; color:#000}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time p {text-align:center}

        .wb_top {background:url("https://static.willbes.net/public/images/promotion/2020/09/1071_top_bg.jpg") no-repeat center top;position:relative;}

        .pass_package {position:absolute;left:50%;margin-left:-525px;top:100px;}

        .YouTube {width:920px; margin:0 auto; text-align:center;position:absolute;left:50%;margin-left:-460px;bottom:-65px;}
        .YouTube li {display:inline; float:left; width:33.3333%;padding-bottom:130px;}
        .YouTube li span {margin-top:20px; font-size:15px !important; font-weight:500 !important; color:#fff; letter-spacing:-1px;}
        .YouTube .text{position:absolute;left:50%;top:115px;}
        .YouTube:after {content:""; display:block; clear:both}
        
        /* 탭 */
        .tabContaier{padding-top:20px; padding-bottom:120px; position:absolute;left:515px;top:730px; z-index:10}
        .tabContaier ul {text-align:center; margin:0 auto}
        .tabContaier li {display:inline; float:left;}
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContaier ul:after {content:''; display:block; clear:both}
        .tabContentsEvt iframe {width:876px; height:480px;}

        .wb_cts01_1 {background:#9E97FF url("https://static.willbes.net/public/images/promotion/2020/01/1071_01_bg.jpg") no-repeat center top;}
        .wb_cts01_2 {background:#E4E4E4;}
        .wb_cts01_3 {background:#9E97FF url("https://static.willbes.net/public/images/promotion/2021/03/1071_01_3_bg.jpg") no-repeat center top;}
        .wb_cts01_3 div {width:1120px; margin:0 auto; position:relative}    

        .wb_cts02 {background:#ffd84f;}  
        .wb_cts02 div {width:1120px; margin:0 auto; position:relative}    

        .wb_cts03 {background:#ffd84f; padding-bottom:100px}
        .wb_cts03 ul {width:960px; margin:0 auto}
        .wb_cts03 li {display:inline; float:left; width:16.666666%}
        .wb_cts03 li a {display:block; height:60px; line-height:60px; text-align:center; font-size:16px; position:relative; border:1px solid #1e1e1e; margin-right:5px}
        .wb_cts03 li a span {position:absolute; display:block; left:50%; top:-10px; width:90px; margin-left:-45px; padding:0 10px; font-size:12px; color:#fff; 
        background:#1e1e1e; height:24px; line-height:20px; border:2px solid #ffd84f; border-radius:20px;
        }
        .wb_cts03 li a.active,
        .wb_cts03 li a:hover {background:#1e1e1e; color:#ffd84f}
        .wb_cts03 li:last-child a {margin:0}
        .wb_cts03 ul:after {content:''; display:block; clear:both}
        .wb_cts03 .tabContents {width:960px; margin:16px auto 0; background:#fff; padding:50px 30px; text-align:left}
        .wb_cts03 .tabContents h3 {font-size:22px; color:#930f0d; margin:20px 0}
        .wb_cts03 .tabContents p {font-size:18px; margin:20px 0}
        .wb_cts03 table {background:#fff; width:100%; background:#fff} 
        .wb_cts03 tr {border-bottom:1px solid #ccc}        
        .wb_cts03 tr.st01 {background:#ececec}
        .wb_cts03 tr:hover {background:#f9f9f9}
        .wb_cts03 th,
        .wb_cts03 td {padding:10px; font-size:14px; font-weight:500;}
        .wb_cts03 th {background:#5f5f5f; color:#fff}
        .wb_cts03 td:nth-child(1) {text-align:center}
        .wb_cts03 td:nth-child(2) {text-align:center}
        .wb_cts03 td:nth-child(3) {color:#930f0d}
        .wb_cts03 td:last-child {border:0}
        .wb_cts03 td p {font-size:12px}
		.wb_cts03 table a {padding:10px 15px; color:#202020; background:#ffd84f; font-size:14px; display:block; border-radius:20px; text-align:center}
        .wb_cts03 table a.btn2 {color:#666; background:#fff; border:1px solid #666; cursor:default}
        .wb_cts03 table a:hover {background:#202020; color:#fff;}
        .wb_cts03 table a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}
       
        /*탭(텍스트)*/
        .tabContaier2{width:960px;margin:0 auto;}
        .tabContaier2 li{display:inline-block;width:480px;height:60px;line-height:60px;background:#e8be2d;color:#000;float:left;font-size:18px;font-weight:bold;margin-top:-59.9px;}
        .tabContaier2:after {content:""; display:block; clear:both}
        .tabContaier2 li a{display:block;}
        .tabContaier2 li a:hover,
        .tabContaier2 li a.active {background:#e4e4e4;color:#000;}

        .wb_cts04 {background:#e4e4e4;position:relative;padding-bottom:150px;}

        .check { position:absolute; bottom:7%; left:50%; margin-left:-490px; width:980px; padding:20px 0px 20px 10px; letter-spacing:3;z-index:5;font-weight:bold;}
        .check label {cursor:pointer; font-size:14px}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#252525; margin-left:50px; border-radius:20px}
        .check a:hover {background:#ffc600; color:#252525}
        
        input[id="cb1"]:checked + label {background-color: red;}

        .wb_tip{background:#fff; padding:100px 0;}
        

    </style>
    <div class="p_re evtContent NGR" id="evtContainer">        
        <div class="skybanner">
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1728" target="_blank" >
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1071_sky02.png" alt="">
            </a> 
            <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2027" target="_blank" >
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1071_sky03.png" alt="">
            </a>
            <a href="#pkg" >
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1071_sky04.png" alt="">
            </a>     
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

        <div class="evtCtnsBox wb_top_gif" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1071_graph.gif" alt="역대급 성적향상"  />        
        </div>       
        
        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1071_top.jpg" alt="통신/전기 최우영" >
            <div class="pass_package">
                <a href="https://pass.willbes.net/promotion/index/cate/3028/code/1468" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2020/09/1071_sky.png" alt="합격패키지" >
                </a>
            </div>
            <ul class="YouTube">
                <li>
                    <a href="https://youtu.be/FYzC6MElEzw?rel=0 " target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1071_preview1.png" alt="전기전자 참쉽죠?">
                        </span>
                    </a>    
                </li>
                <li>
                    <a href="https://youtu.be/9dxrpJ6TOZg?rel=0 " target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1071_preview2.png" alt="변조이론">
                        </span>
                    </a>    
                </li>
                <li>
                    <a href="https://youtu.be/_RDnE7u4k8U?rel=0 " target="_blank">
                        <span>
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1071_preview3.png" alt="직렬별 출제">
                        </span>
                    </a>    
                </li>   
            </ul>  
        </div>       

        <div class="evtCtnsBox wb_cts01_1">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1071_01_1.jpg" alt="이유있는 선택"  > 
        </div>    

        <div class="evtCtnsBox wb_cts01_2">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1071_01_2.jpg" alt="커리큘럼"  > 
        </div>   

        <div class="evtCtnsBox wb_cts01_3">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1071_01_3.jpg" alt="전기직/통신직 5과목"  > 
                <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2027" title="시작하기" style="position: absolute; left: 33.66%; top: 81.51%; width: 32.41%; height: 7.13%; z-index: 2;" target="_blank"></a>
            </div>
        </div>   

        <div class="evtCtnsBox wb_cts02" id="pkglec">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/04/1071_03_1.jpg" alt="윌비스 최우영 교수의 전기/통신직 패키지"/>
                <a href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/171526" title="통신기술직" style="position: absolute; left: 10.54%; top: 32.67%; width: 22.77%; height: 2.6%; z-index: 2;" target="_blank"></a>
                <a href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/171527" title="전송기술직" style="position: absolute; left: 38.13%; top: 32.67%; width: 22.77%; height: 2.6%; z-index: 2;" target="_blank"></a>
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/171762" title="전기직" style="position: absolute; left: 66.34%; top: 32.67%; width: 22.77%; height: 2.6%; z-index: 2;" target="_blank"></a>
                 <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/180909" title="지방직 통신기술직" style="position: absolute; left: 63.3%; top: 46.61%; width: 19.02%; height: 2.31%; z-index: 2;" target="_blank"></a>
                 <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/180908" title="지방직 전기직" style="position: absolute; left: 63.3%; top: 54.61%; width: 19.02%; height: 2.31%; z-index: 2;" target="_blank"></a>
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/179673" title="국가직 문풀" style="position: absolute; left: 63.3%; top: 65.61%; width: 19.02%; height: 2.31%; z-index: 2;" target="_blank"></a>
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/179678" title="전기직 기출문풀" style="position: absolute; left: 63.3%; top: 73.85%; width: 19.02%; height: 2.31%; z-index: 2;" target="_blank"></a>
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/177169" title="국가직 실전동형모고" style="position: absolute; left: 63.04%; top: 83.73%; width: 19.02%; height: 2.31%; z-index: 2;" id="pkg" target="_blank"></a>
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/176489" title="전기직 실전동형모고" style="position: absolute; left: 63.3%; top: 91.88%; width: 19.02%; height: 2.31%; z-index: 2;" target="_blank"></a>
            </div>
        </div>       

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1071_04.jpg" alt="윌비스 최우영 교수 단과 수강신청"/><br>
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

    <script type="text/javascript">
        var ytb01_url = "https://www.youtube.com/embed/rPN9bxcaiLU";
        var ytb02_url = "https://www.youtube.com/embed/eRrHTbcFBtY";

        $(document).ready(function(){
            /*영상탭*/
            $(".tabContentsEvt").hide();
            $(".tabContentsEvt:first").show();
            $(".youtubeTab a").click(function(){
                var activeTab = $(this).attr("href");
                var html_str = "";
                if(activeTab == "#ytb01"){
                    html_str = "<iframe src='"+ytb01_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#ytb02"){
                    html_str = "<iframe src='"+ytb02_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#ytb03"){
                    html_str = "<iframe src='"+ytb03_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#ytb04"){
                    html_str = "<iframe src='"+ytb04_url+"' allowfullscreen></iframe>";
                }
                $(".youtubeTab a").removeClass("active");
                $(this).addClass("active");
                $(".tabContentsEvt").hide();
                $(".tabContentsEvt").html('');
                $(activeTab).html(html_str);
                $(activeTab).fadeIn();
                return false;
            });

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

            /*탭(텍스터버전)*/
            $(".tabContents2").hide();
            $(".tabContents2:first").show();
            $(".tabContaier2 ul li a").click(function(){
                tpassTabClick(this);
            });

            $(".tabContents2 li a").click(function(){
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

        function tpassTabClick(obj) {
            var activeTab = $(obj).attr("href");
            $(".tabContaier2 ul li a").removeClass("active");
            $(activeTab + '_btn').addClass("active");
            $(".tabContents2").hide();
            $(activeTab).fadeIn();
            return false;
        }

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

