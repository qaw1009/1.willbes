@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        .sky {position:fixed; top:225px;right:25px;z-index:10;}
        .sky a {display:block;padding-top:15px;}

        /*타이머*/
        .time {position:absolute; top:1273px; left:50%; width:920px; margin-left:-460px; text-align:center;}
        .time {text-align:center; padding:20px 0}
        .time ul {width:100%;}
        .time ul:after {content:''; display:block; clear:both}
        .time li {display:inline; float:left; line-height:61px; font-size:24px; margin-right:10px}
        .time li:first-child {margin-left:80px}
        .time li img {width:44px}
        .time .time_txt {color:#000; letter-spacing:-1px}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ff6600}
        to{color:#d63e4d}
        }
        @@-webkit-keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ff6600}
        to{color:#d63e4d}
        }        

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/02/2064_top_bg.jpg) no-repeat center top;} 
        
        .wb_01 {background:#ECECEC}     

        .wb_02 {background:#fff}     
        .check {position:absolute;bottom:50px;left:50%;margin-left:-490px;width:980px;padding: 20px 0px 20px 10px;letter-spacing:3;color:#fff;z-index:5;}
        .check label {cursor:pointer;font-size:16px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:25px; width:25px;}
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#000; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}

        /* 이용안내 */
        .wb_info {padding:100px 0;}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:13px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; 
        padding:5px 20px; font-weight:bold; font-size:17px; border-radius:30px}        
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px; font-size:12px}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;}               
        
    </style>
    
    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky">
            <a href="#apply"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2064_sky.png" alt="문제풀이" >
            </a>     
            <a href="https://pass.willbes.net/promotion/index/cate/3024/code/2099" target="_blank"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2064_sky2.png" alt="전략" >
            </a>                     
        </div>

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2064_top.jpg" alt="군무원 문제풀이 PASS" usemap="#Map2064_apply" border="0"/>
            <map name="Map2064_apply" id="Map2064_apply">
                <area shape="rect" coords="751,1430,980,1527" href="#apply" />
            </map>
            <div class="time NGEB" id="newTopDday">
                <ul>
                    <li class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}</span> 마감!</li>
                    <li class="time_txt"><span>남은 시간은</span></li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">일</li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>             
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2064_01.jpg" alt="교수진 라입업 및 정보"/>
        </div>             
        
        <div class="evtCtnsBox wb_02" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2064_02.jpg" alt="바로 신청하기" usemap="#Map2064_go" border="0"/>
            <map name="Map2064_go" id="Map2064_go">
                <area shape="rect" coords="288,866,474,931"  href="javascript:go_PassLecture('178781');" alt="행정직 윌비스 군무원팀" />
                <area shape="rect" coords="818,866,1004,931" href="javascript:go_PassLecture('178822');" alt="행정직 민족 군무원팀" />
                <area shape="rect" coords="289,1554,474,1621" href="javascript:go_PassLecture('178823');" alt="군수직" />
                <area shape="rect" coords="818,1555,1005,1621" href="javascript:go_PassLecture('178893');" alt="정보직" />
            </map>  
             <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 윌비스 군무원 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#guide">이용안내확인하기 ↓</a>
            </div>     
        </div>

        <div class="evtCtnsBox wb_info" id="guide">
            <div class="guide_box">
                <h2 class="NSK-Black">윌비스 군무원 문제풀이 PASS 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 PASS는 군무원 대비 과정으로, 각 상품별 참여 교수진의 전 강좌를 배수 제한 없이 무제한으로 수강 가능합니다.</li>
                            <li>수강 가능 교수진<br>
                            - 행정직 &lt;윌비스 군무원팀&gt; : 국어 기미진, 행정학 김덕관, 행정법 이석준 ㅣ 행정직 &lt;민족군무원팀&gt; : 국어 오대혁, 행정학 김덕관, 행정법 임병주<br>
                            - 군수직 : 국어 오대혁, 행정법 임병주, 경영학 황선호 ㅣ 정보직(군사/기술) : 국어 오대혁, 국가정보학 민진규, 정보사회론 황선호     
                            </li>
                            <li>2021년 대비 기출문제풀이, 진도별문제풀이, 동형모의고사 강좌를 커리큘럼 진행에 따라 순차적으로 제공해드리는 상품입니다.<br>
                                (일부 교수진의 경우, 학원 사정으로 인하여 신규 과정이 업데이트 되지 않을 수 있으며 해당 경우에는 이전 연도 과정을 수강해주셔야 합니다.)
                            </li>
                            <li>참여 교수진의 강의 진행 일정은 과목별로 상이하게 진행될 수 있으며, 학원 사정에 따라 부득이하게 커리큘럼 및 교수진이 추가/변경될 수 있다는 점 숙지   부탁드립니다.<br>
                                (과목별 교수진의 제공 과정은 수강신청 상세안내 화면을 참고해주시기 바랍니다.)
                            </li>
                        </ol>
                    </dd>

                    <dt>수강기간</dt>
                    <dd>
                        <ol>
                            <li>수강기간은 상품 상세 안내 페이지에 표시된 기간만큼 제공되며, 결제가 완료되는 즉시 수강이 시작됩니다.</li>
                        </ol>
                    </dd>

                    <dt>수강관련</dt>
                    <dd>
                        <ol>
                            <li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                            <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭, 워하는 과목/교수님/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                            <li>본 PASS를 이용 중에는 일시정지 기능을 사용할 수 없습니다.</li>
                            <li>본 PASS 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                            - PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)</li>
                            <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.</li>                           
                        </ol>
                    </dd>

                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>본 PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도로 구입 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>환불정책</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 전액 환불 가능합니다.</li>
                            <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</li>
                            <li>본 상품은 특별 기획 상품으로, 수강시작일(결제 당일 포함)로부터 7일 경과 후 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 차감하고 환불됩니다.<br>
                                · 결제금액 - (강좌 정상가의 1일 이용대금×이용일수)
                            </li>
                        </ol>
                    </dd>

                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선/적립금 사용 등 혜택이 적용되지 않습니다.</li>
                            <li>선택한 교수의 강의가 학원 사정에 의해 부득이하게 진행되지 않을 경우 대체 강의가 제공되며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유 적발 시 회원 자격 박탈 및 환불 불가하며, 추가적인 불법 공유 행위 적발 시 형사고발조치가 단행될 수 있습니다.</li>
                        </ol>
                    </dd>

                </dl>
                <div class="inquire">※ 이용 문의 : 윌비스 고객만족센터 1544-5006</div>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script>  

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });        

        /* 수강신청 */
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop