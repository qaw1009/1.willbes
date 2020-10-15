@extends('html.m.layouts.v2.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        자료실
    </div>

    <div class="w-Guide-Ssam mt20">
        <div class="NG ssamInfoMenu">
            <ul>
                <li><a href="guide_3134_01">임용<br>시험제도</a><li>
                <li><a href="guide_3134_02">최근<br>10년동향</a><li>
                <li><a href="guide_3134_04">지역별<br>공고문</a><li>
                <li class="one"><a href="guide_3134_03" class="on">자료실</a><li>                
            </ul>
        </div>
        <div class="guidebox GM">                   
            <table>
                <tbody>
                    <tr>
                        <th rowspan="18">2020<BR>
                        학년도 </th>
                        <th>지역</th>
                        <th>유아 · 초등</th>
                        <th>중등</th>
                    </tr>
                    <tr>
                        <td>서울특별시</td>
                        <td><a href="#none" class="btn01">자료받기 ></a></td>
                        <td><a href="#none" class="btn01">자료받기 ></a></td>
                    </tr>
                    <tr>
                        <td>인천광역시</td>
                        <td><a href="#none" class="btn01">자료받기 ></a></td>
                        <td><a href="#none" class="btn01">자료받기 ></a></td>
                    </tr>
                    <tr>
                        <td>대전광역시</td>
                        <td><a href="#none" class="btn01">자료받기 ></a></td>
                        <td><a href="#none" class="btn01">자료받기 ></a></td>
                    </tr>
                    <tr>
                        <td>세종시</td>
                        <td><a href="#none" class="btn01">자료받기 ></a></td>
                        <td><a href="#none" class="btn01">자료받기 ></a></td>
                    </tr>
                    <tr>
                        <td>광주광역시</td>
                        <td><a href="#none" class="btn01">자료받기 ></a></td>
                        <td><a href="#none" class="btn01">자료받기 ></a></td>
                    </tr>
                    <tr>
                        <td>대구광역시</td>
                        <td><a href="#none" class="btn01">자료받기 ></a></td>
                        <td><a href="#none" class="btn01">자료받기 ></a></td>
                    </tr>
                    <tr>
                        <td>울산광역시</td>
                        <td><a href="#none" class="btn01">자료받기 ></a></td>
                        <td><a href="#none" class="btn01">자료받기 ></a></td>
                    </tr>
                    <tr>
                        <td>부산광역시</td>
                        <td><a href="#none" class="btn01">자료받기 ></a></td>
                        <td><a href="#none" class="btn01">자료받기 ></a></td>
                    </tr>
                    <tr>
                      <td>경기도</td>
                      <td><a href="#none" class="btn01">자료받기 &gt;</a></td>
                      <td><a href="#none" class="btn01">자료받기 &gt;</a></td>
                    </tr>
                    <tr>
                      <td>충청북도</td>
                      <td><a href="#none" class="btn01">자료받기 &gt;</a></td>
                      <td><a href="#none" class="btn01">자료받기 &gt;</a></td>
                    </tr>
                    <tr>
                      <td>충청남도</td>
                      <td><a href="#none" class="btn01">자료받기 &gt;</a></td>
                      <td><a href="#none" class="btn01">자료받기 &gt;</a></td>
                    </tr>
                    <tr>
                      <td>전라북도</td>
                      <td><a href="#none" class="btn01">자료받기 &gt;</a></td>
                      <td><a href="#none" class="btn01">자료받기 &gt;</a></td>
                    </tr>
                    <tr>
                      <td>전라남도</td>
                      <td><a href="#none" class="btn01">자료받기 &gt;</a></td>
                      <td><a href="#none" class="btn01">자료받기 &gt;</a></td>
                    </tr>
                    <tr>
                      <td>강원도</td>
                      <td><a href="#none" class="btn01">자료받기 &gt;</a></td>
                      <td><a href="#none" class="btn01">자료받기 &gt;</a></td>
                    </tr>
                    <tr>
                      <td>경상북도</td>
                      <td><a href="#none" class="btn01">자료받기 &gt;</a></td>
                      <td><a href="#none" class="btn01">자료받기 &gt;</a></td>
                    </tr>
                    <tr>
                      <td>경상남도</td>
                      <td><a href="#none" class="btn01">자료받기 &gt;</a></td>
                      <td><a href="#none" class="btn01">자료받기 &gt;</a></td>
                    </tr>
                    <tr>
                        <td>제주도</td>
                        <td><a href="#none" class="btn01">자료받기 ></a></td>
                        <td><a href="#none" class="btn01">자료받기 ></a></td>
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