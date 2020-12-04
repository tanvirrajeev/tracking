@extends('web.layout')

@section('content')


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<link rel="stylesheet" href="/css/style.css">
                          {{-- <link rel="stylesheet" type="text/css" src="intrinsic_files/css/style.css" media="screen" /> --}}
                          {{-- <link rel="stylesheet" type="text/css" href="intrinsic_files/style.css" media="screen" /> --}}



                                        <script type="text/javascript" style="display: none;">(function($){$.fn.hoverIntent=function(f,g){var cfg={sensitivity:7,interval:100,timeout:0};cfg=$.extend(cfg,g?{over:f,out:g}:f);var cX,cY,pX,pY;var track=function(ev){cX=ev.pageX;cY=ev.pageY;};var compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if((Math.abs(pX-cX)+Math.abs(pY-cY))<cfg.sensitivity){$(ob).unbind("mousemove",track);ob.hoverIntent_s=1;return cfg.over.apply(ob,[ev]);}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob);},cfg.interval);}};var delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=0;return cfg.out.apply(ob,[ev]);};var handleHover=function(e){var p=(e.type=="mouseover"?e.fromElement:e.toElement)||e.relatedTarget;while(p&&p!=this){try{p=p.parentNode;}catch(e){p=this;}}
                                            if(p==this){return false;}//
                                            var ev=jQuery.extend({},e);var ob=this;if(ob.hoverIntent_t){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);}
                                            if(e.type=="mouseover"){pX=ev.pageX;pY=ev.pageY;$(ob).bind("mousemove",track);if(ob.hoverIntent_s!=1){ob.hoverIntent_t=setTimeout(function(){compare(ev,ob);},cfg.interval);}}else{$(ob).unbind("mousemove",track);if(ob.hoverIntent_s==1){ob.hoverIntent_t=setTimeout(function(){delay(ev,ob);},cfg.timeout);}}};return this.mouseover(handleHover).mouseout(handleHover);};})(jQuery);</script>
                                        <script type="text/javascript" style="display: none;">;(function($){$.fn.superfish=function(op){var sf=$.fn.superfish,c=sf.c,$arrow=$(['<span class="',c.arrowClass,'"> &#187;</span>'].join('')),over=function(){var $$=$(this),menu=getMenu($$);clearTimeout(menu.sfTimer);$$.showSuperfishUl().siblings().hideSuperfishUl();},out=function(){var $$=$(this),menu=getMenu($$),o=sf.op;clearTimeout(menu.sfTimer);menu.sfTimer=setTimeout(function(){o.retainPath=($.inArray($$[0],o.$path)>-1);$$.hideSuperfishUl();if(o.$path.length&&$$.parents(['li.',o.hoverClass].join('')).length<1){over.call(o.$path);}},o.delay);},getMenu=function($menu){var menu=$menu.parents(['ul.',c.menuClass,':first'].join(''))[0];sf.op=sf.o[menu.serial];return menu;},addArrow=function($a){$a.addClass(c.anchorClass).append($arrow.clone());};return this.each(function(){var s=this.serial=sf.o.length;var o=$.extend({},sf.defaults,op);o.$path=$('li.'+o.pathClass,this).slice(0,o.pathLevels).each(function(){$(this).addClass([o.hoverClass,c.bcClass].join(' '))
                                .filter('li:has(ul)').removeClass(o.pathClass);});sf.o[s]=sf.op=o;$('li:has(ul)',this)[($.fn.hoverIntent&&!o.disableHI)?'hoverIntent':'hover'](over,out).each(function(){if(o.autoArrows)addArrow($('>a:first-child',this));})
                            .not('.'+c.bcClass)
                            .hideSuperfishUl();var $a=$('a',this);$a.each(function(i){var $li=$a.eq(i).parents('li');$a.eq(i).focus(function(){over.call($li);}).blur(function(){out.call($li);});});o.onInit.call(this);}).each(function(){var menuClasses=[c.menuClass]; if(sf.op.dropShadows&&!($.browser.msie&&$.browser.version<7))menuClasses.push(c.shadowClass);$(this).addClass(menuClasses.join(' '));});};var sf=$.fn.superfish;sf.o=[];sf.op={};sf.IE7fix=function(){var o=sf.op;if($.browser.msie&&$.browser.version>6&&o.dropShadows&&o.animation.opacity!=undefined)
                            this.toggleClass(sf.c.shadowClass+'-off');};sf.c={bcClass:'sf-breadcrumb',menuClass:'sf-js-enabled',anchorClass:'sf-with-ul',arrowClass:'sf-sub-indicator',shadowClass:'sf-shadow'};sf.defaults={hoverClass:'sfHover',pathClass:'overideThisToUse',pathLevels:1,delay:800,animation:{opacity:'show'},speed:'normal',autoArrows:true,dropShadows:true,disableHI:false,onInit:function(){},onBeforeShow:function(){},onShow:function(){},onHide:function(){}};$.fn.extend({hideSuperfishUl:function(){var o=sf.op,not=(o.retainPath===true)?o.$path:'';o.retainPath=false;var $ul=$(['li.',o.hoverClass].join(''),this).add(this).not(not).removeClass(o.hoverClass)
                                .find('>ul').hide().css('visibility','hidden');o.onHide.call($ul);return this;},showSuperfishUl:function(){var o=sf.op,sh=sf.c.shadowClass+'-off',$ul=this.addClass(o.hoverClass)
                                .find('>ul:hidden').css('visibility','visible');sf.IE7fix.call($ul);o.onBeforeShow.call($ul);$ul.animate(o.animation,o.speed,function(){sf.IE7fix.call($ul);o.onShow.call($ul);});return this;}});})(jQuery);</script>
                                        <script type="text/javascript">// initialise plugins
                    jQuery(function(){
                        jQuery('ul.sf-menu').superfish();
                    });
                                        </script> <!--//--><script type="text/javascript" style="display: none;">(function($){$.fn.innerfade=function(options){return this.each(function(){$.innerfade(this,options);});};$.innerfade=function(container,options){var settings={'animationtype':'fade','speed':'normal','type':'sequence','timeout':2000,'containerheight':'auto','runningclass':'innerfade','children':null};if(options)
                    $.extend(settings,options);if(settings.children===null)
                        var elements=$(container).children();else
                            var elements=$(container).children(settings.children);if(elements.length>1){$(container).css('position','relative').css('height',settings.containerheight).addClass(settings.runningclass);for(var i=0;i<elements.length;i++){$(elements[i]).css('z-index',String(elements.length-i)).css('position','absolute').hide();};if(settings.type=="sequence"){setTimeout(function(){$.innerfade.next(elements,settings,1,0);},settings.timeout);$(elements[0]).show();}else if(settings.type=="random"){var last=Math.floor(Math.random()*(elements.length));setTimeout(function(){do{current=Math.floor(Math.random()*(elements.length));}while(last==current);$.innerfade.next(elements,settings,current,last);},settings.timeout);$(elements[last]).show();}else if(settings.type=='random_start'){settings.type='sequence';var current=Math.floor(Math.random()*(elements.length));setTimeout(function(){$.innerfade.next(elements,settings,(current+1)%elements.length,current);},settings.timeout);$(elements[current]).show();}else{alert('Innerfade-Type must either be \'sequence\', \'random\' or \'random_start\'');}}};$.innerfade.next=function(elements,settings,current,last){if(settings.animationtype=='slide'){$(elements[last]).slideUp(settings.speed);$(elements[current]).slideDown(settings.speed);}else if(settings.animationtype=='fade'){$(elements[last]).fadeOut(settings.speed);$(elements[current]).fadeIn(settings.speed,function(){removeFilter($(this)[0]);});}else
                            alert('Innerfade-animationtype must either be \'slide\' or \'fade\'');if(settings.type=="sequence"){if((current+1)<elements.length){current=current+1;last=current-1;}else{current=0;last=elements.length-1;}}else if(settings.type=="random"){last=current;while(current==last)
                                    current=Math.floor(Math.random()*elements.length);}else
                                    alert('Innerfade-Type must either be \'sequence\', \'random\' or \'random_start\'');setTimeout((function(){$.innerfade.next(elements,settings,current,last);}),settings.timeout);};})(jQuery);function removeFilter(element){if(element.style.removeAttribute){element.style.removeAttribute('filter');}}
                                        </script>
                                        <script type="text/javascript">$(document).ready(
                        function(){
                            $('ul#clients').innerfade({
                                speed: 1000,
                                timeout: 3000,
                                type: 'sequence',
                                containerheight: '53px'
                            });
                        });
                                        </script> <!--//--><script type="text/javascript" style="display: none;">eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(6($){$.1g.1w=6(o){o=$.1f({r:n,x:n,N:n,17:q,J:n,L:1a,16:n,y:q,u:12,H:3,B:0,k:1,K:n,I:n},o||{});8 G.R(6(){p b=q,A=o.y?"15":"w",P=o.y?"t":"s";p c=$(G),9=$("9",c),E=$("10",9),W=E.Y(),v=o.H;7(o.u){9.1h(E.D(W-v-1+1).V()).1d(E.D(0,v).V());o.B+=v}p f=$("10",9),l=f.Y(),4=o.B;c.5("1c","H");f.5({U:"T",1b:o.y?"S":"w"});9.5({19:"0",18:"0",Q:"13","1v-1s-1r":"S","z-14":"1"});c.5({U:"T",Q:"13","z-14":"2",w:"1q"});p g=o.y?t(f):s(f);p h=g*l;p j=g*v;f.5({s:f.s(),t:f.t()});9.5(P,h+"C").5(A,-(4*g));c.5(P,j+"C");7(o.r)$(o.r).O(6(){8 m(4-o.k)});7(o.x)$(o.x).O(6(){8 m(4+o.k)});7(o.N)$.R(o.N,6(i,a){$(a).O(6(){8 m(o.u?o.H+i:i)})});7(o.17&&c.11)c.11(6(e,d){8 d>0?m(4-o.k):m(4+o.k)});7(o.J)1p(6(){m(4+o.k)},o.J+o.L);6 M(){8 f.D(4).D(0,v)};6 m(a){7(!b){7(o.K)o.K.Z(G,M());7(o.u){7(a<=o.B-v-1){9.5(A,-((l-(v*2))*g)+"C");4=a==o.B-v-1?l-(v*2)-1:l-(v*2)-o.k}F 7(a>=l-v+1){9.5(A,-((v)*g)+"C");4=a==l-v+1?v+1:v+o.k}F 4=a}F{7(a<0||a>l-v)8;F 4=a}b=12;9.1o(A=="w"?{w:-(4*g)}:{15:-(4*g)},o.L,o.16,6(){7(o.I)o.I.Z(G,M());b=q});7(!o.u){$(o.r+","+o.x).1n("X");$((4-o.k<0&&o.r)||(4+o.k>l-v&&o.x)||[]).1m("X")}}8 q}})};6 5(a,b){8 1l($.5(a[0],b))||0};6 s(a){8 a[0].1k+5(a,\'1j\')+5(a,\'1i\')};6 t(a){8 a[0].1t+5(a,\'1u\')+5(a,\'1e\')}})(1x);',62,96,'||||curr|css|function|if|return|ul|||||||||||scroll|itemLength|go|null||var|false|btnPrev|width|height|circular||left|btnNext|vertical||animCss|start|px|slice|tLi|else|this|visible|afterEnd|auto|beforeStart|speed|vis|btnGo|click|sizeCss|position|each|none|hidden|overflow|clone|tl|disabled|size|call|li|mousewheel|true|relative|index|top|easing|mouseWheel|padding|margin|200|float|visibility|append|marginBottom|extend|fn|prepend|marginRight|marginLeft|offsetWidth|parseInt|addClass|removeClass|animate|setInterval|0px|type|style|offsetHeight|marginTop|list|jCarouselLite|jQuery'.split('|'),0,{}))</script>
                                        <script type="text/javascript">$(function() {
                        $("#slideshow").jCarouselLite({
                            btnNext: ".next",
                            btnPrev: ".prev",
                            vertical: true ,
                            speed: 500,
                            auto:4000,
                            visible: 1
                        });

                        $("#slideshow2").jCarouselLite({
                            btnNext: ".next",
                            btnPrev: ".prev",
                            visible: 1,
                            auto:4000,
                            speed:500
                        });
                    });
                                        </script>

                                        <style type="text/css">
<!--
.style1 {
font-family:Arial;
font-size: 20px
}

}
-->
                                        </style>
                                        </head>
<body><div id="banner_wrap">
<div id="banner">
                                                                            <div id="imgs"><a class="prev"></a><a class="next"></a>
                                                                              <div style="overflow: hidden; visibility: visible; position: relative; z-index: 2; left: 0px; height: 248px;" id="slideshow"><ul style="margin: 0pt; padding: 0pt; position: relative; list-style-type: none; z-index: 1; height: 1488px; top: -1240px;">

                           <li style="overflow: hidden; float: none; width: 445px; height: 248px;"><img src="{{ asset('img/intrinsic_files/full1.jpg') }}" alt="screenshot" width="445" height="245"></li>
                           <li style="overflow: hidden; float: none; width: 445px; height: 248px;"><img src="{{ asset('img/intrinsic_files/full2.jpg') }}" alt="screenshot" width="445" height="245"></li>
                            <li style="overflow: hidden; float: none; width: 445px; height: 248px;"><img src="{{ asset('img/intrinsic_files/full3.jpg') }}" alt="screenshot" width="445" height="245"></li>

                            <li style="overflow: hidden; float: none; width: 445px; height: 248px;"><img src="{{ asset('img/intrinsic_files/full4.jpg') }}" alt="screenshot" width="445" height="245" /></li>
                            <li style="overflow: hidden; float: none; width: 445px; height: 248px;"><img src="{{ asset('img/intrinsic_files/full5.jpg') }}" alt="screenshot" width="445" height="245"></li>
                            <li style="overflow: hidden; float: none; width: 445px; height: 248px;"><img src="{{ asset('img/intrinsic_files/full6.jpg') }}" alt="screenshot" width="445" height="245"></li>
                                                                                    </ul>
                                                                            </div></div>
