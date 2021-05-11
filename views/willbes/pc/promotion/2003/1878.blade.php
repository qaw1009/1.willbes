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
        .newTopDday {background:#e4e4e4; width:100%; padding:15px 0 40px}
        .newTopDday ul {width:1120px; margin:0 auto;}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-size:28px; height:60px; line-height:60px; padding-top:10px !important; font-weight:bold; color:#000}
        .newTopDday ul li strong {line-height:60px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%; font-size:16px; color:#666; line-height:1.3; }
        .newTopDday ul li:first-child span { font-size:28px; color:#000; }
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%; line-height:60px}
        .newTopDday ul:after {content:""; display:block; clear:both}

        .wb_top {background:#392517 url(https://static.willbes.net/public/images/promotion/2020/10/1878_top_bg.jpg) no-repeat center top;}

        .wb_01 {background:#AE9791 url(https://static.willbes.net/public/images/promotion/2020/10/1878_01_bg.jpg) no-repeat center top;}

        .wb_02 {background:#D6C7C2 url(https://static.willbes.net/public/images/promotion/2020/10/1878_02_bg.jpg) no-repeat center top;}

        .wb_03 {background:#fff;}                

        .wb_04 {background:#EBEBEB;}     

        .wb_05 {background:#062C5D;position:relative;}
        .check {color:#fff; font-size:15px;font-weight:bold;position:absolute;left:50%;top:50%;margin-left:-330px;margin-top:350px;}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#000; margin-left:50px; border-radius:20px}
        
         /* 이용안내 */
        .wb_info {padding:100px 0;}
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
      

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1878_top.jpg" alt="국가직 7급"/>            
        </div>

          <!-- 타이머 -->
          <div id="newTopDday" class="newTopDday NG">        
            <div>
                <ul>
                    <li>
                        PASS - {{$arr_promotion_params['turn']}}기<br />
                        <span class="NGEB">{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} 마감!</span>
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
                        남았습니다.
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1878_01.jpg" alt="7급 전문과목 패스"/>           
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1878_02.gif" alt="시험제도 전격 개편"/>           
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1878_03.jpg" alt="커리큘럼"/>           
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1878_04.jpg" alt="교수진"/>           
        </div>

        <div class="evtCtnsBox wb_05">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1878_05.jpg" alt="수강신청" usemap="#Map1878_apply" border="0"/>
            <map name="Map1878_apply" id="Map1878_apply">
                <area shape="rect" coords="692,680,911,747" href="javascript:go_PassLecture('173499');" alt="수강신청" />
            </map>  
            <div class="check" id="chkInfo">   
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                        페이지 하단 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#info" class="infotxt">이용안내확인하기 ↓</a>
            </div>                 
        </div>        

        <div class="evtCtnsBox wb_info" id="info">
            <div class="guide_box">
                <h2 class="NSK-Black">2021 국가직 7급 전문과목 PASS 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 PASS는 2021년도 국가직 7급 2차 전문과목 대비 과정으로, 참여 교수진의 강좌를 배수 제한없이 무제한으로 수강 가능합니다.</li>
                            <li>수강가능 교수진/강좌 <br>
                                (과목별 교수진의 제공되는 상세 강좌 리스트는 수강신청 상세 안내 화면을 확인해주시기 바랍니다.)<br>
                                - 헌법/행정법 황남기 교수 / 2020~2021 전 과정 제공<br>
                                - 헌법 유시완 교수 / 2020 대비 과정만 제공<br>
                                - 행정법 이석준 교수 / 2021 대비 전 과정 제공<br>
                                - 행정법 한세훈 교수 / 2020 대비 전 과정 제공<br>
                                - 행정학 김덕관 교수 / 2020~2021 전 과정 제공<br>
                                - 경제학 황정빈 교수 / 2019~2020 대비 진행 과정만 제공<br>
                            </li>                                  
                            <li>참여 교수진의 일정 및 진행방식은 상이하게 진행될 수 있으며, 학원 사정에 따라 부득이하게 커리큘럼 및 교수진이 추가/변경 될 수 있다는 점 숙지 부탁드립니다.</li>
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
                            <li> 먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.
                            <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 과목/교수/강좌를 선택 등록 후 수강할 수 있습니다.</li>   
                            <li>본 PASS를 이용 중에는 일시정지/수강연장/재수강 기능을 사용할 수 없습니다.</li>   
                            <li>본 PASS 수강 시 이용가능한 기기는 다음과 같이 제한됩니다.<br>
                            - PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)</li>   
                            <li>PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며 추후 단말기 초기화는 고객센터에서 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>                            
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
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인/다다익선/적립금 사용 등 혜택이 제공되지 않습니다.</li>
                            <li>선택한 교수의 강의가 학원 사정에 의해 부득이하게 진행되지 않을 경우 대체 강의가 제공되며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유 적발 시 회원 자격 박탈 및 환불 불가하며, 추가적인 불법 공유 행위 적발 시 형사 고발 조치가 단행될 수 있습니다.</li>
                        </ol>
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

            var url = '{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop