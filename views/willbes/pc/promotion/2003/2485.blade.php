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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/ 


        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/12/2485_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#fff;padding-bottom:100px;}

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2485_02_bg.jpg) no-repeat center top;}

        .evt03 {background:#f0e1ca;}

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

	<div class="evtContent NGR">

		<div class="evtCtnsBox evtTop" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2485_top.jpg" alt="김동진 법원팀" />
		</div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2485_01.jpg" alt="신청하기" />
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059"  target="_blank" style="position: absolute;left: 17.5%;top: 79.08%;width: 20.8%;height: 8.4%;z-index: 2;"></a>
                <a href="javascript:certOpen();"style="position: absolute;left: 61.38%;top: 79.08%;width: 20.8%;height: 8.4%;z-index: 2;"></a>
            </div>           
		</div>       

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">            
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2485_02.jpg" alt="연간 커리큘럼">
                <a href="https://pass.willbes.net/promotion/index/cate/3035/code/2087" title="pass" target="_blank" style="position: absolute;left: 19.21%;top: 79.74%;width: 11.16%;height: 4.64%;z-index: 2;"></a>               
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&course_idx=1412" title="4순환" target="_blank" style="position: absolute;left: 58.39%;top: 72.84%;width: 8.04%;height: 4.64%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&course_idx=1413" title="5순환" target="_blank" style="position: absolute;left: 70.99%;top: 72.84%;width: 8.04%;height: 4.64%;z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2485_03.jpg" alt="수강생 중심 운영" />
		</div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2485_04.jpg" alt="절대 만족 후기"/>
                <a href="https://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="더 많은 합격수기 보기" style="position: absolute;left: 34.46%;top: 89.42%;width: 30.89%;height: 5.55%;z-index: 2;"></a>
            </div>
		</div>
        {{--
        <div class="evtCtnsBox evtInfo" id="ctsInfo">
            <div class="guide_box">
                <h2 class="NSK-Black">이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 윌비스김동진법원팀 교수진의 3~5순환 과정을 배수 제한 없이 무제한 수강 가능합니다.</li>
                            <li>제공 강의 : 민법(김동진), 민사소송법(이덕훈), 형법(문형석), 형사소송법(유안석), 헌법(이국령), 국어(박재현), 영어(박초롱), 한국사(임진석) 교수별 3~5순환 과정</li>
                            <li>특전 : 민법(김동진), 민사소송법(이덕훈), 형법(문형석), 형사소송법(유안석), 헌법(이국령), 국어(박재현), 영어(박초롱), 한국사(임진석) 2순환 강의 30일 제공</li>                          
                        </ol>
                    </dd>
                    <dt>수강기간</dt>
                    <dd>
                        <ol>
                            <li>2021년 11월 2일 업로드시부터 (11월 2일 이후 등록 시 등록일부터) 2022년 7월 시험일까지 제공됩니다.</li> 
                            <li>각 순환별 강의는 순환 일정에 따라 강의가 진행된 후 2~3일(평일 기준) 내로 순차 업로드 되어 제공됩니다.</li>             
                        </ol>
                    </dd>
                    <dt>수강방법 및 제한</dt>
                    <dd>
                        <ol>
                            <li>홈페이지 [내강의실] 메뉴에서 [강좌추가] 메뉴를 통해 강좌를 추가합니다.</li>
                            <li>원하는 과목/교수/강좌를 선택하여 등록하신 후 수강이 가능합니다.</li>
                            <li>수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC&모바일 각 1대｣로 총 2대의 기기로 제한됩니다.</li>
                            <li>PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 추후 단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>
                            <li>본 패키지 상품은 구매 후 수강이 가능한 시점부터 바로 수강이 시작되며, 수강기간 조정 및 정지가 불가합니다.</li>
                        </ol>
                    </dd>
                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>모든 교재는 별도로 구매하셔야 합니다. 각 강좌별 교재는 무한PASS존 내 [교재구매]를 선택하여 구매 가능합니다.</li>
                            <li>강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>
                            <li>특전으로 제공되는 2순환 강의 수강을 원하는 경우 각 과목 기본서를 필수적으로 구매하여야 합니다. 단, 5법 및 한국사 기본서는 3순환 과정 부교재로 활용되고, 이후 4~5순환 과정동안 예습교재 및 부교재로 활용되므로 구매여부를 개인의 의사에 의해 결정하여야 합니다.</li>             
                            <li>4~5순환 모의고사 문제 및 해설지는 택배를 통해 실물로 배송됩니다. 구체적인 방법은 4순환 개강 전 별도 고지해드립니다.</li>         
                        </ol>
                    </dd>
                    <dt>환불관련</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내에 전액환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액환불대상이 됩니다.</li>
                            <li>자료 또는 모바일 강의 다운로드 시에도 이용 및 수강 여부와 무관하게 수강한 것으로 간주됩니다.</li>
                            <li>본 상품은 할인가가 적용된 특별기획상품이므로 부분환불은 정가 대비 사용일수에 따라 차감 후 환불됩니다. 
                            구체적인 환불기준은 환불 시 고객센터로 문의 시 자세히 안내 받으실 수 있습니다.</li>                      
                        </ol>
                    </dd>                 
                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별기획상품으로 쿠폰 할인, 적립금 사용 등 혜택이 적용되지 않습니다.</li>
                            <li>학원 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.</li>
                            <li>아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민.형사상 책임을 질 수 있습니다.</li>                      
                        </ol>
                    </dd>
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

    </script>
    <script>

        /* 팝업창 */ 
        function certOpen(){
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
                @if(empty($arr_promotion_params) === false)
                var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
                window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
                @endif
            }
        
    </script>
@stop