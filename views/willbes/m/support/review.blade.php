@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <form id="url_form" name="url_form" method="GET">
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
        </form>

        <div class="willbes-Tit NGEB p_re">
            <button type="button" class="goback" onclick="history.back(-1); return false;">
                <span class="hidden">뒤로가기</span>
            </button>
            합격수기
        </div>
        <div class="willbes-Lec-Selected NG tx-gray">

            @if(empty($arr_base['category']) === false)
                <select id="s_cate_code" name="s_cate_code" title="카테고리" class="width49p" onchange="goUrl('s_cate_code',this.value)" @if(empty(element('s_cate_code_disabled', $arr_input)) == false && element('s_cate_code_disabled', $arr_input) == 'Y') disabled @endif>
                    <option value="">카테고리</option>
                    @foreach($arr_base['category'] as $row)
                        <option value="{{$row['CateCode']}}" class="{{$row['SiteCode']}}" @if(element('s_cate_code', $arr_input) == $row['CateCode'])selected="selected"@endif @if(empty($row['ChildCnt']) === false && $row['ChildCnt'] > 0) disabled @endif>{{$row['CateNameRoute']}}</option>
                    @endforeach
                </select>
            @endif

            @if(empty($arr_base['subject']) === false)
                <select id="subject_idx" name="subject_idx" title="과목" class="width50p ml1p" onchange="goUrl('subject_idx',this.value)" @if(empty(element('s_cate_code', $arr_input)) === true) disabled @endif>
                    <option value="">과목</option>
                    @foreach($arr_base['subject'] as $key => $val)
                        <option value="{{$key}}" @if(element('subject_idx', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                    @endforeach
                </select>
            @endif

            <div class="willbes-Lec-Search NG width100p mt1p">
                <div class="inputBox width90p p_re">
                    <input type="text" id="s_keyword" name="s_keyword" maxlength="30" value="{{ element('s_keyword', $arr_input) }}" class="labelSearch width100p" placeholder="제목 및 내용 검색">
                    <button type="button" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value)" class="search-Btn" class="search-Btn">
                        <span class="hidden">검색</span>
                    </button>
                </div>
                <div class="resetBtn width10p">
                    <a href="{{front_url($default_path.'/index')}}"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
                </div>
            </div>
        </div>

        @if(empty($arr_swich['create_btn']) === false)
            <div class="btnBox mb20">
                <ul class="width100p">
                    <li class="InfoBtn btn_blue f_right mg0"><a href="{{front_url($default_path.'/create?'.$get_params)}}">등록하기</a></li>
                </ul>
            </div>
        @endif

        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
            <colgroup>
                <col style="width: 70px;">
                <col width="*">
            </colgroup>
            <tbody>
            @if(empty($list))
                <tr>
                    <td class="w-list tx-center" colspan="2">등록된 내용이 없습니다.</td>
                </tr>
            @endif

            @foreach($list as $row)
                <tr class="{{$row['IsBest'] == '1' ? 'bg-light-blue' : ''}}">
                    <td class="w-data tx-left" colspan="2">
                        <a href="{{front_url($default_path.'/show?board_idx='.$row['BoardIdx'].'&'.$get_params)}}">
                            <div class="w-tit">
                                @if(empty($arr_swich['subject']) === false)
                                    <span class="tx-blue">[{{ $row['SubJectName'] or '' }}]</span>
                                @endif

                                 {{hpSubString($row['Title'],0,40,'...')}}
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>{!! (empty(sess_data('mem_idx')) === false && $row['RegMemIdx'] == sess_data('mem_idx')) ? $row['RegName'] : hpSubString($row['RegName'],0,2,'*') !!}<span class="row-line">|</span></dt>
                                <dt>{{$row['RegDatm']}}<span class="row-line">|</span></dt>
                                <dt>조회수 : <span class="tx-blue">{{$row['TotalReadCnt']}}</span></dt>
                            </dl>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $paging['pagination'] !!}

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->
    </div>
    <!-- End Container -->
@stop