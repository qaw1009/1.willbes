@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; font-size:14px}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/12/2438_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#002643;}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2438_02_bg.jpg) no-repeat center top;}

        .evt03 {width:1120px; margin:0 auto; padding:100px 0; display: flex; justify-content: space-between;}

        .ssam-Lnb {
            width: 300px;
            text-align:left;            
        }
        .ssam-Lnb .lnb-List {border:1px solid #a2a2a2; border-top:0}
        .ssam-Lnb .lnb-List .ssam-lnb-List-Tit a {
            display: block;
            height: 50px;
            font-size: 18px;
            font-weight:bold;            
            border-top: 1px solid #b2b2b2;
            color: #000;
            line-height: 50px;            
            padding-left: 20px;            
            position:relative;
            background:#e4e4e4 url("https://static.willbes.net/public/images/promotion/2021/12/2438_arrowDown.png") no-repeat 90% center;
        }
        .ssam-Lnb .lnb-List .ssam-lnb-List-Tit.hover a {
            color: #0d74ae;
            background-image: url("https://static.willbes.net/public/images/promotion/2021/12/2438_arrowUp.png");
        }

        .ssam-Lnb .lnb-List .lnb-List-Depth {
            display: none;
            background: #fff;            
            border-top: 1px solid #b2b2b2;
            border-bottom: 1px solid #ececec;
        }
        .ssam-Lnb .lnb-List .lnb-List-Depth dl dt a {
            display: block;
            font-size: 16px;
            color: #3a3a3a;
            padding:15px 20px;
            border-bottom:1px solid #ddd;
        }
        .ssam-Lnb .lnb-List .lnb-List-Depth dl dt a:hover,
        .ssam-Lnb .lnb-List .lnb-List-Depth dl dt a.active {
            background: #ffd800;
        }
        .ssam-Lnb .lnb-List .lnb-List-Depth dl dt:last-child,
        .ssam-Lnb .lnb-List .lnb-List-Depth dl dt:last-child a {border-bottom:0}

        .tabCts {width:780px; text-align:left} 
        .tabCts .btnBox {position:absolute; bottom:30px; left:50px;}
        .tabCts .prof-top-btn a {display:inline-block; color:#fff; padding:4px 10px 4px 22px; margin-right:4px}
        .tabCts .prof-top-btn a:nth-of-type(1) {background:#0a2230 url("https://static.willbes.net/public/images/promotion/main/2018/icon01.png") 
            no-repeat 5px center}
        .tabCts .prof-top-btn a:nth-of-type(2) {background:#0a2230 url("https://static.willbes.net/public/images/promotion/main/2018/icon02.png") 
        no-repeat 5px center}
        .tabCts .prof-top-btn a:nth-of-type(3) {background:#0a2230 url("https://static.willbes.net/public/images/promotion/main/2018/icon03.png") 
            no-repeat 5px center}
        .tabCts .prof-top-btn a:hover {background-color:#ffd800; color:#0a2230}
 
        .tabCts .prof-clip-btn {margin-top:14px}
        .tabCts .prof-clip-btn a {display:inline-block; margin-right:5px; position: relative;}
        .tabCts .prof-clip-btn a img.play {position:absolute; top:0; left:0; z-index: 10; opacity:0.7;}
        .tabCts .prof-clip-btn a:hover img.play {opacity:1;}
        .tabCts .pkgBuy {display:flex; justify-content: space-between; margin:20px 0 40px}
        .tabCts .pkgBuy div {flex-grow: 1;}
        .tabCts .pkgBuy a {display:block; line-height:1.3; font-weight:bold; background:#111; color:#fff; padding:20px 25px; text-align:center; margin-right:10px}
        .tabCts .pkgBuy div:nth-of-type(even) a {background:#4b66b0;}
        .tabCts .pkgBuy a:hover {background:#ffd800 !important; color:#111}
        .tabCts .pkgBuy div:last-child a {margin:0}
        .tabCts .pkgBuy strong {display:block; font-size:18px}

   
        .tabCts .buyWrap h4 {font-size:24px; margin-bottom:20px}
        .tabCts .buyWrap h5 {font-size:16px; margin-bottom:10px}
        .tabCts .buyWrap .basket {display:flex; justify-content: space-between; line-height:1.4; margin-bottom:40px}
        .tabCts .buyWrap .lecbox {width:calc((100% / 2) - 10px);}
        .tabCts .buyWrap .lecbox ul {border:1px solid #c4c4c4; border-top:4px solid #313131; padding:20px; background:#f4f4f4; min-height:150px; margin-bottom:15px}
        .tabCts .buyWrap .lecbox li {padding:5px 0}
        .tabCts .buyWrap .lecbox li strong {color:#2c4fad}
        .tabCts .buyWrap .lecbox div {text-align:right; font-size:16px}
        .tabCts .buyWrap .lecbox div p:nth-child(2) {font-size:24px; padding-bottom:10px; margin-bottom:10px; border-bottom:1px solid #7f7f7f; color:#7f7f7f; font-weight:bold}
        .tabCts .buyWrap .lecbox div p strong {color:#0070c0}
        .tabCts .buyWrap .lecbox div p strong:last-child {color:#ff0000}
        .tabCts .buyWrap .lecbox div p a {display:inline-block; padding:10px 20px; color:#fff; background:#111}
        .tabCts .buyWrap .lecbox div p a:hover {background-color:#ffd800; color:#111}
        .tabCts .buyWrap .checkWrap input {width:18px; height:18px}
        .tabCts .buyWrap .checkWrap label {cursor: pointer}

        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2438_04_bg.jpg) no-repeat center top;}
        .evt05 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2438_05_bg.jpg) no-repeat center top;}

        .evtInfo {padding:80px 0; background:#fff; color:#242424; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox h4 span {color:#e30000}
        .evtInfoBox h5 {font-size:18px; margin-bottom:10px; font-weight:bold}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:30px; margin-bottom:10px}

        .willbes-Layer-CurriBox {top:2300px}

        .ssam .willbes-Layer-youtube {
            display: none;
        }
        .ssam .willbes-Layer-youtube .popupWrap {
            display:flex; justify-content: center;align-items: center;
            background:#000;
            position: absolute;
            top: 2300px;
            z-index: 110;
            width: 860px;
            height: 484px;
            border: 1px solid #2f2f2f;
            left: 50%;
            margin-left: -445px;
        }
        .ssam .willbes-Layer-youtube .closeBtn {
            position: absolute;
            top: -33px;
            right: -2px;
        }
        .ssam .willbes-Layer-youtube iframe {width:860px; height:484px}

    </style>

    <div class="p_re evtContent NSK ssam" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2438_top.jpg" alt="2022학년도 연간패키지"/>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2438_01.jpg" alt="열공지원금 팡팡"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2438_02.jpg" alt="특별이벤트"/>
        </div>

        <div class="evtCtnsBox evt03">
            <div class="ssam-Lnb">
                <div class="lnb-List tabs">
                    <div class="ssam-lnb-List-Tit">
                        <a href="#none">유·초등</a>
                    </div>
                    <div class="lnb-List-Depth">
                        <dl>
                            <dt><a href="#tab01" class="active">유아 민정선</a></dt>
                            <dt><a href="#tab02">초등 배재민</a></dt>
                        </dl>
                    </div>
                    <div class="ssam-lnb-List-Tit">
                        <a href="#none">교육학 논술</a> 
                    </div>
                    <div class="lnb-List-Depth">
                        <dl>
                            <dt><a href="#none">교육학 이인재</a></dt>
                        </dl>
                    </div>
                    <div class="ssam-lnb-List-Tit">
                        <a href="#none">중등(국·영·수)</a>
                    </div>
                    <div class="lnb-List-Depth">
                        <dl>
                            <dt><a href="#none">국교론/문교론 송원영</a></dt>
                            <dt><a href="#none">문법 권보민</a></dt>
                            <dt><a href="#none">전공국어 구동언</a></dt>
                            <dt><a href="#none">일영/영미문학 김유석</a></dt>
                            <dt><a href="#none">수학내용학 김철홍</a></dt>
                            <dt><a href="#none">수학교육론 박태영</a></dt>
                            <dt><a href="#none">수학교육론 박혜향</a></dt>
                        </dl>
                    </div>
                    <div class="ssam-lnb-List-Tit">
                        <a href="#none">중등(사회·과학)</a>
                    </div>
                    <div class="lnb-List-Depth">
                        <dl>
                            <dt><a href="#none">일반사회 허역팀</a></dt>
                            <dt><a href="#none">생물내용학 박태영</a></dt>
                        </dl>
                    </div>
                    <div class="ssam-lnb-List-Tit">
                        <a href="#none">중등(음·체·전산·중국어)</a>
                    </div>
                    <div class="lnb-List-Depth">
                        <dl>
                            <dt><a href="#none">음악 다이애나</a></dt>
                            <dt><a href="#none">전기전자통신 최우영</a></dt>
                            <dt><a href="#none">정보컴퓨터 송광진</a></dt>
                            <dt><a href="#none">중국어 장경미</a></dt>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="tabCts">
                <div id="tab01" class="profBox">
                    <div class="p_re">
                        <img src="https://static.willbes.net/public/images/promotion/2021/12/2438_prof_mjs.jpg" alt="유아 민정선"/>
                        <div class="btnBox">
                            <div class="prof-top-btn">                            
                                <a href="#none" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                                <a href="https://ssam.willbes.net/professor/show/prof-idx/51076?cate_code=3135&subject_idx=1981">교수님 홈</a>
                            </div> 
                            <div class="prof-clip-btn">
                                <a onclick="openWin('sec-prof-layer'),openWin('youtube')">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/12/icon_youtube.png" class="play">
                                    <img src="https://ssam.willbes.net/public/uploads/willbes/etc/hotclip/2021/0818/thumbnail_0_20210818153134.jpg" title="유튜브">
                                </a>
                                <a onclick="openWin('sec-prof-layer'),openWin('youtube')">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/12/icon_youtube.png" class="play">
                                    <img src="https://ssam.willbes.net/public/uploads/willbes/etc/hotclip/2021/0818/thumbnail_0_20210818153134.jpg" title="유튜브">
                                </a>   
                                <a onclick="openWin('sec-prof-layer'),openWin('youtube')">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/12/icon_youtube.png" class="play">
                                    <img src="https://ssam.willbes.net/public/uploads/willbes/etc/hotclip/2021/0818/thumbnail_0_20210818153134.jpg" title="유튜브">
                                </a>                    
                            </div> 
                        </div>
                    </div>
                    <div class="pkgBuy">
                        <div>
                            <a href="#none">
                                연간패키지 - 논술포함
                                <strong>학원직강 신청</strong>
                            </a>
                        </div>
                        <div>
                            <a href="#none">
                                연간패키지 - 논술포함
                                <strong>동영상강의 신청</strong>
                            </a>
                        </div>
                        <div>
                            <a href="#none">
                                연간패키지 - 논술제외
                                <strong>학원직강 신청</strong>
                            </a>
                        </div>
                        <div>
                            <a href="#none">
                                연간패키지 - 논술제외
                                <strong>동영상강의 신청</strong>
                            </a>
                        </div>
                    </div>        
                </div>

                <div id="tab02" class="profBox">
                    <div class="p_re">
                        <img src="https://static.willbes.net/public/images/promotion/2021/12/2438_prof_bjm.jpg" alt="초등 배재민"/>
                        <div class="btnBox">
                            <div class="prof-top-btn">                            
                                <a href="#none" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                                <a href="https://ssam.willbes.net/professor/show/prof-idx/51076?cate_code=3135&subject_idx=1981">교수님 홈</a>
                            </div> 
                            <div class="prof-clip-btn">
                                <a onclick="openWin('sec-prof-layer'),openWin('youtube')">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/12/icon_youtube.png" class="play">
                                    <img src="https://ssam.willbes.net/public/uploads/willbes/etc/hotclip/2021/0818/thumbnail_0_20210818153134.jpg" title="유튜브">
                                </a>
                                <a onclick="openWin('sec-prof-layer'),openWin('youtube')">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/12/icon_youtube.png" class="play">
                                    <img src="https://ssam.willbes.net/public/uploads/willbes/etc/hotclip/2021/0818/thumbnail_0_20210818153134.jpg" title="유튜브">
                                </a>   
                                <a onclick="openWin('sec-prof-layer'),openWin('youtube')">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/12/icon_youtube.png" class="play">
                                    <img src="https://ssam.willbes.net/public/uploads/willbes/etc/hotclip/2021/0818/thumbnail_0_20210818153134.jpg" title="유튜브">
                                </a>                    
                            </div> 
                        </div>
                    </div>
                    <div class="pkgBuy">
                        <div>
                            <a href="#none">
                                연간패키지 - 논술포함
                                <strong>학원직강 신청</strong>
                            </a>
                        </div>
                        <div>
                            <a href="#none">
                                연간패키지 - 논술포함
                                <strong>동영상강의 신청</strong>
                            </a>
                        </div>
                    </div>        
                </div>

                <div class="buyWrap">
                    <h4 class="NSK-Black">· 2023학년도 대비  연간패키지 신청내역</h4>
                    <div class="basket">
                        <div class="lecbox">
                            <h5><strong>학원직강 연간패키지</strong> 신청내역</h5>
                            <ul>
                                <li><strong>교수명</strong> 교육학 연간패키지
                                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/12/btn_del.png" alt="삭제"></a></li>
                                <li><strong>교수명</strong> 영어학 연간패키지
                                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/12/btn_del.png" alt="삭제"></a></li>
                                <li><strong>교수명</strong> 일반영어 연간패키지
                                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/12/btn_del.png" alt="삭제"></a></li>
                            </ul>
                            <div>
                                <p>100,000(10%) 할인</p>
                                <p><strong>3과목</strong> 결제금액 <strong>4,523,666</strong>원</p>
                                <p><a href="#none">결제하기</a></p>
                            </div>
                        </div>
                        <div class="lecbox">
                            <h5><strong>학원직강 연간패키지</strong> 신청내역</h5>
                            <ul>
                                <li><strong>교수명</strong> 교육학 연간패키지
                                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/12/btn_del.png" alt="삭제"></a></li>
                                <li><strong>교수명</strong> 영어학 연간패키지
                                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/12/btn_del.png" alt="삭제"></a></li>
                                <li><strong>교수명</strong> 일반영어 연간패키지
                                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/12/btn_del.png" alt="삭제"></a></li>
                            </ul>
                            <div>
                                <p>100,000(10%) 할인</p>
                                <p><strong>3과목</strong> 결제금액 <strong>4,523,666</strong>원</p>
                                <p><a href="#none">결제하기</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="checkWrap"><input type="checkbox" id="check"> <label for="check">페이지 하단의 상품 관련 유의사항을 모두 확인하였고, 이에 동의합니다.</label></div>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2438_04.jpg" alt="초심을 잃지 마세요~!"/>
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2438_05.jpg" alt="합격 패키지"/>
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black"><span>[ 필독 ]</span>  연간패키지 초심응원 이벤트 유의사항</h4>
                <ul>
                    <li>본 패키지의 수강 기간은 365일 이며, 수강 기간 중  “일시중지” 및 “(유료)연장”은 할 수 없습니다.</li>
                    <li>본 패키지는 과목에 따라 수강 기간이 1년(365일) 이하의 상품도 포함될 수 있습니다. (과목별 안내 사항 참고)</li>
                    <li>본 패키지는 1차 대비 강의만 포함됩니다. (2차 강의는 별도)</li>
                    <li>본 패키지 강의는 양도 및 매매가 불가능하며, 위반시 처벌 받을 수 있습니다.</li>                     
                </ul>
                <h5>[선착순 1,000명 이벤트]</h5>  
                <ul>
                    <li>본 패키지의 수강 기간은 365일 이며, 수강 기간 중  “일시중지” 및 “(유료)연장”은 할 수 없습니다.</li>
                    <li>본 패키지는 과목에 따라 수강 기간이 1년(365일) 이하의 상품도 포함될 수 있습니다. (과목별 안내 사항 참고)</li>
                    <li>본 패키지는 1차 대비 강의만 포함됩니다. (2차 강의는 별도)</li>
                    <li>본 패키지 강의는 양도 및 매매가 불가능하며, 위반시 처벌 받을 수 있습니다.</li>                     
                </ul>
                <h5>[환불 규정]</h5>  
                <ul>
                    <li>패키지 강의의 환불은 수강기간, 수강 여부, 자료 다운 유무 등에 따라 금액을 공제하며, 강좌의 원 금액을 기준으로 공제가 됩니다.</li> 
                    <li>패키지 강의 환불 신청은 홈페이지 1:1게시판을 통하여 가능합니다.</li> 
                    <li>문화상품권 수령 후, 패키지 강의 환불을 요청하실 때에는 받으신 문화상품권에 대한 금액은 차감 됩니다. (제세공과금이 포함된 금액 차감)</li>                     
                </ul>             
            </div>
        </div>

        {{--교수 youtube 팝업 --}}
        <div id="youtube" class="willbes-Layer-youtube">
            <div class="popupWrap">
                <a class="closeBtn" href="#none" onclick="closeWin('sec-prof-layer'),closeWin('youtube')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <iframe src="https://www.youtube.com/embed/Y2W3lUrn3aI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>   
            </div>             
        </div>
        {{--교수 커리큘럼 팝업 --}}
        <div id="Curriculum" class="willbes-Layer-CurriBox">
            <div class="popupWrap">
                <a class="closeBtn" href="#none" onclick="closeWin('sec-prof-layer'),closeWin('Curriculum')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">민정선</span> 교수님 커리큘럼</div>
                <div class="Layer-Cont">
                    <img src="https://ssam.willbes.net/public/uploads/willbes/board/92/2020/1127/board_305025_01_20201127150717.jpg"/>
                </div>  
            </div>             
        </div>
        <div id="sec-prof-layer" class="willbes-Layer-Black"></div>

    </div>
    <!-- End Container -->



    <script type="text/javascript">
        $(function() {
            $('div.ssam-lnb-List-Tit').click(function() {
                $('div.ssam-lnb-List-Tit').removeClass('hover');

                if ($(this).next().is(':visible')) {
                    $(this).next().slideUp('normal');
                    $(this).removeClass('hover');

                } else {
                    $('div.lnb-List-Depth').slideUp('normal');
                    $(this).next().slideDown('normal');
                    $(this).addClass('hover');

                }   
            });
        });
    </script>
@stop