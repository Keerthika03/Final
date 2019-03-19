<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page</title>
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
                <div class="right" style="margin-top: -45px"><strong><a href="Main.html">Login Out</a></strong></div>
                <div class="right" style="margin-top: -45px"><strong>Login</strong></div>
            </div>
            <img src="Images/nw_h_Rooms.jpg" width="101.2%" height="440px" style="margin-left: -8px;box-shadow: 2px -1px 2px 1px black">
        </section>
        <br>
        <?php
            $conn = mysqli_connect("localhost","root","","17PCSA516");                   
            $query="SELECT * FROM Book";
            if($queryres=mysqli_query($conn,$query))
            { 
                echo "<table border=4 align=center>
                        <tr>
                        <th>PHONE NUMBER</th>
                        <th>ROOM TYPE</th>
                        <th>TOTAL ROOMS </th>
                        <th>CHECK-IN TIME</th>
                        <th>CHECK-OUT TIME</th>
                        <th>COST</th>
                         </tr>";
                $row=mysqli_fetch_row($queryres);
                do
                {
                    echo "<tr>";
                    echo "<td>$row[0]</td>";
                    echo "<td>$row[1]</td>";
                    echo "<td>$row[2]</td>";
                    echo "<td>$row[3]</td>";
                    echo "<td>$row[4]</td>";
                    echo "<td>$row[5]</td>";
                    "</tr>";
                    $row=mysqli_fetch_row($queryres);
                }while($row);
                echo "</table>";
            }
            else
            {
                die ('could not connect'.mysql_error());
            }
        ?>
        <br>
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
        <script>
            // Script to open and close sidebar
            function w3_open()
            {
                document.getElementById("mySidebar").style.display = "block";
            }

            function w3_close()
            {
                document.getElementById("mySidebar").style.display = "none";
            }
            //Automatic SlideShow
            var myIndex = 0;
            carousel();
            
            function carousel()
            {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++)
                {
                    x[i].style.display = "none";  
                }
                myIndex++;
                if(myIndex > x.length)
                {
                    myIndex = 1
                }    
                x[myIndex-1].style.display = "block";  
                setTimeout(carousel, 2000); // Change image every 2 seconds
            }
        </script>
    </body>
</html>