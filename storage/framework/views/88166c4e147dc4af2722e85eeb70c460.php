
<?php $__env->startSection('MainContent'); ?>

<?php
use App\Models\Category;
$categorys = Category::all();

?>

<div class="row form-container" style="margin-top:-30px ">
    <div class="col-md-3" >
        <form action="<?php echo e(route('course.update',$course->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>    

            <div class="form-group">
                <label for="course_title">Course Title</label>
                <input type="text" name="course_title"   id="course_title" value="<?php echo e($course->course_title); ?>"   class="form-control" style="width:300px; height: 40px;">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category"value="<?php echo e($course->category->name); ?>" class="form-control" style="width:300px;">
                    <option value="">Select Category</option>
                    <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php if($course->category_id == $category->id): ?> selected <?php endif; ?>>
                        <?php echo e($category->name); ?>

                    </option>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" value="<?php echo e($course->start_date); ?>" id="start_date" class="form-control" style="width: 300px; height: 40px;">
            </div>
            <div class="form-group">
                <label for="teacher">Teacher</label>
                <select name="teacher" id=""value="<?php echo e($course->teacher); ?>"  class="custom-select mb-3" style="width: 300px;">
                    <option>Amna</option>
                    <option>Nada</option>
                    <option>Alaa</option>
                    <option>Deema</option>
                </select>
            </div>
            <div class="form-group">
                <label for="hours">Hours</label>
                <input type="number" name="hours"value="<?php echo e($course->hours); ?>"  id="hours" class="form-control"style="width: 300px;" >
            </div>
            <div class="form-group">
                <label for="max_students">Max Student</label>
                <input type="number" name="max_students"value="<?php echo e($course->max_students); ?>" id="max_students" class="form-control"style="width: 300px;" >
            </div>
        </div>  
       

        <div class="col-md-3">
            <div class="form-group">
                <div class="form-group">
                    <label for="course_price">course_price</label>
                    <input type="number" name="course_price"value="<?php echo e($course->course_price); ?>" id="course_price" class="form-control"style="width: 300px;" >
                </div>
                <label for="details">Details</label>
                <textarea name="details" id="editor"class="form-control" style="width:400px; height: 60px;"><?php echo e($course->details); ?></textarea>
            </div>
         
            <button type="submit" class="btn btn-primary" id="btn-updatee">Save</button>
        </form>
        <script>
            $(document).ready(function() {
               $("#btn-updatee").click(function() {
                  alert("Update Course successfully");
              });
            });
         </script>
    </div>


</div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
 tinymce.init({
  selector: 'textarea#editor'
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MI\Desktop\laravel\task3\resources\views/admin/edit.blade.php ENDPATH**/ ?>