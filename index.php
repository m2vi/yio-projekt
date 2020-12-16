<?php
session_name("yio_main");
session_start();

require("./lang/translate.php");
require("../../lib/OS/array.php");
require("../../lib/IP/ip.php");
require("../../lib/LOG/log.php");
?>
<html lang="<?php echo $htmllang ?>">

<head>
    <meta charset="utf-8">
    <title>Yeeet It Out!</title>
    <meta name="description" content="Some Text">
    <meta name="keywords" content="m2z, Yeeet It Out, YIO, yio, M2Z">
    <meta name="author" content="m2z">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="./css/preload.min.css">
    <link rel="stylesheet" type="text/css" href="./css/index.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/lib/aos-master/aos.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/lib/fontawesome-free-5.14.0-web/css/all.min.css">

    <link rel="icon" type="image/png" href="img/favicon/logo.png">
</head>

<body style="overflow: <?php if (isset($_COOKIE['not_trusted'])) {
                            echo "visible";
                        } else {
                            echo "hidden";
                        } ?>;">
    <div class="preload">
        <div class="content">
            <?php
            if (!isset($_COOKIE['not_trusted'])) :
            ?>
                <svg xmlns="http://www.w3.org/2000/svg" class="atom" version="1.1" viewBox="0 0 100 100">
                    <defs>
                        <filter id="blur" x="-10" y="-10" width="120" height="120">
                            <feGaussianBlur in="SourceGraphic" stdDeviation=".4" />
                        </filter>
                        <filter id="blur2" x="-10" y="-10" width="120" height="120">
                            <feGaussianBlur in="SourceGraphic" stdDeviation="3" />
                        </filter>
                    </defs>
                    <g filter="url(#blur2)">
                        <circle class="kern" cx="50" cy="50" r="2" />
                    </g>
                    <circle class="kern" cx="50" cy="50" r="2" />
                    <g class="lines">
                        <path d="M  57.5,50 57.39,55.21 57.05,60.26 56.5,65 55.75,69.28 54.82,72.98 53.75,75.98 52.57,78.19 51.3,79.54 50,80 48.7,79.54 47.43,78.19 46.25,75.98 45.18,72.98 44.25,69.28 43.5,65 42.95,60.26 42.61,55.21 42.5,50 42.61,44.79 42.95,39.74 43.5,35 44.25,30.72 45.18,27.02 46.25,24.02 47.43,21.81 48.7,20.46 50,20 51.3,20.46 52.57,21.81 53.75,24.02 54.82,27.02 55.75,30.72 56.5,35 57.05,39.74 57.39,44.79 57.5,50"></path>
                        <path d="M  53.75,56.5 49.18,59 44.64,61.23 40.26,63.13 36.17,64.62 32.51,65.67 29.38,66.24 26.87,66.32 25.07,65.9 24.02,65 23.76,63.64 24.3,61.87 25.63,59.74 27.69,57.32 30.43,54.67 33.76,51.88 37.59,49.03 41.8,46.21 46.25,43.5 50.82,41 55.36,38.77 59.74,36.88 63.83,35.38 67.49,34.33 70.62,33.76 73.13,33.68 74.93,34.1 75.98,35 76.24,36.36 75.7,38.13 74.38,40.26 72.31,42.68 69.57,45.33 66.24,48.12 62.41,50.97 58.2,53.79 53.75,56.5"></path>
                        <path d="M  53.75,43.5 58.2,46.21 62.41,49.03 66.24,51.88 69.57,54.67 72.31,57.32 74.38,59.74 75.7,61.87 76.24,63.64 75.98,65 74.93,65.9 73.13,66.32 70.63,66.24 67.49,65.67 63.83,64.62 59.74,63.13 55.36,61.23 50.82,59 46.25,56.5 41.8,53.79 37.59,50.97 33.76,48.13 30.43,45.33 27.69,42.68 25.63,40.26 24.3,38.13 23.76,36.36 24.02,35 25.07,34.1 26.87,33.68 29.37,33.76 32.51,34.33 36.17,35.38 40.26,36.87 44.64,38.77 49.18,41 53.75,43.5"></path>
                    </g>
                    <g class="electronTails" filter="url(#blur)">
                        <path class="tail tail1" d="M  57.5,50 57.39,55.21 57.05,60.26 56.5,65 55.75,69.28 54.82,72.98 53.75,75.98 52.57,78.19 51.3,79.54 50,80 48.7,79.54 47.43,78.19 46.25,75.98 45.18,72.98 44.25,69.28 43.5,65 42.95,60.26 42.61,55.21 42.5,50 42.61,44.79 42.95,39.74 43.5,35 44.25,30.72 45.18,27.02 46.25,24.02 47.43,21.81 48.7,20.46 50,20 51.3,20.46 52.57,21.81 53.75,24.02 54.82,27.02 55.75,30.72 56.5,35 57.05,39.74 57.39,44.79 57.5,50"></path>
                        <path class="tail tail2" d="M  53.75,56.5 49.18,59 44.64,61.23 40.26,63.13 36.17,64.62 32.51,65.67 29.38,66.24 26.87,66.32 25.07,65.9 24.02,65 23.76,63.64 24.3,61.87 25.63,59.74 27.69,57.32 30.43,54.67 33.76,51.88 37.59,49.03 41.8,46.21 46.25,43.5 50.82,41 55.36,38.77 59.74,36.88 63.83,35.38 67.49,34.33 70.62,33.76 73.13,33.68 74.93,34.1 75.98,35 76.24,36.36 75.7,38.13 74.38,40.26 72.31,42.68 69.57,45.33 66.24,48.12 62.41,50.97 58.2,53.79 53.75,56.5"></path>
                        <path class="tail tail3" d="M  53.75,43.5 58.2,46.21 62.41,49.03 66.24,51.88 69.57,54.67 72.31,57.32 74.38,59.74 75.7,61.87 76.24,63.64 75.98,65 74.93,65.9 73.13,66.32 70.63,66.24 67.49,65.67 63.83,64.62 59.74,63.13 55.36,61.23 50.82,59 46.25,56.5 41.8,53.79 37.59,50.97 33.76,48.13 30.43,45.33 27.69,42.68 25.63,40.26 24.3,38.13 23.76,36.36 24.02,35 25.07,34.1 26.87,33.68 29.37,33.76 32.51,34.33 36.17,35.38 40.26,36.87 44.64,38.77 49.18,41 53.75,43.5"></path>
                    </g>
                    <g class="electrons">
                        <path class="electron electron1" d="M  57.5,50 57.39,55.21 57.05,60.26 56.5,65 55.75,69.28 54.82,72.98 53.75,75.98 52.57,78.19 51.3,79.54 50,80 48.7,79.54 47.43,78.19 46.25,75.98 45.18,72.98 44.25,69.28 43.5,65 42.95,60.26 42.61,55.21 42.5,50 42.61,44.79 42.95,39.74 43.5,35 44.25,30.72 45.18,27.02 46.25,24.02 47.43,21.81 48.7,20.46 50,20 51.3,20.46 52.57,21.81 53.75,24.02 54.82,27.02 55.75,30.72 56.5,35 57.05,39.74 57.39,44.79 57.5,50"></path>
                        <path class="electron electron2" d="M  53.75,56.5 49.18,59 44.64,61.23 40.26,63.13 36.17,64.62 32.51,65.67 29.38,66.24 26.87,66.32 25.07,65.9 24.02,65 23.76,63.64 24.3,61.87 25.63,59.74 27.69,57.32 30.43,54.67 33.76,51.88 37.59,49.03 41.8,46.21 46.25,43.5 50.82,41 55.36,38.77 59.74,36.88 63.83,35.38 67.49,34.33 70.62,33.76 73.13,33.68 74.93,34.1 75.98,35 76.24,36.36 75.7,38.13 74.38,40.26 72.31,42.68 69.57,45.33 66.24,48.12 62.41,50.97 58.2,53.79 53.75,56.5"></path>
                        <path class="electron electron3" d="M  53.75,43.5 58.2,46.21 62.41,49.03 66.24,51.88 69.57,54.67 72.31,57.32 74.38,59.74 75.7,61.87 76.24,63.64 75.98,65 74.93,65.9 73.13,66.32 70.63,66.24 67.49,65.67 63.83,64.62 59.74,63.13 55.36,61.23 50.82,59 46.25,56.5 41.8,53.79 37.59,50.97 33.76,48.13 30.43,45.33 27.69,42.68 25.63,40.26 24.3,38.13 23.76,36.36 24.02,35 25.07,34.1 26.87,33.68 29.37,33.76 32.51,34.33 36.17,35.38 40.26,36.87 44.64,38.77 49.18,41 53.75,43.5"></path>
                    </g>
                </svg>
            <?php endif; ?>
        </div>
    </div>
    <div class="cookie">
        <div class="container content">
            <span><?php echo $cookie->message[0] ?><a href="#" title="Read more"><?php echo $cookie->message[1] ?></a><?php echo $cookie->message[2] ?></span>
            <div class="button-group">
                <a class="btn cookie-accept cookie-close" href="#"><?php echo $cookie->accept ?></a>
                <a class="btn cookie-decline cookie-close" href="#"><?php echo $cookie->decline ?></a>
            </div>
        </div>
    </div>

    <div class="navbar-pseudo"></div>
    <nav id="navbar" class="navbar-expand navbar scrollspy">
        <div class="collapse navbar-collapse">
            <a class="navbar-brand" href="http://localhost">m2z</a>
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="#top" home><?php echo $nav->home ?></a></li>
                <li class="nav-item"><a class="nav-link" href="#about"><?php echo $nav->about ?></a></li>
                <li class="nav-item"><a class="nav-link" href="#member"><?php echo $nav->member ?></a></li>
                <li class="nav-item"><a class="nav-link" href="#demo"><?php echo $nav->demo ?></a></li>
                <li class="nav-item"><a class="nav-link" href="#download"><?php echo $nav->download ?></a></li>
                <li class="nav-item"><a class="nav-link" href="#contact" contact><?php echo $nav->contact ?></a></li>
            </ul>
            <ul class="nav nav-icon">
                <div class="sl-nav">
                    <ul>
                        <li><button class="country"></button>
                            <ul>
                                <li onclick="cCookie('lang', 'UK', 10, 'l');">
                                    <i class="sl-flag flag-uk"></i>
                                    <span>English</span>
                                </li>
                                <li onclick="cCookie('lang', 'DE', 10, 'l');">
                                    <i class="sl-flag flag-de"></i>
                                    <span>German</span>
                                </li>
                                <li onclick="cCookie('lang', 'AT', 10, 'l');">
                                    <i class="sl-flag flag-at"></i>
                                    <span>Austrian</span>
                                </li>
                                <li onclick="cCookie('lang', 'IT', 10, 'l');">
                                    <i class="sl-flag flag-it"></i>
                                    <span>Italy</span>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <li class="nav-item" id="mn-toggle"><i class="fas fa-bars"></i></li>
            </ul>
        </div>
    </nav>

    <div class="modal" id="mobile-navbar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-nav noselect">
            <div class="modal-content mn-content rounded-0 border-0">
                <div class="modal-header modal-mobile-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><?php echo $MobileNav->title ?></h5>
                    <button type="button" class="close clm">
                        <span aria-hidden="true">
                            <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-x" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="modal-body mn-body">
                    <div class="mn-button-group mb-5">
                        <a class="btn clm" href="#download"><?php echo $MobileNav->btngroup[0] ?></a>
                        <a class="btn clm" href="#demo"><?php echo $MobileNav->btngroup[1] ?></a>
                    </div>
                    <ul class="list-group mn-list">
                        <a href="http://localhost?hub">
                            <li class="list-group-item clm"><i class="fas fa-home"></i><?php echo $MobileNav->mnlist1->hub ?></li>
                        </a>
                        <a href="http://localhost?hub#new">
                            <li class="list-group-item clm"><i class="fas fa-newspaper"></i><?php echo $MobileNav->mnlist1->news ?></li>
                        </a>
                        <a href="http://localhost?hub#faq">
                            <li class="list-group-item clm"><i class="fas fa-question"></i><?php echo $MobileNav->mnlist1->faq ?></li>
                        </a>
                        <a href="#contact">
                            <li class="list-group-item clm"><i class="fas fa-info"></i><?php echo $MobileNav->mnlist1->contact ?></li>
                        </a>
                    </ul>
                    <ul class="list-group mn-list mt-4">
                        <p class="lilfont m-0 pl-1"><?php echo $MobileNav->mnlist2->title ?></p>
                        <li class="list-group-item mn-expand"><i class="fas fa-file-download"></i><?php echo $MobileNav->mnlist2->d ?>
                            <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                            </svg>
                        </li>
                        <div class="collapse mt-1" id="expand-down">
                            <a href="#download">
                                <li class="list-group-item"><i class="fas fa-download"></i><?php echo $MobileNav->mnlist2->dl ?><small class="lilfont"><?php echo $MobileNav->mnlist2->ver ?></small></li>
                            </a>
                            <li class="list-group-item mb-3 clm target-versions"><i class="fas fa-file-archive"></i><?php echo $MobileNav->mnlist2->sav ?></li>
                        </div>
                        <a href="./docs/">
                            <li class="list-group-item"><i class="fas fa-file-alt"></i><?php echo $MobileNav->mnlist2->doc ?></li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="modal version" id="versions" tabindex="-1" role="dialog" aria-labelledby="Versions" aria-hidden="true">
        <div class="modal-dialog modal-version" role="document">
            <div class="modal-content modal-content-version">
                <div class="modal-body p-0">
                    <table class="table text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"><?php echo $MobileNav->mv->v ?></th>
                                <th scope="col"><?php echo $MobileNav->mv->r ?></th>
                                <th scope="col"><?php echo $MobileNav->mv->p ?></th>
                                <th scope="col"><?php echo $MobileNav->mv->f ?></th>
                                <th scope="col"><?php echo $MobileNav->mv->d ?></th>
                            </tr>
                        </thead>
                        <tbody id="version-body">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer p-1">
                    <button type="button" class="btn btn-danger mv-close"><?php echo $MobileNav->mv->close ?></button>
                </div>
            </div>
        </div>
    </div>

    <section class="header">
        <div class="container">
            <h1 class="yio-title"></h1>
            <p><?php echo $header->text ?></p>
            <a href="#download" class="btn"><?php echo $header->button->title ?>
                <p>
                    <?php echo $header->button->subtitle ?>
                    <i class="fas fa-circle" style="color: 
                    <?php
                    $os_all = array_merge($os_windows, $os_linux, $os_ubuntu, $os_apple, $os_android);
                    if (in_array($OS, $os_all)) {
                        echo "rgb(154, 255, 129)";
                    } else {
                        echo "rgb(255, 137, 137)";
                    }
                    ?>;"></i>
                </p>
            </a>
        </div>
        <div class="divider">
            <svg width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none">
                <path d="M0,0 C16.6666667,66 33.3333333,99 50,99 C66.6666667,99 83.3333333,66 100,0 L100,100 L0,100 L0,0 Z"></path>
            </svg>
        </div>
        <div class="scrolldown">
            <a href="#about" class="bounce">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg>
            </a>
        </div>
    </section>

    <section class="about" id="about">
        <div class="container">
            <h3><?php echo $about->title ?></h3>
            <p class="mb-5"><?php echo $about->subtitle ?></p>
            <div class="row">
                <div class="col-sm">
                    <div class="about-icon align-middle">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <h4><?php echo $about->headline[0] ?></h4>
                    <p><?php echo $about->text[0] ?></p>
                </div>
                <div class="col-sm">
                    <div class="about-icon align-middle">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h4><?php echo $about->headline[1] ?></h4>
                    <p><?php echo $about->text[1] ?></p>
                </div>
                <div class="col-sm">
                    <div class="about-icon align-middle">
                        <i class="fas fa-images"></i>
                    </div>
                    <h4><?php echo $about->headline[2] ?></h4>
                    <p><?php echo $about->text[2] ?></p>
                </div>
            </div>
        </div>
    </section>
    <section class="member" id="member">
        <div class="container">
            <div class="member-text col-12 col-md-4">
                <h1>team</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate ab consectetur ipsum quibusdam, natus, unde accusamus reprehenderit laudantium officia odio totam? Incidunt recusandae aliquam ipsa sapiente repellendus non nihil quas.</p>
            </div>
            <div id="carouselExampleControls" class="carousel slide col-12 col-md-8" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <div class="members">
                            <div class="row">
                                <div class="col-6">
                                    <div class="card mb-4">
                                        <img class="card-img-top" src="img/placeholder/400x400.png" alt="Platzhalter-Bild">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Level 2</h5>
                                            <h6 class="card-subtitle mb-2 text-muted text-center">Description of the level</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card mb-4">
                                        <img class="card-img-top" src="img/placeholder/400x400.png" alt="Platzhalter-Bild">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Level 3</h5>
                                            <h6 class="card-subtitle mb-2 text-muted text-center">Description of the level</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item active">
                        <div class="members">
                            <div class="row">
                                <div class="col-6">
                                    <div class="card mb-4">
                                        <img class="card-img-top" src="img/team/m2v.png" alt="Platzhalter-Bild">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">m2v</h5>
                                            <h6 class="card-subtitle mb-2 text-muted text-center">Webdev, Database Administrator</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card mb-4">
                                        <img class="card-img-top" src="img/team/zero.png" alt="Platzhalter-Bild">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">zero</h5>
                                            <h6 class="card-subtitle mb-2 text-muted text-center">App Developer</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="members">
                            <div class="row">
                                <div class="col-6">
                                    <div class="card mb-4">
                                        <img class="card-img-top" src="img/placeholder/400x400.png" alt="Platzhalter-Bild">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Selale</h5>
                                            <h6 class="card-subtitle mb-2 text-muted text-center">Designer</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card mb-4">
                                        <img class="card-img-top" src="img/placeholder/400x400.png" alt="Platzhalter-Bild">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Level 3</h5>
                                            <h6 class="card-subtitle mb-2 text-muted text-center">Description of the level</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#member" role="button">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#member" role="button">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    <section class="demo" id="demo">
        <div class="container-sm flex-column">
            <div class="play">
                <svg width="10rem" height="10rem" viewBox="0 0 16 16" class="bi bi-play" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.804 8L5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z" />
                </svg>
            </div>
            <div class="embed-responsive yio-demo">
                <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Q3Kvu6Kgp88?autoplay=0&showinfo=0&controls=0"></iframe> -->
            </div>
        </div>
    </section>
    <div class="demo-end"></div>

    <section id="download">
        <div class="container pt-5 pb-5">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6 col-md-7 bg-white shadow-lg pt-5 pb-5 download">
                    <h1 class="mb-4 yio-title"></h1>
                    <p><?php echo $down->subtitle ?></p>
                    <p class="download-text"><?php echo $down->df ?></p>
                    <div class="download-group">
                        <?php

                        $AppleBtn = '<a class="btn" href="https://www.apple.com/app-store/"><i class="fab fa-apple"></i><span>IOS/Mac</span></a>';
                        $AndroidBtn = '<a class="btn" href="https://play.google.com/"><i class="fab fa-android"></i><span>Android</span></a>';
                        $WinBtn = '<a class="btn" href="./files/yio_beta.exe"><i class="fab fa-windows"></i><span>Windows</span></a>';
                        $LinuxBtn = '<a class="btn" href="./files/yio_beta.deb"><i class="fab fa-linux"></i>Linux</a>';
                        $UbuntuBtn = '<a class="btn" href="./files/yio_beta.deb"><i class="fab fa-ubuntu"></i>Ubuntu</a>';

                        $NotSupportet = '<p class="text-muted" id="nosupport">' . $down->nosupport . '</p>';

                        if (in_array($OS, $os_windows)) {
                            echo $WinBtn . $AndroidBtn . $AppleBtn;
                        } elseif (in_array($OS, $os_linux)) {
                            echo $LinuxBtn;
                        } elseif (in_array($OS, $os_ubuntu)) {
                            echo $UbuntuBtn;
                        } elseif (in_array($OS, $os_apple)) {
                            echo $AppleBtn;
                        } elseif (in_array($OS, $os_android)) {
                            echo $AndroidBtn;
                        } else {
                            echo $NotSupportet;
                        }

                        echo '<script>console.log("OS:' . $OS . '"); console.log("OS:" + navigator.platform); 
                        console.log("OS:' . $_SERVER['HTTP_USER_AGENT'] . '"); </script>';
                        ?>

                    </div>
                    <div id="patchnotes">
                        <a data-toggle="collapse" data-target="#PatchNotesContent" aria-controls="PatchNotesContent" aria-expanded="false" aria-label="Toggle navigation">
                            Patch Notes
                            <svg width="1rem" height="1rem" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </a>
                    </div>
                    <div class="collapse bg-blue" id="PatchNotesContent">
                        <div class="d-flex container flex-column justify-content-center pt-5 px-5 px-xl-card">
                            <div class="card mb-5 border-0 shadow-lg w-xl-auto w-100">
                                <div class="row no-gutters">
                                    <div class="col position-relative">
                                        <div class="card-body">
                                            <h4 class="card-title">BETA v1.1</h4>
                                            <p class="card-title text-left text-muted font-italic">20.08.2020</p>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            <ul>
                                                <li>Patches and Stuff like that</li>
                                                <li>fucking creeper</li>
                                                <li>Zombies are real</li>
                                                <li>Your mum</li>
                                                <li>Orangensaft</li>
                                                <li>Sick wie Leukämie</li>
                                            </ul>
                                            <p class="card-text card-update"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <a href="#">
                <h2><?php echo $contact->title ?></h2>
            </a>
            <p class="text-center mb-5"><?php echo $contact->subtitle ?></p>
            <div class="float-lg-right px-3 px-lg-0">
                <div>
                    <ul class="list-unstyled mb-5">
                        <li>
                            <i class="fas fa-phone-alt"></i>&nbsp;&nbsp;<a href="tel:<?php echo $phone ?>"><?php echo $phone ?></a>
                        </li>
                        <i class="fas fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;<a href="" id="adress"><?php echo $adress ?></a>
                        </li>
                    </ul>
                </div>
            </div>

            <form method="POST" action="./php/contact.php" class="col-lg-8">
                <div class="form-row">
                    <div class="col-lg-4 mb-3">
                        <input type="text" class="form-control" placeholder="<?php echo $form->firstname ?>*" name="firstname" required>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <input type="text" class="form-control" placeholder="<?php echo $form->lastname ?>*" name="lastname" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-8 mb-3">
                        <input type="email" class="form-control" placeholder="<?php echo $form->email ?>*" name="email" required>
                        <small class="form-text text-muted pl-1"><?php echo $form->reliable ?></small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-8 mb-2">
                        <textarea class="form-control" rows="3" placeholder="<?php echo $form->msg ?>*" name="text" required></textarea>
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" required>
                    <label class="form-check-label">
                        <?php echo $form->terms ?>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="newsletter" value="true" checked>
                    <label class="form-check-label">
                        <?php echo $form->newsletter ?>
                    </label>
                </div>
                <small class="text-muted"><?php echo $form->required ?></small>
                <fieldset>
                    <button class="btn btn-primary" type="submit"><?php echo $form->submit ?></button>
                </fieldset>
                <?php
                if (isset($_GET['success'])) {
                    if ($_GET['success'] == 1) {
                        echo '
                            <div class="alert alert-success alert-dismissible fade show mt-4 col-lg-8" role="alert">The form was sent successfully.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                        ';
                    } elseif ($_GET['success'] == 0) {
                        echo '
                            <div class="alert alert-danger alert-dismissible fade show mt-4 col-lg-8" role="alert">The form could not be sent, please try again.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                        ';
                    }
                }
                ?>
            </form>
        </div>
    </section>

    <footer class="footer-dark">
        <div class="container">
            <div class="row mb-5">
                <div class="col">
                    <div class="card card-body border-0 bg-primary text-light rounded">
                        <div class="position-relative d-flex flex-column flex-md-row justify-content-between align-items-center">
                            <div class="h3 text-center mb-md-0"><?php echo $footer->btn[0] ?></div>
                            <a href="#download" class="btn btn-light btn-lg text-uppercase">
                                <?php echo $footer->btn[1] ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-3 item">
                    <h3><?php echo $footer->download->title ?></h3>
                    <ul>
                        <li>
                            <p class="o75"><span><?php echo $version ?></span>&nbsp;&nbsp;<a href="<?php $path ?>"><i class="fab fa-android"></i></a>&nbsp;|&nbsp;<a href="<?php echo $path ?>"><i class="fab fa-windows"></i></a></p>
                        </li>
                        <hr>
                        <li><a href="#" id="footer-del" onclick="delCookieLang()">Delete Cookies</a></li>
                        <li><a href="#"><?php echo $footer->download->ip;
                                        echo $ip; ?></a></li>
                        <hr>

                        <li>
                            <p class="o75"><i class="fas fa-server"></i>&nbsp;&nbsp;<?php echo $footer->download->sl[0] ?>:&nbsp;<a href="https://de.wikipedia.org/wiki/%C3%96sterreich" target="_blank"><?php echo $footer->download->sl[1] ?></a></p>
                        </li>
                        <li>
                            <p class="o75"><?php echo $footer->download->f ?>&nbsp;<a href="#" target="_blank"><?php echo $footer->download->member[0] ?></a>, <a href="#" target="_blank"><?php echo $footer->download->member[1] ?></a></p>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3 item">
                    <h3><?php echo $footer->a->title ?></h3>
                    <ul>
                        <li><a href="#"><?php echo $footer->item[0] ?></a></li>
                        <li><a href="#"><?php echo $footer->item[1] ?></a></li>
                        <li><a href="#"><?php echo $footer->item[2] ?></a></li>
                        <hr>
                        <a href="imprint.html"><?php echo $footer->policy[0] ?></a><br>
                        <a href="dataprotection.html"><?php echo $footer->policy[1] ?></a><br>
                        <hr>
                        <a href="#PatchNotesContent"><?php echo $footer->item[3] ?></a>
                    </ul>
                </div>
                <div class="col-md-6 item text">
                    <h3><?php echo $footer->title ?></h3>
                    <p><?php echo $footer->text ?></p>
                </div>
                <div class="col item social"><br><br><a href="#"><i class="fab fa-youtube"></i></a><a href="#"><i class="fab fa-instagram"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-github"></i></a><a href="#"><i class="fab fa-paypal"></i></a><a href="#"><i class="fab fa-discord"></i></a></div>
            </div>
            <div class="copyright">
                <p>YIO Game &copy; 2020</p>
                <p><i class="fas fa-code"></i> with <i class="fas fa-heart"></i> by<a> m2v</a></p>
            </div>
        </div>
    </footer>
    <script>
        <?php
        if (!empty($_GET)) :
        ?>
            window.history.replaceState(null, null, window.location.pathname);
        <?php
        endif;

        if (isset($_SESSION['doCNT']) and $_SESSION['doCNT'] === 1) :
        ?>
            doCNT = "xyz";
        <?php endif; ?>
    </script>
    <script src="http://localhost/lib/jqeury-3.5.1/jquery-3.5.1.min.js"></script>
    <script src="http://localhost/lib/popper/popper.min.js"></script>
    <script src="http://localhost/lib/bootstrap-4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="http://localhost/lib/aos-master/aos.js"></script>
    <script src="./js/preload.js"></script>
    <script src="./js/app.js"></script>
    <script src="./lang/settings/settings.js"></script>
    <script>
        console.log(
            '■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■\n' +
            '■                                                                                  ■\n' +
            '■    ▶ We are searching for employees! Visit https: //jobs.' + location.hostname + '.at/  ◀       ■\n' +
            '■                                                                                  ■\n' +
            '■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■')
    </script>
    <noscript>
        <style>
            * {
                display: none !important;
            }
        </style>
    </noscript>
</body>

</html>
<!--~~~~~~~~~~~~~~~~~~
       ~(˘▾˘~)

            Coded by m2v
            Discord: m2v#7180

            Zero can't code ngl

    ~~~~~~~~~~~~~~~~~~-->