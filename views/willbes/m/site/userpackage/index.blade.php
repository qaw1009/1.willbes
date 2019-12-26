@extends('willbes.m.layouts.master')

@section('page_title',  '수강신청 > DIY패키지')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <!-- PageTitle -->
        @include('willbes.m.layouts.page_title')
        <div>
            <ul class="Lec-Selected NG tx-gray bdb-none">
                <form id="url_form" name="url_form" method="GET">
                    @foreach($arr_input as $key => $val)
                        <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                    @endforeach
                </form>
                @if(isset($arr_base['category']) === true)
                    <li>
                        <select id="cate_code" name="cate_code" title="카테고리" class="select_search">
                            @foreach($arr_base['category'] as $idx => $row)
                                <option value="{{$row['CateCode']}}" @if(element('cate_code', $arr_input) == $row['CateCode'] || $arr_base['category_default'] == $row['CateCode']){{'selected'}}@endif>{{$row['CateName']}}</option>
                            @endforeach
                        </select>
                    </li>
                @endif
                <li>
                    <select id="school_year" name="school_year" title="대비년도" class="select_search">
                        <option value="">대비년도전체</option>
                        @for($i=2017; $i<=date('Y')+1; $i++)
                            <option value="{{ $i }}" @if(element('school_year', $arr_input) == $i){{'selected'}}@endif>{{ $i }}년</option>
                        @endfor
                    </select>
                </li>
                <li class="resetBtn2">
                    <a href="#none" onclick="location.href=location.pathname">초기화</a>
                </li>
            </ul>

            <div class="lineTabs lecListTabs c_both">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                    <colgroup>
                        <col>
                    </colgroup>
                    <tbody>
                    @foreach($data['list'] as $row)
                    <tr>
                        <td class="w-data tx-left">
                            <div class="w-tit">
                                <a href="{{ front_url('/userPackage/show/cate/').$__cfg['CateCode'].'/prod-code/'.$row['ProdCode'] }}"> {{$row['ProdName']}}</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <!-- Topbtn -->
        @include('willbes.m.layouts.topbtn')
    </div>
    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {
            $('.select_search').on('change', function(){
                var $arr_reset = ['school_year'];
                if($(this).attr('id') == 'cate_code') {
                    $.each($arr_reset, function(index, item) {
                        $('#url_form').find('input[type="hidden"][name="' + item + '"]').remove();
                    });
                }
                goUrl($(this).attr('id'), $(this).val());
            });
        });
    </script>
@stop