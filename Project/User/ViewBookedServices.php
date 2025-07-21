<?php
include("../Assets/Connection/Connection.php");
session_start();

$uid = $_SESSION["uid"];

$selqry = "SELECT 
                *
           FROM 
                tbl_singleservice ss 
                INNER JOIN tbl_booking b ON ss.booking_id = b.booking_id 
                INNER JOIN tbl_serviceamount sa ON ss.serviceamount_id = sa.serviceamount_id 
                INNER JOIN tbl_servicetype st ON sa.servicetype_id = st.servicetype_id 
           WHERE 
                b.user_id = '$uid' 
                AND b.booking_status = '0'";

$result = $Con->query($selqry);

if (isset($_POST["btn_checkout"])) {
                 
                 $amt = $_POST["carttotalamt"];
                
                
                $selC = "select * from tbl_booking where user_id='" .$_SESSION["uid"]. "'and booking_status='0'";
                $rs = $Con->query($selC);
                $row=$rs->fetch_assoc();
                 $_SESSION["bid"] = $row["booking_id"];
                
                $upQry1 = "update tbl_booking set booking_date=curdate(),booking_amount='".$amt."',booking_status='1' where user_id='" .$_SESSION["uid"]. "'";
				$Con->query($upQry1);
				
				 $upQry1 = "update tbl_singleservice set singleservice_status='1' where booking_id='" .$row["booking_id"]. "'";
                if($Con->query($upQry1))
                {
                    ?>
<script>
    alert("Booking Confirmed");
    window.location = "BookDate.php";
    </script>
                    <?php
					
					
					
                }
                 
                
            
        }

