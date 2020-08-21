@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; word-break: keep-all;}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .evt04{padding-bottom:100px}
    .evt04 p {color:#f26522; font-weight:bold; margin:20px 0 20px 10px; font-size:24px; text-align:left}
    .evt04 tr {border-bottom:1px solid #000;border-top:1px solid #000;}        
    .evt04 th,
    .evt04 td {padding:10px; font-size:16px; font-weight:bold; text-align:left; text-align:center;}
    .evt04 a {padding:10px 15px; color:#fff; background:#000; font-size:14px; display:block; border-radius:20px;}   

    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {        
        
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {

    }
    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>

<div id="Container" class="Container NSK c_both"> 
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1764m.jpg" alt="마무리특강" >
    </div> 

    @if(empty($arr_base['display_product_data']) === false)
        @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
    @endif

    <div class="evtCtnsBox evt04">
        <p>종합반</p> 
        <table>
            <col width="" />
            <col width="20%" />
            <tbody> 
                <tr>
                    <td class="tx-left">2020년 1차대비 마무리특강 패키지(오태진史)</td>
                    <td><a href="https://police.willbes.net/package/index/cate/3001/pack/648001?course_idx=1010" target="_blank">수강신청</a></td>
                </tr>
                <tr>
                    <td class="tx-left">2020년 1차대비 마무리특강 패키지(원유철史)</td>
                    <td><a href="https://police.willbes.net/package/index/cate/3001/pack/648001?course_idx=1010" target="_blank">수강신청</a></td>
                </tr>   
                <tr>
                    <td class="tx-left">2020년 1차대비 마무리특강 패키지(경행경채)</td>
                    <td><a href="https://police.willbes.net/package/index/cate/3002/pack/648001?course_idx=1010" target="_blank">수강신청</a></td>
                </tr>            
            </tbody>
        </table> 
    </div>
<!-- End Container -->

@stop