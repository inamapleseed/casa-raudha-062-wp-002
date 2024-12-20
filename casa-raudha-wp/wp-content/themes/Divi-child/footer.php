<?php
/**
 * Fires after the main content, before the footer is output.
 *
 * @since 3.10
 */
do_action( 'et_after_main_content' );

if ( 'on' === et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

<footer id="main-footer">
<?php
$logo = get_field('footer_logo', 'option');
?>
<div class="footer-top" style="background: <?php echo get_field('footer_background_color', 'option'); ?>">
	<div class="footer-upper">
		<div class="img-container">
			<img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
		</div>
	</div>

	<div class="container">
		<div class="footer-content">
			<div class="footer-content-container">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'footer-menu',
						'depth'          => '2',
						'container'      => '',
						'fallback_cb'    => '',
					) );
				?>
			</div>
		</div>
		<div class="footer-content">
			<div class="footer-content-container">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'footer-2',
						'depth'          => '2',
						'container'      => '',
						'fallback_cb'    => '',
					) );
				?>
			</div>
		</div>

		<div class="footer-content social-container">
			<div class="footer-content-container">
				<h5 style="padding-bottom: 0"><?php echo get_field('social_icon_title', 'option'); ?></h5>
				<?php if( have_rows('social_icon', 'option') ): ?>
					<ul>
					<?php while( have_rows('social_icon', 'option') ): the_row();  
						$img_array = get_sub_field('icon');
					?>
						<div class="li-container">
							<img src="<?php echo esc_url($img_array['url']); ?>" alt="<?php echo esc_attr($img_array['alt']); ?>" />
						</div>
					<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
	<div id="footer-bottom">
		<div class="container clearfix">
		<ul>
			<li><span style="display: flex; font-size: 12px"><?php echo get_field('copyright', 'option'); ?><img style="max-width: 120px; margin-left: 5px" src="<?php echo get_field('copyright_logo', 'option'); ?>" alt="image"></span></li>
			<li><span><?php echo et_core_fix_unclosed_html_tags( et_core_esc_previously( et_get_footer_credits() ) ); ?></span></li>
		</ul>
		</div>	<!-- .container -->
	</div>
</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

	</div> <!-- #page-container -->

	<?php wp_footer(); ?>
	
