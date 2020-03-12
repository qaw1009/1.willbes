@extends('willbes.pc.layouts.master')

@section('content')
<div id="Container" class="subContainer widthAuto c_both">
    @if (empty($__cfg['TabMenu']) === true)
        @include('willbes.pc.layouts.partial.site_menu')
    @else
        @include('willbes.pc.layouts.partial.site_tab_menu')
    @endif
    {{--
    <div class="Depth">
        @include('willbes.pc.layouts.partial.site_route_path')
    </div>
    --}}
    <div class="Content p_re">
        <form id="url_form" name="url_form" method="GET">
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
        </form>
        <div class="willbes-Prof-Subject pl-zero NG tx-dark-black">
            · 익명 자유게시판
        </div>
        <div class="willbes-Leclist mt10 c_both">
            <div class="LecWriteTable">
                <form id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                    {!! csrf_field() !!}
                    {!! method_field($method) !!}
                    <input type="hidden" name="idx" value="{{ $board_idx }}"/>
                    <input type="hidden" name="reg_type" value="{{$reg_type}}"/>
                    <input type="hidden" name="s_cate_code" value="{{element('s_cate_code', $arr_input)}}"/>
                    <input type="hidden" name="is_public" value="Y"/>

                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdt-gray bdb-gray tx-gray fc-bd-none">
                        <colgroup>
                            <col style="width: 120px;">
                            <col style="width: 820px;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td class="w-tit bg-light-white tx-left strong pl30">닉네임<span class="tx-light-blue">(*)</span></td>
                                <td class="w-text tx-left pl30" colspan="3">
                                    <input type="text" id="reg_nick_name" name="reg_nick_name" class="iptTitle" maxlength="20" value="{{$data['RegNickName']}}" style="max-width:200px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit bg-light-white tx-left strong pl30">제목<span class="tx-light-blue">(*)</span></td>
                                <td class="w-text tx-left pl30" colspan="3">
                                    <input type="text" id="board_title" name="board_title" class="iptTitle" maxlength="30" value="{{$data['Title']}}">
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit bg-light-white tx-left strong pl30">내용<span class="tx-light-blue">(*)</span></td>
                                <td class="w-textarea write tx-left pl30" colspan="3">
                                    <textarea id="board_content" name="board_content" class="form-control" title="내용" placeholder="">{!! $data['Content'] !!}</textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>

                <div class="search-Btn mt20 h36 p_re">
                    <button type="button" id="btn_list" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                        <span class="tx-purple-gray">취소</span>
                    </button>
                    <button type="submit" id="btn_submit" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                        <span>저장</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var $regi_form = $('#regi_form');

    $(document).ready(function() {
        $('#btn_list').click(function() {
            location.href = '{!! front_url($default_path.'/index/cate/'.$__cfg['CateCode'].'?'.$get_params) !!}';
        });

        $regi_form.bind('submit', function () {
            $(this).find(':input').prop('disabled', false);
        });

        $('#btn_submit').click(function () {
            var _url = '{!! front_url($default_path.'/store/cate/'.$__cfg['CateCode'].'?'.$get_params) !!}';
            if (!confirm('저장하시겠습니까?')) { return true; }

            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.href = '{!! front_url($default_path.'/index/cate/'.$__cfg['CateCode'].'?'.$get_params) !!}';
                }
            }, showValidateError, addValidate, false, 'alert');
        });

        function addValidate() {
            if ($('#board_title').val() == '') {
                alert('제목을 입력해주세요.');
                return false;
            }
            if ($('#board_content').val() == '') {
                alert('내용을 입력해 주세요.');
                return false;
            }
            return true;
        }
    });
</script>
@stop