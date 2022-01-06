                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">Your business dashboard template</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Components</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="card">
                <div class="card-body">
                <form action="input_nilai.php" method="post">
	
				
								<th>test1</th>
                             <br>
	<input type="radio" name="q1" value="5" required <?php if($q1==5) echo "checked"; ?>>Sangat Baik<br/>
	<input type="radio" name="q1" value="4" required <?php if($q1==4) echo "checked"; ?>>Baik<br/>
	<input type="radio" name="q1" value="3" required <?php if($q1==3) echo "checked"; ?>>Cukup<br/>
	<input type="radio" name="q1" value="2" required <?php if($q1==2) echo "checked"; ?>>Kurang<br/>
	<input type="radio" name="q1" value="1" required <?php if($q1==1) echo "checked"; ?>>Sangat Kurang<br/>
								
	<br>
    <th>test1</th>
    <br>
	<input type="radio" name="q2" value="5" required <?php if($q2==5) echo "checked"; ?>>Sangat Baik<br/>
	<input type="radio" name="q2" value="4" required <?php if($q2==4) echo "checked"; ?>>Baik<br/>
	<input type="radio" name="q2" value="3" required <?php if($q2==3) echo "checked"; ?>>Cukup<br/>
	<input type="radio" name="q2" value="2" required <?php if($q2==2) echo "checked"; ?>>Kurang<br/>
	<input type="radio" name="q2" value="1" required <?php if($q2==1) echo "checked"; ?>>Sangat Kurang<br/>
	<!-- <div class="input-group">
									<textarea class="form-control" name="q2ket" placeholder="Tambah Keterangan..."><?php echo $q2ket ; ?></textarea>
								</div> -->
	
	<br><input type="submit" name="enter" value="Enter" class="btn btn-success">  
</form>
</div>
</div>