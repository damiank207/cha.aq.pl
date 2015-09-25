
<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="js/my_lib.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="js/jquery.classywiggle.min.js"></script>
<script src="js/jquery.gridster.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.gridster.css">
<title>QuickCh@t</title>
<link rel="stylesheet" type="text/css" href="css/logreg.css" media="all">
<link href='http://fonts.googleapis.com/css?family=Alegreya&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Kalam&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Alegreya&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Just+Me+Again+Down+Here&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/index.css" media="all">

</head>
<body style="margin:0 0 0 0;overflow:none;">
<div id="body" class="divolo gridster" style="">
<div style="position:absolute; width:100%; margin-top:30px;">
<ul class="gridster ul-grid">
    
</ul>
</div>

<div class="" style="" id="szarosc">
                    
                        <div id="myDiv" class="wiggle" style="">
                        <img src="image/logo.png" style="height: 100px;margin-top: 34px;">
                        <p class="logregformp" onclick="Swap();">Logowanie / Rejestracja</p>
                        <div class="logform">
                        <table style="margin-left: auto;margin-right: auto;">

                            <tr>
                                <td><p>Login</p></td>
                                <td><input pattern=".{3,}" id="logino" name="logino" type="text" placeholder="login" required></td>
                            </tr><tr>
                                <td><p>Hasło</p></td>
                                <td><input pattern=".{3,}" id="passo" name="passo" type="password" placeholder="hasło" required></td>
                            </tr><tr>
                                <td><tr><td colspan="2"><input type="button" name="login" onclick="SprLog();" value="login"></td></tr></td>
                            </tr><tr>
                                <td><tr><td colspan="2" id="flash"></td></tr></td>
                            </tr>
                        </table>
                        </div>
                        <div class="regform" style="display:none;"><form action="./" method="post">
                        <table style="margin-left: auto;margin-right: auto;">

                            <tr>
                                <td><p>Login</p></td>
                                <td><input pattern=".{3,}" id="loginor" name="loginor" onblur="Blur(this);" type="text" placeholder="login" required></td>
                            </tr><tr>
                                <td><p>Hasło</p></td>
                                <td><input pattern=".{3,}" id="passor" name="passor" onblur="Blur(this);" type="password" placeholder="hasło" required></td>
                            </tr><tr>
                                <td><p>Imię</p></td>
                                <td><input pattern=".{3,10}" class="cap" id="imi" name="imi" onblur="Blur(this);" type="text" placeholder="imię" required></td>
                            </tr><tr>
                                <td><p>Nazwisko</p></td>
                                <td><input pattern=".{3,20}" class="cap" id="naz" name="naz" onblur="Blur(this);" type="text" placeholder="nazwisko" required></td>
                            </tr><tr>
                                <td><p>Unikalny tag</p></td>
                                <td><input pattern=".{3,10}" id="ksywa" name="ksywa" onblur="Blur(this);" type="text" placeholder="tag" required></td>
                            </tr><tr>
                                <td><p>Email</p></td>
                                <td><input pattern="/[^@]+@[^@]+/" id="email" name="email" onblur="Blur(this);" type="email" placeholder="email" required></td>
                            </tr><tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                        <input type="button" name="rejestr" onclick="Regis();" value="Rejestracja">
                        </form>
                            <p class="poprawne">Rejestracja zakończona powodzeniem</p><p class="niepoprawne">Napotkano jakiś błąd, prosimy o ponowne przejście procesu rejestracji</p>
                        </div>
                    

                        </div>

</div>
<!--PANEL-->
<div class="panel">
  <div class="menu" onclick="Ppanel(); ">PROFIL</div>
  <div class="menu" onclick="dznaj(); showAski(); ">DODAJ ZNAJOMYCH</div>
  <div class="menu"><a href="logout.php">WYLOGUJ</a></div>
</div>



