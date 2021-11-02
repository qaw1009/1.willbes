@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .Container {font-size:62.5%;}
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size: calc(1.4rem + (((100vw - 1.4rem) / (90 - 20))) * (2.0 - 1.4)); line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .evtCtnsBox .sec05 {
        max-width: calc(100% - 20px);
        margin:10vw auto;              
        color:#121212;
        text-align:left;
    }
    .sec05 .title {text-align:center}
    .sec05 .date {font-size:90%; padding:1vw 20px; background:#f1f1f1; border-radius:20rem; display:inline-block; }
    .sec05 .date span {color:#cf1e02}
    .request {font-size:60%; margin-top:4vw}
    .request input[type=text] {width:100%}
    .request input[type=raido],
    .request input[type=checkbox] {width:18px; height:18px}
    .request > div {margin-bottom:5px}

    .request .sTitle {font-size:110%; margin-top:30px; font-weight:bold; border-bottom:1px solid #ccc; padding-bottom:5px; margin-bottom:0}
    .request .ad_List {display: flex; flex-wrap: wrap; margin-top:10px}
    .request .ad_List div {width:33.3333%}
    .request .mt10 {font-size:80%}
    .request .txtBox {font-size:80%}
    .request .txtBox ul {padding:10px; border:1px solid #ccc; border-top:0; height:200px; overflow-y:scroll }
    .request .txtBox div {margin-top:10px}

    .request .btn {width:90%; margin:0 auto;}
    .request .btn a {display:block; text-align:center; font-size:120%; color:#fff; background:#000; padding:15px 0; margin-top:30px; border-radius:50px}

    .evtInfoBox {text-align:left; line-height:1.5; padding:10vw 20px; background:#e4e4e4; color:#555; font-size:55%}
    .evtInfoBox h4 {margin-bottom:10px; font-size:140%}
    .evtInfoBox .infoTit {margin-bottom:10px}
    .evtInfoBox ul {margin-bottom:15px}
    .evtInfoBox li {list-style-type:none; margin-left:20px; margin-bottom:5px}
    .evtInfoBox .free{color:#e44900;}
    .evtInfoBox span {color:#fff; padding:0 2px}
    .evtInfoBox .bus01 {/*box-shadow:0 -20px 0 #395cb3 inset;*/ background:#395cb3;}
    .evtInfoBox .bus02 {background:#48922d;}
    .evtInfoBox .bus03 {background:#dc1219;}

    .loadmap {position: relative; padding-bottom:56.25%; height: 0; overflow: hidden; max-width:100%; height:auto; }
    .loadmap iframe {position:absolute; top: 0; left: 0; width:100%; height:100%;}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       

    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        
    }
</style>

<div id="Container" class="Container NSK c_both">    

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2399m_01.gif" alt="PSAT 석치수 무료특강" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2399m_02.jpg" alt="7급 공채 대비" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2399m_03.jpg" alt="석치수의 합격 처방전" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2399m_04.jpg" alt="참여 상품" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="sec05">
            <div class="title NSK-Black">
                <div class="date">2021.<span>11.14</span>(일) 14:00</div>
                <div>
                    7급 PSAT 합격을 위한<br>
                    석치수 자료해석<br>진단평가&긴급처방 무료특강
                </div>
            </div>

            <div class="request">
                <div><input type="text" id="register_name" name="register_name" value="" placeholder="이름"/></div>
                <div><input type="text" id="register_name" name="register_name" value="" placeholder="연락처" /></div>

                <div>
                    <div>
                        <input type="checkbox" name="register_chk" id="campus0" value=""> <label for="campus0">11.14(일) 오후 2시(노량진 신광은 경찰학원)</label>
                    </div>
                </div>
                
                <div class="sTitle">* 무료특강 확인경로</div>
                <div class="ad_List">
                    <div><input type="radio" name="register_data2" id="CT1" value="홈페이지" /> <label for="CT1">홈페이지</label></div>
                    <div><input type="radio" name="register_data2" id="CT2" value="지인추천" /> <label for="CT2">지인추천</label></div>
                    <div><input type="radio" name="register_data2" id="CT3" value="인터넷광고" /> <label for="CT3">인터넷광고</label></div>
                    <div><input type="radio" name="register_data2" id="CT4" value="인터넷검색" /> <label for="CT4">인터넷검색 </label></div>
                    <div><input type="radio" name="register_data2" id="CT5" value="공무원카페" /> <label for="CT5">공무원카페</label></div>
                </div>

                <div class="mt10">* 기본서 무료제공 등 수강특전은 <strong>무료특강 신청접수 및 노량진 실강 참석자</strong>에 한해 제공됩니다.</div>
                <div class="sTitle">* 개인정보 수집 및 이용에 대한 안내</div>
                <div class="txtBox">
                    <ul>
                        <li>1. 개인정보 수집 이용 목적<br>
                        - 신청자 본인 확인 및 신청 접수 및 문의사항 응대 - 통계분석 및 마케팅 - 윌비스 한림법학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공</li>
                        <li>2. 개인정보 수집 항목<br>
                        - 필수항목 : 성명, 연락처, 무료특강 확인 경로</li>
                        <li>3. 개인정보 이용기간 및 보유기간<br>
                        - 이용 목적 달성 또는 신청자의 신청 해지 및 삭제 요청 시 파기</li>
                        <li>4. 신청자의 개인정보 수집 및 활용 동의 거부 시<br>
                        - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다.</li>
                        <li>5. 입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.</li>
                        <li>6. 본 이벤트 진행에 따른 단체사진 및 영상 촬영에 대한 귀하의 초상권 사용을 동의하며, 해당 저작물에 대한 저작권은 윌비스에 귀속됩니다.</li>
                    </ul>
                    <div>
                        <input name="is_chk" id="is_chk" type="checkbox" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                    </div>
                </div>

                <div class="btn NSK-Black">
                    <a href="#none" onclick="javascript:fn_submit();">석치수 자료해석 무료특강 신청하기 > </a>
                </div>
            </div>            
        </div>

        <div class="evtInfoBox">
            <h4 class="NSK-Black">특강 정보</h4>
            <div class="infoTit"><strong>● 특강 취지</strong></div>
            <ul>
                <li>자료해석 풀이 방식에 대한 문제점을 발견하여 해결하고, 자신의 약점에 대한 구체적인 처방을 통해 2022년 7급 공채 <strong>必! 합격을 실현</strong></li>                    
            </ul>  
            <div class="infoTit"><strong>● 문제 구성 방식</strong></div>
            <ul>
                <li>PSAT 자료해석 빈출 유형으로 구성함을 원칙으로 <strong>본인의 확실한 실력을 확인할 수 있도록 상, 중, 하의 난이도 문제를 모두 포함하여 출제</strong></li>                                    
            </ul>
            <div class="infoTit"><strong>● 수강대상</strong></div>
            <ul>   
                
                <li>1. 지금까지 응시한 진단평가에서 <strong>자신의 위치나 약점을 정확하게 확인할 수 없었던 수험생</strong></li>
                <li>2. 자료해석 공부 방법에 대해 <strong>확실한 가이드라인이 필요한 수험생</strong></li>
                <li>3. 아무리 공부를 해도 자료해석 <strong>실력이 늘지 않아 불안한 수험생</strong></li>
                <li>4. 2022년 7급 공채 자료해석 <strong>고득점을 원하는 수험생</strong></li>                       
            </ul>                     
            <div class="infoTit"><strong>● 수강특전</strong></div>
            <ul>   
                <li class="free">※ 참여자 전원 무료제공!</li><br>
                <li>1. 2022년 대비 석치수의 합격하는 <strong>7급 자료해석 기본서(2022년)</strong> 무료제공</li>
                <li>2. <strong>스타벅스 아메리카노 기프티콘</strong> 증정</li>
                <li>3. <strong>자료해석 동영상강의 15% 할인쿠폰</strong> 증정</li>
                <li>4. <strong>2021년 7급 공채 자료해석 해설</strong> 무료제공</li>
                <li>5. <strong>2021년 5급 공채 자료해석 해설</strong> 무료제공</li>
                <li>6. <strong>2021년 민간경력 자료해석 해설</strong> 무료제공</li>
                <li>7. <strong>긴급처방 25문제 실전모의고사 단권화자료</strong>(복습용) 무료제공</li>
                <li>8. <strong>긴급처방 25문제 실전모의고사 해설 + 유사기출 문제</strong> 모음</li>
                <li>9. 석치수의 합격하는 <strong>주요 개념 확인 노트</strong> 무료제공</li>
                <li>10. 석치수의 <strong>합격하는 처방전</strong> 무료제공</li><br>
                <li>* 무료 제공 교재는 강사가 직접 구입하여 무료제공됩니다.</li>          
            </ul>                      
        </div>

        <div class="loadmap">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3164.7927493090915!2d126.94179831559448!3d37.51280597980801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357c9fe8a0a1e2a5%3A0x3bc432e93a6e20c1!2zKOyjvCnsnIzruYTsiqQ!5e0!3m2!1sko!2skr!4v1603420278998!5m2!1sko!2skr" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>

        <div class="evtInfoBox">
            <div class="infoTit"><strong>● 주소</strong></div>
            <ul>
                <li>서울시 동작구 만양로105 한성빌딩 윌비스 신광은 경찰학원</li>                    
            </ul>  
            <div class="infoTit"><strong>● 일시 / 문의</strong></div>
            <ul>
                <li>2021.11.14(일) 14:00</li>  
                <li>1544-1881</li>                                   
            </ul>
            <div class="infoTit"><strong>● 지하철 이용</strong></div>
            <ul>                
                <li>지하철 1호선 1번 출구 도보로 3분</li>  
                <li>지하철 9호선 3번 출구 도보로 4분</li>                       
            </ul>                     
            <div class="infoTit"><strong>● 지하철 이용</strong></div>
            <ul>                
                <li><span class="bus01">간선</span> 150 152 360 363 462 500 504 507 605 640 751 752</li>  
                <li><span class="bus02">지선</span> 516 5517 5535 5536 6211 641</li>
                <li><span class="bus03">광역</span> 9480</li> 
                <li><span class="bus02">마을</span> 동작01 동작03 동작08 동작13</li>                     
            </ul>        
        </div>

    </div> 


</div>

<!-- End Container -->

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
</script>


{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')
@stop