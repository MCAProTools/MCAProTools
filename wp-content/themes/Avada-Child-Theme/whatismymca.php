<?php 
/* Template Name: whatismca */
get_header(); 
$username = $_GET['ref'];
$user = get_user_by( 'login', $username );
$user_id = $user->ID;
$mcauser= get_user_meta( $user_id, mca_member, true ); 
$mcalandingpage=get_user_meta( $user_id, landingpage, true );
?>


<?php 
            if($_GET['ref'] != '' || $_GET['s1'] != '') {
                if($_GET['ref'] != '') $username = $_GET['ref'];
                else $username = $_GET['s1'];
                $user = get_user_by( 'login', $username );
                $user_id = $user->ID;
                $avatar_img = get_avatar( $user_id, 400 );
            }
            else {
                $args  = array(
                    'role' => 'vip_user'
                );

                $users = get_users( $args );
                $rand_key = array_rand($users, 1);
                $user = $users[$rand_key];
                $username = $user->user_login;
                $user = get_user_by( 'login', $username );
                $user_id = $user->ID;
                $avatar_img = get_avatar( $user_id, 400 );
            }
        ?>


<link rel="stylesheet" type="text/css" href="/wp-content/themes/Avada-Child-Theme/assets/css/whatismymca.css">

    

     <div class="whatismca-main">
         <p class="mca-pre-title"><span class="yellow-tag">DISCOVER HOW:</span> 7+ Million People Are Benefiting From </p>
        <p class="mca-title">Motor Club of America</p>

       

        <div class="landing-welcome">My Name Is <span style="text-decoration: underline;"><?php echo $user->first_name . ' ' . $user->last_name; ?></span>, And I Just Wanted To Share This <strong class="red-tag">FREE VIDEO</strong> With YOU. This FREE Video Has Changed Their Lifes FOREVER. <u><strong>You Don't Want To Miss This!</u></strong></div>

                    <div class="videoWrapper" style="max-width: 100%; margin: 0 auto;">
                        
						
						<?php if(empty($mcalandingpage)){?>
						<center><div class="embed-container"><iframe src="https://player.vimeo.com/video/224740889?title=0&byline=0&portrait=0" width="100%" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div></center>
						<?php }else{?>
						<?php  echo $mcalandingpage;?>
						<?php }?>
						                       
                        </div>
                        </div>


                    </div>
        
        </div>
              
        <div class="fusion-fullwidth fullwidth-box fusion-join-protools">


                        <div class="clearfix get-started">

                        <div class="leftside get-started-block">

                            <p class="get-started-block-title"><span class="yellow-tag">GET STARTED TODAY!</span></p>

                            <p class="join-block-text">MCA (Motor Club Of America) is a unique motor club serving the United States, Canada, and Puerto Rico.</p>

                            <p class="join-block-text">Offering 24/7 emergency roadside assistance plans, membership discounts, and the most reliable service in the auto club industry.</p>

                            
                            <div class="su-button-center" style="text-align: center; margin: 0 auto;">
                                       <a href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&itID=9135&PromoID=83&uid=<?php echo $user->mca_member; ?>" class="myBtn su-button su-button-style-default join-left-arrow" style="color:#FFFFFF;background-color:#de2b20;border-color:#b2221a;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px" target="_blank">
                                        
                                        <span style="color:#FFFFFF;padding:0px 58px;font-size:40px;line-height:80px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> JOIN MCA HERE!</span></a>

                            </div>
                       </div>

       
             
             
             
                                  <div class="rightside get-started-block">

                                        <p class="questions-block-title">GOT QUESTIONS?</p>

                                        <p class="questions-block-text">Motor Club of America Support Agents are available 24 hours a day, 7 days a week to answer any question you may have about thier service!</p>

                                        <p><span class="questions-block-phone"><span class="yellow-tag">1 (800) 435-7622</span></span></p>

                                        <p class="questions-block-text">You can also visit our FAQ’s page for common questions and answers, or you can call MCA &amp; get your answers directly!</p>

                                   </div>

                    </div>

       </div>

                
                    
                    
                    
      <div id="company-benefits">

                 
                <p class="company-benefits-title">CHECK OUT THESE <span class="red-tag">"UNBELIEVABLE"</span> MOTOR CLUB OF AMERICA CUSTOMER BENEFITS &amp; DISCOUNTS!</p>
                
                <p class="company-benefits-tagline">Helpful. Honest. Very Affordable &amp; The Best In The Industry!</p> 
                  
                <p class="company-benefits-subtext">MCA Provides The <span class="yellow-tag">Most Comprehensive Coverage</span> Giving YOU "Peace of Mind". </p>


                <center>
                    <img style="margin-bottom: 25px;" src="https://mcaprotools.com/wp-content/themes/Avada-Child-Theme/assets/img/vs_mca.jpg" alt="">
                </center>
                    
                
                <p class="company-benefits-subtext" style="line-height: 150%;">You Can Take Advantage of BIG Discounts on Hotels and Rental Cars When Your Traveling. Coverages Include Traffic Ticket(s), Legal Services, Hospital Expenses &amp; Death Benefits, Medical &amp; Dental Discounts, Group Insurance Benefits, and Much More...</p>
                
                
                <p class="see-for-yourself">See For Yourself, Below!</p> 


        
                            <div class="su-table table-landing tbl-responsive" style="padding-top:45px;">
                                    <table class="table" style="border: 1px solid lightgrey;">

                                        <tbody>

                                        <tr>

                                            <th class="tbl-title">CUSTOMER BENEFITS</th>

                                            <th class="tbl-title-center">OTHER COMPANY</th>

                                            <th class="tbl-title-center">MCA TOTAL SECURITY</th>

                                        </tr>

                                        <tr class="tbl-horz">

                                            <td>Free 100 mile tow</td>

                                            <td class="tbl-compare">3 Calls Per Year</td>

                                            <td class="tbl-compare">Unlimited Calls</td>

                                        </tr>

                                        <tr class="tbl-horz-w">

                                            <td>Vehicle Theft Reward</td>

                                            <td class="tbl-compare">Up to $2000</td>

                                            <td class="tbl-compare">Up to $5000</td>

                                        </tr>

                                        <tr class="tbl-horz">

                                            <td>Credit Card Protection</td>

                                            <td class="tbl-compare"><img class="aligncenter size-full wp-image-1128" src="https://mcaprotools.s3-us-west-2.amazonaws.com/wp-content/uploads/2015/03/x.png" alt="x" width="39" height="34"></td>

                                            <td class="tbl-compare">Up to $1000</td>

                                        </tr>

                                       <tr class="tbl-horz-w">

                                            <td>Arrest Bond Certificate</td>

                                            <td class="tbl-compare"><img class="aligncenter size-full wp-image-1128" src="https://mcaprotools.s3-us-west-2.amazonaws.com/wp-content/uploads/2015/03/x.png" alt="x" width="39" height="34"></td>

                                            <td class="tbl-compare">Up to $500</td>

                                        </tr>

                                        <tr class="tbl-horz">

                                            <td>Bail Bonds</td>

                                            <td class="tbl-compare"><img class="aligncenter size-full wp-image-1128" src="https://mcaprotools.s3-us-west-2.amazonaws.com/wp-content/uploads/2015/03/x.png" alt="x" width="39" height="34"></td>

                                            <td class="tbl-compare">Up to $25,000</td>

                                        </tr>

                                        <tr class="tbl-horz-w">

                                            <td>Dental Discount</td>

                                            <td class="tbl-compare"><img class="aligncenter size-full wp-image-1128" src="https://mcaprotools.s3-us-west-2.amazonaws.com/wp-content/uploads/2015/03/x.png" alt="x" width="39" height="34"></td>

                                            <td class="tbl-compare">20 to 50% OFF</td>

                                        </tr>

                                        <tr class="tbl-horz">

                                            <td>Perscription Discount</td>

                                            <td class="tbl-compare">24% OFF</td>

                                            <td class="tbl-compare">65% OFF</td>

                                        </tr>

                                        <tr class="tbl-horz-w">

                                            <td>Emergency Room Benefits</td>

                                            <td class="tbl-compare"><img class="aligncenter size-full wp-image-1128" src="https://mcaprotools.s3-us-west-2.amazonaws.com/wp-content/uploads/2015/03/x.png" alt="x" width="39" height="34"></td>

                                            <td class="tbl-compare">$500 ER Reimbursement</td>

                                        </tr>

                                        <tr class="tbl-horz">

                                            <td>Daily Hospital Benefits</td>

                                            <td class="tbl-compare"><img class="aligncenter size-full wp-image-1128" src="https://mcaprotools.s3-us-west-2.amazonaws.com/wp-content/uploads/2015/03/x.png" alt="x" width="39" height="34"></td>

                                            <td class="tbl-compare">Up to $54,750</td>

                                        </tr>

                                        <tr class="tbl-horz-w">

                                            <td>Accidental Death Benefit</td>

                                            <td class="tbl-compare"><img class="aligncenter size-full wp-image-1128" src="https://mcaprotools.s3-us-west-2.amazonaws.com/wp-content/uploads/2015/03/x.png" alt="x" width="39" height="34"></td>

                                            <td class="tbl-compare">Up to $10,000</td>

                                        </tr>

                                        <tr class="tbl-horz">

                                            <td style="background-color: ffff00 !important;">Referral Program</td>

                                            <td class="tbl-compare" style="background-color: ffff00 !important;"><img class="aligncenter size-full wp-image-1128"src="https://mcaprotools.s3-us-west-2.amazonaws.com/wp-content/uploads/2015/03/x.png" alt="x" width="39" height="34"></td>

                                            <td class="tbl-compare" style="background-color: ffff00 !important;">$80.00 / Per Referral</td>

                                        </tr>

                                        </tbody>

                                    </table>

                            </div>

       
                            
                             
                            <p class="seven-mil">Join Over 7+ Million People &amp; Growing!</p>

                            <p class="smart-family">Smart Family Us MCA TOTAL SECURITY!</p>
                               
                                
                                 
        </div>

                            
                            
                            
                             <div style="text-align: center; width: 80%; margin: 0 auto;" class="su-button-center">

                                <a href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&itID=9135&PromoID=83&uid=<?php echo $user->mca_member; ?>" target="_blank" class="myBtn su-button su-button-style-default sales-btn" style="color:#FFFFFF;background-color:#de2b20;border-color:#b2221a;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px"><span style="width: 80%; margin: 0 auto; color:#FFFFFF;padding:0px 58px;font-size:40px;line-height:80px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> YES! I WANT MCA TOTAL SECURITY BENEFITS</span></a>

                            </div>

       
       
       
        


    <div class="benefits-desc row">

                                <div class="col-sm-6">

                                    <div class="b-box b-box-1">

                                        <p class="benefits-desc-title">Daily Hospital Benefits</p>

                                        <p class="b-box-desc">As an MCA member, you’ll receive $150 per day up to 365 consecutive days for hospital room and board as the result of injuries sustained in a covered accident.</p>

                                    </div>

                                    <div class="b-box b-box-2">

                                        <p class="benefits-desc-title">Attorney Fees</p>



                                        <p class="b-box-desc">We all know how costly legal advice can be. As a MCA member, you can receive up to $200 for covered moving violations and $2000 for criminal charges of negligent homicide or manslaughter arising from a traffic accident.</p>

                                    </div>

                                    <div class="b-box b-box-3">

                                        <p class="benefits-desc-title">Emergency Reimbursement Benefits</p>



                                        <p class="b-box-desc">Limiting your out of pocket expenses is what we do best, especially when the unexpected occurs. MCA membership means you’ll receive $500 for all emergency room costs related to a covered accident provided in a Trauma Center or Emergency.</p>

                                    </div>

                                    <div class="b-box b-box-4">

                                        <p class="benefits-desc-title">Auto Rental Discounts</p>



                                        <p class="b-box-desc">Need transportation for the next family vacation or business trip? MCA members can take advantage of discounts from leading car rental providers up to 50% off.</p>

                                    </div>

                                    <div class="b-box b-box-5">

                                        <p class="benefits-desc-title">Hotel Discounts</p>



                                        <p class="b-box-desc">As an MCA member, you can save at thousands of participating Hotel Group locations around the world, or resorts and discount vacation rentals! Your hotel discount is automatically applied when you book your reservation online or over the telephone.</p>

                                    </div>

                                    <div class="b-box b-box-6">

                                       <p class="benefits-desc-title">Travel Planning and Reservations</p>



                                        <p class="b-box-desc">Plan your next trip with ease with our personalized travel services anywhere in the US and Canada. We can even book your trip for you and help you save money with special MCA discounts!</p>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="b-box b-box-7">

                                        <p class="benefits-desc-title">Dental Work</p>



                                        <p class="b-box-desc">MCA members receive access to nearly 70,000 dentist nationwide and can save up to 50% for: Preventive, Diagnostic, Oral Exam, Cleaning, X-Ray, Oral Surgery, Orthodontics.</p>

                                    </div>

                                    <div class="b-box b-box-8">

                                        <p class="benefits-desc-title">Prescription Drugs</p>



                                        <p class="b-box-desc">MCA members enjoy significant savings and discounts on their prescription medications.</p>

                                    </div>

                                    <div class="b-box b-box-9">

                                        <p class="benefits-desc-title">Credit Card Protection</p>



                                        <p class="b-box-desc">If you are a victim of lost or stolen credit cards, we will reimburse you for the financial loss up to $1000.</p>

                                    </div>

                                    <div class="b-box b-box-10">

                                        <p class="benefits-desc-title">Arrest &amp; Bail Bonds</p>



                                        <p class="b-box-desc">You can feel absolutely secure knowing that if you are charged with a moving traffic law violation, we can provide help to keep you out of jail with bail bond funds up to $25,000.</p>

                                    </div>

                                    <div class="b-box b-box-11">

                                       <p class="benefits-desc-title">Stolen Vehicle Reward</p>



                                        <p class="b-box-desc">Count on MCA to be there when you need us! If your vehicle is stolen, we’ll pay $5000 for information leading to the arrest and conviction of persons involved in the theft.</p>

                                    </div>

                                    <div class="b-box b-box-12">

                                        <p class="benefits-desc-title">Travel Assistance Reimbursement</p>



                                        <p class="b-box-desc">Up to $500 travel assistance reimbursement on car rental, meals, lodging or transportation expenses if your vehicle is disabled due to an accident.</p>

                                    </div>

                                </div>

                            </div>

                            <p><!-- /benefits --></p>



                         



                             <div style="text-align: center; width: 80%; margin: 0 auto; margin-bottom:75px;" class="su-button-center">

                                <a href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&itID=9135&PromoID=83&uid=<?php echo $user->mca_member; ?>" class="myBtn su-button su-button-style-default sales-btn" style="color:#FFFFFF;background-color:#de2b20;border-color:#b2221a;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px" target="_blank"><span style="color:#FFFFFF;padding:0px 58px;font-size:40px;line-height:80px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> YES! I WANT MCA TOTAL SECURITY BENEFITS</span></a>

                            </div>


                            

       </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    

                    </div>

                </div>

                <div id="testimonials-section">

                    <div class="fusion-fullwidth fullwidth-box testimonials_head testimonials-section">

                        <div>

                            <p class="testimonials-title">NEED PROOF MCA WORKS?<p>

                        </div>

                    </div>

                </div>

                <div class="fusion-fullwidth fullwidth-box testimonials" style="background-attachment:scroll;background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;border-color:#eae9e9;border-bottom-width: 0px;border-top-width: 0px;border-bottom-style: solid;border-top-style: solid;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;">

                    <div>

                        <p class="listen-up"><span class="red-tag">LISTEN TO THESE!</span> "WHAT <u>OTHER PEOPLE</u> HAVE TO SAY ABOUT MOTOR CLUB OF AMERICA BENEFITS!"</p>



                        <p class="real-customers"><span class="yellow-tag">REAL Testimonials</span> Sent To Us From <span class="yellow-tag">REAL MCA Customers</span>, To Share With <u>YOU</u>...</p>



        <div class="row video-reviews">
        <div class="col-sm-6">

           <div class="testi_video">

        <!-- 3 -->
            
            <iframe width="560" height="315" src="https://www.youtube.com/embed/1oQ9TKhAi_U?rel=0&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>
            
            
            
            </div>

        </div>

        <div class="col-sm-6">

        <div class="testi_video">

            
            <!-- 4 -->
            
            <iframe width="560" height="315" src="https://www.youtube.com/embed/lhOvUMy3Hv4" frameborder="0" allowfullscreen></iframe>
            
            
            

        </div>
        </div>

        </div> <!-- Row End -->

                       
                            
                        <div class="testi_text">

                            <p style="font-size: 26px; text-align: left;">“I pulled in and put my car in park. I left it on with the keys in it, and I went to drop the letter at the front door. I came back, the door’s locked, the car’s on, the gas light is on.
                            
                            <br><br>
                            
                            I got on the phone and the operators were so nice. They sent someone out right away. He popped my door open, and got my keys. He even followed me to the gas station to make sure I made it there okay. It was so nice.”</p>
                            
                            <p style="font-size: 28px; text-align: right;"><strong>– Diane Taylor / Member Since 2010</strong></p>

                        </div>

       
       
       
                            <div style="text-align: center; width: 80%; margin: 0 auto;" class="su-button-center">

                                <a href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&itID=9135&PromoID=83&uid=<?php echo $user->mca_member; ?>" class="myBtn su-button su-button-style-default sales-btn" style="color:#FFFFFF;background-color:#de2b20;border-color:#b2221a;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px" target="_blank"><span style="color:#FFFFFF;padding:0px 58px;font-size:40px;line-height:80px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> YES! I WANT MCA TOTAL SECURITY BENEFITS</span></a>

                            </div>

       
       
       
       
       
       
       
       

                        
                        
                        
       <div class="row video-reviews">
        <div class="col-sm-6">

           <div class="testi_video">

        <!-- 7 -->
          <iframe width="560" height="315" src="https://www.youtube.com/embed/eiJfnc52NSo" frameborder="0" allowfullscreen></iframe>

            </div>

        </div>

        <div class="col-sm-6">

        <div class="testi_video">

        <!-- 8 -->
            <iframe width="560" height="315" src="https://www.youtube.com/embed/OCPaWK6ndaQ" frameborder="0" allowfullscreen></iframe>

        </div>
        </div>

        </div> <!-- Row End --> 
    
    
    
                    <div class="testi_text">

                            <p style="font-size: 26px; text-align: left;">“I have been a member since 2013 with MCA Total Security package. I am glad to say I have saved well over what I paid for being a member with this business. 
                            
                            <br><br>
                            
                            The amount of money I saved from the road side assistance to legal fees, prescription fees, dental fees and rental car fees. I was able to buy myself a new car - they have my business for life!”</p>
                            
                            <p style="font-size: 28px; text-align: right;"><strong>– Javier M. / Member Since 2013</strong></p>

                        </div>                 
    
    
    
    
    
    
                         <div style="text-align: center; width: 80%; margin: 0 auto;" class="su-button-center">

                                <a href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&itID=9135&PromoID=83&uid=<?php echo $user->mca_member; ?>" class="myBtn su-button su-button-style-default sales-btn" style="color:#FFFFFF;background-color:#de2b20;border-color:#b2221a;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px" target="_blank"><span style="color:#FFFFFF;padding:0px 58px;font-size:40px;line-height:80px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> YES! I WANT MCA TOTAL SECURITY BENEFITS</span></a>

                            </div>

    
    
    
    
    
    
    
    <div class="row video-reviews">
        <div class="col-sm-6">

           <div class="testi_video">

        <!-- 9 -->
            <iframe width="560" height="315" src="https://www.youtube.com/embed/WP2tp-JFM5M" frameborder="0" allowfullscreen></iframe>

            </div>

        </div>

        <div class="col-sm-6">

        <div class="testi_video">

        <!-- 10 -->
            <iframe width="560" height="315" src="https://www.youtube.com/embed/-Gm8xpgR0ZM" frameborder="0" allowfullscreen></iframe>

        </div>
        </div>

        </div> <!-- Row End --> 
    
    
    
                    <div class="testi_text">

                            <p style="font-size: 26px; text-align: left;">“Motor Club of America has proven worthy of my review. My mother is associated with another roadside company, and she's used all (5) five of her calls. 
                            
                            <br><br>
                            
                            I called MCA on the spot and they were able to provide the service in a very timely manner. Their customer service along with the dispatchers had genuine positive and welcoming attitudes towards me as a member and customer!”</p>
                            
                            <p style="font-size: 28px; text-align: right;"><strong>– Davon G. / Member Since 2014</strong></p>

                        </div>
    
    
    
    
    
    
                         <div style="text-align: center; width: 80%; margin: 0 auto; margin-bottom: 75px;" class="su-button-center">

                                <a href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&itID=9135&PromoID=83&uid=<?php echo $user->mca_member; ?>" class="myBtn su-button su-button-style-default sales-btn" style="color:#FFFFFF;background-color:#de2b20;border-color:#b2221a;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px" target="_blank"><span style="color:#FFFFFF;padding:0px 58px;font-size:40px;line-height:80px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> YES! I WANT MCA TOTAL SECURITY BENEFITS</span></a>

                            </div>

    
    
    
    
    
    
    
    
     
    
    
    
                  

    
    
    
    
  
    
    
    
                  
    
    
    
    
    
    
    
    
    

                       

                <div class="fusion-fullwidth fullwidth-box how-much-head">

                    <div>

                            <p class="heard-enough-title">MUST COST A FORTUNE RIGHT?...WRONG!</p>

                    </div>

                </div>
                
                
                
                
                
                

                <div class="fusion-fullwidth fullwidth-box how_much" style="background-attachment:scroll;background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;border-color:#eae9e9;border-bottom-width: 0px;border-top-width: 0px;border-bottom-style: solid;border-top-style: solid;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;">

                    <div>

                        
                       
                      


                <div class="row cost">
                     <div class="col-sm-8">
                        <div class="row">
                            <div class="cost-area col-sm-6">
                                <p style="font-size: 38px;">YOU GET <span class="red-tag"><u>$150,000</u></span> IN BENEFITS FOR ONLY</p>
                                <div>
                                    <p class="mca-price"><span class="yellow-tag">20.00</span></p>
                                    <p class="mca-price-per">/ PER MONTH</p>
                                </div>
                                <p class="oto-protools-text">…And When You Sign Up Today With:</p>
                                <p class="oto-protools-username">
                                    <?php 
                                        echo $user->first_name . ' ' . $user->last_name;
                                    ?>
                                </p>
                                <p class="special-invite">You Get A Special Invite To The #1 Training &amp; Marketing System For Motor Club of America. </p>
                            </div>

                            <div class="col-sm-6">
                                <div class="protools-userphoto">
                                    <?php //echo do_shortcode('[protool_mca_user meta_key="useravatar" referrer_data="yes" referrer_key="ref" display_type="single_line"]') ?>
                                    <?php 
                                        if ($avatar_img) {
                                            echo $avatar_img;
                                        }
                                        else {
                                            echo '<img src="/wp-content/uploads/2017/04/blank-avatar.png" width="400" height="400" />';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px;">
                            
                               <div style="text-align: center; margin: 0 auto;" class="su-button-center">
                                
                                <a href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&itID=9135&PromoID=83&uid=<?php echo $user->mca_member; ?>" class="myBtn su-button su-button-style-default sales-btn" style="color:#FFFFFF;background-color:#de2b20;border-color:#b2221a;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px" target="_blank"><span style="color:#FFFFFF;padding:0px 58px;font-size:40px;line-height:80px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> YES! I WANT MCA TOTAL SECURITY TODAY!</span></a>
                                
                            </div>
                        </div>
                    </div>

             </div>
                         
                         
                         
            <div class="fusion-fullwidth fullwidth-box referrals-title-box">
                
                <p class="referrals-title">Just When Your Thought It Couldnt Get Any Better. MCA Even Pays For Referrals!</p>
                
                
            </div>

                </div>

                
                     
                     
                     
                     
                     
                     <p class="how-box-text">Regular Everyday People Are <span class="red-tag">"Freaking Out"</span> About This Unbeatable Referral Program And How It Has <span class="yellow-tag">Helped Countless Families</span> For The Better!</p>
                     
                     
                     
                     <p class="comp-title">People Just Like Your Are Benefiting from Motor Club of America's Services...But Are <u>Gaining SO MUCH MORE</u> Through The MCA Customer Referral Program...</p>
                     
                     
                     
                     <div class="row video-reviews">
        <div class="col-sm-6">

           <div class="testi_video">

        
        <!-- 5 -->
        
            <video preload="auto" controls width="560" height="315&quot;" poster="https://mcaprotools.com/wp-content/uploads/2017/02/video4.png">

            <source src="https://s3-us-west-2.amazonaws.com/mcaprotools/MCA+Aaron+Zachry+Proof.mp4" type="video/mp4">

            </video>

            </div>

        </div>

        <div class="col-sm-6">

        <div class="testi_video">
        
        <!-- 6 -->

            <video preload="auto" controls width="560" height="315&quot;" poster="https://mcaprotools.com/wp-content/uploads/2017/02/video5.png">

            <source src="https://s3-us-west-2.amazonaws.com/mcaprotools/MCA+2014+Testimonials+Mix.mp4" type="video/mp4">

            </video>

        </div>
        </div>

        </div> <!-- Row End --> 
    
    
    
                    <div class="testi_text">

                            <p style="font-size: 26px; text-align: left;">“I love the Service Motor Club of America provides. I've now turned thier referral program into a full time income because I love telling people about it so much -- Paid on time EVERY Friday!”</p>
                            
                            <p style="font-size: 28px; text-align: right;"><strong>– Andrea P. / Member Since 2013</strong></p>

                        </div>
                        
                        
                        
                        
                         <div style="text-align: center; width: 80%; margin: 0 auto;" class="su-button-center">

                                <a href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&itID=9135&PromoID=83&uid=<?php echo $user->mca_member; ?>" class="myBtn su-button su-button-style-default sales-btn" style="color:#FFFFFF;background-color:#de2b20;border-color:#b2221a;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px" target="_blank"><span style="color:#FFFFFF;padding:0px 58px;font-size:40px;line-height:80px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> YES! I WANT MCA TOTAL SECURITY BENEFITS</span></a>

                            </div>
                     
                     
                   
                        
                        <div class="row video-reviews">
                                    <div class="col-sm-6">
                                        <div class="testi_video">


                                          <!-- 1 -->

                                                 <iframe width="560" height="315" src="https://www.youtube.com/embed/nRWxkW4AHuc?rel=0&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>

                                        </div>
                                    </div>



                                    <div class="col-sm-6">
                                    <div class="testi_video">


                                        <!-- 2 -->

                                                <iframe width="560" height="315" src="https://www.youtube.com/embed/J_t0g1DCtm0?rel=0&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>

                                        </div>
                                     </div>
                                    </div> <!-- Row End -->

        
                        
                     



                            <p class="direct-sales-title">HOW DOES THIS WORK?...<span class="yellow-tag">IT'S SIMPLE!</span></p>

                            <p class="how-text">When You Purchase The MCA Total Security Membership. You Automatically Become A Certified MCA Associate. Which Enables You To Earn Real Money Through Thier Exlusive Referral Program.</p>
                            
                            <p class=how-text>The MCA Refferal Program Pays <u>YOU</u> $80 Per New Customer When That Person You Referred Purchases The MCA Total Security Membership.</p>
                            
                            <p class="how-text"><span class="yellow-tag"><u><strong>Did You Catch That?</u></span> Motor Club Of America Is Going To Pay You $80 For Every Per Person You Refer. Simply...So They Can Benefit From The MCA Services Too... </strong></p>
                            
               
                            
              
                        <p class="are-you-next-title" style="margin-bottom:50px;">The Only Question You Should Be Asking is, Are You Next?</p>

               
               
               <div style="text-align: center; width: 80%; margin: 0 auto; margin-bottom: 50px;" class="su-button-center">

                                <a href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&itID=9135&PromoID=83&uid=<?php echo $user->mca_member; ?>" class="myBtn su-button su-button-style-default sales-btn" style="color:#FFFFFF;background-color:#de2b20;border-color:#b2221a;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px" target="_blank"><span style="color:#FFFFFF;padding:0px 58px;font-size:40px;line-height:80px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> YES! I WANT MCA TOTAL SECURITY BENEFITS</span></a>

                            </div>
               
               
               
               
               
               
                <div id="compensation">

                    <div class="fusion-fullwidth fullwidth-box faq-title-box">


                            <p class="faq-title">Frequently Asked Questions</p>


                    </div>

                </div>

                
                        
                        
                        
                        
                        
                        
                        
                        
                        
             <div class="faq-question-box">

                 
                 
                 
                 <div class="faq_box">

                            <p class="faq-question">How Long Until My MCA Total Security Membership Is Active? </p>

                            <p class="faq-answer"> Your membership becomes active IMMEDIATELY upon signing up online and your membership materials are emailed to you immediately. It takes about 2 weeks to receive your membership card in the mail. If you need service before then, just call up the toll free number. Basically if your card is charged successfully, then you are protected.
                            </p>

                        </div>
                        
                        
                        
                        
                        <div class="faq_box">

                            <p class="faq-question">Does MCA Total Security Cover Multiple Vehicles?</p>

                            <p class="faq-answer">Yes it does, as long as the card holder is present. We dispatch the best professional roadside service available to ensure quick service and to give you peace of mind.</p>

                        </div>
                 
                 <div class="faq_box">

                            <p class="faq-question">Can you help me if I’m hospitalized due to an accident?</p>

                            <p class="faq-answer">Yes. As a MCA member, you receive $150 for every day that you are hospitalized, up to 365 consecutive days.</p>

                        </div>
                        
                        
                        
                        
                        
                        
                 <div class="faq_box">

                            <p class="faq-question">Are You Open 24 Hours?</p>

                            <p class="faq-answer">Yes. We you can call us anytime on our toll free number. We are open 24 hours a day, 7 days a week, 365 days a week.</p>

                        </div>
                 
                 
                 
                 
                 <div class="faq_box">

                            <p class="faq-question">Will I Receive Training?</p>

                            <p class="faq-answer">Although Motor Club of America does not require training and marketing.When you become an associate today through our website. You will recieve a special invitation to the #1 Training &amp; Marketing System / MCAProTools.com</p>

                        </div>
                        
                        
                        
            </div><!-- Faq Box Wrapp -->
                       
                       
                        
                        <div style="text-align: center; width: 80%; margin: 0 auto; margin-bottom: 50px;" class="su-button-center">

                                <a href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&itID=9135&PromoID=83&uid=<?php echo $user->mca_member; ?>" class="myBtn su-button su-button-style-default sales-btn" style="color:#FFFFFF;background-color:#de2b20;border-color:#b2221a;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px" target="_blank"><span style="color:#FFFFFF;padding:0px 58px; font-size:40px;line-height:80px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> YES! I WANT MCA TOTAL SECURITY BENEFITS</span></a>

                     </div>
                 
                 
                 
            <div class="faq-question-box">   
                 
                 <div class="faq_box">

                            <p class="faq-question">Is There a Contract?</p>

                            <p class="faq-answer">No. We do not make our customers sign a contract. If you feel the need to cancel your membership at any moment, give us a call and we will assist you.</p>

                        </div>
                 
                 
                 
                 
                 
                 
                 <div class="faq_box">

                            <p class="faq-question">How is MCA able to pay double commission on my sales?</p>

                            <p class="faq-answer">Because MCA has over 86 years of experience in the industry, it has taken the time to calculate the average value of a customer. Based on their meticulous record keeping, MCA knows that the customer loyalty generated is worth paying its associates 200% commissions.
</p>

                        </div>
                 
                 

                 
                 
                        <div class="faq_box">

                            <p class="faq-question">When do you get paid for any Referrals?</p>

                            <p class="faq-answer">Associates are paid every Friday via direct deposit.</p>

                        </div>

                        <div class="faq_box">

                            <p class="faq-question">How do chargebacks work?</p>

                            <p class="faq-answer">When a member cancels their membership before 12 months, a chargeback balance will be added to your commission balance. Chargebacks will not exceed 50% of your check.</p>

                        </div>

                        <div class="faq_box">

                            <p class="faq-question">Do you pay taxes on the money you make?</p>

                            <p class="faq-answer">Yes, taxes have to be paid on the money you earn. You will receive a 1099-MISC from TVC Matrix Associates before January 31st the following year. Speak with your tax professional about how to file your tax return.</p>

                        </div>

                     

                        <div class="faq_box">

                            <p class="faq-question">What are the approved payment methods?</p>


                            <p class="faq-answer">American Express, Visa, MasterCard and Discover credit cards and bank drafts from an established personal checking account. (No prepaid cards)</p>

                        </div>

                        <div class="faq_box">

                            <p class="faq-question">Can I use a prepaid debit card?</p>

                            <p class="faq-answer">Prepaid debit cards are not encouraged. Commissions will be paid as earned on prepaid credit cards, gift cards, one-time pay cards, online banking accounts and offshore accounts.</p>

                        </div>

                        <div class="faq_box">

                            <p class="faq-question">If I have more questions who can I call?</p>

                            <p class="faq-answer">You can call the TOLL FREE number for MCA at <strong>1 (800) 435-7622!</strong></p>

                        </div>

                <p class="enough-now">Ok, Ok...Enough Questions! <strong class="yellow-tag">TAKE ACTION</strong>, So You Can Start Benefiting From Motor Club Of America Total Security Membership - Today!</p>

                    </div>
            
                    
                    
                    
                    
                      <div style="text-align: center; width: 80%; margin: 0 auto; margin-bottom: 50px;" class="su-button-center">

                                <a href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&itID=9135&PromoID=83&uid=<?php echo $user->mca_member; ?>" class="myBtn su-button su-button-style-default sales-btn" style="color:#FFFFFF;background-color:#de2b20;border-color:#b2221a;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px" target="_blank"><span style="color:#FFFFFF;padding:0px 58px; font-size:40px;line-height:80px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> YES! I WANT MCA TOTAL SECURITY BENEFITS</span></a>

                     </div>
                    

               
               
               
               
               
             
                
                
                
                
                
                

                <script type="text/javascript">// <![CDATA[

                    var d = document.getElementById("menu-item-517");

                    d.className = d.className + " popmake-buy-mca";

                    // ]]&gt;</script>

            </div>

        </div>

    </div>
<?php get_template_part( 'mcapopup' );?>
<?php get_footer(); ?>