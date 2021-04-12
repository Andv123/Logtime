//fullscreen
function fullScreen() {
    if (!document.fullscreenElement && !document.mozFullScreenElement &&
        !document.webkitFullscreenElement && !document.msFullscreenElement ) {
        if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen();
        } else if (document.documentElement.msRequestFullscreen) {
            document.documentElement.msRequestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
            document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }
        document.getElementById('zoom-in').classList.remove('d-none');
        document.getElementById('zoom-out').classList.add('d-none');
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        }
        document.getElementById('zoom-out').classList.remove('d-none');
        document.getElementById('zoom-in').classList.add('d-none');
    }
}

//show push menu
$(document).ready(function () {
    var width = $(window).width();
    if (width < 992 && width > 320) {
        $('#push-menu').click(function () {
            $('.main-sidebar').show();
        });
        $('.brand-link').click(function () {
            $('.main-sidebar').hide();
        });
    }

    //toggle sidebar
    $('.menu__user').click(function () {
        $('.list__menu--user').toggle();
    });
    $('.menu__over-time').click(function () {
        $('.list__menu--over-time').toggle();
    });
    $('.menu__off-time').click(function () {
        $('.list__menu--off-time').toggle();
    });

    //hidden message error
    setTimeout(function(){
        $(".global").remove();
    }, 30000 );
});
