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
<div class="sNav sNav_05">
<?php MFInclude::regincludepage('./','knowledge_left.html'); ?>
</div>

<div class="wal">
<!--wal-->
<div class="fl sideNav">
      <div class="title">培训学院</div>
      <div class="list">
         <?php MFInclude::regincludepage('./','knowledge_left.html'); ?>
      </div>
</div>
<div class="fr w725">
     <div class="pageNow"><a href="">首页</a> > <a href="">培训学院</a> > <span>项目介绍</span></div>
     <!--内容-->
     <div class="news4">
        <ul>
          <?php $_plist = TagAttrLoop::emspagelist('cn_knowledge',' id desc','4','__typeid=245','page','','',''); $_from = $_plist['all']; Template::$_tplval['page'] = $_plist['page']; Template::$_tplval['pagejson'] = json_encode($_plist['page']); if (!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }if (count($_from)){foreach($_from as $key=>Template::$_tplval['list']){ ?>
          <li>
              <div class="name"><a href="<?php echo Template::$_tplval['list']['link']; ?>" target="blank"><?php echo Template::$_tplval['list']['title']; ?></a></div>
              <div class="content">
             <!--  这里不显示content,如需显示，需要设置后台的数据表 -->
              </div>
              <div class="time"><?php echo Template::$_tplval['list']['pubdate']; ?></div>
              <a href="" class="more blue">查看详情 >></a>
          </li>
          <?php }} unset($_from);?>
        </ul>
     </div>
     <div class="pageNum">
     <a href="" class="prev"><em>上一页</em></a><a href="" class="aNow">1</a><a href="">2</a><a href="">3</a><a href="">4</a><a href="">5</a><a href="" class="next"><em>下一页</em></a>
     <span>共65页　向第</span>
     <input type="text" class="input1" />
     <span>页</span>
     <input type="button" class="btn1" value="跳转" />
     </div>
     <!--内容End-->
</div>
<div class="h50"></div>
<!--walEnd-->
</div>

<?php MFInclude::regincludepage('./','index_foot.html'); ?>
</body>
</html>
