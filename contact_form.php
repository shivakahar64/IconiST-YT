<?php
    session_start();
    $con = mysqli_connect("localhost", "u962227670_iconist", "Iconist@12", "u962227670_iconist");
    if(isset($_POST['send-msg'])){
        $Name = $_POST['name'];
        $Mobile_Number = $_POST['number'];
        $Email = $_POST['email'];
        $Message = $_POST['msg'];
        $Date_Time = date('Y-m-d H:i:s');
        $Token = bin2hex(openssl_random_pseudo_bytes(64));
        
        $CheckSQL = "SELECT * FROM contact_form WHERE Email='$Email'";
        $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
        
                if(isset($check)){
                    echo "<script> alert('You Have Already Filled That Form, You Can Not Again Fill To This Contact Form. Contact To IconiST Via A Call')</script>";
                    echo "<script>setTimeout(\"location = 'http://iconistyt.com/';\",1000);</script>";
                } else{
                    $SQL_QUERY = "INSERT INTO contact_form (Name, Mobile_Number, Email, Message, Date_Time, Token) VALUES ('$Name', '$Mobile_Number', '$Email', '$Message', '$Date_Time', '$Token') ";
                    if(mysqli_query($con,$SQL_QUERY)){
                        $Email =  $_POST ['email'];
                        $Check_Email = "SELECT * FROM contact_form WHERE Email='$Email'";
                        $E_Query = mysqli_query($con, $Check_Email);
                        $E_Count = mysqli_num_rows($E_Query);
                        if($E_Count){
                            $userdata = mysqli_fetch_array($E_Query);
                            $Name = $userdata['Name'];
                            $token = $userdata['Token'];
                            $subject = "$Name, IconiST Will Contact You";
                            $message = "";
                            $message .= "
                                   
                                    <body style='margin: 0; padding: 0;;>
                                        <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
                                            <tr>
                                                <td style='padding: 20px 0 30px 0;'>
                                                <table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border-collapse: collapse; border: 1px solid #cccccc;'>
                                                <tr>
                                                  <td align='center' bgcolor='#70bbd9' style='padding: 40px 0 30px 0; border-radius:20px;'>
                                                    <img style='border-radius: 50%' src='http://iconistyt.com/images/mail.gif' alt='Creating Email Magic.' width='300' height='230' style='display: block;' />
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
                                                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;'>
                                                      <tr>
                                                        <td style='color: #153643; font-family: Arial, sans-serif;'>
                                                          <h1 style='font-size: 24px; margin: 0;'><b>$Name </b> Thankyou For Contact Me.</h1>
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <td style='color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;'>
                                                          <p style='margin: 0;'>
                                                            $Name Thankyou for contacting me, I will definitly contact you in under 24 hours for discussion about your project or any other query where i can help you. 
                                                            <br>
                                                            “Thank you for reaching out to me” simply means “Thank you for contacting me.” This formal expression is commonly used in written (business) correspondence, often as part of an introductory phrase in thank-you notes and other kinds of formal letters, with the intent of presenting your thanks for services an. <br>
                                                            “Much appreciated” is a gesture of gratitude, so respond with “you're welcome”, or something along those lines. Originally Answered: What is the correct response to “I appreciate it”? You should always say, “Thank you.” and if you want to generate closeness, you could add, “I'm happy that you're happy.”. <br>
                                                            <br>
                                                            <b style='color:red;'>
                                                                Please do not reply on this mail, it is auto generated mail. ThankYou
                                                            </b>
                                                          </p>
                                                        </td>
                                                      </tr>
                                                    </table>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td bgcolor='#ee4c50' style='padding: 30px 30px;'>
                                                      <table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;'>
                                                      <tr>
                                                        <td style='color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;'>
                                                          <p style='margin: 0;'>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All Rights Reserved<br/>
                                                         <a href='http://iconistyt.com/' style='color: #ffffff;'>IconiST</a> | Desiged & Developed By Shiva Kahar</p>
                                                        </td>
                                                        <td align='right'>
                                                          <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse;'>
                                                            <tr>
                                                              <td style='font-size: 0; line-height: 0;' width='20'>&nbsp;</td>
                                                              <td>
                                                                <a href='tel:7999904294'>
                                                                  <img src='http://iconistyt.com/images/phone.png' alt='Facebook.' width='38' height='38' style='display: block;' border='0' />
                                                                </a>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                      </tr>
                                                    </table>
                                                  </td>
                                                </tr>
                                            </table>
                                          </td>
                                        </tr>
                                      </table>
                                    </body>";
                                        
                            $header = "From:IconiST iconist@iconistyt.com \r\n";
                            $header .= "Cc:info@iconistyt.com \r\n";
                            $header .= "MIME-Version: 1.0\r\n";
                            $header .= "Content-type: text/html\r\n";
                            $sender = "IconiST";
                            $retval = mail ($Email,$subject,$message,$header,$sender);

                                if( $retval == true ) {
                                  echo "<script> alert('Thankyou For Contact')</script>";
                                  echo "<script>setTimeout(\"location = 'thank_you_form';\",500);</script>";
                                }else {
                                   echo "<script> alert('Request Cancel ! Try Again')</script>";
                                 echo "<script>setTimeout(\"location = 'http://iconistyt.com/';\",1000);</script>";
                                }
                            }
                        }
                    }
                }
?>