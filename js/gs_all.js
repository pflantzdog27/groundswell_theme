if(!GS){
    var GS = {}
}


/* ===========================================
        FUNCTIONS
// ========================================== */

GS.navigation = new function(){
    var searchButton = $('.search-toggle');
    var form = $('#primary-search-field')

    this.searchDisplay = function() {
        searchButton.click(function(e) {
            e.preventDefault()
            form.slideToggle(400);
        })
    };

    this.navigateDown = function() {
        $("#get-started").click(function() {
            var scrollHere = parseInt($("#sub-intro-section").offset().top);
            $('html, body').animate({
                scrollTop: scrollHere - 0
            }, 600);
        });
    };

    this.backToTop = function() {
        $("#back-top").click(function() {
            var scrollHere = parseInt($("#intro-section-wrapper").offset().top);
            $('html, body').animate({
                scrollTop: scrollHere
            }, 600);
        });
    };

    this.navigationBoxShadow = function() {
        $('#primary-navigation-wrapper').css('box-shadow', 'none');
        if($('.content-section').eq(0).length > 0) {
            var distance = $('.content-section').eq(0).offset().top;
            var offset = 0;
            $(window).scroll(function () {
                if ($(window).scrollTop() >= distance - offset) {
                    $('#primary-navigation-wrapper').css('box-shadow', '0px 1px 8px 0px rgba(0, 0, 0, 0.6)');
                } else {
                    $('#primary-navigation-wrapper').css('box-shadow', 'none');
                }
            });
        }
    }

};

GS.forms = new function() {
    submitted = false;
    this.emailSubscription = function() {
        $('#hidden_iframe').load(function(){
            if(submitted == true){
                $('#email-subscription form').hide(300,function() {
                    $('<p></p>').addClass('alert alert-success').html('<i class="icon-checkmark"></i>Short confirmation message here').appendTo('#email-subscription');
                });
            }
        });
    }
};

GS.backgroundVideo = new function() {
    this.sizingFunction = function() {
        var videoID = 'homepage-videoBG';
        var myPlayer = videojs(videoID);
        var aspectRatio = 4/9.4;
        var width = document.getElementById(videoID).parentElement.offsetWidth;
        myPlayer.width(width).height( width * aspectRatio );
        $('#hero').find('.container').height(width * aspectRatio);

        videojs(videoID).ready(function(){


            function resizeVideoJS(){
                var width = document.getElementById(videoID).parentElement.offsetWidth;
                myPlayer.width(width).height( width * aspectRatio );
            }
            window.onresize = resizeVideoJS;

            // end of video function
            this.on("ended", function(){
                myPlayer.pause();
                myPlayer.posterImage.show();
                $('#playback-control').removeClass('icon-pause').addClass('icon-play');
                isPlaying = false;
            });

            // pause/pause video
            var isPlaying = !myPlayer.paused();
            $('#playback-control').click(function() {
                if(isPlaying == true) {
                    myPlayer.pause();
                    $(this).removeClass('icon-pause').addClass('icon-play');
                    isPlaying = false;
                } else {
                    myPlayer.play();
                    myPlayer.posterImage.hide();
                    $(this).removeClass('icon-play').addClass('icon-pause');
                    isPlaying = true;
                }
            })
        });
    }
};

GS.teamDisplay = new function() {
    var teamMember = $('#team-graphic li');
    this.clickAction = function() {
        teamMember.click(function() {
            if($(this).hasClass('active')){
                $('#team-member-bio').slideUp(300);
                $(this).removeClass('active');
            } else {
                var hiddenHtml = $(this).find('.hidden').html();
                teamMember.find('h4').css({color: '#44aeea'});
                teamMember.removeClass('active');
                $(this).find('h4').css({color: '#ea5a3a;'});
                teamMember.find('img').animate({opacity: 0.7}, 400);
                $(this).addClass('active');
                $('#team-member-bio').slideDown(300).html(hiddenHtml);

                if ($(window).width() < 768) {
                    var scrollHere = parseInt($("#team-member-bio").offset().top);
                    $('html, body').animate({
                        scrollTop: scrollHere - 60
                    }, 500);
                }

                if ($('#team-member-bio').length <= 0) {
                    $('#team-member-bio').html(hiddenHtml).slideDown(300);
                } else {
                    $('#team-member-bio').html(hiddenHtml);
                }
            }
        });
    };

    this.hoverAction = function() {
        teamMember.hover(function() {
            $(this).find('h4').stop().css({'border-top' : '5px solid #ea5a3a', color : '#ea5a3a'});
        },function() {
            $(this).find('h4').stop().css({'border-top' : '5px solid #44aeea', color : '#44aeea'});
        })
    };
};

