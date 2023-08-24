
<?php $__env->startSection('MainContent'); ?>

<?php
use App\Models\Category;
$categorys = Category::all();

?>
<div class="row form-container">
    <div class="row form-container">
        <div class="col-md-3" >
            <form   id="categoryForm" action="<?php echo e(route('category.store')); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <input type="hidden" name="_method" id="method" value="POST">
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" name="name" id="name" class="form-control" style="width: 400px; height: 40px;">
                </div>
                <button type="submit" class="btn btn-primary" id="btn-primary" >Save</button>

            </form>
  
        </div>
        <div class="col-md-3" >
            <table class="table table-success table-striped" style="width: 400px">
                <thead>
                    <tr style="text-align: center;">
                        <th>ID</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($category->id); ?></td>
                        <td><?php echo e($category->name); ?></td>
                        <td>
                            <a class="btn btn-primary edit-category" data-id="<?php echo e($category->id); ?>" data-name="<?php echo e($category->name); ?>">
                                Edit
                            </a>

                        </td>
                        <td>
                            <form action="<?php echo e(route('category.destroy', $category->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-delete">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script>
          $(document).ready(function() {
            $(".edit-category").click(function() {
            var categoryName = $(this).data("name");
            var categoryId = $(this).data("id");

            $("#categoryForm").attr("action", "<?php echo e(route('category.update', '')); ?>/" + categoryId);
            $("#method").val("PUT");

            $("#name").val(categoryName);

        });

        $(".btn-delete").click(function() {
            alert("Delete successfully");
        });

        $("#btn-primary").click(function() {
            alert("Added/Updated Category successfully");
        });
    });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MI\Desktop\laravel\task3\resources\views/admin/createCat.blade.php ENDPATH**/ ?>