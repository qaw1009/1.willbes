<div id="profNotice" class="willbes-Layer-Board" style="display: block">
    <a class="closeBtn" href="#none" onclick="closeWin('{{ $arr_input['ele_id'] }}');"><img src="{{ img_url('prof/close.png') }}"></a>
    <div class="Layer-Tit NG tx-dark-black">공지사항</div>

    <div class="Layer-Cont">
        <div class="willbes-Leclist c_both">
            <div class="LecViewTable">
                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                    <colgroup>
                        <col>
                        <col style="width: 150px;">
                        <col style="width: 150px;">
                    </colgroup>
                    <thead>
                    <tr>
                        <td class="subTit tx-left pl20">
                            @if($data['IsBest'] == '1')
                                <img src="{{ img_url('prof/icon_notice.gif') }}" style="marign-right: 5px;">
                            @endif
                            <strong class="tx-light-blue" style="padding-right: 5px;">{{$data['Title']}}</strong><span class="row-line">|</span>
                        </td>
                        <td class="w-date">{{$data['RegDatm']}}<span class="row-line">|</span></td>
                        <td class="w-click"><strong>조회수</strong> {{$data['TotalReadCnt']}}</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if(empty($data['AttachData']) === false)
                        <tr>
                            <td class="w-file tx-left pl20" colspan="3">
                                @foreach($data['AttachData'] as $row)
                                    <a href="{{front_url($default_path.'/notice/download?file_idx=').$row['FileIdx'].'&board_idx='.$board_idx }}" target="_blank">
                                        <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td class="w-txt tx-left" colspan="3">
                            {!! $data['Content'] !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="search-Btn btnAuto90 h36 mt20 mb30 f_right">
                    <button data-board-idx="" data-board-url="{{front_url($default_path.'/notice/popupIndex?'.$get_params)}}" onclick="go_board_popup(this)" class="mem-Btn bg-purple-gray bd-dark-gray">
                        <span>목록</span>
                    </button>
                </div>

                @if($data['IsBest'] != '1')
                    <table cellspacing="0" cellpadding="0" class="listTable prevnextTable upper-gray bdt-gray bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 150px;">
                            <col style="width: 640px;">
                            <col style="width: 150px;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td class="w-prev bg-light-gray"><strong>이전글</strong></td>
                                <td class="tx-left pl20">
                                    @if(empty($pre_data) === false)
                                        <a href="#none" data-board-idx="{{$pre_data['BoardIdx']}}" data-board-url="{{front_url($default_path.'/notice/popupShow?'.$get_params)}}" onclick="go_board_popup(this)">{{$pre_data['Title']}}</a><span class="row-line">|</span>
                                    @else
                                        이전글이 없습니다.
                                    @endif
                                </td>
                                <td class="w-date">@if(empty($pre_data) === false){{$pre_data['RegDatm']}}@endif</td>
                            </tr>
                            <tr>
                                <td class="w-next bg-light-gray"><strong>다음글</strong></td>
                                <td class="tx-left pl20">
                                    @if(empty($next_data) === false)
                                        <a href="#none" data-board-idx="{{$next_data['BoardIdx']}}" data-board-url="{{front_url($default_path.'/notice/popupShow?'.$get_params)}}" onclick="go_board_popup(this)">{{$next_data['Title']}}</a><span class="row-line">|</span>
                                    @else
                                        다음글이 없습니다.
                                    @endif
                                <td class="w-date">@if(empty($next_data) === false){{$next_data['RegDatm']}}@endif</td>
                            </tr>
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
</div>

<div id="Layerprof" class="willbes-Layer-Black" style="display: block"></div>

<script type="text/javascript">
    // 레이어팝업
    function go_board_popup(obj){
        var ele_id = 'WrapReply';
        var _url = $(obj).data('board-url');
        var data = {
            'ele_id' : ele_id,
            'board_idx' : $(obj).data('board-idx'),
            'prof_idx' : '{{$prof_idx}}',
        };

        sendAjax(_url, data, function(ret) {
            $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
        }, showAlertError, false, 'GET', 'html');
    }
</script>