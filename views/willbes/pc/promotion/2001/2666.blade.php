@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">       
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        /*.evtCtnsBox .wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5);}*/

        /************************************************************/

        .sky {position:fixed;top:150px;right:10px;z-index:1;} 
        .sky a {display:block; margin-bottom:10px; box-shadow:0 5px 5px rgba(0,0,0,.1);}

        .evtTop00 {background:#0a0a0a}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/05/2666_top_bg.jpg) no-repeat center top;}     

        .evt01 {background:#fff;position:relative;}
        .youtube {position:absolute; top:397px; left:50%; z-index:1;margin-left:-430px}
        .youtube iframe {width:860px; height:484px}

        .evt02 {background:#f8f8f8;}

        .evt03 {background:#fff;padding-bottom:100px}
        
        .evt05 {background:#f8f8f8;padding-bottom:100px;}
        .evt05_table {width:1000px; margin:0 auto; padding:50px 0; background:#f8f8f8;}        
        .evt05_table .title {font-size:30px; color:#1f2327; text-align:left; margin-bottom:30px;margin-top:45px;}
        .evt05_table .title  span {color:#d2fefd; border-bottom:3px solid #9e96c2;}
        .evt05_table tr {border-bottom:1px solid #000;border-top:1px solid #000;}        
        .evt05_table tr.st01 {background:#e3e4e5}
        .evt05_table tr:hover {background:#f7f7f7;}
        .evt05_table th,
        .evt05_table td {padding:15px 20px; font-size:16px; font-weight:500;}
        .evt05_table th {background:#e2e2e2; color:#000 ;border-right:1px solid #000;font-weight:bold;}
        .evt05_table th:last-child{border:0;}
        .evt05_table td:nth-child(1) {text-align:left;border-right:1px solid #000;font-weight:bold;}
        .evt05_table td:nth-child(2) {border-right:1px solid #000;font-weight:bold;}
        .original {text-decoration:line-through;}       
        .evt05_table td:nth-child(3) {border-right:1px solid #000;font-weight:bold;}
        .evt05_table td:last-child {border:0}
        .evt05_table td p {font-size:12px}
        .evt05_table td span {vertical-align:top; font-size:120%}
        .evt05_table a {padding:10px 14px; color:#fff; background:#333; font-size:14px; display:block; border-radius:20px;}    
        .evt05_table a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}

        .evt06 {background:url(https://static.willbes.net/public/images/promotion/2022/05/2666_06_bg.jpg) no-repeat center top;}  

        .evtInfo {padding:100px 0; background:#555; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:35px; margin-bottom:40px}
		.evtInfoBox .infoTit {font-size:20px;margin-bottom:15px}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type:decimal; margin-left:20px; margin-bottom:5px}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        
        <div class="sky" id="QuickMenu">
            <a href="#lec01">
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2666_sky01.png" alt="1단계" >
            </a>
            <a href="#lec02">
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2666_sky02.png" alt="2단계" >
            </a>
            <a href="#lec03">
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2666_sky03.png" alt="3단계" >
            </a>
            <a href="#apply">
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2666_sky04.png" alt="단계별 종합반" >
            </a>
        </div> 

        <div class="evtCtnsBox evtTop00"> 
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1009_first.jpg" title="대한민국 경찰학원 1위">        
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2666_top.jpg" title="문제풀이 1+2+3단계">                    
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2666_01.jpg" title="유튜브">
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/pk4OGsOavys?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2666_02.jpg" title="문제풀이 과정">           
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2666_03_01.jpg" title="문제풀이 1단계" id="lec01" data-aos="fade-up">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2666_03_02.jpg" title="문제풀이 2단계" id="lec02" data-aos="fade-up">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif 
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2666_03_03.jpg" title="문제풀이 3단계" id="lec03" data-aos="fade-up">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
            @endif 
        </div>     

        <div class="evtCtnsBox evt05" id="apply" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2666_05.jpg" title="단계별 종합반" />   
            <div class="evt05_table">     
                <div class="title NSK-Black">              
                    문제풀이 1단계
                </div>   
                <div> 
                    <table border="0" cellspacing="0" cellpadding="0">
                        <col />
                        <col width="28%" />
                        <col width="15%" />
                        <thead>
                            <tr>
                                <th>강의명</th>
                                <th>수강료</th>                        
                                <th>학원수강</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2022년 2차대비 1단계종합반 (헌법 김원욱)</td>
                                <td><span class="original">900,000원</span> > <span class="tx-red">405,000원</span></td>              
                                <td><a href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/196283" target="_blank">신청하기 ></a></td>
                            </tr>     
                            <tr>
                                <td>2022년 2차대비 1단계종합반 (헌법 이국령)</td>
                                <td><span class="original">900,000원 ></span> <span class="tx-red">405,000원</span></td>                         
                                <td><a href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/196284" target="_blank">신청하기 ></a></td>
                            </tr>
                            <tr>
                                <td>2022년 2차대비 1단계종합반 (경행경채)</td>
                                <td><span class="original">900,000원 ></span> <span class="tx-red">405,000원</span></td>                         
                                <td><a href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/196285" target="_blank">신청하기 ></a></td>
                            </tr>                        
                        </tbody>
                    </table>        
                </div> 
                <div class="title NSK-Black">              
                    문제풀이 2단계
                </div>   
                <div> 
                    <table border="0" cellspacing="0" cellpadding="0">
                        <col width="60%" />
                        <col width="25%" />
                        <col width="15%" />
                        <thead>
                            <tr>
                                <th>강의명</th>
                                <th>수강료</th>                        
                                <th>학원수강</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2022년 2차대비 2단계 동형모의고사 종합반 (헌법 김원욱)</td>
                                <td><span class="original">1,000,000원 ></span> <span class="tx-red">400,000원</span></td>                          
                                <td><a href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/196298" target="_blank">신청하기 ></a></td>
                            </tr>  
                            <tr>
                                <td>2022년 2차대비 2단계 동형모의고사 종합반 (헌법 이국령)</td>
                                <td><span class="original">1,000,000원 ></span> <span class="tx-red">400,000원</span></td>                          
                                <td><a href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/196299" target="_blank">신청하기 ></a></td>
                            </tr>
                            <tr>
                                <td>2022년 2차대비 2단계 동형모의고사 종합반 (경행경채)</td>
                                <td><span class="original">1,000,000원 ></span> <span class="tx-red">400,000원</span></td>                          
                                <td><a href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/196300" target="_blank">신청하기 ></a></td>
                            </tr>                    
                        </tbody>
                    </table>        
                </div>
                <div class="title NSK-Black">              
                    문제풀이 3단계
                </div>   
                <div> 
                    <table border="0" cellspacing="0" cellpadding="0">
                        <col width="60%" />
                        <col width="25%" />
                        <col width="15%" />
                        <thead>
                            <tr>
                                <th>강의명</th>
                                <th>수강료</th>                        
                                <th>학원수강</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2022년 2차대비 3단계 파이널 모의고사 종합반 (헌법 김원욱)</td>
                                <td><span class="original">200,000원 ></span> <span class="tx-red">70,000원</span></td>                          
                                <td><a href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/196303" target="_blank">신청하기 ></a></td>
                            </tr>
                            <tr>
                                <td>2022년 2차대비 3단계 파이널 모의고사 종합반 (헌법 이국령)</td>
                                <td><span class="original">>200,000원 ></span> <span class="tx-red">70,000원</span></td>                          
                                <td><a href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/196304" target="_blank">신청하기 ></a></td>
                            </tr>
                            <tr>
                                <td>2022년 2차대비 3단계 파이널 모의고사 종합반 (경행경채)</td>
                                <td><span class="original">200,000원 ></span> <span class="tx-red">70,000원</span></td>                          
                                <td><a href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/196305" target="_blank">신청하기 ></a></td>
                            </tr>                                                        
                        </tbody>
                    </table>        
                </div>                                                                        
            </div>   
        </div>

        <div class="evtCtnsBox evt06" data-aos="fade-up"> 
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2666_06.jpg" title="경찰 pass 바로가기">
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/2664" title="바로가기" target="_blank" style="position: absolute;left: 4.39%;top: 59.53%;width: 45.88%;height: 13.34%;z-index: 2;"></a>                
            </div>           
        </div>

        <div class="evtCtnsBox evtInfo" id="careful" data-aos="fade-up"> 
			<div class="evtInfoBox">
				<h4 class="NSK-Black">윌비스신광은 경찰 문제풀이 이용안내</h4>
				<div class="infoTit"><strong>상품 구성</strong></div>
				<ul>
					<li>1단계 , 2단계 . 3단계로 각각 종합반 구성되었습니다.</li>
                    <li>각 종합반은 결제완료 후 수강이 즉시 시작됩니다.(수강일  설정불가)</li>
                    <li>22년 2차대비 2단계,3단계 문제풀이 강의는 강의자료 3회출력제한 됩니다. <a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=252343" target="_blank" class="tx-sky-blue">출력제한 안내 바로보기 ></a></li>
                    <li>각 종합반은 시작일 변경 및 지정,일시정지,수강 연장,재수강 신청 등이 되지 않는 상품입니다.</li>                
				</ul>			
                <div class="infoTit"><strong>교재 구매</strong></div>
				<ul>
					<li>문제풀이 종합반 강의에 사용되는 교재는 별도로 구매하셔야 하며,각 강좌별 교재는 강좌 소개 및 [교재구매] 메뉴에서 구매 가능합니다.</li>  
				</ul>
                <div class="infoTit"><strong>환불 안내</strong></div>
				<ul>
					<li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.학습자료 및 모바일 다운로드 이용시 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 부분 환불은 수강 시작일(당일포함)로부터 7일이 경과되면,문제풀이 풀패키지 정가 기준으로 계산하여 사용일수만큼 차감하고 환불됩니다.</li>  
				</ul>  
                <div class="infoTit"><strong>유의사항</strong></div>
				<ul>
					<li>신광은 경찰 문풀종합반 강좌(부가 서비스 등)중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</li>
                    <li>아이디 공유,타인양도 등 부정 사용 적발 시 회원 자격 박탈 및 환불 불가하며,불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</li>                    
				</ul>              
				<div class="infoTit"><strong>※ 이용문의 : 고객만족센터 1544-5006</strong></div>			
			</div>
		</div>        
	</div>

     <!-- End evtContainer -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    <script type="text/javascript">

        function go_PassLecture(code) {
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            var url = '{{ site_url('/periodPackage/show/cate/3001/pack/648001/prod-code/') }}' + code;
            location.href = url;
        } 

    </script>
        {{-- 프로모션용 스크립트 include --}}
        @include('willbes.pc.promotion.promotion_script')
    @stop