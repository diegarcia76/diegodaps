<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-19 12:36:11
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\include\breadcrumb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:235545bc9f9ebeb4424-07931474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4e0bedf10d4e90e73891ee4e85e9c430a893dd3' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\include\\breadcrumb.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '235545bc9f9ebeb4424-07931474',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'breadcrumb' => 0,
    'aLink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bc9f9ebedfd73_53659410',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bc9f9ebedfd73_53659410')) {function content_5bc9f9ebedfd73_53659410($_smarty_tpl) {?>			<!-- BEGIN PAGE BREADCRUMB -->
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
