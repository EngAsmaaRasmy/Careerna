/**
 * Template Name: Scaffold - v4.7.0
 * Template URL: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */

//hange states related to country

function showHide() {

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    //Add Class Active
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({ opacity: 0 }, {
        step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
                'display': 'none',
                'position': 'relative'
            });
            next_fs.css({ 'opacity': opacity });
        },
        duration: 500
    });

    setProgressBar(++current);

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }
}
$(document).ready(function() {

    $('#btnSave').click(function() {
        $('.modal').modal('hide');
    });

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;


    setProgressBar(current);

    $(".next").click(function() {
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });
        setProgressBar(++current);
    });

    $(".previous").click(function() {

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });
        setProgressBar(--current);
    });

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        console.log(percent)
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }


    $(".submit").click(function() {
        return false;
    })

});

//yearpicker
$('.yearpicker').yearpicker({

    // Initial Year
    year: null,

    // Start Year
    startYear: null,

    // End Year
    endYear: null,

    // Element tag
    itemTag: 'li',

    // Default CSS classes
    selectedClass: 'selected',
    disabledClass: 'disabled',
    hideClass: 'hide',

    // Custom template
    template: `<div class="yearpicker-container">
                <div class="yearpicker-header">
                    <div class="yearpicker-prev" data-view="yearpicker-prev">&lsaquo;</div>
                    <div class="yearpicker-current" data-view="yearpicker-current">SelectedYear</div>
                    <div class="yearpicker-next" data-view="yearpicker-next">&rsaquo;</div>
                </div>
                <div class="yearpicker-body">
                    <ul class="yearpicker-year" data-view="years">
                    </ul>
                </div>
            </div>
    `,

});


// function for loading page
function loodFunction() {
    myVar = setTimeout(showPage, 1000);
}

function showPage() {
    document.getElementById("loader").style.display = "none";
    document.getElementById("myDiv").style.display = "block";
    document.getElementById("footer").style.display = "block";
}

//function for increase and decrease vacanice value
function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
}

function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('number').value = value;
}

//function for education 
function EducationSelected(selectedIndex) {
    console.log(selectedIndex)
    var bachelor = document.getElementById('bachelor');
    var master = document.getElementById('master');
    var doctorate = document.getElementById('doctorate');
    if (selectedIndex == 1) {
        bachelor.style.display = 'block';
        master.style.display = 'none';
        doctorate.style.display = 'none'
        $("#master :input").removeAttr('required');
        $("#doctorate :input").removeAttr('required');
    } else if (selectedIndex == 2) {
        bachelor.style.display = 'none';
        master.style.display = 'block';
        doctorate.style.display = 'none'
        $("#bachelor :input").removeAttr('required');
        $("#doctorate :input").removeAttr('required');
    } else if (selectedIndex == 3) {
        bachelor.style.display = 'none';
        master.style.display = 'none';
        doctorate.style.display = 'block'
        $("#bachelor :input").removeAttr('required');
        $("#master :input").removeAttr('required');
    } else {
        bachelor.style.display = 'none';
        master.style.display = 'none';
        doctorate.style.display = 'none'
        $("#bachelor :input").removeAttr('required');
        $("#master :input").removeAttr('required');
        $("#doctorate :input").removeAttr('required');
    }
}

function EducationSelectedDegree(selectedIndex) {
    console.log(selectedIndex)
    var bachelor = document.getElementById('bachelor');
    var master = document.getElementById('master');
    var doctorate = document.getElementById('doctorate');
    if (selectedIndex == 0) {
        bachelor.style.display = 'block';
        master.style.display = 'none';
        doctorate.style.display = 'none'
        $("#master :input").removeAttr('required');
        $("#doctorate :input").removeAttr('required');
    } else if (selectedIndex == 1) {
        bachelor.style.display = 'none';
        master.style.display = 'block';
        doctorate.style.display = 'none'
        $("#bachelor :input").removeAttr('required');
        $("#doctorate :input").removeAttr('required');
    } else if (selectedIndex == 2) {
        bachelor.style.display = 'none';
        master.style.display = 'none';
        doctorate.style.display = 'block'
        $("#bachelor :input").removeAttr('required');
        $("#master :input").removeAttr('required');
    } else {
        bachelor.style.display = 'none';
        master.style.display = 'none';
        doctorate.style.display = 'none'
        $("#bachelor :input").removeAttr('required');
        $("#master :input").removeAttr('required');
        $("#doctorate :input").removeAttr('required');
    }
}

$("#industries").on('select', function() {
    var error = document.getElementById('error');
    var values = $('#industries').val();
    if (values.length < 3) {
        error.style.display = 'block'
    } else {
        error.style.display = 'none'
    }
});

function employerValidateMyForm() {
    var values = $('#industries').val();
    if (values < 2) {
        return false;
    }
    return true;
}

function validateMyForm() {
    var jobValues = $('#jobTitles').val();
    var categoryValues = $('#categories').val();
    if (jobValues.length < 2 || categoryValues.length < 2) {
        return false;
    }
    return true;
}
$("#jobTitles").on('change', function() {
    var error = document.getElementById('jobError');
    var values = $('#jobTitles').val();
    console.log(values.length)
    if (values.length < 2) {
        error.style.display = 'block'
    } else {
        error.style.display = 'none'
    }
});
$("#categories").on('change', function() {
    var error = document.getElementById('categoryError');
    var values = $('#categories').val();
    console.log(values.length)
    if (values.length < 2) {
        error.style.display = 'block'
    } else {
        error.style.display = 'none'
    }
});

