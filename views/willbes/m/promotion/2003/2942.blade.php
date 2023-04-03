@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap { margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    .evtCtnsBox .check_area {background:#F0F0F0;}
    .evtCtnsBox .check{margin:20px 20px 0; font-size:1.75vh; text-align:center; line-height:1.5; letter-spacing:-1px;}
    .evtCtnsBox .check label{font-weight:bold;}
    .evtCtnsBox .check input {border: 2px solid #000;margin-right: 8px;height: 20px; width: 20px;} 
    .evtCtnsBox .check a {display: block; width:60%; padding:5px 20px; color: #fff;background: #000;border-radius:20px; margin:20px auto 0;}
    .evtCtnsBox .check a:hover {background:#FBE300;color:#000;}

    /* 이용안내 */
    .wb_info {padding:4vh 2vh;}
    .guide_box{text-align:left; word-break:keep-all; line-height:1.5; font-size:1.6vh;}
    .guide_box h2 {font-size:3vh; margin-bottom:30px}
    .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; 
    padding:5px 20px; font-weight:bold; font-size:1.8vh; border-radius:30px}        
    .guide_box dd{color:#333; margin:0 0 20px 5px;}
    .guide_box dd strong {color:#555;}
    .guide_box dd li {margin-bottom:5px; list-style:decimal; margin-left:20px; }
    .guide_box dd span {color:red}
    
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

    <div class="evtCtnsBox" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2942m_top.jpg" alt="김동진 법원팀" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2942m_01.jpg" alt="연간 커리큘럼" >
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU67JiI67mE7Iic7ZmY&course_idx=" title="예비순환" target="_blank" style="position: absolute;left: 2.06%;top: 43.46%;width: 96.61%;height: 5.92%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MeyInO2ZmA%3D%3D" title="1순환" target="_blank" style="position: absolute;left: 2.06%;top: 51.46%;width: 96.61%;height: 5.92%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MuyInO2ZmA%3D%3D" title="2순환" target="_blank" style="position: absolute;left: 2.06%;top: 59.46%;width: 96.61%;height: 5.92%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6M%2ByInO2ZmA%3D%3D" title="3순환" target="_blank" style="position: absolute;left: 2.06%;top: 67.46%;width: 96.61%;height: 5.92%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NOyInO2ZmA%3D%3D" title="4순환" target="_blank" style="position: absolute;left: 2.06%;top: 75.46%;width: 96.61%;height: 5.92%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NeyInO2ZmA%3D%3D" title="5순환" target="_blank" style="position: absolute;left: 2.06%;top: 83.46%;width: 96.61%;height: 5.92%;z-index: 2;"></a>
        </div>
    </div> 


    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2942m_02.jpg" alt="합격 공식" >         
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">       
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2942m_03.jpg" alt="교수진" >      
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2942m_04.jpg" alt="절대 만족 후기" >
            <a href="https://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="더 많은 합격수기 보기" style="position: absolute;left: 18.46%;top: 91.75%;width: 62.89%;height: 4.75%;z-index: 2;"></a>
        </div>
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="check_area">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2942m_05_01.jpg" alt="예비순환+" >
            <div class="check">
                    <label>
                    <input type="checkbox" name="ischk" value="Y">
                    김동진 교수 강의 일정 변경 및 강의 안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <div class="apply_btn">
                    <a href="javascript:go_PassLecture('206673');">수강 신청하기 ></a>                      
                </div>
            </div>
        </div>
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="check_area">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2942m_05_02.jpg" alt="1~5순환" >
            <div class="check pb50">
                    <label>
                    <input type="checkbox" name="ischk" value="Y">
                    김동진 교수 강의 일정 변경 및 강의 안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <div class="apply_btn">
                    <a href="javascript:go_PassLecture('206675');">수강 신청하기 ></a>                      
                </div>
            </div>
        </div>
    </div>

    <div class="evtCtnsBox wb_info" data-aos="fade-up" id="tip">
        <div class="guide_box">
            <h2 class="NSK-Black">온라인PASS 얼리버드 상품안내</h2>
            <dl>
                <dt>1.상품구성</dt>
                <dd>
                    <ol>
                        <li>온라인PASS 얼리버드 상품은 윌비스김동진법원팀 교수진의 지정된 ‘예비순환+1~5순환’ 또는 ‘1~5순환 과정’을 기간 내 배수 제한 없이 무제한 수강 가능합니다.</li>
                        <li>‘민법(김동진), 민사소송법(이덕훈), 형법(문형석), 형사소송법(유안석), 헌법(이국령), 영어(박초롱), 한국사(임진석), 국어(박재현)’ 교수별 예비순환 및 1~5순환 과정 중 구매한 상품에 해당되는 강의로 구성됩니다.</li>
                        <li>4년 대비 얼리버드 ‘예비순환+1~5순환‘ 등록 시 5/8(월) 예비순환 개강일까지 23년 대비 예비순환 전과목을, ‘1~5순환＇등록 시 8/8(월) 1순환 개강일까지 22년 대비 1순환 전과목을 제공해드립니다.</li>
                        <li><span>24년 대비 민법(김동진) 예비순환 및 1~2순환 강의는 김동진 강사의 건강상의 사유로 아래와 같이 진행됩니다.<br>
                            ① 예비순환 : 2023년 대비 1순환 강의를 예비순환용 복습자료와 함께 수강하는 방식으로 진행<br>
                            ② 1~2순환 : 2023년 대비 1~2순환 강의로 대체되어 진행(3순환부터 실강 진행 예정)<br></span>
                            ※ 개강 전후 부득이한 사정에 의해 일부 강사진의 변동이 있을 수 있으며, 일부 강의의 경우 사전촬영 강의 또는 전년도 강의로 대체될 수 있습니다.
                        </li>
                    </ol>
                </dd>

                <dt>2.수강기간</dt>
                <dd>
                    <ol>
                        <li>수강시작일로부터 2024년 시험일까지 제공되며, 수강을 시작하는 즉시 수강 가능한 강의가 제공됩니다.</li>
                        <li>2023대비 예비순환 강의는 2023년 5월 8일부터 진행되므로 5월 9일부터, 1순환 강의는 2022년 8월 7일부터 진행예정이므로 8월 8일부터 순차적으로 업로드될 예정입니다.</li>
                    </ol>
                </dd>

                <dt>3.동영상 수강방법 및 제한</dt>
                <dd>
                    <ol>
                        <li>① 홈페이지 [내강의실] 메뉴에서 [PASS강의] > [수강중강좌]로 접속합니다.</li>
                        <li>접속 후 구매하신 PASS 상품명 옆의 [강좌추가]를 선택합니다.</li>
                        <li>원하는 과목/교수/강좌를 선택하여 추가하신 후 수강이 가능합니다.<br>
                        - 수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC&모바일 각 1대｣로 총 2대의 기기로 제한됩니다.<br>
                        - PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 추후 단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.
                        </li>
                    </ol>
                </dd>

                <dt>4.교재 및 자료 관련</dt>
                <dd>
                    <ol>
                        <li>모든 교재는 별도로 구매하셔야 합니다. 각 강좌별 [수강중강좌] 페이지 내 [교재구매]를 선택하여 구매 가능합니다.</li>
                        <li>강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>
                    </ol>
                </dd>

                <dt>5.환불 관련</dt>
                <dd>
                    <ol>
                        <li>결제 후 7일 이내에 전액환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액환불대상이 됩니다.</li>
                        <li>자료 또는 모바일 강의 다운로드 시에도 이용 및 수강 여부와 무관하게 수강한 것으로 간주됩니다.</li>
                        <li>본 상품은 할인가가 적용된 특별기획상품이므로 부분환불은 정가 대비 사용일수에 따라 차감 후 환불됩니다. 구체적인 환불기준은 환불 시 고객센터로 문의 시 자세히 안내 받으실 수 있습니다.</li>
                    </ol>
                </dd>

                <dt>6.유의사항</dt>
                <dd>
                    <ol>
                        <li>본 상품은 특별기획상품으로 쿠폰 할인, 적립금 사용 등 혜택이 적용되지 않습니다.</li>
                        <li>학원 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.</li>
                        <li>아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민/형사상 책임을 질 수 있습니다.</li>
                    </ol>
                </dd>                
            </dl>           
            <div class="inquire">※ 이용문의 : 고객만족센터 1566-4770</div>

        </div>
    </div>   

</div>

 <!-- End Container -->

 <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">    
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready(function() {
        AOS.init();
      });
    </script>

     <script type="text/javascript"> 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/m/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            @if(empty($arr_promotion_params['edate']) === false)
                dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
            @endif
        });
    </script>    

@stop