GS.scrolloramaEffects = new function() {
    var controller = $.superscrollorama({
        triggerAtCenter: false,
        playoutAnimations: true
    });

    this.mainNavBackground = function() {
        var tweeningElement = '#sub-intro-section'
        var heightOfTweeningElement = $(tweeningElement).innerHeight();
        controller.addTween(
            tweeningElement,
            (new TimelineLite())
                .append([
                    TweenMax.fromTo($('#primary-navigation-wrapper'),.1,
                        {css: {'background-color': 'rgba(68,174,234,0)'}, immediateRender: true},
                        {css: {'background-color': 'rgba(68,174,234,1)'}})
                ]),
            heightOfTweeningElement);
    };

    this.introSection = function() {
        var heightOfTweeningElement = $('#intro-section-wrapper').innerHeight();
        controller.addTween(
            '#intro-section-wrapper',
            (new TimelineLite())
                .append([
                    TweenMax.fromTo($('.jumbotron'), 1,
                        {css: {top: 0}, immediateRender: true},
                        {css: {top: -150}}),
                    TweenMax.fromTo($('#get-started'), 1,
                        {css: {bottom: 0}, immediateRender: true},
                        {css: {bottom: -100}}),
                    TweenMax.fromTo($('#sub-intro-section'), 1,
                        {css: {'padding-top': 75}, immediateRender: true},
                        {css: {'padding-top': 50}}),
                    TweenMax.fromTo($('#back-top'), 1,
                        {css: {opacity: 0}, immediateRender: true},
                        {css: {opacity: 1}})
                ]),
            heightOfTweeningElement);
    };

    this.trainings = function() {
        var heightOfTweeningElement = $('#training').innerHeight();
        controller.addTween(
            '#training',
            (new TimelineLite())
                .append([
                    TweenMax.fromTo($('.icon-comment'), 1,
                        {css: {top: 30}, immediateRender: true},
                        {css: {top: -45}})
                ]),
            heightOfTweeningElement);
    };

    this.parallax = function(tweeningElement) {
        $(tweeningElement).each(function() {
            var contentSection = $(this).parent('section').attr('id');
            var heightOfTweeningElement = $('#'+contentSection).innerHeight();
            controller.addTween(
                tweeningElement,
                (new TimelineLite())
                    .append([
                        TweenMax.fromTo($('#'+contentSection).find('.parallax'), .3,
                            {css: {top: 0}, immediateRender: true},
                            {css: {top: -100}})
                    ]),
                heightOfTweeningElement);
        });
    };

    this.zoom = function(tweeningElement) {
        var heightOfTweeningElement = $(tweeningElement).innerHeight();
        controller.addTween(
            tweeningElement,
            (new TimelineLite())
                .append([
                    TweenMax.fromTo($(tweeningElement+ ' .parallax'), .1 ,
                        {css:{zoom: 1 }, immediateRender:true},
                        {css:{zoom: 1.3}})
                ]),
            heightOfTweeningElement);
    };

    this.talk_to_us = function(tweeningElement) {
        controller.addTween(
            tweeningElement,
            (new TimelineLite())
                .append([
                    TweenMax.fromTo($(tweeningElement+ ' .company-meta-block:nth-child(0)'), .1 ,
                        {css:{'padding-left' : 15 }, immediateRender:true},
                        {css:{'padding-left' : 0}}),
                    TweenMax.fromTo($(tweeningElement+ ' .company-meta-block:nth-child(1)'), .1 ,
                        {css:{'padding-right' : 15 }, immediateRender:true},
                        {css:{'padding-right' : 0}}),
                    TweenMax.fromTo($(tweeningElement+ ' #contact-form'), .1 ,
                        {css:{'padding-top' : 15 }, immediateRender:true},
                        {css:{'padding-top' : 0}}),
                    TweenMax.fromTo($(tweeningElement+ ' .large-icon'), .1 ,
                        {css:{zoom: 0.8 }, immediateRender:true},
                        {css:{zoom: 1}})
                ]),
            100);
    };

    this.steps = function(tweeningElement) {
        $(tweeningElement).each(function() {
            var contentSection = $(this).parent('section').attr('id');
            console.log(contentSection);
            var heightOfTweeningElement = $('#'+contentSection).innerHeight();
            controller.addTween(
                '#'+contentSection,
                (new TimelineLite())
                    .append([
                        TweenMax.fromTo($('#'+contentSection).find('.section-number'),1 ,
                            {css:{top: 70 }, immediateRender:true},
                            {css:{top: '80%'}}),
                        TweenMax.fromTo($('#'+contentSection).find('.parallax'), .5 ,
                            {css:{top: 0 }, immediateRender:true},
                            {css:{top: -50}})
                    ]),
                heightOfTweeningElement);
        });
    };

    this.blog_single_video = function(section) {
        controller.addTween(
            section,
            (new TimelineLite())
                .append([
                    TweenMax.fromTo($('.social-link-bar ul li'),.1,
                        {css: {'padding-left': 15, 'padding-right': 15 }, immediateRender: true},
                        {css: {'padding-left': 0, 'padding-right': 0}}),
                    TweenMax.fromTo($('.social-link-bar ul li a'),.1,
                        {css: {'padding-top': 8, 'padding-bottom': 8 }, immediateRender: true},
                        {css: {'padding-top': 15, 'padding-bottom': 15}})
                ]),
            100, false);
    };



    this.stats = function(section) {
        var counterShares;
        var counterViews;
        var counterHours;
        controller.addTween(
            section,
            (new TimelineLite())
                .append([
                    TweenMax.fromTo($(section+ ' li:eq(0)'),.1,
                        {css: { top : '50%' }, immediateRender: true},
                        {css: { top: '50%' },onComplete: function(){
                            if(counterViews != 'complete') {
                                GS.landingPages.statCounter('page-views')
                            }
                            counterViews = 'complete';
                        }}),
                    TweenMax.fromTo($(section+ ' li:eq(1)'),.3,
                        {css: { top : '50%' }, immediateRender: true},
                        {css: { top: '80%'},onComplete: function(){
                            if(counterShares != 'complete') {
                                GS.landingPages.statCounter('shares')
                            }
                            counterShares = 'complete';
                        }}),
                    TweenMax.fromTo($(section+ ' li:eq(2)'),.1,
                        {css: { top : '50%' }, immediateRender: true},
                        {css: { top: '50%' },onComplete: function(){
                            if(counterHours != 'complete') {
                                GS.landingPages.statCounter('hours')
                            }
                            counterHours = 'complete';
                        }}),

                    TweenMax.fromTo($('.circle'),.5,
                        {css: {'font-size': 20 }, immediateRender: true},
                        {css: {'font-size': 45, width: 100, height: 100, 'border-radius' : 50, 'margin-top': -50}}),
                    TweenMax.fromTo($('.circle:eq(0), .circle:eq(1)'),.5,
                        {css: {'background': 'rgb(68,174,234)' }, immediateRender: true},
                        {css: {'background': 'rgb(234,90,58)'}}),

                    TweenMax.fromTo($('.circle abbr'),.5,
                        {css: {'margin-top': -25 }, immediateRender: true},
                        {css: {'margin-top': -45}}),
                    TweenMax.fromTo($('.connecting-line:eq(0)'),.3,
                        {css: {rotation: 0, 'border-color': 'rgb(68,174,234)' }, immediateRender: true},
                        {css: {rotation: 20, width: 100, left: 130, 'border-color': 'rgb(234,90,58)'}}),
                    TweenMax.fromTo($('.connecting-line:eq(1)'),.3,
                        {css: {rotation: 0 }, immediateRender: true},
                        {css: {rotation: -20, left: 300, width: 100}})
                ]),
            100, false);
    };
    this.columnSections = function() {
        controller.addTween(
            '#sub-intro-section',
            (new TimelineLite())
                .append([
                    TweenMax.fromTo($('#column-buckets article header'), 1,
                        {css: {'padding-top': 5, 'padding-bottom' : 5 }, immediateRender: true},
                        {css: {'padding-top': 20, 'padding-bottom' : 20}}),
                    TweenMax.fromTo($('#column-buckets article header h2'),.5,
                        {css: {'font-weight': 300 }, immediateRender: true},
                        {css: {'font-weight': 700}})
                ]),
            100, false);
    }
};

GS.petitions = new function() {
    var categorySlug = 'featured';
    var catSelectorButton = $('#cat-selector');
    var petitionWrapperID = '#petitions';
    var petitions = $(petitionWrapperID);
    this.petitionsGenerator = function(){
        var galleryTemplate = $('#petitionsLayout').html();
        var petitionList = [];
        var jsonRequest = $.getJSON('http://action.groundswell-mvmt.org/'+categorySlug+'.json?callback=?', function (data) {
            var displayLimit = 0;
            if(categorySlug == 'featured'){
                var dataObject = data;
            } else {
                var dataObject = data.results;
            }
            $.each(dataObject, function (i, item) {
                if (displayLimit <= 3) {
                    var percentage = (item.signature_count / item.goal) * 100;
                    var fromNow = moment(item.created_at).fromNow();
                    petitionList.push({
                        title: item.title,
                        signatures: item.signature_count,
                        goal: item.goal,
                        image : item.image,
                        url: item.url,
                        slug: item.slug,
                        creator: item.creator_name,
                        created_date: fromNow,
                        percent: percentage,
                        why: item.why,
                        index : displayLimit
                    })
                    displayLimit++
                } else {
                    return true;
                }
            });
        })
            .done(function () {
                if($('.mCSB_container').length > 0) {
                    petitions.find('.item').hide();
                    petitions.find('.mCSB_container').prepend(Mustache.render(galleryTemplate, petitionList));
                    petitions.mCustomScrollbar("update"); //update scrollbar according to newly loaded content
                    petitions.mCustomScrollbar("scrollTo","top",{scrollInertia:200}); //scroll to top
                    $('#loading-image').fadeOut(300,function() {
                        $(this).remove();
                    })
                } else {
                    petitions.prepend(Mustache.render(galleryTemplate, petitionList));
                }
            })
            // error handling here
            .fail(function () {
                console.log("Error");
            });
    };

    this.categoryGenerator = function(){
        var galleryTemplate = $('#categoryLayout').html();
        var list = [];
        var jsonRequest = $.getJSON('http://action.groundswell-mvmt.org/categories.json?callback=?', function (data) {
            $.each(data, function (i, item) {
                list.push({
                    slug: item.slug,
                    category : item.category_name
                })
            });
        })
        .done(function () {
                $('#loading-image').fadeOut(300,function() {
                    $(this).remove();
                })
                $('#cat-list').prepend(Mustache.render(galleryTemplate, list));
        })
        // error handling here
        .fail(function () {
            console.log("Error");
        });
    };
    this.scrollBar = function() {
        $('.scroll-area').mCustomScrollbar( {
            theme:"dark"
        });
    };
    this.slideToggleCats = function() {
        $('#petition-wrap').on('click','#cat-selector', function() {
            $('#cat-list').slideToggle(300);
            catSelectorButton.find('b').toggleClass('icon-arrow-down, icon-arrow-up');
            if($('#cat-list > li').length == 0) {
                $('<div></div>').attr('id','loading-image').appendTo('#cat-list');
                GS.petitions.categoryGenerator();
            }
        });
    };
    this.selectCategory = function() {
        $('#petition-wrap').on('click','#cat-list li', function() {
            catSelectorButton.find('b').toggleClass('icon-arrow-down, icon-arrow-up');
            catSelectorButton.find('span').text($(this).text());
            $('#cat-list').slideToggle(300);
            categorySlug = $(this).attr('data-value');
            $('<div></div>').attr('id','loading-image').appendTo('#cat-list');
            GS.petitions.petitionsGenerator();
        });
    }

    this.modalWindow = function() {
        $('#petition-wrap').on('click','.sign-init', function() {
            var action = $(this).next('a').attr('href');
            $('#petition-form').find('form').attr('action',action+'/signatures');
        })
    }

};

GS.sectionHacks = new function() {
    this.evenLengthColumns = function() {
        var bigbrother = -1;
        var columnBuckets = $('#column-buckets article');

        columnBuckets.each(function () {
            bigbrother = bigbrother > columnBuckets.height() ? bigbrother : columnBuckets.height();
        });

        columnBuckets.each(function () {
            columnBuckets.height(bigbrother + 50);
        });
    }


};

GS.blog = new function() {

    this.affixSocialIcons = function() {
        var distance = $('#blog-left-column').offset().top;
        var height = $('#blog-left-column').height();
        var $window = $(window);

        $window.scroll(function() {
            if ( $window.scrollTop() >= height -350 ) {
                $(".social-link-column").addClass('unfreeze');
                $('.unfreeze').css({position:'absolute',top: height-250, width: '75%'})
            } else {
                $('.unfreeze').css({position:'fixed',top: '90px', width: '5%'})
            }
        });
    }

    this.selectMenu = function() {
        $('.select-box').click(function() {
            $('.select-options').slideToggle(300);
            $(this).find('b').toggleClass('icon-arrow-down, icon-arrow-up');
        })

        $('.select-options li a').click(function(e) {
            e.preventDefault();
            var cat = $(this).text(),
                catLink = $(this).attr('href'),
                catSlug = catLink.split("category/").pop();
            $('.select-box').find('b').toggleClass('icon-arrow-down, icon-arrow-up');
            $('.select-options').slideToggle(300);
            $('.select-box span').text(cat);

            GS.blog.mustacheTemplating('get_category_posts/?category_slug='+catSlug);
        })
    }


    this.mustacheTemplating = function(requestDetails) {
        //USE THIS IN PRODUCTION ----- var baseURL = window.location.protocol + "//" + window.location.host + "/";
        var wrapper =  $('#blog-post-index');
        var api = 'http://localhost/groundswell/redesign_wordpress/' + 'api/' + requestDetails;
        $('.blog-post').remove();
        wrapper.find('.loading').fadeIn(300);
        // ajax request
        $.getJSON(api, function (data) {
            var templateData = [];
            $.each(data.posts, function (i, item) {
                templateData.push({
                    title: item.title,
                    url : item.url,
                    image: item.thumbnail_images.medium.url,
                    excerpt: item.custom_fields.blog_posts_excerpt,
                    author : item.author.name,
                    postType: item.custom_fields.blog_posts_post_type,
                    tags : []
                });
                $.each(item.tags, function (index, object) {
                    var link = '/tag/'+ object.slug;
                    templateData[i].tags.push({
                        tagName : object.title,
                        tagID : object.id,
                        tagUrl : link
                    });
                });
            });
            var galleryTemplate = $('#blog-post-template').html();
            wrapper.append(Mustache.render(galleryTemplate, templateData));
            wrapper.find('.loading').fadeOut(300);
        });
    }

};

