
function trim(str){
     var str = str.replace(/^\s+|\s+$/,'');
     return str;
}//trim
function Swap(){
    if( $( '.logform' ).is(':visible') ) {
        $( ".logform" ).hide( "fast" );
        $( ".regform" ).show( "fast" );
    }
    else {
        $( ".logform" ).show( "fast" );
        $( ".regform" ).hide( "fast" );
    }
}
function FirendsList(){
    $.ajax({
        type:"POST",
        url: "php/friendsALL.php",
        cache: false,
        success: function(result){
            var result = trim(result);
            document.getElementById("listerALL").innerHTML = result;
        }//success
    })//ajax
}
function SprLog(){
    var logino = $('#logino').val();
    var passo = $('#passo').val();

    var dataString = 'logino='+ logino + '&passo='+ passo;
    $("#flash").show();
    $("#flash").fadeIn(400).html('<img src="image/loading.gif" />');
    $.ajax({
    	type: "POST",
    	url: "php/processed.php",
    	data: dataString,
    	cache: false,
    	success: function(result){
    	     var result = trim(result);
    	     $("#flash").hide();
		  		if(result =='correct'){
						$( "#myDiv" ).animate({ "margin-left": "-400px" }, 700 );
						$( "#szarosc" ).fadeOut( "fast" );
                        $( "#lista" ).fadeIn( "slow" );
						$( ".panel" ).fadeIn( "slow" );
						$( "#slogin" ).fadeOut( "fast" );
                        FirendsList();
    					var ga = document.createElement('script');
                        console.log(ga);
        				ga.type = 'text/javascript';
        				ga.async = true;
        				ga.src = 'js/lib_next2.js';
                        console.log(ga);
    					var s = document.getElementsByTagName('script')[0];
                        console.log(s);
        				s.parentNode.insertBefore(ga, s);

                        $("#lista").draggable({ handle: ".flist" });
                        $( "span .flist" ).disableSelection();
                        $("#sett").draggable({ handle: ".wind" });
                        $( "p .wind, .menu" ).disableSelection();
		       	}else{
						$(document).ready(function() {$('.wiggle').ClassyWiggle();});
						console.log(result);
		       	}
    	}//success
    });//ajax
}//SprLog
function Regis(){
    var loginor, passor, imi, naz, ksywa, email;
    loginor ='loginor=' + $( "#loginor" ).val();
    passor = '&passor=' + $( "#passor" ).val();
    imi = '&imi=' + $( "#imi" ).val();
    naz = '&naz=' + $( "#naz" ).val();
    ksywa = '&ksywa=' + $( "#ksywa" ).val();
    email = '&email=' + $( "#email" ).val();
    var dataStringk = loginor + passor + imi + naz + ksywa + email;
    $.ajax({
        type: "POST",
        url: "php/processedr.php",
        data: dataStringk,
        cache: false,
        success: function(result){
            var result=trim(result);
            console.log(result);
            if(result==""){
                $(".poprawne").fadeIn( "slow" );
                $(".poprawne").fadeOut( "slow" );
            }
            else{
                $(".niepoprawne").fadeIn( "slow" );
                $(".niepoprawne").fadeOut( "slow" );
            }
        }
    })//ajax
}//Regis
function Blur(param){
    var check, check2, datafwd;
    check = param.name;
    check2 = $("#"+check).val();
    if(check2!= ""){
        datafwd = check + "=" + check2;
        $.ajax({
            type: "POST",
            url: "php/blur.php",
            data: datafwd,
            cache: false,
            success: function(result){
                var result=trim(result);
                console.log(result);
                    if(result=="1"){$("#"+check).css("background-color","rgba(114, 255, 0, 0.4)")}
                        else{$("#"+check).css("background-color","rgba(255, 0, 0, 0.41)")}
            }
        })
    }else{$("#"+check).css("background-color","rgba(255, 0, 0, 0.41)")}
};

function dznaj(){
    if( $( "#sett" ).is(':visible') ) {
        $( "#sett" ).fadeOut( "slow" );
    }
    else {
        $( "#sett" ).fadeIn( "slow" );
    }
}
function uznaj(){
    $( "#sett" ).fadeOut( "slow" );
}
function flist(){
    if( $( '#lista' ).is(':visible') ) {
        $( "#lista" ).css( "opacity","0.4;" );
    }
    else {
        $( "#lista" ).fadeIn( "slow" );
    }
}
function Ppanel(){
    if( $( '.profile' ).is(':visible') ) {
        $( ".profile" ).fadeOut( "slow" );
    }
    else {
        $( ".profile" ).fadeIn( "slow" );
    }
}