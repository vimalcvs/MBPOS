<?php $__env->startSection('title'); ?> Purchase Report <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<!-- Begin Page Content -->
	<div class="container-fluid settings-page">
		<div class="row">
			<div class="col-12">
				<div class="card mb-4 rounded-0">
					<!-- Card Header - Dropdown -->
					<div class="card-header p-0">
						<?php echo $__env->make('backend.report.purchase.partial.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</div>
					<!-- Card Body -->
					<div class="card-body p-0">
						<form action="<?php echo e(url('report/purchase/product-wise-filter')); ?>" method="get">
							<?php echo $__env->make('backend.report.purchase.product-wise.filter-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						</form>

						<div class="table-responsive margin-t-m5">
							<?php echo $__env->make('backend.report.purchase.product-wise.table-data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mbpos-1.3\resources\views/backend/report/purchase/product-wise/index.blade.php ENDPATH**/ ?>