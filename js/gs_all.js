if(!GS){
    var GS = {}
}


if($('#single-row-blogs').length > 0 ) {
    GS.postCount = 3;
    GS.startCat = $('#single-row-blogs').attr('data-start-cat');
} else {
    GS.postCount = 6;
}
GS.apiCall = 'get_recent_posts/?count='+GS.postCount;
GS.wrapper = '#blog-post-index';
GS.template = '#blog-post-template';
GS.pageNumber = 1;


GS.displayPosts = function() {
    GS.loadPosts();
};

GS.changePostCategory = function(slug) {
    GS.resetPosts();
    GS.apiCall = 'get_category_posts/?category_slug='+slug+'&count='+GS.postCount+'&status=publish';
    GS.loadPosts();
};

$('body').on('click','.most-recent-toggle', function() {
    $(this).remove();
    $('.select-box span').html('<i class="hidden-xs">—</i> Most Recent Posts <i class="hidden-xs">—</i>');
    GS.resetPosts();
    GS.apiCall = 'get_recent_posts/?count='+GS.postCount;
    GS.loadPosts();
});

GS.loadMorePosts = function() {
    if(GS.pageNumber < GS.numberOfPages) {
        GS.pageNumber++;
        GS.apiCall += '&page=' + GS.pageNumber;
        GS.loadPosts();
    }
};

GS.resetPosts = function() {
    $(GS.wrapper).find('.blog-post').fadeOut(300, function() {
        $('.blog-post').remove();
    })
    $(GS.wrapper).css('height','auto');
    GS.pageNumber = 1;
    GS.numberOfPages = 1;
    $('#load-more-posts').fadeIn(300);
};

GS.getStartCategory = function() {
    GS.apiCall = 'get_category_posts/?category_slug='+GS.startCat+'&count='+GS.postCount+'&status=publish';
    GS.startCat = 'none';
}

GS.loadPosts = function() {
    if(GS.startCat != 'none' && GS.startCat != undefined && GS.startCat != 'uncategorized') {
        GS.getStartCategory();
    }
    $('<div></div>').attr('id', 'blog-loading').appendTo(GS.wrapper);
    $('#no-content-message').remove();
    var baseURL;
    var environment = window.location.protocol + "//" + window.location.host;
    if(environment == 'http://localhost') {
        var baseURL = environment+'/groundswell/redesign_wordpress';
    } else if(environment == 'http://shmishing.com') {
        var baseURL = environment+'/groundswell-wordpress';
    } else {
        baseURL = environment;
    }
    var api = baseURL + '/api/' + GS.apiCall;
    var templateData = [];
    $.getJSON(api, function (data) {
        GS.numberOfPages = data.pages;
        $.each(data.posts, function (i, item) {
            var itemTitle = item.title;
            var thumbImage;
            console.log('log: '+ item.thumbnail_images);
            if(item.thumbnail_images != undefined) {
                thumbImage = item.thumbnail_images.full.url;
            } else {
                thumbImage = 'http://placehold.it/300x300';
            }
            templateData.push({
                id : item.id,
                title: html_entity_decode(itemTitle),
                url: item.url,
                image: thumbImage,
                excerpt: item.custom_fields.blog_posts_excerpt,
                author: item.author.name,
                authorID: item.author.id,
                postType: item.custom_fields.blog_posts_post_type,
                tags: []
            });
            $.each(item.tags, function (index, object) {
                var link = '/tag/' + object.slug;
                templateData[i].tags.push({
                    tagName: object.title,
                    tagID: object.id,
                    tagUrl: link
                });
            });
        });
        var galleryTemplate = $(GS.template).html();
        $(GS.wrapper).append(Mustache.render(galleryTemplate, templateData));
        if($(window).width() > 768) {
            GS.blog.blogRowHeights();
        }
        $(GS.wrapper).find('#blog-loading').fadeOut(800, function() {
            $(this).remove();
        });
        if(GS.pageNumber == GS.numberOfPages) {
            $('#load-more-posts').fadeOut(300);
        }
        GS.noContentDisplay();
    });
    function html_entity_decode(str) {
        var ta=document.createElement("textarea");
        ta.innerHTML=str.replace(/</g,"&lt;").replace(/>/g,"&gt;");
        return ta.value;
    }
};

GS.noContentDisplay = function() {
    var blogPost = $(GS.wrapper + ' .blog-post');
    if(blogPost.length === 0) {
        $(GS.wrapper).append('<div id="no-content-message"><span class="icon-earth"></span><p class="bg-info">Couldn\'t generate any posts for that one. Maybe you\'d have better luck heading over to the <a href="#">Index</a> </p></div>')
    }
}


