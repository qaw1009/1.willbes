@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">

    
    <!-- Container -->   

<div class="p_re evtContent NSK-Thin" id="evtContainer">
    @include('html.1210_top')

    <div class="evtCtnsBox">   
        <div class="s_section2">
            <div class="s_section2_wrap">
                <h2><span>2019 채점</span> 서비스</h2>
                시험 채점 및 응시 전형에 필요한 개인 정보와 전형정보를 입력/관리하는 페이지입니다.
                <div>
                    <p>채점 시 유의사항</p>
                    <ul>
                        <li>▶ 성적 신뢰도를 위해 최초채점을 제외하고 2회까지만 재채점을 통해 수정이 가능하오니, 신중하게 채점해 주시기 바랍니다.</li>
                        <li>▶ 채점하는 방식은 본인의 상황에 맞게 선택하실 수 있습니다.<br />
                            - <strong>'일반채점'</strong>은 문제창에서 바로 문제를 확인하면서 OMR 정답지에 답을 체크하는 방식입니다.<br />
                            - <strong>'빠른채점'</strong>은 시험지를 다운받아 문제를 풀어본 후, 문항별 선택 번호만 입력하는 방식입니다.<br />
                            - <strong>'직접입력'</strong>은 별도 채점 없이 본인의 점수를 직접 입력하는 방식입니다.<br />
                        </li>
                        <li>▶ 채점 후 '지금 성적을 반영합니다' 버튼을 반드시 눌러야 전형정보 관리에 성적이 반영됩니다.</li>
                        <li>▶ 기본정보는 사전예약 기간에만(~4/26) 수정이 가능하며, 본 서비스 오픈 후에는(4/27~) 수정이 불가합니다. </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="sub_warp">
            <div class="sub3_1">
                <h2>기본정보 입력 </h2>                    
                <div>
                    <table class="boardTypeB">
                        <col width="20%"/>
                        <col width="" />
                        <tr>
                            <th>직렬(지역) 구분</th>
                            <td class="tx-left">
                                <select name="">
                                    <option value="">응시직렬</option>
                                    <option value="">일반경채</option>
                                    <option value="">전의경경채</option>
                                    <option value="">101단</option>
                                </select>                         
                                <select name="">
                                    <option value="">지역구분</option>
                                    <option value="">서울</option>
                                    <option value="">부산</option>
                                    <option value="">인천</option>
                                </select>
                                <span class="txtRed">※ 응시직렬은 최초 선택/저장 후 수정 불가</span>
                            </td>
                        </tr>
                        <tr id="sel_subject">
                            <th>응시과목</th>
                            <td class="tx-left" id="sel_sbj_info">                                
                                직렬(지역)구분을 선택해주세요.
                                <div><strong>공통과목 : </strong> 한국사 / 영어</div>                               
                                <ul>
                                    <li><strong>선택과목(3과목) : </strong></li>    
                                    <li><input type="checkbox" name=""  id="E1" value=""/><label for="E1">한국사</label></li>
                                    <li><input type="checkbox" name=""  id="E2" value=""/><label for="E2">영어</label></li>
                                    <li><input type="checkbox" name=""  id="E3" value=""/><label for="E3">경찰학개론</label></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>가산점 여부 </th>
                            <td class="tx-left">
                                <input type="radio" name="gasan" id="gasan1" value="A"><label for="gasan1">5점</label>
                                <input type="radio" name="gasan" id="gasan2" value="B"><label for="gasan2">4점</label>
                                <input type="radio" name="gasan" id="gasan3" value="C"><label for="gasan3">3점</label>
                                <input type="radio" name="gasan" id="gasan4" value="D"><label for="gasan4">2점</label>
                                <input type="radio" name="gasan" id="gasan5" value="E"><label for="gasan5">1점</label>
                                <input type="radio" name="gasan" id="gasan6" value="F"><label for="gasan6">없음</label>
                            </td>
                        </tr>
                        <tr>
                            <th>응시번호</th>
                            <td class="tx-left">
                                 <input type="text" name="textfield" id="textfield">
                            </td>
                        </tr>
                        <tr>
                            <th>신광은 경찰팀 수강</th>
                            <td class="tx-left">
                                <input type="radio" name="study_type" id="ST1" value="A"><label for="ST1">온라인강의</label>
                                <input type="radio" name="study_type" id="ST2" value="B"><label for="ST2">학원강의</label>
                                <input type="radio" name="study_type" id="ST3" value="C"><label for="ST3">온라인+학원강의</label>
                                <input type="radio" name="study_type" id="ST4" value="D"><label for="ST4">미수강</label>                               
                            </td>
                        </tr>
                        <tr>
                            <th>시험준비기간</th>
                            <td class="tx-left">
                                <input type="radio" name="exam_junbi" id="exam1" value="A"><label for="exam1">6개월 이하</label>
                                <input type="radio" name="exam_junbi" id="exam2" value="B"><label for="exam2">1년 이하</label>
                                <input type="radio" name="exam_junbi" id="exam3" value="C"><label for="exam3">2년 이하</label>
                                <input type="radio" name="exam_junbi" id="exam4" value="D"><label for="exam4">2년 이상</label>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="btns">
                    <a href="javascript:fn_submit()">저장 </a>
                </div>
            </div>
            
            <div class="sub3_1">
                <h2>성적 입력/확인</h2> 

                <div class="sub3_1_txt">
                    <div>
                        <p>
                            {{--4월 27일 11시40분까지--}}
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1211_txt1.png" alt="시험 종료 후 1~2시간 내에 오픈될 예정입니다."></p>
                            
                            {{--4월 27일 11시40분이후
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1211_txt2.png" alt="먼저 기본정보를 입력 및 저장 해 주세요">
                            --}}
                        </p>                   
                    </div>
                </div>                

                <ul class="tabSt1">
                    <li><a href="#tab1" class="active">일반채점</a></li>
                    <li><a href="#tab2">빠른채점 <img src="https://static.willbes.net/public/images/promotion/2019/04/1211_iconHot.gif" alt="추천"/></a></li>
                    <li><a href="#tab3">직접입력</a></li>
                </ul>

                <div id="tab1">
                    <div class="mt10 mb10">
                        '일반채점'은 문제창에서 바로 문제를 확인하면서 OMR 정답지에 답을 체크하는 방식입니다.<br />
                        * 아크로뱃 리더 프로그램 설치 필요 <a href="https://get.adobe.com/reader/?loc=kr" target="_blank">[설치하기]</a>
                    </div>
                    <table class="boardTypeB">
                        <col width="25%" />
                        <col width="25%" />
                        <col width="25%" />
                        <col width="25%" />
                        <tr>
                            <th scope="col">과목</th>
                            <th scope="col">채점</th>
                            <th scope="col">원점수</th>
                            <th scope="col">조정점수</th>
                        </tr>
                        <tr>
                            <td>영어</td>
                            <td rowspan="5"><a href="#" class="type1">채점하기 ▶</a></td>
                            <td>미입력</td>
                            <td>미입력</td>
                        </tr>
                        <tr>
                            <td>한국사</td>
                            <td>미입력</td>
                            <td>미입력</td>
                        </tr>
                        <tr>
                            <td>선택과목1</td>
                            <td>미입력</td>
                            <td>미입력</td>
                        </tr>
                        <tr>
                            <td>선택과목2</td>
                            <td>미입력</td>
                            <td>미입력</td>
                        </tr>
                        <tr>
                            <td>선택과목3</td>
                            <td>미입력</td>
                            <td>미입력</td>
                        </tr>
                    </table>                    
                    <div class="btns">
                        <a href="#none">지금 성적을 반영합니다. &gt;</a>
                    </div>

                    {{--성적확인--}}
                    <table class="boardTypeB">
                        <col width="25%" />
                        <col width="25%" />
                        <col width="25%" />
                        <col width="25%" />
                        <tr>
                            <th scope="col">과목</th>
                            <th scope="col">성적확인</th>
                            <th scope="col">원점수</th>
                            <th scope="col">조정점수</th>
                        </tr>
                        <tr>
                            <td>영어</td>
                            <td><a href="#none" class="type1">확인 &gt;</a></td>
                            <td>80점</td>
                            <td>101점</td>
                        </tr>
                        <tr>
                            <td>한국사</td>
                            <td><a href="#none" class="type1">확인 &gt;</a></td>
                            <td>80점</td>
                            <td>101점</td>
                        </tr>
                        <tr>
                            <td>선택과목1</td>
                            <td><a href="#none" class="type1">확인 &gt;</a></td>
                            <td>미입력</td>
                            <td>101점</td>
                        </tr>
                        <tr>
                            <td>선택과목2</td>
                            <td><a href="#none" class="type1">확인 &gt;</a></td>
                            <td>미입력</td>
                            <td>미입력</td>
                        </tr>
                        <tr>
                            <td>선택과목3</td>
                            <td><a href="#none" class="type1">확인 &gt;</a></td>
                            <td>미입력</td>
                            <td>미입력</td>
                        </tr>
                    </table>                    
                    <div class="btns">
                        <a href="#none">나의 합격예측 바로가기 &gt;</a>
                        <a href="#none" class="btn2">재 채첨하기 &gt;</a>
                    </div>
                </div>

                <div id="tab2">
                    <div class="mt10 mb10">'빠른채점'은 시험지를 다운받아 문제를 풀어본 후, 문항별 선택 번호만 입력하는 방식입니다.</div>
                    <table class="boardTypeB">
                        <col width="25%" />
                        <col width="25%" />
                        <col width="25%" />
                        <col width="25%" />
                        <tr>
                            <th scope="col">과목</th>
                            <th scope="col">채점</th>
                            <th scope="col">원점수</th>
                            <th scope="col">조정점수</th>
                        </tr>
                        <tr>
                            <td>영어</td>
                            <td rowspan="5"><a href="#" class="type1">채점하기 &gt;</a></td>
                            <td>미입력</td>
                            <td>미입력</td>
                        </tr>
                        <tr>
                            <td>한국사</td>
                            <td>미입력</td>
                            <td>미입력</td>
                        </tr>
                        <tr>
                            <td>선택과목1</td>
                            <td>미입력</td>
                            <td>미입력</td>
                        </tr>
                        <tr>
                            <td>선택과목2</td>
                            <td>미입력</td>
                            <td>미입력</td>
                        </tr>
                        <tr>
                            <td>선택과목3</td>
                            <td>미입력</td>
                            <td>미입력</td>
                        </tr>
                    </table>
                    
                    <div class="btns">
                        <a href="#">지금 성적을 반영합니다. &gt;</a>
                    </div>
                </div>

                <div id="tab3">
                    <table class="boardTypeB">
                        <col width="25%" />
                        <col width="25%" />
                        <col width="25%" />
                        <col width="25%" />
                        <tr>
                            <th scope="col">과목</th>
                            <th scope="col">채점</th>
                            <th scope="col">원점수</th>
                            <th scope="col">조정점수</th>
                        </tr>
                        <tr>
                            <td>영어</td>
                            <td rowspan="5"><a href="#" class="type1">채점하기 &gt;</a></td>
                            <td>미입력</td>
                            <td>미입력</td>
                        </tr>
                        <tr>
                            <td>한국사</td>
                            <td>미입력</td>
                            <td>미입력</td>
                        </tr>
                        <tr>
                            <td>선택과목1</td>
                            <td>미입력</td>
                            <td>미입력</td>
                        </tr>
                        <tr>
                            <td>선택과목2</td>
                            <td>미입력</td>
                            <td>미입력</td>
                        </tr>
                        <tr>
                            <td>선택과목3</td>
                            <td>미입력</td>
                            <td>미입력</td>
                        </tr>
                    </table>
                    
                    <div class="btns">
                        <a href="#">지금 성적을 반영합니다. &gt;</a>
                    </div>
                </div>

            </div> 
        </div>
        
    </div>
    <!--evtCtnsBox//-->
    
</div>
<!-- End Container -->
<script>
    $(document).ready(function(){
        $('ul.tabSt1').each(function(){
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