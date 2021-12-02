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

        .tabCts {width:780px;}
        .tabCts .btnBox {position:absolute; bottom:30px; left:50px; text-align:left}
        .tabCts .prof-top-btn a {display:inline-block; color:#fff; padding:4px 10px 4px 22px; margin-right:4px}
        .tabCts .prof-top-btn a:nth-of-type(1) {background:#0a2230 url("https://static.willbes.net/public/images/promotion/main/2018/icon01.png") 
            no-repeat 5px center}
        .tabCts .prof-top-btn a:nth-of-type(2) {background:#0a2230 url("https://static.willbes.net/public/images/promotion/main/2018/icon02.png") 
        no-repeat 5px center}
        .tabCts .prof-top-btn a:nth-of-type(3) {background:#0a2230 url("https://static.willbes.net/public/images/promotion/main/2018/icon03.png") 
            no-repeat 5px center}
        .tabCts .prof-clip-btn {margin-top:14px}
        .tabCts .prof-clip-btn a {display:inline-block; margin-right:5px}
        .tabCts .hotclip {position:absolute; top:225px; left:355px;}

        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2438_04_bg.jpg) no-repeat center top;}
        .evt05 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2438_05_bg.jpg) no-repeat center top;}

        .evtInfo {padding:80px 0; background:#fff; color:#242424; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox h4 span {color:#e30000}
        .evtInfoBox h5 {font-size:18px; margin-bottom:10px; font-weight:bold}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:30px; margin-bottom:10px}

        .ssam-Lnb {
            width: 300px;
            text-align:left;            
        }
        .ssam-Lnb .lnb-List {border:1px solid #a2a2a2; border-bottom;0}
        .ssam-Lnb .lnb-List .ssam-lnb-List-Tit a {
            display: block;
            height: 50px;
            font-size: 18px;
            font-weight:bold;
            color: #000;
            line-height: 50px;
            border-bottom: 1px solid #b2b2b2;
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
        .ssam-Lnb .lnb-List .lnb-List-Depth dl dt:last-child a {border:0}

        .ssam .willbes-Layer-youtube {
            display: none;
            background:#000;
            position: absolute;
            top: 50px;
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
                <div class="lnb-List">
                    <div class="ssam-lnb-List-Tit">
                        <a href="#none">유·초등</a>
                    </div>
                    <div class="lnb-List-Depth">
                        <dl>
                            <dt><a href="#none">유아 민정선</a></dt>
                            <dt><a href="#none">초등 배재민</a></dt>
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
                <div id="tab01" class="p_re">
                    <div>
                        <img src="https://static.willbes.net/public/images/promotion/2021/12/2438_prof_mjs.jpg" alt="특별이벤트"/>
                        <div class="btnBox">
                            <div class="prof-top-btn">                            
                                <a href="#none" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                                <a href="https://ssam.willbes.net/professor/show/prof-idx/51076?cate_code=3135&subject_idx=1981">교수님 홈</a>
                            </div> 
                            <div class="prof-clip-btn">
                                <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                                <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>   
                                <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>                    
                            </div> 
                        </div>
                    </div>
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
            <a class="closeBtn" href="#none" onclick="closeWin('sec-prof-layer'),closeWin('youtube')">
                <img src="{{ img_url('prof/close.png') }}">
            </a>
            <iframe src="https://www.youtube.com/embed/Y2W3lUrn3aI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                
        </div>
        {{--교수 커리큘럼 --}}
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
/*
        $(document).ready(function(){
            $('.tabs ul').each(function(){
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
        );*/
    </script>
@stop