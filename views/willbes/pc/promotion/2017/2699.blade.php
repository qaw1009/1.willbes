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
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; font-size:14px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/12/2438_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#002643;}

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/09/2367_03_bg.jpg) no-repeat center top; height:949px}
        .evt02 .gobtn {width:380px; margin: 50px auto 0; height:92px; line-height:92px}
        .evt02 .gobtn a {display:block; color:#fff; background:#37b5ff; font-size:26px}
        .evt02 .gobtn a:hover {background:#000}

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
        .tabCts .prof-clip-btn a {display:inline-block; margin-right:5px; position: relative; border:1px solid #ccc}
        .tabCts .prof-clip-btn a img.play {position:absolute; top:0; left:0; z-index: 10; opacity:0.7;}
        .tabCts .prof-clip-btn a:hover img.play {opacity:1;}
        .tabCts .pkgBuy {display:flex; justify-content: space-between; margin:20px 0 40px}
        .tabCts .pkgBuy div {flex-grow: 1;}
        .tabCts .pkgBuy a {display:block; line-height:1.3; font-weight:bold; background:#111; color:#fff; padding:20px 0; text-align:center; margin-right:10px}
        .tabCts .pkgBuy div:nth-of-type(even) a {background:#4b66b0;}
        .tabCts .pkgBuy a:hover {background:#ffd800 !important; color:#111}
        .tabCts .pkgBuy div:last-child a {margin:0}
        .tabCts .pkgBuy strong {display:block; font-size:18px}


        .tabCts .buyWrap h4 {font-size:24px; margin-bottom:20px}
        .tabCts .buyWrap h5 {font-size:16px; margin-bottom:10px}
        .tabCts .buyWrap .basket {display:flex; justify-content: space-between; line-height:1.4; margin-bottom:40px}
        .tabCts .buyWrap .lecbox {width:calc((100% / 2) - 10px);}
        .tabCts .buyWrap .lecbox ul {border:1px solid #c4c4c4; border-top:4px solid #313131; padding:10px 10px 10px 20px; background:#f4f4f4; height:200px; margin-bottom:15px; overflow-y:scroll;}
        .tabCts .buyWrap .lecbox li {padding:10px 20px 10px 0; border-bottom:1px solid #ccc; position: relative;}
        .tabCts .buyWrap .lecbox li:last-child {border:0}
        .tabCts .buyWrap .lecbox li a {position:absolute; top:10px; right:0; z-index: 2; background:#fff}
        .tabCts .buyWrap .lecbox li > strong {color:#2c4fad}
        .tabCts .buyWrap .lecbox li .price {margin-top:5px; }
        .tabCts .buyWrap .lecbox li .price strong {color:#ff0000}
        .tabCts .buyWrap .lecbox li .price span {color:#0070c0; float:right}
        .tabCts .buyWrap .lecbox > div {text-align:right; font-size:16px}
        .tabCts .buyWrap .lecbox > div p:nth-child(1) {font-size:24px; color:#7f7f7f; font-weight:bold}
        .tabCts .buyWrap .lecbox > div p:nth-child(2) {padding-bottom:10px; margin-bottom:10px; border-bottom:1px solid #7f7f7f;color:#0070c0}
        .tabCts .buyWrap .lecbox > div p strong {color:#0070c0}
        .tabCts .buyWrap .lecbox > div p strong:last-child {color:#ff0000}
        .tabCts .buyWrap .lecbox > div p a {display:inline-block; padding:10px 20px; color:#fff; background:#111}
        .tabCts .buyWrap .lecbox > div p a:hover {background-color:#ffd800; color:#111}
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
        .evtInfoBox li a {font-size:12px; padding:4px 5px; color:#fff; background:#333; display:inline-block; border-radius:4px}

        .willbes-Layer-CurriBox {top:2300px; margin-left: -560px;}

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

        .slide_con {position:relative; width:1121px; margin:0 auto; padding-top:293px}
        .slide_con p {position:absolute; top:50%; width:57px; height:57px; z-index:100}
        .slide_con p a {cursor:pointer; display: block; opacity: .5;}
        .slide_con p a:hover {opacity:1;}
        .slide_con p.leftBtn {left:15px; top:72%;}
        .slide_con p.rightBtn {right:15px;top:72%;}
    </style>

    <div class="p_re evtContent NSK ssam" id="evtContainer">
        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2438_top.jpg" alt="2022학년도 연간패키지"/>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2438_01.jpg" alt="열공지원금 팡팡"/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/09/2367_03_01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/09/2367_03_02.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/09/2367_03_03.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/09/2367_03_04.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2021/09/2367_arrowL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2021/09/2367_arrowR.png"></a></p>
            </div> 
            <div class="gobtn"><a href="https://ssam.willbes.net/support/review/index" target="_blank">합격수기 자세히 보기 ></a></div>
        </div>


        {{-- 핫클립 상품 Box(ajax data) evt03--}}
        <div id="hotclip_box"></div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <a href="https://ssam.willbes.net/support/notice/show?board_idx=416076&s_cate_code_disabled=Y" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/12/2438_04.jpg" alt="초심을 잃지 마세요~!"/></a>
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">[하반기 패키지 강의 신청시 유의사항]</h4>
                <ul>
                    <li>학원강의를 신청하신 경우, 개강일 및 강의 교재 등을 꼼꼼히 확인하시기 바랍니다.</li>
                    <li>온라인 강의를 신청하신 경우, 제공되는 기간 및 배수 등을 꼼꼼히 확인하기 바랍니다. (과목별 상이합니다.)</li>
                    <li>패키지 강의의 수강 기간은 시험일까지 충분하게 제공됩니다. 수강 기간 중 일시정지 및 강의 연장이 불가합니다. </li>
                    <li>7월 이후 진행되는 문제풀이 및 모의고사 강의는 강의 자료를 다운받는 행위 자체가 '강의수강'으로 간주 됩니다.</li>
                    <li>수강료의 총액을 동영상강의(50%)와 프린트(50%)로 간주하여 강의 승인 후 프린트를 다운로드 한 경우 수강료의 50%를 공제한 후 
                        학원의 설립·운영 및 과외교습에 관한 법률 시행령(약칭: 학원법 시행령) 18조 3항의 규정에 따라 환불 절차가 진행됩니다.</li>
                    <li>할인혜택을 받아서 수강하신 경우에도 환불 시, 원 수강료에서 기산 됩니다.</li>
                    <li>수강 환불 문의는 홈페이지 1:1상담 게시판을 통하여 문의하시면 신속한 답변을 얻을 수 있습니다. <a href="https://ssam.willbes.net/support/qna/index" target="_blank">1:1 상담 게시판 ></a>
                    </li>
                    <li>학원의 수강증 및 동영상의 ID는 양도 및 매매 또는 공유가 불가능하며, 위반시 처벌을 받게 됩니다.</li>
                    <li>상기 강의 일정 및 동영상 업로드 일정은 학원의 사정상 변경될 수 있습니다.</li>
                </ul>
            </div>
        </div>

        {{--교수 youtube 팝업 --}}
        <div id="youtube" class="willbes-Layer-youtube">
            <div class="popupWrap">
                <a class="closeBtn" href="javascript:void(0);" onclick="closeWin('sec-prof-layer'),closeWin('youtube')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <iframe src="https://www.youtube.com/embed/Y2W3lUrn3aI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        {{--교수 커리큘럼 팝업 --}}
        <div id="Curriculum" class="willbes-Layer-CurriBox">
            <div class="popupWrap">
                <a class="closeBtn" href="javascript:void(0);" onclick="closeWin('sec-prof-layer'),closeWin('Curriculum')">
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

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript">
        $( document ).ready( function() {
            AOS.init();
        } );

        $(document).ready(function () {
            /* 핫클립 상품 페이지 로드 */
            var _url = '{!! front_url('/promotion/ajaxHotClipProduct') !!}';
            _url += '?online_disc_code={{ (empty($arr_promotion_params["online_disc_code"]) === false ? $arr_promotion_params["online_disc_code"] : '') }}';
            _url += '&off_disc_code={{ (empty($arr_promotion_params["off_disc_code"]) === false ? $arr_promotion_params["off_disc_code"] : '') }}';
            sendAjax(_url, '', function(ret) {
                $('#hotclip_box').html(ret);
            }, null, false, 'GET', 'html');

            /* 수기 */
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:3000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1,
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
    </script>
@stop