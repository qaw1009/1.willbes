@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .Container {font-size:10px;}

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1rem; line-height:1.3; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .content_guide_wrap  {padding:50px 20px; background:#dedede; color:#f0f0f0;}
    .content_guide_box {text-align:left; line-height:1.3}
    .content_guide_box .guide_tit{margin-bottom:20px;}
    .content_guide_box dl{word-break:keep-all; padding:30px;}
    .content_guide_box dt{margin-bottom:10px;}
    .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-size:17px; font-weight:bold; margin-right:10px;}
    .content_guide_box dd{ color:#777; font-size:15px; margin:0 0 20px 5px; line-height:19px;}
    .content_guide_box dd strong{ color:#555;}
    .content_guide_box dd p{ margin-bottom:3px;}
    .content_guide_box dd p.guide_txt_01{margin:5px 0 5px 15px;}

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
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2478m_top.jpg" alt="승진 pass"/>
            <a href="javascript:certOpen();" title="인증하기" style="position: absolute; left: 7.99%; top: 77.01%; width: 84.58%; height: 15.05%; z-index: 2;"></a>
        </div>
    </div>

    <div class="evtCtnsBox evt01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2478m_01.jpg" alt="교수진"/>
    </div>

    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2478m_02.jpg" alt="계급별 pass"/>
            <a href="https://police.willbes.net/m/periodPackage/show/cate/3006/pack/648001/prod-code/189899" target="_blank" title="" style="position: absolute; left: 19.49%; top: 25.01%; width: 19.58%; height: 2.05%; z-index: 2;"></a>
            <a href="https://police.willbes.net/m/periodPackage/show/cate/3006/pack/648001/prod-code/189900" target="_blank" title="" style="position: absolute; left: 61.09%; top: 25.01%; width: 19.58%; height: 2.05%; z-index: 2;"></a>
            <a href="https://police.willbes.net/m/periodPackage/show/cate/3006/pack/648001/prod-code/189901" target="_blank" title="" style="position: absolute; left: 19.49%; top: 39.25%; width: 19.58%; height: 2.05%; z-index: 2;"></a>
            <a href="https://police.willbes.net/m/periodPackage/show/cate/3006/pack/648001/prod-code/189902" target="_blank" title="" style="position: absolute; left: 61.09%; top: 39.25%; width: 19.58%; height: 2.05%; z-index: 2;"></a>
            <a href="https://police.willbes.net/m/periodPackage/show/cate/3006/pack/648001/prod-code/189904" target="_blank" title="" style="position: absolute; left: 19.49%; top: 58.35%; width: 19.58%; height: 2.05%; z-index: 2;"></a>
            <a href="https://police.willbes.net/m/periodPackage/show/cate/3006/pack/648001/prod-code/189905" target="_blank" title="" style="position: absolute; left: 61.09%; top: 58.35%; width: 19.58%; height: 2.05%; z-index: 2;"></a>
            <a href="https://police.willbes.net/m/periodPackage/show/cate/3006/pack/648001/prod-code/189906" target="_blank" title="" style="position: absolute; left: 19.49%; top: 74.55%; width: 19.58%; height: 2.05%; z-index: 2;"></a>
            <a href="https://police.willbes.net/m/periodPackage/show/cate/3006/pack/648001/prod-code/189907" target="_blank" title="" style="position: absolute; left: 61.09%; top: 74.55%; width: 19.58%; height: 2.05%; z-index: 2;"></a>
            <a href="https://police.willbes.net/m/periodPackage/show/cate/3006/pack/648001/prod-code/189908" target="_blank" title="" style="position: absolute; left: 40.19%; top: 93.55%; width: 19.58%; height: 2.05%; z-index: 2;"></a>
        </div>
    </div>

    <div class="evtCtnsBox evt03" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2478m_03.jpg" alt="교수님 pass"/>
            <a href="https://police.willbes.net/m/periodPackage/show/cate/3006/pack/648001/prod-code/189909" target="_blank" title="" style="position: absolute; left: 12.99%; top: 51.55%; width: 18.58%; height: 3.75%; z-index: 2;"></a>
            <a href="https://police.willbes.net/m/periodPackage/show/cate/3006/pack/648001/prod-code/189910" target="_blank" title="" style="position: absolute; left: 40.81%; top: 51.55%; width: 18.58%; height: 3.75%; z-index: 2;"></a>
            <a href="https://police.willbes.net/m/periodPackage/show/cate/3006/pack/648001/prod-code/189911" target="_blank" title="" style="position: absolute; left: 68.4%; top: 51.55%; width: 18.58%; height: 3.75%; z-index: 2;"></a>
            <a href="https://police.willbes.net/m/periodPackage/show/cate/3006/pack/648001/prod-code/189913" target="_blank" title="" style="position: absolute; left: 26.89%; top: 80.65%; width: 18.58%; height: 3.75%; z-index: 2;"></a>
            <a href="https://police.willbes.net/m/periodPackage/show/cate/3006/pack/648001/prod-code/189914" target="_blank" title="" style="position: absolute; left: 54.69%; top: 80.65%; width: 18.58%; height: 3.75%; z-index: 2;"></a>
        </div>
    </div>

    <div class="evtCtnsBox evt04" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2478m_04.jpg" alt="현직인증"/>
    </div>
    
    <div class="content_guide_wrap" data-aos="fade-up">
        <div class="content_guide_box">               
            <dl>
                <dt>
                    <h3>상품안내</h3>
                </dt>
                <dd>
                    <p>승진PASS는 현직경찰 인증이 완료 된 후 관련 PASS 수강신청이 가능합니다. 상품 구매전 상단 현직경찰 인증하기를 진행해주세요.</p>
                </dd>
                <dt>
                    <h3>상품구성</h3>
                </dt>
                <dd>
                    <p>1. 본 상품은 2021년 승진시험대비로 계급별 , 교수님별 강좌로 제공합니다.</p>
                    <p>2. 수강기간은 상품에 표시된 기간에 따라 구매일로부터 2023년 1월 31일까지 제공되며 결제가 완료되는 즉시 수강 가능합니다.</p> 
                    <p>3. 일부강좌는 경찰채용(일반공채)강좌와 동일한 강좌로 구성될 수있습니다.</p> 
                    <p>4. 실무종합 강의일정은 2020년 5월 또는 6월 따로 공지됩니다.</p> 
                    <p>5. 승진PASS는 강의 변경 불가 상품입니다.</p>                          
                </dd>
                <dt>
                    <h3>수강관련</h3>
                </dt>
                <dd>
                    <p>1. 먼저 내 강의실 메뉴에서 프리패스존로 접속합니다.</p>
                    <p>2. 구매하신 경찰승진PASS 상품명 옆의 [강좌 선택하기] 버튼을 클릭, 원하시는 강좌를 선택 등록 후  수강하실 수 있습니다.</p>
                    <p>3. 경찰승진PASS 이용 중에는 일시정지 기능을 이용할 수 없습니다.</p>
                    <p>4. 경찰승진PASS 강좌 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.</p>
                    <p class="guide_txt_01"><strong>PC+Mobile 경찰승진PASS 수강 시</strong> : PC 2대 또는 PC 1대 + 모바일 1대 또는 모바일2대 (PMP 경찰승진PASS는 제공하지 않습니다.)</p>
                    <p>5. PC, 모바일 기기변경 등 단말기 초기화가 필요한 경우 내용 확인 후 초기화 진행가능하오니 고객센터로 문의주시기 바랍니다.</p>
                </dd>

                <dt>
                    <h3>교재구매</h3>
                </dt>
                <dd>
                    <p>경찰승진PASS는 교재를 별도로 구매하셔야 하며, .각 강좌별 교재는 강좌소개 및  [교재구매] 메뉴에서 별도 구매 가능합니다. </p>
                </dd>

                <dt>
                    <h3>환불안내</h3>
                </dt>
                <dd>
                    <p>1. 결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</p>
                    <p>2. 결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</p>
                    <p>3. 강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</p>
                    <p>4. 고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 신광은경찰PASS 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.</p>
                </dd>

                <dt>
                    <h3>유의사항</h3>
                </dt>
                <dd>
                    <p>1. 본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립금사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</p>
                    <p>2. 경찰승진PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</p>
                    <p>3. 아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</p>
                </dd>
                <dd>
                    <p>※ 이용문의 : 고객만족센터 1544-5006</p>
                </dd>
            </dl>
        </div>
    </div>
    
</div>

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $(document).ready(function() {
        AOS.init();
    });
    </script>

    <script>
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
             @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }
    </script>

<!-- End Container -->

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')
@stop