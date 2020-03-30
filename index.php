<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Ho Thanh Son">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <!-- Title -->
    <title>Mor Asia | Make Our Dream Realized</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.background-video.css">
    <script src="https://www.google.com/recaptcha/api.js?hl=ja" async defer></script>
</head>

<body>
    <?php
    session_start();
    ?>
    <!-- MainMenu-Area -->
    <section class="mainmenu-area">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark custom" id="menu-bar">
            <div class="container">
                <img class="navbar-brand custom" src="images/MorLogoWhite.png" alt="">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link custom" href="#service">SERVICE <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom" href="#news">NEWS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom" href="#about-us">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom" href="#access">ACCESS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom" href="#contact">CONTACT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <!-- MainMenu-Area-End -->
    <!-- video-Area -->
    <section class="video-area">
        <div class="container-fluid">
            <div class="row">
                <div class="video element-with-video-bg jquery-background-video-wrapper">
                    <video class="my-background-video jquery-background-video" data-bgvideo="true" autoplay loop muted playsinline>
                        <source id="video" src="videos/World - 1992.mp4" type="video/mp4">
                    </video>
                    <img src="images/logo_plus_slogan.png" alt="">
                </div>
            </div>
            <!-- vision-Area -->
            <div class="row">
                <div class="vision-content">
                    <h6>Vision</h6>
                    <h3>Make Our Dream Realized</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- service-Area -->
    <section class="service-area" id="service">
        <div class="container">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <h1 class="header-text">SERVICE</h1>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="service-col">
                        <h1>オフショア開発</h1>
                        <p>
                            ベトナム開発拠点にて、アプリからBtoB webシステム、IoTやAIまで幅広く開発しています。受託開発・ラボ型開発のどちらもご用意しておりますので、ご要望に沿ったスタイルでの、開発をご提案いたします。
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="service-col">
                        <h1>​AIサービス</h1>
                        <p>
                            自社にてAI研究開発をしており、 高精度の顔認証サービス”​Smart Brain”をはじめとする、AIサービスを提供しております。その他、文字認証や画像認証等の独自サービスを展開しております。
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="service-col">
                        <h1>人材紹介</h1>
                        <p>
                            日本語堪能かつ高いエンジニアスキルを持つハイクオリティなベトナム人エンジニア
                            の紹介をしております。ビザ等の手間のかかる手続きまで代行いたします。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MainMenu-Area-End -->

    <!-- news-Area -->
    <section class="news-area" id="news">
        <div class="container">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <h1 class="header-text">NEWS</h1>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="row">
                <div class="col-1 col-sm-2"></div>
                <div class="col-11 col-sm-10">
                    <div class="news">
                        <p><span>2019.5　南池袋事務所へ移転。</span></p>
                        <p><span>2019.4　ダナンオフィス設立。</span></p>
                        <p><span>2019.3　有料職業紹介免許取得。</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- news-Area-End -->

    <!-- about-Area -->
    <section class="about-area" id="about-us">
        <div class="container">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h1 class="header-text">ABOUT US</h1>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="about-col">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row">社名</th>
                                    <td>株式会社モアアジア</td>
                                </tr>
                                <tr>
                                    <th scope="row">住所</th>
                                    <td>
                                        〒171-0022
                                        <br>
                                        ​ 東京都豊島区南池袋2-9-3 サンビルディング4階</td>
                                </tr>
                                <tr>
                                    <th scope="row">設立</th>
                                    <td colspan="2">2017年4月​</td>
                                </tr>
                                <tr>
                                    <th scope="row">電話番号</th>
                                    <td colspan="2">03-5924-6616</td>
                                </tr>
                                <tr>
                                    <th scope="row">代表者</th>
                                    <td colspan="2">代表取締役社長　北田智一</td>
                                </tr>
                                <tr>
                                    <th scope="row">従業員数</th>
                                    <td colspan="2">18人　グループ全体162人(契約社員、アルバイト含む)</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="th-custom">グループ会社</th>
                                    <td colspan="2">
                                        MOR Software JSC / ベトナム ホーチミンオフィス <br>
                                        7F, 385 To Hien Thanh, 14 Ward, 10 District, Ho Chi Minh City, Vietnam
                                        <br>
                                        <br>
                                        MOR Hanoi Branch / ベトナム ハノイオフィス <br>
                                        6F, CT1 Tower, Bac Ha C14 Building, To Huu Street, Hanoi, Vietnam
                                        <br>
                                        <br>
                                        MOR Technology Creative / ベトナム ダナンオフィス <br>
                                        4F, BYB Building, 166 Le Do Street, Da Nang, Vietnam
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="th-custom2">グループ会社HP</th>
                                    <td colspan="2"><a href="https://morsoftware.com/">https://morsoftware.com/</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="about-col">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row" class="th-custom">​事業内容</th>
                                    <td colspan="2">
                                        <span>システム開発</span>
                                        <ul class="ul-custom">
                                            <li>システムコンサルティング</li>
                                            <li>常駐開発</li>
                                            <li>ラボ型開発</li>
                                            <li>受託開発</li>
                                        </ul>
                                        <span>React.js/Reduxを用いた高パフォーマンスのウェブシステムの開発
                                            Node.jsやSocket.ioを用いたリアルタイムチャットシステムの開発
                                            AI応用研究およびAIシステム開発</span>
                                        <ul class="ul-custom">
                                            <li>OCR</li>
                                            <li>スマート認証</li>
                                            <li>スマートチェックイン等</li>
                                        </ul>
                                        <span>ブロックチェーンや仮想通貨の開発・運用</span>
                                        <ul class="ul-custom">
                                            <li>取引所の構築・運用</li>
                                            <li>仮想通貨の発行（ICO）</li>
                                            <li>ブロックチェーンやスマートコントラクトを用いたシステム開発</li>
                                        </ul>
                                        <span>IT人材育成</span>
                                        <ul class="ul-custom">
                                            <li>採用支援</li>
                                            <li>ベトナム進出支援</li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-Area-End -->

    <!-- Access-Area -->
    <section class="access-area" id="access">
        <div class="container">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <h1 class="header-text">ACCESS</h1>
                </div>
                <div class="col-sm-4"></div>
            </div>

            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.0406542146457!2d139.7122001507637!3d35.725218680086925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188d69795beac3%3A0xdf2172f8202cd7df!2zSmFwYW4sIOOAkjE3MS0wMDIyIFTFjWt5xY0tdG8sIFRvc2hpbWEgQ2l0eSwgTWluYW1paWtlYnVrdXJvLCAyLWNoxY1tZeKIkjniiJIzIOOCteODs-ODk-ODq-ODh-OCo-ODs-OCsCA06ZqO!5e0!3m2!1sen!2s!4v1581949674210!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="">
                        </iframe>
                    </div>
                    <div>
                        <span>JR線、丸の内線　池袋駅東口より徒歩8分</span>
                        <br>
                        <br>
                        <span>東京メトロ有楽町線　東池袋駅より徒歩8分</span>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </section>
    <!-- news-Area-End -->

    <!-- Contact-Area -->
    <section class="contact-area" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <h1 class="header-text contact">​CONTACT</h1>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <form method="POST" action="function.php" class="needs-validation contact-form" novalidate>
                        <?php if (isset($_SESSION['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo ($_SESSION['success']); ?>
                            </div>
                        <?php } ?>
                        <?php if (isset($_SESSION['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo ($_SESSION['error']); ?>
                            </div>
                        <?php } ?>
                        <?php session_destroy(); ?>
                        <div class="form-group input-holder">
                            <input type="text" class="form-control" id="name" name="name" placeholder="お名前※" value="<?php echo isset($_SESSION['post_data']) ? $_SESSION['post_data']['name'] : ''; ?>" required>
                            <!-- <span class="required-symbol required-symbol-1">※</span> -->
                            <div class="invalid-feedback">
                                入力必須の項目が入力されていない
                            </div>
                        </div>
                        <div class="form-group input-holder">
                            <input type="text" class="form-control" id="company-name" name="company-name" placeholder="会社名※" value="<?php echo isset($_SESSION['post_data']) ? $_SESSION['post_data']['company-name'] : ''; ?>" required>
                            <div class="invalid-feedback">
                                入力必須の項目が入力されていない
                            </div>
                        </div>
                        <div class="form-group input-holder">
                            <input type="email" class="form-control" id="email" name="email" placeholder="メールアドレス※" value="<?php echo isset($_SESSION['post_data']) ? $_SESSION['post_data']['email'] : ''; ?>" required>

                            <div class="invalid-feedback">
                                <span>入力されたメールアドレスの形式が正しくない。</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="件名" value="<?php echo isset($_SESSION['post_data']) ? $_SESSION['post_data']['subject'] : ''; ?>">
                        </div>
                        <div class="form-group input-holder">
                            <textarea class="form-control required-textarea" id="requirement" rows="3" name="requirement" placeholder="ここにお問い合わせ内容を入力してください※" required><?php echo isset($_SESSION['post_data']) ? htmlspecialchars($_SESSION['post_data']['requirement']) : ''; ?></textarea>
                            <div class="invalid-feedback">
                                入力必須の項目が入力されていない
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="required-text"><span>※必須項目</span></div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    <span class="text"><a href="" data-toggle="modal" data-target="#exampleModalLong">利用規約</a> に同意する</span>
                                </label>
                                <div class="invalid-feedback">
                                    「利用規約に同意する」にチェックしてください
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="g-recaptcha" data-callback="verifyCaptcha" data-sitekey="6LeQX-QUAAAAAFmrQFO_G5omByFPxochaBqwWsba"></div>
                            <div id="g-recaptcha-error" class="g-recaptcha-error"></div>
                            <?php if (isset($_SESSION['captcha_error'])) { ?>
                                <div class="g-recaptcha-error">
                                    <?php echo ($_SESSION['captcha_error']); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary custom">送信</button>
                    </form>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </section>
    <!-- Contact-Area-End -->
    <!-- Footer-Area -->
    <section class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="row">

                    </div>
                    <div class="footer-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <img src="images/MorLogoBlack.png" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-sm-12">
                                <div class="footer-text">
                                    <span>住所 &nbsp; &nbsp; &nbsp; <span>〒171-0022</span></span>
                                    <br>
                                    <span>東京都豊島区南池袋2-9-3 サンビルディング4階</span>
                                    <br>
                                    <span>​03-5924-6616</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="right-content">
                                    <div class="social">
                                        <a href="https://www.youtube.com/watch?v=AfPo1u25d8A" target="_blank"><i class="fa fa-youtube custom"></i></a>
                                        <a href="https://www.facebook.com/morjsc/" target="_blank"><i class="fa fa-facebook-square custom"></i></a>
                                    </div>
                                    <div class="privacy">
                                        <span data-toggle="modal" data-target="#exampleModalLong">Privacy Policy</span>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    </div>
                                    <div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">プライバシーポリシー</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>1．基本方針</h3>
                                                    <p>
                                                        株式会社モアアジア(以下｢当社｣)およびその関連会社は、業務を遂行するうえで、当社に従事する者は、個人情報の保護を重要な責務であることを認識し、個人情報を正確かつ安全に取り扱います。
                                                    </p>
                                                    <h3>2．法令等の遵守</h3>
                                                    <p>
                                                        当社は、「個人情報の保護に関する法律」等個人情報の保護に関する法令、国が定めるガイドラインおよび本個人情報保護方針を遵守いたします。
                                                    </p>
                                                    <h3>3．個人情報の取り扱い</h3>
                                                    <h4>（1）個人情報の利用目的について</h4>
                                                    <p>当社は、利用目的の範囲内で適切な取り扱いをし、取得または預託された個人情報を利用目的以外の利用は行いません。</p>
                                                    <h4>（2）個人情報の管理について</h4>
                                                    <p>当社は、個人情報への不正アクセス、個人情報の紛失、破壊、改ざんおよび漏洩等のリスクを認識し、予防ならびに是正に努めます。個人情報へのアクセスは、必要最小限の役員従業員に限定します。
                                                        個人情報の取り扱いを外部に委託する場合、
                                                        十分な個人情報保護水準を確保していることを条件として委託先を選定します。また、委託を受けたものに対する必要かつ適切な監督を行います。</p>
                                                    <h4>（3）個人情報の開示について</h4>
                                                    <p>当社は、個人情報に関する本人の権利を尊重し、その個人情報に対して開示、訂正および削除を求められた場合、合理的な手続を通してこれに応じます。</p>

                                                    <h3>4．教育</h3>
                                                    <p>当社は、個人情報の保護に関する教育を、全従業員に対して継続的に行い、個人情報の適切な取り扱いを実践いたします。</p>

                                                    <h3>5．苦情および相談への対応</h3>
                                                    <p>個人情報の取り扱いに関する苦情および相談を受けた場合には、その内容について事実関係等を迅速に調査し、合理的な期間内に誠意をもって対応いたします。</p>

                                                    <h3>6．個人情報保護マネジメントシステムの改善</h3>
                                                    <p>個人情報保護マネジメントシステムの改善 当社は、社会情勢・社会環境の変化を踏まえ保有する個人情報の保護に関するための方針、
                                                        監査および見直しを含むマネジメントシステムを適切に継続的な改善を行います。 ＜弊社の個人情報に関するご相談窓口＞
                                                        本個人情報保護方針に関するお問い合わせは、下記までお願いします。 代表取締役社長　北田 智一 個人情報保護取扱窓口
                                                        contact@morsoftware.com なお、採用活動を通じてご提供いただいたお客様の個人情報に関するお問い合わせは、
                                                        上記メールアドレス若しくは総合窓口（03-5924-6616）にて承ります。</p>

                                                    <span>制定日　2017年2月1日</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="copyright-text">
                                <span>&copy; 2020 Mor asia .inc</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </section>
    <!-- Footer-Area-End -->
    <!--Vendor-JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--Main-active-JS-->
    <script src="js/main.js"></script>
    <script src="js/jquery.background-video.js"></script>

    <script>
        $('.my-background-video').bgVideo({
            fullScreen: false, // Sets the video to be fixed to the full window - your <video> and it's container should be direct descendents of the <body> tag
            fadeIn: 86400, // Milliseconds to fade video in/out (0 for no fade)
            pauseAfter: 86400, // Seconds to play before pausing (0 for forever)
            fadeOnPause: false, // For all (including manual) pauses
            fadeOnEnd: true, // When we've reached the pauseAfter time
            showPausePlay: true, // Show pause/play button
            pausePlayXPos: 'right', // left|right|center
            pausePlayYPos: 'top', // top|bottom|center
            pausePlayXOffset: '15px', // pixels or percent from side - ignored if positioned center
            pausePlayYOffset: '15px' // pixels or percent from top/bottom - ignored if positioned center
        });
        $.fn.bgVideo.defaults.fadeIn = 0;
        $.fn.bgVideo.defaults.pauseAfter = 0;

        $(document).ready(function() {
            var noHashURL = window.location.href.replace(/#.*$/, '');
            window.history.replaceState('', document.title, noHashURL);
        });
    </script>
</body>

</html>