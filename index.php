<html>  
    <head>  
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="css.css" type="text/css"/>   
        <link href="https://fonts.googleapis.com/css2?family=Audrey&display=swap" rel="stylesheet">
    </head>
    <body >
        <header>
            <nav>
                <ul>
                    <li class="aktivni"><a href="#home">HOME</a></li>
                    <li><a href="#about">ABOUT</a></li>
                    <li><a href="#customOrders">CUSTOM ORDERS</a></li>
                    <li><a href="#orders">ORDERS</a></li>
                    <li><a href="#gallery">GALLERY</a></li>
                    <li><a href="#contaks">CONTACT</a></li>
                </ul>
            </nav>
        </header>
            
        </section><section id="home">
            
            <img src="img/IMG_2300.png" alt="" height="100%">
        </section>
        <div id="NewColection">
            <div class="blockImages">
                <?php
                include_once("database.php");
                $array = getTopThree();
                foreach ($array as $key => $value) {
                    echo("<div class='OneImage'>");
                    echo('<a href="Pages/NewColection.php?id=' . $value['Id'] . '">'); // Přidání query parametru Id do URL
                    echo('<img class="images" src=\'' . $value['ImagePath'] . '\'/>');
                    echo("<h2>" . $value["Name"] . "</h2>");
                    if ($value["OriginalDigitalVersion"]==1)
                        print("Original digital version &nbsp;&nbsp;  Avaiable<br>");
                    else
                        print("Original digital version  &nbsp;&nbsp;  Unavaiable<br>");

                        if ($value["LimitedEditionOf50"]==1)
                        print("Limited edition of 50 &nbsp;&nbsp;  Avaiable<br>");
                    else
                        print("Limited edition of 50  &nbsp;&nbsp;  Unavaiable<br>");
                    
                        if ($value["AllSizesOptions"]==1)
                        print("All sizes options &nbsp;&nbsp;  Avaiable");
                    else
                        print("All sizes options  &nbsp;&nbsp;  Unavaiable");
                    
                    echo('</a>'); // Uzavření odkazu
                    echo("</div>");
                }
                ?>
            </div>
        </div>
        <div id="about">
        <div>
            <div class="blockImages">
            <div class="TextLeft">
        
                <h1>Prints</h1>
                <p>100% Authentic! Every print includes an official Certificate of Authenticity signed by the artist.</p>
            </div>

            <div class="TextCentr">
                <h2>HAND ENHANCED</h2>
                <p>Each limited edition is hand embellished by the artist, making it one of a kind artwork.</p>
                <h2>SIGNED & NUMBERED</h2>
                <p>Each fine art limited edition is signed by the artist, certifying their inspection and approval, then numbered. Prints are limited to 50 or 25 numbers.</p>

            <h2>DIGITAL FORMAT</h2>
                <p>Artworks are available in high resolution in multiple digital formats for example high-resolution JPEG, allowing for easy printing in large formats or use as digital wallpaper.</p>
            </div>
            <div class="TextRight">
                <h2>EXCEPTIONAL LONGEVITY</h2>
                <p>Special finish is a applied to give each print a

                protection against UV light, moisture and scratches. All prints are produced using top-tier printing technology, ensuring high quality and durability.</p>
                <h2>STATE-OF-THE-ART REPRODUCTION</h2>
                <p>Engineered for fine art market, my prints have an elegant, vibrant full color spectrum and maintain the look and feel of the original painting.</p>

                <h2>FOTMAT OPTIONS</h2>
                <p>I offer a wide range of options for printing and presenting my artworks, so everyone can choose what suits them best.</p>
            </div>


            </div>
            <p>
            This limited edition of hand-painted digital artworks is an ideal way to highlight your unique aesthetic and add a touch of elegance and originality to your space.

            This is a great way to enrich your home or workspace and express your unique aesthetic.

            This limited edition of hand-painted digital artworks is an ideal way to highlight your unique aesthetic and add a touch of elegance and originality to your space.

            You can be sure that owning one of these artworks is an experience you will cherish for a lifetime. Choose your favourite style and format and invest in art that holds value.
            </p>
        </div>
    </div>




    <div id="customOrders">
        
        <div class="blockImages">
            <video width="400" controls>
                <source src="mov_bbb.mp4" type="video/mp4">
                <source src="mov_bbb.ogg" type="video/ogg">
                Your browser does not support HTML video.
            </video>
            <div>  
                    <h2>PERSONALIZATION</h2>
                    <p>If you have a specific idea in mind, I'd be happy to create a custom artwork for you.
                    </p>
                <div>
                ARE YOU INTERESTED IN PERSONALIZED ARTWORK?
                <button/>
                </div>
            </div>
        </div>
    </div
    

</html>