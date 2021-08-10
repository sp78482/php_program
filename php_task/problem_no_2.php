<html>
<head>
    <title>Restaurant</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Restaurant</div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="breads">Breads</label><span style="color:red;">*</span>
                                    <input type="number" class="form-control" id="breads" required name="breads">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="vada">Vada</label><span style="color:red;">*</span>
                                    <input type="number" class="form-control" id="vada" required name="vada">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="samosa">Samosa</label><span style="color:red;">*</span>
                                    <input type="number" class="form-control" id="samosa" required name="samosa">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="vadapav_price">Vadapav Price</label><span style="color:red;">*</span>
                                    <input type="number" class="form-control" id="vadapav_price" required
                                        name="vadapav_price">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="samosapav_price">Samosapav Price</label><span style="color:red;">*</span>
                                    <input type="number" class="form-control" id="samosapav_price" required
                                        name="samosapav_price">
                                </div>
                            </div>
                            <button type="submit" name="submit_button" class="btn btn-primary float-right">Calculate Max Profit</button>
                        </form>
                    </div>
                    <?php if(isset($_POST['submit_button'])){ ?>
                    <div class="card-footer text-muted">
                        <?php
                            $vadapav_price = $_POST['vadapav_price'];
                            $samosapav_price = $_POST['samosapav_price'];
                            $total_item = intval($_POST['breads'] / 2); /////   Get Total Order Item.

                            if($vadapav_price > $samosapav_price){  /////   Check Highest Price.
                                $price = $vadapav_price;
                                $total_vada = $_POST['vada'];
                                if($total_item >= $total_vada){ /////   Check Total Order Item Count is greater than total Vada.
                                    $total_vada_price = $vadapav_price * $total_vada;
                                    $remaining_item = $total_item - $total_vada;
                                    if($remaining_item > 0){
                                        $total_samosa_price = $samosapav_price * $remaining_item;
                                    }else{
                                        $total_samosa_price = 0;
                                    }
                                    $total_price = $total_vada_price + $total_samosa_price;
                                }else{
                                    $total_price = $vadapav_price * $total_item;
                                }
                            }else{
                                $price = $samosapav_price;
                                $total_samosa = $_POST['samosa'];
                                if($total_item >= $total_samosa){ /////   Check Total Order Item Count is greater than total Samosa.
                                    $total_samosa_price = $samosapav_price * $total_samosa;
                                    $remaining_item = $total_item - $total_samosa;
                                    if($remaining_item > 0){
                                        $total_vadapav_price = $vadapav_price * $remaining_item;
                                    }else{
                                        $total_vadapav_price = 0;
                                    }
                                    $total_price = $total_samosa_price + $total_vadapav_price;
                                }else{
                                    $total_price = $samosapav_price * $total_item;
                                }
                            }
                            echo "Maximum profit possible is Rs ".$total_price;
                        ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>