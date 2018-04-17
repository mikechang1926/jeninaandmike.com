












function capitalise(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function showPage(hash) {
    var pageName = hash.replace('#', ''),
        $page = $('#_'+ pageName), // Map window hash to underscored page ID (underscore ensures page ID is not found by browser, so no jumping)
        $nav = $('#nav').find('> ul > li > a'),
        pre = '';


    $nav.removeClass('active');
    $($nav + '[href='+ hash +']').addClass('active');

    $('#pages').find('> li').removeClass('active');
    $page.addClass('active');

    if (pageName) {
        pre = capitalise(pageName) +' → ';
    }

    document.title = pre +'RefineSlide';

    _gaq.push(['_trackPageview', '/'+ hash]);
}

$(window).on('hashchange', function() {
    showPage(location.hash);
});

$(document).ready(function() {
    $('#images').refineSlide({
        transition : 'fade',
        onInit : function () {
            var slider = this.slider,
               $triggers = $('.translist').find('> li > a');

            $triggers.parent().find('a[href="#_'+ this.slider.settings['transition'] +'"]').addClass('active');

            $triggers.on('click', function (e) {
               e.preventDefault();

                if (!$(this).find('.unsupported').length) {
                    $triggers.removeClass('active');
                    $(this).addClass('active');
                    slider.settings['transition'] = $(this).attr('href').replace('#_', '');
                }
            });

            function support(result, bobble) {
                var phrase = '';

                if (!result) {
                    phrase = ' not';
                    $('#upper').find('div.bobble-'+ bobble).addClass('unsupported');
                    $('#upper').find('div.bobble-js.bobble-css.unsupported').removeClass('bobble-css unsupported').text('JS');
                }
            }

            support(this.slider.cssTransforms3d, '3d');
            support(this.slider.cssTransitions, 'css');
        },
        controls : 'arrows'
    });
    if (location.hash) { // If a page hash is navigated to directly
        showPage(location.hash);
    }


});