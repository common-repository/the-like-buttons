<?php
/*
Plugin Name: Like Butons To Tweeter,Stumbleupon,Linkedin,Digg,Buzz,Facebook
Description: This Plug-in enables you to "tweet" your blog content to all the major social networks.
Right now we support the networks: Tweeter,Stumbleupon,Linkedin,Digg,Buzz,Facebook .
If you install this Plug-In Please Rate it.
Version: 1.1
Author: kid_rock
*/

/*
Copyright 2011  kid_rock (Email : kid_rock@hush.com)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
    
*/
//load the javascript
function socialbutton_integration() {
if (is_single()) { ?> 
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<script type="text/javascript" src="http://www.google.com/buzz/api/button.js"></script>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="text/javascript">
(function() {
var s = document.createElement('SCRIPT'), s1 = document.getElementsByTagName('SCRIPT')[0];
s.type = 'text/javascript';
s.async = true;
s.src = 'http://widgets.digg.com/buttons.js';
s1.parentNode.insertBefore(s, s1);
})();
</script>
<?php }
 }
add_action('wp_footer', 'socialbutton_integration');

//insert the buttons after post contents
function socialbutton($content) {
if(is_single()) {
$content.= '
<style>
*{margin:0; padding:0;}
ul{ list-style:none;}
#socialbuttonnav {width:90%; overflow:hidden;margin:0 auto;}
#socialbuttonnav li{background:none;overflow:hidden;width:65px; height:80px; line-height:30px; margin-right:2px; float:left; text-align:center;}
#fb { text-align:center;border:none; }
#fb iframe {text-align: center;float:left; }
.social_bookmark {
	padding:2px;
	display:block;
	margin-left:auto;
	margin-right:auto;
	text-align:center;
}

.social_img {
	padding:1px;
}

#dwcredit {
height: 1px; width: 1px; float:left;
}

#dwcredit a#dwlogo {
background: url(credit.png) no-repeat 0% 0%; display: block; height: 1px; text-indent: -999px; width: 1px;
}

</style>
<ul id="socialbuttonnav">
<li><!-- Twitter--><div><a name="twitter_share" data-count="vertical" href="http://twitter.com/share" class="twitter-share-button" >Tweet</a></div></li>
<li><!-- Google plus one--><div><g:plusone size="tall" count="true"></g:plusone></div></li><li><!-- stumbleupon--><div><script src="http://www.stumbleupon.com/hostedbadge.php?s=5"></script></div></li>
<li><!-- linkedin--><div><script type="in/share" data-counter="top"></script></div></li><li><!-- digg--><div><a class="DiggThisButton DiggMedium" href="http://digg.com/submit?url="<?php the_permalink(); ?>"&amp;title="<?php the_title(); ?>""></a></div></li>
<li><!-- Buzz--><div><a title="Post to Google Buzz" class="google-buzz-button" href="http://www.google.com/buzz/post" data-button-style="normal-count"></a></div></li>
<li><!-- Facebook like--><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=220231561331594&amp;xfbml=1"></script><fb:like href="" send="false" layout="box_count" width="0" show_faces="false" font=""></fb:like></li><br><br><br><br><br><br><br><br><br><br><br><br><ul id="dwcredit"><li><!-- test--><div><a href="http://www.autofarm.ro" name="piese auto" >Piese Auto</a></div>
</ul>';

}


return $content;
}
add_filter ('the_content', 'socialbutton');