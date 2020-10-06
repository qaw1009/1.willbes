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

        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}

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
                                <dt>{!! (empty(sess_data('mem_idx')) === false && $data['RegMemIdx'] == sess_data('mem_idx')) ? $data['RegName'] : hpSubString($data['RegName'],0,2,'*') !!}<span class="row-line">|</span></dt>
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

            @if(empty($arr_swich['mod_btn']) === false && empty(sess_data('mem_idx')) === false && $data['RegMemIdx'] == sess_data('mem_idx'))
                <div id="Fixbtn" class="Fixbtn three">
                    <ul>
                        <li class="btn_gray"><a href="#none" class="btn-del" data-board-idx="{{$data['BoardIdx']}}">삭제</a></li>
                        <li class="btn_blue"><a href="{{front_url($default_path.'/create?'.$get_params.'&board_idx='.$board_idx)}}">수정</a></li>
                        <li class="btn_gray"><a href="{{front_url($default_path.'/index?'.$get_params)}}">목록</a></li>
                    </ul>
                </div>
            @endif
            <!-- Fixbtn -->
        </form>

    </div>
    <!-- End Container -->

    <script>
        var $regi_form = $('#regi_form');
        //게시글삭제
        $regi_form.on('click', '.btn-del', function() {
            if (!confirm('삭제하시겠습니까?')) {
                return;
            }
            var _url = '{{ front_url($default_path."/delete") }}';
            var data = {
                '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE',
                'board_idx' : $(this).data('board-idx')
            };
            sendAjax(_url, data, function(ret) {
                alert(ret.ret_msg);
                location.href = '{!! front_url($default_path.'/index') !!}';
            }, showError, false, 'POST');
        });
    </script>
@stop