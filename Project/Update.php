<?php 
    session_start();
?>
<?php
        if(isset($_GET['submit']))
        {
            $conn = mysqli_connect("localhost","root","","17PCSA516"); 
            $Room_Type = $_GET['type'];
            $No_Of_Room = $_GET['total_no'];
            $Check_In = $_GET['in_time'];
            $Check_Out = $_GET['out_time'];
            $Rate = $_GET['rate'];
            $Phone = $_GET['number'];
            $_SESSION["Type"]=$Room_Type;
            $_SESSION["NoRooms"]=$No_Of_Room;
            $_SESSION["Time_In"]=$Check_In;
            $_SESSION["Time_Out"]=$Check_Out;
            $_SESSION["Rate"]=$Rate;
            if(!$conn)
            {
                die ('could not connect'.mysql_error());
            }
            $query="UPDATE Book set RoomType='$Room_Type' where Phone='$Phone'";
            mysqli_query($conn,$query)or
            die("error".mysqli_error($conn));
            $r=mysqli_affected_rows($conn);
            echo $r;
            if(r>0)
            {
             echo "Updation success!!!";
            }
            header("location:Display.php");
        }
        ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body style="font-family: 'Open Sans',sans-serif;">
        <!-- Sidebar (hidden by default) -->
        <nav class="sidebar bar-block card top animate-left" style="display:none;z-index:2;width:5%;min-width:200px;height: auto;background-color: black;color: white;margin-left: -8px" id="mySidebar">
            <br>
            <a href="javascript:void(0)" onclick="w3_close()" class="bar-item button" style="color: #9F8B27;font-size: 20px">☰</a>
            <a href="Rooms.html" onclick="w3_close()" class="bar-item button">ROOM</a>
            <a href="#Location" onclick="w3_close()" class="bar-item button">LOCATION</a>
            <a href="#Gallery" onclick="w3_close()" class="bar-item button">GALLERY</a>
            <a href="#FAQ" onclick="w3_close()" class="bar-item button">FAQ</a>
            <a href="#Contact" onclick="w3_close()" class="bar-item button">CONTACT US</a>
        </nav>
        
        <!-- Top menu -->
        <section class="head">
            <div style="max-width:1200px;">
                <div class="button padding-16 left" onclick="w3_open()" style="font-size: 20px">☰</div>
                <div class="left padding-16" style="font-size: 14px; margin-top: 5px;"><strong>FURAMA RIVERFRONT</strong></div>
                <div class="center padding-16"><img src="Images/logo.png" height="30px"></div>
                <!--<div class="right" style="margin-top: -45px"><strong>Login</strong></div>-->
            </div>
            <img src="Images/booking.jpg" width="101.2%" height="440px" style="margin-left: -8px;box-shadow: 2px -1px 2px 1px black">
        </section>
        <br>
        <strong style="padding-left: 4%;font-size: 200%">MAKE A RESERVATION</strong>
        <br>
        <br>
        <section>
            <form method="get" novalidate>
                <b>
                    <p style="background-color:#EEEEEE;margin-left:-5px;font-size:12px;padding:10px 20px">GUEST INFORMATION</p>
                </b>
                <table style="margin-left:10px;">
                    <tr>
                        <td style="font-size:15px;font-weight:bold;">FULL NAME</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <input type="text" name="f_name" id="f_name" required>
                            <p class="p1" id="err1"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td style="font-size:15px;font-weight:bold;">PHONE CONTACT</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <input type="tel" name="number" id="number" pattern="[0-9]*${10}" required>
                            <p class="p1" id="err2"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td style="font-size:15px;font-weight:bold;">EMAIL ADDRESS</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <input type="email" name="email" id="email" required>
                            <p class="p1" id="err3"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td style="font-size:15px;font-weight:bold;">PERSONAL ADDRESS</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <input type="text" name="address" id="address" required>
                            <p class="p1" id="err4"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                </table>
                <b>
                    <p style="background-color:#EEEEEE;margin-left:-5px;font-size:12px;padding:10px 20px">ROOM AND RATE INFORMATION</p>
                </b>
                <table style="margin-left:10px;">
                    <tr>
                        <td style="font-size:15px;font-weight:bold;">HOTEL NAME</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Furama RiverFront,Singapore</td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td style="font-size:15px;font-weight:bold;">ROOM TYPE</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <select name="type" id="type" onchange="copy();" required>
                                <option value="">Select:</option>
                                <option value="Superior">Superior</option>
                                <option value="Executive Club">Executive Club</option>
                                <option value="Family Room">Family Room</option>
                                <option value="Deluxe">Deluxe</option>
                            </select>
                            <p class="p1" id="err7"></p>
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td style="font-size:15px;font-weight:bold;">NUMBER OF ROOMS</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <select name="total_no" id="total_no" onchange="calcu();" required>
                                <option value="">Select:</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <p class="p1" id="err8"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td style="font-size:15px;font-weight:bold;">CHECK_IN TIME</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <input type="date" id="in_time" name="in_time" min="2019-03-19" max="2019-04-19" required>
                            <p class="p1" id="err5"></p>
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td style="font-size:15px;font-weight:bold;">CHECK_OUT TIME</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <input type="date" id="out_time" name="out_time" min="2019-03-19" max="2019-04-19" required>
                            <p class="p1" id="err6"></p>
                        </td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td style="font-size:15px;font-weight:bold;">RATE<sub>(*per room)</sub></td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td><div id="label"></div></td>
                        <input type="hidden" name="rate" id="rate">
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                            <td><input type="submit" name="submit" id="submit" value="Submit" style="background-color: #C5A978;font-size: 15px;padding: 12px 30px;text-align: center;border-radius: 10px;" required></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                </table>
            </form>
        </section>
        
        <!--Footer-->
        <footer style="background-color: #B3B1B1;margin-left: -8px;margin-right: -8px;">
            <br>
            <br>
            <p style="margin-left: 25px;">OUR BRANDS</p>
            <br>
            <img src="Images/logo.png" width="10%">
            <img src="Images/xclusive.png" width="10%"><img src="Images/fx.png" width="3%">
           <table style="margin-top: -80px;margin-left: 530px;">
               <tr>
                   <td style="font-size: 20px;">FURAMA RIVERFRONT</td>
               </tr>
               <tr>
                   <td>405 Havelock Road, Singapore 169633</td>
               </tr>
               <tr>
                   <td><strong>Tel</strong> (65) 6333 8898 Fax (65) 6733 1588</td>
               </tr>
               <tr>
                   <td><strong>Email</strong> riverfront@furama.com</td>
               </tr>
            </table>
            <br>
            <br>
        </footer>
        <script type="text/javascript">
            // Script to open and close sidebar
            function w3_open()
            {
                document.getElementById("mySidebar").style.display = "block";
            }

            function w3_close()
            {
                document.getElementById("mySidebar").style.display = "none";
            }
            
            //Display Rate
            function copy()
            {
                var type=document.getElementById("type").value;
                var Value;
                if(type == "Superior")
                {
                    document.getElementById("label").innerHTML=1000;
                    Value=1000;
                }
                else if(type == "Executive Club")
                {
                    document.getElementById("label").innerHTML=2000;
                    Value=2000;
                }
                else if(type == "Family Room")
                {
                    document.getElementById("label").innerHTML=1500;
                    Value=1500;
                }
                else if(type == "Deluxe")
                {
                    document.getElementById("label").innerHTML=3000;
                    Value=3000;
                }
                else
                {
                    document.getElementById("label").innerHTML="";
                }
            }
            //
            function calcu()
            {
                var type=document.getElementById("type").value;
                var Value;
                if(type == "Superior")
                {
                    //document.getElementById("label").innerHTML=1000;
                    Value=1000;
                }
                else if(type == "Executive Club")
                {
                    //document.getElementById("label").innerHTML=2000;
                    Value=2000;
                }
                else if(type == "Family Room")
                {
                    //document.getElementById("label").innerHTML=1500;
                    Value=1500;
                }
                else if(type == "Deluxe")
                {
                    //document.getElementById("label").innerHTML=3000;
                    Value=3000;
                }
                else
                {
                    document.getElementById("label").innerHTML="";
                }
                var no_room =  document.getElementById("total_no").value;
                var rate = no_room*Value;
                document.getElementById("rate").value=rate;
            }
            
            //Error Message
            var btns=document.getElementById('submit');
            function checking()
            {
                var checkes=1;
                var names=document.getElementById('f_name');
                if(names.checkValidity)
                {
                    document.getElementById("err1").innerHTML=names.validationMessage;
                    if(names.validationMessage.toString().length!=0)
                        checkes=0;
                }
                var email=document.getElementById('email');
                if(email.checkValidity)
                {
                    document.getElementById("err2").innerHTML=email.validationMessage;
                    if(email.validationMessage.toString().length!=0)
                        checkes=0;
                }
                var phone=document.getElementById('number');
                if(phone.checkValidity)
                {
                    document.getElementById("err3").innerHTML=phone.validationMessage;
                    if(phone.validationMessage.toString().length!=0)
                        checkes=0;
                }
                if(phone.validity.patternMismatch)
                {
                    document.getElementById("err3").innerHTML="Invalid Number";
                }
                var address=document.getElementById('address');
                if(address.checkValidity)
                {
                    document.getElementById("err4").innerHTML=address.validationMessage;
                    if(address.validationMessage.toString().length!=0)
                        checkes=0;
                }
                var in_time=document.getElementById('in_time');
                if(in_time.checkValidity)
                {
                    document.getElementById("err5").innerHTML=in_time.validationMessage;
                    if(in_time.validationMessage.toString().length!=0)
                        checkes=0;
                }
                var out_time=document.getElementById('out_time');
                if(out_time.checkValidity)
                {
                    document.getElementById("err6").innerHTML=out_time.validationMessage;
                    if(out_time.validationMessage.toString().length!=0)
                        checkes=0;
                }
                var type=document.getElementById('type');
                if(type.checkValidity)
                {
                    document.getElementById("err7").innerHTML=type.validationMessage;
                    if(type.validationMessage.toString().length!=0)
                        checkes=0;
                }
                total_no
                var total_no=document.getElementById('total_no');
                if(total_no.checkValidity)
                {
                    document.getElementById("err8").innerHTML=total_no.validationMessage;
                    if(total_no.validationMessage.toString().length!=0)
                        checkes=0;
                }
                if(checkes==0)
                {
                    return false;
                }
                else
                {
                    return true;
                }
           
            };
            btns.onclick=function(e)
            { 
                var checkes=checking();
                if(checkes==false)
                    {
                        e.preventDefault();
                    }
            };
        </script>
    </body>
</html>