<div id="description">
                                                                                <div style="overflow: hidden; visibility: visible; position: relative; z-index: 2; left: 0px; width: 480px;" id="slideshow2"><ul style="margin: 0pt; padding: 0pt; position: relative; list-style-type: none; z-index: 1; width: 2880px; left: -2400px;">
                                       <li style="overflow: hidden; float: left; width: 420px; height: 220px;">

                                 <p style="font-family:Arial;font-size:24px; color:#FFFFFF">Solutions you need...</p>
                                       </li>
                                                <li style="overflow: hidden; float: left; width: 420px; height: 220px;">
                                 <p style="font-family:Arial;font-size:24px; color:#FFFFFF">Experience that matters...</p>
                                                </li>

                                                <li style="overflow: hidden; float: left; width: 420px; height: 220px;">
                                 <p style="font-family:Arial;font-size:24px; color:#FFFFFF">Results that count...</p>
                                                </li>

                                                <li style="overflow: hidden; float: left; width: 420px; height: 230px;">                                 <p style="font-family:Arial;font-size:24px; color:#FFFFFF">Why POWERLiNE? </p>
                                                  <p align="justify" font style="color:#FFFFFF">The most important reason to use a courier service is to show your customers that they're important to you. If you can get your product to them a day earlier then Overnight express, that�s important. If you say "We'll send someone to pick it up" rather then "You send it to us", that's important. If you have the ability to deliver something to your client within an hour, rather then waiting until the next day, that�s important.
                 Your customers are used to getting information immediately, via the Internet, email or by phone or fax. But delivering things quickly can be just as important, whether it�s a router, presentation folder or documents that need to be signed.
                                                  </p></li>
                                                   <li style="overflow: hidden; float: left; width: 420px; height: 230px;">
                                <p style="font-family:Arial;font-size:24px; color:#FFFFFF">Air Express Service </p>
                                                   <p align="justify" font style="color:#FFFFFF">Power Line Air Express Ltd. is specialized in offering highly reliable Custom Clearance Services in the industry. We are counted among the best Custom Clearing Agents in Bangladesh. We extend our services for the hassle free transaction of shipments of the clients in almost all the custom houses in Bangladesh. Our team of professionals is proficient in the complex documentation process of customs clearance. We take every care for the timely clearance of the goods from the ports or custom house through our Custom Clearing Services.

                                                     </p></li>
                                                    <li style="overflow: hidden; float: left; width: 420px; height: 230px;">
                                <p style="font-family:Arial;font-size:24px; color:#FFFFFF">Customs Clearance Services</p>
                                                    <p align="justify" font style="color:#FFFFFF">Power Line Air Express Ltd. is specialized in offering highly reliable Custom Clearance Services in the industry. We are counted among the best Custom Clearing Agents in Bangladesh. We extend our services for the hassle free transaction of shipments of the clients in almost all the custom houses in Bangladesh. Our team of professionals is proficient in the complex documentation process of customs clearance. We take every care for the timely clearance of the goods from the ports or custom house through our Custom Clearing Services.</p>
                                                    </li>


                                                                                    </ul>
      </div></div></div>

       <div id="banner_bottom">

     <script language="javascript">
	  function chkuser(){
	  if(document.getElementById('user').value==''){
	    document.getElementById('user').value='username';
		}else
		if(document.getElementById('user').value=='username'){
		 document.getElementById('user').value=''
		 }
	  }

	  function chkpass(){
	  if(document.getElementById('pass').value==''){
	          document.getElementById('pass').value='password';
	  }else
		if(document.getElementById('pass').value=='password'){
		 document.getElementById('pass').value=''
		 }


	  }

	 </script>



                         <div style="float:left ;font-family:Arial; font-size:24px">Company Login</div>
