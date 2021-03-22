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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
       
        .evt00 {background:#0a0a0a}

        .evtTop {background:url("https://static.willbes.net/public/images/promotion/2021/03/2130_top_bg.jpg") no-repeat center top;}       
       
        .evt01 {background:#B28357}
      
        .evt02 {background:url("https://static.willbes.net/public/images/promotion/2021/03/2130_02_bg.jpg") no-repeat center top;}    

        .evt03 {background:#fff;padding:150px 0 120px;}
        .evtTab {width:830px; margin:0 auto;}
        .evtTab ul {padding-bottom:50px;}
        .evtTab ul li {display:inline; float:left; width:33.3333%}
        .evtTab ul li a {display:block; text-align:center; padding:20px 0; font-weight:bold; color:#b28358; border:1px solid #b28358; 
            font-size:25px; background:#fff; margin-right:2.5px;margin-bottom:15px; line-height:1.5; }
        .evtTab ul li a:hover,
        .evtTab ul li a.active {background:#252525; color:#fff}
        .evtTab ul li:last-child a {margin:0}
        .evtTab ul:after {content:""; display:block; clear:both}
        .evtTabCts {margin-top:10px}
        .evt03 .check {width:800px; margin:0 auto; padding:20px; font-size:16px; color:#000; text-align:left; letter-spacing:-1px;padding:50px 150px;}
        .evt03 .check input {border: 2px solid #000;margin-right: 10px;height: 25px;width: 25px;}
        .evt03 .check a {display:inline-block; padding:10px; color:#fff; background:#000; margin-left:40px; border-radius:20px; font-size:12px}
        .evt03 .check p {font-size:14px; padding:10px 0 0 20px; line-height:1.4}

        .evt04 {background:#542B95;}            

        /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#f5f5f5; width:100%; padding:10px 0 35px}
        .newTopDday div {font-size:22pt;color:#000; margin-top:10px;}
        .newTopDday ul {width:1210px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; height:60px; padding-top:10px !important; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%}
        .newTopDday ul li:first-child span {font-size:12px; color:#999; margin-top:4px;}
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%}
        .newTopDday ul li:last-child a {display:inline-block; font-size:14px; padding:4px 20px; background:#999; color:#FFF; text-align:center; border-radius:20px}
        .newTopDday ul li:last-child a:hover {background:#666}
        .newTopDday ul li:last-child span {display:block; margin-top:10px}
        .newTopDday ul:after {content:""; display:block; clear:both}

        /*이용안내*/        
        .evtInfo {padding:100px 0;background:#ededed}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:13px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px;color:#3a3a3a;}
        .guide_box dt{margin-bottom:10px; display:inline-block;font-weight:bold; font-size:17px; border-radius:30px;color:#3a3a3a;font-size:25px;}        
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;color:#3a3a3a;font-size:15px}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px;}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;} 

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}

        <input type="hidden" id="chk_price" name="chk_price" value="0"/>
    </form>

    <div class="evtContent NSK" id="evtContainer">      

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div id="ddaytime">
                <ul>
                    <li>
                        <span>윌비스 신광은 경찰 2021~22대비</span>
                        <div class="NSK-Black">2021 T-PASS</div>
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        <a href="#pass" target="_self">수강하기 &gt;</a>
                        <span class="NSK-Black">{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} {{ $arr_promotion_params['etime'] or '' }} 마감!</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1864_first.jpg"  alt="경찰학원부분 1위" />
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2130_top.jpg" alt="신광은 경찰팀 티패스" />
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2130_01.jpg" alt="마지막 여정" />
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2130_02.jpg" alt="가이드" />
        </div>

        <div class="evtTab evtCtnsBox evt03">
            <ul>
                <li><a href="#tab1" class="active">신광은</a></li>
                <li><a href="#tab2">장정훈</a></li>
                <li><a href="#tab3">김원욱</a></li>
                <li><a href="#tab4">하승민/김현정</a></li>
                <li><a href="#tab5">원유철</a></li>
                <li><a href="#tab6">오태진</a></li>
            </ul>
            <div class="evtTabCts" id="tab1">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2130_03_01.jpg" usemap="#Map2130_01" title="신광은" border="0"/>
                <map name="Map2130_01" id="Map2130_01">
                    <area shape="rect" coords="558,332,921,404"  href="javascript:go_PassLecture('180431');" alt="2021 신광은 형사소송법 T-PASS" />
                </map>
            </div>
            <div class="evtTabCts" id="tab2">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2130_03_02.jpg" usemap="#Map2130_02" title="장정훈" border="0"/>
                <map name="Map2130_02" id="Map2130_02">
                    <area shape="rect" coords="558,333,921,404" href="javascript:go_PassLecture('180432');" alt="2021 장정훈 경찰학개론 T-PASS" />
                </map>
            </div>
            <div class="evtTabCts" id="tab3">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2130_03_03.jpg" usemap="#Map2130_03" title="김원욱" border="0"/>
                <map name="Map2130_03" id="Map2130_03">
                    <area shape="rect" coords="559,333,923,406" href="javascript:go_PassLecture('180433');" alt="2021 김원욱 형법 T-PASS" />
                </map>
            </div>
            <div class="evtTabCts" id="tab4">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2130_03_04.jpg" usemap="#Map2130_04" title="하승민/김현정" border="0"/>
                <map name="Map2130_04" id="Map2130_04">
                    <area shape="rect" coords="556,331,924,408" href="javascript:go_PassLecture('180434');" alt="2021 하승민, 김현정 영어 T-PASS" />
                </map>
            </div>
            <div class="evtTabCts" id="tab5">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2130_03_05.jpg" usemap="#Map2130_05" title="원유철" border="0"/>
                <map name="Map2130_05" id="Map2130_05">
                    <area shape="rect" coords="557,334,921,404" href="javascript:go_PassLecture('180435');" alt="2021 오태진 한국사 T-PASS" />
                </map>
            </div>
            <div class="evtTabCts" id="tab6">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2130_03_06.jpg" usemap="#Map2130_06" title="오태진" border="0"/>
                <map name="Map2130_06" id="Map2130_06">
                    <area shape="rect" coords="556,331,922,406" href="javascript:go_PassLecture('180436');" alt="2021 원유철 한국사 T-PASS" />
                </map>
            </div>

            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 T-PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <p>
                    ※ 강의공유, 콘텐츠 부정사용 적발 시, 0원 패스의 수강기간 갱신 및 환급이 불가합니다.<br />
                    ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br/>
                    ※ 쿠폰은 PASS 결제 후 [내강의실>결제관리>쿠폰/수강권관리] 에서 확인 가능합니다.<br />
                    ※ 재수강 & 환승쿠폰은 기간 갱신 가능 패스에는 적용되지 않습니다.
                </p>
            </div>            
        </div>                   
       
        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2130_04.jpg" alt="0원 무제한 패스 구매하러 가기" usemap="#Map2130_buy" border="0" />
            <map name="Map2130_buy" id="Map2130_buy">
                <area shape="rect" coords="342,753,775,830" href="https://police.willbes.net/promotion/index/cate/3001/code/2101" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox evtInfo NGR"> 
            <div class="guide_box" >
                <h2 class="NSK-Black" >T-PASS 이용안내</h2>
                <dl>
                    <dt>▶ T-PASS 패스</dt>
                    <dd>
                        <ol>
                            <li>구매일 기준 5개월 동안 수강 가능합니다. (153일)</li>
                            <li>T-PASS 강좌는 결제가 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>선택한 T-PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다.</li>
                            <li>상품기간 종료 시 수강 중이던 강좌가 모두 종료됩니다.</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>▶ 상품구성</dt>
                    <dd>
                        <ol>
                            <li>신광은 T-PASS : 신광은 교수님의 형사소송법(2021년 대비) 전 강좌를 무제한으로 수강할 수 있습니다.</li>
                            <li>장정훈 T-PASS : 장정훈 교수님의 경찰학개론(2021년 대비) 전 강좌를 무제한으로 수강할 수 있습니다.</li>
                            <li>김원욱 T-PASS : 김원욱 교수님의 형법(2021년 대비) 전 강좌를 무제한으로 수강할 수 있습니다.</li>
                            <li>하승민, 김현정 T-PASS : 하승민, 김현정 교수님의 전 강좌를 무제한으로 수강할 수 있습니다.</li>
                            <li>원유철 T-PASS : 원유철 교수님의 전 강좌를 무제한으로 수강할 수 있습니다.</li>
                            <li>오태진 T-PASS : 오태진 교수님의 전 강좌를 무제한으로 수강할 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>▶ 교재 </dt>
                    <dd>
                        <ol>
                            <li>T-PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>      
                        </ol>
                    </dd>

                    <dt>▶ 수강 안내</dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내강의실] → [무한PASS존]으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 [강좌추가]를 클릭, 원하는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>강의는 순차 업로드 예정이며 업로드 일정은 강의 진행일정에 따라 변경될 수 있습니다.</li>
                            <li>T-PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>T-PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다. 총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대</li>
                            <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다.  ([내강의실] → [무한PASS존]에서 등록기기정보 확인) 추후 초기화가 필요할 시 유선(온라인 고객센터)이나 게시판을 통해 요청이 가능하고, 수강 기간 동안 3회 신청이 가능합니다.</li>
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>

                    <dt>▶ 환불정책 </dt>
                    <dd>
                        <ol>
                            <li>전액환불 : 결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>부분환불 : 결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분 만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, T-PASS 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다. (온라인 모의고사 등 이용 시에도 차감)</li>
                            <li>교재 포인트를 사용했을 경우 사용한 포인트만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다. (교재 포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
                        </ol>
                    </dd>

                    <dt>▶ 유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 부탁드립니다.</li>
                            <li>T-PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                            <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사는 제공되지 않습니다.</li>
                            <li>온,오프라인 동시에 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공 될 수 있습니다.</li>
                            <li>PASS관련 발급된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수될 수 있으며, 동일한 혜택이 적용되지 않을 수 있습니다.</li>
                        </ol>
                    </dd>
                    <br>

                    <dt>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</dt>
                    
                </dl>
            </div>
		</div>

    </div>
    <!-- End evtContainer -->

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or ""}}');
        });

         /*탭*/
        $(document).ready(function(){
            $('.evtTab').each(function(){
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

         /*수강신청 동의*/ 
         function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }    


    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-69505110-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-69505110-4');
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop