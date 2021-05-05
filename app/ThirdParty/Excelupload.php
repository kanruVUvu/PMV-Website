<section role="main" class="content-body">
    <header class="page-header">
        <h2>Add Meeting</h2>
    </header>
    <div class="row">                        
        <div class="col-md-12">
        <h2>Import Excel File into MySQL Database using PHP</h2>    
            <div class="outer-container">
                <form action="<?php echo base_url('upload_excel') ?>" method="post" enctype="multipart/form-data">                                      
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Choose Excel File</label>
                            <input type="file" name="file" id="file" /><br>

                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-warning" value="Upload" />
                        </div>
                        </div>
                    </div>
                
                </form>                            
            </div>                            
        </div>
        <!-- col-md-6 -->						
    </div>
</section>