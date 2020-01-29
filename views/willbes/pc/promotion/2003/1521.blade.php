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
    background:#ccc;
    margin-top:20px !important;
    padding:0 !important;
    background:#fff;
}
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


.skybanner{position:fixed;top:250px;right:10px;z-index:1;}

.wb_top{background:#e8e9e9 url("https://static.willbes.net/public/images/promotion/2020/01/1521_top_bg.jpg") no-repeat center top;position:relative;}
.wb_top_txt{position:absolute;top:165px;}

.wb_cts01{background:#fff;}

.wb_cts02{background:#005bdf;}

.wb_cts03{background:#f3f7fa;}

.wb_cts04{background:#f3f7fa;position:relative;}
.wb_cts04 li {position:absolute;}
.wb_cts04 li:nth-child(1) {top:555px;left:50%;margin-left:-270px;}
.wb_cts04 li:nth-child(2) {top:555px;left:50%;margin-left:60px;}
.wb_cts04 li:nth-child(3) {top:270px;left:50%;margin-left:380px;} 
.wb_cts04 li:nth-child(4) {top:400px;left:50%;margin-left:380px;} 
.wb_cts04 li:nth-child(5) {top:530px;left:50%;margin-left:380px;} 
.wb_cts04 li input {height:30px; width:30px;}

.wb_top .check {position:absolute; width:1000px; left:50%; top:900px; margin-left:-500px; letter-spacing:3 !important; color:#fff; font-size:14px; z-index:10}
.wb_cts04 .check {color:#fff;font-size:14px;position:absolute;left:50%;margin-left:-346px;bottom:75px;}
.check p {margin-bottom:20px;}
.check p a {display:block; width:525px; height:90px; line-height:90px; margin:0 auto; font-size:30px; color:#fff; background:#005bdf; text-align:center; border-radius:90px;}
.check p a:hover {color:#8d0033; background:#eee53b;}
.check label {cursor:pointer;color:#000;font-weight:bold;}
.check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
.check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#000; margin-left:50px; border-radius:20px}
.check a.infotxt:hover {background:#8d0033}   

.wb_ctsInfo {background:#2b2b2b; padding:100px 0}  
.wb_ctsInfo div {width:1000px; margin:0 auto; color:#fff; font-size:14px; line-height:1.5;
    font-family: "NanumGothic-Regular", "Nanum Gothic", "나눔고딕", "sans-serif" !important;
}
.wb_ctsInfo div h3 {font-size:30px; margin-bottom:30px; color:#6098e8;} 
.wb_ctsInfo div dt {font-size:18px; margin-bottom:10px; font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;
    text-decoration:underline}  
.wb_ctsInfo div dd {margin-bottom:30px}
.wb_ctsInfo div dl {
    padding-left:10px;
}
.wb_ctsInfo div dl:before{
    background: #30ff74 none repeat scroll 0 0; 
    border-radius: 2px;
    content: '';
    display: block;
    height: 4px;
    left: 0;
    position: absolute;
    top: 8px;
    width: 4px;
}
.wb_ctsInfo p {margin-top:40px;font-size:18px;}
.wb_ctsInfo p span  {border:2px solid #fff; padding:10px 20px}
 </style>

 <div class="p_re evtContent NGR" id="evtContainer">
     <div id="newTopDday" class="newTopDday NG">        
        <div>
            <ul>
                <li>
                    군무원0원PASS - {{$arr_promotion_params['turn']}}기<br />
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
                    남았습니다
                </li>
            </ul>
        </div>
    </div>
    <!-- 타이머 //-->
    <div class="skybanner">
        <a href="#banner">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1521_sky.png" alt="퀵배너">       
        </a>
    </div> 

    <div class="evtCtnsBox wb_top">
        <img src="https://static.willbes.net/public/images/promotion/2020/01/1521_top.jpg" usemap="#Map1521a"  title="군무원 0원 패스" border="0" />
        <map name="Map1521a" id="Map1521a">
            <area shape="rect" coords="312,908,810,1009" href="#banner" />
        </map>        
    </div>  

    <div class="evtCtnsBox wb_top_txt">
        <img src="https://static.willbes.net/public/images/promotion/2020/01/1521_top_txt.gif"  title="탑 이미지 문구" />      
    </div>      

    <div class="evtCtnsBox wb_cts01">
        <img src="https://static.willbes.net/public/images/promotion/2020/01/1521_01.gif"  title="기회를 잡아야" />
    </div>  

    <div class="evtCtnsBox wb_cts02">
        <img src="https://static.willbes.net/public/images/promotion/2020/01/1521_02.jpg"  title="교수진 라인업" />
    </div>  

    <div class="evtCtnsBox wb_cts03">
        <img src="https://static.willbes.net/public/images/promotion/2020/01/1521_03.jpg"  title="커리큘럼" />
    </div>  

    <div class="evtCtnsBox wb_cts04" id="banner">
        <img src="https://static.willbes.net/public/images/promotion/2020/01/1521_04.jpg"  title="수강신청" />
        <ul>
            <li><input type="radio" id="y_pkg" name="y_pkg" value="155379" onClick=""/><label for="y_pkg"></label></li>   
            <li><input type="radio" id="y_pkg" name="y_pkg" value="161130" onClick=""/><label for="y_pkg"></label></li>
            <li><input type="radio" id="y_pkg" name="y_pkg" value="155381" onClick=""/><label for="y_pkg"></label></li>
            <li><input type="radio" id="y_pkg" name="y_pkg" value="155383" onClick=""/><label for="y_pkg"></label></li>   
            <li><input type="radio" id="y_pkg" name="y_pkg" value="155386" onClick=""/><label for="y_pkg"></label></li>
        </ul>
        <div class="check" id="chkInfo">
            <p class="NGEB"><a onclick="go_PassLecture(1);" target="_blank">윌비스 군무원PASS와 함께하기</a></p>      
            <label>
                <input name="ischk" type="checkbox" value="Y" />
                페이지 하단 군무원0원PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
            </label>
            <a href="#tip" class="infotxt" > 이용안내확인하기 ↓</a>
        </div> 
    </div>

    <div class="wb_ctsInfo NGR" id="tip">
        <div>
            <h3 class="NGEB">윌비스 군무원0원PASS 이용안내</h3>
            <dd>
                <dt>상품구성</dt>
                <dl>1. 본 PASS는 윌비스공무원학원 군무원 단독반 교수진 및 윌비스 온라인 군무원 전담 교수진의 강좌를 배수 제한 없이 무제한으로 수강 가능한 상품입니다.</dl>
                <dl>2. 수강 가능 과목 (PASS의 경우에만 적용, 패키지의 경우 상품명 내 기재된 과목만 제공)<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 행정직 : 국어, 행정법, 행정학, 한국사검정능력시험<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 군수직 : 국어, 행정법, 경영학, 한국사검정능력시험</dl>
                <dl>3. 본 PASS는 2020년 대비 군무원 시험에 맞추어 개강된 강의를 커리큘럼 진행에 따라 단계적으로 제공해드리는 상품입니다.</dl>
                <dl>4. 교수진 사정으로 강의가 부득이하게 진행되지 않을 시, 대체 강의를 제공해드립니다.</dl>
            </dd>
            <dd>
                <dt>수강기간</dt>
                <dl>1. 구매일로부터 상품 상세 안내 화면에 표기된 기간만큼 제공되며, 결제가 완료되는 즉시 수강이 시작됩니다.</dl>
            </dd>
            <dd>
                <dt>수강관련</dt>
                <dl>1. 먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</dl>
                <dl>2. 구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 과목/교수/강좌를 선택 등록 후 수강할 수 있습니다.</dl>
                <dl>3. 본 PASS를 이용 중에는 일시정지/수강연장/재수강 기능을 사용할 수 없습니다.</dl>
                <dl>4. 본 PASS 수강 시 이용가능한 기기는 다음과 같이 제한됩니다.<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)</dl>
                <dl>5. PC/모바일 기기초기화는 최초 1회에 한해 본인 직접 초기화 가능하며, 추가로 단말기 초기화를 원하시는 경우 고객센터로 문의주시기 바랍니다.<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(단, 고객센터를 통한 단말기 초기화 진행 시 콘텐츠 공유 방지를 위해 사유 확인 후 최대 2회까지만 단말기 초기화가 가능합니다. (총 3회)</dl>
            </dd>
            <dd>
                <dt>교재관련</dt>
                <dl>1. 본 상품은 교재를 별도 구매하셔야하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도 구매 가능합니다.</dl>
                <dl>2. 4개년 기출문제집 교재의 경우, PASS 상품 결제 시 [배송정보]란에 배송 원하시는 주소를 입력해주시면, 자동 배송 처리됩니다. (*경영학 미포함)</dl>
                <dl>3. 핵심정리 교재의 경우, 2020 대비 임재진/김헌/이석준 교수의 ‘핵심요약‘ 커리큘럼의 교재로 사용되며 해당 교재는 과정별로<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;연동되어있는 상품을 직접 0원으로 결제 진행해주셔야 배송 처리됩니다.</dl>
                <dl>4. 정확하지 않은 배송지를 입력, 교재가 오배송되는 경우 재배송은 불가합니다.</dl>    
            </dd>
            <dd>
                <dt>환불정책</dt>
                <dl>1. 결제 후 7일 이내 전액 환불 가능합니다.</dl>
                <dl>2. 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</dl>
                <dl>3. 자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</dl>
                <dl>4. 고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, 정가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.</dl>
                <dl>5. 환불 시 4개년 기출문제집 및 핵심정리 교재는 배송비 구매자 직접 부담으로 반송 후, 교재가 도착하면 환불처리 진행됩니다.</dl>
            </dd>
            <dd>
                <dt>환급관련</dt>
                <dl>1. 군무원0원PASS 전 과목 수강 가능한 상품 구매 후 2020년 군무원 시험에 최종 합격 시에만 환급 가능합니다.</dl>
                <dl>2. 합격 후 환급 신청은 최종합격 증빙서류를 팩스를 통해 제출해주신 후, 고객센터 게시판에 문의글 남겨주시면 됩니다.<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(FAX 070-4369-8422)</dl>
                <dl>3. 환급 시 실제 결제하신 금액에서 제세공과금 22% 제외 후 환급 진행됩니다.</dl>                    
            </dd> 
            <p class="NSK"><span>※ 이용문의 : 고객만족센터 1544-5006</span></p>
        </div>
    </div>
  
</div>
<!-- End Container -->

<script type="text/javascript">
 /*디데이카운트다운*/
$(document).ready(function() {
    dDayCountDown('{{$arr_promotion_params['edate']}}');
});

function go_PassLecture(code){
    if($("input[name='ischk']:checked").size() < 1){
        alert("이용안내에 동의하셔야 합니다.");
        return;
    }
    if(code == 1){
        code = $('input[name="y_pkg"]:checked').val();
        if (typeof code == 'undefined' || code == '') {
            alert('강좌를 선택해 주세요.');
            return;
        }
    }
    location.href = "{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/') }}" + code;
}

</script>
{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop