window.onscroll = function () { hideNavBar() };
window.onscroll = function () { minimizeNavBar() };

// _____________________PRE-LOADER_____________________=*/
var loader = document.getElementById("preloader-bg");
window.addEventListener("load", removePreLoader());

function removePreLoader() {
    loader.style.display = "none";
}
// -------------------PRE-LOADER-END-------------------*/


//// _____________________NAV-BAR-HIDE-ONSCROLL_____________________
// function hideNavBar() {
//     if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
//         document.getElementById("navbar").style.top = "-10px";
//         var prevScrollpos = window.pageYOffset;
//         window.onscroll = function () {
//             var currentScrollPos = window.pageYOffset;
//             if (prevScrollpos > currentScrollPos) {
//                 minimizeNavBar();
//                 document.getElementById("navbar").style.top = "0px";
//             } else {
//                 document.getElementById("navbar").style.top = "-80px";
//             }
//             prevScrollpos = currentScrollPos;
//         }
//     } else {
//         document.getElementById("navbar").style.top = "-10px";
//         var prevScrollpos = window.pageYOffset;
//         window.onscroll = function () {
//             var currentScrollPos = window.pageYOffset;
//             if (prevScrollpos > currentScrollPos) {
//                 document.getElementById("navbar").style.top = "0px";
//                 minimizeNavBar();
//             } else {
//                 document.getElementById("navbar").style.top = "-80px";
//                 minimizeNavBar();   
//             }
//             prevScrollpos = currentScrollPos;
//         }
//     }
// }
//// =========================NAV-BAR-HIDE-ONSCROLL-END===========================



// ============================NAV-BAR-ONSCROLL=================================
function minimizeNavBar() {

    // // ----------------------ONSCROLL-PROGRESS-BAR----------------------..
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById("mybar").style.width = scrolled + "%";
    document.getElementById("prog-container").style.zIndex = "50";
    // ----------------------.ONSCROLL-PROGRESS-BAR-END----------------------.

    if (document.body.scrollTop > 700 || document.documentElement.scrollTop > 700) {
        document.getElementById("prog-container").style.visibility = "visible";

        document.getElementById("second-navbar").style.display = "flex";
    }

    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {

        document.getElementById("logo").style.fontSize = "22px";
        document.getElementById("logo").style.lineHeight = "45px";

        document.getElementById("bar_container").style.fontSize = "18px";
        document.getElementById("bar_container").style.marginTop = "-18px";

        document.getElementById("nav-menu-ele").style.fontSize = "12px";
        document.getElementById("nav-menu-ele").style.height = "60px"; 
        
        document.getElementById("navbar").style.height = "45px";
        document.getElementById("navbar").style.boxShadow = " 0px 0px 40px #2b2b2b";
        document.getElementById("navbar").style.background = "#e9ebedcc";

        document.getElementById("login-container-l").style.display = "none";
        document.getElementById("login-container-sm").style.display = "flex";

        document.getElementById("back-to-top-switch").style.display = "block";





    } else {

        document.getElementById("logo").style.fontSize = "28px";
        document.getElementById("logo").style.lineHeight = "80px";

        document.getElementById("bar_container").style.fontSize = "22px";
        document.getElementById("bar_container").style.marginTop = "0px";

        document.getElementById("nav-menu-ele").style.fontSize = "16px";
        document.getElementById("nav-menu-ele").style.height = "80px";

        document.getElementById("prog-container").style.visibility = "hidden";

        document.getElementById("navbar").style.height = "80px";
        document.getElementById("navbar").style.boxShadow = "none";
        document.getElementById("navbar").style.background = "none";

        document.getElementById("second-navbar").style.display = "none";

        document.getElementById("login-container-sm").style.display = "none";
        document.getElementById("login-container-l").style.display = "flex";

        document.getElementById("back-to-top-switch").style.display = "none";

        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled = (winScroll / height) * 100;
        document.getElementById("mybar").style.width = scrolled + "%";
        document.getElementById("prog-container").style.zIndex = "50";
    }
}
// ============================NAV-BAR-ONSCROLL-END=============================*/  

jQuery(function ($) {

    $(".sidebar-dropdown > a").click(function () {
        $(".sidebar-submenu").slideUp(200);
        if (
            $(this)
                .parent()
                .hasClass("active")
        ) {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .parent()
                .removeClass("active");
        } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .next(".sidebar-submenu")
                .slideDown(200);
            $(this)
                .parent()
                .addClass("active");
        }
    });

    $("#close-sidebar").click(function () {
        $(".page-wrapper").removeClass("toggled");
    });
    $("#show-sidebar").click(function () {
        $(".page-wrapper").addClass("toggled");
    });

});


