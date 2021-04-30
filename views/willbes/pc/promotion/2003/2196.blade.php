@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
<style type="text/css">
.evtContent { 
    position:relative;            
    width:100% !important;
    margin-top:20px !important;
    padding:0 !important;
    background:#fff;
}	
.evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
/*****************************************************************/  

.evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/04/2196_top_bg.jpg) no-repeat center top;}

.evt02 {background:#aa556c; padding-bottom:150px}
.evt02 p {position:relative; width:1120px; margin:0 auto}
.evt02 p a:hover {background:rgba(0,0,0,0.3)}
.evt02 .check{
    margin-top:50px;font-size:17px; text-align:center;line-height:1.5;
    letter-spacing:-1px;
}
.evt02 .check label{color:#fff}
.evt02 .check input {border: 2px solid #000;margin-right: 8px;height: 20px; width: 20px;} 
.evt02 .check a {display: inline-block; padding:5px 20px; color: #111528;background: #d7d7d7;border-radius:20px; margin-left:20px}
.evt02 .check a:hover {color: #fff;background: #000;}

.evtInfo {padding:80px 0; background:#fff; color:#000; font-size:16px}
.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
.evtInfoBox li {list-style:disc; margin-left:20px; font-size:14px}
.evtInfoBox h4 {font-size:35px; margin-bottom:50px}
.evtInfoBox .infoTit {font-size:20px;}
.evtInfoBox ul {margin-bottom:30px}

/*분할 유튜브*/
.youtube_contents {position:relative;width:1050px;margin:auto;z-index:1;}
.youtube_divide {margin:30px -15px 0;padding: 40px 0 0 30px;background:#fff;border-radius: 5px;box-shadow: -10px 10px 30px rgba(0,0,0,.1);}
.youtube_divide .preview_area {display:inline-block; padding-bottom:40px;text-align:left;}
.youtube_divide .preview_area .avi_box {width:730px;height:411px;margin-bottom:20px;} 
.youtube_divide .preview_area h2 {font-size:20px;line-height:32px;color:#000;overflow:hidden;text-overflow:ellipsis;word-wrap:normal; width:100%;}
.youtube_divide .preview_list_area {display:inline-block;vertical-align:top;padding-left:12px;width:304px;text-align:left;}
.youtube_divide .preview_list_area .preview_list {height:455px;box-sizing:border-box;overflow-y:scroll;}
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
        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2196_top.jpg" alt="소방 이종오 티패스">  
        </div>
    
        <div class="evtCtnsBox evt01">            
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2196_01.jpg" alt="시행착오">
            <div class="youtube_contents">
                <div class="youtube_divide">             
                    <div class="preview_area">
                        <div class="avi_box">
                            <iframe webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="730" height="411" frameborder="false" scrolling="no" src="https://www.youtube.com/embed/2_x_ICBX4ao?rel=0"></iframe>
                        </div>
                        <h2 class="avi_title">[소방학개론 빈출테마 1탄] 열량 및 비열 빈칸 채우기 및 O/X특강!</h2>
                    </div>
                    <div class="preview_list_area">
                        <div class="preview_list">
                            <ul>
                                <li class="on">
                                    <a href="#tab1" class="active">
                                        <span class="num_box" data-num="1">1</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/02/1840_thumbnail01.jpg" alt="소방 1탄"></div>
                                        <div class="text_box">
                                            <p>[소방학개론 빈출테마 1탄] 열량 및 비열 빈칸 채우기 및 O/X특강!</p>
                                        </div>
                                    </a>
                                </li>
                        
                                <li class="">
                                    <a href="#tab2">
                                        <span class="num_box" data-num="2">2</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/02/1840_thumbnail02.jpg" alt="소방 2탄"></div>
                                        <div class="text_box">
                                            <p>[소방학개론 빈출테마 2탄] 연소의 분류 빈칸 채우기 및 O/X 특강!</p>
                                        </div>
                                    </a>
                                </li>
                         
                                <li class="">
                                    <a href="#tab3">
                                        <span class="num_box" data-num="3">3</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/02/1840_thumbnail03.jpg" alt="화재 정의"></div>
                                        <div class="text_box">
                                            <p>[소방학개론 빈출테마 3탄] 화재정의 중요 키워드 빈칸 채우기 & O/X</p>
                                        </div>
                                    </a>
                                </li>                               
                             
                                <li class="">
                                    <a href="#tab4">
                                        <span class="num_box" data-num="4">4</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/02/1840_thumbnail04.jpg" alt="명예 소방관 1탄"></div>
                                        <div class="text_box">
                                            <p>[소방관계법규 빈출테마 1탄] 소방기본법의 목적 빈칸 채우기 특강!</p>
                                        </div>
                                    </a>
                                </li> 
                            
                                <li class="">
                                    <a href="#tab5">
                                        <span class="num_box" data-num="5">5</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/02/1840_thumbnail05.jpg" alt="명예 소방관 2탄"></div>
                                        <div class="text_box">
                                            <p>[소방관계법규 빈출테마 2탄] 화재경계지구 빈칸 채우기 특강!</p>                                   
                                        </div>
                                    </a>
                                </li>
                             
                                <li class="">
                                    <a href="#tab6">
                                        <span class="num_box" data-num="6">6</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/02/1840_thumbnail06.png" alt="명예 소방관 마지막"></div>
                                        <div class="text_box">
                                            <p>[소방관계법규 빈출테마 마지막] 종사명령/강제처분/피난명령/긴급조치 빈칸 채우기 특강!</p>
                                        </div>
                                    </a>
                                </li>
                                {{--
                                <li class="">
                                    <a href="#tab7">
                                        <span class="num_box" data-num="7">7</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>무선/통신 공통이론에서 『변조이론』 제일 중요한 거 알지!?😆 2탄</p>
                                        </div>
                                    </a>
                                </li>                                
                            
                                <li class="">
                                    <a href="#tab8">
                                        <span class="num_box" data-num="8">8</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>무선/통신 공통이론에서 『변조이론』 제일 중요한 거 알지!? 피날레!</p>
                                        </div>
                                    </a>
                                </li>  
                                
                                <li class="">
                                    <a href="#tab9">
                                        <span class="num_box" data-num="9">9</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>『RLC회로의 특성』 바로 이거야!!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab10">
                                        <span class="num_box" data-num="10">10</span>
                                        <div class="thum_box"><img src="https://img.modoogong.com/upload/bnr/20200605/20200605182708_3872.png" alt=""></div>
                                        <div class="text_box">
                                            <p>[리라클영어] 이리라 교수님의 역대급 강의력 겁나 빠르게 확인하기!</p>
                                            <span>영어 / 이리라</span>
                                        </div>
                                    </a>
                                </li>    
                                --}}        

                            </ul>
                        </div>
                    </div>          
                </div>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2196_02.jpg" alt="행정학 소개">
        </div>

        <div class="evtCtnsBox evt02">   
            <p>         
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2196_03.jpg" alt="후기">
                <a href="javascript:go_PassLecture('182093');" title="소방학" style="position: absolute; left: 10.27%; top: 87.88%; width: 21.07%; height: 6.55%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('182094');" title="소방관계법규" style="position: absolute; left: 40%; top: 87.88%; width: 21.07%; height: 6.55%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('182095');" title="소방학/법규" style="position: absolute; left: 69.55%; top: 87.88%; width: 21.07%; height: 6.55%; z-index: 2;"></a>
            </p> 
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>            
        </div>

        <div class="evtCtnsBox evtInfo NGR" id="careful">
			<div class="evtInfoBox">
				<h4 class="NGEB">이용안내 및 유의사항</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>제공과정 : 윌비스공무원 노량진캠퍼스에서 진행되는 2021~2022 대비 이종오 소방학/소방관계법규 전 과정</li>
                    <li>본 상품의 수강기간은 상품 수강신청 상세안내 화면에 표기된 기간만큼 제공됩니다.</li>
                    <li>개강일정 및 교수님 사정에 따라 커리큘럼 및 강의 일정의 변동이 있을 수 있습니다.</li>
                    <li>본 상품은 결제가 완료되는 즉시 수강이 시작됩니다.</li>                     
				</ul>
				<div class="infoTit NG"><strong>기기제한</strong></div>
				<ul>
					<li>본 상품 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                        - PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)
                    </li>  
                    <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 최초 1회에 한해 [내강의실]-[등록기기정보]에서 직접 초기화 가능하며,<br>
                    그 외 특별한 사유에 의한 단말기 초기화의 경우, 고객센터 1544-5006이나 1:1상담게시판으로 문의바랍니다.</li>                    				
				</ul>
                <div class="infoTit NG"><strong>수강안내</strong></div>
				<ul>
					<li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                    <li>구매하신 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 강좌를 선택 등록 후 수강할 수 있습니다.</li>
                    <li>본 상품은 일시정지/수강연장/재수강이 불가한 상품입니다.</li>               
                    <li>본 T-PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 구입 가능합니다.</li>
                    <li>윌비스 LIVE모드는 학원실강에서 진행되는 콘텐츠로, 본 상품에는 LIVE모드 별도 제공되지 않습니다.</li>
                </ul>
				<div class="infoTit NG"><strong>결제/환불</strong></div>
				<ul>
					<li>결제 후 7일 이내 전액 환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                    <li>강의자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
                    <li>본 상품은 특별 기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일 수 만큼 차감되고 환불 됩니다.<br>
                        - 결제금액 - (강좌 정상가의 1일 이용대금X이용일수)
                    </li>
                    <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>                    				
				</ul>
                <div class="infoTit NG"><strong>※ 이용 문의 : 윌비스 고객만족센터 1544-5006</strong></div>
			</div>
		</div>   
                        
              
    </div>
    <!-- End Container --> 

    <script type="text/javascript">
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        //유툽
        var tab1_url = "https://www.youtube.com/embed/2_x_ICBX4ao?rel=0";
        var tab2_url = "https://www.youtube.com/embed/DL0LRv6jync?rel=0";  
        var tab3_url = "https://www.youtube.com/embed/wb5Mc43sHSs?rel=0";   
        var tab4_url = "https://www.youtube.com/embed/z7YwNxte5Nk?rel=0";   
        var tab5_url = "https://www.youtube.com/embed/nGvEN8pbthc?rel=0"; 
        var tab6_url = "https://www.youtube.com/embed/kkfisLsAzV0?rel=0";  
        var tab7_url = "https://www.youtube.com/embed/9dxrpJ6TOZg?rel=0";  
        var tab8_url = "https://www.youtube.com/embed/1zATq2Kydwg?rel=0";   
        var tab9_url = "https://www.youtube.com/embed/37yjw2mC8wY?rel=0";                        
  

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

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop