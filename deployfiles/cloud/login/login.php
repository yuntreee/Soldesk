<? session_start();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Modern Business - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="../css/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="../index.php">구름 TV 플러스</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="../about.php">About</a></li>
                            
                            <li class="nav-item"><a class="nav-link" href="../pricing.php">Pricing</a></li>
                            <li class="nav-item"><a class="nav-link" href="../faq.php">FAQ</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                    <li><a class="dropdown-item" href="../blog-home.php">Blog Home</a></li>
                                    <li><a class="dropdown-item" href="../blog-post.php">Blog Post</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Portfolio</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                    <li><a class="dropdown-item" href="../portfolio-overview.php">Portfolio Overview</a></li>
                                    <li><a class="dropdown-item" href="../portfolio-item.php">Portfolio Item</a></li>
                                </ul>
                            </li>
        <?php 
			if(! $_SESSION['userid'])
			{
        ?>                          
							<li class="nav-item"><a class="nav-link" href="/cloud/join/join.php">회원가입</a></li>
							<li class="nav-item"><a class="nav-link" href="/cloud/login/login.php">로그인</a></li>
        <?php 
			} else {
		?>     
                            <li class="nav-item"><a class="nav-link" href="/cloud/login/logout.php">로그아웃</a></li>
        <?php } ?>    
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Header-->

<form id="login" method="get" action="./login_access.php">  
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">로그인</h1>
                            <p class="lead fw-normal text-muted mb-0">아래 정보를 입력해주세요</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- * * SB Forms Contact Form * *-->
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- This form is pre-integrated with SB Forms.-->
                                <!-- To make this form functional, sign up at-->
                                <!-- https://startbootstrap.com/solution/contact-forms-->
                                <!-- to get an API token!-->
                                
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="userid" name="userid" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="name">ID 입력</label>
                                        <div class="invalid-feedback" data-sb-feedback="name:required">ID를 입력하지 않았습니다.</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="passwd" name="passwd" type="password" class="pass" placeholder="Enter your passwd..." data-sb-validations="required" />
                                        <label for="passwd">PW 입력</label>
                                        <div class="invalid-feedback" data-sb-feedback="passwd:required">PW를 입력하지 않았습니다.</div>

                                    </div>
                                    <!-- Phone number input-->

                                    <!-- Message input-->
                                    <!-- Submit success message-->
                                    <!---->
                                    <!-- This is what your users will see when the form-->
                                    <!-- has successfully submitted-->

                                    <!-- Submit Button-->
                                    <div class="d-grid">
									   <a class="btn btn-primary" onclick="document.getElementById('login').submit()">로그인</a>
                                       <!-- <input type="submit" value="Submit" class="submit"> -->
                                        <a class="btn btn-outline-primary" onClick="javascript:location.href='../index.php';">돌아가기</a></div>
                                        <!--<a class="btn btn-primary" href="#!">Choose plan</a>
                                        <button  id="submitButton" type="submit" value="submit">회원가입</button>
                                        <button class="btn btn-primary btn-lg disabled" type="button" value="Cancel"  value="submit">back</button>-->
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Contact cards-->
                    <div class="row gx-5 row-cols-2 row-cols-lg-4 py-5">
                        <div class="col">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-chat-dots"></i></div>
                            <div class="h5 mb-2">Chat with us</div>
                            <p class="text-muted mb-0">Chat live with one of our support specialists.</p>
                        </div>
                        <div class="col">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-people"></i></div>
                            <div class="h5">Ask the community</div>
                            <p class="text-muted mb-0">Explore our community forums and communicate with other users.</p>
                        </div>
                        <div class="col">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-question-circle"></i></div>
                            <div class="h5">Support center</div>
                            <p class="text-muted mb-0">Browse FAQ's and support articles to find solutions.</p>
                        </div>
                        <div class="col">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-telephone"></i></div>
                            <div class="h5">Call us</div>
                            <p class="text-muted mb-0">Call us during normal business hours at (555) 892-9403.</p>
                        </div>
                    </div>
                </div>
            </section>
            </form>            
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2021</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
