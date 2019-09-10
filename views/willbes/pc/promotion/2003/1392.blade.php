@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
<style type="text/css">
.subContainer {
    min-height:auto !important;
    margin-bottom:0 !important;
}
.evtContent { 
    position:relative;            
    width:100% !important;
    margin-top:20px !important;
    padding:0 !important;
    background:#fff;
}	
.evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
/*****************************************************************/  
.top_bg {background:url(https://static.willbes.net/public/images/promotion/2019/09/1392_top_bg.jpg) no-repeat center top;position:relative;}
.top_bg .check{position:absolute;width: 1000px;left:62%;top:900px;margin-left:-500px;z-index:1;font-size:14px;text-align:center;line-height:1.5;
              letter-spacing:-1px;}
.top_bg .check label{color:#fff;font-size:16px;}
.top_bg .check input {border: 2px solid #000;margin-right: 8px;height: 17px; width: 17px;} 
.top_bg .check a {display: inline-block; padding: 5px 20px; color: #fff;background: #000;border-radius: 20px;}

.sec01{background:#fff;}
.sec02{background:#eef1f5;}
.sec03{background:#fff;}

.sec05 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1392_05_bg.jpg) no-repeat center top;position:relative;}
.sec05 .check{position:absolute;width: 1000px;left:45%;top:750px;margin-left:-500px;z-index:1;font-size:14px;text-align:center;line-height:1.5;
              letter-spacing:-1px;}
.sec05 .check label{color:#fff;font-size:16px;}
.sec05 .check input {border: 2px solid #000;margin-right: 8px;height: 17px; width: 17px;} 
.sec05 .check a {display: inline-block; padding: 5px 20px; color: #fff;background: #000;border-radius: 20px;}
.check a:hover {background: #39167a}

.wb_ctsInfo {background:#2b2b2b; padding:100px 0}  
.wb_ctsInfo div {width:980px; margin:0 auto; color:#fff; font-size:14px; line-height:1.5;
    font-family: "NanumGothic-Regular", "Nanum Gothic", "나눔고딕", "sans-serif" !important;
}
.wb_ctsInfo div h3 {font-size:30px; margin-bottom:30px; color:#f97f7a} 
.wb_ctsInfo div dt {font-size:18px; margin-bottom:10px; font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;
    text-decoration:underline}  
.wb_ctsInfo div dd {margin-bottom:30px}
.wb_ctsInfo div dl {
    position: relative;
    padding-left:10px;
}
.wb_ctsInfo div dl:before{
    background: #f97f7a none repeat scroll 0 0; 
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


    <div class="evtContent NGR" id="evtContainer">  
        <div class="evtCtnsBox top_bg">           
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1392_top.jpg" alt="오태진 한국사" usemap="#Map1296a" border="0">
            <map name="Map1296a" id="Map1296a">
            <area shape="rect" coords="825,759,1055,879" href="javascript:go_PassLecture(1);" target="_blank" alt="수강신청"/>
            </map>     
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 오태진 한국사 T-PASS 이용안내를 모두 확인하였고, 이에 동의합니다   
                </label>
                <a href="#ctsInfo">이용안내확인하기 ↓</a>
            </div>   
        </div>
        <div class="evtCtnsBox sec01">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1392_01.jpg" alt="수 많은 합격생이 증명">
        </div>     
        <div class="evtCtnsBox sec02">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1392_02.jpg" alt="커리큘럼">  
        </div>
        <div class="evtCtnsBox sec04">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1392_04.jpg" alt="실전 모의고사"> 
        </div>
        <div class="evtCtnsBox sec05">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1392_05.jpg" alt="수강신청" usemap="#Map1296b" border="0">
            <map name="Map1296b" id="Map1296b">
                <area shape="rect" coords="536,619,726,717" href="javascript:go_PassLecture(1);" target="_blank" alt="수강신청" />
            </map> 
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 오태진 한국사 T-PASS 이용안내를 모두 확인하였고, 이에 동의합니다   
                </label>
                <a href="#ctsInfo">이용안내확인하기 ↓</a>
            </div>   
        </div>   

        <div class="wb_ctsInfo NGR" id="ctsInfo">
            <div>
                <h3 class="NGEB">이용안내 및 유의사항</h3>
                <dd>
                    <dt>상품구성</dt>
                    <dl>교수별 제공되는 커리큘럼은 상이할 수 있으나 각 T-PASS의 수강 가능 과목을 확인 후 신청해주시기 바랍니다.</dl>
                    <dl>수강기간은 각 교수의 T-PASS 마다 상이하니 구매전 수강기간을 확인 해 주시기 바랍니다.</dl>
                    <dl>상품 내 포함되어 있는 강좌들은 개강 일정 및 교수님 사정에 따라 변동이 있을 수 있습니다.</dl>                   
                </dd>                
                <dd>
                    <dt>교재안내</dt>
                    <dl>교재는 별도로 제공되지 않으며, 각 강좌별 교재는 강좌 소개 및 홈페이지 상단의 [교재구매] 메뉴에서 별도로 구매 가능합니다.</dl>
                </dd>
                <dd>
                    <dt>기기제한</dt>
                    <dl>PC + Mobile : PC 2대 or PC 1대 + 모바일 1대 or 모바일 2대 가능(총 수강 가능 기기 2대, PMP는 제공하지 않습니다.)</dl>
                </dd>
                <dd>
                    <dt>수강안내</dt>
                    <dl>본 상품 이용 시 일시정지/연장/재수강이 불가합니다.</dl>
                    <dl>[내강의실] - [무한PASS존]에 접속하여 상품명 옆의 [강좌추가]버튼을 클릭하여 수강할 수 있습니다.</dl>
                    <dl>PC/모바일 기기 변경 시, 최조 1회 직접 변경 가능하며, 이후 특별한 사유에 의한 기기 변경 요청은 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.<br>
                    ※ 고객센터 : 1544-5006</dl>
                    <dl>수강 시작일 설정은 불가하며, 본 상품은 결제가 완료되는 즉시 수강이 시작됩니다.</dl>
                </dd>
                <dd>
                    <dt>결제/환불</dt>
                    <dl>결제일로부터 7일 이내 전액 환불이 가능합니다. 단, 맛보기 강좌를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.<br>
                    강의 자료 및 모바일 강의 다운로드 서비스 이용 시 수강한 것으로 간주 됩니다.</dl>
                    <dl>본 상품은 특별 기획 강좌로 환불 시에는 수강하신 상품의 정가를 기준으로 이용이간을 공제하고 환불 됩니다.</dl>
                    <dl>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</dl>
                    <dl>강좌 진행이 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</dl>
                </dd>
                <p class="NSK"><span>※ 이용문의 : 고객센터 1544-5006</span></p>
            </div>
        </div>                           
              
    </div>
    <!-- End Container --> 

    <script type="text/javascript">
        function go_PassLecture(no){

            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            var lUrl;
            if(no == 1){
                lUrl = "https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/156095";
            }
            location.href = lUrl;
        }

        function goDesc(tab){
            location.href = '#ctsInfo';
        }
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop