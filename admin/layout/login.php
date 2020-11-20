<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link href="./layout/login.css" rel="stylesheet">
   <link href="http://localhost/lib/aos-master/aos.css" rel="stylesheet">
   <script src="http://localhost/lib/aos-master/aos.js"></script>
</head>

<body>
   <div class="container d-flex justify-content-center">
      <div class="col-lg-5 col-md-8 login-box shadow-lg">
         <div class="col-lg-12 login-title" data-aos="fade-down"></div>
         <div class="col-lg-12 login-form">
            <div class="col-lg-12 login-form">
               <form method="POST" action="">
                  <div class="form-group"><label class="form-control-label" id="user" data-aos="fade-right" data-aos-delay="150"></label>
                     <input type="text" class="form-control" name="user" data-aos="fade-left" data-aos-delay="300" disabled></div>
                  <div class="form-group mb-0"><label class="form-control-label" id="pass" data-aos="fade-right" data-aos-delay="400"></label>
                     <input type="password" class="form-control mb-2" name="input" data-aos="fade-left" data-aos-delay="550"></div>
                  <p onclick="$('#forgot-pw').modal('show')" class="login-forgot" id="login-forgot" data-aos="fade-up" data-aos-delay="650"></p>
                  <div class="col-lg-12">
                     <div class="col-lg-12 d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="750" data-aos-duration="1000"><button type="submit" class="btn">login</button></div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   </div>
   <script src="http://localhost/lib/jqeury-3.5.1/jquery-3.5.1.min.js"></script>
   <script src="http://localhost/lib/bootstrap-4.5.3/dist/js/bootstrap.min.js"></script>
   <script>
      AOS.init({
         duration: 550,
         once: true,
      });
   </script>
</body>