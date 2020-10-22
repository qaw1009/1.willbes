{!! $data['ContentM'] or $data['Content'] !!}

<script>
    $(document).on("click","#ssam_guide_tab li",function (){
       var num = $(this).index() + 1;
       $("#ssam_guide_tab li a").removeClass("on");
       $("a",this).addClass("on");
       $(".ssam_guide_group").css({"visibility":"hidden","height":"0px","overflow":"hidden"});
       $("#ssam_guide" + num).css({"display":"block","visibility":"visible","height":"auto","overflow":"visible"});
    });
</script>
