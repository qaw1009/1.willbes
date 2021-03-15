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

        /************************************************************/ 

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/02/2087_top_bg.jpg) no-repeat center top;}

        .evt02 {background:#f0f0f0;}

        .evt03 {background:#f0f0f0;}

        .evt06 {background:#f0f0f0;padding-bottom:100px;}
        .check {margin-top:20px; color:#333; font-size:14px}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#000; margin-left:50px; border-radius:20px}
        .check a.infotxt:hover {background:#d9312b}   

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
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2087_top.jpg" alt="김동진 법원팀" />
		</div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2087_01.jpg" alt="합격의 기준" />
		</div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2087_02.jpg" alt="연간 커리큘럼" usemap="#Map2087a" border="0" />
            <map name="Map2087a" id="Map2087a">
                <area shape="rect" coords="238,655,342,719" href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MeyInO2ZmA%3D%3D" target="_blank" />
                <area shape="rect" coords="372,655,476,719" href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MuyInO2ZmA%3D%3D" target="_blank" />
                <area shape="rect" coords="505,655,610,719" href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6M%2ByInO2ZmA%3D%3D" target="_blank" />
                <area shape="rect" coords="642,655,746,719" href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NOyInO2ZmA%3D%3D" target="_blank" />
                <area shape="rect" coords="780,655,885,719" href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NeyInO2ZmA%3D%3D" target="_blank" />
            </map>
		</div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2087_03.jpg" alt="수강생 중심 운영" />
		</div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2087_04.jpg" alt="절대 만족 후기" usemap="#Map2087b" border="0" />
            <map name="Map2087b" id="Map2087b">
                <area shape="rect" coords="391,1056,727,1119" href="http://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" />
            </map>
		</div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2087_05.jpg" alt="연간 온라인패스 라인업" />
		</div>

		<div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2087_06.jpg" alt="수강신청하기" usemap="#Map2087c" border="0" />
            <map name="Map2087c">
                <area shape="rect" coords="636,790,859,861" href="javascript:go_PassLecture('179623')" alt="예비+정규순환">
                <area shape="rect" coords="636,1054,862,1122" href="javascript:go_PassLecture('179624')" alt="정규순환">
            </map>
            <div class="check" id="chkInfo">   
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#ctsInfo" class="infotxt">이용안내확인하기 ↓</a>
            </div> 
        </div> 
        
        <div class="evtCtnsBox evtInfo" id="ctsInfo">
            <div class="guide_box">
                <h2 class="NSK-Black">이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 윌비스김동진법원팀 교수진의 지정된 순환별 과정을 배수 제한 없이 무제한 수강 가능합니다.</li>
                            <li>「예비+정규순환」 상품 : <br>
                            민법(김동진), 민사소송법(이덕훈), 형법(문형석), 형사소송법(유안석), 헌법(이국령), 국어(이현나), 영어(박초롱), 한국사(임진석) 교수별 예비순환 및 1~5순환 과정</li>
                            <li>「정규순환」 상품 : <br>
                            민법(김동진), 민사소송법(이덕훈), 형법(문형석), 형사소송법(유안석), 헌법(이국령), 국어(이현나), 영어(박초롱), 한국사(임진석) 교수별 1~5순환 과정</li>
                            <li class="none">※ 개강 전후 부득이한 학원 사정에 의해 일부 강사진의 변동이 있을 수 있습니다.</li>
                        </ol>
                    </dd>
                    <dt>수강기간</dt>
                    <dd>
                        <ol>
                            <li>등록일부터 2022년 7월 시험까지 제공되며, 결제가 완료되는 즉시 수강 가능한 강의가 제공됩니다.</li>
                            <li> ｢예비+정규순환｣ 상품의 경우, 2021년 1월 4일부터 2021년 예비순환 강의가 순차적으로 업로드 되어 제공됩니다.</li>
                            <li>2021년 4월 초부터 2021년 1~5순환 강의가 일정에 맞추어 순차적으로 업로드 되어 제공됩니다.</li>                                                        
                        </ol>
                    </dd>
                    <dt>수강방법 및 제한</dt>
                    <dd>
                        <ol>
                            <li>홈페이지 [내강의실] 메뉴에서 [무한PASS존]으로 접속합니다.</li>
                            <li>접속 후 구매하신 무한PASS 상품명 옆의 [강좌추가]를 선택합니다.</li>
                            <li>원하는 과목/교수/강좌를 선택하여 등록하신 후 수강이 가능합니다.</li>
                            <li>수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC&모바일 각 1대｣로 총 2대의 기기로 제한됩니다.</li>
                            <li>PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 
                                추후 단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>        
                            <li>본 패스 상품은 구매일로부터 바로 수강이 진행되며, 수강기간 조정 및 정지가 불가합니다.</li>             
                        </ol>
                    </dd>
                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>모든 교재는 별도로 구매하셔야 합니다. 각 강좌별 교재는 무한PASS존 내 [교재구매]를 선택하여 구매 가능합니다.</li>
                            <li>강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>
                            <li>4~5순환 모의고사 문제 및 해설지는 택배를 통해 실물로 배송됩니다. 구체적인 방법은 4순환 개강 전 별도 고지해드립니다.</li>                      
                        </ol>
                    </dd>
                    <dt>환불관련</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내에 전액환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액환불대상이 됩니다.</li>
                            <li>자료 또는 모바일 강의 다운로드 시에도 이용 및 수강 여부와 무관하게 수강한 것으로 간주됩니다.</li>
                            <li>본 상품은 할인가가 적용된 특별기획상품이므로 부분환불은 정가 대비 사용일수에 따라 차감 후 환불됩니다. 
                            구체적인 환불기준은 환불 시 고객센터로 문의 시 자세히 안내 받으실 수 있습니다.</li>                      
                        </ol>
                    </dd>
                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별기획상품으로 쿠폰 할인, 적립금 사용 등 혜택이 적용되지 않습니다.</li>
                            <li>학원 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.</li>
                            <li>아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민형사상 책임을 질 수 있습니다.</li>                      
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