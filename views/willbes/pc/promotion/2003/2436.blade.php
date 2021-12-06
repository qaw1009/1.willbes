@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">   
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/


        /************************************************************/

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/12/2436_top_bg.jpg) no-repeat center top;}
        .evt_01 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2436_01_bg.jpg) no-repeat center top;}

        .evt_03 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2436_03_bg.jpg) no-repeat center top;}

        /* 이용안내 */
        .evtInfo {padding:100px 0; background:#f4f4f4; color:#363636; line-height:1.5}
        .guide_box{width:1120px; margin:0 auto; padding:0 50px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px;}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#000; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:16px;}        
        .guide_box dd{margin-bottom:50px;}
        .guide_box dl{color:#555;font-size:15px;}
        .guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px;font-size:14px;}
        .guide_box dd li.none {list-style:none; margin-left:0}
        .guide_box span {color: #ca1919; vertical-align:top}
        .guide_box dd:last-child {margin:0}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}

        <input type="hidden" name="msg" value="아래 체험팩 수강후기를 등록해 주세요.">
    </form>
    
    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2436_top.jpg" alt=""/>            
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2436_01.jpg" alt="" />
        </div>
        
        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2436_02.jpg" alt="" />
                <a href="https://job.willbes.net/package/show/cate/3035/pack/648001/prod-code/188205" target="_blank" title="민법" style="position: absolute; left: 5.89%; top: 48.22%; width: 15.98%; height: 3.8%; z-index: 2;"></a>
                <a href="https://job.willbes.net/package/show/cate/3035/pack/648001/prod-code/188206" target="_blank" title="형법" style="position: absolute; left: 29.64%; top: 48.22%; width: 15.98%; height: 3.8%; z-index: 2;"></a>
                <a href="https://job.willbes.net/package/show/cate/3035/pack/648001/prod-code/188207" target="_blank" title="헌법" style="position: absolute; left: 53.84%%; top: 48.22%; width: 15.98%; height: 3.8%; z-index: 2;"></a>
                <a href="https://job.willbes.net/package/show/cate/3035/pack/648001/prod-code/188208" target="_blank" title="민사소송법" style="position: absolute; left: 77.59%; top: 48.22%; width: 15.98%; height: 3.8%; z-index: 2;"></a>

                <a href="https://job.willbes.net/package/show/cate/3035/pack/648001/prod-code/188209" target="_blank" title="형사소송법" style="position: absolute; left: 5.89%; top: 80.5%; width: 15.98%; height: 3.8%; z-index: 2;"></a>
                <a href="https://job.willbes.net/package/show/cate/3035/pack/648001/prod-code/188210" target="_blank" title="국어" style="position: absolute; left: 29.64%; top: 80.5%; width: 15.98%; height: 3.8%; z-index: 2;"></a>
                <a href="https://job.willbes.net/package/show/cate/3035/pack/648001/prod-code/188211" target="_blank" title="영어" style="position: absolute; left: 53.84%; top: 80.5%; width: 15.98%; height: 3.8%; z-index: 2;"></a>
                <a href="https://job.willbes.net/package/show/cate/3035/pack/648001/prod-code/188212" target="_blank" title="한국사" style="position: absolute; left: 77.59%; top: 80.5%; width: 15.98%; height: 3.8%; z-index: 2;"></a>
            </div>
        </div> 
        
        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2436_03.jpg" alt="" />
                <a href="javascript:void(0);" onclick="showPopup();" title="설문 참여" style="position: absolute; left: 33.93%; top: 71.4%; width: 30.54%; height: 10.89%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evtInfo" id="ctsInfo">
            <div class="guide_box">
                <h2 class="NSK-Black">김동진법원팀 4~5순환 <span>온라인 T-PASS반</span> 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 윌비스김동진법원팀 교수진의 4~5순환 중 본인이 구매한 과목을 2배수 제한으로 수강 가능합니다.</li> 
                            <li>제공 강의 : 민법(김동진), 민사소송법(이덕훈), 형법(문형석), 형사소송법(유안석), 헌법(이국령), 국어(박재현), 영어(박초롱), 한국사(임진석) 중 본인이 구매한 과목의 4~5순환 과정</li> 
                            <li>특전 : 민법(김동진), 민사소송법(이덕훈), 형법(문형석), 형사소송법(유안석), 헌법(이국령), 국어(박재현), 영어(박초롱), 한국사(임진석) 중 본인이 구매한 과목의 3순환 강의 2주간 제공</li>                          
                        </ol>
                    </dd>

                    <dt>수강기간</dt>
                    <dd>
                        <ol>
                            <li>2021년 1월 4일 이후 과목별 업로드시부터 (1월 4일 이후 등록 시 등록일부터) 2022년 6월말까지 제공됩니다.</li>
                            <li>3순환 무료제공 강의는 수강신청일부터 14일 동안 제공됩니다.</li>
                            <li>각 순환별 강의는 순환 일정에 따라 강의가 진행된 후 2~3일(평일 기준) 내로 순차 업로드 되어 제공됩니다.</li>          
                        </ol>
                    </dd>

                    <dt>수강방법 및 제한</dt>
                    <dd>
                        <ol>
                            <li>홈페이지 [내강의실] 메뉴에서 수강이 가능합니다.</li>
                            <li>원하는 과목/교수/강좌를 선택하여 등록하신 후 수강이 가능합니다.</li>
                            <li>수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC&모바일 각 1대｣로 총 2대의 기기로 제한됩니다.</li>
                            <li>PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 
                            추후 단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>
                            <li>본 T-PASS 상품은 구매 후 바로 수강이 시작되며, 수강기간 조정 및 정지가 불가능합니다.</li>
                        </ol>
                    </dd>
                
                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>모든 교재는 별도로 구매하셔야 합니다. 각 강좌별 교재는 [내강의실] 내 [교재구매]를 선택하여 구매 가능합니다.</li>
                            <li>강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>
                            <li>5법 및 한국사 기본서는 4~5순환 과정동안 예습교재 및 부교재로 활용되므로 구매여부를 개인의 의사에 의해 결정하여야 합니다.</li>
                            <li>4~5순환 모의고사 문제 및 해설지는 택배를 통해 실물로 배송됩니다. 구체적인 방법은 개강 전 별도 고지해드립니다.</li>                      
                        </ol>
                    </dd>

                    <dt>환불관련</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내에 전액환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액환불대상이 됩니다.</li>
                            <li>자료 또는 모바일 강의 다운로드 시에도 이용 및 수강 여부와 무관하게 수강한 것으로 간주됩니다.</li>
                            <li>본 상품은 할인가가 적용된 특별기획상품이므로 부분환불은 정가 대비 사용일수에 따라 차감 후 환불됩니다. 구체적인 환불기준은 환불 시 고객센터로 문의 시 자세히 안내 받으실 수 있습니다.</li>                      
                        </ol>
                    </dd>

                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별기획상품으로 쿠폰 할인, 적립금 사용 등 혜택이 적용되지 않습니다.</li>
                            <li>학원 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.</li>
                            <li>아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민·형사상 책임을 질 수 있습니다.</li>                      
                        </ol>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );

      var $regi_form = $('#regi_form');

      function showPopup(){
          @if(empty($arr_promotion_params['SsIdx']) === true)
            alert('설문정보가 없습니다.');
            return;
          @else
              var url = "{{front_url('/eventSurvey/index/' . $arr_promotion_params['SsIdx'])}}";
              window.open(url,'survey_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=800,height=700');
          @endif
      }
    </script>
@stop