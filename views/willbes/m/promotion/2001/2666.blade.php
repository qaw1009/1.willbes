@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5);}*/
        
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
    .original {text-decoration:line-through;}
    .evt04_table td:nth-child(3) {border-right:1px solid #ccc;font-weight:bold;}
    .evt04_table td:last-child {border:0}
    .evt04_table td p {font-size:12px}
    .evt04_table a {padding:10px; color:#fff; background:#333; font-size:14px; display:block; border-radius:10px;}    
    .evt04_table{background:#fff;}

    .evtInfo {padding:50px 20px; background:#555; color:#fff; font-size:14px}
    .evtInfoBox {text-align:left; line-height:1.4}
    .evtInfoBox h4 {font-size:30px; margin-bottom:40px}
    .evtInfoBox .infoTit {font-size:17px;margin-bottom:15px}
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

    <div class="evtCtnsBox evt00" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div>

    <div class="evtCtnsBox evtTop" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2666m_top.jpg" alt="문제풀이 1+2+3단계"/>
    </div>

    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2666m_02.jpg" alt="유튜브"/>
    </div>

    <div class="evtCtnsBox evt03" data-aos="fade-up"> 
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2666m_03_01.jpg" title="문제풀이 1단계">
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif 
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2666m_03_02.jpg" title="문제풀이 2단계">
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
        @endif 
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2666m_03_03.jpg" title="문제풀이 3단계">
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>3))
        @endif 
    </div>

    <div class="evtCtnsBox evt05" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2666m_05.jpg" alt="단계별 종합반" >  
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
                                2022년 2차대비 1단계종합반 (헌법 김원욱)<br>
                                <span class="original">900,000원 ></span> <span class="tx-red">405,000원</span>
                            </td>            
                            <td>
                                
                                <a href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/196283" target="_blank">신청하기 ></a>
                            </td>
                        </tr>     
                        <tr>
                            <td>
                                2022년 2차대비 1단계종합반 (헌법 이국령)<br>
                                <span class="original">900,000원 ></span> <span class="tx-red">405,000원</span>
                            </td>                       
                            <td>
                                <a href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/196284" target="_blank">신청하기 ></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                2022년 2차대비 1단계종합반 (경행경채)<br>
                                <span class="original">900,000원 ></span> <span class="tx-red">405,000원</span>
                            </td>                       
                            <td>
                                <a href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/196285" target="_blank">신청하기 ></a>
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
                                2022년 2차대비 2단계 동형모의고사 종합반 (헌법 김원욱)<br>
                                <span class="original">1,000,000원 ></span> <span class="tx-red">400,000원</span>
                            </td>            
                            <td>
                                
                                <a href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/196298" target="_blank">신청하기 ></a>
                            </td>
                        </tr>     
                        <tr>
                            <td>
                                2022년 2차대비 2단계 동형모의고사 종합반 (헌법 이국령)<br>
                                <span class="original">1,000,000원 ></span> <span class="tx-red">400,000원</span>
                            </td>                       
                            <td>
                                <a href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/196299" target="_blank">신청하기 ></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                2022년 2차대비 2단계 동형모의고사 종합반 (경행경채)<br>
                                <span class="original">1,000,000원 ></span> <span class="tx-red">400,000원</span>
                            </td>                       
                            <td>
                                <a href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/196300" target="_blank">신청하기 ></a>
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
                                2022년 2차대비 3단계 파이널 동형모의고사 종합반 (헌법 김원욱)<br>
                                <span class="original">200,000원 ></span> <span class="tx-red">70,000원</span>
                            </td>            
                            <td>                                
                                <a href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/196303" target="_blank">신청하기 ></a>
                            </td>
                        </tr>     
                        <tr>
                            <td>
                                2022년 2차대비 3단계 파이널 동형모의고사 종합반 (헌법 이국령)<br>
                                <span class="original">200,000원 ></span> <span class="tx-red">70,000원</span>
                            </td>                       
                            <td>
                                <a href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/196304" target="_blank">신청하기 ></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                2022년 2차대비 3단계 파이널 동형모의고사 종합반 (경행경채)<br>
                                <span class="original">200,000원 ></span> <span class="tx-red">70,000원</span>
                            </td>                       
                            <td>
                                <a href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/196305" target="_blank">신청하기 ></a>
                            </td>
                        </tr>                  
                    </tbody>
                </table>        
            </div>                                                                        
        </div>   
    </div>

    <div class="evtCtnsBox evt06" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2666m_06.jpg" title="경찰 pass 바로가기">
            <a href="https://police.willbes.net/m/promotion/index/cate/3001/code/2664" title="바로가기" target="_blank" style="position: absolute;left: 14.39%;top: 69.23%;width: 70.99%;height: 7.34%;z-index: 2;"></a>                
        </div>           
    </div>

    <div class="evtCtnsBox evtInfo" id="careful" data-aos="fade-up"> 
        <div class="evtInfoBox">
            <h4 class="NSK-Black">윌비스신광은 경찰 문제풀이 이용안내</h4>
            <div class="infoTit"><strong>상품 구성</strong></div>
            <ul>
                <li>1단계 , 2단계 . 3단계로 각각 종합반 구성되었습니다.</li>
                <li>각 종합반은 결제완료 후 수강이 즉시 시작됩니다.(수강일  설정불가)</li>
                <li>22년 2차대비 2단계,3단계 문제풀이 강의는 강의자료 3회출력제한 됩니다. <a href="https://police.willbes.net/m/support/notice/show/cate/3001?board_idx=252343" target="_blank" class="tx-sky-blue">출력제한 안내 바로보기 ></a></li>
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

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $( document ).ready( function() {
        AOS.init();
    } );
</script>

<!-- End Container -->
<script type="text/javascript">

</script> 
@stop