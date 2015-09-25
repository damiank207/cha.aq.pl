
$(function(){ /*DOM Ready*/
	var gridster = $(".gridster .ul-grid").gridster().data('gridster');
});//gridster
$(function(){ /*DOM Ready*/
    $(".gridster .ul-grid").gridster({
        widget_margins: [10, 10],
        widget_base_dimensions: [11, 11]
    });
});
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
				var udataa = this.getAttribute("data-user");
				$.ajax({
					type:"POST",
					url: "php/sprczyrozmist.php",
					data: udataa,
					cache: false,
					success: function(result){
						var result = trim(result);
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
							var znac=document.createElement("div");
								znac.setAttribute("class","znaczek");
								znac.innerHTML = "-";
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

							var interArray = [];

							$.ajax({
								type:"POST",
								url: "php/sprawdzanieporazpierwszy.php",
								data: "tenid="+udataa,
								cache: false,
								success: function(result){
									var result = trim(result);
									$("div").find("[data-textbox='" + udata + "']").html(result);
									$("[data-textbox='"+udata+"']").animate({scrollTop:1000}, '500', 'swing');
									}
							})


//$.ajax({
//												type:'POST',
//												url:'sprawdznowych.php',
//												data:'tenid='+udataa,
//												cache:false,
//												success:function(result){
//													var result=trim(result);
//													$('div').find('[data-textbox="' + udata + '"]').html(result);
//													$('[data-textbox="'+udata+'"]').animate({scrollTop:1000}, '500', 'swing');
//													console.log('AVE bo działa');
//												}
//											})
//								
								


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
											result = "";
										}
									})
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
							$(".divino").unbind('keyup');
							$('.divino').keyup(function ( event ) {
								var code = (event.keyCode ? event.keyCode : event.which);
								
								if (code == 9) {
									$( this ).addClass('aktywny').siblings().removeClass('aktywny');
									$( this ).closest('li').addClass("activ").siblings().removeClass('activ');
									$( this ).draggable({ stack: ".divuno" });
									
								}else if (code == 27) {
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