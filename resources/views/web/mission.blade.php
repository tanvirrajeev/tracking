@extends('web.layout')

@section('content')

<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>

<style type="text/css">
.datatbl
{

line-height:20px;

}
.datatbl a:link, .datatbl a:active, .datatbl a:visited
{
color:#0F6FA9;
font-weight:bold;
border-bottom:1px dotted #EEEEEE;
}

.datatbl a:hover, .datatbl a:focus
{
color:#FF9900;
font-weight:bold;
border-bottom:1px dotted #0F6FA9;
}

</style>


<div  class="datatbl" >
<form  name="log_form" action="/page.php"  method="POST"    autocomplete="on" >


<p><span class="pgttlbl">Mission Statement... </span></p>
<p style="MARGIN: 0in 0in 0pt" class="MsoNormal"><img src="http://xtremehockey.files.wordpress.com/2009/11/mission-statement.jpg" alt="" alignment="" border="" hspace="" vspace=""></p><br><p></p><p style="MARGIN: 0in 0in 0pt" class="MsoNormal"><b><span style="FONT-FAMILY: Arial; COLOR: #ff6600; FONT-SIZE: 14pt"></span></b>At Power Line Air Express Ltd., our unwavering commitment is to provide our customers with the best delivery solutions throughout the <st1:place w:st="on"><st1:country-region w:st="on">India</st1:country-region></st1:place> , Hong Kong &amp; China. We relentlessly pursue providing the most environmentally friendly, responsive, customer oriented, point-to-point delivery service in <st1:country-region w:st="on">India</st1:country-region> , Hong Kong and <st1:place w:st="on"><st1:country-region w:st="on">China</st1:country-region></st1:place>. Power Line Air Express Ltd. and our service providers perform thousands of deliveries flawlessly on a daily basis. Power Line Air Express Ltd. is committed to remaining at the forefront of the latest 24 � 48 hours delivery technology. It is our goal to provide such superior service, that our customers rave about our service each time they use us.</p>
<p>&nbsp;</p>

</form>
</div>

@endsection
