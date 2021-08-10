<html>

<head>
    <title>Server Running Data</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Server Running Data</div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="no_server">Number Of Server</label><span style="color:red;">*</span>
                                    <input type="number" class="form-control" id="no_server" required name="no_server">
                                </div>
                            </div>
                            <div class="row">
                                <legend class="pl-3">Server Load:</legend>
                                <div class="form-group col-md-6">
                                    <label for="1st_minute">1st Minute</label><span style="color:red;">*</span>
                                    <input type="number" class="form-control" id="1st_minute" required name="1st_minute">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="2nd_minute">2nd Minute</label><span style="color:red;">*</span>
                                    <input type="number" class="form-control" id="2nd_minute" required name="2nd_minute">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="3rd_minute">3rd Minute</label><span style="color:red;">*</span>
                                    <input type="number" class="form-control" id="3rd_minute" required name="3rd_minute">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="4th_minute">4th Minute</label><span style="color:red;">*</span>
                                    <input type="number" class="form-control" id="4th_minute" required name="4th_minute">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="5th_minute">5th Minute</label><span style="color:red;">*</span>
                                    <input type="number" class="form-control" id="5th_minute" required name="5th_minute">
                                </div>
                            </div>
                            <button type="submit" name="submit_button" class="btn btn-primary float-right">Calculate Running Server</button>
                        </form>
                    </div>
                        <?php if(isset($_POST['submit_button'])){ ?>
                            <div class="card-footer text-muted">
                            <?php
                            $no_server = $_POST['no_server'];

                            $server_load    =   array($_POST['1st_minute'],$_POST['2nd_minute'],$_POST['3rd_minute'],$_POST['4th_minute'],$_POST['5th_minute']);
                            foreach($server_load as $value){
                                if($value < 50){
                                    $total_no_server = $no_server/2;
                                }else{
                                    $total_no_server = 2*$no_server+1;
                                }
                            }
                            
                            echo "Output : After 5 minutes,".  intval($total_no_server). " server is running"; ?>
                            </div>
                        <?php } ?> 
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>

</html>