@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            margin-top:20px !important;
            margin:0 auto;
            line-height:1.5;
            padding:0 !important;
            background:#e4e4e4;
        }
        .evtContent span {vertical-align:auto}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            z-index:1;
        }

        .evtTop {position:relative; text-align:center; background:url(https://static.willbes.net/public/images/promotion/supporters/2021_cop_management_top_bg.jpg) no-repeat center top;}

        .notice {position:absolute; left:50%; top:1050px; margin-left:-315px; z-index:1; width:630px; background:#fff; 
            box-shadow: 10px 19px 19px rgba(0,0,0,.2);
        }
        .notice .title {float:left; background:#d12c10; width:170px; height:126px; line-height:126px}
        .notice .list {float:left; width:460px; margin:20px 0}
        .notice .list li {margin-left:40px; list-style:disc; line-height:1.8; text-align:left; padding-right:20px}
        .notice .list li a {float:left; display:block; width:80%; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;}
        .notice .list li span {float:right}
        .notice:after {content:""; display:block; clear:both}

        .evt01 {width:1120px; margin:0 auto; padding:150px 0;}
            .tab li {display:inline; float:left; width:25%}
            .tab li a {display:block; text-align:center; height:130px; color:#a6a6a6; font-size:22px; border-right:1px solid #a6a6a6; background:#727272;
            border-radius:30px 30px 0 0; margin-top:20px}
            .tab li a.active {background:#000; color:#fff; margin-top:0; font-size:26px}
            .tab li:last-child a {border-right:0}
            .tab li a span {display:block; padding-top:25px;}
            .tab:after {content:""; display:block; clear:both}

        .evtCtsBox {position:relative; height:100%}
        .evtCts {width:100%; padding:100px; border-radius:30px; background:#fff; margin-top:-50px}
        
        .evtCts h4 {font-size:18px; font-weight:bold; margin-left:15px; margin:0 0 20px}     
        .evtCts h5 {font-size:16px; font-weight:bold; margin-top:30px}  
        .evtCts .row-line {
            background: #ccc;  
            margin:0 10px;  
            height:14px;
            width:1px;
            vertical-align:bottom;
        }
        .evtCts .subBtn a {background:#a32015; border:0}

        .evtCts .f_left {width:50%;}        
        .evtCts .calendar div.thisMonth {font-size:25px; text-align:center; margin:0; padding-bottom:20px; color:#d12c10}
        .evtCts .calendar th,
        .evtCts .calendar td {padding:10px; text-align:center}
        .evtCts .calendar thead tr {border-bottom:1px solid #f0f0f0; border-top:1px solid #f0f0f0}
        .evtCts .calendar td span {width:30px; height:30px; line-height:30px; display:block; margin:0 auto}
        .evtCts .calendar td span.attend {border-radius:20px; color:#fff; background:#d12c10;}
        .evtCts .btnAttend {clear:both; padding-top:30px}
        .evtCts .btnAttend a {display:block; color:#fff; background:#d12c10; font-size:20px; border-radius:40px; text-align:center; padding:15px 0}
        .evtCts .btnAttend a:hover {background:#000}

        .tableTypeA {border-top:1px solid #959595}
        .tableTypeA th {background:#f9f9f9; color:#707070; padding:15px 10px; font-weight:bold;}
        .tableTypeA th,
        .tableTypeA td {border-bottom:1px solid #edeeef; text-align:center}
        .tableTypeA td {padding:20px 10px; color:#707070}
        .tableTypeA td .info {margin-top:5px}
        .tableTypeA td .info li {display:inline; border-right:1px solid #edeeef; padding:0 10px; color:#333}
        .tableTypeA td .info li:first-child {padding-left:0}
        .tableTypeA td .info li:last-child {border:0}
        .tableTypeA td .info li span.workBox {
            display: inline-block;
            width: 60px;
            height: 22px;
            font-size: 12px;
            font-weight: 300;
            line-height: 22px;
            text-align: center;
            background: #fff;
        }
        .tableTypeA td .info li span.workBox1 {background:#ed1c24; color:#fff}
        .tableTypeA td .info li span.workBox2 {background:#003e7d; color:#fff}
        .tableTypeA td .info li span.workBox3 {color:#ed1c24; border:1px solid #ed1c24}
        .tableTypeA td .info li span.workBox4 {color:#003e7d; border:1px solid #003e7d}
        .tableTypeA td input[type="text"] {
            width: 100%;
            height: 25px;
            border: 1px solid #d4d4d4;
        }
        .tableTypeA td textarea {
            width: 100%;
            height: 230px;
            border: 1px solid #d4d4d4;
            resize: none;
            vertical-align: middle;
            padding: 10px;
            line-height:1.5;
        }

        /*********팝업***********/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: 640px;
            border: 1px solid #000;            
            background: #fff;
            font-size:13px;
            line-height:1.5;
            box-shadow:0 10px 10px rgba(0,0,0,0.2);
            padding-bottom:20px;
        }
        .b-close {
            position: absolute;
            right: 5px;
            top: 5px;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
            color:#fff;
            font-size:14px;
        }    
        
        .Pstyle h3 {height:60px; line-height:60px; padding-left:20px; color:#fff; background:#225fba; font-size:20px}
        .Pstyle .content {height:540px; width:auto; padding:20px; overflow-y: scroll; }
        .Pstyle .content table {border-top:2px solid #333}
        .Pstyle .content th,
        .Pstyle .content td {padding:10px; text-align:center; border-bottom:1px solid #e4e4e4;}
        .Pstyle .content th {background:#f2f2f2}
        .Pstyle .content th span {float:right}
        .Pstyle .content td:nth-child(2) {text-align:left;}
        /*.Pstyle .content tr:hover {background:#e9f1fe}*/
        .Pstyle .content td a {display:block}
        .Pstyle .content td .boradImg {margin:10px 0}
        .Pstyle .content td.tx-left img {max-width:560px}
        .Pstyle .content table strong {background:#424ac7; color:#fff; margin-right:10px; font-size:11px; padding:2px 4px}
        .Pstyle .content table strong.st02 {background:#f57d20;}

        .Pstyle .content .userView {padding-left:100px; position:relative; padding-bottom:20px}
        .Pstyle .content .userView .userImg {width:80px; position:absolute; top:0; left:0; z-index:1}
        .Pstyle .content .userImg .mask {width:100%; height:80px; background:url(https://static.willbes.net/public/images/promotion/supporters/supporters_tab04_mask.png) no-repeat center top; position:absolute; top:0; left:0; z-index:2}
        .Pstyle .content .userImg img {width:80px; height:80px; margin:0 auto}
        .Pstyle .content .userView p {margin-bottom:10px}
        .Pstyle .content .userView strong {color:#424ac7}        
        .Pstyle .content .userView:after {content:""; display:block; clear:both}
        .Pstyle .content textarea {
            height: 150px;
        }       

        .btnsSt3 {text-align:center; margin-top:20px}
        .btnsSt3 a {display:inline-block; padding:8px 16px; background:#333; color:#fff; font-weight:bold; border:1px solid #333}
        .btnsSt3 a:hover {background:#fff; color:#333}        
    </style>

<div class="p_re evtContent NGR" id="evtContainer">
    <form name="form" id="form">
        <div class="evtTop">
            <img src="https://static.willbes.net/public/images/promotion/supporters/2021_cop_management_top.jpg" title="온라인관리반 체험단">
            <div class="notice">
                <div class="title">
                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/supporters/supporters_top_img01.png" title="공지사항 더보기"></a>
                </div>
                <ul class="list">
                    <li><a href="javascript:go_popup()">12월 이달의 서포터즈 및 최우수&우수 서포터즈 소개 서포터즈 소개</a><span>2019-06-05</span></li>
                    <li><a href="javascript:go_popup()">12월 이달의 서포터즈 및 최우수&우수 서포터즈 소개</a><span>2019-06-05</span></li>
                    <li><a href="javascript:go_popup()">12월 이달의 서포터즈 및 최우수&우수 서포터즈 소개</a><span>2019-06-05</span></li>
                    <li><a href="javascript:go_popup()">12월 이달의 서포터즈 및 최우수&우수 서포터즈 소개</a><span>2019-06-05</span></li>
                </ul>
            </div>                       
        </div>

        {{--공지사항 레이어팝업--}}
        <div id="popup" class="Pstyle NGR">
            <span class="b-close"><img src="{{ img_url('sub/close.png') }}"></span>
            <h3 class="NSK-Black">공지사항</h3> 
            <div class="content">                               
                {{--리스트--}}    
                <table>
                    <col widht="10%"/>
                    <col widht=""/>
                    <col widht="20%"/>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>제목</th>
                            <th>등록일</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>9</td>
                            <td><a href="#none">조정점수 5차 업데이트</a></td>
                            <td>2018-12-27</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="tx-left">                            
                                복수정답 처리, 재채점 및 추가 채점자 합산 반영된 조정점수가 5차 업데이트 되었습니다.
                                합격예측 풀서비스는 12/28(금) 오후 2시까지 채점 입력, 수정이 가능합니다.
                                합격예측 풀서비스는 필기합격 발표에 따라 최종합격 예측 서비스로 이어질 예정입니다.
                                <div class="boradImg"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_liveimg01.jpg" title="방송전"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td><a href="#none">조정점수및 예상 합격선 4차 업데이트</a></td>
                            <td>2018-12-26</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td><a href="#none">조정점수및 예상 합격선 3차 업데이트</a></td>
                            <td>2018-12-24</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td><a href="#none">조정점수및 예상 합격선 업데이트 안내</a></td>
                            <td>2018-12-22</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><a href="#none">조정점수 및 예상 합격선 1차 업데이트</a></td>
                            <td>2018-12-22</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><a href="#none">채점시 오류 발생할 경우.</a></td>
                            <td>2018-12-22</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><a href="#none">018년 3차 합격예측 풀서비스 오픈!</a></td>
                            <td>2018-12-22</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><a href="#none">2018년 3차 합격예측 풀서비스 coming soon!</a></td>
                            <td>2018-12-21</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><a href="#none">2018 경찰 3차 합격을 기원합니다!</a></td>
                            <td>2018-12-21</td>
                        </tr>
                    </tbody>
                </table>
                <div class="Paging">
                    <ul>
                        <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
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
                        <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="evt01">
            <ul class="tab NSK-Black">
                <li><a href="#tab01"><span>체험단 소개<span></a></li>
                <li><a href="#tab02"><span>출석체크<span></a></li>
                <li><a href="#tab03"><span>과제수행<span></a></li>
                <li><a href="#tab04"><span>제안 및 의견<span></a></li>
            </ul> 
            <div class="evtCtsBox">
                <div id="tab01" class="evtCts tx-center">
                    <img src="https://static.willbes.net/public/images/promotion/supporters/2021_cop_management_tab01.jpg" title="온라인관리반 체험단">
                </div>

                <div id="tab02" class="evtCts">
                    <h4>● 온라인 관리반 출첵 합시다!</h4>                    
                    <div class="f_left">
                        온라인 관리반 여러분들의 출첵공간입니다.<br>
                        하루하루!  모두함께~~!!<br>
                        출첵을 해주시기 바랍니다.<br>
                        <span class="tx-red">※ 정당한 사유없이 3일 이상 출첵 없을시 관리반 혜택을 제한합니다.</span>
                    </div>
                    <div class="f_left calendar">
                        <div class="thisMonth NSK-Black">1월</div>
                        <table>
                            <col span="7" />
                            <thead>
                                <tr>
                                    <td>일</td>
                                    <td>월</td>
                                    <td>화</td>
                                    <td>수</td>
                                    <td>목</td>
                                    <td>금</td>
                                    <td>토</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span></span></td>
                                    <td><span></span></td>
                                    <td><span></span></td>
                                    <td><span></span></td>
                                    <td><span></span></td>
                                    <td><span>1</span></td>
                                    <td><span>2</span></td>
                                </tr>
                                <tr>
                                    <td><span>3</span></td>
                                    <td><span class="attend">4</span></td>
                                    <td><span>5</span></td>
                                    <td><span>6</span></td>
                                    <td><span>7</span></td>
                                    <td><span>8</span></td>
                                    <td><span>9</span></td>
                                </tr>
                                <tr>
                                    <td><span>10</span></td>
                                    <td><span>11</span></td>
                                    <td><span>12</span></td>
                                    <td><span>13</span></td>
                                    <td><span>14</span></td>
                                    <td><span>15</span></td>
                                    <td><span>16</span></td>
                                </tr>
                                <tr>
                                    <td><span>17</span></td>
                                    <td><span>18</span></td>
                                    <td><span>19</span></td>
                                    <td><span>20</span></td>
                                    <td><span>21</span></td>
                                    <td><span>22</span></td>
                                    <td><span>23</span></td>
                                </tr>
                                <tr>
                                    <td><span>24</span></td>
                                    <td><span>25</span></td>
                                    <td><span>26</span></td>
                                    <td><span>27</span></td>
                                    <td><span>28</span></td>
                                    <td><span>29</span></td>
                                    <td><span>30</span></td>
                                </tr>
                                <tr>
                                    <td><span>31</span></td>
                                    <td><span></span></td>
                                    <td><span></span></td>
                                    <td><span></span></td>
                                    <td><span></span></td>
                                    <td><span></span></td>
                                    <td><span></span></td>
                                </tr>
                            </tbody>
                        </table>                       
                    </div>   
                    <div class="btnAttend"><a href="#none">출석체크하기</a></div>                 


                    {{--리스트
                    <div class="mt30">
                        <div class="f_right mb10">
                            <div class="subBtn NSK f_right"><a href="#none">글쓰기</a></div>
                        </div>
                        <table class="tableTypeA">
                            <col width="8%"/>
                            <col width=""/>
                            <col width="12%"/>
                            <col width="10%"/>
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>제목</th>
                                    <th>작성일</th>
                                    <th>조회수</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>4</td>
                                    <td class="tx-left">
                                        <a href="#none">    
                                            오늘도 출첵!! 열심히~
                                        </a>    
                                    </td>
                                    <td>2019-05-10</td>
                                    <td>7542</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="tx-left">
                                        <a href="#none">
                                            오늘도 출첵!! 열심히~
                                        </a>
                                    </td>
                                    <td>2019-05-10</td>
                                    <td>2112</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="tx-left">
                                        <a href="#none">
                                            오늘도 출첵!! 열심히~
                                        </a>
                                    </td>
                                    <td>2019-05-10</td>
                                    <td>150</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td class="tx-left">
                                        <a href="#none">
                                            오늘도 출첵!! 열심히~
                                        </a>
                                    </td>
                                    <td>2019-05-10</td>
                                    <td>125</td>
                                </tr>                        
                            </tbody>
                        </table>

                        <div class="Paging">
                            <ul>
                                <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
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
                                <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                            </ul>
                        </div>
                    </div>--}}

                    {{--글쓰기
                    <div class="mt30">
                        <table class="tableTypeA">
                            <col width="15%"/>
                            <col width=""/>
                            <tbody>
                                <tr>
                                    <th>제목<span class="tx-light-blue">(*)</span></th>
                                    <td class="tx-left">
                                        <input type="text" id="TITLE" name="TITLE" class="iptTitle" maxlength="30">
                                    </td>
                                </tr>
                                <tr>
                                    <th>내용<span class="tx-light-blue">(*)</span></th>
                                    <td class="tx-left">
                                        <textarea></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="search-Btn mt20 h36 p_re">
                        <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                            <span class="tx-purple-gray">취소</span>
                        </button>
                        <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                            <span>저장</span>
                        </button>
                    </div>
                    --}}

                    {{--글보기
                    <div class="mt30">
                        <table class="tableTypeA">
                            <col width="15%"/>
                            <col width=""/>
                            <tbody>
                                <tr>
                                    <th class="tx-left">서포터즈를 마치며</th>
                                </tr>
                                <tr>
                                    <th class="tx-right normal">홍길동 <span class="ml10 mr10">|</span> 2018-00-00</th>
                                </tr>
                                <tr>
                                    <td class="tx-left">
                                        이제 서포터즈 활동을 마무리하게 되었습니다. 
                                        마지막으로 끝나기 전에 전에도 말씀드렸던 것을 한 번만 더 강조하고 싶어서 글 남깁니다.
                                        Sns로 들어가는 아이콘의 크기를 키워주시고 그 반대편에 각자 교수님들의 사진 아이콘을 만들어 그 아이콘을 클릭하면 각 교수님들이 관리하시는 사이트로 들어갈 수 있게 링크를 만들어주셨으면 합니다.
                                        윌비스 신광은 경찰 온라인과 수강생들에게 정말 크나큰 도움이 될 것이라 믿어 의심치 않습니다.
                                        그동안 수고하셨습니다!
                                    </td>
                                </tr>                        
                            </tbody>
                        </table>                
                    </div>
                    <div class="search-Btn mt20 h36 p_re">
                        <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                            <a href="#none" class="tx-purple-gray">삭제</a>
                        </div>
                        <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray center">
                            <a href="#none" class="tx-purple-gray">수정</a>
                        </div>
                        <div class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right">
                            <a href="#none">목록</a>
                        </div>
                    </div>
                    --}}
                </div>

                <div id="tab03" class="evtCts">
                    <h4>● 체험단 미션! 과제를 수행하라</h4>
                    <div>
                        여러분들의 주간 스케줄 / 일일 스케줄등 학습 노하우를 올려주세요!<br>
                        체험단이 진행되는 동안 강의 후기 등 학습에 도움되는 모든 것을 커뮤니티 공간에 올려주시면 됩니다.<br>
                        <span class="tx-red">※ 정당한 사유 없이 3회 이상 과제 미제출시 체험단 혜택을 제한합니다.</span>
                    </div>
                    <div class="mt30">
                        <table class="tableTypeA">
                            <col width="8%"/>
                            <col width=""/>
                            <col width="15%"/>
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>과제</th>
                                    <th>과제 제출일</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>4</td>
                                    <td class="tx-left">
                                        채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 채점시 오류 발생할 경우.
                                        <ul class="info">
                                            <li>기간 : 2019-05-07 ~ 2019-05-12</li>
                                            <li><img src="{{ img_url('sub/icon_file.gif') }}" alt="첨부파일"></li>
                                            <li><span class="workBox workBox1"><a href="#none" onclick="openWin('EDITPASS')">과제제출</a></span></li>
                                        </ul>
                                    </td>
                                    <td>2019-05-10</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="tx-left">
                                        채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 채점시 오류 발생할 경우.
                                        <ul class="info">
                                            <li>기간 : 2019-05-07 ~ 2019-05-12</li>
                                            <li><img src="{{ img_url('sub/icon_file.gif') }}" alt="첨부파일"></li>
                                            <li><span class="workBox workBox2"><a href="#none" onclick="openWin('EDITPASS')">과제수정</a></span></li>
                                        </ul>
                                    </td>
                                    <td>2019-05-10</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="tx-left">
                                        채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 채점시 오류 발생할 경우.
                                        <ul class="info">
                                            <li>기간 : 2019-05-07 ~ 2019-05-12</li>
                                            <li><img src="{{ img_url('sub/icon_file.gif') }}" alt="첨부파일"></li>
                                            <li><span class="workBox workBox3"><a href="#none" onclick="markInfoModal('MARKPASS', 'edit2')">제출완료</a></span></li>
                                        </ul>
                                    </td>
                                    <td>2019-05-10</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td class="tx-left">
                                        채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 채점시 오류 발생할 경우.
                                        <ul class="info">
                                            <li>기간 : 2019-05-07 ~ 2019-05-12</li>
                                            <li><img src="{{ img_url('sub/icon_file.gif') }}" alt="첨부파일"></li>
                                            <li><span class="workBox workBox4">미제출</span></li>
                                        </ul>
                                    </td>
                                    <td>2019-05-10</td>
                                </tr>                        
                            </tbody>
                        </table>
                        <div class="Paging">
                            <ul>
                                <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
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
                                <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                            </ul>
                        </div>
                    </div>
                    
                    {{--과제제출--}}
                    <div id="EDITPASS" class="willbes-Layer-Black">
                        <div class="willbes-Layer-PassBox willbes-Layer-PassBox1100 h920 fix abs" style="display: block;">
                            <a class="closeBtn" href="#none" onclick="closeWin('EDITPASS')">
                                <img src="{{ img_url('sub/close.png') }}">
                            </a>
                            <div class="Layer-Tit NG tx-dark-black">과제제출</div>
                            <div class="Layer-Cont">
                                <div class="PASSZONE-Lec-Section">
                                    <div class="LeclistTable editTableList editTableList-overflow">
                                        <div class="Search-Result strong mt10 mb20 tx-gray">· 과제확인</div>
                                        <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray fc-bd-none">
                                            <colgroup>
                                                <col style="width: 115px;">
                                                <col style="width: 585px;">
                                            </colgroup>
                                            <tbody>
                                                <tr>
                                                    <th class="w-tit bg-light-white strong">과제제목</th>
                                                    <td class="w-data tx-left tx-gray pl15">
                                                        제목이 노출됩니다.
                                                        <span class="MoreBtn"><a class="arrow" href="#none"><span class="txt">열기</span> <span class="arrow-Btn">></span></a></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="w-tit bg-light-white strong">과제첨부</th>
                                                    <td class="w-file tx-left pt-zero pb-zero">
                                                        <ul class="up-file">
                                                            <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a></li>
                                                            <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a></li>
                                                            <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일3가 노출됩니다.docx</a></li>
                                                            <!-- 최대 5개까지 노출
                                                            <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일4가 노출됩니다.docx</a></li>
                                                            <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일5가 노출됩니다.docx</a></li>-->
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr class="editCont" style="display: none;">
                                                    <th class="w-tit bg-light-white strong">과제내용</th>
                                                    <td class="w-file tx-left pl15">
                                                        A. 다음 각 문장을 끊어진 대로 해석하시오.<br/><br/>
                                                        1. Everyone's nose is a different shape.// <br/><br/>
                                                        2. Researchers may know why.// <br/><br/>
                                                        3. Researchers say / it could be because of the climate.//<br/><br/>
                                                        4. People with wider noses / live / in warm, humid areas.// <br/><br/>
                                                        5. People with narrower noses / live / in colder, drier places.// <br/><br/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="Search-Result strong mt30 mb20 tx-gray">· 답안작성</div>
                                        <div class="EditWriteTable">
                                            <table cellspacing="0" cellpadding="0" class="listTable upper-gray bdt-gray bdb-gray tx-gray fc-bd-none">
                                                <colgroup>
                                                    <col style="width: 115px;">
                                                    <col style="width: 585px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-tit bg-light-white tx-left strong pl30">답안제목<span class="tx-red">(*)</span></td>
                                                        <td class="w-text tx-left pl10 pr10">
                                                            <input type="text" id="TITLE" name="TITLE" class="iptTitle" maxlength="30">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-tit bg-light-white tx-left strong pl30">답안내용<span class="tx-red">(*)</span></td>
                                                        <td class="w-textarea write tx-left pl10 pr10">
                                                            <textarea></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-tit bg-light-white tx-left strong pl30">답안첨부</td>
                                                        <td class="w-file answer tx-left">
                                                            <ul class="attach">
                                                                <li>
                                                                    <!--div class="filetype">
                                                                        <input type="text" class="file-text" />
                                                                        <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                                                        <span class="file-select"-->
                                                                            <input type="file" class="input-file" size="3">
                                                                        <!--/span>
                                                                        <input class="file-reset NSK" type="button" value="X" />
                                                                    </div-->
                                                                </li>
                                                                <li>
                                                                    <!--div class="filetype">
                                                                        <input type="text" class="file-text" />
                                                                        <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                                                        <span class="file-select"-->
                                                                            <input type="file" class="input-file" size="3">
                                                                        <!--/span>
                                                                        <input class="file-reset NSK" type="button" value="X" />
                                                                    </div-->
                                                                </li>
                                                                <li>
                                                                    • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br/>
                                                                    • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="search-Btn mt20 h36 p_re">
                                            <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-blue bd-dark-blue center">
                                                <span>제출하기</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- willbes-Layer-PassBox : 과제제출 -->
                    </div>

                    {{--과제수정--}}
                    <div id="MARKPASS" class="willbes-Layer-Black">
                        <div class="willbes-Layer-PassBox willbes-Layer-PassBox1100 h920 fix abs" style="display: block;">
                            <a class="closeBtn" href="#none" onclick="closeWin('MARKPASS')">
                                <img src="{{ img_url('sub/close.png') }}">
                            </a>
                            <div class="Layer-Tit NG tx-dark-black">제출 답안 확인</div>
                            <div class="Layer-Cont">
                                <div class="PASSZONE-Lec-Section">
                                    <div class="LeclistTable editTableList mt20">
                                        <table cellspacing="0" cellpadding="0" class="listTable editTable bdt-gray bdb-gray upper-gray fc-bd-none tx-gray">
                                            <colgroup>
                                                <col style="width: 115px;">
                                                <col style="width: 235px;">
                                                <col style="width: 115px;">
                                                <col style="width: 235px;">
                                            </colgroup>
                                            <tbody>
                                                <tr>
                                                    <th class="w-tit bg-light-white strong">과제제목</th>
                                                    <td class="w-data tx-left tx-gray pl15" colspan="3">온라인 독해 첨삭지도1</td>
                                                </tr>
                                                <tr>
                                                    <th class="w-tit bg-light-white strong">첨삭교수</th>
                                                    <td class="w-data tx-left pl15">한덕현</td>
                                                    <th class="w-tit bg-light-white strong">채점완료일</th>
                                                    <td class="w-data tx-left pl15">2018-00-00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="editDetailWrap p_re mt30 mb60">
                                            <ul class="tabWrap tabDepth2">
                                                <li><a id="edit1" href="#ch1">과제보기</a></li>
                                                <li><a id="edit2" href="#ch2">작성답안</a></li>
                                            </ul>
                                            <div class="tabBox mt30">
                                                <div id="ch1" class="tabLink">
                                                    <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray fc-bd-none">
                                                        <colgroup>
                                                            <col style="width: 100%;">
                                                        </colgroup>
                                                        <tbody>
                                                            <tr>
                                                                <td class="w-file tx-left pt-zero pb-zero">
                                                                    <ul class="up-file">
                                                                        <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a></li>
                                                                        <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a></li>
                                                                        <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일3가 노출됩니다.docx</a></li>
                                                                        <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일4가 노출됩니다.docx</a></li>
                                                                        <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일5가 노출됩니다.docx</a></li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-file tx-left pt20 pl30 pr30">
                                                                    A. 다음 각 문장을 끊어진 대로 해석하시오.<br/><br/>
                                                                    1. Everyone's nose is a different shape.// <br/><br/>
                                                                    2. Researchers may know why.// <br/><br/>
                                                                    3. Researchers say / it could be because of the climate.//<br/><br/>
                                                                    4. People with wider noses / live / in warm, humid areas.// <br/><br/>
                                                                    5. People with narrower noses / live / in colder, drier places.// <br/><br/>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div id="ch2" class="tabLink">
                                                    <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray">
                                                        <colgroup>
                                                            <col style="width: 550px;">
                                                            <col style="width: 150px;">
                                                        </colgroup>
                                                        <thead>
                                                            <tr>
                                                                <th class="w-list tx-left pl30"><strong>답안 제목이 노출됩니다.</strong><span class="row-line">|</span></th>
                                                                <th class="w-date normal">2018-00-00 00:00</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="w-file tx-left pt-zero pb-zero" colspan="2">
                                                                    <ul class="up-file">
                                                                        <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a></li>
                                                                        <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a></li>
                                                                        <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일3가 노출됩니다.docx</a></li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-file tx-left pt20 pl30 pr30" colspan="2">
                                                                    A. 다음 각 문장을 끊어진 대로 해석하시오.<br/>
                                                                    1. Riyadh, / the Saudi capital, / offers cheap cost of living / in a more stable environment, / with price controls on staples in Saudi Arabia continuing to guarantee low prices for many goods.//<br/>
                                                                    Riyadh는 / 사우디의 수도인 / 낮은 생계비를 요구한다 / 보다 안정적인 환경에서, / 사우디 아라비아에서 주 요품목 가격 통제를 통해 / 많은 상폼의 낮은 가격 보장을 지속하면서.<br/><br/>

                                                                    2. Saudi Arabia has / enough recoverable oil / to maintain current levels of production for 90 years.<br/>
                                                                    사우디 아라비아는 가지고 있다 / 충분한 원유를 / 90년 간 현재 생산 수준을 유지할.<br/><br/>

                                                                    3. Trends / in oil output and the global oil market / will remain a key determinant of the country's long-term prospects.<br/>
                                                                    석유 생산과 국제 석유 시작의 경향은 / 유지될 것이다 / 국가의 장기적 전망의 핵심 결정 요인으로서.<br/><br/>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div> 

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="tab04" class="evtCts">
                    <h4>● 체험단 열린 건의함! 제안 및 토론</h4>
                    <div>
                        체험단 여러분들의 자유로운 제안, 의견 공유 공간입니다.<br>
                        신광은 경찰학원 및 사이트를 위해 격려와 질책은 물론 번뜩이는 아이디어도 많이 제안해 주세요.<br>
                        사이트 및 강좌 모니터링, 아이디어를 채택하여 포상 혜택 부여 및 해당 의견을 반영할 예정입니다.<br>
                        <span class="tx-red">※ 정당한 사유 없이 3주 이상 제안이 1건도 없을 시 서포터즈 혜택을 제한합니다.</span>
                    </div>
                    {{--리스트--}}
                    <div class="mt30">
                        <div class="f_right mb10">
                            <div class="subBtn blue NSK f_right"><a href="#none">글쓰기</a></div>
                        </div>
                        <table class="tableTypeA">
                            <col width="8%"/>
                            <col width=""/>
                            <col width="8%"/>
                            <col width="12%"/>
                            <col width="10%"/>
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>제목</th>
                                    <th>첨부</th>
                                    <th>작성일</th>
                                    <th>조회수</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>4</td>
                                    <td class="tx-left">
                                        <a href="#none">    
                                            <img src="{{ img_url('prof/icon_locked.gif') }}" /> 
                                            채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 
                                        </a>    
                                    </td>
                                    <td><img src="{{ img_url('sub/icon_file.gif') }}" alt="첨부파일" /></td>
                                    <td>2019-05-10</td>
                                    <td>7542</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="tx-left">
                                        <a href="#none">
                                            채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 채점시 오류 발생할 경우.
                                        </a>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>2019-05-10</td>
                                    <td>2112</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="tx-left">
                                        <a href="#none">
                                            채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 채점시 오류 발생할 경우.
                                        </a>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>2019-05-10</td>
                                    <td>150</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td class="tx-left">
                                        <a href="#none">
                                            채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 채점시 오류 발생할 경우. 채점시 오류 발생할 경우.
                                        </a>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>2019-05-10</td>
                                    <td>125</td>
                                </tr>                        
                            </tbody>
                        </table>

                        <div class="Paging">
                            <ul>
                                <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
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
                                <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                            </ul>
                        </div>
                    </div>

                    {{--글쓰기--}}
                    <div class="mt30">
                        <table class="tableTypeA">
                            <col width="15%"/>
                            <col width=""/>
                            <tbody>
                                <tr>
                                    <th>공개여부</th>
                                    <td class="tx-left">
                                        <input type="radio" id="chk1" name="goods_chk"><label for="chk1"> 공개</label>
                                        <input type="radio" id="chk2" name="goods_chk" class="ml20"><label for="chk2"> 비공개</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>제목<span class="tx-light-blue">(*)</span></th>
                                    <td class="tx-left">
                                        <input type="text" id="TITLE" name="TITLE" class="iptTitle" maxlength="30">
                                    </td>
                                </tr>
                                <tr>
                                    <th>내용<span class="tx-light-blue">(*)</span></th>
                                    <td class="tx-left">
                                        <textarea></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>첨부</th>
                                    <td class="tx-left">
                                        <ul class="attach">
                                            <li class="mb5">
                                                <input type="file" class="input-file" size="3">
                                            </li>
                                            <li class="mb5">
                                                <input type="file" class="input-file" size="3">
                                            </li>
                                        </ul>
                                        • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br/>
                                        • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="search-Btn mt20 h36 p_re">
                        <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                            <span class="tx-purple-gray">취소</span>
                        </button>
                        <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                            <span>저장</span>
                        </button>
                    </div>

                    {{--글보기--}}
                    <div class="mt30">
                        <table class="tableTypeA">
                            <col width="15%"/>
                            <col width=""/>
                            <tbody>
                                <tr>
                                    <th class="tx-left">서포터즈를 마치며</th>
                                </tr>
                                <tr>
                                    <th class="tx-right normal">홍길동 <span class="ml10 mr10">|</span> 2018-00-00</th>
                                </tr>
                                <tr>
                                    <td class="tx-left">
                                        첨부파일.gif <img src="{{ img_url('sub/icon_file.gif') }}" alt="첨부파일">
                                    </td>                            
                                </tr>
                                <tr>
                                    <td class="tx-left">
                                        첨부파일.gif <img src="{{ img_url('sub/icon_file.gif') }}" alt="첨부파일">
                                    </td>                            
                                </tr>
                                <tr>
                                    <td class="tx-left">
                                        이제 서포터즈 활동을 마무리하게 되었습니다. 
                                        마지막으로 끝나기 전에 전에도 말씀드렸던 것을 한 번만 더 강조하고 싶어서 글 남깁니다.
                                        Sns로 들어가는 아이콘의 크기를 키워주시고 그 반대편에 각자 교수님들의 사진 아이콘을 만들어 그 아이콘을 클릭하면 각 교수님들이 관리하시는 사이트로 들어갈 수 있게 링크를 만들어주셨으면 합니다.
                                        윌비스 신광은 경찰 온라인과 수강생들에게 정말 크나큰 도움이 될 것이라 믿어 의심치 않습니다.
                                        그동안 수고하셨습니다!
                                    </td>
                                </tr>                        
                            </tbody>
                        </table>                
                    </div>
                    <div class="search-Btn mt20 h36 p_re">
                        <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                            <a href="#none" class="tx-purple-gray">삭제</a>
                        </div>
                        <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray center">
                            <a href="#none" class="tx-purple-gray">수정</a>
                        </div>
                        <div class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right">
                            <a href="#none">목록</a>
                        </div>
                    </div>
                </div>               
            </div>
        </div>

        {{--서포터즈 팝업--}}
        <div id="popup_user" class="Pstyle NGR">
            <span class="b-close"><img src="{{ img_url('sub/close.png') }}"></span>
            <h3 class="NSK-Black">나의 소개</h3> 
            <div class="content">                               
                {{--글보기--}}
                <div class="userView">
                    <div class="userImg">
                        <div class="mask"></div>
                        <img src="https://static.willbes.net/public/images/promotion/supporters/supporters_tab04_sample.jpg">
                    </div>
                    <p><strong>홍길동</strong>님</p>
                    저는 경찰과는 조금 무관한 무역학을 전공하고 있습니다. 처음 공부를 시작한다고 했을 때 주변에서 
                    ‘왜?’라는 말보다는 ‘얼마동안 할 생각이냐’는 질문을 가장 많이 받았습니다. 그 물음에 선뜻 ‘될 때까지 해볼꺼야’ 라고 
                    대답할 수는 없었습니다. 경찰이 되겠다는 신념 하나만으로 무기한 공부할 자신은 없었으니까요. 
                    단기간 합격의 키는 강의의 질이라고 생각합니다. 좋은 스승을 만나야 쉽게 이해하고 오래 기억되기 때문입니다.
                    <br>
                    <br>
                    저는 경찰과는 조금 무관한 무역학을 전공하고 있습니다. 처음 공부를 시작한다고 했을 때 주변에서 
                    ‘왜?’라는 말보다는 ‘얼마동안 할 생각이냐’는 질문을 가장 많이 받았습니다. 그 물음에 선뜻 ‘될 때까지 해볼꺼야’ 라고 
                    대답할 수는 없었습니다. 경찰이 되겠다는 신념 하나만으로 무기한 공부할 자신은 없었으니까요. 
                    단기간 합격의 키는 강의의 질이라고 생각합니다. 좋은 스승을 만나야 쉽게 이해하고 오래 기억되기 때문입니다.
                </div>

                {{--글쓰기--}}
                <div class="mt30">
                    <table class="tableTypeA">
                        <col width="15%"/>
                        <col width=""/>
                        <tbody>
                            <tr>
                                <th>공개여부</th>
                                <td class="tx-left">
                                    <input type="radio" id="chkA" name="goods_chk"><label for="chkA"> 공개</label>
                                    <input type="radio" id="chkB" name="goods_chk" class="ml20"><label for="chkB"> 비공개</label>
                                </td>
                            </tr>
                            <tr>
                                <th>제목<span class="tx-light-blue">(*)</span></th>
                                <td class="tx-left">
                                    <input type="text" id="TITLE" name="TITLE" class="iptTitle" maxlength="30">
                                </td>
                            </tr>
                            <tr>
                                <th>내용<span class="tx-light-blue">(*)</span></th>
                                <td class="tx-left">
                                    <textarea></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>첨부</th>
                                <td class="tx-left">
                                    <ul class="attach">
                                        <li class="mb5">
                                            <input type="file" class="input-file" size="3">
                                        </li>
                                    </ul>
                                    • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br/>
                                    • jpg, gif, png만 등록 가능합니다.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="btnsSt3">
                        <a href="#none">취소</a>
                        <a href="#none">확인</a>
                    </div>
                </div>             
                
            </div>
        </div>        
    </form>   
</div>
<!-- End Container -->
    
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.tab').each(function(){
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

                    e.preventDefault()})}
                )}
        );

        function go_popup() {  
            $('#popup').bPopup();
        }; 

        function go_popup_user() {  
            $('#popup_user').bPopup();
        }; 
    </script>
@stop