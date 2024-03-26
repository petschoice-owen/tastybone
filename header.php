<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-92410626-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-92410626-1');
	</script>
	
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-16483655159">
	</script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'AW-16483655159');
	</script>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <?php global $wp;
    $current_url = home_url(add_query_arg(array(), $wp->request)); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="TastyBone | Shop Nylon Dog Bones & Chew Toys Online UK" />
    <meta name="author" content="Pets Choice" />
    <meta name="format-detection" content="telephone=no" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png">
    <title><?php if (is_front_page()) { bloginfo('name'); ?> | <?php bloginfo('description'); } else { wp_title(''); } ?></title>
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" />
    <link rel="canonical" href="<?php echo $current_url; ?>" />
	<?php wp_head(); ?>
</head>
	
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '280876040460735');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=280876040460735&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->