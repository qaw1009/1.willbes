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
            기출문제
        </div>
        <div class="willbes-Lec-Selected NG tx-gray">

            <select id="s_area" name="s_area" title="지역" class="width49p" onchange="goUrl('s_area',this.value)">
                <option value="">지역</option>
                @foreach($arr_base['area'] as $key => $val)
                    <option value="{{$key}}" @if(element('s_area', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                @endforeach
            </select>

            <select id="s_year" name="s_year" title="연도" class="width50p ml1p" onchange="goUrl('s_year',this.value)">
                <option value="">연도</option>
                @for($i = date('Y') - 5; $i <= date('Y') + 5; $i++)
                    <option value="{{$i}}" @if(element('s_year', $arr_input) == $i)selected="selected"@endif>{{$i}}</option>
                @endfor
            </select>

            <select id="s_subject" name="s_subject" title="과목" class="width49p mt1p" onchange="goUrl('s_subject',this.value)">
                <option value="">과목</option>
                @foreach($arr_base['subject'] as $key => $val)
                    <option value="{{$key}}" @if(element('s_subject', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                @endforeach
            </select>

            <div class="willbes-Lec-Search NG width100p mt1p">
                <div class="inputBox width90p p_re">
                    <input type="text" id="s_keyword" name="s_keyword" maxlength="30" value="{{ element('s_keyword', $arr_input) }}" class="labelSearch width100p" placeholder="제목 및 내용 검색">
                    <button type="button" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value)" class="search-Btn" class="search-Btn">
                        <span class="hidden">검색</span>
                    </button>
                </div>
                <div class="resetBtn width10p">
                    <a href="{{front_url($default_path.'/examQuestion/index')}}"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
                </div>
            </div>
        </div>

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
                    <td class="w-data tx-left">
                        <div class="w-tit">
                            <a href="{{front_url($default_path.'/examQuestion/show?board_idx='.$row['BoardIdx'].'&'.$get_params)}}">
                                {{hpSubString($row['Title'],0,40,'...')}}
                            </a>
                        </div>
                        <dl class="w-info tx-gray">
                            <dt>{{$row['AreaCcd_Name']}}<span class="row-line">|</span></dt>
                            <dt>{{$row['ExamProblemYear']}}<span class="row-line">|</span></dt>
                            <dt>{{$row['RegDatm']}}<span class="row-line">|</span></dt>
                            <dt>조회수 : <span class="tx-blue">{{$row['TotalReadCnt']}}</span></dt>
                        </dl>
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