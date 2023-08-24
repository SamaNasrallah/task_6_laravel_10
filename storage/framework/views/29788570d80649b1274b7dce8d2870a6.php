<form action="<?php echo e(route('student.store')); ?>" method="post" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(__('Create New User')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                    
                </div>
                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong><?php echo e(__('Name')); ?>:</strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong><?php echo e(__('Email')); ?>:</strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong><?php echo e(__('Password')); ?>:</strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong><?php echo e(__('Confirm Password')); ?>:</strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong><?php echo e(__('Role')); ?>:</strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal"><?php echo e(__('Back')); ?></button>
                        <button type="submit" class="btn btn-success"><?php echo e(__('Save')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form><?php /**PATH C:\Users\MI\Desktop\laravel\task3\resources\views/student/details.blade.php ENDPATH**/ ?>