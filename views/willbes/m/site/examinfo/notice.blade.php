@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div class="willbes-Tit NGEB p_re">
            <button type="button" class="goback" onclick="history.back(-1); return false;">
                <span class="hidden">뒤로가기</span>
            </button>
            지역별 공고문
        </div>

        <div class="w-Guide-Ssam mt20">

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
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_infant_seoul.pdf')."&fname=".urlencode('유아초등_서울.pdf')) }}" class="btn01">자료받기 ></a></td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_secondary_seoul.pdf')."&fname=".urlencode('중등_서울.pdf')) }}" class="btn01">자료받기 ></a></td>
                    </tr>
                    <tr>
                        <td>인천광역시</td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_infant_incheon.pdf')."&fname=".urlencode('유아초등_인천.pdf')) }}" class="btn01">자료받기 ></a></td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_secondary_incheon.pdf')."&fname=".urlencode('중등_인천.pdf')) }}" class="btn01">자료받기 ></a></td>
                    </tr>
                    <tr>
                        <td>대전광역시</td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_infant_deajeon.pdf')."&fname=".urlencode('유아초등_대전.pdf')) }}" class="btn01">자료받기 ></a></td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_secondary_deajeon.pdf')."&fname=".urlencode('중등_대전.pdf')) }}" class="btn01">자료받기 ></a></td>
                    </tr>
                    <tr>
                        <td>세종시</td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_infant_sejong.pdf')."&fname=".urlencode('유아초등_세종.pdf')) }}" class="btn01">자료받기 ></a></td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_secondary_sejong.pdf')."&fname=".urlencode('중등_세종.pdf')) }}" class="btn01">자료받기 ></a></td>
                    </tr>
                    <tr>
                        <td>광주광역시</td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_infant_gwangju.pdf')."&fname=".urlencode('유아초등_광주.pdf')) }}" class="btn01">자료받기 ></a></td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_secondary_gwangju.pdf')."&fname=".urlencode('중등_광주.pdf')) }}" class="btn01">자료받기 ></a></td>
                    </tr>
                    <tr>
                        <td>대구광역시</td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_infant_deagu.pdf')."&fname=".urlencode('유아초등_대구.pdf')) }}" class="btn01">자료받기 ></a></td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_secondary_deagu.pdf')."&fname=".urlencode('중등_대구.pdf')) }}" class="btn01">자료받기 ></a></td>
                    </tr>
                    <tr>
                        <td>울산광역시</td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_infant_ulsan.pdf')."&fname=".urlencode('유아초등_울산.pdf')) }}" class="btn01">자료받기 ></a></td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_secondary_ulsan.pdf')."&fname=".urlencode('중등_울산.pdf')) }}" class="btn01">자료받기 ></a></td>
                    </tr>
                    <tr>
                        <td>부산광역시</td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_infant_busan.pdf')."&fname=".urlencode('유아초등_부산.pdf')) }}" class="btn01">자료받기 ></a></td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_secondary_busan.pdf')."&fname=".urlencode('중등_부산.pdf')) }}" class="btn01">자료받기 ></a></td>
                    </tr>
                    <tr>
                        <td>경기도</td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_infant_gyeonggi.pdf')."&fname=".urlencode('유아초등_경기.pdf')) }}" class="btn01">자료받기 &gt;</a></td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_secondary_gyeonggi.pdf')."&fname=".urlencode('중등_경기.pdf')) }}" class="btn01">자료받기 &gt;</a></td>
                    </tr>
                    <tr>
                        <td>충청북도</td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_infant_chungbuk.pdf')."&fname=".urlencode('유아초등_충북.pdf')) }}" class="btn01">자료받기 &gt;</a></td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_secondary_chungbuk.pdf')."&fname=".urlencode('중등_충북.pdf')) }}" class="btn01">자료받기 &gt;</a></td>
                    </tr>
                    <tr>
                        <td>충청남도</td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_infant_chungnam.pdf')."&fname=".urlencode('유아초등_충남.pdf')) }}" class="btn01">자료받기 &gt;</a></td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_secondary_chungnam.pdf')."&fname=".urlencode('중등_충남.pdf')) }}" class="btn01">자료받기 &gt;</a></td>
                    </tr>
                    <tr>
                        <td>전라북도</td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_infant_jeonbuk.pdf')."&fname=".urlencode('유아초등_전북.pdf')) }}" class="btn01">자료받기 &gt;</a></td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_secondary_jeonbuk.pdf')."&fname=".urlencode('중등_전북.pdf')) }}" class="btn01">자료받기 &gt;</a></td>
                    </tr>
                    <tr>
                        <td>전라남도</td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_infant_jeonnam.pdf')."&fname=".urlencode('유아초등_전남.pdf')) }}" class="btn01">자료받기 &gt;</a></td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_secondary_jeonnam.pdf')."&fname=".urlencode('중등_전남.pdf')) }}" class="btn01">자료받기 &gt;</a></td>
                    </tr>
                    <tr>
                        <td>강원도</td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_infant_gangwon.pdf')."&fname=".urlencode('유아초등_강원.pdf')) }}" class="btn01">자료받기 &gt;</a></td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_secondary_gangwon.pdf')."&fname=".urlencode('중등_강원.pdf')) }}" class="btn01">자료받기 &gt;</a></td>
                    </tr>
                    <tr>
                        <td>경상북도</td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_infant_gyeongbuk.pdf')."&fname=".urlencode('유아초등_경북.pdf')) }}" class="btn01">자료받기 &gt;</a></td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_secondary_gyeongbuk.pdf')."&fname=".urlencode('중등_경북.pdf')) }}" class="btn01">자료받기 &gt;</a></td>
                    </tr>
                    <tr>
                        <td>경상남도</td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_infant_gyeongnam.pdf')."&fname=".urlencode('유아초등_경남.pdf')) }}" class="btn01">자료받기 &gt;</a></td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_secondary_gyeongnam.pdf')."&fname=".urlencode('중등_경남.pdf')) }}" class="btn01">자료받기 &gt;</a></td>
                    </tr>
                    <tr>
                        <td>제주도</td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_infant_jeju.pdf')."&fname=".urlencode('유아초등_제주.pdf')) }}" class="btn01">자료받기 ></a></td>
                        <td><a href="{{ site_url("/landing/download?path=".urlencode('/public/uploads/willbes/site/2018/download_secondary_jeju.pdf')."&fname=".urlencode('중등_제주.pdf')) }}" class="btn01">자료받기 ></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Topbtn -->
        @include('willbes.m.layouts.topbtn')

    </div>
    <!-- End Container -->
@stop