GS.landingPages = new function() {
    this.statCounter = function(element) {
        var endAt = $('#'+element).parent('abbr').parent('.circle').attr('data-count');
        $('#'+element).countTo({
            from: 0,
            to: endAt,
            speed: 2000,
            refreshInterval: 300,
            onComplete: function(value) {
                //
            }
        });
    };

    this.FAQ = function() {
        var plusMinusIcon = '#faq li > span';
        $(plusMinusIcon + ', .faq-question').click(function() {

            $(this).parent('li').find('.faq-question').toggleClass('active');
            $(this).parent('li').find('span').toggleClass('icon-minus , icon-plus');
            $(this).parent('li').find('.faq-answer').slideToggle(300);
        })
    }
};

GS.carousel = new function() {
    this.carouselInit = function(element) {
        // init carousel
        var theCarousel = $(element);
        theCarousel.carousel({
            interval: false,
            wrap: false
        });
    };

    this.toggleTextDisplay = function() {
        $('#toggle-display').click(function() {
            $('.text-overlay').slideToggle(300);
            $('#toggle-display').find('i').toggleClass('icon-minus, icon-plus');
        })
    }

};

/* ===========================================
    DOCUMENT READY FUNCTIONS
 // ========================================== */

$(function() {

    var bodyClass = $('body').attr('class');

    GS.navigation.searchDisplay();
    GS.forms.emailSubscription();


    if($('#petition-wrap').length > 0) { // IF PETITIONS EXIST ON THE PAGE
        GS.petitions.slideToggleCats();
        GS.petitions.selectCategory();
        GS.petitions.petitionsGenerator();
        GS.petitions.modalWindow();
        GS.scrolloramaEffects.parallax('#petition-wrap');
        $(window).load(function(){
            GS.petitions.scrollBar();
        });
    }

    if($('.parallax').length > 0) { // IF PARALLAX EXISTS ON THE PAGE
        GS.scrolloramaEffects.parallax('.parallax');
    }


    if($('body').hasClass('page-template-landing-page')) { // LANDING PAGES (previously WHO WE ARE)
        GS.scrolloramaEffects.mainNavBackground();
        GS.navigation.navigationBoxShadow();
        GS.teamDisplay.clickAction();
        GS.teamDisplay.hoverAction();
        GS.carousel.carouselInit('.carousel');
        GS.scrolloramaEffects.parallax('.parallax');
        GS.navigation.navigateDown();
        GS.navigation.backToTop();
        GS.scrolloramaEffects.introSection();
        if($('.section-number').length > 0) {
            GS.scrolloramaEffects.steps('.section-number');
        }
        if($(window).width() > 768 && $('.video-js').length > 0) {
            GS.backgroundVideo.sizingFunction();
        }
    }

    if($('body').hasClass('blog')) { // BLOG INDEX (previously just blog-index)
        GS.blog.selectMenu();
        GS.blog.mustacheTemplating('get_recent_posts/?count=6');
    }



    if(bodyClass == 'inspiration') { // INSPIRATION
        GS.scrolloramaEffects.stats('#landing-page-content');
        GS.scrolloramaEffects.mainNavBackground();
        GS.navigation.navigationBoxShadow();
        GS.scrolloramaEffects.zoom('#get-updates');
        GS.scrolloramaEffects.blog_single_video('#get-updates');
    }

    if(bodyClass == 'what-we-do') { // WHAT WE DO
        GS.scrolloramaEffects.mainNavBackground();
        GS.navigation.navigationBoxShadow();
        if ($(window).width() > 768) {
            GS.sectionHacks.evenLengthColumns();
        }
        GS.scrolloramaEffects.parallax('#slider-wrapper');
        //GS.scrolloramaEffects.columnSections();
        GS.carousel.carouselInit('#full-width-slider');
        GS.carousel.toggleTextDisplay();
    }

    if(bodyClass == 'home') { // JUST THE HOME
        //scrollorama
        GS.scrolloramaEffects.steps('#action');
        GS.scrolloramaEffects.steps('#training');
        GS.scrolloramaEffects.steps('#inspiration');
        GS.scrolloramaEffects.parallax('#blog');
        GS.scrolloramaEffects.parallax('#team');
        GS.scrolloramaEffects.parallax('#partners');
        GS.scrolloramaEffects.trainings();
    }


    if(bodyClass == 'action') { // ACTION
        GS.scrolloramaEffects.mainNavBackground();
        GS.navigation.navigationBoxShadow();
        GS.carousel.carouselInit('#full-width-slider');
        GS.scrolloramaEffects.parallax('#slider-wrapper');
        GS.landingPages.FAQ();
    }

    if(bodyClass == 'trainings') { // TRAININGS
        GS.scrolloramaEffects.mainNavBackground();
        GS.navigation.navigationBoxShadow();
        GS.landingPages.FAQ();
        GS.teamDisplay.clickAction();
        GS.teamDisplay.hoverAction();
    }


    if(bodyClass == 'talk-to-us') { // Talk to US
        GS.scrolloramaEffects.talk_to_us('.talk-to-us');
    }

    if(bodyClass == 'blog-two-columns') { // BLOG REG
        GS.blog.selectMenu();
        GS.blog.affixSocialIcons();
        GS.scrolloramaEffects.blog_single_video('.blog-two-columns');
    }

    if(bodyClass == 'blog-single-video') { // Blog VIDEO
        GS.scrolloramaEffects.blog_single_video('.blog-single-video');
        GS.blog.selectMenu();
    }







    // MOVE EVERYTHING BELOW HERE!!!

    $('.fancybox').fancybox();

    $('.navbar-toggle').click(function() {
        var windowHeight = $(window).height();
        if($('.collapse.in').length == 0) {
            $('#primary-navigation').addClass('menu-expanded');
            setTimeout(function() {
                $('body > *').animate({'margin-left': '-190px', 'margin-right': '190px'}, 500);
                $('#primary-navigation').height(windowHeight);
                $('.menu-expanded').animate({right: 0},500);
            }, 1);

        } else {
            $('body > *').animate({'margin-left': '0', 'margin-right': '0'}, 500);
            $('.menu-expanded').animate({right: '-190px'},500);
            $('#primary-navigation').removeClass('menu-expanded');
        }
    })







});