// END

GS.navigation = new function(){
    var searchButton = $('.search-toggle');
    var form = $('#primary-search-field')

    this.searchDisplay = function() {
        searchButton.click(function(e) {
            e.preventDefault()
            form.slideToggle(400);
            form.find('input').focus();
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
        var distance = $('.content-section').eq(0).offset().top;
        if($('.video-js').length > 0) {
            var offset = -200;
        } else {
            var offset = 0;
        }
        $(window).scroll(function () {
            if ($(window).scrollTop() >= distance - offset) {
                $('#primary-navigation-wrapper').css('box-shadow', '0px 1px 8px 0px rgba(0, 0, 0, 0.6)');
            } else {
                $('#primary-navigation-wrapper').css('box-shadow', 'none');
            }
        });
    };
    this.mobileMenu = function() {
        $('.navbar-toggle').click(function() {
            var windowHeight = $(window).height();
            if($('.collapse.in').length == 0) {
                $('#primary-navigation').addClass('menu-expanded');
                setTimeout(function() {
                    $('body > *').animate({'margin-left': '-190px', 'margin-right': '190px'}, 500);
                    if($('#sticky-social-links').length > 0) {
                        $('#sticky-social-links li').not('.bottom-menu').fadeOut(500);
                    }
                    $('#primary-navigation').height(windowHeight);
                    $('.menu-expanded').animate({right: 0},500);
                }, 1);

            } else {
                $('body > *').animate({'margin-left': '0', 'margin-right': '0'}, 500);
                $('.menu-expanded').animate({right: '-190px'},500);
                if($('#sticky-social-links').length > 0) {
                    $('#sticky-social-links li').not('.bottom-menu').fadeIn(500);
                }
                $('#primary-navigation').removeClass('menu-expanded');
            }
        })
    }

};

GS.cookies = new function()  {
    var flyout = $('#slideDisplayWindow');
    var pageHasFlyout = flyout.find('active');
    var cookieValue = $.cookie('slideOverlay');

    this.displayTrigger = function() {
        var distance = $('#footer').offset().top,
            aboveFooter = parseInt(distance) - 600,
            $window = $(window);

        $window.scroll(function() {
            if ( $window.scrollTop() >= aboveFooter ) {
                GS.cookies.testCookie();
            }
        });
    };

    this.testCookie = function() {
        if(pageHasFlyout && cookieValue != 'true') {
            flyout.stop().animate({bottom : '0'}, 600);
            //$.cookie('slideOverlay', 'true', { expires: 30, path: '/' });
            GS.cookies.removeOverlay();
        } else {
            flyout.remove();
        }
    };
    this.removeOverlay = function() {
        $('body').on('click','.closePopup', function() {
            flyout.animate({bottom : '-1000px'}, 600,function() {
                $(this).remove();
            });
        });
    }
};

GS.forms = new function() {
    submitted = false;
    this.emailSubscription = function() {
        $('#hidden_iframe').load(function(){
            if(submitted == true){
                $('#email-subscription form').hide(300,function() {
                    $('<p></p>').addClass('alert alert-success').html('<i class="icon-checkmark"></i>Welcome! Check your inbox and say "hi"​').appendTo('#email-subscription');
                });
            }
        });
    }
    this.contactForm = function() {
        $('#hidden_iframe').load(function(){
            if(submitted == true){
                $('#contact-submit').hide(300,function() {
                    $(this).parent('p').remove();
                    $('<p></p>').addClass('alert alert-success').css('text-align','right').html('<i class="icon-checkmark"></i>We can\'t wait to read your message. Talk soon.').appendTo('#contact-form');
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
                        {css: {'padding-top': 50}, immediateRender: true},
                        {css: {'padding-top': 40}}),
                    TweenMax.fromTo($('#back-top'), 1,
                        {css: {opacity: 0}, immediateRender: true},
                        {css: {opacity: 1}})
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

    this.steps = function(tweeningElement) {
        $(tweeningElement).each(function() {
            var contentSection = $(this).parent('section').attr('id');
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

    this.blog_single_social_icons = function() {
        controller.addTween(
            'body',
            (new TimelineLite())
                .append([
                    TweenMax.fromTo($('.social-link-bar ul li'),.1,
                        {css: {'padding-left': 15, 'padding-right': 15 }, immediateRender: true},
                        {css: {'padding-left': 0, 'padding-right': 0}})
                ]),
            200, false);
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
                    TweenMax.fromTo($(section+ ' li:eq(1)'),.1,
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

                    TweenMax.fromTo($('.circle'),.1,
                        {css: {'font-size': 20 }, immediateRender: true},
                        {css: {'font-size': 45, width: 100, height: 100, 'border-radius' : 50, 'margin-top': -50}}),
                    TweenMax.fromTo($('.circle:eq(0), .circle:eq(1)'),.5,
                        {css: {'background': 'rgb(68,174,234)' }, immediateRender: true},
                        {css: {'background': 'rgb(234,90,58)'}}),

                    TweenMax.fromTo($('.circle abbr'),.5,
                        {css: {'margin-top': -25 }, immediateRender: true},
                        {css: {'margin-top': -45}}),
                    TweenMax.fromTo($('.connecting-line:eq(0)'),.1,
                        {css: {rotation: 0, 'border-color': 'rgb(68,174,234)' }, immediateRender: true},
                        {css: {rotation: 20, width: 100, left: 130, 'border-color': 'rgb(234,90,58)'}}),
                    TweenMax.fromTo($('.connecting-line:eq(1)'),.1,
                        {css: {rotation: 0 }, immediateRender: true},
                        {css: {rotation: -20, left: 300, width: 100}})
                ]),
            1, false);
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
                        image : item.image_url,
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
                petitions.append('<div id="no-content-message"><span class="icon-earth"></span><p class="bg-info">Sorry, this campaigns feature is generated via an API that isn\'t accessible at the moment. We\'re working on a solution now - please check back in shortly. <br></brY>You\'re welcome to <a href="/talk-to-us">contact us</a> if you have any questions. </p></div>')
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
                $('#cat-list').append('<p></p>').text('Sorry, there is something wrong with the category display at this moment.')
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
    };
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

    this.rightColHeight = function() {
        $('.section-right-column').each(function () {
            if ($(this).children.length === 0) {
                var leftColHeight = $(this).parent('.section-template').find('.section-left-column').height();
                $(this).css('min-height', leftColHeight);
            }
        })
    }
    this.responsiveImgs = function() {
        $('img').each(function() {
            $(this).addClass('img-responsive');
        })
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
        });

        $('.select-options li a').click(function(e) {
            e.preventDefault();
            var cat = $(this).text(),
                catSlug = $(this).attr('href');
            $('.select-box').find('b').toggleClass('icon-arrow-down, icon-arrow-up');
            $('.select-options').slideToggle(300);
            $('.select-box span').text(cat);
            GS.blog.mostRecentToggle();
            GS.changePostCategory(catSlug);
        })
    };

    this.mostRecentToggle = function() {
        $('<span></span>').addClass('most-recent-toggle icon-calendar').text(' Display Most Recent Posts').appendTo('.select-menu');
    };

    this.blogRowHeights = function() {
        var pageID = $('.single-post-page-wrapper').attr('id');
        var maxHeight = 0;
        $('.blog-post > article').each(function(){
            maxHeight = $(this).height() > maxHeight ? $(this).height() : maxHeight;
            if($(this).attr('id') == pageID && pageID != undefined) {
                $(this).parent('div').remove();
            }
        });
        $('.blog-post > article').height(maxHeight);
    };

    this.socialShare = function() {
        var url = window.location.href;
        var call = 'http://api.bit.ly/v3/shorten?format=txt&login=mreyf&apiKey=R_4353512fc164bcd1828c0e60fa3e94cb&longUrl='+url;
        var tweetIntent = $('.twitter > a').attr('href');
        if(tweetIntent) {
            var splitTweet = tweetIntent.split('url=');
            //url shortner for tweets
            $.get(call, function(data) {
                $('.twitter > a').attr('href', splitTweet[0]+'url='+data+splitTweet[1]);
            });
        }
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
        var plusMinusIcon = '.faq li > span';
        $(plusMinusIcon + ', .faq-question').click(function() {

            $(this).parent('li').find('.faq-question').toggleClass('active');
            $(this).parent('li').find('span').toggleClass('icon-minus , icon-plus');
            $(this).parent('li').find('.faq-answer').slideToggle(300);
        })
    }

    this.photoGallery = function() {
        $('.fancybox').fancybox();
        $('#photo-gallery > div').each(function() {
            var itemCount = $(this).find('.hidden > a').length,
                itemsAndPoster = parseInt(itemCount) + 1;
            $(this).find('.photo-count').html(itemsAndPoster + '<i class="icon-pictures"></i>');
        })
    }
};

GS.carousel = new function() {
    this.carouselInit = function(element) {
        // init carousel
        $(element).each
        var theCarousel = $(element);
        theCarousel.carousel({
            interval: false,
            wrap: false
        });
        GS.carousel.navigationControls(element);
    };

    this.toggleTextDisplay = function() {
        $('#toggle-display').click(function() {
            $('.text-overlay').slideToggle(300);
            $('#toggle-display').find('i').toggleClass('icon-minus, icon-plus');
        })
    }

    this.navigationControls = function(carouselID) {
        var numberOfItems = $(carouselID).find('.item').length;
        var eqValue = parseInt(numberOfItems) - 1;
        $(carouselID).on('slid.bs.carousel', function () {
            var firstSlide = $(this).find('.item:eq(0)');
            var lastSlide = $(this).find('.item:eq('+eqValue+')');
            // check if it's the first slide
            if(firstSlide.hasClass('active')) {
                $(this).find('.left').css('display','none');
            } else {
                $(this).find('.left').css('display','block');
            }
            // check if it's the last slide
            if(lastSlide.hasClass('active')) {
                $(this).find('.right').css('display','none');
            } else {
                $(this).find('.right').css('display','block');
            }
        });
    };
};

/* ===========================================
 DOCUMENT READY FUNCTIONS
 // ========================================== */

$(function() {

    GS.navigation.searchDisplay();
    GS.forms.emailSubscription();
    GS.navigation.mobileMenu();
    GS.cookies.displayTrigger();
    GS.sectionHacks.responsiveImgs();


    if($('#petition-wrap').length > 0) { // IF PETITIONS EXIST ON THE PAGE
        GS.petitions.slideToggleCats();
        GS.petitions.selectCategory();
        GS.petitions.petitionsGenerator();
        GS.scrolloramaEffects.parallax('#petition-wrap');
        $(window).load(function(){
            GS.petitions.scrollBar();
        });
    }

    if($('#petitions').length > 0 && $('#petition-wrap').length <= 0) { // IF PETITIONS BLOCKS
        GS.petitions.petitionsGenerator();
    }

    if($('.parallax').length > 0) { // IF PARALLAX EXISTS ON THE PAGE
        GS.scrolloramaEffects.parallax('.parallax');
    }


    if($('body').hasClass('page-template-landing-page')) { // LANDING PAGES (previously WHO WE ARE)
        GS.scrolloramaEffects.mainNavBackground();
        GS.navigation.navigationBoxShadow();
        GS.teamDisplay.clickAction();
        GS.teamDisplay.hoverAction();
        GS.scrolloramaEffects.parallax('.parallax');
        GS.navigation.navigateDown();
        GS.navigation.backToTop();
        GS.scrolloramaEffects.introSection();
        GS.sectionHacks.rightColHeight();
        if($('.section-number').length > 0) {
            GS.scrolloramaEffects.steps('.section-number');
        }
        if($('#stats').length > 0) {
            GS.scrolloramaEffects.stats('.content-section');
        }
        console.log(navigator.userAgent.match(/iPad/i) != null);        
        if($('.video-js').length > 0 && navigator.userAgent.match(/iPad/i) == null) {
            GS.backgroundVideo.sizingFunction();
        }
        if($('.faq').length > 0) {
            GS.landingPages.FAQ();
        }
        if($('#column-buckets').length > 0 && $(window).width() > 768) {
            GS.sectionHacks.evenLengthColumns();
        }
    }

    if($('#blog-post-index').length > 0) { // BLOG INDEX
        GS.blog.selectMenu();
        GS.displayPosts();
        $('#load-posts').click(function() {
            GS.loadMorePosts();
        })
    }

    if($('body').hasClass('single-post')) {
        if($('#social-navigation').length > 0) {
            GS.blog.affixSocialIcons();
        };
        if($(window).width() < 768) {
            $('.navbar-header').css('display','none');
            $('#primary-navigation-wrapper').css({background : 'none', 'box-shadow' : '0 0 0 0'});
            $('.single-post-header').css('padding-top','20px');
        }
        GS.scrolloramaEffects.blog_single_social_icons();
        GS.blog.socialShare();
    }

    if($('.carousel').length > 0) { // Carousels
        GS.carousel.carouselInit('.carousel')
    }

    if($('#photo-gallery').length > 0) { // Photo Galleries
        GS.landingPages.photoGallery();
    }

    if($('#contact').length > 0) {
        GS.forms.contactForm();
    }

// END

});

