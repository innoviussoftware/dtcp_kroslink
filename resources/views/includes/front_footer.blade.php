<footer>

        <div class="footer-area">

            <div class="footer-middle">

                <div class="container">

                    <div class="row">

                        <div class="col-md-9 col-sm-12">

                            <div class="col-md-4 col-sm-4">

                                <div class="footer-question">

                                    <h4 class="footer-title">Directorate of Town and Country Planning</h4>

                                    <div class="footer-top-list">

                                        <p>{{($data['footerdetails'])?$data['footerdetails']:'---'}}</p>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-3 col-sm-3">

                                <div class="footer-question footer-menu">

                                    <h4 class="footer-title">Quick Links</h4>

                                    <div class="footer-top-list">

                                        <nav>

                                            <ul>
                                               <!--  @foreach($data['menulist'] as $key=>$menu)
                                                <li><a href="{{route('homeindex',$menu['pages']['alias'])}}">{{$menu['name']}}</a></li>
                                                @endforeach
                                                 -->

                                               <li><a href="https://dtcponline.tn.gov.in/public/" target="_blank">Public View</a></li>

                                                <li><a href="http://kroslinks.in/DTCP/documents">Documents</a></li>

                                                <li><a href="http://kroslinks.in/DTCP/eodb">EoDB</a></li>

                                                <li><a href="http://kroslinks.in/DTCP/circulars">Circulars</a></li>

                                                <li><a href="http://kroslinks.in/DTCP/faqs">FAQs</a></li>

                                                <li><a href="http://kroslinks.in/DTCP/forms">Forms</a></li>

                                                <li><a href="http://kroslinks.in/DTCP/usefullinks">Useful Links</a></li>

                                                <li><a href="http://kroslinks.in/DTCP/contactus">Contact Us</a></li>

                                                <li><a href="http://kroslinks.in/DTCP/rti">RTI</a></li>

                                                <li><a href="http://kroslinks.in/DTCP/sitemap">Site Map</a></li>

                                            </ul>

                                        </nav>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-5 col-sm-5">

                                <div class="footer-question">

                                    <h4 class="footer-title">Contact Us</h4>

                                    <div class="footer-top-list">

                                        <nav>

                                            <ul>

                                                <li><a href="#">{{$data['title']}}</a></li>

                                                <li><a href="#">{{$data['address']}}</a></li>

                                                <li><a href="#">{{$data['email_id']}}</a></li>

                                                <!-- <li><a href="#">The company</a></li> -->

                                            </ul>

                                            <ul class="social-custom list-inline">

                                                <li class="list-inline-item"><a href="{{$data['facebook']}}" target="_blank" aria-label="facebook"><i class="fa fa-facebook-official" ></i></a></li>

                                                <li class="list-inline-item"><a href="{{$data['twitter']}}" target="_blank" aria-label="twitter"><i class="fa fa-twitter" ></i></a></li>

                                                <li class="list-inline-item"><a href="{{$data['linkedin']}}" target="_blank" aria-label="linkedin"><i class="fa fa-linkedin" ></i></a></li>

                                                <li class="list-inline-item"><a href="{{$data['pinterest']}}" target="_blank" aria-label="pinterest"><i class="fa fa-pinterest-square" ></i></a></li>

                                                <li class="list-inline-item"><a href="{{$data['google_plus']}}" target="_blank"
                                                aria-label="google_plus"><i class="fa fa-google-plus"></i></a></li>

                                                <li class="list-inline-item"><a href="{{$data['youtube']}}" target="_blank" aria-label="youtube"><i class="fa fa-youtube"></i></a></li>

                                            </ul>

                                        </nav>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-3 col-sm-12 quickform">

                            <div class="quickform-data">

                                <!-- <div class="col-md-12 col-sm-6"> -->

                                    <div class="footer-question">

                                        <h4 class="footer-title">Quick Form</h4>

                                        <p class="success_msg" id="success_msg" style="display: none;"></p>

                                        <span class="captchaerror"></span>

                                        <div class="footer-top-list">

                                            <div class="row">

                                                <form method="post" action="#" name="quickform" id="quickform" class="quickform">

                                                    {{ csrf_field() }}

                                                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">

                                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="">
                                                        <label for="name">Name</label>


                                                    </div>

                                                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">

                                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="">

                                                        <label for="email">Email</label>

                                                    </div>

                                                    

                                                    <div class="clearfix"></div>

                                                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">

                                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" maxlength="10">
                                                        <label for="phone">Phone</label>

                                                    </div>

                                                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">

                                                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required="">
                                                        <label for="subject">Subject</label>

                                                    </div>

                                                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                                        <textarea name="message" id="message" class="form-control" rows="3" placeholder="Message" required=""></textarea>
                                                        <label for="message">Message</label>

                                                    </div>

                                                    <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">

                                                        <img src="{{captcha_src('flat')}}" id="captchaCode" alt="" class="captcha captcha_image" style="max-width: 90px !important;height: 35px !important">
                                                        
                                                    </div>

                                                    <div class="form-group col-xs-5 col-sm-5 col-md-5 col-lg-5">

                                                           <input id="captcha" type="text" class="form-control" placeholder="Captcha" name="captchavalue">
                                                           <label for="captcha">captcha</label>

                                                    </div>

                                                     <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">

                                                          <button type="submit" class="btn btn-warning" id="myButton">Submit</button>

                                                    </div>

                                                    <div class="clearfix"></div>

                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                                                       
                                                    </div>
                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                                                        


                                                    </div>

                                                </form>

                                                <div class="clearfix"></div>

                                            </div>

                                        </div>

                                    </div>

                                <!-- </div> -->

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="footer-bottom">

                <div class="container">

                    <div class="row">

                        <div class="col-md-7 col-sm-6">

                            <div class="footerlogo hidden-xs"><img src="{{asset('public/front_end/newimages/footer-logo.png')}}" alt="footer-logo"></div>

                            <div class="footer-copyright">

                                <!-- <div class="footerlogo"><img src="newimages/logo.png" alt="logo"></div> -->

                                <p>{{$data['copyright']}}</p>

                            </div>

                        </div>

                        <div class="col-md-5 col-sm-6">

                            <div class="footer-payment">

                                <div class="visiter-detail">

                                        <!-- <div class="visiter">Visitor No: <span>11011</span> </div> -->

                                        <div class="visiter">Total Visitors: <span>{{($data['Visitors'])?$data['Visitors']:'---'}}</span></div>

                                        <div class="visiter"><a href="https://www.nvsp.in/" target="_blank"><img width="72" src="{{asset('public/front_end/newimages/online.png')}}" alt="online"></a></div>

                                </div>

                                <!-- <div class="online-service">

                                    <img width="100" src="newimages/3.jpg" alt="logo">

                                </div> -->

                                <!-- <ul class="social-custom list-inline">

                                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>

                                    <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>

                                    <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>

                                    <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>

                                </ul> -->

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </footer>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script> -->

    <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->



    <script>

        $(document).ready(function() {

            $("#quickform").validate({

                rules: {

                  name : {

                    required: true,

                    minlength: 3

                  },

                  email: {

                    required: true,

                    email: true

                  },

                  phone: {

                    required:true,

                    minlength:10,

                    maxlength:10,

                    numericOnly:true

                  },
                   captchavalue:{
                    required:true,
                  },
                  
                  

                }

            });

            $('#myButton').click( function() { 

                //  var $captcha = $( '#recaptcha' ),
                //   response = grecaptcha.getResponse();
    
                //   if (response.length === 0) {
                //     $( '.captchaerror').text( "reCAPTCHA is mandatory" );
                //     return false;
                // }
                // else
                // {
                    
                //     $( '.captchaerror').css('display','none');
                //     $("#quickform").valid();  // test the form for validity
                // }
                $("#quickform").valid();
                //location.reload();
              
            });

            $.validator.addMethod('numericOnly', function (value) {

                     return /^[0-9]+$/.test(value);

            }, 'Please only enter numeric values (0-9)');

          

        });



    </script>

    <script>

        $(document).ready(function() {

            $(".btn-warning").click(function(e){

                e.preventDefault();
                // var $captcha = $( '#recaptcha' ),
                //   response = grecaptcha.getResponse();
    
                //   if (response.length === 0) {
                //     // 
                    
                //     // var text="reCAPTCHA is mandatory";
                //     // alert(text);
                //     // $('#success_msg').val(text);
                //     $( '.captchaerror').text( "reCAPTCHA is mandatory" );
                //     return false;
                // }
                // else
                // {

                var _token = $("input[name='_token']").val();

                var name = $("input[name='name']").val();

                var email = $("input[name='email']").val();

                var phone = $("input[name='phone']").val();

                var subject = $("input[name='subject']").val();

                var message = $("textarea[name='message']").val();

                var captchavalue = $("input[name='captchavalue']").val();

                var url="{{ route('contactform') }}";

                $.ajax({

                    url: url,

                    type:'POST',

                    data: {_token:_token, name:name, email:email, phone:phone, subject:subject,message:message,captchavalue:captchavalue},

                    success: function(data) {

                        if($.isEmptyObject(data.error)){

                            

                            $('#success_msg').append(data.success);
                            location.reload()
                            
                            $('#success_msg').css('display','block');

                            $("input[name='name']").val('');

                            $("input[name='email']").val('');

                            $("input[name='phone']").val('');

                            $("input[name='subject']").val('');

                            $("textarea[name='message']").val('');

                            $("input[name='captchavalue']").val('');

                            ('.success_msg').val('');

                        }else{

                           $('#success_msg').append(data.error);
                           $('#success_msg').css('display','block');
                        }

                    }

                });

               

            }); 


           

            $(".btn-warning").click(function(e){



                timer = setTimeout(function () {

                    $('.success_msg').hide();

                }, 3000);

                $('.success_msg').empty();

            });
             
        });
    </script>

<script>
$(document).ready(function(){

$(".circular-menu").hover(
  function () {
$(".circular-menu").css("animation-play-state", "paused");
$(".img").css("animation-play-state", "paused");
  },
  function () {
$(".circular-menu").css("animation-play-state", "running");
$(".img").css("animation-play-state", "running");
  }
);    
});
</script>

<script>
$(document).ready(function(){

$(".circular-menu1").hover(
  function () {
$(".circular-menu1").css("animation-play-state", "paused");
$(".img").css("animation-play-state", "paused");
  },
  function () {
$(".circular-menu1").css("animation-play-state", "running");
$(".img").css("animation-play-state", "running");
  }
);    

});
</script>


    
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   