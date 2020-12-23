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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/ 

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/12/1988_top_bg.jpg) no-repeat center top;}	 
        .evt01 {background:#3AD065;}     
        .evt02,.evt03,.evt04 {background:#f0f0f0;}  
        .evt05 {background:#212121;} 

        .check {margin-top:20px; color:#333; font-size:14px}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#000; margin-left:50px; border-radius:20px}
        .check a.infotxt:hover {background:#d9312b}   

        /* 이용안내 */
        .evtInfo {padding:100px 0; background:#fff; color:#000; line-height:1.5}
        .guide_box{width:1120px; margin:0 auto; pa#555dding:0 50px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px;}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:16px;}        
        .guide_box dd{margin-bottom:50px;}
        .guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px;font-size:15px;}
        .guide_box dd li.none {list-style:none; margin-left:0}
        .guide_box dd:last-child {margin:0}
        .contact {font-size:20px;font-weight:bold;}
        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1988_top.jpg" alt="" />            
		</div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1988_01.jpg" alt="" />
        </div>
        
        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1988_02.jpg" alt="" />
        </div>
        
        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1988_03.jpg" alt="" />
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1988_04.jpg" alt="" />
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1988_05.jpg" alt="" usemap="#Map" border="0" />
            <map name="Map" id="Map">
                <area shape="rect" coords="782,545,969,596" href="https://pass.willbes.net/package/show/cate/3035/pack/648001/prod-code/177100" target="_blank" />
                <area shape="rect" coords="782,775,973,828" href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/177330" target="_blank" />
                <area shape="rect" coords="782,985,972,1039" href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/177093"target="_blank" />
                <area shape="rect" coords="783,1196,968,1250" href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/177095" target="_blank" />
                <area shape="rect" coords="784,1405,972,1459" href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/177099" target="_blank" />
                <area shape="rect" coords="783,1615,973,1670" href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/177096" target="_blank" />
                <area shape="rect" coords="782,1825,972,1879" href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/177098" target="_blank" />
                <area shape="rect" coords="782,2035,973,2089" href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/177097" target="_blank" />
            </map>
        </div>
        
        <div class="evtCtnsBox evtInfo" id="ctsInfo">
            <div class="guide_box">
                <h2 class="NSK-Black">이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>                    
                            <li>2021 예비순환 패키지 <br>
                                - 패키지 상품은 윌비스김동진법원팀 교수진의 지정된 예비순환 과정을 기간 내 배수 제한 없이 무제한 수강 가능합니다.<br>
                                - 민법(김동진), 민사소송법(이덕훈), 형법(문형석), 형사소송법(유안석), 헌법(이국령), 영어(박초롱), 한국사(임진석) 교수별 예비순환 과정 <br>
                                ※ 개강 전후 부득이한 학원 사정에 의해 일부 강사진의 변동이 있을 수 있습니다.
                            </li>  
                            <li>2021 예비순환 단과<br>
                                - 단과 상품은 구매하신 교수의 단과과목을 지정된 기간 내 2배수 제한으로 수강 가능합니다. 개별수강기간은 각 과목별 구매페이지에서 확인하실 수 있습니다.
                            </li>                      
                        </ol>
                    </dd>
                    <dt>수강기간</dt>
                    <dd>
                        <ol>
                            <li>2021 예비순환 패키지<br>
                                - 수강시작일로부터 120일동안 제공되며, 수강을 시작하는 즉시 수강 가능한 강의가 제공됩니다.<br>
                                - 2021 예비순환 강의는 2021년 1월 4일부터 진행되므로 1월 5일부터 순차적으로 업로드될 예정입니다.
                            </li>   
                            <li>2021 예비순환 단과<br>
                                - 구매하신 단과 과목의 개별 수강기간은 각 과목별 구매페이지에서 확인하실 수 있습니다. 일부 과목의 경우 구매시기에 따라 수강기간이 차이가 날 수 있습니다.<br>
                                - 단과 과목별 개강시기는 민법 1/4(월), 헌법 1/5(화), 한국사 1/6(수), 형법 1/7(목), 영어 1/9(토), 민소법 2/18(목), 형소법 2/22(월)이며, 특별한 사정이 없는 한 개강 다음날부터 업로드될 예정입니다.
                            </li>                                     
                        </ol>
                    </dd>
                    <dt>수강방법 및 제한</dt>
                    <dd>
                        <ol>
                            <li>홈페이지 [내강의실] 메뉴에서 [온라인강좌] > [수강중강좌] > [패키지강좌]로 접속합니다.</li>
                            <li>접속 후 구매하신 패키지 상품명 옆의 [강좌추가]를 선택합니다.</li>
                            <li>원하는 과목/교수/강좌를 선택하여 등록하신 후 수강이 가능합니다.<br>
                                - 수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC&모바일 각 1대｣로 총 2대의 기기로 제한됩니다.<br>
                                - PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 추후 단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.
                            </li>              
                        </ol>
                    </dd>
                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>모든 교재는 별도로 구매하셔야 합니다. 각 강좌별 [수강중강좌] 페이지 내 [교재구매]를 선택하여 구매 가능합니다.</li>
                            <li>민법기본강의 교재는 2020년 기본서로 진행됩니다. 3월 중 2021년 개정판이 출간되며, 4월 기본강의는 개정판으로 진행됩니다</li>
                            <li>강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>                      
                        </ol>
                    </dd>
                    <dt>환불관련</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내에 전액환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액환불대상이 됩니다.</li>
                            <li>자료 또는 모바일 강의 다운로드 시에도 이용 및 수강 여부와 무관하게 수강한 것으로 간주됩니다.</li>
                            <li>패키지상품은 할인가가 적용된 특별기획상품이므로 부분환불은 정가 대비 사용일수에 따라 차감 후 환불됩니다.<br>
                                구체적인 환불기준은 환불 시 고객센터로 문의 시 자세히 안내 받으실 수 있습니다.
                            </li>                      
                        </ol>
                    </dd>
                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>패키지상품은 특별기획상품으로 쿠폰 할인, 적립금 사용 등 혜택이 적용되지 않습니다.</li>
                            <li>학원 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.</li>
                            <li>아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민·형사상 책임을 질 수 있습니다.</li>                      
                        </ol>
                    </dd>
                    <p class="contact">※ 이용문의 : 고객만족센터 1544-5006</p>
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