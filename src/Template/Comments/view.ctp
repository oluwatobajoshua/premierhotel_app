<section class="content-header">
  <h1>
    Comment
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Body') ?></dt>
            <dd><?= h($comment->body) ?></dd>
            <dt scope="row"><?= __('Operation') ?></dt>
            <dd><?= $comment->has('operation') ? $this->Html->link($comment->operation->name, ['controller' => 'Operations', 'action' => 'view', $comment->operation->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($comment->id) ?></dd>
            <dt scope="row"><?= __('Comment From') ?></dt>
            <dd><?= $this->Number->format($comment->comment_from) ?></dd>
            <dt scope="row"><?= __('Comment To') ?></dt>
            <dd><?= $this->Number->format($comment->comment_to) ?></dd>
            <dt scope="row"><?= __('Comment Reply To') ?></dt>
            <dd><?= $this->Number->format($comment->comment_reply_to) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($comment->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($comment->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
