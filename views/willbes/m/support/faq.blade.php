@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <form id="url_form" name="url_form" method="GET">
    @foreach($arr_input as $key => $val)
        <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
    @endforeach

    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>
        자주하는 질문
    </div>
    <div class="willbes-Lec-Selected NG tx-gray">
        <select id="s_faq" name="s_faq" title="FAQ구분" class="seleFAQdiv width50p" onchange="goUrl('s_faq',this.value)">
            <option value="">FAQ구분</option>
            @foreach($faq_ccd as $row)
                <option value="{{$row['Ccd']}}" @if(element('s_faq', $arr_input) == $row['Ccd'])selected="selected"@endif>{{$row['CcdName']}}</option>
            @endforeach
        </select>
        <select id="s_sub_faq" name="s_sub_faq" title="FAQ분류" class="seleFAQcate width49p ml1p" onchange="goUrl('s_sub_faq',this.value)"}>
            <option value="">FAQ분류</option>
            @foreach($faq_sub_ccd as $key => $val)
                <option value="{{$key}}" @if(element('s_sub_faq', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
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
                <a href="{{front_url('/support/faq/index')}}"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
            </div>
        </div>
    </div>

    <div class="lineTabs lecListTabs c_both">
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
            <colgroup>
                <col style="width: 87%;">
                <col style="width: 13%;">
            </colgroup>
            <tbody>
            @if(empty($list))
                <tr>
                    <td class="w-list tx-center" colspan="2">등록된 내용이 없습니다.</td>
                </tr>
            @endif

            @foreach($list as $row)
                <tr class="replyList willbes-Open-Table">
                    <td class="w-data tx-left">
                        <dl class="w-info">
                            <dt><strong>@if($row['IsCampus'] == 'Y'){{$row['CampusCcd_Name']}}</strong><span class="row-line">|</span>@endif<span class="tx-light-blue">{{$row['FaqGroupTypeCcd_Name']}} > {{$row['FaqTypeCcd_Name']}}</span></dt>
                        </dl>
                        <div class="w-tit">{{$row['Title']}}</div>
                    </td>
                    <td class="MoreBtn tx-center">></td>
                </tr>
                <tr class="replyTxt willbes-Open-List bg-light-gray">
                    <td class="w-txt NGR" colspan="2">{!! $row['Content'] !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $paging['pagination'] !!}
    </div>
    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->
    </form>
</div>
<!-- End Container -->
@stop