<div style="-webkit-box-shadow: rgba(0, 0, 0, 0.498039) 0px 0px 38px 30px;
box-shadow: rgba(0, 0, 0, 0.498039) 0px 0px 38px 30px;margin-right: 0%;" id="lista">


    <!--ZNAJOMI-->
    <div class="flist"><span class="flist">Wszyscy znajomi</span></div>
        <div id="friendslist" style="overflow:auto; display:block">
                <ul id="listerALL" style="">
        </ul>
        </div>
    </div>
    <div>

    </div>
    <div class="helper" style="display:none;">
        <div style="background-color: red;width: 630px;height: 513px;display: block;position: absolute;left: 164px;top: 60px;"></div>
    </div>


</div>

<div style="z-index:99999999; color:#fff; font-weight:800;position:absolute;display:none;" >
    <input id="slogin" class="slogin" type="button" value="szybki login :)" onclick="szybki_login();">
</div>
<div class="profile" style="display:none;">
  <p class="profp">Personalizacja profilu</p>
  <table class="tper">
    <tbody><tr>
      <td><p class="profc"></p>Imię</td>
      <td><div><input class="cap" type="text" name="imi" id="perimi" placeholder="imię" > <span class="pointer" onclick="Change(this)">✔</span></div></td>
    </tr>
    <tr>
      <td><p class="profc"></p>Nazwisko</td>
      <td><div><input class="cap" type="text" name="naz" id="pernaz" placeholder="nazwisko" > <span class="pointer" onclick="Change(this)">✔</span></div></td>
    </tr>
    <tr>
      <td><p class="profc"></p>Tag</td>
      <td><div><input type="text" name="ksywa" id="perksywa" placeholder="tag" > <span class="pointer" onclick="Change(this)">✔</span></div></td>
    </tr>
    <tr>
      <td><p class="profc"></p>Email</td>
      <td><div><input type="text" name="email" id="peremail" placeholder="email" > <span class="pointer" onclick="Change(this)">✔</span></div></td>
    </tr>
    <tr>
      <td><p class="profc"></p>Hasło</td>
      <td><div><input type="text" name="pass" id="perpass" placeholder="hasło" > <span class="pointer" onclick="Change(this)">✔</span></div></td>
    </tr>
    <tr>
      <td><p class="profc"></p>Miniaturka</td>
      <td><div><input type="text" name="mini" id="permini" placeholder="url do miniatury" > <span class="pointer" onclick="Change(this)">✔</span></div></td>
    </tr>
    <tr></tr>
  </tbody></table>
</div>
<div class="settings" id="sett" style="width: 446px;height: auto;left: 11%;top: 11%;z-index: 99999999;font-weight: 800;position: absolute;
-webkit-box-shadow: rgba(0, 0, 0, 0.498039) 0px 0px 16px 0px;box-shadow: rgba(0, 0, 0, 0.498039) 0px 0px 16px 0px;
background-color: rgba(0, 0, 0, 0.4);display:none;"><p type="button" class="usett" id="remsett" 
style="  float: right;  position: relative;  margin-top: -1px;  width: 22px;
  text-align: center;  margin-right: 3px;  margin-top: 3px;
  /* border: 1px solid black; */  cursor: pointer;" onclick="uznaj();">X</p>
    <div id="dznajwin" style="text-align:center;">
        <div>
            <p class="wind" style="font-family: 'Kalam', sans-serif;color: lightcyan;font-size: 20px;margin-top: 39px;"> Dodaj znajomego </p>
            <input style="padding: 3px;width: 180px;text-align: center;" type="text" id="znajdznaomego" placeholder="tag" >
            <input type="button" value="wyślij zaproszenie" onclick="showResult()">
<div id="komunikatznajomych" style="width: 300px;height: 51px;margin-left: auto;margin-right: auto;margin-bottom: -30px;margin-top: 10px;background-color: #D9FFDF;-webkit-border-radius: 10px;  -moz-border-radius: 10px;  border-radius: 10px;padding: 10px 0 0 0;font-size: 18px;font-weight: 100;color: cadetblue; opacity:0.0001;"></div>
        </div>
        <div id="listawynikowznalezionychludzi">

        </div>
    </div>
    <div>
        <p style="text-align:center;font-family: 'Kalam', sans-serif;color: lightcyan;font-size: 20px;margin-top: 39px;"> Osoby, które chcą Cię dodać </p>
        
    <div id="lelcichcaciedodac"></div>
    </div>
</div>

</body>
</html>