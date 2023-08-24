
<?php $__env->startSection('MainContent'); ?>

<?php
use App\Models\Student;
$students = Student::all();

?>

<div class="row form-container">
    <div class="col-md-3" >
        
        <?php if($errors->any()): ?>
        <div class="alert alert-warning" style="height: 50px ; width: 400px; margin-left: 50px; margin-top: -100px">
        <ul style='list-style:none;'>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul></div><br />
        <?php endif; ?>

        <form action="<?php echo e(route('student.update',$student->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>  
            <div class="form-group">
                <label for="name_arabic">Name Arabic</label>
                <input type="text" name="name_arabic" value="<?php echo e($student->name_arabic); ?>"  id="name_arabic" class="form-control" style="width:300px; height: 40px;">
            </div>
            <div class="form-group">
              <label for="name_english">Name English</label>
              <input type="text" name="name_english" value="<?php echo e($student->name_english); ?>" id="name_english" class="form-control" style="width:300px; height: 40px;">
          </div>
            <div class="form-group">
                <label for="birth_date">Birth Date</label>
                <input type="date" name="birth_date"  max="<?php echo e(date('2017-12-31')); ?>" value="<?php echo e($student->birth_date); ?>" id="birth_date" class="form-control" style="width: 300px; height: 40px;">
            </div>

            <div class="form-group">
                <label for="educational_stage">Educational Stage</label>
                <select name="educational_stage" id="educational_stage" class="form-control" style="width: 300px; height: 40px;">
                    <option value="Primary" <?php if(old('educational_stage', $student->educational_stage) === 'Primary'): ?> selected <?php endif; ?>>Primary</option>
                    <option value="Middle" <?php if(old('educational_stage', $student->educational_stage) === 'Middle'): ?> selected <?php endif; ?>>Middle</option>
                    <option value="High School" <?php if(old('educational_stage', $student->educational_stage) === 'High School'): ?> selected <?php endif; ?>>High School</option>
                    <option value="University" <?php if(old('educational_stage', $student->educational_stage) === 'University'): ?> selected <?php endif; ?>>University</option>
                </select>
            </div>
            <div class="form-group" id="major-field" <?php if(old('educational_stage', $student->educational_stage) !== 'University'): ?> style="display: none;" <?php endif; ?>>
                <label for="major">Major</label>
                <input type="text" name="major" id="major" value="<?php echo e(old('major', $student->major)); ?>" class="form-control" style="width: 300px; height: 40px;">
            </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo e($student->email); ?>"  style="width:300px; height: 40px;">
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" name="phone" id="phone" class="form-control"value="<?php echo e($student->phone); ?>" style="width:300px; height: 40px;">
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" class="form-control" value="<?php echo e($student->address); ?>" style="width:300px; height: 40px;">
    </div>

            <div class="form-group">
                <label for="details">Details</label>
                <input type="text" name="details" id="details" class="form-control" value="<?php echo e($student->details); ?>" style="width:300px; height: 40px;">

                
            </div>

            <button type="submit" class="btn btn-primary" id="btn-update">Save</button>
        </form>
    </div>
<script>
    $(document).ready(function() {
        $("#btn-update").click(function() {
            alert("Update Student successfully");
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

<script>
    document.getElementById('educational_stage').addEventListener('change', function() {
        const majorField = document.getElementById('major-field');
        if (this.value === 'University') {
            majorField.style.display = 'block';
        } else {
            majorField.style.display = 'none';
        }
    });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MI\Desktop\laravel\task3\resources\views/student/editSt.blade.php ENDPATH**/ ?>