
<?php $__env->startSection('title', $ds['ten']); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/vendors/photobox/photobox.css" />
<link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/vendors/photobox/photobox.ie.css" />
<style>
  .pbCaptionText .title {
    font-size: 20px !important;
    color: #ff0400 !important;
  }
  iframe { max-width:100% !important;}
  @media screen and (min-device-width: 481px) and (max-device-width: 768px) { 
    iframe { height: 300px !important;}
  }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
  <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-blog">
    <div class="container">
      <div class="title-wrapper">
        <div data-top="transform: translateY(0px);opacity:1;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title"><?php echo e($ds['ten']); ?></div>
        <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="padding-bottom-100" style="padding-top:30px;">
      <div class="row">
        <div class="page-main col-md-8">
          <div class="blog-wrapper swin-blog-single" style="border: 4px solid #dfdfdf; padding: 20px;font-size:18px;">
            <p><?php echo e($ds['mo_ta']); ?></p>
            <?php echo $ds['noi_dung']; ?>


            <?php if(isset($ds['attachments'][0]['aliasname']) && strtolower($ds['attachments'][0]['type']) == 'pdf'): ?>
              <div>
                <div id="pdf-container" style="width:100% !important;"></div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>               
                <script>
                  const url = '<?php echo e(env('APP_URL')); ?>storage/files/<?php echo e($ds['attachments'][0]['aliasname']); ?>'; // đường dẫn đến file PDF
                  const container = document.getElementById('pdf-container');
                  pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
                  pdfjsLib.getDocument(url).promise.then(pdf => {
                      const totalPages = pdf.numPages;

                      for (let pageNumber = 1; pageNumber <= totalPages; pageNumber++) {
                      pdf.getPage(pageNumber).then(page => {
                          const scale = 1.2;
                          const viewport = page.getViewport({ scale });

                          const canvas = document.createElement('canvas');
                          const context = canvas.getContext('2d');
                          canvas.height = viewport.height;
                          canvas.width = viewport.width;

                          container.appendChild(canvas);

                          const renderContext = {
                          canvasContext: context,
                          viewport: viewport
                          };
                          page.render(renderContext);
                      });
                      }
                  });
                </script>
            </div>
            <?php endif; ?>
            <!-- gallery-->
            <?php if($ds['photos']): ?>
            <div class="swin-widget widget-gallery carousel">
              <div class="title-widget">Hình ảnh</div>
              <div class="widget-body widget-content clearfix">
                <div class="main-slider" id="gallery">
                  <?php $__currentLoopData = $ds['photos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item-slide">
                      <a href="<?php echo e(env('APP_URL')); ?>storage/images/origin/<?php echo e($photo['aliasname']); ?>" title="<?php echo e($photo['title']); ?>">
                        <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_360x200/<?php echo e($photo['aliasname']); ?>" alt="<?php echo e($photo['title']); ?>" title="<?php echo e($photo['title']); ?>" class="img-responsive showcase">
                      </a>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="page-sidebar col-md-4">
          <!-- recent post-->
          <?php if($danhsach): ?>
          <div class="swin-widget widget-recent-post">
            <div class="title-widget">Bài liên quan</div>
            <div class="widget-body widget-content clearfix">
              <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="swin-media">
                <div class="content-right">
                    <a href="<?php echo e(env('APP_URL')); ?>chi-tiet-tai-lieu/<?php echo e($d['slug']); ?>"  alt="<?php echo e($d['ten']); ?>" title="<?php echo e($d['ten']); ?>" class="swin-btn center form-submit btn-transparent" style="background:#ffff00;width:100%;"><?php echo e(Str::limit($d['ten'],80)); ?></a>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
  <script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/frontend/vendors/photobox/jquery.photobox.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function(){
      $("#gallery").photobox('a',{ time:0 });
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\GDCTPL\resources\views/Frontend/chi-tiet-tai-lieu.blade.php ENDPATH**/ ?>