<script type="text/javascript">
<?php 
	// start of announcement
	$announcement_auto_running = get_field('announcement_auto_running', 'option');
	if($announcement_auto_running) { 
?>
    /** marquee - announcement bar **/
    var marquee_duration;
    
    const width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    if(width >= 768) {
        marquee_duration = 15000;
    }
    else {
        marquee_duration = 8000;
    }

    /**
 * jQuery.marquee - scrolling text like old marquee element
 * @author Aamir Afridi - aamirafridi(at)gmail(dot)com / http://aamirafridi.com/jquery/jquery-marquee-plugin
 */
(function($){$.fn.marquee=function(options){return this.each(function(){var o=$.extend({},$.fn.marquee.defaults,options),$this=$(this),$marqueeWrapper,containerWidth,animationCss,verticalDir,elWidth,loopCount=3,playState='animation-play-state',css3AnimationIsSupported=!1,_prefixedEvent=function(element,type,callback){var pfx=["webkit","moz","MS","o",""];for(var p=0;p<pfx.length;p++){if(!pfx[p])type=type.toLowerCase();element.addEventListener(pfx[p]+type,callback,!1)}},_objToString=function(obj){var tabjson=[];for(var p in obj){if(obj.hasOwnProperty(p)){tabjson.push(p+':'+obj[p])}}
tabjson.push();return'{'+tabjson.join(',')+'}'},_startAnimationWithDelay=function(){$this.timer=setTimeout(animate,o.delayBeforeStart)},methods={pause:function(){if(css3AnimationIsSupported&&o.allowCss3Support){$marqueeWrapper.css(playState,'paused')}else{if($.fn.pause){$marqueeWrapper.pause()}}
$this.data('runningStatus','paused');$this.trigger('paused')},resume:function(){if(css3AnimationIsSupported&&o.allowCss3Support){$marqueeWrapper.css(playState,'running')}else{if($.fn.resume){$marqueeWrapper.resume()}}
$this.data('runningStatus','resumed');$this.trigger('resumed')},toggle:function(){methods[$this.data('runningStatus')=='resumed'?'pause':'resume']()},destroy:function(){clearTimeout($this.timer);$this.find("*").addBack().off();$this.html($this.find('.js-marquee:first').html())}};if(typeof options==='string'){if($.isFunction(methods[options])){if(!$marqueeWrapper){$marqueeWrapper=$this.find('.js-marquee-wrapper')}
if($this.data('css3AnimationIsSupported')===!0){css3AnimationIsSupported=!0}
methods[options]()}
return}
var dataAttributes={},attr;$.each(o,function(key,value){attr=$this.attr('data-'+key);if(typeof attr!=='undefined'){switch(attr){case 'true':attr=!0;break;case 'false':attr=!1;break}
o[key]=attr}});if(o.speed){o.duration=parseInt($this.width(),10)/o.speed*1000}
verticalDir=o.direction=='up'||o.direction=='down';o.gap=o.duplicated?parseInt(o.gap):0;$this.wrapInner('<div class="js-marquee"></div>');var $el=$this.find('.js-marquee').css({'margin-right':o.gap,'float':'left'});if(o.duplicated){$el.clone(!0).appendTo($this)}
$this.wrapInner('<div style="width:100000px" class="js-marquee-wrapper"></div>');$marqueeWrapper=$this.find('.js-marquee-wrapper');if(verticalDir){var containerHeight=$this.height();$marqueeWrapper.removeAttr('style');$this.height(containerHeight);$this.find('.js-marquee').css({'float':'none','margin-bottom':o.gap,'margin-right':0});if(o.duplicated)$this.find('.js-marquee:last').css({'margin-bottom':0});var elHeight=$this.find('.js-marquee:first').height()+o.gap;if(o.startVisible&&!o.duplicated){o._completeDuration=((parseInt(elHeight,10)+parseInt(containerHeight,10))/parseInt(containerHeight,10))*o.duration;o.duration=(parseInt(elHeight,10)/parseInt(containerHeight,10))*o.duration}else{o.duration=((parseInt(elHeight,10)+parseInt(containerHeight,10))/parseInt(containerHeight,10))*o.duration}}else{elWidth=$this.find('.js-marquee:first').width()+o.gap;containerWidth=$this.width();if(o.startVisible&&!o.duplicated){o._completeDuration=((parseInt(elWidth,10)+parseInt(containerWidth,10))/parseInt(containerWidth,10))*o.duration;o.duration=(parseInt(elWidth,10)/parseInt(containerWidth,10))*o.duration}else{o.duration=((parseInt(elWidth,10)+parseInt(containerWidth,10))/parseInt(containerWidth,10))*o.duration}}
if(o.duplicated){o.duration=o.duration/2}
if(o.allowCss3Support){var
elm=document.body||document.createElement('div'),animationName='marqueeAnimation-'+Math.floor(Math.random()*10000000),domPrefixes='Webkit Moz O ms Khtml'.split(' '),animationString='animation',animationCss3Str='',keyframeString='';if(elm.style.animation!==undefined){keyframeString='@keyframes '+animationName+' ';css3AnimationIsSupported=!0}
if(css3AnimationIsSupported===!1){for(var i=0;i<domPrefixes.length;i++){if(elm.style[domPrefixes[i]+'AnimationName']!==undefined){var prefix='-'+domPrefixes[i].toLowerCase()+'-';animationString=prefix+animationString;playState=prefix+playState;keyframeString='@'+prefix+'keyframes '+animationName+' ';css3AnimationIsSupported=!0;break}}}
if(css3AnimationIsSupported){animationCss3Str=animationName+' '+o.duration/1000+'s '+o.delayBeforeStart/1000+'s infinite '+o.css3easing;$this.data('css3AnimationIsSupported',!0)}}
var _rePositionVertically=function(){$marqueeWrapper.css('transform','translateY('+(o.direction=='up'?containerHeight+'px':'-'+elHeight+'px')+')')},_rePositionHorizontally=function(){$marqueeWrapper.css('transform','translateX('+(o.direction=='left'?containerWidth+'px':'-'+elWidth+'px')+')')};if(o.duplicated){if(verticalDir){if(o.startVisible){$marqueeWrapper.css('transform','translateY(0)')}else{$marqueeWrapper.css('transform','translateY('+(o.direction=='up'?containerHeight+'px':'-'+((elHeight*2)-o.gap)+'px')+')')}}else{if(o.startVisible){$marqueeWrapper.css('transform','translateX(0)')}else{$marqueeWrapper.css('transform','translateX('+(o.direction=='left'?containerWidth+'px':'-'+((elWidth*2)-o.gap)+'px')+')')}}
if(!o.startVisible){loopCount=1}}else if(o.startVisible){loopCount=2}else{if(verticalDir){_rePositionVertically()}else{_rePositionHorizontally()}}
var animate=function(){if(o.duplicated){if(loopCount===1){o._originalDuration=o.duration;if(verticalDir){o.duration=o.direction=='up'?o.duration+(containerHeight/((elHeight)/o.duration)):o.duration*2}else{o.duration=o.direction=='left'?o.duration+(containerWidth/((elWidth)/o.duration)):o.duration*2}
if(animationCss3Str){animationCss3Str=animationName+' '+o.duration/1000+'s '+o.delayBeforeStart/1000+'s '+o.css3easing}
loopCount++}
else if(loopCount===2){o.duration=o._originalDuration;if(animationCss3Str){animationName=animationName+'0';keyframeString=$.trim(keyframeString)+'0 ';animationCss3Str=animationName+' '+o.duration/1000+'s 0s infinite '+o.css3easing}
loopCount++}}
if(verticalDir){if(o.duplicated){if(loopCount>2){$marqueeWrapper.css('transform','translateY('+(o.direction=='up'?0:'-'+elHeight+'px')+')')}
animationCss={'transform':'translateY('+(o.direction=='up'?'-'+elHeight+'px':0)+')'}}else if(o.startVisible){if(loopCount===2){if(animationCss3Str){animationCss3Str=animationName+' '+o.duration/1000+'s '+o.delayBeforeStart/1000+'s '+o.css3easing}
animationCss={'transform':'translateY('+(o.direction=='up'?'-'+elHeight+'px':containerHeight+'px')+')'};loopCount++}else if(loopCount===3){o.duration=o._completeDuration;if(animationCss3Str){animationName=animationName+'0';keyframeString=$.trim(keyframeString)+'0 ';animationCss3Str=animationName+' '+o.duration/1000+'s 0s infinite '+o.css3easing}
_rePositionVertically()}}else{_rePositionVertically();animationCss={'transform':'translateY('+(o.direction=='up'?'-'+($marqueeWrapper.height())+'px':containerHeight+'px')+')'}}}else{if(o.duplicated){if(loopCount>2){$marqueeWrapper.css('transform','translateX('+(o.direction=='left'?0:'-'+elWidth+'px')+')')}
animationCss={'transform':'translateX('+(o.direction=='left'?'-'+elWidth+'px':0)+')'}}else if(o.startVisible){if(loopCount===2){if(animationCss3Str){animationCss3Str=animationName+' '+o.duration/1000+'s '+o.delayBeforeStart/1000+'s '+o.css3easing}
animationCss={'transform':'translateX('+(o.direction=='left'?'-'+elWidth+'px':containerWidth+'px')+')'};loopCount++}else if(loopCount===3){o.duration=o._completeDuration;if(animationCss3Str){animationName=animationName+'0';keyframeString=$.trim(keyframeString)+'0 ';animationCss3Str=animationName+' '+o.duration/1000+'s 0s infinite '+o.css3easing}
_rePositionHorizontally()}}else{_rePositionHorizontally();animationCss={'transform':'translateX('+(o.direction=='left'?'-'+elWidth+'px':containerWidth+'px')+')'}}}
$this.trigger('beforeStarting');if(css3AnimationIsSupported){$marqueeWrapper.css(animationString,animationCss3Str);var keyframeCss=keyframeString+' { 100%  '+_objToString(animationCss)+'}',$styles=$marqueeWrapper.find('style');if($styles.length!==0){$styles.filter(":last").html(keyframeCss)}else{$('head').append('<style>'+keyframeCss+'</style>')}
_prefixedEvent($marqueeWrapper[0],"AnimationIteration",function(){$this.trigger('finished')});_prefixedEvent($marqueeWrapper[0],"AnimationEnd",function(){animate();$this.trigger('finished')})}else{$marqueeWrapper.animate(animationCss,o.duration,o.easing,function(){$this.trigger('finished');if(o.pauseOnCycle){_startAnimationWithDelay()}else{animate()}})}
$this.data('runningStatus','resumed')};$this.on('pause',methods.pause);$this.on('resume',methods.resume);if(o.pauseOnHover){$this.on('mouseenter',methods.pause);$this.on('mouseleave',methods.resume)}
if(css3AnimationIsSupported&&o.allowCss3Support){animate()}else{_startAnimationWithDelay()}})};$.fn.marquee.defaults={allowCss3Support:!0,css3easing:'linear',easing:'linear',delayBeforeStart:1000,direction:'left',duplicated:!1,duration:5000,speed:0,gap:20,pauseOnCycle:!1,pauseOnHover:!1,startVisible:!1}})(jQuery);

    jQuery('.annoucement-txt').marquee({
    	//duration in milliseconds of the marquee
    	duration: marquee_duration,
    	//gap in pixels between the tickers
    	gap: 50,
    	//time in milliseconds before the marquee will start animating
    	delayBeforeStart: 0,
    	//'left' or 'right'
    	direction: 'left',
    	//true or false - should the marquee be duplicated to show an effect of continues flow
    	duplicated: false
    });
    /** marquee - announcement bar **/
    
<?php } // end of announcement ?>
	
	
	/** for mobile menu close **/
    jQuery(window).click(function() {
        if(jQuery(event.target).is('#mobile_menu') || jQuery(event.target).parents('#mobile_menu').length > 0) {
            // console.log('mobile menu');
            
        }
        else {
            jQuery('.mobile_nav').removeClass('opened').addClass('closed');
            // console.log('outside mobile menu');
        }
    });
	/** for mobile menu close **/
    
</script>

</body>
</html>