<div id="client_login"  style="float: right; margin-right:20px;">
                               <form name="log_frm" action="log_in_form.php" method="post">
          <input value="username" onClick="chkuser()" onBlur="chkuser()" id="user" name="user_name"  type="text" />
          <input value="password" onClick="chkpass()" onBlur="chkpass()" id="pass" name="user_password"  type="password" />
                                               <input type="submit" name="login" value="Login">
                                               <input type="hidden" name="chk" value="ok" />
                                                                                        <!--<div id="meta_login">New User? <a href="#">Register here</a> | <a href="#">Forgot Password?</a></div>-->

                                                                              </form>
                                                                           </div>

                                                                        </div>
                                                                    </div>

   <div id="features_wrap">

				<table style="background:#000000" class="eventbody"><tr><td>
																		<div class="features_block_left" style="color:#FFFFFF; font-size:12px">
                                                                            <pre class="style1">Latest News</pre>
<script src='/js/jcarousellite_1.js'></script>

<script type="text/javascript">
$(function() {
	$(".newsticker-jcarousellite").jCarouselLite({
		vertical: true,
		hoverPause:true,
		visible: 3,
		auto:500,
		speed:1000
	});
});
</script>



<div class="latest-job">
       <div style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px; height: 144px;" class="newsticker-jcarousellite">
		<ul style="margin: 0pt; padding: 0pt; position: relative; list-style-type: none; z-index: 1; height: 236px; top: -144px;">
                <li style="overflow: hidden; float: none; width: 198px; height: 78px;">
				<div class="info">
					<strong>HACKED BY Aryan Chehreghani Ictus_TM</strong><br/>
					HACKED BY Aryan Chehreghani Ictus_TM</br><br/>
				</div>
				<div class="clear"></div>
		</li>
                <li style="overflow: hidden; float: none; width: 198px; height: 78px;">
				<div class="info">
					<strong>HOLIDAY NOTICE</strong><br/>
					Bangladesh Operations shall remain closed on 26/03/2012 on account of Independence Day</br><br/>
				</div>
				<div class="clear"></div>
		</li>
                <li style="overflow: hidden; float: none; width: 198px; height: 78px;">
				<div class="info">
					<strong>NETWORK UPDATE</strong><br/>
					Power Line has joined hands with Forward Air Courier (Pvt) Ltd to start operations to Sri Lanka !</br><br/>
				</div>
				<div class="clear"></div>
		</li>
                <li style="overflow: hidden; float: none; width: 198px; height: 78px;">
				<div class="info">
					<strong>EXPORT & IMPORT</strong><br/>
					Signup for your easy, fast and cost effective export & import shipments to and from India.</br><br/>
				</div>
				<div class="clear"></div>
		</li>
                <li style="overflow: hidden; float: none; width: 198px; height: 78px;">
				<div class="info">
					<strong>DOMESTIC EXPRESS</strong><br/>
					Please call our domestic customer support to avail domestic express & logistical support at (880-2) 9550816, 9550326</br><br/>
				</div>
				<div class="clear"></div>
		</li>
                <li style="overflow: hidden; float: none; width: 198px; height: 78px;">
				<div class="info">
					<strong>ONLINE INFO</strong><br/>
					Keep tracking your package for updated information provided.</br><br/>
				</div>
				<div class="clear"></div>
		</li>
                <li style="overflow: hidden; float: none; width: 198px; height: 78px;">
				<div class="info">
					<strong>IMPORTANT</strong><br/>
					Power Line Air Express Ltd. does not handle any inbound shipments from India other than its own exclusive counter part so please call our hotline for details.</br><br/>
				</div>
				<div class="clear"></div>
		</li>
                <li style="overflow: hidden; float: none; width: 198px; height: 78px;">
				<div class="info">
					<strong>INDIA NETWORK</strong><br/>
					The robust network of POWERLiNE is committed to deliver shipments with quality and world class standard. Please hit the buttons of your phone and contact our delhi office for your queries....</br><br/>
				</div>
				<div class="clear"></div>
		</li>
                <li style="overflow: hidden; float: none; width: 198px; height: 78px;">
				<div class="info">
					<strong>NDEX (Next Day Express)</strong><br/>
					NEXT DAY EXPRESS DELIVERY(NDEX)to anywhere in India has been introduced for the first time in BG by Power Line</br><br/>
				</div>
				<div class="clear"></div>
		</li>

       </ul>
    </div>


