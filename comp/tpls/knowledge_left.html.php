<?php if(!defined('WEB_ROOT')) exit();?>

<ul>
	<li><a href="<?php echo WEB_APP; ?>knowledge.html" <?php if($_GET['PARENT_TPL_FILE']=="knowledge.html" || $_GET['PARENT_TPL_FILE']=="knowledgeShow.html" ){ ?>  class="aNow" <?php } ?> >金币知识</a></li>
	<li><a href="<?php echo WEB_APP; ?>project.html" <?php if($_GET['PARENT_TPL_FILE']=="project.html" ){ ?>  class="aNow" <?php } ?> >项目介绍</a></li>
	<li><a href="<?php echo WEB_APP; ?>classroom.html" <?php if($_GET['PARENT_TPL_FILE']=="classroom.html" ){ ?>  class="aNow" <?php } ?> >金币课堂</a></li>
	<li><a href="<?php echo WEB_APP; ?>research.html" <?php if($_GET['PARENT_TPL_FILE']=="research.html" ){ ?>  class="aNow" <?php } ?> >理论研究</a></li>
</ul>