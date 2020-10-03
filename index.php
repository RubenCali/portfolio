<!-- begin php to send email -->
<?php
// Checks if form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LdYAKgZAAAAAE0wGUgWefnx740n8-j6jcoijaJ7',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        // What happens when the CAPTCHA wasn't checked
        // echo '<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
    } else {
        // If CAPTCHA is successfully completed...

        // Paste mail function or whatever else you want to happen here!

        $email_to = "contact@rubencali.nl";
        $email_subject = "subject";

 function died($error) {
     echo "We are very sorry, but there were error(s) found with the form you submitted. ";
     echo "These errors appear below.<br /><br />";
     echo $error."<br /><br />";
     echo "Please go back and fix these errors.<br /><br />";
     die();
 }


 if(!isset($_POST['first_name']) ||
     !isset($_POST['last_name']) ||
     !isset($_POST['email']) ||
     !isset($_POST['telephone']) ||
     !isset($_POST['subject']) ||
     !isset($_POST['comments'])) {
     died('We are sorry, but there appears to be a problem with the form you submitted.');       
 }

  

 $first_name = $_POST['first_name']; // required
 $last_name = $_POST['last_name']; // required
 $email_from = $_POST['email']; // required
 $subject = $_POST['subject']; // required
 $telephone = $_POST['telephone']; // not required
 $comments = $_POST['comments']; // required

 $error_message = "";
 $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

if(!preg_match($email_exp,$email_from)) {
 $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
}

 $string_exp = "/^[A-Za-z .'-]+$/";

if(!preg_match($string_exp,$first_name)) {
 $error_message .= 'The First Name you entered does not appear to be valid.<br />';
}

if(!preg_match($string_exp,$last_name)) {
 $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
}

if(strlen($comments) < 2) {
 $error_message .= 'The Comments you entered do not appear to be valid.<br />';
}

if(strlen($error_message) > 0) {
 died($error_message);
}

 $email_message = "Form details below.\n\n";

  
 function clean_string($string) {
   $bad = array("content-type","bcc:","to:","cc:","href");
   return str_replace($bad,"",$string);
 }

  

 $email_message .= "First Name: ".clean_string($first_name)."\n";
 $email_message .= "Last Name: ".clean_string($last_name)."\n";
 $email_message .= "Email: ".clean_string($email_from)."\n";
 $email_message .= "Telephone: ".clean_string($telephone)."\n";
 $email_message .= "subject: ".clean_string($subject)."\n";
 $email_message .= "Comments: ".clean_string($comments)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
    }
sleep(20);
header('location: index.php');

    
  }

?>
<!-- end php code to send email -->


<?php require 'includes/functions.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Ruben Cali">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portfolio | Ruben Cali</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <meta name="description"
        content="Hello, I'm Ruben Cali. web developer. View my work. home. about. portfolio. blog. contact. ABOUT. Fast. Fast load times and lag free ...">
    <meta name="keywords"
        content="HTML,CSS,JavaScript, Ruben, ruben cali, rubencali portfolio, portfolio, proffesioneel portfolio, portfolios, proffesioneel webdeveloper, goedkoop webdeveleport, cheap webdeveloper, cv, C.V, CV, rubencali.nl,rubencali.nl, rubencali.com, aspaxx.com, aspax,nl, Aspaxx,Cheap,Website,Free Website,Websites,Aspaxx-english,Aspaxx.com,Aspaxx.nl,Wordpress,Wordpress Site,Cheap Website,Goedkope Website,Free,Web,Websyte,Websit,Websi,Webste,Asapx,Aspexx,Aspax,Responsive,Students,Student website,Studentwork,Students Site,Mediacollege,Holland,Nederlands,Youtube,Fiverr,google,Mees Postma,Mees,Postma,Ruben Cali,Ruben,Cali,Get your Website,Full website,design,graphic design,UI Design,Responsive Design,Cool design,Responsive website,website design,cool man,gave website,gaaf man,sick website,sick man,jo">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/x-icon" href="titel.ico">
    <script data-ad-client="ca-pub-5246692614333604" async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WDSDSK5');</script>
    <!-- End Google Tag Manager -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151872125-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-151872125-1');
    </script>




    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ibarra+Real+Nova&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
</head>


<body>
<script>
function functionAlert(msg, myYes) {
    var confirmBox = $("#confirm");
    confirmBox.find(".message").text(msg);
    confirmBox.find(".yes").unbind().click(function () {
        confirmBox.hide();
    });
    confirmBox.find(".yes").click(myYes);
    confirmBox.show();
}
</script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WDSDSK5" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

<!-- begin loading screen -->
    <div class="loader">
        <div class="inner">

        </div>
    </div>
    <!-- end loading screen -->

<!-- begin landpage -->
    <div id="landPage">
        <div class="logoLandPage"><img src="img/logo.PNG" alt="logo img"></div>
        <div class="titleMessage">
            <div class="heading">
                <h1 class="main">RUBEN CALI</h1>
                <p class="sub typed"></p>
            </div>
        </div> 
       <a data-scroll href="#contact" class="CTA">Get in contact</a>
       <div id="mouseScrollIcon">
            <span id="mouseWheel"></span>
        </div>
    <div class="underbar"></div>

</div>
<!-- end landpage -->

<!-- begin navbar -->
    <nav id="navigation" class="navbar navbar-expand-lg">
        <a data-scroll class="navbar-brand me" href="#landPage">Ruben Cali</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a data-scroll class="nav-link" id="leftie" href="#landPage">Home</a>
                </li>
                <li class="nav-item active">
                    <a data-scroll class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a data-scroll class="nav-link" href="#skills">Skills</a>
                </li>
                <li class="nav-item">
                    <a data-scroll class="nav-link" href="#portfolio">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a data-scroll class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- begin about section -->
    <div id="about" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img class="aboutImage" src="img/me.jpg" alt="Image">
                    <div class="underlayImg"></div>
                </div>
                <div class="col-md-7">
                    <h4 id="aboutme" class="me2 top">About me</h4>
                    <p>Hi there, my name is Ruben Cali and i'm currently studying at the Media College. I really enjoy
                        what i do, and i am
                        very excited to be able to build a website using Wordpress, HTML and CSS etc. i have about 1+
                        year of experience in webdevelopment. my hobbies are coding, playing football and kickboxing.
                    </p>
                    <p> At the moment i work for Albert Heijn, where i re-stock the shelves. I have been working for Albert Heijn for
                        about 1.5 year. 
                    </p>
                    <p> I am really excited to be able to work for a company that specialises in web development.
                        There are 2 sides of web development, 1 side is front-end development and back-end development. 
                        personally i enjoy front-end development more than back-end development, 
                        because you can really see what you made when you change something in the CSS and when i first started coding i always made HTML and CSS websites. 
                        Maybe you can even tell it by the way i build this website.
                        But i am able to do both front-end and back-end development.

                    </p>

                </div>
            </div>
        </div>
    </div>
    <!-- end about section -->

<!-- begin socials -->
    <div class="float-sm" id="socialsmedia">
        <div class="fl-fl float-fb">
            <a href="https://www.facebook.com/profile.php?id=100013200469419" target="_blank" class="socialMedia"
                rel="noreferrer">
                <img src="img/icons/facebook.png" alt="facebook" id="reSized1 " class="socialsIMGs facebook">
                <a href="https://www.facebook.com/profile.php?id=100013200469419" target="_blank" class="follow-link"
                    rel="noreferrer">Follow me!</a>
            </a>
        </div>
        <div class="fl-fl float-tw">
            <a href="https://www.linkedin.com/in/ruben-cali-6ba1b2196/" target="_blank" class="socialMedia"
                rel="noreferrer">
                <img src="img/icons/linkedin.png" alt="linkedin" id="reSized2 " class="socialsIMGs in">
                <a href="https://www.linkedin.com/in/ruben-cali-6ba1b2196/" target="_blank" class="follow-link"
                    rel="noreferrer">Follow
                    me!</a>
            </a>
        </div>
        <div class="fl-fl float-gp">
            <a href="https://accounts.snapchat.com/accounts/snapcodes" target="_blank" class="socialMedia"
                rel="noreferrer">

                <img src="img/icons/snap.png" alt="snap" class="socialsIMGs" id="snap">
                <a href="https://accounts.snapchat.com/accounts/snapcodes" target="_blank" class="follow-link">Follow
                    me!</a>
            </a>
        </div>
        <div class="fl-fl float-rs">
            <a href="https://www.instagram.com/rubencali_/?hl=nl" target="_blank" class="socialMedia" rel="noreferrer">
                <img src="img/icons/insta.png" alt="insta" class="socialsIMGs" id="insta">
                <a href="https://www.instagram.com/rubencali_/?hl=nl" target="_blank" class="follow-link"
                    rel="noreferrer">Follow
                    me!</a>
            </a>
        </div>

    </div>

<!-- end socials   -->

<!-- begin skills section -->
  <div id="skills" class="section skillsSection">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="me2 size">Technical skills</h2>
                    <p class="bottom">A visuel representation of my proficiency in each skill.<br> <span
                            class="swiping">(swipe to see all skills)</span></p>

                </div>
     
  
                <div class="owl-carousel owl-theme slidingg" id="skillsPart">
                <?php
                                         $statement = $connection->query('SELECT * FROM `skills`');
foreach ($statement as $row):
    ?>
                    <div class="skill">
                        <span class="chart" data-percent="<?php echo $row['percentage'] ?>">
                            <span class="percent"><?php echo $row['percentage'] ?></span>
                            <canvas height="152" width="152"></canvas>
                        </span>

                        <h4><?php echo $row['codeerTaal'] ?></h4>
                        <p><?php echo $row['beschrijving'] ?></p>
                    </div>
                    <?php endforeach; ?>


                </div>
           


            </div>
        </div>
    </div>
    <!-- end skills section -->

    <!-- begin portfolio section -->
    <div id="portfolio" class="section">
        <div class="uppersideLeft"></div>
        <div class="uppersideRight"></div>

        <div class="container">
            <div class="row">
                <div class="heading">
                    <h2 class="me2 centerr">Portfolio</h2>
                </div>
                <div class="filter">
                    <ul id="filters">
                        <li><a href="#" data-filter="*" class="current" >ALL</a></li>
                        <li><a href="#" data-filter=".apps">Projects</a></li>
                        <li><a href="#" data-filter=".me">School projects</a></li>
                        <li><a href="#" data-filter=".websites">websites</a></li>




                    </ul>
                </div>
                <div class="itemsContainer">
                    <ul class="items">
                        <?php 
                         $statement = $connection->query('SELECT * FROM `projects`');
                         foreach ($statement as $row):

                        ?>
                   
                        <li onclick="" class="<?php echo $row['soort'] ?>  col-xs-6 col-sm-4 col-md-3 col-lg-3 itemmm">
                            <div class="item">
                                <img src="img/portfolio/thumbnail/<?php echo $row['linkThumbnail'] ?>" alt="Image" class="sized">
                                <div class="icons">
                                 
                                    <a href="project.php" title="View project" class="openButton"
                                        rel="noreferrer">
                                        <img src="img/portfolio/search.jpg" alt="Image" class="iconsImg">
                                    </a>
                                    <a href="<?php echo $row['linkWebsite'] ?>" target="_blank" class="projectLink"
                                        title="View website" rel="noreferrer">
                                        <img src="img/portfolio/link.jpg" class="iconsImg" alt="Image">
                                    </a>
                                </div>
                                <div class="imageOverLay">   <h4><?php echo $row['titelProject'] ?></h4>
                                    <P><?php echo $row['kortBeschrijving'] ?></P></div>

                            </div>
                        </li>
                        <?php endforeach; ?>
                      

                    </ul>
                </div>
              

            </div>
        </div>
        <div class="gridKernwaarde">
        <div class="kernwaarde">
            <div class="kernwaarde-inner">
                <div class="kernwaarde-front">
                    <img src="img/portfolio/thumbnail/projectThumbnail.jpg" alt="project ">
                 
                </div>
                <div class="kernwaarde-back">
                    <h6><strong>Meaning of this picture:</strong></h6>
                    <p>These are projects i worked on in my own time to develop more knowlegde of my craft.</p>
                </div>
            </div>
                         </div>
            <div class="kernwaarde rightCart">
            <div class="kernwaarde-inner">
                <div class="kernwaarde-front">
                    <img src="img/portfolio/thumbnail/schoolThumbnail.jpg" alt="school project">
                 
                </div>
                <div class="kernwaarde-back">
                <h6><strong>Meaning of this picture:</strong></h6>
                    <p>These are my projects i got assigned for school and decided to show them here.</p>
                </div>
                </div>

            </div>
            <div class="kernwaarde bottomCart">
            <div class="kernwaarde-inner">
                <div class="kernwaarde-front">
                    <img src="img/portfolio/thumbnail/websiteThumbnail.jpg" alt="website ">
                
                </div>
                <div class="kernwaarde-back">
                <h6><strong>Meaning of this picture:</strong></h6>
                    <p>These are the projects i first got assigned for a school projects, but i kept developing it to increase my knowlegde.</p>
                </div>
                </div>

            </div>
        </div>
        <div class="downSideLeft"></div>
        <div class="downSideRight"></div>

    </div>

<!-- end portfolio section -->

<!-- begin contact form -->
    <div id="contact">

        <div id="container">
            <h2 class="h1">&bull; Get in Touch &bull;</h2>
            <div class="underline">
            </div>
            <div class="icon_wrapper">
                <svg class="icon" viewBox="0 0 145.192 145.192">
                    <path
                        d="M126.82,32.694c-2.804,0-5.08,2.273-5.08,5.075v2.721c-1.462,0-2.646,1.185-2.646,2.647v1.995    c0,1.585,1.286,2.873,2.874,2.873h20.577c1.462,0,2.646-1.185,2.646-2.647v-3.041c0-1.009-0.816-1.825-1.823-1.825v-2.722    c0-2.802-2.276-5.075-5.079-5.075h-1.985v-3.829c0-3.816-3.095-6.912-6.913-6.912h-0.589h-20.45c0-2.67-2.164-4.835-4.833-4.835    H56.843c-2.67,0-4.835,2.165-4.835,4.835H34.356v-3.384h-9.563v3.384v1.178h-7.061v1.416c-2.67,0.27-10.17,1.424-13.882,5.972    c-1.773,2.17-2.44,4.791-1.983,7.793c0.463,3.043,1.271,6.346,2.128,9.841c2.354,9.616,5.024,20.515,0.549,28.077    C2.647,79.44-3.125,90.589,2.201,99.547c4.123,6.935,13.701,10.44,28.5,10.44c1.186,0,2.405-0.023,3.658-0.068v9.028h-0.296    c-2.516,0-4.558,2.039-4.558,4.558v4.566h100.04v-4.564c0-2.519-2.039-4.558-4.558-4.558h-0.297V84.631h0.297    c2.519,0,4.558-2.037,4.558-4.556v-0.009c0-2.516-2.039-4.556-4.556-4.556l-36.786-0.009V61.973c0-2.193-1.777-3.971-3.972-3.971    v-4.711h0.456c1.629,0,2.952-1.32,2.952-2.949h14.227V34.459h1.658c2.672,0,4.834-2.165,4.834-4.834h20.45v3.069H126.82z     M34.06,75.511c-2.518,0-4.558,2.04-4.558,4.556v0.009c0,2.519,2.042,4.556,4.558,4.556h0.296v24.12l-0.042-1.168    c-15.994,0.574-26.122-2.523-30.106-9.229C-0.464,90.5,4.822,80.347,6.55,77.423c4.964-8.382,2.173-19.774-0.29-29.825    c-0.843-3.442-1.639-6.696-2.088-9.638c-0.354-2.35,0.129-4.3,1.484-5.958c3.029-3.714,9.509-4.805,12.076-5.1v1.233h7.061v1.49    v2.684c-2.403,1.114-4.153,2.997-4.676,5.237H18.15c-0.584,0-1.056,0.474-1.056,1.056v0.83c0,0.584,0.475,1.056,1.056,1.056h1.984    c0.561,2.18,2.304,3.999,4.658,5.092v0.029c0,0-2.282,20.823,16.479,22.099v1.102c0,1.177,0.955,2.133,2.133,2.133h3.297    c1.178,0,2.133-0.956,2.133-2.133V50.135c0-1.177-0.955-2.132-2.133-2.132h-3.297c-1.178,0-2.133,0.955-2.133,2.132    c-1.575-0.235-5.532-1.17-6.635-4.547c2.36-1.092,4.109-2.913,4.669-5.097h1.308c0.722,0,1.309-0.584,1.309-1.308v-0.578    c0-0.584-0.475-1.056-1.056-1.056h-1.539c-0.542-2.332-2.416-4.271-4.968-5.363v-2.559h17.651c0,2.67,2.166,4.835,4.836,4.835 h2.392v15.88h13.639c0,1.629,1.321,2.949,2.951,2.949h0.899v4.711c-2.194,0-3.972,1.778-3.972,3.971v13.529L34.06,75.511z     M95.188,101.78c0,8.655-7.012,15.665-15.664,15.665c-8.653,0-15.667-7.01-15.667-15.665c0-8.647,7.014-15.664,15.667-15.664    C88.177,86.116,95.188,93.132,95.188,101.78z M97.189,45.669h-9.556c0-0.896-0.726-1.62-1.619-1.62H74.494    c-0.896,0-1.621,0.727-1.621,1.62h-8.967v-11.21h33.283V45.669z">
                    </path>
                    <path
                        d="M70.865,101.78c0,4.774,3.886,8.657,8.66,8.657c4.774,0,8.657-3.883,8.657-8.657c0-4.773-3.883-8.656-8.657-8.656    C74.751,93.124,70.865,97.006,70.865,101.78z">
                    </path>
                </svg>
            </div>
            <form action="" method="post" id="contact_form" onsubmit="return functionAlert()">
                <div class="name">
                    <label for="name"></label>
                    <input type="text" placeholder="MY NAME IS *" name="first_name" id="name_input" required>
                </div>
                <div class="email">
                    <label for="email"></label>
                    <input type="text" placeholder="MY SURNAME IS *" name="last_name" id="last_name" required>
                </div>
                <div class="telephone">
                    <label for="email"></label>
                    <input type="email" placeholder="MY EMAIL IS *" name="email" id="email_input" required>
                </div>
                <div class="telephone">
                    <label for="name"></label>
                    <input type="text" placeholder="MY NUMBER IS: " name="telephone" id="telephone_input">
                </div>
                <div class="subject">
                    <label for="subject"></label>
                    <select placeholder="SUBJECT *" name="subject" id="subject_input">
                        <option disabled hidden selected>Subject</option>
                        <option style="color:#FFF;padding:7px;" hover="background-color: #fff">I'D LIKE TO ASK A QUESTION</option>
                        <option style="color:#FFF;padding:7px;">I'D LIKE TO MAKE A PROPOSAL</option>
                        <option style="color:#FFF;padding:7px;">OTHER</option>
                    </select>
                    
                </div>
                <div class="messagess">
                    <label for="message"></label>
                    <textarea name="comments" placeholder="I'D LIKE TO SEND A MESSAGE ABOUT *" id="message_input"
                        cols="30" rows="5" required></textarea>
                </div>
  
                <div class="g-recaptcha" data-sitekey="6LdYAKgZAAAAABQ9YOX3NEqlAWKBY-sMjRH-rbBS"></div>
                <div class="submit">
                    <input type="submit" value="Send Message" id="form_button" >
                </div>
               

                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <a href="" class="close">&times;</a>
                        <p class="black">Thank you for contactting me, i will be in touch with you very soon.</p>
                    </div>

                </div>
            </form>
        </div>

    </div>
    <!-- end contact form -->

<!-- begin copy -->
    <div class="copyrightSection">
    <div class="copyUpperSideLeft"></div>
        <div class="copyUpperSideRight"></div>
        <div class="gridCopy">
            <div class="menuCopy">
                <ul>
                    <li><h3>MENU</h3></li>
                    <li><a data-scroll href="#">HOME</a></li>
                    <li><a  data-scroll href="#about">ABOUT</a></li>
                    <li><a data-scroll href="#skills">SKILLS</a></li>
                    <li><a  data-scroll href="#portfolio">PORTFOLIO</a></li>
                    <li><a  data-scroll href="#contact">CONTACT</a></li>
                </ul>
            </div>
            <div class="location">
                <ul>
                    <li><h3>ADRESS</h3></li>
                    <li><p>Laan van brussel</p></li>
                    <li><p>Alkmaar</p></li>
                    <li><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2420.2082617111914!2d4.749217515780571!3d52.65621577984025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47cf57040fa607dd%3A0x6b6014dad4b028bc!2sLaan%20van%20Brussel%2C%20Alkmaar!5e0!3m2!1snl!2snl!4v1600769441640!5m2!1snl!2snl" width="300" height="155" frameborder="0" style=" border-radius: 10px; box-shadow: 0 6px 7px -6px #333;" allowfullscreen="" aria-hidden="true" tabindex="0"></iframe></li>
                    </ul>
            </div>
            <div class="contactCopy">
                <ul>
                    <li><h3>CONTACTS</h3></li>
                    <li><p >PHONE: <br>  <a href="tel:31640912502"><span class="red">+316 409 125 02</span></a></p></li>
                    <li><p>EMAIL: <br> <a href="mailto:contact@rubencali.nl" ><span class="red">contact@rubencali.nl</span></a></p></li>
                   
                
                </ul>
            </div>
        </div>
        <div class="copyText text-center">
            <div><p class="copyTextt"> Ruben Cali &copy; Copyright 2020 - Created by <span class="red"><strong>Ruben Cali</strong></span></p></div>
        </div>
    </div>
    <!-- end copy -->


   
   <script>
var modal = document.getElementById("myModal");


var btn = document.getElementById("contact_form");


var span = document.getElementsByClassName("close")[0];


btn.onsubmit = function () {
    modal.style.display = "block";
}

span.onclick = function () {
    modal.style.display = "none";
}

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

    <script src="js/jquery.easypiechart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/isotope-layout@3.0.6/dist/isotope.pkgd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="https://kit.fontawesome.com/f28585beb5.js" crossorigin="anonymous"></script>
<script>
var scroll = new SmoothScroll('a[href*="#"]', {
	speed: 1200,
	speedAsDuration: true
});
</script>
    <script src="js/script.js"></script>
    <!-- end scripts -->
</body>

</html>