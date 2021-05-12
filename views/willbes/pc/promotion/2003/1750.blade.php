@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

         /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#f5f5f5; width:100%; padding:10px 0 35px}
        .newTopDday ul {width:1210px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; height:60px; padding-top:10px !important; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%; line-height:70px;}
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%;line-height:70px;}
        .newTopDday ul li:last-child a {display:inline-block; font-size:14px; padding:4px 20px; background:#999; color:#FFF; text-align:center; border-radius:20px}
        .newTopDday ul li:last-child a:hover {background:#666}
        .newTopDday ul:after {content:""; display:block; clear:both}

        .wb_top {background:#ececec url(https://static.willbes.net/public/images/promotion/2020/07/1750_top_bg.jpg) no-repeat center top;}

        .wb_03 {background:#fff url(https://static.willbes.net/public/images/promotion/2020/07/1750_03_bg.jpg) no-repeat center top;}        
        
        .wb_04 {background:#efefef;position:relative;}
        .check {color:#000; font-size:15px;font-weight:bold;position:absolute;left:50%;top:50%;margin-left:-417px;margin-top:325px;}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#000; margin-left:50px; border-radius:20px}
        .check a.infotxt:hover {background:#3E7A7A;}    
        
        .wb_05 {padding:100px 0}
         /* 이용안내 */
        .guide_box{width:960px; margin:0 auto; border:2px solid #202020;padding:50px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:17px;}        
        .guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
        .guide_box dd strong {color:#555}
        .guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:13px;}
        .guide_box dd:after {content:""; display:block; clear:both}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;}        
    </style>
    
    <div class="p_re evtContent NSK" id="evtContainer">      

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div id="ddaytime">
                <ul>
                    <li>
                        <span>{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} 24:00 마감!</span>
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
                        <span>남았습니다.</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1750_top.jpg" alt="군무원 파이널 패스 문풀"/>            
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1750_01.jpg" alt="기출문제풀이"/>           
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1750_02.jpg" alt="단원별 문제풀이"/>           
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1750_03.jpg" alt="동형모의고사"/>           
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1750_04.jpg" alt="수강신청" usemap="#Map1750A" border="0"/>
            <map name="Map1750A" id="Map1750A">
                <area shape="rect" coords="663,605,950,717" href="javascript:go_PassLecture('170032');"  alt="수강신청" />
            </map>     
            <div class="check" id="chkInfo">   
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                        페이지 하단 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#info" class="infotxt">이용안내확인하기 ↓</a>
            </div>                 
        </div>        

        <div class="evtCtnsBox wb_05" id="info">
            <div class="guide_box">
                <h2 class="NSK-Black">지방직 7급 실전마스터 PASS 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 PASS는 윌비스 7급 교수진의 지정 과정을 배수 제한 없이 무제한으로 수강 가능한 상품입니다.</li>
                            <li>수강 가능 과목 및 교수진 <br>
                                - 국어 : 기미진 (아침특강 제외)<br>
                                - 영어 : 한덕현(기출리뷰,스나이퍼32, 9급 국가/지방직 모의고사, 7급 지방직대비 문제풀이과정, 아작내기특강만 제공), 성기건(2019 새벽모의고사 6개월분만 제공)<br>
                                - 한국사 : 조민주, 행정학 : 김덕관, 행정법 : 황남기/한세훈, 헌법 : 황남기/유시완, 경제학 : 황정빈</li>
                            <li>본 PASS는 2020년도 대비에 맞추어 개강된 강의를 제공해드리는 상품입니다.<br>
                                - 제공 과정 : 기출문제풀이, 단원별 문제풀이, 실전동형모의고사</li>
                            <li>교수진 사정으로 강의가 부득이하게 진행되지 않을 시, 대체 강의를 제공해드립니다.</li>
                        </ol>
                    </dd>

                    <dt>수강기간</dt>
                    <dd>
                        <ol>
                            <li>구매일로부터 수강신청 상세 안내 화면에 표기된 기간만큼 제공되며, 결제가 완료되는 즉시 수강이 시작됩니다.</li>
                        </ol>
                    </dd>

                    <dt>수강관련</dt>
                    <dd>
                        <ol>
                            <li> 먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.
                            <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 과목/교수/강좌를 선택 등록 후 수강할 수 있습니다.</li>   
                            <li>본 PASS를 이용 중에는 일시정지/수강연장/재수강 기능을 사용할 수 없습니다.</li>   
                            <li>본 PASS 수강 시 이용가능한 기기는 다음과 같이 제한됩니다.<br>
                            - PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)</li>   
                            <li>PC/모바일 기기초기화는 최초 1회에 한해 본인 직접 초기화 가능하며, 추가로 단말기 초기화를 원하시는 경우 고객센터로 문의주시기 바랍니다.<br>
                            (단, 고객센터를 통한 단말기 초기화 진행 시 콘텐츠 공유 방지를 위해 사유 확인 후 최대 2회까지만 단말기 초기화가 가능합니다. [총 3회])</li>                            
                        </ol>
                    </dd>

                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 교재를 별도 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도 구매 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>환불정책</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 전액 환불 가능합니다.</li>
                            <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</li>
                            <li>고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, 정가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.</li>
                        </ol>
                    </dd>

                    <dd>
                        <p class="inquire">※ 이용 문의 : 1544-5006</p>
                    </dd>
                </dl>
            </div>
        </div>

    </div> 
    <!-- End Container -->
    <script type="text/javascript"> 

        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            @if(empty($arr_promotion_params['edate']) === false)
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
            @endif
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop