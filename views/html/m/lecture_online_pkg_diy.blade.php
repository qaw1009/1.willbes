@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div id="Sticky" class="sticky-Title">
        <div class="sticky-Grid sticky-topTit">
            <div class="willbes-Tit NGEB p_re">
                <button type="button" class="goback" onclick="history.back(-1); return false;">
                    <span class="hidden">뒤로가기</span>
                </button>    
                수강신청 > DIY패키지
            </div>
        </div>
    </div>    

    <div>
        <ul class="Lec-Selected NG tx-gray bdb-none">
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">대비학년도</option>
                    <option value="2019년">2019년</option>
                    <option value="2018년">2018년</option>
                    <option value="2017년">2017년</option>
                </select>
            </li>
            <li class="resetBtn2">
                <a href="#none">초기화</a>
            </li>           
        </ul>

        <div class="lineTabs lecListTabs c_both">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                <colgroup>
                    <col>
                </colgroup>
                <tbody>
                    <tr>
                        <td class="w-data tx-left">
                            <div class="w-tit">
                                <a href="#none">2020 9급 이론종합 [행정/세무/출관직] 선택형 내맘대로 패키지 1</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left">
                            <div class="w-tit">
                                <a href="#none">2020 9급 이론종합 [행정/세무/출관직] 선택형 내맘대로 패키지 2</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left">
                            <div class="w-tit">
                                <a href="#none">2020 9급 이론종합 [행정/세무/출관직] 선택형 내맘대로 패키지 3</a>
                            </div>
                        </td>
                    </tr>                    
                </tbody>
            </table>
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