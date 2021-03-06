<?php if(!defined('WEB_ROOT')) exit();?><style type="text/css">
.mx-list-form { display:block; width:40px; float:left; background:url(images/form.png) no-repeat center left; text-indent:16px; margin:0 5px; }
.mx-list-config { display:block; width:40px; float:left; background:url(images/livconfig.png) no-repeat center left; text-indent:16px; margin:0 5px; }
.mx-list-cptags { display:block; width:40px; float:left; background:url(images/cptags.png) no-repeat center left; text-indent:16px; margin:0 5px; }
</style>
<table id="Livs-grid">
  <thead>
	<tr>
		<th width="20"><input type="checkbox" name="allselect" class="gridcheck"/></th>
		<th width="30">ID</th>
		<th width="40">类型</th>
		<th width="80">分类</th>
		<th width="100">实例中文名称</th>
		<th width="80">实例名称</th>
		<th width="60">用户自定义</th>
		<th width="60">信息审核</th>
		<th width="60">配置</th>
		<th width="160">操作</th>
	</tr>
</thead>
   <tbody>
		<?php if(!isset(Action::$classqueue['Livs'])){ require_once(file_exists("do/LivsAct.class.php")?"do/LivsAct.class.php":"~do/LivsAct.class.php"); Action::$mpath=''; Action::$classqueue['Livs'] = new LivsAct(); } $_from = Action::$classqueue['Livs']->getlivs(); if (!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }if (count($_from)){foreach($_from as $key=>Template::$_tplval['list']){ ?>
		<tr>
			<td><input type="checkbox" name="checks" value="<?php echo Template::$_tplval['list']['id']; ?>" class="gridcheck" /></td>
			<td><?php echo Template::$_tplval['list']['id']; ?></td>
			<td dbnum="<?php echo Template::$_tplval['list']['iscrtdb']; ?>"><?php echo Template::$_tplval['list']['appname']; ?></td>
			<td dbnum="<?php echo Template::$_tplval['list']['iscrtdb']; ?>"><?php echo Template::$_tplval['list']['gname']; ?>(<?php echo Template::$_tplval['list']['gdir']; ?>)</td>
			<td dbnum="<?php echo Template::$_tplval['list']['iscrtdb']; ?>"><?php echo Template::$_tplval['list']['livname']; ?></td>
			<td dbnum="<?php echo Template::$_tplval['list']['iscrtdb']; ?>"><?php echo Template::$_tplval['list']['proname']; ?><input id="sys_menu_api_<?php echo Template::$_tplval['list']['id']; ?>" name="apiurl" value="<?php echo Template::$_tplval['list']['apiurl']; ?>" style="display:none;" /></td>
			<td><a href="javascript:;" hotagid="<?php echo Template::$_tplval['list']['id']; ?>" val="<?php echo Template::$_tplval['list']['uaddedit']; ?>" style="text-decoration:underline;"></a></td>
			<td><?php echo Template::$_tplval['list']['syngrade']; ?></td>
			<td><?php  if(Template::$_tplval['list']['dir']!='form'){  ?><a href="javascript:;" brurl="sys/livs/?livconfig/id/<?php echo Template::$_tplval['list']['id']; ?>.html" class="mx-list-config">配置</a><?php  }  ?></td>
			<td>
			<a href="javascript:;" brurl="sys/fields/?app/id/<?php echo Template::$_tplval['list']['id']; ?>.html" class="mx-list-form">表单</a>
			<a href="javascript:;" brurl="sys/livs/?edit/id/<?php echo Template::$_tplval['list']['id']; ?>.html" class="mx-list-edit">修改</a>
			<a href="javascript:;" class="mx-list-remove" delid="<?php echo Template::$_tplval['list']['id']; ?>" delname="<?php echo Template::$_tplval['list']['livname']; ?>" delurl="sys/livs/do/?Livs-del" backurl="sys/livs/?app.html">删除</a>
			</td>
		</tr>
		<?php }} unset($_from);?>
