@extends('willbes.app.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>
        동영상 상담실
    </div>

    <div class="lineTabs lecListTabs c_both">
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
            <tbody>
            <tr class="list bg-light-gray">
                <td class="w-data tx-left">
                    <dl class="w-info">
                        <dt>
                            @if(empty($data['Category_NameString']) === false) {{$data['Category_NameString']}}<span class="row-line">|</span> @endif
                            {{$data['TypeCcd_Name']}}
                        </dt>
                    </dl>
                    <div class="w-tit">{{$data['Title']}}</div>
                    <dl class="w-info tx-gray">
                        <dt>{{$data['RegDatm']}}<span class="row-line">|</span></dt>
                        <dt>조회수 : <span class="tx-blue">{{$data['ReadCnt']}}</span></dt>
                    </dl>
                </td>
            </tr>
            @if(empty($data['AttachData']) === false)
                @foreach($data['AttachData'] as $row)
                    @if($row['FileType'] == 0)
                        <tr class="flie">
                            <td class="w-file NGR">
                                <a href="{{front_url($default_path.'/download?file_idx=').$row['FileIdx'].'&board_idx='.$board_idx }}">
                                    <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endif
            <tr class="txt">
                <td class="w-txt NGR">
                    @if($data['RegType'] == 1)
                        {!! $data['Content'] !!}
                    @else
                        {!! nl2br($data['Content']) !!}
                    @endif
                </td>
            </tr>

            @if($data['RegType'] == 0 && $data['ReplyStatusCcd'] == $reply_type_complete)
                <!-- 답변 -->
                <tr class="list bg-light-gray">
                    <td class="w-data tx-left">
                        <dl class="w-info tx-gray">
                            @if($data['ReplyStatusCcd'] == '621004')
                                <dt><span class="tx-blue strong">[답변]</span> 답변자명<span class="row-line">|</span></dt>
                            @else
                                <dt><span class="tx-blue strong">[답변]</span> 답변대기</dt>
                            @endif
                                <dt>{{$data['ReplyRegDatm']}}</dt>
                        </dl>
                    </td>
                </tr>
                @if(empty($data['AttachData']) === false)
                    @foreach($data['AttachData'] as $row)
                        @if($row['FileType'] == 1)
                            <tr class="flie">
                                <td class="w-file NGR">
                                    <a href="{{front_url($default_path.'/download?file_idx=').$row['FileIdx'].'&board_idx='.$board_idx }}" target="_blank">
                                        <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                <tr class="txt">
                    @if($data['ReplyStatusCcd'] == '621004')
                        <td class="w-txt NGR">{!! $data['ReplyContent'] !!}</td>
                    @endif
                </tr>
            @endif
            </tbody>
        </table>
    </div>

    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->

    @if($data['RegType'] == 0 && $data['RegMemIdx'] == sess_data('mem_idx') && $data['ReplyStatusCcd'] != $reply_type_complete)
    <div id="Fixbtn" class="Fixbtn three">
    @else
    <div id="Fixbtn" class="Fixbtn one">
    @endif
        <ul>
            @if($data['RegType'] == 0 && $data['RegMemIdx'] == sess_data('mem_idx') && $data['ReplyStatusCcd'] != $reply_type_complete)
            <li class="btn_gray"><a href="javascript:void(0);" id="btn_del">삭제</a></li>
            <li class="btn_blue"><a href="javascript:void(0);" id="btn_modify">수정</a></li>
            @endif
            <li class="btn_gray"><a href="javascript:void(0);" id="btn_list">목록</a></li>
        </ul>
    </div>
    <!-- Fixbtn -->

</div>
<!-- End Container -->

<script type="text/javascript">
    $(document).ready(function() {
        //목록
        $('#btn_list').click(function() {
            location.href = '{!! front_url($default_path.'/index?'.$get_params) !!}';
        });

        //수정
        $('#btn_modify').click(function() {
            location.href = '{!! front_url($default_path.'/create?'.$get_params.'&board_idx='.$board_idx) !!}';
        });

        //삭제
        $('#btn_del').click(function() {
            if (!confirm('삭제하시겠습니까?')) { return true; }
            location.href = '{!! front_url($default_path.'/delete?'.$get_params.'&board_idx='.$board_idx) !!}';
        });
    });
</script>
@stop