function ShowHideDiv(isCurrent) {
    var end = document.getElementById("end");
    if (isCurrent.checked) {
        end.style.display = 'none'
        $("#end :input").removeAttr('required');
    } else {
        end.style.display = 'block'
    }
    // end.style.display = isCurrent.checked ? "none" : "block";
}

function myFunction() {
    /* Get the text field */
    var copyTexts = document.getElementsByName("item[]");
    for (var i = 0; i < copyTexts.length; i++)
    // console.log(copyTexts[i].value)
        navigator.clipboard.writeText(copyTexts[i].value);

    var ele = document.getElementsByClassName("tooltiptext");
    for (var i = 0; i < ele.length; i++) {
        ele[i].innerHTML = 'Copied !';
    }
}

function outFunc() {
    var ele = document.getElementsByClassName("tooltiptext");
    for (var i = 0; i < ele.length; i++) {
        ele[i].innerHTML = 'Copy to clipboard';
    }
}

(function() {
    "use strict";

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
            return [...document.querySelectorAll(el)]
        } else {
            return document.querySelector(el)
        }
    }

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all)
        if (selectEl) {
            if (all) {
                selectEl.forEach(e => e.addEventListener(type, listener))
            } else {
                selectEl.addEventListener(type, listener)
            }
        }
    }

    /**
     * Easy on scroll event listener 
     */
    const onscroll = (el, listener) => {
        el.addEventListener('scroll', listener)
    }

    /**
     * Navbar links active state on scroll
     */
    let navbarlinks = select('#navbar .scrollto', true)
    const navbarlinksActive = () => {
        let position = window.scrollY + 200
        navbarlinks.forEach(navbarlink => {
            if (!navbarlink.hash) return
            let section = select(navbarlink.hash)
            if (!section) return
            if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
                navbarlink.classList.add('active')
            } else {
                navbarlink.classList.remove('active')
            }
        })
    }
    window.addEventListener('load', navbarlinksActive)
    onscroll(document, navbarlinksActive)

    /**
     * Scrolls to an element with header offset
     */
    const scrollto = (el) => {
        let header = select('#header')
        let offset = header.offsetHeight

        let elementPos = select(el).offsetTop
        window.scrollTo({
            top: elementPos - offset,
            behavior: 'smooth'
        })
    }

    /**
     * Toggle .header-scrolled class to #header when page is scrolled
     */
    let selectHeader = select('#header')
    if (selectHeader) {
        const headerScrolled = () => {
            if (window.scrollY > 100) {
                selectHeader.classList.add('header-scrolled')
            } else {
                selectHeader.classList.remove('header-scrolled')
            }
        }
        window.addEventListener('load', headerScrolled)
        onscroll(document, headerScrolled)
    }

    /**
     * Back to top button
     */
    let backtotop = select('.back-to-top')
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 100) {
                backtotop.classList.add('active')
            } else {
                backtotop.classList.remove('active')
            }
        }
        window.addEventListener('load', toggleBacktotop)
        onscroll(document, toggleBacktotop)
    }

    /**
     * Mobile nav toggle
     */
    on('click', '.mobile-nav-toggle', function(e) {
        select('#navbar').classList.toggle('navbar-mobile')
        this.classList.toggle('bi-list')
        this.classList.toggle('bi-x')
    })

    /**
     * Mobile nav dropdowns activate
     */
    on('click', '.navbar .dropdown > a', function(e) {
        if (select('#navbar').classList.contains('navbar-mobile')) {
            e.preventDefault()
            this.nextElementSibling.classList.toggle('dropdown-active')
        }
    }, true)

    /**
     * Scrool with ofset on links with a class name .scrollto
     */
    on('click', '.scrollto', function(e) {
        if (select(this.hash)) {
            e.preventDefault()

            let navbar = select('#navbar')
            if (navbar.classList.contains('navbar-mobile')) {
                navbar.classList.remove('navbar-mobile')
                let navbarToggle = select('.mobile-nav-toggle')
                navbarToggle.classList.toggle('bi-list')
                navbarToggle.classList.toggle('bi-x')
            }
            scrollto(this.hash)
        }
    }, true)

    /**
     * Scroll with ofset on page load with hash links in the url
     */
    window.addEventListener('load', () => {
        if (window.location.hash) {
            if (select(window.location.hash)) {
                scrollto(window.location.hash)
            }
        }
    });

    /**
     * Porfolio isotope and filter
     */
    window.addEventListener('load', () => {
        let portfolioContainer = select('.portfolio-container');
        if (portfolioContainer) {
            let portfolioIsotope = new Isotope(portfolioContainer, {
                itemSelector: '.portfolio-item',
                layoutMode: 'fitRows'
            });

            let portfolioFilters = select('#portfolio-flters li', true);

            on('click', '#portfolio-flters li', function(e) {
                e.preventDefault();
                portfolioFilters.forEach(function(el) {
                    el.classList.remove('filter-active');
                });
                this.classList.add('filter-active');

                portfolioIsotope.arrange({
                    filter: this.getAttribute('data-filter')
                });
                portfolioIsotope.on('arrangeComplete', function() {
                    AOS.refresh()
                });
            }, true);
        }

    });

    /**
     * Initiate portfolio lightbox 
     */
    const portfolioLightbox = GLightbox({
        selector: '.portfolio-lightbox'
    });

    /**
     * Portfolio details slider
     */
    new Swiper('.portfolio-details-slider', {
        speed: 400,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        }
    });

    /**
     * Testimonials slider
     */
    new Swiper('.testimonials-slider', {
        speed: 600,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },

            1200: {
                slidesPerView: 3,
                spaceBetween: 20
            }
        }
    });

    /**
     * Animation on scroll
     */
    window.addEventListener('load', () => {
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        })
    });

})()