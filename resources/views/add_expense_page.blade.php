<h1>Add Expense</h1>
<form id="add_fraud">
    <div class="row col-sm-12">

        <div class="col-sm-12 form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" maxlength="25000" rows="8"></textarea>
        </div>
        <div class="col-sm-4 form-group">
            <label>Time</label>
            <input type="text" class="form-control" name="date_time" value="<?php echo date('Y-m-d H:i:s');?>" maxlength="50" />
        </div>
        <div class="col-sm-4 form-group">
            <label>Amount</label>
            <input type="text" class="form-control" value="" name="amount" maxlength="14" onkeypress="return isNumberKey(event,this)" />
        </div>
        
        <div class="col-sm-12 form-group">
            <button class="btn btn-success">Submit</button>
        </div>

    </div>
</form>