
<?php $__env->startSection('MainContent'); ?>

<div class="row form-container">
    <div class="col-md-3" >
        <form action="<?php echo e(route('category.update',$category->id)); ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <?php echo method_field('PUT'); ?>    
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="name" id="name" value="<?php echo e($category->name); ?>" class="form-control"  style="width: 400px; height: 40px;">
            </div>
            <button type="submit" class="btn btn-primary" id="btn-primary">Save</button>
        </form>
        <script>
            $(document).ready(function() {
               $("#btn-primary").click(function() {
                  alert("Update Category successfully");
              });
            });
         </script>
    </div>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MI\Desktop\laravel\task3\resources\views/admin/editCat.blade.php ENDPATH**/ ?>