?>

        <html>
            <head>
                <meta charset="UTF-8">
                    <title>Service Cart</title>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
                    <style>
                        .product-image {
                            float: left;
                        width: 20%;
            }

                        .product-details {
                            float: left;
                        width: 37%;
            }

                        .product-price {
                            float: left;
                        width: 12%;
            }

                        .product-quantity {
                            float: left;
                        width: 10%;
            }

                        .product-removal {
                            float: left;
                        width: 9%;
            }

                        .product-line-price {
                            float: left;
                        width: 12%;
                        text-align: right;
            }

                        /* This is used as the traditional .clearfix class */
                        .group:before,
                        .shopping-cart:before,
                        .column-labels:before,
                        .product:before,
                        .totals-item:before,
                        .group:after,
                        .shopping-cart:after,
                        .column-labels:after,
                        .product:after,
                        .totals-item:after {
                            content: "";
                        display: table;
            }

                        .group:after,
                        .shopping-cart:after,
                        .column-labels:after,
                        .product:after,
                        .totals-item:after {
                            clear: both;
            }

                        .group,
                        .shopping-cart,
                        .column-labels,
                        .product,
                        .totals-item {
                            zoom: 1;
            }

                        /* Apply clearfix in a few places */
                        /* Apply dollar signs */
                        .product .product-price:before,
                        .product .product-line-price:before,
                        .totals-value:before {
                            content: "Rs.";
            }

                        /* Body/Header stuff */
                        body {
                            padding: 0px 30px 30px 20px;
                        font-family: "HelveticaNeue-Light", "Helvetica Neue Light",
                        "Helvetica Neue", Helvetica, Arial, sans-serif;
                        font-weight: 100;
            }

                        h1 {
                            font - weight: 100;
            }

                        label {
                            color: #aaa;
            }

                        .shopping-cart {
                            margin - top: -45px;
            }

                        /* Column headers */
                        .column-labels label {
                            padding - bottom: 15px;
                        margin-bottom: 15px;
                        border-bottom: 1px solid #eee;
            }
                        .column-labels .product-image,
                        .column-labels .product-details,
                        .column-labels .product-removal {
                            text - indent: 0px;
            }

                        /* Product entries */
                        .product {
                            margin - bottom: 20px;
                        padding-bottom: 10px;
                        border-bottom: 1px solid #eee;
            }
                        .product .product-image {
                            text - align: center;
            }
                        .product .product-image img {
                            width: 100px;
            }
                        .product .product-details .product-title {
                            margin - right: 20px;
                        font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
            }
                        .product .product-details .product-description {
                            margin: 5px 20px 5px 0;
                        line-height: 1.4em;
            }
                        .product .product-quantity input {
                            width: 40px;
            }
                        .product .remove-product {
                            border: 0;
                        padding: 4px 8px;
                        background-color: #c66;
                        color: #fff;
                        font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
                        font-size: 12px;
                        border-radius: 3px;
            }
                        .product .remove-product:hover {
                            background - color: #a44;
            }

                        /* Totals section */
                        .totals .totals-item {
                            float: right;
                        clear: both;
                        width: 100%;
                        margin-bottom: 10px;
            }
                        .totals .totals-item label {
                            float: left;
                        clear: both;
                        width: 79%;
                        text-align: right;
            }
                        .totals .totals-item .totals-value {
                            float: right;
                        width: 21%;
                        text-align: right;
            }
                        .totals .totals-item-total {
                            font - family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
            }

                        .checkout {
                            float: right;
                        border: 0;
                        margin-top: 20px;
                        padding: 6px 25px;
                        background-color: #6b6;
                        color: #fff;
                        font-size: 25px;
                        border-radius: 3px;
            }

                        .checkout:hover {
                            background - color: #494;
            }

                        /* Make adjustments for tablet */
                        @media screen and (max-width: 650px) {
                .shopping - cart {
                            margin: 0;
                        padding-top: 20px;
                        border-top: 1px solid #eee;
                }

                        .column-labels {
                            display: none;
                }

                        .product-image {
                            float: right;
                        width: auto;
                }
                        .product-image img {
                            margin: 0 0 10px 10px;
                }

                        .product-details {
                            float: none;
                        margin-bottom: 10px;
                        width: auto;
                }

                        .product-price {
                            clear: both;
                        width: 70px;
                }

                        .product-quantity {
                            width: 100px;
                }
                        .product-quantity input {
                            margin - left: 20px;
                }

                        .product-quantity:before {
                            content: "x";
                }

                        .product-removal {
                            width: auto;
                }

                        .product-line-price {
                            float: right;
                        width: 70px;
                }
            }
                        /* Make more adjustments for phone */
                        @media screen and (max-width: 350px) {
                .product - removal {
                            float: right;
                }

                        .product-line-price {
                            float: right;
                        clear: left;
                        width: auto;
                        margin-top: 10px;
                }

                        .product .product-line-price:before {
                            content: "Item Total: ₹";
                }

                        .totals .totals-item label {
                            width: 60%;
                }
                        .totals .totals-item .totals-value {
                            width: 40%;
                }
            }


                        label{
                            margin: 0px 0px;
            }



                        /*SWITCH 2 ------------------------------------------------*/
                        .switch2{
                            position: relative;
                        display: inline-block;
                        width: 60px;
                        height: 32px;
                        border-radius: 27px;
                        background-color: #bdc3c7;
                        cursor: pointer;
                        transition: all .3s;
            }

                        .switch2 input{
                            display: none;
            }
                        .switch2 input:checked + div{
                            left: calc(100% - 40px);
            }
                        .switch2 div{
                            position: absolute;
                        width: 40px;
                        height: 40px;
                        border-radius: 25px;
                        background-color: white;
                        top: -4px;
                        left: 0px;
                        box-shadow: 0px 0px 0.5px 0.5px rgb(170,170,170);
                        transition: all .2s;
            }

                        .switch2-checked{
                            background - color: #2ecc71;
            }

                        .con {
                            display: flex;
                        justify-content: flex-end;
            }
                        .cons {
                            padding: 10px;
                        background-color: #2ecc71;
                        border-radius: 10px;
                        text-decoration: none;
            }
                    </style>
            </head>

            <body onload="recalculateCart()">

                <form method="post" action="">
                    <div class="shopping-cart" style="margin-top: 50px">
                        <div class="column-labels">
                            <label class="product-details">Service</label>
                            <label class="product-price">Price</label>
                            <label class="product-removal">Remove</label>
                            <label class="product-line-price">Total</label>
                        </div>

                        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="product">
                        
                        <div class="product-details">
                            <div class="product-title"><?php echo $row['servicetype_name']; ?></div>
                        </div>
                        <div class="product-price"><?php echo $row['serviceamount_price']; ?></div>
                        <div class="product-quantity">
                            <input type="hidden" name="sid[]" value="<?php echo $row['singleservice_id']; ?>" />
                            <input type="hidden" class="qty" value="1" />
                        </div>
                        <div class="product-removal">
                            <a href="RemoveService.php?id=<?php echo $row['singleservice_id']; ?>">Remove</a>
                        </div>
                        <div class="product-line-price"><?php echo $row['serviceamount_price']; ?></div>
                    </div>
                    <?php
                }
            } else {
                            echo "<p style='text-align:center;'>No booked services found.</p>";
            }
            ?>

                        <div class="totals">
                            <div class="totals-item totals-item-total">
                                <label>Grand Total</label>
                                <div class="totals-value" id="cart-total">0</div>
                                <input type="hidden" id="cart-totalamt" name="carttotalamt" value="" />
                            </div>
                        </div>

                        <?php if ($result->num_rows > 0) { ?>
                <button type="submit" class="checkout" name="btn_checkout">Checkout</button>
            <?php } ?>
                    </div>
                </form>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
            var fadeTime = 300;

                function recalculateCart() {
            var subtotal = 0;
                $(".product").each(function() {
                    subtotal += parseFloat($(this).children(".product-line-price").text());
            });

                var total = subtotal;

                $(".totals-value").fadeOut(fadeTime, function () {
                    $("#cart-total").html(total.toFixed(2));
                $("#cart-totalamt").val(total.toFixed(2));
                if (total == 0) {
                    $(".checkout").fadeOut(fadeTime);
                } else {
                    $(".checkout").fadeIn(fadeTime);
                }
                $(".totals-value").fadeIn(fadeTime);
            });
        }
</script>
</body>

</html>