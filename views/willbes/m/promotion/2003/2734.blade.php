@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap {position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/


    .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/08/2734m_top_bg.jpg) no-repeat center top;}

    /* 이용안내 */
    .wb_info {padding:4vh 2vh;}
    .guide_box{text-align:left; word-break:keep-all; line-height:1.5; font-size:1.6vh;}
    .guide_box h2 {font-size:3vh; margin-bottom:30px}
    .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; 
    padding:5px 20px; font-weight:bold; font-size:1.8vh; border-radius:30px}        
    .guide_box dd{color:#777; margin:0 0 20px 5px;}
    .guide_box dd strong {color:#555}
    .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;}
    
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
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2734m_top.jpg" alt="SNS 팔로우 이벤트"/>
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <div class="wrap"><img src="https://static.willbes.net/public/images/promotion/2022/08/2734m_01.jpg" alt="중복 팔로우 당첨확률 up"/></div>
        </div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2734m_02.jpg" alt=""/>
                <a href="https://www.facebook.com/%EC%9C%8C%EB%B9%84%EC%8A%A4-%EA%B3%B5%EB%AC%B4%EC%9B%90-101447992673773" target="_blank" title="페이스북" style="position: absolute; left: 9.31%; top: 32.6%; width: 35.56%; height: 8.38%; z-index: 2;"></a>
                <a href="https://www.instagram.com/willbes_gong" target="_blank" title="인스타그램" style="position: absolute; left: 56.25%; top: 32.6%; width: 35.56%; height: 8.38%; z-index: 2;"></a>
                <a href="https://blog.naver.com/willbes_gong" target="_blank" title="블로그" style="position: absolute; left: 9.31%; top: 74.61%; width: 35.56%; height: 8.38%; z-index: 2;"></a>
                <a href="https://www.youtube.com/c/willbesgong" target="_blank" title="유튜브" style="position: absolute; left: 56.25%; top: 74.61%; width: 35.56%; height: 8.38%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2734m_03.jpg" alt="참여방법"/>
                <a href="https://forms.gle/vfRLrBLFpxsfwaqd6" target="_blank" title="구글폼 제출" style="position: absolute; left: 16.11%; top: 82.45%; width: 67.92%; height: 9.02%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2734m_04.jpg" alt="직렬별 패스"/>
                <a href="https://pass.willbes.net/m/promotion/index/cate/3019/code/2502" target="_blank" title="9급패스" style="position: absolute; left: 9.03%; top: 49.15%; width: 34.31%; height: 5.53%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/m/promotion/index/cate/3023/code/2503" target="_blank" title="소방패스" style="position: absolute; left: 57.22%; top: 49.15%; width: 34.31%; height: 5.53%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/m/home/index/cate/3028" target="_blank" title="기술직패키지" style="position: absolute; left: 9.03%; top: 83.05%; width: 34.31%; height: 5.53%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/m/promotion/index/cate/3024/code/2721" target="_blank" title="군무원패스" style="position: absolute; left: 57.22%; top: 83.05%; width: 34.31%; height: 5.53%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_info" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">이벤트 유의사항</h2>
                <dl>
                    <dd>
                        <ol>
                            <li>이벤트 기간 : ~2022년 8월 31일 (수) 24:00<br>
                            당첨자 발표 : 2022년 9월 1일 (목) 윌비스 공무원 공지사항 참조</li>
                            <li>본 이벤트는 경품 협력사 사전에 따라 유사 가치의 경품으로 변경될 수 있습니다.</li>
                            <li>당첨자 발표 이후 팔로우 내역이 취소된 것을 확인하면 당첨이 취소될 수 있습니다.</li>
                            <li>구글폼으로 제출해주신 윌비스 계정ID로 쿠폰이 지급될 예정이오니, 정확하게 기재해주시기 바랍니다.</li>
                            <li>구글폼에 작성한 내용에 오기재된 부분이 있는 경우에 대해서는 당사가 책임지지 않습니다.</li>
                            <li>단 1개의 SNS만 팔로우 인증하더라도 전원 단과 20% 할인쿠폰이 증정되며, 쿠폰은 팔로우한 SNS 채널과 관계없이 계정당 1매만 지급됩니다.</li>
                            <li>1인당 수령할 수 있는 경품은 최대 2개입니다. (전원 지급 단과 20% 할인쿠폰 및 추첨을 통한 경품 1개)</li>
                        </ol>
                    </dd>            
                </dl> 
            </div>
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