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
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
  
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2021/06/2242_top_bg.jpg) no-repeat center top;}
        .event01 {background:#f0f0f0} 

        .event02 {padding-bottom:150px}
        .event02 .btn {margin-top:50px}
        .event02 .btn a {display:block; width:400px; margin:0 auto; background:#2b2a25; color:#fff; padding:15px 0; font-size:26px}
        .event02 .btn a:hover {background:#000; color:#f7c8b8}

        .event03 {background:#f7c8b8; padding:150px 0}
        .event03 .wrap {width:1030px; margin:0 auto;}
        .event03 .tabs {width:200px; float:left}
        .event03 .tabs a {display:block; text-align:left; font-size:16px; border:1px solid #2b2a25; border-bottom:0; height:40px; line-height:40px; padding:0 15px}
        .event03 .tabs a:last-child {border-bottom:1px solid #2b2a25}
        .event03 .tabs a span {float:right}
        .event03 .tabs a:hover,
        .event03 .tabs a.active {background:#2b2a25; color:#fff} 
        .event03 .tabCts {float:right; position:relative}
        .event03 .tabCts a {position:absolute; z-index: 2;}
        .event03 .tabCts a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}
        .event03 .tabCts span {position:absolute; left:70px; bottom:35px; z-index: 2;}
        .event03 .tabCts span a {border:1px solid #2f2f2f; color:#2f2f2f; height:40px; line-height:40px; display:inline-block; position:relative; margin-right:10px; padding:0 15px 0 40px; font-size:15px}
        .event03 .tabCts span a.view,
        .event03 .tabCts span a.sample {background:url(https://static.willbes.net/public/images/promotion/2021/06/2242_icon01.png) no-repeat 15px center;}
        .event03 .tabCts span a.home {background:url(https://static.willbes.net/public/images/promotion/2021/06/2242_icon02.png) no-repeat 15px center;}
        .event03 .wrap:after {content:''; display:block; clear:both}

        .event03 .urlWrap {width:1030px; margin:0 auto}
        .urlWrap .urladd {padding:20px; background:#2e2e3c; color:#fff; margin:40px auto 20px; font-size:14px}
        .urlWrap .urladd input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; background:#f5f5f5; vertical-align:middle; width:70%; margin:0 10px; color:#000}
        .urlWrap .urladd a {display:inline-block; height:28px; line-height:28px; color:#2e2e3c; background:#ffc943; padding:0 20px; vertical-align:middle}
        .urlWrap .evt_table {width:100%; background-color:#fff !important; padding:20px 0}
        .urlWrap .evt_table table td {font-size:14px; text-align:center}
        .urlWrap .evt_table table td:nth-child(2) {text-align:left}
        .urlWrap .txtinfo {line-height:1.4; text-align:left; font-size:16px; margin-top:50px; color:#fff}
        .urlWrap .txtinfo h4 {font-size:30px; margin-bottom:20px; font-weight:bold}
        .urlWrap .txtinfo li {list-style-type: disc; margin-left:20px; margin-bottom:5px}

        .evtBox {width:1120px; margin:0 auto; position:relative}
        .evtBox a:hover {background:rgba(0,0,0,.2)}

        .evtInfo {padding:80px 0; background:#494949; font-size:16px; color:#fff}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}
        .evtInfoBox li a {display:inline-block; border:1px solid #fff; font-size:12px; padding:3px 10px; margin-left:10px;}
        .evtInfoBox li a:hover {background:#fff; color:#333}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:980px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; width:22px; height:37px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-80px; top:46%;}
        .slide_con p.rightBtn {right:-80px;top:46%;}
    </style>

    <div class="p_re evtContent NSK">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2021/06/2242_top.jpg" alt="윌비스임용 하반기 패키지"/>
        </div>

        <div class="evtCtnsBox event01">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2242_01.jpg" alt="문제풀이의 중요성"/>
        </div>        

        <div class="evtCtnsBox event02">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2242_02.jpg" alt="수강후기"/>   
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2242_02_01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2242_02_02.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2242_02_03.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2242_02_04.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2021/06/2242_arrow_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2021/06/2242_arrow_next.png"></a></p>
            </div> 
            <div class="btn"><a href="#none">합격수기 자세히 보기 ></a></div>        
        </div> 

        <div class="evtCtnsBox event03">
            <div class="wrap">
                <div class="tabs">
                    <a href="#tab01">초등 <span>배재민</span></a>
                    <a href="#tab02">교육학논술 <span>이인재</span></a>
                    <a href="#tab03">전공국어 <span>송원영</span></a>
                    <a href="#tab04">전공국어 <span>권보민</span></a>
                    <a href="#tab05">전공영어 <span>김유석</span></a>
                    <a href="#tab06">전공영어 <span>김영문</span></a>
                    <a href="#tab07">수학교육론 <span>박태영</span></a>
                    <a href="#tab08">도덕윤리 <span>김병찬</span></a>
                    <a href="#tab09">전공역사 <span>최용림</span></a>
                    <a href="#tab10">전공음악 <span>다이애나</span></a>
                    <a href="#tab11">전기전자통신 <span>최우영</span></a>
                    <a href="#tab12">정보컴퓨터 <span>송광진</span></a>
                    <a href="#tab13">전공중국어 <span>정경미</span></a>
                </div>
                <div class="tabCts">
                    <div id="tab01">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/2242_03_t01.png" alt="배재민" />
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182497" title="학원강의" target="_blank" style="left: 8.15%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <a href="https://ssam.willbes.net/package/show/cate/3136/pack/648001/prod-code/182495" title="온라인강의" target="_blank" style="left: 36.79%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <span>
                            <a href="javascript:fnPlayerSample('178011','1272380','HD');" class="view" target="_blank">설명회보기</a>
                            <a href="javascript:fnPlayerSample('180506','1284408','HD');" class="sample" target="_blank">샘플강의보기</a>
                            <a href="https://ssam.willbes.net/professor/show/prof-idx/51077?cate_code=3136&subject_idx=1982" class="home" target="_blank">교수페이지</a>
                        </span>
                    </div>

                    <div id="tab02">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/2242_03_t02.png" alt="이인재" />
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/178331" title="학원강의" target="_blank" style="left: 8.15%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/178327" title="온라인강의" target="_blank" style="left: 36.79%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <span>
                            <a href="javascript:fnPlayerSample('174863','1256181','HD');" class="view" target="_blank">설명회보기</a>
                            <a href="javascript:fnPlayerSample('180505','1284406','HD');" class="sample" target="_blank">샘플강의보기</a>
                            <a href="https://ssam.willbes.net/professor/show/prof-idx/51074?cate_code=3134&subject_idx=1980" class="home" target="_blank">교수페이지</a>
                        </span>
                    </div>

                    <div id="tab03">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/2242_03_t03.png" alt="송원영" />
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182465" title="송원영+권보민 학원" target="_blank" style="left: 8.02%; top: 75.12%; width: 21.85%; height: 10.47%;"></a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182466" title="송원영+권보민 온라인" target="_blank" style="left: 30.15%; top: 75.12%; width: 21.85%; height: 10.47%;"></a>
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182460" title="학원강의" target="_blank" style="left: 53.95%; top: 75.12%; width: 21.85%; height: 10.47%;"></a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182463" title="온라인강의" target="_blank" style="left: 75.93%; top: 75.12%; width: 21.85%; height: 10.47%;"></a>
                        <span>
                            <a href="javascript:fnPlayerSample('177278','1268655','HD');" class="view" target="_blank">설명회보기</a>
                            <a href="javascript:fnPlayerSample('180507','1284409','HD');" class="sample" target="_blank">샘플강의보기</a>
                            <a href="https://ssam.willbes.net/professor/show/prof-idx/51078?cate_code=3137&subject_idx=1983" class="home" target="_blank">교수페이지</a>
                        </span>
                    </div>

                    <div id="tab04">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/2242_03_t04.png" alt="권보민" />
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182465" title="송원영+권보민 학원" target="_blank" style="left: 8.02%; top: 75.12%; width: 21.85%; height: 10.47%;"></a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182466" title="송원영+권보민 온라인" target="_blank" style="left: 30.15%; top: 75.12%; width: 21.85%; height: 10.47%;"></a>
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182469" title="학원강의" target="_blank" style="left: 53.95%; top: 75.12%; width: 21.85%; height: 10.47%;"></a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182470" title="온라인강의" target="_blank" style="left: 75.93%; top: 75.12%; width: 21.85%; height: 10.47%;"></a>
                        <span>
                            <a href="javascript:fnPlayerSample('178013','1272383','HD');" class="view" target="_blank">샘플강의(1)보기</a>
                            <a href="javascript:fnPlayerSample('180509','1284429','HD');" class="sample" target="_blank">샘플강의(2)보기</a>
                            <a href="https://ssam.willbes.net/professor/show/prof-idx/51080?cate_code=3137&subject_idx=1983" class="home" target="_blank">교수페이지</a>
                        </span>
                    </div>

                    <div id="tab05">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/2242_03_t05.png" alt="김유석" />
                        <a href="javascript:alert('6월 18일부터 접수');" title="학원강의" style="left: 8.15%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <a href="javascript:alert('6월 18일부터 접수');" title="온라인강의" style="left: 36.79%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <span>
                            <a href="javascript:fnPlayerSample('177269','1267102','HD');" class="view" target="_blank">설명회보기</a>
                            <a href="javascript:fnPlayerSample('179276','1278897','HD');" class="sample" target="_blank">합격사례발표보기</a>
                            <a href="https://ssam.willbes.net/professor/show/prof-idx/51081?cate_code=3137&subject_idx=1984" class="home" target="_blank">교수페이지</a>
                        </span>
                    </div>

                    <div id="tab06">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/2242_03_t06.png" alt="김영문" />
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182455" title="학원강의" target="_blank" style="left: 8.15%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182456" title="온라인강의" target="_blank" style="left: 36.79%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <span>
                            <a href="javascript:fnPlayerSample('174875','1256221','HD');" class="view" target="_blank">설명회보기</a>
                            <a href="javascript:fnPlayerSample('180511','1284412','HD');" class="sample" target="_blank">샘플강의보기</a>
                            <a href="https://ssam.willbes.net/professor/show/prof-idx/51082?cate_code=3137&subject_idx=1984" class="home" target="_blank">교수페이지</a>
                        </span>
                    </div>

                    <div id="tab07">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/2242_03_t07.png" alt="박태영" />
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176975" title="학원강의" target="_blank" style="left: 8.15%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176963" title="온라인강의" target="_blank" style="left: 36.79%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <span>
                            <a href="javascript:fnPlayerSample('178018','1272389','HD');" class="view" target="_blank">샘플강의(1)보기</a>
                            <a href="javascript:fnPlayerSample('180513','1284419','HD');" class="sample" target="_blank">샘플강의(2)보기</a>
                            <a href="https://ssam.willbes.net/professor/show/prof-idx/51085?cate_code=3137&subject_idx=1986" class="home" target="_blank">교수페이지</a>
                        </span>
                    </div>

                    <div id="tab08">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/2242_03_t08.png" alt="김병찬" />
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176759" title="학원강의" target="_blank" style="left: 8.15%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176753" title="온라인강의" target="_blank" style="left: 36.79%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <span>
                            <a href="javascript:fnPlayerSample('178019','1272395','HD');" class="view" target="_blank">샘플강의(1)보기</a>
                            <a href="javascript:fnPlayerSample('180515','1284421','HD');" class="sample" target="_blank">샘플강의(2)보기</a>
                            <a href="https://ssam.willbes.net/professor/show/prof-idx/51088?cate_code=3137&subject_idx=1989" class="home" target="_blank">교수페이지</a>
                        </span>
                    </div>

                    <div id="tab09">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/2242_03_t09.png" alt="최용림" />
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182498" title="학원강의" target="_blank" style="left: 8.15%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182496" title="온라인강의" target="_blank" style="left: 36.79%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <span>
                            <a href="javascript:fnPlayerSample('177113','1267652','HD');" class="view" target="_blank">설명회보기</a>
                            <a href="javascript:fnPlayerSample('178020','1272398','HD');" class="sample" target="_blank">샘플강의보기</a>
                            <a href="https://ssam.willbes.net/professor/show/prof-idx/51089?cate_code=3137&subject_idx=1990" class="home" target="_blank">교수페이지</a>
                        </span>
                    </div>

                    <div id="tab10">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/2242_03_t10.png" alt="다이애나" />
                        <a href="javascript:alert('준비중입니다.');" title="학원강의" style="left: 8.15%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <a href="javascript:alert('준비중입니다.');" title="온라인강의" style="left: 36.79%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <span>
                            <a href="javascript:fnPlayerSample('177403','1269590','HD');" class="view" target="_blank">설명회보기</a>
                            <a href="javascript:fnPlayerSample('178069','1272637','HD');" class="sample" target="_blank">샘플강의보기</a>
                            <a href="https://ssam.willbes.net/professor/show/prof-idx/51090?cate_code=3137&subject_idx=1991" class="home" target="_blank">교수페이지</a>
                        </span>
                    </div>

                    <div id="tab11">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/2242_03_t11.png" alt="최우영" />
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182654" title="학원강의" target="_blank" style="left: 8.15%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182650" title="온라인강의" target="_blank" style="left: 36.79%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <span>
                            <a href="javascript:fnPlayerSample('177588','1270307','HD');" class="view" target="_blank">설명회보기</a>
                            <a href="javascript:fnPlayerSample('178021','1272402','HD');" class="sample" target="_blank">샘플강의보기</a>
                            <a href="https://ssam.willbes.net/professor/show/prof-idx/51091?cate_code=3137&subject_idx=1992" class="home" target="_blank">교수페이지</a>
                        </span>
                    </div>

                    <div id="tab12">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/2242_03_t12.png" alt="송광진" />
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182500" title="학원강의" target="_blank" style="left: 8.15%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182499" title="온라인강의" target="_blank" style="left: 36.79%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <span>
                            <a href="javascript:fnPlayerSample('174887','1256241','HD');" class="view" target="_blank">설명회보기</a>
                            <a href="javascript:fnPlayerSample('178022','1272405','HD');" class="sample" target="_blank">샘플강의보기</a>
                            <a href="https://ssam.willbes.net/professor/show/prof-idx/51092?cate_code=3137&subject_idx=1993" class="home" target="_blank">교수페이지</a>
                        </span>
                    </div>

                    <div id="tab13">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/2242_03_t13.png" alt="정경미" />
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182653" title="학원강의" target="_blank" style="left: 8.15%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182649" title="온라인강의" target="_blank" style="left: 36.79%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <span>
                            <a href="javascript:fnPlayerSample('177264','1268646','HD');" class="view" target="_blank">설명회보기</a>
                            <a href="javascript:fnPlayerSample('178024','1272411','HD');" class="sample" target="_blank">샘플강의보기</a>
                            <a href="https://ssam.willbes.net/professor/show/prof-idx/51094?cate_code=3137&subject_idx=1995" class="home" target="_blank">교수페이지</a>
                        </span>
                    </div>

                </div>
            </div>            
        </div> 

        <div class="eventWrap evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">하반기 패키지 강의 신청시 유의사항</h4>
                <ul>
                    <li>학원강의를 신청하신 경우, 개강일 및 강의 교재 등을 꼼꼼히 확인하시기 바랍니다. </li>
                    <li>온라인 강의를 신청하신 경우, 제공되는 기간 및 배수 등을 꼼꼼히 확인하기 바랍니다. (과목별 상이합니다.)</li>
                    <li>패키지 강의의 수강 기간은 시험일까지 충분하게 제공됩니다. 수강 기간 중 일시정지 및 강의 연장이 불가합니다. </li>
                    <li>7월 이후 진행되는 문제풀이 및 모의고사 강의는 강의 자료를 다운받는 행위 자체가 '강의수강'으로 간주 됩니다.</li>
                    <li>수강료의 총액을 동영상강의(50%)와 프린트(50%)로 간주하여 강의 승인 후 프린트를 다운로드 한 경우 수강료의 50%를 공제한 후 
                        학원의 설립·운영 및 과외교습에 관한 법률 시행령(약칭: 학원법 시행령) 18조 3항의 규정에 따라 환불 절차가  진행됩니다. </li>
                    <li>할인혜택을 받아서 수강하신 경우에도 환불 시, 원 수강료에서 기산 됩니다. </li>
                    <li>수강 환불 문의는 홈페이지 1:1상담 게시판을 통하여 문의하시면 신속한 답변을 얻을 수 있습니다. 
                    <a href="https://ssam.willbes.net/support/qna/index" target="_blank">1:1 상담 게시판 바로가기</a></li>
                    <li>학원의 수강증 및 동영상의 ID는 양도 및 매매 또는 공유가 불가능하며, 위반시 처벌을 받게 됩니다. </li>
                    <li>상기 강의 일정 및 동영상 업로드 일정은 학원의 사정상 변경될 수 있습니다.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">  
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1,
                adaptiveHeight: true,
                slideWidth:980,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });

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

                    e.preventDefault()}
                )}
            )}
        );
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop