@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
<style type="text/css">
.evtContent { 
    position:relative;            
    width:100% !important;
    margin-top:20px !important;
    padding:0 !important;
    background:#fff;
}	
.evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
/*****************************************************************/  

.sky {position:fixed;top:250px;right:25px;z-index:1;}
.sky a {display:block;padding-top:10px;}

.evt_tops {background:url(https://static.willbes.net/public/images/promotion/2021/01/1840_tops_bg.jpg) no-repeat center top;}

.evt_top {background:#181715 url(https://static.willbes.net/public/images/promotion/2020/09/1840_top_bg.jpg) no-repeat center top;}

.evt_youtube{padding:50px 0;}

 /*타이머*/
 .newTopDday * {font-size:24px}
.newTopDday {background:#e4e4e4; width:100%; padding:15px 0 40px}
.newTopDday ul {width:1120px; margin:0 auto;}
.newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-size:28px; height:60px; line-height:60px; padding-top:10px !important; font-weight:bold; color:#000}
.newTopDday ul li strong {line-height:60px}
.newTopDday ul li img {width:50px}
.newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%; font-size:16px; color:#666; line-height:2.5; }
.newTopDday ul li:first-child span { font-size:28px; color:#000; }
.newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%; line-height:60px}
.newTopDday ul:after {content:""; display:block; clear:both}

.evt04 {background:#F7DDBC}
.evt04 .check{
    position:absolute;width: 800px;left:50%;top:1000px;margin-left:-250px;z-index:1;font-size:16px; text-align:center;line-height:1.5;
    letter-spacing:-1px;font-weight:bold;
}
.evt04 .check label{color:#000}
.evt04 .check input {border: 2px solid #000;margin-right: 8px;height: 20px; width: 20px;} 
.evt04 .check a {display: inline-block; padding:5px 20px; color: #fff;background: #000;border-radius:20px; margin-left:20px}
.evt04 .check a:hover {color: #111528;background: #d7d7d7;}

.evtInfo {padding:80px 0; background:#fff; color:#000; font-size:16px}
.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
.evtInfoBox li {list-style:disc; margin-left:20px; font-size:14px}
.evtInfoBox h4 {font-size:35px; margin-bottom:50px}
.evtInfoBox .infoTit {font-size:20px;}
.evtInfoBox ul {margin-bottom:30px}

.evt05 {background:#F79647}
.evt05 .check{
    position:absolute;left:48%;top:960px;margin-left:-250px;z-index:1;font-size:16px; text-align:center;line-height:1.5;letter-spacing:-1px;font-weight:bold;}
.evt05 .check label{color:#000}
.evt05 .check input {border: 2px solid #000;margin-right: 8px;height: 20px; width: 20px;} 
.evt05 .check a {display: inline-block; padding:5px 20px; color: #fff;background: #000;border-radius:20px; margin-left:20px}
.evt05 .check a:hover {color: #111528;background: #d7d7d7;}

.evt06 {background:#F79647}

</style>

    <div class="evtContent NGR" id="evtContainer"> 

        <div class="sky">
            <a href="#start"><img src="https://static.willbes.net/public/images/promotion/2021/01/1840_sky.png" alt="전격판매" ></a>
            <a href="#start"><img src="https://static.willbes.net/public/images/promotion/2021/01/1840_sky2.png" alt="50%할인" ></a>
        </div>

        <div class="evtCtnsBox evt_tops">  
            <img src="https://static.willbes.net/public/images/promotion/2021/01/1840_tops.jpg" alt="막판 스퍼트 올리기" usemap="#Map1840_start" border="0">
            <map name="Map1840_start" id="Map1840_start">
                <area shape="rect" coords="223,616,897,679" href="#start" />
            </map>  
        </div>

        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1840_top.jpg" alt="이종오 티패스">  
        </div>

        <div class="evtCtnsBox evt_01">  
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1840_01.jpg" alt="불꽃을 보여주마">  
        </div>

        <div class="evtCtnsBox evt02"> 
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1840_02.jpg" alt="열정을 보여주마">
        </div>

        <div class="evtCtnsBox evt_youtube">  
            <iframe width="853" height="480" src="https://www.youtube.com/embed/xBWCniTv_Ro?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
        </div>

        <div class="evtCtnsBox evt03"> 
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1840_03.jpg" alt="플랜">
        </div>       

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1840_04.jpg" alt="수강신청" usemap="#Map1840a" border="0">
            <map name="Map1840a" id="Map1840a">
                <area shape="rect" coords="406,858,569,909" href="javascript:go_PassLecture('172108');" />
                <area shape="rect" coords="621,858,783,910" href="javascript:go_PassLecture('172112');" />
                <area shape="rect" coords="836,859,998,909" href="javascript:go_PassLecture('172107');" />
            </map>
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>   
        </div>

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday NG">        
            <div>
                <ul>
                    <li>                                
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

        <div class="evtCtnsBox evt05" id="start"> 
            <img src="https://static.willbes.net/public/images/promotion/2021/01/1840_evt01.jpg" alt="이벤트01 수강신청" usemap="#Map1840_class" border="0">
            <map name="Map1840_class" id="Map1840_class">
                <area shape="rect" coords="189,810,352,861" href="javascript:go_PassLecture('178399');" />
                <area shape="rect" coords="479,810,642,861" href="javascript:go_PassLecture('178400');" />
                <area shape="rect" coords="767,810,931,860" href="javascript:go_PassLecture('178398');" />
            </map>
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>   
        </div>    

        <div class="evtCtnsBox evt06"> 
            <img src="https://static.willbes.net/public/images/promotion/2021/01/1840_evt02.jpg" alt="이벤트02 수강신청" usemap="#Map1840_apply" border="0">
            <map name="Map1840_apply" id="Map1840_apply">
                <area shape="rect" coords="287,367,452,418" href="https://pass.willbes.net/lecture/show/cate/3023/pattern/only/prod-code/177285" target="_blank" />
                <area shape="rect" coords="667,366,831,418" href="https://pass.willbes.net/lecture/show/cate/3023/pattern/only/prod-code/177286" target="_blank" />
            </map>
        </div>    

        <div class="evtCtnsBox evt07"> 
            <img src="https://static.willbes.net/public/images/promotion/2021/01/1840_discount.jpg" alt="소문내고 할인받자" usemap="#Map1840_sns" border="0">
            <map name="Map1840_sns" id="Map1840_sns">
                <area shape="rect" coords="177,931,362,1018" href="https://gall.dcinside.com/board/lists?id=government" target="_blank" />
                <area shape="rect" coords="379,928,563,1018" href="https://cafe.daum.net/im119?q=%EC%86%8C%EC%82%AC%EB%AA%A8" target="_blank" />
                <area shape="rect" coords="583,926,756,1020" href="https://cafe.naver.com/sdraft" target="_blank" />
                <area shape="rect" coords="776,925,959,1022" href="https://cafe.naver.com/willbes" target="_blank" />
            </map>
        </div> 
        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
        @endif

        <div class="evtCtnsBox evtInfo NGR" id="careful">
			<div class="evtInfoBox">
				<h4 class="NGEB">이용안내 및 유의사항</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>본 PASS는 소방직 대비 과정으로, 이종오 교수의 소방학/소방관계법규를 배수 제한 없이 무제한으로 수강 가능합니다.</li>
                    <li>2021년 대비로 진행되는 신규 개강 강좌를 커리큘럼 진행에 따라 순차적으로 제공해드리는 상품입니다.</li>
                    <li>일정 및 진행 방식은 상이하게 진행될 수 있으며, 학원 사정에 따라 부득이하게 커리큘럼이 변경될 수 있다는 점 숙지 부탁드립니다.<br>
                        (제공 과정은 수강신청 상세안내 화면을 참고해주시기 바랍니다.)
                    </li>              
				</ul>
				<div class="infoTit NG"><strong>수강기간</strong></div>
				<ul>
					<li>수강기간은 상품 상세 안내 페이지에 표시된 기간만큼 제공되며, 결제가 완료되는 즉시 수강이 시작됩니다.</li>       
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
                    <li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                    <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭,원하는 과목/교수님/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                    <li>본 PASS를 이용 중에는 일시 정지 기능을 사용할 수 없습니다.</li>
                    <li>본 PASS 수강 시 이용가능한 기기는 다음과 같이 제한됩니다.<br>
                        - PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)
                    </li>
                    <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.</li>
				</ul>
                <div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도로 구입 가능합니다.</li>                                   				
				</ul>
				<div class="infoTit NG"><strong>환불정책</strong></div>
				<ul>
                    <li>결제 후 7일 이내 전액 환불 가능합니다.</li>                    				
                    <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                    <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</li>
                    <li>본 상품은 특별 기획 상품으로, 수강시작일(결제 당일 포함)로부터 7일 경과 후 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 차감하고 환불됩니다.<br>
                        · 결제금액 - (강좌 정상가의 1일 이용대금×이용일수)
                    </li>
				</ul>
                <div class="infoTit NG"><strong>유의사항</strong></div>
				<ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선/적립금 사용 등 혜택이 적용되지 않습니다.</li>                    				
                    <li>선택한 교수의 강의가 학원 사정에 의해 부득이하게 진행되지 않을 경우 대체 강의가 제공되며, 이로 인한 환불은 불가합니다.</li>
                    <li>아이디 공유 적발 시 회원 자격 박탈 및 환불 불가하며, 추가적인 불법 공유 행위 적발 시 형사 고발 조치가 단행될 수 있습니다.</li>                 
				</ul>
                <div class="infoTit NG"><strong>※ 이용 문의 : 윌비스 고객만족센터 1544-5006</strong></div>
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
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop
