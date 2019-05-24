@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <link href="/public/css/willbes/promotion/2003_1244.css?ver={{time()}}" rel="stylesheet">
    <!-- Container -->
    <style type="text/css">
        
    </style>


    <div class="evtContent NGR" id="evtContainer">      

    <div class="evtCtnsBox evtTop">
            <div>
                <span class="txt1"><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_top_txt1.png" title="출제경향" /></span>
                <span class="txt2"><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_top_txt2.png" title="필수팁" /></span>
                <span class="txt3"><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_top_txt3.png" title="실전 싱크로율 100% 문항" /></span>
                <span class="txt4"><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_top_txt4.png" title="교수님들과의 실시간 소통" /></span>
                <span class="txt5"><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_top_txt5.png" title="경품 이벤트" /></span>
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_top.jpg" title="2019 국가직 9급 풀캐어 서비스" />
                
                <div class="youtube">
                    <iframe src="https://www.youtube.com/embed/um0UBAs7IDw?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
                
            </div>
        </div>

        <div class="evtCtnsBox evtMenu NGEB" id="evtMenu">                
            <ul>
                <li>
                    {{--<a id='tab1' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/'.$data['PromotionCode'].'?tab=1#content_1') }}">--}}
                    <a id='tab1' href="javascript:alert('준비중입니다.');">
                        <span>서울시/지방직 9급</span>
                        <div>시험 완벽분석</div>
                    </a>
                </li>
                <li>                    
                    <a id='tab2' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/'.$data['PromotionCode'].'?tab=2#content_2') }}">
                        <span>합격을 위한 최종점검</span>
                        <div>마무리 전략</div>				
                    </a>
                </li>
                <li>
                    <a id='tab3' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/'.$data['PromotionCode'].'?tab=3#content_3') }}">
                        <strong>무료응시</strong>
                        <span>미리 보는 시험</span>
                        <div>6/2 전국 모의고사</div>
                    </a>
                </li>     
                <li>
                    <a id='tab4' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/'.$data['PromotionCode'].'?tab=4#content_4') }}">
                        <strong>윌비스 TV</strong>   
                        <span>적중 마무리 특강</span>
                        <div>LIVE 특강</div>
                    </a>
                </li>
                <li>
                    <a id='tab5' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/'.$data['PromotionCode'].'?tab=5#content_5') }}">
                        <strong>진행중</strong>  
                        <span>참여하고 선물 받자!</span>
                        <div>합격기원 이벤트</div>
                    </a>
                </li>
            </ul>
        </div>

        <div id="content_1" class="tabCts pb90">
            시험 완벽분석
        </div>

        <div id="content_2" class="tabCts pb90 pt100">  
            <div class="content_2_wrap">             
                <p><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_02_1.jpg" title="과목별 마무리 학습 전략" /></p>
                <ul class="youtubeTab NGEB">
                    <li><a href="#yTab01" class="active">국어<br> 기미진</a></li>
                    <li><a href="#yTab02">영어<br> 한덕현</a></li>
                    <li><a href="#yTab03">한국사<br> 박민주</a></li>
                    <li><a href="#yTab04">한국사<br> 조민주</a></li>
                    <li><a href="#yTab05">행정학<br> 김덕관</a></li>
                    <li><a href="#yTab06">행정법<br> 한세훈</a></li>
                    <li><a href="#yTab07">지방세(세법)<br> 고선미</a></li>
                </ul>
                <div class="youtubeCts youtube" id="yTab01">
                    <iframe src="https://www.youtube.com/embed/5KDnhVEf0bE?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="youtubeCts youtube" id="yTab02">                    
                </div>
                <div class="youtubeCts youtube" id="yTab03">                    
                </div>
                <div class="youtubeCts youtube" id="yTab04">                   
                </div>
                <div class="youtubeCts youtube" id="yTab05">                    
                </div>
                <div class="youtubeCts youtube" id="yTab06">                    
                </div>
                <div class="youtubeCts youtube" id="yTab07">                    
                </div>

                <p><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_02_2.jpg" title="시험전, 시험당일 유의사항" /></p>
                <p><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_02_3.jpg" title="유의사항" /></p>
                <p class="mt100"><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_02_4.jpg" title="응시자 준수사항 및 필기장소 안내" /></p>
                <div class="youtube">
                    <iframe src="https://www.youtube.com/embed/gpppIN1ISaw?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="mt100 tx-center"><a href="http://gosi.go.kr/cop/bbs/selectBoardList.do?bbsId=BBSMSTR_000000000131" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_02_btn01.png" title="필기시험 장소 안내 바로가기" /></a> </div>
            </div>  
        </div>


        <div id="content_3" class="tabCts">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_03_1.jpg" usemap="#Map1244C" title="윌비스 전국 모의고사" border="0" />
            <map name="Map1244C" id="Map1244C">
                <area shape="rect" coords="558,1839,669,1871" href="javascript:go_popup()" alt="약도보기" />
                <area shape="rect" coords="188,1904,549,1968" href="https://pass.willbes.net/pass/mockTest/apply/cate/?state=1&s_type=&s_keyword=" target="_blank" alt="온라인모의고사신청" />
              	<area shape="rect" coords="573,1903,934,1970" href="https://pass.willbes.net/pass/mockTest/apply/cate/?state=2&s_type=&s_keyword=" target="_blank" alt="오프라인모의고사신청" />
                <area shape="rect" coords="97,2314,343,2363" href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/'.$data['PromotionCode'].'?tab=5#giftevent') }}" alt="이벤트자세히보기" />
            </map>
            <!--레이어팝업-->
            <div id="popup" class="Pstyle">
                <span class="b-close">X</span>
                <div class="content">
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_03_2.jpg" />
                </div>
            </div>
        </div>


        <div id="content_4" class="tabCts">
            <p class="mb100">
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_04_1.jpg" usemap="#Map1244D" title="족집게 라이브 특강" border="0" />
                <map name="Map1244D" id="Map1244D">
                    <area shape="rect" coords="669,1629,951,1680" href="https://pass.willbes.net/pass/event/show/ongoing?event_idx=258" target="_blank" alt="라이브특강 현장 수강 신청" />
                </map>
            </p>
            <div class="content_4_wrap">                
                <p><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_04_2.jpg" title="라이브 특강 방송보기" /></p>          

                <div id="movieFrame">
                    {{--방송 전--}}
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_04_3.jpg" title="방송전">                    

                    {{--6/3 ~ 6/11 방송 중
                    <script src="/public/vendor/jwplayer/jwplayer.js"></script>
                    <div class="movieplayer">
                        <div class="embedWrap">
                            <!--PC-->    
                            <div class="embed-container" id="myElement">
                                <script type="text/javascript">jwplayer.key="kl6lOhGqjWCTpx6EmOgcEVnVykhoGWmf4CXllubWP5JwYq6K34m5XnpF0KGiCbQN";</script>
                                <script type="text/javascript">
                                    jwplayer("myElement").setup({
                                    width: '100%',
                                    logo: {file: 'https://static.willbes.net/public/images/promotion/common/live_pass_bi.png'},
                                    image: "https://static.willbes.net/public/images/promotion/2019/05/1244_04_3.jpg",
                                    aspectratio: "16:9",
                                    autostart: "true",
                                    file: "rtmp://willbes.flive.skcdn.com/willbeslive/livestreamcop3011"
                                });
                                </script>
                            </div>

                            <!--모바일용-->
                            <div class="embed-container-mobile" id="myElement">
                                <script type="text/javascript">jwplayer.key="kl6lOhGqjWCTpx6EmOgcEVnVykhoGWmf4CXllubWP5JwYq6K34m5XnpF0KGiCbQN";</script>
                                <script type="text/javascript">
                                    jwplayer("myElement").setup({
                                    width: '100%',
                                    logo: {file: 'https://static.willbes.net/public/images/promotion/common/live_pass_bi.png'},
                                    image: "https://static.willbes.net/public/images/promotion/2019/05/1244_04_3.jpg",
                                    aspectratio: "16:9",
                                    autostart: "true",
                                    file: "rtmp://willbes.flive.skcdn.com/willbeslive/livestreamcop3011"
                                });
                                </script>
                            </div>
                            <ul class="mobileCh">
                                <li><a href="javascript:fn_live('hd')"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_playbtnH.png" title="고화질 보기"></a></li>
                                <li><a href="javascript:fn_live('low')"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_playbtnN.png" title="일반화질 보기"></a></li>
                            </ul>                            
                        </div>
                    </div>
                    --}}
                    
                    {{--6/11 00:00 부터 노출
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_04_3_end.jpg" title="방송종료" />
                    --}}
                </div>
                <p><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_04_4.jpg" title="라이브 특강 수강 안내"></p>                
                
                <p><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_04_5.jpg" title="라이브 특강 방송보기" /></p>
            </div> 
            {{--댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif        
        </div>


        <div id="content_5" class="tabCts">
            <p>
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_05_1.jpg" usemap="#Map1244E" title="소문내기 이벤트" border="0" />
                <map name="Map1244E" id="Map1244E">
                    <area shape="rect" coords="186,1026,300,1055" href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" target="_blank" alt="이미지다운로드"/>
                    <area shape="rect" coords="143,1262,310,1324" href="http://gall.dcinside.com/board/lists/?id=government" target="_blank" alt="공무원갤러리" />
                    <area shape="rect" coords="366,1263,523,1325" href="https://cafe.naver.com/gugrade" target="_blank" alt="공드림" />
                    <area shape="rect" coords="586,1261,714,1325" href="https://section.blog.naver.com/BlogHome.nhn?directoryNo=0&amp;currentPage=1&amp;groupId=0" target="_blank" alt="블로그" />
                    <area shape="rect" coords="144,1340,287,1405" href="http://cafe.daum.net/9glade" target="_blank" alt="구꿈사" />
                    <area shape="rect" coords="366,1343,518,1404" href="https://www.facebook.com" target="_blank" alt="패이스북" />
                    <area shape="rect" coords="592,1340,749,1407" href="https://www.instagram.com/?hl=ko" target="_blank" alt="인스타그램" />
                    <area shape="rect" coords="794,1259,1019,1385" href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" target="_blank" alt="이미지다운로드"/>                  
                </map>
            </p>
            {{--댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial')
            @endif
            <p id="giftevent">
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_05_2.jpg" usemap="#Map1244E1" title="소문내기 이벤트" border="0" />
                <map name="Map1244E1" id="Map1244E1">
                    <area shape="rect" coords="252,340,573,388" href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/'.$data['PromotionCode'].'?tab=3#content_3') }}" alt="모의고사신청하기" />
                </map>
            </p>
            <div class="note">
                <p><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_05_3.jpg" /></p>
                <div class="noteWrap">
                    <ul>
                        <li><a href="#event01">소문내기 이벤트</a></li>
                        <li><a href="#event02">선물지급 이벤트</a></li>
                    </ul>
                    <div id="event01">
                        <table cellspacing="0" cellpadding="0">
                            <col/>
                            <tbody>
                                <tr>
                                    <th>참여기간</th>
                                    <td>5.22(수 ~ 6.3(월)</td>
                                </tr>
                                <tr>
                                    <th>이벤트대상</th>
                                    <td>윌비스 회원 누구나</td>
                                </tr>
                                <tr>
                                    <th>선발기준 </th>
                                    <td>치킨-햄버거-아이스크림-드링크 순으로 무작위 추첨<br />
                                    중복당첨 없이, 선물은 1회만 제공 </td>
                                </tr>
                                <tr>
                                    <th>당첨자발표</th>
                                    <td>6.17(월), 공지사항 확인</td>
                                </tr>
                                <tr>
                                    <th>발송일정 </th>
                                    <td>6.17(월), 일괄지급 예정 </td>
                                </tr>
                            </tbody>
                        </table>
                        <h5>[유의사항]</h5>
                        <ol>
                            <li>본 페이지에 명시된 커뮤니티 및 SNS에 작성 된 글만 이벤트 참여로 인정됩니다.</li>
                            <li>반드시 글 제목에 아래 키워드가 포함되어 있어야 합니다.<br>
                            <span class="tx-blue">'윌비스', '서울시/지방직 대비', '풀케어 서비스'
                            (** 인스타그램의 경우 #윌비스 #서울시지방직대비 #풀케어서비스 해시태그 포함 필수)</span></li>

                            <li>커뮤니티의 경우, 전체 공개글만 이벤트 참여로 인정 됩니다.</li>

                            <li>아래의 경우에는 이벤트 참여로 인정이 불가하며, 모든 경품은 제공되지 않습니다.<br>
                            - 다운로드 이미지가 포함되지 않은 게시글의 경우<br>
                            - 부정한 방법(정확하지 않은 URL, 타인의 게시글 복사 등)으로 참여한 경우<br>
                            - 이벤트 종료일을 기점으로 게시글이 삭제 되어 확인 할 수 없는 경우</li>

                            <li>제공되는 선물은 모바일 상품권 형태로 발송됩니다.</li>

                            <li>회원정보상의 연락처로 발송 하오니 이벤트 참여 전 회원정보를 다시 한번 확인하시기 바랍니다.</li>

                            <li class="tx-origin-red">회원정보상 sms 수신거부 및 휴대전화번호 오류의 경우, 또는 휴대전화 단말기의 수신상태가 양호하지 않은 경우에
                                경품이 제공되지 않을 수 있으며 재발송 되지 않습니다.</li>

                            <li class="tx-origin-red">이벤트 참여를 제외한 모든 댓글은 사전 예고없이 삭제될 수 있습니다.</li>
                        </ol>
                    </div>

                    <div id="event02">
                        <table cellspacing="0" cellpadding="0">
                            <col/>
                            <tbody>
                                <tr>
                                    <th>이벤트대상</th>
                                    <td>6/2(일) 시행하는 윌비스 전국 모의고사 응시생 
                                    (응시번호를 발급받은 응시생에 한함)</td>
                                </tr>
                                <tr>
                                    <th>선발기준</th>
                                    <td>
                                        [장학생 선발]<br />
                                        - OMR 채점결과 기준, 성적 상위 3등까지 선정 <span class="tx-origin-red">(단, 오프라인 응시생에 한함)</span><br />
                                        - 조정점수가 아닌, 원점수의 평균으로 선발<br />
                                        - 원점수 평균 동점자의 경우, 과목별 100점이 많은 응시생 우선선발<br />
                                        ※ 100점이 없을 시, 과목별 고득점 수가 많은 응시생 우선선발<br />
                                        <br />
                                        [추첨]<br />
                                        - 갤럭시탭-햄버거-아이스크림-드링크 순으로 무작위 추첨<br />
                                        - 중복당첨 없이, 선물은 1회만 제공 
                                    </td>
                                </tr>
                                <tr>
                                    <th>당첨자발표</th>
                                    <td>6.17(월), 공지사항 확인</td>
                                </tr>
                                <tr>
                                    <th>발송일정 </th>
                                    <td>6.17(월), 일괄지급 예정 </td>
                                </tr>
                            </tbody>
                        </table>
                        <h5>[유의사항]</h5>
                        <ol>
                            <li class="tx-origin-red">윌비스 홈페이지에서 모의고사를 통해 응시번호를 발급 받은 회원에 한해 참여가 가능합니다.</li>
                            <li>6월 2일 이외의 모의고사 참여자는 인정되지 않습니다.</li>
                            <li class="tx-origin-red">윌비스 회원정보상의 전화번호는 반드시 본인 명의여야 합니다.</li>
                            <li>제공되는 선물은 모바일 상품권 형태로 발송됩니다.</li>
                            <li>회원정보상의 연락처로 발송 하오니 이벤트 참여 전 회원정보를 다시 한번 확인하시기 바랍니다.</li>
                            <li class="tx-origin-red">회원정보상 sms 수신거부 및 휴대전화번호 오류의 경우, 또는 휴대전화 단말기의 수신상태가 양호하지 않은 경우에
                                경품이 제공되지 않을 수 있으며 재발송 되지 않습니다.</li>
                            <li class="tx-origin-red">기프티콘을 수신한 이후 개인사정에 의해 유효기간이 지나 사용하지 못한 경우 
                                사용하지 않은 혜택에 대해서는 별도로 보상하지 않습니다.</li>
                            <li>이벤트 참여를 제외한 모든 댓글은 사전 예고없이 삭제될 수 있습니다.</li>
                        </ol>                    
                    </div>
                    <p>※ 유의사항을 읽지 않고 발생한 모든 상황에 대해서 윌비스고시학원은 책임지지 않습니다.</p>
                </div>
            </div>
        </div>   
        
              
    </div>
    <!-- End Container --> 

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">	
        /*tab*/
        $(document).ready(function(){
            var cnt;
            var tab_id = '{{ $arr_base['tab_id'] }}';
            $('#tab'+tab_id).addClass('active');
            $('.evtMenu ul > li').each(function(item){
                cnt = item + 1;
                $("#content_"+cnt).hide();
                if (tab_id == cnt) {
                    $("#content_"+cnt).show();
                }
            });
        });

        /*마무리특강*/
        var tab1_url = "https://www.youtube.com/embed/5KDnhVEf0bE?rel=0";
        var tab2_url = "https://www.youtube.com/embed/wyQBKuyvbY4?rel=0";
        var tab3_url = "https://www.youtube.com/embed/uNRHXa8uTug?rel=0";
        var tab4_url = "https://www.youtube.com/embed/9EfkeMj4CrQ?rel=0";
        var tab5_url = "https://www.youtube.com/embed/bgd4ZRaHTCs?rel=0";
        var tab6_url = "https://www.youtube.com/embed/bIQerU7Tijc?rel=0";
        var tab7_url = "https://www.youtube.com/embed/vfWaXa4nMYs?rel=0";

        $(document).ready(function(){
        $(".youtubeCts").hide(); 
        $(".youtubeCts:first").show();
        $(".youtubeTab li a").click(function(){ 
                var activeTab = $(this).attr("href"); 
                var html_str = "";
                if(activeTab == "#yTab01"){
                    html_str = "<iframe src='"+tab1_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#yTab02"){
                    html_str = "<iframe src='"+tab2_url+"' allowfullscreen></iframe>";					
                }else if(activeTab == "#yTab03"){
                    html_str = "<iframe src='"+tab3_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#yTab04"){
                    html_str = "<iframe src='"+tab4_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#yTab05"){
                    html_str = "<iframe src='"+tab5_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#yTab06"){
                    html_str = "<iframe src='"+tab6_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#yTab07"){
                    html_str = "<iframe src='"+tab7_url+"' allowfullscreen></iframe>";
                }
                
                
                $(".youtubeTab li a").removeClass("active"); 
                $(this).addClass("active"); 
                $(".youtubeCts").hide(); 
                $(".youtubeCts").html(''); 
                $(activeTab).html(html_str);
                $(activeTab).fadeIn(); 
                return false; 
                });
            });

        /*레이어팝업*/
        function go_popup() {
            $('#popup').bPopup();
        }

        $(document).ready(function(){
            $('.noteWrap ul').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
            
                $content = $($active[0].hash);
            
                $links.not($active).each(function () {
                $(this.hash).hide()});
            
                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                $active.removeClass('active');
                $content.hide();
            
                $active = $(this);
                $content = $(this.hash);
            
                $active.addClass('active');
                $content.show();
            
                e.preventDefault()})})}
        ); 
    </script>
@stop