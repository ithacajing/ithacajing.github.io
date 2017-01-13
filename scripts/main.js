
//    <!-- MixItUp script -->
//    <script>
        $(function () {
            $('#Container').mixItUp();
        });
//    </script>

//    <!-- Smooth scroll adapted from CSS-tricks -->
//    <!--adding highlight current tab with scroll, I think it should be here right, Sam?-->
//    <script>
        $(function () {
            $('a[href*=#]:not([href=#])').click(function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    console.log(target.offset().top);
                    if (target.length) {
                        $('html,body').animate({
                            scrollTop: target.offset().top-162 //subtract 200 for the space taken up by the fixed navbar
                        }, 1000);
                        return false;
                    }
                }
            });
            
            $(window).scroll(function() {
                var sections = $('a[href*=#]:not([href=#])');
                highlighted = false;
                sections.get().reverse().forEach(function(link) {
                    var target = $(link.hash);
                    if (target.length && !highlighted && target.offset().top < ($(window).scrollTop() + $(window).height()/2)) {
                        $(link).parent().addClass("navActive");
                        highlighted = true;
                    } else {
                        $(link).parent().removeClass("navActive");
                    }
                });
                var websiteContext = window.location.href.substring(0, window.location.href.lastIndexOf("/") + 1).replace("projects/", "");
                if ($(document).scrollTop() > 100) {
                    $('nav, .navbar-brand').addClass('shrink');
                    $('#yqLogo').attr("src", websiteContext + "img/thumbnails/YQ_shrink.png");
                    $('.navHome').removeClass('beforeShrink');

                    //$('#yqLogo').attr("src","img/thumbnails/yq_small.png");
                } else {
                    $('nav, .navbar-brand').removeClass('shrink');
                    $('#yqLogo').attr("src", websiteContext + "img/thumbnails/YQ.png");
                    $('.navHome').addClass('beforeShrink');
                    $('.navHome').removeClass('navActive');
                }
            });
        });


            

//    </script>

