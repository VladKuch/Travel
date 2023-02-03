<!DOCTYPE html>
<html>
    <head>
        <!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="/public/web/img/favicon.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
        <title>{% block title %} {% endblock %}</title>
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="/public/web/css/linearicons.css">
        <link rel="stylesheet" href="/public/web/css/font-awesome.min.css">
        <link rel="stylesheet" href="/public/web/css/bootstrap.css">
        <link rel="stylesheet" href="/public/web/css/magnific-popup.css">
        <link rel="stylesheet" href="/public/web/css/jquery-ui.css">				
        <link rel="stylesheet" href="/public/web/css/nice-select.css">							
        <link rel="stylesheet" href="/public/web/css/animate.min.css">
        <link rel="stylesheet" href="/public/web/css/owl.carousel.css">				
        <link rel="stylesheet" href="/public/web/css/main.css">
        {% block styles %} {% endblock %}
    </head>
    <body>
        {{ partial('includes/header') }}
        {% block content %}{% endblock %}
        <script src="/public/web/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="/public/web/js/popper.min.js"></script>
        <script src="/public/web/js/vendor/bootstrap.min.js"></script>			
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>		
        <script src="/public/web/js/jquery-ui.js"></script>					
        <script src="/public/web/js/easing.min.js"></script>			
        <script src="/public/web/js/hoverIntent.js"></script>
        <script src="/public/web/js/superfish.min.js"></script>	
        <script src="/public/web/js/jquery.ajaxchimp.min.js"></script>
        <script src="/public/web/js/jquery.magnific-popup.min.js"></script>						
        <script src="/public/web/js/jquery.nice-select.min.js"></script>					
        <script src="/public/web/js/owl.carousel.min.js"></script>							
        <script src="/public/web/js/mail-script.js"></script>	
        <script src="/public/web/js/main.js"></script>	

        {{ partial('includes/footer') }}
         {% block scripts %}{% endblock %}
    </body>
</html>