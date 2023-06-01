<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title>jQuery Mobile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

	<link rel="stylesheet" type="text/css" href="/travel/db/m/css/style.css?v=<?=time()?>">
	<link rel="stylesheet" type="text/css" href="/travel/db/m/css/basic.css?v=<?=time()?>">
	<link rel="stylesheet" type="text/css" href="/travel/db/m/css/button.css?v=<?=time()?>">
	<link rel="stylesheet" type="text/css" href="/travel/db/m/css/sub.css?v=<?=time()?>">
	<link rel="stylesheet" type="text/css" href="/travel/db/m/css/trip.css?v=<?=time()?>">  
	<link rel="stylesheet" type="text/css" href="/travel/db/css/jquery-ui.css?v=<?=time()?>">


	<script type="text/javascript" src="/travel/db/js/jquery-3.6.1.min.js?v=<?=time()?>"></script>
	<script type="text/javascript" src="/travel/db/js/jquery-ui.min.js?v=<?=time()?>"></script>
	<script type="text/javascript" src="/travel/db/m/js/script.js?v=<?=time()?>"></script>
	<script type="text/javascript" src="/travel/db/js/placeholders.min.js?v=<?=time()?>"></script> 
	<script type="text/javascript" src="/travel/db/m/js/common.js?v=<?=time()?>"></script> 

    <link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>



</head>

<body><!-- 첫 번째 페이지 -->

<div>
    가나다라 헤더
</div>
    <div data-role="page" id="first_page"> 
        <div data-role="header">        <h1>Mobile</h1>    </div>   
        <div data-role="center">        
            <ul data-role="listview">            
                <li>        <a href="#page2" data-transition="slide">SLIDE</a></li>            
            <li><a href="#page2" data-transition="slideup">SLIDE UP</a></li>            
            <li><a href="#page2" data-transition="slidedown">SLIDE DOWN</a></li>           
            <li><a href="#page2" data-transition="pop">POP</a></li>            
            <li><a href="#page2" data-transition="fade">FADE</a></li>            
            <li><a href="#page2" data-transition="flip">FLIP</a></li>        
            </ul>    
        </div>    
         
        <div data-role="footer">        <h1>FOOTER</h1>    </div>

    </div>
    

    <div data-role="page" id="page2"> 
        <div data-role="header">        <h1>Mobile2</h1>    </div>   
        <div data-role="center">        
            <ul data-role="listview">            
                <li>        <a href="#page3" data-transition="slide">SLIDE</a></li>            
            <li><a href="#page3" data-transition="slideup">SLIDE UP</a></li>            
            <li><a href="#page3" data-transition="slidedown">SLIDE DOWN</a></li>           
            <li><a href="#page3" data-transition="pop">POP</a></li>            
            <li><a href="#page3" data-transition="fade">FADE</a></li>            
            <li><a href="#page3" data-transition="flip">FLIP</a></li>        
            </ul>    
        </div>    
         
        <div data-role="footer">        <h1>FOOTER</h1>    </div>

    </div>


    <div data-role="page" id="page3"> 
        <div data-role="header">        <h1>Mobile3</h1>    </div>   
        <div data-role="center">        
            <ul data-role="listview">            
                <li>        <a href="#page4" data-transition="slide">SLIDE</a></li>            
            <li><a href="#page4" data-transition="slideup">SLIDE UP</a></li>            
            <li><a href="#page4" data-transition="slidedown">SLIDE DOWN</a></li>           
            <li><a href="#page4" data-transition="pop">POP</a></li>            
            <li><a href="#page4" data-transition="fade">FADE</a></li>            
            <li><a href="#page4" data-transition="flip">FLIP</a></li>        
            </ul>    
        </div>    
         
        <div data-role="footer">        <h1>FOOTER</h1>    </div>

    </div>

    <div data-role="page" id="page4"> 
        <div data-role="header">        <h1>Mobile4</h1>    </div>   
        <div data-role="center">        
            <ul data-role="listview">            
                <li>        <a href="#second_page" data-transition="slide">SLIDE</a></li>            
            <li><a href="#second_page" data-transition="slideup">SLIDE UP</a></li>            
            <li><a href="#second_page" data-transition="slidedown">SLIDE DOWN</a></li>           
            <li><a href="#second_page" data-transition="pop">POP</a></li>            
            <li><a href="#second_page" data-transition="fade">FADE</a></li>            
            <li><a href="#second_page" data-transition="flip">FLIP</a></li>        
            </ul>    
        </div>    
         
        <div data-role="footer">        <h1>FOOTER</h1>    </div>

    </div>

    <!-- 두 번째 페이지 -->
    <div data-role="page" id="second_page">    <div data-role="header" data-add-back-btn="true">        <h1>Other Page</h1>    </div>    
    <div data-role="content">        <p>Lorem ipsum dolor sit amet</p>    </div>    <div data-role="footer">        <h1>FOOTER</h1>    </div>
    </div>


    <div>
    가나다라 푸터
</div>

    
</body>

</html>