@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">        
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
        .evtContent {
            width:100% !important;
            min-width:1210px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/      
       
        .evt00 {background:#404040}        
        .evtTop{background:#234dc5;}
        .evt01 {background:#ddd;}
        .evt02 {background:#fff url(https://static.willbes.net/public/images/promotion/2019/12/1474_02_bg.jpg) repeat-y center top}
        .evt02 > div {width:700px; margin:0 auto}
        .evt02 > div table {table-layout: auto;}
        .evt02 > div table th,
        .evt02 > div table td {padding:10px 5px; border-bottom:1px solid #252525; border-right:1px solid #6f95ff; text-align: center; font-weight: 600; font-size:20px}
        .evt02 > div table th {background: #252525; color:#fff;} 
        .evt02 > div table td {font-size:18px; color:#fff;}
        .evt02 > div table td div {position:relative}
        .evt02 > div table td span {position:absolute; width:100%; top:0; left:0; z-index:5}
        .evt02 > div table tbody th {background: #f9f9f9; color:#555;} 
        .evt03 {background:#555;} 
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">           
     
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1443_00.jpg" title="신광은 경찰팀">
        </div>
        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_top.jpg" title="열공인증 이벤트">
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_01.jpg" usemap="#Map1474z" title="문제풀이 1단계" border="0">
            <map name="Map1474z" id="Map1474z">
                <area shape="rect" coords="337,1169,781,1253" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1043#none" target="_blank" alt="문제풀이 1단계 신청하기" />
            </map>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_01.jpg" title="소문내기 이벤트 참여">
            <div>
                <table cellspacing="0" cellpadding="0">
                    <colgroup>
                        <col width="20%">
                        <col width="20%">
                        <col width="20%">
                        <col width="20%">
                        <col width="20%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>월</th>
                            <th>화</th>
                            <th>수</th>
                            <th>목</th>
                            <th>금</th>
                        </tr>
                    <thead>
                    <tbody>
                        <tr>
                            <td>12/16</td>
                            <td>12/17</td>
                            <td>12/18</td>
                            <td>12/19</td>
                            <td>12/20</td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    @if(time() >= strtotime('201912170000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                    <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day01.png" alt="형사소송법">
                                </div>
                            </td>
                            <td>
                                <div>
                                    @if(time() >= strtotime('201912180000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                    <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day02.png" alt="경찰학개론">
                                </div>
                            </td>
                            <td>
                                <div>
                                    @if(time() >= strtotime('201912190000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                    <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day03.png" alt="형법">
                                </div>
                            </td>
                            <td>
                                <div>
                                    @if(time() >= strtotime('201912200000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                    <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day04.png" alt="영어">
                                </div>
                            </td>
                            <td>
                                <div>
                                    @if(time() >= strtotime('201912210000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                    <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day05.png" alt="한국사">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>12/23</td>
                            <td>12/24</td>
                            <td>12/25</td>
                            <td>12/26</td>
                            <td>12/27</td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    @if(time() >= strtotime('201912240000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                    <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day01.png" alt="형사소송법">
                                </div>
                            </td>
                            <td>
                                <div>
                                    @if(time() >= strtotime('201912250000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                    <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day02.png" alt="경찰학개론">
                                </div>
                            </td>
                            <td>
                                <div>
                                    @if(time() >= strtotime('201912260000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                    <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day03.png" alt="형법">
                                </div>
                            </td>
                            <td>
                                <div>
                                    @if(time() >= strtotime('201912270000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                    <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day04.png" alt="영어">
                                </div>
                            </td>
                            <td>
                                <div>
                                    @if(time() >= strtotime('201912280000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                    <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day05.png" alt="한국사">
                                </div>
                            </td>
                        </tr>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>12/30</td>
                            <td>12/31</td>
                            <td>1/1</td>
                            <td>1/2</td>
                            <td>1/3</td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    @if(time() >= strtotime('201912310000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                    <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day01.png" alt="형사소송법">
                                </div>
                            </td>
                            <td>
                                <div>
                                    @if(time() >= strtotime('202001010000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                    <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day02.png" alt="경찰학개론">
                                </div>
                            </td>
                            <td>
                                <div>
                                    @if(time() >= strtotime('202001020000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                    <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day03.png" alt="형법">
                                </div>
                            </td>
                            <td>
                                <div>
                                    @if(time() >= strtotime('202001030000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                    <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day04.png" alt="영어">
                                </div>
                            </td>
                            <td>
                                <div>
                                    @if(time() >= strtotime('202001040000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                    <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day05.png" alt="한국사">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>            
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_02.jpg" usemap="#Map1474a" title="소문내기 이벤트 참여" border="0">
            <map name="Map1474a" id="Map1474a">
                <area shape="rect" coords="210,465,280,577" href="https://www.instagram.com" target="_blank" alt="인스타그램" />
                <area shape="rect" coords="312,465,386,577" href="https://twitter.com" target="_blank" alt="트위터" />
                <area shape="rect" coords="416,465,493,577" href="https://www.facebook.com" target="_blank" alt="페이스북" />
                <area shape="rect" coords="522,465,601,577" href="http://cafe.daum.net/policeacademy" target="_blank" alt="경사모" />
                <area shape="rect" coords="628,465,710,577" href="https://cafe.naver.com/polstudy" target="_blank" alt="경꿈사" />
                <area shape="rect" coords="738,465,818,577" href="https://gall.dcinside.com/board/lists/?id=government" target="_blank" alt="공무원갤러리" />
                <area shape="rect" coords="830,465,934,577" href="https://gall.dcinside.com/mgallery/board/lists/?id=policeofficer" target="_blank" alt="순경마이너갤러리" />
            </map>            
        </div>
        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial', array('bottom_cafe_type'=>'N'))
        @endif

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_03.jpg" title="이벤트 유의사항" >                      
        </div>          

	</div>
    <!-- End Container -->

    <script type="text/javascript">

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop