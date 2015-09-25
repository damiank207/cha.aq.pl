

$(function(){ /*DOM Ready*/
	var gridster = $(".gridster .ul-grid").gridster().data('gridster');
});//gridster
$(function(){ /*DOM Ready*/
    $(".gridster .ul-grid").gridster({
        widget_margins: [10, 10],
        widget_base_dimensions: [11, 11]
    });
});
var interarray = ["demo","demo"];
$(".flist").click(zerknijnamoichznajomych());
function zerknijnamoichznajomych(){
	$.ajax({
		type:"POST",
		url: "php/friendsALL.php",
		cache: false,
		success: function(result){
			var result = trim(result);
			document.getElementById("listerALL").innerHTML = result;


			$( ".lister" ).click(function dodaj(){
				var udataas = this.getAttribute("data-user");
				$.ajax({
					type:"POST",
					url: "php/sprczyrozmist.php",
					data: "udataas="+udataas,
					cache: false,
					success: function(result){
						var result = trim(result);
						console.log(result);
					}
				})
				imnaz = $( $( this ).children('.imiee')).text() + " " + $( $( this ).children('.nazwiskoo')).text();
				ksywa = $( $( this ).children('.ksywaa')).text()
						var udataa = this.getAttribute("data-user");
						if($('.ul-grid li[data-unicorn='+udataa+']').length>0){
							$('.ul-grid li[data-unicorn='+udataa+']').children("div").animate({ opacity: 0.5 }, 90).animate({ opacity: 1 }, 90);
						}else{
							var uimg = this.getAttribute("data-img");
							var udata = this.getAttribute("data-user");
							var div1=document.createElement("div");
								div1.setAttribute("class","divuno divino");
								div1.setAttribute("style","float: left;");
							var div2=document.createElement("div");
								div2.setAttribute("class","rozek");
							var divx=document.createElement("div");
								divx.setAttribute("class","rozek2");
							var znac=document.createElement("div");
								znac.setAttribute("class","znaczek");
								znac.innerHTML = "-";
							var zamy=document.createElement("div");
								zamy.setAttribute("class","zamykaczka");
								zamy.innerHTML = "x";
							var div3=document.createElement("div");
								div3.setAttribute("class","divtr");
							var div4=document.createElement("div");
							if(uimg.length){div4.setAttribute("style","background-image:url('"+uimg+"')");}
								div4.setAttribute("class","obraz");
							var header=document.createElement("header");
							var div5=document.createElement("div");
								div5.setAttribute("class","pad");
							var div6=document.createElement("div");
								div6.setAttribute("class","textbox");
								div6.setAttribute("id","textbox");
								div6.setAttribute("data-textbox", udata);
							var div7=document.createElement("div");
								div7.setAttribute("class","wiadomo");
							var p1=document.createElement("p");
								p1.setAttribute("class","iminaz");
								p1.innerHTML = window.imnaz;
							var p2=document.createElement("p");
								p2.setAttribute("class","ksywa");
								p2.innerHTML = window.ksywa;
							var form=document.createElement("form");
							var textarea=document.createElement("textarea");
								textarea.setAttribute("id","textbox");
								textarea.setAttribute("class","wiadomosc");
								textarea.setAttribute("data-ser", udata);
								textarea.setAttribute("placeholder","Wiadomość");
							var li = document.createElement("li");
								li.setAttribute("data-unicorn", udata);
								div4.appendChild(header);
								div2.appendChild(znac);
								divx.appendChild(zamy);
								div1.appendChild(divx);
								div1.appendChild(div2);
								div1.appendChild(div3);
								div3.appendChild(div4);
								div5.appendChild(p1);
								div5.appendChild(p2);
								div3.appendChild(div5);
								div1.appendChild(div6);
								form.appendChild(textarea);
								div7.appendChild(form);
								div1.appendChild(div7);
								li.appendChild(div1);

							var gridster = $(".gridster .ul-grid").gridster().data('gridster');
							gridster.add_widget.apply(gridster, [li, 1, 5]);


							$.ajax({
								type:"POST",
								url: "php/sprawdzanieporazpierwszy.php",
								data: "tenid="+udataa,
								cache: false,
								success: function(result){
									var result = trim(result);
									$("div").find("[data-textbox='" + udata + "']").html(result);
									$("[data-textbox='"+udata+"']").animate({scrollTop:1000}, '500', 'swing');
									interarray[udataa]=setInterval(function(){
										$.ajax({
											type:"POST",
											url:"php/sprawdznowych.php",
											data: "tenid="+udataa,
											cache: false,
											success: function(result){
												var result = trim(result);
												//alert(result);
											//	alert('[data-textbox="' + udataa + '"]');
												$(result).appendTo(document.querySelector('[data-textbox="' + udataa + '"]'));
												//$("div").find("[data-textbox='" + udata + "']").append(result);
												$("[data-textbox='"+udata+"']").animate({scrollTop:9000}, '500', 'swing');
											}
										})
									},1000)
									}
							})

								


							$(".wiadomosc").unbind('keydown');
							var stringus, wiadomosctekstowa;
							$(".wiadomosc").on("keydown", function (event){
								var code = (event.keyCode ? event.keyCode : event.which);
								if (code == 13 && !event.shiftKey) {
									wiadomosctekstowa = this.getAttribute("data-ser");
									event.preventDefault();
									stringus = $(this).val();
									$.ajax({
										type:"POST",
										url: "php/wyslijwiadomoscdogoscianiechsiecieszy.php",
										data: "wiadomosctekstowa="+wiadomosctekstowa+"&stringus="+stringus,
										cache: false,
										success: function(result){
											var result = trim(result);
											console.log(result);
											result = "";
										}
									})
									if(stringus!=""){
										$("<div class='mes' data-time=Date.getTime()><div class='pon'><div class='wiad'><p class='c'>" +stringus+" </p></div></div></div>").appendTo(document.querySelector('[data-textbox="' + wiadomosctekstowa + '"]'));
									}
									$(this).val('');
								}
							});

							$(".divino").unbind('click');
							$('.divino').click(function() {
								$( this ).addClass('aktywny').siblings().removeClass('aktywny');
								$( this ).closest('li').addClass("activ").siblings().removeClass('activ');
							});//click divino

							$(".rozek").unbind('click');
							$('.rozek').click(function(){
								 if( $(this).children(".znaczek").html()=="-" )
								 {
								 	gridster.resize_widget( $(this).closest("li"), 1, 1 );
								 	$(this).next().next().next().slideUp();
								 	$(this).next().next().slideUp();
									$(this).children(".znaczek").html( "+" );
									$(this).next(".divtr").animate({ 'padding-top' : 5, 'padding-bottom' : 5, }, "slow" );
								}else{
								 	$(this).children(".znaczek").html( "-" );
								 	gridster.resize_widget( $(this).closest("li"), 1, 5 );
								 	$(this).next().next().next().slideDown();
								 	$(this).next().next().slideDown();
									$(this).next(".divtr").animate({ 'padding-top' : 10, 'padding-bottom' : 0, }, "slow" );
								}
							})//click rozek

							$(".rozek2").unbind('click');
							$(".rozek2").click(function(){
									$( this ).closest('li').addClass("activ").siblings().removeClass('activ');
									udataa = $(this).closest('li').attr('data-unicorn');
									clearInterval(interarray[udataa]);
									gridster.remove_widget( ".activ" );
							});

							$(".divino").unbind('keyup');
							$('.divino').keyup(function ( event ) {
								var code = (event.keyCode ? event.keyCode : event.which);
								
								if (code == 9) {
									$( this ).addClass('aktywny').siblings().removeClass('aktywny');
									$( this ).closest('li').addClass("activ").siblings().removeClass('activ');
									$( this ).draggable({ stack: ".divuno" });
									
								}else if (code == 27) {
									udataa = $(this).closest('li').attr('data-unicorn');
									clearInterval(interarray[udataa]);
									gridster.remove_widget( ".activ" );
									$( this ).remove();
								}
							});//keyup divino
						}//else if udataa
			});//click lister
			///////////////////////////////kk
		}//success
	})//ajax
}//zerknijnamoichznajomych
function Change(param){
    var cha, cha2, chafwd;
    cha2 = $(param).siblings("input").attr("name");
    cha = $(param).siblings("input").val();
    chafwd = cha2+"="+cha;
    if(cha==""){
        $(param).siblings("input").animate({backgroundColor:"#aa0000"},1);
        $(param).siblings("input").animate({backgroundColor:"#ffffff"},400);
    }else{
        $.ajax({
            type: "POST",
            url: "php/change.php",
            data: chafwd,
            cache: false,
            success: function(result){
                var result=trim(result);
                if(result!=1){
       				$(param).siblings("input").animate({backgroundColor:"#aa0000"},1);
       				$(param).siblings("input").animate({backgroundColor:"#ffffff"},400);
                }else{
       				$(param).siblings("input").animate({backgroundColor:"#008B1C"},1);
       				$(param).siblings("input").animate({backgroundColor:"#ffffff"},1500);
                }
            }
        })
    }
}
function showResult(str) {
	var ksywa = $('#znajdznaomego').val();

	var dataStringer = 'ksywq=' + ksywa;
	$.ajax({
		type: "POST",
		url: "php/dodo.php",
		data: dataStringer,
		cache: false,
		success: function(result){
			var result = trim(result);
			if(result =='1'){
				document.getElementById("komunikatznajomych").innerHTML = "zaproszenie już jest wysłane lub jesteście znajomymi";
			}else if(result == '0'){ 
				document.getElementById("komunikatznajomych").innerHTML = "wysłano zaproszenie";
			}else if(result == '3'){ 
				document.getElementById("komunikatznajomych").innerHTML = "nie ma takiej osoby";
			}else{
				document.getElementById("komunikatznajomych").innerHTML = "napotkano błąd";
			}
			$("#komunikatznajomych").fadeTo( "fast", 1 );
			$("#komunikatznajomych").fadeTo( "2000", 0.0001 )
		}//success
	})//ajax
};//showResult
function showAski(){;
	$.ajax({
		type: "POST",
		url: "php/asks.php",
		cache: false,
		success: function(result){
			var result = trim(result);
			document.getElementById("lelcichcaciedodac").innerHTML = result;
			$(".listaznajcodod").click(function(){
				var zmienniutka = this.getAttribute("data-user");
				console.log(zmienniutka);
				$.ajax({
					type: "POST",
					url: "php/accznaj.php",
					cache: false,
					data: "znajomy=" + zmienniutka,
					success: function(result){
						var result = trim(result);
						$("#lelcichcaciedodac").fadeOut("fast");
						$.ajax({
							type: "POST",
							url: "php/asks.php",
							cache: false,
							success: function(result){
								var result = trim(result);
								document.getElementById("lelcichcaciedodac").innerHTML = result;
							}//success
						})//ajax
						$("#lelcichcaciedodac").fadeIn("fast");
						$("#sett").fadeOut("fast");
					}//success
				})//ajax
			})//click listaznajcodod
		}//success
	})//ajax
}//showAski