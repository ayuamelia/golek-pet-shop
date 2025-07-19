@extends('layouts.index')

@section('center')

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Frequently Asked Questions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">

    <h2 class="title text-center">Frequently Asked Questions</h2>

    <!-- Bootstrap FAQ - START -->

    <div class="panel-group" id="accordion">
        <div class="faqHeader">Indonesia</div>
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: orange">
                <h4 class="panel-title" href="#collapseOne">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Apa kegunaan dari website Golek Pet Shop?</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body" style="background-color: #f4f5f7;">
                    <strong>Golek Pet Shop</strong> dapat memudahkan anda dalam mencari informasi Pet Shop dan memilih Pet Shop yang cocok dengan selera anda. Selain itu, anda dapat melakukan reservasi sesuai dengan layanan yang anda inginkan untuk hewan peliharaan anda.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: orange">
                <h4 class="panel-title" href="#collapseTwo">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Apa saja yang bisa saya cari melalui website Golek Pet Shop?</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body" style="background-color: #f4f5f7;">
                    Anda bisa mencari informasi umum mengenai Pet Shop yang mencangkup alamat, nomor telepon, jam buka, dan informasi layanan yang disediakan oleh Pet Shop disertai dengan harga estimasi masing-masing layanan.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: orange">
                <h4 class="panel-title" href="#collapseThree">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Bagaimana cara melakukan reservasi?</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body" style="background-color: #f4f5f7;">
                    Hal pertama yang perlu anda lakukan adalah melakukan login. Jika anda belum memiliki akun, anda akan diarahkan untuk membuat akun terlebih dahulu. Setelah itu anda dapat melanjutkan melakukan reservasi sesuai yang anda inginkan.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: orange">
                <h4 class="panel-title" href="#collapseFour">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Apakah harga layanan yang tercantum di web adalah harga asli?</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body" style="background-color: #f4f5f7;">
                    Harga yang tercantum di web bukan merupakan harga asli, melainkan harga estimasi. Kami menampilkan informasi harga layanan yang sekiranya mendekati harga asli. Harga yang tercantum di web belum termasuk pajak dan biaya admin.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: orange">
                <h4 class="panel-title" href="#collapseFive">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Apakah melakukan reservasi dikenai biaya?</a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                <div class="panel-body" style="background-color: #f4f5f7;">
                    Tidak. Anda tidak dikenai biaya saat melakukan reservasi.
                </div>
            </div>
        </div>

    </div>

    <div class="panel-group" id="accordion2">
        <div class="faqHeader">English</div>
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: orange">
                <h4 class="panel-title" href="#collapseSix">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">What is the function of Golek Pet Shop website?</a>
                </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse in">
                <div class="panel-body" style="background-color: #f4f5f7;">
                    <strong>Golek Pet Shop</strong> can make it easier for you to find Pet Shop information and choose a Pet Shop that suits your taste. In addition, you can make reservations according to the service you want for your pet.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: orange">
                <h4 class="panel-title" href="#collapseSeven">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">What information can be found on the Golek Pet Shop website?</a>
                </h4>
            </div>
            <div id="collapseSeven" class="panel-collapse collapse">
                <div class="panel-body" style="background-color: #f4f5f7;">
                    You can find general information about the Pet Shop that covers the address, telephone number, opening hours, and service information provided by the Pet Shop along with the estimated price of each service.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: orange">
                <h4 class="panel-title" href="#collapseEight">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">How to make a reservation?</a>
                </h4>
            </div>
            <div id="collapseEight" class="panel-collapse collapse">
                <div class="panel-body" style="background-color: #f4f5f7;">
                    The first thing you need to do is log in. If you don't have an account, you will be directed to create an account first. After that you can continue to make reservations as you wish.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: orange">
                <h4 class="panel-title" href="#collapseNine">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">Is the price of services listed on the web the original price?</a>
                </h4>
            </div>
            <div id="collapseNine" class="panel-collapse collapse">
                <div class="panel-body" style="background-color: #f4f5f7;">
                    Prices listed on the web are not the original price, but the estimated price. We display information on service prices that are close to the original price. Prices listed on the web do not include taxes and admin fees.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: orange">
                <h4 class="panel-title" href="#collapseTen">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">Will I be charged when I make a reservation?</a>
                </h4>
            </div>
            <div id="collapseTen" class="panel-collapse collapse">
                <div class="panel-body" style="background-color: #f4f5f7;">
                    No. You are not charged when making a reservation.
                </div>
            </div>
        </div>

    </div>
</div>
<br><br><br>

    <style>
        .faqHeader {
            font-size: 27px;
            margin: 20px;
        }

        .panel-heading [data-toggle="collapse"]:after {
            font-family: 'Glyphicons Halflings';
            content: "\e072"; /* "play" icon */
            float: right;
            color: #F58723;
            font-size: 18px;
            line-height: 22px;
            /* rotate "play" icon from > (right arrow) to down arrow */
            -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            -ms-transform: rotate(-90deg);
            -o-transform: rotate(-90deg);
            transform: rotate(-90deg);
        }

        .panel-heading [data-toggle="collapse"].collapsed:after {
            /* rotate "play" icon from > (right arrow) to ^ (up arrow) */
            -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            -o-transform: rotate(90deg);
            transform: rotate(90deg);
            color: #454444;
        }
    </style>

    <!-- Bootstrap FAQ - END -->

</div>

</body>
</html>

@endsection