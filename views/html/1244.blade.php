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
                    <iframe class="youtubePlayer" src="https://www.youtube.com/embed/gpppIN1ISaw?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evtMenu NGEB" id="evtMenu">                
            <ul>
                <li>
                    <a id='tab1' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1244/spidx/2?tab=1#content_1') }}">
                        <span>서울시/지방직 9급</span>
                        <div>시험 완벽분석</div>
                    </a>
                </li>
                <li>                    
                    <a id='tab2' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1244/spidx/2?tab=1#content_2') }}">
                        <span>합격을 위한 최종점검</span>
                        <div>마무리 전략</div>				
                    </a>
                </li>
                <li>
                    <a id='tab3' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1244/spidx/2?tab=1#content_3') }}">                        
                        <strong>무료응시</strong>
                        <span>미리 보는 시험</span>
                        <div>6/2 전국 모의고사</div>
                    </a>
                </li>     
                <li>
                    <a id='tab4' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1244/spidx/2?tab=1#content_4') }}"> 
                        <strong>윌비스 TV</strong>   
                        <span>적중 마무리 특강</span>
                        <div>LIVE 특강</div>
                    </a>
                </li>
                <li>
                    <a id='tab5' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1244/spidx/2?tab=1#content_5') }}">  
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
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_02_1.jpg" title="점수 10점 상승을 위한 시험 전 유의사항/최상의 컨디션을 위한 시험 당일 유의사항" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_02_2.jpg" title="응시자 준수사항 및 필기장소 안내" />
            <div class="youtube">
                <iframe class="youtubePlayer" src="https://www.youtube.com/embed/gpppIN1ISaw?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div><a href="http://gosi.go.kr/cop/bbs/selectBoardList.do?bbsId=BBSMSTR_000000000131" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_02_btn01.png" title="필기시험 장소 안내 바로가기" /></a> </div>  
        </div>


        <div id="content_3" class="tabCts">
            모의고사
        </div>


        <div id="content_4" class="tabCts">
            라이브특강
            {{--댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial')
            @endif
        </div>


        <div id="content_5" class="tabCts">
            합격기원 이벤트
            {{--댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial')
            @endif
            <div>
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
                                <td>5.22(수)~6.3(월)</td>
                            </tr>
                            <tr>
                                <th>이벤트대상</th>
                                <td>윌비스 회원 누구나</td>
                            </tr>
                            <tr>
                                <th rowspan="2">선발기준 </th>
                                <td>치킨-햄버거-아이스크림-드링크 순으로 무작위 추첨<br />
                                중복당첨 없이, 선물은 1회만 제공 </td>
                            </tr>
                            <tr>
                                <td> </td>
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
                        '윌비스', '서울시/지방직 대비', '풀케어 서비스'
                        (** 인스타그램의 경우 #윌비스 #서울시지방직대비 #풀케어서비스 해시태그 포함 필수)</li>

                        <li>커뮤니티의 경우, 전체 공개글만 이벤트 참여로 인정 됩니다.</li>

                        <li>아래의 경우에는 이벤트 참여로 인정이 불가하며, 모든 경품은 제공되지 않습니다.<br>
                        - 다운로드 이미지가 포함되지 않은 게시글의 경우<br>
                        - 부정한 방법(정확하지 않은 URL, 타인의 게시글 복사 등)으로 참여한 경우<br>
                        - 이벤트 종료일을 기점으로 게시글이 삭제 되어 확인 할 수 없는 경우</li>

                        <li>제공되는 선물은 모바일 상품권 형태로 발송됩니다.</li>

                        <li>회원정보상의 연락처로 발송 하오니 이벤트 참여 전 회원정보를 다시 한번 확인하시기 바랍니다.</li>

                        <li>회원정보상 sms 수신거부 및 휴대전화번호 오류의 경우, 또는 휴대전화 단말기의 수신상태가 양호하지 않은 경우에
                            경품이 제공되지 않을 수 있으며 재발송 되지 않습니다.</li>

                        <li>이벤트 참여를 제외한 모든 댓글은 사전 예고없이 삭제될 수 있습니다.</li>
                    </ol>
                </div>

                <div id="event02">
                    <table cellspacing="0" cellpadding="0">
                        <col/>
                        <tbody>
                            <tr>
                                <th>이벤트대상</th>
                                <td>6/2(일) 시행하는 윌비스 전국 모의고사 응시생<br />
                                (응시번호를 발급받은 응시생에 한함)</td>
                            </tr>
                            <tr>
                                <th>선발기준</th>
                                <td>
                                    [장학생 선발]<br />
                                    - OMR 채점결과 기준, 성적 상위 3등까지 선정<br />
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
                        <li>윌비스 홈페이지에서 모의고사를 통해 응시번호를 발급 받은 회원에 한해 참여가 가능합니다.</li>
                        <li>6월 2일 이외의 모의고사 참여자는 인정되지 않습니다.</li>
                        <li>윌비스 회원정보상의 전화번호는 반드시 본인 명의여야 합니다.</li>
                        <li>제공되는 선물은 모바일 상품권 형태로 발송됩니다.</li>
                        <li>회원정보상의 연락처로 발송 하오니 이벤트 참여 전 회원정보를 다시 한번 확인하시기 바랍니다.</li>
                        <li>회원정보상 sms 수신거부 및 휴대전화번호 오류의 경우, 또는 휴대전화 단말기의 수신상태가 양호하지 않은 경우에
                            경품이 제공되지 않을 수 있으며 재발송 되지 않습니다.</li>
                        <li>기프티콘을 수신한 이후 개인사정에 의해 유효기간이 지나 사용하지 못한 경우 
                            사용하지 않은 혜택에 대해서는 별도로 보상하지 않습니다.</li>
                        <li>이벤트 참여를 제외한 모든 댓글은 사전 예고없이 삭제될 수 있습니다.</li>
                    </ol>                    
                </div>
                <p>※ 유의사항을 읽지 않고 발생한 모든 상황에 대해서 윌비스고시학원은 책임지지 않습니다.</p>
            </div>
        </div>   
        
              
    </div>
    <!-- End Container --> 

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
    </script>
@stop