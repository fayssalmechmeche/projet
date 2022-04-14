<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
    <title>Projet Jura</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        img {
            height: 280px;
        }

        body {
            background: hsl(0, 0, 94%);
        }
    </style>
</head>

<body>
    <?php
    require_once "Template/Header.php";
    ?>

    <div class="container-fluid my-5">
        <h1 class="text-center fw-bold display-1 mb-5">Les <span class="text-danger">Séjours</span></h1>
        <div class="row">
            <div class="col-12 m-auto">
                <div class="owl-carousel owl-theme">
                    <?php foreach ($hebergements as $hebergement) : ?>
                        <div class="item mb-4">
                            <div class="card border-0 shadow">
                                <img src="<?= $hebergement['image'] ?>" alt="" class="card-img-top">
                                <div class="card-body">
                                    <div class="card-title text-center">
                                        <h4><?= $hebergement['libelle'] ?> </h4>
                                        <p> <?= $hebergement['prix']  ?>Є</p>


                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>



    <?php foreach ($hebergements as $hebergement) : ?>
        <?php foreach ($clients as $client) : ?>
            <div class="modal fade" id="exampleModal<?= $hebergement['idHebergement'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?= $hebergement['libelle'] ?> </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method='post'>
                                <p>Nom : <input name='nom' value=''> </input></p>
                                <p>Prenom : <input name='prenom' value=''> </input></p>
                                <p>Mail : <input name='mail' value=''> </input></p>
                                <p>Date de depart : <input type='date' name='datedepart' value=''> </input></p>
                                <p>Date d'arrivé : <input type='date' name='datearrive' value=''> </input></p>
                                <p>Nombre de personne : <input type='numher' name='nbPersonne' value=''> </input></p>
                                <p>Pension :
                                    <select name="pension">
                                        <option>Non</option>
                                        <option>Oui</option>

                                    </select>
                                </p>

                                <div class="modal-footer">
                                    <input type='hidden' name='id' value="<?= $client['idClient'] ?>"></input>
                                    <input type='hidden' name='idClient' value="<?= $client['idClient'] ?>"></input>
                                    <input type='hidden' name='idHebergement' value="<?= $hebergement['idHebergement'] ?>"></input>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary" formaction="/DashboardUser/save">Reserver</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>









    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 15,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
    <script>
        $('.alert').alert('close')
    </script>

</body>

</html>


<?php

require_once "Template/Footer.php";
?>

