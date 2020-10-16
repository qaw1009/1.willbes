@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1278px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1278px; position:relative;}

        /************************************************************/
        .ev01 {margin-bottom:100px}
        .table_wrap {width:1046px; margin:0 auto}
        .table_wrap table{margin-top:30px; border-top:1px solid #d0d2d9; background:#fff}
        .table_wrap table:first-of-type{margin-top:0}
        .table_wrap table td,
        .table_wrap table th{height:48px; padding:0 10px; border:1px solid #d0d2d9; border-left:0; border-top:0}
        .table_wrap table th{font-size:16px; color:#767987; font-weight:500; background:#dfe1e7}
        .table_wrap table td{font-size:15px; color:#444; padding:20px 15px; line-height:1.5;}
        .table_wrap table td div.tImg {width:150px; height:150px; overflow:hidden; margin:0 auto; border:1px solid #333; margin-bottom:10px}
        .table_wrap table td div img {width:100%}
        .table_wrap table tr:first-of-type th{border-top:1px solid #d0d2d9}
        .table_wrap table tr th:first-of-type,
        .table_wrap table tr td:first-of-type{border-left:1px solid #d0d2d9}
        .table_wrap table tr td:last-of-type{text-align:left; padding:20px 30px}
        .table_wrap table td p.txtSt01 {font-size:130%; color:#000}
        .table_wrap table td p.txtSt02 {font-size:110%; color:#6a5230}
        .table_wrap table td p strong {font-size:110%; font-weight:400; color:#000}
        .table_wrap table td .btnSet {width:80%; margin-top:10px}
        .table_wrap table td .btnSet li {display:inline; float:left; width:48%; margin-right:2%; margin-bottom:5px}
        .table_wrap table td .btnSet a {display:block; padding:8px 0; text-align:center; font-size:105%; background:#427eec; color:#fff}
        .table_wrap table td .btnSet a.tpye01 {background:#8c6f47}
        .table_wrap table td .btnSet a.tpye02 {background:#054988}
        .table_wrap table td .btnSet a.tpye03 {background:#F33}
        .table_wrap table td .btnSet a:hover {background:#333}
        .table_wrap table td .btnSet:after {content:""; display:block; clear:both}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox ev01">
            <!-- 이벤트 내용 -->
            <img src="https://static.willbes.net/public/images/promotion/2020/09/200102_top.jpg" alt="윌비스임용 2021학년도 대비 합격전략 설명회"/>
            <div class="table_wrap">
                <table>
                    <col width="15%"/>
                    <col width="25%"/>
                    <col width=""/>

                    @if(empty($arr_base['promotion_otherinfo_data_group']) === false)
                        @php $num = 0; @endphp
                        @foreach($arr_base['promotion_otherinfo_data_group'] as $group => $arr)
                            @foreach($arr as $row)
                                <tr>
                                    @if($num != $group)
                                    <th rowspan="{{count($arr)}}">{{ $row['SubjectName'] }}</th>
                                    @endif
                                    <td>
                                        <div class="tImg"><img src="{{ $row['SubjectName'] }}" alt="{{ $row['ProfNickName'] }}"/></div>
                                        <p><strong>{{ $row['ProfNickName'] }}</strong> 교수</p>
                                    </td>
                                    <td>
                                        <p class="txtSt01">{{ $row['OtherData2'] }}</p>
                                        <ul class="btnSet">
                                            @if(empty($row['wUnitIdx']) === true && empty($row['wUnitAttachFile']) === true)
                                                추후 제공 예정입니다.
                                            @else
                                                @if(empty($row['wHD']) === false)
                                                    <li><a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','WD');" alt="2021학년도 대비 설명회"></a></li>
                                                @endif
                                                @if(empty($row['wUnitAttachFile']) === false)
                                                    <li><a href="{{ site_url('/promotion/downloadReference?file_idx='.$row['wUnitIdx'].'&event_idx='.$data['ElIdx']) }}" alt="관련자료"></a></li>
                                                @endif
                                            @endif
                                        </ul>
                                    </td>
                                </tr>
                                @php $num = $group; @endphp
                            @endforeach
                        @endforeach
                    @endif

                </table>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/09/200304_02.jpg" />
            <!-- 이벤트 내용 -->
        </div>
    </div>
    <!-- End Container -->
@stop