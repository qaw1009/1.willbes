@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/ 


        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/12/2701_top_bg.jpg) no-repeat center top;}

        .evt02 {background:#ede2dc}
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2022/12/2701_03_bg.jpg) no-repeat center top;}
        .evt05 {background:#dbdbdb}

        .evt07 {background:#d7f2ff}
        .evt08 {background:#ebebeb}

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

    <div class="evtContent NSK" id="evtContainer">
		<div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2701_top.jpg" alt="김동진 법원팀" />
		</div>

        <div class="evtCtnsBox evt01" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2701_01.jpg" alt="김동진 법원팀" />
		</div>

        <div class="evtCtnsBox evt02" data-aos="fade-right">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2701_02.jpg" alt="절대 만족 후기"/>
                
            </div>
		</div>

        <div class="evtCtnsBox evt03" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2701_03.jpg" alt="김동진 법원팀" />
		</div>



        <div class="evtCtnsBox evt04" data-aos="fade-right">
            <div class="wrap">            
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2701_04.jpg" alt="연간 커리큘럼">
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU67JiI67mE7Iic7ZmY&course_idx=" title="예비순환" target="_blank" style="position: absolute; left: 0.98%; top: 76.24%; width: 15.71%; height: 9.08%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MeyInO2ZmA%3D%3D" title="1순환" target="_blank" style="position: absolute; left: 17.41%; top: 76.24%; width: 15.71%; height: 9.08%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MuyInO2ZmA%3D%3D" title="2순환" target="_blank" style="position: absolute; left: 33.75%; top: 76.24%; width: 15.71%; height: 9.08%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6M%2ByInO2ZmA%3D%3D" title="3순환" target="_blank" style="position: absolute; left: 50.36%; top: 76.24%; width: 15.71%; height: 9.08%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NOyInO2ZmA%3D%3D" title="4순환" target="_blank" style="position: absolute; left: 66.79%; top: 76.24%; width: 15.71%; height: 9.08%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NeyInO2ZmA%3D%3D" title="5순환" target="_blank" style="position: absolute; left: 83.04%; top: 76.24%; width: 15.71%; height: 9.08%; z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2701_05.jpg" alt="동행 면접스터디" />
		</div>

        <div class="evtCtnsBox evt06" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2701_06.jpg" alt="설문조사" />
                <a href="https://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="더 많은 합격수기 보기" style="position: absolute; left: 24.73%; top: 79.85%; width: 50%; height: 9%; z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evt07" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2701_07.jpg" alt="수강신청" />
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059" target="_blank" style="position: absolute; left: 16.88%; top: 78.05%; width: 64.11%; height: 13.08%; z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evt08" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2701_08.jpg" alt="설문조사" />
                <a href="javascript:void(0);" onclick="showPopup();" style="position: absolute; left: 16.88%; top: 77.05%; width: 64.11%; height: 13.08%; z-index: 2;"></a>
            </div>
		</div>
{{--
        <div class="evtCtnsBox evtInfo" id="info">
            <div class="guide_box">
                <h2 class="NSK-Black">이벤트 유의사항</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>온라인PASS 상품은 윌비스김동진법원팀 교수진의 지정된 ‘예비순환+1~5순환’ 또는 ‘1~5순환 과정’을 기간 내 배수 제한 없이 무제한 수강 가능합니다.
                            <li>‘민법(김동진), 민사소송법(이덕훈), 형법(문형석), 형사소송법(유안석), 헌법(이국령), 영어(박초롱), 한국사(임진석), 국어(박재현)’ 교수별 예비순환 및 1~5순환 과정 중 구매한 상품에 해당되는 강의<br>
                            ※ 개강 전후 부득이한 학원 사정에 의해 일부 강사진의 변동이 있을 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>수강기간</dt>
                    <dd>
                        <ol>
                            <li>수강시작일로부터 2023년 시험일까지 제공되며, 수강을 시작하는 즉시 수강 가능한 강의가 제공됩니다.<br>
                                (예비순환+1~5순환 과정에 한함, 1~5순환 과정은 8월 9일부터 강의가 제공됩니다.)</li>
                            <li>2023대비 예비순환 강의는 수강신청 즉시, 1순환 강의는 2022년 8월 9일부터 순차적으로 업로드 될 예정입니다.</li>
                        </ol>
                    </dd>

                    <dt>동영상 수강방법 및 제한</dt>
                    <dd>
                        <ol>
                            <li>① 홈페이지 [내강의실] 메뉴에서 [PASS강의] > [수강중강좌]로 접속합니다.<br>
                                ② 접속 후 구매하신 PASS 상품명 옆의 [강좌추가]를 선택합니다.<br>
                                ③ 원하는 과목/교수/강좌를 선택하여 추가하신 후 수강이 가능합니다.</li>
                            <li>수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC&모바일 각 1대｣로 총 2대의 기기로 제한됩니다.</li>
                            <li>PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 추후 단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>
                        </ol>
                    </dd>
                    
                    <dt>교재 및 자료 관련</dt>
                    <dd>
                        <ol>
                            <li>모든 교재는 별도로 구매하셔야 합니다. 각 강좌별 [수강중강좌] 페이지 내 [교재구매]를 선택하여 구매 가능합니다.</li>
                            <li>강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>
                        </ol>
                    </dd>

                    <dt>환불 관련</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내에 전액환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액환불대상이 됩니다.</li>
                            <li>자료 또는 모바일 강의 다운로드 시에도 이용 및 수강 여부와 무관하게 수강한 것으로 간주됩니다.</li>
                            <li>본 상품은 할인가가 적용된 특별기획상품이므로 부분환불은 정가 대비 사용일수에 따라 차감 후 환불됩니다. 구체적인 환불기준은 환불 시 
                                고객센터로 문의 시 자세히 안내 받으실 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별기획상품으로 쿠폰 할인, 적립금 사용 등 혜택이 적용되지 않습니다.</li>
                            <li>학원 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.</li>
                            <li>아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민/형사상 책임을 질 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>※ 이용문의 : 고객만족센터 1544-5006</dt>
                </dl>
            </div>
        </div>
        --}}
	</div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
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
            var windowW = 800; // 창의 가로 길이
            var windowH = 700; // 창의 세로 길이
            var left = Math.ceil((window.screen.width - windowW)/2);
            var top = Math.ceil((window.screen.height - windowH)/2);
            window.open(url,"survey_event","top="+top+", left="+left+", height="+windowH+", width="+windowW);
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
@stop