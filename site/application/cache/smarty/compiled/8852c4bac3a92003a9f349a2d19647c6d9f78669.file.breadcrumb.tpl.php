<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-02-21 12:14:40
         compiled from "/var/www/daps/site/application/views/admin/include/breadcrumb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5649002945829a98f69faa1-04013052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8852c4bac3a92003a9f349a2d19647c6d9f78669' => 
    array (
      0 => '/var/www/daps/site/application/views/admin/include/breadcrumb.tpl',
      1 => 1519219733,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5649002945829a98f69faa1-04013052',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5829a98f6aa311_72223717',
  'variables' => 
  array (
    'breadcrumb' => 0,
    'aLink' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5829a98f6aa311_72223717')) {function content_5829a98f6aa311_72223717($_smarty_tpl) {?>			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb">
				<li>
					<a href="<?php echo site_url();?>
admin">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
                <?php  $_smarty_tpl->tpl_vars['aLink'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aLink']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumb']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['aLink']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['aLink']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['aLink']->key => $_smarty_tpl->tpl_vars['aLink']->value) {
$_smarty_tpl->tpl_vars['aLink']->_loop = true;
 $_smarty_tpl->tpl_vars['aLink']->iteration++;
 $_smarty_tpl->tpl_vars['aLink']->last = $_smarty_tpl->tpl_vars['aLink']->iteration === $_smarty_tpl->tpl_vars['aLink']->total;
?>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['aLink']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['aLink']->key;?>
</a>
                    <?php if ($_smarty_tpl->tpl_vars['aLink']->last!=true) {?><i class="fa fa-angle-right"></i><?php }?>
                </li>
                <?php } ?>
			</ul>
			<!-- END PAGE BREADCRUMB -->
<?php }} ?>
