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
.top_bg {background:url(https://static.willbes.net/public/images/promotion/2019/06/1296_hs_bg.jpg) no-repeat center top;position:relative;}
.top_bg .check{position:absolute;width: 1000px;left:62%;top:900px;margin-left:-500px;z-index:1;font-size:14px;text-align:center;line-height:1.5;
              letter-spacing:-1px;}
.top_bg .check label{color:#fff;font-size:16px;}
.top_bg .check input {border: 2px solid #000;margin-right: 8px;height: 17px; width: 17px;} 
.top_bg .check a {display: inline-block; padding: 5px 20px; color: #fff;background: #000;border-radius: 20px;}

.sec01,.sec03{background:#fff;}
.sec01{position:relative;}
.youtubeGod{position:absolute;width:858px; height:484px; left:50%; top:312px; margin-left:-429px;}
.youtubeGod iframe {width:858px; height:484px;}

.sec02{background:#eef1f5;}

.sec05 {background:url(https://static.willbes.net/public/images/promotion/2019/06/1296_hs_05_bg.jpg) no-repeat center top;position:relative;}
.sec05 .check{position:absolute;width: 1000px;left:45%;top:750px;margin-left:-500px;z-index:1;font-size:14px;text-align:center;line-height:1.5;
              letter-spacing:-1px;}
.sec05 .check label{color:#fff;font-size:16px;}
.sec05 .check input {border: 2px solid #000;margin-right: 8px;height: 17px; width: 17px;} 
.sec05 .check a {display: inline-block; padding: 5px 20px; color: #fff;background: #000;border-radius: 20px;}

.sec06 {background:url(https://static.willbes.net/public/images/promotion/2019/06/1296_hs_06_bg.jpg) no-repeat center top; padding:90px 0}
.note_area {width:970px; text-align:left; margin-top:90px; margin:0 auto; border:1px solid #000; background:#fff; padding:50px}
.note_area h3{font-weight:bold;font-size:18px; margin-bottom:20px}
.note_area div {margin-bottom:30px}
.note_area p {line-height:1.8}
</style>


    <div class="evtContent NGR" id="evtContainer">  
        <div class="evtCtnsBox top_bg">           
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1296_hs_top.jpg" alt="오태진 한국사" usemap="#Map1296a" border="0">
            <map name="Map1296a" id="Map1296a">
            <area shape="rect" coords="825,759,1055,879" href="javascript:go_PassLecture(1);" target="_blank" alt="수강신청"/>
            </map>     
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 오태진 한국사 T-PASS 이용안내를 모두 확인하였고, 이에 동의합니다   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>   
        </div>
        <div class="evtCtnsBox sec01">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1296_hs_01.jpg" alt="수 많은 합격생이 증명">
            <div class="youtubeGod">
                <iframe src="https://www.youtube.com/embed/LCziQy4uv94" frameborder="0" allowfullscreen=""></iframe> 
            </div>
        </div>     
        <div class="evtCtnsBox sec02">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1296_hs_02.jpg" alt="커리큘럼">  
        </div>
        <div class="evtCtnsBox sec04">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1296_hs_04.jpg" alt="실전 모의고사"> 
        </div>
        <div class="evtCtnsBox sec05">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1296_hs_05.jpg" alt="수강신청" usemap="#Map1296b" border="0">
            <map name="Map1296b" id="Map1296b">
            <area shape="rect" coords="171,441,716,735" href="javascript:go_PassLecture(1);" target="_blank" alt="수강신청" />
            </map> 
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 오태진 한국사 T-PASS 이용안내를 모두 확인하였고, 이에 동의합니다   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>   
        </div>    
        <div class="evtCtnsBox sec06" id="careful"> 

            <div class="note_area">
                <h3>상품구성</h3>                 
                    <div>
                        <p>1. 오태진 교수님의 경찰 한국사 강좌를 수강할 수 있는 상품입니다. (수강 가능 강좌 리스트는 신청 시 확인 가능합니다.)</p>
                        <p>2. 수강 시작일 설정은 불가하며, 본 상품은 결제가 완료되는 즉시 수강이 시작됩니다.</p>
                        <p>3. 상품 내 포함되어 있는 강좌들은 개강 일정 및 교수님 사정에 따라 변동이 있을 수 있습니다.</p>  
                    </div>                  
                <h3>교재안내</h3>                    
                    <div>
                        <p>1. 상품 내 포함되어 있는 강좌에 사용되는 교재는 제공되지 않으며, [교재 구매] 메뉴에서 별도 구매 가능합니다.</p>   
                    </div>                
                <h3>기기제한</h3>
                    <div>
                        <p>1.오태진 T-PASS 강좌 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.
                        <br>
                        PC+Mobile 으로 PASS 수강 시 : PC 2대 또는 PC 1대+모바일 1대 또는 모바일 2대 가능 (PMP는 제공하지 않습니다.)</p> 
                        <p> 2. PC, 모바일 기기변경 등 단말기 초기화가 필요한 경우 내용 확인 후 초기화 진행가능하오니
                        <br>
                        고객센터로 문의바랍니다. (무한PASS존 등록기기정보 확인)          ※고객센터 : 1544-5006 </p>     
                     </div>                           
                <h3>수강안내</h3>
                    <div>
                        <p>1. 먼저 내 강의실 메뉴에서 [무한PASS존] 으로 접속합니다.</p>
                        <p>2. 구매하신 오태진 T-PASS 상품 선택 후 [강좌추가] 버튼을 클릭, 원하시는 강좌를 선택 등록 한 후 수강할 수 있습니다.</p>
                        <p>3. 오태진 T-PASS는 일시정지/수강연장/재수강이 불가능 한 상품입니다.</p>
                    </div>
                <h3>결제/환불</h3>    
                    <div>               
                        <p>1. 결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.
                        <br>  
                        다만, 학습자료 및 모바일 다운로드 이용 시 수강여부 상관 없이 수강한 것으로 간주됩니다.</p>
                        <p>2. 고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면,
                        <br>
                        T-PASS 정가기준으로 계산하여 사용일수만큼 차감하고 환불됩니다.</p>
                        <p>3. 수강시작일로부터 60일 초과 또는 차감액이 결제 금액을 초과할 시 환불 불가합니다.</p>  
                    </div>                
                <h3>유의사항</h3>     
                    <div>            
                        <p>1. 본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립금사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</p>
                        <p>2. 오태진 T-PASS 강좌 진행 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</p>
                        <p>3. 아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</p>
                        <p>4. 온·오프라인 동시 시행되는 이벤트 혹은 무료특강의 경우 해당강좌는 미지급되거나 이벤트 종료 후 제공될 수 있습니다.
                        <br>
                            * 무료 특강의 경우 추후 [무료강좌] 탭에서 수강 가능 할 수도 있습니다.</p>           
                    </div>         
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
                lUrl = "{{ site_url('/periodPackage/show/cate/3008/pack/648001/prod-code/155240') }}";
            }
            location.href = lUrl;
        }

        function goDesc(tab){
            location.href = '#careful';
        }
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop