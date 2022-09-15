@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    /* 이용안내 */
    .wb_info {padding:4vh 2vh;}
    .guide_box{text-align:left; word-break:keep-all; line-height:1.5; font-size:1.6vh;}
    .guide_box h2 {font-size:3vh; margin-bottom:30px}
    .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; 
    padding:5px 20px; font-weight:bold; font-size:1.8vh; border-radius:30px}        
    .guide_box dd{color:#777; margin:0 0 20px 5px;}
    .guide_box dd strong {color:#555;}
    .guide_box dd li {margin-bottom:5px; list-style:decimal; margin-left:20px; }

   
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
        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2777m_top.jpg" alt="네이버페이 드림"/>
            <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2003" title="회원가입" style="position: absolute; left: 5.42%; top: 79.59%; width: 89.03%; height: 7.1%; z-index: 2;"></a>
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <a href="#evt01"><img src="https://static.willbes.net/public/images/promotion/2022/09/2777m_01_01.jpg" alt="네이버페이"/></a>
            <a href="#evt02"><img src="https://static.willbes.net/public/images/promotion/2022/09/2777m_01_02.jpg" alt="윌비스드림팩"/></a>
        </div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2777m_02_01.jpg" alt="혜택1" id="evt01"/>
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2777m_02_02.jpg" alt="혜택2" id="evt02"/>
        </div>

        <div class="evtCtnsBox wb_info" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">이벤트 유의사항</h2>
                <dl>
                    <dt>기간</dt>
                    <dd>
                        <ol>
                            <li>2022.09.19.(월)~2022.09.30.(금) (선착순 마감 시, 이벤트 종료)</li>
                        </ol>
                    </dd>

                    <dt>대상</dt>
                    <dd>
                        <ol>
                            <li>이벤트 기간 내 윌비스 통합사이트 회원가입 및 관심직렬 [공무원]을 체크한 회원</li>
                            <li>마케팅 수신 동의</li>
                        </ol>
                    </dd>

                    <dt>참여 안내</dt>
                    <dd>
                        <ol>
                            <li>ID/전화번호당 1회만 참여 가능합니다. (중복 참여 불가)</li>
                            <li>이벤트 기간 내 신규회원 가입</li>
                            <li>탈퇴 후 재가입, 중복 가입, 불법 매크로 이용 등의 부적절한 방법으로 이벤트 참여 시 별도 안내 없이 당첨자 선정에서 제외되며, 사이트 이용에 불이익을 받을 수 있습니다.</li>
                            <li>본 이벤트는 선착순 마감 방식으로 진행되므로, 사전에 고지없이 종료될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>네이버페이 지급 안내</dt>
                    <dd>
                        <ol>
                            <li>이벤트 종료 후 2022.10.05.(수) 윌비스 공무원 공지사항에서 당첨 공지를 확인해주시기 바랍니다.</li>
                            <li>당첨 공지일 기준 탈퇴회원 및 마케팅 수신동의 해제하신 경우 혜택 지급 대상에서 제외됩니다.</li>
                            <li>이벤트 경품은 MMS 문자로 발송되며, 지급 공지를 통해 경품 발송 일정 안내 후 일괄적으로 발송됩니다.</li>
                            <li>네이버페이 등록 경로 : 네이버 Pay 메뉴 접속 → 혜택·쿠폰 → 쿠폰 등록</li>
                        </ol>
                    </dd>          
                </dl> 
            </div>

</div>

<!-- End Container -->

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
    $(document).ready( function() {
    AOS.init();
    });
</script>


@stop