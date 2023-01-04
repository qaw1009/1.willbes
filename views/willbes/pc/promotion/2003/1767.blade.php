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

        .sky {position:fixed; top:180px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:10px; text-align:center}

        .wb_ctstop {position:relative; overflow:hidden; background:url("https://static.willbes.net/public/images/promotion/2020/08/1767_top_bg.jpg") center top  no-repeat;}
        .wb_cts01 > div {width:1120px; margin:0 auto; position:relative;}
        .wb_ctstop span{position:absolute;top:702px;left:50%;margin-left:-271px;opacity:0;opacity:1 \0/IE9;animation: zoomAni .5s 1s ease-in-out both;} 
        @@keyframes zoomAni {
            0% {transform: scale(7); opacity: 0;}
            100% {transform: scale(1); opacity: 1;}
        }

        .wb_cts01 {background:url("https://static.willbes.net/public/images/promotion/2020/12/1767_01_bg.jpg") center top  no-repeat}

        .wb_cts02s {background:url("https://static.willbes.net/public/images/promotion/2020/12/1767_02_bg.jpg") center top  no-repeat}  

        .wb_cts03 {background:#fff;position:relative;}
        .check {position:absolute;bottom:50px;left:50%;margin-left:-490px;width:980px;padding: 20px 0px 20px 10px;letter-spacing:3;color:#fff;z-index:5;}
        .check label {cursor:pointer;font-size:15px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:25px; width:25px;}
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#252525; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}

        .evtInfo {padding:80px 0; background:#e9e9e9; color:#555; font-size:14px}
        .evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox h4 {font-size:40px; margin-bottom:50px}
        .evtInfoBox .infoTit {font-size:20px;margin-bottom:10px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {margin-bottom:5px; list-style:decimal; margin-left:20px;}

        /*분할 유튜브*/
        .youtube_contents {position:relative;width:1050px;margin:auto;z-index:1;}
        .youtube_divide {margin:30px -15px 0;padding: 40px 0 0 30px;background:#fff;border-radius: 5px;box-shadow: -10px 10px 30px rgba(0,0,0,.1);}
        .youtube_divide .preview_area {display:inline-block;border-right:1px solid #ddd;padding-bottom:40px;text-align:left;}
        .youtube_divide .preview_area .avi_box {width:730px;height:411px;margin-bottom:20px;} 
        .youtube_divide .preview_area h2 {display:block;font-size:24px;font-weight:700;line-height:32px;color:#000;overflow:hidden;text-overflow:ellipsis;word-wrap:normal;margin-bottom:4px;max-width:730px;}
        .youtube_divide .preview_area span {font-size:14px;font-weight:400;color:#555;}
        .youtube_divide .preview_area span a {display:inline-block;vertical-align: middle;width:18px;height:15px;margin:-3px 0 0 4px;
                                              background: url(https://static.willbes.net/public/images/promotion/2020/07/i_front_home.png) repeat;background-size:100% auto;font-size:0;}
        .youtube_divide .preview_list_area {display:inline-block;vertical-align:top;padding-left:12px;width:304px;text-align:left;}
        .youtube_divide .preview_list_area .preview_list {margin-top:15px;height:455px;box-sizing:border-box;overflow-y:scroll;}
        .youtube_divide .preview_list_area .preview_list ul li {margin-bottom:12px;}
        .youtube_divide .preview_list_area .preview_list ul li .num_box {width:25px;display:inline-block;font-size: 12px;font-weight:400;
                                                                         color:#666;padding-right:10px;text-indent: 2px;vertical-align:middle;box-sizing:border-box;}
        .youtube_divide .preview_list_area .preview_list ul li .thum_box {display: inline-block;width: 120px;height: 70px;box-sizing: border-box;vertical-align: middle;overflow: hidden;}
        /*.youtube_divide .preview_list_area .preview_list ul li.on .thum_box {border:3px solid #00E752;}*/
        .youtube_divide .preview_list_area .preview_list ul li .thum_box img {width:100%;transition:0.5s;}
        .youtube_divide .preview_list_area .preview_list ul li .text_box {padding-left:10px;display:inline-block;width:123px;box-sizing:border-box;vertical-align: middle;}
        .youtube_divide .preview_list_area .preview_list ul li .text_box p {font-size:13px;font-weight:400;line-height:18px;color:#000;margin-bottom: 2px;
                                                                            overflow:hidden;text-overflow:ellipsis;word-wrap:break-word;display:-webkit-box;-webkit-line-clamp:2;}
        .youtube_divide .preview_list_area .preview_list ul li .text_box span {font-size:12px;font-weight:400;line-height:18px;color:#666;}        

 </style>

 <div class="evtContent NSK" id="evtContainer">

    <div class="sky" id="QuickMenu">
        <a href="#apply"> 
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1767_sky.png" alt="예비전력관리 패스" >
        </a>            
    </div>  

    <div class="evtCtnsBox wb_ctstop" data-aos="fade-up">
        <div>
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1767_top.jpg" title="" />
            <span class="txt1"><img src="https://static.willbes.net/public/images/promotion/2020/08/1767_top_txt.png" title="" /></span>
        </div>
    </div>
  
    <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1767_01.jpg"  title="예비전력관리업무담당자 김도형 교수" />
    </div>   

    <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/1767_02.jpg" alt="합경을 이끌어낸 그 과정"/>
        <div class="youtube_contents">
            <div class="youtube_divide">             
                <div class="preview_area">
                    <div class="avi_box">
                        <iframe webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="730" height="411" frameborder="false" scrolling="no" src="https://www.youtube.com/embed/vcIVfZluZuY?rel=0"></iframe>
                    </div>
                    <h2 class="avi_title">2022년 70회 대비, 병역법! 여기서 1문제는 반드시 나온다!</h2>
                </div>
                <div class="preview_list_area">
                    <div class="preview_list">
                        <ul>
                            <li class="on">
                                <a href="#tab1" class="active">
                                    <span class="num_box" data-num="1">1</span>
                                    <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2022/01/1767_thumbnail01.jpg" alt="병역법 1문제는 반드시 나온다"></div>
                                    <div class="text_box">
                                        <p>2022년 70회 대비, 병역법! 여기서 1문제는 반드시 나온다!</p>
                                    </div>
                                </a>
                            </li>

                            <li class="">
                                <a href="#tab2">
                                    <span class="num_box" data-num="2">2</span>
                                    <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2022/01/1767_thumbnail02.jpg" alt="병역법 단원별 출전문제 정리하기"></div>
                                    <div class="text_box">
                                        <p>2022년 70회 대비, 병역법! 단원별 출제문제 정리하기!</p>
                                    </div>
                                </a>
                            </li>

                            <li class="">
                                <a href="#tab3">
                                    <span class="num_box" data-num="3">3</span>
                                    <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/01/1767_thumbnail03.jpg" alt="통합방위법"></div>
                                    <div class="text_box">
                                        <p>통합방위법에는 시행규칙이 없다!</p>
                                    </div>
                                </a>
                            </li>
                    
                            <li class="">
                                <a href="#tab4">
                                    <span class="num_box" data-num="4">4</span>
                                    <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/01/1767_thumbnail02.jpg" alt="병역법"></div>
                                    <div class="text_box">
                                        <p>병역법의 정의에서 꼭 1문제는 나온다! - 『징·역 / 소·의·지』</p>
                                    </div>
                                </a>
                            </li>

                            <li class="">
                                <a href="#tab5">
                                    <span class="num_box" data-num="5">5</span>
                                    <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/01/1767_thumbnail03.jpg" alt="통합방위법"></div>
                                    <div class="text_box">
                                        <p>통합방위법에는 시행규칙이 없다!</p>
                                    </div>
                                </a>
                            </li>                
                        </ul>
                    </div>
                </div>          
            </div>
        </div>
    </div>  

    <div class="evtCtnsBox wb_cts02s" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1767_02.jpg"  title="" />
    </div>

    <div class="evtCtnsBox wb_03" id="apply" data-aos="fade-up">  
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1767_03.jpg" usemap="#Map1767_apply" title="수강신청" border="0" />
            <a href="javascript:go_PassLecture('204473');" title="수강신청" style="position: absolute; left: 64.38%; top: 54.29%; width: 22.68%; height: 10.57%; z-index: 2;"></a>
        </div>
        <div class="check">
            <label>
                <input name="ischk"  type="checkbox" value="Y" />
                페이지 하단 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
            </label>
            <a href="#guide">이용안내확인하기 ↓</a>
        </div>    
    </div> 
  
    <div class="evtCtnsBox evtInfo" id="guide" data-aos="fade-up">
        <div class="evtInfoBox">
            <h4 class="NGEB">예비전력관리 업무담당자 PASS 이용안내</h4>
            <div class="infoTit"><strong>상품구성</strong></div>
            <ul>
                <li>본 PASS는 김도형 교수의 예비전력관리 업무담당자 전 과정을 배수 제한 없이 무제한으로 수강 가능합니다.</li> 
                <li>2023년 대비로 진행되는 신규 개강 강좌를 커리큘럼 진행에 따라 순차적으로 제공해드리는 상품입니다.</li>
                <li>학원 사정에 따라 부득이하게 커리큘럼 및 교수진이 추가/변경될 수 있다는 점 숙지 부탁드립니다.</li>
            </ul>   
            <div class="infoTit"><strong>수강기간</strong></div>
            <ul>
                <li>수강기간은 상품 상세 안내 페이지에 표시된 기간만큼 제공되며, 결제가 완료되는 즉시 수강이 시작됩니다.</li> 
            </ul>   
            <div class="infoTit"><strong>수강관련</strong></div>
            <ul>
                <li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li> 
                <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭,원하는 과목/교수님/강좌를 선택 등록 후 수강할 수 있습니다.</li> 
                <li>본 PASS를 이용 중에는 일시 정지 기능을 사용할 수 없습니다.</li> 
                <li>본 PASS 수강 시 이용가능한 기기는 다음과 같이 제한됩니다.<br>
                - PC 3대 or 모바일 3대 or PC 1대+모바일 2대 or PC 2대+모바일 1대 (총 3대)
                </li> 
                <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.<br>
                ※ 본 상품 구매 전/후, 담당자(서진원 과장 : 070-4006-7176)와의 상담을 통한 교재 및 모의고사 발송 안내 반드시 진행 요망</li> 
            </ul>   
            <div class="infoTit"><strong>교재관련</strong></div>
            <ul>
                <li>본 PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도로 구입 가능합니다.</li>
            </ul>   
            <div class="infoTit"><strong>환불정책</strong></div>
            <ul>
                <li>결제 후 7일 이내 전액 환불 가능합니다.</li>
                <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</li>
                <li>본 상품은 특별 기획 상품으로, 수강시작일(결제 당일 포함)로부터 7일 경과 후 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 차감하고 환불됩니다.<br>
                · 결제금액 - (강좌 정상가의 1일 이용대금x이용일수)        
                </li>        
            </ul>   
            <div class="infoTit"><strong>유의사항</strong></div>
            <ul>
                <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선/적립금 사용 등 혜택이 적용되지 않습니다.</li>
                <li>선택한 교수의 강의가 학원 사정에 의해 부득이하게 진행되지 않을 경우 대체 강의가 제공되며, 이로 인한 환불은 불가합니다.</li>
                <li>아이디 공유 적발 시 회원 자격 박탈 및 환불 불가하며, 추가적인 불법 공유 행위 적발 시 형사 고발 조치가 단행될 수 있습니다.</li>        
            </ul>               
            <strong>※ 고객만족센터 : 1544-5006</strong>
        </div>  
    </div>

</div>
 <!-- End Container -->

<script>
  /* 수강신청 */
  function go_PassLecture(code){
      if($("input[name='ischk']:checked").size() < 1){
          alert("이용안내에 동의하셔야 합니다.");
          return;
      }

      var url = '{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/') }}' + code;
      location.href = url;
  }
      //유툽

      var tab1_url = "https://www.youtube.com/embed/vcIVfZluZuY?rel=0";
      var tab2_url = "https://www.youtube.com/embed/_s3nr6mriWQ?rel=0";  
      var tab3_url = "https://www.youtube.com/embed/T7bpGfvf-_U?rel=0";   
      var tab4_url = "https://www.youtube.com/embed/dXzoUDt9UME?rel=0";   
      var tab5_url = "https://www.youtube.com/embed/kpiHmPg9-_U?rel=0";  

      $(function() {
          $(".preview_list ul li a").click(function(){
              var activeTab = $(this).attr("href");
              var video_tab_url = '';
              var html_str = '';
              if(activeTab == "#tab1"){
                  video_tab_url = tab1_url;
              }else if(activeTab == "#tab2"){
                  video_tab_url = tab2_url;
              }else if(activeTab == "#tab3"){
                  video_tab_url = tab3_url;
              }else if(activeTab == "#tab4"){
                  video_tab_url = tab4_url;
              }else if(activeTab == "#tab5"){
                  video_tab_url = tab5_url;
              }else if(activeTab == "#tab6"){
                  video_tab_url = tab6_url;
              }else if(activeTab == "#tab7"){
                  video_tab_url = tab7_url;
              }else if(activeTab == "#tab8"){
                  video_tab_url = tab8_url;
              }else if(activeTab == "#tab9"){
                  video_tab_url = tab9_url;
              }
              html_str = '<iframe src="' + video_tab_url + '" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="730" height="411" frameborder="false" scrolling="no"></iframe>'
              $(this).addClass("active");
              $('.avi_box').html(html_str);
              $('.avi_title').html($(this).find('p').html());
          });
      });

</script>

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">    
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
    $(document).ready(function() {
        AOS.init();
    });
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')
@stop