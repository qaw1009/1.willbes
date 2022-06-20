@extends('html.m.layouts.v2.master')

@section('content')
<style type="text/css">
    .Section {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .Section img {width:100%; max-width:720px;}
    /*.Section a {border:1px solid #000}*/

    /* 유튜브영상 */
    .video-container {position:relative; padding-bottom:56.25%; padding-top:30px; height:0; overflow: hidden;}
    .video-container iframe,
    .video-container object,
    .video-container embed {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    .article5 > a{ display:block; width:80%; margin:0 auto; font-size:2.2vh; background:#000; color:#Fff; padding:2%; text-align:center; border-radius:30px;}
    .article5 .cs {font-size:1.8vh; margin-top:20px}
    .article5 .cs strong {color:#2364fe}
</style>
<!-- Container -->
<div id="Container" class="Container NSK mb40 job309007"> 
    <div class="Section" data-aos="fade-up">
        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2006/309007_bn01.jpg" title=""></a>
    </div>

    <div class="Section" data-aos="fade-up">
        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2006/309007_bn02.jpg" title=""></a>
    </div>

    <div class="Section" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/m/2006/309007_img01.jpg" title="">
    </div>

    <div class="Section" data-aos="fade-up">
        <div class="video-container-box">
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/CWs7EdhMWGQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <div class="Section article5" data-aos="fade-up">
        <div class="p_re">
            <img src="https://static.willbes.net/public/images/promotion/m/2006/309007_bn03.jpg" title="">
            <a href="http://job.willbes.net/m/pass/offLecture/index?cate_code=3184&campus_ccd=605013&course_idx=1464&subject_idx=2243" title="1차" style="position: absolute; left: 10.28%; top: 10.58%; width: 33.47%; height: 34.33%; z-index: 2;"></a>
            <a href="http://job.willbes.net/m/pass/offLecture/index?cate_code=3184&campus_ccd=605013&course_idx=1465&subject_idx=2244" title="2차" style="position: absolute; left: 55.83%; top: 10.58%; width: 33.47%; height: 34.33%; z-index: 2;"></a>
            <a href="http://job.willbes.net/m/pass/offLecture/index?cate_code=3184&campus_ccd=605013&course_idx=1466&subject_idx=2245" title="1+2차" style="position: absolute; left: 21.67%; top: 63.07%; width: 56.25%; height: 24.75%;z-index: 2;"></a>
        </div>
        <a href="https://job.willbes.net/pass/consult/visitConsult/index?s_campus=605013" target="_blank">📅 합격 상담 예약 👉</a>
        <div class="cs">손해평가사 자격증 문의 <strong>1544-1661</strong></div>
    </div>

</div>
<!-- End Container -->

<script>    

    
</script> 

@stop