<style>
    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }

    body,
    html {
        height: 100%;
        font-family: Poppins-Regular, sans-serif;
    }

    a {
        font-family: Poppins-Regular;
        font-size: 14px;
        line-height: 1.7;
        color: #666666;
        margin: 0px;
        transition: all 0.4s;
        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.4s;
    }

    a:focus {
        outline: none !important;
    }

    a:hover {
        text-decoration: none;
        color: #6a7dfe;
        color: -webkit-linear-gradient(left, #21d4fd, #b721ff);
        color: -o-linear-gradient(left, #21d4fd, #b721ff);
        color: -moz-linear-gradient(left, #21d4fd, #b721ff);
        color: linear-gradient(left, #21d4fd, #b721ff);
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin: 0px;
    }

    p {
        font-family: Poppins-Regular;
        font-size: 14px;
        line-height: 1.7;
        color: #666666;
        margin: 0px;
    }

    ul,
    li {
        margin: 0px;
        list-style-type: none;
    }

    input {
        outline: none;
        border: none;
    }

    textarea {
        outline: none;
        border: none;
    }

    textarea:focus,
    input:focus {
        border-color: transparent !important;
    }

    input:focus::-webkit-input-placeholder {
        color: transparent;
    }

    input:focus:-moz-placeholder {
        color: transparent;
    }

    input:focus::-moz-placeholder {
        color: transparent;
    }

    input:focus:-ms-input-placeholder {
        color: transparent;
    }

    textarea:focus::-webkit-input-placeholder {
        color: transparent;
    }

    textarea:focus:-moz-placeholder {
        color: transparent;
    }

    textarea:focus::-moz-placeholder {
        color: transparent;
    }

    textarea:focus:-ms-input-placeholder {
        color: transparent;
    }

    input::-webkit-input-placeholder {
        color: #adadad;
    }

    input:-moz-placeholder {
        color: #adadad;
    }

    input::-moz-placeholder {
        color: #adadad;
    }

    input:-ms-input-placeholder {
        color: #adadad;
    }

    textarea::-webkit-input-placeholder {
        color: #adadad;
    }

    textarea:-moz-placeholder {
        color: #adadad;
    }

    textarea::-moz-placeholder {
        color: #adadad;
    }

    textarea:-ms-input-placeholder {
        color: #adadad;
    }

    button {
        outline: none !important;
        border: none;
        background: transparent;
    }

    button:hover {
        cursor: pointer;
    }

    iframe {
        border: none !important;
    }

    .txt1 {
        font-family: Poppins-Regular;
        font-size: 13px;
        color: #666666;
        line-height: 1.5;
    }

    .txt2 {
        font-family: Poppins-Regular;
        font-size: 13px;
        color: #333333;
        line-height: 1.5;
    }

    .limiter {
        width: 100%;
        margin: 0 auto;
    }

    .container-login100 {
        width: 100%;
        min-height: 100vh;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        padding: 15px;
        background: #f2f2f2;
    }

    .wrap-login100 {
        width: 390px;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        padding: 77px 55px 33px 55px;

        box-shadow: 0 5px 10px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0 5px 10px 0px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0 5px 10px 0px rgba(0, 0, 0, 0.1);
        -o-box-shadow: 0 5px 10px 0px rgba(0, 0, 0, 0.1);
        -ms-box-shadow: 0 5px 10px 0px rgba(0, 0, 0, 0.1);
    }

    .login100-form {
        width: 100%;
    }

    .login100-form-title {
        display: block;
        font-family: Poppins-Bold;
        font-size: 30px;
        line-height: 1.2;
        text-align: center;
        color: grey;
    }

    .login100-form-title i {
        font-size: 60px;
    }

    .wrap-input100 {
        width: 100%;
        position: relative;
        border-bottom: 2px solid #adadad;
        margin-bottom: 37px;
    }

    .input100 {
        font-family: Poppins-Regular;
        font-size: 15px;
        color: #555555;
        line-height: 1.2;

        display: block;
        width: 100%;
        height: 45px;
        background: transparent;
        padding: 0 5px;
    }

    .focus-input100 {
        position: absolute;
        display: block;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        pointer-events: none;
    }

    .focus-input100::before {
        content: "";
        display: block;
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;

        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.4s;
        transition: all 0.4s;

        background: #6a7dfe;
        background: -webkit-linear-gradient(left, #21d4fd, #b721ff);
        background: -o-linear-gradient(left, #21d4fd, #b721ff);
        background: -moz-linear-gradient(left, #21d4fd, #b721ff);
        background: linear-gradient(left, #21d4fd, #b721ff);
    }

    .focus-input100::after {
        font-family: Poppins-Regular;
        font-size: 15px;
        color: #999999;
        line-height: 1.2;

        content: attr(data-placeholder);
        display: block;
        width: 100%;
        position: absolute;
        top: 16px;
        left: 0px;
        padding-left: 5px;

        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.4s;
        transition: all 0.4s;
    }

    .input100:focus+.focus-input100::after {
        top: -15px;
    }

    .input100:focus+.focus-input100::before {
        width: 100%;
    }

    .has-val.input100+.focus-input100::after {
        top: -15px;
    }

    .has-val.input100+.focus-input100::before {
        width: 100%;
    }

    .btn-show-pass {
        font-size: 15px;
        color: #999999;

        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        align-items: center;
        position: absolute;
        height: 100%;
        top: 0;
        right: 0;
        padding-right: 5px;
        cursor: pointer;
        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.4s;
        transition: all 0.4s;
    }

    .btn-show-pass:hover {
        color: #6a7dfe;
        color: -webkit-linear-gradient(left, #21d4fd, #b721ff);
        color: -o-linear-gradient(left, #21d4fd, #b721ff);
        color: -moz-linear-gradient(left, #21d4fd, #b721ff);
        color: linear-gradient(left, #21d4fd, #b721ff);
    }

    .btn-show-pass.active {
        color: #6a7dfe;
        color: -webkit-linear-gradient(left, #21d4fd, #b721ff);
        color: -o-linear-gradient(left, #21d4fd, #b721ff);
        color: -moz-linear-gradient(left, #21d4fd, #b721ff);
        color: linear-gradient(left, #21d4fd, #b721ff);
    }

    .container-login100-form-btn {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding-top: 13px;
    }

    .wrap-login100-form-btn {
        width: 100%;
        display: block;
        position: relative;
        z-index: 1;
        border-radius: 25px;
        overflow: hidden;
        margin: 0 auto;
    }

    .login100-form-bgbtn {
        position: absolute;
        z-index: -1;
        width: 300%;
        height: 100%;
        background: #a64bf4;
        background: -webkit-linear-gradient(right, #21d4fd, #b721ff, #21d4fd, #b721ff);
        background: -o-linear-gradient(right, #21d4fd, #b721ff, #21d4fd, #b721ff);
        background: -moz-linear-gradient(right, #21d4fd, #b721ff, #21d4fd, #b721ff);
        background: linear-gradient(right, #21d4fd, #b721ff, #21d4fd, #b721ff);
        top: 0;
        left: -100%;

        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.4s;
        transition: all 0.4s;
    }

    .login100-form-btn {
        font-family: Poppins-Medium;
        font-size: 15px;
        color: #fff;
        line-height: 1.2;
        text-transform: uppercase;

        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 20px;
        width: 100%;
        height: 50px;
    }

    .wrap-login100-form-btn:hover .login100-form-bgbtn {
        left: 0;
    }


    /*------------------------------------------------------------------
[ Responsive ]*/

    @media (max-width: 576px) {
        .wrap-login100 {
            padding: 77px 15px 33px 15px;
        }
    }

    .validate-input {
        position: relative;
    }

    .alert-validate::before {
        content: attr(data-validate);
        position: absolute;
        max-width: 70%;
        background-color: #fff;
        border: 1px solid #c80000;
        border-radius: 2px;
        padding: 4px 25px 4px 10px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
        right: 0px;
        pointer-events: none;

        font-family: Poppins-Regular;
        color: #c80000;
        font-size: 13px;
        line-height: 1.4;
        text-align: left;

        visibility: hidden;
        opacity: 0;

        -webkit-transition: opacity 0.4s;
        -o-transition: opacity 0.4s;
        -moz-transition: opacity 0.4s;
        transition: opacity 0.4s;
    }

    .alert-validate::after {
        content: "\f06a";
        font-family: FontAwesome;
        font-size: 16px;
        color: #c80000;

        display: block;
        position: absolute;
        background-color: #fff;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
        right: 5px;
    }

    .alert-validate:hover:before {
        visibility: visible;
        opacity: 1;
    }

    @media (max-width: 992px) {
        .alert-validate::before {
            visibility: visible;
            opacity: 1;
        }
    }

    /*[ PADDING ]
///////////////////////////////////////////////////////////
*/

    .p-t-115 {
        padding-top: 115px;
    }

    .p-b-26 {
        padding-bottom: 26px;
    }

    .p-b-48 {
        padding-bottom: 48px;
    }