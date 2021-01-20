@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
 
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/01/2038_top_bg.jpg) repeat-y center top;}
        .evt01 {background:#4346df}
        .evt02 {background:#383840}
        .evt03 {background:#e6e6e6}

        .evt04 {background:#ffd66a; padding-bottom:100px}
        .evt04 .evt04top {position:relative; width:1120px; margin:0 auto}
        .evt04 .evt04top a {position: absolute; width: 28.39%; height: 14%; top: 58.25%; z-index: 2;}
        .evt04 .evt04top a.link01 {left: 6.25%;}
        .evt04 .evt04top a.link02 {left: 35.45%;}
        .evt04 .evt04top a.link03 {left: 64.82%;}
        .evt04 > div {width:1045px; margin:0 auto}
        .evt04 ul {margin-right:-10px;}
        .evt04 li {display:inline; float:left; width:50%; margin-bottom:10px}
        .evt04 li a {margin-right:10px}
        .evt04 ul:after {content:''; display:block; clear:both}
        .evt05 {width:1120px; margin:0 auto; padding:100px 0}
        .evt05 table{width:100%;border-top:1px solid #c1c1c1}
        .evt05 table tr{border-bottom:1px solid #c1c1c1}
        .evt05 table th {color:#fff; background:#49569e; font-size:16px; font-weight:300; padding:15px 0; text-align:center;}
        .evt05 table td{padding:0 10px; font-size:14px; color:#000; text-align:left; padding:10px}
        .evt05 table td input[type=file] {width:300px}
        .evt05 table td a.delbtn {display:block; border-radius: 5px; background-color:#49569e; color:#fff; text-align:center; padding:5px; width:50px; margin:10px auto 0}
        .evt05 .btns {margin-top:50px}
        .evt05 .btns a {display:inline-block; padding:10px 20px; color:#fff; background:#4c49de; font-size:20px; border:1px solid #4c49de; margin-right:10px}
        .evt05 .btns a:last-child {background:#fff; color:#4c49de; margin:0}
        .evt05 .list td {text-align:center; color:#666}
        .evt05 .list td img {width:250px}
        .evt05 .list td:nth-child(3) {text-align:left}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2038_top.jpg" alt="윌비스 임용 유튜브 이벤트"/>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2038_01.jpg" alt="구독, 좋아요, 알림설정"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2038_02.jpg" alt="이벤트 상품"/>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2038_03.jpg" alt="참여방법"/>
        </div>

        <div class="evtCtnsBox evt04">
            <div class="evt04top">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04.jpg" alt=""/>
                <a href="https://www.youtube.com/channel/UCzF3YAxdQmtZcUqsEUFLRMQ" title="유튜브" target="_blank" class="link01"></a>
                <a href="https://tv.naver.com/wbssam" title="네이버TV" target="_blank" class="link02"></a>
                <a href="https://tv.kakao.com/channel/2687619/video" title="카카오TV" target="_blank" class="link03"></a>
            </div>
            <div>
                <ul>
                    <li><a href="https://youtu.be/sLuznU9Rmd0" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_01.jpg" alt="교육학 이인재"/></a></li>
                    <li><a href="https://youtu.be/Afj5ci5H2xg" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_02.jpg" alt="교육학 홍의일"/></a></li>
                    <li><a href=https://youtu.be/Y2W3lUrn3aI?t=1" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_03.jpg" alt="유아 민정선"/></a></li>
                    <li><a href="https://youtu.be/1Tof3jVF__E" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_04.jpg" alt="초등 배재민"/></a></li>
                    <li><a href="https://youtu.be/nmqJSQbE0v4" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_05.jpg" alt="전공국어 송원영"/></a></li>
                    <li><a href="https://youtu.be/9XNWbFy2PWk" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_06.jpg" alt="도덕윤리 김병찬"/></a></li>
                    <li><a href="https://youtu.be/1arYo1DapLU" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_07.jpg" alt="전공영어 김유석"/></a></li>
                    <li><a href="https://youtu.be/eG64tzalqvg" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_08.jpg" alt="영어학 김영문"/></a></li>
                    <li><a href="https://youtu.be/2ElZCe1dnCw" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_09.jpg" alt="진공수학 김철홍"/></a></li>
                    <li><a href="https://youtu.be/ZinD4SnjwYg" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_10.jpg" alt="수학교육론 박태영"/></a></li>
                    <li><a href="https://youtu.be/hPXBthC1xmU" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_11.jpg" alt="전공생물 강치욱"/></a></li>
                    <li><a href="https://youtu.be/FBCYeuT0OmA" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_12.jpg" alt="생물교육론 양혜정"/></a></li>
                    <li><a href="https://youtu.be/9zke9kFEhNw" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_13.jpg" alt="전공음악 다이애나"/></a></li>
                    <li><a href="https://youtu.be/mZDUnozVMB8" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_14.jpg" alt="전전통 최우영"/></a></li>
                    <li><a href="https://youtu.be/LMdBFMmmfUE" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_15.jpg" alt="정보컴퓨터 송광진"/></a></li>
                    <li><a href="https://youtu.be/GO1B5Hicnbw" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_16.jpg" alt="정컴교육론 장순선"/></a></li>
                    <li><a href="https://youtu.be/Jed0DiKyYhw" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_17.jpg" alt="전공역사 최용림"/></a></li>
                    <li><a href="https://youtu.be/JQ4KMa11Q-o" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_18.jpg" alt="전공중국어 정경미"/></a></li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt05">
            <div>
                <table>
                    <col width="15%">
                    <col width="35%">
                    <col width="15%">
                    <col width="*">
                    <tbody>
                        <tr>
                            <th>과목선택</th>
                            <td>
                            <select name="select1" id="select1">
                                <option>선택</option>
                                <option>초등</option>
                                <option>국어</option>
                                <option>영어</option>
                            </select>
                            </td>
                            <th>* 윌비스 ID</th>
                            <td>willbes</td>
                        </tr>
                        <tr>
                            <th>* 캡쳐 이미지 첨부</th>
                            <td colspan="3">
                                <input type="file" name="fileField" id="fileField" />
                                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2021/01/2034_btn_del.png" alt="삭제"></a> 
                            </td>
                        </tr>
                    </tbody>
                </table>                
            </div>
            <div class="btns">
                <a href="#none">확인</a>
                <a href="#none">취소</a>
            </div>
            <div class="mt100 list">
                <table>
                    <col width="10%">
                    <col width="15%">
                    <col>
                    <col width="15%">
                    <col width="10%">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">과목</th>
                        <th scope="col">캡쳐이미지</th>
                        <th scope="col">아이디</th>
                        <th scope="col">등록일</th>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>영어</td>
                        <td><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_sample.jpg" alt=""/></td>
                        <td>
                            will****
                            <a href="#none" class="delbtn">삭제</a>
                        </td>
                        <td>2021.01.18</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>국어</td>
                        <td><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_sample.jpg" alt=""/></td>
                        <td>will****</td>
                        <td>2021.01.18</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>수학</td>
                        <td><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_sample.jpg" alt=""/></td>
                        <td>will****</td>
                        <td>2021.01.18</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>중국어</td>
                        <td><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_sample.jpg" alt=""/></td>
                        <td>will****</td>
                        <td>2021.01.18</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>영어</td>
                        <td><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_sample.jpg" alt=""/></td>
                        <td>will****</td>
                        <td>2021.01.18</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>국어</td>
                        <td><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_sample.jpg" alt=""/></td>
                        <td>will****</td>
                        <td>2021.01.18</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>수학</td>
                        <td><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_sample.jpg" alt=""/></td>
                        <td>will****</td>
                        <td>2021.01.18</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>중국어</td>
                        <td><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_sample.jpg" alt=""/></td>
                        <td>will****</td>
                        <td>2021.01.18</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>수학</td>
                        <td><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_sample.jpg" alt=""/></td>
                        <td>will****</td>
                        <td>2021.01.18</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>중국어</td>
                        <td><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_sample.jpg" alt=""/></td>
                        <td>will****</td>
                        <td>2021.01.18</td>
                    </tr>
                </table>
            </div>
            <div class="Paging">
                <ul>
                    <li class="Prev"><a href="#none"><img src="/public/img/willbes/paging/paging_prev.png"> </a></li>
                    <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                    <li><a href="#none">2</a><span class="row-line">|</span></li>
                    <li><a href="#none">3</a><span class="row-line">|</span></li>
                    <li><a href="#none">4</a><span class="row-line">|</span></li>
                    <li><a href="#none">5</a><span class="row-line">|</span></li>
                    <li><a href="#none">6</a><span class="row-line">|</span></li>
                    <li><a href="#none">7</a><span class="row-line">|</span></li>
                    <li><a href="#none">8</a><span class="row-line">|</span></li>
                    <li><a href="#none">9</a><span class="row-line">|</span></li>
                    <li><a href="#none">10</a></li>
                    <li class="Next"><a href="#none"><img src="/public/img/willbes/paging/paging_next.png"> </a></li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">유의사항</h4>
                <ul>
                    <li>한 개의 인증 게시물로 추첨 선물 증정 대상으로 선정된 경우, 전원 증정 선물과 중복 증정은 되지 않습니다.</li>
                    <li>여러 개의 게시물을 업로드 했을 경우, 추첨과 전원 증정 각각 하나씩 증정은 가능하나, 같은 상품의 중복 증정은 되지 않습니다.</li>
                    <li>같은 이미지를 중복해서 올리는 것은 인정되지 않습니다. (각기 다른 영상에 ‘좋아요’ 인증만 인정)</li>
                    <li>이벤트 당첨 대상자는 2월 22일(월) 17시에 발표할 예정입니다.</li>
                    <li>상품은 모바일 기프티콘으로 2월 24일(수)에 일괄 발송될 예정입니다.</li>
                    <li>이벤트 참여는 유튜브 채널 구독 중인 경우만 가능합니다.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Container -->
@stop