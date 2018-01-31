<html lang="en">
	<head>
		<title><?php echo $title; ?></title>
		<meta name="resource-type" content="document" />
		<meta name="robots" content="all, index, follow"/>
		<meta name="googlebot" content="all, index, follow" />
	<?php
	/** -- Copy from here -- */
	if(!empty($meta))
	foreach($meta as $name=>$content){
		echo "\n\t\t";
		?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
			 }
	echo "\n";

	if(!empty($canonical))
	{
		echo "\n\t\t";
		?><link rel="canonical" href="<?php echo $canonical?>" /><?php

	}
	echo "\n\t";

	foreach($css as $file){
	 	echo "\n\t\t";
		?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
	} echo "\n\t";

	foreach($js as $file){
			echo "\n\t\t";
			?><script src="<?php echo $file; ?>"></script><?php
	} echo "\n\t";

	/** -- to here -- */
    ?>
        
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url('/assets/themes/default/images/favicon.png'); ?>" type="image/x-icon"/>
    <meta property="og:image" content="<?php echo base_url('/assets/themes/default/images/facebook-thumb.png'); ?>"/>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Web Manage IE's Inventory</title>
    <link rel="image_src" href="<?php echo base_url('/assets/themes/default/images/facebook-thumb.png'); ?>" />
    
    <?php echo link_tag('assets/themes/css/style.css'); ?>
    <?php echo link_tag('assets/themes/node_modules/bootstrap/dist/css/bootstrap.min.css'); ?>
    <?php echo link_tag('assets/themes/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.css'); ?>
    <?php echo link_tag('assets/themes/node_modules/font-awesome/css/font-awesome.css'); ?>


</head>

<body class="sidebar-icon-only">
    
    <div class=" container-scroller">
        <!-- side navigation -->
        <?php echo $this->load->get_section('_navbar'); ?>
        <!-- /side navigation -->
        <div class="container-fluid">
            <div class="row row-offcanvas row-offcanvas-right">
                <!-- sidebar -->
                <?php echo $this->load->get_section('_sidebar'); ?>

            
                <!-- partial -->
                <div class="container-fluid">
                    <div class="row row-offcanvas row-offcanvas-right">
                        <div class="content-wrapper">
                            <?php echo $output;?>
                        </div>

                        <?php echo $this->load->get_section('_footer'); ?>
                    </div>
                </div>
                <!-- partial -->
            </div>
        </div>
    </div>

</body>

</html>