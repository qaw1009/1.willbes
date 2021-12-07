@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5);}*/

    .evt03 {background:#f1f1f1; padding-bottom:50px}
    .evtCtnsBox .check {font-size:16px; text-align:center; line-height:1.5;; margin:40px 20px 0;font-weight:bold;}
    .evtCtnsBox .check input {border:2px solid #000; margin-right:10px; height:20px; width:20px}
    .evtCtnsBox .check a {display:block; width:60%; padding:5px 20px; color:#fff; background:#000; margin:20px auto 0; border-radius:20px}
    .evtCtnsBox .info {margin:20px 20px 0; line-height:1.4; text-align:left; font-size:14px;font-weight:bold;}

    
    .evt04 {background:#fff;padding-bottom:50px;}	 

    .evt04_table {padding:20px; background:#fff;}        
    .evt04_table .title {font-size:22px; color:#0089f9; text-align:left; margin-bottom:10px;margin-top:30px;}
    .evt04_table tr {border-bottom:1px solid #ccc;border-top:1px solid #ccc;}        
    .evt04_table tr.st01 {background:#e3e4e5}
    .evt04_table tr:hover {background:#f7f7f7;}
    .evt04_table th,
    .evt04_table td {padding:10px; font-size:16px; font-weight:500;text-align:center;}
    .evt04_table th {background:#d2fefd; color:#000 ;border-right:1px solid #ccc;font-weight:bold;}
    .evt04_table th:last-child{border:0;}
    .evt04_table td:nth-child(1) {border-right:1px solid #ccc;font-weight:bold; text-align:left}
    .evt04_table td:nth-child(2) {border-right:1px solid #ccc;font-weight:bold;}
    .evt04_table td:nth-child(3) {border-right:1px solid #ccc;font-weight:bold;}
    .evt04_table td:last-child {border:0}
    .evt04_table td p {font-size:12px}
    .evt04_table a {padding:10px; color:#fff; background:#333; font-size:14px; display:block; border-radius:10px;}    
    .evt04_table{background:#fff;} 

    .evtInfo {padding:50px 20px; background:#555; color:#fff; font-size:14px}
    .evtInfoBox {text-align:left; line-height:1.4}
    .evtInfoBox h4 {font-size:30px; margin-bottom:40px}
    .evtInfoBox .infoTit {font-size:18px;margin-bottom:15px}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox li {list-style-type:decimal; margin-left:20px; margin-bottom:5px}

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
    <div class="evtCtnsBox evt00">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div>

    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2021/12/2446m_01.gif" alt="문제풀이 풀패키지"/>
    </div>

    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2021/12/2446m_02.jpg" alt="커리큘럼"/>
    </div>

    <div class="evtCtnsBox evt02">
        <div class="p_re">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2446m_03.jpg"  alt="문제풀이 풀패키지"/>
            <a href="javascript:go_PassLecture('188139');" title="김원욱 헌법" style="position: absolute; left: 16.94%; top: 82.76%; width: 27.78%; height: 8.05%;z-index: 2;"></a>
            <a href="javascript:go_PassLecture('188140');" title="이국령 헌법" style="position: absolute; left: 55.28%; top: 82.76%; width: 27.78%; height: 8.05%; z-index: 2;"></a>
        </div>
        <div class="check">
            <label><input name="ischk" type="checkbox" value="Y" />페이지 하단 이용안내를 모두 확인하였고,이에 동의합니다.</label>
            <a href="#careful">이용안내 확인하기 ↓</a>               
        </div>
        <div class="info">
            ※ 강의공유,콘텐츠 부정 사용적발시,회원 자격 박탈 및 환불이 불가하며,불법공유 시안에 따라 민형사상 조치가 있을수 있습니다.
        </div>
    </div>

    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2021/12/2446m_04.jpg" alt="단계별 종합반" >  
        <div class="evt04_table">     
            <div class="title NSK-Black">              
                문제풀이 1단계
            </div>   
            <div> 
                <table border="0" cellspacing="0" cellpadding="0">
                    <col width="" />
                    <col width="25%" />
                    <tbody>
                        <tr>
                            <td>
                                2022년 1차대비 1단계종합반 (헌법 김원욱)<br>
                                1,000,000원 > <span class="tx-red">460,000원</span>
                            </td>            
                            <td>
                                
                                <a href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/188105" target="_blank">신청하기 ></a>
                            </td>
                        </tr>     
                        <tr>
                            <td>
                                2022년 1차대비 1단계종합반 (헌법 이국령)<br>
                                1,000,000원 > <span class="tx-red">460,000원</span>
                            </td>                       
                            <td>
                                <a href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/188106" target="_blank">신청하기 ></a>
                            </td>
                        </tr>                          
                    </tbody>
                </table>        
            </div> 
            <div class="title NSK-Black">              
                문제풀이 2단계
            </div>   
            <div> 
                <table border="0" cellspacing="0" cellpadding="0">
                    <col width="" />
                    <col width="25%" />
                    <tbody>
                        <tr>
                            <td>
                                2022년1차대비 2단계 동형모의고사 종합반 (헌법 김원욱)<br>
                                1,000,000원 > <span class="tx-red">400,000원</span>
                            </td>            
                            <td>
                                
                                <a href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/188107" target="_blank">신청하기 ></a>
                            </td>
                        </tr>     
                        <tr>
                            <td>
                                2022년1차대비 2단계 동형모의고사 종합반 (헌법 이국령)<br>
                                1,000,000원 > <span class="tx-red">400,000원</span>
                            </td>                       
                            <td>
                                <a href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/188108" target="_blank">신청하기 ></a>
                            </td>
                        </tr>                          
                    </tbody>
                </table>        
            </div>
            <div class="title NSK-Black">              
                문제풀이 3단계
            </div>   
            <div> 
                <table border="0" cellspacing="0" cellpadding="0">
                    <col width="" />
                    <col width="25%" />
                    <tbody>
                        <tr>
                            <td>
                                2022년1차대비 3단계 파이널 동형모의고사 종합반 (헌법 김원욱)<br>
                                200,000원 > <span class="tx-red">70,000원</span>
                            </td>            
                            <td>
                                
                                <a href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/188107" target="_blank">신청하기 ></a>
                            </td>
                        </tr>     
                        <tr>
                            <td>
                                2022년1차대비 3단계 파이널 동형모의고사 종합반 (헌법 이국령)<br>
                                200,000원 > <span class="tx-red">70,000원</span>
                            </td>                       
                            <td>
                                <a href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/188108" target="_blank">신청하기 ></a>
                            </td>
                        </tr>                          
                    </tbody>
                </table>        
            </div>                                                                        
        </div>   
    </div>

    <div class="evtCtnsBox evtInfo" id="careful">
        <div class="evtInfoBox">
            <h4 class="NSK-Black">윌비스 신광은 경찰 문제풀이 풀패키지 이용안내</h4>
            <div class="infoTit"><strong>상품구성</strong></div>
            <ul>
                <li>선택한 문제풀이 풀패키지 표기 기간 동안 문풀 1~3단계 전 강좌를 무제한 수강 할 수 있습니다.</li>
                <li>문풀 풀패키지 일바 직렬의 경우 한국사 교수님을 1분 선택하셔야 합니다.(변경은 불가)</li>
                <li>문풀 풀패키지 강좌는 결제 완료 후 수강이 즉시 시작됩니다.(수강일 설정 불가)</li>                
            </ul>
            <div class="infoTit"><strong>수강관련</strong></div>
            <ul>
                <li>로그인 후 [내 강의실]-[무한 PASS존]으로 접속합니다.구매하신 [실전 문풀 풀패키지] 선택 후 [강좌 추가하기]클릭, 원하시는 강좌를 등록하시면 수강 할 수 있습니다.</li>
                <li>문풀 풀패키지는 시작일 변경 및 지정,일시정지,수강 연장,재수강 신청 등이 되지 않는 상품입니다.</li>
                <li>문풀 풀패키지 수강 시 이용 가능한 기기는 2대로 제한됩니다.(PC 2대 또는 모바일 2대 또는 PC 1대+모바일 1대)</li>
                <li>PC,모바일 등 단말기 초기화가 필요한 경우 최초 초기화는 본인이 직접 초기화 진행 가능 합니다.그 이후 추가 초기화가 필요할 시 내용 확인 후 초기화 진행 가능 하오니 고객센터로 문의 바랍니다. (무한 PASS존 내 등록 기기정보 확인)</li>
                <li>22년 1차대비 2단계,3단계 문제풀이 강의는 강의자료 3회출력제한 됩니다. <a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=252343" target="_blank" class="tx-sky-blue">출력제한 안내 바로보기 ></a></li>  
            </ul>
            <div class="infoTit"><strong>교재 구매</strong></div>
            <ul>
                <li>실전 문풀 패키지 강의에 사용되는 교재는 별도로 구매하셔야 하며,각 강좌별 교재는 강좌 소개 및 [교재구매] 메뉴에서 구매 가능합니다.</li>  
            </ul>
            <div class="infoTit"><strong>환불 안내</strong></div>
            <ul>
                <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.학습자료 및 모바일 다운로드 이용시 수강한 것으로 간주됩니다.</li>
                <li>고객 변심으로 인한 부분 환불은 수강 시작일(당일포함)로부터 7일이 경과되면,문제풀이 풀패키지 정가 기준으로 계산하여 사용일수만큼 차감하고 환불됩니다.</li>  
            </ul>  
            <div class="infoTit"><strong>유의사항</strong></div>
            <ul>
                <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립급 사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</li>
                <li>신광은 경찰 문풀풀패키지 강좌(부가 서비스 등)중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</li>
                <li>아이디 공유,타인양도 등 부정 사용 적발 시 회원 자격 박탈 및 환불 불가하며,불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</li>  
            </ul>              
            <div class="infoTit"><strong>※ 이용문의 : 고객만족센터 1544-5006</strong></div>			
        </div>
    </div> 
</div>		

    <!-- End Container -->
    <script type="text/javascript">
        function go_PassLecture(code) {
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            var url = '{{ front_url('/periodPackage/show/cate/3001/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        $(document).ready(function(){
            $(".tabContents").hide();
            $(".tabContents:first").show();
            $(".tabContaier ul li a").click(function(){
            var activeTab = $(this).attr("href");
            $(".tabContaier ul li a").removeClass("active");
            $(this).addClass("active");
            $(".tabContents").hide();
            $(activeTab).fadeIn();
            return false;
            });
        });
    </script> 
@stop