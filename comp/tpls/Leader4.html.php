<?php if(!defined('WEB_ROOT')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EDGE">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>金币市场专业委员会</title>
<link href="style/main.css" rel="stylesheet" type="text/css" />
<link href="style/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="script/jquery-1.7.1.min.js"></script>
<script language="javascript" type="text/javascript" src="script/easing.js"></script>
<script language="javascript" type="text/javascript" src="script/js.js"></script>
<script language="javascript" type="text/javascript" src="script/fun.js"></script>
<script language="javascript" type="text/javascript" src="script/form.js"></script>
<script language="javascript" type="text/javascript" src="script/jquery.SuperSlide.2.1.1.js"></script>
<!--[if lte IE 6]>
<script src="script/png.js" type="text/javascript"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('div, ul, img, li, input , a');
    </script>
<![endif]--> 
</head>

<body>
<div class="headDiv">
<?php MFInclude::regincludepage('./','index_head.html'); ?>
</div>
<div class="sNav sNav_01">
  <?php MFInclude::regincludepage('./','about_left.html'); ?>
</div>

<div class="wal">
<!--wal-->
<div class="fl sideNav">
      <div class="title">关于我们</div>
      <div class="list">
         <?php MFInclude::regincludepage('./','about_left.html'); ?>
      </div>
</div>
<div class="fr w725">
     <div class="pageNow"><a href="<?php echo WEB_APP; ?>app.html">首页</a> > <a href="<?php echo WEB_APP; ?>about.html">关于我们</a> > <span>领导简介</span></div>
     <!--内容-->
     <div class="pageTab">
        <ul>
          <li><a href="<?php echo WEB_APP; ?>Leader.html">主任委员</a></li>
          <li><a href="<?php echo WEB_APP; ?>Leader3.html">副主任委员</a></li>
          <li><a href="<?php echo WEB_APP; ?>Leader2.html">委员</a></li>
          <li class="liNow"><a href="<?php echo WEB_APP; ?>Leader4.html">秘书长</a></li>
        </ul>
        <span class="clear_f"></span>
     </div>
     <div class="leader2">
          <ul>
            <li>吉林省集币有限责任公司总经理  许俊奇</li>
            <li>裕隆控股集团有限公司执行总裁  俞吉伟</li>
            <li>上海申泉工贸有限公司总经理  袁宏展</li>
            <li>沈阳泉银实业总公司总经理  刘安强</li>
            <li>常州金店有限公司董事长  李慧君</li>
            <li>内蒙古金币文化有限公司总经理  王维平</li>
            <li>湖南湘中汇金币经销有限公司董事长  彭小思</li>
            <li>吉林省集币有限责任公司总经理  许俊奇</li>
            <li>裕隆控股集团有限公司执行总裁  俞吉伟</li>
            <li>上海申泉工贸有限公司总经理  袁宏展</li>
            <li>沈阳泉银实业总公司总经理  刘安强</li>
            <li>常州金店有限公司董事长  李慧君</li>
            <li>内蒙古金币文化有限公司总经理  王维平</li>
            <li>湖南湘中汇金币经销有限公司董事长  彭小思</li>
          </ul>
          <div class="h10"></div>
     </div>
     <!--内容End-->
</div>
<div class="h50"></div>
<!--walEnd-->
</div>

<?php MFInclude::regincludepage('./','index_foot.html'); ?>
</body>
</html>
