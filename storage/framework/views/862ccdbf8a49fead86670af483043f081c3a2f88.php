<?php $__env->startSection('title'); ?>
    اضافة أفضل مراكز التجميل
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    الخدمات والمراكز المميزة
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    اضافة أفضل مراكز التجميل
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-12">
        <form action="<?php echo e(route('promotions.companies.store')); ?>" method="post">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> اختيار أفضل مراكز التجميل في الصفحة الرئيسية للموقع </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">
                            <div class="form-group">
                                <label for="promotionCompanies"> اسم المركز </label>
                                <select id="promotionCompanies" data-placeholder="-- يرجى كتابة اسم المركز --" name="promotionable_id" class="select" >
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($s->id); ?>"><?php echo e($s->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                             
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="promotionService"> مكان الخدمة  </label>
                                <select data-placeholder="-- اختر مكان المركز  --" name="priority" class="select">
                                    <option value="1"  > على اليمين  </option>
                                    <option value="2"  > فى المنتصف </option>
                                    <option value="3"  > على اليسار  </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="promotionService">  يبدا من  </label>
                                <input type="date" class="form-control"  name="start_at" required/>
                            </div>
                            <div class="form-group">
                                <label for="promotionService">  ينتهى فى   </label>
                                <input type="date" class="form-control"  name="end_at" required/>
                            </div>
                        </div>    
                    </fieldset>

                    <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary"> <?php echo e(trans('admin.save')); ?> <i class="icon-arrow-left13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>

        $(document).ready(function () {

            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

            $( "#promotionCompanies" ).select2({
                ajax: {
                    url: "<?php echo e(url('/')); ?>" + "/dashboard/promotions/companies/findByName",
                    dataType: 'json',
                    type: 'POST',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term,
                            _token: CSRF_TOKEN
                        };
                    },

                    processResults: function (data) {

                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                minimumInputLength: 1
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>