
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>contactpage</title>
    <style>
       *{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        font-family: sans-serif;
       }
        .contact{
            min-height: 100vh;
            background-color: #e8f0fe;
            padding: 50px;
            text-align: center;
        }
        .container{
            max-width: 800px;
            margin:0 auto;
        }
        .container h2{
            font-size: 36px;
            margin-bottom: 40px;
            color:#333;
        }
        /* .contact-wrapper{
            display:grid;
            grid-template-columns: repeat(2,1fr);
            grid-gap:30px;
        } */
        /* .contact-form{
            text-align: left;
        } */
        .contact-form h3{
            font-size: 24px;
            margin-bottom: 20px;
            color:#333;

        }
        .form-group{
            margin-bottom: 20px;
        }
        input,textarea{
            width:100%;
            padding:12px;
            border-radius: 8px;
            border:none;
            background-color: #f8f9fa;
            color:#333;
        }
        input:focus,
        textarea:focus{
            outline: none;
            box-shadow: 0 0 8px #abb;
        }
        button{
            display: inline-block;
            padding: 12px 24px;
            background-color: #4caf50;
            color:#fff;
            border:none;
            cursor:pointer;
        }
        button:hover{
            background-color: #45a049;
            
        }
        .contact-info{
            text-align: center;

        }
        .contact-info h3{
            font-size: 24px;
            margin-bottom: 20px;
            color:#333;
        }
        .contact-info p{
            margin-top:20px;
            margin-bottom:10px;
            color:#555;

        }
        .contact-info i{

            color: #4caf50;
            margin-right: 10px;
           

        }
        @media screen and(max-width:768px){
            .container{
                padding: 20px;

            }
            .contact-wrapper{
            display:grid;
            grid-template-columns: 1fr;
             }
        }

       </style>
    </head>
    <body>
        <section class ="contact">
        <section class="container">
                <h2>Contact Us</h2>
                <div class="contact-wrapper">
                    <div class="contact-form">
                        
                        <!-- <form>
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Your Name">
                                
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Your Email">   
                            </div>
                            <div class="form-group">
                           <textarea name="message" placeholder="Your Message"></textarea>
                           </div>
                           <div class="form-group"></div>
                                <button type="submit">Send Message</button>
                            </div>
                        </form> -->
                        <div class="contact-info">
                            <h3>Contact Information</h3><br>
                            <p><i class="fas fa-phone"></i>+123 456 789</p>
                            <p><i class="fas fa-envelope"></i>information.com</p>
                            <p><i class="fas fa-map-marker-alt"></i>123 Street,city,countary</p>
                        </div>
                    </div>
                </div>
            </section>
            
        </div>
        <?php




        
        ?>
        </body>
    </html>