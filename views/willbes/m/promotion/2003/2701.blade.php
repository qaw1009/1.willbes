@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox.wrap {position:relative}
    /*.evtCtnsBox.wrap a {border:1px solid #000}*/

    /* 이용안내 */
    .wb_info {padding:50px 20px; color:#fff; line-height:1.4; background:#333}
    .guide_box{text-align:left; word-break:keep-all}
    .guide_box h2 {font-size:3vh; margin-bottom:30px;}
    .guide_box dt{margin-bottom:10px; color:#fff; background:#000; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:1.8vh;}        
    .guide_box dd{margin:0 0 20px 5px;}
    .guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:1.5vh;}
    
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
    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2701m_top.jpg" alt="법원직 연간종합반" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-left">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2701m_01.jpg" alt="합격생 배출 압도적 1위" />
    </div> 

    <div class="evtCtnsBox" data-aos="fade-right">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2701m_02.jpg" alt="커리큘럼" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2701m_03.jpg" alt="면접스터디"/>
    </div> 

    <div class="evtCtnsBox wrap" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2701m_04.jpg" alt="후기 "/>
        <a href="https://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="" style="position: absolute; left: 18.89%; top: 92.65%; width: 62.08%; height: 3.58%; z-index: 2;"></a>
    </div>

    <div class="evtCtnsBox wrap" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2701m_05.jpg" alt="수강신청 "/>
        <a href="https://pass.willbes.net/m/pass/offLecture/index?cate_code=3059" target="_blank" style="position: absolute; left: 26.39%; top: 78.38%; width: 48.33%; height: 8.02%; z-index: 2;"></a>
    </div>

    <div class="evtCtnsBox wrap" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2701m_06.jpg" alt="설문 "/>
        <a href="javascript:void(0);" onclick="showPopup();" title="설문조사" style="position: absolute; left: 7.92%; top: 67.1%; width: 48.33%; height: 12.38%; z-index: 2;"></a>
    </div>

{{--
    <div class="evtCtnsBox wb_info" id="info">
        <div class="guide_box">
            <h2 class="NSK-Black">2023대비 예비순환 온라인관리반 Light 이용안내</h2>
            <dl>
                <dt>상품구성</dt>
                <dd>
                    <ol>
                        <li>온라인관리반 상품은 윌비스김동진법원팀의 예비순환 온라인 동영상 강의를 수강하고, 매주 월~토 기간동안
                            오픈채팅을 통한 출석체크와 학습내역 확인을 통한 학습관리, 그리고 전화 또는 방문상담을 제공해드립니다.</li>
                        <li>수강기간 내 본인이 신청한 과목의 예비순환 온라인 동영상 강의는 무제한 수강이 가능합니다.</li>
                        <li>온라인관리반 등록 시 예비순환에 강의용 교재를 저자 구매 제공으로 무료 제공해드립니다.</li>
                        <li>2023대비 김동진법원팀 전용 W플래너를 무료로 제공해드립니다.</li>
                    </ol>
                </dd>

                <dt>수강기간</dt>
                <dd>
                    <ol>
                        <li>2022년 7월 4일(월)부터 1순환 시작 전인 8월 7일(일)까지 무제한 수강하실 수 있습니다.</li>
                    </ol>
                </dd>

                <dt>동영상 수강방법 및 제한</dt>
                <dd>
                    <ol>
                        <li>① 홈페이지 [내강의실] 메뉴에서 [온라인강좌] > [수강중강좌] > [관리자부여강좌(복습동영상)]로 접속합니다.<br>
                            ② 접속 후 구매하신 패키지 상품명 옆의 [강좌추가]를 선택합니다.<br>
                            ③ 원하는 과목/교수/강좌를 선택하여 등록하신 후 수강이 가능합니다.</li>
                        <li>수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC&모바일 각 1대｣로 총 2대의 기기로 제한됩니다.</li>
                        <li>PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 추후 단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>
                    </ol>
                </dd>
                
                <dt>교재 및 자료 관련</dt>
                <dd>
                    <ol>
                        <li>모든 교재는 무료로 제공해드립니다(저자구매제공)</li>
                        <li>강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>
                    </ol>
                </dd>

                <dt>환불 관련</dt>
                <dd>
                    <ol>
                        <li>환불은 학원설립및과외교습에관한법률의 규정에 따라 진행된 강의에 해당하는 수강료를 공제합니다.</li>
                        <li>1개월 강의료 기준으로 강의시작 후 1/3 진행 전에는 1/3을 공제하고, 1/3~1/2 진행 시에는 1/2을 공제, 1/2이상 진행 시 전액을 공제합니다.</li>
                        <li>중도 환불 시 무료로 제공된 교재 및 플래너 구매비용이 추가로 공제될 수 있습니다.</li>
                    </ol>
                </dd>

                <dt>유의사항</dt>
                <dd>
                    <ol>
                        <li>학원 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.</li>
                        <li>복습동영상 아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민/형사상 책임을 질 수 있습니다.</li>
                    </ol>
                </dd>

                <dt>※ 이용문의 : 김동진법원팀 노량진학원 1544-0330(2번 연결)</dt>
            </dl>
        </div>
    </div>
    --}}
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
            window.open(url,'survey_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=868,height=630');
          @endif
      }

      {{--쿠폰발급--}}
      function giveCheck() {
          {!! login_check_inner_script('로그인 후 이용해주세요.','Y') !!}

          @if(empty($arr_promotion_params) === false)
              var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params["comment_chk_yn"]}}';
              ajaxSubmit($regi_form, _check_url, function (ret) {
                  if (ret.ret_cd) {
                      alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                  }
              }, showValidateError, null, false, 'alert');
          @else
            alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
          @endif
      }
    </script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop