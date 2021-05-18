<?php
    session_start();
    $con = mysqli_connect("localhost", "u962227670_iconist", "Iconist@12", "u962227670_iconist");
    if(isset($_POST['project_form_button'])){
        
        $Name = $_POST['name'];
        $Email = $_POST['email'];
        $Mobile_Number = $_POST['number'];
        $Gender = $_POST['gender'];
        $Project = $_POST['project'];
        $Other = $_POST['other'];
        $State = $_POST['state'];
        $City = $_POST['city'];
        $Address = $_POST['add'];
        $Date_Time = date('Y-m-d H:i:s');
        $Token = bin2hex(openssl_random_pseudo_bytes(64));
        
        $allow = array('pdf');
        $temp = explode(".",$_FILES['attachment']['name']);
        $extension = end($temp);
        $upload_files = $_FILES['attachment']['name'];
        move_uploaded_file($_FILES['attachment']['tmp_name'],"document_files/".$_FILES['attachment']['name']);
        
        $CheckSQL = "SELECT * FROM project_form WHERE Email='$Email'";
        $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
        
                if(isset($check)){
                    echo "<script> alert('You Have Already Filled That Form, You Can Not Again Fill To This Contact Form. Contact To IconiST Via A Call')</script>";
                    echo "<script>setTimeout(\"location = 'http://iconistyt.com/';\",1000);</script>";
                } else{
                    $SQL_QUERY = "INSERT INTO project_form (Name, Email, Mobile_Number, Gender, Project, Other_Project, State, City, Address, Date_Time, Token, File) VALUES ('$Name', '$Email', '$Mobile_Number', '$Gender', '$Project', '$Other', '$State', '$City', '$Address', '$Date_Time', '$Token', '".$upload_files."') ";
                    if(mysqli_multi_query($con,$SQL_QUERY)){
                        $Email =  $_POST ['email'];
                        $Check_Email = "SELECT * FROM project_form WHERE Email='$Email'";
                        $E_Query = mysqli_query($con, $Check_Email);
                        $E_Count = mysqli_num_rows($E_Query);
                        if($E_Count){
                            $userdata = mysqli_fetch_array($E_Query);
                            $Name = $userdata['Name'];
                            $Email = $userdata['Email'];
                            $Mobile_Number = $userdata['Mobile_Number'];
                            $Project = $userdata['Project']; 
                            $Address = $userdata['Address'];
                            
                            $subject = "$Name, IconiST Will Contact You";
                            $message = "";
                            $message .= "
                                   
                                    <body style='margin: 0; padding: 0;;>
                                        <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
                                            <tr>
                                                <td style='padding: 20px 0 30px 0;'>
                                                <table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border-collapse: collapse; border: 1px solid #cccccc;'>
                                                <tr>
                                                  <td align='center' bgcolor='#70bbd9' style='padding: 40px 0 30px 0; border-radius:5px;'>
                                                    <img style='border-radius: 20%' src='http://iconistyt.com/images/mail_2.gif' alt='Creating Email Magic.' width='300' height='230' style='display: block;' />
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
                                                            $Name Thankyou For Filling This Project Form, Developer Will Contact You As Soon As Possible.<br> ThankYou
                                                            <br><br>
                                                            <b>Your Email : </b> $Email <br>
                                                            <b>Your Mobile Number : </b> $Mobile_Number <br>
                                                            <b>Your Project : </b> $Project <br>
                                                            <b>Your Address : </b> $Address <br><br>
                                                            
                                                            Your Project Will Based On Your Requirements Best To Best Product Will Design & Develop.<br>
                                                            <br>
                                                          </p>
                                                          
                                                          <h3>
                                                                Project Development Process -
                                                          </h3>
                                                          <h4>There Are Total 5 Steps For A Project Development </h4>
                                                          <p>
                                                            *   Planning Studies: <br>
                                                            *   Environmental Study: <br>
                                                            *   Funding Process: <br>
                                                            *   Final Design: <br>
                                                            *   Implementation: <br><br>
                                                            <b>Website Link : </b> <a href='http://iconistyt.com/'>Click here</a>
                                                          </p>
                                                          
                                                          <p>
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
                                  echo "<script> alert('Thankyou For Filling This Project Form')</script>";
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