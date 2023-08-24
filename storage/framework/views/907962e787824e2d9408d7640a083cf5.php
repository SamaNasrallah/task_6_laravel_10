
<?php $__env->startSection('MainContent'); ?>

<?php
use App\Models\Student;
$students = Student::all();

?>

<div class="row form-container">
    <div class="col-md-3" >
        <form action="<?php echo e(route('course-students.update',  $courseStudent->id)); ?>" method="POST">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="student">Name Student</label>
                <select name="student_id" id="student" class="form-control" disabled style="width:300px;">
                    <option value="">Select student</option>
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($student->is_active): ?>
                            <option value="<?php echo e($student->id); ?>" <?php echo e($courseStudent->student_id == $student->id ? 'selected' : ''); ?>>
                                <?php echo e($student->name_english); ?>

                            </option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

            </div>
            <div class="form-group">
                <label for="amount_paid">amount_paid</label>
                <input type="number" name="amount_paid"  value="<?php echo e($courseStudent->amount_paid); ?>"  id="amount_paid" class="form-control" disabled style="width: 300px;" >
            </div>
       
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date"value="<?php echo e($courseStudent->start_date); ?>"  min="<?php echo e($courseStudent->course->start_date); ?>" class="form-control" style="width: 300px; height: 40px;">
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date" value="<?php echo e($courseStudent->end_date); ?>" min="<?php echo e($courseStudent->course->start_date); ?>"   class="form-control" style="width: 300px; height: 40px;">
            </div>
      
            <button type="submit" class="btn btn-primary" id="btn-primary">Save</button>
        </form>
    </div>
<script>
    $(document).ready(function() {
        $("#btn-primary").click(function() {

            var start_date = new Date($("#start_date").val());
            var end_date = new Date($("#end_date").val());

            if (end_date <= start_date) {
                alert("End date should be greater than start date.");
                event.preventDefault();  
            }else if (start_date && end_date  ) {
                alert("Register Update successfully");
             } else {
            alert("Please fill in all the required fields.");
        }
           
            

        });
    });
</script>
</div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
 tinymce.init({
  selector: 'textarea#editor'
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MI\Desktop\laravel\task3\resources\views/admin/editCorStd.blade.php ENDPATH**/ ?>