</tbody>
</table>
<script type="text/javascript">
$(function(){
	$('#Livs-grid').flexigrid({
		title:'<span class="mx-sysmenu"></span>',
		height:'auto',
		showToggleBtn:false,
		resizable:false,
		defcheckbox:true,
		buttons:[
			{
				name:'新增实例',
				bclass:'mx-add',
				onpress:function(){
					tabtreecontent("sys/livs/?add.html");
				}
			},
			{
				separator: true
			},
			{
				name:'添加为模型',
				bclass:'mx-add',
				onpress:function(){
					var ids = [];
					$("#Livs-grid input[name='checks']").each(function(i,o){
						if($(o).attr("checked")) ids.push($(o).val());
					});
					var idstr = ids.join(",");
					if(idstr==""){
						Tip({title:"提示",content:"请选择需要添加为模型的列表项!"});
					}else{
						var url = "sys/livs/?addapps/appids/"+idstr+".html";
						tabtreecontent(url);
						$.mx.setparam('url',url);
					}
				}
			},
			{
				separator: true
			},
			{
				name:'更新数据表',
				bclass:'mx-edit',
				onpress:function(){
					var ids = [];
					$("#Livs-grid input[name='checks']").each(function(i,o){
						if($(o).attr("checked")) ids.push($(o).val());
					});
					var idstr = ids.join(",");
					if(idstr==""){
						Tip({title:"提示",content:"请选择需要更新数据表的列表项!"});
					}else{
						$.get("sys/fields/do/?Fields-createdbtmore/ids/"+idstr+".html",function(){
							Tip({title:'更新数据表提示:',content:'更新数据表成功!'});
							tabtreecontent("sys/livs/?app.html");
						});
					}
				}
			},
			{
				separator: true
			},
			{
				name:'获取API接口',
				bclass:'mx-edit',
				onpress:function(){
					var ids = [];
					$("#Livs-grid input[name='checks']").each(function(i,o){
						if($(o).attr("checked")) ids.push($(o).val());
					});
					if(ids.length>1){
						Tip({title:"提示",content:"一次只能获取一个API接口!"});
						return;
					}
					if(ids.length<1){
						Tip({title:"提示",content:"请选择需要获取API接口的列表项!"});
						return;
					}
					var apiurl = $("#sys_menu_api_"+ids[0]).val();
					dialog({
						title:'提示',
						content:'<textarea class="copyapiurl" style="height:50px;width:270px;">'+apiurl+'</textarea>',
						resizable:false,
						bgiframe:false,
						buttons:{
							'关闭': function() {
								$(this).dialog('destroy');
							}
						}
					});
					//点击连接复制
					$('textarea[class="copyapiurl"]').dblclick(function(){
						$(this).select();
						if($.browser.msie){
							window.clipboardData.setData('text', $(this).text());
						}else{
							Tip({title:"复制提示",content:'您的浏览器不支持剪贴板操作,请点击右键或Ctrl+C进行复制!'});
						}
					});
				}
			},
			{
				separator: true
			},
			{
				name:'缓存文件',
				bclass:'mx-edit',
				onpress:function(){
					var ids = [];
					$("#Livs-grid input[name='checks']").each(function(i,o){
						if($(o).attr("checked")) ids.push($(o).val());
					});
					if(ids.length<1){
						Tip({title:"提示",content:"请选择列表项!"});
						return;
					}
					if(ids.length>1){
						Tip({title:"提示",content:"一次只能选择一个列表项!"});
						return;
					}
					tabtreecontent("sys/livs/?calist/fid/"+ids[0]+".html");
				}
			},
			{
				separator: true
			},
			{
				name:'导出设置',
				bclass:'mx-edit',
				onpress:function(){
					var ids = [];
					$("#Livs-grid input[name='checks']").each(function(i,o){
						if($(o).attr("checked")) ids.push($(o).val());
					});
					if(ids.length<1){
						Tip({title:"提示",content:"请选择列表项!"});
						return;
					}
					if(ids.length>1){
						Tip({title:"提示",content:"一次只能选择一个列表项!"});
						return;
					}
					tabtreecontent("sys/livs/?outputlist/fid/"+ids[0]+".html");
				}
			},
			{
				separator: true
			},
			{
				name:'删除',
				bclass:'mx-delete',
				onpress:function(){
					var ids = [];
					$("#Livs-grid input[name='checks']").each(function(i,o){
						if($(o).attr("checked")) ids.push($(o).val());
					});
					var idstr = ids.join(",");
					if(idstr==""){
						Tip({title:"提示",content:"请选择需要删除的列表项!"});
					}else{
						dialog({
							title:'提示',
							content:'确定删除吗?,如果确定,删除后将不能恢复!',
							resizable:false,
							bgiframe:false,
							buttons:{
								'是': function(){
									var me = this;
									$.post("sys/livs/do/?Livs-dels",{ids:idstr},function(text){
										tabtreecontent("sys/livs/?app.html");
										$(me).dialog('destroy');
									});
								},
								'否': function() {
									$(this).dialog('destroy');
								}
							}
						});
					}
				}
			}
		]
	});
	//查看数据库是否已更新
	$('td[dbnum]').each(function(i,o){
		var n = $(o).attr('dbnum'),
			t = $(o).html();
		if(n==0){
			$(o).html('<span style="color:red;">'+t+'</span>');
		}
	});
	//标识字段处理
	var _hotarrinfo = ['否','是'];
	$("a[hotagid]").each(function(i,o){
		var _tv = $(o).attr("val");
		$(o).text(_hotarrinfo[_tv]);
	});
	$("a[hotagid]").click(function(){
		var me = this,
			val = $(this).attr("val"),
			_id = $(this).attr("hotagid");
		$.post("sys/livs/do/?Livs-toggleinfo/id/"+_id+"/",{v:val},function(text){
			$(me).text(val==0?"是":"否");
			$(me).attr("val",val==1?0:1);
		});
	});
});
//设置跳转到当前页的变量
$.mx.setparam('fieldparenturl','sys/livs/?app.html');
</script>