</div>
                                                                        </div>


                                                <div class="features_block_center" style="color:#FFFFFF; font-size:12px">
                                                                        <pre class="style1">Quick Contacts</pre>
                                                                             <strong>Dhaka</strong><br />
												                         Power Line Air Express Ltd.<br />
												                         Hotline:+880 1713 482888, +880 1613 482888, +880 9678777544<br />

												           e-mail :<a href="mailto:hq@powerlinebd.net" target="_blank">                                                                       hq@powerlinebd.net</a> <br/><br/>
                                                                                <strong>Delhi</strong><br />
												                             Main Office<br />
                                                                      Customer Care   : +91 9599810873, +91 9599810874, +91 9599810875, 9599810875<br />

												      email :<a href="mailto:info@powerline-ind.com" target="_blank">                                                               info@powerline-ind.com</a><br/><br/>

                                                                   <strong>Colombo</strong><br />
												                             Forwardair Courier (PVT) Ltd.<br />
                                                                      Tel: +94 11 2426600 ,4367000  <br />
												                      Contact Person : Shehan Anthony Mohamed<br />
												      email :<a href="mailto:shehan@forwardairxpress.com" target="_blank">                                                               shehan@forwardairxpress.com</a>



                                                               </div>





                                                 <div class="features_block_right" style="color:#FFFFFF; font-size:12px">
                                                   <pre class="style1">Important Details</pre>
                                                   01.Shipments must be handed over before 11:00 PM.<br/><br/>
02.Delivery time to Delhi & NCR is 24 to 48 hours. Delivery time beyond Delhi is 48 to 72 hours. Delivery transit time given is general. Delay in delivery may occur from time to time due to air port customs , airlines delay & other abnormal situations.
<br/><br/>
03.Please provide proper invoice in order to complete customs clearance properly.<br/><br/>
04.If any discrepancy found between shipment�s invoice and shipment�s physical count then the same may be detained by customs authorities or seized. Power Line Air Express Ltd. will not receive any claim if a commercial invoice is prepared by Power Line Air Express Ltd. to export commodities outside Bangladesh for foreign customs clearance.<br/><br/>
05.The result on web tracking is treated as soft copy POD (Proof of Delivery).<br/><br/>
06.Please call our hotline (+880-2) 8961611, 8963856 if tracking result is found negative.<br/><br/>
07.For duty free clearance , please call our hotline numbers for details.<br/><br/>
</div>
                                                       </td></tr></table>

                </div>

@endsection
