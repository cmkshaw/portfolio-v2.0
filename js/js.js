//http://stackoverflow.com/questions/8755887/jquery-change-background-color-user-scroll
var tStart = 100 // Start transition 100px from top
,
    tEnd = 4000 // End at 500px
    ,
    cStart = [113, 216, 201] // Gold
    ,
    cEnd = [255, 0, 0] // Lime
    ,
    cDiff = [cEnd[0] - cStart[0], cEnd[1] - cStart[1], cEnd[1] - cStart[0]];
$(document).ready(function() {
    $(document).scroll(function() {
        var p = ($(this).scrollTop() - tStart) / (tEnd - tStart); // % of transition
        p = Math.min(1, Math.max(0, p)); // Clamp to [0, 1]
        var cBg = [Math.round(cStart[0] + cDiff[0] * p), Math.round(cStart[1] + cDiff[1] * p), Math.round(cStart[2] + cDiff[2] * p)];
        //$("#logo").css('background-color', 'rgb(' + cBg.join(',') +')');
        $(".scroll").css('background-color', 'rgb(' + cBg.join(',') + ')');
        $(".hover").css('background-color', 'rgb(' + cBg.join(',') + ')');
        $(".resumepop").css('background-color', 'rgb(' + cBg.join(',') + ')');
        //$("#logo a").css('color', 'rgb(' + cBg.join(',') +')');
    });
    var $test2 = $(".resumepop");
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $test2.stop().animate({
                right: "-5px"
            }, 500);
        } else {
            $test2.stop().animate({
                right: "-99px"
            }, 500);
        }
    });
    $(".nav-button").click(function() {
        $(".nav-button,.primary-nav").toggleClass("open");
    });

     
});
