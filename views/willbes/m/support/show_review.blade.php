@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div class="willbes-Tit NGEB p_re">
            <button type="button" class="goback" onclick="history.back(-1); return false;">
                <span class="hidden">뒤로가기</span>
            </button>
            합격수기
        </div>

        <div class="lineTabs lecListTabs c_both">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <tbody>
                <tr class="list bg-light-gray">
                    <td class="w-data tx-left">
                        <div class="w-tit">{{$data['Title']}}</div>
                        <dl class="w-info tx-gray">
                            <dt>
                                @foreach($arr_base['category'] as $row)
                                    @if($data['Category_String'] == $row['CateCode']){{$row['CateName']}}@endif
                                @endforeach
                                <span class="row-line">|</span>
                            </dt>
                            <dt>{{$arr_base['subject'][$data['SubjectIdx']] or ''}}<span class="row-line">|</span></dt>
                            <dt>{{substr($data['RegDatm'],0,10)}}<span class="row-line">|</span></dt>
                            <dt>조회수 : <span class="tx-blue">{{$data['TotalReadCnt']}}</span></dt>
                        </dl>
                    </td>
                </tr>

                <tr class="txt">
                    <td class="w-txt NGR">
                        {!! nl2br($data['Content']) !!}
                    </td>
                </tr>

                @if(empty($data['AttachData']) === false)
                    <tr class="flie">
                        <td class="w-file NGR">
                            @foreach($data['AttachData'] as $row)
                                <a href="{{front_url($default_path.'/download?file_idx=').$row['FileIdx'].'&board_idx='.$board_idx }}" target="_blank">
                                    <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                            @endforeach
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="lecSubject mt40">
                <a href="{{front_url($default_path.'/index?'.$get_params)}}">목록</a>
            </div>
        </div>

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->

    </div>
    <!-- End Container -->
@stop