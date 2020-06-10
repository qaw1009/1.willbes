@extends('html.m.layouts.v2.master')

@section('content')

<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div id="Sticky" class="sticky-Title">
        <div class="sticky-Grid sticky-topTit">
            <div class="willbes-Tit NGEB p_re">   
                교수진소개
            </div>
        </div>
    </div>

    <ul class="Lec-Selected NG tx-gray">
        <li>
            <select id=" " name=" " title=" ">
                <option selected="selected">과목전체</option>
                <option value="">경제학</option>
                <option value="">행정법</option>
                <option value="">행정학</option>
            </select>
        </li>         
    </ul>
    
    <div class="profArea">
        <div class="subjectBox">
            <div class="subTitle">· 경제학</div>
            <ul>
                <li>
                    <a href="#none">
                        <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/prof_index_50769.png" alt="강사명">
                        <div>
                            <span>황종휴</span>
                            강사
                        </div>
                    </a>
                <li>
            </ul>
        </div>

        <div class="subjectBox">
            <div class="subTitle">· 행정법</div>
            <ul>
                <li>
                    <a href="#none">
                        <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50837/prof_index_50837.png" alt="강사명">
                        <div>
                            <span>김정일</span>
                            교수
                        </div>
                    </a>
                <li>
                <li>
                    <a href="#none">
                        <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50838/prof_index_50838.png" alt="강사명">
                        <div>
                            <span>박도원</span>
                            교수
                        </div>
                    </a>
                <li>
                <li>
                    <a href="#none">
                        <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50839/prof_index_50839_1578624621.png" alt="강사명">
                        <div>
                            <span>김기홍</span>
                            교수
                        </div>
                    </a>
                <li>
                <li>
                    <a href="#none">
                        <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50839/prof_index_50839_1578624621.png" alt="강사명">
                        <div>
                            <span>김기홍</span>
                            교수
                        </div>
                    </a>
                <li>
            </ul>
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