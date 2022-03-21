<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add New Category</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="category_add.php">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" control-id="ControlID-4"></button>
            </div>
            <div class="modal-body m-3">
                <form class="form-horizontal" method="POST" action="department-edit.php">
                    <input type="hidden" class="dept_id" name="id">
                    <div class="form-group">
                        <label for="edit_name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="edit_name" name="name">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" control-id="ControlID-42">Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" control-id="ControlID-4"></button>
            </div>
            <div class="modal-body m-3">
                <form class="form-horizontal" method="POST" action="department-delete.php">
                    <input type="hidden" class="dept_id" name="id">
                    <div class="text-center">
                        <p>DELETE DEPARTMENT</p>
                        <h2 class="bold catname"></h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" control-id="ControlID-42">Close</button>
                <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-check-square-o"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>