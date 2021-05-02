<?php
    session_start();

    // user not logged-in
    if (!isset($_SESSION['uname'])) {
        header("location:login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

    <div class="container">
        <h2 class="text-center">Shopping Cart</h2>
        <p class="text-center"><span id="total_items" class="font-weight-bold badge badge-secondary badge-pill"></span> items in your card</p>
        
        

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody id="cart_body">
            </tbody>
        </table>

        <hr>

        <div class="row">
            <div class="col-4">
                <input class="form-control" type="text" placeholder="Promo code" id="promo_code">
            </div>  
            <div class="col">
                <button type="submit" class="btn btn-secondary btn-sm" id="btn_redeem">Redeem</button>
            </div>                
        </div>
    </div>
    

    <!-- Sub Total -->
    <div class="container">
        <div class="row">
            <div class="col text-right"><span class="font-weight-bold">Total</span></div>
        </div>

        <div class="row">
            <div class="col text-right"><h5><span id="total_price"></span></h5></div>
        </div>

        <div class="row">
            <div class="col text-right"><button type="button" class="btn btn-primary btn-sm" id="btnCheckout">Checkout</button></div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="mainModal" tabindex="-1" aria-labelledby="mainModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="mainModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" id="mainModalClose">&times;</span>
            </button>
            </div>
            <div class="modal-body" id="mainModalBody">            
            </div>
            <div class="modal-footer">
            </div>
        </div>
        </div>
    </div>    


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="js/cart.js"></script>
    
</body>
</html>