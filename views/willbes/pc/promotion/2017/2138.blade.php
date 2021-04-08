@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">     
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; margin:0 auto;}
        .MainQuickMenuSSam {display:none}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/04/2138_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/04/2138_01_bg.jpg) no-repeat center top;}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/04/2138_02_bg.jpg) no-repeat center top;}
        .evt03 {background:#83cfbd; padding:150px 0}
        .evt03 > div {width:1120px; margin:0 auto;}
        .evt03 > div table {background:#fff}
        .evt03 > div th {padding:30px 0}
        .evt03 > div td {font-size:22px; color:#288a75; padding:30px 10px; letter-spacing:-1px}
        .evt03 > div td p {margin-bottom:15px}
        .evt03 > div tr {border-bottom:10px solid #83cfbd}
        .evt03 > div tr:nth-child(1) th {background:#efd600}
        .evt03 > div tr:nth-child(2) th {background:#00a225}
        .evt03 > div tr:nth-child(3) th {background:#089f7c}
        .evt03 > div tr:nth-child(4) th {background:#003a2e}
        .evt03 > div tr:nth-child(5) th {background:#1175d3}
        .evt03 > div tr:nth-child(6) th {background:#1175d3}
        .evt03 > div tr:nth-child(7) th {background:#db5752}
        .evt03 > div tr:nth-child(8) th {background:#f2736d}
        .evt03 > div tr:nth-child(9) th {background:#03c02e}
        .evt03 > div tr:nth-child(10) th {background:#50be68}
        .evt03 > div tr:nth-child(11) th {background:#333333}
        .evt03 > div tr:nth-child(12) th {background:#67531e}
        .evt03 > div tr:nth-child(13) th {background:#002978}
        .evt03 > div tr:nth-child(14) th {background:#5684da}
        .evt03 > div tr:nth-child(15) th {background:#7c838f}
        .evt03 > div tr:nth-child(16) th {background:#677387}
        .evt03 > div tr:last-child th {background:#fa8100}
        .evt03 > div td ul {width:100%}
        .evt03 > div td li {display: inline; float:left; width:50%; padding:20px 0; border-right:1px solid #e6e6e6; border-bottom:1px solid #e6e6e6}
        .evt03 > div td ul:after {content:''; display: block; clear:both}
        .evt03 > div td li:nth-last-of-type(2),
        .evt03 > div td li:last-child  {border-bottom:0}
        .evt03 > div td li:nth-of-type(even) {border-right:0;}
    </style> 

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2138_top.jpg" alt="합격전략 세우기"/>            
        </div>

        <div class="evtCtnsBox evt01" id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2138_01.jpg" alt="1. 단계적 학습을 위한 가이드"/>          
        </div>
        
        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2138_02.jpg" alt="2. 과목별/시기별 공부 방향 제시"/>         
        </div>  
        
        <div class="evtCtnsBox evt03">
            <div>
                <table>
                    <col width="194px"/>
                    <col width="250px"/>
                    <col />
                    @if(empty($arr_base['promotion_otherinfo_group']) === false)
                        @foreach($arr_base['promotion_otherinfo_group'] as $order_num => $prof_data)
                            <tr>
                                <th><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_t{{ $order_num < 10 ? '0'.$order_num : $order_num }}_01.png" alt="{{$prof_data[0]['SubjectName'] or '과목'}}"/></th>
                                <td><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_t{{ $order_num < 10 ? '0'.$order_num : $order_num }}_02.png" alt="{{$prof_data[0]['ProfNickName'] or '교수'}}"/></td>
                                <td>
                                    <ul>
                                        @if(empty($prof_data) === false)
                                            @foreach($prof_data as $row)
                                                <li>
                                                    <p>{{ $row['OtherData2'] }}</p>
                                                    @if(empty($row['OtherData1']) === false)
                                                        @if(is_numeric($row['OtherData1']) === true)
                                                            <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','WD');">
                                                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/>
                                                            </a>
                                                        @else
                                                            <a href="{{ $row['OtherData1'] }}" target="_blank">
                                                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn01.png" alt="바로보기"/>
                                                            </a>
                                                        @endif
                                                    @endif
                                                    <a href="{{ $row['download_url'] }}"><img src="https://static.willbes.net/public/images/promotion/2021/04/2138_03_btn02.png" alt="자료다운"/></a>
                                                </li>

                                                @if($loop->count % 2 === 1 && $loop->remaining === 1)
                                                    <li></li>
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div> 
    </div>
    <!-- End Container -->
@stop