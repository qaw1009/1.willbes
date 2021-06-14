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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtContent .evt_wrap {width:1120px; margin:0 auto; position: relative;}

        /************************************************************/ 

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/06/2247_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#e7f1fa;padding-bottom:50px;}
        .check {margin-top:20px; color:#333; font-size:15px;font-weight:bold;}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#000; margin-left:50px; border-radius:20px}   

        .evt02 {background:#e7f1fa;}    

        .evt03 {background:#f0f0f0;}      

        /* 이용안내 */
        .evtInfo {padding:100px 0; background:#555; color:#fff; line-height:1.5}
        .guide_box{width:1120px; margin:0 auto; padding:0 50px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px;}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:16px;}        
        .guide_box dd{margin-bottom:50px;}
        .guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px;font-size:14px;}
        .guide_box dd li.none {list-style:none; margin-left:0}
        .guide_box dd:last-child {margin:0}
        /************************************************************/      
    </style> 

	<div class="evtContent NGR">

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2247_top.jpg" alt="여름방학 기초 패키지" />
		</div>

        <div class="evtCtnsBox evt02">
            <div class="evt_wrap"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2247_02.jpg" alt="상담 제공" />
                <a href="javascript:go_PassLecture('183084')" title="all 패키지" style="position: absolute;left: 13%;top: 83.42%;width: 19%;height: 8.55%;z-index: 2;"></a>
                <a href="javascript:go_PassLecture('183087')" title="5법 패키지" style="position: absolute;left: 40.5%;top: 83.42%;width: 19%;height: 8.55%;z-index: 2;"></a>
                <a href="javascript:go_PassLecture('183092')" title="민법+영어 패키지" style="position: absolute;left: 68.25%;top: 83.42%;width: 19%;height: 8.55%;z-index: 2;"></a>
            </div>    
		</div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2247_01.jpg" alt="수강 신청하기" />                                      
            <div class="check" id="chkInfo">   
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#ctsInfo" class="infotxt">이용안내확인하기 ↓</a>
            </div> 
		</div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2247_03.jpg" alt="수강생 중심 운영" />
		</div>

        <div class="evtCtnsBox evt04">
            <div class="evt_wrap"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2247_04.jpg" alt="더 많은 합격수기 확인하기" />
                <a href="https://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="합격수기" style="position: absolute;left: 34.46%;top: 82.42%;width: 31%;height: 5.55%;z-index: 2;"></a>
            </div>    
		</div>

        <div class="evtCtnsBox evtInfo" id="ctsInfo">
            <div class="guide_box">
                <h2 class="NSK-Black">이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 윌비스김동진법원팀 2022대비 예비순환 및 영어 특강(2종)을 2배수 제한으로 수강 가능한 상품입니다.</li>
                            <li>
                                제공 강의<br>
                                1) ALL 패키지 - 민법 입문특강 및 1순환(김동진), 민사소송법 예비순환(이덕훈), 형법 예비순환(문형석), 형사소송법 예비순환(유안석), 헌법 예비순환(이국령), 국어 입문특강(박재현), 영어 예비순환(박초롱), 한국사 예비순환(임진석), 영어 필수기출보카(박초롱), 영어 기출구문 독해의기술(박초롱)<br>
                                2) 5법 패키지 - 민법 입문특강 및 1순환(김동진), 민사소송법 예비순환(이덕훈), 형법 예비순환(문형석), 형사소송법 예비순환(유안석), 헌법 예비순환(이국령)<br>
                                3) 민법+영어 패키지 - 민법 입문특강 및 1순환(김동진), 영어 예비순환(박초롱), 영어 필수기출보카(박초롱), 영어 기출구문 독해의기술(박초롱)
                            </li>    
                            <li>
                                특전 : 여름방학 기초패키지 수강 후 <김동진법원팀 PASS> 상품 구매 시 10만원 할인쿠폰 제공(1~5순환PASS, 2~5순환PASS 상품 해당)<br>
                                ※할인쿠폰은 패키지 결제 즉시 제공되며, PASS 강의 결제 페이지에서 확인하실 수 있습니다.
                            </li> 
                        </ol>
                    </dd>
                    <dt>수강기간</dt>
                    <dd>
                        <ol>
                            <li>등록 시부터 즉시 수강 가능한 강의가 제공되며, ALL 패키지 120일, 5법 패키지 80일, 민법+영어 패키지 80일 제공됩니다.</li>
                            <li>본 패키지 상품은 구매 후 수강이 가능한 시점부터 바로 수강이 시작되며, 수강기간 조정 및 정지가 불가합니다.</li>                                       
                        </ol>
                    </dd>
                    <dt>수강방법 및 제한</dt>
                    <dd>
                        <ol>
                            <li>홈페이지 [내강의실] 메뉴에서 [강좌추가] 메뉴를 통해 강좌를 추가합니다.</li>
                            <li>원하는 과목/교수/강좌를 선택하여 등록하신 후 수강이 가능합니다.</li>
                            <li>수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC&모바일 각 1대｣로 총 2대의 기기로 제한됩니다.</li>
                            <li>PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 추후 단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>                                  
                        </ol>
                    </dd>
                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>모든 교재는 별도로 구매하셔야 합니다. 각 강좌별 교재는 [내강의실] 내 [교재구매]를 선택하여 구매 가능합니다.</li>
                            <li>강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>                   
                        </ol>
                    </dd>
                    <dt>환불관련</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내에 전액환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액환불대상이 됩니다.</li>
                            <li>자료 또는 모바일 강의 다운로드 시에도 이용 및 수강 여부와 무관하게 수강한 것으로 간주됩니다.</li>
                            <li>
                                본 상품은 할인가가 적용된 특별기획상품이므로 부분환불은 정가 대비 사용일수에 따라 차감 후 환불됩니다.<br>
                                구체적인 환불기준은 환불 시 고객센터로 문의 시 자세히 안내 받으실 수 있습니다.
                             </li>                      
                        </ol>
                    </dd>
                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별기획상품으로 쿠폰 할인, 적립금 사용 등 혜택이 적용되지 않습니다.</li>
                            <li>학원 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.</li>
                            <li>아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민 형사상 책임을 질 수 있습니다.</li>                      
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

            var url = '{{ site_url('/periodPackage/show/cate/3035/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }
    </script>
@stop